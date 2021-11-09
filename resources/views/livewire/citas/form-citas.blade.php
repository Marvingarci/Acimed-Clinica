<div class="card px-5 flex flex-col justify-center">
    <div class="full-w text-center pt-10 flex justify-center items-center ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        <label class="font-bold uppercase text-center text-lg text-gray-600">Citas</label>
    </div>
    <br>

    <div class="bg-white rounded-lg w-full h-full justify-center">
        <div class="bg-purple-400 h-2 w-full rounded-t-lg"></div>

        @if (session()->has('message'))
            @if (session('message') == 'Cita guardada con éxito' || 'Cita editada con éxito')
                <div class="text-center font-bold text-green-500 bg-green-200 rounded-lg m-5 p-2">
                    {{ session('message') }}
                </div>
            @else
                <div class="text-center font-bold text-red-500 bg-red-200 rounded-lg m-5 p-2">
                    {{ session('message') }}
                </div>
            @endif
        @endif

        <form wire:submit.prevent="guardar_cita()">

            <div class="grid grid-cols-2 gap-4 p-5">

                <div class="flex flex-col">
                    <label class="text-lg text-gray-500">Doctores</label>
                    <select wire:change="setCitas($event.target.value)"
                        class="rounded-xl p-3 focus:outline-none border-2 mb-2" required>
                        <option value="0" class="text-gray-600 font-bold py-2 text-lg items-center leading-normal"
                            selected>
                            Seleccione a un Doctor</option>
                        @foreach ($doctores as $doctor)
                            <option value="{{ $doctor->id }}">
                                {{ "{$doctor->nombre_doctor} {$doctor->apellido_doctor} ({$doctor->especialidad})"  }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <x-input-text type="date" name="fecha" :label="'Fecha'" wire:model="data.fecha" required>
                    <label class="text-sm text-blue-500">{{ $fecha_aviso }}</label>
                    <label class="text-sm text-red-500">{{ $dia_error }}</label>
                    @error('data.fecha') <span class="alert alert-danger">{{ $message }}</span> @enderror
                </x-input-text>

                <x-input-text type="time" min="{{ $hora_inicio }}" max="{{ $hora_final }}" :label="'Hora'"
                    wire:model="data.hora" required>
                    <label class="text-sm text-blue-500">{{ $hora_aviso }}</label>
                    @error('data.hora') <span class="alert alert-danger">{{ $message }}</span> @enderror
                </x-input-text>


                <x-input-text :label="'Paciente'" wire:model="data.nombre_paciente" required>
                    @error('data.nombre_paciente') <span class="alert alert-danger">{{ $message }}</span>@enderror
                </x-input-text>

            </div>

            <div class="flex justify-end pr-5 pb-5">

                @if ($modoEdicion == true)
                    <div class="flex gap-2 col-start-2">
                        <x-button-submit wire.click="()=>{$this->modoEditar = false;}">
                            Cancelar
                        </x-button-submit>
                        <x-button-submit type="submit">
                            Editar
                        </x-button-submit>
                    </div>
                @else
                    <x-button-submit type="submit">
                        Guardar
                    </x-button-submit>
                @endif

            </div>

        </form>
    </div>

    <br/>

    <table class="min-w-max w-full table-auto bg-white px-5">
        <thead
            class="bg-gray-200 text-gray-600 font-bold py-2 uppercase text-center text-sm items-center leading-normal">
            <tr>
                <th>Paciente</th>
                <th>Día</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($citasPorDoctor as $cita)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="px-6 py-2 text-center whitespace-nowrap">{{ $cita->nombre_paciente }}</td>
                    <td class="px-6 py-2 text-center whitespace-nowrap">{{ $cita->dia }}</td>
                    <td class="px-6 py-2 text-center whitespace-nowrap">{{ $cita->fecha }}</td>
                    <td class="px-6 py-2 text-center whitespace-nowrap">{{ $cita->hora }}</td>
                    <td class="px-6 py-2 text-center whitespace-nowrap">{{ $cita->estado }}</td>
                    <td>
                        <a href="#" wire:click="editarCita({{ $cita }})" data-toggle="modal"
                            data-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
