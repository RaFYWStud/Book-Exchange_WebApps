<nav class="bg-green-600" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-green-700 text-white", Default: "text-gray-300 hover:bg-green-700 hover:text-white" -->
                        <a href="{{ route('home') }}"
                            class="{{ request()->is('/') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} rounded-md  px-3 py-2 text-sm font-medium"
                            aria-current="page">Home</a>
                        <a href="{{ route('offerbook') }}"
                            class="{{ request()->is('offer-book') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Buat Penawaran</a>
                        <a href="{{ route('youroffer') }}"
                            class="{{ request()->is('your-offer') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Buku Anda</a>
                        <a href="{{ route('alloffers') }}"
                            class="{{ request()->is('all-offers') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Riwayat Pertukaran</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <button type="button"
                        class="relative rounded-full bg-green-600 p-1 text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600">
                        <span class="absolute -inset-1.5"></span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </button>
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                class="flex rounded-full bg-green-600 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-600"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                x-on:click="isOpen = !isOpen">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>
                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            @guest
                                <a href="{{ route('login.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Login</a>
                            @else
                                @auth
                                    <div class="block px-4 py-2 text-l font-bold text-gray-900">
                                        {{ Auth::user()->name }}
                                    </div>
                                @endauth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="user-menu-item-1">Logout</button>
                                </form>
                            @endguest
                        </div>
                    </div>
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
                class="{{ request()->is('/') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium"
                aria-current="page">Home</a>
            <a href="{{ route('offerbook') }}"
                class="{{ request()->is('offer-book') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Buat
                Penawaran</a>
            <a href="{{ route('youroffer') }}"
                class="{{ request()->is('your-offer') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Buku
                Anda</a>
            <a href="{{ route('alloffers') }}"
                class="{{ request()->is('all-offers') ? 'bg-green-700 text-white' : 'text-gray-300 hover:bg-green-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">Riwayat
                Pertukaran</a>
        </div>
        <div class="border-t border-green-700 pt-4 pb-3">
            <div class="space-y-1 px-2">
                @guest
                    <a href="{{ route('login.show') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-green-700 hover:text-white">Login</a>
                @else
                    @auth
                        <div class="block px-4 py-2 text-l font-bold text-gray-900">
                            {{ Auth::user()->name }}
                        </div>
                    @endauth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-4 py-2 text-base font-medium text-gray-300 hover:bg-green-700 hover:text-white">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
