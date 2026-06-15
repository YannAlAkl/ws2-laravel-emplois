@extends('layouts.app')

@section('title', 'Gestion des offres')

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="bg-[#1E2D4A] text-white py-10 px-6">
        <div class="max-w-6xl mx-auto">
            <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2">Administration</p>
            <h1 class="text-3xl font-bold">Offres d'emploi</h1>
            <p class="text-slate-300 mt-1">{{ $offreEmplois->count() }} offre{{ $offreEmplois->count() > 1 ? 's' : '' }} enregistrée{{ $offreEmplois->count() > 1 ? 's' : '' }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-10">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
            <div>
                <p class="text-sm text-slate-500">Gérer les offres publiées et accéder aux candidatures.</p>
            </div>
            <a href="{{ route('admin.offres.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-cyan-500 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-cyan-600 transition-colors duration-200">
                Nouvelle offre
            </a>
        </div>

        @if($offreEmplois->isEmpty())
        <div class="rounded-xl border border-dashed border-slate-300 bg-white p-12 text-center text-slate-500">
            <p class="text-2xl mb-3">Aucune offre trouvée</p>
            <p>Créez une nouvelle offre pour commencer.</p>
        </div>
        @else
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-600 uppercase tracking-[0.15em] text-xs">
                    <tr>
                        <th class="px-5 py-4">Titre</th>
                        <th class="px-5 py-4">Entreprise</th>
                        <th class="px-5 py-4">Ville</th>
                        <th class="px-5 py-4">Type</th>
                        <th class="px-5 py-4">Candidatures</th>
                        <th class="px-5 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($offreEmplois as $offre)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">
                        <td class="px-5 py-4 font-medium text-slate-800">{{ $offre->titre }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $offre->entreprise }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $offre->ville }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $offre->type_emploi }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $offre->candidatures_count ?? 0 }}</td>
                        <td class="px-5 py-4 space-x-2">
                            <a href="{{ route('admin.offres.candidatures', $offre->id) }}"
                               class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100 transition">
                                Candidatures
                            </a>
                            <a href="{{ route('admin.offres.edit', $offre->id) }}"
                               class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-100 transition">
                                Modifier
                            </a>
                            <form action="{{ route('admin.offres.destroy', $offre->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center rounded-full bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-100 transition">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
