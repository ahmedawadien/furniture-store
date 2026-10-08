<?php

/* =========================================================
|  PRODUCT DATA
========================================================= */

$productName     = "أريكة مخملية فاخرة";
$productPrice    = 12500;
$productOldPrice = 15000;
$productSaving   = $productOldPrice - $productPrice;


/* =========================================================
|  PRODUCT IMAGES
========================================================= */

$images = [
    'emerald' => 'assets/img/emerald.jpg',
    'blue'    => 'assets/img/blue.jpg',
    'beige'   => 'assets/img/beige.jpg',
    'gray'    => 'assets/img/gray.jpg',
];


/* =========================================================
|  PRODUCT COLORS
========================================================= */

$colors = [
    [
        'id'    => 'emerald',
        'name'  => 'أخضر زمردي',
        'hex'   => '#075b4c',
        'image' => $images['emerald'],
    ],
    [
        'id'    => 'blue',
        'name'  => 'أزرق ملكي',
        'hex'   => '#172554',
        'image' => $images['blue'],
    ],
    [
        'id'    => 'beige',
        'name'  => 'بيج دافئ',
        'hex'   => '#d6b98c',
        'image' => $images['beige'],
    ],
    [
        'id'    => 'gray',
        'name'  => 'رمادي فاحم',
        'hex'   => '#475569',
        'image' => $images['gray'],
    ],
];


/* =========================================================
|  GALLERY
========================================================= */

