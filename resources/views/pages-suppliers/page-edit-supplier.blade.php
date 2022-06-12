@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="supplier-content">

        <h2> تحديث بيانات مورد جديد</h2>

        <div class="back">
            <button>
                <a href="{{route('show-suppliers')}}">
                    <i class="fa fa-arrow-left"></i>
                    رجوع
                </a>

            </button>
        </div>

        {{-- =========== Start form Update Supplier ===========  --}}
        <div class="form-content">
            <form action="{{route('update-supplier',$supplier->id)}}" method="POST" class="form-add-supplier">
                @csrf
                @method('PUT')
                <div class="row">

                    {{-- ===== Input Supplier Name ==== --}}
                    <div class="form-group">
                        <label for="">إسم المورد </label>
                        <input type="text" name="supplier_name" class="form-controll" id="supplier_name"
                            placeholder=" ادخل إسم المورد من فضلك" value="{{$supplier->supplier_name}}"
                            autocomplete="off" required>
                        @error('supplier_name')
                        <small class="form-text text-danger small-text">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Input Supplier Phone ==== --}}
                    <div class="form-group">
                        <label for="">رقم الهاتف </label>
                        <input type="text" name="phone_number" class="form-controll"
                            placeholder="  ادخل رقم الهاتف من فضلك " value="{{$supplier->phone_number}}" required
                            autocomplete="off">
                        @error('phone_number')
                        <small class="form-text text-danger small-text">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Submit Button ==== --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit">إرسال
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>

                </div>
            </form>
            {{-- =========== End form Update Supplier ===========  --}}

        </div>
    </div>
</div>
<!-- ===== End Main Content ===== -->
@stop
