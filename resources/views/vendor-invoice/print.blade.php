<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Vendor Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Coding Kalakar - Invoice" name="description" />
    <meta content="Coding Kalakar" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App css -->
    <link href="{{ asset('assets/css2/bootstrap-creative.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css2/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('assets/css2/bootstrap-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('assets/css2/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="{{ asset('assets/css2/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body class="bg-white">

    <!-- Begin page -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page m-0 mt-4 p-0">
            <div class="content">
                <!-- Start Content-->
                <div class="container">
                    <div class="row mt-3">
                        @if($invoice)
                        <div class="col-12">
                            <div class="card-box border">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h3 class="m-1">INVOICE </h3>
                                        <p><b>Date : </b><span>{{ date("d F Y", strtotime($invoice->invoice_date)) }}</span> | <b>Invoice Number : </b><span>{{ $invoice->invoice_number }}</span></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 p-2 border">
                                        {{ $invoice->fullname }} <br>
                                        {{ $invoice->address }} <br>
                                        (M) +977 {{ $invoice->phone_number }}
                                    </div>
                                    <div class="col-md-6 p-2 border text-right">
                                        <b>Client info:</b><br>
                                        Shankar Chapagain<br>
                                        Yogikuti, Rupendehi<br>
                                        Butwal<br>

                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-md-12 p-0">
                                        <div class="table table-responsive">
                                            <table class="table mt-4 table-centered border">
                                                <thead>
                                                    <tr>
                                                        <th class="py-0 heading-color">DESCRIPTION</th>
                                                        <th class="text-center py-1 heading-color w-15">AMOUNT</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{!! str_replace("\n", "<br>", $invoice->item_description) !!}</td>
                                                        <td class="text-center"><i class="fas fa-rupee-sign"></i> {{ $invoice->total_amount }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Total</th>
                                                        <td class="text-center"><i class="fas fa-rupee-sign"></i> {{ $invoice->total_amount }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="row">
                                    <div class="col-sm-8 col-lg-8 p-0">
                                        <div class="alert alert-info">
                                            <strong class="text-uppercase text-center">Bank Account Details:</strong>
                                            <p class="m-0">
                                                <b>A/c No:</b> {{ $invoice->account_number }}<br>
                                                <b>Name:</b> {{ $invoice->account_holder_name }}<br>
                                                <b>Branch:</b> {{ $invoice->bank_name }}, {{ $invoice->branch_address }}<br>
                                                <b>IFSC:</b> {{ $invoice->ifsc_code }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-lg-4 mt-1 text-center">
                                        <p>
                                            <b>{{ $invoice->fullname }}</b><br>
                                            {{ date("d F Y", strtotime($invoice->invoice_date)) }}
                                        </p>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="mt-4 mb-1">
                                    <div class="text-right d-print-none">
                                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light">Print <i class="mdi mdi-printer mr-1"></i></a>
                                    </div>
                                </div>
                            </div> <!-- end card-box -->
                        </div>
                        @else
                        <div class="col-12">
                            <div class="alert alert-warning">No record found!</div>
                        </div>
                        @endif
                    </div>
                    <!-- end row -->
                </div> <!-- container -->

            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

</body>

</html>
