<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('title')
        @yield('meta')

        <link rel="apple-touch-icon" sizes="180x180" href="/storage/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/storage/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/storage/favicon/favicon-16x16.png">
        <link rel="manifest" href="/storage/favicon/site.webmanifest">
        <link rel="mask-icon" href="/storage/favicon/safari-pinned-tab.svg" color="#F1F5F9">
        <meta name="msapplication-TileColor" content="#F1F5F9">
        <meta name="theme-color" content="#ffffff">
        <title>Order # {{$order->reference}} ~ {{config('app.name')}}</title>

        <style>
            .invoice-title h2, .invoice-title h3 {
                display: inline-block;
            }

            .table > tbody > tr > .no-line {
                border-top: none;
            }

            .table > thead > tr > .no-line {
                border-bottom: none;
            }

            .table > tbody > tr > .thick-line {
                border-top: 2px solid;
            }
            .btn-print{
                margin-top: 20px;
                margin-bottom: 10px;
            }
        </style>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="invoice-title">
                                <h2>{{config('app.name')}} order invoice</h2>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <a class="btn btn-warning btn-print hidden-print pull-right" href="/account/orders/{{$order->reference}}" style="margin-left: 10px;">Exit</a>

                            <button class="btn btn-primary btn-print hidden-print pull-right" onclick="javascript: window.print(); return false;">Print invoice</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-xs-12">
                                    <strong>Order #:</strong><br>
                                    {{$order->reference}}<br><br>

                                    <strong>Order Status:</strong><br>
                                    {{ $order->status->label }}<br><br>

                                    <strong>Order Date:</strong><br>
                                    {{date('d/m/Y', strtotime($order->created_at))}}<br><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                            <strong>Billed & Shipped To:</strong><br>
                                {{ $order->address->first_name }}<br>
                                {{ $order->address->address }}<br>
                                {{ $order->address->phone }}<br><br>
                            </address>
                            <strong>Payment Method:</strong><br>
                                Cash on delivery<br><br>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td><strong>Item</strong></td>
                                            <td class="text-center"><strong>Price</strong></td>
                                            <td class="text-center"><strong>Quantity</strong></td>
                                            <td class="text-right"><strong>Totals</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td class="text-center">{{ config('app.currency') }} {{$item->item_price}}</td>
                                            <td class="text-center">{{$item->quantity}}</td>
                                            <td class="text-right">{{ config('app.currency') }} {{$item->sub_total_price}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                            <td class="thick-line text-right">{{ config('app.currency') }} {{$order->sub_total_price}}</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Shipping</strong></td>
                                            <td class="no-line text-right">{{ config('app.currency') }} {{$order->shipping_cost}}</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Total</strong></td>
                                            <td class="no-line text-right">{{ config('app.currency') }} {{$order->total_price}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>