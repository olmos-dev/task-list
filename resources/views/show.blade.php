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

    <div>
        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Eliminar</button>
        </form>
    </div>

@endsection

