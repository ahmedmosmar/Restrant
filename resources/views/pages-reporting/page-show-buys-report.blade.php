@extends('layouts.master-report')
@section('reportContent')

<div class="report-content">

    <div class="box-print">
        <button class="btn" id="print_report">
            <i class="fa fa-print"></i>
            طباعة
             {{-- <a href="{{route('print-sales-report')}}">طباعة</a> --}}
        </button>
        <button class="btn back">
            <i class="fa fa-share"></i>
            <a href="">رجوع</a>
        </button>
    </div>

<div class="container">
    <div class="report-details">
            <div class="ganral-details">
                <h5> المطاعم : امواج </h5>
                <p>المكان : الخرطوم </p>
                <p>الشارع : افريقا </p>
                <p>الهاتف : 0912367890</p>
            </div>
            <div class="about-report">
                <p>تقرير المشتريات </p>
                <p> من تاريخ :      {{$date_from}}</p>
                <p> الي تاريخ :     {{$date_for}}</p>
                <p>المبلغ الكلي  :  {{$price}} جنية</p>

            </div>
    </div>

        <table class="table table-dark ">
            <thead>
            <tr>
                <th> الرقم</th>
                <th> اسم المورد</th>
                <th> تاريخ التوريد</th>
                <th> المكون </th>
                <th> الوحدة</th>
                <th> سعر الوحدة</th>
                <th> الكمية</th>
                <th> المبلغ </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                  <tr>
                   <td>{{$report->id}}</td>
                   <td>{{$report->supplier_Fun_Relation->supplier_name}}</td>
                   <td>{{$report->created_at}}</td>
                   <td>{{$report->component}}</td>
                   <td>{{$report->unit}}</td>
                   <td>{{$report->unit_price}}</td>
                   <td>{{$report->amount}}</td>
                   <td> {{$report->final_price}} جنية</td>
                 </tr>
                  @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
