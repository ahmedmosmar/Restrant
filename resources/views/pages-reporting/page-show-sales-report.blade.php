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
        <a href="{{route('sales-report')}}">رجوع</a>
        </button>
    </div>

<div class="container">

    <div class="report-details">
        @if ($report->count() <= 0)
          <div class="alert alert-danger text-center">
            <strong>عفواً!</strong> لايوجد تقرير اختر بتمعن  ... شكرا
           </div>


        @elseif ($report->count() > 0)

            <div class="ganral-details">
                <h5> المطعم : امواج </h5>
                <p>المكان : الخرطوم </p>
                <p>الشارع : افريقا </p>
                <p>الهاتف : 0912367890</p>
            </div>
            <div class="about-report">
                <p>تقرير المبيعات </p>
                <p> من تاريخ :  {{$date_from}}</p>
                <p> الي تاريخ :  {{$date_for}}</p>
                <p>  المبلغ الكلي للمبيعات  :  {{$price}} جنية</p>
            </div>
       </div>

        <table class="table table-dark ">
            <thead>
            {{-- <tr>
                <th>الاصناف</th>
                <th>عدد المبيعات</th>
                <th> الفاتورة</th>
                <th> من تاريخ </th>
                <th> الي تاريخ </th>
                <th>المبلغ</th>
            </tr> --}}

              <tr>
                <th>#</th>
                <th>الصنف</th>
                <th>الكمية </th>
                <th> الطاولة</th>
                <th>رقم الفاتورة </th>
                <th>سعر الصنف</th>
                <th> تاريخ الاضافة </th>

            </tr>
            </thead>
            <tbody>
               @foreach ($report as $rep)
                  <tr>
                   <td>{{$rep->id}}</td>
                   <td>{{$rep->type_Fun_Relation->type_name}}</td>
                   <td>{{$rep->type_amount}}</td>
                   <td>{{$rep->sales_table}}</td>
                   <td> {{$rep->reset_id}} </td>
                   <td>{{$rep->type_price}}</td>
                   <td> {{$rep->created_at}} </td>
                 </tr>
               @endforeach
                 {{-- <tr>
                   <td>{{$type_name}}</td>
                   <td>{{$salesCount}}</td>
                    <td>{{$reset_id}}</td>
                   <td>{{$date_from}}</td>
                   <td>{{$date_for}}</td>
                   <td> {{$price}} جنية</td>
                 </tr> --}}


            </tbody>
        </table>


    @endif
    </div>
</div>
@stop
