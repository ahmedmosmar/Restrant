@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="weater-content">

        @if (Session::has('success'))
          <span class="success-store" data-message="{{Session::get('success')}}"></span>
        @endif

        <h2>الويتر</h2>
        @if ($EmptyError === 1)
            <div class="alert alert-warning">
                <strong>عفواً!</strong> ... أضف بعض الويتر اولاًً
            </div>
        @else

        {{-- ====== Content Box Search ======== --}}
        <div class="search-content">
            <form action="{{route('search-weater')}}" method="POST" class="box-search">
                @csrf
                <input type="text" class="f-control" name="weaterName" id="input_search" placeholder=" ... ابحث"
                    required>
                <button type="submit"> <i class="fa fa-search"></i></button>
            </form>

            <form action="{{route('show-weater')}}" method="GET">
                <button type="submit">الكل</button>
            </form>
        </div>

        {{-- =======  Table  Waiter  Data ======  --}}
        <div class="show-weater-content">
            <table>
                <thead>
                    <td>الرقم</td>
                    <td>اسم الويتر</td>
                    <td>تاريخ الإضافة</td>
                    <td>العمليات</td>
                </thead>
                <tbody>

                    {{-- ===== Start Foreach ====== --}}
                    @foreach ($weaters as $weater)
                    <tr class="delete-data-{{$weater->id}}">
                        <td>{{$weater->id}}</td>
                        <td>{{$weater->weater_name}}</td>
                        <td>{{$weater->created_at}}</td>
                        <td class="opartion">
                            <button class="btn btn-edit-data">
                                <a href="{{route('edit-weater',$weater->id)}}">
                                    تعديل
                                    <i class="fa fa-edit"></i>
                                </a>
                            </button>

                            <button class="btn btn-delete-data delete-weater" data-id-for-delete="{{$weater->id}}">
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

</div>
<!-- ===== End Main Content ===== -->
@stop
