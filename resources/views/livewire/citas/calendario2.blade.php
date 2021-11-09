<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<div class="px-10 bg-white">
    <div style="height:0px"></div>
    <p class="lead">
    <h1 class="font-bold uppercase text-center text-lg text-gray-600">Calendario de Citas Médicas</h1>
    <a class="btn-ingresar" type="submit" href="{{ route('citas') }}">Crear Cita</a>
    <hr>

    <div class="row header-calendar">

        <div class="col bg-purple-400" style="display: flex; justify-content: space-between; padding: 0px;">
            <a href="{{ asset('/citas/calendario/') }}/<?= $data['last'] ?>" style="margin:15px;">
                <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
            </a>
            <h2 style="font-weight:bold;margin:10px;"><?= $mespanish ?> <small><?= $data['year'] ?></small></h2>
            <a href="{{ asset('/citas/calendario/') }}/<?= $data['next'] ?>" style="margin:15px;">
                <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
            </a>
        </div>

    </div>
    <div class="row bg-white">
        <div class="col header-col ">Lunes</div>
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
            @foreach ($weekdata['datos'] as $dayweek)

                @if ($dayweek['mes'] == $mes)
                    <div class="col box-day">
                        {{ $dayweek['dia'] }}
                        <!-- evento -->
                        @foreach ($dayweek['evento'] as $evento)
                            <a class="badge bg-purple-600 text-red-50"
                                href="{{ route('detalleCita', ['id' => $evento->id]) }}">
                                {{ $evento->nombre_paciente }}
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
