@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="suppliers-content">

        @if (Session::has('success'))
        <span class="success-update" data-message="{{Session::get('success')}}"></span>
        @endif

        <h2>الموردين</h2>

         @if ($EmptyError == 1)
            <div class="alert alert-warning">
                <strong>عفواً!</strong>   ... أضف بعض الموردين اولاًً
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
        <div class="show-suppliers-content">
            <table>
                <thead>
                    <td>الرقم</td>
                    <td>اسم المورد</td>
                    <td> رقم االهاتف</td>
                    <td>تاريخ الإضافة</td>
                    <td>العمليات</td>
                </thead>
                <tbody>

                    {{-- ===== Start Foreach ====== --}}
                    @foreach ($suppliers as $supplier)
                    <tr class="delete-data-{{$supplier->id}}">
                        <td>{{$supplier->id}}</td>
                        <td>{{$supplier->supplier_name}}</td>
                        <td>{{$supplier->phone_number}}</td>
                        <td>{{$supplier->created_at}}</td>
                        <td class="opartion">
                            <button class="btn btn-edit-data">
                                <a href="{{route('edit-supplier',$supplier->id)}}">
                                    تعديل
                                    <i class="fa fa-edit"></i>
                                </a>
                            </button>

                            <button class="btn btn-delete-data delete-supplier" data-id-for-delete="{{$supplier->id}}">
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
@stop
