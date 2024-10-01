@extends('front.layouts.app')
@section('title', "كتبي ! - قراءة كتاب $book->title أون لاين")
@section('description', $book->description)
@section('keywords', $book->htmlKeywords())

@section("meta")
<meta name="og:description" content="{{ $book->description }}">
<meta name="og:image" content="{{ env('APP_URL') . '/storage/' . $book->image_url }}">
<meta property="og:title" content="كتبي ! - قراءة كتاب {{ $book->title }} أون لاين">
<meta property="og:description" content="{{ $book->description }}">
<meta property="og:url" content="{{ route('front.single', $book->slug) }}">
@endsection
@section('schema')
<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Book",
      "name": "{{ $book->title }}",
      "author": {
        "@type": "Person",
        "name": "{{ $book->author->name }}",
        "url": "{{ route('front.page', ['type' => 'author', 'slug' => $book->author->slug]) }}"
      },
      "bookFormat": "http://schema.org/Paperback",
      "description": "{{ $book->description }}",
      "url": "{{ route('front.single', $book->slug) }}",
      "numberOfPages": "{{ $book->numberOfPages }}",
      "image": "{{ env('APP_URL') . '/storage/' . $book->image_url }}",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.7",
        "bestRating": "5",
        "worstRating": "1",
        "ratingCount": "3"
      }
    }
</script>


