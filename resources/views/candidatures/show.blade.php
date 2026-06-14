@extends('layouts.app')

@section('title', 'Candidatures reçues')

@section('content')
<div class="min-h-screen bg-slate-50">

    {{-- En-tête --}}
    <div class="bg-[#1E2D4A] text-white py-10 px-6">
        <div class="max-w-6xl mx-auto">
            <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2">Administration</p>
            <h1 class="text-3xl font-bold">Candidatures reçues</h1>
            <p class="text-slate-300 mt-1">{{ $candidatures->count() }} candidature{{ $candidatures->count() > 1 ? 's' : '' }} au total</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-10">

        @if($candidatures->isEmpty())
        <div class="text-center py-20 text-slate-400">
            <p class="text-5xl mb-4">📭</p>
            <p class="text-lg font-medium">Aucune candidature reçue pour le moment.</p>
        </div>
        @else

        {{-- Tableau --}}
        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-left">
                        <th class="px-5 py-3.5 font-semibold text-slate-600">#</th>
                        <th class="px-5 py-3.5 font-semibold text-slate-600">Candidat</th>
                        <th class="px-5 py-3.5 font-semibold text-slate-600">Courriel</th>
                        <th class="px-5 py-3.5 font-semibold text-slate-600">Poste</th>
                        <th class="px-5 py-3.5 font-semibold text-slate-600">Statut</th>
                        <th class="px-5 py-3.5 font-semibold text-slate-600">Date</th>
                        <th class="px-5 py-3.5 font-semibold text-slate-600">CV</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($candidatures as $candidature)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">

                        <td class="px-5 py-4 text-slate-400 font-mono text-xs">{{ $candidature->id }}</td>

                        <td class="px-5 py-4">
                            <p class="font-semibold text-[#1E2D4A]">{{ $candidature->prenom }} {{ $candidature->nom }}</p>
                            @if($candidature->telephone)
                            <p class="text-xs text-slate-400 mt-0.5">{{ $candidature->telephone }}</p>
                            @endif
                        </td>

                        <td class="px-5 py-4 text-slate-600">{{ $candidature->courriel }}</td>

                        <td class="px-5 py-4">
                            @if($candidature->offreEmploi)
                            <span class="text-slate-700 font-medium">{{ $candidature->offreEmploi->titre }}</span>
                            @else
                            <span class="text-slate-400 italic">Offre supprimée</span>
                            @endif
                        </td>

                        <td class="px-5 py-4">
                            @php
                                $statut = $candidature->statut;
                                $styles = match($statut) {
                                    'recu'     => 'bg-blue-50 text-blue-700',
                                    'en_revue' => 'bg-amber-50 text-amber-700',
                                    'accepte'  => 'bg-emerald-50 text-emerald-700',
                                    'refuse'   => 'bg-red-50 text-red-600',
                                    default    => 'bg-slate-100 text-slate-500',
                                };
                                $labels = match($statut) {
                                    'recu'     => 'Reçu',
                                    'en_revue' => 'En revue',
                                    'accepte'  => 'Accepté',
                                    'refuse'   => 'Refusé',
                                    default    => ucfirst($statut),
                                };
                            @endphp
                            <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $styles }}">
                                {{ $labels }}
                            </span>
                        </td>

                        <td class="px-5 py-4 text-slate-500 text-xs whitespace-nowrap">
                            {{ $candidature->created_at->format('d M Y') }}
                        </td>

                        <td class="px-5 py-4">
                            <span class="text-xs text-slate-500" title="{{ $candidature->cv_nom_original }}">
                                📄 {{ Str::limit($candidature->cv_nom_original, 20) }}
                            </span>
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
