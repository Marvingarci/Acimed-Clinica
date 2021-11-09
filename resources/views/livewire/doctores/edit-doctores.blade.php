<form wire:submit.prevent="edit" method="POST">
    <div class="bg-white p-10 m-10 rounded">
        <div class="flex space-x-3 justify-center items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            <h2 class="text-center text-2xl font-bold text-gray-800">Editar Doctor</h2>
        </div>
        <div class="grid grid-cols-2 gap-4">

            <div class="flex flex-col">
                <x-input-text wire:model="data.nombre_doctor" type="text" id="nombres" name="nombres" required
                    :label="'Nombres *'" />
                @error('data.nombre_doctor')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <x-input-text wire:model="data.apellido_doctor" type="text" id="apellidos" name="apellidos" required
                    :label="'Apellidos *'" />
                @error('data.apellido_doctor')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="flex flex-col">
                <x-input-text wire:model="data.identidad" :label="'N° Identidad *'" type="text" id="identidad"
                    name="identidad" required />
                @error('data.identidad')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <x-input-text wire:model="data.email" :label="'Correo electronico *'" type="text" id="correo"
                    name="correo" required />
                @error('data.email')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <x-input-text wire:model="data.direccion" :label="'Dirección *'" type="text" id="direccion"
                    name="direccion" required />
                @error('data.direccion')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex flex-col">
                <x-input-text wire:model="data.telefono" :label="'Telefono/Celular *'" type="text" id="telefono"
                    name="telefono" required />
                @error('data.telefono')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="flex flex-col">
                <label class="text-lg text-gray-500">Especialidades *</label>
                <select wire:model="data.especialidad" class="rounded-xl border-2 p-2 form-control" required>
                    <option wire:key="Medico General" value="Medico General">Médico General</option>
                    <option value="Oftalmólogo">Oftalmólogo</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Cirujano Plástico">Cirujano Plástico</option>
                    <option value="Otorrinonaringologo">Otorrinonaringologo</option>
                    <option value="Cardiologo">Cardiologo</option>
                    <option value="Dermatólogo">Dermatólogo</option>
                </select>
            </div>

            <div class="flex flex-row gap-4 ">
                <div class="w-1/2 ">
                    <label class="text-lg text-gray-500">Hora Inicio *</label>
                    <input class="px-5 border-2 rounded-2xl focus:outline-none" type="time" min="08:00" max="17:00"
                        wire:model="data.hora_inicio" style="width: 100%; height: 34px;" list="listalimitestiempo"
                        required>
                </div>
                <div class="w-1/2 ">
                    <label class="text-lg text-gray-500">Hora Final *</label>
                    <input class="px-5 border-2 rounded-2xl focus:outline-none" type="time" min="08:00" max="17:00"
                        wire:model="data.hora_final" style="width: 100%; height: 34px;" list="listalimitestiempo"
                        required>
                </div>
            </div>
            <br>

            <div class="flex flex-col">
                <label class="text-lg text-gray-500">Dias de Atencion *</label>
                <div class="flex flex-col ">
                    <div class="">
                        <input wire:click="$set('dias.lunes', $event.target.checked)" wire:model="dias.lunes"
                            type="checkbox" id="cbox2" value="Lunes"> <label for="cbox2">Lunes</label>
                        <input wire:click="$set('dias.martes', $event.target.checked)" wire:model="dias.martes"
                            type="checkbox" id="cbox2" value="Martes"> <label for="cbox2">Martes</label>
                        <input wire:click="$set('dias.miercoles', $event.target.checked)" wire:model="dias.miercoles"
                            type="checkbox" id="cbox2" value="Miércoles"> <label for="cbox2">Miércoles</label>
                        <input wire:click="$set('dias.jueves', $event.target.checked)" wire:model="dias.jueves"
                            type="checkbox" id="cbox2" value="Jueves"> <label for="cbox2">Jueves</label>
                    </div>
                    <div>
                        <input wire:click="$set('dias.viernes', $event.target.checked)" wire:model="dias.viernes"
                            type="checkbox" id="cbox2" value="Viernes"> <label for="cbox2">Viernes</label>
                        <input wire:click="$set('dias.sabado', $event.target.checked)" wire:model="dias.sabado"
                            type="checkbox" id="cbox2" value="Sábado"> <label for="cbox2">Sábado</label>
                        <input wire:click="$set('dias.domingo', $event.target.checked)" wire:model="dias.domingo"
                            type="checkbox" id="cbox2" value="Domingo"> <label for="cbox2">Domingo</label>
                    </div>

                </div>

            </div>
        
        </div>

        <br />
        
        <div class="flex justify-center gap-2">
            <x-button-link href="{{ url('/doctores') }}">
                Cancelar
            </x-button-link>

            <x-button-submit type="submit">
                Editar
            </x-button-submit>
        </div>
    </div>

</form>
