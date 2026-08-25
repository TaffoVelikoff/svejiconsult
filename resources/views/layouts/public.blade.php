<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>@yield('title', $settings['site_title'] ?? 'Свежи Консулт ЕООД | Счетоводни услуги в Добрич')</title>
    @yield('seo')

    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
    <x-turnstile.scripts />
</head>
<body class="bg-gray-50 text-slate-800 flex flex-col min-h-screen">
 
    <!-- HEADER -->
    <header class="fixed top-0 w-full z-50">
        <div class="backdrop-blur-lg bg-white/90 border-b border-emerald-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 sm:py-4 flex items-center justify-between">
                <!-- LOGO -->
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3">
                    <img src="/logo.png" alt="Sveji Consult Logo" class="w-10 h-10 sm:w-14 sm:h-14 object-contain">
                    <div>
                        <div class="font-bold text-base sm:text-xl text-emerald-900 leading-tight">{{ $settings['company_name'] ?? 'Свежи Консулт' }}</div>
                        <div class="text-[11px] sm:text-xs text-gray-500 leading-tight">{{ $settings['activity'] ?? 'Счетоводни услуги' }}</div>
                    </div>
                </a>

                <!-- Desktop menu -->
                <nav class="hidden md:flex items-center gap-8 font-medium">
                    <a href="{{ route('home') }}#about" class="hover:text-emerald-700 transition">За нас</a>
                    <a href="{{ route('home') }}#services" class="hover:text-emerald-700 transition">Услуги</a>
                    <a href="{{ route('home') }}#process" class="hover:text-emerald-700 transition">Как работим</a>
                    @if($hasNews)
                        <a href="{{ route('public.news.index') }}" class="hover:text-emerald-700 transition {{ request()->routeIs('public.news.*') ? 'text-emerald-700 font-semibold' : '' }}">Новини</a>
                    @endif
                    <a href="{{ route('home') }}#contact" class="hover:text-emerald-700 transition">Контакти</a>
                    <a href="{{ route('home') }}#contact" class="bg-emerald-700 text-white px-6 py-3 rounded-full hover:bg-emerald-800 transition shadow-lg">Консултация</a>
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
                <a href="{{ route('home') }}#about" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition">За нас</a>
                <a href="{{ route('home') }}#services" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition">Услуги</a>
                <a href="{{ route('home') }}#process" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition">Как работим</a>
                @if($hasNews)
                    <a href="{{ route('public.news.index') }}" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition {{ request()->routeIs('public.news.*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : '' }}">Новини</a>
                @endif
                <a href="{{ route('home') }}#contact" class="block py-2.5 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition">Контакти</a>
                <a href="{{ route('home') }}#contact" class="block text-center bg-emerald-700 text-white px-5 py-3 rounded-xl hover:bg-emerald-800 transition font-semibold shadow-md">Консултация</a>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow pt-16 sm:pt-20">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-emerald-950 text-emerald-100 py-10 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10">
                <div>
                    <div class="flex items-center gap-3 mb-4 sm:mb-5">
                        <img src="/logo.png" alt="Sveji Consult Logo" class="w-10 h-10 sm:w-12 sm:h-12 object-contain">
                        <div class="text-lg sm:text-xl font-bold text-white">{{ $settings['company_name'] ?? 'Свежи Консулт' }}</div>
                    </div>
                    <p class="text-sm sm:text-base text-emerald-200">{{ $settings['activity'] ?? 'Счетоводни услуги' }} с професионално отношение.</p>
                </div>
                <div>
                    <h3 class="font-bold text-white mb-4 sm:mb-5">Бързи връзки</h3>
                    <ul class="space-y-2.5 sm:space-y-3 text-sm sm:text-base">
                        <li><a href="{{ route('home') }}#about" class="hover:text-white transition">За нас</a></li>
                        <li><a href="{{ route('home') }}#services" class="hover:text-white transition">Услуги</a></li>
                        <li><a href="{{ route('home') }}#process" class="hover:text-white transition">Как работим</a></li>
                        @if($hasNews)
                            <li><a href="{{ route('public.news.index') }}" class="hover:text-white transition">Новини</a></li>
                        @endif
                        <li><a href="{{ route('home') }}#contact" class="hover:text-white transition">Контакти</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold text-white mb-4 sm:mb-5">Работно време</h3>
                    @if(!empty($settings['working_hours']))
                        <p class="whitespace-pre-line text-sm sm:text-base text-emerald-200 leading-relaxed">{{ $settings['working_hours'] }}</p>
                    @endif
                    <p class="mt-3 sm:mt-4 flex items-center gap-2 text-sm sm:text-base text-emerald-200">
                        <span class="text-emerald-400">☎</span> {{ $settings['phone'] ?? '' }}
                    </p>
                </div>
            </div>
            <div class="border-t border-emerald-800 mt-8 sm:mt-10 pt-6 text-center text-xs sm:text-sm text-emerald-300">
                © {{ date('Y') }} {{ $settings['company_name'] ?? 'Свежи Консулт' }}. Всички права запазени.
            </div>
        </div>
    </footer>

    <!-- MOBILE CALL BUTTON -->
    @if(!empty($settings['phone']))
    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['phone']) }}" class="fixed bottom-5 right-5 w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-emerald-700 text-white flex items-center justify-center text-xl sm:text-2xl shadow-2xl z-40 md:hidden hover:bg-emerald-800 transition transform active:scale-95" aria-label="Обади се">
        ☎
    </a>
    @endif

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
