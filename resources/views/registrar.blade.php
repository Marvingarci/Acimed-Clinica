<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Registrar</title>
</head>

<body>
    <div class="flex flex-col justify-center h-screen w-screen items-center">

        <h1 class="text-center text-2xl font-bold text-gray-800">Registro de Paciente</h1>

        <div class="shadow-2xl rounded-xl p-10">
            <form method="POST" action="{{ route('registrar.paciente') }}">

                @csrf

                <div class="grid grid-cols-2 gap-4 ">
                    <x-input-text name="nombres" :label="'Nombres'"
                        value="{{ old('nombres') ? old('nombres') : '' }}">
                        @error('nombres')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </x-input-text>

                    <x-input-text name="apellidos" :label="'Apellidos'"
                        value="{{ old('apellidos') ? old('apellidos') : '' }}">
                        @error('apellidos')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </x-input-text>

                    <x-input-text name="email" :label="'Corre electrónico'"
                        value="{{ old('email') ? old('email') : '' }}">
                        @error('email')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </x-input-text>

                    <x-input-text name="identidad" :label="'Identidad'"
                        value="{{ old('identidad') ? old('identidad') : '' }}">
                        @error('identidad')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </x-input-text>

                    <x-input-text name="direccion" :label="'Dirección'"
                        value="{{ old('direccion') ? old('direccion') : '' }}">
                        @error('direccion')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </x-input-text>

                    <x-input-text name="telefono" :label="'Teléfono'"
                        value="{{ old('telefono') ? old('telefono') : '' }}">
                        @error('telefono')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </x-input-text>

                </div>

                <div class="flex gap-2 justify-center mt-5">
                    <x-button-link href="{{ route('login') }}">
                        Cancelar
                    </x-button-link>
                    <x-button-submit type="submit">
                        Registrar
                    </x-button-submit>
                </div>

            </form>
        </div>
    </div>
</body>

</html>
