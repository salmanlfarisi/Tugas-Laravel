<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Read All (Admin only)
    public function index()
    {
        // Cek role admin di middleware nanti
        $transactions = Transaction::with(['user', 'book'])->get();
        return response()->json(['status' => true, 'data' => $transactions], 200);
    }

    // Show (customer authenticated)
    public function show($id)
    {
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json(['status' => false, 'message' => 'Transaksi tidak ditemukan'], 404);
        }

        // pastikan user hanya bisa lihat transaksi miliknya (kalau bukan admin)
        if (Auth::user()->role !== 'admin' && $transaction->user_id !== Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }

        return response()->json(['status' => true, 'data' => $transaction], 200);
    }

    // Create (customer authenticated)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'transaction_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        $transaction = Transaction::create($validated);

        return response()->json(['status' => true, 'message' => 'Transaksi berhasil dibuat', 'data' => $transaction], 201);
    }

    // Update (customer authenticated)
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['status' => false, 'message' => 'Transaksi tidak ditemukan'], 404);
        }

        if ($transaction->user_id !== Auth::id()) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'book_id' => 'exists:books,id',
            'transaction_date' => 'date',
            'status' => 'string',
        ]);

        $transaction->update($validated);

        return response()->json(['status' => true, 'message' => 'Transaksi berhasil diperbarui', 'data' => $transaction], 200);
    }

    // Destroy (Admin only)
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['status' => false, 'message' => 'Transaksi tidak ditemukan'], 404);
        }

        $transaction->delete();

        return response()->json(['status' => true, 'message' => 'Transaksi berhasil dihapus'], 200);
    }
}
