@extends('home')

@section('content')

<div class="container flex-row items-center justify-center h-full rounded-xl px-10 px-auto ">
    <p class="lead">
    <p class="text-center pt-5 pl-3 font-bold uppercase text-xl text-gray-600" >Cita Programada</p>
    <p class="text-center pl-3" >Detalles de la Cita</p>
    <hr>

    <div class="px-30" >
        <form class="mx-60 px-5 bg-white rounded-2xl"  action="{{ asset('/Evento/create/') }}" method="post">
        <div class="text-center items_center">
                <h4 class=" text-gray-600 font-bold py-2 text-lg items-center leading-normal">Doctor</h4>
                {{ $event->doctor->nombre_doctor." ".$event->doctor->apellido_doctor }}
            </div>
            <hr>
            <div class="text-center items_center">
                <h4 class=" text-gray-600 font-bold py-2 text-lg items-center leading-normal">Descripción del evento</h4>
                {{ $event->motivo }}
            </div>
            <hr>
            <div class="text-center items_center">
                <h4 class=" text-gray-600 font-bold py-2 text-lg items-center leading-normal">Fecha</h4>
                {{ $event->fecha }}
            </div>
            <hr>
            <div class="text-center items_center">
                <h4  class=" text-gray-600 font-bold py-2 text-lg items-center leading-normal">Hora</h4>
                {{ $event->hora }}
            </div>
            <br>
            <div class="items-center flex justify-center">
            <a class=" px-20 py-2 text-white font-bold bg-green-400 rounded-2xl"  href="{{ route('Evento.index') }}">Atras</a>
            </div>
        </form>
    </div>


    <!-- inicio de semana -->


</div> <!-- /container -->

@endsection


<!-- 
<footer class="page-footer font-small blue pt-4">
    <div class="footer-copyright text-center py-3">
    </div>
</footer>

</body>
</html> -->
