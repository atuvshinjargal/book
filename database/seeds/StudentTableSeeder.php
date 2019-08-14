<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Student;

class StudentTableSeeder extends Seeder
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
        Student::create([
        	'id' => 1,
        	'code' => 'P.AA018920',
        	'firstname' => 'Оюутан',
        	'lastname' => 'Ш',
            'user_id' => 5,
       ]);
    }
}
