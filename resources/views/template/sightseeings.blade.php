@extends('layouts.master')
@section('content')

<!--====== INNER BANNER ==========-->
<section>
    <div class="rows inner_banner inner_banner_1">
        <div class="container">
            <div class="spe-title tit-inn-pg">
                <h1>Popular <span>Destinations</span> </h1>
                <div class="title-line">
                    <div class="tl-1"></div>
                    <div class="tl-2"></div>
                    <div class="tl-3"></div>
                </div>
                <p>World's leading Hotel Booking website, over 30,000 hotel rooms worldwide.</p>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    <li><a href="#" class="bread-acti">Sight Seeings</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--====== SIGHTSEEINGS GRID ==========-->
<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg">
            <div class="to-ho-hotel">
                <ul>
                    @forelse($sightseeings as $sightseeing)
                        <li class="col-md-4">
                            <div class="plac-hom-box">
                                <div class="plac-hom-box-im">
                                    @if($sightseeing->image)
                                        <img src="{{ asset('uploads/sightseeing/'.$sightseeing->image) }}" alt="{{ $sightseeing->name }}" loading="lazy">
                                    @else
                                        <img src="{{ asset('images/placeholder.jpg') }}" alt="{{ $sightseeing->name }}" loading="lazy">
                                    @endif
                                    <h4>{{ $sightseeing->name }}</h4>
                                </div>
                                <div class="plac-hom-box-txt">
                                    <span>{{ Str::limit($sightseeing->short_description, 50) }}</span>
                                    <span>More details</span>
                                </div>
                                <a href="{{ route('sightseeing.details', $sightseeing->id) }}" class="fclick"></a>
                            </div>
                        </li>
                    @empty
                        <p>No sightseeing destinations found.</p>
                    @endforelse
                </ul>

                <!-- Pagination -->
                <div class="text-center mt-4">
                    {{ $sightseeings->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
