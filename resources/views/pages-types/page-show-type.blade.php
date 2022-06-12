@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="type-content">

        @if (Session::has('success'))
        <span class="success-update" data-message="{{Session::get('success')}}"></span>
        @endif

        <h2>الأصناف</h2>

        @if ($EmptyError == 1)
            <div class="alert alert-warning">
                <strong>عفواً!</strong> ... أضف بعض الاصناف اولاًً
            </div>
        @else

        {{-- ====== Content Box Search ======== --}}
        <div class="search-content">
            <form action="{{route('search-type')}}" method="POST" class="box-search">
                @csrf
                <input type="text" class="f-control" name="typeName" id="input_search" placeholder=" ... ابحث" required>
                <button type="submit"> <i class="fa fa-search"></i></button>
            </form>

            <form action="{{route('show-type')}}" method="GET">
                <button type="submit">الكل</button>
            </form>
        </div>

        {{-- =======  Table  Type  Data ======  --}}
        <div class="show-type-content">
            <table>
                <thead>
                    <td>الرقم</td>
                    <td>اسم الصنف</td>
                    <td> القسم</td>
                    <td> سعر البيع</td>
                    {{-- <td> سعر التكلفة</td>
                    <td> المدة</td> --}}
                    <td>تاريخ الإضافة</td>
                    <td>العمليات</td>
                </thead>
                <tbody>

                    {{-- ===== Start Foreach ====== --}}
                    @foreach ($types as $type)
                    <tr class="delete-data-{{$type->id}}">
                        <td>{{$type->id}}</td>
                        <td>{{$type->type_name}}</td>
                        <td>{{$type->Category_Fun_Relation->category_name}}</td>
                        <td>{{$type->price_sale}}</td>
                        {{-- <td>{{$type->price_cost}}</td>
                        <td>{{$type->time_make}}</td> --}}
                        <td>{{$type->created_at}}</td>
                        <td class="opartion">
                            <button class="btn btn-edit-data">
                                <a href="{{route('edit-type',$type->id)}}">
                                    تعديل
                                    <i class="fa fa-edit"></i>
                                </a>
                            </button>

                            <button class="btn btn-delete-data delete-type" data-id-for-delete="{{$type->id}}">
                                <a href="">
                                    حذف
                                    <i class="fa fa-trash"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @endif
    </div>
    </div>
</div>
<!-- ===== End Main Content ===== -->
@stop