$gallery = [
    [
        'src'   => $images['emerald'],
        'index' => '01',
    ],
    [
        'src'   => $images['blue'],
        'index' => '02',
    ],
    [
        'src'   => $images['beige'],
        'index' => '03',
    ],
    [
        'src'   => $images['gray'],
        'index' => '04',
    ],
];

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, viewport-fit=cover"
    >

    <meta
        name="theme-color"
        content="#17130f"
    >

    <meta
        name="description"
        content="<?= htmlspecialchars($productName) ?> - صنعة للأثاث"
    >

    <title>
        <?= htmlspecialchars($productName) ?> - صنعة
    </title>


    <!-- =====================================================
    TAILWIND CSS
    ====================================================== -->

    <script src="https://cdn.tailwindcss.com"></script>


    <!-- =====================================================
    FONT AWESOME
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- =====================================================
    TAILWIND CONFIG
    ====================================================== -->

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    colors: {

                        brand: {

                            50:  '#faf7f1',
                            100: '#f3ead9',
                            200: '#e7d5b5',
                            300: '#d8b982',
                            400: '#c99b58',
                            500: '#b47a35',
                            600: '#956029',
                            700: '#75491f',
                            800: '#5c371b',
                            900: '#3d2412'

                        }

                    },

                    boxShadow: {

                        luxury:
                            '0 25px 70px rgba(61,36,18,.08)',

                        soft:
                            '0 12px 40px rgba(15,23,42,.07)',

                        floating:
                            '0 20px 60px rgba(15,23,42,.14)'

                    }

                }

            }

        };

    </script>


    <!-- =====================================================
    CUSTOM CSS
    ====================================================== -->

    <style>


        @font-face {

            font-family: "adobe_arabic";

            src:
                url("assets/fonts/ArabicUIDisplay.otf")
                format("truetype");

            font-weight: 400;

            font-style: normal;

            font-display: swap;

        }

        *,
        *::before,
        *::after {

            box-sizing: border-box;

        }


        html {

            scroll-behavior: smooth;

            overflow-x: hidden;

        }


        body {

            margin: 0;

            min-width: 320px;

            overflow-x: hidden;

            font-family:
                "adobe_arabic",
                Arial,
                sans-serif;

            background:

                radial-gradient(
                    circle at 8% 0%,
                    rgba(231,213,181,.30),
                    transparent 27%
                ),

                radial-gradient(
                    circle at 95% 20%,
                    rgba(226,232,240,.40),
                    transparent 25%
                ),

                #f8f8f6;

            color: #172033;

        }


        body,
        button,
        input,
        textarea,
        select {

            font-family:
                "adobe_arabic",
                Arial,
                sans-serif;

        }


        img {

            max-width: 100%;

        }


        button,
        a {

            -webkit-tap-highlight-color:
                transparent;

        }


        button {

            font-family: inherit;

        }


        ::selection {

            background: #e7d5b5;

            color: #3d2412;

        }


        .page-container {

            width: 100%;

        }


        .safe-bottom {

            padding-bottom:
                calc(
                    .75rem +
                    env(safe-area-inset-bottom)
                );

        }


        .hide-scrollbar {

            scrollbar-width: none;

            -ms-overflow-style: none;

        }


        .hide-scrollbar::-webkit-scrollbar {

            display: none;

        }


        .min-w-0 {

            min-width: 0;

        }


        /* =====================================================
        GLASS NAVBAR
        ====================================================== */

        .glass {

            background:
                rgba(255,255,255,.86);

            backdrop-filter:
                blur(20px);

            -webkit-backdrop-filter:
                blur(20px);

        }


        /* =====================================================
        PRODUCT CARD
        ====================================================== */

        .product-card {

            background:

                linear-gradient(
                    145deg,
                    rgba(255,255,255,.99),
                    rgba(250,248,244,.96)
                );

        }


        /* =====================================================
        MAIN GALLERY
        NO BACKGROUND
        NO CARD
        NO SHADOW
        ====================================================== */

        .gallery-container {

            position: relative;

            width: 100%;

            min-height: 520px;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            background: transparent !important;

            border: none !important;

            box-shadow: none !important;

        }


        .gallery-image {

            width: 86%;

            height: 86%;

            max-width: 720px;

            max-height: 620px;

            object-fit: contain;

            object-position: center;

            display: block;

            margin: auto;

            border-radius: 0;

            box-shadow: none;

            background: transparent;

            transition:
                transform .5s ease,
                opacity .3s ease;

        }


        .gallery-image:hover {

            transform:
                scale(1.025);

        }


        .gallery-container::before,
        .gallery-container::after {

            display: none !important;

            content: none !important;

        }


        /* =====================================================
        THUMBNAILS
        ====================================================== */

        .thumb-active {

            border-color:
                #956029 !important;

            box-shadow:
                0 8px 24px
                rgba(149,96,41,.16);

        }


        /* =====================================================
        COLOR SWATCH
        ====================================================== */

        .swatch-active {

            box-shadow:
                0 0 0 3px #fff,
                0 0 0 5px #956029;

        }


        /* =====================================================
        CART DRAWER
        ====================================================== */

        .drawer-overlay {

            opacity: 0;

            pointer-events: none;

            transition:
                opacity .3s ease;

        }


        .drawer-overlay.active {

            opacity: 1;

            pointer-events: auto;

        }


        .cart-drawer {

            transform:
                translateX(105%);

            transition:
                transform .4s
                cubic-bezier(.22,.61,.36,1);

        }


        .cart-drawer.active {

            transform:
                translateX(0);

        }


        /* =====================================================
        MOBILE BUY BAR
        ====================================================== */

        .mobile-buy-bar {

            transform:
                translateY(120%);

            transition:
                transform .35s
                cubic-bezier(.22,.61,.36,1);

        }


        .mobile-buy-bar.visible {

            transform:
                translateY(0);

        }


        /* =====================================================
        SHINE BUTTON
        ====================================================== */

        .shine-button {

            position: relative;

            overflow: hidden;

        }


        .shine-button::after {

            content: "";

            position: absolute;

            top: 0;

            left: -120%;

            width: 70%;

            height: 100%;

            background:

                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,.25),
                    transparent
                );

            transform:
                skewX(-18deg);

            transition:
                left .65s ease;

        }


        .shine-button:hover::after {

            left: 140%;

        }


        /* =====================================================
        FADE ANIMATION
        ====================================================== */

        .fade-up {

            opacity: 0;

            transform:
                translateY(24px);

            animation:
                fadeUp .7s ease forwards;

        }


        .delay-1 {

            animation-delay:
                .1s;

        }


        @keyframes fadeUp {

            to {

                opacity: 1;

                transform:
                    translateY(0);

            }

        }


        /* =====================================================
        QUANTITY
        ====================================================== */

        .quantity-button {

            transition:
                transform .18s ease,
                background .18s ease;

        }


        .quantity-button:hover {

            transform:
                translateY(-1px);

        }


        .quantity-button:active {

            transform:
                scale(.9);

        }


        /* =====================================================
        IMAGE VIEWER
        ====================================================== */

        #image-viewer {

            transition:
                opacity .25s ease;

        }


        #viewer-image {

            animation:
                viewerIn .3s ease;

        }


        @keyframes viewerIn {

            from {

                opacity: 0;

                transform:
                    scale(.96);

            }

            to {

                opacity: 1;

                transform:
                    scale(1);

            }

        }


        /* =====================================================
        MOBILE
        ====================================================== */

        @media (max-width: 767px) {

            body {

                padding-bottom:
                    calc(
                        82px +
                        env(safe-area-inset-bottom)
                    );

            }


            .gallery-container {

                min-height: 390px;

                padding: 10px;

            }


            .gallery-image {

                width: 92%;

                height: 92%;

                max-height: 390px;

            }

        }


        /* =====================================================
        SMALL PHONES
        ====================================================== */

        @media (max-width: 374px) {

            .mobile-container {

                padding-left:
                    .75rem !important;

                padding-right:
                    .75rem !important;

            }


            .product-card {

                border-radius:
                    22px !important;

                padding:
                    1rem !important;

            }


            .gallery-container {

                min-height:
                    340px;

            }


            .small-phone-title {

                font-size:
                    1.55rem !important;

                line-height:
                    1.25 !important;

            }


            .small-phone-price {

                font-size:
                    1.8rem !important;

            }


            .quantity-wrapper {

                width:
                    108px !important;

            }


            .quantity-wrapper button {

                width:
                    34px !important;

                height:
                    34px !important;

            }


            .benefits-grid {

                grid-template-columns:
                    1fr !important;

            }


            .benefit-item {

                display:
                    flex;

                align-items:
                    center;

                gap:
                    .75rem;

                text-align:
                    right !important;

            }


            .benefit-item div {

                margin-top:
                    0 !important;

            }

        }


        /* =====================================================
        TABLET
        ====================================================== */

        @media (min-width: 768px)
        and (max-width: 1279px) {

            .gallery-container {

                min-height:
                    500px;

            }


            .gallery-image {

                width:
                    88%;

                height:
                    88%;

                max-height:
                    520px;

            }

        }


        /* =====================================================
        LARGE DESKTOP
        ====================================================== */

        @media (min-width: 1280px) {

            .gallery-container {

                min-height:
                    560px;

            }


            .gallery-image {

                width:
                    84%;

                height:
                    84%;

                max-width:
                    760px;

                max-height:
                    620px;

            }

        }


        @media (min-width: 1536px) {

            .page-container {

                max-width:
                    1600px !important;

            }


            .gallery-container {

                min-height:
                    580px;

            }


            .gallery-image {

                width:
                    82%;

                height:
                    82%;

            }

        }


        @media (min-width: 1920px) {

            .page-container {

                max-width:
                    1750px !important;

            }


            .main-product-grid {

                gap:
                    5rem !important;

            }


            .gallery-container {

                min-height:
                    620px;

            }

        }

    </style>

</head>


<body class="min-h-screen antialiased">


<!-- =========================================================
HEADER
========================================================== -->

<header
    class="sticky top-0 z-[80] border-b border-slate-200/60 glass"
