@extends('front.layouts.app')
@section('title', "قراءة $book->title")
@section('description', $book->description)
@section('keywords', $book->htmlKeywords())

@section('content')
    <div class="container">
        <div class="row border-bottom py-3">
            <h1>قراءة {{ $book->title }}</h1>
        </div>
        <div class="row">
            <div class="col-8 mx-auto">
                @if (substr($book->pdf_url, 0, 1) == 'h')
                <iframe
                src="https://docs.google.com/gview?url={{ $book->pdf_url }}&embedded=true&hl=ar"
                frameborder="0" width="100%" height="800px"></iframe>
                @else

                <iframe
                    src="https://docs.google.com/gview?url={{ env('APP_URL') }}/storage/{{ $book->pdf_url }}&embedded=true&hl=ar"
                    frameborder="0" width="100%" height="800px"></iframe>
                @endif

            </div>
        </div>
    </div>
@endsection
