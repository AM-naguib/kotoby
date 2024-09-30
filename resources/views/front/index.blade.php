@extends('front.layouts.app')
@section('content')
    <!-- search-box start -->
    <section class="search-box d-flex align-items-center">
        <div class="elementor-shape elementor-shape-top">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2052.95 43.45">
                <path class="elementor-shape-fill"
                    d="M0-.17V31.46c7.49,10.25,21.84,9.66,30.41,9.4,31.56-1,63.09-4.1,94.63-4,54.31.2,108.62,2.72,162.93,3.27,27.41.27,54.84-2.14,82.26-2.42,15.53-.16,31.08,1.55,46.62,2.41l-.11.8h59.91c4.93-.05,10.11,2.75,15,2.32C516,41.09,540.36,38,564.75,35.48c5.58-.57,11.27,0,16.9,0l-.39,0,51-5.08L631.92,28,644,34.77c7.94-2.13,13.95-4.45,20.16-5.26,13.64-1.79,27.36-3,41.08-4.09,8.85-.67,17.76-.66,26.65-.81,2.93-.05,6,1,8.78.39,10.44-2.21,20.78-4.88,31.38-7.43l-2.4,7.89c7.29,0,13.82,0,20.36,0,4.48,0,13.54,4.77,13.43.3l-.31-.22c28.14-5.92,56.14.48,84.21.77,25.85.27,51.73.29,77.59-.54.33-2.2,8.81-23.65,9.13-25.85ZM356.8,33.67l-.68-1-2.76,2.06.62.87Zm-9.44,2.27,0,.51.58-.22Z">
                </path>
                <path class="elementor-shape-fill"
                    d="M962.93-.07V25.79c12.16,0,23-1.15,35.11-1.22,52.87-.29,105.76-1.67,158.6-.65,62,1.2,124,5,186.05,6.63,29.76.8,59.57-.74,89.36-1,9.9-.09,19.82.89,29.71.67,36.23-.81,72.45-2.35,108.68-2.69,14.61-.14,29.25,3.15,43.86,3,21.7-.23,43.45-1.45,65.05-3.53,25.5-2.45,50.87-6.25,66.91-8.27L1842,27.38,1855.49,18l9.66,6.34c57.11,2.08,130.19,4.08,187.77-3.82V-.17Z">
                </path>
            </svg>
        </div>
        <div class="elementor-shape elementor-shape-bottom" data-negative="false">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2052.95 43.45">
                <path class="elementor-shape-fill"
                    d="M0-.17V31.46c7.49,10.25,21.84,9.66,30.41,9.4,31.56-1,63.09-4.1,94.63-4,54.31.2,108.62,2.72,162.93,3.27,27.41.27,54.84-2.14,82.26-2.42,15.53-.16,31.08,1.55,46.62,2.41l-.11.8h59.91c4.93-.05,10.11,2.75,15,2.32C516,41.09,540.36,38,564.75,35.48c5.58-.57,11.27,0,16.9,0l-.39,0,51-5.08L631.92,28,644,34.77c7.94-2.13,13.95-4.45,20.16-5.26,13.64-1.79,27.36-3,41.08-4.09,8.85-.67,17.76-.66,26.65-.81,2.93-.05,6,1,8.78.39,10.44-2.21,20.78-4.88,31.38-7.43l-2.4,7.89c7.29,0,13.82,0,20.36,0,4.48,0,13.54,4.77,13.43.3l-.31-.22c28.14-5.92,56.14.48,84.21.77,25.85.27,51.73.29,77.59-.54.33-2.2,8.81-23.65,9.13-25.85ZM356.8,33.67l-.68-1-2.76,2.06.62.87Zm-9.44,2.27,0,.51.58-.22Z">
                </path>
                <path class="elementor-shape-fill"
                    d="M962.93-.07V25.79c12.16,0,23-1.15,35.11-1.22,52.87-.29,105.76-1.67,158.6-.65,62,1.2,124,5,186.05,6.63,29.76.8,59.57-.74,89.36-1,9.9-.09,19.82.89,29.71.67,36.23-.81,72.45-2.35,108.68-2.69,14.61-.14,29.25,3.15,43.86,3,21.7-.23,43.45-1.45,65.05-3.53,25.5-2.45,50.87-6.25,66.91-8.27L1842,27.38,1855.49,18l9.66,6.34c57.11,2.08,130.19,4.08,187.77-3.82V-.17Z">
                </path>
            </svg>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-sec d-flex flex-column align-items-center">
                        <div class="sec-title">
                            <h1>كتابي .. سافر بكتبك إلى عالم آخر 💛💛</h1>
                        </div>
                        <style>
                            .btn-search{
                                position: absolute;
                                left: 5px;
                                top: 50%;
                                transform: translateY(-50%);
                                border-radius:22px;
                            }
                        </style>
                        <div class="search-input">
                            <form action="{{ route('front.search') }}" method="get">
                                <button class="btn btn-search btn-danger text-white">بحث</button>
                                <input type="search" placeholder="ابحث عن كتاب أو مؤلف أو قسم كتاب" name="search">
                                <span class="icon">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                                        xml:space="preserve" width="20" height="20">
                                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                                                s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                                                c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
                                                s-17-7.626-17-17S14.61,6,23.984,6z"></path>
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
                                    </svg>
                                </span>
                            </form>
                        </div>
                        <div class="sec-foot">
                            <h3>اكتشف عالم الكتب 😍</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search-box end -->

    <!-- cards start -->
    <section class="cards">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h2 class="text-center">تصفح جميع الكتب</h2>
                </div>
                @forelse ($books as $book)
                    <div class="col-lg-2 col-xl-2 col-md-4 col-6" id="bo_{{ $book->id }}">
                        <div class="card shadow mb-3" style="width: 100%;">
                            <div class="card-img">
                                <a href="{{ route('front.single', $book->slug) }}"><img loading="lazy"
                                        src="{{ env('APP_URL') . '/storage/' . $book->image_url }}" class="card-img-top"
                                        alt="..."></a>
                            </div>
                            <div class="card-body text-center">
                                <h3 class="card-text">
                                    <a href="{{ route('front.single', $book->slug) }}">
                                        {{ $book->title }}
                                    </a>
                                </h3>
                                <p class="author-label">
                                    <a
                                        href="{{ route('front.page', ['type' => 'author', 'slug' => $book->author->slug]) }}">{{ $book->author->name }}</a>
                                    @if (!$book->isFavorite())
                                        <i class="fa-regular fa-bookmark mx-1 text-danger fs-5" style="cursor:pointer"
                                            onclick="addFavorite({{ $book->id }})"></i>
                                    @endif
                                </p>
                                <p class="section-label">
                                    <a
                                        href="{{ route('front.page', ['type' => 'section', 'slug' => $book->section->slug]) }}">{{ $book->section->name }}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                @empty
                @endforelse

            </div>
        </div>
    </section>
    <!-- cards end -->

    <script>
        function addFavorite(bookId) {
            $.ajax({
                url: "{{ route('profile.add.favourite', ':id') }}".replace(':id', bookId),
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    $("#bo_" + bookId).load(window.location.href + " #bo_" + bookId + " > *");
                }
            });
        }
    </script>
@endsection
