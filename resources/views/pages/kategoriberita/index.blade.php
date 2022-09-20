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
          
          <!-- alert -->
          @if(!empty(session('status')))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">&nbsp;</h3>
              <div class="pull-right">
                <a href="{{ url('/ms_kategoriberita/create') }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data</a>
              </div>
            </div>
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Nama Kategori</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kategoriberitas as $key => $value_ktg)
                  <tr>
                    <td style="text-align: center;">{{ $key+1 }}</td>
                    <td>{{ $value_ktg->namakategori }}</td>
                    <td>
                      <form method="post" action="{{ url('/ms_kategoriberita/' . $value_ktg->idkategoriberita) }}">
                        @csrf
                        @method('delete')
                          <a href="{{ url('/ms_kategoriberita/edit/' . $value_ktg->idkategoriberita) }}" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                          <button class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin untuk hapus data ini ?')" type="submit"><i class="fa fa-trash-o"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>


  </div>

@endsection