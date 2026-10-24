@extends('layouts.app')

@section('title', 'Login - Pengatur Uang Kos')

@section('content')
    <h1>💰 Pengatur Uang Kos</h1>
    <section class="card">
        <h3>Login Pengguna</h3>

        @if ($errors->any())
            <div class="errors" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <a class="button btn-google" href="{{ route('google.redirect') }}">Masuk dengan Google</a>
        <p class="divider">atau pakai email</p>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>
            <label>
                <input name="remember" type="checkbox" value="1" style="width:auto; vertical-align:middle">
                Ingat saya
            </label>
            <button class="btn-main" type="submit">Masuk</button>
        </form>

        <p class="toggle-auth">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </section>
@endsection
