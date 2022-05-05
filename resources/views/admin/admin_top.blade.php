<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">管理側システム</div>
		<div class="card-body">
			<div class="search-box">
				<span class="search-box_title">お名前</span>
				<input type="text" name="fullname" id="fullname" value="" >

				<span class="search-box_title">性別</span>
				<label><input type="radio" name="kind" value="">全て</label>
				<label><input type="radio" name="kind" value="kind01">男性</label>
				<label><input type="radio" name="kind" value="kind02">女性</label>
			</div>
			<div class="search-box">
				<span class="search-box_title">登録日</span>
				<input type="text" name="nyusha_from">  ～  <input type="text" name="nyusha_to">
			</div>
			<div class="search-box">
				<span class="search-box_title">メールアドレス</span>
				<input type="text" name="email" id="email" value="" >
			</div>

			<div class="ett">
        <form method="post" name="action" action="{{ url('/admin') }}">
        @csrf
          <input type="submit" class="btn btn-dark" value="検索" />
        </form>
      </div>

			<div class="enti">
        <form method="get" action="{{ url('/admin') }}">
        @csrf
          <input type="submit" class="btn bosen" value="リセット" />
        </form>
      </div>
		</div>

			<table class="list-group">
				<tr>ID</tr><tr>お名前</tr><tr>性別</tr><tr>メールアドレス</tr><tr>ご意見</tr>
			@foreach ($contacts as $contact)
				<tr>
					<td><a href="{{route('contacts.list',[$contact->id ])}}">{{ $contact->id }}</a></td>
					<td><a href="{{route('contacts.list',[$contact->id ])}}">{{ $contact->name }}</a></td>
					<td><a href="{{route('contacts.list',[$contact->id ])}}">{{ $contact->gender }}</a></td>
					<td><a href="{{route('contacts.list',[$contact->id ])}}">{{ $contact->email }}</a></td>
					<td><a href="{{route('contacts.list',[$contact->id ])}}">{{!! nl2br(e(Str::limit($contact->opinion, 25))) !!}}</a></td>	
					<td>
        		<form action="/admin/delete/{{$contact->id}}" method="POST">
        		{{ csrf_field() }}
						<input type="submit" class="btn btn-block btn-dell" value="削除">
        		</form>
    			</td>
				</tr>
			@endforeach
			</table>
	</div>
</div>
		<div class="eee">
			<form method="post" action="{{ url('/admin/logout') }}">
				@csrf
				<input type="submit" class="btn btn-dark" value="ログアウト" />
			</form>
		</div>
	</div>
</div>
@endsection
</body>
</html>