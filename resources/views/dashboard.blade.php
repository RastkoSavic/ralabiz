{{-- Extends Main Layout --}}
@extends('layouts.app')

{{-- Content with User Listings --}}
@section('content')
    <div class="card">
        <div class="card-header clearfix">
            Dashboard 
            <span class="float-right">
                <a href="/listings/create" class="btn btn-primary btn-sm">Add Listing</a>
            </span>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <br>
            
            <br>
            <br>
            <p class="lead text-success">You are logged in!</p>
            <br>
            <h3>Your Listings</h3>
            <hr>
            @if(count($listings) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Company</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($listings as $listing)
                        <tr class="clearfix">
                            <td>{{$listing->name}}</td>
                            <td><a href="/listings/{{$listing->id}}/edit" class="btn btn-primary float-right">Edit</a></td>
                            <td></td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
