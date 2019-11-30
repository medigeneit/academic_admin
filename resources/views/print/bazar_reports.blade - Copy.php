<!DOCTYPE html>

<html>

<head>

<style>
    .header h2{
        text-align: center;
    }
    #bazars {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    #bazars td, #bazars th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    #bazars tr:nth-child(even){background-color: #f2f2f2;}
    #bazars tr:hover {background-color: #ddd;}
    #bazars th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>


</head>

<body>
<div class="header">
    @php $report =($reportdata['report_type']=='yearly')?$reportdata['year']:(($reportdata['report_type']=='monthly')?month_convert($reportdata['month']).', '.$reportdata['year']:date('j, M Y',strtotime($reportdata['start_date'])).' to '.date('j, M Y',strtotime($reportdata['end_date']))) @endphp
    <h2>Bazar's Report of {{$report}}</h2>
</div>
@php $total =0; @endphp
@if(isset($bazars))
    <table id="bazars" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Date</th>
            <th>Given Amount</th>
            <th>Total Cost</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bazars as $key=>$bazar)
            <tr role="row">
                <td>{{$key+1}}</td>
                <td>@php echo ($bazar->date)?date('Y-m-d',strtotime($bazar->date)):'' @endphp</td>
                <td>{{$bazar->given_amount}}</td>
                <td>{{$bazar->total_cost}}</td>
            </tr>
            @php $total = $total+$bazar->total_cost @endphp
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

</body>

</html>