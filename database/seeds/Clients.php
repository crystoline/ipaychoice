<?php

use App\Models\Clients\Customer;
use App\Models\Clients\Email;
use App\Models\Clients\Officer;
use App\Models\Clients\State;
use App\Models\Clients\Telephone;
use App\Models\Clients\Town;
use App\Models\Clients\OfficersPermission;
use Illuminate\Database\Seeder;

class Clients extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states =  factory(State::class,2)
            ->create()
            ->each(function($state){
                factory(Town::class,3)->create(['state_id' => $state->id])
                ->each(function($town){
                    factory(OfficersPermission::class,1)->create([
                        'town_id' => $town->id,
                        'officer_id' => function () {
                            return factory(Officer::class)->create()->id;
                        },
                    ]);

                    factory(Customer::class,2)->create([
                        'town_id' => $town->id,

                    ])->each(function ($customer) {
                        factory(Telephone::class)->create([
                                'user_id'=>$customer->id,
                                'user_type' => 'App\Models\Clients\Customer'
                        ]);
                        factory(Email::class)->create([
                            'user_id'=>$customer->id,
                            'user_type' => 'App\Models\Clients\Customer'
                        ]);
                        $customer->save();
                    });
                });
            });
        factory(App\Models\Clients\Service::class,3)->create();

    }
}
