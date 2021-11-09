
@extends('home')

@section('content')
<div class="container">
    <div style="height:0px"></div>
    <p class="lead">
    <h3>Calendario de Citas Médicas</h3>
    <a class="btn-ingresar" type="submit" href="{{route ('citas_index')}}">Crear Cita</a>
    <hr>

    <div class="row header-calendar" >

        <div class="col" style="display: flex; justify-content: space-between; padding: 0px;">
            <a  href="{{ asset('/Evento/creado/') }}/<?= $data['last']; ?>" style="margin:15px;">
                <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
            </a>
            <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
            <a  href="{{ asset('/Evento/creado/') }}/<?= $data['next']; ?>" style="margin:15px;">
                <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
            </a>
        </div>

    </div>
    <div class="row">
        <div class="col header-col">Lunes</div>
        <div class="col header-col">Martes</div>
        <div class="col header-col">Miercoles</div>
        <div class="col header-col">Jueves</div>
        <div class="col header-col">Viernes</div>
        <div class="col header-col">Sabado</div>
        <div class="col header-col">Domingo</div>
    </div>


    @foreach ($data['calendar'] as $weekdata)
        <div class="row">
            <!-- ciclo de dia por semana -->
            @foreach  ($weekdata['datos'] as $dayweek)

                @if  ($dayweek['mes']==$mes)
                    <div class="col box-day">
                    {{ $dayweek['dia']  }}
                    <!-- evento -->
                        @foreach  ($dayweek['evento'] as $evento)
                            <a class="badge badge-primary" href="{{ route('Evento.details', ['id'=>$evento->id])}}">
                                {{ $evento->motivo }}
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="col box-dayoff">
                    </div>
                @endif


            @endforeach
</div>
    @endforeach

    @endsection