>

    <div
        class="page-container max-w-[1500px] mx-auto px-3 sm:px-6 lg:px-8"
    >

        <div
            class="h-[68px] sm:h-[76px] flex items-center justify-between gap-3"
        >

            <a
                href="#"
                class="flex items-center gap-2 sm:gap-3 min-w-0"
            >

                <div
                    class="w-10 h-10 sm:w-11 sm:h-11 flex-none rounded-xl sm:rounded-2xl bg-brand-50 border border-brand-200/70 flex items-center justify-center text-brand-700"
                >

                    <i class="fa-solid fa-couch"></i>

                </div>


                <div class="min-w-0">

                    <div
                        class="text-[18px] sm:text-[21px] font-black text-slate-950 leading-none"
                    >
                        صنعة
                    </div>

                    <div
                        class="text-[8px] sm:text-[10px] text-brand-700 font-bold mt-1 whitespace-nowrap"
                    >
                        عام الحرف اليدوية
                    </div>

                </div>

            </a>


            <!-- DESKTOP NAV -->

            <nav
                class="hidden lg:flex items-center gap-6 xl:gap-8"
            >

                <a
                    href="#"
                    class="text-sm font-semibold text-slate-500 hover:text-brand-700 transition"
                >
                    الرئيسية
                </a>

                <a
                    href="#"
                    class="text-sm font-semibold text-slate-500 hover:text-brand-700 transition"
                >
                    الأثاث
                </a>

                <a
                    href="#"
                    class="text-sm font-semibold text-slate-500 hover:text-brand-700 transition"
                >
                    غرف المعيشة
                </a>

                <a
                    href="#"
                    class="text-sm font-semibold text-slate-500 hover:text-brand-700 transition"
                >
                    العروض
                </a>

            </nav>


            <!-- HEADER ACTIONS -->

            <div class="flex items-center gap-1">

                <button
                    type="button"
                    aria-label="البحث"
                    class="hidden sm:flex w-10 h-10 rounded-full items-center justify-center text-slate-600 hover:bg-slate-100 hover:text-brand-700 transition"
                >

                    <i class="fa-solid fa-magnifying-glass"></i>

                </button>


                <button
                    type="button"
                    aria-label="المفضلة"
                    class="hidden sm:flex w-10 h-10 rounded-full items-center justify-center text-slate-600 hover:bg-slate-100 hover:text-rose-500 transition"
                >

                    <i class="fa-regular fa-heart"></i>

                </button>


                <button
                    type="button"
                    onclick="openCart()"
                    aria-label="السلة"
                    class="relative w-10 h-10 sm:w-11 sm:h-11 rounded-full flex items-center justify-center text-slate-700 hover:bg-brand-50 hover:text-brand-700 transition"
                >

                    <i class="fa-solid fa-bag-shopping"></i>

                    <span
                        id="cart-count"
                        class="absolute -top-0.5 -right-0.5 min-w-[19px] h-[19px] px-1 rounded-full bg-brand-700 text-white text-[9px] font-black flex items-center justify-center border-2 border-white"
                    >
                        0
                    </span>

                </button>

            </div>

        </div>

    </div>

</header>


<!-- =========================================================
BREADCRUMB
========================================================== -->

<div
    class="page-container max-w-[1500px] mx-auto px-3 sm:px-6 lg:px-8"
>

    <div
        class="flex items-center gap-2 py-4 sm:py-5 text-[10px] sm:text-xs text-slate-400 font-medium overflow-hidden whitespace-nowrap"
    >

        <a
            href="#"
            class="hover:text-brand-700 transition"
        >
            الرئيسية
        </a>

        <i class="fa-solid fa-chevron-left text-[7px]"></i>

        <a
            href="#"
            class="hover:text-brand-700 transition"
        >
            الأثاث
        </a>

        <i class="fa-solid fa-chevron-left text-[7px]"></i>

        <span class="text-slate-700 font-bold truncate">

            <?= htmlspecialchars($productName) ?>

        </span>

    </div>

</div>


<!-- =========================================================
MAIN
========================================================== -->

<main
    class="page-container max-w-[1500px] mx-auto mobile-container px-3 sm:px-6 lg:px-8 pb-14 sm:pb-20"
