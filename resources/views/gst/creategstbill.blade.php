@extends('layouts.app')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <div>
            @include('includes.error')
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title font-weight-bold"> CREATE GST BILL </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title text-uppercase">Invoice Basic Info</h4>
                        <hr>
                        <form action="{{route("save-gst-bill")}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Type</label>
                                        <select class="form-control border-bottom" id="validationCustom01" name="party_id">
                                            <option>Existing Client</option>
                                            @foreach ($parties as $party)
                                            <option value="{{$party->id}}">{{$party->fullname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Invoice Date</label>
                                        <input type="date" class="form-control border-bottom"
                                            id="validationCustom02" name="invoice_data">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label>Invoice Number</label>
                                        <input type="text" class="form-control border-bottom"
                                            id="validationCustom02" name="invoice_number" placeholder="Enter Phone/Mobile number">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h4 class="header-title text-uppercase">Item Details</h4>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 border p-1 text-center">
                                    <b>DESCRIPTIONS</b>
                                </div>
                                <div class="col-md-4 border p-1 text-center">
                                    <b>TOTAL AMOUNT</b>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 border p-2">
                                    <input class="form-control" name="item_description" />
                                </div>
                                <div class="col-md-4 border p-2">
                                    <input class="form-control" type="text" name="total_amount" id="totalAmountInput"
                                        oninput="calculateNetAmount()">
                                </div>
                            </div>

                            <div class="row mt-0">
                                <div class="col-md-3">
                                    <label>Tax (%)</label>
                                    <input type="text" class="form-control border-bottom"
                                        placeholder="Tax Rate" id="taxPercentage" name="tax_percentage" oninput="calculateNetAmount()">

                                    {{-- <input type="hidden" id="cgstAmount" name="tax_amount" value="0"> --}}
                                </div>

                                {{-- <div class="col-md-3">
                                    <label>SGST (%)</label>
                                    <input type="text" class="form-control border-bottom"
                                        placeholder="SGST Rate" id="sgst" oninput="calculateNetAmount()">
                                    <span class="float-right gststyle" id="sgstDisplay">0</span>
                                    <input type="hidden" id="sgstAmount" name="sgst_amount" value="0">
                                </div> --}}

                                <div class="col-md-3">
                                    <label>Net Amount </label>
                                    <input type="text" class="form-control border-bottom"
                                        placeholder="" id="netAmount" name="net_amount" value="0">
                                </div>

                                <div class="col-md-3">
                                    <ul style="list-style: none;float: right;">
                                        <li>
                                            <b>Total Amount:</b> ₹ <span type="text"
                                                id="totalAmountDisplay">0</span>
                                        </li>
                                        <li>
                                            <b>Tax:</b> ₹ <span type="text" id="taxDisplay">0</span>
                                            {{-- <input type="hidden" value="0" name="tax_amount"
                                                id="taxAmount"> --}}
                                        </li>
                                        <li>
                                            <b>Net Amount:</b> ₹ <span type="text"
                                                id="netAmountDisplay" name="net_amount">0</span>
                                            {{-- <input type="hidden" value="0" name="net_amount" id="netAmount"> --}}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control border-bottom"
                                            id="validationCustom05" name="declaration" placeholder="Declaration">
                                    </div>
                                        <button type="submit"
                                            class="btn btn-primary float-right mb-2">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
