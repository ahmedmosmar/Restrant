@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="buys-content">

        @if (Session::has('success'))
        <span class="success-store" data-message="{{Session::get('success')}}"></span>
        @endif

        <h2> إضافة مفاتورة مشتريات </h2>

        {{-- =========== Start form add Buys ===========  --}}
        <div class="form-content">
            <form action="{{route('store-buys')}}" method="POST" class="form-add-buys">
                @csrf
                <div class="row">

                    {{-- ===== Select  Supplier  ==== --}}
                    <div class="form-group">
                        <label for=""> اختر المورد </label>
                        <select name="supplier_id" id="" class="form-controll">
                            <option value="" selected disabled>اختر المورد من فضلك</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>


                    {{-- ===== Input Component  ==== --}}
                    <div class="form-group">
                        <label for=""> المكون </label>
                        <input type="text" class="form-controll" placeholder=" أدخل المكون من فضلك" name="component"
                            autocomplete="off" required>
                        @error('component')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Input Unit==== --}}
                    <div class="form-group">
                        <label for=""> الوحدة </label>
                        <input type="text" class="form-controll" placeholder=" أدخل الوحدة من فضلك" name="unit"
                            autocomplete="off" required>
                        @error('unit')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Input Amount  ==== --}}
                    <div class="form-group">
                        <label for=""> الكمية </label>
                        <input type="text" class="form-controll" placeholder=" أدخل الكمية من فضلك" id="amount"
                            name="amount" autocomplete="off" required>
                        @error('amount')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Input Unit Price ==== --}}
                    <div class="form-group">
                        <label for=""> سعر الوحدة </label>
                        <input type="text" class="form-controll" placeholder=" أدخل سعر الوحدة من فضلك " id="unitPrice"
                            name="unit_price" autocomplete="off" required>
                        @error('unit_price')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Input All Price ==== --}}
                    <div class="form-group">
                        <label for=""> المبلغ الكلي </label>
                        <input type="text" class="form-controll" placeholder=" المبلغ الكلي   " id="finalPrice"
                            name="final_price" autocomplete="off">
                        @error('final_price')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>

                    {{-- ===== Input Description ==== --}}
                    <div class="form-group">
                        <label for=""> الملاحظة </label>
                        <textarea name="description" class="form-controll" id="" cols="" rows="5" placeholder="الملاحظة"
                            autocomplete="off"></textarea>
                        @error('description')
                        <small class="form-text text-danger small-text" style="">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group"></div>

                    {{-- =====  Submit Button ==== --}}
                    <div class="form-group box-submit">
                        <button class="btn send-data" type="submit" id="">إرسال
                            <i class="fa fa-send"></i>
                        </button>
                    </div>

                </div>
            </form>
            {{-- =========== Start form add Buys ===========  --}}

        </div>
    </div>
</div>
<!-- ===== End Main Content ===== -->
@stop
