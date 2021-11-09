<div class="container flex-row items-center justify-center h-full rounded-xl px-10 px-auto ">
    <p class="lead">
    <p class="text-center pt-5 pl-3 font-bold uppercase text-xl text-gray-600">Cita Programada</p>
    <p class="text-center pl-3">Detalles de la Cita</p>
    <hr>

    <div class="px-30">
        <form class="mx-60 px-5 bg-white rounded-2xl" action="{{ asset('/Evento/create/') }}" method="post">
            <div class="text-center items_center space-y-3">
                <h4 class=" text-gray-600 font-bold py-2 text-lg items-center leading-normal">Doctor</h4>
                {{ $event->doctor->nombre_doctor . ' ' . $event->doctor->apellido_doctor }}
            </div>
            <hr>
            <div class="text-center items_center">
                <h4 class=" text-gray-600 font-bold py-2 text-lg items-center leading-normal">Paciente</h4>
                {{ $event->nombre_paciente }}
            </div>
            <hr>
            <div class="text-center items_center">
                <h4 class=" text-gray-600 font-bold py-2 text-lg items-center leading-normal">Fecha</h4>
                {{ $event->fecha }}
            </div>
            <hr>
            <div class="text-center items_center">
                <h4 class=" text-gray-600 font-bold py-2 text-lg items-center leading-normal">Hora</h4>
                {{ $event->hora }}
            </div>
            <div class="items-center flex justify-center p-5">
                <x-button-link href="{{ route('calendario') }}">Atras</x-button-link>
            </div>
        </form>
    </div>

</div> <!-- /container -->
