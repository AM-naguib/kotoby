@extends('front.layouts.app')
@section('title', "تسجيل الدخول")
@section('description', getSetting()->description)
@section('keywords', getSetting()->keywords)

@section('content')

    <!-- Start login -->
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 col-xl-3 mx-auto my-5 bg-white rounded shadow">
            <div class="login d-flex justify-content-center">
                <h3 class="text-center border-bottom pb-3 mt-4 d-inline-block ">تسجيل الدخول</h3>
            </div>
            <form action="{{route("login.store")}}" class="p-5" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">اسم المستخدم</label>
                    <input type="text" class="form-control custom-rounded-input" id="username" name="username"  placeholder="ahmed">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input type="password" class="form-control custom-rounded-input" id="password" name="password" placeholder="********">
                </div>

                <div class="mb-3 text-center">
                    <button  class="main-button">تسجيل الدخول</button>

                </div>
            </form>
        </div>
    </div>
    <!-- End login -->

@endsection
