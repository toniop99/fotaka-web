@extends('layout')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Orla {{$data['class']['name']}} - Promoción: {{$data['class']['promotion']}} - {{$data['name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Escribe la contraseña para poder visualizar la orla</h6>
                <form method="POST" action="{{route('orlas-login', ['schoolName' => $data['name'], 'promotion' => $data['class']['promotion'], 'id' => $data['class']['id']])}}">
                    @csrf
                    <div class="mb-3">
                        @error('password')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror

                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control @error('password')" is-invalid @enderror id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>

    </div>
@endsection
