<div class="col-md-2 border bg-white shadow-sm pb-4">
    <div class="col-12 rounded-circle text-center mt-5">
        <img src="https://www.kotobati.com/themes/custom/ktobati/assets/images/avatar.svg" alt="" width="100"
            height="100">
    </div>
    <div class="col-12 mt-3">
        <h6 class="text-center">{{ $user->name }}</h6>
    </div>
    <div class="col-12 mt-3 border-bottom text-center py-2">
        <a href="{{ route('profile.index') }}" class="text-center">الصفحة الشخصية</a>
    </div>
    <div class="col-12 mt-3 border-bottom text-center py-2">
        <a href="{{ route('profile.myfavourites') }}" class="text-center">المحفوظات</a>
    </div>
    <div class="col-12 mt-3 border-bottom text-center py-2">
        <a href="{{ route('profile.myreviews') }}" class="text-center">مراجعاتي</a>
    </div>
    <div class="col-12 mt-3 border-bottom text-center py-2">
        <a href="{{ route('profile.settings') }}" class="text-center">اعدادات الحساب</a>
    </div>
    <div class="col-12 mt-3 border-bottom text-center py-2">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn p-0 m-0">تسجيل خروج</button>
        </form>
    </div>

</div>
