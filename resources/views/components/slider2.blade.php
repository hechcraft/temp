<div class="bg-gray-900 px-4 sm:px-6">
    <h3 class="text-lg leading-6 font-medium text-white">Tracked games</h3>
    <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
        <div class="w-full relative flex items-center justify-center">
            <button aria-label="slide backward"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    id="prev">
                <span
                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-900/30 dark:bg-gray-800/30 group-hover:bg-gray-900/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        <span class="sr-only">Previous</span>
                </span>
            </button>
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider"
                     class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                    @foreach($user->trackedGames as $trackedGame)
                        <a href="/game/{{$trackedGame->game->slug}}" class="flex flex-shrink-0 relative w-full sm:w-auto">
                            <img src="{{$trackedGame->game->images->background_image}}"
                                 class="object-cover object-center w-72 h-96"/>
                            <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                                <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">
                                    {{$trackedGame->game->name}}</h2>
                                <div class="flex h-full items-end pb-6">
                                    <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">
                                        {{$trackedGame->game->released}}</h3>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <button aria-label="slide forward"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    id="next">
                 <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-900/30 dark:bg-gray-800/30 group-hover:bg-gray-900/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                 </span>
            </button>
        </div>
    </div>
</div>

    <script>
        let defaultTransform2 = 0;

        function goNext() {
            defaultTransform2 = defaultTransform2 - 398;
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform2) >= slider.scrollWidth - 1000) defaultTransform2 = 0;
            slider.style.transform = "translateX(" + defaultTransform2 + "px)";
        }

        next.addEventListener("click", goNext);

        function goPrev() {
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform2) === 0) defaultTransform2 = 0;
            else defaultTransform2 = defaultTransform2 + 398;
            slider.style.transform = "translateX(" + defaultTransform2 + "px)";
        }

        prev.addEventListener("click", goPrev);

    </script>
