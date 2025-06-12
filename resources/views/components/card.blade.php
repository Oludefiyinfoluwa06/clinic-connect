@props([
    'title',
    'value',
    'icon',
    'tone' => 'primary',
])

@php
    $tones = [
        'primary'   => [
            'bg' => 'bg-gradient-to-br from-blue-50 to-blue-100',
            'text' => 'text-blue-600',
            'ring' => 'ring-blue-200',
            'shadow' => 'shadow-blue-100/50'
        ],
        'secondary' => [
            'bg' => 'bg-gradient-to-br from-gray-50 to-gray-100',
            'text' => 'text-gray-600',
            'ring' => 'ring-gray-200',
            'shadow' => 'shadow-gray-100/50'
        ],
        'danger'    => [
            'bg' => 'bg-gradient-to-br from-red-50 to-red-100',
            'text' => 'text-red-600',
            'ring' => 'ring-red-200',
            'shadow' => 'shadow-red-100/50'
        ],
        'success'   => [
            'bg' => 'bg-gradient-to-br from-emerald-50 to-emerald-100',
            'text' => 'text-emerald-600',
            'ring' => 'ring-emerald-200',
            'shadow' => 'shadow-emerald-100/50'
        ],
        'warning'   => [
            'bg' => 'bg-gradient-to-br from-amber-50 to-amber-100',
            'text' => 'text-amber-600',
            'ring' => 'ring-amber-200',
            'shadow' => 'shadow-amber-100/50'
        ],
    ];

    $config = $tones[$tone] ?? $tones['primary'];
@endphp

<div {{ $attributes->merge(['class' => 'group relative p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-gray-200 ' . $config['shadow']]) }}>
    <div class="absolute inset-0 bg-gradient-to-br from-transparent via-white/50 to-gray-50/30 rounded-xl"></div>

    <div class="relative flex items-start justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-gray-500 mb-1 tracking-wide uppercase">{{ $title }}</p>
            <p class="text-3xl font-bold text-gray-900 tracking-tight">{{ $value }}</p>
        </div>

        <div class="flex-shrink-0 ml-4">
            <div class="p-3 rounded-xl {{ $config['bg'] }} ring-1 {{ $config['ring'] }} group-hover:scale-110 transition-transform duration-200">
                @if($icon === 'users')
                    <svg class="h-6 w-6 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1m-6 6H3v-2a4 4 0 014-4h1m6-4a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                @elseif($icon === 'user-plus')
                    <svg class="h-6 w-6 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m8-10a4 4 0 100-8 4 4 0 000 8zm6 2h2m-1-1v2"/>
                    </svg>
                @elseif($icon === 'alert-circle')
                    <svg class="h-6 w-6 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M21.5 12a9.5 9.5 0 11-19 0 9.5 9.5 0 0119 0z"/>
                    </svg>
                @elseif($icon === 'trending-up')
                    <svg class="h-6 w-6 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                @elseif($icon === 'dollar-sign')
                    <svg class="h-6 w-6 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                    </svg>
                @elseif($icon === 'clock')
                    <svg class="h-6 w-6 {{ $config['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                @endif
            </div>
        </div>
    </div>

    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-transparent via-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
</div>
