<?php

use Illuminate\Database\Seeder;

class General extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,3)->create()->each(function($user){
                factory(\App\Models\Client::class,3)->create([
                    'user_id' => $user->id,
                ])->each(function($client){
                    factory(\App\Models\Configuration::class,1)->create([
                        'client_id' => $client->id,
                    ]);
                });
            });
    }
}
