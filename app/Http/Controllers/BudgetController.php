<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BudgetController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $transactions = $user->transactions()->latest()->get();
        $totalIncome = $user->transactions()->where('type', 'income')->sum('amount');
        $totalExpense = $user->transactions()->where('type', 'expense')->sum('amount');

        return view('budget.index', [
            'transactions' => $transactions,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'balance' => $user->weekly_budget + $totalIncome - $totalExpense,
        ]);
    }

    public function storeExpense(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:1'],
            'category' => ['required', 'in:Makan,Kebutuhan Kos,Transport,Nongkrong,Lainnya'],
        ]);

        $request->user()->transactions()->create([
            ...$validated,
            'type' => 'expense',
        ]);

        return redirect()->route('budget.index')->with('status', 'Pengeluaran berhasil dicatat.');
    }

    public function storeIncome(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:1'],
        ]);

        $request->user()->transactions()->create([
            ...$validated,
            'category' => 'Saldo Masuk',
            'type' => 'income',
        ]);

        return redirect()->route('budget.index')->with('status', 'Saldo masuk berhasil dicatat.');
    }

    public function updateBudget(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'weekly_budget' => ['required', 'integer', 'min:0'],
        ]);

        $request->user()->update($validated);

        return redirect()->route('budget.index')->with('status', 'Target uang saku berhasil diperbarui.');
    }

    public function destroy(Request $request, Transaction $transaction): RedirectResponse
    {
        $request->user()->transactions()
            ->findOrFail($transaction->getKey())
            ->delete();

        return redirect()->route('budget.index')->with('status', 'Transaksi berhasil dihapus.');
    }
}
