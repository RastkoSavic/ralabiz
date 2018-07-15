{{-- Extends Main Layout --}}
@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-header clearfix">
      Create Listing
      <span class="float-right">
         <a href="/dashboard" class="btn btn-primary btn-sm">Go Back</a>
      </span>
   </div>

   <div class="card-body">
      {!! Form::open(['action' => 'ListingsController@store', 'method' => 'POST']) !!}
         {{ Form::bsText('name', '', ['placeholder' => 'Company Name']) }}
         {{ Form::bsText('website', '', ['placeholder' => 'Company Website']) }}
         {{ Form::bsText('email', '', ['placeholder' => 'Contact E-mail']) }}
         {{ Form::bsText('phone', '', ['placeholder' => 'Contact Phone']) }}
         {{ Form::bsText('address', '', ['placeholder' => 'Business Address']) }}
         {{ Form::bsTextArea('bio', '', ['placeholder' => 'About This Business']) }}
         {{ Form::bsSubmit('submit', ['class' => 'btn btn-primary float-right']) }}
      {!! Form::close() !!}
   </div>
</div>
@endsection