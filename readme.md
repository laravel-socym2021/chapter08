# PHPフレームワーク Laravel Webアプリケーション開発 - chapter08 サンプルコード

## 対応

### 8-1 Commandの基礎

#### 8-1-1 クロージャによる Command の作成

* routes/console.php

#### 8-1-2 クラスによる Command の作成

* app/Console/Commands/HelloCommand.php

#### 8-1-3 Command への入力

* app/Console/Commands/HelloCommand.php

#### 8-1-4 Command からの出力

* app/Console/Commands/OutputCommand.php

#### 8-1-5 Command の実行

* routes/web.php
* app/Console/Commands/WithArgsCommand.php
* app/Console/Commands/NoArgsCommand.php
* app/Console/Commands/OtherCommand.php

#### コラム: コマンドエラーのスタックトレースを出力

* app/Console/Commands/ErrorCommand.php

### 8-2 Commandの実装

* app/Console/Commands/ExportOrdersCommand.php
* app/UseCases/ExportOrdersUseCase.php
* app/Services/ExportOrdersService.php

### 8-3 バッチ処理の実装

* app/Console/Commands/SendOrdersCommand.php
* app/UseCases/SendOrdersUseCase.php
* app/Services/ExportOrdersService.php
* Guzzle
* config/batch.php
* routes/api.php
* .env
* app/Providers/BatchServiceProvider.php
* config/app.php
* app/Services/ChatWorkService.php

## Usage

* 本章サンプルコードは、docker-compose で動作します。
* 実行する際は、Docker, docker-dompose のインストールを行った後に下記の手順を実行して下さい。

```
$ git clone https://github.com/laravel-socym2021/chapter08.git
$ cd chapter08
$ make

$ docker-compose exec php bash
root@f5ab4e483701:/var/www/html# php artisan
```

* 実行環境を破棄するには下記のように `make clean` コマンドを実行してください。

```sh
$ make clean
```
