@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between d-flex align-items-center">
        <div class="col-sm-12 col-md-6 col-lg-4">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit kategori</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="post" id="form-edit">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label font-weight-normal">Nama Kategori <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Kategori" value="{{ old('name') ?? $category->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="offset-2 col-10">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\CategoryUpdateRequest', '#form-edit'); !!}
@endsection
