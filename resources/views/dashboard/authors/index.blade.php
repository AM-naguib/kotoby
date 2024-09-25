@extends('dashboard.layouts.app')
@section('dashboard', 'show')
@section('content')


    <div class="py-4">
        <div class="dropdown py-3">
            <button class="btn btn-gray-800" onclick="showModal('create')" type="button">Create Author</button>
        </div>
        <h1>All Authors</h1>

    </div>
    <div class="row justify-content-lg-center">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                            @forelse ($authors as $author)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->slug }}</td>

                                    <td class="d-flex gap-3">
                                        <button class="btn btn-primary"
                                            onclick="showModal('edit', {{ $author->id }}, '{{ $author->name }}')">Edit</button>
                                    <button class="btn btn-danger" onclick="deleteItem({{ $author->id }})">Delete</button>
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

    <div class="modal fade" id="modal-default" tabindex="-1" aria-labelledby="modal-default" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h6 modal-title" id="modal-title-default"></h2><button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">

                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        function showModal(type, id = null, name = null) {
            if (type == 'create') {
                $("#modal-title-default").text("Create Author");
                let route = "{{ route('dashboard.authors.store') }}";
                $("#modalBody").html(modalHtml(route, 'POST'));
            }else if (type == 'edit') {
                $("#modal-title-default").text("Edit Author");

                let route = "{{ route('dashboard.authors.update', ':id') }}".replace(':id', id);
                $("#modalBody").html(modalHtml(route, 'PUT', name));
            }
            $("#modal-default").modal("show");
        }


        function modalHtml(route, method, data = null) {

            return `    <form action="${route}" method="${method}" id="formSubmit" onsubmit="formSubmit(event,this)">
                        @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required value="${data ?? ''}">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary">Save</button>
                <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal" id="closeModal">Close</button>
            </div>
        </form>`;
        }

        function formSubmit(event, form) {
            event.preventDefault()

            $.ajax({
                type: $(form).attr('method'),
                url: $(form).attr('action'),
                data: $(form).serialize(),
                success: function(data) {
                    $("#closeModal").click();
                    Swal.fire({
                        title: "Success",
                        text: "Data has been saved",
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

        function deleteItem(id) {
            if (confirm('Are you sure?')) {
                $.ajax({
                    type: 'DELETE',
                    url: "{{ route('dashboard.authors.destroy', ':id') }}".replace(':id', id),
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
