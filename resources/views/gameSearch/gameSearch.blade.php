@extends('layouts.main')
@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8" style="padding-top: 0">
            <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach($search as $item)
                    @php
                        $helper = new \App\Helpers\PlatformsHelper();
                        $platformsIcon = $helper->printPlatforms(data_get($item, 'platforms'));
                    @endphp
                    <div>
                        <div class="relative">
                            <div class="relative w-full h-72 rounded-lg overflow-hidden">
                                <img
                                    src="{{data_get($item, 'short_screenshots.0.image') ?? 'https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image-620x600.jpg'}}"
                                    class="w-full h-full object-center object-cover">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-900">{{data_get($item, 'name')}}</h3>
                                <p class="mt-1 text-sm text-gray-900">{{data_get($item,'released') ?? 'N/A'}}</p>
                                <ul role="list" class="mt-auto pt-6 flex items-center justify-center space-x-3">
                                    @foreach($platformsIcon as $icon)
                                        <li class="w-6 h-6">
                                            {!! $icon !!}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div
                                class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                                <div aria-hidden="true"
                                     class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                            </div>
                        </div>
                        <form action="{{route('game.search.save')}}" method="post">
                            @csrf
                            <div class="mt-6">
                                <input type="text" name="rawgGameId" value="{{data_get($item, 'id')}}" hidden>
                                <button type="submit"
                                        class="relative flex bg-gray-100 border border-transparent w-full rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-200">
                                    Track this game
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
