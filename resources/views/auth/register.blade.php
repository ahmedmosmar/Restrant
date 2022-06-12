@extends('layouts.master') @section('MyContent')

<div class="sub-content">
    <div class="register-content">

        @if (Session::has('success'))
           <span class="success-store" data-message="{{Session::get('success')}}"></span>
        @endif


        {{-- =========== Start form Register ===========  --}}
        <h2>إضافة مستخدم جديد</h2>

        <div class="form-content">
        <form method="POST" action="{{ route('user-register') }}" class="form-add-user">
            @csrf
            <div class="row">

                {{-- ==== Full Name === --}}
                <div class="form-group">
                        <label for="">  الاسم </label>
                    <input id="full_name" type="text" name="full_name"  class="form-controll" required
                        placeholder=" أدخل الاسم من فضلك" autofocus  autocomplete="off" />

                    @error('full_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- ===== User Name ====  --}}
                <div class="form-group">
                        <label for="">  إسم المستخدم </label>
                    <input id="name" type="text"  name="name"  class="form-controll" required autocomplete="off"
                        placeholder=" أدخل إسم المستخدم من فضلك " />
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- ====== Phone Number =====  --}}
                <div class="form-group">
                        <label for="">  رقم الهاتف </label>
                    <input id="phone" type="text" class="form-controll"   name="phone" required autocomplete="off"
                        placeholder=" أدخل رقم الهاتف من فضلك" />

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- ===== Email =====  --}}
                <div class="form-group">
                        <label for="">   البريد الألكتروني </label>
                    <input id="email" type="email" class="@error('email') is-invalid @enderror form-controll" name="email" required
                        autocomplete="off" placeholder=" أدخل  بريدك الالكتروني من فضلك"  />

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- ===== User Level ===== --}}
                <div class="form-group">
                        <label for="">  مستوي المستخدم </label>
                    <select name="user_level" id="" class="form-controll" required>
                        <option value="" selected disabled>اختر مستوي المستخدم من فضلك</option>
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
                        <label for="">  كلمة السر</label>
                    <input id="password" type="password" class="@error('password') is-invalid @enderror form-controll" name="password"
                        required autocomplete="new-password" placeholder="أدخل كلمة السر من فصلك " />

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- ===== Confirm Password ===== --}}
                {{-- <div class="col-md-6 form-group">
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required
                        autocomplete="new-password" placeholder=" إعادة كلمة المرور" />
                </div> --}}

                {{-- ===== Submit Button ===== --}}
                  <div class="form-group box-submit">
                    <button type="submit" class="btn send-data">
                        إرسال
                        <i class="fa fa-send"></i>
                    </button>
                </div>

            </div>
        </form>
        </div>
        {{-- =========== End Form Register ============  --}}
    </div>
</div>

@endsection
