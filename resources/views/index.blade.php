<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <title>Document</title>
</head>
<body>
@extends('layouts.app')

@section('content')
        <div class="next">
            <div class="heading">お問い合わせ
            
            </div>
                <form method="post" action="{{ route('confirm') }}">
                    <table>
                    @csrf
                        
                        <tr>
                            <th>お名前<span class="need">＊</span>
                            </th>
                            <td class="placement">
                                <input type="text" name="fullname" id="fullname" size="55" value="{{ old('fullname')}}">
                                <p class="example">例）山田   　　　   　　　例）太郎<p>
                                <p class="error-dd"><span>名前を記入してください。</span><p>
                                @if ($errors->first('fullname'))
                                    <p class="validation">※{{$errors->first('fullname')}}</p>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>性別<span class="need">＊</span>
                            </th>    
                            <td class="placement-pp">
                                <input type="radio" name="gender" id="gender" value="{{ old('gender') === 'male' ? 'checked' : '' }}" style="transform:scale(2.0);" checked="checked">
                                <label for="button-1"> 男性</label>
                                <input type="radio" name="gender" id="gender" value="女性" value="{{ old('gender') === 'male' ? 'checked' : '' }}"  style="transform:scale(2.0);">
                                <label for="button-2"> 女性</label>
                                @if ($errors->first('gender'))
                                    <p class="validation">※{{$errors->first('gender')}}</p>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>メールアドレス<span class="need">＊</span>
                            </th>
                            <td class="placement">
                                <input type="text" name="email" id="email"  size="55" value="{{ old('email')}}" >
                                <p class="example">例）test@example.com<p>
                                <p class="error-dd"><span>メールアドレスを記入してください。</span><p>
                                @if ($errors->first('email'))
                                    <p class="validation">※{{$errors->first('email')}}</p>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>郵便番号<span class="need">＊</span>
                            </th>
                            <td class="placement">
                                〒<input type="text" name="postcode" id="postcode"  size="20" maxlength="8" value="{{ old('postcode')}}">
                                <p class="example">例）123-4567<p>
                                <p class="error-zz"><span>7文字以内で記入してください。</span><p>
                                @if ($errors->first('postcode'))
                                    <p class="validation">※{{$errors->first('postcode')}}</p>
                                @endif
                            </td>
                        </tr>

                        <tr>    
                            <th>住所<span class="need">＊</span>
                            </th>
                            <td class="placement">
                                <input type="text" name="address" id="address"  size="55" value="{{ old('address')}}">
                                <p class="example">例）東京都渋谷区千駄ヶ谷1-2-3<p>
                                <p class="error-dd"><span>住所を記入してください。</span><p>
                                @if ($errors->first('address'))
                                    <p class="validation">※{{$errors->first('address')}}</p>
                                @endif
                            </td>
                        </tr>

                        <tr>    
                            <th>建物名</th>
                            <td class="placement">
                                <input type="text" name="building_name" id="building_name"  size="55" value="{{ old('building_name')}}">
                                <p class="example">例）千駄ヶ谷マンション101<p>
                                <p class="error-dd"><span>住所を記入してください。</span><p>
                            </td>
                        </tr>

                        <tr>
                            <th class="tt">ご意見<span class="need">＊</span>
                            </th>
                            <td class="placement">
                                <textarea name="opinion" id="opinion" placeholder="" cols="60" rows="5" maxlength="120" value="{{ old('opinion')}}"></textarea>
                                <p class="error-dd"><span>お問い合わせ内容を記入してください。</span><p>
                                @if ($errors->first('opinion'))
                                    <p class="validation">※{{$errors->first('opinion')}}</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <div class="entire">
                        <button type="submit" class="btn btn-dark">確認</button>
                    </div>
@endsection
        </div>
    </div>
</body>
</html>