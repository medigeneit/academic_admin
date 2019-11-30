<!DOCTYPE html>

<html>

<head>

    <title>Load PDF</title>
    <style type="text/css">
        body{  margin: 0 auto;  width: 700px;  }
        table{  width: 100%;  border:1px solid #cccccc;  margin-top:20px;  padding-top: 40px;  position: relative;  }
        tr img{  padding-left: 20px;  }
        tr td{  width:33.33%;  }
        .footerbg1{  height:30px;  background: #00033d;  }
        .footerbg2{  height:30px;  background: #28aaa9;  }
        .footerbg3{  height:30px;  background: #00033d;  }
        .body-content td{  padding-left: 20px;  }
        #triangle-topright {  width: 0;  height: 0;  border-top: 25px solid #000000;  border-left: 100px solid transparent;  position: absolute;  right: 0;  top: 0;  }


        .header h2{
            text-align: center;
        }
        #utility {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #utility td, #utility th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        #utility tr:nth-child(even){background-color: #f2f2f2;}
        #utility tr:hover {background-color: #ddd;}
        #utility th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>

</head>

<body>



<table>
    <tr>

        <td colspan="3"><img src="@php echo $_SERVER["DOCUMENT_ROOT"].'/images/logo.png' @endphp" alt=""><span id="triangle-topright"></span></td>
    <!-- <td colspan="3"><img src="{{ asset('images/logo.png') }}" alt=""><span id="triangle-topright"></span></td>-->
    </tr>
    <tr class="body-content">
        <td colspan="3">
            <div class="header">
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
        </td>
    </tr>
    <tr class="footer-content">
        <td class="a">
            <p>274, Shah Kabir Mazar Road</p>
            <p>+8801779379503</p>
            <p class="footerbg1"></p>
        </td>
        <td>
            <p>http://itclanbd.com</p>
            <p>info@itclanbd.com</p>
            <p class="footerbg2"></p>
        </td>
        <td>
            <p>fb.com/itclanbd</p>
            <p>twitter.com/itclanbd</p>
            <p class="footerbg3"></p>
        </td>
    </tr>
</table>



</body>

</html>