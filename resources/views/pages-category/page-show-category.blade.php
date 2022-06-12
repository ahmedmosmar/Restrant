@extends('layoutes.master')
@section('MyContent')

         <div class="sub-content">
            <div class="cat-content">


                @if (Session::has('success'))
                  <span class="success-update" data-message="{{Session::get('success')}}"></span>
                @endif

                <h2>الأقسام</h2>

                 @if ($EmptyError == 1)
                        <div class="alert alert-warning">
                             <strong>عفواً!</strong>   ... أضف بعض الاقسام اولاًً
                       </div>
                @else

                {{-- ====== Content Box Search ======== --}}
                <div class="search-content">
                    <form action="{{route('search-category')}}"  method="POST" class="box-search">
                        @csrf
                            {{-- <label for="input_search" >
                                <i class="fa fa-search" ></i>
                            </label> --}}
                            <input type="text" class="f-control" name="categoryName" id="input_search" placeholder=" ... ابحث" required>
                            <button type="submit"> <i class="fa fa-search" ></i></button>
                    </form>


                    {{-- <form action="" class="select-count-cat">
                        <label for="select-cat"> اختر العدد للعرض </label>
                        <select name="" id="" class="">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                        </select>
                    </form> --}}
                     <form action="{{route('show-categorys')}}" method="GET">
                       <button type="submit">الكل</button>
                     </form>
                </div>
               {{-- =======  Table  Category  Data ======  --}}
                <div class="show-cat-content">
                    <table>
                        <thead>
                           <tr>
                            <td>الرقم</td>
                            <td>اسم القسم</td>
                            <td>عدد الأصناف</td>
                            <td>تاريخ الإضافة</td>
                            <td>العمليات</td>
                           </tr>
                        </thead>
                        <tbody>

                           {{-- ===== Start Foreach ====== --}}
                            @foreach ($categorys as $category)
                            <tr class="delete-data-{{$category->id}}">
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                                <td>عدلها</td>
                            <td>{{$category->created_at}}</td>
                                <td class="opartion">
                                    <button class="btn btn-edit-data">
                                    <a href="{{route('edit-category',$category->id)}}">
                                        <span>تعديل</span>
                                        <i class="fa fa-edit"></i>
                                        </a>
                                    </button>

                                  <button class="btn btn-delete-data delete-category" data-id-for-delete="{{$category->id}}">
                                        <a href="{{route('delete-category',$category->id)}}">
                                            <span>حذف</span>
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </button>
                                </td>
                            </tr>
                             @endforeach

                        </tbody>
                    </table>
                    {{-- @if ($categorys->links())
                    <div class="link-paginate">
                        {{$categorys->links()}}
                    </div>
                    @endif --}}

                    @endif
                </div>
            </div>

        </div>
        <!-- ===== End Main Content ===== -->
@stop
