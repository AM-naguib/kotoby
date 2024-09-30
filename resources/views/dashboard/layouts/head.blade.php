<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Volt - Premium Bootstrap 5 Dashboard</title>
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
<meta name="title" content="Volt - Premium Bootstrap 5 Dashboard">
<meta name="author" content="Themesberg">
<meta name="description"
    content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard">
<link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">
<meta property="og:type" content="website">
<meta property="og:url" content="https://demo.themesberg.com/volt-pro">
<meta property="og:title" content="Volt - Premium Bootstrap 5 Dashboard">
<meta property="og:description"
    content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="og:image"
    content="../../../../themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
<meta property="twitter:title" content="Volt - Premium Bootstrap 5 Dashboard">
<meta property="twitter:description"
    content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
<meta property="twitter:image"
    content="../../../../themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('dashboard/assets') }}/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32"
    href="{{ asset('dashboard/assets') }}/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16"
    href="{{ asset('dashboard/assets') }}/img/favicon/favicon-16x16.png">
<link rel="mask-icon" href="https://demo.themesberg.com/volt-pro/assets/img/favicon/safari-pinned-tab.svg"
    color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('dashboard/vendor') }}/notyf/notyf.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('dashboard/vendor') }}/fullcalendar/main.min.css" rel="stylesheet">
<link type="text/css" href="{{ asset('dashboard/vendor') }}/apexcharts/dist/apexcharts.css" rel="stylesheet">
<link type="text/css" href="{{ asset('dashboard/vendor') }}/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



<link type="text/css" href="{{ asset('dashboard/vendor') }}/choices.js/public/assets/styles/choices.min.css"
    rel="stylesheet">
<link type="text/css" href="{{ asset('dashboard/vendor') }}/leaflet/dist/leaflet.css" rel="stylesheet">
<link type="text/css" href="{{ asset('dashboard/css') }}/volt.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
    integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
    integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- pusher js -->
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>


    var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('new_comment_review');
    channel.bind('App\\Events\\NewCommentReviewEvent', function(data) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "onclick": function() {
            window.location.href = "{{route('dashboard.reviews.index')}}?search=" + data.review.id;
        }
    };
    $("#notificationDropdownsss").load(location.href + " #notificationDropdownsss > *");

    toastr.success('Click to see', 'New Review From ' + data.review.user.username);
});
</script>
