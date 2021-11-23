<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    table tr th,
    table tr td {
        border: 1px solid #585858;
    }

    .table thead.blue tr th,
    .table thead.blue tr td,
    .table thead tr.blue th,
    .table thead tr.blue td {
        vertical-align: middle;
        background-color: #3E83AF;
        color: #ffffff;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .table-noborder > thead > tr > th,
    .table-noborder > tbody > tr > th,
    .table-noborder > tfoot > tr > th,
    .table-noborder > thead > tr > td,
    .table-noborder > tbody > tr > td,
    .table-noborder > tfoot > tr > td,
    .table-noborder > tr > th,
    .table-noborder > tr > td{
        border: 0px solid #ddd;
    }

    .table td.value {
        text-align: right;
    }

    .table td.total {
        text-align: right;
        border-bottom: 1px solid #3C3C3C;
        font-weight: bold;
    }

    .table td.grand_total {
        text-align: right;
        border-bottom: 4px double #3C3C3C;
        font-weight: bold;
    }

    .table td.ac-name {
        text-indent: 3px;
    }
</style>

@yield('style')
<body>

@yield('content')

</body>
</html>