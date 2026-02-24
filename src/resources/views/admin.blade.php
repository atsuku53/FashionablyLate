@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('header')
    <nav class="header__nav">
        <form class="header__nav-form" method="POST" action="/logout">
            @csrf
            <button class="header__nav-button">logout</button>
        </form>
    </nav>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__title">Admin</div>
    <div class="search__content">
        <form class="search__form" method="GET" action="/search">
            <input class="search__input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <select class="search__select--gender" name="gender">
                <option value="">性別</option>
                <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
            </select>
            <select class="search__select--category" name="category_id" value="{{ request('category_id') }}">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                @endforeach
            </select>
            <input class="search__input--date" type="date" name="date_from" value="{{ request('date_from') }}">
            <button class="search__button" type="submit">検索</button>
            <a class="search__reset" href="/admin">リセット</a>
        </form>
    </div>
    <div class="table__function">
        <button class="table__function--export">エクスポート</button>
        <div class="pagination__body">{{ $contacts->appends($params)->links('vendor.pagination.admin-pagination') }}</div>
    </div>
    <table class="contact__table">
        <tr class="contact__table--header">
            <td class="contact__table--header-name">お名前</td>
            <td class="contact__table--header-gender">性別</td>
            <td class="contact__table--header-email">メールアドレス</td>
            <td class="contact__table--header-category">お問い合わせの種類</td>
            <td class="contact__table--header-detail"></td>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="contact__table--body">
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>
                @if ($contact->gender === 1)
                    男性
                @elseif ($contact->gender === 2)
                    女性
                @else
                    その他
                @endif
            </td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content }}</td>
            <td>
                <livewire:modal :contactId="$contact->id" />
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

