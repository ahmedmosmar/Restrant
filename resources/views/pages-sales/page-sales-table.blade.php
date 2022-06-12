@extends('layouts.master-sales')
@section('salesContent')


{{-- ============== Start Direct Sale ============== --}}

<div class="sales-content">

    {{-- ====== Start Header Sale ======= --}}
    <div class="header-sales">
        <h5>
            {{$table_number}} طاولة رقم
            <i class="fa fa-cutlery"></i>
        </h5>
        <a href="{{route('sales')}}">
            <button class="btn back-to-table">
                <i class="fa fa-arrow-left"></i>
                <span>كل الطاولات</span>
            </button>
        </a>
    </div>
    {{-- ====== End Header Sale ======= --}}

    <div class="sales-table" id="{{$table_number}}">
        <div class="row">

            {{-- ################ Start Site Orders ################# --}}
            <div class="col-md-8 col-sm-12  full-content">
                <div class="fill-title">
                    <h4>الطلبات</h4>
                    {{-- <span>time</span> --}}
                </div>

                <div class="money">
                    <strong>
                        المبلغ الكلي =
                        <span id="final-price">{{$final_price}}</span>
                    </strong>
                </div>

                {{-- =========== Start Table Orders ========= --}}

                <div class="orders">
                    <table>
                        <thead>
                            <td>#</td>
                            <td>الطلب </td>
                            <td>الكمية </td>
                            <td>السعر</td>
                            <td> المجموع</td>
                            <td> زمن الطلب</td>
                            <td> إلغاء</td>
                        </thead>
                        <tbody id="tbody">

                            {{-- ===== Start Foreach To Feach Orders ===== --}}
                            @foreach ($orderModels as $orderModel)
                            <tr>
                                <td>{{$current++}}</td>

                                <td class="td_type_name" id="td_type_name">{{$orderModel->type_Fun_Relation->type_name}}
                                </td>

                                <td class="td_type_count type_amount" id="{{$orderModel->id}}">
                                    {{$orderModel->type_amount}}
                                    <span class="increace">+</span>
                                    <span class="dicreace">-</span>
                                </td>

                                <td class="td_type_price">{{$orderModel->type_price}}</td>

                                <td>{{$orderModel->type_price *  $orderModel->type_amount}}</td>

                                <td>{{$orderModel->created_at}}</td>

                                <td class="td_cancel cancel_order" id="{{$orderModel->id}}">X</td>
                            </tr>
                            @endforeach
                            {{-- ===== End Foreach To Feach Orders ===== --}}

                        </tbody>
                    </table>
                </div>
                {{-- =========== End Table Orders ========= --}}

                {{-- ===== Ckeck Money Is good ==== --}}
                <div class="ckeck-money">
                    <span id="ckeckMoney">المبلغ</span>
                </div>

                {{-- ========= Start Box Push Money ========= --}}
                <div class="push">

                    {{-- ====== Start Select Waiter ====== --}}
                    <div class="weaters">
                        <form action="">
                            <label for="">الويتر</label>
                            <select name="weater_name" id="">
                                <option value="" selected disabled>إختر الويتر</option>
                                <option value=""> ------ </option>
                                @foreach ($weaters as $weater)
                                <option value="{{$weater->id}}">{{$weater->weater_name}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    {{-- ====== End Select Waiter ====== --}}


                    {{-- ===== Start Push Kash ==== --}}
                    <div class="kash">
                        <form action="">
                            <label for="">الكاش</label>
                            <input type="text" value="0" id="kashMoney" placeholder=" المبلغ" required>
                        </form>
                    </div>
                    {{-- ===== End Push Kash ==== --}}

                    <div class="bank">
                        <form action="">
                            <select name="" id="">
                                <option value="" selected disabled> البنك</option>
                                <option value="">الخرطوم</option>
                                <option value="">امدرمان الوطني</option>
                                <option value="">النيلين</option>
                            </select>
                            <input type="text" placeholder=" المبلغ">
                        </form>
                    </div>
                </div>
                {{-- ========= End Box Push Money ========= --}}

                {{-- ======= Start Oparation Accepte Or Reject The Orders ======= --}}
                <div class="opartion">
                    <button class="btn accepte" id="accepte" _token="{{csrf_token()}}">
                        <span>تاكيد</span>
                        <i class="fa fa-check"></i>
                    </button>
                    <button class="btn reject" id="reject_orders">
                        <span>إلغاء</span>
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                {{-- ======= End Oparation Accepte Or Reject The Orders ======= --}}


            </div>
            {{-- ################ End Site Orders ################# --}}


            {{-- ################ Start Site Foods ################# --}}
            {{-- ========= Start Food List ========= --}}

            <div class="col-md-4 col-sm-12  food-list">
                <h5>قائمة الطعام</h5>

                @if ($EmptyError == 1)
                <div class="alert alert-warning">
                    <strong>عفواً!</strong> ... أضف بعض الاقسام اولاًً
                </div>

                @else
                <div class="row types-foods">

                    {{-- ======= All Category ======= --}}
                    <div class="col-md-6">
                        <ul class="cat">
                            @foreach ($categorys as $category)
                            <li id="{{$category->id}}" class="get-item">
                                <strong>{{$category->category_name}}</strong>
                                {{-- <span>ج {{$type->price_sale}}</span> --}}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- ======== Types ====== --}}
                    <div class="col-md-6">
                        <ul id="ul-types" _token={{csrf_token()}}>
                        </ul>
                    </div>
                </div>
                @endif


            </div>

            {{-- ################ End Site Foods ################# --}}

        </div>
    </div>
</div>
</div>

<!-- ===== End Main Content ===== -->
@stop
