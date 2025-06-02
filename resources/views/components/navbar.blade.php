<nav class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <button id="menuToggle" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li>
                        <a href="#" class="text-gray-500 hover:text-gray-700 text-sm font-medium">Home</a>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-4 w-4 text-gray-300 mx-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-gray-700 text-sm font-semibold">Dashboard</span>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="flex items-center space-x-4">
            <div class="relative">
                <button id="profileDropdown" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="h-8 w-8 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-xs">JD</span>
                    </div>
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                    <div class="border-t border-gray-200 my-1"></div>
                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Sign out</a>
                </div>
            </div>
        </div>
    </div>
</nav>