@endsection
@section('content')
    <style>
        .starability-result {
            font-size: 16px;
            line-height: 1;
            display: inline-block;
            margin: 0;
        }
    </style>
    <article>
        <!-- Article Title Start -->
        <div class="article-title">
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
                <div class="title">
                    <h1>تحميل {{ $book->title }}</h1>
                </div>

            </div>
        </div>
        <!-- Article Title End -->
        <div class="article-body">
            <div class="container">
                <div class="body-head">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center col-lg-3 mb-lg-0 mb-3">
                            <div class="book-img">
                                <img src="{{ env('APP_URL') . '/storage/' . $book->image_url }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <div class="book-info ">
                                <div class="book-name mb-3 mb-sm-1">
                                    <h2>{{ $book->title }}</h2>
                                </div>
                                <div class="book-p">
                                    <p class="mb-1"><a
                                            href="{{ route('front.page', ['type' => 'author', 'slug' => $book->author->slug]) }}">{{ $book->author->name }}</a>
                                    </p>
                                </div>
                                <div class="book-p">
                                    <p><a
                                            href="{{ route('front.page', ['type' => 'section', 'slug' => $book->section->slug]) }}">{{ $book->section->name }}</a>
                                    </p>
                                </div>
                                <ul class="all-details d-flex text-center p-0">
                                    <li>
                                        <p class="mb-1">الصفحات</p>
                                        <p class="mb-1">{{ $book->no_pages }}</p>
                                    </li>
                                    <li>
                                        <p class="mb-1">اللغة</p>
                                        <p class="mb-1">{{ $book->lang }}</p>
                                    </li>
                                    <li>
                                        <p class="mb-1">الحجم</p>
                                        <p class="mb-1">{{ $book->size }}</p>
                                    </li>
                                    {{-- <li>
                                        <p class="mb-1">التحميلات</p>
                                        <p class="mb-1">75 619</p>
                                    </li> --}}
                                    <li>
                                        <p class="mb-1">نوع الملف</p>
                                        <p class="mb-1">PDF</p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-disc mt-3">
                    <h3>لمحة عن الكتاب</h3>
                    <p>{{ $book->description }}</p>
                    <div class="buttons d-flex justify-content-center gap-3">
                        <a class="body-btn text-white" href="{{ route('front.dowen.book', $book->slug) }}"><i
                                class="fa-solid fa-download"></i>
                            <span>تحميل الكتاب</span></a>
                        <a class="body-btn red text-white" href="{{ route('front.read.book', $book->slug) }}"><i
                                class="fa-solid fa-book-open"></i> <span>تصفح
                                الكتاب</span></a>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <div class="container my-2">
        <div class="row">
            <div class="col-12 border-bottom pb-3">
                <h4>{{ $book->reviews()->where('status', 1)->count() }}
                    مراجعات</h4>
            </div>
            <div class="col-12 my-3">
                <button class="btn text-white px-4" style="background-color: #f65656;border-radius: 10px;"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">اضف
                    مراجعة</button>
            </div>
            @php
                $reviews = $book->reviews()->where('status', 1);

                if (auth()->check() && auth()->user()->type == 'admin') {
                    $reviews = $book->reviews();
                }

                $reviews = $reviews->get();
            @endphp

            @forelse ($reviews as $review)
                <div class="col-12 my-4 border shadow p-4" style="border-radius: 22px;" id="rev_{{ $review->id }}">
                    <div class="comment-head d-flex align-items-center gap-2">
                        <div class="image-user">
                            <img data-src="{{ asset('front/img/avatar.svg') }}" alt="" class="rounded-circle"
                                width="50" height="50" src="{{ asset('front/img/avatar.svg') }}">
                        </div>
                        <div class="name-user">
                            @php
                                $diff = $review->created_at->diffForHumans();
                                $arabicDiff = str_replace(
                                    [
                                        'seconds',
                                        'second',
                                        'minutes',
                                        'minute',
                                        'hours',
                                        'hour',
                                        'days',
                                        'day',
                                        'weeks',
                                        'week',
                                        'months',
                                        'month',
                                        'years',
                                        'year',
                                        'ago',
                                    ],
                                    [
                                        'ثواني',
                                        'ثانية',
                                        'دقائق',
                                        'دقيقة',
                                        'ساعات',
                                        'ساعة',
                                        'أيام',
                                        'يوم',
                                        'أسابيع',
                                        'أسبوع',
                                        'أشهر',
                                        'شهر',
                                        'سنوات',
                                        'سنة',
                                        '',
                                    ],
                                    $diff,
                                );

                                $arabicDiff = 'منذ ' . $arabicDiff;
                            @endphp
                            <h6 class="mb-0">{{ $review->user->name }}</h6>
                            <p class="mb-0">{{ $arabicDiff }}</p>
                        </div>
                        <div class="rating-user">
                            <div class="starability-result" data-rating="{{ $review->rating }}"></div>
                        </div>
                    </div>
                    <div class="comment-body">
                        <p class="px-5">{{ $review->comment }}
                        </p>
                    </div>
                </div>

            @empty
            @endforelse
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">أضف مراجعة</h5>
                </div>
                <form action="{{ route('front.review', $book->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <fieldset class="starability-basic">
                            <input type="radio" id="rate5" name="rating" value="5" />
                            <label for="rate5" title="5 stars">5 stars</label>

                            <input type="radio" id="rate4" name="rating" value="4" />
                            <label for="rate4" title="4 stars">4 stars</label>

                            <input type="radio" id="rate3" name="rating" value="3" />
                            <label for="rate3" title="3 stars">3 stars</label>

                            <input type="radio" id="rate2" name="rating" value="2" />
                            <label for="rate2" title="2 stars">2 stars</label>

                            <input type="radio" id="rate1" name="rating" value="1" />
                            <label for="rate1" title="1 star">1 star</label>
                        </fieldset>

                        <textarea name="comment" class="form-control" placeholder="أضف مراجعتك هنا"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">غلق</button>
                        <button class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Book Title End -->


    <script>
        // الحصول على الـ ID من الـ URL
        const urlParams = new URLSearchParams(window.location.hash);
        const idToHighlight = window.location.hash;


        if (idToHighlight) {
            console.log(idToHighlight);

            const element = document.querySelector(idToHighlight);
            if (element) {
                element.classList.add('bg-success', 'text-white');
            }
        }
    </script>
@endsection
