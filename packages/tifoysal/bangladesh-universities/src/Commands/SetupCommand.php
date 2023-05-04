<?php
namespace Tifoysal\BangladeshUniversities\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BangladeshGeocode:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Setting up Laravel Bangladesh Universities list');
        $this->info('Database migrating..');
        Artisan::call('migrate', ['--path' => 'vendor/tifoysal/bangladesh-universities/database/migrations']);
        $this->info('Database successfully migrated');

        $this->info('Seeding Universities List');
        Artisan::call('db:seed', array('--class' => 'Tifoysal\BangladeshUniversities\Seeders\UniversitiesSeeder'));

        $this->info('Publishing service provider..');
        Artisan::call('vendor:publish', array('--provider' => 'Tifoysal\BangladeshUniversities\BangladeshUniversitiesServiceProvider'));
        $this->info('Setup Successful');
    }
}

