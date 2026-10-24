@extends('layouts.app')

@section('title', 'Pengatur Uang Kos')

@section('content')
    <h1>💰 Pengatur Uang Kos</h1>

    <header class="user-header">
        <small>{{ auth()->user()->name }} · {{ auth()->user()->email }}</small>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-delete" type="submit">Keluar</button>
        </form>
    </header>

    @if (session('status'))
        <div class="alert" role="status">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="errors" role="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <section class="card card-saldo">
        <small>Sisa Uang Saku</small>
        <h2>Rp {{ number_format($balance, 0, ',', '.') }}</h2>
        <hr>
        <div class="detail-saldo">
            <p>Target Saku: <strong>Rp {{ number_format(auth()->user()->weekly_budget, 0, ',', '.') }}</strong></p>
            <p>Total Masuk: <strong>Rp {{ number_format($totalIncome, 0, ',', '.') }}</strong></p>
            <p>Total Keluar: <strong>Rp {{ number_format($totalExpense, 0, ',', '.') }}</strong></p>
        </div>
    </section>

    <section class="card">
        <h3>Ubah Target Uang Saku</h3>
        <form class="inline-form" method="POST" action="{{ route('budget.update') }}">
            @csrf
            @method('PUT')
            <div>
                <label for="weekly_budget">Target mingguan (Rp)</label>
                <input id="weekly_budget" name="weekly_budget" type="number" min="0" step="1" value="{{ old('weekly_budget', auth()->user()->weekly_budget) }}" required>
            </div>
            <button class="btn-main" type="submit">Perbarui</button>
        </form>
    </section>

    <section class="card">
        <h3>+ Tambah Saldo Masuk</h3>
        <form method="POST" action="{{ route('transactions.income') }}">
            @csrf
            <label for="income_name">Keterangan</label>
            <input id="income_name" name="name" type="text" value="{{ old('name') }}" placeholder="Contoh: Kiriman orang tua" required>
            <label for="income_amount">Nominal (Rp)</label>
            <input id="income_amount" name="amount" type="number" min="1" step="1" placeholder="Contoh: 500000" required>
            <button class="btn-main" type="submit">Simpan Saldo Masuk</button>
        </form>
    </section>

    <section class="card">
        <h3>+ Catat Pengeluaran</h3>
        <form method="POST" action="{{ route('transactions.expense') }}">
            @csrf
            <label for="expense_name">Nama Pengeluaran</label>
            <input id="expense_name" name="name" type="text" value="{{ old('name') }}" placeholder="Contoh: Nasi goreng" required>
            <label for="expense_amount">Nominal (Rp)</label>
            <input id="expense_amount" name="amount" type="number" min="1" step="1" placeholder="Contoh: 15000" required>
            <label for="category">Kategori</label>
            <select id="category" name="category" required>
                <option value="Makan">🍛 Makan &amp; Minum</option>
                <option value="Kebutuhan Kos">🏠 Kebutuhan Kos</option>
                <option value="Transport">🛵 Transportasi</option>
                <option value="Nongkrong">☕ Nongkrong / Hiburan</option>
                <option value="Lainnya">📦 Lainnya</option>
            </select>
            <button class="btn-main btn-green" type="submit">Simpan Catatan</button>
        </form>
    </section>

    <section>
        <h3>Riwayat Transaksi</h3>
        @forelse ($transactions as $transaction)
            <article class="item-transaksi">
                <div>
                    <strong>{{ $transaction->name }}</strong><br>
                    <small class="transaction-meta">{{ $transaction->category }} · {{ $transaction->created_at->format('d/m/Y H:i') }}</small>
                </div>
                <div class="transaction-actions">
                    <span class="{{ $transaction->type === 'income' ? 'pemasukan-text' : 'pengeluaran-text' }}">
                        {{ $transaction->type === 'income' ? '+' : '-' }}Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                    </span>
                    <form method="POST" action="{{ route('transactions.destroy', $transaction) }}" onsubmit="return confirm('Hapus catatan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete" type="submit" aria-label="Hapus transaksi {{ $transaction->name }}">🗑️</button>
                    </form>
                </div>
            </article>
        @empty
            <p class="pesan-kosong">Belum ada transaksi.</p>
        @endforelse
    </section>
@endsection
