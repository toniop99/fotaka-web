<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Src\Web\School\EloquentSchoolRepository;
use Src\Web\School\Exceptions\SchoolNotFoundException;

class ChangeClassPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:changeclasspw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change the password of a class';

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
            $school['classes'] = Arr::flatten($school['classes'], 1);

            $schoolTable = [];

            foreach ($school['classes'] as $grade) {
                $schoolTable[] = [
                    "id" => $grade['id'],
                    "name" => $grade['name'],
                    "promotion" => $grade['promotion']
                ];
            }

            $this->table(['ID', 'Nombre', 'Promoción'], $schoolTable);
            $gradeId = $this->ask('Escribe el id de la clase seleccionada: ');
            if(!is_numeric($gradeId)) {
                $this->error('El id introducido no es correcto');
                return 0;
            }
            $newPassword = $this->ask('Escribe la nueva contraseña para la clase: ');

            $continue = $this->confirm('Estás seguro de que quires cambiar la contraseña', true);
            if (!$continue) {
                $this->info('Proceso de actualización de contraseña cancelado');
                return 0;
            }

            $hashedNewPassword = Hash::make($newPassword);
            $key = array_search($gradeId, array_column($school['classes'], 'id'));
            $school['classes'][$key]['orla']['password'] = $hashedNewPassword;

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
