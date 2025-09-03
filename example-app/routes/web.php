<?php

use App\Http\Requests\TaskRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];

Route::get('/', function ()  {
    // return view('welcome');
    return redirect()->route('task.index');
});

Route::get('/tasks', function ()  {
    //obtiene todas las tareas
    // $tasks = Task::all();

    // obtiene las ultimas tareas registradas
    // $tasks = Task::latest()->get();

    // Obtiene las ultimas tareas registradas y filtradas
    // $tasks = Task::latest()->where('completed', false)->paginate(5);
    // Obtiene las ultimas tareas registradas y paginadas
    $tasks = Task::latest()->paginate(10);
    // return view('welcome');
    return view('index', [
        // 'name' => $name,
        'tasks' => $tasks
    ]);
}) ->name('task.index');

Route::view('/tasks/create', 'create') ->name('task.create');

Route::get('/tasks/{task}/edit', function (Task $task)  {
    return view('edit', ['task' => $task]);
})->name('task.edit');

Route::get('/tasks/{task}', function (Task $task)  {
    return view('show', ['task' => $task]);
})->name('task.show');

Route::post('/tasks', function (TaskRequest $request) {
    // dd($request->all());
    // $data = $request->validated();
    // // Task::create($data);
    // $task = new Task();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $validated = $request->validated();
    $task = Task::create($validated);

    return redirect()->route('task.show', ['task' => $task])
        ->with('success', 'Task created successfully!');
})->name('task.store');

Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {
    $validated = $request->validated();
    $task->update($validated);

    return redirect()->route('task.show', ['task' => $task])
        ->with('success', 'Task updated successfully!');
})->name('task.update');

Route::put('/tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task state updated successfully!');
})->name('task.toggleComplete');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('task.index')
        ->with('success', 'Task deleted successfully!');
})->name('task.destroy');


Route::fallback(function () {
    return 'Still got somewhere to go!';
});
