<div class="card px-5">
    <div class="full-w text-center pt-10 flex justify-center items-center ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
        </svg>
        <label class="font-bold uppercase text-center text-lg text-gray-600">Pacientes</label>
    </div>

    <x-button-link href="#">
        Crear Nuevo
    </x-button-link>

    <div class="card-body">


        <div class="shadow-md rounded my-6 overflow-x-auto">


            <table class="min-w-max w-full table-auto bg-white ">
                <thead class=" text-gray-600 font-bold py-2 uppercase text-center text-sm items-center leading-normal">
                    <tr>
                        <td class="py-4">Nombres</td>
                        <td>Apellidos</td>
                        <td>Identidad</td>
                        <td>Correo</td>
                        <td>Teléfono</td>
                        <td></td>

                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($pacientes as $paciente)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-2 text-center whitespace-nowrap">{{ $paciente->nombres }} </td>
                            <td class="px-6 py-2 text-center whitespace-nowrap">{{ $paciente->apellidos }} </td>
                            <td class="px-6 py-2 text-center whitespace-nowrap">{{ $paciente->identidad }} </td>
                            <td class="px-6 py-2 text-center whitespace-nowrap">{{ $paciente->email }} </td>
                            <td class="px-6 py-2 text-center whitespace-nowrap">{{ $paciente->telefono }} </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <x-table-button href="#">
                                    Editar
                                </x-table-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>



            </table>
            {{ $pacientes->links() }}

        </div>

    </div>

</div>
