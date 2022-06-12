@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="cat-content">

        {{-- =========== Start form update Category ===========  --}}
        <h2> تحديث بيانات قسم </h2>

        <div class="back">
            <button>
                <a href="{{route('show-categorys')}}">
                    <i class="fa fa-arrow-left"></i>
                    رجوع
                </a>

            </button>
        </div>
        <div class="form-content">
            <form action="{{route('update-category',$category->id)}}" method="POST" class="form-add-cat">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- ===== Input category Name  ===== --}}
                    <div class="form-group">
                        <label for=""> اسم القسم </label>
                        <input type="text" name="category_name" class="form-controll" id="input_category_name"
                            placeholder=" أدخل إسم القسم من فضلك" required autocomplete="off"
                            value="{{$category->category_name}}">
                        <small class="form-text text-danger small-text" style=""></small>
                        @error('category_name')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group"></div>

                    {{-- ===== Submit Button ===== --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit">تحديث
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        {{-- =========== End form update Category ===========  --}}

    </div>
</div>

</div>
<!-- ===== End Main Content ===== -->

</div>
@stop
