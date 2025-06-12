@props([
    'links' => [],
    'title' => 'Quick Actions'
])

@php
    $tones = [
        'primary' => [
            'bg' => 'bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200',
            'border' => 'border-blue-200 hover:border-blue-300',
            'text' => 'text-blue-700 hover:text-blue-800',
            'icon' => 'text-blue-600',
            'shadow' => 'hover:shadow-blue-100/50'
        ],
        'secondary' => [
            'bg' => 'bg-gradient-to-br from-gray-50 to-gray-100 hover:from-gray-100 hover:to-gray-200',
            'border' => 'border-gray-200 hover:border-gray-300',
            'text' => 'text-gray-700 hover:text-gray-800',
            'icon' => 'text-gray-600',
            'shadow' => 'hover:shadow-gray-100/50'
        ],
        'success' => [
            'bg' => 'bg-gradient-to-br from-emerald-50 to-emerald-100 hover:from-emerald-100 hover:to-emerald-200',
            'border' => 'border-emerald-200 hover:border-emerald-300',
            'text' => 'text-emerald-700 hover:text-emerald-800',
            'icon' => 'text-emerald-600',
            'shadow' => 'hover:shadow-emerald-100/50'
        ],
        'warning' => [
            'bg' => 'bg-gradient-to-br from-amber-50 to-amber-100 hover:from-amber-100 hover:to-amber-200',
            'border' => 'border-amber-200 hover:border-amber-300',
            'text' => 'text-amber-700 hover:text-amber-800',
            'icon' => 'text-amber-600',
            'shadow' => 'hover:shadow-amber-100/50'
        ],
        'danger' => [
            'bg' => 'bg-gradient-to-br from-red-50 to-red-100 hover:from-red-100 hover:to-red-200',
            'border' => 'border-red-200 hover:border-red-300',
            'text' => 'text-red-700 hover:text-red-800',
            'icon' => 'text-red-600',
            'shadow' => 'hover:shadow-red-100/50'
        ],
    ];
@endphp

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl shadow-sm border border-gray-100 p-6']) }}>
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
        <div class="h-px flex-1 bg-gray-200 ml-4"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-3">
        @foreach($links as $link)
            @php
                $config = $tones[$link['tone'] ?? 'primary'];
            @endphp

            <a href="{{ $link['href'] }}" class="group relative p-4 rounded-lg border {{ $config['bg'] }} {{ $config['border'] }} transition-all duration-200 hover:shadow-lg {{ $config['shadow'] }} hover:-translate-y-0.5">

                <div class="absolute inset-0 bg-white/20 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>

                <div class="relative flex items-center space-x-3">
                    @if(isset($link['icon']))
                        <div class="flex-shrink-0">
                            @if($link['icon'] === 'plus')
                                <svg class="h-5 w-5 {{ $config['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            @elseif($link['icon'] === 'eye')
                                <svg class="h-5 w-5 {{ $config['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            @elseif($link['icon'] === 'users')
                                <svg class="h-5 w-5 {{ $config['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-1m-6 6H3v-2a4 4 0 014-4h1m6-4a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            @elseif($link['icon'] === 'calendar')
                                <svg class="h-5 w-5 {{ $config['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            @elseif($link['icon'] === 'document')
                                <svg class="h-5 w-5 {{ $config['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            @elseif($link['icon'] === 'arrow-right')
                                <svg class="h-5 w-5 {{ $config['icon'] }} transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            @endif
                        </div>
                    @endif

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium {{ $config['text'] }} truncate">
                            {{ $link['label'] }}
                        </p>
                        @if(isset($link['description']))
                            <p class="text-xs text-gray-500 mt-0.5">{{ $link['description'] }}</p>
                        @endif
                    </div>

                    <div class="flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <svg class="h-4 w-4 {{ $config['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
