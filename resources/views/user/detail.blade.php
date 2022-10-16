@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="main-header">
            <h4>Detail</h4>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5 class="card-header-text">Repot Tabungan {{Auth::user()->name}}</h5>
                    </div>
                    <div class="card-body" style="overflow: auto">
                    <div>
                        @if(session('successMsg'))
                        <div class="alert alert-info">
                            <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">x</button>
                            <span>
                                {{session('successMsg')}}
                            </span>
                        </div>
                    @endif
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th id="">No</th>
                                <th id="">Transaksi ID</th>
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
                                $b = date('m');
                                $t = date('Y');
                                // 
                                // 
                            @endphp
                            @if($user->where('user_id', Auth::user()->id)->where('bulan',$b)->count() != 0)
                                @foreach ($user->where('user_id', Auth::user()->id)->where('bulan',$b)->where('tahun', $t)  as $key => $item)
                                @php
                                    $saldo += $item->debet - $item->kredit;
                                @endphp
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->transaksiID}}</td>
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
                                    <td colspan="10">
                                        <strong class="" style="color: red">Data Kosong!</strong>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                            {{-- <tr class="bg-info">
                                <td colspan="2" class="text-center"><strong>Jumlah</strong></td>
                                <td></td>
                                <td></td>
                                <td colspan=""><strong>Rp. {{number_format($user->where('user_id', Auth::user()->id)->sum('debet') - $user->where('user_id', Auth::user()->id)->sum('kredit') )}}</strong></td>
                                <td></td>
                                <td></td>
                            </tr> --}}
                    </table>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
