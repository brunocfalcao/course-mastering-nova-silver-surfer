<div class="w-full lg:max-w-7xl flex flex-col md:flex-row mx-auto px-2 pb-4 md:px-4 lg:px-10 xl:px-20 md:pb-14 space-y-10 md:space-y-0 md:space-x-4 lg:space-x-6 xl:space-x-8">
    <div class="hidden md:block md:w-1/2 rounded-lg">
        <div class="w-full flex flex-row mt-2 shadow-xl">
            <div class="w-3/6 h-[580px] lg:h-[587px] xl:h-[660px]  bg-cover bg-start object-scale-up rounded-tl-lg rounded-bl-lg mt-0 z-10
            -mx-[2rem] md:-mx-[5rem] lg:-mx-[8rem]"
                 style="background-image: url({{ Vite::image('prelaunched-image.png') }} )">
            </div>

            <div class="w-full h-[580px] lg:h-[587px] xl:h-[660px]  bg-cover bg-center"
                 style="background-image: url({{ Vite::image('prelaunched-image.png') }})">
            </div>
        </div>
    </div>

    <div class="flex flex-col w-full md:w-1/2 px-2">
        <div class="heading font-medium text-3xl xl:text-5xl px-2 md:px-0">
            Medium, rare, but mostly well-done HTML email components.
        </div>

        <div class="progress-area flex flex-col justify-center md:flex-row space-y-8 md:space-y-0 space-x-0 px-4 md:px-0 md:space-x-4 lg:space-x-4 xl:space-x-8 mt-8">
            @include('course::prelaunched.partials.progress')

            @include('course::prelaunched.partials.expected-launch-date')
        </div>

        <div class="px-2 md:px-0 mt-3 md:mt-3 lg:mt-6 text-white pt-2 md:pt-2 lg:pt-4 flex flex-col">
            @include('course::prelaunched.partials.new-subscriber-form')
        </div>
    </div>
</div>
