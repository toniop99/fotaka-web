<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Src\School\EloquentSchoolRepository;
use Src\School\Exceptions\ClassNotFoundException;

class SchoolSectionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function __invoke(Request $request, $schoolName): Response
    {
        try {
            $school = EloquentSchoolRepository::getByName($schoolName);
            return response()->view('school', ['school' => $school]);
        } catch (ClassNotFoundException $e) {
            throw $e;
        }
    }
}
