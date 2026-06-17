@extends('layouts.app')

@section('title', $emploi->titre . ' — ' . $emploi->entreprise)

@section('content')
<div class="min-h-screen bg-slate-50">

    {{-- Barre de retour --}}
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-6 py-3">
            <a href="{{ route('emplois.index') }}"
               class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-cyan-600 transition-colors duration-200">
                ← Retour aux offres
            </a>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-10 grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Colonne principale --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Titre --}}
            <div class="bg-white rounded-xl border border-slate-200 px-8 py-7">
                <div class="flex items-center gap-2 mb-3">
                    @if($emploi->est_active)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-xs font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Fermée
                        </span>
                    @endif
                    <span class="px-3 py-1 rounded-full bg-cyan-50 text-cyan-700 text-xs font-semibold">
                        {{ $emploi->type_emploi }}
                    </span>
                </div>

                <h1 class="text-3xl font-bold text-[#1E2D4A] mb-1">{{ $emploi->titre }}</h1>
                <p class="text-slate-500 text-lg">{{ $emploi->entreprise }}</p>
            </div>

            {{-- Description --}}
            <div class="bg-white rounded-xl border border-slate-200 px-8 py-7">
                <h2 class="text-xs font-bold text-cyan-600 uppercase tracking-widest mb-4">Description du poste</h2>
                <div class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $emploi->description }}</div>
            </div>

            {{-- Responsabilités --}}
            <div class="bg-white rounded-xl border border-slate-200 px-8 py-7">
                <h2 class="text-xs font-bold text-cyan-600 uppercase tracking-widest mb-4">Responsabilités</h2>
                <div class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $emploi->responsabilites }}</div>
            </div>

            {{-- Exigences --}}
            <div class="bg-white rounded-xl border border-slate-200 px-8 py-7">
                <h2 class="text-xs font-bold text-cyan-600 uppercase tracking-widest mb-4">Exigences</h2>
                <div class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $emploi->exigences }}</div>
            </div>

        </div>

        {{-- Colonne latérale --}}
        <div class="space-y-5">

            {{-- Résumé --}}
            <div class="bg-[#1E2D4A] text-white rounded-xl px-6 py-6 space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-widest text-cyan-400 mb-2">Détails du poste</h3>

                <div class="flex items-start gap-3">
                    <span class="text-xl">📍</span>
                    <div>
                        <p class="text-xs text-slate-400 mb-0.5">Lieu</p>
                        <p class="font-semibold">{{ $emploi->ville }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <span class="text-xl">💼</span>
                    <div>
                        <p class="text-xs text-slate-400 mb-0.5">Type de poste</p>
                        <p class="font-semibold">{{ $emploi->type_emploi }}</p>
                    </div>
                </div>

                @if($emploi->salaire)
                <div class="flex items-start gap-3">
                    <span class="text-xl">💰</span>
                    <div>
                        <p class="text-xs text-slate-400 mb-0.5">Salaire</p>
                        <p class="font-semibold">{{ $emploi->salaire }}</p>
                    </div>
                </div>
                @endif

                @if($emploi->date_publication)
                <div class="flex items-start gap-3">
                    <span class="text-xl">📅</span>
                    <div>
                        <p class="text-xs text-slate-400 mb-0.5">Publié le</p>
                        <p class="font-semibold">{{ \Carbon\Carbon::parse($emploi->date_publication)->format('d M Y') }}</p>
                    </div>
                </div>
                @endif
            </div>

            {{-- Bouton postuler --}}
            @if($emploi->est_active)
            <a href="{{ route('candidature.show', $emploi->id) }}"
               class="block w-full text-center bg-cyan-500 hover:bg-cyan-600 text-white font-bold
                      py-3.5 rounded-xl transition-colors duration-200 shadow-sm">
                Postuler à cette offre
            </a>
            @else
            <div class="block w-full text-center bg-slate-200 text-slate-400 font-bold py-3.5 rounded-xl cursor-not-allowed">
                Offre fermée
            </div>
            @endif

{{-- Retour --}}
            <a href="{{ route('emplois.index') }}"
               class="block w-full text-center border border-slate-300 text-slate-600 font-medium
                      py-3 rounded-xl hover:border-[#1E2D4A] hover:text-[#1E2D4A] transition-colors duration-200">
                ← Toutes les offres
            </a>

        </div>
    </div>
</div>
@endsection
