@extends('front.layouts.app')
@section("title", "انشاء حساب")
@section("description", getSetting()->description)
@section("keywords", getSetting()->keywords)
@section('content')

    <!-- Start login -->
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 col-xl-3 mx-auto my-5 bg-white rounded shadow">
            <div class="login d-flex justify-content-center">
                <h3 class="text-center border-bottom pb-3 mt-4 d-inline-block ">انشاء حساب</h3>
            </div>
            <form action="{{route("register.store")}}" method="post" class="p-5">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" class="form-control custom-rounded-input" id="name" name="name"  placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">اسم المستخدم</label>
                    <input type="text" class="form-control custom-rounded-input" id="username" name="username"  placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="email" class="form-control custom-rounded-input" id="email" name="email" aria-describedby="emailHelp" placeholder="test@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input type="password" class="form-control custom-rounded-input" id="password" name="password" placeholder="********">
                </div>

                <div class="mb-3 text-center">
                    <button  class="main-button">انشاء حساب</button>
                </div>
                <p> لديك حساب ؟ <a href="{{route("login.create")}}" class="text-primary">تسجيل الدخول</a></p>

            </form>
        </div>
    </div>

@endsection
