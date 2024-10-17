@extends('layouts.app')

@section('content')

<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title font-weight-bold text-uppercase"> Add Clients </h4>
        </div>
    </div>
</div>
<!-- end page title -->
<!-- Start Form  -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('includes.error')
                <h4 class="header-title text-uppercase"> Basic Info</h4>
                <hr>
                <form class="needs-validation" method="post" action="{{route("save-party")}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Type</label>
                                <select name="party_type" class="form-control border-bottom "
                                    id="validationCustom01" placeholder="Please select Type">
                                    <option value="">Please Select</option>
                                    <option value="client" selected>client</option>
                                    <option value="vendor">vendor</option>
                                    <option value="employee">employee</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="validationCustom01">Full Name</label>
                                <input type="text" class="form-control border-bottom "
                                    id="validationCustom01" placeholder="Enter client's full name"
                                    name="fullname" value="{{ old('fullname')}}">
                                <div class="invalid-feedback">
                                    Please provide a Full name.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="validationCustom02">Phone/Mobile Number</label>
                                <input type="text" class="form-control border-bottom "
                                    id="validationCustom02" placeholder="Enter phone/mobile number"
                                    name="phone_number" value="{{ old('phone_number')}}">
                                <div class="invalid-feedback">
                                    Please provide a Number.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="validationCustom03">Address</label>
                                <input type="text" class="form-control border-bottom "
                                    id="validationCustom02" placeholder="Enter Address" name="address" value="{{ old('address')}}">
                                <div class="invalid-feedback">
                                    Please provide a valid Address.
                                </div>
                            </div>
                        </div>
                    </div>


                    <h4 class="header-title text-uppercase">Bank Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="validationCustom04">Account Holder Name</label>
                                <input type="text" class="form-control border-bottom "
                                    id="validationCustom04" placeholder="Enter Account Holder name"
                                    name="account_holder_name" value="{{ old('account_holder_name')}}">
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="validationCustom05">Account Number</label>
                                <input type="text" class="form-control border-bottom "
                                    id="validationCustom05" placeholder="Enter Account Number"
                                    name="account_number" value="{{ old('account_number')}}">
                                <div class="invalid-feedback">
                                    Please provide a valid Code.
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="validationCustom02">Bank Name</label>
                                <input type="text" class="form-control border-bottom "
                                    id="validationCustom02" placeholder="Enter Bank Name"
                                    name="bank_name" value="{{ old('bank_name')}}">
                                <div class="invalid-feedback">
                                    Please provide a GSTIN No.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="validationCustom02">IFSC Code</label>
                                <input type="text" class="form-control border-bottom "
                                    id="validationCustom02" placeholder="Enter IFSC Code"
                                    name="ifsc_code" value="{{ old('ifsc_code')}}">
                                <div class="invalid-feedback">
                                    Please provide a Email.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="validationCustom02">Branch</label>
                            <input type="text" class="form-control border-bottom "
                                id="validationCustom02" placeholder="Enter Branch" name="branch_address" value="{{ old('branch_address')}}">
                            <div class="invalid-feedback">
                                Please provide a Branch Name.
                            </div>
                        </div>
                    </div>
                    <br>

                    <button class="btn btn-primary" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

