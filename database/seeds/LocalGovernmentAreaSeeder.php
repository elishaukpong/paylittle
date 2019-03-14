<?php

use App\Models\States;
use Illuminate\Database\Seeder;

class LocalGovernmentAreaSeeder extends Seeder
{
    protected $singleState;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $state = States::all();


        $state->each(function ( $state ) {
            $this->singleState = $state;
            $url = 'https://locationsng-api.herokuapp.com/api/v1/states/' . $this->singleState->name . '/lgas';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);
            curl_close($ch);
            $lgas = json_decode($result, true);

            $lgaListCollection = collect($lgas);

            $lgaListCollection->each(function ( $lga ) {
                //                can't seem to figure how to fix this state id here
                factory(App\Models\LocalGovernmentArea::class)->create([ 'states_id' => $this->singleState->id, 'name' => $lga, ]);
            });

        });
    }
}
