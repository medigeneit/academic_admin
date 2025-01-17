<!DOCTYPE html>

<html>

<head>
    <title>Load PDF</title>
    <style type="text/css">

        .header{width: 100%}
        .header img{padding-top: 50px;padding-left: 30px}
        .header #triangle-topright-black {  width: 0;  height: 0;  border-top: 25px solid #000000;  border-left: 100px solid transparent;  position: absolute;  right: 0;  top: 0;z-index: 9  }
        .header #triangle-topright-blue {  width: 0;  height: 0;  border-top: 100px solid #28aaa9;  border-left: 25px solid transparent;  position: absolute;  right: 0;  top: 0;  }
        .footer {  width: 100%}
        .footer1, .footer2, .footer3{  width: 33%;  display: inline-block;  }
        .footer p{  padding-left:20px;  }
        .footerbg1{  height:30px;  background: #00033d;  }
        .footerbg2{  height:30px;  background: #28aaa9;  }
        .footerbg3{  height:30px;  background: #00033d;  }


        .heading h2{  text-align: center;margin-top: 0  }
        #utility {  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;  border-collapse: collapse;  width: 100%;  }
        #utility tr th{}
        #utility td, #utility th {  border: 1px solid #ddd;  padding: 8px;  }
        #utility tr:nth-child(even){background-color: #f2f2f2;}
        #utility tr:hover {background-color: #ddd;}
        #utility th {  padding-top: 12px;  padding-bottom: 12px;  text-align: left;  background-color: #5FC0BF;  color: white;  }

        @media print {
            @page {margin-top: 50mm; margin-bottom: 50mm;
                margin-left: 0mm; margin-right: 0mm}
            .header {
                position: fixed;
                top: 0;
            }
            .footer {
                position: fixed;
                bottom: -15px;
            }
        }

    </style>
</head>

<body>

<div class="header">
    <img src="{{ asset('images/logo.png') }}" alt="">
    <button onclick="$(this).hide();window.print()">Print</button>
    <span id="triangle-topright-black"></span>
    <span id="triangle-topright-blue"></span>
</div>

<div class="main">

    <div class="heading">
        @php $report =($reportdata['report_type']=='yearly')?$reportdata['year']:(($reportdata['report_type']=='monthly')?month_convert($reportdata['month']).', '.$reportdata['year']:$reportdata['start_date'].' to '.$reportdata['end_date']) @endphp
        <h2>Utility's Report of {{$report}}</h2>
    </div>
    @php $total =0; @endphp
    @if(isset($utilities))
        <table id="utility" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Title</th>
                <th>Month</th>
                <th>Status</th>
                <th>Payable Date</th>
                <th>Paid Date</th>
                <th>Expire Date</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utilities as $key=>$utility)
                <tr role="row">
                    <td>{{$key+1}}</td>
                    <td>{{$utility->title}}</td>
                    <td>@php echo ($utility->billing_date)?date('M, Y',strtotime($utility->billing_date)):'' @endphp</td>
                    <td>{{$utility->status}}</td>
                    <td>@php echo ($utility->payable_date)?date('Y-m-d',strtotime($utility->payable_date)):'' @endphp</td>
                    <td>@php echo ($utility->paid_date)?date('Y-m-d',strtotime($utility->paid_date)):'' @endphp</td>
                    <td>@php echo ($utility->expire_date)?date('Y-m-d',strtotime($utility->expire_date)):'' @endphp</td>
                    <td>{{$utility->amount}}</td>
                </tr>
                @php $total = $total+$utility->amount @endphp
            @endforeach
            <tr role="row">
                <td  colspan="6"></td>
                <td  align="right">Total Amount:</td>
                <td>{{$total}}</td>
            </tr>
            </tbody>
        </table>
    @endif

</div>

<div class="footer">
    <div class="footer1">
        <p>274, Shah Kabir Mazar Road</p>
        <p>+8801779379503</p>
        <p class="footerbg1"></p>
    </div>



    <div class="footer2">
        <p>http://itclanbd.com</p>
        <p>info@itclanbd.com</p>
        <p class="footerbg2"></p>
    </div>

    <div class="footer3">
        <p>fb.com/itclanbd</p>
        <p>twitter.com/itclanbd</p>
        <p class="footerbg3"></p>
    </div>

</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>

</html>