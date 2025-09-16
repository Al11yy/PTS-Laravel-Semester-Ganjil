<!-- Complete redesign to vertical sidebar navigation with glassy dark theme -->
<nav class="fixed left-0 top-0 h-full w-64 bg-black/40 backdrop-blur-xl border-r border-white/10 shadow-2xl z-50">
    <div class="flex flex-col h-full">
        <!-- Logo Section -->
        <div class="p-6 border-b border-white/10">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                <div class="w-12 h-12 bg-gradient-to-br from-gray-300 to-gray-500 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-gray-400/25 transition-all duration-300">
                    <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                </div>
                <div>
                    <span class="text-white font-montserrat font-bold text-xl">Admin Panel</span>
                    <p class="text-gray-400 text-sm font-open-sans">Management System</p>
                </div>
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 py-6">
            <div class="space-y-2 px-4">
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white border border-white/20' : 'text-gray-300 hover:text-white hover:bg-white/10' }} transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                {{-- <a href="{{ route('products.index') }}" 
                   class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('products.*') ? 'bg-white/20 text-white border border-white/20' : 'text-gray-300 hover:text-white hover:bg-white/10' }} transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h12a1 1 0 001-1V7l-7-5zM8 15a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium">Products</span>
                </a> --}}

                <a href="{{ route('form.index') }}" 
                   class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('form.*') ? 'bg-white/20 text-white border border-white/20' : 'text-gray-300 hover:text-white hover:bg-white/10' }} transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium">Daftar Peminjaman</span>
                </a>
            </div>
        </div>

        <!-- User Profile Section -->
        <div class="p-4 border-t border-white/10">
            @auth
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" 
                        class="w-full flex items-center px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-xl text-gray-300 hover:text-white hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-gray-400/50 transition-all duration-300">
                    <div class="w-10 h-10 bg-gradient-to-br from-gray-300 to-gray-500 rounded-lg flex items-center justify-center mr-3">
                        <span class="text-black font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                    <div class="flex-1 text-left">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <div x-show="open" 
                     @click.away="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute bottom-full left-0 right-0 mb-2 bg-black/80 backdrop-blur-xl rounded-xl shadow-2xl border border-white/10 py-2">
                    <a href="{{ route('profile.edit') }}" 
                       class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/10 transition-colors duration-200">
                        Profile Settings
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/10 transition-colors duration-200">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="block text-center px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/10 transition-colors duration-200 rounded-lg">
                Log In
            </a>
            @endguest
        </div>
    </div>
</nav>
