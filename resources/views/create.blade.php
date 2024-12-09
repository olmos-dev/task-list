@extends('layouts.app')

@section('title','Agregar nueva tarea')

@section('content')

<form action="{{ route('task.store') }}" method="post">
    @csrf
    <div>
        <label for="tarea">Tarea </label>
        <input type="text" name="tarea" id="tarea">
    </div>
    <div>
        <label for="descripcion">Descripcion </label>
        <textarea name="descripcion" id="descripcion" rows="5"></textarea>
    </div>
    <div>
        <label for="long_descripcion">Descriocion detallada</label>
        <textarea name="long_description" id="long_description" rows="10"></textarea>
    </div>
    <div>
        <button type="submit">Agregar Tarea</button>
    </div>



</form>



@endsection
