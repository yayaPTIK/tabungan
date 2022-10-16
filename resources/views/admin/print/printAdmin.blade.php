<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Print</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

        <!-- Styles -->
        <style>
          body {
              padding-top: 20px;
              padding-bottom: 20px;
            }

            .navbar {
              margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
            <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand d-sm-none">
                
            </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    {{-- <form action="{{route('keuangan.printAll',$printAll->id)}}" method="get" style="float: right">
                        <input type="date" name="tanggal1" style="display: inline">
                        <span>Sampai</span>
                        <input type="date" name="tanggal2" style="display: inline"><button type="submit" class="btn btn-sm m-2">tampilkan</button>
                </form>                     --}}
                </li>
              {{-- <li class="active"><a href="">Back to Dashboard</a></li> --}}
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <table id="table-datatables" class="display table-responsive-md table table-bordered">
        <thead>
            <tr>
                <th id="">No</th>
                <th id="">Nama</th>
                <th id="">Transaksi ID</th>
                <th id="">Masuk</th>
                <th id="">Keluar</th>
                <th id="">saldo</th>
                <th id="">Keterangan</th>
                <th id="">Admin</th>
                <th id="">Waktu</th>
            </tr>            
        </thead>
 
        <tfoot>
            <tr>
                <th id="" colspan="3">Jumlah</th>
                <th id="">Rp. {{number_format($print->sum('debet'), 0,",",",")}}</th>
                <th id="">Rp. {{number_format($print->sum('kredit'), 0,",",",")}}</th>
                <th id="" colspan="4">Rp. {{number_format($print->sum('debet') - $print->sum('kredit'), 0,",",",")}}</th>
            </tr>
        </tfoot>
 
        <tbody>
            @php
                $saldo = 0;
            @endphp
            @if ($print->count())
            @foreach ($print as $key=>$p)
            @php
                $saldo += $p->debet - $p->kredit;
            @endphp
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$p->user->name}}</td>
                <td>{{$p->transaksiID}}</td>
                <td>Rp. {{number_format($p->debet, 0, ",",",")}}</td>
                <td>Rp. {{number_format($p->kredit, 0,",",",")}}</td>
                <td>Rp. {{number_format($saldo, 0,",","")}}</td>
                <td>{{$p->keterangan}}</td>
                <td>{{$p->admin}}</td>
                <td>{{$p->created_at}}</td>
            </tr>
        @endforeach
        @else
            <tr>
            <td colspan="9" style="color:red">Data Tidak Ditemukan</td>
            </tr>
        </tbody>
        @endif
        </table>

    </div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<!-- ini cuman untuk bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- ini untuk datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset('backend/button/dataTables.buttons.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">
    
    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['excel']
        });
    });
</script>

    </body>
</html>
