<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        DB::table('users')->insert([
        'user_name'=>'田中　あさこ',
        'profile'=>'まぁまぁがんばる',
        'email'=>'misuzu@dd.dd.dd',
        'password'=>'misuzu12',
        'role'=>'0',
        'image'=>'sjdv',
        'created_at'=>Carbon::now(),
        ]);
        //
    }
}
