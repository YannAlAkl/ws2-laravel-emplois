@extends('layouts.app')

@section('title', 'Candidatures — ' . $offreEmploi->titre)

@section('content')
<div class="min-h-screen bg-slate-50">
    <div class="bg-[#1E2D4A] text-white py-10 px-6">
        <div class="max-w-6xl mx-auto">
            <p class="text-cyan-400 text-sm font-semibold uppercase tracking-widest mb-2">Administration</p>
            <h1 class="text-3xl font-bold">Candidatures pour {{ $offreEmploi->titre }}</h1>
            <p class="text-slate-300 mt-1">{{ $candidatures->count() }} candidature{{ $candidatures->count() > 1 ? 's' : '' }}</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-10">
        @if($candidatures->isEmpty())
        <div class="rounded-xl border border-dashed border-slate-300 bg-white p-12 text-center text-slate-500">
            <p class="text-2xl mb-3">Aucune candidature reçue</p>
            <p>Les candidats n'ont pas encore postulé à cette offre.</p>
        </div>
        @else
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-600 uppercase tracking-[0.15em] text-xs">
                    <tr>
                        <th class="px-5 py-4">Candidat</th>
                        <th class="px-5 py-4">Courriel</th>
                        <th class="px-5 py-4">Téléphone</th>
                        <th class="px-5 py-4">Message</th>
                        <th class="px-5 py-4">CV</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($candidatures as $candidature)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">
                        <td class="px-5 py-4 font-medium text-slate-800">{{ $candidature->prenom }} {{ $candidature->nom }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $candidature->courriel }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $candidature->telephone ?? '-' }}</td>
                        <td class="px-5 py-4 text-slate-600 truncate max-w-[18rem]">{{ Str::limit($candidature->message ?: '-', 80) }}</td>
                        <td class="px-5 py-4">
                            <a href="{{ route('candidature.cv', $candidature->id) }}" class="text-cyan-600 hover:text-cyan-800 text-sm font-semibold">Télécharger</a>
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
