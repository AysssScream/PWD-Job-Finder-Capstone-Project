   <style>
       /* Custom shadow class for 3D effect */
       .shadow-3d {
           box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.4);
           transition: transform 0.3s ease, box-shadow 0.3s ease;
       }
   </style>
   <nav x-data="{ open: false }" class=" bg-white shadow-lg w-full p-4 mb-3 py-4 dark:bg-gray-800 dark:shadow-lg"
       id="custom-navbar">
       <div class="container mx-auto flex justify-between items-center h-full">
           <!-- Logo -->

           <div style="display: flex; align-items: center; justify-content: flex-start; cursor: pointer;"
               onclick="redirectToHomepage()">
               <img src="/images/lightnavbarlogo.webp" width="200" height="200" id="navbarLogo"
                   style="max-width: 100%; height: auto; margin-right: 8rem;" alt="My Website">
           </div>


           <!-- Desktop Navigation Links -->
           <div class="hidden space-x-8 sm:flex justify-center items-center">
               <a href="{{ url('/') }}" class="nav-link">
               </a>
               <a href="{{ url('/') }}" class="nav-link">
                   <i class="fa-solid fa-house"></i>
                   {{ __('messages.navigation.HOME') }}
               </a>
               <a href="{{ route('aboutus') }}" class="nav-link">
                   <i class="fas fa-info-circle"></i> <!-- Example of an about icon -->
                   {{ __('messages.navigation.ABOUT US') }}
               </a>
               <a href="{{ url('contact') }}" class="nav-link">
                   <i class="fas fa-envelope"></i> <!-- Example of a contact icon -->
                   {{ __('messages.navigation.ASK FOR SUPPORT') }}
               </a>
           </div>

           <!-- Hamburger Menu for Mobile -->
           <div class="flex items-start sm:hidden">
               <button @click="open = !open" id="navbar-toggle"
                   class="inline-flex items-center bg-gray-800 dark:bg-gray-700 justify-center p-2 rounded-md text-white hover:text-gray-500 focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out">
                   <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                       <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                           stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M4 6h16M4 12h16M4 18h16" />
                       <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                           stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                   </svg>
               </button>
           </div>

           <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
               <div class="pt-2 pb-3 space-y-1">
                   <x-responsive-nav-link :href="url('/')"
                       class="block px-4 py-2 text-gray-200 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white">
                       {{ __('Home Page') }}
                   </x-responsive-nav-link>
                   <x-responsive-nav-link :href="route('login')"
                       class="block px-4 py-2 text-gray-200 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white">
                       {{ __('Login') }}
                   </x-responsive-nav-link>
                   <x-responsive-nav-link :href="route('register')"
                       class="block px-4 py-2 text-gray-200 hover:bg-gray-700 dark:hover:bg-gray-600 hover:text-white">
                       {{ __('Register') }}
                   </x-responsive-nav-link>
               </div>
           </div>
   </nav>

   <script>
       function redirectToHomepage() {
           window.location.href = '{{ url('/') }}';
       }
   </script>
