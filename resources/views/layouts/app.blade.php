<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pengatur Uang Kos')</title>
    <style>
        :root { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color: #333; background: #f4f6f9; }
        * { box-sizing: border-box; }
        body { margin: 0; padding: 16px; }
        .container { width: 100%; max-width: 480px; margin: 0 auto; }
        h1 { text-align: center; font-size: 1.4rem; margin: 8px 0 20px; }
        h2, h3 { margin-top: 0; }
        .card { background: #fff; padding: 20px; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,.08); margin-bottom: 16px; }
        .card-saldo { background: linear-gradient(135deg, #007aff, #0056b3); color: #fff; }
        .card-saldo h2 { margin: 5px 0 15px; font-size: 2rem; }
        .detail-saldo { display: flex; justify-content: space-between; gap: 12px; flex-wrap: wrap; font-size: .85rem; }
        .detail-saldo p { margin: 8px 0 0; }
        label { display: block; font-size: .85rem; font-weight: 700; margin: 12px 0 4px; }
        input, select { width: 100%; padding: 11px; border: 1px solid #ddd; border-radius: 8px; font-size: .95rem; background: #fff; }
        button, .button { display: inline-block; border: 0; border-radius: 8px; padding: 11px 14px; font-weight: 700; text-align: center; text-decoration: none; cursor: pointer; }
        .btn-main { width: 100%; background: #007aff; color: #fff; margin-top: 12px; }
        .btn-green { background: #34c759; color: #fff; }
        .btn-google { width: 100%; background: #fff; color: #555; border: 1px solid #ddd; margin-top: 8px; }
        .btn-small { background: rgba(255,255,255,.25); color: inherit; padding: 6px 10px; font-size: .8rem; }
        .btn-delete { background: #ff3b30; color: #fff; padding: 6px 9px; font-size: .8rem; }
        .user-header { display: flex; justify-content: space-between; align-items: center; margin: 4px 0 12px; gap: 10px; }
        .user-header form { margin: 0; }
        .item-transaksi { background: #fff; padding: 12px 14px; border-radius: 10px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center; gap: 10px; }
        .transaction-meta { color: #666; font-size: .8rem; }
        .transaction-actions { display: flex; align-items: center; gap: 8px; white-space: nowrap; }
        .pemasukan-text { color: #249947; font-weight: 700; }
        .pengeluaran-text { color: #e23b32; font-weight: 700; }
        .pesan-kosong { text-align: center; color: #777; font-size: .9rem; }
        .alert { padding: 12px 14px; border-radius: 9px; margin-bottom: 14px; background: #e8f6ec; color: #1d7137; }
        .errors { padding: 12px 14px; border-radius: 9px; margin-bottom: 14px; background: #fff0ef; color: #a52922; }
        .divider { text-align: center; margin: 16px 0 8px; color: #777; font-size: .85rem; }
        .toggle-auth { text-align: center; font-size: .9rem; margin: 16px 0 0; }
        .toggle-auth a { color: #007aff; }
        .inline-form { display: flex; gap: 8px; align-items: end; }
        .inline-form > div { flex: 1; min-width: 0; }
        .inline-form button { flex: 0 0 auto; }
        .saldo-form { margin-top: 12px; }
        hr { border: 0; border-top: 1px solid rgba(255,255,255,.45); margin: 12px 0; }
        @media (max-width: 380px) { .inline-form { display: block; } .inline-form button { width: 100%; margin-top: 8px; } }
    </style>
</head>
<body>
    <main class="container">
        @yield('content')
    </main>
</body>
</html>
