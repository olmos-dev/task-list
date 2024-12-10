@extends('layouts.app')

@section('title','Agregar nueva tarea')

@section('styles')
<style>
    .error-message{
        color:red;
    }
</style>
@endsection

@section('content')
<form action="{{ route('task.store') }}" method="post">
    @csrf
    <div>
        <label for="tarea">Tarea </label>
        <input type="text" name="title" id="task" value="{{old('task')}}">
        @error('task')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="descripcion">Descripcion </label>
        <textarea name="description" id="description" rows="5">{{old('description')}}</textarea>
        @error('description')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="long_descripcion">Descriocion detallada</label>
        <textarea name="long_description" id="long_description" rows="10">{{old('long_description')}}</textarea>
        @error('long_description')
            <small class="error-message">{{$message}}</small>
        @enderror
    </div>
    <div>
        <button type="submit">Agregar Tarea</button>
    </div>
</form>
@endsection
