<?php

use Faker\Test\Provider\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

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

#Index
Route::get('tasks',function(){
    $tasks = Task::all();
    return view('index',[
        'tasks' => $tasks
    ]);
})->name('task.index');

#create
Route::view('task/create','create')->name('task.create');

#Edit
Route::get('task/{id}/edit',function($id){
    $task = Task::findOrFail($id);

    return view('edit',[
        'task' => $task
    ]);

})->name('task.edit');


#Show
Route::get('task/{id}',function($id){
    $task = Task::findOrFail($id);

    return view('show',[
        'task' => $task
    ]);

})->name('task.show');

#update
Route::put('task/{id}', function (Request $request, $id) {

    $datos = $request->validate([
        'task' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = Task::findOrFail($id);

    $task->update([
        'title' => $datos['task'],
        'description' => $datos['description'],
        'long_description' => $datos['long_description']
    ]);

    return redirect()->route('task.show', ['id' => $task->id])->with('success','La tarea se edito correctamente');

})->name('task.update');

#store
Route::post('task/store', function (Request $request) {

    $datos = $request->validate([
        'task' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = Task::create([
        'title' => $datos['task'],
        'description' => $datos['description'],
        'long_description' => $datos['long_description']
    ]);

    return redirect()->route('task.show', ['id' => $task->id])->with('success','La tarea se ha creado correctamente');

})->name('task.store');




