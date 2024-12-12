@extends('layouts.app')

@section('content')
    @include('partials.form', ['task' => $task])
@endsection
