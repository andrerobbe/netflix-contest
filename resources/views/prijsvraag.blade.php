@extends('layouts.app')


@section('content')

		<div class="row">
			<div class="col-md-8 col-lg-8">
				<h1>Win nu voor zes maanden lang gratis Netflix!</h1>
				<p class="lead">Neem nu deel aan de prijsvraag en maak elke maand kans op een gratis Netflix abonnement voor zes maanden! Al je favoriete films en series op 1 plaats, helemaal gratis! Waar wacht je nog op?
				</p>

				{!! Form::open(['url' => 'prijsvraag/submit', 'class' => 'py-4']) !!}
				<div class="py-4">
					<div class="form-group">
						{{Form::label('response', 'In welk jaar is Netflix in België gelanceerd?')}}
						{{Form::text('response', '', ['class' => 'form-control', 'placeholder' => '', 'required'])}}
					</div>
					<div class="form-group">
						{{Form::label('amount', 'Hoeveel deelnames zijn er aan deze prijsvraag?')}}
						{{Form::text('amount', '', ['class' => 'form-control', 'placeholder' => '', 'required'])}}
					</div>
					<div class="form-group">
						{{Form::label('name', 'Naam')}}
						{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => '', 'required'])}}
					</div>
					<div class="form-group">
						{{Form::label('email', 'Email Adres')}}
						{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => '', 'required', 'email'])}}
					</div>
				</div>
					
					<div class="py-4">
						{{Form::submit('Deelnemen &raquo;', ['class' => 'btn btn-primary btn-lg'])}}
					</div>
				{!! Form::close() !!}
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="sidebar-right">
					<h3>Winnaars</h3>
					<ul class="nav flex-column">
						<li>Periode 1 - Me</li>
						<li>Periode 2 - Myself</li>
						<li>Periode 3 - And</li>
						<li>Periode 4  - I</li>
					</ul>
				</div>
			</div>
		</div>

@endsection