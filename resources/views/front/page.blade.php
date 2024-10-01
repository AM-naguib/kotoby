@extends('front.layouts.app')
@section('title', $data->name)
@section('description', getSetting()->description)
@section('keywords', getSetting()->keywords)

@section('schema')
    @if ($type == 'author')
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Person",
          "name": "{{ $data->name }}",
          "url": "{{ route('front.page', ['type' => 'author', 'slug' => $data->slug]) }}",
          "description": "وصف المؤلف {{ $data->name }}",
          "image": "https://www.kotobati.com/themes/custom/ktobati/assets/images/avatar.svg"
        }
        </script>
    @elseif ($type == 'section')
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "ItemList",
          "itemListElement": [
            @foreach ($books->take(10) as $book) // عرض 10 كتب فقط
            {
              "@type": "Book",
              "name": "{{ $book->title }}",
              "url": "{{ route('front.single', $book->slug) }}",
              "image": "{{ env('APP_URL') . '/storage/' . $book->image_url }}",
              "author": {
                "@type": "Person",
                "name": "{{ $book->author->name }}"
              },
              "description": "{{ $book->description }}"
            }@if (!$loop->last),@endif
            @endforeach
        ]
        }
        </script>
    @endif
@endsection

@section('content')
    <!-- cards start -->
    <section class="cards">
        <div class="container">
            <div class="row">
                <div class="col-12 my-4">
                    <h2 class="text-center">{{ $data->name }}</h2>
                </div>
                @forelse ($books as $book)
                    <div class="col-lg-2 col-xl-2 col-md-4 col-6">
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
                                    <a href="{{ route('front.single', $book->slug) }}">{{ $book->author->name }}</a>
                                </p>
                                <p class="section-label">
                                    <a href="{{ route('front.single', $book->slug) }}">{{ $book->section->name }}</a>
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
    <div class="pagnation col-8 my-4 text-center mx-auto">
        {{ $books->links() }}
    </div>
@endsection
