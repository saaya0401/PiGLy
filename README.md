# PiGLy
## 環境構築
### Dockerビルド
1. git clone git@github.com:saaya0401/PiGLy.git
1. docker-compose up -d --build

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

### Laravel環境構築
1. docker-compose exec php bash
1. composer install
1. composer require livewire/livewire
1. cp .env.example .env
1. .envファイルの一部を以下のように編集
```
DB_HOST=mysql
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```
6. php artisan key:generate
1. php artisan migrate
1. php artisan db:seed

## userのログイン用初期データ
- メールアドレス: saaya@example.com
- パスワード: saayasaaya

## 使用技術
- MySQL 8.0.26
- PHP 7.4.9-fpm
- Laravel 8

## URL
- 環境開発: http://localhost/login
- phpMyAdmin: http://localhost:8080/

## ER図
![image](PiGLy.drawio.png)
