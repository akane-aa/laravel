laravel ver.5.6

参考：ララ帳（laravel5.1）
https://laravel10.wordpress.com/

laravel5.1と5.6では異なる箇所が多い

・セットアップ
laravelでプロジェクトを作成する場合
laravelインストーラーを使うと、バグが出るため
composerを使って、プロジェクトの作成を行う。

laravel(1)

コントローラーの作成
laravel5.6では、--plain オプションが使えない
--plain オプションを使わなくても中身が空のWelcomeControllerが作成される

laravel 5.1
$ php artisan make:controller --plain WelcomeController
laravel 5.6
$ php artisan make:controller WelcomeController
