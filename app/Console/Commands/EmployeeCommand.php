<?php

namespace App\Console\Commands;

use App\Console\ChallegeCommand;

class EmployeeCommand extends ChallegeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:create {code} {name} {ip}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an employee';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = \URL::to('/api/employee/create');
        $params = [
            'form_params' =>[
                'code'  => $this->argument('code'),
                'name'  => $this->argument('name'),
                'ip'    => $this->argument('ip')
            ]
        ];
        
        $this->request( 'post', $url, $params);

        $response = $this->getResponse();

        if( isset( $response->status) && $response->status == 'success')
            echo "Employee created successfuly";
        else
            echo "Sorry, omething went wrong. Not able to create emplyee.";

    }
}
