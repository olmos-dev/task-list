@extends('layouts.app')

@section('title',$task->title)

@section('content')

    @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
    @endif

    <p>{{$task->description}}</p>
    @if ($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif
    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>
    <p>{{$task->completed ? 'Completado' : 'No completado'}}</p>

    <div>
        <a href="{{route('task.edit', ['task' => $task->id]) }}">Editar</a>
    </div>
    <div>
        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Eliminar</button>
        </form>
    </div>
    <div>
        <form action="{{route('task.toggle', ['task' => $task]) }}" method="post">
            @csrf
            @method('put')
            <button type="submit"> Marcar como {{$task->completed ? 'no completado' : 'completado'}}</button>
        </form>
    </div>

@endsection

