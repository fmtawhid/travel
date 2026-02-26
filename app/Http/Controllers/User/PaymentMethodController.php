<?php

namespace App\Http\Controllers\User;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    /**
     * Display user's payment methods
     */
    public function index()
    {
        $user = Auth::user();
        $paymentMethods = $user->paymentMethods;
        return view('user.payment-methods.index', compact('paymentMethods'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('user.payment-methods.create');
    }

    /**
     * Store new payment method
     */
    public function store(Request $request)
    {
        // Clean card number - remove spaces BEFORE validation
        $cardNumber = str_replace(' ', '', $request->card_number);
        $request->merge(['card_number' => $cardNumber]);

        $validated = $request->validate([
            'card_name' => 'required|string|max:50',
            'card_number' => 'required|digits:16',
            'expiry_date' => [
                'required',
                'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'
            ],
            'cvv' => 'required|digits:3,4',
            'full_name' => 'required|string|max:100',
            'is_default' => 'nullable|boolean'
        ], [
            'card_number.digits' => 'The card number field must be exactly 16 digits.',
            'expiry_date.regex' => 'The expiry date must be in MM/YY format (01-12 for month).',
        ]);

        $validated['user_id'] = Auth::id();

        // If setting as default, unset other defaults
        if ($request->has('is_default') && $request->is_default) {
            PaymentMethod::where('user_id', Auth::id())->update(['is_default' => false]);
        }

        PaymentMethod::create($validated);

        return redirect()->route('user.payment-methods.index')->with('success', 'Payment method added successfully!');
    }

    /**
     * Show edit form
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        $this->authorize('update', $paymentMethod);
        return view('user.payment-methods.edit', compact('paymentMethod'));
    }

    /**
     * Update payment method
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $this->authorize('update', $paymentMethod);

        // Clean card number - remove spaces BEFORE validation
        $cardNumber = str_replace(' ', '', $request->card_number);
        $request->merge(['card_number' => $cardNumber]);

        $validated = $request->validate([
            'card_name' => 'required|string|max:50',
            'card_number' => 'required|digits:16',
            'expiry_date' => [
                'required',
                'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'
            ],
            'cvv' => 'required|digits:3,4',
            'full_name' => 'required|string|max:100',
            'is_default' => 'nullable|boolean'
        ], [
            'card_number.digits' => 'The card number field must be exactly 16 digits.',
            'expiry_date.regex' => 'The expiry date must be in MM/YY format (01-12 for month).',
        ]);

        // If setting as default, unset other defaults
        if ($request->has('is_default') && $request->is_default) {
            PaymentMethod::where('user_id', Auth::id())->where('id', '!=', $paymentMethod->id)->update(['is_default' => false]);
        }

        $paymentMethod->update($validated);

        return redirect()->route('user.payment-methods.index')->with('success', 'Payment method updated successfully!');
    }

    /**
     * Delete payment method
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $this->authorize('delete', $paymentMethod);
        
        $paymentMethod->delete();

        return redirect()->route('user.payment-methods.index')->with('success', 'Payment method deleted successfully!');
    }

    /**
     * Set as default payment method
     */
    public function setDefault(PaymentMethod $paymentMethod)
    {
        $this->authorize('update', $paymentMethod);

        PaymentMethod::where('user_id', Auth::id())->update(['is_default' => false]);
        $paymentMethod->update(['is_default' => true]);

        return redirect()->route('user.payment-methods.index')->with('success', 'Default payment method updated!');
    }
}
