   <x-guest-layout>
       <title>AccessiJobs | Login Page</title>
       <x-auth-session-status class="mb-4" :status="session('status')" />
       <form method="POST" action="{{ route('login') }}">
           @csrf
           <div class="flex-grow">
               <div class="container mx-auto">
                   <div class="flex justify-center">
                       <div class="w-full">
                           <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                               <nav class="text-blue-500 text-lg" aria-label="Breadcrumb">
                                   <ol class="list-none p-0 inline-flex">
                                       <li class="flex items-center">
                                           <a href="{{ route('welcome') }}"
                                               class="hover:text-black dark:hover:text-white text-lg">
                                               <i class="fas fa-home"></i> {{ __('messages.auth.home') }}
                                           </a>
                                           <svg class="h-5 w-auto text-gray-500 mx-1" fill="currentColor"
                                               viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                               <path fill-rule="evenodd"
                                                   d="M9.293 5.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L12.586 12H4a1 1 0 010-2h8.586l-4.293-4.293a1 1 0 010-1.414z"
                                                   clip-rule="evenodd"></path>
                                           </svg>
                                       </li>
                                       <li class="flex items-center">
                                           <a href="" class="text-black text-lg dark:text-gray-200">
                                               {{ __('messages.auth.login') }}</a>
                                       </li>
                                   </ol>
                               </nav>
                               <div class="mb-4 text-md text-black-600 dark:text-gray-200 text-justify">
                                   <i class="fas fa-sign-in-alt mr-2 text-blue-500"></i>
                                   {!! __('messages.auth.login_instructions') !!}
                               </div>
                               <img src="/images/bannerlogin.png" alt="Image description"
                                   class="block mx-auto w-full h-auto max-w-2xl rounded-lg">

                               <div class="mt-4 grid grid-cols-1 md:grid-cols-1 gap-4">
                                   <div>
                                       <br>
                                       <div class="relative ">
                                           <x-input-label for="email" :value="__('Email')" />

                                           <div class="flex items-center">
                                               <i
                                                   class="fas fa-envelope absolute left-3 text-gray-400 dark:text-gray-500"></i>
                                               <x-text-input id="email" class="block mt-1 w-full pl-10"
                                                   type="email" name="email" :value="old('email')" required autofocus
                                                   autocomplete="username" placeholder="Enter Your Email" />
                                           </div>
                                           <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                       </div>
                                       <br>
                                       <div>
                                           <x-input-label for="password" :value="__('Password')" />
                                           <x-password-text id="password" type="password" name="password"
                                               placeholder="Enter Your Password" required
                                               autocomplete="current-password" />
                                           <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                       </div>
                                       <br>
                                       <div class="flex items-center">
                                           <label for="remember_me" class="inline-flex items-center">
                                               <input id="remember_me" type="checkbox"
                                                   class="rounded dark:bg-black-900 border-black-300 dark:border-black-700 text-black-600 shadow-sm focus:ring-black-500 dark:focus:ring-black-600 dark:focus:ring-offset-black-800"
                                                   name="remember">
                                               <span
                                                   class="ms-2 text-sm text-black-600 dark:text-gray-200">{{ __('messages.auth.remember_me') }}</span>

                                           </label>
                                       </div>
                                       <br>
                                       <div class="flex justify-between">
                                           @if (Route::has('password.requestpass'))
                                               <a class="underline text-sm text-black-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500 dark:focus:ring-offset-gray-800"
                                                   href="{{ route('password.requestpass') }}">
                                                   {{ __('messages.auth.forgot_password') }}
                                               </a>
                                           @endif

                                           <x-primary-button class="ms-3">
                                               {{ __('messages.auth.login') }}
                                           </x-primary-button>
                                       </div>
                                   </div>
                               </div>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </form>
   </x-guest-layout>

   <footer class="bg-gray-800 text-white w-full py-4">
       <div class="container mx-auto text-center">
           <span>&copy; 2024 AccessiJobs. All rights reserved.</span>
       </div>
   </footer>

   <style>
       .image-container {
           display: flex;
           justify-content: center;
           align-items: center;
       }

       /* Set the width of the image to half of its container */
       .image-container img {
           width: 50%;
           height: auto;
       }
   </style>