>

    <div
        class="main-product-grid grid grid-cols-1 xl:grid-cols-[minmax(0,1.2fr)_minmax(370px,.8fr)] gap-7 lg:gap-10 xl:gap-14 items-start"
    >


        <!-- =================================================
        GALLERY
        ================================================== -->

        <section class="fade-up min-w-0">

            <div class="gallery-container">

                <img
                    id="main-sofa-img"
                    src="<?= htmlspecialchars($images['emerald']) ?>"
                    alt="<?= htmlspecialchars($productName) ?>"
                    class="gallery-image"
                    loading="eager"
                >


                <!-- COLOR BADGE + FAVORITE -->

                <div
                    class="absolute top-3 sm:top-4 left-3 sm:left-4 right-3 sm:right-4 flex items-start justify-between gap-2 pointer-events-none"
                >

                    <div
                        class="pointer-events-auto max-w-[70%] px-3 sm:px-4 py-2 rounded-full bg-white/90 backdrop-blur-xl border border-white/70 shadow-soft flex items-center gap-2"
                    >

                        <span
                            class="w-2 h-2 rounded-full bg-emerald-500"
                        ></span>

                        <span
                            id="badge-color"
                            class="text-[10px] sm:text-xs font-bold text-slate-800 truncate"
                        >
                            أخضر زمردي
                        </span>

                    </div>


                    <button
                        type="button"
                        onclick="toggleFavorite(this)"
                        aria-label="إضافة للمفضلة"
                        class="pointer-events-auto w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-white/90 backdrop-blur-xl border border-white/70 shadow-soft flex items-center justify-center text-slate-700 hover:text-rose-500 transition"
                    >

                        <i class="fa-regular fa-heart"></i>

                    </button>

                </div>


                <!-- IMAGE CONTROLS -->

                <div
                    class="absolute bottom-3 sm:bottom-4 left-3 sm:left-4 right-3 sm:right-4 flex items-end justify-between gap-2"
                >

                    <div
                        class="px-3 py-1.5 rounded-full bg-black/45 backdrop-blur-md text-white text-[9px] sm:text-[11px] font-bold"
                    >

                        <span id="image-index">
                            01
                        </span>

                        <span class="opacity-50 mx-1">
                            /
                        </span>

                        <span>
                            04
                        </span>

                    </div>


                    <button
                        type="button"
                        onclick="openImageViewer()"
                        class="h-9 sm:h-10 px-3 sm:px-4 rounded-full bg-white/90 backdrop-blur-xl text-slate-800 text-[9px] sm:text-xs font-bold flex items-center gap-2 shadow-soft hover:bg-white transition"
                    >

                        <i class="fa-solid fa-expand"></i>

                        تكبير الصورة

                    </button>

                </div>

            </div>


            <!-- THUMBNAILS -->

            <div
                class="mt-4 flex items-center gap-2.5 sm:gap-3 overflow-x-auto hide-scrollbar pb-1"
            >

                <?php foreach ($gallery as $index => $item): ?>

                    <button
                        type="button"
                        onclick="updateMainImage(
                            '<?= htmlspecialchars($item['src'], ENT_QUOTES) ?>',
                            this,
                            '<?= $item['index'] ?>'
                        )"
                        class="thumb-btn flex-none w-[72px] h-[72px] sm:w-[90px] sm:h-[90px] rounded-xl sm:rounded-2xl overflow-hidden border-2 <?= $index === 0 ? 'thumb-active' : 'border-slate-200' ?> bg-white transition hover:border-brand-500"
                    >

                        <img
                            src="<?= htmlspecialchars($item['src']) ?>"
                            alt="<?= htmlspecialchars($productName) ?>"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >

                    </button>

                <?php endforeach; ?>

            </div>


            <!-- BENEFITS -->

            <div
                class="hidden md:grid grid-cols-3 gap-3 mt-5"
            >

                <div
                    class="bg-white rounded-2xl border border-slate-200/70 p-4"
                >

                    <i
                        class="fa-solid fa-truck-fast text-brand-600"
                    ></i>

                    <div class="mt-3">

                        <div
                            class="text-xs font-black text-slate-900"
                        >
                            توصيل آمن
                        </div>

                        <div
                            class="text-[10px] text-slate-400 mt-1"
                        >
                            تغليف احترافي
                        </div>

                    </div>

                </div>


                <div
                    class="bg-white rounded-2xl border border-slate-200/70 p-4"
                >

                    <i
                        class="fa-solid fa-shield-halved text-brand-600"
                    ></i>

                    <div class="mt-3">

                        <div
                            class="text-xs font-black text-slate-900"
                        >
                            ضمان موثوق
                        </div>

                        <div
                            class="text-[10px] text-slate-400 mt-1"
                        >
                            حتى 10 سنوات
                        </div>

                    </div>

                </div>


                <div
                    class="bg-white rounded-2xl border border-slate-200/70 p-4"
                >

                    <i
                        class="fa-solid fa-hand-sparkles text-brand-600"
                    ></i>

                    <div class="mt-3">

                        <div
                            class="text-xs font-black text-slate-900"
                        >
                            صناعة يدوية
                        </div>

                        <div
                            class="text-[10px] text-slate-400 mt-1"
                        >
                            عناية بكل التفاصيل
                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =================================================
        PRODUCT INFORMATION
        ================================================== -->

        <section
            class="fade-up delay-1 min-w-0 xl:sticky xl:top-[100px]"
        >

            <div
                class="product-card rounded-[24px] sm:rounded-[30px] border border-slate-200/70 p-4 sm:p-6 lg:p-7 shadow-luxury"
            >

                <div class="flex items-center justify-between gap-3">

                    <div class="flex items-center gap-2">

                        <span
                            class="w-2 h-2 rounded-full bg-brand-600"
                        ></span>

                        <span
                            class="text-[10px] sm:text-xs font-bold text-brand-700"
                        >
                            أثاث فاخر
                        </span>

                    </div>


                    <span
                        class="text-[9px] sm:text-[10px] text-slate-400"
                    >
                        SKU: SOFA-001
                    </span>

                </div>


                <h1
                    class="small-phone-title text-3xl sm:text-4xl lg:text-[44px] font-black tracking-tight leading-[1.2] text-slate-950 mt-5"
                >

                    <?= htmlspecialchars($productName) ?>

                </h1>


                <p
                    class="text-xs sm:text-sm text-slate-500 leading-7 mt-4"
                >

                    قطعة تجمع بين الراحة والفخامة، مصممة بعناية لتمنح غرفة المعيشة طابعًا راقيًا ومميزًا.

                </p>


                <!-- RATING -->

                <div
                    class="flex items-center flex-wrap gap-3 mt-5"
                >

                    <div
                        class="flex items-center gap-1 text-brand-500"
                    >

                        <?php for ($i = 0; $i < 5; $i++): ?>

                            <i
                                class="fa-solid fa-star text-[11px]"
                            ></i>

                        <?php endfor; ?>

                    </div>


                    <span
                        class="text-xs font-black text-slate-800"
                    >
                        4.9
                    </span>


                    <span
                        class="text-[10px] text-slate-400"
                    >
                        (48 تقييم)
                    </span>

                </div>


                <!-- PRICE -->

                <div class="mt-6 sm:mt-7">

                    <div
                        class="flex items-end gap-3 flex-wrap"
                    >

                        <span
                            class="small-phone-price text-3xl sm:text-4xl font-black text-brand-700"
                        >

                            <?= number_format($productPrice) ?>

                            <span class="text-sm font-bold">
                                ج.م
                            </span>

                        </span>


                        <span
                            class="text-sm sm:text-base text-slate-400 line-through font-semibold"
                        >

                            <?= number_format($productOldPrice) ?>

                            ج.م

                        </span>


                        <span
                            class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[9px] sm:text-[10px] font-black"
                        >

                            وفر
                            <?= number_format($productSaving) ?>
                            ج.م

                        </span>

                    </div>

                </div>


                <!-- COLOR -->

                <div
                    class="mt-6 sm:mt-7 pt-5 sm:pt-6 border-t border-slate-200/80"
                >

                    <div
                        class="flex items-center justify-between gap-3 mb-4"
                    >

                        <div>

                            <span
                                class="block text-sm font-black text-slate-900"
                            >
                                اللون
                            </span>

                            <span
                                id="color-name"
                                class="block text-[11px] sm:text-xs text-slate-500 mt-1"
                            >
                                أخضر زمردي
                            </span>

                        </div>


                        <span
                            class="hidden sm:block text-[10px] font-bold text-slate-400"
                        >
                            اختر المفضل لديك
                        </span>

                    </div>


                    <div
                        class="flex items-center gap-4 flex-wrap"
                    >

                        <?php foreach ($colors as $index => $color): ?>

                            <button
                                type="button"
                                onclick="changeColor(
                                    '<?= htmlspecialchars($color['name'], ENT_QUOTES) ?>',
                                    '<?= htmlspecialchars($color['image'], ENT_QUOTES) ?>',
                                    this
                                )"
                                title="<?= htmlspecialchars($color['name']) ?>"
                                aria-label="<?= htmlspecialchars($color['name']) ?>"
                                class="swatch-btn relative w-9 h-9 sm:w-10 sm:h-10 rounded-full transition hover:scale-110"
                                style="background-color: <?= htmlspecialchars($color['hex']) ?>;"
                            >

                                <?php if ($index === 0): ?>

                                    <span
                                        class="color-check absolute inset-0 flex items-center justify-center text-white text-[10px]"
                                    >

                                        <i class="fa-solid fa-check"></i>

                                    </span>

                                <?php endif; ?>

                            </button>

                        <?php endforeach; ?>

                    </div>

                </div>


                <!-- QUANTITY + ADD TO CART -->

                <div
                    class="mt-6 sm:mt-7 grid grid-cols-[108px_minmax(0,1fr)] sm:grid-cols-[120px_minmax(0,1fr)] gap-2.5 sm:gap-3"
                >

                    <div
                        class="quantity-wrapper h-[54px] sm:h-[56px] rounded-xl sm:rounded-2xl bg-white border border-slate-200 flex items-center justify-between px-1"
                    >

                        <button
                            type="button"
                            onclick="adjustQuantity(-1)"
                            class="quantity-button w-9 h-9 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-700 flex items-center justify-center"
                        >

                            <i
                                class="fa-solid fa-minus text-[9px]"
                            ></i>

                        </button>


                        <span
                            id="qty-value"
                            class="text-xs sm:text-sm font-black text-slate-900"
                        >
                            1
                        </span>


                        <button
                            type="button"
                            onclick="adjustQuantity(1)"
                            class="quantity-button w-9 h-9 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-700 flex items-center justify-center"
                        >

                            <i
                                class="fa-solid fa-plus text-[9px]"
                            ></i>

                        </button>

                    </div>


                    <button
                        type="button"
                        onclick="addToCart()"
                        class="shine-button h-[54px] sm:h-[56px] rounded-xl sm:rounded-2xl bg-brand-700 hover:bg-brand-800 text-white font-black text-[11px] sm:text-sm shadow-lg shadow-brand-700/20 transition active:scale-[.98] flex items-center justify-center gap-2 sm:gap-3"
                    >

                        <i class="fa-solid fa-bag-shopping"></i>

                        <span>
                            إضافة إلى السلة
                        </span>

                    </button>

                </div>


                <!-- BUY NOW -->

                <button
                    type="button"
                    onclick="buyNow()"
                    class="mt-2.5 w-full h-[50px] sm:h-[52px] rounded-xl sm:rounded-2xl bg-slate-950 hover:bg-slate-800 text-white font-black text-xs sm:text-sm transition active:scale-[.98]"
                >
                    شراء الآن
                </button>


                <!-- DELIVERY -->

                <div
                    class="mt-5 sm:mt-7 rounded-xl sm:rounded-2xl bg-[#f4f1eb] border border-brand-100 p-3 sm:p-4"
                >

                    <div class="flex items-start gap-3">

                        <div
                            class="w-9 h-9 sm:w-10 sm:h-10 flex-none rounded-xl bg-white text-brand-700 flex items-center justify-center"
                        >

                            <i class="fa-solid fa-truck-fast"></i>

                        </div>


                        <div>

                            <div
                                class="text-[11px] sm:text-xs font-black text-slate-900"
                            >
                                التوصيل المتوقع
                            </div>

                            <div
                                class="text-[10px] sm:text-xs text-slate-500 mt-1 leading-5"
                            >
                                خلال 5 - 8 أيام عمل إلى القاهرة والجيزة
                            </div>

                        </div>

                    </div>

                </div>


                <!-- BENEFITS -->

                <div
                    class="benefits-grid grid grid-cols-3 gap-2 mt-4"
                >

                    <div
                        class="benefit-item rounded-xl sm:rounded-2xl bg-white border border-slate-200/70 p-2.5 sm:p-3 text-center"
                    >

                        <i
                            class="fa-solid fa-shield-halved text-brand-700 text-xs sm:text-sm"
                        ></i>

                        <div
                            class="mt-2 text-[9px] sm:text-[10px] font-black text-slate-800"
                        >
                            ضمان 10 سنوات
                        </div>

                    </div>


                    <div
                        class="benefit-item rounded-xl sm:rounded-2xl bg-white border border-slate-200/70 p-2.5 sm:p-3 text-center"
                    >

                        <i
                            class="fa-solid fa-rotate-left text-brand-700 text-xs sm:text-sm"
                        ></i>

                        <div
                            class="mt-2 text-[9px] sm:text-[10px] font-black text-slate-800"
                        >
                            إرجاع 14 يوم
                        </div>

                    </div>


                    <div
                        class="benefit-item rounded-xl sm:rounded-2xl bg-white border border-slate-200/70 p-2.5 sm:p-3 text-center"
                    >

                        <i
                            class="fa-solid fa-lock text-brand-700 text-xs sm:text-sm"
                        ></i>

                        <div
                            class="mt-2 text-[9px] sm:text-[10px] font-black text-slate-800"
                        >
                            دفع آمن
                        </div>

                    </div>

                </div>

            </div>


            <!-- ABOUT PRODUCT -->

            <div
                class="mt-3 sm:mt-4 rounded-[22px] sm:rounded-[28px] bg-white border border-slate-200/70 p-4 sm:p-6 shadow-soft"
            >

                <div
                    class="flex items-center justify-between gap-3"
                >

                    <h2
                        class="text-sm font-black text-slate-950"
                    >
                        عن المنتج
                    </h2>

                    <i
                        class="fa-solid fa-feather-pointed text-brand-600"
                    ></i>

                </div>


                <p
                    class="text-[11px] sm:text-xs md:text-sm leading-7 text-slate-500 mt-3 sm:mt-4"
                >

                    مصممة بأعلى معايير الحرفية اليدوية باستخدام القماش المخملي الفاخر المقاوم للبقع وخشب الزان الطبيعي، لتضيف لمسة راقية ومريحة إلى غرفة المعيشة مع الحفاظ على المتانة للاستخدام اليومي.

                </p>

            </div>

        </section>

    </div>


    <!-- =====================================================
    BRAND VALUES
    ====================================================== -->

    <section class="mt-12 sm:mt-20 lg:mt-24">

        <div
            class="rounded-[24px] sm:rounded-[32px] bg-slate-950 text-white overflow-hidden relative"
        >

            <div
                class="absolute -top-32 -right-32 w-72 sm:w-80 h-72 sm:h-80 rounded-full bg-brand-700/20 blur-3xl pointer-events-none"
            ></div>


            <div
                class="absolute -bottom-32 -left-32 w-72 sm:w-80 h-72 sm:h-80 rounded-full bg-brand-400/10 blur-3xl pointer-events-none"
            ></div>


            <div
                class="relative grid grid-cols-1 md:grid-cols-3"
            >

                <div
                    class="p-6 sm:p-8 lg:p-9 border-b md:border-b-0 md:border-l border-white/10"
                >

                    <i class="fa-solid fa-gem text-brand-300"></i>

                    <h3
                        class="text-sm font-black mt-4"
                    >
                        خامات فاخرة
                    </h3>

                    <p
                        class="text-[11px] sm:text-xs text-white/45 leading-6 mt-2"
                    >
                        نختار الخامات بعناية لنقدم لك منتجًا يعيش معك لسنوات.
                    </p>

                </div>


                <div
                    class="p-6 sm:p-8 lg:p-9 border-b md:border-b-0 md:border-l border-white/10"
                >

                    <i class="fa-solid fa-hands text-brand-300"></i>

                    <h3
                        class="text-sm font-black mt-4"
                    >
                        صناعة بحب
                    </h3>

                    <p
                        class="text-[11px] sm:text-xs text-white/45 leading-6 mt-2"
                    >
                        كل قطعة تمر عبر أيادي حرفيين يهتمون بأدق التفاصيل.
                    </p>

                </div>


                <div
                    class="p-6 sm:p-8 lg:p-9"
                >

                    <i class="fa-solid fa-headset text-brand-300"></i>

                    <h3
                        class="text-sm font-black mt-4"
                    >
                        خدمة مميزة
                    </h3>

                    <p
                        class="text-[11px] sm:text-xs text-white/45 leading-6 mt-2"
                    >
                        فريقنا جاهز لمساعدتك قبل وبعد شراء قطعتك الجديدة.
                    </p>

                </div>

            </div>

        </div>

    </section>

