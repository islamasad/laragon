<nav x-data="{ open: false }" class="bg-white" style="z-index: 999;">
    <!-- Responsive Navigation Menu -->

    <div :class="{'block': open, 'hidden': ! open}" class="flex h-screen w-screen lg:w-1/4 flex-col border-e bg-white fixed right-0" style="z-index: 998;">
        <!-- Hamburger -->
            <div class="flex items-center ml-auto mt-3 mr-2 lg:mr-10">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-rose-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Toggle Sidebar">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        
        <div class="px-4 py-6">
            
            <ul class="mt-2 space-y-1">
            
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('theme.index')" :active="request()->routeIs('theme.index')" class="">
                    {{ __('Theme') }}
                </x-nav-link>
            </li>
            <li>
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-rose-100 hover:text-gray-700">
                        <span class="text-sm font-medium"> 
                            Invitation 
                        </span>
                        <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </summary>
        
                    <ul class="mt-2 space-y-1 px-4">
                        <li>
                            <a href="{{ route('invitation.create') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-rose-100 hover:text-gray-700">
                                Theme
                            </a>
                        </li>
            
                        <li>
                            <a href="" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-rose-100 hover:text-gray-700">
                                Calendar
                            </a>
                        </li>
                    </ul>
                </details>
            </li>
        
            <li>
                <a href="" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-rose-100 hover:text-gray-700">
                Billing
                </a>
            </li>
        
            <li>
                <a href="" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-rose-100 hover:text-gray-700">
                Invoices
                </a>
            </li>
        
            <li>
                <details class="group [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2 text-gray-500 hover:bg-rose-100 hover:text-gray-700">
                    <span class="text-sm font-medium"> 
                        Account 
                    </span>
        
                    <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"/>
                        </svg>
                    </span>
                </summary>
        
                <ul class="mt-2 space-y-1 px-4">
                    <li>
                        <a href="{{ route('profile.edit') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-rose-100 hover:text-gray-700">
                            Profile
                        </a>
                    </li>
        
                    <li>
                        <a href="" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-500 hover:bg-rose-100 hover:text-gray-700">
                            Security
                        </a>
                    </li>
        
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full rounded-lg px-4 py-2 text-sm font-medium text-gray-500 [text-align:_inherit] hover:bg-rose-100 hover:text-gray-700">
                            Logout
                            </button>
                        </form>
                    </li>
                </ul>
                </details>
            </li>
            </ul>
        </div>
        
        <div class="sticky inset-x-0 bottom-0 border-t mt-auto border-gray-100">
            <a href="#" class="flex items-center gap-2 bg-white p-4 hover:bg-rose-100">
            <img
                alt="Man"
                src="{{ asset('storage/avatar/avatar.webp') }}"
                class="h-10 w-10 rounded-full object-cover"
            />
        
            <div>
                <p class="text-xs">
                <strong class="block font-medium">{{ Auth::user()->name }}</strong>
        
                <span> {{ Auth::user()->email }} </span>
                </p>
            </div>
            </a>
        </div>
    </div>

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center mr-5">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @if (isset($header))
                <div class="space-x-8 items-center flex sm:-my-px sm:ms-10">
                    {{ $header }}
                </div>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-rose-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    
</nav>
