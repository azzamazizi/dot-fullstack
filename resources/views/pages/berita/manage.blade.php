@extends('layouts.app', ['title_atas' => 'Berita'])

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Berita
      </h1>
    </section>

    <section class="content">
      <div class="row">

        <!-- right column -->
        <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">&nbsp;</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{ url('/berita') }}">
              @csrf
              <input type="hidden" value="{{ isset($beritas)?$beritas->idberita:null }}" name="idberita" id="idberita">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="judulberita" name="judulberita" placeholder="Judul" value="{{ isset($beritas)?$beritas->judulberita:null }}" maxlength="150">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Isi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="isi" name="isi" placeholder="Isi" value="{{ isset($beritas)?$beritas->isi:null }}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Seo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="seoberita" name="seoberita" placeholder="Seo" value="{{ isset($beritas)?$beritas->seoberita:null }}" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-6">
                    <select class="form-control select2" name="kategoriberita" id="kategoriberita">
                      <option value="">-- Pilih --</option>
                      @foreach ($kategoriberitas as $value)
                        <option value="{{ $value->idkategoriberita }}" {{ isset($beritas) && $beritas->idkategoriberita == $value->idkategoriberita ? 'selected':null }}>{{ $value->namakategori }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ url('berita') }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Batal</a>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>


  </div>

@endsection