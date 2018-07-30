<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Article;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('UsersTableSeeder');
        $this->call('ArticlesTableSeeder');
        Model::reguard();
    }
}
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name'=>'root',
            'email'=>'root@sample.com',
            'password'=>bcrypt('password')
        ]);
    }
}
class ArticlesTableSeeder extends Seeder  // ③
{
    public function run()
    {
        DB::table('articles')->delete();  // ④
        $user = User::all()->first();
        $faker = Faker::create('en_US');  // ⑤
        for ($i = 0; $i < 10; $i++) {  // ⑥
            // Article::create([
            //     'title' => $faker->sentence(),
            //     'body' => $faker->paragraph(),
            //     'published_at' => Carbon::today()
            // ]);
            $article = new Article([
                'title'=>$faker->sentence(),
                'body'=>$faker->paragraph(),
                'published_at'=>Carbon::now(),
            ]);
            $user->articles()->save($article);
        }
    }
}
