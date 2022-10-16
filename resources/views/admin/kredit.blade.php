@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="main-header">
            <h4>Buat Data</h4>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5 class="card-header-text">Form Keluar</h5>
                    </div>
                    <div class="card-block">
                    <div>
                        <form action="{{route('kredit.store')}}" method="post">
                            @csrf
                            @php
                                $today = date("Ymd");
                                $bulan = date('m');
                                $tahun = date('Y');
                            @endphp
                            <input type="hidden" required name="bulans" value="{{$bulan}}">
                            <input type="hidden" required name="tahun" value="{{$tahun}}">
                            <input type="hidden" required name="transaksiID" value="{{$today."".$userss->count()+1}}">
                            <input type="hidden" required name="admin" value="{{Auth::user()->name}}">
                            <input type="hidden" required name="user_id" value="{{$transaksi->id}}">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="name" class="form-control" required autofocus value="{{$transaksi->name}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kredit">Kredit</label>
                                <input type="number" max="{{$max}}" name="kredit" class="form-control" required min="0">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="20" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-info btn-md">Save</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
