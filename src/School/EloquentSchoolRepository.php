<?php


namespace Src\School;


use App\Models\Grade;
use App\Models\Orla;
use App\Models\School;
use Exception;
use Src\School\Exceptions\SchoolNotFoundException;

class EloquentSchoolRepository implements SchoolRepository
{

    /**
     * @throws Exception
     */
    static public function insert(array $values): bool
    {
        if (empty($values['folder_path'])) {
            unset($values['folder_path']);
        }
        try {
            return School::query()->insert($values);
        } catch (Exception $exception) {
            if ($exception->getCode() == 23000) {
                throw new Exception('Ya existe un centro con ese nombre');
            }
        }

        return false;
    }

    static public function getByName(string $name): array
    {
//        $selectedSchool = School::query()
//            ->where('schools.name', '=', $name)
//            ->join('schools_classes as classes', 'classes.school_id', '=', 'schools.id')
//            ->orderBy('classes.promotion')
//            ->select('schools.*')
//            ->with('classes.orla')
//            ->get()
//            ->toArray();

        $selectedSchool = School::query()
            ->where('name', '=', $name)
            ->with(
                [
                    'classes' => function($q) {
                        $q->orderBy('promotion', 'desc');
                        $q->orderBy('name', 'asc');
                    },
                    'classes.orla'
                ]
            )
            ->get()
            ->first();

        if (empty($selectedSchool)) {
            throw new SchoolNotFoundException();
        }

        $selectedSchool = $selectedSchool->toArray();

        $data = [];
        foreach ($selectedSchool['classes'] as $class) {
            $data[$class['promotion']][] = $class;
        }
        unset($selectedSchool['classes']);
        $selectedSchool['classes'] = $data;

        return $selectedSchool;
    }

    static public function getAll(): array
    {
        return School::query()->select('id', 'name', 'description', 'address', 'master_password', 'folder_path')->get()->toArray();
    }

    static public function remove(int $id): bool
    {
        return School::query()->where('id', '=', $id)->delete();
    }

    /**
     * @throws Exception
     */
    static public function update(array $data): bool
    {
        if(empty($data) || empty($data['id'])) {
            throw new Exception('Error con los datos introducidos');
        }
        $school = School::query()->with('classes', 'classes.orla')->find($data['id']);
        unset($data['id']);
        if (!$school) {
            throw new Exception('Hubo un error en la base de datos');
        }

        if(!$school->update($data)) {
            return false;
        }

        foreach ($data['classes'] as $grade) {
            Orla::query()->find($grade['orla']['id'])->update($grade['orla']);
            Grade::query()->find($grade['id'])->update($grade);
        }
        return true;
    }
}