</main>


<!-- =========================================================
CART OVERLAY
========================================================== -->

<div
    id="drawer-overlay"
    onclick="closeCart()"
    class="drawer-overlay fixed inset-0 bg-slate-950/40 backdrop-blur-[2px] z-[90]"
></div>


<!-- =========================================================
CART DRAWER
========================================================== -->

<aside
    id="cart-drawer"
    class="cart-drawer fixed top-0 right-0 z-[100] h-[100dvh] w-full sm:w-[430px] bg-white shadow-2xl flex flex-col"
>

    <div
        class="min-h-[68px] sm:h-[76px] flex items-center justify-between px-4 sm:px-6 border-b border-slate-200"
    >

        <div>

            <div
                class="text-base sm:text-lg font-black text-slate-950"
            >
                حقيبتك
            </div>

            <div
                id="drawer-subtitle"
                class="text-[9px] sm:text-[10px] text-slate-400 mt-0.5"
            >
                لا توجد منتجات
            </div>

        </div>


        <button
            type="button"
            onclick="closeCart()"
            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-700 transition"
        >

            <i class="fa-solid fa-xmark"></i>

        </button>

    </div>


    <!-- CART CONTENT -->

    <div
        id="cart-content"
        class="flex-1 overflow-y-auto p-4 sm:p-6"
    >

        <!-- EMPTY -->

        <div
            id="empty-cart"
            class="h-full flex flex-col items-center justify-center text-center"
        >

            <div
                class="w-20 h-20 rounded-full bg-brand-50 text-brand-700 flex items-center justify-center text-2xl"
            >

                <i class="fa-solid fa-bag-shopping"></i>

            </div>


            <h3
                class="text-sm font-black text-slate-900 mt-5"
            >
                حقيبتك فارغة
            </h3>


            <p
                class="text-xs text-slate-400 mt-2"
            >
                أضف منتجًا للبدء.
            </p>

        </div>


        <!-- CART PRODUCT -->

        <div
            id="cart-product"
            class="hidden"
        >

            <div
                class="flex gap-3 sm:gap-4 pb-5 sm:pb-6 border-b border-slate-200"
            >

                <img
                    id="cart-product-image"
                    src="<?= htmlspecialchars($images['emerald']) ?>"
                    alt="<?= htmlspecialchars($productName) ?>"
                    class="w-[76px] h-[76px] sm:w-24 sm:h-24 flex-none rounded-xl sm:rounded-2xl object-cover bg-slate-100"
                >


                <div class="flex-1 min-w-0">

                    <div
                        class="text-xs sm:text-sm font-black text-slate-900 leading-5"
                    >
                        <?= htmlspecialchars($productName) ?>
                    </div>


                    <div
                        id="cart-product-color"
                        class="text-[10px] sm:text-[11px] text-slate-400 mt-1"
                    >
                        أخضر زمردي
                    </div>


                    <div
                        class="flex items-center justify-between gap-2 mt-3 sm:mt-4"
                    >

                        <div
                            class="text-xs sm:text-sm font-black text-brand-700"
                        >

                            <?= number_format($productPrice) ?>

                            ج.م

                        </div>


                        <div
                            class="flex items-center gap-1 sm:gap-2 bg-slate-100 rounded-xl p-1"
                        >

                            <button
                                type="button"
                                onclick="adjustQuantity(-1)"
                                class="w-7 h-7 rounded-lg hover:bg-white flex items-center justify-center"
                            >

                                <i class="fa-solid fa-minus text-[8px]"></i>

                            </button>


                            <span
                                id="drawer-qty"
                                class="text-xs font-black min-w-[18px] text-center"
                            >
                                1
                            </span>


                            <button
                                type="button"
                                onclick="adjustQuantity(1)"
                                class="w-7 h-7 rounded-lg hover:bg-white flex items-center justify-center"
                            >

                                <i class="fa-solid fa-plus text-[8px]"></i>

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- CART SUMMARY -->

    <div
        id="cart-summary"
        class="hidden border-t border-slate-200 p-4 sm:p-6 safe-bottom"
    >

        <div
            class="flex items-center justify-between text-sm"
        >

            <span class="text-slate-500">
                الإجمالي الفرعي
            </span>


            <strong
                id="cart-subtotal"
                class="text-slate-950"
            >
                <?= number_format($productPrice) ?>
                ج.م
            </strong>

        </div>


        <div
            class="flex items-center justify-between text-xs mt-2"
        >

            <span class="text-slate-400">
                التوصيل
            </span>

            <span
                class="text-emerald-600 font-bold"
            >
                مجاني
            </span>

        </div>


        <button
            type="button"
            class="w-full h-14 mt-5 rounded-xl sm:rounded-2xl bg-brand-700 hover:bg-brand-800 text-white font-black text-xs sm:text-sm transition"
        >
            إتمام الطلب
        </button>

    </div>

