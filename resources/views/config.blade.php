@extends('layouts.app')


@section('content')
<div class="dashboard">
  @include('inc.nav_dashboard')

  <div class="container-fluid">
    <div class="row">

      @include('inc.nav_side')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Configuratie</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <a class="btn btn-sm btn-secondary" href="/config/submit" onclick="event.preventDefault(); document.getElementById('config-form').submit();">
                Save
              </a>
            </div>
          </div>
        </div>

        {!! Form::open(['url' => 'config/submit', 'id' => 'config-form']) !!}
          <div class="row">
            <div class="form-group col-md-8 col-lg-8">
              {{Form::label('email', 'Admin Email Address')}}
              <input type="text" name="email" value="{{ isset($cfg) ? $cfg->email : '' }}" class="form-control" required email>

            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-md-4 col-lg-4">
              {{Form::label('p1_start', 'Start van periode 1')}}
              <input type="date" name="p1_start" value="{{ isset($cfg) ? $cfg->p1_start : '' }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4 col-lg-4">
              {{Form::label('p1_end', 'Einde van periode 1')}}
              <input type="date" name="p1_end" value="{{ isset($cfg) ? $cfg->p1_end : '' }}" class="form-control" required>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-md-4 col-lg-4">
              {{Form::label('p2_start', 'Start van periode 2')}}
              <input type="date" name="p2_start" value="{{ isset($cfg) ? $cfg->p2_start : '' }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4 col-lg-4">
              {{Form::label('p2_end', 'Einde van periode 2')}}
              <input type="date" name="p2_end" value="{{ isset($cfg) ? $cfg->p2_end : '' }}" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4 col-lg-4">
              {{Form::label('p3_start', 'Start van periode 3')}}
              <input type="date" name="p3_start" value="{{ isset($cfg) ? $cfg->p3_start : '' }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4 col-lg-4">
              {{Form::label('p3_end', 'Einde van periode 3')}}
              <input type="date" name="p3_end" value="{{ isset($cfg) ? $cfg->p3_end : '' }}" class="form-control" required>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-md-4 col-lg-4">
              {{Form::label('p4_start', 'Start van periode 4')}}
              <input type="date" name="p4_start" value="{{ isset($cfg) ? $cfg->p4_start : '' }}" class="form-control" required>
            </div>
            <div class="form-group col-md-4 col-lg-4">
              {{Form::label('p4_end', 'Einde van periode 4')}}
              <input type="date" name="p4_end" value="{{ isset($cfg) ? $cfg->p4_end : '' }}" class="form-control" required>
            </div>
          </div>       

        {!! Form::close() !!}
      </div>


      </main>
    </div>
  </div>
</div>

@endsection