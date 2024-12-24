<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckRentals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:rentals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Revisa diariamente si un un alquiler ya finalizó';

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
        \DB::table('rentals')->where('date_end', date('Y-m-d'))->update(['condition_id' => false]);

        $billboards = \DB::table('rentals')->where('date_end', date('Y-m-d'))->get()->map(function ($item, $key) {
        	return $item->billboard_id;
        });

        \DB::table('billboards')->whereIn('id', $billboards)->update(['state_id' => true]);
    }
}
