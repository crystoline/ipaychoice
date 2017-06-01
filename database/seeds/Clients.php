<?php

use App\Models\Clients\Customer;
use App\Models\Clients\Email;
use App\Models\Clients\Officer;
use App\Models\Clients\State;
use App\Models\Clients\Telephone;
use App\Models\Clients\Town;
use App\Models\Clients\OfficersPermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Clients extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$states =  factory(State::class,2)
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
            });*/
        factory(App\Models\Clients\Service::class,3)->create();

        DB::connection('mysql_client')->table('currencies')->insert(['name'=>'Naira','code'=>'NGN','html'=>'&#8358;']);
        DB::connection('mysql_client')->table('currencies')->insert(['name'=>'US Dollar','code'=>'USD','html'=>'&#36;']);
    }
}
