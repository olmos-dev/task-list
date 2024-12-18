@extends('layouts.app')

@section('title',"Lista de Tareas")

@section('content')
    @include('partials.flash_messages')

    <nav class="mb-4">
        <a href="{{route('task.create')}}" class="enlace"> Crear Tarea</a>
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

