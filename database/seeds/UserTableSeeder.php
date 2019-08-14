<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('Successfull users');
        }
        //DB::table('users')->truncate();
        User::create([
            'id' => 1,
        	'name' => 'tuwshu',
            'email' => 'tuwshu@yahoo.com',
            'password' => bcrypt('asd123'),
            'role_id' => 1,
       ]);
        User::create([
            'id' => 2,
            'name' => 'amarsanaa',
            'email' => 'amarsanaa@yahoo.com',
            'password' => bcrypt('asd123'),
            'role_id' => 2,
       ]);
        User::create([
            'id' => 3,
            'name' => 'naraa',
            'email' => 'naraa@yahoo.com',
            'password' => bcrypt('asd123'),
            'role_id' => 3,
       ]);
        User::create([
            'id' => 4,
            'name' => 'tuvshinjargal',
            'email' => 'tuwshu_sit@yahoo.com',
            'password' => bcrypt('asd123'),
            'role_id' => 3,
       ]);
        User::create([
            'id' => 5,
        	'name' => 'test',
            'email' => 'test@yahoo.com',
            'password' => bcrypt('asd123'),
            'role_id' => 4,
       ]);
    }
}
