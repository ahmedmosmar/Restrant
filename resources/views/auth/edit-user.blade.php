@extends('layouts.master') @section('MyContent')

<div class="sub-content">
    <div class="register-content">

        <h2> تحديث بيانات مستخدم </h2>

            <div class="back">
            <button>
                <a href="{{route('show-users')}}">
                    <i class="fa fa-arrow-left"></i>
                    رجوع
                </a>

            </button>
        </div>

        {{-- =========== Start form Update ===========  --}}
        <div class="form-content">
            <form method="POST" action="{{ route('update-user',$user->id) }}" class="form-add-user">
                @csrf
                @method("PUT")

                <div class="row">

                    {{-- ==== Full Name === --}}
                    <div class="form-group">
                        <label for=""> الاسم </label>
                        <input id="full_name" type="text" name="full_name" class="form-controll" required
                            placeholder=" أدخل الاسم من فضلك" autofocus autocomplete="off"
                            value="{{$user->full_name}}" />

                        @error('full_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- ===== User Name ====  --}}
                    <div class="form-group">
                        <label for=""> إسم المستخدم </label>
                        <input id="name" type="text" name="name" class="form-controll" required autocomplete="off"
                            placeholder=" أدخل إسم المستخدم من فضلك " value="{{$user->name}}" />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- ====== Phone Number =====  --}}
                    <div class="form-group">
                        <label for=""> رقم الهاتف </label>
                        <input id="phone" type="text" class="form-controll" name="phone" required autocomplete="off"
                            placeholder=" أدخل رقم الهاتف من فضلك" value="{{$user->phone}}" />

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- ===== Email =====  --}}
                    <div class="form-group">
                        <label for=""> البريد الألكتروني </label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror form-controll"
                            name="email" required autocomplete="off" placeholder=" أدخل  بريدك الالكتروني من فضلك"
                            value="{{$user->email}}" />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- ===== User Level ===== --}}
                    <div class="form-group">
                        <label for=""> مستوي المستخدم </label>
                        <select name="user_level" id="" class="form-controll" required>
                            <option value="" disabled>اختر مستوي المستخدم من فضلك</option>
                            <option value="{{$user->level}}" selected> {{$user->level}}</option>
                            <option value="3">مستخدم| عادي</option>
                            <option value="2">مستخدم| إداري</option>
                            <option value="1">مستخدم | مدير</option>
                        </select>

                        @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- ===== Pasword ===== --}}
                    <div class="col-md-6 form-group">
                        <label for=""> كلمة السر</label>
                        <input id="password" type="password"
                            class="@error('password') is-invalid @enderror form-controll" name="password"
                            autocomplete="new-password" placeholder="أدخل كلمة السر من فصلك " />
                        <small>بامكانك ترك هذا الحقل فارغ اذا لا ترير التحديث</small>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- ===== Submit Button ===== --}}
                    <div class="form-group box-submit">
                        <button type="submit" class="btn send-data">
                            تحديث
                            <i class="fa fa-refresh"></i>
                        </button>
                    </div>

                </div>
            </form>
        </div>
        {{-- =========== End Form Update ============  --}}
    </div>
</div>

@endsection
