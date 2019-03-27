<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class DownloadFIRMSKML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vost:download-firms-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Downloads and updates the kml file from FIRMS';

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
        $filename  = storage_path('kml_files')."/".Carbon::now()->format('Y-m-d H_i_s').".kml";
        $firms_url = "https://firms.modaps.eosdis.nasa.gov/data/active_fire/c6/kml/MODIS_C6_Europe_24h.kml";

        $this->info('Storing file to '.$filename);
        file_put_contents($filename, fopen($firms_url, 'r'));

        $this->info('Creating symlink');
        $symlink = public_path()."/latest.kml";
        if (file_exists($symlink)) {
            $this->info('Deleting older symlink');
            unlink($symlink);
        }

        symlink($filename, $symlink);

        $this->info('Done');

        return 1;
    }
}
