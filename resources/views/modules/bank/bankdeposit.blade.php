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
                    Depósito a Banco
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                        class="bi bi-safe" viewBox="0 0 16 16">
                        <path
                            d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1V1.5zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5h-12z" />
                        <path
                            d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zM4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586z" />
                    </svg>
                </div>
            </div>
            <script>
                window.onload = function() {
                    console.log("function called...");
                    var hoy = new Date();
                    var ayer = new Date(hoy.getTime() - (1 * 24 * 60 * 60 * 1000));
                    document.getElementById("hoy").value = hoy.toISOString().split("T")[0];
                }
            </script>
            <div class="card-body">
                <div class="card-body">
                    <form name="" id="" method="post" action="{{ route('storedeposit') }}">
                        @csrf
                        <label for="inputEmail4" class="form-label"><b>Fecha</b></label>
                        <input type="date" class="form-control" id="hoy" name="fecha">
                        <br>
                        <label for="validationCustom04" class="form-label">Banco</label>
                        <select class="form-select" id="validationCustom04" name="banco" required>
                            <option selected disabled value="">Seleccione un banco</option>
                            <option value="Banco General">Banco General</option>
                            <option value="Banistmo">Banistmo</option>
                            <option value="Banco Nacional de Panamá">Banco Nacional de Panamá</option>
                            <option value="Multibank">Multibank</option>
                        </select>

                        <br>
                        <label class="form-label">Efectivo</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text">$
                            </span>
                            <input type="number" class="form-control" name="efectivo" onchange="" required>
                        </div>
                        <div class="p-4 m-0 border-0">
                            <label class="form-label">Fotos</label>
                            <input class="form-control" type="file" id="formFile" name="foto" multiple
                                onchange="mostrarImagenesPrevias()" required>
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
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Listado de depositos
            </div>
            <div class="card-body">
                @livewire('listbankdeposit')
            </div>
        </div>
    </div>
@endsection
