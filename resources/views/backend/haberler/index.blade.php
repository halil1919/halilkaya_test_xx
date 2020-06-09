@extends('backend')
@section('title')
    title
@endsection

@push('customCss')
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('breadcrumbs')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Kategori Listesi</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="col-lg-12">
        <h2>

            @php
                $yer = \Illuminate\Support\Facades\Request::segment(2);
             @endphp

            <div class="alert alert-dark">{{ $yer }}</div>
            <a href="{{ route('.admin.haberler.haberekleform') }}" class="btn btn-primary float-right">Haber Ekle</a>
        </h2>
    </div>
    <div class="col-lg-12">

        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Haber Başlık</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Resim</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Aktif Pasif</th>
            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">İşlem</th>
            </tr>
            </thead>
            <tbody>

            @foreach($haberler as $key)
            <tr role="row" class="odd">
                <td class="sorting_1">{{ $key->id }}</td>
                <td>{{ $key->haber_baslik }}</td>
                <td>
                    @if(!empty($key->haber_resim))
                   <img width="80" height="70" src="{{ $key->haber_resim }}">
                    @else
                        <div class="alert alert-danger">Resim Yok</div>
                    @endif
                </td>
                <td>
                    @if($key->aktif==1)
                        {{ "Aktif" }}
                    @else
                        {{ "Pasif" }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('.admin.haberler.habersil',$key->id) }}" class="btn btn-danger">Sil</a>
                    <a href="{{ route('.admin.kategoriler.kategoriduzenleform',$key->id) }}" class="btn btn-info">Düzenle</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

@push('customJs')
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }} "></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }} "></script>
    <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush