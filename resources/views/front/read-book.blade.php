@extends('front.layouts.app')
@section('content')
    <div class="container">
        <div class="row border-bottom py-3">
            <h1>قراءة {{ $book->title }}</h1>
        </div>
        <div class="row">
            <div class="col-8 mx-auto">
                <iframe
                    src="https://docs.google.com/gview?url={{ env('APP_URL') }}/storage/{{ $book->pdf_url }}&embedded=true&hl=ar"
                    frameborder="0" width="100%" height="800px"></iframe>

            </div>
        </div>
    </div>
@endsection
