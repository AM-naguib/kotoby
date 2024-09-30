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


            <div class="col-md-8 border bg-white shadow-sm" id="allReviews">
                <div class="col-12 p-3 border-bottom">
                    <h5>مكتبتي ({{ $user->favorites->count() }})</h5>
                </div>
                <div class="row">
                    @forelse ($user->favorites as $favorite)
                        <div class="col-12 d-flex justify-content-between align-items-center p-3">


                            <div class="book-data d-flex gap-4">
                                <a href="{{ route('front.single', $favorite->book->slug) }}" class="d-block">
                                    <div class="book-img">
                                        <img src="{{ env('APP_URL') . '/storage/' . $favorite->book->image_url }}"
                                            alt="" width="80" height="100">
                                    </div>
                                    <div class="book-details">
                                        <div class="book-title">
                                            <h5>{{ $favorite->book->title }}</h5>
                                        </div>
                                        <div class="book-auth-section d-flex gap-2">
                                            <a class="text-primary"
                                                href="{{ route('front.page', ['type' => 'author', 'slug' => $favorite->book->author->slug]) }}">{{ $favorite->book->author->name }}</a>
                                            - <a class="text-primary"
                                                href="{{ route('front.page', ['type' => 'section', 'slug' => $favorite->book->section->slug]) }}">{{ $favorite->book->section->name }}</a>


                                        </div>
                                        <div class="comment mt-3">
                                            <p>{{ $favorite->comment }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="actions">
                                <button class="btn btn-danger"
                                    onclick="deleteFavorite({{ $favorite->book->id }})">حذف</button>
                            </div>

                        </div>
                    @empty
                    @endforelse
                </div>

            </div>

        </div>

    </div>

    <script>
        function deleteFavorite(id) {
            $.ajax({
                type: 'DELETE',
                url: "{{ route('profile.delete.favourite', ':id') }}".replace(':id', id),
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
