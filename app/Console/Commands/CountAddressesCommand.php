<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Exception;
use Illuminate\Console\Command;

class CountAddressesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:count-addresses {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Count the addresses of a customer';

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle(): void
    {
        $customerId = $this->argument('id');

        $customer = Customer::find($customerId);

        if (!$customer) {
            throw new Exception('Customer not found.');
        }

        $addressCount = $customer->addresses()->count();

        $this->info("Number of addresses for customer with ID $customerId: $addressCount");
    }
}
