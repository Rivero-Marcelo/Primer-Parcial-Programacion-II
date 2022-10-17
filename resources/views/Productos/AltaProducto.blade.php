<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Producto</title>
</head>
<body>

<h1>ALTA DE PRODUCTO</h1>
<br>

<form action={{route('producto.store')}} method="post">
    @csrf
<b>Creado por: {{auth()->user()->name }} {{auth()->user()->apellido}} </b> <br>
<b>E-mail:</b> {{auth()->user()->email}} <br>
<b> Fecha:</b> {{date('d-m-Y')}} 
<br><br>

<b>Titulo:</b> <br><input type="text" name="titulo" size="49"><br><br>

<textarea name="cuerpo" rows="15" cols="50"></textarea><br><br>


<input type="submit" value="Publicar">

</form>

@if(session('success'))
        <br>
        <div style="color: red;">{{session('success')}}</div>
@endif
        <br>

@if($errors->any())
<br>
    @foreach ($errors->all() as $error)
    <div style="color: red;">{{$error}}</div>
    @endforeach
@endif
 
<br>
<a href={{route('home')}}>Volver</a>
    
</body>
</html>