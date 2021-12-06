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
                    <h5 class="card-title mb-0">Edit produk</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.products.update', ['product' => $product]) }}" method="post" id="form-edit">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label font-weight-normal">Nama Produk <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Produk" value="{{ old('name') ?? $product->name }}">
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
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Harga" value="{{ old('price') ?? $product->price }}">
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
                                <textarea type="text" class="summernote form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') ?? $product->description }}</textarea>
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
                                    <option value="{{ $category->id }}" {{ old('category_id') ?? $product->category_id == $category->id ? 'selected' : null}}>{{ $category->name }}</option>
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

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label font-weight-normal">Nama Produk</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Produk" value="{{ old('name') ?? $product->name }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label font-weight-normal">Gambar Produk <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <small class="form-text text-muted">Gambar produk bawaan akan digunakan jika anda tidak menambahkan gambar.</small>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="offset-2 col-10">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="offset-2 col-10">
                                <button class="btn btn-primary" id="button-upload">Simpan</button>
                                <a href="{{ route('admin.products.show', ['product' => $product]) }}" class="btn btn-secondary" id="button-pass">Lewati</a>
                            </div>
                        </div> --}}

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script>
    $(document).ready(function () {
        $('#image').on('change', function () {
            $('.custom-file-label').text($(this).prop('files')[0].name);
        });

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

        $('#form-edit').on('submit', function (e) {
            e.preventDefault();

            if (!$('#image').val()) {
                $(this).unbind('submit').submit();

                return false;
            }

            $(this).unbind('submit').ajaxForm({
                url: "{{ route('api.products.update', ['product' => $product]) }}",
                beforeSend: function () {
                    $(".btn").attr("disabled", true).addClass('disabled');
                    var percentage = 0;
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentage = 25;

                    $('.progress .progress-bar').css("width", percentage +'%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    }).text(percentage + '%');
                },
                complete: function (xhr) {
                    var percentage = 100;
                    $('.progress .progress-bar').css("width", percentage+'%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    }).text(percentage + '%');

                    if (xhr.status == 200) {
                        toastr.success(xhr.responseJSON.message, 'Success');

                        setTimeout(function () {
                            location.href = "{{ route('admin.products.show', ['product' => $product->id]) }}";
                        }, 2000);
                    } else {
                        toastr.error(xhr.responseJSON.message, 'Error');

                        $('.progress .progress-bar').css("width", 0+'%', function() {
                            return $(this).attr("aria-valuenow", 0) + "%";
                        }).text(0 + '%');

                        $(".btn").attr("disabled", false).removeClass('disabled');
                    }
                }
            });
        });


    });
</script>
@endsection
