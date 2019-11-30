<html>
<head>
    <style>
        /*for pad*/
        @page{margin:0; }
        body{padding-bottom: 150px;padding-top: 120px;}
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
<div class="header">
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
        <h2>Bazars's Report of {{$report}}</h2>
    </div>
    @php $total =0; @endphp
    @if(isset($salary))
        <table id="utility" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Month</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($salary as $key=>$row)
                <tr role="row">
                    <td>{{$key+1}}</td>
                    <td>{{$row->name}}</td>
                    <td>@php echo ($row->salary_ym)?date('M, Y',strtotime($row->salary_ym)):'' @endphp</td>
                    <td>{{$row->payment_amount}}</td>
                </tr>
                @php $total = $total+$row->payment_amount @endphp
            @endforeach
            <tr role="row">
                <td  align="right"></td>
                <td  align="right"></td>
                <td  align="right">Total Amount:</td>
                <td>{{$total}}</td>
            </tr>
            </tbody>
        </table>
    @endif
</div>
</body>


