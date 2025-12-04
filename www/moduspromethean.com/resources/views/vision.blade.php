@extends('layouts.app')

@section('title', 'Vision - The RFC Standard')

@section('content')
    <section class="bg-mp-teal py-20 lg:py-28 relative overflow-hidden text-center">
        <div class="container mx-auto px-6 relative z-10">
             <div class="inline-block bg-mp-orange/20 border border-mp-orange text-mp-orange text-sm font-bold px-4 py-2 rounded-full uppercase tracking-wider mb-8">
                Open Standard • Draft 15
            </div>
            <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 uppercase drop-shadow-md leading-tight">
                The Artificial Intelligence<br>
                <span class="text-mp-orange">Governance Control</span> &<br>
                Service Exchange Protocol
            </h1>
            <p class="text-xl text-mp-cream font-light max-w-3xl mx-auto mb-12 leading-relaxed">
                A proposed open standard for the secure, interoperable, and verifiable deployment of autonomous AI agents.
            </p>
            <a href="https://covenant.to" target="_blank" class="inline-flex items-center bg-mp-orange hover:bg-orange-700 text-white text-lg px-10 py-4 rounded-md font-bold shadow-lg transition-all transform hover:-translate-y-1 hover:shadow-2xl">
                READ RFC 9697 (V15) ON COVENANT.TO
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
        </div>
        <div class="absolute inset-0 opacity-5 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    </section>

    <section class="bg-mp-cream py-24">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-black text-mp-teal uppercase mb-4">The 3-Plane Architecture</h2>
                <p class="text-lg text-mp-teal/80 max-w-3xl mx-auto font-medium">
                    The core of the RFC is a strict separation of concerns. The AI operates powerfully in the Service Plane, but its governance is cryptographically enforced from an external, unreachable Governance Plane.
                </p>
            </div>

            <div class="max-w-6xl mx-auto mb-24 shadow-2xl rounded-xl overflow-hidden border-4 border-mp-teal/10">
                <img src="{{ asset('images/vision-arch-diagram.png') }}" alt="Diagram of AIGCSEP 3-Plane Architecture showing separation of Service, Control, and Governance planes" class="w-full h-auto">
            </div>

            <div class="flex flex-col lg:flex-row gap-8 items-stretch justify-center max-w-5xl mx-auto">
                <div class="flex-1 bg-white border-t-4 border-blue-500 rounded-lg shadow-xl p-8 flex flex-col relative overflow-hidden group hover:shadow-2xl transition">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3m0-9c1.657 0 3-1.343 3-3S12 3 9 3 6 4.343 6 6c0 1.657 1.343 3 3 3s3-1.343 3-3" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mp-teal mb-4 uppercase z-10">1. Service Plane</h3>
                    <p class="text-mp-teal/80 mb-8 flex-grow z-10">Where the AI model lives and works. Highly dynamic and performant.</p>
                    <div class="bg-blue-50 text-blue-800 p-4 rounded-md text-sm font-bold z-10">Focus: Performance & Utility</div>
                </div>
                <div class="flex-1 bg-white border-t-4 border-yellow-500 rounded-lg shadow-xl p-8 flex flex-col relative overflow-hidden group hover:shadow-2xl transition">
                     <div class="absolute top-0 right-0 p-4 opacity-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mp-teal mb-4 uppercase z-10">2. Control Plane</h3>
                    <p class="text-mp-teal/80 mb-8 flex-grow z-10">Manages configuration, deployment, and policy distribution.</p>
                    <div class="bg-yellow-50 text-yellow-800 p-4 rounded-md text-sm font-bold z-10">Focus: Configuration & State</div>
                </div>
                <div class="flex-1 bg-mp-teal-dark border-t-4 border-mp-orange rounded-lg shadow-2xl p-8 flex flex-col relative overflow-hidden transform md:-translate-y-4 ring-4 ring-mp-orange/20 z-20">
                     <div class="absolute top-0 right-0 p-4 opacity-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mp-orange mb-4 uppercase z-10 flex items-center">3. Governance Plane</h3>
                    <p class="text-mp-cream mb-8 flex-grow z-10 font-medium leading-relaxed">The immutable oversight layer. Logs actions and enforces constraints cryptographically outside the AI's reach.</p>
                    <div class="bg-mp-teal p-6 rounded-md border border-mp-orange/50 z-10 relative">
                        <h4 class="text-mp-orange font-bold mb-2 uppercase text-sm tracking-wider">The Cryptographic Boundary</h4>
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="text-center flex-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11.536 17H10v2H8v-2H6v-2h2.464l1.793-1.793A6 6 0 0110 13a6 6 0 016-6z" /></svg><span class="text-xs text-blue-200 block font-mono">AI Entity</span><span class="text-sm text-white font-bold">Public Certificate</span></div>
                            <div class="text-mp-orange text-2xl font-black">/ /</div>
                            <div class="text-center flex-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-mp-orange mx-auto mb-1" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" /><path d="M10 12a1 1 0 100 2 1 1 0 000-2z" /></svg><span class="text-xs text-orange-200 block font-mono">Governance Plane</span><span class="text-sm text-white font-bold">Private Key</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection