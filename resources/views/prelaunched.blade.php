<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Nereus::course()->name }}</title>
    @vite('resources/css/app.css')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ Vite::resource('favicons/apple-touch-icon.png') }} ">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ Vite::resource('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ Vite::resource('favicons/favicon-16x16.png') }}">
    <link rel="mask-icon" href="{{ Vite::resource('favicons/safari-pinned-tab.svg') }}" color="#333333">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#333333">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;700&display=swap" rel="stylesheet">

    <!-- Meta / SEO -->

    <!-- JS -->
    @vite('resources/js/app.js')
</head>
<body class="bg-black relative">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 py-6 flex items-center flex-wrap">
        <img src="{{ Vite::resource('images/logo-wide.png') }}" class="h-8 hidden sm:block">
        <img src="{{ Vite::resource('images/logo.png') }}" class="h-8 block sm:hidden">
        <button class="ml-auto px-6 py-2 btn-primary-colors">Contact Me</button>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-6 sm:px-8 grid grid-cols-1 lg:grid-cols-2 gap-10">
        <div class="bg-[#272e44] relative rounded-2xl overflow-hidden hidden lg:block">
            <img class="absolute top-0 left-0 right-0 bottom-0 w-full h-full object-cover" src="{{ Vite::resource('images/showcase-cropped.jpg') }}">
        </div>
        <div>
            <h1 class="text-white text-4xl sm:text-5xl font-bold leading-snug sm:leading-snug">Suit up like an Astronaut, and master Laravel Nova for out-of-this-world projects</h1>

            <div class="grid grid-cols-1 xs:grid-cols-2 gap-6 mt-10">
                <div class="relative border-2 border-[#00FFC4] rounded-2xl px-6 pt-8 pb-28 flex flex-col items-center justify-center">
                    <img class="-mt-1 max-w-full w-64" src="{{ Vite::resource('images/progress/progress-25-resized.png') }}">
                    <h2 class="absolute bottom-8 text-white font-bold text-2xl text-center">Current<br>Progress</h2>
                </div>
                <div class="relative border-2 border-[#00FFC4] rounded-2xl px-6 pt-12 pb-32 flex flex-col items-center justify-center">
                    <img src="{{ Vite::resource('images/launch-date.svg') }}" class="max-w-[80%] w-40">
                    <h2 class="absolute bottom-8 text-white font-bold text-2xl text-center mt-8">Estimated<br>Launch Date</h2>
                </div>
            </div>

            <div class="mt-10 relative">
                <form name="notify-me-form" id="notify-me-form" method="POST" action="{{ route('prelaunched.subscribe') }}">
                    @csrf
                    <x-honeypot />
                    <p class="text-xl text-white italic font-normal">Get notified when I launch, plus a nice discount coupon:</p>
                    <div class="relative mt-4 rounded-lg shadow-lg">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                            <svg class="h-5 w-5 text-gray-100" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                            </svg>
                        </div>
                        <input type="email" name="email" required id="email" class="block w-full autofill:bg-[#272E44] autofill:text-cyan-300 rounded-lg border-0 py-4 pl-12 bg-[#272E44] text-cyan-300 placeholder:text-gray-400 focus:outline-none focus:ring-0" placeholder="you@example.com">
                        <button id="notify-me-button-1" type="submit" class="btn-primary-colors px-6 hidden xs:block absolute right-2 top-2 bottom-2">Subscribe</button>
                    </div>
                </form>

                <p id="notify-me-success" class="hidden absolute top-1/2 left-0 right-0 bottom-1/2 -translate-y-1/2 text-xl text-white font-normal text-center">Thank you for signing up!</p>
                <p id="notify-me-error" class="hidden absolute top-1/2 left-0 right-0 bottom-1/2 -translate-y-1/2 text-xl text-red-400 font-normal text-center">There was an error submitting your form. Please try again!</p>
                <div id="notify-me-spinner" role="status" class="hidden  absolute top-1/2 left-0 right-0 bottom-1/2 -translate-y-1/2 w-full items-center justify-center">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-cyan-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-6 sm:px-8 mt-8 mb-6">
        <div class="w-full h-0.5 bg-gradient-to-r from-transparent via-[#0CFEC7] to-transparent"></div>
        <div class="py-8 flex flex-col lg:flex-row items-center gap-8 lg:gap-16">
            <h2 class="text-white text-2xl sm:text-3xl font-bold w-full max-w-[48rem] leading-snug text-center lg:text-left">If you bought my previous course, for the Orion version, you can still access it here (the new version is free for you)</h2>
            <button class="btn-primary-colors px-6 py-4 sm:mx-auto lg:mr-0 lg:ml-auto flex-shrink-0 w-full sm:w-auto">Access Orion Course</button>
        </div>
        <div class="w-full h-0.5 bg-gradient-to-r from-transparent via-[#0CFEC7] to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 py-6 flex items-center flex-wrap flex-col md:flex-row">
        <img src="{{ Vite::resource('images/logo.png') }}" class="h-8">
        <div class="md:ml-auto flex flex-col md:flex-row  items-center justify-center gap-4 py-4">
            <a href="#" class="text-white text-lg hover:underline focus:underline">Contact</a>
            <span class="text-white opacity-75 text-lg hidden md:block">|</span>
            <a href="#" class="text-white text-lg hover:underline focus:underline">Twitter</a>
        </div>
    </div>

    <button id="scroll-button" class="fixed bottom-8 right-8 rounded-full bg-white text-black shadow-lg flex p-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 transition-transform duration-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
        </svg>
    </button>

    <picture>
        <source media="(max-width: 799px)" srcset="{{ Vite::resource('images/background-mobile.jpg') }}" />
        <source media="(max-width: 1199px)" srcset="{{ Vite::resource('images/background-hybrid.jpg') }}" />
        <source media="(min-width: 1200px)" srcset="{{ Vite::resource('images/background-desktop.jpg') }}" />
        <img src="{{ Vite::resource('images/background-desktop.jpg') }}" alt="Background Graphics" class="absolute bottom-0 left-0 right-0 w-full object-cover -z-10">
    </picture>
</body>
</html>
