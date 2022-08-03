<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('/') }}">
            DFMS
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['dashboard']])
                @include('admin.includes.individual_sidebar', [
                    'links' => ['dashboard'],
                    'name' => 'Dashboard',
                    'route' => 'admin.dashboard',
                    'icon' => '<i class="fa-light fa-house"></i>',
                ])
                {{-- <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="{{ route('admin.dashboard') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a> --}}

            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['color', 'color/create', 'color/*/edit']])
                @include('admin.includes.individual_sidebar', [
                    'links' => ['color', 'color/create', 'color/*/edit'],
                    'name' => 'Color',
                    'route' => 'admin.color.index',
                    'icon' => '<i class="fa-solid fa-palette"></i>',
                ])
            </li>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['cow-type', 'cow-type/create', 'cow-type/*/edit']])
                @include('admin.includes.individual_sidebar', [
                    'links' => ['cow-type', 'cow-type/create', 'cow-type/*/edit'],
                    'name' => 'Cow Type',
                    'route' => 'admin.cow-type.index',
                    'icon' => '<i class="fa-thin fa-cow"></i>',
                ])
            </li>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['shade', 'shade/create', 'shade/*/edit']])
                @include('admin.includes.individual_sidebar', [
                    'links' => ['shade', 'shade/create', 'shade/*/edit'],
                    'name' => 'Shade',
                    'route' => 'admin.shade.index',
                    'icon' => '<i class="fa-solid fa-shutters"></i>',
                ])
            </li>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['supplier', 'supplier/create', 'supplier/*/edit']])
                @include('admin.includes.individual_sidebar', [
                    'links' => ['supplier', 'supplier/create', 'supplier/*/edit'],
                    'name' => 'Supplier',
                    'route' => 'admin.supplier.index',
                    'icon' => '<i class="fa-solid fa-person-carry-box"></i>',
                ])
            </li>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['cow', 'cow/create', 'cow/*/edit', 'cow/*']])
                @include('admin.includes.individual_sidebar', [
                    'links' => ['cow', 'cow/create', 'cow/*/edit'],
                    'name' => 'Cow',
                    'route' => 'admin.cow.index',
                    'icon' => '<i class="fa-thin fa-cow"></i>',
                ])
            </li>
        </ul>
        {{-- <div class="px-6 my-6">
            <button
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div> --}}
    </div>
</aside>

<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
</div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            DFMS
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['dashboard']])
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="{{ route('admin.dashboard') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['color', 'color/create', 'color/*/edit']])
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.color.index') }}">
                    <i class="fa-solid fa-palette"></i>
                    <span class="ml-4">Color</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['cow-type', 'cow-type/create', 'cow-type/*/edit']])
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.cow-type.index') }}">
                    <i class="fa-thin fa-cow"></i>
                    <span class="ml-4">Cow Type</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['shade', 'shade/create', 'shade/*/edit']])
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.shade.index') }}">
                    <i class="fa-solid fa-shutters"></i>
                    <span class="ml-4">Shade</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['supplier', 'supplier/create', 'supplier/*/edit']])
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.supplier.index') }}">
                    <i class="fa-solid fa-person-carry-box"></i>
                    <span class="ml-4">Supplier</span>
                </a>
            </li>
            <li class="relative px-6 py-3">
                @include('admin.includes.active_sidebar', ['links' => ['cow', 'cow/create', 'cow/*/edit']])
                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ route('admin.cow.index') }}">
                    <i class="fa-thin fa-cow"></i>
                    <span class="ml-4">Cow</span>
                </a>
            </li>
        </ul>
        {{-- <div class="px-6 my-6">
            <button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div> --}}
    </div>
</aside>