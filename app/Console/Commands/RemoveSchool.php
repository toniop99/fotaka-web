<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Src\School\EloquentSchoolRepository;

class RemoveSchool extends Command
{
    protected $signature = 'command:removeschool';

    protected $description = 'A command used to remove a school from the database.';

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
    public function handle(): int
    {
        $toDeleteSchoolId = $this->ask('Dime el id del centro a eliminar de la base de datos: ');
        $isDeleted = EloquentSchoolRepository::remove($toDeleteSchoolId);
        if($isDeleted) {
            $this->info("El centro se eliminó de manera correcta.");
        } else {
            $this->error("Hubo un error al eliminar el centro.");
        }

        return 0;
    }
}
