<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>manageMenu</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('font-awesome/css/font-awesome.min.css')}}" >
        <link rel="stylesheet" href="{{asset('css/report-style.css')}}">
    </head>
    <body>

<div class="report-content">

    <div class="box-print">
        <button class="btn" id="print_report">
            <i class="fa fa-print"></i>
             <a href="{{route('print-sales-report')}}">طباعة</a>
        </button>
        <button class="btn back">
            <i class="fa fa-share"></i>
            <a href="">رجوع</a>
        </button>
    </div>
    <div class="container">
        <table class="table table-dark ">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
    </body>
</html>
