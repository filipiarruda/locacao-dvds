<?php

namespace App\Console\Commands;

use App\Models\Dvd;
use Illuminate\Console\Command;

class UpdateDvdPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-dvd-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza o valor de locação dos DVD\'s aumentando em 5% o valor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dvds = Dvd::all();


        foreach ($dvds as $dvd) {
            $currentRentPrice = $dvd->rent_price;
            $newRentPrice = $currentRentPrice * 1.05;

            $dvd->update(['rent_price'=> $newRentPrice]);

            $this->info("O DVD {$dvd->title} com ID {$dvd->id} teve seu valor atualizado.");
        }
        $this->info("Todos os títulos tiveram seus valores atulizados em 5%");
    }
}
