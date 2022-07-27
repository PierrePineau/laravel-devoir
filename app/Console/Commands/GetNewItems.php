<?php

namespace App\Console\Commands;

use App\Events\NewCreateItem;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetNewItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'item:GetNewItem';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Récupération des nouveaux items ajoutés sur la journée (et log)';

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
        

        try {
            // $date = Carbon::now();
            // $date->subHour($date->hour);
            // $date->subMinute($date->minute);
            // $date->subSecond($date->second);
            $date = Carbon::now();
            $items = Item::select('name', 'quantity')->where('created_at', '>', $date->day())->get();

            Log::info("Liste des nouveaux items ajoutés :");
            $bar = $this->output->createProgressBar(count($items));
            $bar->start();
            foreach ($items as $item) {
                NewCreateItem::dispatch($item);
                $bar->advance();
            }
            $bar->finish();
            $this->newLine();
            $this->info("La quantité des nouveaux items a été envoyée dans les logs");
            return 0;


        } catch (\Exception $Exception) {
            $this->newLine();
            $this->error("Un problème est survenu pendant l'opération");
            dd($Exception);
            return 2;
        }
    }
}
