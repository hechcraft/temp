@extends('layouts.main')
@section('content')
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"--}}
    {{--          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="--}}
    {{--          crossorigin="anonymous" referrerpolicy="no-referrer"/>--}}

    {{--    <div class="grid place-items-center h-screen">--}}
    {{--        <div class="flex items-center">--}}
    {{--          <span class="flex-grow flex flex-col">--}}
    {{--             <span class="text-sm font-medium text-gray-900" id="availability-label">--}}
    {{--                 <i class="fa-brands fa-2xl fa-google"></i></span>--}}
    {{--          </span> &nbsp;--}}
    {{--            <button type="button"--}}
    {{--                    id="toggle"--}}
    {{--                    class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"--}}
    {{--                    role="switch" aria-checked="false" aria-labelledby="annual-billing-label">--}}
    {{--                <span aria-hidden="true" id="point"--}}
    {{--                      class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>--}}
    {{--            </button>--}}
    {{--            <span class="ml-3" id="annual-billing-label">--}}
    {{--                <i class="fa-brands fa-2xl fa-yandex-international"></i>--}}
    {{--            </span>--}}
    {{--        </div>--}}
    {{--    </div>--}}


    {{--    <script>--}}
    {{--        $('#toggle').click(function () {--}}
    {{--            $('#toggle').toggleClass("bg-gray-200, bg-gray-200");--}}
    {{--            $('#toggle').toggleClass("bg-indigo-600, bg-indigo-600");--}}
    {{--            $('#point').toggleClass("translate-x-0, translate-x-0");--}}
    {{--            $('#point').toggleClass("translate-x-5, translate-x-5");--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
