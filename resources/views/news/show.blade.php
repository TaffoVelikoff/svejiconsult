@extends('layouts.public')

@section('title', $news->title . ' | ' . ($settings['company_name'] ?? 'Свежи Консулт'))

@section('seo')
    <meta name="title" content="{{ $news->title }} | {{ $settings['company_name'] ?? 'Свежи Консулт' }}">
    <meta name="description" content="{{ Str::limit(strip_tags($news->content), 150) }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $news->title }} | {{ $settings['company_name'] ?? 'Свежи Консулт' }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($news->content), 150) }}">
    <meta property="og:image" content="{{ asset('ogimage.jpg') }}">
    <meta property="og:locale" content="bg_BG">
    <meta property="article:published_time" content="{{ $news->created_at->toIso8601String() }}">
    <meta property="article:modified_time" content="{{ $news->updated_at->toIso8601String() }}">

    <!-- JSON-LD Structured Data for Article -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BlogPosting",
      "headline": "{{ e($news->title) }}",
      "description": "{{ e(Str::limit(strip_tags($news->content), 150)) }}",
      "datePublished": "{{ $news->created_at->toIso8601String() }}",
      "dateModified": "{{ $news->updated_at->toIso8601String() }}",
      "author": {
        "@@type": "Organization",
        "name": "{{ $settings['company_name'] ?? 'Свежи Консулт' }}"
      },
      "publisher": {
        "@@type": "Organization",
        "name": "{{ $settings['company_name'] ?? 'Свежи Консулт' }}",
        "logo": {
          "@@type": "ImageObject",
          "url": "{{ asset('logo.png') }}"
        }
      },
      "mainEntityOfPage": {
        "@@type": "WebPage",
        "@@id": "{{ url()->current() }}"
      }
    }
    </script>

    <style>
        .news-content ul {
            list-style-type: disc !important;
            padding-left: 1.5rem !important;
            margin-top: 1rem !important;
            margin-bottom: 1rem !important;
        }
        .news-content ol {
            list-style-type: decimal !important;
            padding-left: 1.5rem !important;
            margin-top: 1rem !important;
            margin-bottom: 1rem !important;
        }
        .news-content p {
            margin-bottom: 1.25rem !important;
            line-height: 1.75 !important;
        }
        .news-content b, .news-content strong {
            font-weight: 700 !important;
        }
        .news-content i, .news-content em {
            font-style: italic !important;
        }
        .news-content u {
            text-decoration: underline !important;
        }
    </style>
@endsection

@section('content')
    <article class="py-16 bg-white flex-grow">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- BACK BUTTON -->
            <div class="mb-8">
                <a href="{{ route('public.news.index') }}" class="inline-flex items-center text-emerald-700 hover:text-emerald-800 font-bold text-sm sm:text-base gap-1.5 cursor-pointer">
                    <svg class="w-4 h-4 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                    Назад към новините
                </a>
            </div>

            <!-- TITLE & DATE -->
            <header class="mb-10 pb-6 border-b border-emerald-100">
                <time class="text-xs sm:text-sm font-semibold text-emerald-700 uppercase tracking-wider">
                    {{ \Carbon\Carbon::parse($news->created_at)->locale('bg')->translatedFormat('d F Y, H:i') }}
                </time>
                <h1 class="text-3xl sm:text-5xl font-black text-emerald-950 mt-3 leading-tight">
                    {{ $news->title }}
                </h1>
            </header>

            <!-- RICH TEXT CONTENT -->
            <div class="news-content text-slate-700 text-base sm:text-lg leading-relaxed antialiased">
                {!! $news->content !!}
            </div>
        </div>
    </article>
@endsection
