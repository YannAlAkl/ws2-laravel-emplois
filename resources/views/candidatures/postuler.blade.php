@extends('layouts.app')

@section('title', 'Postuler — ' . $offreEmploi->titre)

@section('content')
<div class="min-h-screen bg-slate-50">

    {{-- Barre de retour --}}
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-3xl mx-auto px-6 py-3">
            <a href="{{ route('offreEmploi', $offreEmploi->id) }}"
               class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-cyan-600 transition-colors duration-200">
                ← Retour à l'offre
            </a>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-6 py-10">

        {{-- En-tête --}}
        <div class="mb-8">
            <p class="text-cyan-600 text-sm font-semibold uppercase tracking-widest mb-1">Candidature</p>
            <h1 class="text-3xl font-bold text-[#1E2D4A]">{{ $offreEmploi->titre }}</h1>
            <p class="text-slate-500 mt-1">{{ $offreEmploi->entreprise }} · {{ $offreEmploi->ville }}</p>
        </div>

        {{-- Erreurs de validation --}}
        @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 rounded-xl px-5 py-4">
            <p class="text-red-700 font-semibold text-sm mb-2">Veuillez corriger les erreurs suivantes :</p>
            <ul class="list-disc list-inside text-red-600 text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Formulaire --}}
        <form action="{{ route('candidature.store', $offreEmploi->id) }}" method="POST" enctype="multipart/form-data"
              class="bg-white rounded-xl border border-slate-200 px-8 py-8 space-y-6">
            @csrf

            {{-- Prénom / Nom --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="prenom" class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Prénom <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}"
                           class="w-full rounded-lg border px-4 py-2.5 text-sm text-slate-800
                                  focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent
                                  {{ $errors->has('prenom') ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}"
                           placeholder="Jean">
                </div>
                <div>
                    <label for="nom" class="block text-sm font-semibold text-slate-700 mb-1.5">
                        Nom <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
                           class="w-full rounded-lg border px-4 py-2.5 text-sm text-slate-800
                                  focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent
                                  {{ $errors->has('nom') ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}"
                           placeholder="Tremblay">
                </div>
            </div>

            {{-- Courriel --}}
            <div>
                <label for="courriel" class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Courriel <span class="text-red-500">*</span>
                </label>
                <input type="email" id="courriel" name="courriel" value="{{ old('courriel') }}"
                       class="w-full rounded-lg border px-4 py-2.5 text-sm text-slate-800
                              focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent
                              {{ $errors->has('courriel') ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}"
                       placeholder="jean.tremblay@exemple.com">
            </div>

            {{-- Téléphone --}}
            <div>
                <label for="telephone" class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Téléphone <span class="text-slate-400 font-normal">(facultatif)</span>
                </label>
                <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}"
                       class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-800
                              focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent"
                       placeholder="514 000-0000">
            </div>

            {{-- Message --}}
            <div>
                <label for="message" class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Message de motivation <span class="text-slate-400 font-normal">(facultatif)</span>
                </label>
                <textarea id="message" name="message" rows="5"
                          class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-800
                                 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent resize-none"
                          placeholder="Décrivez brièvement votre intérêt pour ce poste...">{{ old('message') }}</textarea>
            </div>

            {{-- CV --}}
            <div>
                <label for="cv" class="block text-sm font-semibold text-slate-700 mb-1.5">
                    Curriculum vitae (PDF) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="file" id="cv" name="cv" accept=".pdf"
                           class="w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0 file:text-sm file:font-semibold
                                  file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100
                                  border rounded-lg px-3 py-2
                                  {{ $errors->has('cv') ? 'border-red-400 bg-red-50' : 'border-slate-300 bg-white' }}">
                </div>
                <p class="text-xs text-slate-400 mt-1.5">Format PDF uniquement · Max 2 Mo</p>
            </div>

            {{-- Séparateur --}}
            <div class="border-t border-slate-100 pt-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('offreEmploi', $offreEmploi->id) }}"
                   class="text-sm text-slate-500 hover:text-slate-700 transition-colors duration-200">
                    Annuler
                </a>
                <button type="submit"
                        class="px-8 py-3 bg-cyan-500 hover:bg-cyan-600 text-white font-bold rounded-xl
                               transition-colors duration-200 shadow-sm">
                    Soumettre ma candidature
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
