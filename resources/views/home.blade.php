<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>{{ $settings['site_title'] ?? 'Свежи Консулт ЕООД | Счетоводни услуги в Добрич' }}</title>
    <meta name="title" content="{{ $settings['site_title'] ?? 'Свежи Консулт ЕООД | Счетоводни услуги в Добрич' }}">
    <meta name="description" content="Свежи Консулт ЕООД предлага професионално счетоводно обслужване, ТРЗ, данъчни консултации, годишно приключване и регистрация на фирми в Добрич.">
    <meta name="keywords" content="счетоводни услуги Добрич, счетоводител Добрич, ТРЗ Добрич, данъчни консултации, регистрация фирма, годишно приключване Добрич">
    <meta name="author" content="{{ $settings['company_name'] ?? 'Свежи Консулт' }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / Viber / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $settings['company_name'] ?? 'Свежи Консулт' }}">
    <meta property="og:title" content="{{ $settings['site_title'] ?? 'Свежи Консулт ЕООД | Счетоводни услуги в Добрич' }}">
    <meta property="og:description" content="Професионално счетоводно обслужване, ТРЗ и данъчни консултации в Добрич. Доверете се на опит и коректност.">
    <meta property="og:image" content="{{ asset('ogimage.jpg') }}">
    <meta property="og:image:secure_url" content="{{ asset('ogimage.jpg') }}">
    <meta property="og:locale" content="bg_BG">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $settings['site_title'] ?? 'Свежи Консулт ЕООД | Счетоводни услуги в Добрич' }}">
    <meta name="twitter:description" content="Професионално счетоводно обслужване, ТРЗ и данъчни консултации в Добрич.">
    <meta name="twitter:image" content="{{ asset('ogimage.jpg') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- JSON-LD Structured Data (LocalBusiness / AccountingService) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "AccountingService",
      "name": "{{ $settings['company_name'] ?? 'Свежи Консулт ЕООД' }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('logo.png') }}",
      "image": "{{ asset('ogimage.jpg') }}",
      "description": "Професионално счетоводно обслужване, ТРЗ, данъчни консултации, годишно приключване и регистрация на фирми в Добрич.",
      "telephone": "{{ $settings['phone'] ?? '+359 887 201 766' }}",
      "email": "{{ $settings['email'] ?? 'svejiconsult@abv.bg' }}",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "ул. Христо Смирненски 2",
        "addressLocality": "Добрич",
        "postalCode": "9300",
        "addressCountry": "BG"
      },
      "geo": {
        "@@type": "GeoCoordinates",
        "latitude": 43.568779,
        "longitude": 27.826152
      },
      "openingHoursSpecification": [
        {
          "@@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "09:00",
          "closes": "18:00"
        }
      ],
      "priceRange": "$$"
    }
    </script>

    @vite(['resources/css/app.css'])
    <x-turnstile.scripts />
