{{-- Extends Main Layout --}}
@extends('layouts.app')

{{-- Content with Specified Listing --}}
@section('content')
    <div class="card">
        <div class="card-header clearfix">
            <span class="lead">{{$listing->name}}</span>
            <span class="float-right"><a href="/listings" class="btn btn-primary btn-sm">Go Back</a></span>
        </div>

        <div class="card-body">
            <ul class="list-group">
               <li class="list-group-item"><b>Address:</b> {{$listing->address}}</li>
               <li class="list-group-item"><b>Website:</b> <a href="#" target="_blank">{{$listing->website}}</a></li>
               <li class="list-group-item"><b>E-mail:</b> {{$listing->email}}</li>
               <li class="list-group-item"><b>Phone:</b> {{$listing->phone}}</li>
            </ul>
            <hr>
            <div class="card card-body">
               <p><b>Bio:</b> {{$listing->bio}}</p>
            </div>
        </div>
    </div>
@endsection
