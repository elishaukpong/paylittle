<?php

use Illuminate\Database\Seeder;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $durations = collect([3, 6, 12]);
    	$durations->each(function ($duration) {
    		factory(App\Models\Duration::class)->create(['timeline' => $duration]);
	    });
    }
}
