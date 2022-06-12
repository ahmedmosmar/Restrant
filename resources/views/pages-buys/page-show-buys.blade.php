@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="buys-content">

        @if (Session::has('success'))
        <span class="success-update" data-message="{{Session::get('success')}}"></span>
        @endif

        <h2>المشتريات</h2>

        @if ($EmptyError == 1)
          <div class="alert alert-warning">
            <strong>عفواً!</strong> ... أضف بعض المشتريات اولاًً
          </div>
        @else

        {{-- ====== Content Box Search ======== --}}
        <div class="search-content">
            <form action="" method="POST" class="box-search">
                @csrf

                <input type="text" class="f-control" name="" id="input_search" placeholder=" ... ابحث" required>
                <button type="submit"> <i class="fa fa-search"></i></button>
            </form>
            <form action="" method="GET">
                <button type="submit">الكل</button>
            </form>
        </div>

        {{-- =======  Table  Supppliers  Data ======  --}}
        <div class="show-buys-content">
            <table>
                <thead>
                    <td>الرقم</td>
                    <td>اسم المورد</td>
                    <td>المكون </td>
                    <td> الوحدة</td>
                    <td> الكمية</td>
                    <td>سعر الوحدة </td>
                    <td> المبلغ الكلي</td>
                    <td> الملاحظات</td>
                    <td>تاريخ الإضافة</td>
                    <td>العمليات</td>
                </thead>
                <tbody>

                    {{-- ===== Start Foreach ====== --}}
                    @foreach ($buys as $buy)
                    <tr class="delete-data-{{$buy->id}}">
                        <td>{{$buy->id}}</td>
                        <td>{{$buy->supplier_Fun_Relation->supplier_name}}</td>
                        <td>{{$buy->component}}</td>
                        <td>{{$buy->unit}}</td>
                        <td>{{$buy->amount}}</td>
                        <td>{{$buy->unit_price}}</td>
                        <td>{{$buy->final_price}}</td>
                        <td>{{$buy->description}}</td>
                        <td>{{$buy->created_at}}</td>
                        <td class="opartion">
                            <button class="btn btn-edit-data">
                                <a href="{{route('edit-buys',$buy->id)}}">
                                    تعديل
                                    <i class="fa fa-edit"></i>
                                </a>
                            </button>

                            <button class="btn btn-delete-data delete-buys" data-id-for-delete="{{$buy->id}}">
                                <a href="">
                                    حذف
                                    <i class="fa fa-trash"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    {{-- ===== End Foreach ====== --}}

                </tbody>
            </table>
        </div>
        @endif

    </div>
</div>
<!-- ===== End Main Content ===== -->

</div>
@stop
