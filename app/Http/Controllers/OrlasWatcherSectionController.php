<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Src\Grade\GradeNotFoundException;
use Src\School\EloquentSchoolRepository;

class OrlasWatcherSectionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function getOrla(Request $request, $schoolName, $promotion, $id): Response
    {
        $school = EloquentSchoolRepository::getByName($schoolName);
        $data = [
            'name' => $school['name'],
        ];

        foreach ($school['classes'][$promotion] as $class) {
            if ($class['id'] == $id) {
                $data['class'] = $class;
            }
        }
        if (request()->cookie('login_'.$id)) {
            return response()->view('orlas-watcher', ['data' => $data]);
        }

        unset($data['class']['orla']);
        return response()->view('orlas-watcher-password',  ['data' => $data]);
    }

    public function login(Request $request, $schoolName, $promotion, $id) {
        try {
            $school = EloquentSchoolRepository::getByName($schoolName);
            $requestedClass = [];
            foreach ($school['classes'][$promotion] as $class) {
                if ($class['id'] == $id) {
                    $requestedClass = $class;
                }
            }

            $school['class'] = $requestedClass;
            if (empty($requestedClass) || empty($requestedClass['orla'])) {
                throw new GradeNotFoundException();
            }
            $password = $request->get('password');
            if ($password && (Hash::check($password, $requestedClass['orla']['password']) || Hash::check($password, $school['master_password']))) {
                Cookie::queue(cookie('login_'.$id, true, 2880));
                return response()->view('orlas-watcher', ['data' => $school]);
            }

            return back()->withInput()->withErrors(['password' => 'La contraseña introducida es incorrecta.']);

        } catch (GradeNotFoundException $e) {
            throw $e;
        }
    }
}//utmz utma stripe_mid fbp ga
