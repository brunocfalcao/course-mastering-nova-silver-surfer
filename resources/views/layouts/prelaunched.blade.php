<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @stack('metatags')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');
    </style>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    @vite('resources/css/app.css')
    @stack('styles')

    <style>
        html {
            scroll-behavior: smooth;
            transition-delay: 0.75s;
        }

        #scroll-to-top-button {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #2DD4BF;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        #scroll-to-top-button:hover {
            background-color: #555;
        }
    </style>
</head>

<body class="antialiased">

<button onclick="scrollToTop()" id="scroll-to-top-button" title="Scroll to top"
        class="fixed bottom-20 right-30 z-99 text-white text-2xl bg-teal-500 px-4 py-1 rounded-md"
>Scroll to top</button>

@yield('content')

<!-- Scripts -->
@stack('scripts')
<script>
    let scrollToTopButton = document.getElementById("scroll-to-top-button");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollToTopButton.style.display = "block";
        } else {
            scrollToTopButton.style.display = "none";
        }
    }

    function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function scrollToBottom() {
        window.scrollTo(0, document.body.scrollHeight);
    }
</script>
</body>

</html>
