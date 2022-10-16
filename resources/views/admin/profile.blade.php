@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="row">
        <div class="main-header">
            <h4>Profile Nasabah</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="user-block-2">
                <img class="img-thumbnail" style="height: 200px" src="{{asset('storage/' .$user->avatar)}}" alt="user-header">
                <h5>{{$user->name}}</h5>
                </div>
                <div class="card-block">
                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-clock-time"></i> {{$user->nik}}
                        <label class="label label-primary">NIK</label>
                    </div>
                </div>
                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-users"></i> {{$user->jk}}
                        <label class="label label-primary">Jenis Kelamin</label>
                    </div>
                </div>

                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-ui-user"></i> {{$user->alamat}}
                        <label class="label label-primary">Alamat</label>
                    </div>

                </div>
                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-picture"></i> {{$user->email}}
                        <label class="label label-primary">Email</label>
                    </div>
                </div>
                <div class="user-block-2-activities">
                    <div class="user-block-2-active">
                        <i class="icofont icofont-picture"></i> {{$user->hp}}
                        <label class="label label-primary">Nomor HP</label>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{route('admin.edit',$user->id)}}" class="btn btn-warning waves-effect waves-light text-uppercase m-r-30">
                            Edit
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection