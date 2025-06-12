<x-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-8 px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">New Patient Registration</h1>
                            <p class="text-blue-100 text-sm">Complete patient information and medical details</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('patients.create') }}" method="POST" class="p-8 space-y-8">
                    @csrf

                    <div class="space-y-6">
                        <div class="flex items-center space-x-3 pb-3 border-b border-gray-200">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Personal Information</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="surname" label="Surname" :value="old('surname')" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="first_name" label="First Name" :value="old('first_name')" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="other_name" label="Other Name" :value="old('other_name')" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="place_of_origin" label="Place of Origin" :value="old('place_of_origin')" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="state" label="State" :value="old('state')" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="local_government_area" label="Local Government Area" :value="old('local_government_area')" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="phone_number" label="Phone Number" type="tel" :value="old('phone_number')" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="address" label="Address" :value="old('address')" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-3 pb-3 border-b border-gray-200">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Next of Kin</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="full_name" label="Full Name" :value="old('full_name')" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="relationship" label="Relationship" :value="old('relationship')" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="kin_phone_number" label="Phone Number" :value="old('kin_phone_number')" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                            <div class="transform transition-all duration-200 hover:scale-[1.02]">
                                <x-input name="kin_address" label="Address" :value="old('kin_address')" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white" />
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center space-x-3 pb-3 border-b border-gray-200">
                            <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-800">Vital Signs</h2>
                            <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full">Initial Assessment</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-gradient-to-br from-red-50 to-pink-50 p-4 rounded-xl border border-red-100 transform transition-all duration-200 hover:scale-[1.02] hover:shadow-md">
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="w-6 h-6 bg-red-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">T</span>
                                    </div>
                                    <span class="text-sm font-medium text-red-700">Temperature</span>
                                </div>
                                <x-input name="temperature" label="Temperature (°C)" type="number" step="0.1" :value="old('temperature')" required class="w-full px-3 py-2 border border-red-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200" />
                            </div>

                            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-100 transform transition-all duration-200 hover:scale-[1.02] hover:shadow-md">
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">BP</span>
                                    </div>
                                    <span class="text-sm font-medium text-blue-700">Blood Pressure</span>
                                </div>
                                <x-input name="blood_pressure" label="Blood Pressure (mmHg)" :value="old('blood_pressure')" required placeholder="120/80" class="w-full px-3 py-2 border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                            </div>

                            <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-4 rounded-xl border border-green-100 transform transition-all duration-200 hover:scale-[1.02] hover:shadow-md">
                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">P</span>
                                    </div>
                                    <span class="text-sm font-medium text-green-700">Pulse Rate</span>
                                </div>
                                <x-input name="pulse" label="Pulse (bpm)" type="number" :value="old('pulse')" required class="w-full px-3 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200" />
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between items-center pt-6 border-t border-gray-200 space-y-4 sm:space-y-0">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>All data is encrypted and secure</span>
                        </div>

                        <div class="flex space-x-4">
                            <a href="{{ route('patients.index.page') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-all duration-200 font-medium flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>Cancel</span>
                            </a>
                            <x-button type="submit" class="flex items-center justify-center px-8 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transform hover:scale-[1.02] transition-all duration-200 font-medium shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Save Patient Record</span>
                            </x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
