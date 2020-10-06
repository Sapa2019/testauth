<?php
use App\User;
use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function($user){
           factory(Post::class,10)->create([
             'user_id'=>$user->id,
           ]);
        });
    }
}
