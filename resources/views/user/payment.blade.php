@extends('layouts.user')
@section('user_dashboard')

			<!--CENTER SECTION-->
			<div class="db-2">
				<div class="db-2-com db-2-main">
					<h4>Enter Payment Details <span class="db-pay-amount">Total: $1200</span></h4>
					<div class="db-2-main-com db2-form-pay db2-form-com">
						<div class="db-pay-card">
							<h5>Accepted Card Types</h5><img src="images/cards.png" alt="" /> </div>
						<form class="col s12">
							<div class="row">
								<div class="input-field col s12">
									<input type="number" class="validate" placeholder="Enter amount">
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<select class="chosen-select">
										<option value="" disabled selected>Select Card Type</option>
										<option value="1">Master Card</option>
										<option value="2">Visa</option>
										<option value="3">American Express</option>
										<option value="2">Laser</option>
										<option value="2">Discover</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="number" class="validate" placeholder="Card Number">
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="number" class="validate" placeholder="Expairy Date (DD/MM)">
								</div>
								<div class="input-field col s12 m6">
									<input type="number" class="validate" placeholder="CVV">
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input id="pay-ca" type="text" class="validate" placeholder="Full name on a Card">
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="submit" value="SUBMIT" class="waves-effect waves-light full-btn"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
@endsection