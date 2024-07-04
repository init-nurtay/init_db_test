<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request){
        $orderBy = $request->input('orderBy', 'created_at');
        $orderSort = $request->input('orderSort', 'asc');

        if (!in_array($orderSort, ['asc', 'desc'])) {
            $orderSort = 'asc';  
        }

        $payments = Payment::query()
            ->orderBy($orderBy, $orderSort)
            ->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function store(PaymentRequest $request) {
        Payment::create($request->validated());

        return redirect()->route('admin.payments.index')->with('success', 'Payment created successfully');
    }

    public function update(PaymentRequest $request, Payment $payment) {
        $payment->update($request->validated());
        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully');
    }

    public function destroy(Payment $payment) {
        $payment->delete();

        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully');
    }
}

