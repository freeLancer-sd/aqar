@extends('layouts.app')

@section('content')
    {{--<div class="center">--}}
    <img src="{{url('logo.png')}}" height="100" width="100">
    <br>
    <h1>
        مرحبا بك: {{Auth()->user()->name}}
    </h1>
    {{--</div>--}}

@endsection