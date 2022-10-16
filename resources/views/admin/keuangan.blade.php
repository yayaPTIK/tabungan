@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="main-header">
            <h4>Detail Nasabah</h4>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-md-12">
                <div class="card" style="overflow: auto">
                    <div class="card-header">
                        <h5 class="card-header-text">Report {{$usersss->name}}</h5>
                        <a href="{{route('keuangan.printAll', $usersss->id)}}" class="btn btn-sm btn-info" style="display: inline-block; float: right;">Print</a>
                    </div>
                    <div class="card-block">
                    <div>
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
                                <th id="">Transaksi ID</th>
                                <th id="">Keterangan</th>
                                <th id="">Masuk</th>
                                <th id="">Keluar</th>
                                <th id="">Saldo</th>
                                <th id="">Tanggal & Waktu</th>
                                <th id="">Penerima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $saldo = 0;
                                $no = 0;
                            @endphp
                            @if($transaksi->count() != 0)
                                @foreach ($transaksi as $key => $item)
                                @php
                                    $saldo += $item->debet - $item->kredit;
                                @endphp
                                <tr>
                                    <td>{{$item->transaksiID}}</td>                                   
                                    <td>{{$item->keterangan}}</td>                                    
                                    <td>Rp. {{ number_format($item->debet, 0, ".", ".")}}</td>                                    
                                    <td>Rp. {{number_format($item->kredit, 0, ".", ".")}}</td>  
                                    <td>
                                        Rp. {{number_format($saldo, 0, ".", ".")}}
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->admin}}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">
                                        <strong class="" style="color: red">Data Kosong!</strong>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
