<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>tantemartje.nl - factuur #{{$order->id}}</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            /*padding: 30px;*/
            /*border: 1px solid #eee;*/
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            /*line-height: inherit;*/
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

        #footer {
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            right: 0;
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
                <table style="width: 100vh ;">
                    <tr>
                        <td class="title" style="width: 50% ; ">
                            tantemartje.nl
                            {{--<img src="" style="width:270px;">--}}
                        </td>

                        <td style="width: 50% ; background: #eee;border-bottom: 1px solid #ddd;   margin-right: -15px; padding: 10px;">
                            <b>Factuur #{{$order->id}}</b> <br>
                            Aankoop datum
                            <br>{{$order->created_at->format('d-m-Y') }}
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
                            <b>Tante Martje</b> <br>
                            Leenderweg 74,<br>
                            5615 AB Eindhoven,<br>
                            Nederland<br><br>
                            Site: www.tantemartje.nl <br>
                            Tel: +31 (0) 6 -----<br>
                            E-mail: info@tantemartje.nl<br>
                            BTW: ---<br>
                            KvK: ---<br>
                        </td>
                        <td> </td>

                        <td  style="text-align: right">
                            <b>Klant gegevens</b> <br>
                            {{$order->name}}<br>
                            {{$order->address}}
                            {{$order->address_number}},<br>
                            {{$order->postal_code}} {{$order->city}} <br>
                            <br>
                            {{$order->email}}<br>
                            {{$order->telephone_home}}<br>
                            {{$order->telephone_mobile}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Betaal Method
            </td>
            <td></td>

            <td>
                {{--Check #--}}
            </td>
        </tr>

        <tr class="details">
            <td>
                @if($order->payment_method)
                    {{$order->payment_method}}
                @else
                    N.v.t. - Betaling is nog niet voldaan.
                @endif
            </td>
            <td></td>
            <td>

            </td>
        </tr>

    </table>

    <table cellpadding="1" cellspacing="">

        <tr class="heading">
            <td style="width: 250px;">
                Product
            </td>

            <td>
                Aantal
            </td>
            <td style="text-align: right">
                p.st.
            </td>

            <td style="text-align: right">
                Btw
            </td>

            <td style="text-align: right">
                Totaal
            </td>

            {{--<td style="text-align: right">--}}
                {{--Btw--}}
            {{--</td>--}}
        </tr>

        @foreach($order->productOrders as $item)

            <tr class="item">
                <td>
                    {!! $item->product->title !!}
                    <b>{!! (!$item->product->hasOneProductType() ? (' - '.json_decode($item->data, true)['variants']): '') !!}</b>
                </td>
                <td>
                    {!! $item->order_qty!!}
                </td>
                <td style="text-align: right">
                    €{!! number_format($item->unit_price, 2) !!}
                    {{--{!! dd(json_decode($item->data, true))!!}--}}
                </td>
                <td style="text-align: right">
                    €{!! number_format((($item->unit_price * $item->order_qty) - ($item->unit_price * $item->order_qty / 121 * 100) ), 2)!!}
                    {{--{!! dd(json_decode($item->data, true))!!}--}}
                </td>
                <td style="text-align: right">
                    €{!! number_format($item->unit_price * $item->order_qty , 2)   !!}
                    {{--{!! dd(json_decode($item->data, true))!!}--}}
                </td>
            </tr>

        @endforeach


        <tr class="item">
            <td>
                {{--{!! dd($item) !!}--}}
                verzendkosten <small>Excl. BTW</small>
            </td>
            <td>
            </td>
            <td style="text-align: right">
            </td>
            <td style="text-align: right">
            </td>
            <td style="text-align: right">
                €{!! number_format(exclBtw($order->shipping_costs, 21), 2)   !!}
                {{--{!! dd(json_decode($item->data, true))!!}--}}
            </td>
        </tr>


        <tr class="">
            <td> </td>
            <td> </td>
            <td> </td>
            <td colspan="2" style="text-align: right">
                <br>
                <br>
                <b>btw: <span >€{{ number_format(Btw($order->total_paid, 21), 2) }}</span></b>
            </td>
        </tr>

        <tr class=" ">
            <td> </td>
            <td> </td>
            <td> </td>
            <td colspan="2" style="text-align: right">
                <b>Excl. btw: <span >€{{number_format( exclBtw($order->total_paid, 21), 2)}}</span></b>
            </td>
        </tr>

        <tr class=" ">
            <td> </td>
            <td> </td>
            <td> </td>
            <td colspan="2" style="text-align: right">
                <b>Totaal: <span >€{{$order->total_paid}}</span></b>
            </td>
        </tr>
    </table>

    <hr>
    <p>
        <b>bank:</b> code |
        <b>bankrekening:</b> NL00ABNA xxxxxx |
        <b>BIC code:</b> NL00ABNA xxxxxx
    </p>

</div>
</body>
</html>