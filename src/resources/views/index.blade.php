@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form">
    <div class="contact-form__heading">
        <h2 class="contact-form__title">Contact</h2>
    </div>

    <div class="contact-form__main">
        <form class="form" action="confirm" method="post">
            @csrf

            <div class="form__group form__group-name">
                <label class="form__label--item">お名前<span class="form__label--required">※</span></label>
                    <div class="form__input--name">
                        <input class="form-input input-name" type="text" name="first_name" id="name" value="{{ old('first_name') }}" placeholder="例: 山田" />
                        <input class="form-input input-name" type="text" name="last_name" id="name" value="{{ old('last_name') }}" placeholder="例: 太郎" />
                    </div>
                    <div class="form-error">
                        @if($errors->has('first_name'))
                        <p class="form-error_first-name">{{ $errors->first('first_name') }}</p>
                        @endif
                        @if($errors->has('last_name'))
                        <p class="form-error_last-name">{{ $errors->first('last_name') }}</p>
                        @endif
                    </div>
            </div>

            <div class="form__group form__group-gender">
                <label class="form__label--item">性別<span class="form__label--required">※</span></label>
                <div class="gender-select">
                    <div class="form__input--gender">
                        <label class="gender-label">
                            <input class="input-gender" id="" type="radio" name="gender" id="male" value="1" {{
                                old('gender')==1 || old('gender')==null ? 'checked' : '' }} checked/>
                            <span class="gender-text">男性</span>
                        </label>
                    </div>
                    <div class="form__input--gender">
                        <label class="gender-label">
                            <input class="input-gender" type="radio" name="gender" id="female" value="2" {{
                                old('gender')==2 ? 'checked' : '' }}/>
                            <span class="gender-text">女性</span>
                        </label>
                    </div>
                    <div class="form__input--gender">
                        <label class="gender-label">
                            <input class="input-gender" type="radio" name="gender" id="other" value="3" {{
                                old('gender')==3 ? 'checked' : '' }}/>
                            <span class="gender-text">その他</span>
                        </label>
                    </div>
                </div>
                <p class="form-error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="form__group form__group-email">
                <label class="form__label--item">メールアドレス<span class="form__label--required">※</span></label>
                <input class="form-input" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                <p class="form-error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="form__group form__group-phone">
                <label class="form__label--item" for="tel">電話番号<span class="form__label--required">※</span></label>
                <div class="form__input--phone">
                    <input class="form-input input-phone" type="tel" name="phone_1" id="phone_1" placeholder="080" value="{{ old('phone_1') }}">
                    <span>-</span>
                    <input class="form-input input-phone" type="tel" name="phone_2" id="phone_2" placeholder="1234" value="{{ old('phone_2') }}">
                    <span>-</span>
                    <input class="form-input input-phone" type="tel" name="phone_3" id="phone_3" placeholder="5678" value="{{ old('phone_3') }}">
                </div>
                <p class="form-error">
                    @if($errors->has('phone_1'))
                    {{ $errors->first('phone_1') }}
                    @elseif($errors->has('phone_2'))
                    {{ $errors->first('phone_2') }}
                    @else
                    {{ $errors->first('phone_3') }}
                    @endif
                </p>
            </div>

            <div class="form__group form__group-address">
                <label class="form__label--item" for="address">住所<span class="form__label--required">※</span></label>
                <input class="form-input" type="text" name="address" id="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                <p class="form-error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="form__group form__group-building">
                <label class="form__label--item" for="building">建物名</label>
                <input class="form-input" type="text" name="building" id="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>

            <div class="form__group form___group-category">
                <label class="form__label--item" for="category">お問い合わせの種類<span class="form__label--required">※</span></label>
                <div class="form__inputーcategory">
                    <select class="category-select" name="category_id" id="">
                    <option disabled selected>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>{{$category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="form-error">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="form-group form___group-detail">
                <label class="form__label--item" for="detail">お問い合わせの内容<span class="form__label--required">※</span></label>
                    <textarea class="textarea-detail" name="detail" id="" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    <p class="form-error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </p>
            </div>

            <div class="form__button">
                <input class="form__button-submit" type="submit" value="確認画面">
            </div>
        </form>
    </div>
</div>

@endsection