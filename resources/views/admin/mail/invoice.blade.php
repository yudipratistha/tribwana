<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Penyeawaan Barang HMTI </title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title text-center">
                                <img src="https://lh6.googleusercontent.com/iNYwzTShg8yGdWuIdBoav0zmgPRDnrP_E_76gC4kxJ1g0z-74QOOYvEFkcOkLs8RcoYzhnhC3mby3eQF4jhP=w1366-h672" style="width:100%; max-width:300px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                <b>Halo,<br>
                                {{$name}}<br>
                                Penyeawaan barang anda berhasil<br>
                            </td>

                            <td>
                                Invoice #: TR{{$id}}S<br>
                                {{$tgl_pesan}}<br>
                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Item
                </td>
                <td class="text-center">
                    qty
                </td>
                <td class="text-right">
                    Harga
                </td>
            </tr>
            @foreach($vrf as $brg_sewa)
            @php
                $end = \Carbon\Carbon::parse($brg_sewa->end_date);
                $start = \Carbon\Carbon::parse($brg_sewa->start_date);
                $length = $end->diffInDays($start);
                if($length==0){
                    $length=1;
                }
            @endphp
            <tr class="item">
                <td>
                    {{$brg_sewa->barang->nama_barang}} ({{$length}} hari)
                </td>
                <td class="text-center">
                    {{$brg_sewa->qty}}
                </td>
                <td class="text-right">
                    {{$brg_sewa->harga}}
                </td>
            </tr>
            @endforeach

            <tr class="total text-right">
                <td></td>
                <td></td>
                <td>
                    Total: {{$total_harga}}
                </td>
            </tr>
        </table>
    </div>

</body>
</html>