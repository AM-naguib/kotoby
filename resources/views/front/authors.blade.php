@extends('front.layouts.app')
@section("title", "الكتاباء")
@section("description", getSetting()->description)
@section("keywords", getSetting()->keywords)

@section('content')
    <!-- cards start -->
    <section class="cards">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h2 class="text-center">تصفح جميع الكتب</h2>
                </div>
                @forelse ($authors as $author)
                    <div class="col-lg-3 col-xl-3 col-md-4 col-6">
                        <a href="{{ route('front.page', ['type' => 'author', 'slug' => $author->slug]) }}"
                            style="text-decoration: none;">

                            <div class="card shadow mb-3" style="width: 100%;">

                                <div class="card-body text-center">
                                    <h3 class="card-text">
                                        <a href="{{ route('front.page', ['type' => 'author', 'slug' => $author->slug]) }}"
                                            style="font-size: 18px">
                                            {{ $author->name }}
                                        </a>
                                    </h3>
                                    <p class="author-label">
                                        <a style="font-size: 18px"
                                            href="{{ route('front.page', ['type' => 'author', 'slug' => $author->slug]) }}">{{ $author->books->count() . ' ' }}
                                            كتاب</a>
                                    </p>
                                    {{-- <p class="section-label">
                                    <a  href="{{route("front.book",$book->slug)}}">{{ $book->section->name }}</a>
                                </p> --}}
                                </div>
                            </div>
                        </a>
                    </div>

                @empty
                @endforelse

            </div>
        </div>
    </section>

    <!-- cards end -->
    <div class="pagnation col-8 my-4 text-center mx-auto">
        {{ $authors->links() }}
    </div>
@endsection
