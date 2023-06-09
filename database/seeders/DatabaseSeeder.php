<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::factory()->count(100)->create();
        $customers = Customer::all();

        foreach ($customers as $customer) {
            $customer->addresses()->createMany(
                Address::factory()->count(3)->make(['customer_id' => $customer->id])->toArray()
            );
        }
    }
}
