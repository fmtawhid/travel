@extends('layouts.master')
@section('content')

<section>
    <div class="rows inn-page-bg com-colo">
        <div class="container inn-page-con-bg mt-top" id="inner-page-title">
            <div class="rows">
                <div class="posts">

                    <!-- Blog Image -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <img src="{{ asset('uploads/blogs/' . $blog->image) }}" 
                             alt="{{ $blog->title }}" 
                             class="img-responsive" />
                    </div>

                    <!-- Blog Content -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h3>{{ $blog->title }}</h3>

                        <h5>
                            <span class="post_author">
                                Author: {{ $blog->author ?? 'Admin' }}
                            </span>

                            <span class="post_date">
                                Date: {{ $blog->created_at->format('d M, Y') }}
                            </span>

                            <span class="post_city">
                                City: {{ $blog->city ?? 'N/A' }}
                            </span>
                        </h5>

                        <!-- Share Buttons -->
                        <div class="post-btn">
                            <ul>
                                <li>
                                    <a target="_blank"
                                       href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}">
                                        <i class="fa fa-facebook fb1"></i> Share On Facebook
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank"
                                       href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}">
                                        <i class="fa fa-twitter tw1"></i> Share On Twitter
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Blog Description -->
                        <p>{!! nl2br(e($blog->description)) !!}</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
