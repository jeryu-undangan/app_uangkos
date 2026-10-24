@extends('layouts.app')

@section('title', 'Daftar - Pengatur Uang Kos')

@section('content')
    <h1>💰 Pengatur Uang Kos</h1>
    <section class="card">
        <h3>Daftar Akun Baru</h3>

        @if ($errors->any())
            <div class="errors" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <label for="name">Nama</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" required autofocus>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required>
            <label for="password">Password (minimal 8 karakter)</label>
            <input id="password" name="password" type="password" autocomplete="new-password" required>
            <label for="password_confirmation">Ulangi password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>
            <button class="btn-main" type="submit">Daftar</button>
        </form>

        <p class="toggle-auth">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </section>
@endsection
