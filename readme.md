laravel ver.5.6

参考：ララ帳（laravel5.1）
https://laravel10.wordpress.com/

laravel5.1と5.6では異なる箇所が多い

・セットアップ
  laravelでプロジェクトを作成する場合
  laravelインストーラーを使うと、バグが出るためcomposerを使って、プロジェクトの作成を行う。

laravel(1)

・route.php
  Routeing設定を記述するapp/Http/routes.phpはlaravel5.6には存在せず、routes/web.phpに記載する。

・コントローラーの作成
  laravel5.6では、--plain オプションが使えない
  --plain オプションを使わなくても中身が空のWelcomeControllerが作成される

    laravel 5.1
    $ php artisan make:controller --plain WelcomeController

    laravel 5.6
    $ php artisan make:controller WelcomeController

laravel(6)

・MySQLのインデックスサイズに767byteまでしかつかえない
  -解決方法としてvarcharの最大長を191バイトにする
  -AppServiceProviderに以下の内容を追記

      use Illuminate\Support\Facades\Schema;

      public function boot()
      {
        Schema::defaultStringLength(191);

      }
