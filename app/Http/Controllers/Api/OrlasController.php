<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Src\Web\School\EloquentSchoolRepository;

class OrlasController extends Controller
{
    public function getSchoolsLinks() {
        $schools = EloquentSchoolRepository::getAll();
        $schoolNames = array_column($schools, 'name');

        $schoolUrls = array();
        foreach ($schoolNames as $schoolName) {
            array_push($schoolUrls,
                array(
                    'name' => $schoolName,
                    'link' =>  route('orlas_school', $schoolName)
                )
            );
        }

        return response()->json($schoolUrls);
    }
}
