@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
    @csrf
    <input type="submit" value="logout" class="header-link">
</form>
@endsection

@section('content')
<div class="admin">
    <div class="admin__heading">
        <h2 class="admin__heading-title">Admin</h2>
    </div>

    <div class="admin__main">
        <form action="/search" method="get" class="search-form">
            @csrf
            <input type="text" name="keyword" class="search-form__input-keyword" placeholder="名前やメールアドレスを入力してください" value="{{request('keyword')}}">
            <div class="search-form__gender">
                <select name="gender" class="search-form__gender-select" value="{{ request('gender') }}">
                    <option disabled selected>性別</option>
                    <option value="1" @if( request('gender')==1 ) selected @endif>男性</option>
                    <option value="2" @if( request('gender')==2 ) selected @endif>女性</option>
                    <option value="3" @if( request('gender')==3 ) selected @endif>その他</option>
                </select>
            </div>

            <div class="search-form__category">
                <select name="category_id" class="search-form__category-select">
                    <option disabled selected>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if( request('category_id')==$category->id ) selected @endif
                        >{{$category->content }}
                    </option>
                    @endforeach
                </select>
            </div>

            <input type="date" name="date" class="search-form__date" value="{{ request('date') }}">
            <div class="search-form__action">
                <input  type="submit" class="search-form__search-btn" value="検索">
                <input  type="submit" name="reset" class="search-form__reset-btn" value="リセット">
            </div>
        </form>


        <div class="export-form">
            <form action="{{'/export?'.http_build_query(request()->query())}}" method="post">
                @csrf
                <input class="export__btn" type="submit" value="エクスポート">
            </form>
            {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>

        <table class="admin__table">
            <tr class="admin__row">
                <th class="admin__head">お名前</th>
                <th class="admin__head">性別</th>
                <th class="admin__head">メールアドレス</th>
                <th class="admin__head">お問い合わせの種類</th>
                <th class="admin__head"></th>
            </tr>

            @foreach($contacts as $contact)
            <tr class="admin__row">
                <td class="admin__data">{{ $contact->first_name }} {{ $contact->last_name }}</td>
                <td class="admin__data">
                @if($contact->gender == 1)
                男性
                @elseif($contact->gender == 2)
                女性
                @else
                その他
                @endif
                </td>
                <td class="admin__data">{{ $contact->email }}</td>
                <td class="admin__data">{{ $contact->category->content }}</td>
                <td class="admin__data">
                    <a class="admin__detail-btn" href="#{{ $contact->id }}">詳細</a>
                </td>
            </tr>

            <div class="modal" id="{{ $contact->id }}">
                <a href="#!" class="modal-link"></a>
                <div class="modal__main">
                    <div class="modal__content">
                        <form action="/delete" method="post" class="modal__detail-form">
                            @csrf
                            <div class="modal-form__group">
                                <label class="modal-form__label">お名前</label>
                                <p>{{ $contact->first_name }} {{ $contact->last_name }}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label">性別</label>
                                <p>
                                @if($contact->gender == 1)
                                男性
                                @elseif($contact->gender == 2)
                                女性
                                @else
                                その他
                                @endif
                                </p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label">メールアドレス</label>
                                <p>{{ $contact->email }}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label">電話番号</label>
                                <p>{{ $contact->tell }}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label">住所</label>
                                <p>{{ $contact->address }}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label">お問い合わせの種類</label>
                                <p>{{ $contact->category->content }}</p>
                            </div>

                            <div class="modal-form__group">
                                <label class="modal-form__label">お問い合わせ内容</label>
                                <p>{{ $contact->detail }}</p>
                            </div>

                            <div class="admin-btn">
                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                <input  type="submit" class="modal-form__delete-btn" value="削除">
                            </div>
                        </form>
                    </div>

                    <a href="#" class="modal__close-btn">×</a>
                </div>
            </div>
            @endforeach
        </table>
    </div>
</div>
@endsection