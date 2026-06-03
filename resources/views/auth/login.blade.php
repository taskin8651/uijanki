@extends('frontend.master')

@section('content')

<section class="auth-section">
    <div class="auth-bg-shape auth-shape-1"></div>
    <div class="auth-bg-shape auth-shape-2"></div>

    <div class="auth-container">

        <div class="auth-card">

            <div class="auth-brand-area">
                <div class="auth-logo">
                    <i class="bi bi-shield-check"></i>
                </div>

                <h1>{{ trans('panel.site_title') }}</h1>
                <p>{{ trans('global.login') }} to continue your account</p>
            </div>

            @if(session('message'))
                <div class="auth-alert success">
                    <i class="bi bi-info-circle-fill"></i>
                    <span>{{ session('message') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label>{{ trans('global.login_email') }}</label>

                    <div class="auth-input-wrap {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        <i class="bi bi-envelope-fill"></i>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter email address"
                               required
                               autofocus>
                    </div>

                    @if($errors->has('email'))
                        <p class="auth-error">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="auth-field">
                    <label>{{ trans('global.login_password') }}</label>

                    <div class="auth-input-wrap {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password"
                               name="password"
                               placeholder="Enter password"
                               required>
                    </div>

                    @if($errors->has('password'))
                        <p class="auth-error">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="auth-options">
                    <label class="auth-checkbox">
                        <input type="checkbox" name="remember">
                        <span>{{ trans('global.remember_me') }}</span>
                    </label>

                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ trans('global.forgot_password') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="auth-submit-btn">
                    {{ trans('global.login') }}
                    <i class="bi bi-arrow-right"></i>
                </button>

                <div class="auth-bottom-text">
                    <span>Don’t have an account?</span>
                    <a href="{{ route('register') }}">{{ trans('global.register') }}</a>
                </div>
            </form>

        </div>

    </div>
</section>

@endsection