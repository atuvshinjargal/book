<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('Successfull');
        }
        //DB::table('roles')->truncate();
        Role::create([
            'id'            => 1,
            'name'          => 'admin',
            'description'   => 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.'
        ]);
        Role::create([
            'id'            => 2,
            'name'          => 'manager',
            'description'   => 'Ability to create new companies and orders, or edit and update any existing ones.'
        ]);
        Role::create([
            'id'            => 3,
            'name'          => 'teacher',
            'description'   => 'Teaching'
        ]);
        Role::create([
            'id'            => 4,
            'name'          => 'student',
            'description'   => 'learning'
        ]);
    }
}
