@extends('dashboard.layouts.app')
@section('content')
    <div class="py-4">
        <h1>Settings</h1>
    </div>
    <form action="{{ route('dashboard.settings.update') }}" class="form" id="form" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{-- @dd($errors) --}}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="col-8 mx-auto">
                        <div class="alert alert-danger">{{ $error }}</div>
                    </div>
                @endforeach
            @endif
            <div class="col-8 mx-auto">
                <div class="card card-body border-0 shadow mb-4">
                    <div class="mb-3">
                        <label for="site_title" class="form-label">Site Title</label>
                        <input type="text" class="form-control" id="site_title" name="site_title"
                            placeholder="Enter Title" value="{{ $settings->site_title }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Site Description</label>
                        <textarea name="description" class="form-control" id="description">{{ $settings->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="keywords" class="form-label">Site Keywords</label>
                        <textarea name="keywords" class="form-control" id="keywords">{{ $settings->keywords }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="save_local" class="form-label">Save Books In Local</label>
                        <select name="save_local" id="save_local" class="form-select">
                            <option value="1" {{ $settings->save_local == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $settings->save_local == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="header_adss" class="form-label">Header Ads</label>
                        <textarea name="header_ads" class="form-control" id="header_adss">{{ $settings->header_ads }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="footer_adss" class="form-label">Footer Ads</label>
                        <textarea name="footer_ads" class="form-control" id="footer_adss">{{ $settings->footer_ads }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="single_adss" class="form-label">Single Ads</label>
                        <textarea name="single_ads" class="form-control" id="single_adss">{{ $settings->single_ads }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="site_logo" class="form-label">Site Logo</label>
                        <div class="img-input d-flex gap-2">
                            @if ($settings->site_logo)
                                <img src="{{ env('APP_URL') . '/storage/' . $settings->site_logo }}" alt=""
                                    width="200" height="45">
                            @endif
                            <input type="file" name="site_logo" class="form-control" id="site_logo">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="site_favicon" class="form-label">Site Favicon</label>
                        <div class="img-input d-flex gap-2">
                            @if ($settings->site_favicon)
                                <img src="{{ env('APP_URL') . '/storage/' . $settings->site_favicon }}" alt=""
                                    width="200" height="45">
                            @endif
                            <input type="file" name="site_favicon" class="form-control" id="site_favicon">
                        </div>
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
