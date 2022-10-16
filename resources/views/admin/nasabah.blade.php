@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="main-header">
            <h4>Data Nasabah All</h4>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-md-12">
                <div class="card" style="overflow: auto" >
                    <div class="card-header justify-content-center">
                    <h5 class="card-header-text">Jumlah Nasabah {{$user->count()}}</h5>
                     <form action="{{route('nasabah')}}" method="get" style="display: inline-block; float: right;">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Cari Nama Disini" value="{{request('search')}}">
                        </div>
                    </form>
                    </div>
                    <div class="card-block">
                     <div class="card-body">
                    @if(session('successMsg'))
                        <div class="alert alert-info">
                            <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                            <span>
                                {{session('successMsg')}}
                            </span>
                        </div>
                    @endif
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th id="">No</th>
                                <th id="">NIK</th>
                                <th id="">Nama</th>
                                <th id="">Saldo</th>
                                <th id="" class="text-center" colspan="4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($user->count() != 0)
                            @foreach ($user as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->nik}}</td>
                                    <td><a href="{{route('admin.profile', $item->id)}}">{{$item->name}}</a></td>
                                    <td>Rp. {{number_format($item->keuangan->sum('debet') - $item->keuangan->sum('kredit'), 0,",",",")}}</td>
                                    <td>
                                        {{-- <a href="{{route('transaksi.create', $item->id)}}" class="btn btn-info btn-sm">Input</a></td> --}}
                                    <td>
                                        <a href="{{route('keuangan.show',$item->id)}}" class="btn btn-success btn-sm">Detail</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm btn-info " href="{{route('debet.create',$item->id)}}">
                                            Masuk
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm btn-warning " href="{{route('kredit.create',$item->id)}}">
                                            Keluar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="7" style="color: red">Data Tidak ditemukan</td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th id="">No</th>
                                <th id="">NIK</th>
                                <th id="">Nama</th>
                                <th id="">Saldo</th>
                                <th id="" class="text-center" colspan="4">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection