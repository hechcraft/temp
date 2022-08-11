@extends('layouts.main')
@section('content')
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8" style="padding-top: 0">
            <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach($search as $item)
                    @php
                        $helper = app(\App\Helpers\PlatformsHelper::class);
                        $platformsIcon = $helper->printPlatforms($item->platforms);
                    @endphp
                    <div>
                        <div class="relative">
                            <div class="relative w-full h-72 rounded-lg overflow-hidden">
                                <img
                                    src="{{$item->backgroundImage ?? asset('storage/defaultImage.jpg')}}"
                                    class="w-full h-full object-center object-cover">
                            </div>
                            <div class="relative mt-4">
                                <h3 class="text-sm font-medium text-gray-600">
                                    <a href="https://rawg.io/games/{{$item->slug}}" class="hover:shadow-md">
                                        {{$item->name}}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-900">{{$item->released}}</p>
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
                                <input type="text" name="rawgGameId" value="{{$item->rawgId}}" hidden>
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
