@extends('layouts.app')

@section('content')

<br>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#task" role="tab" aria-controls="profile" aria-selected="false">Task</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


<div class="row mt-5">
  <div class="col">
    <div class="card bg-default shadow">
      <div class="card-header bg-transparent border-0">
        <h3 class="text-white mb-0">{{ \App\Models\classes::where(['id' => $kelas])->pluck('kelas')->first() }}</h3>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-dark table-flush">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Budget</th>
              <th scope="col">Status</th>
              <th scope="col">Users</th>

              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($student as $std)
                  
              <tr>
                  <th scope="row">
                <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                        <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                  </a>
                  <div class="media-body">
                      <span class="mb-0 text-sm">{{$std->nama}}</span>
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
                <div class="d-flex align-items-center">
                    <span class="mr-2">60%</span>
                  <div>
                      <div class="progress">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                  </div>
              </div>
          </td>
          <td class="text-right">
              <div class="dropdown">
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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



  </div>
  <div class="tab-pane fade" id="task" role="tabpanel" aria-labelledby="profile-tab">
    @foreach ($course as $item)



    <div class="card text-center">
      <div class="card-header">
        Course !
      </div>
      <div class="card-body">
        <h5 class="card-title"> <b>{{ \App\Models\course::where(['id' => $item])->pluck('name')->first() }}</b></h5>
        <p class="card-text">we supporting learn for many programming.</p>
        <a href="/task/{{$kelas}}/{{$item}}" class="btn btn-primary">see course !</a>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
    </div>

    
    @endforeach



  </div>
  
</div>


@endsection