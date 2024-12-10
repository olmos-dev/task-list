<?php

use Faker\Test\Provider\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

/*
class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];
*/

Route::get('/',function(){
    return redirect()->route('task.index');
});

#index
Route::get('tasks',function(){
    $tasks = Task::all();
    return view('index',[
        'tasks' => $tasks
    ]);
})->name('task.index');

#create
Route::view('task/create','create')->name('task.create');

#edit
Route::get('task/{task}/edit',function(Task $task){

    return view('edit',[
        'task' => $task
    ]);

})->name('task.edit');


#show
Route::get('/task/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('task.show');

#update
Route::put('task/{task}', function (TaskRequest $request, Task $task) {

    $task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])->with('success','La tarea se edito correctamente');

})->name('task.update');

#store
Route::post('task/store', function (TaskRequest $request) {


    $task = Task::create($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])->with('success','La tarea se ha creado correctamente');

})->name('task.store');




