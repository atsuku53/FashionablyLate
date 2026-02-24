@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact__content">
    <div class="contact__title">Contact</div>
    <form class="contact__form" method="POST" action="/contacts/confirm">
        @csrf
        <div class="contact__name">
            <div class="contact__name--title">お名前<span class="contact__required">※</span></div>
            <div class="contact__name--input">
                <input class="contact__last-name--input" type="text" name="last_name" placeholder="例: 山田" value="@if(isset($contact)){{ $contact['last_name'] }}@else{{ old('last_name') }}@endif">
                <input class="contact__first-name--input" type="text" name="first_name" placeholder="例: 太郎" value="@if(isset($contact)){{ $contact['first_name'] }}@else{{ old('first_name') }}@endif">
            </div>
        </div>
        @error('last_name')
            <div class="contact__error">{{ $message }}</div>
        @enderror
        @error('first_name')
            <div class="contact__error">{{ $message }}</div>
        @enderror
        <div class="contact__gender">
            <div class="contact__gender--title">性別<span class="contact__required">※</span></div>
            <div class="contact__gender--input">
                <input class="contact__gender--male" type="radio" id="gender_male" name="gender" value="1" @if(isset($contact) && $contact['gender'] === '1') checked @elseif(old('gender') === '1') checked @endif><label for="gender_male" class="contact__gender--male-label">男性</label>
                <input class="contact__gender--female" type="radio" id="gender_female" name="gender" value="2" @if(isset($contact) && $contact['gender'] === '2') checked @elseif(old('gender') === '2') checked @endif><label for="gender_female" class="contact__gender--female-label">女性</label>
                <input class="contact__gender--other" type="radio" id="gender_other" name="gender" value="3" @if(isset($contact) && $contact['gender'] === '3') checked @elseif(old('gender') === '3') checked @endif><label for="gender_other" class="contact__gender--other-label">その他</label>
            </div>
        </div>
        @error('gender')
            <div class="contact__error">{{ $message }}</div>
        @enderror
        <div class="contact__email">
            <div class="contact__email--title">メールアドレス<span class="contact__required">※</span></div>
            <input class="contact__email--input" type="text" name="email" placeholder="例: test@example.com" value="@if(isset($contact)){{ $contact['email'] }}@else{{ old('email') }}@endif">
        </div>
        @error('email')
            <div class="contact__error">{{ $message }}</div>
        @enderror
        <div class="contact__tel">
            <div class="contact__tel--title">電話番号<span class="contact__required">※</span></div>
            <div class="contact__tel--input">
                <input class="contact__tel--input-1" type="text" name="tel_1" placeholder="080" value="@if(isset($contact)){{ $contact['tel_1'] }}@else{{ old('tel_1') }}@endif">
                <span>-</span>
                <input class="contact__tel--input-2" type="text" name="tel_2" placeholder="1234" value="@if(isset($contact)){{ $contact['tel_2'] }}@else{{ old('tel_2') }}@endif">
                <span>-</span>
                <input class="contact__tel--input-3" type="text" name="tel_3" placeholder="5678" value="@if(isset($contact)){{ $contact['tel_3'] }}@else{{ old('tel_3') }}@endif">
            </div>
        </div>
        @if ($errors->has('tel_1') && $errors->first('tel_1') === '電話番号は必須項目です。' || $errors->has('tel_2') && $errors->first('tel_2') === '電話番号は必須項目です。' || $errors->has('tel_3') && $errors->first('tel_3') === '電話番号は必須項目です。')
            <div class="contact__error">電話番号は必須項目です。</div>
        @endif
        @if ($errors->has('tel_1') && $errors->first('tel_1') === '電話番号は1桁から5桁の数字で入力してください。' || $errors->has('tel_2') && $errors->first('tel_2') === '電話番号は1桁から5桁の数字で入力してください。' || $errors->has('tel_3') && $errors->first('tel_3') === '電話番号は1桁から5桁の数字で入力してください。')
            <div class="contact__error">電話番号は1桁から5桁の数字で入力してください。</div>
        @endif
        <div class="contact__address">
            <div class="contact__address--title">住所<span class="contact__required">※</span></div>
            <input class="contact__address--input" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="@if(isset($contact)){{ $contact['address'] }}@else{{ old('address') }}@endif">
        </div>
        @error('address')
            <div class="contact__error">{{ $message }}</div>
        @enderror
        <div class="contact__building">
            <div class="contact__building--title">建物名</div>
            <input class="contact__building--input" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="@if(isset($contact)){{ $contact['building'] }}@else{{ old('building') }}@endif">
        </div>
        @error('building')
            <div class="contact__error">{{ $message }}</div>
        @enderror
        <div class="contact__category">
            <div class="contact__category--title">お問い合わせの種類<span class="contact__required">※</span></div>
            <select class="contact__category--input" name="category_id" required>
                <option value="" hidden>選択してください</option>
                <option value="1" @if(isset($contact) && $contact['category_id'] === '1') selected @elseif(old('category_id') === '1') selected @endif>商品のお届けについて</option>
                <option value="2" @if(isset($contact) && $contact['category_id'] === '2') selected @elseif(old('category_id') === '2') selected @endif>商品の交換について</option>
                <option value="3" @if(isset($contact) && $contact['category_id'] === '3') selected @elseif(old('category_id') === '3') selected @endif>商品トラブル</option>
                <option value="4" @if(isset($contact) && $contact['category_id'] === '4') selected @elseif(old('category_id') === '4') selected @endif>ショップへのお問い合わせ</option>
                <option value="5" @if(isset($contact) && $contact['category_id'] === '5') selected @elseif(old('category_id') === '5') selected @endif>その他</option>
            </select>
        </div>
        @error('category_id')
            <div class="contact__error">{{ $message }}</div>
        @enderror
        <div class="contact__detail">
            <div class="contact__detail--title">お問い合わせ内容<span class="contact__required">※</span></div>
            <textarea class="contact__detail--input" name="detail" placeholder="お問い合わせ内容をご記載ください">@if(isset($contact)){{ $contact['detail'] }}@else{{ old('detail') }}@endif</textarea>
        </div>
        @error('detail')
            <div class="contact__error">{{ $message }}</div>
        @enderror
        <div class="contact__button">
            <button class="contact__button--submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
