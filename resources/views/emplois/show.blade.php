@extends('layouts.app')

@section('title', 'Offres d\'emploi')

@section('content')
<div class="min-h-screen bg-slate-50">

    {{-- En-tête --}}
    <div class="bg-[#1E2D4A] text-white py-12 px-6">
        <div class="max-w-5xl mx-auto">
            <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2">Carrières internes</p>
            <h1 class="text-4xl font-bold mb-3">Offres d'emploi</h1>
            <p class="text-slate-300 text-lg">{{ $offreEmplois->count() }} poste{{ $offreEmplois->count() > 1 ? 's' : '' }} disponible{{ $offreEmplois->count() > 1 ? 's' : '' }}</p>
        </div>
    </div>

    {{-- Barre de filtre --}}
    <div class="bg-white border-b border-slate-200 sticky top-0 z-10 shadow-sm">
        <div class="max-w-5xl mx-auto px-6 py-4 flex flex-wrap gap-3 items-center">
            <span class="text-sm text-slate-500 font-medium mr-1">Filtrer :</span>
            <button onclick="filtrer('tous')"
                class="filtre-btn active px-4 py-1.5 rounded-full text-sm font-medium border transition-all duration-200
                       bg-[#1E2D4A] text-white border-[#1E2D4A]"
                data-filtre="tous">
                Tous
            </button>
            @foreach($offreEmplois->pluck('type_emploi')->unique() as $type)
            <button onclick="filtrer('{{ $type }}')"
                class="filtre-btn px-4 py-1.5 rounded-full text-sm font-medium border border-slate-300
                       text-slate-600 hover:border-cyan-500 hover:text-cyan-600 transition-all duration-200"
                data-filtre="{{ $type }}">
                {{ $type }}
            </button>
            @endforeach
        </div>
    </div>

    {{-- Liste des offres --}}
    <div class="max-w-5xl mx-auto px-6 py-10">

        @forelse($offreEmplois as $offre)
        <div class="offre-card mb-5 group" data-type="{{ $offre->type_emploi }}">
            <a href="{{ route('offreEmploi', $offre->id) }}"
               class="block bg-white rounded-xl border border-slate-200 px-6 py-5
                      hover:border-cyan-400 hover:shadow-md transition-all duration-200">

                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">

                    {{-- Infos principales --}}
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            @if($offre->est_active)
                                <span class="w-2 h-2 rounded-full bg-emerald-400 inline-block"></span>
                                <span class="text-xs text-emerald-600 font-medium">Active</span>
                            @else
                                <span class="w-2 h-2 rounded-full bg-slate-300 inline-block"></span>
                                <span class="text-xs text-slate-400 font-medium">Fermée</span>
                            @endif
                        </div>

                        <h2 class="text-lg font-bold text-[#1E2D4A] group-hover:text-cyan-600 transition-colors duration-200 mb-1">
                            {{ $offre->titre }}
                        </h2>

                        <p class="text-slate-500 text-sm">{{ $offre->entreprise }}</p>
                    </div>

                    {{-- Badges + flèche --}}
                    <div class="flex sm:flex-col items-start sm:items-end gap-2 shrink-0">
                        <span class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-medium rounded-full">
                            {{ $offre->type_emploi }}
                        </span>
                        <span class="px-3 py-1 bg-cyan-50 text-cyan-700 text-xs font-medium rounded-full">
                            📍 {{ $offre->ville }}
                        </span>
                    </div>
                </div>

                {{-- Pied de carte --}}
                <div class="mt-4 pt-4 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                    <div class="flex flex-wrap gap-4 text-sm text-slate-500">
                        @if($offre->salaire)
                        <span>💰 {{ $offre->salaire }}</span>
                        @endif
                        @if($offre->date_publication)
                        <span>📅 {{ \Carbon\Carbon::parse($offre->date_publication)->format('d M Y') }}</span>
                        @endif
                    </div>
                    <span class="text-cyan-600 text-sm font-semibold group-hover:underline">
                        Voir l'offre →
                    </span>
                </div>

            </a>
        </div>
        @empty
        <div class="text-center py-20 text-slate-400">
            <p class="text-5xl mb-4">📭</p>
            <p class="text-lg font-medium">Aucune offre disponible pour le moment.</p>
        </div>
        @endforelse

        {{-- Message vide après filtre --}}
        <div id="vide-filtre" class="hidden text-center py-20 text-slate-400">
            <p class="text-5xl mb-4">🔍</p>
            <p class="text-lg font-medium">Aucune offre pour ce type de poste.</p>
        </div>

    </div>
</div>

<script>
function filtrer(type) {
    const cartes = document.querySelectorAll('.offre-card');
    const btns   = document.querySelectorAll('.filtre-btn');
    let visible  = 0;

    cartes.forEach(c => {
        const show = type === 'tous' || c.dataset.type === type;
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });

    document.getElementById('vide-filtre').classList.toggle('hidden', visible > 0);

    btns.forEach(b => {
        const actif = b.dataset.filtre === type;
        b.classList.toggle('bg-[#1E2D4A]', actif);
        b.classList.toggle('text-white', actif);
        b.classList.toggle('border-[#1E2D4A]', actif);
        b.classList.toggle('text-slate-600', !actif);
        b.classList.toggle('border-slate-300', !actif);
    });
}
</script>
@endsection
