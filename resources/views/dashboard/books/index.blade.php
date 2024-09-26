@extends('dashboard.layouts.app')
@section('dashboard', 'show')
@section('content')


    <div class="py-4">
        <div class="dropdown py-3">
            <a href="{{route("dashboard.books.create")}}" class="btn btn-primary">Create Book</a>
        </div>
        <h1>All Books</h1>

    </div>
    <div class="row justify-content-lg-center">
        <div class="col-12 mb-4">
            <div class="col-12">
            @include('dashboard.inc.message')

        </div>
            <div class="card">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                            @forelse ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author->name ?? "" }}</td>
                                    <td>{{ $book->section->name ?? "" }}</td>

                                    <td class="d-flex gap-3">
                                        <a href="{{ route('dashboard.books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                                        <button class="btn btn-danger"
                                            onclick="deleteItem({{ $book->id }})">Delete</button>
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
    function deleteItem(id) {
        if (confirm('Are you sure?')) {
            $.ajax({
                type: 'DELETE',
                url: "{{ route('dashboard.books.destroy', ':id') }}".replace(':id', id),
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    Swal.fire({
                        title: "Success",
                        text: "Item has been deleted",
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
