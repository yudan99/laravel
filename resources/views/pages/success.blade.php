@extends('layouts.app')
@section('title', '完成‘)

@section('content')
    <div class="card">
        <div class="card-header">完成</div>
        <div class="card-body text-center">
            <h1>{{ $msg }}</h1>
            <a class="btn btn-primary" href="{{ route('root') }}">返回首页</a>
        </div>
    </div>
@endsection
