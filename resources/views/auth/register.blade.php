@extends('frontend.master')

@section('content')

<section class="auth-section">
    <div class="auth-bg-shape auth-shape-1"></div>
    <div class="auth-bg-shape auth-shape-2"></div>

    <div class="auth-container">

        <div class="auth-card">

            <div class="auth-brand-area">
                <div class="auth-logo">
                    <i class="bi bi-person-plus-fill"></i>
                </div>

                <h1>{{ trans('panel.site_title') }}</h1>
                <p>{{ trans('global.register') }} your account to get started</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <div class="auth-field">
                    <label>{{ trans('global.user_name') }}</label>

                    <div class="auth-input-wrap {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        <i class="bi bi-person-fill"></i>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Enter full name"
                               required
                               autofocus>
                    </div>

                    @if($errors->has('name'))
                        <p class="auth-error">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="auth-field">
                    <label>{{ trans('global.login_email') }}</label>

                    <div class="auth-input-wrap {{ $errors->has('email') ? 'is-invalid' : '' }}">
                        <i class="bi bi-envelope-fill"></i>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter email address"
                               required>
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
                               placeholder="Create password"
                               required>
                    </div>

                    @if($errors->has('password'))
                        <p class="auth-error">{{ $errors->first('password') }}</p>
                    @endif
                </div>

                <div class="auth-field">
                    <label>{{ trans('global.login_password_confirmation') }}</label>

                    <div class="auth-input-wrap">
                        <i class="bi bi-shield-lock-fill"></i>
                        <input type="password"
                               name="password_confirmation"
                               placeholder="Confirm password"
                               required>
                    </div>
                </div>

                <button type="submit" class="auth-submit-btn">
                    {{ trans('global.register') }}
                    <i class="bi bi-arrow-right"></i>
                </button>

                <div class="auth-bottom-text">
                    <span>Already have an account?</span>
                    <a href="{{ route('login') }}">{{ trans('global.login') }}</a>
                </div>
            </form>

        </div>

    </div>
</section>

@endsection