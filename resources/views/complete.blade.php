<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/complete.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <title>Document</title>
</head>
<body>
@extends('layouts.app')
@section('content')
  <div class="next">
    <p>ご意見いただきありがとうございました。</p>
    <div class="enti">
      <form method="get" action="{{ url('/') }}">
      @csrf
        <input type="submit"  class="btn btn-dark" value="トップページへ" />
      </form>
    </div>
  </div>
@endsection
</body>
</html>