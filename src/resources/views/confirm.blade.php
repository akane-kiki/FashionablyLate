@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-form">
    <div class="confirm-form__heading">
        <h2 class="confirm-form__title">Confirm</h2>
    </div>

    <!-- confirm -->
    <div class="confirm-form__main">
        <form action="/thanks" method="post">
            @csrf

            <!-- name -->
            <table class="confirm-form__table">
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">お名前</th>
                    <td class="confirm-form__text">{{ $contacts['first_name'] }}&nbsp;{{ $contacts['last_name'] }}</td>
                    <input type="hidden" name="first_name" value="{{ $contacts['first_name'] }}">
                    <input type="hidden" name="last_name" value="{{ $contacts['last_name'] }}">
                </tr>

                <!-- gender -->
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">性別</th>
                    <td class="confirm-form__text">
                    @if($contacts['gender'] == 1)
                    男性
                    @elseif($contacts['gender'] == 2)
                    女性
                    @else
                    その他
                    @endif
                    </td>
                    <input type="hidden" name="gender" value="{{ $contacts['gender'] }}">
                </tr>

                <!-- email -->
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">メールアドレス</th>
                    <td class="confirm-form__text">{{ $contacts['email'] }}</td>
                    <input type="hidden" name="email" value="{{ $contacts['email'] }}">
                </tr>

                <!-- phone -->
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">電話番号</th>
                    <td class="confirm-form__text">{{ $contacts['phone_1'] }}{{ $contacts['phone_2'] }}{{ $contacts['phone_3'] }}</td>
                    <input type="hidden" name="phone_1" value="{{ $contacts['phone_1'] }}">
                    <input type="hidden" name="phone_2" value="{{ $contacts['phone_2'] }}">
                    <input type="hidden" name="phone_3" value="{{ $contacts['phone_3'] }}">
                </tr>

                <!-- address -->
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">住所</th>
                    <td class="confirm-form__text">{{ $contacts['address'] }}</td>
                    <input type="hidden" name="address" value="{{ $contacts['address'] }}">
                </tr>

                <!-- building -->
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">建物名</th>
                    <td class="confirm-form__text">{{ $contacts['building'] }}</td>
                    <input type="hidden" name="building" value="{{ $contacts['building'] }}">
                </tr>

                <!-- category -->
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">お問い合わせの種類</th>
                    <td class="confirm-form__text">{{ $category->content }}</td>
                    <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}">
                </tr>

                <!-- detail -->
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">お問い合わせの内容</th>
                    <td class="confirm-form__text">{{ $contacts['detail'] }}</td>
                    <input type="hidden" name="detail" value="{{ $contacts['detail'] }}">
                </tr>
            </table>

            <!-- button -->
             <div class="confirm-form__btn">
                <input class="confirm-form__btn-submit" type="submit" name="send" value="送信">
                <input class="confirm-form__btn-back" type="submit" name="back" value="修正">
             </div>
        </form>
    </div>
</div>
@endsection