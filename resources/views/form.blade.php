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
    <div class="mb-4">
        <label for="tarea">Tarea </label>
        <input type="text" name="title" id="task" value="{{$task->title ?? old('task')}}" @class(['border-red-500' => $errors->has('title')])>
        @error('title')
            <small class="errores">{{$message}}</small>
        @enderror
    </div>
    <div class="mb-4">
        <label for="descripcion">Descripcion </label>
        <textarea name="description" id="description" rows="5" @class(['border-red-500' => $errors->has('description')])>{{$task->description ?? old('description')}}</textarea>
        @error('description')
            <small class="errores">{{$message}}</small>
        @enderror
    </div>
    <div class="mb-4">
        <label for="long_descripcion">Descriocion detallada</label>
        <textarea name="long_description" id="long_description" rows="10" @class(['border-red-500' => $errors->has('long_description')])>{{$task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
            <small class="errores">{{$message}}</small>
        @enderror
    </div>
    <div class="mb-4 flex gap-4 items-center">
        <button type="submit" class="boton">
            @isset($task)
                Actualizar tarea
            @else
                Agregar tarea
            @endisset
        </button>
        <a href="{{route('task.index')}}" class="boton">Cancelar</a>
    </div>
</form>
@endsection