</aside>


<!-- =========================================================
IMAGE VIEWER
========================================================== -->

<div
    id="image-viewer"
    class="hidden fixed inset-0 z-[120] bg-slate-950/90 backdrop-blur-md items-center justify-center p-3 sm:p-6"
>

    <button
        type="button"
        onclick="closeImageViewer()"
        class="absolute top-3 right-3 sm:top-5 sm:right-5 w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition z-10"
    >

        <i class="fa-solid fa-xmark"></i>

    </button>


    <img
        id="viewer-image"
        src="<?= htmlspecialchars($images['emerald']) ?>"
        alt="<?= htmlspecialchars($productName) ?>"
        class="max-w-full max-h-[88vh] object-contain rounded-xl sm:rounded-2xl shadow-2xl"
    >

</div>


<!-- =========================================================
TOAST
========================================================== -->

<div
    id="toast"
    class="fixed left-1/2 bottom-5 sm:bottom-6 z-[150] -translate-x-1/2 translate-y-24 opacity-0 pointer-events-none transition-all duration-300 bg-slate-950 text-white rounded-xl sm:rounded-2xl px-4 sm:px-5 py-3 sm:py-3.5 shadow-2xl flex items-center gap-2.5 sm:gap-3 text-[10px] sm:text-xs font-bold whitespace-nowrap max-w-[calc(100vw-24px)]"
