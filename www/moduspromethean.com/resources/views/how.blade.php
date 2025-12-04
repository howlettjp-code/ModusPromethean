@extends('layouts.app')

@section('title', 'How It Works - Architecture & Governance')

@section('content')
    <section class="bg-mp-teal py-20 lg:py-28 relative overflow-hidden text-center">
        <div class="container mx-auto px-6 relative z-10">
            <h1 class="text-4xl lg:text-6xl font-black text-mp-orange mb-6 uppercase drop-shadow-md leading-tight">
                Under the Hood of<br>Your Personal AI
            </h1>
            <p class="text-xl text-mp-cream font-light max-w-3xl mx-auto mb-12 leading-relaxed">
                Modus Promethean isn't magic. It's a sophisticated, open architecture designed for secure, portable, and verifiable artificial intelligence. Here’s how we turn raw data into your trusted companion.
            </p>
        </div>
        <div class="absolute inset-0 opacity-10 pointer-events-none mix-blend-overlay" style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cpath d=%27M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zm20.97 0l9.193 9.193-1.414 1.414L34.828 0h2.828zM22.344 0L13.15 9.193l1.414 1.414L25.172 0h-2.828zm15.314 0l11.9 11.9-1.414 1.414L36.242 0h2.83zM28 0l-11.9 11.9 1.414 1.414L29.414 0H28zm15.314 0l14.607 14.607-1.414 1.414L39.07 0h2.83zM16.686 0L2.08 14.607 3.493 16.02 20.93 0h-2.83zM48.97 0l17.314 17.314-1.414 1.414L41.9 0h2.828zM11.03 0L-6.285 17.314-4.87 18.727 18.1 0h-2.828zM54.627 0l20.02 20.02-1.414 1.414L50.384 0h2.83zM5.373 0L-14.647 20.02l1.414 1.414L9.616 0H5.373zM60 0l22.728 22.728-1.414 1.414L56.042 0H60zM0 0l-22.728 22.728 1.414 1.414L3.958 0H0zm59.15 0l25.435 25.435-1.414 1.414L55.193 0h2.828zM.85 0l-25.435 25.435 1.414 1.414L4.808 0H.85zm59.15 0l28.142 28.142-1.414 1.414L52.364 0h2.828zM.85 0L-27.292 28.142l1.414 1.414L7.636 0H.85zm59.15 0l30.85 30.85-1.414 1.414L49.535 0h2.828zM.85 0L-30 30.85l1.414 1.414L10.465 0H.85zM59.15 0l33.557 33.557-1.414 1.414L46.707 0h2.828zM.85 0L-32.707 33.557l1.414 1.414L13.293 0H.85zM59.15 0l36.264 36.264-1.414 1.414L43.878 0h2.828zM.85 0L-35.414 36.264l1.414 1.414L16.122 0H.85zM59.15 0l38.97 38.97-1.414 1.414L41.05 0h2.828zM.85 0L-38.12 38.97l1.414 1.414L18.95 0H.85zM59.15 0l41.678 41.678-1.414 1.414L38.222 0h2.828zM.85 0L-40.828 41.678l1.414 1.414L21.778 0H.85zM59.15 0l44.385 44.385-1.414 1.414L35.393 0h2.828zM.85 0L-43.535 44.385l1.414 1.414L24.607 0H.85zM59.15 0l47.092 47.092-1.414 1.414L32.565 0h2.828zM.85 0L-46.242 47.092l1.414 1.414L27.435 0H.85zM59.15 0l49.8 49.8-1.414 1.414L29.736 0h2.828zM.85 0L-48.95 49.8l1.414 1.414L30.264 0H.85zM59.15 0l52.507 52.507-1.414 1.414L26.908 0h2.828zM.85 0L-51.657 52.507l1.414 1.414L33.092 0H.85zM59.15 0l55.214 55.214-1.414 1.414L24.08 0h2.828zM.85 0L-54.364 55.214l1.414 1.414L35.92 0H.85zM59.15 0l57.92 57.92-1.414 1.414L21.25 0h2.828zM.85 0L-57.07 57.92l1.414 1.414L38.75 0H.85zM59.15 0l60.628 60.628-1.414 1.414L18.422 0h2.828zM.85 0L-59.778 60.628l1.414 1.414L41.578 0H.85zM60 0h2.828v60H60zM0 0h2.828v60H0z%27 fill=%27%23134e4a%27 fill-opacity=%270.05%27 fill-rule=%27evenodd%27/%3E%3C/svg%3E')"></div>
    </section>

    <section class="bg-mp-cream py-24">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-black text-mp-teal uppercase mb-4">The Lifecycle of a Personalized AI</h2>
                <p class="text-lg text-mp-teal/80 max-w-2xl mx-auto">A continuous, secure loop of learning, construction, and deployment.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                <div class="hidden md:block absolute top-16 left-0 w-full h-1 bg-mp-teal/20 z-0"></div>

                <div class="relative z-10 text-center group">
                    <div class="bg-mp-teal w-32 h-32 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition duration-300 border-4 border-mp-cream">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-mp-teal mb-2 uppercase">1. Ingest & Learn</h3>
                    <p class="text-mp-teal/80">Securely connect your data sources. The base model learns your context, preferences, and communication style.</p>
                </div>

                <div class="relative z-10 text-center group">
                    <div class="bg-mp-teal w-32 h-32 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition duration-300 border-4 border-mp-cream">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-mp-teal mb-2 uppercase">2. Architect Modules</h3>
                    <p class="text-mp-teal/80">Select and configure personality modules, knowledge bases, and behavioral guardrails to define its character.</p>
                </div>

                <div class="relative z-10 text-center group">
                    <div class="bg-mp-teal w-32 h-32 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition duration-300 border-4 border-mp-cream">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-mp-teal mb-2 uppercase">3. Deploy Anywhere</h3>
                    <p class="text-mp-teal/80">Your AI is compiled into a portable container, ready to run on our cloud, your local machine, or any compatible API.</p>
                </div>

                <div class="relative z-10 text-center group">
                    <div class="bg-mp-teal w-32 h-32 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:scale-110 transition duration-300 border-4 border-mp-cream">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-mp-teal mb-2 uppercase">4. Govern & Audit</h3>
                    <p class="text-mp-teal/80">Every interaction and state change is cryptographically logged to an immutable ledger for complete oversight.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-mp-teal py-24">
        <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center gap-16">
            <div class="w-full lg:w-1/2 text-mp-cream">
                <h2 class="text-3xl lg:text-4xl font-black text-mp-orange mb-6 uppercase">
                    The Power of Immutable Oversight
                </h2>
                <p class="text-lg mb-6 leading-relaxed font-medium opacity-90">
                    Trust is the greatest barrier to AI adoption. We solve it with cryptography. The Modus Promethean standard includes a mandatory, parallel governance layer.
                </p>
                <p class="text-lg mb-8 leading-relaxed font-medium opacity-90">
                    Every decision your AI makes, every module it loads, and every piece of data it accesses is hashed and recorded on a tamper-proof ledger. This creates a verifiable audit trail that proves your AI is acting within its defined guardrails.
                </p>
                <a href="#" class="text-mp-orange font-bold hover:underline flex items-center">
                    Read the Technical RFC standard
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </a>
            </div>
            <div class="w-full lg:w-1/2">
                 <div class="w-full h-[450px] rounded-lg shadow-2xl glow-effect image-placeholder bg-mp-teal-dark border-2 border-mp-orange/30">
                    GRAPHIC PLACEHOLDER<br>(Reference image_37.png - Immutable Ledger/Chain)
                     </div>
            </div>
        </div>
    </section>

    <section class="bg-mp-cream py-24 text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl lg:text-5xl font-black text-mp-teal mb-10 uppercase">
                Build with confidence.
            </h2>
            <p class="text-xl text-mp-teal/80 mb-12 max-w-2xl mx-auto font-medium">
                Explore the documentation and see how the Modus Promethean standard can empower your next AI project.
            </p>
            <a href="{{ route('register') }}" class="inline-block bg-mp-orange hover:bg-orange-700 text-white text-xl px-12 py-5 rounded-md font-bold shadow-xl transition-all transform hover:scale-105 hover:shadow-2xl">
                START BUILDING
            </a>
        </div>
    </section>
@endsection