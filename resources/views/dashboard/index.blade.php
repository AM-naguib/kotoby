@extends('dashboard.layouts.app')
@section('dashboard', 'show')
@section('content')


    <div class="row mt-5">

        <div class="col-6 mb-4">
            <a href="{{ route('dashboard.sections.index') }}">

                <div class="card border-0 shadow">
                    <div class="card-body text-center">
                        <h4 class="fs-3">Sections</h4>
                        <p class="fs-3">{{ App\Models\Section::count() }}</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6 mb-4">
            <a href="{{ route('dashboard.authors.index') }}">
                <div class="card border-0 shadow">
                    <div class="card-body text-center">
                        <h4 class="fs-3">Authors</h4>
                        <p class="fs-3">{{ App\Models\Author::count() }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 mb-4">
            <a href="{{ route('dashboard.books.index') }}">

                <div class="card border-0 shadow">
                    <div class="card-body text-center">
                        <h4 class="fs-3">Books</h4>
                        <p class="fs-3">{{ App\Models\Book::count() }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 mb-4">
            <a href="{{ route('dashboard.sections.index') }}">

                <div class="card border-0 shadow">
                    <div class="card-body text-center">
                        <h4 class="fs-3">Reviews</h4>
                        <p class="fs-3">{{ App\Models\Review::count() }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 mb-4">

                <div class="card border-0 shadow">
                    <div class="card-body text-center">
                        <h4 class="fs-3">Users</h4>
                        <p class="fs-3">{{ App\Models\User::count() }}</p>
                    </div>
                </div>
        </div>



    </div>


@endsection
