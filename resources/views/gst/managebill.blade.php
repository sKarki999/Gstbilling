@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold text-uppercase">Manage Bills</h2>
            </div>
        </div>
    </div>

    <div>
        @include('includes.alerts')
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <a href="{{ route("create-gst-bill") }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> Create New Bill
                </a>
                <h4 class="header-title mb-4 text-uppercase">Manage Bills</h4>
                <div class="row">
                    <div class="col-sm-12 col-md-10">
                        <div class="dataTables_length" id="alternative-page-datatable_length"><label>Show
                                <select name="alternative-page-datatable_length"
                                    aria-controls="alternative-page-datatable"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div id="alternative-page-datatable_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm"
                                    placeholder="" aria-controls="alternative-page-datatable"></label>
                        </div>
                    </div>
                </div>
                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered"
                    id="tickets-table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Invoice No</th>
                            <th>Client Info</th>
                            <th>Billing Info</th>
                            <th>Invoice Date</th>
                            <th class="hidden-sm">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($bills))
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($bills as $bill)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $bill->invoice_number }}</td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li><b>Name : </b><span>{{ $bill->party->fullname }}</span></li>
                                        <li><b>Phone No : </b><span>{{ $bill->party->phone_number }}</span></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li><b>Total Amount : </b><span>{{ $bill->total_amount }}</span></li>
                                        <li><b>Tax (%) : </b><span>{{ $bill->tax_percentage }}</span></li>
                                        <li><b>Net Amount : </b><span>{{ $bill->net_amount }}</span></li>
                                    </ul>
                                </td>
                                <td>{{ $bill->invoice_data }}</td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);"
                                            class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                            data-toggle="dropdown" aria-expanded="false"><i
                                                class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{route('delete', ['gst_bills', $bill->id])}}"><i
                                                    class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                            <a class="dropdown-item" href="{{ route("print-gst-bill", $bill->id)}}"><i
                                                    class="mdi mdi-printer mr-2 text-muted font-18 vertical-middle"></i>
                                                Print</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="6">No Records Found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div><!-- end col -->
        </div>
    </div>
    <!-- end row -->
@endsection
