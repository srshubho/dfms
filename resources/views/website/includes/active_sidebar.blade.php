@foreach ($links as $link)
    <span class="{{ request()->is($link) ? 'absolute inset-y-0 left-0 w-2 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true">
    </span>
@endforeach
