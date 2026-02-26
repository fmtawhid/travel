@extends('layouts.user')
@section('user_dashboard')

	<!--CENTER SECTION-->
	<div class="db-2">
		<div class="db-2-com db-2-main">
			<h4>Add New Payment Method</h4>
			<div class="db-2-main-com db2-form-pay db2-form-com">
				<div class="db-pay-card">
					<h5>Accepted Card Types</h5>
					<img src="{{ asset('assets/images/cards.png') }}" alt="Accepted Cards" /> 
				</div>

				@if ($errors->any())
					<div style="background-color: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border: 1px solid #f5c6cb; border-radius: 4px;">
						<strong>Please fix the following errors:</strong>
						<ul style="margin: 10px 0 0 20px;">
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ route('user.payment-methods.store') }}" method="POST" class="col s12">
					@csrf

					<div class="row">
						<div class="input-field col s12">
							<label for="card_name">Card Name (e.g., My Visa, Personal Card)</label>
							<input type="text" name="card_name" id="card_name" class="validate @error('card_name') is-invalid @enderror" 
								placeholder="Enter a name for this card" value="{{ old('card_name') }}" required>
							@error('card_name')
								<span style="color: #dc3545; font-size: 12px;">{{ $message }}</span>
							@enderror
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<label for="card_number">Card Number (16 digits)</label>
							<input type="text" name="card_number" id="card_number" class="validate @error('card_number') is-invalid @enderror" 
							placeholder="Enter 16-digit card number" maxlength="19" inputmode="numeric" 
								value="{{ old('card_number') }}" required>
							<small id="card_digit_count" style="color: #999; display: block; margin-top: 5px;">Digits entered: 0/16</small>
							@error('card_number')
								<span style="color: #dc3545; font-size: 12px;">{{ $message }}</span>
							@enderror
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12 m6">
							<label for="expiry_date">Expiry Date (MM/YY)</label>
							<input type="text" name="expiry_date" id="expiry_date" class="validate @error('expiry_date') is-invalid @enderror" 
								placeholder="MM/YY" maxlength="5" value="{{ old('expiry_date') }}" required>
							@error('expiry_date')
								<span style="color: #dc3545; font-size: 12px;">{{ $message }}</span>
							@enderror
						</div>
						<div class="input-field col s12 m6">
							<label for="cvv">CVV</label>
							<input type="text" name="cvv" id="cvv" class="validate @error('cvv') is-invalid @enderror" 
								placeholder="3 or 4 digit code" maxlength="4" inputmode="numeric" 
								value="{{ old('cvv') }}" required>
							@error('cvv')
								<span style="color: #dc3545; font-size: 12px;">{{ $message }}</span>
							@enderror
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<label for="full_name">Full Name on Card</label>
							<input type="text" name="full_name" id="full_name" class="validate @error('full_name') is-invalid @enderror" 
								placeholder="Enter name as shown on card" value="{{ old('full_name') }}" required>
							@error('full_name')
								<span style="color: #dc3545; font-size: 12px;">{{ $message }}</span>
							@enderror
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<label>
								<input type="checkbox" name="is_default" value="1" {{ old('is_default') ? 'checked' : '' }}>
								<span style="margin-left: 10px;">Set as default payment method</span>
							</label>
						</div>
					</div>

					<div class="row">
						<div class="col s12" style="display: flex; gap: 10px;">
							<input type="submit" value="ADD PAYMENT METHOD" class="waves-effect waves-light full-btn">
							<a href="{{ route('user.payment-methods.index') }}" class="waves-effect waves-light full-btn" style="background-color: #6c757d; text-align: center; text-decoration: none;">
								CANCEL
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		// Auto-format card number and show digit count
		const cardNumberInput = document.getElementById('card_number');
		const cardDigitCount = document.getElementById('card_digit_count');
		if(cardNumberInput) {
			cardNumberInput.addEventListener('input', function(e) {
				let value = e.target.value.replace(/\D/g, '');
				// Limit to 16 digits
				if(value.length > 16) {
					value = value.substring(0, 16);
				}
				let formattedValue = value.replace(/(\d{4})(?=\d)/g, '$1 ');
				e.target.value = formattedValue;
				
				// Show digit count
				if(cardDigitCount) {
					const digitCount = value.length;
					cardDigitCount.textContent = `Digits entered: ${digitCount}/16`;
					
					// Change color based on validity
					if(digitCount < 16) {
						cardDigitCount.style.color = '#999';
						cardNumberInput.style.borderBottomColor = '#ddd';
					} else if(digitCount === 16) {
						cardDigitCount.style.color = '#28a745';
						cardDigitCount.textContent = `Digits entered: ${digitCount}/16 ✓`;
						cardNumberInput.style.borderBottomColor = '#28a745';
					}
				}
			});
		}

		// Auto-format and validate expiry date (MM/YY)
		document.getElementById('expiry_date').addEventListener('input', function(e) {
			let value = e.target.value.replace(/\D/g, '');
			
			// Limit to 4 characters (MMYY)
			if (value.length > 4) {
				value = value.substring(0, 4);
			}
			
			// Auto-format as MM/YY
			if (value.length >= 2) {
				let month = value.substring(0, 2);
				// Validate month is between 01-12
				if (parseInt(month) > 12) {
					month = '12';
				} else if (parseInt(month) === 0) {
					month = '01';
				}
				value = month + (value.length > 2 ? '/' + value.substring(2, 4) : '');
			}
			e.target.value = value;
		});

		// CVV only numbers
		document.getElementById('cvv').addEventListener('input', function(e) {
			e.target.value = e.target.value.replace(/\D/g, '');
		});
	</script>

@endsection
