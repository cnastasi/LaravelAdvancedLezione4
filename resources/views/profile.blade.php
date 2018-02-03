@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                    <div><strong>Id:</strong> {{$user->id}}</div>
                    <div><strong>Name:</strong> {{$user->name}}</div>
                    <div><strong>E-mail:</strong> {{$user->email}}</div>
                    <div><strong>Age:</strong> {{$user->age}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
