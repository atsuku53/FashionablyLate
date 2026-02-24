# お問い合わせフォーム

## 環境構築

### Dockerビルド
- git clone git@github.com:atsuku53/FashionablyLate.git
- docker-compose up -d --build

### Laravel環境構築
- docker-compose exec php bash
- composer install
- cp .env.example .env 環境変数を適宜変更
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## 開発環境
- お問い合わせ画面：http://localhost/
- 確認画面：http://localhost/confirm/
- 送信完了画面：http://localhost/thanks/
- ユーザー登録画面：http://localhost/register/
- ユーザーログイン画面：http://localhost/login/
- 管理画面：http://localhost/admin/

## 使用技術（実行環境）
- PHP 8.1
- Laravel 8.83.8
- MySQL 8.0.26
- nginx 1.21.1

## ER図
<img width="491" height="425" alt="test2 drawio" src="https://github.com/user-attachments/assets/461f657f-e2b8-4796-ba29-7abd7d1ff9b6" />
