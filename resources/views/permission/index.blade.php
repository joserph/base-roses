@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Permisos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-rol')
                                <a class="btn btn-info" href="{{ route('permissions.create') }}"><i class="fas fa-plus-circle"></i> Crear</a>
                            @endcan
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead style="background-color: #6777ef;">
                                    <tr>
                                        <th style="color: #fff" scope="col">Permiso</th>
                                        <th style="color: #fff" scope="col">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <th scope="row">{{ $permission->name }}</th>
                                                <td>
                                                    @can('editar-rol')
                                                        <a class="btn btn-warning" href="{{ route('permissions.edit', $permission->id) }}"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    @can('borrar-rol')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {{ $permissions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
