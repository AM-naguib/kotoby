@extends('dashboard.layouts.app')
@section('content')
    <div class="py-4">
        <h1>Create Book</h1>
    </div>
    <form action="{{ route('dashboard.books.store') }}" class="form" id="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card card-body border-0 shadow mb-4">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="section">Select Section:</label>
                        <select id="section" name="section_name" multiple>
                            @forelse ($sections as $section)
                                <option value="{{ $section->name }}">{{ $section->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="author">Select Author:</label>
                        <select id="author" name="author_name" multiple>
                            @forelse ($authors as $author)
                                <option value="{{ $author->name }}">{{ $author->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_pages" class="form-label">No. Pages</label>
                        <input type="number" class="form-control" id="no_pages" name="no_pages" placeholder="Enter No. Pages"
                            value="{{ old('no_pages') }}">
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card card-body border-0 shadow mb-4">
                    <div class="mb-3 d-flex align-items-center  border-bottom py-2">
                        <div class="upload w-90">
                            <label for="cover" class="form-label">Cover</label>
                            <input type="file" class="form-control" id="cover" name="image_url">
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" class="form-control" id="size" name="size" placeholder="Enter Size"
                            value="{{ old('size') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Lang" class="form-label">Lang</label>
                        <input type="text" class="form-control" id="Lang" name="lang" placeholder="Enter Lang"
                            value="{{ old('lang') }}">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3 col-5 mx-auto">
                    <button class="btn btn-primary w-100">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
    <script>
        $(function() {
            $('#section').selectize({
                create: true,
                sortField: 'text', 
                placeholder: 'Select a Section...',
                maxItems: 1
            });
            $('#author').selectize({
                create: true,
                sortField: 'text', 
                placeholder: 'Select a Author...',
                maxItems: 1
            });
        });
    </script>

@endsection
