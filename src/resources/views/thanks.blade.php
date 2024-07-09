@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__contents">
    <div class="thanks__content-content">
        <p class="thanks-text">お問い合わせありがとうございました</p>
        <form class="thanks-form" action="{{ url('/') }}" method="get">
            <button type="submit" class="thanks-btn">HOME</button>
        </form>
    </div>
</div>
<div class="thanks__back-text">
    <span class="thanks__back-message-text">Thank you</span>
</div>
@endsection