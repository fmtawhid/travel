@extends('layouts.user')
@section('user_dashboard')

    <!--CENTER SECTION-->
    <div class="db-2">
        <div class="db-2-com db-2-main">
            <h4>Travel Booking</h4>
            <div class="db-2-main-com db-2-main-com-table">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Package</th>
                            <th>Duration</th>
                            <th>Start Date</th>
                            <th>Price</th>
                            <th>Payment</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Honeymoon Tailand</td>
                            <td>6days/5nights</td>
                            <td>12 Aug 2017</td>
                            <td>$784</td>
                            <td><span class="db-done">Done</span>
                            </td>
                            <td><a href="db-travel-details.html" class="db-done">view more</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Europe</td>
                            <td>10days/9nights</td>
                            <td>09 Nov 2017</td>
                            <td>$1058</td>
                            <td><span class="db-not-done">Done</span>
                            </td>
                            <td><a href="db-travel-details.html" class="db-done">view more</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dubai</td>
                            <td>7days/6nights</td>
                            <td>24 Dec 2017</td>
                            <td>$862</td>
                            <td><span class="db-not-done">Done</span>
                            </td>
                            <td><a href="db-travel-details.html" class="db-done">view more</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Thailand</td>
                            <td>8days/7nights</td>
                            <td>24 Jan 2018</td>
                            <td>$2355</td>
                            <td><span class="db-not-done">Done</span>
                            </td>
                            <td><a href="db-travel-details.html" class="db-done">view more</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Australia</td>
                            <td>8days/7nights</td>
                            <td>02 Mar 2018</td>
                            <td>$1542</td>
                            <td><span class="db-not-done">Done</span>
                            </td>
                            <td><a href="db-travel-details.html" class="db-done">view more</a>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Singapore</td>
                            <td>12days/11nights</td>
                            <td>21 Apr 2018</td>
                            <td>$2142</td>
                            <td><span class="db-not-done">Done</span>
                            </td>
                            <td><a href="db-travel-details.html" class="db-done">view more</a>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>South Africa</td>
                            <td>14days/13nights</td>
                            <td>08 Jun 2018</td>
                            <td>$2350</td>
                            <td><span class="db-not-done">Done</span>
                            </td>
                            <td><a href="db-travel-details.html" class="db-done">view more</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
			
@endsection