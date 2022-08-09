@extends('layouts.main')
@section('content')
    <div class="flex-column">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            @include('components.slider', ['games' => $games])
            <form action="{{route('search')}}" method="get">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-start-2 col-span-4 w-full">
                        <div class="p-2">
                            <div class="mt-1 flex rounded-md shadow-sm">
                        <span
                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                            <span class="flex-grow-0 mr-2">
                                <span class="text-sm font-medium text-gray-900" id="availability-label">
                                            <i class="fa-brands fa-2xl fa-google"></i>
                                </span>
                            </span>
                        <button type="button"
                                id="toggle"
                                class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                role="switch" aria-checked="false" aria-labelledby="annual-billing-label">
                            <span aria-hidden="true" id="point"
                                  class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200">
                            </span>
                        </button>
                        <input type="text" hidden value="0" id="toggleValue" name="toggleValue">
                            <span class="ml-3" id="annual-billing-label">
                                <i class="fa-brands fa-2xl fa-yandex-international"></i>
                            </span>
                        </span>
                                <input type="text" name="company-website" id="company-website"
                                       class="flex-1 min-w-0 block w-full px-3 py-2 border rounded-none  border-r-0 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"
                                       placeholder="www.example.com">
                                <button type="submit"
                                        class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor" aria-hidden="true">
                                        <path
                                            d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @auth
                @include('components.slider2', ['user' => $user])
            @endauth
        </div>
    </div>
    <script>
        $(document).ready(function () {
            if ($('#toggleValue').val() === "1"){
                $('#toggle').addClass("bg-indigo-600");
                $('#point').addClass("translate-x-5");
            }

            $('#toggle').click(function () {
                $('#toggle').toggleClass("bg-gray-200");
                $('#toggle').toggleClass("bg-indigo-600");
                $('#point').toggleClass("translate-x-0");
                $('#point').toggleClass("translate-x-5");
                $('#toggleValue').val() === "0" ? $('#toggleValue').val("1") : $('#toggleValue').val("0");
            });
        })
    </script>
@endsection
