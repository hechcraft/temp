@extends('layouts.main')
@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <!-- Image gallery -->
                <div class="flex flex-col-reverse">
                    <!-- Image selector -->
                    <div class="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
                        <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">

                            @foreach($screenshots as $screenshot)
                                <button id="tabs-1-tab-1"
                                        class="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                        aria-controls="tabs-1-panel-1" role="tab" type="button">
                                    <span class="sr-only"> Angled view </span>
                                    <span class="absolute inset-0 rounded-md overflow-hidden">
                                    <img src="{{$screenshot}}" alt=""
                                         onclick="currentSlide({{$loop->iteration}})"
                                         class="w-full h-full object-center object-cover">
                                </span>
                                    <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
                                    <span
                                        class="ring-transparent absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none"
                                        aria-hidden="true"></span>
                                </button>
                            @endforeach

                        </div>
                    </div>

                    <div class="w-full aspect-w-1 aspect-h-1">
                        <!-- Tab panel, show/hide based on tab state. -->
                        @foreach($screenshots as $screenshot)
                            <div class="mySlides">
                                <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                                    <img src="{{$screenshot}}"
                                         alt="Angled front view with bag zipped and handles upright."
                                         class="w-full h-full object-center object-cover sm:rounded-lg">
                                </div>
                            </div>
                        @endforeach
                        <!-- More images... -->
                    </div>
                </div>

                <!-- Product info -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{$game->name}}</h1>

                    <div class="mt-3">
                        <h2 class="sr-only">Product information</h2>
                        <p class="text-3xl text-gray-900">{{$game->released ?? 'N/A'}}</p>
                    </div>

                    {{--                    <div class="mt-6">--}}
                    {{--                        <h3 class="sr-only">Description</h3>--}}

                    {{--                        <div class="text-base text-gray-700 space-y-6">--}}
                    {{--                            <p>The Zip Tote Basket is the perfect midpoint between shopping tote and comfy backpack.--}}
                    {{--                                With convertible straps, you can hand carry, should sling, or backpack this convenient--}}
                    {{--                                and spacious bag. The zip top and durable canvas construction keeps your goods protected--}}
                    {{--                                for all-day use.</p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="grid grid-cols-3">
                        @auth
                            <form action="{{route('game.search.save')}}" method="post" class="mt-4 col">
                                @csrf
                                <div class="flex sm:flex-col1">
                                    <input type="text" hidden name="rawgGameId" value="{{$game->rawg_id}}">
                                    <button type="submit"
                                            class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                  <span
                                      class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                      Track this game
                                  </span>
                                    </button>
                                </div>
                            </form>
                            @if($tracking)
                                <form action="{{route('game.search.delete')}}" method="post" class="mt-4 col">
                                    @method('delete')
                                    @csrf
                                    <div class="flex sm:flex-col1">
                                        <input type="text" hidden name="userId" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                                        <input type="text" hidden name="gameId" value="{{$game->id}}">
                                        <button
                                            class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                      <span
                                          class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                          Stop tracking
                                      </span>
                                        </button>
                                    </div>
                                </form>
                            @endif
                        @endauth
                        <div class="col-span-2 mt-4">
                            <div class=" flex sm:flex-col1">
                                <button
                                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                                    <span
                                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                                                Additional Information about this game.
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <section aria-labelledby="details-heading" class="mt-12">
                        <h2 id="details-heading" class="sr-only">Additional details</h2>

                        <div id="accordion-open" data-accordion="open">
                            <h2 id="accordion-open-heading-1">
                                <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium text-left border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white"
                                        data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                                        aria-controls="accordion-open-body-1">
                                    <span class="flex items-center">Platforms</span>
                                    <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-open-body-1" class="" aria-labelledby="accordion-open-heading-1">
                                <div
                                    class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    <ul class="pl-2 list-disc">
                                        @foreach($game->platforms as $item)
                                            <li>{{$item->platform->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <h2 id="accordion-open-heading-2">
                                <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                        data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                                        aria-controls="accordion-open-body-2">
                                    <span class="flex itms-center">
                                        Genres</span>
                                    <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                                <div
                                    class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    <ul class="pl-2 list-disc">
                                        @foreach($game->genres as $item)
                                            <li>{{$item->genre->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <h2 id="accordion-open-heading-3">
                                <button type="button"
                                        class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                        data-accordion-target="#accordion-open-body-3" aria-expanded="false"
                                        aria-controls="accordion-open-body-3">
                                    <span class="flex items-center">
                                        Stores</span>
                                    <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-2">
                                <div
                                    class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                    <div class="grid grid-cols-2 gap-1">
                                        @foreach($game->stores as $item)
                                            <a href="{{$item->store_link}}"
                                               class="bg-grey-light hover:bg-grey border-2 border-black-500/100 text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
                                                {!!$item->store->icon!!}
                                                <span class="pl-2">{{$item->store->name}}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }


        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            console.log(n);
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = $(".mySlides");
            var dots = $(".demo");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            // dots[slideIndex - 1].className += " active";
        }
    </script>
@endsection
