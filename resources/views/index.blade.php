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

    <nav class="mb-4">
        <a href="{{route('task.create')}}" class="font-medium text-gray-700 underline decoration-pink-500"> Crear Tarea</a>
    </nav>

    @forelse ($tasks as $task )
        <div>
            <a @class(['line-through font-bold' => $task->completed]) href="{{ route('task.show',['task' => $task->id]) }}">{{$task->title}}</a>
        </div>
    @empty
        <div>No hay tareas</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{$tasks->links()}}
        </nav>
    @endif

@endsection

