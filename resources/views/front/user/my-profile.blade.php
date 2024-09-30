@extends('front.layouts.app')

@section("title", "الصفحة الشخصية")
@section("description", getSetting()->description)
@section("keywords", getSetting()->keywords)

@section('content')
    <div class="container">
        <div class="row border-bottom mt-5">
            <div class="col-12">
                <h5>الصفحة الشخصية</h5>
            </div>

        </div>
        <div class="row gap-5 mt-4">
            @include('front.user.inc.side')


            <div class="col-md-8 border bg-white shadow-sm">
                <div class="col-12 p-3 border-bottom">
                    <h5>الصفحة الشخصية</h5>
                </div>
                <div class="col-12 d-flex gap-4 justify-content-center mt-4 flex-wrap">



                    <div class="box border px-4 py-2 text-center">
                        <a href="{{ route('profile.myfavourites') }}">
                            <div class="box-title fs-3">
                                المحفوظات
                            </div>
                            <div class="box-body">
                                {{ $user->favorites->count() }}
                                كتاب
                            </div>
                        </a>
                    </div>
                    <div class="box border px-4 py-2 text-center">
                        <a href="{{ route('profile.myreviews') }}">
                            <div class="box-title fs-3">
                                مراجعاتي
                            </div>
                            <div class="box-body">
                                {{ $user->reviews->count() }}
                                كتاب
                            </div>
                        </a>
                    </div>
                    <div class="box border px-4 py-2 text-center">
                        <a href="">
                            <div class="box-title fs-3">
                                تحميلاتي
                            </div>
                            <div class="box-body">
                                {{$user->dowenBooks->count()}}
                                كتاب
                            </div>
                        </a>
                    </div>
                    <div class="box border px-4 py-2 text-center">
                        <a href="">
                            <div class="box-title fs-3">
                                قراءاتي
                            </div>
                            <div class="box-body">
                                {{$user->readBooks->count()}}
                                كتاب
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
