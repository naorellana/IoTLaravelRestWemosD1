@extends('layouts.roles.SuperAdmin')

@section('content')
  @section('page_title','Registros')
  @section('page_description','Bitacora de registros')
  <style type="text/css">

        .shop-card {
            background: #f5f5f5;
            box-shadow: 0 10px 20px rgba(0,0,0,.3);
            overflow: hidden;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
        }

    </style>
  <div class="page-content-wrapper">
    <div class="page-content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body ">
                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Revisión de dispositivo</h4>
                        <p class="text-muted text-center">Buscar dispositivo</p>

                        <form class="" action="{{url('search')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="code">Numero de dispositivo</label>
                                    <input type="text" class="form-control" name="code" id="code" placeholder="Numero de dispositivo">
                                </div>
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button  type="submit" class="btn btn-success btn-block btn-lg  waves-effectk">Buscar <i class="fas fa-search"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>{{--
    <div class="row">
      <div class="col-12">
        <div class="card m-b-20">
          <div class="card-body">
            <div class="row">
              @foreach($records as $record)
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3">
                <div class="shop-card">
                  <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mt-3">

                        <p class="h2"> Dispositivo <span class="badge badge-primary mb-2">{{$record->device}} </span></p>
                        <div class="progress progress-bar-animated m-b-10 " style="height: 5em;">
                            <div class="progress-bar progress-bar-striped  progress-bar-animated bg-success text-center" role="progressbar" style='width: {{round(($record->number3 -3.6 ) * 100 /0.6)}}%;' aria-valuemin="0" aria-valuemax="100"><h3 class="">{{round(($record->number3 -3.6 ) * 100 /0.6) }}% <i class="mdi mdi-battery-charging"></i></h3>  </div>
                        </div>
                        <div class="desc mt-5">
                          Ultima lectura: {{$record->created_at->format('d F, Y H:i')}}
                        </div>
                    </div>
                    <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 mt-3">
                      <p class="h2"> {{$record->string1}} <br> <span class="badge badge-primary">{{$record->number1}} %</span></p>
                      <img src="https://image.flaticon.com/icons/svg/1809/1809570.svg" class="mx-auto d-block" width="30%">
                    </div>
                    <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 mt-3">
                      <p class="h2"> {{$record->string2}} <br> <span class="badge badge-danger">{{$record->number2}} C°</span></p>
                      <img src="https://image.flaticon.com/icons/svg/1113/1113779.svg" class="mx-auto d-block" width="30%">
                    </div>
                  </div>
                  <div class="slider ">

                  </div>

                  <form action="{{url('/tracking')}}" method="POST" >
                    @csrf
                    <input type="hidden" class="btn btn-block btn-lg btn-warning" value="Por enviar">
                    <input type="hidden" name="status_del" value="2">
                    <input type="hidden" name="selct" value="3">
                  </form>
                </div>
              </div>
            @endforeach

            </div>


          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
@section('sectionJS')
  <script type="text/javascript">
function validateMyForm()
{
  let inputVal = document.getElementById("code").value;
  alert("validation failed test" + inputVal);
if(1>0)
{

  alert("validation failed false" . inputVal);
  returnToPreviousPage();
  return false;
}

alert("validations passed" . inputVal);
return true;
}
</script>
</script>
@endsection
