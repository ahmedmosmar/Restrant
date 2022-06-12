@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="cat-content">

        @if (Session::has('success'))
        <span class="success-store" data-message="{{Session::get('success')}}"></span>
        @endif

        {{-- =========== Start form add Category ===========  --}}
        <h2> إضافة قسم جديد</h2>
        <div class="form-content">
            <form action="{{route('store-new-category')}}" method="POST" class="form-add-cat">
                @csrf
                <div class="row">

                    {{-- ==== Input Category Name =====  --}}
                    <div class="form-group">
                        <label for=""> اسم القسم </label>
                        <input type="text" name="category_name" class="form-controll" id="input_category_name"
                            placeholder=" أدخل إسم القسم من فضلك" required autocomplete="off">
                        <small class="form-text text-danger small-text" style=""></small>
                        @error('category_name')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group"></div>

                    {{-- ===== Submit Button ===== --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit" id="send_category_name">إرسال
                            <i class="fa fa-send"></i>
                        </button>
                    </div>

                </div>
            </form>
        </div>
        {{-- =========== End form add Category ===========  --}}
    </div>
</div>

</div>
<!-- ===== End Main Content ===== -->
</div>
@stop
