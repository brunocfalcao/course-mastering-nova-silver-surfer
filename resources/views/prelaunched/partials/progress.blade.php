<div class="max-w-full md:w-1/2 flex flex-col md:flex-row border-2 border-teal-500 rounded-xl py-2">
    <div class="w-full shrink-0 py-4">
        <!-- <div class="w-full md:w-[267.73px] h-[320.52px] shrink-0"> -->
        <div class="max-w-[267.73px] relative mx-auto rounded-lg flex flex-col justify-center items-center">

            @if($course)
                <div class="progress-wrapper "
                     id="circularProgress"
                     data-progress="{{ $course->getCurrentProgress() }}"
                     data-img-src="{{ Vite::image('rocket.png') }}"></div>
                <p class="font-regular leading-8 text-white text-2xl text-center px-14">Current progress</p>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script defer>
        document.addEventListener("DOMContentLoaded", function () {
            const radius = 80;
            const wrapper = document.getElementById("circularProgress");
            const bgColorClass = "fill-transparent";
            const progressPercentage = wrapper.getAttribute('data-progress');
            const progressThickness = 10;
            const trackThickness = 10;
            const imageSide = 85;
            const progressColorClass = "progress-completed";
            const trackColorClass = "progress-incomplete";
            const textColorClass = "progress-font";
            const textSizeClass = "text-5xl";
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
