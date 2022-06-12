@extends('layouts.master-sales')
@section('salesContent')


            {{-- <div class="sub-content"> --}}
                <div class="sales-content" >
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
                <div class="sales-table" id="{{$table_number}}">
                          <div class="row">
                              <div class="col-md-6 col-sm-12  fill-content">
                                <div class="fill-title">
                                    <h4>الفاتورة</h4>
                                    <span>time</span>
                                </div>
                                <div class="opartion">
                                    <button class="btn accepte">
                                        <span>تاكيد</span>
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button class="btn reject">
                                        <span>إلغاء</span>
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="weaters">
                                    <h5>الويتر</h5>
                                    <select name="" id="">
                                        <option value="" selected disabled>إختر الويتر</option>
                                        <option value="">mnmn</option>
                                        <option value="">drdft</option>
                                        <option value="">hjhjh</option>
                                    </select>
                                </div>
                                {{-- <table>
                                    <thead>
                                        <td>المجموع</td>
                                        <td>الخصم </td>
                                        <td>الضريبة</td>
                                        <td>المبلغ الكلي</td>
                                    </thead>
                                    <tbody>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tbody>
                                </table> --}}


                                <div class="money">
                                    <span>المبلغ مكتمل</span>
                                </div>


                                <div class="push">
                                    <div class="kash">
                                        <h5>الكاش</h5>
                                        <form action="">
                                            <input type="text" placeholder="أدخل المبلغ">
                                        </form>
                                    </div>
                                    <div class="bank">
                                    <select name="" id="">
                                        <option value="" selected disabled> البنك</option>
                                        <option value="">mnmn</option>
                                        <option value="">drdft</option>
                                        <option value="">hjhjh</option>
                                      </select>
                                        <form action="">
                                            <input type="text" placeholder="أدخل المبلغ">
                                        </form>
                                    </div>
                                </div>
                                <div class="orders">
                                  <table>
                                    <thead>
                                        <td># </td>
                                        <td>الطلب </td>
                                        <td>الكمية </td>
                                        <td>السعر</td>
                                        <td> المجموع</td>
                                        <td> زمن الطلب</td>
                                        <td> إلغاء</td>
                                    </thead>
                                    <tbody style="display:" id="tbody">
                                        {{-- @foreach ($orderModels as $orderModel)
                                            <tr>
                                                <td>{{$current++}}</td>

                                                <td class="td_type_name" id="td_type_name">{{$orderModel->type_id}}</td>

                                                <td class="td_type_count">   {{$orderModel->type_amount}}  </td>

                                                <td class="td_type_price">{{$orderModel->type_price}}</td>

                                                <td>{{$orderModel->final_price}}</td>

                                                <td>{{$orderModel->created_at}}</td>

                                                <td class="td_cancel">X</td>
                                            </tr>
                                        @endforeach --}}

                                    </tbody>
                                </table>
                                </div>


                              </div>
                               <div class="col-md-6 col-sm-12  food-list">
                                  <h5>قائمة الطعام</h5>
                                  <div class="row">
                                      @foreach ($typeModels as $typeModel)

                                      <div class="col-md-3">

                                          <div class="type-food" _token={{csrf_token()}} data-typeId="{{$typeModel->id}}"  data-typePrice = "{{$typeModel->price_sale}}"

                                                                   data-typeName  = "{{$typeModel->type_name.$table_number}}">
                                              <span class="type_name">{{$typeModel->type_name}}</span>
                                              <i class="fa fa-plus"></i>
                                          </div>
                                          
                                      </div>

                                      @endforeach
                                  </div>
                              </div>
                          </div>
                      </div>
                </div>
            </div>

        {{-- </div> --}}
        <!-- ===== End Main Content ===== -->

    </div>
@stop
