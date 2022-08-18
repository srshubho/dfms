<a class="inline-flex items-center w-full text-sm font-semibold @foreach ($links as $link) {{ request()->is($link) ? 'text-gray-800 dark:text-gray-100' : '' }} @endforeach transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    href="{{ route($route) }}">
    {!! $icon !!}
    <span class="ml-4">{{ $name }}</span>
</a>
