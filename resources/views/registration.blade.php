@extends('layouts.main-layout')

@section('content')

<h1>Регистрация</h1>

<form class="w-25" method="POST" action="{{route('user.registration')}}" >
	@csrf
	<div class="mb-3">
		<label for="email" class="form-label">Ваш email</label>
		<input class="form-control" id="email" type="text" name="email" value="" placeholder="email">
		@error('email')
		<div class="form-text">{{$message}}</div>
		@enderror
	</div>

	<div class="mb-3">
		<label for="password" class="form-label">Пароль</label>
		<input class="form-control" type="text" id="password" name="password" value="" placeholder="Пароль">
		@error('password')
		<div class="alert alert-danger">{{$message}}</div>
		@enderror
	</div>

	<button type="submit" class="btn btn-primary">Войти</button>

</form>

@endsection('content')