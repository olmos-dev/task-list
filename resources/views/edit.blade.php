@extends('layouts.app')

@section('title','Editar una tarea')

@section('styles')
<style>
    .error-message{
        color:red;
    }
</style>
@endsection

@section('content')
<form action="{{ route('task.update',['id' => $task->id ]) }}" method="post">
    @csrf
    @method('put')
    <div>
        <label for="tarea">Tarea </label>
        <input type="text" name="task" id="task" value="{{$task->title}}">
        @error('task')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="descripcion">Descripcion </label>
        <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
        @error('description')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="long_descripcion">Descriocion detallada</label>
        <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
        @error('long_description')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <button type="submit">Editar Tarea</button>
    </div>
</form>
@endsection
