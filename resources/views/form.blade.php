<html>
<head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Exo', sans-serif;
        }
        .header-col{
            background: #E3E9E5;
            color:#536170;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .header-calendar{
            background: #EE192D;color:white;
        }
        .box-day{
            border:1px solid #E3E9E5;
            height:150px;
        }
        .box-dayoff{
            border:1px solid #E3E9E5;
            height:150px;
            background-color: #ccd1ce;
        }
    </style>

</head>

<body>
<a class="btn btn-default"  href="{{ route('Evento.index')}}">Atras</a>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="">
    @csrf
    <div class="container">
        <div style="height:50px"></div>
        <h1> Agendar Cita </h1>

        <div class="form-group">
            <label for="titulo"> Titulo </label>
            <input type="text" class="form-control" name="titulo" id="titulo"
                   placeholder="Titulo">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion"
                   placeholder="Descripcion del evento ">
        </div>

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" name="fecha" id="fecha"
                   placeholder= "fecha">
        </div>
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" name="hora" min="07:00" max="21:00" step="3600"
                   placeholder= "hora">
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>


</body>
</html>
