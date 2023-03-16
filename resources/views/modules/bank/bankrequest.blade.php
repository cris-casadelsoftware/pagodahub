@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="mensajeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mensajeModalLabel">Mensaje de éxito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('mensaje') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Sección de scripts -->
    @if (session('mensaje'))
        {{-- {{ session('mensaje') }} --}}
        <script>
            $(document).ready(function() {
                $('#mensajeModal').modal('show');
            });
        </script>
    @endif

    <script>
        function obtenerSemana() {
            // Obtener la fecha seleccionada en el input
            let fechaSeleccionada = new Date(document.getElementById("fecha").value);

            // Obtener el número de la semana
            let numeroSemana = fechaSeleccionada.getWeek();

            // Mostrar el resultado en un elemento de la página
            document.getElementById("resultado").innerHTML = "La semana correspondiente a la fecha seleccionada es: " +
                numeroSemana;
            document.getElementById("week").value = numeroSemana;
            let fecha1 = document.getElementById("fecha");
            let fecha2 = document.getElementById("fecha2");
            // Obtener la fecha del primer input
            let fecha1Value = new Date(fecha1.value);
            console.log("Entra");
            // Obtener la fecha del segundo input
            let fecha2Value = new Date(fecha2.value);

            // Comparar las fechas y ajustar la fecha del segundo input si es anterior a la del primer input
            if (fecha2Value < fecha1Value) {
                fecha2Value = new Date(fecha1Value);
                fecha2.value = fecha2Value.toISOString().slice(0, 10);
            }
        }

        // Definir el método getWeek() para el objeto Date
        Date.prototype.getWeek = function() {
            let date = new Date(this.getTime());
            date.setHours(0, 0, 0, 0);
            date.setDate(date.getDate() + 4 - (date.getDay() || 7));
            let yearStart = new Date(date.getFullYear(), 0, 1);
            let weekNo = Math.ceil((((date - yearStart) / 86400000) + 1) / 7);
            return weekNo;
        }
    </script>


    <div class="p-2 m-0 border-0 bd-example">
        <form method="get" action="{{ route('home') }}">
            <button type="submit" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house" viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z">
                    </path>
                </svg>
                Menu
            </button>
        </form>
    </div>
    <div class="p-2 m-0 border-0 bd-example">
        <div class="card w-auto">
            <div class="card-header">

                <div class="fs-2 mb-3">
                    Solicitud
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                        class="bi bi-cash-coin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
                        <path
                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z">
                        </path>
                        <path
                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z">
                        </path>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
                    </svg>

                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="container text-center">
                        <form name="as" id="as" method="post" action="{{ route('bankrequest') }}">
                            <br>
                            @csrf
                            <div class="row row-cols-1 row-cols-sm-1">
                                <div class="col">
                                    <div class="input-group">
                                        <div class="container text-center">
                                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                                                <div class="col">
                                                    <div class="col text-start">
                                                        <label for="inputEmail4"
                                                            class="form-label  fs-5"><b>Desde</b></label>
                                                        <input type="date" id="fecha" class="form-control"
                                                            onchange="obtenerSemana()" name="fromdate" required>
                                                        <p id="resultado"></p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="col text-start">
                                                        <label for="inputEmail4"
                                                            class="form-label fs-5"><b>Hasta</b></label>
                                                        <input type="date" class="form-control" id="fecha2"
                                                            onchange="obtenerSemana()" name="todate" required>
                                                    </div>
                                                </div>
                                                <input style="display: none" type="text" class="form-control"
                                                    id="week" name="week" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <br>

                                    <div class="container text-center">
                                        <div class="text-start fs-5"><b>Efectivo</b></div>
                                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2">
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">$1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <input type="number" class="form-control" name="cash1" onchange=""
                                                        value="0" min="0">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">$5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <input type="number" class="form-control" name="cash5"
                                                        onchange="" value="0" min="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="container text-center">
                                        <div class="text-start fs-5"><b> Rollos de monedas </b></div>
                                        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-6">
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">B/. 0.01 &nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <input type="number" class="form-control" name="cash0-01"
                                                        onchange="" value="0" min="0">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">B/. 0.05 &nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <input type="number" class="form-control" name="cash0-05"
                                                        onchange="" value="0" min="0">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">B/. 0.10 &nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <input type="number" class="form-control" name="cash0-10"
                                                        onchange="" value="0" min="0">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">B/. 0.25 &nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <input type="number" class="form-control" name="cash0-25"
                                                        onchange="" value="0" min="0">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">B/. 0.50 &nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <input type="number" class="form-control" name="cash0-50"
                                                        onchange="" value="0" min="0">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">B/. 1.00 &nbsp;&nbsp;&nbsp;
                                                    </span>
                                                    <input type="number" class="form-control" name="cash1-00"
                                                        onchange="" value="0" min="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="container text-center">
                                        <div class="text-start fs-5"> <b> Abjunto de formulario </b></div>
                                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1">
                                            <div class="col">
                                                <div class="input-group mb-2">
                                                    <input class="form-control" accept="image/*" type="file"
                                                        id="formFile" name="" multiple
                                                        onchange="mostrarImagenesPrevias()">
                                                    <br>
                                                    <center>
                                                        <div id="imagenesPrevias"></div>
                                                    </center>
                                                    <script>
                                                        function mostrarImagenesPrevias() {
                                                            var archivos = document.querySelector('#formFile').files;
                                                            var imagenesPreviasDiv = document.querySelector('#imagenesPrevias');
                                                            for (var i = 0; i < archivos.length; i++) {
                                                                var archivo = archivos[i];
                                                                var lector = new FileReader();
                                                                lector.onload = (function(archivo) {
                                                                    return function(e) {
                                                                        var imagenPrevia = document.createElement('img');
                                                                        var archivoimg = document.createElement('textarea');
                                                                        imagenPrevia.src = e.target.result;
                                                                        archivoimg.name = "archivosimg[]";
                                                                        archivoimg.value = e.target.result;
                                                                        archivoimg.style.display = "none";
                                                                        imagenesPreviasDiv.appendChild(imagenPrevia);
                                                                        imagenesPreviasDiv.appendChild(archivoimg);
                                                                    };
                                                                })(archivo);
                                                                lector.readAsDataURL(archivo);
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="d-grid gap-2"> <br>
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                    {{-- <button type="button" class="btn btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z">
                                        </path>
                                        <path
                                            d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z">
                                        </path>
                                    </svg>
                                    Imprimir
                                </button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>
    <style>
        #imagenesPrevias {
            display: center;
            flex-wrap: wrap;
        }

        #imagenesPrevias img {
            max-width: 75%;
            height: auto;
            margin: 5px;
            border: 1px solid;
        }
    </style>
@endsection
