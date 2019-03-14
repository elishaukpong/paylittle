<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = 'https://locationsng-api.herokuapp.com/api/v1/states';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result=curl_exec($ch);
        curl_close($ch);

        $states = json_decode($result, true);
        foreach($states as $state){
            $stateList[] = $state['name'];
        }
        $stateListCollection = collect($stateList);
        $stateListCollection->each(function($state){
            factory(App\Models\States::class)->create([
                'name' => $state,
            ]);

        });


    }
}
