<html>
<head>
    <style>
        /*for pad*/
        @page{margin:0; }
        body{padding-bottom: 150px;padding-top: 140px;}
        .header, .footer{  position: fixed; }
        .header { top: 0px; }
        .header img{padding-top: 50px;padding-left: 30px}
        #triangle-topright-black {  width: 0;  height: 0;  border-top: 25px solid #000000;  border-left: 100px solid transparent;  position: absolute;  right: 0;  top: 0;z-index: 9  }
        #triangle-topright-blue {  width: 0;  height: 0;  border-top: 100px solid #28aaa9;  border-left: 25px solid transparent;  position: absolute;  right: 0;  top: 0;  }
        .footer {  bottom: 90px; }
        .footer1, .footer2, .footer3{  width: 33%;  display: inline-block;  }
        .footer p{  padding-left:20px;  }
        .footerbg1{  height:30px;  background: #00033d;  }
        .footerbg2{  height:30px;  background: #28aaa9;  }
        .footerbg3{  height:30px;  background: #00033d;  }
        .main{padding-left: 50px;padding-right: 50px;}

        /*for body*/
        .heading h2{  text-align: center;margin-top: 0  }
        #utility {  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;  border-collapse: collapse;  width: 100%;  }
        #utility td, #utility th {  border: 1px solid #ddd;  padding: 8px;  }
        #utility tr:nth-child(even){background-color: #f2f2f2;}
        #utility tr:hover {background-color: #ddd;}
        #utility th {  padding-top: 12px;  padding-bottom: 12px;  text-align: left;  background-color: #5FC0BF;  color: white;  }
    </style>
</head>
<body>
    <div  class="header">
        <img src="@php echo $_SERVER["DOCUMENT_ROOT"].'/images/logo.png' @endphp" alt="">
        <span id="triangle-topright-black"></span>
        <span id="triangle-topright-blue"></span>
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

    <div class="main">
        <div class="heading">
            @php $report =($reportdata['report_type']=='yearly')?$reportdata['year']:(($reportdata['report_type']=='monthly')?month_convert($reportdata['month']).', '.$reportdata['year']:$reportdata['start_date'].' to '.$reportdata['end_date']) @endphp
            <h2>All Report of {{$report}}</h2>
        </div>
        <h3>Salary</h3>
        @php $total_salary =0; @endphp
        @if(isset($salaries))
            <table id="utility" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>Salary</th>
                </tr>
                </thead>
                <tbody>
                @foreach($salaries as $key=>$salary)
                    <tr role="row">
                        <td>{{$key+1}}</td>
                        <td>{{$salary->name}}</td>
                        <td>@php echo ($salary->salary_ym)?date('M, Y',strtotime($salary->salary_ym)):'' @endphp</td>
                        <td>{{$salary->payment_amount}}</td>
                    </tr>
                    @php $total_salary = $total_salary+$salary->payment_amount @endphp
                @endforeach
                <tr role="row">
                    <td  colspan="2"></td>
                    <td  align="right">Total Amount:</td>
                    <td>{{$total_salary}}</td>
                </tr>
                </tbody>
            </table>
        @endif
        <h3>Bazar</h3>
        @php $total_bazar =0; @endphp
        @if(isset($bazars))
            <table id="utility"  class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Date</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bazars as $key=>$bazar)
                    <tr role="row">
                        <td>{{$key+1}}</td>
                        <td>@php echo ($bazar->date)?date('d M, Y',strtotime($bazar->date)):'' @endphp</td>
                        <td>{{$bazar->total_cost}}</td>
                    </tr>
                    @php $total_bazar = $total_bazar+$bazar->total_cost @endphp
                @endforeach
                <tr role="row">
                    <td></td>
                    <td  align="right">Total Amount:</td>
                    <td>{{$total_bazar}}</td>
                </tr>
                </tbody>
            </table>
        @endif
        <h3>Utility</h3>
        @php $total_utilities =0; @endphp
        @if(isset($utilities))
            <table id="utility"  class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Title</th>
                    <th>Month</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($utilities as $key=>$utility)
                    <tr role="row">
                        <td>{{$key+1}}</td>
                        <td>{{$utility->title}}</td>
                        <td>@php echo ($utility->billing_date)?date('M, Y',strtotime($utility->billing_date)):'' @endphp</td>
                        <td>{{$utility->amount}}</td>
                    </tr>
                    @php $total_utilities = $total_utilities+$utility->amount @endphp
                @endforeach
                <tr role="row">
                    <td  colspan="2"></td>
                    <td  align="right">Total Amount:</td>
                    <td>{{$total_utilities}}</td>
                </tr>
                </tbody>
            </table>
        @endif
             <h3 style="text-align: right">Grand Total: {{$total_salary+$total_bazar+$total_utilities}}</h3>
    </div>
</body>


