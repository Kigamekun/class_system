@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">Card tables</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Project</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Status</th>
                                <th scope="col">Users</th>
                                <th scope="col">Completion</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $tc)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle mr-3">
                                                <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                                            </a>
                                            <div class="media-body">
                                                <span class="mb-0 text-sm">{{ $tc->nama }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        $2,500 USD
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i> pending
                                        </span>
                                    </td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                                data-original-title="Ryan Tompson">
                                                <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg"
                                                    class="rounded-circle">
                                            </a>
                                            <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                                data-original-title="Romina Hadid">
                                                <img alt="Image placeholder" src="../assets/img/theme/team-2-800x800.jpg"
                                                    class="rounded-circle">
                                            </a>
                                            <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                                data-original-title="Alexander Smith">
                                                <img alt="Image placeholder" src="../assets/img/theme/team-3-800x800.jpg"
                                                    class="rounded-circle">
                                            </a>
                                            <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                                data-original-title="Jessica Doe">
                                                <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg"
                                                    class="rounded-circle">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
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
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button>

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
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>



                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>




                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>


                    <div id='busList' style='width:100%;display: flex; flex-flow: row wrap;'>
                        @foreach ($class as $cls)
                            <div class="ck-button" id="ck-button"><label><input type="checkbox"
                                        value="{{ $cls->id }}" /><span> {{ $cls->kelas }}</span></label></div>
                        @endforeach
                    </div>

                    <div id='busList' style='width:100%;display: flex; flex-flow: row wrap;'>
                        @foreach ($mapel as $mpl)
                            <div class="ck-button" id="ck-button"><label><input type="checkbox"
                                        value="{{ $mpl->id }}" /><span> {{ $mpl->name }}</span></label></div>
                        @endforeach
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
