@extends('layouts.dashboard_template')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title ?? "Page Title" }}
        <small>{{ $page_description ?? '' }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.profil')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('data.data-umum.index')}}">Data Umum</a></li>
        <li class="active">{{$page_title}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {{-- <div class="box-header with-border">
                     <h3 class="box-title">Aksi</h3>
                 </div>--}}
                <!-- /.box-header -->

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                    @endif

                            <!-- form start -->
                    {!!  Form::model($data_umum, [ 'route' => ['data.data-umum.update', $data_umum->id], 'method' => 'put','id' => 'form-event', 'class' => 'form-horizontal form-label-left' ] ) !!}

                    <div class="box-body">


                        @include( 'partials.flash_message' )
                        @include('data.data_umum.form_edit')

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-right">
                            <div class="control-group">
                                <a href="{{ route('data.data-umum.index') }}">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Batal</button>
                                </a>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection

@include(('partials.asset_select2'))
@push('scripts')
<script>
    $(function () {
        // on page loaded
        updateValueLuasWilayah();

        $('#provinsi_id').select2({
            placeholder: "Pilih Provinsi",
            allowClear: true
        });

        $('#kabupaten_id').select2({
            placeholder: "Pilih Kabupaten",
            allowClear: true
        });

        $('#kecamatan_id').select2({
            placeholder: "Pilih Kecamatan",
            allowClear: true
        });

        $(".sumber_luas_wilayah").change(function(){
            updateValueLuasWilayah();
        }); 
    })

    function updateValueLuasWilayah(){
        var sumberLuasWilayah = $(".sumber_luas_wilayah").val();
        $.ajax({
            url: "/data/data-umum/getdataajax",
            type: "get",
            success: function(response) {
                if(sumberLuasWilayah==1)
                {
                    $(".luas_wilayah").val(response.data.luas_wilayah);
                    $(".luas_wilayah").attr('readonly', false);
                }else{
                    $(".luas_wilayah").val(response.data.luas_wilayah_dari_data_desa);
                    $(".luas_wilayah").attr('readonly', true); 
                }
            },
            error: function(xhr) {
                console.log('terjadi kesalahan');
            }
        });
    }
</script>
@endpush