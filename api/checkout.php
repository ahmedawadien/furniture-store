<?php
declare(strict_types=1);
session_start();

/*
|--------------------------------------------------------------------------
| صنعة - Responsive Checkout
|--------------------------------------------------------------------------
*/
$productName  = 'أريكة فاخرة';
$productPrice = 12500;

$defaultImage = 'assets/img/emerald.jpg';
$allowedColors = ['أخضر زمردي', 'أزرق ملكي', 'بيج دافئ', 'رمادي فاحم'];
$colorMap = [
    'أخضر زمردي' => '#075b4c',
    'أزرق ملكي'  => '#172554',
    'بيج دافئ'   => '#d6b98c',
    'رمادي فاحم'  => '#475569',
];

function e(mixed $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function validQuantity(mixed $value): int
{
    $quantity = filter_var($value, FILTER_VALIDATE_INT);
    return ($quantity !== false && $quantity !== null && $quantity >= 1 && $quantity <= 20)
        ? $quantity
        : 1;
}

function validProductImage(mixed $value, string $fallback): string
{
    if (!is_string($value)) {
        return $fallback;
    }
    $value = trim($value);
    if (preg_match('~^assets/img/[A-Za-z0-9_\-./]+\\.(?:png|jpe?g|webp|avif)$~i', $value)
        && !str_contains($value, '..')) {
        return $value;
    }
    return $fallback;
}

$quantity = validQuantity($_GET['quantity'] ?? 1);
$requestedColor = trim((string)($_GET['color'] ?? 'أخضر زمردي'));
$color = in_array($requestedColor, $allowedColors, true) ? $requestedColor : 'أخضر زمردي';
$productImage = validProductImage($_GET['image'] ?? null, $defaultImage);

$errors = [];
$success = false;

$customer = [
    'name'        => '',
    'phone'       => '',
    'governorate' => '',
    'address'     => '',
    'notes'       => '',
    'payment'     => 'cod',
];

$governorates = [
    'القاهرة', 'الجيزة', 'الإسكندرية', 'الدقهلية',
    'الشرقية', 'الغربية', 'المنوفية', 'القليوبية',
    'كفر الشيخ', 'دمياط', 'بورسعيد', 'الإسماعيلية',
    'السويس', 'البحيرة', 'الفيوم', 'بني سويف',
    'المنيا', 'أسيوط', 'سوهاج', 'قنا',
    'الأقصر', 'أسوان', 'البحر الأحمر', 'مطروح',
    'شمال سيناء', 'جنوب سيناء', 'الوادي الجديد',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer['name'] = trim((string)($_POST['name'] ?? ''));
    $customer['phone'] = trim((string)($_POST['phone'] ?? ''));
    $customer['governorate'] = trim((string)($_POST['governorate'] ?? ''));
    $customer['address'] = trim((string)($_POST['address'] ?? ''));
    $customer['notes'] = trim((string)($_POST['notes'] ?? ''));
    $customer['payment'] = (string)($_POST['payment'] ?? 'cod');
    $quantity = validQuantity($_POST['quantity'] ?? 1);
    $postedColor = trim((string)($_POST['color'] ?? 'أخضر زمردي'));
    $color = in_array($postedColor, $allowedColors, true) ? $postedColor : 'أخضر زمردي';
    $productImage = validProductImage($_POST['image'] ?? null, $defaultImage);
    $total = $productPrice * $quantity;

    if (mb_strlen($customer['name']) < 3) {
        $errors[] = 'يرجى إدخال الاسم بالكامل.';
    }
    if (!preg_match('/^[0-9+\s()\-]{8,20}$/u', $customer['phone'])) {
        $errors[] = 'يرجى إدخال رقم هاتف صحيح.';
    }
    if (!in_array($customer['governorate'], $governorates, true)) {
        $errors[] = 'يرجى اختيار محافظة صحيحة.';
    }
    if (mb_strlen($customer['address']) < 8) {
        $errors[] = 'يرجى إدخال عنوان التوصيل بالتفصيل.';
    }
    if ($customer['payment'] !== 'cod') {
        $errors[] = 'طريقة الدفع المختارة غير متاحة.';
    }

    if (!$errors) {
        $_SESSION['last_order'] = [
            'order_number' => 'SN-' . date('ymd') . '-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 6)),
            'product'      => $productName,
            'price'        => $productPrice,
            'quantity'     => $quantity,
            'color'        => $color,
            'image'        => $productImage,
            'total'        => $total,
            'customer'     => $customer,
        ];
        $success = true;
    }
} else {
    $total = $productPrice * $quantity;
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#17130f">
    <title>إتمام الطلب | صنعة</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#faf7f1',
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
                        luxury: '0 25px 70px rgba(61,36,18,.08)',
                        soft: '0 12px 40px rgba(15,23,42,.07)',
                        floating: '0 20px 60px rgba(15,23,42,.14)'
                    }
                }
            }
        };
    </script>
    <style>
        @font-face {
            font-family: "adobe_arabic";
            src: url("../assets/fonts/ArabicUIDisplay.otf") format("opentype");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }
        *, *::before, *::after {
            box-sizing: border-box;
        }
        html {
            scroll-behavior: smooth;
        }
        body, button, input, textarea, select {
            font-family: "adobe_arabic", Arial, sans-serif;
        }
        body {
            margin: 0;
            min-width: 320px;
            color: #172033;
            background:
                radial-gradient(circle at 5% 0%, rgba(231,213,181,.35), transparent 28%),
                radial-gradient(circle at 96% 16%, rgba(226,232,240,.50), transparent 28%),
                linear-gradient(180deg, #fafaf8 0%, #f7f7f5 45%, #f8f8f6 100%);
        }
        .glass {
            background: rgba(255,255,255,.78);
            backdrop-filter: blur(24px) saturate(150%);
            -webkit-backdrop-filter: blur(24px) saturate(150%);
        }
        .btn-black {
            background-color: #020617;
            color: #ffffff;
            transition: all .2s cubic-bezier(.22,.61,.36,1);
        }
        .btn-black:hover {
            background-color: #1e293b;
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(2, 6, 23, 0.2);
        }
        .btn-black:active {
            transform: scale(0.98);
        }
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp .6s ease forwards;
        }
        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="min-h-screen antialiased flex flex-col justify-between">

    <!-- HEADER -->
    <header class="sticky top-0 z-50 border-b border-slate-200/60 glass">
        <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-[68px] sm:h-[76px] flex items-center justify-between gap-3">
                <a href="index.php" class="flex items-center gap-2 sm:gap-3 min-w-0">
                    <div class="w-10 h-10 sm:w-11 sm:h-11 flex-none rounded-xl sm:rounded-2xl bg-brand-50 border border-brand-200/70 flex items-center justify-center text-brand-700 shadow-sm">
                        <i class="bi bi-house-door text-lg"></i>
                    </div>
                    <div class="min-w-0">
                        <div class="text-[18px] sm:text-[21px] font-black text-slate-950 leading-none">صنعة</div>
                        <div class="text-[8px] sm:text-[10px] text-brand-700 font-bold mt-1 whitespace-nowrap">عالم الحرف اليدوية</div>
                    </div>
                </a>

                <!-- STEPPER -->
                <div class="hidden sm:flex items-center gap-3 text-xs font-extrabold text-slate-400">
                    <span class="flex items-center gap-1.5"><i class="bi bi-bag-check text-brand-600"></i>السلة</span>
                    <span class="w-6 h-[1px] bg-slate-200"></span>
                    <span class="flex items-center gap-1.5 text-slate-950"><i class="bi bi-truck text-brand-700"></i>بيانات التوصيل</span>
                    <span class="w-6 h-[1px] bg-slate-200"></span>
                    <span class="flex items-center gap-1.5"><i class="bi bi-check-circle"></i>تأكيد الطلب</span>
                </div>

                <a href="index.php" class="h-10 px-5 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-800 text-xs font-black flex items-center gap-2 transition">
                 <div class="flex flex-row mx-auto w-full justify-center">    
                <span>المتجر</span>
                    <img src="../assets/icons/chevron-left-svgrepo-com (1).svg" class="w-5 h-5">
                    </div>
                </a>
            </div>
        </div>
    </header>

    <!-- BREADCRUMB -->
    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="flex items-center gap-2 py-4 text-xs text-slate-400 font-medium overflow-hidden whitespace-nowrap">
            <a href="index.php" class="hover:text-brand-700 transition">الرئيسية</a>
            <i class="bi bi-chevron-left text-[8px]"></i>
            <span class="text-slate-700 font-bold">إتمام الطلب</span>
        </div>
    </div>

    <!-- MAIN SECTION -->
    <main class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 pb-16 w-full flex-grow">
        <?php if ($success && isset($_SESSION['last_order'])): ?>
            <?php $order = $_SESSION['last_order']; ?>
            <section class="fade-up max-w-2xl mx-auto rounded-[30px] bg-white border border-slate-200/80 p-6 sm:p-10 text-center shadow-luxury">
                <div class="w-20 h-20 rounded-3xl bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center text-3xl mx-auto mb-6">
                    <i class="bi bi-check2"></i>
                </div>
                <span class="inline-flex items-center gap-2 text-xs font-black text-brand-700 bg-brand-50 px-3 py-1 rounded-full border border-brand-200/60">
                    <span class="w-2 h-2 rounded-full bg-brand-600"></span> صنعة للأثاث
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-950 mt-4">تم التحقق من بيانات طلبك!</h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-2 max-w-md mx-auto leading-relaxed">
                    تم إنشاء ملخص تجريبي للطلب. لم يتم حفظ الطلب في قاعدة بيانات أو إرساله إلى المتجر بعد.
                </p>

                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-5 mt-6 text-right space-y-3 text-xs sm:text-sm">
                    <div class="flex items-center justify-between border-b border-slate-200/60 pb-2.5">
                        <span class="text-slate-500">رقم الطلب التجريبي</span>
                        <span class="font-extrabold text-slate-950" dir="ltr"><?= e($order['order_number']) ?></span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-200/60 pb-2.5">
                        <span class="text-slate-500">المنتج</span>
                        <span class="font-extrabold text-slate-950"><?= e($order['product']) ?></span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-200/60 pb-2.5">
                        <span class="text-slate-500">الكمية</span>
                        <span class="font-extrabold text-slate-950"><?= e($order['quantity']) ?></span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-200/60 pb-2.5">
                        <span class="text-slate-500">اللون المختار</span>
                        <span class="font-extrabold text-slate-950 flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full inline-block border border-black/10" style="background: <?= e($colorMap[$order['color']] ?? '#ccc') ?>"></span>
                            <?= e($order['color']) ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between pt-1">
                        <span class="text-slate-500 font-bold">الإجمالي المبدئي</span>
                        <span class="text-lg font-black text-brand-700"><?= number_format((float)$order['total']) ?> ج.م</span>
                    </div>
                </div>

                <a href="index.php" class="btn-black w-full h-14 rounded-2xl font-black text-sm flex items-center justify-center gap-2 mt-6">
                    <i class="bi bi-shop"></i>
                    <span>العودة إلى المتجر</span>
                </a>
            </section>
        <?php else: ?>
            <div class="fade-up mb-8">
                <span class="inline-flex items-center gap-2 text-xs font-black text-brand-700 bg-brand-50 px-3 py-1 rounded-full border border-brand-200/60 mb-2">
                    <span class="w-2 h-2 rounded-full bg-brand-600"></span> خطوة أخيرة تفصلك عن أثاثك الجديد
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-950 tracking-tight">إتمام الطلب</h1>
                <p class="text-xs sm:text-sm text-slate-500 mt-2">أدخل بياناتك وعنوان التوصيل، ثم راجع تفاصيل طلبك قبل التأكيد.</p>
            </div>

            <?php if ($errors): ?>
                <div class="fade-up mb-6 p-4 sm:p-5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm">
                    <div class="font-black mb-2 flex items-center gap-2">
                        <i class="bi bi-exclamation-circle text-base"></i>
                        <span>يرجى مراجعة البيانات التالية:</span>
                    </div>
                    <ul class="list-disc list-inside space-y-1 text-rose-700 pe-2">
                        <?php foreach ($errors as $error): ?>
                            <li><?= e($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="checkout.php" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <input type="hidden" name="quantity" value="<?= e($quantity) ?>">
                <input type="hidden" name="color" value="<?= e($color) ?>">
                <input type="hidden" name="image" value="<?= e($productImage) ?>">

                <!-- FORM COLUMN -->
                <div class="lg:col-span-7 space-y-6">

                    <!-- Customer Info -->
                    <div class="fade-up rounded-[28px] bg-white border border-slate-200/80 p-5 sm:p-7 shadow-soft">
                        <div class="flex items-center gap-3.5 mb-6">
                            <div class="w-11 h-11 rounded-2xl bg-brand-50 border border-brand-100 flex items-center justify-center text-brand-700 text-xl font-bold">
                                <i class="bi bi-person"></i>
                            </div>
                            <div>
                                <h2 class="text-base sm:text-lg font-black text-slate-950">بيانات العميل</h2>
                                <p class="text-xs text-slate-400 mt-0.5">كيف يمكننا التواصل معك؟</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- Full Name -->
                            <div>
                                <label for="name" class="block text-xs sm:text-sm font-extrabold text-slate-900 mb-2">
                                    الاسم بالكامل <span class="text-rose-500">*</span>
                                </label>
                                <input
                                    class="w-full h-12 px-4 rounded-xl text-xs sm:text-sm text-slate-950 placeholder:text-slate-400 bg-white border border-slate-300 focus:border-2 focus:border-black focus:outline-none focus:ring-0 transition-colors duration-200"
                                    id="name"
                                    name="name"
                                    type="text"
                                    autocomplete="name"
                                    placeholder="اكتب اسمك بالكامل"
                                    minlength="3"
                                    maxlength="120"
                                    required
                                    value="<?= e($customer['name']) ?>"
                                >
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-xs sm:text-sm font-extrabold text-slate-900 mb-2">
                                    رقم الهاتف <span class="text-rose-500">*</span>
                                </label>
                                <input
                                    class="w-full h-12 px-4 rounded-xl text-xs sm:text-sm text-slate-950 placeholder:text-slate-400 bg-white border border-slate-300 focus:border-2 focus:border-black focus:outline-none focus:ring-0 transition-colors duration-200"
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    inputmode="tel"
                                    autocomplete="tel"
                                    placeholder="01xxxxxxxxx"
                                    minlength="8"
                                    maxlength="20"
                                    required
                                    value="<?= e($customer['phone']) ?>"
                                >
                                <p class="text-[10px] sm:text-xs text-slate-400 mt-1.5">
                                    سنستخدم الرقم للتواصل معك بخصوص التوصيل.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Info -->
                    <div class="fade-up rounded-[28px] bg-white border border-slate-200/80 p-5 sm:p-7 shadow-soft">
                        <div class="flex items-center gap-3.5 mb-6">
                            <div class="w-11 h-11 rounded-2xl bg-brand-50 border border-brand-100 flex items-center justify-center text-brand-700 text-xl font-bold">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h2 class="text-base sm:text-lg font-black text-slate-950">عنوان التوصيل</h2>
                                <p class="text-xs text-slate-400 mt-0.5">أين تريد استلام طلبك؟</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- Governorate -->
                            <div>
                                <label for="governorate" class="block text-xs sm:text-sm font-extrabold text-slate-900 mb-2">
                                    المحافظة <span class="text-rose-500">*</span>
                                </label>
                                <select
                                    class="w-full h-12 px-4 rounded-xl text-xs sm:text-sm text-slate-950 bg-white border border-slate-300 focus:border-2 focus:border-black focus:outline-none focus:ring-0 transition-colors duration-200"
                                    id="governorate"
                                    name="governorate"
                                    required
                                >
                                    <option value="">اختر المحافظة</option>
                                    <?php foreach ($governorates as $gov): ?>
                                        <option value="<?= e($gov) ?>" <?= $customer['governorate'] === $gov ? 'selected' : '' ?>>
                                            <?= e($gov) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Detailed Address -->
                            <div>
                                <label for="address" class="block text-xs sm:text-sm font-extrabold text-slate-900 mb-2">
                                    العنوان بالتفصيل <span class="text-rose-500">*</span>
                                </label>
                                <textarea
                                    class="w-full p-4 rounded-xl text-xs sm:text-sm text-slate-950 placeholder:text-slate-400 bg-white border border-slate-300 focus:border-2 focus:border-black focus:outline-none focus:ring-0 transition-colors duration-200 min-h-[100px] resize-y"
                                    id="address"
                                    name="address"
                                    rows="3"
                                    autocomplete="street-address"
                                    minlength="8"
                                    maxlength="700"
                                    required
                                    placeholder="المدينة، المنطقة، اسم الشارع، رقم العقار، الدور والشقة"
                                ><?= e($customer['address']) ?></textarea>
                            </div>

                            <!-- Additional Notes -->
                            <div>
                                <label for="notes" class="block text-xs sm:text-sm font-extrabold text-slate-900 mb-2">
                                    ملاحظات إضافية
                                    <span class="text-slate-400 font-normal">(اختياري)</span>
                                </label>
                                <textarea
                                    class="w-full p-4 rounded-xl text-xs sm:text-sm text-slate-950 placeholder:text-slate-400 bg-white border border-slate-300 focus:border-2 focus:border-black focus:outline-none focus:ring-0 transition-colors duration-200 min-h-[80px] resize-y"
                                    id="notes"
                                    name="notes"
                                    rows="2"
                                    maxlength="1000"
                                    placeholder="أي تفاصيل تساعدنا في توصيل طلبك"
                                ><?= e($customer['notes']) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Option -->
                    <div class="fade-up rounded-[28px] bg-white border border-slate-200/80 p-5 sm:p-7 shadow-soft">
                        <div class="flex items-center gap-3.5 mb-4">
                            <div class="w-11 h-11 rounded-2xl bg-brand-50 border border-brand-100 flex items-center justify-center text-brand-700 text-xl font-bold">
                                <i class="bi bi-wallet2"></i>
                            </div>
                            <div>
                                <h2 class="text-base sm:text-lg font-black text-slate-950">طريقة الدفع</h2>
                                <p class="text-xs text-slate-400 mt-0.5">اختر طريقة الدفع المتاحة حاليًا</p>
                            </div>
                        </div>

                        <label class="flex items-center gap-4 p-4 rounded-2xl border-2 border-slate-950 bg-slate-50/50 cursor-pointer">
                            <input type="radio" name="payment" value="cod" class="w-5 h-5 accent-slate-950" <?= $customer['payment'] === 'cod' ? 'checked' : '' ?>>
                            <div class="flex-grow min-w-0">
                                <span class="block text-xs sm:text-sm font-black text-slate-950">الدفع عند الاستلام</span>
                                <span class="block text-[10px] sm:text-xs text-slate-400 mt-0.5">ادفع عند استلام طلبك.</span>
                            </div>
                            <i class="bi bi-cash-coin text-2xl text-brand-700"></i>
                        </label>
                    </div>

                </div>

                <!-- SUMMARY COLUMN -->
                <aside class="lg:col-span-5 sticky top-24">
                    <div class="fade-up rounded-[28px] bg-white border border-slate-200/80 p-5 sm:p-7 shadow-soft space-y-6">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-200/70">
                            <div>
                                <h2 class="text-base sm:text-lg font-black text-slate-950">ملخص الطلب</h2>
                                <p class="text-xs text-slate-400 mt-0.5">راجع اللون والكمية قبل التأكيد.</p>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-700 text-[10px] sm:text-xs font-black">طلبك</span>
                        </div>

                        <!-- Item details -->
                        <div class="flex gap-4 items-center">
                            <div class="w-24 h-24 sm:w-28 sm:h-28 flex-none rounded-2xl overflow-hidden bg-slate-100 border border-slate-200/80 p-1">
                                <img src="<?= e($productImage) ?>" alt="<?= e($productName) ?>" class="w-full h-full object-contain" onerror="this.onerror=null;this.style.display='none';">
                            </div>
                            <div class="flex-grow min-w-0 space-y-1">
                                <h3 class="text-sm sm:text-base font-black text-slate-950 truncate"><?= e($productName) ?></h3>
                                <p class="text-xs text-slate-500 flex items-center gap-1.5">
                                    <i class="bi bi-palette text-slate-400"></i>
                                    اللون: <span class="font-bold text-slate-950"><?= e($color) ?></span>
                                    <span class="w-3 h-3 rounded-full inline-block border border-black/10" style="background: <?= e($colorMap[$color] ?? '#ccc') ?>"></span>
                                </p>
                                <p class="text-xs text-slate-500 flex items-center gap-1.5">
                                    <i class="bi bi-box-seam text-slate-400"></i>
                                    الكمية: <span class="font-bold text-slate-950"><?= e($quantity) ?></span>
                                </p>
                                <div class="text-sm sm:text-base font-black text-brand-700 pt-1"><?= number_format($productPrice) ?> ج.م</div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-dashed border-slate-200 space-y-2.5 text-xs sm:text-sm">
                            <div class="flex justify-between items-center text-slate-500">
                                <span>سعر المنتجات</span>
                                <span class="font-extrabold text-slate-950"><?= number_format($total) ?> ج.م</span>
                            </div>
                            <div class="flex justify-between items-center text-slate-500">
                                <span>التوصيل</span>
                                <span class="font-extrabold text-slate-500">يحدد لاحقًا</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-4 rounded-2xl bg-slate-50 border border-slate-200/80 text-sm sm:text-base">
                            <span class="font-extrabold text-slate-950">الإجمالي المبدئي</span>
                            <strong class="text-xl font-black text-brand-700"><?= number_format($total) ?> <small class="text-xs font-bold">ج.م</small></strong>
                        </div>

                        <p class="text-[10px] sm:text-xs text-slate-400 leading-relaxed">الإجمالي لا يشمل تكلفة التوصيل. سيتم تحديدها قبل تأكيد الطلب النهائي.</p>

                        <button type="submit" class="btn-black w-full h-14 rounded-2xl font-black text-xs sm:text-sm flex items-center justify-center gap-2">
                            <span>تأكيد الطلب</span>
                            <img src="../assets/icons/check-circle-svgrepo-com.svg" class="w-6 h-6">
                        </button>

                        <div class="text-center text-[10px] sm:text-xs text-slate-400 flex items-center justify-center gap-1.5">
                            <i class="bi bi-shield-check text-brand-600 text-sm"></i>
                            <span>بياناتك تستخدم لتجهيز طلبك في هذه النسخة التجريبية.</span>
                        </div>
                    </div>
                </aside>
            </form>
        <?php endif; ?>
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-slate-200/80 bg-white py-6">
        <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400">
            <p>© <?= date('Y') ?> صنعة — الحرفية التي تستحقها.</p>
            <p class="flex items-center gap-1"><i class="bi bi-heart text-rose-500"></i> تصميم عربي متجاوب</p>
        </div>
    </footer>

</body>
</html>