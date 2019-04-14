@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/products/create">Administrar</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Ver Usuarios</li>
                        </ol>
                    </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Usuarios
                    </div>
                    <div class="card-body">
                        <table class="DataTable table table-bordered">
                            <thead>
                                <tr>
                                  <th>Nombre de la Empresa:</th>
                                  <th>Teléfono Fijo:</th>
                                  <th>Persona de Contacto:</th>
                                  <th>Teléfono Celular:</th>
                                  <th>Email:</th>
                                  <th>Ciudad:</th>
                                  <th>RIF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{!!$user->company!!}</td>
                                    <td>{!!$user->telephone!!}</td>
                                    <td>{!!$user->name!!}</td>
                                    <td>{!!$user->cellphone!!}</td>
                                    <td>{!!$user->email!!}</td>
                                    <td>{!!$user->city!!}</td>
                                    <td>{!!$user->rif!!}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection