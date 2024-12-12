@extends('layouts.app')

@section('title',$task->title)

@section('content')

    <a href="{{route("task.index")}}" class="enlace"> <i class="fas fa-arrow-left"></i> Volver</a>

    @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
    @endif

    <p class="mb-4 text-slate-700">{{$task->description}}</p>
    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endif
    <p class="mb-4 text-sm text-slate-500"> creado {{$task->created_at->diffForHumans()}} - actualizado {{$task->updated_at->diffForHumans()}}</p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completada</span>
        @else
            <span class="font-medium text-red-500">No Completada</span>
        @endif
    </p>

    <div class="flex gap-4">
        <a href="{{route('task.edit', ['task' => $task->id]) }}" class="boton">Editar</a>

        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="boton">Eliminar</button>
        </form>

        <form action="{{route('task.toggle', ['task' => $task]) }}" method="post">
            @csrf
            @method('put')
            <button type="submit" class="boton"> Marcar como {{$task->completed ? 'no completado' : 'completado'}}</button>
        </form>
    </div>

@endsection

