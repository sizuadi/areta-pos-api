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
                    <h5 class="card-title mb-0">Tambah produk</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="post" id="form-create">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label font-weight-normal">Nama Produk <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Produk" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label font-weight-normal">Harga <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Harga" value="{{ old('price') }}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label font-weight-normal">Deskripsi <span class="text-danger">*</span></label>
                            <div class="col-sm-10 summernote-column">
                                <textarea type="text" class="summernote form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label font-weight-normal">Kategori Produk <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control select2 @error('category_id') is-invalid @enderror" id="category_id" name="category_id" style="width: 100%;">
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : null}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div id="category_id-error-placement"></div>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="offset-2 col-10">
                                <button class="btn btn-primary" type="submit">Simpan</button>
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
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
        });

        $('.select2').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih kategori',
        });
    });
</script>
@endsection
