@extends('layout.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('task.index') }}" class="link">
            &larr; Back to Task List
        </a>

    </div>
    <p class="mb-4 text-slate-700">
        {{ $task->description }}
    </p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created: {{ $task->created_at->diffForHumans() }} &bullet; Updated: {{ $task->updated_at->diffForHumans() }}</p>
    <p class="mb-4">
        {{-- Status: {{ $task->completed ? 'Completed' : 'Incomplete' }} --}}
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>

        @else
            <span class="font-medium text-red-500">Incomplete</span>
        @endif
    </p>

    {{-- link to the list of tasks --}}

    {{-- link to edit task --}}
    <div class="flex gap-2">
        <a href="{{ route('task.edit', ['task' => $task]) }}"
            class="btn">
            Edit Task
        </a>

    {{-- Button to toggle task completion --}}
        <form action="{{ route('task.toggleComplete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                {{ $task->completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
            </button>
        </form>

    {{-- Button to delete task --}}
        <form action="{{ route('task.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete Task</button>
        </form>
    </div>
@endsection
