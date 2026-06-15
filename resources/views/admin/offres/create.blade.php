@extends('layouts.app')

@section('title', 'Créer une offre')

@section('content')
<div class="min-h-screen bg-slate-50">

    {{-- Barre de retour --}}
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-3xl mx-auto px-6 py-3">
            <a href="{{ route('admin.offres.index') }}"
               class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-cyan-600 transition-colors duration-200">
                ← Retour aux offres
            </a>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-6 py-10">

        <div class="mb-8">
            <p class="text-cyan-600 text-sm font-semibold uppercase tracking-widest mb-1">Administration</p>
            <h1 class="text-3xl font-bold text-[#1E2D4A]">Nouvelle offre d'emploi</h1>
        </div>

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

        <form action="{{ route('admin.offres.store') }}" method="POST"
              class="bg-white rounded-xl border border-slate-200 px-8 py-8 space-y-6">
            @csrf

            @include('admin.offres._form')

            <div class="border-t border-slate-100 pt-5 flex items-center justify-between">
                <a href="{{ route('admin.offres.index') }}"
                   class="text-sm text-slate-500 hover:text-slate-700 transition-colors duration-200">
                    Annuler
                </a>
                <button type="submit"
                        class="px-8 py-3 bg-cyan-500 hover:bg-cyan-600 text-white font-bold rounded-xl
                               transition-colors duration-200 shadow-sm">
                    Créer l'offre
                </button>
            </div>
        </form>

    </div>
</div>
@endsection