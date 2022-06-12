@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="weater-content">

        @if (Session::has('success'))
        <span class="success-store" data-message="{{Session::get('success')}}"></span>
        @endif

        {{-- =========== Start form add Waiter ===========  --}}
        <h2> إضافة ويتر جديد</h2>

        <div class="form-content">
            <form action="{{route('store-new-weater')}}" method="POST" class="form-add-weater">
                @csrf
                <div class="row">

                    {{-- ==== Input Waiter Name ===== --}}
                    <div class="form-group">
                        <label for=""> إسم ويتر </label>
                        <input type="text" name="weater_name" class="form-controll"
                            placeholder=" أدخل  إسم ويتر من فضلك" required autocomplete="off">
                        @error('weater_name')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group"></div>

                    {{-- ===== Submit Button ====  --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit">إرسال
                            <i class="fa fa-send"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        {{-- =========== End form add Waiter ===========  --}}

    </div>
</div>

</div>
<!-- ===== End Main Content ===== -->
@stop
