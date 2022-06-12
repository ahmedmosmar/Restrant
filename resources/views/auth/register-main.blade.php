@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">full_name</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>

                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="access_category" class="col-md-4 col-form-label text-md-right">access_category</label>

                            <div class="col-md-6">
                                <input id="access_category" type="checkbox" class="form-control" name="access_category"  autocomplete="false">
                            </div>
                               @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
{{--


                          <div class="form-group row">
                            <label for="access_weater" class="col-md-4 col-form-label text-md-right">access_weater</label>
                            <div class="col-md-6">
                                <input id="access_weater" type="checkbox" class="form-control" name="access_weater"  autocomplete="false">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="access_type" class="col-md-4 col-form-label text-md-right">access_type</label>
                            <div class="col-md-6">
                                <input id="access_type" type="checkbox" class="form-control" name="access_type"  autocomplete="false">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="access_buyes" class="col-md-4 col-form-label text-md-right">access_buyes</label>
                            <div class="col-md-6">
                                <input id="access_buyes" type="checkbox" class="form-control" name="access_buyes"  autocomplete="false">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="access_resorces" class="col-md-4 col-form-label text-md-right">access_resorces</label>
                            <div class="col-md-6">
                                <input id="access_resorces" type="checkbox" class="form-control" name="access_resorces"  autocomplete="false">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="access_sales" class="col-md-4 col-form-label text-md-right">access_sales</label>
                            <div class="col-md-6">
                                <input id="access_sales" type="checkbox" class="form-control" name="access_sales"  autocomplete="false">
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="access_acountents" class="col-md-4 col-form-label text-md-right">access_acountents</label>
                            <div class="col-md-6">
                                <input id="access_acountents" type="checkbox" class="form-control" name="access_acountents"  autocomplete="false">
                            </div>
                        </div>
                           <div class="form-group row">
                            <label for="access_reportes" class="col-md-4 col-form-label text-md-right">access_reportes</label>
                            <div class="col-md-6">
                                <input id="access_reportes" type="checkbox" class="form-control" name="access_reportes"  autocomplete="false">
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
