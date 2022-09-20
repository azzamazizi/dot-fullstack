@extends('layouts.app', ['title_atas' => 'Pengguna'])

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengguna
      </h1>
    </section>

    <section class="content">
      <div class="row">

        @php
          $filter = false
        @endphp
        @if($filter == true)
        <div class="col-sm-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-search"></i> Filter</h3>
            </div>
            <form class="form-horizontal" method="get">
              <div class="box-body">
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="search_role" name="search_role" >
                      <option value="">-- Pilih Role --</option>
                      @foreach($showarr_role as $key => $value)
                        <option value="{{ $key }}" {{ Request::query('search_role') == $key ? 'selected':null }} >{{ $value }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <button type="submit" class="btn btn-warning btn-sm" title="Filter"><i class="fa fa-search"></i> </button>
                  <a href="{{ url('user') }}" type="button" class="btn btn-primary btn-sm" title="Reset Filter"><i class="fa fa-refresh"></i> </a>

                </div>
              </div>
            </form>
          </div>
        </div>
        @endif

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
                <a href="{{ url('user/create') }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data</a>
              </div>
            </div>
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th style="width: 10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $key => $user)
                  <tr>
                    <td style="text-align: center;">{{ $key+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                      <form method="post" action="{{ url('/user/' . $user->id) }}">
                        @csrf
                        @method('delete')
                          <a href="{{ url('user/edit/' . $user->id) }}" type="button" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
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