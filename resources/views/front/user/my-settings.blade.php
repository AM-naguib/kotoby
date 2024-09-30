@extends('front.layouts.app')
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
                    <h5>تعديل الحساب</h5>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                </div>
                <form action="{{route("profile.update.settings")}}" method="POST">
                    @csrf

                    <div class="row p-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control custom-rounded-input" id="name"
                                placeholder="الاسم" required value="{{$user->name}}" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">اسم المستخدم</label>
                            <input type="text" class="form-control custom-rounded-input" id="username"
                                placeholder="اسم المستخدم" required value="{{$user->username}}" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الالكتروني</label>
                            <input type="email" class="form-control custom-rounded-input" id="email"
                                placeholder="البريد الالكتروني" required value="{{$user->email}}" name="email">
                        </div>
                        <p class="text-danger">*أترك الحقول خالية إذا كنت لا تريد تغيير كلمة المرور.*</p>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور الجديدة</label>
                            <input type="password" class="form-control custom-rounded-input" id="password"
                                placeholder="كلمة المرور الجديدة" name="password">
                        </div>
                        <div class="mb-3 px-5">
                            <button class="main-button w-100">حفظ</button>
                        </div>


                    </div>

                </form>
            </div>

        </div>

    </div>
@endsection
