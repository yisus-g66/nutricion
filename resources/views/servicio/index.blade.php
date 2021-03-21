@extends('Layout')
@section('title', 'Home')
@section('contenido')
    <center>
        <h2>Lista de Servicios</h2>
    </center>
    <div class="form-row">
        <div class=" col-md-1 mb-2">
            <?php
            if(empty($buscar)){$buscarpdf= ' ';}
            if(empty($tipo)){$tipo= ' ';}
            $buscarpdf = $tipo.':'.$buscar;
            ?>
        </div>
        <div class="col-md-3 mb-2"> </div>
        <div class="col-md-3 mb-2">
            
        </div>
        <div class="col-md-2 mb-2">
            <form class="form-inline">
                <select name="tipo" class="form-control">
                    <option>Buscar por </option>
                    <option value="serv_name">Nombre Servicio</option>
                    <option value="serv_description">Descripción</option>
                </select>
        </div>
        <div class="col-md-3 mb-2">
                <div class="input-group ">
                    <input name="buscar" class="form-control" type="search" placeholder="Ingrese datos de busqueda"
                        aria-label="Search" value="{{ $buscar }}">
                    <div class="input-group-append">
                        <button class="btn icon-fon" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                </form>
        </div>
    </div>

    <table style="text-align: center" class="table table-hover table-responsive-xl">
        <thead class="table-color">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Creado Por:</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
                <tr>
                    <th scope="row">{{ $dt->serv_id }}</th>
                    <td>{{ $dt->serv_name }}</td>
                    <td>{{ $dt->serv_description }}</td>
                    <td>{{ $dt->user_id_create }}</td>
                    @if ($dt->serv_state == '1')
                    <td class="badge" style="background-color: #00796b; color:white;">Activo</td>    
                    @elseif($dt->serv_state == '0')
                    <td class="badge badge-danger">Inactivo</td>                        
                    @endif
                    <td>{{ $dt->created_at }}</td>
                    <td>
                        <form action="{{ route('servicio.destroy', $dt->serv_id) }}" class="formulario" method="post">
                            @csrf @method('DELETE')
                            <a href="{{ route('servicio.show', $dt->serv_id) }}"><i title="Ver más" class="fa fa-eye icon">
                                </i></a>
                            <a href="{{ route('servicio.edit', $dt->serv_id) }}"><i title="Editar"
                                    class="fa fa-edit icon"></i></a>
                            @if ($dt->serv_state == '0')
                                <input type="hidden" name="estado" value="1">
                                <button class="btn-delete" onclick="confirmar();">
                                    <i title="Restaurar" class="fas fa-redo icon"></i> </button>
                                </button>
                            @else
                                <input type="hidden" name="estado" value="0">
                                <button class="btn-delete" onclick="confirmar();">
                                    <i title="Eliminar" class="fas fa-trash-alt icon"></i>
                                </button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example " class="float-right">
        <ul class="pagination">
            <li class=" {{ $data->currentPage() == 1 ? ' disabled' : '' }} page-item"><a class="page-link"
                    href="{{ $data->url(1) }}">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                <li class="{{ $data->currentPage() == $i ? ' seleccionar ' : '' }} page-item">
                    <a class=" page-link " href="{{ $data->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ $data->currentPage() == $data->lastPage() ? ' disabled' : '' }} page-item">
                <a href="{{ $data->url($data->currentPage() + 1) }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
