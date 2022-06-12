@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="type-content">

        {{-- ====== Start Form Update Type ======== --}}
        <h2> تحديث بيانات صنف </h2>

        <div class="form-content">
            <form action="{{route('update-type',$type->id)}}" method="POST" class="form-add-type">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- ===== Select  Category ====== --}}
                    <div class="form-group">
                        <label for=""> إختر القسم </label>
                        <select name="category_id" id="" class="form-controll" required>
                            <option value="" disabled selected> إختر القسم من فضلك</option>
                            <option value="{{$type->category_id}}" selected>{{$type->category_id}}</option>
                            @foreach ($categorys as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Input Type Name ==== --}}
                    <div class="col-md-6 form-group">
                        <label for=""> إسم الصنف </label>
                        <input type="text" name="type_name" class="form-controll" placeholder=" أدخل إسم الصنف من فضلك" value="{{$type->type_name}}">
                        @error('type_name')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ======= Input Sales Price ======== --}}
                    <div class="form-group">
                        <label for=""> سعر البيع </label>
                        <input type="text" name="price_sale" class="form-controll"
                            placeholder=" أدخل  سعر البيع  من فضلك " value="{{$type->price_sale}}">
                        @error('price_sale')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ======= Input Cost Price ======= --}}
                    {{-- <div class="form-group">
                        <label for=""> سعر التكلفة </label>
                        <input type="text" name="price_cost" class="form-controll"
                            placeholder=" أدخل سعر التكلفة من فضلك " value="{{$type->price_cost}}">
                        @error('price_cost')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div> --}}

                    {{-- ======== Select The Time For Make ====== --}}
                    {{-- <div class="form-group">
                        <select name="time_make" id="" class="form-controll">
                            <option value="" disabled> إختر الزمن من فضلك </option>
                            <option value="{{$type->time_make}}" selected>{{$type->time_make}}</option>
                            <option value="22">2</option>
                        </select>
                        @error('time_make')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div> --}}

                    <div class="form-group"></div>

                    {{-- ====== Submit Button ====== --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit">تحديث
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>
                </div>

            </form>
            {{-- ====== Start Form Update Type ======== --}}

        </div>
    </div>

</div>
<!-- ===== End Main Content ===== -->

</div>
@stop
