<div>
    <button wire:click="openModal({{ $contactId }})" type="button" class="modal__open-button">
        詳細
    </button>

    @if($showModal)
    <div class="modal__overlay" wire:click="closeModal()"></div>
    <div class="modal__content">
        <div class="modal__header">
            <button wire:click="closeModal()" class="modal__close-button">×</button>
        </div>
        <div class="modal__body">
            <table class="modal__table">
                <tr>
                    <td class="modal__table--title">お名前</td>
                    <td class="modal__table--content">{{ $selectedContact->last_name }} {{ $selectedContact->first_name }}</td>
                </tr>
                <tr>
                    <td class="modal__table--title">性別</td>
                    <td class="modal__table--content">
                        @if ($selectedContact->gender === 1)
                            男性
                        @elseif ($selectedContact->gender === 2)
                            女性
                        @else
                            その他
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="modal__table--title">メールアドレス</td>
                    <td class="modal__table--content">{{ $selectedContact->email }}</td>
                </tr>
                <tr>
                    <td class="modal__table--title">電話番号</td>
                    <td class="modal__table--content">{{ $selectedContact->tel }}</td>
                </tr>
                <tr>
                    <td class="modal__table--title">住所</td>
                    <td class="modal__table--content">{{ $selectedContact->address }}</td>
                </tr>
                <tr>
                    <td class="modal__table--title">建物名</td>
                    <td class="modal__table--content">{{ $selectedContact->building }}</td>
                </tr>
                <tr>
                    <td class="modal__table--title">お問い合わせの種類</td>
                    <td class="modal__table--content">{{ $selectedContact->category->content }}</td>
                </tr>
                <tr>
                    <td class="modal__table--title">お問い合わせ内容</td>
                    <td class="modal__table--content">{{ $selectedContact->detail }}</td>
                </tr>
            </table>
        </div>
        <div class="modal__footer">
            <form method="POST" action="/delete">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $contactId }}">
                <button type="submit" class="modal__delete-button">削除</button>
            </form>
        </div>
    </div>
    @endif

</div>