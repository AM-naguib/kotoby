@extends('front.layouts.app')
@section("title", "مراجعاتي")
@section("description", getSetting()->description)
@section("keywords", getSetting()->keywords)
@section('content')
    <div class="container">
        <div class="row border-bottom mt-5">
            <div class="col-12">
                <h5>الصفحة الشخصية</h5>
            </div>

        </div>
        <div class="row gap-5 mt-4">
            @include('front.user.inc.side')


            <div class="col-md-8 border bg-white shadow-sm" id="allReviews">
                <div class="col-12 p-3 border-bottom">
                    <h5>مراجعاتي ({{ $user->reviews->count() }})</h5>
                </div>
                <div class="row" >
                    @forelse ($user->reviews as $review)

                        <div class="col-12 d-flex justify-content-between align-items-center p-3">

                            <div class="book-data d-flex gap-4">
                                <div class="book-img">
                                    <img src="{{ env('APP_URL') . '/storage/' . $review->book->image_url }}" alt=""
                                        width="80" height="100">
                                </div>
                                <div class="book-details">
                                    <div class="book-title">
                                        <h5>{{ $review->book->title }}</h5>
                                    </div>
                                    <div class="book-auth-section d-flex gap-2">
                                        <a class="text-primary"
                                            href="{{ route('front.page', ['type' => 'author', 'slug' => $review->book->author->slug]) }}">{{ $review->book->author->name }}</a>
                                        - <a class="text-primary"
                                            href="{{ route('front.page', ['type' => 'section', 'slug' => $review->book->section->slug]) }}">{{ $review->book->section->name }}</a>


                                    </div>
                                    <div class="comment mt-3">
                                        <p>{{ $review->comment }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="actions">
                                <button class="btn btn-danger" onclick="deleteReview({{ $review->id }})">حذف</button>
                            </div>

                        </div>
                    @empty
                    @endforelse
                </div>

            </div>

        </div>

    </div>

    <script>
        function deleteReview(id) {
            $.ajax({
                type: 'DELETE',
                url: "{{ route('profile.delete.review', ':id') }}".replace(':id', id),
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        icon: 'success',
                        title: 'تم الحذف بنجاح'
                    })

                    $("#allReviews").load(window.location.href + " #allReviews > *");
                },
                error: function(data) {
                    Swal.fire({
                        title: "Error",
                        text: "Something went wrong",
                        icon: "error"
                    });
                }
            })
        }
    </script>
@endsection
