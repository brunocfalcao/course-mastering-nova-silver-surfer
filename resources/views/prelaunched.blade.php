@extends('course::layouts.prelaunched')

@section('title', $course->meta_title ?? $course->name)

@push('metatags')
    @foreach(Nereus::course()->meta as $tag => $value)
    <meta name="{{ $tag }}" content="{{ $value }}">
    @endforeach
    <link rel="canonical" href="https://silver-surfer.masteringnova.com/" />
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
        @include('course::partials.scroll-to-bottom')
    </div>

    @include('course::prelaunched.partials.flare')
    @include('course::prelaunched.get-access')
    @include('course::prelaunched.partials.flare')
    @include('course::prelaunched.footer')
</div>
@endsection
