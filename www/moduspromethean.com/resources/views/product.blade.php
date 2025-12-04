@extends('layouts.app')

@section('title', 'Product - Your Personal AI')

@section('content')
    <section class="bg-mp-teal py-20 lg:py-28 relative overflow-hidden text-center">
        <div class="container mx-auto px-6 relative z-10">
            <h1 class="text-4xl lg:text-6xl font-black text-mp-orange mb-6 uppercase drop-shadow-md leading-tight">
                Not just a chatbot.<br>An extension of you.
            </h1>
            <p class="text-xl text-mp-cream font-light max-w-3xl mx-auto mb-12 leading-relaxed">
                Move beyond generic responses. Modus Promethean allows you to build a deeply personalized AI companion that understands your context, history, and goals.
            </p>
            
            <div class="flex justify-center">
                <div class="max-w-3xl w-full h-[450px] rounded-lg shadow-2xl glow-effect image-placeholder bg-mp-teal-dark">
                     HERO GRAPHIC PLACEHOLDER<br>(Reference image_39.png - Brain to Machine Structure)
                     </div>
            </div>
        </div>
        <div class="absolute inset-0 opacity-5 pointer-events-none mix-blend-overlay" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%27100%27 height=%27100%27 viewBox=%270 0 100 100%27%3E%3Cpath fill=%27%23f97316%27 d=%27M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM32 63c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm57-13c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z%27/%3E%3C/svg%3E');"></div>
    </section>

    <section class="bg-mp-cream py-24">
        <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center gap-16">
            <div class="w-full lg:w-1/2 order-2 lg:order-1">
                <h2 class="text-3xl lg:text-4xl font-black text-mp-teal mb-6 uppercase">
                    Modular Personality.<br>Architected by you.
                </h2>
                <p class="text-lg text-mp-teal/80 mb-8 leading-relaxed font-medium">
                    Define the core traits of your AI companion. Select from pre-built modules like "Analytical," "Creative," or "Empathetic," or custom-train your own. You are the architect of its mind.
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center space-x-3">
                        <svg class="h-6 w-6 text-mp-orange flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        <span class="text-mp-teal font-bold">Drag-and-drop personality builder</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="h-6 w-6 text-mp-orange flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        <span class="text-mp-teal font-bold">Import custom knowledge bases</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="h-6 w-6 text-mp-orange flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        <span class="text-mp-teal font-bold">Fine-tune behavioral constraints</span>
                    </li>
                </ul>
            </div>
            <div class="w-full lg:w-1/2 order-1 lg:order-2">
                 <div class="w-full h-[400px] rounded-lg shadow-xl image-placeholder bg-white">
                    IMAGE PLACEHOLDER<br>(Reference image_44.png - Building Personality)
                     </div>
            </div>
        </div>
    </section>

     <section class="bg-mp-cream py-24 border-t border-mp-teal/10">
        <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center gap-16">
             <div class="w-full lg:w-1/2">
                 <div class="w-full h-[400px] rounded-lg shadow-xl image-placeholder bg-mp-teal-dark">
                    IMAGE PLACEHOLDER<br>(Reference image_53.png - Dragon/Leash)
                     </div>
            </div>
            <div class="w-full lg:w-1/2">
                <h2 class="text-3xl lg:text-4xl font-black text-mp-teal mb-6 uppercase">
                    True Ownership.<br>Portable & Secure.
                </h2>
                <p class="text-lg text-mp-teal/80 mb-8 leading-relaxed font-medium">
                    Your AI's model weights and personality data belong to you. Built on our open standard, your companion is portable across any compatible platform and secured by immutable blockchain logging.
                </p>
                 <p class="text-lg text-mp-teal/80 leading-relaxed font-medium">
                    It’s not locked into our walled garden. It’s your asset, designed to travel with you into the future.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-mp-teal py-24 text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl lg:text-5xl font-black text-mp-orange mb-10 uppercase">
                Start Architecting Your Mind
            </h2>
            <p class="text-xl text-mp-cream mb-12 max-w-2xl mx-auto">
                Join the private beta and be among the first to build a truly personal AI companion.
            </p>
            <a href="{{ route('register') }}" class="inline-block bg-mp-orange hover:bg-orange-700 text-white text-xl px-12 py-5 rounded-md font-bold shadow-xl transition-all transform hover:scale-105 hover:shadow-2xl">
                GET ACCESS NOW
            </a>
        </div>
    </section>
@endsection