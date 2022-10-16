@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>

                <div class="card-body">
                   <form action="{{route('transaksi.store')}}" method="post">
                        @csrf
                        @php
                            $today = date("Ymd");
                            $tsk = "TSK";
                        @endphp
                        <input type="hidden" required name="transaksiID" value="{{$today."".$userss->count()+1}}">
                        <input type="hidden" required name="user_id" value="{{$transaksi->id}}">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="name" class="form-control" required autofocus value="{{$transaksi->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="">--Pilih Jenis--</option>
                                <option value="Pemasukan">Pemasukan</option>
                                <option value="Pengeluaran">Pengeluaran</option>
                            </select>
                        <div class="form-group">
                            @php
                                $time = date("h:i:s");
                            @endphp
                            <label for="waktu">Jam</label>
                            <input type="time" name="waktu" id="watu" class="form-control" value="{{$time}}" readonly>
                        </div>
                        <div class="form-group">
                            @php
                                $today = date("m/d/Y");  
                            @endphp
                            <label for="hari">Hari</label>
                            <input type="text" name="hari" id="hari" class="form-control" value="{{$today}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Uang</label>
                            <input type="number" min="1" name="jumlah" id="jumlah" class="form-control" value="" required>
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
@endsection
