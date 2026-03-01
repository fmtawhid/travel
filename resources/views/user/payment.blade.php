@extends('layouts.user')
@section('user_dashboard')

	<!--CENTER SECTION-->
	<div class="db-2">
		<div class="db-2-com db-2-main">
			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<h4>Payment <span class="db-pay-amount" id="totalAmount"></span></h4>
				<a href="{{ route('user.payment-methods.create') }}" class="waves-effect waves-light full-btn" style="width: auto; padding: 10px 20px;">
					<i class="fa fa-plus"></i> Add New Card
				</a>
			</div>
			
			<div class="db-2-main-com db2-form-pay db2-form-com">
				<div class="db-pay-card">
					<h5>Accepted Card Types</h5>
					<img src="{{ asset('assets/templates/images/cards.png') }}" alt="Accepted Cards" /> 
				</div>

				@if($paymentMethods && count($paymentMethods) > 0)
					<!-- Show saved payment methods -->
					<div style="margin-bottom: 30px;">
						<h5 style="margin-bottom: 15px;">Your Saved Cards</h5>
						
						<form id="paymentForm" method="POST" action="{{ route('user.payment.process') }}" class="col s12">
							@csrf
							
							<!-- Hidden field for payment_id if coming from payment details -->
							@if($paymentId)
								<input type="hidden" name="payment_id" value="{{ $paymentId }}">
							@endif
							
							<div class="row">
								<div class="input-field col s12">
									<label>Select a payment method:</label>
									<div style="margin-top: 10px;">
										@foreach($paymentMethods as $method)
										<div style="margin-bottom: 15px; padding: 15px; border: 2px solid #ddd; border-radius: 5px; cursor: pointer;" class="payment-option" data-method-id="{{ $method->id }}">
											<label>
												<input type="radio" name="payment_method_id" value="{{ $method->id }}" 
													{{ $method->is_default ? 'checked' : '' }} class="payment-radio">
												<span style="margin-left: 10px;">
													<strong>{{ $method->card_name }}</strong> 
													@if($method->is_default)
														<span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 3px; font-size: 11px; margin-left: 10px;">DEFAULT</span>
													@endif
													<br>
													<small style="color: #666;">**** **** **** {{ substr($method->card_number, -4) }} - Expires: {{ $method->expiry_date }}</small>
												</span>
											</label>
											<div style="text-align: right; margin-top: 5px;">
												<a href="{{ route('user.payment-methods.edit', $method) }}" style="color: #007bff; text-decoration: none; font-size: 12px;">Edit</a>
												| 
												<a href="{{ route('user.payment-methods.index') }}" style="color: #6c757d; text-decoration: none; font-size: 12px;">Manage Cards</a>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>

							<div class="row" style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd;">
								<div class="input-field col s12">
									<label for="amount">Amount to Pay</label>
									<input type="number" id="amount" name="amount" class="validate" placeholder="Enter amount" step="0.01" required value="{{ $amount ?? '' }}">
								</div>
							</div>

							<div class="row">
								<div class="col s12">
									<input type="submit" value="PROCESS PAYMENT" class="waves-effect waves-light full-btn">
								</div>
							</div>
						</form>
					</div>
				@else
					<!-- No saved payment methods -->
					<form id="paymentForm" method="POST" action="{{ route('user.payment.process') }}" class="col s12">
						@csrf
						
						<!-- Hidden field for payment_id if coming from payment details -->
						@if($paymentId)
							<input type="hidden" name="payment_id" value="{{ $paymentId }}">
						@endif
						
						<div class="row" style="background-color: #f0f0f0; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
							<div class="col s12">
								<p style="color: #666; margin: 0;">You don't have any saved payment methods yet. 
									<a href="{{ route('user.payment-methods.create') }}" style="color: #007bff; font-weight: bold;">Add your first card here</a>
								</p>
							</div>
						</div>

						<!-- One-time payment option -->
						<h5 style="margin: 20px 0 15px 0;">One-Time Payment</h5>
						<p style="color: #666; font-size: 12px; margin-bottom: 15px;">Or enter card details below for a one-time payment (not saved)</p>

						<div class="row">
							<div class="input-field col s12">
								<label for="card_name">Card Name</label>
								<input type="text" id="card_name" name="card_name" class="validate" placeholder="e.g., My Card">
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<label for="card_number">Card Number (16 digits)</label>
								<input type="text" id="card_number" name="card_number" class="validate" placeholder="16-digit card number" maxlength="19" inputmode="numeric">
								<small id="card_digit_count" style="color: #999; display: block; margin-top: 5px;">Digits entered: 0/16</small>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12 m6">
								<label for="expiry_date">Expiry Date (MM/YY)</label>
								<input type="text" id="expiry_date" name="expiry_date" class="validate" placeholder="MM/YY" maxlength="5">
							</div>
							<div class="input-field col s12 m6">
								<label for="cvv">CVV</label>
								<input type="text" id="cvv" name="cvv" class="validate" placeholder="3 or 4 digits" maxlength="4" inputmode="numeric">
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<label for="full_name">Full Name on Card</label>
								<input type="text" id="full_name" name="full_name" class="validate" placeholder="Name as shown on card">
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<label for="amount">Amount to Pay</label>
								<input type="number" id="amount" name="amount" class="validate" placeholder="Enter amount" step="0.01" required value="{{ $amount ?? '' }}">
							</div>
						</div>

						<div class="row">
							<div class="col s12">
								<input type="submit" value="PROCESS PAYMENT" class="waves-effect waves-light full-btn">
							</div>
						</div>
					</form>
				@endif
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

		// Auto-format and validate expiry date
		const expiryInput = document.getElementById('expiry_date');
		if(expiryInput) {
			expiryInput.addEventListener('input', function(e) {
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
		}

		// CVV only numbers
		const cvvInput = document.getElementById('cvv');
		if(cvvInput) {
			cvvInput.addEventListener('input', function(e) {
				e.target.value = e.target.value.replace(/\D/g, '');
			});
		}

		// Highlight selected payment option
		document.querySelectorAll('.payment-option').forEach(option => {
			const radio = option.querySelector('input[type="radio"]');
			if(radio) {
				option.addEventListener('click', function(e) {
					if(e.target.tagName !== 'A') { // Don't trigger on links
						radio.checked = true;
					}
				});
				if(radio.checked) {
					option.style.borderColor = '#007bff';
					option.style.backgroundColor = '#f0f8ff';
				}
			}
		});

		document.querySelectorAll('.payment-radio').forEach(radio => {
			radio.addEventListener('change', function() {
				document.querySelectorAll('.payment-option').forEach(option => {
					option.style.borderColor = '#ddd';
					option.style.backgroundColor = 'white';
				});
				this.closest('.payment-option').style.borderColor = '#007bff';
				this.closest('.payment-option').style.backgroundColor = '#f0f8ff';
			});
		});
	</script>

@endsection
