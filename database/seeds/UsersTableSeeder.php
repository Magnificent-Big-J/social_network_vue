<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        $avatar = 'avatars/male.jpg';
       App\User::create([
            'name' => 'King Joel',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'slug' => str_slug('King Joel'),
            'avatar' => $avatar,
            'gender'=> 0
        ]);


        factory(\App\User::class,9)->create();
        $users = DB::table('users')->get();
        foreach($users as $user)
        {
            App\profile::create(['user_id'=>$user->id,
            'location'=>$faker->address,
            'about'=>$faker->text(rand(100,250))
            ]);
        }

    }
}
