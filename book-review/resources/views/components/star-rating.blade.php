
@if ($rating)
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $rating)
            <span class="text-yellow-500">★</span>
        @else
            <span class="text-gray-300">★</span>
        @endif
    @endfor
@else
  No rating yet

@endif