>

    <span
        class="w-7 h-7 rounded-full bg-emerald-500 flex items-center justify-center flex-none"
    >

        <i class="fa-solid fa-check text-[10px]"></i>

    </span>


    <span id="toast-message">
        تمت الإضافة إلى السلة
    </span>

</div>


<!-- =========================================================
MOBILE BUY BAR
========================================================== -->

<div
    id="mobile-buy-bar"
    class="mobile-buy-bar fixed bottom-0 left-0 right-0 z-[70] bg-white/95 backdrop-blur-xl border-t border-slate-200 px-3 pt-2.5 md:hidden safe-bottom"
>

    <div
        class="flex items-center gap-2.5"
    >

        <div class="flex-1 min-w-0">

            <div
                class="text-[9px] text-slate-400"
            >
                السعر
            </div>

            <div
                class="text-sm sm:text-base font-black text-slate-950 truncate"
            >

                <?= number_format($productPrice) ?>

                ج.م

            </div>

        </div>


        <button
            type="button"
            onclick="addToCart()"
            class="h-11 sm:h-12 px-4 sm:px-6 rounded-xl bg-brand-700 text-white font-black text-[10px] sm:text-xs shadow-lg shadow-brand-700/20 flex-none"
        >
            إضافة للسلة
        </button>

    </div>

</div>


<!-- =========================================================
JAVASCRIPT
========================================================== -->

