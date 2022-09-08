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
                            <h1 class="text-3xl font-extrabold text-white">Settings</h1>
                        </div>
                        <div class="px-4 sm:px-6 md:px-0">
                            <div class="py-6">
                                <!-- Description list with inline editing -->
                                <div class="mt-10 divide-y divide-gray-200">
                                    <div class="space-y-1">
                                        <h3 class="text-lg leading-6 font-medium text-white">Profile</h3>
                                    </div>
                                    <div class="mt-6">
                                        <dl class="divide-y divide-gray-200">
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                                <dt class="text-sm font-medium text-white">Name</dt>
                                                <dd class="mt-1 flex text-sm text-white sm:mt-0 sm:col-span-2">
                                                    <input
                                                        class="flex-grow border-2 rounded-lg bg-gray-600 border-gray-500/50"
                                                        value="{{$user->name}}" name="name"/>
                                                    @error('name')
                                                    <p class="mt-2 text-sm text-red-600" id="email-error">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-white">Avatar</dt>
                                                <dd class="mt-1 flex text-sm text-white sm:mt-0 sm:col-span-2">
                                                  <span class="flex-grow">
                                                    <img class="h-8 w-8 rounded-full"
                                                         src="{{asset($user->avatar)}}"
                                                         alt="">
                                                  </span>
                                                    <input type="file" id="avatar" name="avatar"
                                                           class="rounded-lg font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"/>
                                                    </span>
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-white">Email</dt>
                                                <dd class="mt-1 flex text-sm text-white sm:mt-0 sm:col-span-2">
                                                    <input
                                                        class="flex-grow border-2 rounded-lg bg-gray-600 border-gray-500/50"
                                                        value="{{$user->email}}" name="email"/>
                                                    @error('email')
                                                    <p class="mt-2 text-sm text-red-600" id="email-error">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-white">Password</dt>
                                                <dd class="mt-1 flex text-sm text-white sm:mt-0 sm:col-span-2">
                                                    <input
                                                        class="flex-grow border-2 rounded-lg bg-gray-600 border-gray-500/50"
                                                        value="" type="password" name="password" required/>
                                                    @error('password')
                                                    <p class="mt-2 text-sm text-red-600" id="email-error">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-white">Confirm password</dt>
                                                <dd class="mt-1 flex text-sm text-white sm:mt-0 sm:col-span-2">
                                                    <input
                                                        class="flex-grow border-2 rounded-lg bg-gray-600 border-gray-500/50"
                                                        value="" type="password"
                                                        name="password_confirmation" required/>
                                                    @error('password_confirmation')
                                                    <p class="mt-2 text-sm text-red-600" id="email-error">
                                                        {{$message}}
                                                    </p>
                                                    @enderror
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                @if(!$user->telegram_id)
                                                    <dt class="text-sm font-medium text-white">Telegram account</dt>
                                                    <script async src="https://telegram.org/js/telegram-widget.js?19"
                                                            data-telegram-login="DenYatsenkoDebugBot" data-size="medium"
                                                            data-auth-url="/telegram" data-userpic="false"
                                                            data-request-access="write"></script>
                                                @else
                                                    <dt class="text-sm font-medium text-white">Telegram account</dt>
                                                    <div class="grid-cols-2">
                                                        <a href="{{route('delete.telegram.id')}}"
                                                           class="inline-flex items-center px-3.5 py-2 border border-transparent
                                                                text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-red-400 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            Delete telegram ID
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-white">Enable search engines</dt>
                                                <dd class="mt-1 flex text-sm text-white sm:mt-0 sm:col-span-2">
                                                    <div class="flex items-center">
                                                        <input id="checked-checkbox" type="checkbox"
                                                               name="status_search_engine" @if($user->search_engine_enable) checked @endif
                                                               class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    </div>
                                                </dd>
                                            </div>
                                            <div
                                                class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-b sm:border-gray-200">
                                                <dt class="text-sm font-medium text-white">Search Engine</dt>
                                                <dd class="mt-1 flex  sm:mt-0 sm:col-span-2">
                                                    <div class="mt-1 flex  shadow-sm">
                                                        <span
                                                            class="inline-flex items-center px-3 bg-gray-900 text-white sm:text-sm">
                                                            <span class="flex-grow-0 mr-2">
                                                                <span class="text-sm font-medium text-white"
                                                                      id="availability-label">
                                                                            <i class="fa-brands fa-2xl fa-google"></i>
                                                                </span>
                                                            </span>
                                                        <button type="button"
                                                                id="toggle"
                                                                class="bg-gray-600 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                role="switch" aria-checked="false"
                                                                aria-labelledby="annual-billing-label">
                                                            <span aria-hidden="true" id="point"
                                                                  class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200">
                                                            </span>
                                                        </button>
                                                        <input type="text" hidden value="{{$user->search_engine}}"
                                                               id="toggleValue" name="search_engine">
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
                        <button type="submit"
                                class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-white rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                          <span
                              class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-gray-900 rounded-md group-hover:bg-opacity-0">
                              Update
                          </span>
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            if ($('#toggleValue').val() === "1") {
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
