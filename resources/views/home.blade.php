<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supermercado Home</title>
</head>
<body>

    
    <h2 align="center">SUPERMERCADO - MENU DE OPCIONES - PAGINA PRINCIPAL</h2><br>

   


    <div>
        <a href={{route('producto.create')}}>Alta de Producto</a><br><br>
        <a href={{route('producto.showAll')}}>Listado de Productos</a>

        <br><br><br><br>
        <div><a href={{route('logout')}}>Cerrar Sesión</a></div><br>
    </div>

    
</body>
</html>