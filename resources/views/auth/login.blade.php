@extends('layouts.master-sales')

@section('salesContent')


{{-- ========= Start Form Content ========== --}}
<div class="login-content">

    <div class="login-body">

        <div class="login-header">
            <h5>تسجيل الدخول</h5>
        </div>

        {{-- ========= Form Login ======== --}}
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <!-- ========= Input User Name ======== -->
            <div class="form-group">
                <label for="email"> اسم المستخدم</label>
                <input id="name" type="name" class="@error('name') is-invalid @enderror" name="name" required
                    autocomplete="off" autofocus>
                <i class="fa fa-user"></i>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- ========= Input PassWord ======== -->
            <div class="form-group">
                <label for="password">كلمة السر</label>
                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password" >
                <i class="fa fa-lock"></i>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- ======== Submit Form ======== -->
            <div class="form-group">
                    <button type="submit" class="btn">
                        دخــول
                    </button>
            </div>

            <div class="form-group">
                  @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        هل نسيت كلمة السر ؟
                    </a>
                    @endif
            </div>

        </form>
    </div>
</div>

{{-- ========= End Form Content ========== --}}

</div>
</div>

@endsection
