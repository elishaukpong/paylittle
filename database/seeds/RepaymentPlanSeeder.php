<?php

use Illuminate\Database\Seeder;

class RepaymentPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repaymentplans = collect(['monthly','quarterly','bi-annually', 'yearly']);
    	$repaymentplans->each(function ($repaymentplan) {
    		factory(App\Models\RepaymentPlan::class)->create(['timeline' => $repaymentplan]);
	    });
    }
}
