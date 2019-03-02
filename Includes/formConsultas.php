<form class="form-inline" action="index.php" method="POST">
    <div class="form-group">

        <select name="orden" class="form-control">
            <option value=1>Ordenar por Titulo</option>
            <option value=2>Ordenar por Fecha</option>
            <option value=3>Ordenar por Cliente</option>
            <option value=4>Ordenar por Precio</option>
            <option value=5>Ordenar por Calificacion</option>
        </select>

        <select name="pago" class="form-control">
            <option value=1>Todos los trabajos</option>
            <option value=2>Los Pagos</option>
            <option value=3>Los No Pagos</option>
        </select>

        <select name="opcion" class="form-control">
            <option value=1>Buscar por Titulo</option>
            <option value=2>Buscar por Cliente</option>
            <option value=3>Precio Minimo</option>
            <option value=5>Precio Maximo</option>
        </select>

        <input type="text" name="titulo" class="form-control" placeholder="Ingrese valor a buscar" autofocus require>
    </div>
    <div class="form-group">
        <input type="submit" name="buscar" class="btn btn-lg  btn-block btn btn-success" value="Buscar">
    </div>
</form>