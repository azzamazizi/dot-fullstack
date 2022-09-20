@extends('layouts.app', ['title_atas' => 'Kategori Berita'])

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori Berita
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
            <form class="form-horizontal" method="post" action="{{ url('/ms_kategoriberita') }}">
              @csrf
              <input type="hidden" value="{{ isset($kategoriberitas)?$kategoriberitas->idkategoriberita:null }}" name="idkategoriberita" id="idkategoriberita">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namakategori" name="namakategori" placeholder="Nama Kategori" value="{{ isset($kategoriberitas)?$kategoriberitas->namakategori:null }}">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ url('ms_kategoriberita') }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Batal</a>
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