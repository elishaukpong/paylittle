<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $Status = collect(['pending','accepted','rejected']);
    	$Status->each(function ($status) {
    		factory(App\Models\Status::class)->create(['name' => $status]);
	    });
    }
}
