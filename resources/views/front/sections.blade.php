@extends('front.layouts.app')
@section("title", "تصفح جميع الاقسام")
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
                @forelse ($sections as $section)
                    <div class="col-lg-2 col-xl-2 col-md-4 col-6">
                        <div class="card shadow mb-3" style="width: 100%;">

                            <div class="card-body text-center">
                                <h3 class="card-text">
                                    <a href="{{route("front.page",["type"=>"section","slug"=>$section->slug])}}"  style="font-size: 18px">
                                        {{ $section->name }}
                                    </a>
                                </h3>
                                <p class="author-label">
                                    <a style="font-size: 18px" href="{{route("front.page",["type"=>"section","slug"=>$section->slug])}}">{{ $section->books->count() . " " }} كتاب</a>
                                </p>
                                {{-- <p class="section-label">
                                    <a  href="{{route("front.book",$book->slug)}}">{{ $book->section->name }}</a>
                                </p> --}}
                            </div>
                        </div>
                    </div>

                @empty
                @endforelse

            </div>
        </div>
    </section>
    <!-- cards end -->
@endsection
