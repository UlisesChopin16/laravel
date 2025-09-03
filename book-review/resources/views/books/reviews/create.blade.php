@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Add a Review for {{ $book->title }}</h1>

    <form action="{{ route('books.reviews.store', $book) }}" method="POST">
        @csrf

        <div>
            <label for="review">Review</label>
            <textarea id="review" name="review" required class="input mb-4"></textarea>
        </div>

        <div>
            <label for="rating">Rating</label>
            <select id="rating" name="rating" required class="input mb-4">
                <option value="">Select a rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn">Add Review</button>
    </form>
@endsection
