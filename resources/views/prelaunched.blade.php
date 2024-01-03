@extends('course::layouts.prelaunched')

@section('title', $course->meta_title ?? $course->name)

@push('metatags')
    <meta name="description" content="{{ $course->meta_description }}">
    <meta name="author" content="{{ $course->admin_name }}">
    <link rel="canonical" href="https://silver-surfer.masteringnova.com/" />
    <meta name="twitter:site" content="{{ '@' . $course->meta_twitter_alias }}" />
@endpush

@section('content')
<div class="w-full mx-auto justify-center min-h-screen flex flex-col bg-primary-black text-white"
style="
    background: linear-gradient(180deg, #000 44.59%, rgba(1, 1, 1, 0.00) 100%), linear-gradient(180deg, rgba(1, 1, 1, 0.00) 57.01%, #000 100%), linear-gradient(0deg, #7CE0FC 0%, #7CE0FC 100%), url({{ Vite::image('prelaunched-bg.png') }}), lightgray 50% / cover no-repeat;
    background-position: center top 70rem !important;
    background-blend-mode: normal, normal, color, normal;
">

    @include('course::prelaunched.navbar')

    @include('course::prelaunched.content')

    <div class="w-full pb-10 flex justify-center">
        <button id="scroll-to-bottom-button" onclick="scrollToBottom()"
                class="opacity-100 transition-opacity duration-500 ease-in-out bg-teal-100/50 text-black p-1 rounded-full animate-bounce">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
            </svg>
        </button>
    </div>

    @include('course::prelaunched.partials.flare')
    @include('course::prelaunched.get-access')
    @include('course::prelaunched.partials.flare')

    @include('course::prelaunched.footer')
</div>
@endsection
