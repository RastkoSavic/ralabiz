{{-- Extends Main Layout --}}
@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header clearfix">
      Edit Listing
      <span class="float-right">
         <a href="/dashboard" class="btn btn-primary btn-sm">Go Back</a>
      </span>
   </div>

   <div class="card-body">
      {!! Form::open(['action' => ['ListingsController@update', $listing->id], 'method' => 'POST']) !!}
         {{ Form::bsText('name', $listing->name, ['placeholder' => 'Company Name']) }}
         {{ Form::bsText('website', $listing->website, ['placeholder' => 'Company Website']) }}
         {{ Form::bsText('email', $listing->email, ['placeholder' => 'Contact E-mail']) }}
         {{ Form::bsText('phone', $listing->phone, ['placeholder' => 'Contact Phone']) }}
         {{ Form::bsText('address', $listing->address, ['placeholder' => 'Business Address']) }}
         {{ Form::bsTextArea('bio', $listing->bio, ['placeholder' => 'About This Business']) }}
         {{ Form::hidden('_method', 'PUT') }}
         {{ Form::bsSubmit('submit', ['class' => 'btn btn-primary float-right']) }}
      {!! Form::close() !!}
   </div>
</div>
@endsection