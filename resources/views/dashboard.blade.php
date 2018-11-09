@extends('layouts.app')


@section('content')
<div class="dashboard">
  @include('inc.nav_dashboard')

  <div class="container-fluid">
    <div class="row">

      @include('inc.nav_side')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              @if( $_SERVER['REQUEST_URI'] === '/dashboard' )
              <a class="btn btn-sm btn-primary" href="/dashboard/delete" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                Delete
              </a>
              <form id="delete-form" action="/dashboard/delete" method="POST">
                 @csrf
                 <input class="" type="hidden" name="checkbox-array" id="checkbox-array" value="">
               </form>
               @endif

              <button class="btn btn-sm btn-secondary">Export</button>
            </div>

            <!--
            <select class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <option value="periode-1">Periode 1</option>
              <option value="periode-2">Periode 2</option>
              <option value="periode-3">Periode 3</option>
              <option value="periode-4">Periode 4</option>
            </select>
            -->
          </div>
        </div>

        <h2>{{ $periode === 'Er is momenteel geen wedstrijd actief!' || $periode === 'Deze periode bestaat niet!' ? '' : 'Deelnemers - ' }}{{ $periode }}</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                @if( $_SERVER['REQUEST_URI'] === '/dashboard' )
                <th><input class="" type="checkbox" name="del-all" id="del-all"></th>
                @endif
                <th>Response</th>
                <th>Amount</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>IP Adress</th>
              </tr>
            </thead>
            <tbody>
                 @if(is_array($deelnames) || is_object($deelnames))
                 @foreach($deelnames as $deelname)
                  <tr>
                    @if( $_SERVER['REQUEST_URI'] === '/dashboard' )
                    <td><input class="" type="checkbox" name="del" id="{{$deelname->id}}"></td>
                    @endif
                    <td>{{$deelname->response}}</td>
                    <td>{{$deelname->amount}}</td>
                    <td>{{$deelname->name}}</td>
                    <td>{{$deelname->email}}</td>
                    <td>{{$deelname->ip}}</td>
                  </tr>
                @endforeach
                @endif
              
            </tbody>
          </table>
        </div>

      </main>
    </div>
  </div>
</div>

@endsection