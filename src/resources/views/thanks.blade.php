@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

<body>
    <main>
        <div class="thanks__content">
            <div class="thanks__logo">Thank you</div>
            <div class="thanks__title">お問い合わせありがとうございました</div>
            <a class="thanks__link" href="/">HOME</a>
        </div>
    </main>
</body>
