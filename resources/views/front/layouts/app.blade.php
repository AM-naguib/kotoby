<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{getSetting()->site_title}}</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('front/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/starability/2.4.2/starability-minified/starability-all.min.css"
        integrity="sha512-k5K++9rI+aOPWZB9NxhNQD3SNa1OQhu+XDyPtbBBXABkcW12Ts+i7LNqIHhfK0sXpXbkhj8fyDHMc3so+SKYAA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js
        "></script>
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css
" rel="stylesheet">

</head>

<body>
    <!-- Start Header -->
    <header>
        <nav class="navbar navbar-light bg-white">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="left">
                        <a class="navbar-brand" href="#">
                            <img src="https://www.kotobati.com/sites/default/files/logo.svg" alt="Logo">
                        </a>
                    </div>
                    <div class="login-menu">
                        @guest

                        <a href="{{ route('login.create') }}" class="btn btn-danger text-white"
                            style="border-radius: 25px">تسجيل الدخول</a>
                        <a href="{{ route('register.create') }}" class="btn btn-primary text-white"
                            style="border-radius: 25px">انشاء حساب</a>
                        @endguest

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>


        <div class="offcanvas offcanvas-start custom-offcanvas-width" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">القائمة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Login -->
                @auth
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" style="color: #000;" href="{{ route('profile.index') }}">الصفحة الشخصية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.myfavourites') }}">مكتبتي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.myreviews') }}">اعدادات الحساب</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn m-0 p-0">تسجيل الخروج</button>
                            </form>
                        </li>
                    </ul>
                @endauth

                <!-- guest -->
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 my-3">
                    @guest

                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" aria-current="page" href="{{ route('login.create') }}">تسجيل الدخول</a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link" aria-current="page" href="{{ route('register.create') }}">انشاء حساب</a>
                    </li>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">حقوق الملكية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">سياسة الخصوصية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="after-header border-top shadow bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <a href="{{ route('front.index') }}">
                        <div class="item">
                            <svg viewBox="0 1 511 511.999" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m498.699219 222.695312c-.015625-.011718-.027344-.027343-.039063-.039062l-208.855468-208.847656c-8.902344-8.90625-20.738282-13.808594-33.328126-13.808594-12.589843 0-24.425781 4.902344-33.332031 13.808594l-208.746093 208.742187c-.070313.070313-.144532.144531-.210938.214844-18.28125 18.386719-18.25 48.21875.089844 66.558594 8.378906 8.382812 19.441406 13.234375 31.273437 13.746093.484375.046876.96875.070313 1.457031.070313h8.320313v153.695313c0 30.417968 24.75 55.164062 55.167969 55.164062h81.710937c8.285157 0 15-6.71875 15-15v-120.5c0-13.878906 11.292969-25.167969 25.171875-25.167969h48.195313c13.878906 0 25.167969 11.289063 25.167969 25.167969v120.5c0 8.28125 6.714843 15 15 15h81.710937c30.421875 0 55.167969-24.746094 55.167969-55.164062v-153.695313h7.71875c12.585937 0 24.421875-4.902344 33.332031-13.8125 18.359375-18.367187 18.367187-48.253906.027344-66.632813zm-21.242188 45.421876c-3.238281 3.238281-7.542969 5.023437-12.117187 5.023437h-22.71875c-8.285156 0-15 6.714844-15 15v168.695313c0 13.875-11.289063 25.164062-25.167969 25.164062h-66.710937v-105.5c0-30.417969-24.746094-55.167969-55.167969-55.167969h-48.195313c-30.421875 0-55.171875 24.75-55.171875 55.167969v105.5h-66.710937c-13.875 0-25.167969-11.289062-25.167969-25.164062v-168.695313c0-8.285156-6.714844-15-15-15h-22.328125c-.234375-.015625-.464844-.027344-.703125-.03125-4.46875-.078125-8.660156-1.851563-11.800781-4.996094-6.679688-6.679687-6.679688-17.550781 0-24.234375.003906 0 .003906-.003906.007812-.007812l.011719-.011719 208.847656-208.839844c3.234375-3.238281 7.535157-5.019531 12.113281-5.019531 4.574219 0 8.875 1.78125 12.113282 5.019531l208.800781 208.796875c.03125.03125.066406.0625.097656.09375 6.644531 6.691406 6.632813 17.539063-.03125 24.207032zm0 0">
                                </path>
                            </svg> <span>الرئيسية</span>
                        </div>
                    </a>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('front.best') }}">
                            <div class="item ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M429.687 231.205C447.303 217.957 451 204.204 451 195s-3.697-22.957-21.313-36.206c-6.059-4.557-8.135-12.305-5.166-19.282 8.632-20.281 4.957-34.041.354-42.012-4.569-7.916-14.637-17.882-36.648-20.412-7.68-.883-13.433-6.635-14.315-14.316-2.532-22.012-12.498-32.079-20.412-36.647-7.972-4.603-21.731-8.277-42.013.355-6.979 2.97-14.725.892-19.282-5.167C278.956 3.698 265.204 0 256 0s-22.956 3.698-36.206 21.313c-4.557 6.059-12.304 8.135-19.28 5.167-20.281-8.631-34.041-4.958-42.013-.355-7.915 4.569-17.881 14.636-20.413 36.649-.882 7.68-6.635 13.432-14.314 14.315-22.012 2.529-32.08 12.496-36.649 20.411-4.603 7.972-8.277 21.731.354 42.013 2.969 6.976.893 14.725-5.166 19.282C64.697 172.043 61 185.796 61 195s3.697 22.957 21.313 36.206c6.059 4.557 8.135 12.305 5.166 19.282-8.632 20.281-4.957 34.041-.354 42.012 4.569 7.916 14.637 17.882 36.648 20.412 7.68.883 13.433 6.635 14.315 14.316 1.285 11.178 4.489 19.271 8.367 25.132l-54.628 75.876A15 15 0 0 0 104 452h50.729l25.854 51.708A15 15 0 0 0 193.95 512h.049c5.645 0 10.813-3.17 13.372-8.204L256 408.109l48.628 95.687A14.998 14.998 0 0 0 318 512h.049a15 15 0 0 0 13.367-8.292L357.271 452H408a15.001 15.001 0 0 0 12.173-23.764l-54.628-75.876c3.878-5.861 7.082-13.955 8.368-25.133.882-7.68 6.635-13.432 14.314-14.315 22.012-2.529 32.079-12.496 36.648-20.411 4.603-7.972 8.277-21.731-.354-42.013-2.969-6.977-.893-14.726 5.166-19.283zM194.109 463.677l-16.693-33.385A14.998 14.998 0 0 0 164 422h-30.718l38.613-53.632c7.484 1.004 16.974.108 28.617-4.848 6.98-2.968 14.726-.891 19.282 5.167 5.065 6.735 10.204 11.43 15.134 14.667zM348 422a14.998 14.998 0 0 0-13.416 8.292l-16.693 33.385-40.819-80.323c4.93-3.237 10.069-7.933 15.135-14.667 4.557-6.059 12.305-8.135 19.28-5.167 11.644 4.956 21.134 5.852 28.618 4.848L378.718 422zm63.655-214.771a46.104 46.104 0 0 0-14.738 55.006c2.909 6.838 3.631 12.402 1.978 15.266-1.544 2.674-6.813 4.77-14.094 5.607-21.489 2.47-38.224 19.204-40.692 40.692-.838 7.282-2.934 12.551-5.608 14.095-2.864 1.652-8.428.932-15.265-1.978a46.103 46.103 0 0 0-55.005 14.738C263.763 356.594 259.306 360 256 360s-7.763-3.406-12.229-9.345c-12.862-17.102-35.512-23.036-55.007-14.739-6.836 2.91-12.398 3.631-15.265 1.978-2.674-1.543-4.77-6.813-5.606-14.093-2.47-21.49-19.204-38.224-40.693-40.694-7.281-.837-12.55-2.933-14.094-5.607-1.653-2.863-.932-8.427 1.978-15.264a46.104 46.104 0 0 0-14.738-55.006C94.406 202.763 91 198.305 91 195s3.406-7.763 9.345-12.229a46.104 46.104 0 0 0 14.738-55.006c-2.909-6.838-3.631-12.402-1.978-15.266 1.544-2.674 6.813-4.77 14.094-5.607 21.489-2.47 38.224-19.204 40.692-40.692.838-7.282 2.934-12.551 5.608-14.095 2.861-1.653 8.426-.933 15.265 1.978a46.102 46.102 0 0 0 55.005-14.738C248.237 33.406 252.694 30 256 30s7.763 3.406 12.229 9.345a46.104 46.104 0 0 0 55.007 14.739c6.836-2.91 12.398-3.63 15.265-1.978 2.674 1.543 4.77 6.813 5.606 14.093 2.47 21.49 19.204 38.224 40.693 40.694 7.281.837 12.55 2.933 14.094 5.607 1.653 2.863.932 8.427-1.978 15.264a46.104 46.104 0 0 0 14.738 55.006c5.94 4.467 9.346 8.925 9.346 12.23s-3.406 7.763-9.345 12.229z" />
                                    <path
                                        d="M256 75c-66.168 0-120 53.832-120 120s53.832 120 120 120 120-53.832 120-120S322.168 75 256 75zm0 210c-49.626 0-90-40.374-90-90s40.374-90 90-90 90 40.374 90 90-40.374 90-90 90z" />
                                </svg>
                                <span>الافضل</span>
                            </div>

                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('front.sections') }}">
                            <div class="item">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 469.333 469.333;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M458.667,0h-448C4.771,0,0,4.771,0,10.667v448c0,5.896,4.771,10.667,10.667,10.667h448
                                                c5.896,0,10.667-4.771,10.667-10.667v-448C469.333,4.771,464.563,0,458.667,0z M149.333,448h-128V170.667h128V448z M298.667,448
                                                h-128V170.667h128V448z M448,448H320V170.667h128V448z M448,149.333H21.333v-128H448V149.333z">
                                            </path>
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg> <span>الأقسام</span>

                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('front.authors') }}">
                            <div class="item ">
                                <svg enable-background="new 0 0 512 512" viewBox="0 0 512 512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="m490.685 314.751c-9.172-12.021-20.956-21.936-34.243-28.987 7.099-12.131 11.171-26.239 11.171-41.279v-38.456c0-45.216-36.798-82.002-82.028-82.002-16.235 0-31.712 4.818-44.771 13.29v-77.396c-.001-33.041-26.881-59.921-59.921-59.921h-135.527v60.527c0 20.297 10.144 38.269 25.628 49.113v27.552c-13.018-8.395-28.423-13.165-44.578-13.165-45.23 0-82.028 36.786-82.028 82.002v38.456c0 15.041 4.072 29.148 11.171 41.279-13.288 7.05-25.072 16.966-34.243 28.986-13.945 18.277-21.316 40.114-21.316 63.152v134.098h512v-134.098c0-23.038-7.371-44.875-21.315-63.151zm-315.319-284.751h105.526c16.498 0 29.921 13.422 29.921 29.921v30.527h-105.526c-16.498 0-29.921-13.422-29.921-29.921zm135.447 90.448v40.639c0 30.262-24.632 54.882-54.909 54.882s-54.91-24.62-54.91-54.882v-40.792c1.418.101 2.85.152 4.293.152h105.526zm-199.164 361.552h-81.649v-104.098c0-30.197 18.607-57.407 46.102-68.695 10.204 7.945 22.328 13.536 35.548 15.948v156.845zm0-189.941v2.296c-21.519-6.377-37.262-26.32-37.262-49.869v-38.456c0-28.674 23.34-52.002 52.029-52.002 21.794 0 41.433 13.643 48.952 33.976 2.281 6.802 5.401 13.223 9.238 19.138-41.241 6.228-72.957 41.935-72.957 84.917zm129.255 189.941h-99.255v-189.941c0-27.673 20.197-50.712 46.61-55.119.351 10.471 1.259 22.983 3.238 36.559 6.904 47.369 23.941 86.469 49.407 113.573zm-22.561-244.796c11.331 5.61 24.084 8.766 37.562 8.766 13.493 0 26.26-3.163 37.601-8.785-1.198 31.964-8.082 84.105-37.597 121.399-29.442-37.245-36.342-89.44-37.566-121.38zm151.816 244.796h-99.255v-94.928c25.467-27.108 42.504-66.235 49.408-113.65 1.972-13.54 2.881-26.023 3.234-36.483 26.414 4.406 46.613 27.446 46.613 55.12zm-42.958-274.859c3.804-5.865 6.904-12.226 9.179-18.963l.164.06c7.454-20.463 27.161-34.211 49.04-34.211 28.688 0 52.028 23.328 52.028 52.002v38.456c0 23.619-15.836 43.611-37.453 49.925v-2.352c0-42.981-31.716-78.688-72.958-84.917zm154.799 274.859h-81.841v-156.809c13.294-2.393 25.486-8 35.74-15.983 27.494 11.287 46.101 38.498 46.101 68.694z">
                                        </path>
                                    </g>
                                </svg>
                                <span>المؤلفين</span>
                            </div>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--  End Header -->

    @yield('content')

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
