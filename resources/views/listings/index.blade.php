{{-- Extends Main Layout --}}
@extends('layouts.app')

{{-- Content with Listings --}}
@section('content')
    <div class="card">
        <div class="card-header">
            <p class="lead">Latest Business listings</p>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(count($listings) > 0)
               <ul class="list-group">
                  @foreach($listings as $listing)
                  <li class="list-group-item"><a href="/listings/{{$listing->id}}">{{$listing->name}}</a></li>
                  @endforeach
               </ul>
            @else
                <p>No Listings Found</p>
            @endif
        </div>
    </div>
@endsection
