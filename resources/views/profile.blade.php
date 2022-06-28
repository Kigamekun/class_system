@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                {{-- https://e7.pngegg.com/pngimages/547/694/png-clipart-combat-helmet-computer-icons-symbol-anonymous-mask-face-people.png --}}
                                {{-- <img src="https://accounts.ignitegki.com/storage/image/profile/85-1558177107.png"
                                    class="rounded-circle"> --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                        <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                <div>
                                    <span class="heading">22</span>
                                    <span class="description">Friends</span>
                                </div>
                                <div>
                                    <span class="heading">10</span>
                                    <span class="description">Photos</span>
                                </div>
                                <div>
                                    <span class="heading">89</span>
                                    <span class="description">Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                            {{ $user->name }}<span class="font-weight-light">, {{ $profile->umur }}</span>
                        </h3>

                        <hr class="my-4" />

                        @if ($user->role == 1)
                            <ul class="list-group">
                                <li class="list-group-item disabled" aria-disabled="true">Mengajar mata pelajaran ?</li>

                                @foreach ($course as $str)
                                    <li class="list-group-item list-group-item-info">
                                        {{ \App\Models\course::where(['id' => $str])->pluck('name')->first() }} </li>
                                @endforeach
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item disabled" aria-disabled="true">Mengajar di kelas ?</li>

                                @foreach ($class as $str)
                                    <li class="list-group-item list-group-item-danger">
                                        {{ \App\Models\classes::where(['id' => $str])->pluck('kelas')->first() }}
                            </ul>
                        @endforeach
                        @endif
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">My account</h3>
                        </div>
                        <div class="col-4 text-right">

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Username</label>
                                    <input type="text" id="input-username" class="form-control form-control-alternative"
                                        placeholder="Username" value="{{ $profile->nama }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email address</label>
                                    <input type="email" id="input-email" class="form-control form-control-alternative"
                                        placeholder="jesse@example.com" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr class="my-4" />
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                    <div style="display: flex;width:100%;">
                        <div class="pl-lg-4" style="flex: 2;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Address</label>
                                        <input id="input-address" class="form-control form-control-alternative"
                                            placeholder="Home Address"
                                            value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-city">City</label>
                                        <input type="text" id="input-city" class="form-control form-control-alternative"
                                            placeholder="City" value="New York">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Country</label>
                                        <input type="text" id="input-country"
                                            class="form-control form-control-alternative" placeholder="Country"
                                            value="United States">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Postal code</label>
                                        <input type="number" id="input-postal-code"
                                            class="form-control form-control-alternative" placeholder="Postal code">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="flex: 1;">
                            <center>
                                <div
                                    style="border-radius:20px;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);width: 230px;">
                                    <h1><b>ABSENSI</b></h1>

                                    <div style="width: 230px; display:flex; flex-wrap: wrap;">
                                        @for ($i = 1; $i < $hari + 1; $i++)
                                            @if (is_null(
                                                \App\Models\absen::where(['user_id' => $user->id])->where(['tanggal' => $tahun . '-' . $bulan . '-' . $i])->first(),
                                            ))
                                                <div title="{{ $i . '-' . $bulan . '-' . $tahun }}"
                                                    style="height: 40px;width:40px !important;margin:2px;"
                                                    class="btn btn-danger"></div>
                                            @else
                                                <div title="{{ $i . '-' . $bulan . '-' . $tahun }}"
                                                    style="height: 40px;width:40px !important;margin:2px;"
                                                    class="btn btn-success"></div>
                                            @endif
                                        @endfor
                                    </div>
                                    <hr>
                                    @if (\App\Models\absen::where('user_id', Auth::id())->where('tanggal', date('Y-m-d'))->exists())
                                        <button style="margin-bottom: 10px;" class="btn btn-success">Okay!</button>
                                    @else
                                        <form action="{{ route('absent') }}" method="POST">
                                            @csrf

                                            <button type="submit" style="margin-bottom: 10px;"
                                                class="btn btn-info">Absen!</button>
                                        </form>
                                    @endif
                                </div>
                            </center>

                        </div>
                    </div>
                    <hr class="my-4" />
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">About me</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label>About Me</label>
                            <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
