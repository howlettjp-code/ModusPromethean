@extends('layouts.app')

@section('title', 'Investors - Defining the AI Economy')

@section('content')
    <section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden bg-mp-teal-dark">
        <div class="absolute inset-0 w-full h-full image-placeholder">
             HERO IMAGE PLACEHOLDER<br>(Reference image_52.png - Investor Control Room)
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-mp-teal-dark via-mp-teal-dark/60 to-transparent"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl">
                <h1 class="text-5xl lg:text-7xl font-black text-white mb-8 uppercase drop-shadow-lg leading-none">
                    Architecting the<br>
                    <span class="text-mp-orange">AI Economy.</span>
                </h1>
                <p class="text-xl lg:text-2xl text-mp-cream font-light max-w-3xl leading-relaxed drop-shadow-md mb-12">
                    We aren't just participating in the AI revolution. We are defining the protocols, governance, and premier consumer experience that will power it.
                </p>
                <a href="#" class="inline-block bg-mp-orange hover:bg-orange-700 text-white text-xl px-12 py-5 rounded-md font-bold shadow-xl transition-all transform hover:scale-105">
                    REQUEST PITCH DECK
                </a>
            </div>
        </div>
    </section>

    <section class="bg-mp-cream py-24">
        <div class="container mx-auto px-6 mb-16 text-center">
            <h2 class="text-3xl lg:text-4xl font-black text-mp-teal uppercase mb-6">The Investment Thesis</h2>
            <p class="text-lg text-mp-teal/80 max-w-3xl mx-auto font-medium">
                A dual strategy combining an open infrastructure play with a highly defensible, proprietary consumer product.
            </p>
        </div>
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="bg-white p-10 rounded-lg shadow-xl border-t-4 border-mp-teal group hover:shadow-2xl transition">
                <div class="bg-mp-teal w-20 h-20 rounded-full flex items-center justify-center mb-8 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3m0-9c1.657 0 3-1.343 3-3S12 3 9 3 6 4.343 6 6c0 1.657 1.343 3 3 3s3-1.343 3-3" /></svg>
                </div>
                <h3 class="text-2xl font-bold text-mp-teal mb-4 uppercase">1. The Infrastructure Play</h3>
                <p class="text-mp-teal/80 text-lg leading-relaxed mb-6">
                    By publishing the open standard for AI governance, discovery, and transaction logging, we become the foundational layer of the ecosystem.
                </p>
                <ul class="text-mp-teal/70 space-y-2 font-medium">
                    <li>• Network effects through widespread adoption</li>
                    <li>• High-speed, immutable hash chain logging</li>
                    <li>• Integration with existing financial rails (Visa/MC)</li>
                </ul>
            </div>

            <div class="bg-white p-10 rounded-lg shadow-xl border-t-4 border-mp-orange group hover:shadow-2xl transition">
                <div class="bg-mp-teal w-20 h-20 rounded-full flex items-center justify-center mb-8 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <h3 class="text-2xl font-bold text-mp-teal mb-4 uppercase">2. The Consumer Play</h3>
                <p class="text-mp-teal/80 text-lg leading-relaxed mb-6">
                    Leveraging our proprietary "secret sauce," we are building the premiere Personal AI on top of our own standard.
                </p>
                 <ul class="text-mp-teal/70 space-y-2 font-medium">
                    <li>• Deep psychosocial customization</li>
                    <li>• Unrivaled personalization and context</li>
                    <li>• First-mover advantage on the secure standard</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-mp-teal py-24 text-center relative overflow-hidden">
         <div class="absolute inset-0 opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl lg:text-4xl font-black text-mp-orange mb-16 uppercase">
                The Inevitability of Governance
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-mp-cream">
                <div>
                    <div class="text-6xl lg:text-7xl font-black text-mp-orange mb-4">$1.3T+</div>
                    <div class="text-xl font-bold uppercase mb-2">Projected AI Market</div>
                    <p class="opacity-80">The rapid expansion of the autonomous agent economy is inevitable.</p>
                </div>
                <div>
                    <div class="text-6xl lg:text-7xl font-black text-mp-orange mb-4">0%</div>
                    <div class="text-xl font-bold uppercase mb-2">Current Standardization</div>
                    <p class="opacity-80">The market is currently fragmented, insecure, and lacks interoperability.</p>
                </div>
                <div>
                    <div class="text-6xl lg:text-7xl font-black text-mp-orange mb-4">1st</div>
                    <div class="text-xl font-bold uppercase mb-2">Mover Advantage</div>
                    <p class="opacity-80">Modus Promethean is the first to propose a viable, scalable governance layer.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-mp-cream py-24 text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl lg:text-5xl font-black text-mp-teal mb-10 uppercase">
                Partner in the Foundation
            </h2>
            <p class="text-xl text-mp-teal/80 mb-12 max-w-2xl mx-auto font-medium">
                We are currently opening discussions with select strategic partners who share our vision for a governed AI future.
            </p>
            <a href="{{ route('contact') }}" class="inline-block bg-mp-orange hover:bg-orange-700 text-white text-xl px-12 py-5 rounded-md font-bold shadow-xl transition-all transform hover:scale-105">
                CONTACT INVESTOR RELATIONS
            </a>
        </div>
    </section>
@endsection