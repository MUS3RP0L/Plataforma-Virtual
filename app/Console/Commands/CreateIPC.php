<?php

namespace Muserpol\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

use DB;
use Auth;
use Validator;

use Carbon\Carbon;
use Muserpol\Helper\Util;

use Muserpol\IpcTasa;


class CreateIPC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crearipc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creación de indice de precio al consumidor';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        $ipcLast = IpcTasa::orderBy('gest', 'desc')->first();
        $newIpcTasa = new IpcTasa;
        $newIpcTasa->user_id = 1;
        $newIpcTasa->ipc = $ipcLast->ipc;
        $fecha = Carbon::parse($ipcLast->gest);
        $newIpcTasa->gest = $fecha->addMonth();
        $newIpcTasa->save();
        $this->info("Indice de precio al consumidor creado mes de: " . $newIpcTasa->gest);
    }
}
