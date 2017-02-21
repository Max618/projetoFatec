@extends('layouts.model')

@section('page-title')
index
@endsection

@section('content')
Colocar coisas da index

@if (session('status'))
    <div role="alert" class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif

@endsection