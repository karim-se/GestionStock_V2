<x-layout>
    <x-slot:title>
        Accueil - MonProjet
    </x-slot>






    @push('styles')
        @vite('resources/css/Acceuil.css')
    @endpush





    <main class="container mx-auto mt-8 px-4 mb-10">

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold" style="color: #1F2937;">Tableau de Bord</h1>
            <a href="{{ route('Articles.index') }}" class="ButtonAddArticle">
                + Nouvel Article
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">


            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-[#1F2937]">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-white text-[#1F2937] mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm uppercase font-semibold">Total Articles en Stock</p>
                        <p class="text-3xl font-bold text-gray-800">{{ number_format($totalArticles, 0, ',', ' ') }}</p>
                    </div>
                </div>
            </div>


            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm uppercase font-semibold">Articles en Rupture</p>
                        <p class="text-3xl font-bold text-red-600">{{ $alertesRupture }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm uppercase font-semibold">Commandes en Cours</p>
                        <p class="text-3xl font-bold text-gray-800">{{ $CommandesEnCours }}</p>
                    </div>
                </div>
            </div>


        </div>



    </main>


</x-layout>
