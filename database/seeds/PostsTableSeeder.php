<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            'user_id'=>1,
            'category_id'=>0,
            'public'=>0,
            'comment'=>'コメントです',
            'created_at'=>Carbon::now(),
            ]);
    }
}
