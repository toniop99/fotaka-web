<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Src\School\EloquentSchoolRepository;
use Src\School\Exceptions\SchoolNotFoundException;

class ChangeSchoolPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:changeschoolpw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change the master school password';

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
        $school = $this->ask('Escribe el nombre del centro: ');
        try {
            $school = EloquentSchoolRepository::getByName($school);
            $newPassword = $this->ask('Escribe la nueva contraseña maestra: ');
            $continue = $this->confirm('Estás seguro de que quires cambiar la contraseña', true);
            if (!$continue) {
                $this->info('Proceso de actualización de contraseña cancelado');
                return 0;
            }

            $hashedNewPassword = Hash::make($newPassword);
            $school['master_password'] = $hashedNewPassword;

            $update = EloquentSchoolRepository::update($school);

            if(!$update) {
                $this->error('Hubo un error al actualizar la contraseña del colegio. Vuelva a intentarlo');
                return 0;
            }

            $this->info('Contraseña actualizada correctamente');
        } catch (SchoolNotFoundException $e) {
            $this->error('El colegio especificado no se encuentra en la base de datos');
            return 0;
        } catch (Exception $e) {
            $this->error($e->getMessage());
            return 0;
        }

        return 1;
    }
}
