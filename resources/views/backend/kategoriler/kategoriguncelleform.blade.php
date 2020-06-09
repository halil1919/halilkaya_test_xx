@extends('backend')
@section('title')
    title
@endsection

@push('customCss')

@endpush

@section('breadcrumbs')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Kategori Listesi</li>
            <li class="breadcrumb-item active">Kategori Güncelle</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Kategori Düzenleme Formu</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('.admin.kategoriler.kategoriekle') }}" method="POST"  enctype="multipart/form-data" role="form">
                {{ csrf_field() }}
                <div class="card-body">
                    @include('backend.include.validateerrors')
                    <div class="form-group">
                        <label>Select</label>
                        <select name="parent_id"  class="form-control">
                            @foreach($mainkategoriList as $key)
                            <option @if($key->id==$id) selected @endif value="{{ $key->id }}">{{ $key->kategori_ad }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori İsmi</label>
                        <input type="text" value="{{ $gelenkategoribul->kategori_ad }}" name="kategori_ad" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputFile">Kategori Resmi</label>

                        <img src="">

                        <div class="input-group">
                            <div class="custom-file">
                                <input name="kategori_resim" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@push('customJs')

@endpush