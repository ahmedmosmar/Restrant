@extends('layoutes.master')
@section('MyContent')

<div class="sub-content">
    <div class="sales-report-content">

        <h2>  تقرير مبيعات </h2>
        {{-- ============ Start Form Get Sales Report ============= --}}
        <div class="form-content">
            <form action="{{route('get-sales-report')}}" method="POST">
                @csrf
                <div class="row">

                    <div class="form-group">
                        <label for="">الطاولات</label>
                        <select name="table" id="" class="form-controll">
                            <option value="" selected disabled>اختر الطاولة من فضلك </option>
                            <option value=""> كل الطاولات</option>
                            @foreach ($tables as $table)
                            <option value="{{$table->id}}">{{$table->table_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="">الاصناف</label>
                        <select name="type" id="" class="form-controll">
                            <option value="" selected disabled>اختر الصنف من فضلك </option>
                            <option value="">كل الاصناف </option>
                            @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->type_name}}</option>
                            @endforeach
                        </select>
                    </div>


                    {{-- ========== Start Date ========= --}}
                    <div class="form-group">
                        <label for="">من تاريخ </label>
                        <input type="date" class="form-controll" placeholder="التاريخ " name="date_from"
                        autocomplete="off" required>
                    </div>


                    {{-- ========== Last Date ========== --}}
                    <div class="form-group">
                        <label for=""> الي تاريخ</label>
                        <input type="date" class="form-controll" placeholder="التاريخ " name="date_for"
                        autocomplete="off" required>
                    </div>


                    {{-- ========== Submit Button ========== --}}
                    <div class="form-group  box-submit">
                        <button class="btn send-data" type="submit" id="">بحث
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>

                </div>
            </form>
            {{-- ============ End Form Get Sales Report ============= --}}

        </div>
    </div>

</div>
<!-- ===== End Main Content ===== -->

</div>

@stop
