<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <title>Document</title>
</head>
<body>
@extends('layouts.app')
@section('content')
    <div class="next">
        <div class="panel-heading">内容確認</div>
        <form method="post" action="{{ route('complete') }}">
            <table class="table">
            @csrf
                <tr>
                    <th>お名前</th>
                    <td>{{$contact->fullname}}</td>
                </tr>

                <tr>
                    <th>性別</th>
                    <td>{{$contact->gender}}</td>
                </tr>

                <tr>
                    <th>メールアドレス</th>
                    <td>{{$contact->email}}</td>
                </tr>

                <tr>
                    <th>郵便番号</th>
                    <td>{{$contact->postcode}}</td>
                </tr>

                <tr>
                    <th>住所</th>
                    <td>{{$contact->address}}</td>
                </tr>

                <tr>
                    <th>建物名</th>
                    <td>{{$contact->building_name}}</td>
                </tr>

                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{$contact->opinion}}</td>
                </tr>
            </table>

        <div class="ett">
            <form method="post" name="action" action="{{ url('/index/complete') }}">
            @csrf
                <button type="submit" class="btn btn-dark" value="送信">送信</button>
                <input type="hidden" name="action" class="btn btn-dark" value="submit" >
            </form>
        </div>

        <div class="enti">
            <form method="get" action="{{ url('/') }}">
            @csrf
                <input type="submit" class="btn bosen" value="修正する" />
            </form>
        </div>
    </div>
@endsection
</body>
</html>