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
    </style>
</head>

<body>



<table>
    <tr>
    <!--<td colspan="3"><img src="@php echo $_SERVER["DOCUMENT_ROOT"].'/images/logo.png' @endphp" alt=""><span id="triangle-topright"></span></td>-->
     <td colspan="2"><img src="{{ asset('images/logo.png') }}" alt=""><span id="triangle-topright"></span></td>
     <td><button onclick="$(this).hide();window.print()">Print</button></td>
    </tr>
    <tr class="body-content">
        <td colspan="3">
            Content Here
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>

</html>