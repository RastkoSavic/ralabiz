{{-- Error Messages --}}
@if(count($errors) > 0)
   <br>
   @foreach($errors->all() as $error)
      <div class="alert alert-danger">
         {{$error}}
      </div>
   @endforeach
   <br>
@endif

{{-- Success Message --}}
@if(session('success'))
   <br>
   <div class="alert alert-success">
      {{session('success')}}
   </div>
   <br>
@endif

{{-- Session Error Message --}}
@if(session('error'))
   <br>   
   <div class="alert alert-danger">
      {{session('error')}}
   </div>
   <br>
@endif