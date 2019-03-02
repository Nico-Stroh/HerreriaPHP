<div class="container">
    <a href="#demo" class="btn btn-lg btn-block btn btn-success" data-toggle="collapse">Nuevo Trabajo</a>
    <div id="demo" class="collapse">
        <div class="form">
            <div class="card card-body">
                <form action="guardar.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Titulo</h4>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="titulo" class="form-control" placeholder="Titulo" autofocus
                                require>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Fecha</h4>
                        </div>
                        <div class="col-sm-8">
                            <input type="date" name="fecha" min="2010-01-1" max="2030-12-31" step="1"
                                class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Cliente</h4>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="cliente" class="form-control" placeholder="Cliente" autofocus
                                require>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Precio</h4>
                        </div>
                        <div class="col-sm-8">
                            <input type="number" name="precio" class="form-control" placeholder="Precio" min="0"
                                autofocus require>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input type="checkbox" id="mePago" name="pago" cheked>
                            <label for="mePago"><br>
                                <h5>Me Pago</h5>
                            </Label>
                        </div>
                        <div class="col-sm-8">
                            <h4>Calificacion</h1>
                                <select name="calificacion" class="form-control" style='font-size=50px;'>
                                    <option value="1">♥</option>
                                    <option value="2">♥♥</option>
                                    <option value="3">♥♥♥</option>
                                    <option value="4">♥♥♥♥</option>
                                    <option value="5">♥♥♥♥♥</option>
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div id="visorArchivo">
                            <h4>Foto</h4>
                        </div>
                        <input type="file" name="foto" id="archivoInput" class="form-control"
                            onchange="return validarExt()"><br>
                    </div>
                    <input type="submit" name="guardar" class="btn btn-lg  btn-block btn btn-success" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>
<img width='500px' src='imagenes/Blacksmith.png'>
</div>