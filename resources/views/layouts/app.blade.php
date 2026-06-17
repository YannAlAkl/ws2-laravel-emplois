<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Offres d\'emploi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    {{-- Navbar --}}
    <nav class="bg-[#1E2D4A] text-white shadow-md">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="{{ route('emplois.index') }}"
               class="text-lg font-bold tracking-tight hover:text-cyan-400 transition-colors duration-200">
                💼 EmploiInterne
            </a>

            <div class="flex items-center gap-6 text-sm">
                <a href="{{ route('emplois.index') }}"
                   class="transition-colors duration-200"
                          {{ request()->routeIs('emplois.index') ? 'text-white font-semibold' : 'text-slate-300 hover:text-white' }}
                    Offres
                </a>
            </div>

        </div>
    </nav>

    {{-- Flash messages --}}
    @if(session('success'))
    <div class="max-w-5xl mx-auto px-6 pt-5">
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg px-4 py-3 text-sm">
            <span>✅</span> {{ session('success') }}
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-5xl mx-auto px-6 pt-5">
        <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm">
            <span>❌</span> {{ session('error') }}
        </div>
    </div>
    @endif

    {{-- Contenu --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-16 border-t border-slate-200 bg-white">
        <div class="max-w-5xl mx-auto px-6 py-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-sm text-slate-400">
            <span>© {{ date('Y') }} EmploiInterne — Tous droits réservés</span>
            <span>Propulsé par Laravel</span>
        </div>
    </footer>

</body>
</html>
