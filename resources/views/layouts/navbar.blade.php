<header class="bg-gray-900 shadow-sm lg:static lg:overflow-y-visible mb-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between xl:grid xl:grid-cols-10 lg:gap-8">
            <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img class="block h-8 w-auto"
                             src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                             alt="Workflow">
                    </a>
                </div>
            </div>
            <div class="min-w-0 flex-1  md:px-8 lg:px-0 xl:col-span-6">
                <form id="gameSearch" method="get" action="{{route('game.search')}}">
                    <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 ">
                        <div class="w-full">
                            <label for="search" class="sr-only">Search game</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input id="search" name="search"
                                       class="block w-full bg-gray-700 border text-white border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-white focus:outline-none focus:text-white focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                       value="{{ (isset($query)) ? urldecode($query) : ''}}"
                                       placeholder="Search games" type="search">
                            </div>
                        </div>
                        <button type="submit"
                                class="ml-2 mt-2 py-2 px-5 mr-2 mb-2 text-sm font-medium text-white focus:outline-none bg-gray-700 rounded-lg border border-gray-300 hover:bg-gray-400 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                        id="mobile_menu_button"
                        class="-mx-2 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-2">
                @guest
                    <a href="{{route('login')}}" class="text-white">Log In</a>
                    <a class="ml-3 text-white" href="{{route('register')}}">Sign In</a>
                @endguest
                <!-- Profile dropdown -->
                @auth
                    <div class="flex items-center md:order-2">
                        <button type="button"
                                class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{asset($user->avatar)}}" alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div
                            class="z-50 my-4 text-base list-none bg-gray-900 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 hidden"
                            id="user-dropdown"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(1011px, 61px);"
                            data-popper-placement="bottom">
                            <div class="py-3 px-4">
                                <span class="block text-sm text-white dark:text-white">{{$user->name}}</span>
                                <span
                                    class="block text-sm font-medium text-white truncate dark:text-gray-400">{{$user->email}}</span>
                            </div>
                            <ul class="py-1" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="{{route('tracked.games')}}"
                                       class="block py-2 px-4 text-sm text-white hover:bg-text-white dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Tracked
                                        Games</a>
                                </li>
                                <li>
                                    <a href="{{route('profile', ['user' => $user->id])}}"
                                       class="block py-2 px-4 text-sm text-white hover:bg-text-white dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                                </li>
                                <li>
                                    <a href="{{route('logout')}}"
                                       class="block py-2 px-4 text-sm text-white hover:bg-text-white dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>
                        <button data-collapse-toggle="mobile-menu-2" type="button"
                                class="inline-flex items-center p-2 ml-1 text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav class="hidden" aria-label="Global" id="mobile_menu">
        @guest
            <div class="max-w-3xl mx-auto px-2 pt-2 pb-3 space-y-1 sm:px-4">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "hover:bg-gray-50" -->

                <a href="{{route('login')}}" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-white font-medium">Log In</a>

                <a href="{{route('register')}}" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-white font-medium">Sign In</a>

            </div>
        @endguest
        @auth
                <div class="border-t border-gray-200 pt-4 pb-3">
                    <div class="max-w-3xl mx-auto px-4 flex items-center sm:px-6">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="{{asset($user->avatar)}}"
                                 alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">{{$user->name}}</div>
                            <div class="text-sm font-medium text-white">{{$user->email}}</div>
                        </div>
                    </div>
                    <div class="mt-3 max-w-3xl mx-auto px-2 space-y-1 sm:px-4">
                        <a href="#"
                           class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-gray-50 hover:text-gray-900">Your
                            Profile</a>

                        <a href="#"
                           class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-gray-50 hover:text-gray-900">Settings</a>

                        <a href="#"
                           class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-gray-50 hover:text-gray-900">Sign
                            out</a>
                    </div>
                </div>
        @endauth
    </nav>
</header>

<script>
    $(document).ready(function () {
        $('#search').keypress(function (e) {
            if (e.which == 13) {
                $('form#gameSearch').submit();
                return false;
            }
        });

        $('#mobile_menu_button').click(function () {
            $('#mobile_menu').toggleClass('hidden')
        });
    })
</script>
