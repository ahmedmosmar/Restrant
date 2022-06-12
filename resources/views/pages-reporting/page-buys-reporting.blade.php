@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="buys-report-content">

        <h2> تقرير المشتريات </h2>

        {{-- ================ Start Form Get Buys Report ============ --}}
        <div class="form-content">
            <form action="{{route('get-buys-report')}}" method="POST" >
                @csrf
                <div class="row">

                    <div class="form-group">
                        <label for="">الموردين</label>
                        <select name="supplier" id="" class="form-controll">
                            <option value="" selected disabled>اختر المورد من فضلك</option>
                            <option value=""> كل الموردين</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- ======= Start Date ======= --}}
                    <div class="form-group">
                        <label for="">من تاريخ </label>
                        <input type="date" class="form-controll" placeholder="التاريخ " name="date_from"
                            autocomplete="off" required>
                    </div>


                    {{-- =========== Last Date ============ --}}
                    <div class="form-group">
                        <label for=""> الي تاريخ</label>
                        <input type="date" class="form-controll" placeholder="التاريخ " name="date_for"
                            autocomplete="off" required>
                    </div>

                    <div class="form-group"></div>

                    {{-- ========== Submit Button ========== --}}
                    <div class="form-group  box-submit">
                        <button class="btn send-data" type="submit" id="">بحث
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>
                    
                </div>
            </form>
            {{-- ================ End Form Get Buys Report ============ --}}

        </div>
    </div>

</div>
<!-- ===== End Main Content ===== -->

</div>

@stop
