@extends('layouts.app')

@isset($task)

@endisset

@section('title', isset($task) ? 'Editar tarea' : 'Agregar nueva tarea')

@section('styles')
<style>
    .error-message{
        color:red;
    }
</style>
@endsection

@section('content')
<form action="{{ isset($task) ? route('task.update', ['task' => $task]) : route('task.store') }}" method="post">
    @csrf
    @isset($task)
        @method('put')
    @endisset
    <div>
        <label for="tarea">Tarea </label>
        <input type="text" name="title" id="task" value="{{$task->title ?? old('task')}}">
        @error('title')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="descripcion">Descripcion </label>
        <textarea name="description" id="description" rows="5">{{$task->description ?? old('description')}}</textarea>
        @error('description')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="long_descripcion">Descriocion detallada</label>
        <textarea name="long_description" id="long_description" rows="10">{{$task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <button type="submit">
            @isset($task)
                Actualizar tarea
            @else
                Agregar tarea
            @endisset
        </button>
    </div>
</form>
@endsection
