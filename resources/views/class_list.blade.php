@extends('layouts.app')

@section('content')
    @foreach ($class as $cls)
        <div class="card text-center">
            <div class="card-header">
                {{ $cls->kelas }}
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item disabled" aria-disabled="true">Course in class</li>

                    @php
                        $solve = explode(',', $cls->course_class);
                        foreach ($solve as $slv) {
                            echo '<li class="list-group-item list-group-item-info">',
                                \App\Models\course::where(['id' => $slv])
                                    ->pluck('name')
                                    ->first(),
                                '</li>';
                        }

                    @endphp
                </ul>
                <br>

                <a href="class_data/{{ $cls->id }}" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    @endforeach
@endsection
