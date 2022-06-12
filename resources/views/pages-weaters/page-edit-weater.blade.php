@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="weater-content">

        <h2> تحديث بيانات ويتر </h2>

            <div class="back">
            <button>
                <a href="{{route('show-weater')}}">
                    <i class="fa fa-arrow-left"></i>
                    رجوع
                </a>

            </button>
        </div>

        {{-- =========== Start form Update Waiter ===========  --}}
        <div class="form-content">
            <form action="{{route('update-weater',$weater->id)}}" method="POST" class="form-add-weater">
                @csrf
                @method('PUT')
                <div class="row">

                    {{-- ==== Input Waiter Name ===== --}}
                    <div class="form-group">
                        <label for=""> إسم ويتر </label>
                        <input type="text" name="weater_name" class="form-controll"
                            placeholder=" أدخل  إسم ويتر من فضلك" required autocomplete="off"
                            value="{{$weater->weater_name}}">
                        @error('weater_name')
                        <small class="form-text text-danger" style="">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group"></div>

                    {{-- ===== Submit Button ====  --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit">تحديث
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>

                </div>
            </form>
        </div>

        {{-- =========== End form Update Waiter ===========  --}}
    </div>
</div>

</div>
<!-- ===== End Main Content ===== -->
@stop
