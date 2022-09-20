@extends('layouts.app', ['title_atas' => 'Dashboard'])

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    {{ Auth::user()->id }}

  </div>

@endsection