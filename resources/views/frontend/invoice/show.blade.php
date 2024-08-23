@extends('frontend.layout.app')

@section('title')

invoice view page

@endsection

@section('content')

<div class="invoice invoice-content invoice-5">
    <div class="back-top-home hover-up mt-30 ml-30">
        <a class="hover-up" href="index.html"><i class="fi-rs-home mr-5"></i> Homepage</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner">
                    <div class="invoice-info" id="invoice_wrapper">
                        <div class="invoice-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="logo d-flex align-items-center">
                                        <a href="index.html" class="mr-20"><img src="frontend/imgs/theme/favicon.svg" alt="logo" /></a>
                                        <div class="text">
                                            <strong class="text-brand">NestMart Inc</strong> <br />
                                            205 North, Suite 810, Chicago, USA
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h2>INVOICE</h2>
                                    <h6>ID Number: <span class="text-brand">98657</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-banner">
                            <img src="frontend/imgs/invoice/banner.png" alt="">
                        </div>
                        <div class="invoice-center">
                            <div class="table-responsive">
                                <table class="table table-striped invoice-table">
                                    <thead class="bg-active">
                                        <tr>
                                            <th>Item Item</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderItems as $row)
                                        <tr>
                                            <td>
                                                <div class="item-desc-1">
                                                    <span>{{ $row->product->name }}</span>
                                                    <!-- <small>SKU: FWM15VKT</small> -->
                                                </div>
                                            </td>
                                            <td class="text-center">₹{{$row->product->price}}</td>
                                            <td class="text-center">{{$row->qty}}</td>
                                            <td class="text-right">₹{{$row->getSubtotalAttribute()}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                            <td class="text-right">$1710.99</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end f-w-600">Tax</td>
                                            <td class="text-right">$85.99</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                            <td class="text-right f-w-600">$1795.99</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-bottom pb-80">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-15">Invoice Infor</h6>
                                    <p class="font-sm">
                                        <strong>Issue date:</strong> 20 march, 2022<br />
                                        <strong>Invoice To:</strong> NestMart Inc<br />
                                        <strong>Swift Code:</strong> BFTV VNVXS
                                    </p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h6 class="mb-15">Total Amount</h6>
                                    <h3 class="mt-0 mb-0 text-brand">$1795.99</h3>
                                    <p class="mb-0 text-muted">Taxes Included</p>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="hr mt-30 mb-30"></div>
                                <p class="mb-0 text-muted"><strong>Note:</strong>This is computer generated receipt and does not require physical signature.</p>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-custom btn-print hover-up"> <img src="frontend/imgs/theme/icons/icon-print.svg" alt="" /> Print </a>
                        <a id="invoice_download_btn" class="btn btn-lg btn-custom btn-download hover-up"> <img src="frontend/imgs/theme/icons/icon-download.svg" alt="" /> Download </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS-->
<script src="frontend/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="frontend/js/vendor/jquery-3.6.0.min.js"></script>
<!-- Invoice JS -->
<script src="frontend/js/invoice/jspdf.min.js"></script>
<script src="frontend/js/invoice/invoice.js"></script>

@endsection