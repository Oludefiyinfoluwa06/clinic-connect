@php
    $dashboard = request()->routeIs('dashboard');
    $patients = request()->routeIs('patients.*');

    $name = auth('admin')->user()->name;

    $initials = collect(explode(' ', $name))
        ->map(fn($word) => strtoupper(substr($word, 0, 1)))
        ->join('');
@endphp

<nav class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <button id="menuToggle" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div class="flex">
                <p class="flex items-center">
                    <span class="text-gray-700 text-lg font-semibold">{{ $dashboard ? 'Dashboard' : 'Patients' }}</span>
                </p>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <div class="relative">
                <div class="flex items-center space-x-2 p-2 rounded-lg transition-colors">
                    <div class="h-8 w-8 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-xs">{{ $initials }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
