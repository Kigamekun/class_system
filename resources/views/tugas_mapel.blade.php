@extends('layouts.app')

@section('content')
    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#task" role="tab" aria-controls="profile"
                aria-selected="false">Teachers</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



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
                                        <th scope="col">Tugas</th>
                                        <th scope="col">Budget</th>

                                        <th scope="col">Kerjakan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tugas as $tsk)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                        <img alt="Image placeholder"
                                                            src="../assets/img/theme/bootstrap.jpg">
                                                    </a>
                                                    <div class="media-body">
                                                        <span class="mb-0 text-sm">{{ $tsk->judul }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>
                                                <a href="/download/{{ $tsk->file }}/task"
                                                    class="btn btn-warning">Download tugas</a>
                                            </td>

                                            <td>


                                                @if (is_null(
                                                    \App\Models\answer_task::where(['tugas_id' => $tsk->id])->where(['nama' => $nama])->first(),
                                                ))
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#exampleModalCenter"
                                                        onclick="answer({{ $tsk->id }});" id="button_answer">
                                                        Answer task
                                                    </button>
                                                @else
                                                    <h1><span class="badge badge-success">Selesai !</span></h1>
                                                @endif
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



        </div>



        <div class="tab-pane fade" id="task" role="tabpanel" aria-labelledby="profile-tab">

            <div class="card mb-3">

                <div class="card-body">
                    @if ($teacher != '')
                        <center><h3 class="card-title">{{ $teacher->nama }}</h3></center>
                    @endif

                </div>
            </div>



        </div>





    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/answer_task" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="tugas" id="tugas">


                        <div class="card">
                            <h5>File</h5>
                            <div class="body">
                                <input type="file" name="file" class="dropify">
                            </div>
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
