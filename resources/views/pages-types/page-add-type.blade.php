@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="type-content">

        @if (Session::has('success'))
        <span class="success-store" data-message="{{Session::get('success')}}"></span>
        @endif

        <h2> إضافة صنف جديد</h2>

        {{-- ============ Start Form Add New Type =========== --}}
        <div class="form-content">
            <form action="{{route('store-new-type')}}" method="POST" class="form-add-type">
                @csrf
                <div class="row">

                    {{-- ===== Select The Categoey ====== --}}
                    <div class="form-group">
                        <label for=""> إختر القسم </label>
                        <select name="category_id" id="" class="form-controll" required>
                            <option value="" disabled selected> إختر القسم من فضلك</option>
                            @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Input Type Name ==== --}}
                    <div class="form-group">
                        <label for=""> إسم الصنف </label>
                        <input type="text" name="type_name" class="form-controll" placeholder=" أدخل إسم الصنف من فضلك "
                            required>
                        @error('type_name')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ======= Input Sales Price ======== --}}
                    <div class="form-group">
                        <label for=""> سعر البيع </label>
                        <input type="text" name="price_sale" class="form-controll" placeholder=" أدخل سعر البيع من فضلك"
                            required>
                        @error('price_sale')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ======= Input Cost Price ======= --}}
                    {{-- <div class="form-group">
                        <label for=""> سعر التكلفة </label>
                        <input type="text" name="price_cost" class="form-controll"
                            placeholder="ادخل سعر التكلفة من فضلك  " required>
                        @error('price_cost')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div> --}}

                    {{-- ======== Select The Time For Make ====== --}}
                    {{-- <div class="form-group">
                        <label for=""> الزمن </label>
                        <select name="time_make" id="" class="form-controll" required>
                            <option value="" disabled selected> إختر الزمن من فضلك</option>
                            <option value="22">2</option>
                        </select>
                        @error('time_make')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div> --}}

                    <div class="form-group"></div>

                    {{-- ====== Submit Button ====== --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit">إرسال
                            <i class="fa fa-send"></i>
                        </button>
                    </div>

                </div>
            </form>
            {{-- ============ End Form Add New Type =========== --}}

        </div>
    </div>

    <!-- ===== End Main Content ===== -->

</div>
@stop
