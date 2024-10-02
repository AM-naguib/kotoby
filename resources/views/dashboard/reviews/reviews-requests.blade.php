@extends('dashboard.layouts.app')
@section('dashboard', 'show')
@section('content')


    <div class="py-4">

        <h1>Reviews Requests</h1>

    </div>
    <div class="row justify-content-lg-center">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Comment</th>
                                <th>Book Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody" id="n_r_tbody">

                            @forelse ($reviews as $review)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $review->user->username }}</td>
                                    <td>{{ $review->comment }}</td>
                                    <td>{{ $review->book->title }}</td>

                                    <td class="d-flex gap-3">
                                        <button class="btn btn-success text-white"
                                            onclick="changeStatus('{{ route('dashboard.reviews.approve', $review->id) }}','post')">Approve</button>
                                        <button class="btn btn-danger"
                                            onclick="changeStatus('{{ route('dashboard.reviews.destroy', $review->id) }}','delete')">Delete</button>
                                        <a class="btn btn-primary" target="_blank"
                                            href="{{ route('front.single', $review->book->slug) }}#rev_{{ $review->id }}">Show</a>
                                    </td>

                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <script>
        function changeStatus(route, method) {
            if (confirm('Are you sure?')) {
                $.ajax({
                    type: method,
                    url: route,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        Swal.fire({
                            title: "Success",
                            icon: "success"
                        });
                        $("#tbody").load(window.location.href + " #tbody > *");
                    },
                    error: function(data) {
                        Swal.fire({
                            title: "Error",
                            text: "Something went wrong",
                            icon: "error"
                        });
                    }
                });

            }
        }
    </script>
@endsection
