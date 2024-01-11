<div
    class="max-w-full md:w-1/2 flex flex-col md:flex-col min-h-[320px] md:min-h-0 justify-center items-center border-2 border-teal-500 rounded-xl pt-0 md:pt-4">
    <div class="progress-wrapper relative max-w-full mx-auto" id="circularProgress"
        data-progress="{{ $course?->getCurrentProgress() }}" data-img-src="{{ Vite::image('rocket.png') }}"></div>
    <p class="font-semibold leading-8 text-white text-2xl text-center grid grid-cols-1">
        <span>
            Current
        </span>
        <span>
            progress
        </span>
    </p>
</div>

@push('scripts')
    <script defer>
        document.addEventListener("DOMContentLoaded", function() {
            const radius = 60;
            const wrapper = document.getElementById("circularProgress");
            const bgColorClass = "fill-transparent";
            const progressPercentage = wrapper.getAttribute('data-progress');
            const progressThickness = 10;
            const trackThickness = 10;
            const imageSide = 65;
            const progressColorClass = "progress-completed";
            const trackColorClass = "progress-incomplete";
            const textColorClass = "progress-font";
            const textSizeClass = "text-3xl";
            const padding = 0;

            createCircularProgress(
                wrapper,
                radius,
                progressColorClass,
                trackColorClass,
                bgColorClass,
                progressPercentage,
                progressThickness,
                trackThickness,
                imageSide,
                textColorClass,
                textSizeClass,
                padding
            );
        });
    </script>
@endpush
