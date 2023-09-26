@extends('layouts.app')

@section('content')
<div class="card background-motion bg-primary" style="height:800px">
<div class="container " style="direction: rtl; text-align: right;">
    <div class="row justify-content-center" style="margin-top: 150px">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning">
                   
                    <h1 style="text-align: center ;color: rgb(253, 253, 253);font-weight: bold ;margin-left: 30px">نظام ادارة المخازن</h1>
                  
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            
                                <label for="email" class="col-md-2 col-form-label  " style="margin-bottom: -0.5rem;">{{ __('عنوان البريد الإلكتروني') }}</label>
                           
                            

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-end" style="margin-bottom: -0.5rem;">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('تذكرني') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجيل الدخول') }}
                                </button>
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link mt-2" href="{{ route('password.request') }}">
                                        {{ __('نسيت كلمة المرور؟') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                    
                </div>
                
            </div>
            <div id="motion-demo"></div>
        </div>
    </div>
</div>


</div>

@endsection
