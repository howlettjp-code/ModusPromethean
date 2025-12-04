@extends('layouts.app')

@section('title', 'Home - Your Personal AI, Governed')

@section('content')
    <section class="relative bg-mp-teal-dark min-h-[80vh] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
             <img src="{{ asset('images/home-hero-rings.png') }}" alt="Futuristic city with orbital rings" class="w-full h-full object-cover opacity-40 mix-blend-luminosity">
             <div class="absolute inset-0 bg-gradient-to-r from-mp-teal-dark via-mp-teal-dark/80 to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 flex flex-col-reverse lg:flex-row items-center">
            <div class="w-full lg:w-1/2 pt-12 lg:pt-0">
                <h1 class="text-5xl lg:text-7xl font-black text-white uppercase leading-tight mb-6 drop-shadow-xl">
                    Your <span class="text-mp-orange">Personal AI</span>.<br>
                    Truly Yours.<br>
                    Fully Governed.
                </h1>
                <p class="text-xl text-mp-cream/90 font-medium mb-10 max-w-xl leading-relaxed drop-shadow-md">
                    Stop renting generic intelligence. Build a tailored AI companion that knows you, evolves with you, and operates under an immutable standard of ownership and control.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
                    <a href="{{ route('register') }}" class="inline-block text-center bg-mp-orange hover:bg-orange-700 text-white text-xl px-10 py-5 rounded-md font-bold shadow-lg transition-all transform hover:-translate-y-1">
                        START BUILDING
                    </a>
                    <a href="{{ route('vision') }}" class="inline-block text-center border-2 border-mp-cream text-mp-cream hover:bg-mp-cream hover:text-mp-teal-dark text-xl px-10 py-5 rounded-md font-bold transition-all transform hover:-translate-y-1">
                        THE VISION
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-1/2 h-[50vh] lg:h-auto"></div>
        </div>
    </section>

    <section class="bg-mp-cream py-24 relative z-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-3xl lg:text-5xl font-black text-mp-teal uppercase mb-6">
                    The Promethean Dilemma
                </h2>
                <p class="text-xl text-mp-teal/80 max-w-3xl mx-auto font-medium leading-relaxed">
                    We have stolen fire from the gods. Raw AI power is here. But without structure ("Modus"), it is either a dangerous weapon or a useless toy. We provide the structure.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative group perspective">
                    <div class="absolute inset-0 bg-mp-orange/20 rounded-xl transform rotate-3 transition group-hover:rotate-6"></div>
                     <img src="{{ asset('images/home-metaphor-lion.png') }}" alt="Fiery beast held by a sophisticated fiber-optic leash" class="relative z-10 rounded-xl shadow-2xl transform transition group-hover:-translate-y-2 border-2 border-mp-orange/50">
                </div>

                <div>
                    <div class="space-y-12">
                        <div class="flex items-start">
                            <div class="bg-mp-teal text-white rounded-full p-4 flex-shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" /></svg>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-2xl font-bold text-mp-teal mb-2 uppercase">Deeply Personal Architecture</h3>
                                <p class="text-mp-teal/80 text-lg leading-relaxed font-medium">
                                    Forget generic chatbots. Design your companion's mind on dozens of psychosocial axes. It remembers your history, understands your context, and evolves with you.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-mp-orange text-white rounded-full p-4 flex-shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-2xl font-bold text-mp-teal mb-2 uppercase">Immutable Governance</h3>
                                <p class="text-mp-teal/80 text-lg leading-relaxed font-medium">
                                    Built on our open standard (RFC 9697). Your AI's constraints are enforced cryptographically outside of its own control plane. Trust through architecture.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-mp-teal text-white rounded-full p-4 flex-shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-2xl font-bold text-mp-teal mb-2 uppercase">True Ownership & Portability</h3>
                                <p class="text-mp-teal/80 text-lg leading-relaxed font-medium">
                                    You are not locked into a walled garden. Your AI's personality weights and history belong to you and can move between compliant platforms.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-mp-teal-dark py-24 text-center relative overflow-hidden">
         <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(249, 115, 22, 0.2)" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-4xl lg:text-6xl font-black text-white mb-10 uppercase drop-shadow-lg">
                Take The Reins.
            </h2>
            <p class="text-xl text-mp-cream/90 mb-12 max-w-2xl mx-auto font-medium leading-relaxed">
                Join the private beta. Be among the first to architect a truly personal, governed AI companion.
            </p>
            <a href="{{ route('register') }}" class="inline-block bg-mp-orange hover:bg-orange-700 text-white text-xl px-16 py-6 rounded-md font-bold shadow-2xl transition-all transform hover:scale-105">
                GET EARLY ACCESS
            </a>
        </div>
    </section>
@endsection