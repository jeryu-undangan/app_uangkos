@extends('layouts.app')

@section('title', 'Sign Up - UangKos')

@section('content')
<div class="login-screen-root signup-screen-root">
    @include('auth.money-sky')

    <div class="login-phone-frame">
        <header class="login-header">
            <div class="login-brand-bar">
                <img src="{{ asset('app-logo.png') }}" alt="Logo UangKos" class="brand-avatar">
                <span class="brand-title">UangKos<span class="brand-dot">UI</span></span>
            </div>

            <h1 class="welcome-heading">Create your account.</h1>
            <p class="welcome-subheading">Join UangKos and start managing your money.</p>
        </header>

        <section class="login-card-sheet">
            <div class="login-tab-pill">
                <a href="{{ route('login') }}" class="tab-item">Sign In</a>
                <span class="tab-item active" aria-current="page">Sign Up</span>
            </div>

            @if ($errors->any())
                <div class="login-alert-box" role="alert">
                    @foreach ($errors->all() as $error)
                        <div class="alert-msg">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form class="login-actual-form signup-form" method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="signup-field">
                    <label class="sr-only" for="name">Nama</label>
                    <div class="login-input-wrapper">
                        <span class="input-icon-left" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M5 21a7 7 0 0 1 14 0"></path>
                            </svg>
                        </span>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Full name" autocomplete="name" required>
                    </div>
                </div>

                <div class="signup-field">
                    <label class="sr-only" for="email">Email</label>
                    <div class="login-input-wrapper">
                        <span class="input-icon-left" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </span>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email address" autocomplete="email" aria-describedby="email-status" required>
                    </div>
                    <p class="field-status" id="email-status" data-state="neutral" aria-live="polite">Masukkan alamat email yang valid.</p>
                </div>

                <div class="signup-field">
                    <label class="sr-only" for="password">Password</label>
                    <div class="login-input-wrapper">
                        <span class="input-icon-left" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </span>
                        <input id="password" name="password" type="password" placeholder="Password" autocomplete="new-password" aria-describedby="password-rules" required>
                        <button class="password-toggle input-icon-right" type="button" data-password-toggle aria-label="Tampilkan password" aria-controls="password">
                            <svg class="password-icon-visible" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            <svg class="password-icon-hidden" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"></path><path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a15.7 15.7 0 0 1-3.1 3.8M6.2 6.2C3.5 8 2 12 2 12s3.6 7 10 7c1.4 0 2.7-.4 3.8-1"></path></svg>
                        </button>
                    </div>
                    <ul class="password-rules" id="password-rules" aria-live="polite">
                        <li data-rule="length" data-state="neutral">Mengandung 8 karakter atau lebih</li>
                        <li data-rule="uppercase" data-state="neutral">Mengandung huruf kapital (A-Z)</li>
                        <li data-rule="number" data-state="neutral">Mengandung angka (0-9)</li>
                    </ul>
                </div>

                <div class="signup-field">
                    <label class="sr-only" for="password_confirmation">Ulangi password</label>
                    <div class="login-input-wrapper">
                        <span class="input-icon-left" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </span>
                        <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password" autocomplete="new-password" aria-describedby="password-confirmation-status" required>
                        <button class="password-toggle input-icon-right" type="button" data-password-toggle aria-label="Tampilkan password" aria-controls="password_confirmation">
                            <svg class="password-icon-visible" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            <svg class="password-icon-hidden" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"></path><path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a15.7 15.7 0 0 1-3.1 3.8M6.2 6.2C3.5 8 2 12 2 12s3.6 7 10 7c1.4 0 2.7-.4 3.8-1"></path></svg>
                        </button>
                    </div>
                    <p class="field-status" id="password-confirmation-status" data-state="neutral" aria-live="polite">Masukkan ulang password yang sama.</p>
                </div>

                <button class="login-submit-button" type="submit"><span>Sign up</span></button>
            </form>

            <div class="login-bottom-callout">
                <span>Already have an account?</span>
                <a href="{{ route('login') }}" class="callout-link">Sign in</a>
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
    <script nonce="{{ request()->attributes->get('cspNonce') }}">
        const emailInput = document.getElementById('email');
        const emailStatus = document.getElementById('email-status');
        const passwordInput = document.getElementById('password');
        const confirmationInput = document.getElementById('password_confirmation');
        const confirmationStatus = document.getElementById('password-confirmation-status');

        function setFieldStatus(element, state, message) {
            element.dataset.state = state;
            element.textContent = message;
        }

        function updateEmailStatus() {
            if (!emailInput.value) {
                setFieldStatus(emailStatus, 'neutral', 'Masukkan alamat email yang valid.');
                return;
            }

            const isValid = emailInput.validity.valid;
            setFieldStatus(emailStatus, isValid ? 'valid' : 'invalid', isValid ? 'Format email sesuai.' : 'Format email belum sesuai.');
        }

        function updatePasswordRules() {
            const password = passwordInput.value;
            const rules = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                number: /\d/.test(password),
            };

            document.querySelectorAll('.password-rules [data-rule]').forEach(rule => {
                const state = password ? (rules[rule.dataset.rule] ? 'valid' : 'invalid') : 'neutral';
                rule.dataset.state = state;
            });
        }

        function updatePasswordConfirmation() {
            if (!confirmationInput.value) {
                setFieldStatus(confirmationStatus, 'neutral', 'Masukkan ulang password yang sama.');
                return;
            }

            const matches = confirmationInput.value === passwordInput.value;
            setFieldStatus(confirmationStatus, matches ? 'valid' : 'invalid', matches ? 'Password cocok.' : 'Password belum cocok.');
        }

        emailInput.addEventListener('input', updateEmailStatus);
        passwordInput.addEventListener('input', () => {
            updatePasswordRules();
            updatePasswordConfirmation();
        });
        confirmationInput.addEventListener('input', updatePasswordConfirmation);
    </script>
