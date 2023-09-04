@extends('layouts.app')

@section('content')
<ul>
    @foreach($users as $user)
        <li>{{$user->username}}</li>
    @endforeach
</ul>
@endsection
