@extends('layouts.app')

@section('content')
    @foreach ($class as $cls)
        

<div class="card text-center">
    <div class="card-header">
        <h1><b>
{{ \App\Models\classes::where(['id' => $cls])->pluck('kelas')->first() }}
</b></h1> 
    </div>
    <div class="card-body">
      <h5 class="card-title">Max Student : 
        {{ \App\Models\classes::where(['id' => $cls])->pluck('max_student')->first() }} </h5>
      <p class="card-text">Just Like That !</p>
      <a href="details_kelas/{{$cls}}" class="btn btn-primary">See class !</a>
    </div>
    <div class="card-footer text-muted">
      
    </div>
  </div>
    @endforeach
@endsection