@endpush

@push('styles')
    <style>
        body:has(.signup-screen-root) {
            background: #0b0e14 !important;
            margin: 0 !important;
            padding: 0 !important;
            overflow-x: hidden;
        }
        body:has(.signup-screen-root)::before,
        body:has(.signup-screen-root)::after { display: none !important; }
        body:has(.signup-screen-root) .page-shell.auth-shell {
            width: 100% !important;
            max-width: 100% !important;
            min-height: 100vh !important;
            padding: 0 !important;
            margin: 0 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            background: transparent !important;
            box-shadow: none !important;
        }
        .signup-screen-root {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            overflow: hidden;
            background: radial-gradient(circle at 50% 20%, #162032 0%, #080b11 85%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        .signup-screen-root .money-sky { position: absolute; inset: 0; z-index: 1; overflow: hidden; pointer-events: none; }
        .signup-screen-root .svg-defs { position: absolute; width: 0; height: 0; }
        .signup-screen-root .float-item { position: absolute; will-change: transform; }
        .signup-screen-root .bill-red-wrap { top: 6%; left: 4%; width: 135px; opacity: .88; filter: drop-shadow(0 14px 24px rgba(225,29,72,.35)); animation: signup-float-red 6.5s ease-in-out infinite alternate; }
        .signup-screen-root .bill-blue-wrap { top: 22%; right: 4%; width: 125px; opacity: .85; filter: drop-shadow(0 14px 24px rgba(2,132,199,.35)); animation: signup-float-blue 7.2s ease-in-out infinite alternate; }
        .signup-screen-root .coin-wrap-1 { top: 9%; right: 14%; width: 58px; filter: drop-shadow(0 10px 20px rgba(234,179,8,.45)); animation: signup-float-coin 5s ease-in-out infinite alternate; }
        .signup-screen-root .coin-wrap-2 { top: 29%; left: 6%; width: 48px; filter: drop-shadow(0 10px 18px rgba(234,179,8,.4)); animation: signup-float-coin 6s ease-in-out infinite alternate-reverse; }
        .signup-screen-root .money-bill, .signup-screen-root .money-coin { display: block; width: 100%; height: auto; }
        .signup-screen-root .money-sparkle { position: absolute; color: #fde047; font-weight: 800; opacity: 0; text-shadow: 0 0 12px rgba(253,224,71,.8); animation: signup-sparkle 8s linear infinite; }
        .signup-screen-root .sp-1 { top: 40%; left: 18%; font-size: 16px; }
        .signup-screen-root .sp-2 { top: 18%; left: 38%; color: #38bdf8; animation-delay: 1.5s; }
        .signup-screen-root .sp-3 { top: 12%; right: 35%; font-size: 18px; animation-delay: 2.2s; }
        .signup-screen-root .sp-4 { top: 48%; right: 12%; color: #34d399; animation-delay: .8s; }
        .signup-screen-root .sp-5 { top: 60%; left: 8%; font-size: 15px; animation-delay: 3s; }
        .signup-screen-root .sp-6 { top: 75%; right: 10%; animation-delay: 1.2s; }
        @keyframes signup-float-red { 50% { transform: translateY(-18px) rotate(-10deg) scale(1.04); } }
        @keyframes signup-float-blue { 50% { transform: translateY(-22px) rotate(24deg) scale(1.05); } }
        @keyframes signup-float-coin { 50% { transform: translateY(-16px) rotate(16deg) scale(1.08); } }
        @keyframes signup-sparkle { 0%, 100% { transform: translateY(0) scale(.6); opacity: 0; } 25%, 75% { opacity: .85; } 100% { transform: translateY(-70px) scale(1.1); } }
        .signup-screen-root .login-phone-frame { position: relative; z-index: 2; display: flex; flex-direction: column; width: 100%; max-width: 390px; margin: auto; animation: signup-phone-entrance .7s cubic-bezier(.16,1,.3,1) both; }
        @keyframes signup-phone-entrance { from { opacity: 0; transform: translateY(28px) scale(.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
        .signup-screen-root .login-header { padding: 10px 14px 26px; color: #fff; }
        .signup-screen-root .login-brand-bar { display: inline-flex; align-items: center; gap: 9px; margin-bottom: 22px; }
        .signup-screen-root .brand-avatar { width: 34px; height: 34px; border: 1px solid rgba(255,255,255,.2); border-radius: 10px; object-fit: cover; box-shadow: 0 4px 14px rgba(56,189,248,.35); }
        .signup-screen-root .brand-title { color: #fff; font-size: 1.12rem; font-weight: 800; font-style: italic; letter-spacing: -.02em; }
        .signup-screen-root .brand-dot { margin-left: 1px; color: #38bdf8; font-style: italic; }
        .signup-screen-root .welcome-heading { margin: 0 0 8px; color: #fff; font-family: 'Instrument Serif', Georgia, serif; font-size: 2.35rem; font-weight: 400; font-style: italic; line-height: 1.15; text-shadow: 0 2px 10px rgba(0,0,0,.4); }
        .signup-screen-root .welcome-subheading { margin: 0; color: #94a3b8; font-size: .86rem; line-height: 1.45; }
        .signup-screen-root .login-card-sheet { position: relative; display: flex; flex-direction: column; padding: 22px 20px 24px; border-radius: 34px; background: #fff; box-shadow: 0 25px 60px -15px rgba(0,0,0,.65), 0 0 0 1px rgba(255,255,255,.1); }
        .signup-screen-root .login-tab-pill { display: grid; grid-template-columns: 1fr 1fr; gap: 4px; margin-bottom: 20px; padding: 4px; border-radius: 15px; background: #f1f4f9; }
        .signup-screen-root .tab-item { display: flex; align-items: center; justify-content: center; padding: 10px 14px; border-radius: 12px; color: #64748b; font-size: .88rem; font-weight: 700; text-decoration: none; transition: all .2s ease; }
        .signup-screen-root .tab-item.active { color: #fff; background: #111827; box-shadow: 0 4px 12px rgba(17,24,39,.2); cursor: default; }
        .signup-screen-root .tab-item:not(.active):hover { color: #0f172a; background: rgba(255,255,255,.6); }
        .signup-screen-root .login-alert-box { display: flex; flex-direction: column; gap: 4px; margin-bottom: 16px; padding: 10px 14px; border: 1px solid #fecaca; border-radius: 14px; color: #b91c1c; background: #fef2f2; font-size: .82rem; font-weight: 500; }
        .signup-screen-root .login-actual-form { display: flex; flex-direction: column; gap: 12px; }
        .signup-screen-root .signup-field { min-width: 0; }
        .signup-screen-root .login-input-wrapper { position: relative; display: flex; align-items: center; border: 1.5px solid #e7ecf3; border-radius: 16px; background: #f3f5f9; transition: all .2s ease; }
        .signup-screen-root .login-input-wrapper:focus-within { border-color: #3b82f6; background: #fff; box-shadow: 0 0 0 4px rgba(59,130,246,.12); }
        .signup-screen-root .input-icon-left { display: flex; align-items: center; justify-content: center; padding-left: 14px; color: #94a3b8; pointer-events: none; }
        .signup-screen-root .input-icon-left svg, .signup-screen-root .input-icon-right svg { width: 19px; height: 19px; }
        .signup-screen-root .login-input-wrapper input { width: 100%; min-height: 48px; padding: 12px 14px 12px 10px; border: 0; border-radius: 16px; outline: 0; color: #1e293b; background: transparent; font: 500 .92rem 'Inter', sans-serif; box-shadow: none !important; }
        .signup-screen-root .login-input-wrapper input::placeholder { color: #94a3b8; font-weight: 400; }
        .signup-screen-root .input-icon-right { display: flex; align-items: center; justify-content: center; padding: 0 14px 0 6px; border: 0; color: #94a3b8; background: transparent; cursor: pointer; box-shadow: none !important; transform: none !important; }
        .signup-screen-root .input-icon-right:hover { color: #475569; transform: none !important; box-shadow: none !important; }
        .signup-screen-root .field-status, .signup-screen-root .password-rules { margin: 6px 0 0; color: #728096; font-size: .76rem; line-height: 1.4; }
        .signup-screen-root .password-rules { display: grid; gap: 3px; padding: 0; list-style: none; }
        .signup-screen-root .password-rules li::before { display: inline-grid; width: 16px; height: 16px; place-items: center; margin-right: 7px; border: 1px solid #a5afbd; border-radius: 50%; color: #728096; content: '·'; font-size: .9rem; font-weight: 800; vertical-align: -2px; }
        .signup-screen-root .field-status[data-state="valid"], .signup-screen-root .password-rules [data-state="valid"] { color: #14804f; }
        .signup-screen-root .field-status[data-state="invalid"], .signup-screen-root .password-rules [data-state="invalid"] { color: #bf3441; }
        .signup-screen-root .password-rules [data-state="valid"]::before { border-color: #20a66a; color: #fff; background: #20a66a; content: '✓'; font-size: .7rem; }
        .signup-screen-root .password-rules [data-state="invalid"]::before { border-color: #dc4b55; color: #fff; background: #dc4b55; content: '×'; font-size: .85rem; }
        .signup-screen-root .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0,0,0,0); white-space: nowrap; border: 0; }
        .signup-screen-root .login-submit-button { display: flex; align-items: center; justify-content: center; width: 100%; min-height: 50px; margin-top: 4px; border: 0; border-radius: 16px; color: #fff; background: #3b82f6; font-size: .96rem; font-weight: 700; cursor: pointer; box-shadow: 0 8px 22px rgba(59,130,246,.35); transition: all .2s cubic-bezier(.16,1,.3,1); }
        .signup-screen-root .login-submit-button:hover { background: #2563eb; transform: translateY(-2px); box-shadow: 0 12px 28px rgba(59,130,246,.45); }
        .signup-screen-root .login-submit-button:active { transform: translateY(0) scale(.98); }
        .signup-screen-root .login-bottom-callout { display: flex; align-items: center; justify-content: center; gap: 6px; margin-top: 22px; color: #64748b; font-size: .83rem; font-weight: 500; }
        .signup-screen-root .callout-link { color: #2563eb; font-weight: 700; text-decoration: none; }
        .signup-screen-root .callout-link:hover { color: #1d4ed8; text-decoration: underline; }
        @media (max-width: 480px) {
            .signup-screen-root { align-items: flex-start; min-height: 100svh; padding: 18px 10px; overflow-y: auto; }
            .signup-screen-root .login-phone-frame { max-width: 100%; }
            .signup-screen-root .welcome-heading { font-size: 2.1rem; }
            .signup-screen-root .bill-red-wrap { top: 2%; left: 2%; width: 105px; }
            .signup-screen-root .bill-blue-wrap { top: 14%; right: 2%; width: 95px; }
            .signup-screen-root .coin-wrap-1 { top: 4%; right: 12%; width: 44px; }
            .signup-screen-root .coin-wrap-2 { top: 22%; left: 4%; width: 38px; }
            .signup-screen-root .login-card-sheet { padding: 20px 16px 22px; }
        }
        @media (prefers-reduced-motion: reduce) {
            .signup-screen-root *, .signup-screen-root *::before, .signup-screen-root *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
@endpush
