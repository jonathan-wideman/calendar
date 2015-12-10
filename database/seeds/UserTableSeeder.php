

<?php

class UserTableSeeder extends Seeder
{

public function run()
{
  DB::table('users')->delete();
  User::create(array(
    'name'  =>  'Scott Henderson',
    'email' =>  'hendscot@gmail.com',
    'password'  =>  Hash::make('password'),
));
}

}
