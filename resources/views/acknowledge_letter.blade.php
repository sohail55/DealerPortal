

<?php 
    // echo '<pre>';
    // print_r(Session::get('ledger.total_paid_amount'));
    // exit;
?>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style>

.div1 {

    width: 25px;

    height: 20px;

    border: 1px solid blue;

}

</style></head>

<body>





    <table width="100%" style="text-align:justify;">

        

        

       

        

    <tr>

        <td rowspan="0" height="120" width="20%"><img height="90" width="90" src="{{ asset('public/img/logo.png') }}"/></td>

        <td align="center" width="90%"></td>

        <td width="30%"><img height="100" width="150" src="{{ asset('public/img/k1.jpg') }}"/></td>

    </tr>

    </table>

    







    <table  width="100%" style="text-align:justify;padding-top:23px">

    <tr 

  padding-bottom: 892px;>



        <td  height="10" width="90%">Name :{{ Session::get('userInfo')[0]['Name'] }}</td>

        

        <td   align="right" width="43%">{{ Session::get('acknowledgeLetter.RefrenceNo') }}<br> {{ Session::get('acknowledgeLetter.RefrenceNo') }}</td>

        <td     width="10%"><img height="50" width="50" src="{{ asset('public/img/k2.jpg') }}"/></td>

    </tr>

    </table>

    

        <table width="100%" style="text-align:justify;">

        <tr>

            <td rowspan="3" height="90" width="72%"></td>

            <td width="30%" align="right"><br>&nbsp;&nbsp;{{ Session::get('acknowledgeLetter.PlotNumber')  }}&nbsp;<img height="20" width="30"  src="{{ asset('public/img/Plot.jpg') }}"/>&nbsp;&nbsp;{{ Session::get('acknowledgeLetter.Sector')  }}&nbsp;<img height="20" width="20" src="{{ asset('public/img/Sector.jpg') }}"/>&nbsp;&nbsp;1&nbsp;<img height="20" width="20" src="{{ asset('public/img/Ph.jpg') }}"/></td>

        </tr>

        </table>

   

    



    <table width="100%" style="text-align:justify;">

    <tr>

    

        <td  width="12%" align="right">{{ number_format(Session::get('acknowledgeLetter.total_paid_amount')) }}</td>

        <td width="8%" align="left"><img height="25" width="50" src="{{ asset('public/img/k6.jpg') }}"/></td>

        <td width="14%" align="right">{{ date('d-M-Y') }}</td>

        <td  width="66%" align="left"><img height="90" width="500" src="{{ asset('public/img/o4.jpg') }}"/></td>

    </tr>

    </table>



<br>

    <img height="750" width="750" src="{{ asset('public/img/a.jpg') }}"/>

    

    <br><br>

    

    <p style="text-align:center;">This is an online system generated letter which does not require signature.</p>

    

    </body>

