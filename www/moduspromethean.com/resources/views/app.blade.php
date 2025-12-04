<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Modus Promethean | @yield('title', 'Your Personal AI, Governed')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mp: {
                            teal: '#134e4a',
                            'teal-dark': '#0f3f3b',
                            orange: '#f97316',
                            cream: '#fef3c7',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'glow': '0 0 15px rgba(249, 115, 22, 0.5)',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .image-placeholder { background-color: #ccc; display: flex; justify-content: center; align-items: center; color: #666; font-weight: bold; border: 2px dashed #999; }
        /* Glow hover effect for interactive elements */
        .hover\:shadow-glow:hover { box-shadow: 0 0 15px rgba(249, 115, 22, 0.6); }
    </style>
</head>
<body class="bg-mp-cream antialiased flex flex-col min-h-screen">

    <header class="bg-mp-teal text-white py-4 sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                 <div class="h-10 w-10 bg-mp-orange rounded-tl-2xl rounded-br-2xl rounded-tr-md rounded-bl-md flex items-center justify-center group-hover:shadow-glow transition">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 9.15T9.879 16.121z" /></svg>
                </div>
                <span class="text-xl font-bold tracking-tight">Modus Promethean</span>
            </a>

            <nav class="hidden lg:flex items-center space-x-8 font-medium">
                <a href="{{ route('vision') }}" class="hover:text-mp-orange transition">Vision</a>
                <a href="{{ route('product') }}" class="hover:text-mp-orange transition">Product</a>
                <a href="{{ route('how') }}" class="hover:text-mp-orange transition">How It Works</a>
                <a href="{{ route('about') }}" class="hover:text-mp-orange transition">About</a>
            </nav>

            <div class="flex items-center space-x-6 font-medium">
                <a href="{{ route('login') }}" class="hidden md:block hover:text-mp-orange transition">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-mp-orange hover:bg-orange-600 text-white px-6 py-3 rounded-md font-bold transition shadow-md hover:shadow-lg hover:-translate-y-0.5">
                    Get Access
                </a>
                @endif
            </div>
        </div>
        <div class="lg:hidden container mx-auto px-6 mt-4 pb-2 text-center text-sm opacity-70">
            [Mobile Menu Placeholder]
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-mp-teal-dark text-white py-16">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="h-8 w-8 bg-mp-orange rounded-tl-xl rounded-br-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" /></svg>
                    </div>
                    <span class="text-xl font-bold">Modus Promethean</span>
                </div>
                <p class="text-mp-cream/70 mb-6">
                    Unleashing personal AI potential through immutable open standards and governance.
                </p>
                <p class="text-sm opacity-50">© {{ date('Y') }} Modus Promethean.<br>All rights reserved.</p>
            </div>

            <div class="col-span-1">
                <h4 class="text-mp-orange font-bold mb-6 uppercase tracking-wider">Company</h4>
                <ul class="space-y-3 font-medium">
                    <li><a href="{{ route('vision') }}" class="hover:text-mp-orange transition">Vision</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-mp-orange transition">About Us</a></li>
                    <li><a href="{{ route('investors') }}" class="hover:text-mp-orange transition">Investors</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-mp-orange transition">Contact</a></li>
                </ul>
            </div>

            <div class="col-span-1">
                <h4 class="text-mp-orange font-bold mb-6 uppercase tracking-wider">Platform</h4>
                <ul class="space-y-3 font-medium">
                    <li><a href="{{ route('product') }}" class="hover:text-mp-orange transition">Personal AI</a></li>
                    <li><a href="{{ route('how') }}" class="hover:text-mp-orange transition">How It Works</a></li>
                    <li><a href="#" class="hover:text-mp-orange transition">Standards Documentation</a></li>
                </ul>
            </div>

            <div class="col-span-1">
                <h4 class="text-mp-orange font-bold mb-6 uppercase tracking-wider">Account</h4>
                 <ul class="space-y-3 font-medium">
                    <li><a href="{{ route('login') }}" class="hover:text-mp-orange transition text-mp-orange">Login</a></li>
                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="hover:text-mp-orange transition text-mp-orange">Sign Up</a></li>
                    @endif
                </ul>
                 <div class="flex space-x-4 mt-8">
                    <a href="#" class="text-white/60 hover:text-mp-orange transition"><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg></a>
                    <a href="#" class="text-white/60 hover:text-mp-orange transition"><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>