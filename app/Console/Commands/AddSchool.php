<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Src\School\EloquentSchoolRepository;

class AddSchool extends Command
{
    protected $signature = 'command:addschool';

    protected $description = 'Add a new school to the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $name = $this->ask('Escribe el nombre del centro: ');
        $description = $this->ask('Escribe una descripción para el centro: ');
        $address = $this->ask('Escribe la dirección del centro: ');
        $password = $this->secret('Escribe la contraseña maestra del centro: ');
        $folderPath = $this->ask('Escribe el nombre de la carpeta del centro: (Relativo a la carpeta public/orlas/ como base. )');
        $imagePath = $this->ask('Escribe la ruta a la imagen de portada: (Relativo a la carpeta public/orlas/ como base. )');

        $password_hidden = str_repeat('*', strlen($password));
        $this->info('Estás a punto de introducir un nuevo centro con los siguientes datos: ');
        $this->newLine();
        $this->table(['Nombre', 'Descripción', 'Dirección', 'Contraseña', 'Carpeta', 'Imagen de portada'],
            [[
                $name,
                $description,
                $address,
                $password_hidden,
                $folderPath,
                $imagePath
            ]]);

        $this->confirm('Estás seguro', true);

        $schoolData = [
            'name' => $name,
            'description' => $description,
            'address' => $address,
            'master_password' => Hash::make($password),
            'folder_path' => $folderPath,
            'image_path' => $imagePath
        ];

        try {
            if(!File::isDirectory(public_path('orlas/'.$folderPath))) {
                File::makeDirectory($folderPath, 0777, true, true);
            }

            $isInserted = EloquentSchoolRepository::insert($schoolData);

            if($isInserted) {
                $this->info('El centro ha sido introducido en la base de datos correctamente.');
            } else {
                $this->error('Hubo un error al insertar el centro en la base de datos.');
            }
        }catch (Exception $exception) {
            $this->error($exception->getMessage());
        }


        return 0;
    }
}
