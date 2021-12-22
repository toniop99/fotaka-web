<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Src\Web\School\EloquentSchoolRepository;

class GetSchools extends Command
{
    protected $signature = 'command:getschools';

    protected $description = 'Get all the schools on the database.';

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
        $schools = EloquentSchoolRepository::getAll();
        $this->table(['ID', 'Nombre', 'Descripción', 'Dirección', 'Contraseña', 'carpeta'], $schools);

        return 0;
    }
}
