@php
    $dashActive = request()->routeIs('dashboard');
    $patientsActive = request()->routeIs('patients.*');

    $name = auth('admin')->user()->name;

    $initials = collect(explode(' ', $name))
        ->map(fn($word) => strtoupper(substr($word, 0, 1)))
        ->join('');
@endphp

<aside id="sidebar" class="fixed top-0 left-0 z-50 w-64 h-screen bg-white border-r border-gray-200 sidebar-transition transform -translate-x-full lg:translate-x-0">
    <div class="flex flex-col h-full">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="h-10 w-10 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="text-xl font-bold gradient-text">ClinicConnect</span>
            </div>
            <button id="closeSidebar" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="nav-item flex items-center px-4 py-3 {{ $dashActive ? 'text-gray-700 rounded-r-lg bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-500' : 'text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-800' }}">
                <svg class="h-5 w-5 {{ $dashActive ? 'text-blue-600' : '' }} mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <span class="font-semibold {{ $dashActive ? 'text-blue-600' : '' }}">Dashboard</span>
            </a>

            <a href="{{ route('patients.index.page') }}" class="nav-item flex items-center px-4 py-3 {{ $patientsActive ? 'text-gray-700 rounded-r-lg bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-500' : 'text-gray-600 rounded-lg hover:bg-gray-50 hover:text-gray-800' }}">
                <svg class="h-5 w-5 mr-3 {{ $patientsActive ? 'text-blue-600' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-4-4h-1
                        m-6 6H3v-2a4 4 0 014-4h1
                        m6-4a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span class="font-medium {{ $patientsActive ? 'text-blue-600' : '' }}">Patients</span>
            </a>
        </nav>

        <div class="px-4 py-4 border-t border-gray-200">
            <div class="flex items-center space-x-3 p-3 rounded-lg transition-colors">
                <div class="h-10 w-10 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-sm">{{ $initials }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-700 truncate">{{ auth('admin')->user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ auth('admin')->user()->email }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('auth.logout') }}" class="mt-4">
                @csrf
                <button
                    type="submit"
                    class="w-full text-left flex items-center px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-colors cursor-pointer"
                >
                    <svg class="h-5 w-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0
                                01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2
                                2 0 012 2v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
