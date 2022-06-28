@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Card tables</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nama</th>

                                <th scope="col">tugas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugas as $tsk)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">

                                            <div class="media-body">
                                                <span class="mb-0 text-sm">{{ $tsk->nama }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td>

                                        <a href="/download/{{ $tsk->file }}/ans" class="btn btn-warning">Download
                                            tugas</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <br>
@endsection
