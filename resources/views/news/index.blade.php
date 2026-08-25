@extends('layouts.public')

@section('title', 'Новини и Статии | ' . ($settings['company_name'] ?? 'Свежи Консулт'))

@section('seo')
    <meta name="title" content="Новини и Статии | {{ $settings['company_name'] ?? 'Свежи Консулт' }}">
    <meta name="description" content="Следете последните счетоводни, данъчни и законодателни промени. Полезни статии и съвети за Вашия бизнес от Свежи Консулт.">
    <meta name="keywords" content="счетоводни новини, данъчни промени, счетоводство Добрич, счетоводни статии, бизнес съвети">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Новини и Статии | {{ $settings['company_name'] ?? 'Свежи Консулт' }}">
    <meta property="og:description" content="Следете последните счетоводни, данъчни и законодателни промени. Полезни статии и съвети от Свежи Консулт.">
    <meta property="og:image" content="{{ asset('ogimage.jpg') }}">
    <meta property="og:locale" content="bg_BG">
@endsection

@section('content')
    <!-- HEADER HERO -->
    <section class="bg-gradient-to-br from-emerald-50 via-white to-emerald-100/50 border-b border-emerald-100 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
            <h1 class="text-3xl sm:text-5xl font-extrabold text-emerald-950">Новини & Статии</h1>
            <p class="mt-3 sm:mt-4 text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
                Актуална информация за счетоводни промени, данъчни срокове и полезни съвети за развитие на Вашия бизнес.
            </p>
        </div>
    </section>

    <!-- NEWS GRID -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            @if($news->isEmpty())
                <div class="text-center py-16">
                    <div class="text-6xl mb-4">📰</div>
                    <h3 class="text-xl font-bold text-emerald-950">Все още няма публикувани новини</h3>
                    <p class="mt-2 text-gray-600">Върнете се по-късно, за да разгледате нашите статии.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $item)
                        <article class="bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col h-full overflow-hidden">
                            <div class="p-6 sm:p-8 flex flex-col flex-grow">
                                <time class="text-xs font-semibold text-emerald-700 tracking-wide uppercase">
                                    {{ \Carbon\Carbon::parse($item->created_at)->locale('bg')->translatedFormat('d F Y') }}
                                </time>
                                <h2 class="text-xl sm:text-2xl font-bold text-emerald-950 mt-3 hover:text-emerald-700 transition leading-tight">
                                    <a href="{{ route('public.news.show', $item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </h2>
                                <p class="text-gray-600 mt-4 leading-relaxed flex-grow text-sm sm:text-base">
                                    {{ Str::limit(strip_tags($item->content), 160) }}
                                </p>
                                <div class="mt-6 pt-4 border-t border-emerald-100/50">
                                    <a href="{{ route('public.news.show', $item->slug) }}" class="inline-flex items-center text-emerald-700 hover:text-emerald-800 font-bold text-sm sm:text-base gap-1.5 cursor-pointer">
                                        Прочети повече
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- PAGINATION -->
                <div class="mt-12 flex justify-center">
                    {{ $news->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
