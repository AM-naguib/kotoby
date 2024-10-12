@extends('front.layouts.app')
@section('title', "تحميل $book->title")
@section('description', $book->description)
@section('keywords', $book->htmlKeywords())
@section('content')
    <div class="container">
        <div class="row border-bottom py-3">
            <h1>تحميل {{ $book->title }}</h1>
        </div>
        <div class="row">


            <div class="col-8 mx-auto text-center p-5">
                @if (substr($book->pdf_url, 0, 1) == 'h')
                    <a download href="{{ $book->pdf_url }}" class="btn btn-danger text-white">اضغط هنا
                        للتحميل</a>
                @else
                    <a download href="{{ env('APP_URL') }}/storage/{{ $book->pdf_url }}"
                        class="btn btn-danger text-white">اضغط هنا
                        للتحميل</a>
                @endif
            </div>
        </div>
    </div>
@endsection
