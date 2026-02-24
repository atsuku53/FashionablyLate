@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__title">Confirm</div>
    <div class="confirm__table">
        <table class="confirm__table--inner">
            <tr class="confirm__table--row">
                <td class="confirm__table--header">お名前</td>
                <td class="confirm__table--content">
                    {{ $contact['last_name'] }}
                    {{ $contact['first_name'] }}
                </td>
            </tr>
            <tr class="confirm__table--row">
                <td class="confirm__table--header">性別</td>
                <td class="confirm__table--content">
                        @if($contact['gender'] === '1')
                            男性
                        @elseif($contact['gender'] === '2')
                            女性
                        @else
                            その他
                        @endif
                </td>
            </tr>
            <tr class="confirm__table--row">
                <td class="confirm__table--header">メールアドレス</td>
                <td class="confirm__table--content">
                    {{ $contact['email'] }}
                </td>
            </tr>
            <tr class="confirm__table--row">
                <td class="confirm__table--header">電話番号</td>
                <td class="confirm__table--content">
                    {{ $contact['tel_1'] }}-{{ $contact['tel_2'] }}-{{ $contact['tel_3'] }}
                </td>
            </tr>
            <tr class="confirm__table--row">
                <td class="confirm__table--header">住所</td>
                <td class="confirm__table--content">
                    {{ $contact['address'] }}
                </td>
            </tr>
            <tr class="confirm__table--row">
                <td class="confirm__table--header">建物名</td>
                <td class="confirm__table--content">
                    {{ $contact['building'] }}
                </td>
            </tr>
            <tr class="confirm__table--row">
                <td class="confirm__table--header">お問い合わせの種類</td>
                <td class="confirm__table--content">
                    @if($contact['category_id'] === '1')
                        商品のお届けについて
                    @elseif($contact['category_id'] === '2')
                        商品の交換について
                    @elseif($contact['category_id'] === '3')
                        商品トラブル
                    @elseif($contact['category_id'] === '4')
                        ショップへのお問い合わせ
                    @else
                        その他
                    @endif
                </td>
            </tr>
            <tr class="confirm__table--row">
                <td class="confirm__table--header">お問い合わせ内容</td>
                <td class="confirm__table--content">
                    {{ $contact['detail'] }}
                </td>
            </tr>
        </table>
    </div>
    <div class="confirm__action">
        <form class="confirm__form--submit" method="POST" action="/contacts">
            @csrf
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                <input type="hidden" name="tel_1" value="{{ $contact['tel_1'] }}">
                <input type="hidden" name="tel_2" value="{{ $contact['tel_2'] }}">
                <input type="hidden" name="tel_3" value="{{ $contact['tel_3'] }}">
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                <input type="hidden" name="building" value="{{ $contact['building'] }}">
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            <div class="confirm__button">
                <button class="confirm__button--submit" type="submit">送信</button>
            </div>
        </form>
        <form class="confirm__form--modify" method="POST" action="/contacts/modify">
            @csrf
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                <input type="hidden" name="tel_1" value="{{ $contact['tel_1'] }}">
                <input type="hidden" name="tel_2" value="{{ $contact['tel_2'] }}">
                <input type="hidden" name="tel_3" value="{{ $contact['tel_3'] }}">
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                <input type="hidden" name="building" value="{{ $contact['building'] }}">
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            <div class="confirm__button">
                <button class="confirm__button--modify" type="submit">修正</button>
            </div>
        </form>
    </div>
</div>
@endsection