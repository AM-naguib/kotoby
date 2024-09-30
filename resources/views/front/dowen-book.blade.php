@extends('front.layouts.app')
@section('content')
    <div class="container">
        <div class="row border-bottom py-3">
            <h1>تحميل {{ $book->title }}</h1>
        </div>
        <div class="row">
            <div class="col-8 mx-auto text-center p-5">
                <a download href="{{ env('APP_URL') }}/storage/{{ $book->pdf_url }}" class="btn btn-danger text-white">اضغط هنا
                    للتحميل</a>
            </div>
        </div>
    </div>
@endsection
