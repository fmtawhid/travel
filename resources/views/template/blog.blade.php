@extends('layouts.master')
@section('content')
	
	<!--====== BANNER ==========-->
	<section>
		<div class="rows inner_banner inner_banner_1">
			<div class="container">
                <div class="spe-title tit-inn-pg">
					<h1>Holiday Tour <span>Blog Posts</span> </h1>
					<div class="title-line">
						<div class="tl-1"></div>
						<div class="tl-2"></div>
						<div class="tl-3"></div>
					</div>
					<p>Book travel packages and enjoy your holidays with distinctive experience</p>
					<ul>
						<li><a href="main.html">Home</a></li>
						<li><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
						<li><a href="#" class="bread-acti">Blogs</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--====== ALL POST ==========-->
	<section>
		<div class="rows inn-page-bg com-colo">
			<div class="container inn-page-con-bg tb-space pad-bot-redu-5" id="inner-page-title">
				<!--===== POSTS ======-->
				<div class="rows">
                    @forelse ($blogs as $blog)
                        <div class="posts">
                            <div class="col-md-6 col-sm-6 col-xs-12"> <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" /> </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h3>{{ $blog->title }}</h3>
                                <h5><span class="post_author">Author: {{ $blog->author }}</span><span class="post_date">Date: {{ $blog->created_at->format('d M, Y') }}</span><span class="post_city">City: {{ $blog->city }}</span></h5>
                                <p>{{ Str::limit($blog->description, 550) }}</p>
                                <a href="{{ route('blog.details', $blog->slug) }}" class="link-btn">Read more</a> </div>
                        </div>
                    @empty
                        <p>No blogs found.</p>
                    @endforelse

				</div>
				<!--===== POST END ======-->
			</div>
		</div>
	</section>

@endsection