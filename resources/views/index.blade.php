@extends('layouts.app')

@section('title',"Lista de Tareas")

@section('content')
    <div>
        @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>

    @forelse ($tasks as $task )
        <div><a href="{{ route('task.show',['task' => $task->id]) }}">{{$task->title}}</a></div>
    @empty
        <div>No hay tareas</div>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{$tasks->links()}}
        </nav>
    @endif

@endsection

