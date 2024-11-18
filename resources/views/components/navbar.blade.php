<!-- resources/views/components/navbar.blade.php -->

<nav class="bg-green-600" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }} "><img class="h-8 w-8 rounded" src="{{ asset('images/logo.png') }}"
                            alt="Your Company"></a>

                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('home') }}"
                            class="{{ request()->is('/') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Home</a>
                        <a href="{{ route('offerbook') }}"
                            class="{{ request()->is('offer-book') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Buat
                            Penawaran</a>
                        <a href="{{ route('youroffer') }}"
                            class="{{ request()->is('your-offer') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Buku
                            Anda</a>
                        <a href="{{ route('alloffers') }}"
                            class="{{ request()->is('all-offers') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Riwayat
                            Pertukaran</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                        <div class="relative ml-3">
                            <div>
                                <button type="button"
                                    class="flex items-center rounded-full bg-green-600 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                    x-on:click="isOpen = !isOpen">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=mp' }}"
                                        alt="Profile Image">
                                    <span class="ml-2 text-white">{{ Auth::user()->name }}</span>
                                </button>
                            </div>
                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Profil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="user-menu-item-1">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="relative ml-3">
                            <div>
                                <button type="button"
                                    class="flex items-center rounded-full bg-green-600 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                    x-on:click="isOpen = !isOpen">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="https://www.gravatar.com/avatar/?d=mp"
                                        alt="Profile Image">
                                    <span class="ml-2 text-white">Guest</span>
                                </button>
                            </div>
                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="{{ route('login.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Login</a>
                                <a href="{{ route('register.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">Register</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center rounded-md bg-green-600 p-2 text-gray-300 hover:bg-green-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600"
                    aria-controls="mobile-menu" aria-expanded="false" x-on:click="isOpen = !isOpen">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="md:hidden" id="mobile-menu" x-show="isOpen">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <a href="{{ route('home') }}"
                class="{{ request()->is('/') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Home</a>
            <a href="{{ route('offerbook') }}"
                class="{{ request()->is('offer-book') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Buat
                Penawaran</a>
            <a href="{{ route('youroffer') }}"
                class="{{ request()->is('your-offer') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Buku
                Anda</a>
            <a href="{{ route('alloffers') }}"
                class="{{ request()->is('all-offers') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Riwayat
                Pertukaran</a>
            @auth
                <div class="border-t border-green-700 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <img class="h-10 w-10 rounded-full"
                            src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=mp' }}"
                            alt="Profile Image">
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="{{ route('profile.show') }}"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-green-700 hover:text-white">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-base font-medium text-gray-300 hover:bg-green-700 hover:text-white">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="border-t border-green-700 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <img class="h-10 w-10 rounded-full" src="https://www.gravatar.com/avatar/?d=mp"
                            alt="Profile Image">
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Guest</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="{{ route('login.show') }}"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-green-700 hover:text-white">Login</a>
                        <a href="{{ route('register.show') }}"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-green-700 hover:text-white">Register</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
