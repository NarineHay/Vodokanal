<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\OrganizationType;
use Illuminate\Database\Seeder;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        OrganizationType::create( [
            'name' => 'Юридическое лицо',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        OrganizationType::create( [
            'name' => 'Two',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        OrganizationType::create( [
            'name' => 'Three',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

    }
}
