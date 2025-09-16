<x-guest-layout>
    <!-- Modern login form with glassy dark theme styling -->
    <div class="space-y-6">
        <div class="text-center space-y-2">
            <h2 class="text-3xl font-montserrat font-bold text-white">Welcome Back</h2>
            <p class="text-gray-400 font-open-sans">Sign in to your account</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="p-4 rounded-2xl bg-green-500/20 text-green-300 border border-green-500/30 backdrop-blur-sm">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <label for="email" class="block text-sm font-semibold text-gray-300">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                    </div>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username"
                           class="block w-full pl-10 pr-3 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300"
                           placeholder="Enter your email">
                </div>
                @if ($errors->get('email'))
                    <div class="text-red-400 text-sm space-y-1">
                        @foreach ($errors->get('email') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-semibold text-gray-300">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <input id="password" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="current-password"
                           class="block w-full pl-10 pr-3 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300"
                           placeholder="Enter your password">
                </div>
                @if ($errors->get('password'))
                    <div class="text-red-400 text-sm space-y-1">
                        @foreach ($errors->get('password') as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" 
                           type="checkbox" 
                           name="remember"
                           class="rounded bg-white/10 border-white/20 text-silver-500 shadow-sm focus:ring-silver-400/50 focus:ring-offset-0">
                    <span class="ml-2 text-sm text-gray-300">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-silver-400 hover:text-silver-300 transition-colors duration-200" 
                       href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <div class="space-y-4">
                <!-- Changed text from black to white for better readability -->
                <button type="submit" 
                        class="w-full flex justify-center py-3 px-4 bg-gradient-to-r from-silver-500 to-silver-600 text-white font-semibold rounded-2xl shadow-2xl hover:shadow-silver-500/25 focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:ring-offset-2 focus:ring-offset-black/50 transition-all duration-300 transform hover:scale-105">
                    Sign In
                </button>

                <div class="text-center">
                    <span class="text-gray-400 text-sm">Don't have an account? </span>
                    <a href="{{ route('register') }}" 
                       class="text-silver-400 hover:text-silver-300 font-semibold transition-colors duration-200">
                        Sign up
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
