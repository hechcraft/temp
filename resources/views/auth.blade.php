@extends('layouts.main')
@section('content')
    <form method="post" action="{{route('profile.update', ['user' => $user->id])}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="max-w-4xl mx-auto flex flex-col md:px-8 xl:px-0">
            <main class="flex-1">
                <div class="relative max-w-4xl mx-auto md:px-8 xl:px-0">
                    <div class="pt-10 pb-16">
                        <div class="px-4 sm:px-6 md:px-0">
                            <h1 class="text-3xl font-extrabold text-gray-900">Settings</h1>
                        </div>
                        <div class="px-4 sm:px-6 md:px-0">
                            <div class="py-6">
                                <!-- Description list with inline editing -->
                                <div class="mt-10 divide-y divide-gray-200">
                                    <div class="space-y-1">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Profile</h3>
                                        <p class="max-w-2xl text-sm text-gray-500">This information will be displayed
                                            publicly so be careful what you share.</p>
                                    </div>
                                    <div class="mt-6">
                                        <dl class="divide-y divide-gray-200">
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                <dt class="text-sm font-medium text-gray-500">Name</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <input class="flex-grow border-2 border-gray-500/50"
                                                           value="{{$user->name}}" name="name"/>
                                                    @error('name')
                                                    <p class="mt-2 text-sm text-red-600" id="email-error">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-gray-500">Photo</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                  <span class="flex-grow">
                                                    <img class="h-8 w-8 rounded-full"
                                                         src="{{$user->avatar ?? asset('storage.jpg/defaultAvatar.jpg')}}"
                                                         alt="">
                                                  </span>
                                                    <input type="file" id="avatar" name="avatar"
                                                           class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"/>
                                                    </span>
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <input class="flex-grow border-2 border-gray-500/50"
                                                           value="{{$user->email}}" name="email"/>
                                                    @error('email')
                                                    <p class="mt-2 text-sm text-red-600" id="email-error">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-gray-500">Password</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <input class="flex-grow border-2 border-gray-500/50"
                                                           value=""  type="password" name="password" required/>
                                                    @error('password')
                                                    <p class="mt-2 text-sm text-red-600" id="email-error">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-gray-500">Confirm password</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <input class="flex-grow border-2 border-gray-500/50"
                                                           value="" type="password" required name="password_confirmation"/>
                                                    @error('password_confirmation')
                                                    <p class="mt-2 text-sm text-red-600" id="email-error">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                                </dd>
                                            </div>
                                            <div
                                                class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-b sm:border-gray-200">
                                                <dt class="text-sm font-medium text-gray-500">Search Engine</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <div class="mt-1 flex  shadow-sm">
                                                        <span
                                                            class="inline-flex items-center px-3 bg-gray-50 text-gray-500 sm:text-sm">
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
                                                        <input type="text" hidden value="{{$user->search_engine}}" id="toggleValue" name="search_engine">
                                                            <span class="ml-3" id="annual-billing-label">
                                                                <i class="fa-brands fa-2xl fa-yandex-international"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit">asd</button>
                    </div>
                </div>
            </main>
        </div>
    </form>
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
