@extends('layouts.user')
@section('user_dashboard')

	<!--CENTER SECTION-->
	<div class="db-2">
		<div class="db-2-com db-2-main">
			<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
				<h4>My Payment Methods</h4>
				<a href="{{ route('user.payment-methods.create') }}" class="waves-effect waves-light full-btn" style="width: auto; padding: 10px 20px;">
					<i class="fa fa-plus"></i> Add New Card
				</a>
			</div>

			@if($message = Session::get('success'))
				<div class="alert alert-success" style="padding: 15px; margin-bottom: 20px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px;">
					{{ $message }}
				</div>
			@endif

			@if(count($paymentMethods) > 0)
				<div class="payment-methods-grid" style="display: grid; gap: 20px;">
					@foreach($paymentMethods as $method)
					<div class="payment-card" style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; background-color: #f9f9f9; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
						<div style="display: flex; justify-content: space-between; align-items: start;">
							<div style="flex: 1;">
								<h5 style="margin: 0 0 10px 0; color: #333;">
									{{ $method->card_name ?? 'Card' }}
									@if($method->is_default)
										<span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin-left: 10px;">DEFAULT</span>
									@endif
								</h5>
								<p style="margin: 5px 0; color: #666;">
									<strong>Cardholder Name:</strong> {{ $method->full_name }}
								</p>
								<p style="margin: 5px 0; color: #666;">
									<strong>Card Number:</strong> **** **** **** {{ substr($method->card_number, -4) }}
								</p>
								<p style="margin: 5px 0; color: #666;">
									<strong>Expiry Date:</strong> {{ $method->expiry_date }}
								</p>
							</div>
							<div style="display: flex; gap: 10px;">
								@if(!$method->is_default)
									<form action="{{ route('user.payment-methods.set-default', $method) }}" method="POST" style="display: inline;">
										@csrf
										<button type="submit" class="waves-effect waves-light" style="background-color: #17a2b8; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">
											Set Default
										</button>
									</form>
								@endif
								<a href="{{ route('user.payment-methods.edit', $method) }}" class="waves-effect waves-light" style="background-color: #007bff; color: white; padding: 8px 12px; border-radius: 4px; text-decoration: none; font-size: 12px;">
									Edit
								</a>
								<form action="{{ route('user.payment-methods.destroy', $method) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
									@csrf
									@method('DELETE')
									<button type="submit" class="waves-effect waves-light" style="background-color: #dc3545; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">
										Delete
									</button>
								</form>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			@else
				<div style="background-color: #f8f9fa; padding: 40px; border-radius: 5px; text-align: center;">
					<p style="color: #666; font-size: 16px; margin-bottom: 20px;">No payment methods added yet.</p>
					<a href="{{ route('user.payment-methods.create') }}" class="waves-effect waves-light full-btn">
						Add Your First Payment Method
					</a>
				</div>
			@endif
		</div>
	</div>

@endsection
