@extends('layouts.app')

@section('title', 'About Us - The Mission')

@section('content')
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('images/about-hero-city.png') }}" alt="Future metropolis illuminated by the Modus Promethean beacon" class="w-full h-full object-cover object-center">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-mp-teal-dark via-mp-teal-dark/60 to-transparent"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-5xl lg:text-7xl font-black text-mp-orange mb-8 uppercase drop-shadow-lg leading-tight">
                Bringing Fire<br>With Foresight.
            </h1>
            <p class="text-xl lg:text-2xl text-mp-cream font-light max-w-3xl mx-auto leading-relaxed drop-shadow-md">
                Our mission is to architect the infrastructure that allows humanity to harness the limitless potential of AI, safely and ethically.
            </p>
        </div>
    </section>

    <section class="bg-mp-cream py-24">
        <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-black text-mp-teal mb-8 uppercase">
                    The Modus Imperative
                </h2>
                <div class="space-y-6 text-lg text-mp-teal/80 font-medium leading-relaxed">
                    <p>
                        In myth, Prometheus stole fire from the gods and gave it to humanity, sparking civilization. But raw power without method—without "modus"—is dangerous chaos.
                    </p>
                    <p>
                        We stand at a similar inflection point today. Artificial Intelligence is the new fire. It holds infinite potential to elevate the human condition, but it is currently being deployed without the necessary standardized guardrails, transparency, or user-centric control.
                    </p>
                    <p class="text-mp-teal font-bold border-l-4 border-mp-orange pl-4">
                        Modus Promethean exists to provide that method. We are not just building another AI product; we are defining the governance infrastructure that makes the AI future sustainable.
                    </p>
                </div>
            </div>
            <div class="relative">
                 <div class="w-full rounded-lg shadow-2xl overflow-hidden">
                    <img src="{{ asset('images/about-metaphor-vortex.png') }}" alt="Raw chaotic energy being channeled by structured engineering" class="w-full h-auto">
                </div>
                 <div class="absolute bottom-[-2rem] left-4 right-4 lg:bottom-8 lg:-left-12 lg:right-auto bg-mp-teal-dark/95 p-8 rounded-lg shadow-lg backdrop-blur-md border border-mp-orange/20 max-w-md">
                    <blockquote class="text-lg text-mp-cream italic mb-4 font-medium leading-relaxed">
                        "We are solving the 'chicken and egg' problem of AI standards by building both the industrial-grade governance layer and the compelling consumer product that proves its necessity."
                    </blockquote>
                    <cite class="text-mp-orange font-bold not-italic uppercase tracking-wider text-sm">
                        — J.P. Howlett, Founder & Chief Architect
                    </cite>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-mp-teal py-32 mt-12 text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl lg:text-4xl font-black text-mp-orange mb-8 uppercase">
                See The Technical Foundation
            </h2>
             <p class="text-xl text-mp-cream mb-12 max-w-2xl mx-auto">
                Understand the architecture behind our mission. Explore the open standard that makes secure, governed AI possible.
            </p>
            <a href="{{ route('vision') }}" class="inline-block bg-mp-orange hover:bg-orange-700 text-white text-xl px-12 py-5 rounded-md font-bold shadow-xl transition-all transform hover:scale-105">
                EXPLORE THE VISION & RFC
            </a>
        </div>
    </section>
@endsection