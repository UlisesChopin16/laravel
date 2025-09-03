@extends('layout.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    {{-- {{ $errors }} --}}
    <form method="POST" action="{{ isset($task) ? route('task.update', ['task' => $task]) : route('task.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title"
            @class(['border-red-500' => $errors->has('title')])
            value="{{ $task->title ?? old('title') }}">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5"
            @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description') }}
            </textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long Description:</label>
            <textarea id="long_description" name="long_description" rows="10"
            @class(['border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-row-reverse items-center gap-5">
            <button type="submit" class="btn">
                {{ isset($task) ? 'Update Task' : 'Add Task' }}
            </button>
            <a href="{{ route('task.index') }}" class="link">Cancel</a>
        </div>
    </form>
@endsection
