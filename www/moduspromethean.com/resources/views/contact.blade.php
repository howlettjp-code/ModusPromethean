@extends('layouts.app')

@section('title', 'Contact Us - Partner, Invest, Build')

@section('content')
    <section class="bg-mp-teal py-20 text-center relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <h1 class="text-4xl lg:text-6xl font-black text-white mb-6 uppercase drop-shadow-md">
                Get In Touch
            </h1>
            <p class="text-xl text-mp-cream font-light max-w-2xl mx-auto leading-relaxed">
                Whether you are looking for your next personal AI, interested in adopting the open standard, or exploring investment opportunities, we are ready to connect.
            </p>
        </div>
        <div class="absolute inset-0 opacity-10 pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/shattered-island.png')]"></div>
    </section>

    <section class="bg-mp-cream py-24 relative z-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 -mt-32">
                <div class="bg-white p-10 rounded-lg shadow-xl border-t-4 border-mp-teal group hover:-translate-y-2 transition-all duration-300">
                    <div class="bg-mp-teal w-16 h-16 rounded-full flex items-center justify-center mb-6 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mp-teal mb-4 uppercase">Product & Support</h3>
                    <p class="text-mp-teal/80 mb-6 font-medium">
                        Questions about the Personal AI platform, account issues, or general inquiries.
                    </p>
                    <a href="mailto:support@moduspromethean.com" class="text-mp-orange font-bold hover:underline text-lg">support@moduspromethean.com</a>
                </div>

                <div class="bg-white p-10 rounded-lg shadow-xl border-t-4 border-mp-orange group hover:-translate-y-2 transition-all duration-300 relative z-20">
                     <div class="bg-mp-teal w-16 h-16 rounded-full flex items-center justify-center mb-6 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mp-teal mb-4 uppercase">Standards Partnership</h3>
                    <p class="text-mp-teal/80 mb-6 font-medium">
                        For platforms, API providers, and financial institutions looking to adopt the open governance standard.
                    </p>
                    <a href="mailto:partners@moduspromethean.com" class="text-mp-orange font-bold hover:underline text-lg">partners@moduspromethean.com</a>
                </div>

                <div class="bg-white p-10 rounded-lg shadow-xl border-t-4 border-mp-teal group hover:-translate-y-2 transition-all duration-300">
                     <div class="bg-mp-teal w-16 h-16 rounded-full flex items-center justify-center mb-6 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-mp-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mp-teal mb-4 uppercase">Investor Relations</h3>
                    <p class="text-mp-teal/80 mb-6 font-medium">
                        For institutional investors and strategic partners interested in funding the infrastructure of the AI economy.
                    </p>
                    <a href="mailto:investors@moduspromethean.com" class="text-mp-orange font-bold hover:underline text-lg">investors@moduspromethean.com</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-mp-cream pb-24">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="bg-white rounded-lg shadow-xl p-12 border border-mp-teal/10">
                <h2 class="text-3xl font-black text-mp-teal mb-8 text-center uppercase">Send a Message</h2>
                <form action="#" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-bold text-mp-teal mb-2 uppercase">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-md bg-mp-cream/50 border border-mp-teal/20 focus:border-mp-orange focus:ring-1 focus:ring-mp-orange outline-none transition font-medium text-mp-teal" placeholder="Your Name">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-bold text-mp-teal mb-2 uppercase">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-md bg-mp-cream/50 border border-mp-teal/20 focus:border-mp-orange focus:ring-1 focus:ring-mp-orange outline-none transition font-medium text-mp-teal" placeholder="john@example.com">
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-bold text-mp-teal mb-2 uppercase">Subject</label>
                        <select id="subject" name="subject" class="w-full px-4 py-3 rounded-md bg-mp-cream/50 border border-mp-teal/20 focus:border-mp-orange focus:ring-1 focus:ring-mp-orange outline-none transition font-medium text-mp-teal">
                            <option value="general">General Inquiry</option>
                            <option value="partnership">Partnership Opportunity</option>
                            <option value="investor">Investor Relations</option>
                            <option value="press">Press & Media</option>
                        </select>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-bold text-mp-teal mb-2 uppercase">Message</label>
                        <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 rounded-md bg-mp-cream/50 border border-mp-teal/20 focus:border-mp-orange focus:ring-1 focus:ring-mp-orange outline-none transition font-medium text-mp-teal" placeholder="How can we help?"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="inline-block bg-mp-orange hover:bg-orange-700 text-white text-xl px-12 py-4 rounded-md font-bold shadow-xl transition-all transform hover:scale-105">
                            SEND MESSAGE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection