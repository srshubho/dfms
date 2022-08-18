<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('/') }}">
        DFMS
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            @include('website.includes.active_sidebar', ['links' => ['dashboard']])
            @include('website.includes.individual_sidebar', [
                'links' => ['dashboard'],
                'name' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => '<i class="fa-light fa-house"></i>',
            ])
            {{-- <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="{{ route('dashboard') }}">
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
        @if (auth()->user()->user_type == 1)
            <li class="relative px-6 py-3">
                @include('website.includes.active_sidebar', ['links' => ['user', 'user/create', 'user/*/edit']])
                @include('website.includes.individual_sidebar', [
                    'links' => ['user', 'user/create', 'user/*/edit'],
                    'name' => 'Users',
                    'route' => 'user.index',
                    'icon' => '<i class="fa-solid fa-users"></i>',
                ])
            </li>
        @endif
        <li class="relative px-6 py-3">
            @include('website.includes.active_sidebar', ['links' => ['color', 'color/create', 'color/*/edit']])
            @include('website.includes.individual_sidebar', [
                'links' => ['color', 'color/create', 'color/*/edit'],
                'name' => 'Color',
                'route' => 'color.index',
                'icon' => '<i class="fa-solid fa-palette"></i>',
            ])
        </li>
        <li class="relative px-6 py-3">
            @include('website.includes.active_sidebar', ['links' => ['cow-type', 'cow-type/create', 'cow-type/*/edit']])
            @include('website.includes.individual_sidebar', [
                'links' => ['cow-type', 'cow-type/create', 'cow-type/*/edit'],
                'name' => 'Cow Type',
                'route' => 'cow-type.index',
                'icon' => '<i class="fa-thin fa-cow"></i>',
            ])
        </li>
        <li class="relative px-6 py-3">
            @include('website.includes.active_sidebar', ['links' => ['shade', 'shade/create', 'shade/*/edit', 'shade/*']])
            @include('website.includes.individual_sidebar', [
                'links' => ['shade', 'shade/create', 'shade/*/edit', 'shade/*'],
                'name' => 'Shade',
                'route' => 'shade.index',
                'icon' => '<i class="fa-solid fa-shutters"></i>',
            ])
        </li>
        <li class="relative px-6 py-3">
            @include('website.includes.active_sidebar', ['links' => ['supplier', 'supplier/create', 'supplier/*/edit']])
            @include('website.includes.individual_sidebar', [
                'links' => ['supplier', 'supplier/create', 'supplier/*/edit'],
                'name' => 'Supplier',
                'route' => 'supplier.index',
                'icon' => '<i class="fa-solid fa-person-carry-box"></i>',
            ])
        </li>
        <li class="relative px-6 py-3">
            @include('website.includes.active_sidebar', ['links' => ['calf', 'calf/create', 'calf/*/edit', 'calf/*']])
            @include('website.includes.individual_sidebar', [
                'links' => ['calf', 'calf/create', 'calf/*/edit', 'calf/*'],
                'name' => 'Calves',
                'route' => 'calf.index',
                'icon' => '<i class="fa-thin fa-cow"></i>',
            ])
        </li>
        <li class="relative px-6 py-3">
            @include('website.includes.active_sidebar', ['links' => ['cow', 'cow/create', 'cow/*/edit', 'cow/*']])
            @include('website.includes.individual_sidebar', [
                'links' => ['cow', 'cow/create', 'cow/*/edit', 'cow/*'],
                'name' => 'Cow',
                'route' => 'cow.index',
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
