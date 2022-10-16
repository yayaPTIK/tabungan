 @extends('layouts.apps')
 @section('content')
      <div class="container-fluid">
    <div class="row">
        <div class="main-header">
            <h4>Dashboard</h4>
        </div>
    </div>
    @php
        $bulan = date('F');
        $tahun = date('Y');
    @endphp
    <!-- 4-blocks row start -->
    <div class="row dashboard-header">
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Uang Masuk Hari Ini</span>
                <h2 class="dashboard-total-products"><span>{{number_format($harianMasuk, 0,",", ",")}}</span></h2>
                <span class="label label-success">{{date('Y-m-d')}}</span>
                <div class="side-box">
                <i class="ti-direction-alt text-success-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Uang Keluar Hari Ini</span>
                <h2 class="dashboard-total-products"><span>{{number_format($harianKeluar, 0,",", ",")}}</span></h2>
                <span class="label label-success">{{date('Y-m-d')}}</span>
                <div class="side-box">
                <i class="ti-direction-alt text-success-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Uang Masuk {{date('F')}}</span>
                <h2 class="dashboard-total-products">{{number_format($debetBulan->sum('debet'), 0,",", ",")}}</h2>
                <span class="label label-warning">{{date('F')}}</span>{{$tahun}}
                <div class="side-box">
                <i class="ti-signal text-warning-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Uang Keluar {{date('F')}}</span>
                <h2 class="dashboard-total-products">{{number_format($debetBulan->sum('kredit'), 0,",", ",")}}</h2>
                <span class="label label-primary">{{date('F')}}</span>{{$tahun}}
                <div class="side-box ">
                <i class="ti-gift text-primary-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Uang Masuk Tahun Ini</span>
                <h2 class="dashboard-total-products"><span>{{number_format($debetTahun->sum('debet'), 0,",", ",")}}</span></h2>
                <span class="label label-success">January</span>2022
                <div class="side-box">
                <i class="ti-direction-alt text-success-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Uang Keluar Tahun ini</span>
                <h2 class="dashboard-total-products"><span>{{number_format($debetTahun->sum('kredit'), 0,",", ",")}}</span></h2>
                <span class="label label-danger">{{$bulan}}</span>{{$tahun}}
                <div class="side-box">
                <i class="ti-rocket text-danger-color"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card dashboard-product">
                <span>Jumlah Nasabah</span>
                <h2 class="dashboard-total-products"><span>{{$nasabah}}</span></h2>
            </div>
        </div>
       
        </div>
    </div>
</div>
 @endsection
