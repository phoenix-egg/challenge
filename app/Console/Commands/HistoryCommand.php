<?php

namespace App\Console\Commands;

use App\Console\ChallegeCommand;

class HistoryCommand extends ChallegeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:history:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an employee web history';

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
        $url = \URL::to('/api/employee-history/create');
        $params = [
            'form_params' =>[
                'ip'    => $this->argument('url'),
                'url'   => $this->argument('url')
            ]
        ];
        
        $this->request( 'post', $url, $params);

        $response = $this->getResponse();

        if( isset( $response->status) && $response->status == 'success')
            echo "Employee hostory created successfuly";
        else
            echo "Sorry, something went wrong. Not able to create emplyee hostory.";
    }
}
