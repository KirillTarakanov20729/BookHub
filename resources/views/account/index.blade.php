@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{route('logout')}}">
        <button class="btn btn-lg btn-warning gradient-button w-25" type="submit">Выйти</button>
    </a>
</div>
@endsection
