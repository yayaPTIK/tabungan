<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabungan Print</title>
</head>
<body>
    @php
        $saldo = $saldoKeuangan->sum('debet') - $saldoKeuangan->sum('kredit');
        if($printRow->debet == 0){
            $nominal = $printRow->kredit;
        }else{
            $nominal = $printRow->debet;
        }
    @endphp
    <table>
        <tr>
            <td>
                <pre>
            Tabungan 
    KM. 14 - Jendral Soedirman 18 
            {{date('d-M-Y')}}
    ==============================
                </pre>
            </td>
        </tr>
        <tr>
            <td>
                <pre>
    No Transaksi     : {{$printRow->transaksiID}}
    Nama Nasabah     : {{$printRow->user->name}}
    Nominal Transaksi: Rp.{{number_format($nominal, 0,",",",")}}

    Masuk            : Rp.{{number_format($printRow->debet, 0,",",",")}}
    Keluar           : Rp.{{number_format($printRow->kredit, 0,",",",")}}
    Saldo            : Rp.{{number_format($saldo, 0,",",",")}}
                </pre>
            </td>
        </tr>
        <tr>
            <td>
    <pre>
    Informasi Lebih Lanjut Silahkan Hubungi
    Contact Tabungan di 087723721718
    <a href="{{route('keuangan.show', $printRow->user_id)}}">*** Terimakasih ***</a>
    </pre>
            </td>
        </tr>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>