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
                                <th scope="col">Judul</th>

                                <th scope="col">Status</th>
                                <th scope="col">See</th>
                                <th scope="col">Download</th>
                                <th scope="col">Completion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $tsk)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">

                                            <div class="media-body">
                                                <span class="mb-0 text-sm">{{ $tsk->judul }}</span>
                                            </div>
                                        </div>
                                    </th>

                                    <td>
                                        @php
                                            $finish = \App\Models\answer_task::where(['tugas_id' => $tsk->id])
                                                ->get()
                                                ->count();
                                            $all = \App\Models\Student::where(['kelas' => $kelas])
                                                ->get()
                                                ->count();
                                            $progress = ($finish / $all) * 100;
                                            if ($progress == 100) {
                                                echo '<span class="badge badge-dot mr-4"><i class="bg-success"></i> Finish</span>';
                                            } else {
                                                echo '<span class="badge badge-dot mr-4"><i class="bg-warning"></i> pending</span>';
                                            }
                                        @endphp

                                    </td>
                                    <td>
                                        <a href="/lihat_tugas/{{ $tsk->id }}" class="btn btn-success">lihat tugas </a>
                                    </td>
                                    <td>
                                        <a href="/download_zip/{{ $tsk->id }}" class="btn btn-info">Download zip </a>
                                    </td>
                                    <td>



                                        <div class="d-flex align-items-center">
                                            @php
                                                $finish = \App\Models\answer_task::where(['tugas_id' => $tsk->id])
                                                    ->get()
                                                    ->count();
                                                $all = \App\Models\Student::where(['kelas' => $kelas])
                                                    ->get()
                                                    ->count();
                                                $progress = ($finish / $all) * 100;
                                                $progress = intval($progress);
                                                echo '<span class="mr-2">' . $progress . '%</span>';
                                            @endphp

                                            <div>
                                                <div class="progress">
                                                    @php
                                                        $finish = \App\Models\answer_task::where(['tugas_id' => $tsk->id])
                                                            ->get()
                                                            ->count();
                                                        $all = \App\Models\Student::where(['kelas' => $kelas])
                                                            ->get()
                                                            ->count();
                                                        $progress = ($finish / $all) * 100;
                                                        echo '<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="'.$progress.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress.'%;"></div>';
                                                    @endphp


                                                </div>
                                            </div>
                                        </div>
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






    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Create Task
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Post Task !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" enctype="multipart/form-data" id="upload">

                    @csrf
                    <div class="modal-body">
                        <div id="alert" style="display: none;" class="alert alert-info alert-dismissible fade show"
                            role="alert">
                            <strong>Success</strong> You should check in on some of those fields below.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <input type="hidden" name="kelas" value="{{ $kelas }}">
                        <input type="hidden" name="course" value="{{ $course }}">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Judul Task</span>
                            </div>
                            <input type="text" class="form-control" placeholder=" judul" aria-label="judul"
                                aria-describedby="basic-addon1" name="judul">
                        </div>
                        <div class="card">
                            <h5>File</h5>
                            <div class="body">
                                <input type="file" name="file" class="dropify">
                            </div>
                        </div>
                        <label for="tanggal">Your Deadline</label>
                        <div class="input-group mb-3">

                            <input id="tanggal" name="tanggal" placeholder="Deadline " data-provide="datepicker"
                                data-date-autoclose="true" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
