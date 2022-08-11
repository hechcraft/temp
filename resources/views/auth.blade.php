@extends('layouts.main')
@section('content')
    <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <!--
      This example requires updating your template:
      ```
      <html class="h-full bg-white">
      <body class="h-full">
      ```
    -->

    <!-- Content area -->
    <form class="">
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
                                                           value="{{$user->name}}"/>
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-gray-500">Photo</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          <span class="flex-grow">
                            <img class="h-8 w-8 rounded-full"
                                 src="{{$user->avatar ?? asset('storage/defaultAvatar.jpg')}}"
                                 alt="">
                          </span>
                            <button type="button"
                                    class="bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Update</button>
                          </span>
                                                </dd>
                                            </div>
                                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <input class="flex-grow border-2 border-gray-500/50"
                                                           value="{{$user->email}}"/>
                                                </dd>
                                            </div>
                                            <div
                                                class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-b sm:border-gray-200">
                                                <dt class="text-sm font-medium text-gray-500">Search Engine</dt>
                                                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                    <span class="flex-grow">Human Resources Manager</span>
                                                </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button>asd</button>
                    </div>
                </div>
            </main>
        </div>
    </form>
@endsection
