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

        <!-- right column -->
        <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">&nbsp;</h3>
            </div>
            <form class="form-horizontal" method="post" action="{{ url('/user') }}">
              @csrf
              <input type="hidden" value="{{ isset($user)?$user->id:null }}" name="id" id="id">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pengguna</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($user)?$user->name:null }}" placeholder="Nama Pengguna" maxlength="50">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email<br><small>untuk Login Pengguna</small> </label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" value="{{ isset($user)?$user->email:null }}" placeholder="contoh : email@gmail.com">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kata Sandi</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password" value="{{ isset($user)?$user->password:null }}" placeholder="Kata Sandi / password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-3">
                    <select class="form-control" id="role" name="role" >
                      <option value="">-- Pilih Role --</option>
                      @foreach($showarr_role as $key_role => $value_role)
                        <option value="{{ $key_role }}" {{ isset($user) && $user->role == $key_role ? 'selected':null }}>{{ $value_role }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{ url('user') }}" type="button" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Batal</a>
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