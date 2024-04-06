@extends('master')
@section('content')

<body>
    <style>
        .text-danger strong {
            color: #9f181c;
        }

        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }

        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }

        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }

        .receipt-main thead th {
            color: #fff;
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }

        .receipt-right p i {
            text-align: center;
            width: 18px;
        }

        .receipt-main td {
            padding: 9px 20px !important;
        }

        .receipt-main th {
            padding: 13px 20px !important;
        }

        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }

        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }

        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        #container {
            background-color: #dcdcdc;
        }
    </style>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Pay Request List</h5>
                    </center>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ref Number</th>
                                <th scope="col">Payment Purpose</th>
                                <th scope="col">Pay Amount</th>
                                <th scope="col">User</th>
                                <th scope="col">Approved By</th>
                                <th scope="col">Receipt</th>
                                <th scope="col">status</th>
                                <th scope="col">Remarks</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($pay_reqeust as $index => $data)
                            <tr>
                                <td>{{$data->reference_id}}</td>
                                <td>{{$data->description}}</td>
                                <td>{{$data->amount}}</td>
                                <td>sunnah</td>
                                <td>{{$data->signature}}</td>
                                <td>
                                    <a href="#" onclick="showData('{{ $data->reference_id }}', '{{ $data->description }}', '{{ $data->amount }}')"  data-bs-target="#receiptModal">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                                <!-- <td>
                                    <a href="" onclick="showData(json_encode($index)); return false;">Show Data</a>
                                </td> -->

                                <td>

                                    @if($data->status==0)
                                    <a href="" class="badge text-bg-primary">


                                        pending
                                    </a>
                                    @endif
                                    @if($data->status==1)
                                    <a href="" class="badge text-bg-success">
                                        Approved
                                    </a>
                                    @endif

                                    @if($data->status==2)
                                    <a href="" class="badge text-bg-danger">
                                        Reject
                                    </a>
                                    @endif

                                </td>
                                <td>{{$data->comment}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-2"></div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="receiptModalLabel">{{$data->reference_id}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="well">
                                        <!-- Your provided HTML content -->
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <address>
                                                        <strong>Alternative Recruitment Limited</strong>
                                                        <br>
                                                        House 02,12/A Road, Sector 10
                                                        <br>
                                                        Uttara,Dhaka
                                                        <br>
                                                    </address>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <p>
                                                        <em>Date: 1st November, 2013</em>
                                                    </p>
                                                    <p>
                                                        <em>Receipt #: 34522677W</em>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text-center">
                                                    <h1>Receipt</h1>
                                                </div>
                                                <!-- Table with receipt details -->
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">User</th>
                                                            <th class="text-center">Purpose</th>
                                                            <th class="text-center">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Sample receipt rows -->
                                                        <tr>
                                                            <td class="text-center">sunnah</td>
                                                            <td class="text-center">wifi bill</td>
                                                            <td class="text-center">$26</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td></td>
                                                            <td class="text-end"><strong>Subtotal:</strong></td>
                                                            <td class="text-center">$82</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <!-- End of table with receipt details -->
                                            </div>
                                        </div>
                                        <!-- End of your provided HTML content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Approved</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showData(index, a, b) {
            console.log(index, a, b);
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
@endsection