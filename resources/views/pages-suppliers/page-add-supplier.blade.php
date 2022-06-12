@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="supplier-content">

        @if (Session::has('success'))
        <span class="success-store" data-message="{{Session::get('success')}}"></span>
        @endif

        <h2> إضافة مورد جديد</h2>

        {{-- =========== Start form add Supplier ===========  --}}
        <div class="form-content">
            <form action="{{route('store-new-supplier')}}" method="POST" class="form-add-supplier">
                @csrf
                <div class="row">

                    {{-- ===== Input Supplier Name ==== --}}
                    <div class="form-group">
                        <label for="">إسم المورد </label>
                        <input type="text" name="supplier_name" class="form-controll" id="supplier_name"
                            placeholder=" ادخل إسم المورد من فضلك" autocomplete="off" required>
                        @error('supplier_name')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>


                    {{-- ===== Input Supplier Phone ==== --}}
                    <div class="form-group">
                        <label for="">رقم الهاتف </label>
                        <input type="text" name="phone_number" class="form-controll"
                            placeholder="  ادخل رقم الهاتف من فضلك " required autocomplete="off">
                        @error('phone_number')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>


                    {{-- ===== Submit Button ==== --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit">إرسال
                            <i class="fa fa-send"></i>
                        </button>
                    </div>

                </div>
            </form>
            {{-- =========== End form add Supplier ===========  --}}

        </div>
    </div>
</div>
<!-- ===== End Main Content ===== -->
@stop
