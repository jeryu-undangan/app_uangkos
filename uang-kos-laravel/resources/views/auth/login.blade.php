@extends('layouts.app')

@section('title', 'Login - Pengatur Uang Kos')

@section('content')
    @include('auth.brand')
    <section class="card auth-card">
        <h3>Login Pengguna</h3>

        @if ($errors->any())
            <div class="errors" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('login.store') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
            <label for="password">Password</label>
            <div class="password-field">
                <input id="password" name="password" type="password" autocomplete="current-password" required>
                <button class="password-toggle" type="button" data-password-toggle aria-label="Tampilkan password" aria-controls="password">
                    <svg class="password-icon-visible" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    <svg class="password-icon-hidden" aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8"></path><path d="M9.9 5.2A10.8 10.8 0 0 1 12 5c6.4 0 10 7 10 7a15.7 15.7 0 0 1-3.1 3.8M6.2 6.2C3.5 8 2 12 2 12s3.6 7 10 7c1.4 0 2.7-.4 3.8-1"></path></svg>
                </button>
            </div>
            <label>
                <input name="remember" type="checkbox" value="1" style="width:auto; vertical-align:middle">
                Ingat saya
            </label>
            <button class="btn-main" type="submit">Masuk</button>
        </form>

        <p class="toggle-auth">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </section>
@endsection
