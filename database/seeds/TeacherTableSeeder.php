<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Teacher;

class TeacherTableSeeder extends Seeder
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
        Teacher::create([
        	'id' => 1,
        	'code' => 'P.AA01',
        	'firstname' => 'naraa',
        	'lastname' => 'L',
        	'work' => 'ДЭД ПР',
        	'graduate' => 'ШУТИС',
        	'degree' => 'ДОКТОР',
        	'direction' => 'Менежмент',
        	'schooling' => 'Сургалт',
            'user_id' => 3,
       ]);
        Teacher::create([
        	'id' => 2,
        	'code' => 'P.DE08',
        	'firstname' => 'tuwshu',
        	'lastname' => 'Altanbat',
        	'work' => 'багш',
        	'graduate' => 'МТС',
        	'degree' => 'бакалавр',
        	'direction' => 'Электроник',
        	'schooling' => 'Сургалт',
            'user_id' => 4,
       ]);
    }
}
