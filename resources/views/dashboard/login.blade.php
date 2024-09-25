<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Volt Premium Bootstrap Dashboard - Sign in page</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="title" content="Volt Premium Bootstrap Dashboard - Sign in page">
    <meta name="author" content="Themesberg">
    <meta name="description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard">
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt Premium Bootstrap Dashboard - Sign in page">
    <meta property="og:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image"
        content="../../../../themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt Premium Bootstrap Dashboard - Sign in page">
    <meta property="twitter:description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image"
        content="../../../../themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('dashboard') }}/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('dashboard') }}/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('dashboard') }}/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://demo.themesberg.com/volt-pro/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://demo.themesberg.com/volt-pro/assets/img/favicon/safari-pinned-tab.svg"
        color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link type="text/css" href="{{ asset('dashboard') }}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard') }}/vendor/notyf/notyf.min.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard') }}/vendor/fullcalendar/main.min.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard') }}/vendor/apexcharts/dist/apexcharts.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard') }}/vendor/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard') }}/vendor/choices.js/public/assets/styles/choices.min.css"
        rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard') }}/vendor/leaflet/dist/leaflet.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('dashboard') }}/css/volt.css" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-6"></script>


</head>

<body>
    <main>
        <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
            <div class="container">
                <p class="text-center"><a href="../dashboard/dashboard.html"
                        class="d-flex align-items-center justify-content-center"><svg class="icon icon-xs me-2"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                clip-rule="evenodd"></path>
                        </svg> Back to homepage</a></p>
                <div class="row justify-content-center form-bg-image"
                    data-background-lg="https://demo.themesberg.com/volt-pro/assets/img/illustrations/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h3">Sign in to our platform</h1>
                            </div>
                            <form action="{{route("login.store")}}" method="POST" class="mt-4">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="username">Username</label>
                                    <div class="input-group"><span class="input-group-text" id="basic-addon1"><svg
                                                class="icon icon-xs text-gray-600" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                </path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                                </path>
                                            </svg> </span>
                                        <input type="text" class="form-control" placeholder="Username"
                                            id="username" name="username" value="admin" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group mb-4"><label for="password">Your Password</label>
                                        <div class="input-group"><span class="input-group-text"
                                                id="basic-addon2"><svg class="icon icon-xs text-gray-600"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg> </span>
                                            <input type="password" placeholder="Password" value="admin" name="password"
                                                class="form-control" id="password" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-top mb-4">
                                        <div class="form-check"><input class="form-check-input" type="checkbox" value
                                                id="remember"> <label class="form-check-label mb-0"
                                                for="remember">Remember me</label></div>
                                        <div>
                                            <a href="forgot-password.html" class="small text-right">Lost
                                                password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid"><button type="submit" class="btn btn-gray-800">Sign in</button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="{{ asset('dashboard') }}/vendor/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/countup.js/dist/countUp.umd.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/simple-datatables/dist/umd/simple-datatables.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="../../{{ asset('dashboard') }}/cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/fullcalendar/main.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/notyf/notyf.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/leaflet/dist/leaflet.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/svg-pan-zoom/dist/svg-pan-zoom.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/svgmap/dist/svgMap.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendor/sortablejs/Sortable.min.js"></script>
    <script async defer="defer" src="../../../../buttons.github.io/buttons.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/volt.js"></script>
    <script>
        (function() {
            var js =
                "window['__CF$cv$params']={r:'864502b05da10db3',t:'MTcxMDQyNzEzOC43MTUwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../{{ asset('dashboard') }}/cdn-cgi/challenge-platform/h/g/scripts/jsd/5b600c458061/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);

            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }
            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function() {};
                document.onreadystatechange = function(e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"864502b05da10db3","version":"2024.3.0","r":1,"token":"3a2c60bab7654724a0f7e5946db4ea5a","b":1}'
        crossorigin="anonymous"></script>
</body>
<!-- Mirrored from demo.themesberg.com/volt-pro/pages/examples/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Mar 2024 14:39:13 GMT -->

</html>
