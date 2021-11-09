<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Registrar Cuenta</title>
</head>

<body>

<form method="post" action="{{ route('register') }}" id="miformulario"
      onsubmit="verificarPasswords(); return verificarPasswords()">
    @csrf
    <section class="form-register">
        <h2 style="text-align: center">Formulario de Registro</h2>


            <label for="nombre_doctor">Nombre:</label>
            <input type="text" style="margin-left:5%; width:385px"
                   pattern="^[A-Za-záéíóú \s]{2,20}"
                   title="Debe ingresar un nombre valido, ejemplo: Andrea"
                   id="nombre_doctor"
                   required
                   placeholder="Ingrese su nombre"
                   name="nombre_doctor" class="controls @error('nombre_doctor') is-invalid @enderror">
            @if ($errors->has('nombre_doctor'))
                <p>{{ $errors->first('nombre_doctor') }}</p>
            @endif



            <label  size="50" style="margin-left:5%" for="apellido_doctor">Apellido:</label>
            <input type="text"  style="margin-left:6.76%; width:380px" maxlength="45"
                   pattern="^[A-Za-záéíóú \s]{2,20}"
                   title="Debe ingresar un apellido valido, ejemplo: Valle"
                   id="apellido_doctor" required
                   placeholder="Ingrese su apellido"
                   name="apellido_doctor" class="controls @error('apellido_doctor') is-invalid @enderror">
            @if ($errors->has('apellido_doctor'))
                <p>{{ $errors->first('apellido_doctor') }}</p>
            @endif
<br>


            <label for="identidad">Identidad:</label>
            <input type="text" style="margin-left:4.5%; width:385px"
                   pattern="[0-9]{4}[-]{1}[0-9]{4}[-]{1}[0-9]{5}"
                   title="Debe ingresar un número de identidad valido, ejemplo: 0713-1990-00918"
                   id="identidad"
                   required
                   placeholder="Ingrese su número de identidad"
                   name="identidad" class="controls  @error('identidad') is-invalid @enderror">
            @if ($errors->has('identidad'))
                <p>{{ $errors->first('identidad') }}</p>
            @endif



            <label style="margin-left:5%" for="email">Correo Electronico:</label>
            <input type="email" style="margin-left:1%; width:380px"
                   pattern="^[a-z0-9._%+-]+@gmail.[a-z]{2,3}$"
                   title="Debe ingresar una dirección de correo electronico valida, ejemplo: acimed@gmail.com"
                   id="email"
                   required
                   placeholder="Ingrese su correo electronico"
                   name="email"
                   class="controls  @error('email') is-invalid @enderror">
            @if ($errors->has('email'))
                <p>{{ $errors->first('email') }}</p>
            @endif
        <br>

            <label for="direccion">Dirección:</label>
            <input type="text" style="margin-left:4.3%; width:385px"
                   pattern="[A-Za-z0-9.°áéíóú ]{2,25}"
                   title="Debe ingresar una dirección valida, ejemplo: Col. Nacional N°1"
                   id="direccion"
                   required
                   placeholder="Ingrese su dirección"
                   name="direccion"
                   class="controls  @error('direccion') is-invalid @enderror">
            @if ($errors->has('direccion'))
                <p>{{ $errors->first('direccion') }}</p>
            @endif



            <label style="margin-left:5%" for="telefono">Teléfono:</label>
            <input type="tel" style="margin-left:6.9%; width:380px"
                   pattern="[0-9]{4}[-]{1}[0-9]{4}"
                   title="Debe ingresar un número de teléfono valido, ejemplo: 9988-9978"
                   id="direccion"
                   required
                   placeholder="Ingrese su número de teléfono"
                   name="telefono"
                   class="controls  @error('telefono') is-invalid @enderror">
            @if ($errors->has('telefono'))
                <p>{{ $errors->first('telefono') }}</p>
            @endif






        <br>


            <label for="contraseña">Contraseña:</label>
            <input type="password" style="margin-left:3.4%; width:380px"
                   pattern="[A-Za-z0-9.-$ ]{8,15}"
                   title="Debe ingresar una contraseña valida, puede incluir mayusculas, minusculas, números, y los simbolos (. - $) "
                   id="password"
                   required
                   placeholder="Ingrese su contraseña"
                   name="password"
                   class="controls  @error('password') is-invalid @enderror">
            @if ($errors->has('password'))
                <p>{{ $errors->first('password') }}</p>
            @endif


            <label style="margin-left:5%" for="contraseña">Confirme Contraseña:</label>
            <input type="password" style="margin-left:0.2%; width:360px"
                   pattern="[A-Za-z0-9.-$ ]{8,15}"
                   title="Las contraseñas deben coincidir"
                   id="password_confirm"
                   required
                   placeholder="Confirme su contraseña"
                   name="password_confirm"
                   class="controls  @error('password_confirm') is-invalid @enderror">
            @if ($errors->has('password_confirm'))
                <p>{{ $errors->first('password_confirm') }}</p>
            @endif


        <div id="msg">
            <!-- Mensajes de Verificación -->
            <div id="error" style="text-align: center" class="alert alert-danger ocultar" role="alert">
                Las Contraseñas no coinciden, vuelve a intentar !
            </div>
            <div id="ok" style="text-align: center" class="alert alert-success ocultar" role="alert">
                Las Contraseñas coinciden ¡Procesando información!
            </div>
            <!-- Fin Mensajes de Verificación -->
        </div>
<div align="center">
        <input class="botons" type="submit" id="registrar" onclick="mostrarToast()" value="Registrar">
        <input class="botons" type="reset" id="limpiar" value="Limpiar">
        </div>
        <p>¿Ya tienes una cuenta?<a href=" /login"> Inicia sesión</a></p>
    </section>
</form>

<script type="text/javascript">
    function verificarPasswords() {

        // Obtenemos los valores de los campos de contraseñas
        password = document.getElementById('password');
        password_confirm = document.getElementById('password_confirm');

        // Verificamos si las constraseñas no coinciden
        if (password.value != password_confirm.value) {

            // Si las constraseñas no coinciden mostramos un mensaje
            document.getElementById("error").classList.add("mostrar");

            return false;

        } else {

            // Si las contraseñas coinciden ocultamos el mensaje de error
            document.getElementById("error").classList.remove("mostrar");

            // Mostramos un mensaje mencionando que las Contraseñas coinciden
            document.getElementById("ok").classList.remove("ocultar");

            // Habilitamos el botón de login
            document.getElementById("registrar").disabled = true;

            // Refrescamos la página (Simulación de envío del formulario)
            //setTimeout("Redirect()", 5000);

            setTimeout(function () {
                location.reload();
            }, 5000);

            return true;
        }
    }
</script>
</body>
</html>

