@extends('layouts.app')

@section('content')

@foreach ($class as $cls)
        

<div class="card text-center">
    <div class="card-header">
        
{{ \App\Models\course::where(['id' => $cls])->pluck('name')->first() }} 
    </div>
    <div class="card-body">
      <h5 class="card-title">
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="tugas_mapel/{{$cls}}" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>
    @endforeach

@endsection