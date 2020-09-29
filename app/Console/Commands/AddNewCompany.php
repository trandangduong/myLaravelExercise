<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class AddNewCompany extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('What is the company name?');
        $phone = $this->ask('What is the company\'s phone number?');
        
        if($this->confirm('Are you ready to insert'. $name. '?'))
        {
            $company = Company::create([
                'name' => $name,
                'phone' => $phone,
            ]);
            return $this->info('Added: '.$company->name);
        }
        $this->warn('No new company was added');        
    }
}
