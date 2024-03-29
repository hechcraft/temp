@extends('layouts.main')
@section('content')
    <div class="bg-gray-900 min-h-full flex flex-col lg:relative">
        <div class="flex-grow flex flex-col">
            <main class="flex-grow flex flex-col bg-gray-900">
                <div class="flex-grow mx-auto max-w-7xl w-full flex flex-col px-4 sm:px-6 lg:px-8">
                    <div class="flex-shrink-0 my-auto py-16 sm:py-32">
                        <p class="text-sm font-semibold text-white uppercase tracking-wide">401 error</p>
                        <h1 class="mt-2 text-4xl font-extrabold text-white tracking-tight sm:text-5xl">Unauthorized</h1>
                        <div class="mt-6">
                            <a href="{{route('login')}}" class="text-white font-medium hover:text-indigo-500">Login</a>
                        </div>
                        <div class="mt-2">
                            <a href="{{route('register')}}" class="text-white font-medium hover:text-indigo-500">Register</a>
                        </div>
                        <div class="mt-2">
                            <a href="/" class="text-white font-medium hover:text-indigo-500">Go back home</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{$image}}" alt="">
        </div>
    </div>
@endsection
