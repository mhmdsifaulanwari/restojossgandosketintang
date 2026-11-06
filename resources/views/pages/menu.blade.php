@extends('layouts.app')

@section('title', 'Menu & Promo - JOSS GANDOS Restoran')

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');
        /* ========== IMPORT ANIMATE.CSS ========== */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');


        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               MENU HERO - WHITE + ORANGE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

        .menu-hero {
            position: relative;
            width: 100%;
            min-height: calc(100vh - 80px);
            padding: 35px 15px 20px;
            background: #FFF7E8;
            overflow: hidden;
            box-sizing: border-box;
        }


        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           WHITE ORGANIC SHAPE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ===================================================== */

        .menu-hero-orange {
            display: none;
        }


        /* Container */
        .menu-hero .container {
            position: relative;
            z-index: 2;
        }


        /* Layout */
        .menu-hero-content {
            display: grid;

            grid-template-columns:
                47% 53%;

            align-items: center;

            min-height: calc(100vh - 140px);

            gap: 10px;
        }


        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               TEXT
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

        .menu-hero-text {
            width: 100%;
            max-width: 620px;
        }


        /* Tulisan kecil */
        .menu-hero-script {
            display: inline-block;
            margin-bottom: 8px;

            color: #7e7e7e;
            background-clip: text;

            font-family: 'Playfair Display', serif;
            font-size: 1.45rem;
            font-style: italic;
            font-weight: 600;
        }


        /* Judul utama */
        .menu-hero-title {
            width: 115%;
            max-width: none;

            margin: 0;

            font-family: 'Poppins', sans-serif;

            font-size: clamp(2.6rem, 3.6vw, 3.6rem);

            line-height: 1.12;

            font-weight: 800;

            letter-spacing: -1.2px;

            overflow-wrap: anywhere;
        }


        .menu-hero-title span {
            display: block;
        }

        .hero-title-normal {
            background: linear-gradient(135deg,
                    #f97316 0%,
                    #fbbf24 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-title-accent {
            background: linear-gradient(135deg,
                    #65000B 0%,
                    #C1121F 50%,
                    #FF3B30 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }


        /* Deskripsi */
        .menu-hero-description {
            max-width: 500px;

            margin: 18px 0 0;

            color: #7e7e7e;

            font-size: 0.9rem;

            line-height: 1.65;
        }




        .menu-hero-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 135px;

            padding: 13px 24px;

            border-radius: 50px;

            font-family: 'Poppins', sans-serif;

            font-size: 0.9rem;
            font-weight: 600;

            text-decoration: none;

            transition: none;
        }


        /* Primary */
        .menu-hero-btn.primary {
            background: linear-gradient(135deg, #B22222, #8B0000, #A52A2A);
            color: #ffffff;
            border: none;
        }


        /* Secondary */
        .menu-hero-btn.secondary {
            background: transparent;
            color: #B22222;
            border: 1.5px solid #B22222;
        }



        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           FOOD VISUAL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ===================================================== */

        .menu-hero-visual {
            position: relative;
            width: 100%;
            min-height: 500px;

            display: flex;
            align-items: center;
            justify-content: center;

            z-index: 2;
        }


        /* Stage */
        .food-stage {
            position: relative;

            width: 450px;
            height: 450px;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* Bayangan piring */
        .plate-shadow {
            position: absolute;

            width: 360px;
            height: 70px;

            bottom: 55px;

            background: rgba(0, 0, 0, 0.14);

            border-radius: 50%;

            filter: blur(20px);

            transform: rotate(-8deg);
        }


        /* Wrapper piring yang berputar */
        .rotating-plate {
            position: relative;

            width: 470px;
            height: 470px;

            display: flex;
            align-items: center;
            justify-content: center;

            animation:
                plateLoop 14s linear infinite;

            transform-origin: center center;
            will-change: transform;
        }


        /* Piring */
        .plate {
            position: relative;

            width: 450px;
            height: 450px;

            border-radius: 50%;

            background:
                radial-gradient(circle at center,
                    #ffffff 0%,
                    #ffffff 58%,
                    #eeeeee 59%,
                    #d6d6d6 64%,
                    #ffffff 65%,
                    #eeeeee 100%);

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.18);

            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* Lingkaran tengah piring */
        .plate-inner {
            position: absolute;

            width: 320px;
            height: 320px;

            border-radius: 50%;

            border:
                4px solid rgba(255, 90, 0, 0.08);
        }

        /* Frame foto agar otomatis mengikuti bentuk bulat piring */
        .hero-food-frame {
            position: absolute;

            width: 370px;
            height: 370px;

            top: 50%;
            left: 50%;

            transform: translate(-50%, -50%);

            border-radius: 50%;

            overflow: hidden;

            z-index: 3;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Foto makanan */
        .hero-food-frame .hero-food-image {
            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: center;

            display: block;

            background: transparent;

            border-radius: 0;

            pointer-events: none;

            animation: none;

            transform: none;
        }


        /* Foto makanan */



        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       INFINITE ROTATION
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ===================================================== */

        /* Piring berputar searah jarum jam */
        @keyframes plateLoop {

            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }

        }





        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               MOBILE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ===================================================== */

        @media (max-width: 992px) {

            .menu-hero {
                padding-top: 70px;
                padding-bottom: 60px;
            }

            .menu-hero-content {
                grid-template-columns: 1fr;

                text-align: center;
            }

            .menu-hero-text {
                max-width: 700px;

                margin: 0 auto;
            }

            .menu-hero-description {
                margin-left: auto;
                margin-right: auto;
            }



            .menu-hero-visual {
                min-height: 400px;
            }

        }




        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   MOBILE MENU HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   DESAIN:
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   KIRI  = TEKS
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   KANAN = PIRING + MAKANAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ===================================================== */

        @media (max-width: 576px) {

            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .menu-hero {
                position: relative;
                width: 100%;
                min-height: 700px;
                padding: 105px 15px 20px;
                background: #FFF7E8;
                overflow: hidden;
                box-sizing: border-box;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       SHAPE PUTIH BESAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .menu-hero-orange {
                position: absolute;

                top: -15%;
                left: -45%;

                width: 120%;
                height: 190%;

                background: #FFF7E8;

                border-radius: 50%;

                z-index: 1;

                pointer-events: none;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       CONTAINER
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .menu-hero .container {
                position: relative;

                z-index: 2;

                width: 100%;
                max-width: 100%;

                margin: 0 auto;

                padding: 0;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       LAYOUT 2 KOLOM
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       TEKS KIRI - PIRING KANAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .menu-hero-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
                gap: 0;
                text-align: center;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       TEKS - KIRI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .menu-hero-text {
                position: relative;

                order: 1;

                z-index: 3;

                width: 100%;
                max-width: 100%;

                margin: 0;

                padding: 0 4px;
            }


            /* Tulisan kecil */
            .menu-hero-script {
                display: block;

                margin: 0 0 6px;

                color: #7e7e7e;

                font-family: 'Playfair Display', serif;

                font-size: 1.35rem;

                font-style: italic;

                font-weight: 600;

                line-height: 1.15;
            }


            /* Judul */
            /* =========================================
                                                                                                                                                                                                                   JUDUL HERO MENU - MOBILE
                                                                                                                                                                                                                   ========================================= */

            .menu-hero-title {
                width: 100% !important;
                max-width: 310px !important;

                margin: 0 auto !important;
                padding: 0 !important;

                font-family: 'Poppins', sans-serif !important;

                font-size: 1.75rem !important;
                font-weight: 800 !important;

                line-height: 1.08 !important;

                letter-spacing: -0.6px !important;

                text-align: center !important;

                white-space: normal !important;
                overflow-wrap: normal !important;
                word-break: normal !important;
            }


            /* Setiap baris tetap terpisah,
                                                                                                                                                                                                                   tetapi boleh membungkus jika terlalu panjang */
            .menu-hero-title span {
                display: block !important;

                width: 100% !important;

                white-space: normal !important;
                overflow-wrap: break-word !important;
                word-break: normal !important;
            }

            /* =========================================
                                                                                                                                                                                                       DESKRIPSI HERO MENU - MOBILE
                                                                                                                                                                                                       ========================================= */

            .menu-hero-description {
                width: 100% !important;
                max-width: 300px !important;

                margin: 16px auto 0 !important;
                padding: 0 !important;

                color: #666 !important;

                font-size: 0.85rem !important;
                font-weight: 400 !important;

                line-height: 1.6 !important;

                text-align: center !important;

                overflow-wrap: break-word !important;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       BUTTON
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */



            .menu-hero-btn {
                display: inline-flex;

                align-items: center;
                justify-content: center;

                min-width: 0;

                width: auto;

                padding: 10px 16px;

                border-radius: 50px;

                font-family: 'Poppins', sans-serif;

                font-size: 0.8rem;
                font-weight: 600;

                line-height: 1.2;

                text-decoration: none;

                white-space: nowrap;

                transition: none;
            }

            .menu-hero-btn.primary {
                background: linear-gradient(135deg, #B22222, #8B0000, #A52A2A);
                color: #ffffff;
                border: 1.5px solid #B22222;
            }


            .menu-hero-btn.secondary {
                background: transparent;
                color: #B22222;
                border: 1.5px solid #B22222;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       VISUAL - KANAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .menu-hero-visual {
                position: relative;
                right: auto;
                top: auto;
                width: 100%;
                height: auto;
                transform: none;
                z-index: 3;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 15px 0 0;
                padding: 0;
                overflow: visible;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       FOOD STAGE
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .food-stage {
                position: relative;

                width: 350px;
                height: 350px;

                display: flex;
                align-items: center;
                justify-content: center;

                flex-shrink: 0;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       PIRING ROTASI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .rotating-plate {
                position: relative;

                width: 330px;
                height: 330px;

                display: flex;
                align-items: center;
                justify-content: center;

                flex-shrink: 0;

                animation:
                    plateLoop 14s linear infinite;

                transform-origin: center center;
                will-change: transform;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       PIRING
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .plate {
                position: relative;

                width: 310px;
                height: 310px;

                border-radius: 50%;

                background:
                    radial-gradient(circle at center,
                        #ffffff 0%,
                        #ffffff 58%,
                        #eeeeee 59%,
                        #d6d6d6 64%,
                        #ffffff 65%,
                        #eeeeee 100%);

                box-shadow:
                    0 18px 45px rgba(0, 0, 0, 0.16);

                display: flex;
                align-items: center;
                justify-content: center;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       LINGKARAN DALAM PIRING
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .plate-inner {
                position: absolute;

                width: 135px;
                height: 135px;

                border-radius: 50%;

                border:
                    2px solid rgba(255, 90, 0, 0.08);
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       FOTO MAKANAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            /* FRAME FOTO MOBILE */
            .hero-food-frame {
                position: absolute;

                width: 255px;
                height: 255px;

                top: 50%;
                left: 50%;

                transform: translate(-50%, -50%);

                border-radius: 50%;

                overflow: hidden;

                z-index: 3;

                display: flex;
                align-items: center;
                justify-content: center;
            }

            /* FOTO DI DALAM FRAME */
            .hero-food-frame .hero-food-image {
                width: 100%;
                height: 100%;

                object-fit: cover;
                object-position: center;

                display: block;

                background: transparent;

                border-radius: 0;

                pointer-events: none;

                animation: none;
                transform: none;
            }


            /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       BAYANGAN
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ========================================= */

            .plate-shadow {
                position: absolute;

                width: 160px;
                height: 30px;

                bottom: 18px;

                background:
                    rgba(0, 0, 0, 0.11);

                border-radius: 50%;

                filter: blur(10px);

                transform: rotate(-8deg);

                pointer-events: none;
            }

        }


        /* =====================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   UKURAN HP SANGAT KECIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ===================================================== */

        @media (max-width: 380px) {

            .menu-hero {
                padding-left: 8px;
                padding-right: 8px;
            }


            .menu-hero-content {
                grid-template-columns: 60% 40%;
            }





            .menu-hero-script {
                font-size: 0.9rem;
            }


            .menu-hero-title {
                max-width: 290px !important;

                font-size: 1.6rem !important;

                line-height: 1.08 !important;
                letter-spacing: -0.5px !important;
            }

            .menu-hero-title span {
                white-space: normal !important;
            }

            .menu-hero-description {
                max-width: 285px !important;

                font-size: 0.82rem !important;

                line-height: 1.55 !important;
            }








            .menu-hero-btn {
                padding: 8px 10px;
                font-size: 0.62rem;
            }


            .menu-hero-visual {
                min-height: 220px;
            }


            .food-stage {
                width: 300px;
                height: 300px;
            }


            .rotating-plate {
                width: 280px;
                height: 280px;
            }


            .plate {
                width: 265px;
                height: 265px;
            }


            .plate-inner {
                width: 112px;
                height: 112px;
            }

            .hero-food-frame {
                width: 220px;
                height: 220px;
            }

            .hero-food-frame .hero-food-image {
                width: 100%;
                height: 100%;

                object-fit: cover;
                object-position: center;
            }






            .plate-shadow {
                width: 135px;
                height: 25px;
            }

        }

        /* All your existing CSS styles remain exactly the same */
        :root {
            --primary-red: #DC143C;
            --secondary-red: #B22222;
            --dark-red: #8B0000;
            --light-red: #FFE4E1;
            --accent-gold: #FFD700;
            --dark-charcoal: #2C2C2C;
            --warm-gray: #F5F5F5;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--white);
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
        }

        /* ==================== HERO CAROUSEL SECTION - ALL SIDES ROUNDED ==================== */
        .hero-carousel-section {
            position: relative;

            margin-top: 0;

            padding: 0 0 60px;

            background: #FFF7E8;

            overflow: hidden;
        }

        /* =====================================================
                                                                                                                                                                               PROMO CARD - UKURAN NORMAL
                                                                                                                                                                               ===================================================== */

        .hero-slide {
            position: relative;

            flex: 0 0 320px !important;
            width: 320px !important;
            min-width: 320px !important;
            max-width: 320px !important;

            height: auto;

            opacity: 1;

            background: #ffffff;

            border-radius: 18px;

            overflow: hidden;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);

            box-sizing: border-box;
        }

        .hero-slide.active {
            opacity: 1;
            z-index: 1;
        }

        .hero-slide::before {
            display: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 20px;
            text-align: left;
            background: #ffffff;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary-red);
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        @keyframes slideUpFade {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            color: var(--dark-charcoal);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .hero-subtitle {
            font-size: 0.85rem;
            color: #666;
            margin: 0;
            line-height: 1.5;
        }

        .hero-price-container {
            background: #ffffff;
            border: none;
            border-radius: 0;
            padding: 0;
            margin-top: 15px;
            margin-bottom: 0;
            display: block;
            animation: none;
            position: relative;
        }

        .price-display {
            display: flex;
            align-items: center;
            gap: 25px;
            justify-content: center;
        }

        .current-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-red);
            line-height: 1;
            font-family: 'Poppins', sans-serif;
        }

        .price-currency {
            font-size: 0.8rem;
            color: #888;
            font-weight: 500;
        }

        .old-price {
            font-size: 0.9rem;
            color: #999;
            text-decoration: line-through;
            font-weight: 400;
        }

        .discount-badge {
            position: absolute;
            top: -15px;
            right: -15px;
            background: linear-gradient(135deg, #DC143C, #8B0000);
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            box-shadow: 0 10px 30px rgba(220, 20, 60, 0.5);
            border: 2px solid rgba(255, 215, 0, 0.3);
            animation: pulse 2s infinite;
            z-index: 3;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .discount-badge span:first-child {
            font-size: 1.8rem;
            line-height: 1;
        }

        .discount-badge span:last-child {
            font-size: 0.7rem;
            letter-spacing: 1px;
            margin-top: 2px;
        }

        /* Carousel Navigation Arrows */







        /* ==================== MENU SECTION - CLEAN & MINIMAL ==================== */
        .menu-section {
            padding: 60px 0 80px;
            background: #FFF7E8;
            position: relative;
        }

        .menu-section .container {
            max-width: 1400px;
            width: 100%;
            margin: 0 auto;
            padding: 0 30px;
        }

        /* Category Filter */
        .category-filter {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            width: 100%;
            margin: 0 auto 50px;
            padding: 0;
        }

        .category-filter::-webkit-scrollbar {
            display: none;
        }

        .filter-btn {
            background: white;
            border: 1px solid #e0e0e0;
            color: #666;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .filter-btn:hover {
            border-color: var(--primary-red);
            color: var(--primary-red);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #B22222, #8B0000, #A52A2A);
            color: white;
            border-color: #B22222;
        }

        /* Menu Grid */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0;
        }

        /* Menu Card - Enhanced Hover Effects */
        /* ==================== SIMPLE MENU CARD ==================== */

        .menu-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            border: 1px solid #eeeeee;
            position: relative;

            display: flex;
            flex-direction: column;

            opacity: 0;
            transform: translateY(15px);
            animation: cardReveal 0.5s forwards;
            transition: box-shadow 0.25s ease;
        }

        .menu-card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .card-image-container {
            height: 180px;
            aspect-ratio: unset;
        }

        .card-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .menu-click-image {
            cursor: zoom-in;
        }

        /* Hilangkan zoom gambar saat hover */
        .menu-card:hover .card-image-container img {
            transform: none;
        }

        /* Hilangkan overlay */
        .card-image-container::after {
            display: none;
        }

        /* Badge favorit tetap */
        .card-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #ffffff;
            color: var(--primary-red);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        /* Hilangkan icon kategori */
        .category-icon {
            display: none !important;
        }

        /* Isi card */
        .card-content {
            padding: 16px;
            background: #ffffff;

            display: flex;
            flex-direction: column;
            flex: 1;
        }

        /* Nama + harga */
        .card-header {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
            margin: 0;
            min-height: 0;
        }

        .card-title {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-size: 1.05rem;
            font-weight: 600;
            line-height: 1.35;
            color: #2c2c2c;
            width: 100%;
        }

        .card-price {
            margin: 0;
            white-space: nowrap;
            font-family: 'Poppins', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #222222;
            width: 100%;
        }

        .price-currency-small {
            font-size: 0.75rem;
            font-weight: 500;
            color: #666;
            margin-right: 2px;
        }

        /* Tombol buka deskripsi */
        .description-toggle {
            width: 100%;
            margin-top: 12px;
            padding: 0;
            border: none;
            background: transparent;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            cursor: pointer;
            font-size: 0.85rem;
            text-align: left;
        }

        .description-toggle span {
            color: #777;
        }

        .description-toggle i {
            font-size: 0.75rem;
            transition: transform 0.25s ease;
        }

        .description-toggle.active i {
            transform: rotate(180deg);
        }

        /* Deskripsi tersembunyi */
        .card-description {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            margin: 0;
            padding: 0;
            color: #666;
            font-size: 0.85rem;
            line-height: 1.5;
            transition:
                max-height 0.3s ease,
                opacity 0.25s ease,
                margin-top 0.3s ease;
        }

        /* Deskripsi terbuka */
        .card-description.open {
            max-height: 200px;
            opacity: 1;
            margin-top: 10px;
        }

        /* Tombol reservasi */
        .card-reservation {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100%;

            margin-top: 16px;

            padding: 13px 18px;

            border-radius: 999px;

            background: linear-gradient(135deg, #B22222, #8B0000, #A52A2A);
            color: #ffffff;

            text-align: center;
            text-decoration: none;

            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }

        .card-reservation:hover {
            background: linear-gradient(135deg, #8B0000, #B22222, #8B0000);
            color: #ffffff;
            transform: translateY(-1px);
        }

        /* Tidak menggunakan footer lama */
        .card-footer {
            display: none;
        }

        @keyframes cardReveal {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 4rem;
            }

            .menu-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        @media (max-width: 992px) {

            .promo-grid {
                display: flex;
            }


        }

        @media (max-width: 768px) {

            .promo-grid {
                display: flex;
            }

            .hero-slide {
                flex: 0 0 50vw;
                width: 50vw;
                min-width: 50vw;
                border-radius: 0;
            }

            .promo-image {
                aspect-ratio: 3 / 4;
            }

            .hero-title {
                font-size: 1.2rem;
            }

            .hero-subtitle {
                font-size: 0.85rem;
            }

            .hero-price-container {
                padding: 15px;
                margin: 15px 0 0;
            }

            .current-price {
                font-size: 1.4rem;
            }

            .old-price {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {

            .card-header {
                min-height: auto;
                gap: 2px;
            }

            .card-content {
                padding: 12px;
            }

            .card-title {
                font-size: 0.95rem;
            }

            .card-price {
                font-size: 0.9rem;
            }

            .price-currency-small {
                font-size: 0.7rem;
            }

            .description-toggle {
                margin-top: 10px;
                font-size: 0.78rem;
            }

            .card-description {
                font-size: 0.75rem;
            }

            .card-reservation {
                margin-top: 14px;
                padding: 10px 12px;
                border-radius: 999px;
                font-size: 0.8rem;
            }
        }


        @media (max-width: 576px) {

            .category-filter {
                display: flex;
                flex-wrap: nowrap;
                justify-content: flex-start;
                gap: 6px;
                padding: 0 10px;
                margin-bottom: 35px;
                overflow-x: auto;
                overflow-y: hidden;
                scrollbar-width: none;
            }

            .category-filter::-webkit-scrollbar {
                display: none;
            }

            .filter-btn {
                flex: 0 0 auto;
                padding: 9px 12px;
                font-size: 0.78rem;
                gap: 5px;
                white-space: nowrap;
            }

            .menu-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
                padding: 0 5px;
                max-width: 100%;
                margin: 0 auto;
            }

        }

        .card-content {
            padding: 12px;
        }

        .card-title {
            font-size: 0.95rem;
        }

        .card-price {
            font-size: 1rem;
            margin-left: 5px;
        }

        .price-currency-small {
            font-size: 0.7rem;
        }

        .card-description {
            font-size: 0.75rem;
        }

        .carousel-arrow {
            width: 35px;
            height: 35px;
        }

        .carousel-arrow.prev {
            left: 10px;
        }

        .carousel-arrow.next {
            right: 10px;
        }

        .category-icon {
            width: 30px;
            height: 30px;
            font-size: 0.8rem;
        }


        @media (max-width: 400px) {

            .hero-carousel-section {
                margin-top: 0 !important;
                margin-bottom: 0;

                border-radius: 0;

                background: #FFF7E8;
            }
        }

        .hero-slide {
            border-radius: 0;
        }

        .hero-title {
            font-size: 1.8rem;
        }

        .hero-subtitle {
            font-size: 0.9rem;
        }

        .current-price {
            font-size: 1.8rem;
        }

        .menu-grid {
            padding: 0 5px;
        }

        .carousel-arrow {
            width: 30px;
            height: 30px;
            font-size: 0.9rem;
        }

        .category-icon {
            width: 28px;
            height: 28px;
            font-size: 0.7rem;
        }

        .promo-grid {
            display: flex;
            flex-wrap: nowrap;
            justify-content: flex-start;

            gap: 20px;

            width: max-content;
            will-change: transform;
        }

        .promo-viewport {
            width: 100%;
            overflow: hidden;
        }

        .promo-image {
            width: 100%;

            aspect-ratio: 3 / 4;

            overflow: hidden;

            background: #f5f5f5;

            border-radius: 18px;
        }

        .promo-image img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            object-position: center;
            cursor: zoom-in;
        }

        .promo-heading {
            margin: 0;
            padding: 20px 20px 18px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: clamp(2rem, 3vw, 2.8rem);
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.5px;

            background: linear-gradient(135deg,
                    #f97316 0%,
                    #fbbf24 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        /* ==================== PROMO DETAIL ==================== */

        .promo-detail-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 30px;
            z-index: 9999;
        }

        .promo-detail-overlay.show {
            display: flex;
        }

        .promo-detail-card {
            width: min(900px, 100%);
            max-height: 90vh;

            display: flex;
            flex-direction: column;

            overflow: hidden;

            background: #ffffff;
            border-radius: 20px;
            clip-path: inset(0 round 20px);

            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.3);

            position: relative;

            animation: promoDetailShow 0.3s ease;
        }

        .promo-detail-body {
            flex: 1;

            min-height: 0;

            overflow-y: auto;
            overflow-x: hidden;

            -webkit-overflow-scrolling: touch;

            overscroll-behavior: contain;
        }

        /* ==============================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           SCROLLBAR PROMO DETAIL
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ============================== */

        .promo-detail-body {
            scrollbar-width: thin;
            scrollbar-color: #bdbdbd transparent;
        }

        .promo-detail-body::-webkit-scrollbar {
            width: 8px;
        }

        .promo-detail-body::-webkit-scrollbar-track {
            background: transparent;
        }

        .promo-detail-body::-webkit-scrollbar-thumb {
            background: #bdbdbd;
            border-radius: 10px;
        }

        .promo-detail-body::-webkit-scrollbar-thumb:hover {
            background: #9e9e9e;
        }

        @keyframes promoDetailShow {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(15px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .promo-detail-header {
            position: sticky;
            top: 0;
            z-index: 20;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 18px 22px;

            background: linear-gradient(135deg, #B22222, #8B0000, #A52A2A);

            border-bottom: none;
            border-radius: 0;

            flex-shrink: 0;

        }

        .promo-detail-title {
            margin: 0;

            font-size: 1.2rem;
            font-weight: 700;

            color: #ffffff;
        }

        .promo-detail-back {
            width: 38px;
            height: 38px;

            padding: 0;
            margin: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border: none;
            border-radius: 50%;

            background: transparent;

            cursor: pointer;
            position: relative;

            transition:
                transform 0.2s ease;
        }

        .promo-detail-back:hover {
            background: var(--dark-red);
            transform: scale(1.08);
        }

        .close-icon::before,
        .close-icon::after {
            background: var(--primary-red);
        }

        .promo-detail-back:hover {
            background: var(--dark-red);
            transform: scale(1.08);
        }


        /* =========================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ICON X
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ========================================= */

        .close-icon {
            position: relative;

            width: 16px;
            height: 16px;

            display: block;
        }


        .close-icon::before,
        .close-icon::after {
            content: '';

            position: absolute;

            top: 50%;
            left: 50%;

            width: 18px;
            height: 2.5px;

            background: #ffffff;

            border-radius: 2px;
        }


        .close-icon::before {
            transform:
                translate(-50%, -50%) rotate(45deg);
        }


        .close-icon::after {
            transform:
                translate(-50%, -50%) rotate(-45deg);
        }

        .promo-detail-image-wrapper {
            position: relative;

            overflow: hidden;

            max-height: 65vh;

            background: #f5f5f5;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;

            cursor: grab;

            user-select: none;
        }

        .promo-detail-image-wrapper.dragging {
            cursor: grabbing;
        }

        .promo-detail-image {
            max-width: 100%;
            max-height: 60vh;

            object-fit: contain;

            display: block;

            transform:
                translate3d(0, 0, 0) scale(1);

            transform-origin: center center;

            transition: transform 0.12s ease;

            user-select: none;

            touch-action: pan-y;

            cursor: grab;
        }

        .promo-detail-image-wrapper.dragging .promo-detail-image {
            cursor: grabbing;
        }





        .promo-detail-info {
            padding: 20px 24px 24px;
        }

        .promo-detail-info h3 {
            margin: 0 0 10px;
            color: var(--primary-red);
            font-size: 1.5rem;
        }

        .promo-detail-info p {
            margin: 0;
            color: #666;
            line-height: 1.6;
        }

        .promo-detail-badge {
            display: inline-block;
            background: var(--primary-red);
            color: #ffffff;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .promo-detail-price {
            display: flex;
            align-items: baseline;
            gap: 14px;
            margin-top: 4px;
            margin-bottom: 16px;
        }

        .promo-detail-current-price {
            font-family: 'Poppins', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--primary-red);
        }

        .promo-detail-old-price {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: #999;
            text-decoration: line-through;
        }

        /* Mobile */
        @media (max-width: 576px) {

            .promo-detail-card {
                border-radius: 16px;
                max-height: 94vh;

                overflow-y: auto;
                overflow-x: hidden;

                -webkit-overflow-scrolling: touch;
                overscroll-behavior: contain;
            }

            .promo-detail-header {
                position: sticky;
                top: 0;
                z-index: 20;

                padding: 14px 16px;

                background: linear-gradient(135deg,
                        #B22222 0%,
                        #8B0000 50%,
                        #A52A2A 100%);

                border-radius: 0;
            }

            .promo-detail-title {
                font-size: 1rem;
            }

            .promo-detail-back {
                width: 32px;
                height: 32px;
            }

            .close-icon {
                width: 14px;
                height: 14px;
            }

            .close-icon::before,
            .close-icon::after {
                width: 15px;
                height: 2px;
            }
        }

        .promo-detail-image-wrapper {
            max-height: 60vh;
            padding: 12px;
        }

        .promo-detail-image {
            max-height: 55vh;
        }




        /* ==================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   BARIS HARGA + TOMBOL DESKRIPSI
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   Harga di kiri, panah di kanan
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ================================================== */

        .card-price-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-top: 8px;
            gap: 10px;
        }

        /* Harga */
        .card-price {
            width: auto;
            margin: 0;
            white-space: nowrap;
            font-family: 'Poppins', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: #222222;
        }

        /* Tombol panah */
        .description-toggle {
            width: auto;
            margin: 0;
            padding: 4px 0 4px 10px;
            border: none;
            background: transparent;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-shrink: 0;
        }

        /* Ukuran panah */
        .description-toggle i {
            font-size: 0.75rem;
            transition: transform 0.25s ease;
        }

        /* Panah berputar ketika deskripsi dibuka */
        .description-toggle.active i {
            transform: rotate(180deg);
        }






        /* -----------------------------------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Animasi visual makanan
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Jangan memakai transform pada wrapper visual
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           karena mobile membutuhkan translateY(-50%)
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ----------------------------------------------------- */

        .menu-hero-visual {
            opacity: 1;
        }


        /* -----------------------------------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Piring berputar secara stabil
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Hanya transform yang dianimasikan
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ----------------------------------------------------- */

        .rotating-plate {
            animation: plateLoop 20s linear infinite;
            transform-origin: center center;
            will-change: transform;
        }

        /* Rotasi piring */
        @keyframes plateLoop {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        /* -----------------------------------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Kurangi beban rendering bayangan
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Blur besar dapat membuat animasi terasa berat
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ----------------------------------------------------- */

        .plate-shadow {
            filter: blur(8px);
            opacity: 0.75;
        }


        /* -----------------------------------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Optimasi gambar makanan
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ----------------------------------------------------- */

        .hero-food-image {
            display: block;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }


        /* -----------------------------------------------------
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           Menghormati pengaturan reduced motion
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           ----------------------------------------------------- */

        @media (prefers-reduced-motion: reduce) {

            .menu-hero-script,
            .menu-hero-title span,
            .menu-hero-description {
                opacity: 1;
                animation: none;
                transform: none;
            }

            .rotating-plate {
                animation: none;
                transform: none;
            }
        }


        /* ==================== PACKAGE MENU ==================== */

        .package-section {
            width: 100%;
            max-width: 1400px;
            margin: 80px auto 0;
            padding: 0 30px;
        }

        /* ==================== PACKAGE MENU ==================== */

        /* Section Package */
        .package-section {
            width: 100%;
            max-width: 1400px;
            margin: 80px auto 0;
            padding: 0 30px;
        }

        /* Header Package - sama seperti Gallery */
        .package-section .section-header {
            margin-bottom: 60px;
        }

        /* Judul Package - sama persis dengan judul Gallery */
        .package-section .section-title {
            margin: 0;

            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: clamp(2.6rem, 3.6vw, 3.6rem);
            line-height: 1.12;
            letter-spacing: -1.2px;

            background: linear-gradient(135deg,
                    #65000B 0%,
                    #C1121F 50%,
                    #FF3B30 100%);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Divider - sama seperti Gallery */
        .package-section .section-divider {
            display: none;
        }

        /* Deskripsi Package - sama persis dengan Gallery */
        .package-section .section-desc {
            color: #7e7e7e;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            max-width: 500px;
            line-height: 1.7;
            font-weight: 400;
            letter-spacing: 0;
        }

        /* Container besar horizontal */

        .package-carousel {
            position: relative;
            width: 100%;
            min-height: 560px;
            background: #ffffff;
            border-radius: 50px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #eeeeee;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }

        /* Area slide */

        /* Area slide */
        .package-slides {
            position: relative;
            width: 100%;
            height: 560px;
            min-height: 560px;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Setiap slide */
        .package-slide {
            position: absolute;
            inset: 0;

            width: 100%;
            height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;

            visibility: hidden;
        }

        /* Slide aktif */
        .package-slide.active {
            visibility: visible;
            transform: translateX(0);
        }

        /* Foto yang keluar ke kiri */
        .package-slide.leave-left {
            visibility: visible;
            animation: packageLeaveLeft 0.45s ease-in-out forwards;
        }

        /* Foto baru masuk dari kanan */
        .package-slide.enter-right {
            visibility: visible;
            animation: packageEnterRight 0.45s ease-in-out forwards;
        }

        /* Foto yang keluar ke kanan */
        .package-slide.leave-right {
            visibility: visible;
            animation: packageLeaveRight 0.45s ease-in-out forwards;
        }

        /* Foto baru masuk dari kiri */
        .package-slide.enter-left {
            visibility: visible;
            animation: packageEnterLeft 0.45s ease-in-out forwards;
        }


        /* ==================== ANIMATION ==================== */

        @keyframes packageLeaveLeft {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        @keyframes packageEnterRight {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes packageLeaveRight {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(100%);
            }
        }

        @keyframes packageEnterLeft {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        /* Foto portrait */

        .package-slide img {
            width: auto;
            height: 500px;
            max-width: 70%;
            object-fit: contain;
            border-radius: 20px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        /* Tombol kiri kanan */

        .package-arrow {
            position: absolute;

            width: 50px;
            height: 50px;

            border: none;
            border-radius: 50%;

            background: #B22222;
            color: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 1rem;

            cursor: pointer;

            z-index: 5;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);

            transition:
                background 0.25s ease,
                transform 0.25s ease;
        }

        .package-arrow:hover {
            background: #8B0000;
            transform: scale(1.08);
        }

        .package-prev {
            left: 25px;
        }

        .package-next {
            right: 25px;
        }


        @media (max-width: 768px) {

            .package-section {
                padding: 0 15px;
                margin-top: 60px;
            }

            .package-title {
                font-size: 1.6rem;
            }

            .package-carousel {
                min-height: 480px;
                border-radius: 22px;
            }

            .package-slides {
                min-height: 480px;
            }

            .package-slide img {
                height: 420px;
                max-width: 75%;
                border-radius: 16px;
            }

            .package-arrow {
                width: 42px;
                height: 42px;
            }

            .package-prev {
                left: 12px;
            }

            .package-next {
                right: 12px;
            }
        }

        @media (max-width: 576px) {

            .package-section {
                padding: 0 10px;
            }

            .package-carousel {
                min-height: 420px;
                border-radius: 40px;
            }

            .package-slides {
                min-height: 420px;
            }

            .package-slide img {
                height: 360px;
                max-width: 70%;
            }

            .package-arrow {
                width: 38px;
                height: 38px;
                font-size: 0.8rem;
            }

            .package-prev {
                left: 8px;
            }

            .package-next {
                right: 8px;
            }
        }


        /* ==================== PACKAGE DETAIL MODAL ==================== */

        .package-detail-overlay {
            position: fixed;
            inset: 0;

            background: rgba(0, 0, 0, 0.72);

            display: none;
            align-items: center;
            justify-content: center;

            padding: 30px;

            z-index: 99999;
        }

        .package-detail-overlay.show {
            display: flex;
        }

        .package-detail-card {
            width: min(900px, 100%);
            max-height: 92vh;

            background: #ffffff;

            border-radius: 20px;

            overflow: hidden;

            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.35);

            display: flex;
            flex-direction: column;

            animation: packageDetailShow 0.3s ease;
        }

        @keyframes packageDetailShow {

            from {
                opacity: 0;
                transform: scale(0.95) translateY(15px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }

        }


        /* Header */

        .package-detail-header {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 18px 22px;

            background: linear-gradient(135deg,
                    #B22222,
                    #8B0000,
                    #A52A2A);

            flex-shrink: 0;
        }

        .package-detail-title {
            margin: 0;

            color: #ffffff;

            font-family: 'Poppins', sans-serif;

            font-size: 1.2rem;

            font-weight: 700;
        }

        .package-detail-close {
            width: 40px;
            height: 40px;

            padding: 0;

            border: none;
            border-radius: 50%;

            background: transparent;

            display: flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;

            transition: transform 0.2s ease;
        }

        .package-detail-close:hover {
            background: transparent;
            transform: scale(1.08);
        }


        /* Body */

        .package-detail-body {
            min-height: 0;

            overflow: auto;

            background: #f5f5f5;

            display: flex;
            justify-content: center;
            align-items: center;
        }


        /* Area Foto */

        .package-detail-image-wrapper {
            width: 100%;

            max-height: 78vh;

            padding: 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            cursor: grab;

            user-select: none;
        }

        .package-detail-image-wrapper.dragging {
            cursor: grabbing;
        }


        /* Foto */

        .package-detail-image {
            max-width: 100%;
            max-height: 74vh;

            width: auto;
            height: auto;

            object-fit: contain;

            display: block;

            transform:
                translate3d(0, 0, 0) scale(1);

            transform-origin: center center;

            transition: transform 0.12s ease;

            user-select: none;

            touch-action: pan-y;

            cursor: grab;
        }

        .package-detail-image-wrapper.dragging .package-detail-image {
            cursor: grabbing;
        }


        /* Mobile */

        @media (max-width: 576px) {

            .package-detail-overlay {
                padding: 12px;
            }

            .package-detail-card {
                max-height: 94vh;
                border-radius: 16px;
            }

            .package-detail-header {
                padding: 14px 16px;

                background: linear-gradient(135deg,
                        #B22222 0%,
                        #8B0000 50%,
                        #7A0000 100%) !important;
            }

            .package-detail-title {
                font-size: 1rem;
            }

            .package-detail-close {
                width: 34px;
                height: 34px;
            }

            .package-detail-image-wrapper {
                padding: 12px;
                max-height: 82vh;
            }

            .package-detail-image {
                max-height: 78vh;
            }

        }
    </style>
@endsection

@section('content')
    @php
        $activePromotions = $promotions;
    @endphp

    <!-- ==================== MENU HERO ==================== -->
    <!-- ==================== MENU HERO ==================== -->
    <section class="menu-hero">

        <!-- Background orange seperti referensi -->
        <div class="menu-hero-orange"></div>



        <div class="menu-hero-decor"></div>

        <div class="container">

            <div class="menu-hero-content">

                <!-- ================= LEFT : TEXT ================= -->
                <div class="menu-hero-text">

                    @php
                        $menuHero = $menuPage;
                    @endphp

                    {{-- Teks kecil: muncul pertama --}}
                    <span class="menu-hero-script animate__animated animate__fadeInUp">
                        {{ $menuHero->hero_script ?? 'Joss Gandos' }}
                    </span>

                    <h1 class="menu-hero-title">

                        {{-- Judul baris pertama --}}
                        <span class="hero-title-normal animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                            {{ $menuHero->hero_title_line1 ?? 'Nikmati' }}
                        </span>

                        {{-- Judul baris kedua --}}
                        <span class="hero-title-accent animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                            {{ $menuHero->hero_title_line2 ?? 'Kelezatan' }}
                        </span>

                        {{-- Judul baris ketiga --}}
                        <span class="hero-title-normal animate__animated animate__fadeInUp" style="animation-delay: 0.6s;">
                            {{ $menuHero->hero_title_line3 ?? 'Menu Kami' }}
                        </span>

                    </h1>

                    {{-- Deskripsi: muncul terakhir --}}
                    <p class="menu-hero-description animate__animated animate__fadeInUp" style="animation-delay: 0.8s;">
                        {{ $menuHero->hero_description ??
                            'Nikmati berbagai hidangan khas Joss Gandos dengan cita rasa Nusantara yang menggugah selera.' }}
                    </p>

                </div>


                <!-- ================= RIGHT : FOOD ================= -->
                <div class="menu-hero-visual">
                    <div class="food-stage">

                        <!-- Piring -->
                        <div class="rotating-plate">

                            <div class="plate-shadow"></div>

                            <div class="plate">

                                <div class="plate-inner"></div>

                                <!-- Frame foto otomatis mengikuti bentuk piring -->
                                <div class="hero-food-frame">


                                    <img src="{{ !empty($menuHero->hero_image)
                                        ? asset('storage/' . $menuHero->hero_image)
                                        : 'https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?auto=format&fit=crop&w=900&q=85' }}"
                                        alt="{{ $menuHero->hero_title_line1 ?? 'Menu Joss Gandos' }}"
                                        class="hero-food-image"
                                        onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?auto=format&fit=crop&w=900&q=85';">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- Hero Carousel Section -->
    @if ($activePromotions->isNotEmpty())

        <section class="hero-carousel-section">


            <h2 class="promo-heading">
                {{ $menuPage->promo_title ?? 'Promo Spesial' }}
            </h2>

            <!-- Dynamic Promotions Slides -->
            <div class="promo-viewport">

                <div class="promo-grid">

                    @foreach ($activePromotions as $index => $promo)
                        <div class="hero-slide">

                            <div class="promo-image">

                                <img src="{{ $promo->image_url }}" alt="{{ $promo->title }}" class="promo-click-image"
                                    loading="eager" fetchpriority="high" decoding="async" width="600" height="800"
                                    data-image="{{ $promo->image_url }}" data-title="{{ $promo->title }}"
                                    data-description="{{ $promo->description }}" data-badge="{{ $promo->badge_text }}"
                                    data-price="{{ $promo->current_price }}" data-old-price="{{ $promo->old_price }}">

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

            <div class="promo-detail-overlay" id="promoDetailOverlay">

                <div class="promo-detail-card">

                    <div class="promo-detail-header">
                        <h3 class="promo-detail-title" id="promoDetailTitle">
                            Promo
                        </h3>

                        <button type="button" class="promo-detail-back" id="promoDetailBack" aria-label="Tutup">
                            <span class="close-icon"></span>
                        </button>
                    </div>

                    <div class="promo-detail-body">

                        <div class="promo-detail-image-wrapper">
                            <img src="" alt="Promo" class="promo-detail-image" id="promoDetailImage">
                        </div>

                        <div class="promo-detail-info">

                            <div class="promo-detail-badge" id="promoDetailBadge">
                            </div>

                            <div class="promo-detail-price">

                                <span class="promo-detail-current-price" id="promoDetailPrice">
                                </span>

                                <span class="promo-detail-old-price" id="promoDetailOldPrice">
                                </span>

                            </div>

                            <p id="promoDetailDescription"></p>

                        </div>

                    </div>

                </div>

            </div>
        </section>

    @endif

    <!-- Menu Section -->
    <section class="menu-section">
        <div class="container">
            <!-- Category Filter -->
            <div class="category-filter">
                <button class="filter-btn active" data-category="all">
                    <i class="fas fa-th-large"></i> Semua
                </button>
                @foreach ($categories as $category)
                    <button class="filter-btn" data-category="{{ $category->id }}">
                        @php
                            $iconClass = '';
                            $categoryName = strtolower($category->name);

                            if (str_contains($categoryName, 'main') || str_contains($categoryName, 'makanan utama')) {
                                $iconClass = 'fa-utensils';
                            } elseif (
                                str_contains($categoryName, 'appetizer') ||
                                str_contains($categoryName, 'pembuka')
                            ) {
                                $iconClass = 'fa-leaf';
                            } elseif (
                                str_contains($categoryName, 'dessert') ||
                                str_contains($categoryName, 'makanan penutup')
                            ) {
                                $iconClass = 'fa-cake-candles';
                            } elseif (str_contains($categoryName, 'drink') || str_contains($categoryName, 'minuman')) {
                                $iconClass = 'fa-mug-saucer';
                            } else {
                                $iconClass = 'fa-utensils';
                            }
                        @endphp
                        <i class="fas {{ $iconClass }}"></i> {{ $category->name }}
                    </button>
                @endforeach
            </div>

            <!-- Menu Grid -->
            <div class="menu-grid">
                @forelse($categories as $category)
                    @foreach ($category->menuItems as $index => $item)
                        <div class="menu-card" data-category="{{ $category->id }}"
                            style="animation-delay: {{ $index * 0.1 }}s">

                            <div class="card-image-container">

                                <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="menu-click-image"
                                    loading="lazy" data-image="{{ $item->image_url }}" data-title="{{ $item->name }}"
                                    data-description="{{ $item->description ?: 'Tidak ada deskripsi.' }}"
                                    data-price="{{ $item->price }}" data-category-name="{{ $category->name }}"
                                    onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">

                                @if ($item->is_featured)
                                    <div class="card-badge">
                                        Favorit
                                    </div>
                                @endif

                            </div>

                            <div class="card-content">

                                {{-- Nama menu --}}
                                <div class="card-header">

                                    <h3 class="card-title">
                                        {{ $item->name }}
                                    </h3>

                                </div>

                                {{-- Harga di kiri dan tombol panah di kanan --}}
                                <div class="card-price-row">

                                    <div class="card-price">
                                        <span class="price-currency-small">
                                            Rp
                                        </span>
                                        {{ number_format($item->price, 0, ',', '.') }}
                                    </div>

                                    <button type="button" class="description-toggle" aria-expanded="false"
                                        aria-label="Lihat deskripsi {{ $item->name }}">

                                        <i class="fas fa-chevron-down"></i>

                                    </button>

                                </div>

                                {{-- Deskripsi tetap ada, tetapi disembunyikan sampai tombol diklik --}}
                                <p class="card-description">
                                    {{ $item->description ?: 'Tidak ada deskripsi' }}
                                </p>

                            </div>

                        </div>
                    @endforeach
                @empty
                    <div class="col-12 text-center py-5">
                        <h3>Belum ada menu tersedia</h3>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- ==================== PACKAGE MENU ==================== --}}
        @if ($packages->count())

            <div class="package-section">

                <div class="section-header text-center mb-5">

                    <h2 class="section-title gallery-reveal">
                        {{ $menuPage->package_title ?? 'Package Menu' }}
                    </h2>

                    <div class="section-divider mx-auto"></div>

                    <p class="section-desc mx-auto gallery-reveal">
                        {{ $menuPage->package_description ?? 'Nikmati pilihan package spesial dari Joss Gandos.' }}
                    </p>

                </div>

                <div class="package-carousel">

                    {{-- Tombol Previous --}}
                    <button type="button" class="package-arrow package-prev" aria-label="Package sebelumnya">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    {{-- Area Package --}}
                    <div class="package-slides">

                        @foreach ($packages as $index => $package)
                            <div class="package-slide {{ $index === 0 ? 'active' : '' }}">

                                <img src="{{ str_starts_with($package->image ?? '', 'http') ? $package->image : asset('storage/' . $package->image) }}"
                                    alt="{{ $package->title ?: 'Package Joss Gandos' }}" class="package-click-image"
                                    loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                    data-image="{{ str_starts_with($package->image ?? '', 'http') ? $package->image : asset('storage/' . $package->image) }}"
                                    data-title="{{ $package->title ?: 'Package Joss Gandos' }}"
                                    onerror="this.onerror=null; this.src='https://via.placeholder.com/600x800?text=Gambar+Tidak+Tersedia';">
                            </div>
                        @endforeach

                    </div>

                    {{-- Tombol Next --}}
                    <button type="button" class="package-arrow package-next" aria-label="Package berikutnya">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                </div>

                {{-- ==================== PACKAGE DETAIL MODAL ==================== --}}

                <div class="package-detail-overlay" id="packageDetailOverlay">

                    <div class="package-detail-card">

                        {{-- Header --}}
                        <div class="package-detail-header">

                            <h3 class="package-detail-title" id="packageDetailTitle">
                                Package
                            </h3>

                            <button type="button" class="package-detail-close" id="packageDetailClose"
                                aria-label="Tutup">
                                <span class="close-icon"></span>
                            </button>

                        </div>

                        {{-- Body --}}
                        <div class="package-detail-body">

                            <div class="package-detail-image-wrapper">

                                <img src="" alt="Package" class="package-detail-image" id="packageDetailImage">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endif
    </section>

@endsection



@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ========== PROMO CAROUSEL - 2 MODE ==========

            const promoViewport =
                document.querySelector('.promo-viewport');

            const promoGrid =
                document.querySelector('.promo-grid');

            if (promoViewport && promoGrid) {

                const originalSlides = Array.from(
                    promoGrid.querySelectorAll('.hero-slide')
                );

                const promoCount =
                    originalSlides.length;


                // ==================================================
                // MODE 1
                // 1 - 4 PROMO = DIAM + RATA TENGAH
                // ==================================================

                const isMobile =
                    window.innerWidth <= 768;

                const maxStaticPromos =
                    isMobile ? 2 : 4;


                // ==========================================
                // PROMO DIAM + RATA TENGAH
                // ==========================================

                if (promoCount <= maxStaticPromos) {

                    promoGrid.style.transition =
                        'none';

                    promoGrid.style.transform =
                        'translate3d(0, 0, 0)';

                    promoGrid.style.width =
                        '100%';

                    promoGrid.style.justifyContent =
                        'center';

                }


                // ==================================================
                // MODE 2
                // 5+ PROMO = LOOP SMOOTH TANPA JEDA
                // ==================================================
                else {

                    /*
                     * Pastikan track kembali menjadi
                     * sepanjang seluruh promo.
                     */
                    promoGrid.style.width =
                        'max-content';

                    promoGrid.style.justifyContent =
                        'flex-start';

                    promoGrid.style.transition =
                        'none';


                    /*
                     * Gandakan seluruh promo.
                     *
                     * Contoh:
                     *
                     * 1 2 3 4 5 6
                     *
                     * menjadi:
                     *
                     * 1 2 3 4 5 6 1 2 3 4 5 6
                     */

                    originalSlides.forEach(slide => {

                        const clone =
                            slide.cloneNode(true);

                        promoGrid.appendChild(clone);

                    });


                    let offset = 0;

                    let lastTime =
                        performance.now();


                    /*
                     * Kecepatan gerakan.
                     */
                    const speed = 25;


                    /*
                     * Ambil lebar card sebenarnya.
                     */
                    function getCardWidth() {

                        const firstSlide =
                            promoGrid.querySelector(
                                '.hero-slide'
                            );

                        return firstSlide ?
                            firstSlide.getBoundingClientRect().width :
                            0;

                    }


                    /*
                     * Lebar satu rangkaian promo asli.
                     */
                    function getLoopWidth() {

                        return (
                            getCardWidth() *
                            promoCount
                        );

                    }


                    function animatePromo(currentTime) {

                        const deltaTime =
                            (currentTime - lastTime) / 1000;

                        lastTime =
                            currentTime;


                        /*
                         * Bergerak terus ke kiri.
                         */
                        offset -=
                            speed * deltaTime;


                        const loopWidth =
                            getLoopWidth();


                        /*
                         * Begitu rangkaian pertama habis,
                         * pindahkan posisi secara matematis
                         * ke rangkaian kedua yang identik.
                         *
                         * Tidak ada berhenti.
                         */
                        if (
                            loopWidth > 0 &&
                            Math.abs(offset) >= loopWidth
                        ) {

                            offset +=
                                loopWidth;

                        }


                        promoGrid.style.transform =
                            `translate3d(${offset}px, 0, 0)`;


                        requestAnimationFrame(
                            animatePromo
                        );

                    }


                    requestAnimationFrame(
                        animatePromo
                    );

                }

            }



            // ========== PROMO DETAIL + ZOOM ==========

            const promoImages =
                document.querySelectorAll('.promo-click-image');

            const promoDetailOverlay =
                document.getElementById('promoDetailOverlay');

            const promoDetailImage =
                document.getElementById('promoDetailImage');

            const promoDetailImageWrapper =
                document.querySelector('.promo-detail-image-wrapper');

            const promoDetailTitle =
                document.getElementById('promoDetailTitle');



            const promoDetailDescription =
                document.getElementById('promoDetailDescription');

            const promoDetailBadge =
                document.getElementById('promoDetailBadge');

            const promoDetailPrice =
                document.getElementById('promoDetailPrice');

            const promoDetailOldPrice =
                document.getElementById('promoDetailOldPrice');

            const promoDetailBack =
                document.getElementById('promoDetailBack');

            const promoElementsExist =
                promoDetailOverlay &&
                promoDetailImage &&
                promoDetailImageWrapper &&
                promoDetailTitle &&
                promoDetailDescription &&
                promoDetailBadge &&
                promoDetailPrice &&
                promoDetailOldPrice &&
                promoDetailBack;

            if (promoElementsExist) {






                // ==================== ZOOM + PAN PROMO ====================

                let promoZoom = 1;

                const MIN_ZOOM = 1;
                const MAX_ZOOM = 3;
                const ZOOM_STEP = 0.15;

                let panX = 0;
                let panY = 0;


                // =====================================================
                // UPDATE POSISI FOTO
                // =====================================================

                function updatePromoTransform() {

                    promoDetailImage.style.transform =
                        `translate3d(${panX}px, ${panY}px, 0) scale(${promoZoom})`;

                }


                // =====================================================
                // RESET POSISI FOTO
                // =====================================================

                function resetPromoView() {

                    promoZoom = 1;

                    panX = 0;
                    panY = 0;

                    updatePromoTransform();

                }


                // =====================================================
                // LAPTOP / DESKTOP
                // CTRL + SCROLL = ZOOM
                // =====================================================

                promoDetailImage.addEventListener(
                    'wheel',
                    function(event) {

                        if (!event.ctrlKey) {
                            return;
                        }

                        event.preventDefault();

                        if (event.deltaY < 0) {

                            promoZoom =
                                Math.min(
                                    promoZoom + ZOOM_STEP,
                                    MAX_ZOOM
                                );

                        } else {

                            promoZoom =
                                Math.max(
                                    promoZoom - ZOOM_STEP,
                                    MIN_ZOOM
                                );

                        }

                        // Jika kembali ke ukuran normal,
                        // kembalikan posisi ke tengah.
                        if (promoZoom <= MIN_ZOOM) {

                            promoZoom = MIN_ZOOM;

                            panX = 0;
                            panY = 0;

                        }

                        updatePromoTransform();

                    }, {
                        passive: false
                    }
                );


                // =====================================================
                // DESKTOP
                // 1 MOUSE = GESER FOTO
                // =====================================================

                let mouseDragging = false;

                let mouseStartX = 0;
                let mouseStartY = 0;

                let mouseStartPanX = 0;
                let mouseStartPanY = 0;


                promoDetailImage.addEventListener(
                    'mousedown',
                    function(event) {

                        // Hanya bisa digeser ketika zoom
                        if (
                            promoZoom <= MIN_ZOOM ||
                            event.button !== 0
                        ) {
                            return;
                        }

                        event.preventDefault();

                        mouseDragging = true;

                        mouseStartX =
                            event.clientX;

                        mouseStartY =
                            event.clientY;

                        mouseStartPanX =
                            panX;

                        mouseStartPanY =
                            panY;

                        promoDetailImageWrapper.classList.add(
                            'dragging'
                        );

                    }
                );


                document.addEventListener(
                    'mousemove',
                    function(event) {

                        if (!mouseDragging) {
                            return;
                        }

                        panX =
                            mouseStartPanX +
                            (event.clientX - mouseStartX);

                        panY =
                            mouseStartPanY +
                            (event.clientY - mouseStartY);

                        updatePromoTransform();

                    }
                );


                document.addEventListener(
                    'mouseup',
                    function() {

                        if (!mouseDragging) {
                            return;
                        }

                        mouseDragging = false;

                        promoDetailImageWrapper.classList.remove(
                            'dragging'
                        );

                    }
                );


                // =====================================================
                // MOBILE
                // 2 JARI = PINCH ZOOM
                // 1 JARI = GESER
                // =====================================================

                let initialPinchDistance = null;
                let initialPinchZoom = 1;

                let touchDragging = false;

                let touchStartX = 0;
                let touchStartY = 0;

                let touchStartPanX = 0;
                let touchStartPanY = 0;


                // Hitung jarak 2 jari
                function getTouchDistance(touch1, touch2) {

                    const dx =
                        touch1.clientX -
                        touch2.clientX;

                    const dy =
                        touch1.clientY -
                        touch2.clientY;

                    return Math.sqrt(
                        (dx * dx) +
                        (dy * dy)
                    );

                }


                // =====================================================
                // TOUCH START
                // =====================================================

                promoDetailImage.addEventListener(
                    'touchstart',
                    function(event) {

                        // ---------------------------------------------
                        // 2 JARI = MULAI PINCH
                        // ---------------------------------------------

                        if (event.touches.length === 2) {

                            event.preventDefault();

                            touchDragging = false;

                            initialPinchDistance =
                                getTouchDistance(
                                    event.touches[0],
                                    event.touches[1]
                                );

                            initialPinchZoom =
                                promoZoom;

                            return;
                        }


                        // ---------------------------------------------
                        // 1 JARI = MULAI GESER
                        // ---------------------------------------------

                        if (
                            event.touches.length === 1 &&
                            promoZoom > MIN_ZOOM
                        ) {

                            event.preventDefault();

                            touchDragging = true;

                            touchStartX =
                                event.touches[0].clientX;

                            touchStartY =
                                event.touches[0].clientY;

                            touchStartPanX =
                                panX;

                            touchStartPanY =
                                panY;

                            promoDetailImageWrapper.classList.add(
                                'dragging'
                            );

                        }

                    }, {
                        passive: false
                    }
                );


                // =====================================================
                // TOUCH MOVE
                // =====================================================

                promoDetailImage.addEventListener(
                    'touchmove',
                    function(event) {

                        // ---------------------------------------------
                        // 2 JARI = PINCH ZOOM
                        // ---------------------------------------------

                        if (
                            event.touches.length === 2 &&
                            initialPinchDistance !== null
                        ) {

                            event.preventDefault();

                            const currentDistance =
                                getTouchDistance(
                                    event.touches[0],
                                    event.touches[1]
                                );

                            const scale =
                                currentDistance /
                                initialPinchDistance;

                            promoZoom =
                                Math.min(
                                    Math.max(
                                        initialPinchZoom * scale,
                                        MIN_ZOOM
                                    ),
                                    MAX_ZOOM
                                );

                            if (promoZoom <= MIN_ZOOM) {

                                promoZoom = MIN_ZOOM;

                                panX = 0;
                                panY = 0;

                            }

                            updatePromoTransform();

                            return;
                        }


                        // ---------------------------------------------
                        // 1 JARI = GESER FOTO
                        // ---------------------------------------------

                        if (
                            event.touches.length === 1 &&
                            touchDragging &&
                            promoZoom > MIN_ZOOM
                        ) {

                            event.preventDefault();

                            panX =
                                touchStartPanX +
                                (
                                    event.touches[0].clientX -
                                    touchStartX
                                );

                            panY =
                                touchStartPanY +
                                (
                                    event.touches[0].clientY -
                                    touchStartY
                                );

                            updatePromoTransform();

                        }

                    }, {
                        passive: false
                    }
                );


                // =====================================================
                // TOUCH END
                // =====================================================

                promoDetailImage.addEventListener(
                    'touchend',
                    function(event) {

                        if (event.touches.length < 2) {

                            initialPinchDistance =
                                null;

                            initialPinchZoom =
                                promoZoom;

                        }

                        if (event.touches.length === 0) {

                            touchDragging = false;

                            promoDetailImageWrapper.classList.remove(
                                'dragging'
                            );

                        }

                    }
                );


                // =====================================================
                // TOUCH CANCEL
                // =====================================================

                promoDetailImage.addEventListener(
                    'touchcancel',
                    function() {

                        initialPinchDistance =
                            null;

                        touchDragging =
                            false;

                        promoDetailImageWrapper.classList.remove(
                            'dragging'
                        );

                    }
                );


                // ==================== KLIK FOTO ====================

                promoImages.forEach(function(image) {

                    image.style.cursor = 'zoom-in';

                    image.addEventListener('click', function() {

                        const imageUrl =
                            this.dataset.image;

                        const title =
                            this.dataset.title;

                        const description =
                            this.dataset.description;

                        const badge =
                            this.dataset.badge;

                        const price =
                            this.dataset.price;

                        const oldPrice =
                            this.dataset.oldPrice;


                        // Foto
                        promoDetailImage.src = imageUrl;
                        promoDetailImage.alt = title;


                        // Judul
                        promoDetailTitle.textContent = title;




                        // Deskripsi
                        promoDetailDescription.textContent =
                            description || 'Tidak ada deskripsi.';


                        // Badge
                        promoDetailBadge.textContent =
                            badge || 'PROMO SPESIAL';


                        // Harga sekarang
                        if (price) {

                            promoDetailPrice.textContent =
                                'Rp ' +
                                Number(price).toLocaleString('id-ID');

                        } else {

                            promoDetailPrice.textContent = '';

                        }


                        // Harga lama
                        if (
                            oldPrice &&
                            Number(oldPrice) > 0
                        ) {

                            promoDetailOldPrice.textContent =
                                'Rp ' +
                                Number(oldPrice)
                                .toLocaleString('id-ID');

                            promoDetailOldPrice.style.display =
                                'inline';

                        } else {

                            promoDetailOldPrice.textContent =
                                '';

                            promoDetailOldPrice.style.display =
                                'none';

                        }


                        // Reset zoom + posisi
                        resetPromoView();


                        // Tampilkan card
                        promoDetailOverlay.classList.add(
                            'show'
                        );

                        document.body.style.overflow =
                            'hidden';

                    });

                });







                // ==================== TOMBOL X ====================

                promoDetailBack.addEventListener(
                    'click',
                    function() {

                        // Tutup modal promo
                        promoDetailOverlay.classList.remove('show');

                        // Aktifkan kembali scroll halaman
                        document.body.style.overflow = '';

                        // Kosongkan sumber gambar agar modal
                        // tidak menyimpan foto promo sebelumnya
                        promoDetailImage.src = '';

                        // Reset posisi dan zoom foto
                        resetPromoView();

                    }
                );


                // ==================== KLIK AREA LUAR ====================

                promoDetailOverlay.addEventListener(
                    'click',
                    function(event) {

                        if (
                            event.target ===
                            promoDetailOverlay
                        ) {

                            promoDetailOverlay.classList
                                .remove('show');

                            document.body.style.overflow =
                                '';

                            promoDetailImage.src = '';

                        }

                    }
                );


                // ==================== TOMBOL ESC ====================

                document.addEventListener(
                    'keydown',
                    function(event) {

                        if (
                            event.key === 'Escape' &&
                            promoDetailOverlay.classList.contains(
                                'show'
                            )
                        ) {

                            promoDetailOverlay.classList
                                .remove('show');

                            document.body.style.overflow =
                                '';

                            promoDetailImage.src = '';

                        }

                    }
                );

            }

            // =====================================================
            // DETAIL MENU MAKANAN
            // Klik foto makanan → buka modal detail
            // =====================================================

            const menuImages =
                document.querySelectorAll('.menu-click-image');

            menuImages.forEach(function(image) {

                image.addEventListener('click', function() {

                    const imageUrl =
                        this.dataset.image;

                    const title =
                        this.dataset.title;

                    const description =
                        this.dataset.description;

                    const price =
                        this.dataset.price;

                    const categoryName =
                        this.dataset.categoryName;


                    // =========================
                    // FOTO
                    // =========================

                    promoDetailImage.src = imageUrl;
                    promoDetailImage.alt = title;


                    // =========================
                    // JUDUL MAKANAN
                    // =========================

                    promoDetailTitle.textContent =
                        title;


                    // =========================
                    // DESKRIPSI
                    // =========================

                    promoDetailDescription.textContent =
                        description ||
                        'Tidak ada deskripsi.';


                    // =========================
                    // LABEL KATEGORI
                    // =========================

                    promoDetailBadge.textContent =
                        categoryName || 'MENU MAKANAN';


                    // =========================
                    // HARGA
                    // =========================

                    if (price) {

                        promoDetailPrice.textContent =
                            'Rp ' +
                            Number(price)
                            .toLocaleString('id-ID');

                    } else {

                        promoDetailPrice.textContent =
                            '';

                    }


                    // =========================
                    // HILANGKAN HARGA LAMA
                    // =========================

                    promoDetailOldPrice.textContent =
                        '';

                    promoDetailOldPrice.style.display =
                        'none';


                    // =========================
                    // RESET FOTO
                    // =========================

                    promoDetailImage.style.transform =
                        'translate3d(0, 0, 0) scale(1)';

                    promoDetailImageWrapper.classList.remove(
                        'dragging'
                    );


                    // =========================
                    // BUKA MODAL
                    // =========================

                    promoDetailOverlay.classList.add(
                        'show'
                    );

                    document.body.style.overflow =
                        'hidden';

                });

            });

            // ========== MENU FILTER ==========
            const filterButtons = document.querySelectorAll('.filter-btn');
            const menuCards = document.querySelectorAll('.menu-card');

            filterButtons.forEach(button => {

                button.addEventListener('click', function() {

                    const selectedCategory =
                        this.getAttribute('data-category');

                    // Ubah tombol aktif
                    filterButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });

                    this.classList.add('active');

                    // Tampilkan menu sesuai kategori
                    menuCards.forEach(card => {

                        const cardCategory =
                            card.getAttribute('data-category');

                        if (
                            selectedCategory === 'all' ||
                            cardCategory === selectedCategory
                        ) {

                            card.style.display = '';
                            card.style.animation = 'none';

                            // Paksa browser membaca perubahan
                            card.offsetHeight;

                            card.style.animation =
                                'cardReveal 0.6s forwards';

                        } else {

                            card.style.display = 'none';

                        }

                    });

                });

            });

            // ========== DESCRIPTION TOGGLE ==========

            const descriptionToggles =
                document.querySelectorAll('.description-toggle');

            descriptionToggles.forEach(toggle => {

                toggle.addEventListener('click', function() {

                    // Ambil card-content tempat tombol berada
                    const cardContent =
                        this.closest('.card-content');

                    // Cari deskripsi di dalam card yang sama
                    const description =
                        cardContent.querySelector('.card-description');

                    // Cek apakah deskripsi sedang terbuka
                    const isOpen =
                        description.classList.contains('open');

                    // Tutup semua deskripsi lainnya
                    descriptionToggles.forEach(otherToggle => {

                        const otherCardContent =
                            otherToggle.closest('.card-content');

                        const otherDescription =
                            otherCardContent.querySelector('.card-description');

                        otherToggle.classList.remove('active');

                        otherToggle.setAttribute(
                            'aria-expanded',
                            'false'
                        );

                        otherDescription.classList.remove('open');

                    });

                    // Jika sebelumnya tertutup, buka deskripsi yang dipilih
                    if (!isOpen) {

                        description.classList.add('open');

                        this.classList.add('active');

                        this.setAttribute(
                            'aria-expanded',
                            'true'
                        );

                    }

                });

            });


            // ========== INITIAL CARD ANIMATION ==========
            setTimeout(() => {

                menuCards.forEach((card, index) => {

                    card.style.animationDelay =
                        `${index * 0.1}s`;

                    card.style.animation =
                        'cardReveal 0.6s forwards';

                });

            }, 300);

            // ========== SCROLL TO TOP ON RELOAD ==========
            window.onbeforeunload = function() {
                window.scrollTo(0, 0);
            }
        });

        /* ==================== PACKAGE CAROUSEL ==================== */

        document.addEventListener('DOMContentLoaded', function() {

            const slides = document.querySelectorAll('.package-slide');
            const prevButton = document.querySelector('.package-prev');
            const nextButton = document.querySelector('.package-next');

            if (slides.length <= 1) {
                return;
            }

            let currentPackage = 0;
            let isAnimating = false;

            function slideTo(nextIndex, direction) {

                if (isAnimating || nextIndex === currentPackage) {
                    return;
                }

                isAnimating = true;

                const currentSlide = slides[currentPackage];
                const nextSlide = slides[nextIndex];

                // Pastikan slide berikutnya siap ditampilkan
                nextSlide.classList.remove(
                    'active',
                    'leave-left',
                    'leave-right',
                    'enter-left',
                    'enter-right'
                );

                currentSlide.classList.remove(
                    'leave-left',
                    'leave-right',
                    'enter-left',
                    'enter-right'
                );

                /*
                 * ============================
                 * NEXT →
                 * Foto lama : bergerak ke kiri
                 * Foto baru : masuk dari kanan
                 * ============================
                 */
                if (direction === 'next') {

                    nextSlide.classList.add('enter-right');
                    currentSlide.classList.add('leave-left');

                }

                /*
                 * ============================
                 * PREV ←
                 * Foto lama : bergerak ke kanan
                 * Foto baru : masuk dari kiri
                 * ============================
                 */
                else {

                    nextSlide.classList.add('enter-left');
                    currentSlide.classList.add('leave-right');

                }

                setTimeout(function() {

                    currentSlide.classList.remove(
                        'active',
                        'leave-left',
                        'leave-right',
                        'enter-left',
                        'enter-right'
                    );

                    nextSlide.classList.remove(
                        'leave-left',
                        'leave-right',
                        'enter-left',
                        'enter-right'
                    );

                    nextSlide.classList.add('active');

                    currentPackage = nextIndex;

                    isAnimating = false;

                }, 450);
            }


            /* ==================== BUTTON PREV ==================== */

            if (prevButton) {

                prevButton.addEventListener('click', function() {

                    let previousIndex = currentPackage - 1;

                    if (previousIndex < 0) {
                        previousIndex = slides.length - 1;
                    }

                    slideTo(previousIndex, 'prev');

                });

            }


            /* ==================== BUTTON NEXT ==================== */

            if (nextButton) {

                nextButton.addEventListener('click', function() {

                    let nextIndex = currentPackage + 1;

                    if (nextIndex >= slides.length) {
                        nextIndex = 0;
                    }

                    slideTo(nextIndex, 'next');

                });

            }

        });


        /* ==================== PACKAGE DETAIL + ZOOM ==================== */

        document.addEventListener('DOMContentLoaded', function() {

            const packageImages =
                document.querySelectorAll('.package-click-image');

            const packageOverlay =
                document.getElementById('packageDetailOverlay');

            const packageImage =
                document.getElementById('packageDetailImage');

            const packageTitle =
                document.getElementById('packageDetailTitle');

            const packageClose =
                document.getElementById('packageDetailClose');

            const packageImageWrapper =
                document.querySelector('.package-detail-image-wrapper');


            if (
                !packageOverlay ||
                !packageImage ||
                !packageTitle ||
                !packageClose ||
                !packageImageWrapper
            ) {
                return;
            }


            /* ==================== ZOOM ==================== */

            let packageZoom = 1;

            const MIN_ZOOM = 1;
            const MAX_ZOOM = 3;
            const ZOOM_STEP = 0.15;

            let panX = 0;
            let panY = 0;


            function updatePackageTransform() {

                packageImage.style.transform =
                    `translate3d(${panX}px, ${panY}px, 0) scale(${packageZoom})`;

            }


            function resetPackageView() {

                packageZoom = 1;

                panX = 0;
                panY = 0;

                updatePackageTransform();

            }


            /* ==================== DESKTOP ZOOM ==================== */

            packageImage.addEventListener(
                'wheel',
                function(event) {

                    if (!event.ctrlKey) {
                        return;
                    }

                    event.preventDefault();

                    if (event.deltaY < 0) {

                        packageZoom =
                            Math.min(
                                packageZoom + ZOOM_STEP,
                                MAX_ZOOM
                            );

                    } else {

                        packageZoom =
                            Math.max(
                                packageZoom - ZOOM_STEP,
                                MIN_ZOOM
                            );

                    }

                    if (packageZoom <= MIN_ZOOM) {

                        packageZoom = MIN_ZOOM;

                        panX = 0;
                        panY = 0;

                    }

                    updatePackageTransform();

                }, {
                    passive: false
                }
            );


            /* ==================== MOUSE DRAG ==================== */

            let mouseDragging = false;

            let mouseStartX = 0;
            let mouseStartY = 0;

            let mouseStartPanX = 0;
            let mouseStartPanY = 0;


            packageImage.addEventListener(
                'mousedown',
                function(event) {

                    if (
                        packageZoom <= MIN_ZOOM ||
                        event.button !== 0
                    ) {
                        return;
                    }

                    event.preventDefault();

                    mouseDragging = true;

                    mouseStartX =
                        event.clientX;

                    mouseStartY =
                        event.clientY;

                    mouseStartPanX =
                        panX;

                    mouseStartPanY =
                        panY;

                    packageImageWrapper.classList.add(
                        'dragging'
                    );

                }
            );


            document.addEventListener(
                'mousemove',
                function(event) {

                    if (!mouseDragging) {
                        return;
                    }

                    panX =
                        mouseStartPanX +
                        (
                            event.clientX -
                            mouseStartX
                        );

                    panY =
                        mouseStartPanY +
                        (
                            event.clientY -
                            mouseStartY
                        );

                    updatePackageTransform();

                }
            );


            document.addEventListener(
                'mouseup',
                function() {

                    if (!mouseDragging) {
                        return;
                    }

                    mouseDragging = false;

                    packageImageWrapper.classList.remove(
                        'dragging'
                    );

                }
            );


            /* ==================== MOBILE PINCH ==================== */

            let initialPinchDistance = null;
            let initialPinchZoom = 1;

            let touchDragging = false;

            let touchStartX = 0;
            let touchStartY = 0;

            let touchStartPanX = 0;
            let touchStartPanY = 0;


            function getTouchDistance(touch1, touch2) {

                const dx =
                    touch1.clientX -
                    touch2.clientX;

                const dy =
                    touch1.clientY -
                    touch2.clientY;

                return Math.sqrt(
                    (dx * dx) +
                    (dy * dy)
                );

            }


            packageImage.addEventListener(
                'touchstart',
                function(event) {

                    /* 2 JARI = PINCH */

                    if (event.touches.length === 2) {

                        event.preventDefault();

                        touchDragging = false;

                        initialPinchDistance =
                            getTouchDistance(
                                event.touches[0],
                                event.touches[1]
                            );

                        initialPinchZoom =
                            packageZoom;

                        return;
                    }


                    /* 1 JARI = GESER */

                    if (
                        event.touches.length === 1 &&
                        packageZoom > MIN_ZOOM
                    ) {

                        event.preventDefault();

                        touchDragging = true;

                        touchStartX =
                            event.touches[0].clientX;

                        touchStartY =
                            event.touches[0].clientY;

                        touchStartPanX =
                            panX;

                        touchStartPanY =
                            panY;

                        packageImageWrapper.classList.add(
                            'dragging'
                        );

                    }

                }, {
                    passive: false
                }
            );


            packageImage.addEventListener(
                'touchmove',
                function(event) {

                    /* 2 JARI = PINCH ZOOM */

                    if (
                        event.touches.length === 2 &&
                        initialPinchDistance !== null
                    ) {

                        event.preventDefault();

                        const currentDistance =
                            getTouchDistance(
                                event.touches[0],
                                event.touches[1]
                            );

                        const scale =
                            currentDistance /
                            initialPinchDistance;

                        packageZoom =
                            Math.min(
                                Math.max(
                                    initialPinchZoom * scale,
                                    MIN_ZOOM
                                ),
                                MAX_ZOOM
                            );

                        if (packageZoom <= MIN_ZOOM) {

                            packageZoom = MIN_ZOOM;

                            panX = 0;
                            panY = 0;

                        }

                        updatePackageTransform();

                        return;
                    }


                    /* 1 JARI = GESER */

                    if (
                        event.touches.length === 1 &&
                        touchDragging &&
                        packageZoom > MIN_ZOOM
                    ) {

                        event.preventDefault();

                        panX =
                            touchStartPanX +
                            (
                                event.touches[0].clientX -
                                touchStartX
                            );

                        panY =
                            touchStartPanY +
                            (
                                event.touches[0].clientY -
                                touchStartY
                            );

                        updatePackageTransform();

                    }

                }, {
                    passive: false
                }
            );


            packageImage.addEventListener(
                'touchend',
                function(event) {

                    if (event.touches.length < 2) {

                        initialPinchDistance =
                            null;

                        initialPinchZoom =
                            packageZoom;

                    }

                    if (event.touches.length === 0) {

                        touchDragging = false;

                        packageImageWrapper.classList.remove(
                            'dragging'
                        );

                    }

                }
            );


            /* ==================== KLIK FOTO PACKAGE ==================== */

            packageImages.forEach(function(image) {

                image.addEventListener(
                    'click',
                    function() {

                        const imageUrl =
                            this.dataset.image;

                        const title =
                            this.dataset.title;


                        packageImage.src =
                            imageUrl;

                        packageImage.alt =
                            title;

                        packageTitle.textContent =
                            title;


                        resetPackageView();

                        packageOverlay.classList.add(
                            'show'
                        );

                        document.body.style.overflow =
                            'hidden';

                    }
                );

            });


            /* ==================== TUTUP ==================== */

            function closePackageDetail() {

                packageOverlay.classList.remove(
                    'show'
                );

                document.body.style.overflow =
                    '';

                packageImage.src = '';

                resetPackageView();

            }


            packageClose.addEventListener(
                'click',
                closePackageDetail
            );


            /* Klik area luar */

            packageOverlay.addEventListener(
                'click',
                function(event) {

                    if (
                        event.target ===
                        packageOverlay
                    ) {
                        closePackageDetail();
                    }

                }
            );


            /* ESC */

            document.addEventListener(
                'keydown',
                function(event) {

                    if (
                        event.key === 'Escape' &&
                        packageOverlay.classList.contains(
                            'show'
                        )
                    ) {
                        closePackageDetail();
                    }

                }
            );

        });
    </script>
@endsection
