<?php

use App\posts;
use Illuminate\Database\Seeder;


class UserDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 5; $i++){
            $add = new posts;
            $add->title = 'New title '. $i;
            $add->content = 'New content of user'.rand(0,9);
            $add->save();
        }
    }
}