</head>
<body class="bg-gray-50 text-slate-800">

    <!-- HEADER -->
    <header class="fixed top-0 w-full z-50">
        <div class="backdrop-blur-lg bg-white/90 border-b border-emerald-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 sm:py-4 flex items-center justify-between">
                <!-- LOGO -->
                <a href="#" class="flex items-center gap-2.5 sm:gap-3">
                    <img src="/logo.png" alt="Sveji Consult Logo" class="w-10 h-10 sm:w-14 sm:h-14 object-contain">
                    <div>
                        <div class="font-bold text-base sm:text-xl text-emerald-900 leading-tight">{{ $settings['company_name'] }}</div>
                        <div class="text-[11px] sm:text-xs text-gray-500 leading-tight">{{ $settings['activity'] }}</div>
                    </div>
                </a>

                <!-- Desktop menu -->
                <nav class="hidden md:flex items-center gap-8 font-medium">
                    <a href="#about" class="hover:text-emerald-700 transition">За нас</a>
                    <a href="#services" class="hover:text-emerald-700 transition">Услуги</a>
                    <a href="#process" class="hover:text-emerald-700 transition">Как работим</a>
                    <a href="#contact" class="hover:text-emerald-700 transition">Контакти</a>
                    <a href="#contact" class="bg-emerald-700 text-white px-6 py-3 rounded-full hover:bg-emerald-800 transition shadow-lg">Консултация</a>
                </nav>

                <!-- Mobile menu button -->
                <button id="mobile-menu-btn" type="button" class="md:hidden p-2 rounded-lg text-emerald-900 hover:bg-emerald-50 focus:outline-none" aria-label="Навигация">
                    <svg id="menu-open-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="menu-close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile dropdown menu -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-emerald-100 bg-white/95 px-4 pt-3 pb-5 space-y-3 font-medium text-slate-800">
                <a href="#about" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition">За нас</a>
                <a href="#services" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition">Услуги</a>
                <a href="#process" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition">Как работим</a>
                <a href="#contact" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition">Контакти</a>
                <a href="#contact" class="block text-center bg-emerald-700 text-white px-5 py-3 rounded-xl hover:bg-emerald-800 transition font-semibold shadow-md">Консултация</a>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="relative min-h-screen flex items-center overflow-hidden hero-grid">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-white to-emerald-100 -z-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 pt-24 pb-14 sm:pt-32 sm:pb-20 grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            <!-- Text -->
            <div>
                <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-800 px-4 py-1.5 sm:px-5 sm:py-2 rounded-full mb-4 sm:mb-6 text-xs sm:text-sm font-medium">
                    {{ $settings['intro_badge'] ?? '● Надеждно счетоводно обслужване' }}
                </div>
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-emerald-950">
                    @php
                        $words = explode(' ', $settings['intro_heading'] ?? 'Вашият надежден партньор в света на финансите');
                        $lastCount = min(4, count($words));
                        $mainPart = implode(' ', array_slice($words, 0, count($words) - $lastCount));
                        $greenPart = implode(' ', array_slice($words, count($words) - $lastCount));
                    @endphp
                    {!! e($mainPart) !!} <span class="text-emerald-700">{!! e($greenPart) !!}</span>
                </h1>
                <p class="mt-4 sm:mt-8 text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl">
                    {{ $settings['intro_description'] ?? '' }}
                </p>
                <div class="mt-6 sm:mt-10 flex flex-col sm:flex-row gap-3 sm:gap-4">
                    <a href="#contact" class="w-full sm:w-auto text-center bg-emerald-700 text-white px-6 py-3.5 sm:px-8 sm:py-4 rounded-xl font-semibold hover:bg-emerald-800 transition shadow-xl">Безплатна консултация</a>
                    <a href="#services" class="w-full sm:w-auto text-center border border-emerald-700 text-emerald-700 px-6 py-3.5 sm:px-8 sm:py-4 rounded-xl font-semibold hover:bg-emerald-50 transition">Нашите услуги</a>
                </div>
                <div class="mt-6 sm:mt-10 flex flex-wrap gap-4 sm:gap-6 text-xs sm:text-sm text-gray-600">
                    <span>✔ Коректност</span>
                    <span>✔ Конфиденциалност</span>
                    <span>✔ Индивидуален подход</span>
                </div>
            </div>

            <!-- Illustration -->
            <div class="relative animate-float">
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl p-6 sm:p-10 border border-emerald-100">
                    <div class="w-full h-56 sm:h-80 flex items-center justify-center">
                        <svg viewBox="0 0 400 300" class="w-full h-full max-h-64 sm:max-h-none">
                            <rect x="80" y="60" width="240" height="150" rx="20" fill="#d1fae5" />
                            <rect x="120" y="100" width="160" height="80" rx="10" fill="#047857" />
                            <path d="M150 150 L180 120 L220 145 L260 110" stroke="white" stroke-width="8" fill="none" />
                            <circle cx="150" cy="150" r="8" fill="white" />
                            <circle cx="180" cy="120" r="8" fill="white" />
                            <circle cx="220" cy="145" r="8" fill="white" />
                            <circle cx="260" cy="110" r="8" fill="white" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-lg sm:text-xl font-bold text-emerald-900">Финансова сигурност</h3>
                        <p class="text-sm sm:text-base text-gray-500 mt-1 sm:mt-2">Решения, съобразени с Вашия бизнес</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-16 sm:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <div>
                    <div class="inline-flex bg-emerald-100 text-emerald-700 px-4 py-1.5 sm:py-2 rounded-full font-medium text-xs sm:text-sm mb-4 sm:mb-6">
                        За нас
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-emerald-950 leading-tight">
                        {{ $settings['about_heading'] ?? '' }}
                    </h2>
                    @if(!empty($settings['about_description']))
                        @foreach(explode("\n\n", str_replace("\r", "", $settings['about_description'])) as $index => $paragraph)
                            @if(trim($paragraph) !== '')
                                <p class="{{ $index === 0 ? 'mt-4 sm:mt-6' : 'mt-3 sm:mt-5' }} text-gray-600 leading-relaxed text-base sm:text-lg">{{ $paragraph }}</p>
                            @endif
                        @endforeach
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    <div class="bg-emerald-50 rounded-2xl sm:rounded-3xl p-5 sm:p-8 border border-emerald-100 hover:shadow-xl transition">
                        <div class="text-3xl sm:text-4xl mb-2.5 sm:mb-4">{{ $settings['about_card_1_emoji'] ?? '📊' }}</div>
                        <h3 class="font-bold text-lg sm:text-xl text-emerald-900">{{ $settings['about_card_1_title'] ?? '' }}</h3>
                        <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-600">{{ $settings['about_card_1_text'] ?? '' }}</p>
                    </div>
                    <div class="bg-emerald-50 rounded-2xl sm:rounded-3xl p-5 sm:p-8 border border-emerald-100 hover:shadow-xl transition">
                        <div class="text-3xl sm:text-4xl mb-2.5 sm:mb-4">{{ $settings['about_card_2_emoji'] ?? '🔒' }}</div>
                        <h3 class="font-bold text-lg sm:text-xl text-emerald-900">{{ $settings['about_card_2_title'] ?? '' }}</h3>
                        <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-600">{{ $settings['about_card_2_text'] ?? '' }}</p>
                    </div>
                    <div class="bg-emerald-50 rounded-2xl sm:rounded-3xl p-5 sm:p-8 border border-emerald-100 hover:shadow-xl transition">
                        <div class="text-3xl sm:text-4xl mb-2.5 sm:mb-4">{{ $settings['about_card_3_emoji'] ?? '🤝' }}</div>
                        <h3 class="font-bold text-lg sm:text-xl text-emerald-900">{{ $settings['about_card_3_title'] ?? '' }}</h3>
                        <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-600">{{ $settings['about_card_3_text'] ?? '' }}</p>
                    </div>
                    <div class="bg-emerald-50 rounded-2xl sm:rounded-3xl p-5 sm:p-8 border border-emerald-100 hover:shadow-xl transition">
                        <div class="text-3xl sm:text-4xl mb-2.5 sm:mb-4">{{ $settings['about_card_4_emoji'] ?? '⚖️' }}</div>
                        <h3 class="font-bold text-lg sm:text-xl text-emerald-900">{{ $settings['about_card_4_title'] ?? '' }}</h3>
                        <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-600">{{ $settings['about_card_4_text'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section class="py-16 sm:py-24 bg-emerald-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center max-w-3xl mx-auto">
                <div class="text-emerald-300 font-semibold text-xs sm:text-sm uppercase tracking-wider mb-3 sm:mb-4">
                    {{ $settings['advantages_badge'] ?? '' }}
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold">
                    {{ $settings['advantages_heading'] ?? '' }}
                </h2>
                <p class="mt-4 sm:mt-6 text-emerald-100 text-base sm:text-lg">
                    {{ $settings['advantages_description'] ?? '' }}
                </p>
            </div>

            <div class="mt-10 sm:mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8">
                <div class="bg-white/10 backdrop-blur rounded-2xl sm:rounded-3xl p-6 sm:p-8 border border-white/10 hover:bg-white/20 transition">
                    <div class="text-3xl sm:text-4xl mb-4 sm:mb-5">{{ $settings['advantages_card_1_emoji'] ?? '⏱️' }}</div>
                    <h3 class="text-lg sm:text-xl font-bold">{{ $settings['advantages_card_1_title'] ?? '' }}</h3>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base text-emerald-100">{{ $settings['advantages_card_1_text'] ?? '' }}</p>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl sm:rounded-3xl p-6 sm:p-8 border border-white/10 hover:bg-white/20 transition">
                    <div class="text-3xl sm:text-4xl mb-4 sm:mb-5">{{ $settings['advantages_card_2_emoji'] ?? '💻' }}</div>
                    <h3 class="text-lg sm:text-xl font-bold">{{ $settings['advantages_card_2_title'] ?? '' }}</h3>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base text-emerald-100">{{ $settings['advantages_card_2_text'] ?? '' }}</p>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl sm:rounded-3xl p-6 sm:p-8 border border-white/10 hover:bg-white/20 transition">
                    <div class="text-3xl sm:text-4xl mb-4 sm:mb-5">{{ $settings['advantages_card_3_emoji'] ?? '📈' }}</div>
                    <h3 class="text-lg sm:text-xl font-bold">{{ $settings['advantages_card_3_title'] ?? '' }}</h3>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base text-emerald-100">{{ $settings['advantages_card_3_text'] ?? '' }}</p>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl sm:rounded-3xl p-6 sm:p-8 border border-white/10 hover:bg-white/20 transition">
                    <div class="text-3xl sm:text-4xl mb-4 sm:mb-5">{{ $settings['advantages_card_4_emoji'] ?? '👥' }}</div>
                    <h3 class="text-lg sm:text-xl font-bold">{{ $settings['advantages_card_4_title'] ?? '' }}</h3>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base text-emerald-100">{{ $settings['advantages_card_4_text'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTICS -->
    <section class="py-12 sm:py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 text-center">
                <div>
                    <div class="text-3xl sm:text-5xl font-extrabold text-emerald-700">{{ $settings['stats_1_value'] ?? '100%' }}</div>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-600">{{ $settings['stats_1_label'] ?? '' }}</p>
                </div>
                <div>
                    <div class="text-3xl sm:text-5xl font-extrabold text-emerald-700">{{ $settings['stats_2_value'] ?? '24/7' }}</div>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-600">{{ $settings['stats_2_label'] ?? '' }}</p>
                </div>
                <div>
                    <div class="text-3xl sm:text-5xl font-extrabold text-emerald-700">{{ $settings['stats_3_value'] ?? '1000+' }}</div>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-600">{{ $settings['stats_3_label'] ?? '' }}</p>
                </div>
                <div>
                    <div class="text-3xl sm:text-5xl font-extrabold text-emerald-700">{{ $settings['stats_4_value'] ?? '98%' }}</div>
                    <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-600">{{ $settings['stats_4_label'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section id="services" class="py-16 sm:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-10 sm:mb-16">
                <div class="inline-flex bg-emerald-100 text-emerald-700 px-4 py-1.5 sm:px-5 sm:py-2 rounded-full font-medium text-xs sm:text-sm">
                    Нашите услуги
                </div>
                <h2 class="mt-4 sm:mt-6 text-3xl sm:text-4xl lg:text-5xl font-bold text-emerald-950">
                    {{ $settings['services_heading'] ?? '' }}
                </h2>
                <p class="mt-3 sm:mt-5 max-w-3xl mx-auto text-gray-600 text-base sm:text-lg">
                    {{ $settings['services_description'] ?? '' }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
                @for ($i = 1; $i <= 4; $i++)
                <article class="bg-white rounded-2xl sm:rounded-3xl shadow-lg border border-gray-100 p-6 sm:p-8 hover:-translate-y-1 transition duration-300">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-emerald-100 flex items-center justify-center text-2xl sm:text-3xl mb-4 sm:mb-6">
                        {{ $settings["services_item_{$i}_emoji"] ?? '' }}
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-emerald-900">{{ $settings["services_item_{$i}_title"] ?? '' }}</h3>
                    <p class="mt-3 sm:mt-4 text-sm sm:text-base text-gray-600">
                        {{ $settings["services_item_{$i}_description"] ?? '' }}
                    </p>
                    @if(!empty($settings["services_item_{$i}_list"]))
                    <ul class="mt-4 sm:mt-6 space-y-2.5 sm:space-y-3 text-sm sm:text-base text-gray-700">
                        @foreach(explode("\n", str_replace("\r", "", $settings["services_item_{$i}_list"])) as $line)
                            @if(trim($line) !== '')
                                <li>✓ {{ trim($line) }}</li>
                            @endif
                        @endforeach
                    </ul>
                    @endif
                </article>
                @endfor

                <!-- OTHER SERVICES (Item 5 with different layout) -->
                <article class="lg:col-span-2 bg-gradient-to-r from-emerald-700 to-emerald-600 rounded-2xl sm:rounded-3xl shadow-xl p-6 sm:p-10 text-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-center">
                        <div>
                            <div class="text-4xl sm:text-5xl mb-4 sm:mb-5">{{ $settings['services_item_5_emoji'] ?? '🏢' }}</div>
                            <h3 class="text-2xl sm:text-3xl font-bold">{{ $settings['services_item_5_title'] ?? '' }}</h3>
                            <p class="mt-3 sm:mt-4 text-emerald-100 text-base sm:text-lg">
                                {{ $settings['services_item_5_description'] ?? '' }}
                            </p>
                        </div>
                        <div>
                            @if(!empty($settings['services_item_5_list']))
                            <ul class="space-y-3 sm:space-y-4 text-base sm:text-lg">
                                @foreach(explode("\n", str_replace("\r", "", $settings['services_item_5_list'])) as $line)
                                    @if(trim($line) !== '')
                                        <li>✓ {{ trim($line) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- WORK PROCESS -->
    <section id="process" class="py-16 sm:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center max-w-3xl mx-auto">
                <div class="inline-flex bg-emerald-100 text-emerald-700 px-4 py-1.5 sm:px-5 sm:py-2 rounded-full font-semibold text-xs sm:text-sm">
                    {{ $settings['process_badge'] ?? 'Как работим' }}
                </div>
                <h2 class="mt-4 sm:mt-6 text-3xl sm:text-4xl lg:text-5xl font-bold text-emerald-950">
                    {{ $settings['process_heading'] ?? '' }}
                </h2>
                <p class="mt-3 sm:mt-5 text-gray-600 text-base sm:text-lg">
                    {{ $settings['process_description'] ?? '' }}
                </p>
            </div>

            <div class="mt-10 sm:mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8">
                @for ($step = 1; $step <= 4; $step++)
                <div class="relative bg-gray-50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 border border-gray-100 hover:shadow-xl transition">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-emerald-700 text-white flex items-center justify-center text-lg sm:text-xl font-bold mb-4 sm:mb-6">
                        0{{ $step }}
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-emerald-900">{{ $settings["process_step_{$step}_title"] ?? '' }}</h3>
                    <p class="mt-2 sm:mt-4 text-sm sm:text-base text-gray-600">{{ $settings["process_step_{$step}_description"] ?? '' }}</p>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="py-16 sm:py-24 bg-emerald-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-10 sm:mb-14">
                <h2 class="text-3xl sm:text-4xl font-bold text-emerald-950">{{ $settings['faq_heading'] ?? 'Често задавани въпроси' }}</h2>
                <p class="mt-3 sm:mt-4 text-sm sm:text-base text-gray-600">{{ $settings['faq_description'] ?? 'Отговори на най-често задаваните въпроси.' }}</p>
            </div>

            @if(!empty($settings['faq_items']) && is_array($settings['faq_items']))
            <div class="space-y-4 sm:space-y-5">
                @foreach($settings['faq_items'] as $faq)
                    @if(!empty($faq['question']) && !empty($faq['answer']))
                    <details class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-sm cursor-pointer">
                        <summary class="font-semibold text-base sm:text-lg text-emerald-900">{{ $faq['question'] }}</summary>
                        <p class="mt-3 sm:mt-4 text-sm sm:text-base text-gray-600 leading-relaxed">
                            {{ $faq['answer'] }}
                        </p>
                    </details>
                    @endif
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <!-- CTA -->
    <section class="py-14 sm:py-20 bg-gradient-to-r from-emerald-700 to-emerald-600">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 text-center text-white">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold">Нека се погрижим за Вашето счетоводство</h2>
            <p class="mt-4 sm:mt-6 text-base sm:text-xl text-emerald-100">
                Вие развивате бизнеса си. Ние се грижим за финансовата сигурност.
            </p>
            <a href="#contact" class="inline-block mt-6 sm:mt-8 w-full sm:w-auto bg-white text-emerald-700 px-8 sm:px-10 py-3.5 sm:py-4 rounded-full font-bold hover:bg-emerald-50 transition shadow-xl">Свържете се с нас</a>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="py-16 sm:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12">
                <!-- CONTACT INFO -->
                <div>
                    <div class="inline-flex bg-emerald-100 text-emerald-700 px-4 py-1.5 sm:px-5 sm:py-2 rounded-full font-semibold text-xs sm:text-sm mb-4 sm:mb-6">Контакти</div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-emerald-950">Свържете се с нас</h2>
                    <p class="mt-3 sm:mt-5 text-gray-600 text-base sm:text-lg leading-relaxed">
                        Ще се радваме да обсъдим Вашите нужди и да предложим най-подходящото решение за Вашия бизнес.
                    </p>

                    <div class="mt-8 sm:mt-10 space-y-5 sm:space-y-6">
                        <div class="flex gap-4 sm:gap-5 items-start">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-lg sm:text-xl shrink-0">📍</div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg text-emerald-900">Адрес</h3>
                                <p class="text-sm sm:text-base text-gray-600 mt-1 whitespace-pre-line leading-relaxed">{{ $settings['address'] }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4 sm:gap-5 items-start">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-lg sm:text-xl shrink-0">☎</div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg text-emerald-900">Телефон</h3>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}" class="text-sm sm:text-base text-gray-600 hover:text-emerald-700 break-all">{{ $settings['phone'] }}</a>
                            </div>
                        </div>
                        <div class="flex gap-4 sm:gap-5 items-start">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-lg sm:text-xl shrink-0">✉</div>
                            <div>
                                <h3 class="font-bold text-base sm:text-lg text-emerald-900">E-mail</h3>
                                <a href="mailto:{{ $settings['email'] }}" class="text-sm sm:text-base text-gray-600 hover:text-emerald-700 break-all">{{ $settings['email'] }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORM -->
                <div class="bg-gray-50 rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-lg border border-gray-100">
                    <h3 class="text-xl sm:text-2xl font-bold text-emerald-900 mb-4 sm:mb-6">Изпратете запитване</h3>
                    
                    @if(session('success'))
                        <div class="mb-6 p-4 rounded-xl bg-emerald-100 border border-emerald-300 text-emerald-800 text-sm font-medium">
                            ✓ {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}#contact" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Вашето име"
                                class="w-full px-4 sm:px-5 py-3.5 sm:py-4 rounded-xl border {{ $errors->has('name') ? 'border-red-500 bg-red-50/50' : 'border-gray-200' }} focus:outline-none focus:ring-2 focus:ring-emerald-500 text-base"
                            >
                            @error('name')
                                <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <input
                                type="tel"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="Телефон"
                                class="w-full px-4 sm:px-5 py-3.5 sm:py-4 rounded-xl border {{ $errors->has('phone') ? 'border-red-500 bg-red-50/50' : 'border-gray-200' }} focus:outline-none focus:ring-2 focus:ring-emerald-500 text-base"
                            >
                            @error('phone')
                                <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="E-mail"
                                class="w-full px-4 sm:px-5 py-3.5 sm:py-4 rounded-xl border {{ $errors->has('email') ? 'border-red-500 bg-red-50/50' : 'border-gray-200' }} focus:outline-none focus:ring-2 focus:ring-emerald-500 text-base"
                            >
                            @error('email')
                                <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <textarea
                                name="message"
                                rows="5"
                                placeholder="Вашето съобщение"
                                class="w-full px-4 sm:px-5 py-3.5 sm:py-4 rounded-xl border {{ $errors->has('message') ? 'border-red-500 bg-red-50/50' : 'border-gray-200' }} focus:outline-none focus:ring-2 focus:ring-emerald-500 text-base"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-turnstile />
                            @error('cf-turnstile-response')
                                <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full bg-emerald-700 text-white py-3.5 sm:py-4 rounded-xl font-bold hover:bg-emerald-800 transition shadow-lg cursor-pointer">
                            Изпрати запитване
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- MAP -->
    <section class="h-[350px] sm:h-[450px]">
        @php
            $mapQuery = $settings['map_query'] ?? $settings['map_coordinates'] ?? '43.568779,27.826152';
        @endphp
        <iframe class="w-full h-full border-0" loading="lazy" src="https://maps.google.com/maps?q={{ rawurlencode($mapQuery) }}&t=&z=18&ie=UTF8&iwloc=&output=embed"></iframe>
    </section>

    <!-- FOOTER -->
    <footer class="bg-emerald-950 text-emerald-100 py-10 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10">
                <div>
                    <div class="flex items-center gap-3 mb-4 sm:mb-5">
                        <img src="/logo.png" alt="Sveji Consult Logo" class="w-10 h-10 sm:w-12 sm:h-12 object-contain">
                        <div class="text-lg sm:text-xl font-bold text-white">{{ $settings['company_name'] }}</div>
                    </div>
                    <p class="text-sm sm:text-base text-emerald-200">{{ $settings['activity'] }} с професионално отношение.</p>
                </div>
                <div>
                    <h3 class="font-bold text-white mb-4 sm:mb-5">Бързи връзки</h3>
                    <ul class="space-y-2.5 sm:space-y-3 text-sm sm:text-base">
                        <li><a href="#about" class="hover:text-white transition">За нас</a></li>
                        <li><a href="#services" class="hover:text-white transition">Услуги</a></li>
                        <li><a href="#process" class="hover:text-white transition">Как работим</a></li>
                        <li><a href="#contact" class="hover:text-white transition">Контакти</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-white mb-4 sm:mb-5">Работно време</h3>
                    @if(!empty($settings['working_hours']))
                        <p class="whitespace-pre-line text-sm sm:text-base text-emerald-200 leading-relaxed">{{ $settings['working_hours'] }}</p>
                    @endif
                    <p class="mt-3 sm:mt-4 flex items-center gap-2 text-sm sm:text-base text-emerald-200">
                        <span class="text-emerald-400">☎</span> {{ $settings['phone'] }}
                    </p>
                </div>
            </div>
            <div class="border-t border-emerald-800 mt-8 sm:mt-10 pt-6 text-center text-xs sm:text-sm text-emerald-300">
                © {{ date('Y') }} {{ $settings['company_name'] }}. Всички права запазени.
            </div>
        </div>
    </footer>

    <!-- MOBILE CALL BUTTON -->
    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}" class="fixed bottom-5 right-5 w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-emerald-700 text-white flex items-center justify-center text-xl sm:text-2xl shadow-2xl z-40 md:hidden hover:bg-emerald-800 transition transform active:scale-95" aria-label="Обади се">
        ☎
    </a>

    <!-- MOBILE MENU SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const openIcon = document.getElementById('menu-open-icon');
            const closeIcon = document.getElementById('menu-close-icon');

            if (btn && menu) {
                btn.addEventListener('click', function () {
                    menu.classList.toggle('hidden');
                    openIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });

                menu.querySelectorAll('a').forEach(function (link) {
                    link.addEventListener('click', function () {
                        menu.classList.add('hidden');
                        openIcon.classList.remove('hidden');
                        closeIcon.classList.add('hidden');
                    });
                });
            }
        });
    </script>

</body>
</html>

