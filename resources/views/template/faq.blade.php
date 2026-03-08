@extends('layouts.master')
@section('content')
		
	<!--====== FAQ ==========-->
	<section>
		<div class="form form-spac rows">
			<div class="container">
				<!-- TITLE & DESCRIPTION -->
				<div class="spe-title col-md-12">
					<h2>Frequency Asked <span>Questions</span></h2>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>World's leading tour and travels Booking website,Over 30,000 packages worldwide. Book travel packages and enjoy your holidays with distinctive experience</p>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 form_1 faq-form wow fadeInLeft" data-wow-duration="1s">
					<!--====== THANK YOU MESSAGE ==========-->
					<form class="contact__form v2-search-form" method="post" action="mail/faq.php">
							<div class="alert alert-success contact__msg" role="alert">
								Thank you message
							</div>
						<ul>
							<li>
								<input type="text" name="name" value="" placeholder="Name" required> </li>
							<li>
								<input type="tel" name="phone" value="" placeholder="Mobile" required> </li>
							<li>
								<input type="email" name="email" value="" placeholder="Email id" required> </li>
							<li>
								<input type="text" name="city" value="" placeholder="City" required> </li>
							<li>
								<input type="text" name="ecount" value="" placeholder="Country" required> </li>
							<li>
								<textarea name="emess" cols="40" rows="3" placeholder="Enter your message"></textarea>
							</li>
							<li>
								<input type="submit" value="Submit" id="send_button"> </li>
						</ul>
					</form>
				</div>
				<!--====== COMMON NOTICE ==========-->
				<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1s">
					<div class="rows book_poly">
						<h3>Common Notice</h3>
						<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>
						<ul>
							<li>But the majority have suffered alteration in some form, by injected humour</li>
							<li>All the Lorem Ipsum generators on the Internet tend to repeat</li>
							<li>The generated Lorem Ipsum is therefore always free from repetition</li>
							<li>Proof : Id proof mandatory for tour travel</li>
							<li>available, but the majority have suffered alteration in some form</li>
							<li>It has survived not only five centuries, but also the leap</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection