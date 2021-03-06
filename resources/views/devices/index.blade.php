@extends('layouts.admin')

@section('content')
  @section('tittleSite', auth()->user()->name  )
  @section('page_description','Editar Dispositivo')
  <div class="page-content-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-20">
          <div class="card-body">
            <div class="flash-message" id="success-alert">
              @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
              @endforeach
            </div>
            <table id="datatable" class="text-center table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Dispositivo</th>
                  <th>Descripcion</th>
                  <th>Ubicación</th>
                  @if (auth()->user()->role_id == 2)
                    <th>Users</th>
                  @endif
                  <th>Creado/Actualizado</th>
                  <th>Datos</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($devices as $device)
                  <tr>
                    <td>{{ $device->custom_id }} </td>
                    <td>{{ $device->name }} </td>
                    <td>{{ $device->description }} </td>
                    <td>{{ $device->location }} </td>
                    @if (auth()->user()->role_id == 2)
                      <td>{{ $device->user->name }} </td>
                    @endif
                    <td>{{$device->updated_at->modify('-6 hours')->format('d F -  H:i') }}</td>
                    <td> <a href="{{url('records/'. $device->custom_id)}}" class="btn btn-outline-dark"> Ver Lecturas <i class="mdi mdi-clipboard-outline "></i>   </a> </td>
                    <td> <a href="{{url('device/'. $device->id .'/edit')}}" class="btn btn-outline-primary"> Editar <i class="mdi mdi-square-edit-outline"></i>   </a> </td>
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
