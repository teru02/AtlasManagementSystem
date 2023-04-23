<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

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
            'over_name'=>'山田',
            'under_name'=>'太郎',
            'over_name_kana'=>'ヤマダ',
            'under_name_kana'=>'タロウ',
            'mail_address'=>'TarouYamada@gmail.com',
            'sex'=>'1',
            'birth_day'=>'2000-01-01',
            'role'=>'1',
            'password'=>Hash::make('11111111')
        ]);
        DB::table('users')->insert([
            'over_name'=>'山田',
            'under_name'=>'花子',
            'over_name_kana'=>'ヤマダ',
            'under_name_kana'=>'ハナコ',
            'mail_address'=>'HanakoYamada@gmail.com',
            'sex'=>'2',
            'birth_day'=>'2000-01-02',
            'role'=>'4',
            'password'=>Hash::make('22222222')
        ]);
    }
}
