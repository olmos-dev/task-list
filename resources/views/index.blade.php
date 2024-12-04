@extends('layouts.app')

@section('title',"Lista de Tareas")

@section('content')
    @forelse ($tasks as $task )
        <div><a href="{{ route('task.show',['id' => $task->id]) }}">{{$task->title}}</a></div>
    @empty
        <div>No hay tareas</div>
    @endforelse
@endsection