<script>

    let currentQty = 1;

    let currentColor = "أخضر زمردي";

    let currentImage =
        "<?= htmlspecialchars($images['emerald'], ENT_QUOTES) ?>";

    let cartCount = 0;

    let toastTimer;


    /* =====================================================
    CHANGE COLOR
    ====================================================== */

    function changeColor(
        colorName,
        imageSrc,
        element
    ) {

        currentColor = colorName;

        currentImage = imageSrc;


        const image =
            document.getElementById(
                "main-sofa-img"
            );


        image.style.opacity = "0";


        setTimeout(() => {

            image.src = imageSrc;

            image.style.opacity = "1";

        }, 180);


        document.getElementById(
            "color-name"
        ).innerText = colorName;


        document.getElementById(
            "badge-color"
        ).innerText = colorName;


        document
            .querySelectorAll(".swatch-btn")
            .forEach(btn => {

                btn.classList.remove(
                    "swatch-active"
                );


                const check =
                    btn.querySelector(
                        ".color-check"
                    );


                if (check) {

                    check.remove();

                }

            });


        element.classList.add(
            "swatch-active"
        );


        const check =
            document.createElement(
                "span"
            );


        check.className =
            "color-check absolute inset-0 flex items-center justify-center text-white text-[10px]";


        check.innerHTML =
            '<i class="fa-solid fa-check"></i>';


        element.appendChild(check);


        updateCartProduct();

    }


    /* =====================================================
    UPDATE MAIN IMAGE
    ====================================================== */

    function updateMainImage(
        imageSrc,
        element,
        index = "01"
    ) {

        currentImage = imageSrc;


        const image =
            document.getElementById(
                "main-sofa-img"
            );


        image.style.opacity = ".35";


        setTimeout(() => {

            image.src = imageSrc;

            image.style.opacity = "1";

        }, 120);


        document
            .querySelectorAll(".thumb-btn")
            .forEach(btn => {

                btn.classList.remove(
                    "thumb-active"
                );

            });


        element.classList.add(
            "thumb-active"
        );


        document.getElementById(
            "image-index"
        ).innerText = index;


        document.getElementById(
            "viewer-image"
        ).src = imageSrc;

    }


    /* =====================================================
    QUANTITY
    ====================================================== */

    function adjustQuantity(amount) {

        currentQty =
            Math.max(
                1,
                currentQty + amount
            );


        document.getElementById(
            "qty-value"
        ).innerText = currentQty;


        document.getElementById(
            "drawer-qty"
        ).innerText = currentQty;


        if (cartCount > 0) {

            cartCount = currentQty;

            document.getElementById(
                "cart-count"
            ).innerText = cartCount;

        }


        updateCartSummary();

    }


    /* =====================================================
    ADD TO CART
    ====================================================== */

    function addToCart() {

        cartCount = currentQty;


        document.getElementById(
            "cart-count"
        ).innerText = cartCount;


        updateCartProduct();

        updateCartSummary();


        showToast(
            "تمت إضافة المنتج إلى حقيبتك"
        );

    }


    /* =====================================================
    UPDATE CART PRODUCT
    ====================================================== */

    function updateCartProduct() {

        document.getElementById(
            "cart-product-image"
        ).src = currentImage;


        document.getElementById(
            "cart-product-color"
        ).innerText = currentColor;


        document.getElementById(
            "drawer-qty"
        ).innerText = currentQty;

    }


    /* =====================================================
    CART SUMMARY
    ====================================================== */

    function updateCartSummary() {

        const emptyCart =
            document.getElementById(
                "empty-cart"
            );


        const cartProduct =
            document.getElementById(
                "cart-product"
            );


        const summary =
            document.getElementById(
                "cart-summary"
            );


        const subtitle =
            document.getElementById(
                "drawer-subtitle"
            );


        if (cartCount <= 0) {

            emptyCart.classList.remove(
                "hidden"
            );


            cartProduct.classList.add(
                "hidden"
            );


            summary.classList.add(
                "hidden"
            );


            subtitle.innerText =
                "لا توجد منتجات";


            return;

        }


        emptyCart.classList.add(
            "hidden"
        );


        cartProduct.classList.remove(
            "hidden"
        );


        summary.classList.remove(
            "hidden"
        );


        subtitle.innerText =
            `${cartCount} منتج في الحقيبة`;


        const total =
            <?= $productPrice ?> *
            currentQty;


        document.getElementById(
            "cart-subtotal"
        ).innerText =
            total.toLocaleString(
                "ar-EG"
            ) + " ج.م";


        document.getElementById(
            "drawer-qty"
        ).innerText =
            currentQty;

    }


    /* =====================================================
    OPEN CART
    ====================================================== */

    function openCart() {

        updateCartSummary();


        document
            .getElementById(
                "cart-drawer"
            )
            .classList.add(
                "active"
            );


        document
            .getElementById(
                "drawer-overlay"
            )
            .classList.add(
                "active"
            );


        document.body.style.overflow =
            "hidden";

    }


    /* =====================================================
    CLOSE CART
    ====================================================== */

    function closeCart() {

        document
            .getElementById(
                "cart-drawer"
            )
            .classList.remove(
                "active"
            );


        document
            .getElementById(
                "drawer-overlay"
            )
            .classList.remove(
                "active"
            );


        const viewer =
            document.getElementById(
                "image-viewer"
            );


        if (
            viewer.classList.contains(
                "hidden"
            )
        ) {

            document.body.style.overflow =
                "";

        }

    }


    /* =====================================================
    FAVORITE
    ====================================================== */

    function toggleFavorite(button) {

        const icon =
            button.querySelector("i");


        button.classList.toggle(
            "text-rose-500"
        );


        button.classList.toggle(
            "bg-rose-50"
        );


        button.classList.toggle(
            "border-rose-200"
        );


        if (
            icon.classList.contains(
                "fa-regular"
            )
        ) {

            icon.classList.remove(
                "fa-regular"
            );

            icon.classList.add(
                "fa-solid"
            );

        } else {

            icon.classList.remove(
                "fa-solid"
            );

            icon.classList.add(
                "fa-regular"
            );

        }

    }


    /* =====================================================
    BUY NOW
    ====================================================== */

    function buyNow() {

        addToCart();


        setTimeout(() => {

            openCart();

        }, 250);

    }


    /* =====================================================
    TOAST
    ====================================================== */

    function showToast(message) {

        const toast =
            document.getElementById(
                "toast"
            );


        document.getElementById(
            "toast-message"
        ).innerText = message;


        clearTimeout(
            toastTimer
        );


        toast.classList.remove(
            "translate-y-24",
            "opacity-0"
        );


        toastTimer =
            setTimeout(() => {

                toast.classList.add(
                    "translate-y-24",
                    "opacity-0"
                );

            }, 2600);

    }


    /* =====================================================
    IMAGE VIEWER
    ====================================================== */

    function openImageViewer() {

        const viewer =
            document.getElementById(
                "image-viewer"
            );


        document.getElementById(
            "viewer-image"
        ).src =
            currentImage;


        viewer.classList.remove(
            "hidden"
        );


        viewer.classList.add(
            "flex"
        );


        document.body.style.overflow =
            "hidden";

    }


    /* =====================================================
    CLOSE IMAGE VIEWER
    ====================================================== */

    function closeImageViewer() {

        const viewer =
            document.getElementById(
                "image-viewer"
            );


        viewer.classList.add(
            "hidden"
        );


        viewer.classList.remove(
            "flex"
        );


        const cart =
            document.getElementById(
                "cart-drawer"
            );


        if (
            !cart.classList.contains(
                "active"
            )
        ) {

            document.body.style.overflow =
                "";

        }

    }


    /* =====================================================
    ESC KEY
    ====================================================== */

    document.addEventListener(
        "keydown",
        function(event) {

            if (
                event.key === "Escape"
            ) {

                closeCart();

                closeImageViewer();

            }

        }
    );


    /* =====================================================
    MOBILE BUY BAR
    ====================================================== */

    window.addEventListener(
        "scroll",
        function() {

            const bar =
                document.getElementById(
                    "mobile-buy-bar"
                );


            if (
                window.innerWidth >= 768
            ) {

                bar.classList.remove(
                    "visible"
                );

                return;

            }


            if (
                window.scrollY > 500
            ) {

                bar.classList.add(
                    "visible"
                );

            } else {

                bar.classList.remove(
                    "visible"
                );

            }

        }
    );


    /* =====================================================
    IMAGE ERROR FALLBACK
    ====================================================== */

    document
        .querySelectorAll("img")
        .forEach(img => {

            img.addEventListener(
                "error",
                function() {

                    this.style.opacity =
                        ".45";

                }
            );

        });


    /* =====================================================
    INITIALIZE
    ====================================================== */

    updateCartSummary();

</script>


</body>

</html>