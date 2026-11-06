<?php
// app/Http/Controllers/Admin/PromotionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PromotionController extends Controller
{
    /**
     * Display a listing of promotions.
     */
    public function index()
    {
        try {
            $promotions = Promotion::orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('admin.promotions.index', compact('promotions'));
        } catch (\Exception $e) {
            Log::error('Error in PromotionController@index: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new promotion.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created promotion in storage.
     */
    public function store(Request $request)
    {
        $imagePath = null;

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'current_price' => 'required|numeric|min:0',
                'old_price' => 'nullable|numeric|min:0|gt:current_price',
                'image_file' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
                'sort_order' => 'nullable|integer',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'is_active' => 'nullable|boolean',
            ]);

            $data = $request->except([
                'image_file',
                '_token',
                '_method'
            ]);

            $data['is_active'] = $request->has('is_active');

            // Simpan foto ke storage/app/public/images/promotions
            $imagePath = $request->file('image_file')
                ->store('images/promotions', 'public');

            if (!$imagePath) {
                throw new \Exception('Gagal menyimpan foto promosi.');
            }

            // Simpan path foto ke database
            $data['image_url'] = $imagePath;

            Log::info('Creating new promotion:', [
                'title' => $data['title'],
                'image_path' => $imagePath,
                'start_date_input' => $request->start_date,
                'end_date_input' => $request->end_date,
                'timezone' => 'Asia/Jakarta'
            ]);

            $promotion = Promotion::create($data);

            Log::info('Promotion created successfully:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'image_url' => $promotion->getRawOriginal('image_url'),
                'start_date_db' => $promotion->getRawStartDateAttribute(),
                'end_date_db' => $promotion->getRawEndDateAttribute()
            ]);

            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi "' . $promotion->title . '" berhasil ditambahkan!');
        } catch (\Exception $e) {

            // Hapus file jika proses penyimpanan database gagal
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            Log::error('Error creating promotion: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified promotion.
     */
    public function edit($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);

            Log::info('Editing promotion:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'start_date' => $promotion->start_date->format('Y-m-d H:i:s'),
                'end_date' => $promotion->end_date->format('Y-m-d H:i:s'),
                'is_active' => $promotion->is_active
            ]);

            return view('admin.promotions.edit', compact('promotion'));
        } catch (\Exception $e) {
            Log::error('Error editing promotion: ' . $e->getMessage());
            return redirect()->route('admin.promotions.index')
                ->with('error', 'Promosi tidak ditemukan!');
        }
    }

    /**
     * Update the specified promotion in storage.
     */
    public function update(Request $request, $id)
    {
        $newImagePath = null;

        try {
            $promotion = Promotion::findOrFail($id);

            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'current_price' => 'required|numeric|min:0',
                'old_price' => 'nullable|numeric|min:0|gt:current_price',
                'image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
                'sort_order' => 'nullable|integer',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'is_active' => 'nullable|boolean',
            ]);

            $data = $request->except([
                'image_file',
                '_token',
                '_method'
            ]);

            $data['is_active'] = $request->has('is_active');

            // Ambil path foto lama langsung dari database
            $oldImagePath = $promotion->getRawOriginal('image_url');

            Log::info('Updating promotion:', [
                'id' => $id,
                'old_title' => $promotion->title,
                'new_title' => $data['title'],
                'old_image' => $oldImagePath,
                'start_date_input' => $request->start_date,
                'end_date_input' => $request->end_date
            ]);

            // Jika admin mengunggah foto baru
            if ($request->hasFile('image_file')) {

                $newImagePath = $request->file('image_file')
                    ->store('images/promotions', 'public');

                if (!$newImagePath) {
                    throw new \Exception('Gagal menyimpan foto promosi baru.');
                }

                $data['image_url'] = $newImagePath;
            }

            // Update data promosi
            $promotion->update($data);

            // Hapus foto lama setelah update berhasil
            if (
                $newImagePath &&
                $oldImagePath &&
                !str_starts_with($oldImagePath, 'http://') &&
                !str_starts_with($oldImagePath, 'https://')
            ) {
                $oldImagePath = preg_replace(
                    '#^(public/|storage/)#',
                    '',
                    $oldImagePath
                );

                if (str_starts_with($oldImagePath, 'images/promotions/')) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            // Refresh data terbaru
            $promotion->refresh();

            Log::info('Promotion updated successfully:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'image_url' => $promotion->getRawOriginal('image_url'),
                'start_date_db' => $promotion->getRawStartDateAttribute(),
                'end_date_db' => $promotion->getRawEndDateAttribute()
            ]);

            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi "' . $promotion->title . '" berhasil diperbarui!');
        } catch (\Exception $e) {

            // Jika update gagal, hapus file baru yang sudah terlanjur diunggah
            if ($newImagePath) {
                Storage::disk('public')->delete($newImagePath);
            }

            Log::error('Error updating promotion: ' . $e->getMessage());
            Log::error($e->getTraceAsString());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified promotion from storage.
     */
    public function destroy($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);

            $title = $promotion->title;

            // Ambil path asli dari database
            $imagePath = $promotion->getRawOriginal('image_url');

            Log::info('Deleting promotion:', [
                'id' => $id,
                'title' => $title,
                'image_path' => $imagePath
            ]);

            // Hapus foto lokal jika berasal dari folder promosi
            if (
                $imagePath &&
                !str_starts_with($imagePath, 'http://') &&
                !str_starts_with($imagePath, 'https://')
            ) {
                $imagePath = preg_replace(
                    '#^(public/|storage/)#',
                    '',
                    $imagePath
                );

                if (str_starts_with($imagePath, 'images/promotions/')) {

                    if (Storage::disk('public')->exists($imagePath)) {
                        Storage::disk('public')->delete($imagePath);

                        Log::info('Promotion image deleted:', [
                            'image_path' => $imagePath
                        ]);
                    } else {
                        Log::warning('Promotion image not found:', [
                            'image_path' => $imagePath
                        ]);
                    }
                }
            }

            // Hapus data promosi dari database
            $promotion->delete();

            Log::info('Promotion deleted successfully:', [
                'id' => $id,
                'title' => $title
            ]);

            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi "' . $title . '" berhasil dihapus!');
        } catch (\Exception $e) {

            Log::error('Error deleting promotion: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
