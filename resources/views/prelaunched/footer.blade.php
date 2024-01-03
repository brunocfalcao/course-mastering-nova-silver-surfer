<div class="w-full my-10 py-10">
    <div class="max-w-7xl mx-auto px-[4.5rem]">
        <div class="w-full flex flex-col-reverse md:flex-row justify-between">
            <div>

                <a href="/" class="flex flex-row justify-center md:justify-start items-center">
                    <img class="w-20 h-20" src="{{ Vite::image('mastering-nova-mascot.svg') }}" alt="mastering nova">
                    <span class="leading-normal tracking-tighter  -medium ml-2 text-3xl">
                    masteringnova
                </span>
                </a>
                <div class="w-full flex justify-center">
                    <button onclick="scrollToTop()"
                            class="block md:hidden bottom-20 right-20 z-99 bg-teal-100/50 text-black p-1 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor"
                             class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="space-x-2 py-4 leading-normal tracking-tighter text-lg flex flex-row md:flex-row justify-center items-center">
                <a href="#" class="hover:underline">
                    Contact
                </a>
                <span class="block">|</span>
                <a href="#" class="hover:underline">Twitter</a>
            </div>
        </div>
    </div>
</div>
