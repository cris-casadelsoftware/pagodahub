@extends('layouts.app')

@section('content')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="p-5 m-0 border-0 bd-example">
        <div class="card w-auto">
            <div class="card-header bg-info bg-opacity-50">
                <div class="fs-2 mb-3">
                    Descarga de camion
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-inboxes-fill" viewBox="0 0 16 16">
                        <path
                            d="M4.98 1a.5.5 0 0 0-.39.188L1.54 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h4.46l-3.05-3.812A.5.5 0 0 0 11.02 1H4.98zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .106-.374L3.81.563zM.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    {{-- @if (session('mensaje'))
                            <div class="alert alert-success">{{ session('mensaje') }}</div>
                        @endif --}}
                    <!-- Modal para mostrar el mensaje -->
                    <div class="modal fade" id="mensajeModal" tabindex="-1" role="dialog"
                        aria-labelledby="mensajeModalLabel" aria-hidden="true">
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
                        <script>
                            $(document).ready(function() {
                                $('#mensajeModal').modal('show');
                            });
                        </script>
                    @endif
                    <form name="market" id="market" method="post" action="{{ route('market.store') }}">
                        <br>
                        @csrf
                        <div id="formContainer">
                            <br>

                            <div class="container text-center">
                                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1">
                                    <div class="col"><label for=""
                                            class="form-label fs-4 fw-bold font-monospace">Fecha</label>
                                        <input class="form-control border border-dark  rounded" type="date"
                                            name="date-day" id="" required>
                                    </div>
                                </div>
                            </div>

                            <br>


                            <div class="form-group" style="" id="formGroup0">
                                <label for="exampleDataList" class="form-label fs-6 fw-bold">Productos <svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-card-checklist" viewBox="0 0 16 16">
                                        <path
                                            d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z">
                                        </path>
                                        <path
                                            d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z">
                                        </path>
                                    </svg></label>
                                <input class="form-control product border border-dark  rounded " list="datalistOptions"
                                    name="product[]" placeholder="Escribe para buscar...">
                                <datalist id="datalistOptions">
                                    @foreach ($opciones2 as $producto)
                                        <option value="{{ $producto->name }}"></option>
                                    @endforeach
                                </datalist>
                                <br>
                                <label for="formGroupExampleInput" class="form-label fs-6 fw-bold">Unidad de Medida</label>
                                <input class="form-control unit border border-dark  rounded" list="opciones" name="unit[]"
                                    placeholder="Escribe para buscar...">
                                <datalist id="opciones">
                                    @foreach ($opciones as $unidad_de_medida)
                                        <option value="{{ $unidad_de_medida->name }}"></option>
                                    @endforeach
                                </datalist>
                                <br>
                                <label for="formGroupExampleInput" class="form-label fs-6 fw-bold">Cantidad</label>
                                <input type="number" class="form-control quantity border border-dark  rounded"
                                    name="quantity[]" placeholder="Cantidad #">
                            </div>
                        </div>
                        <br>
                        <br>
                        <center>
                            <button type="button" id="addBtn" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z">
                                    </path>
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                                    </path>
                                </svg>
                                Añadir Producto <p id="counter"><b>Registros de productos: <span>0</span> </b></p>
                            </button>
                        </center>

                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Cantidad de Facturas

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                        <path
                                            d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z">
                                        </path>
                                        <path
                                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z">
                                        </path>
                                    </svg>

                                </label>
                                <input name="invoice_amount" type="number" class="form-control w-25 border border-dark  rounded">
                            </div>
                        </div>
                        <br>
                        <table style="width:100%; border:1px solid black;" id="productList">
                        </table>
                        <br>
                        <button type="submit" class="btn btn-outline-success w-100 border border-success  rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bag-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z">
                                </path>
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z">
                                </path>
                            </svg>
                            Guardar
                        </button>

                    </form>
                </div>


                <script>
                    const formContainer = document.getElementById("formContainer");
                    const addBtn = document.getElementById("addBtn");
                    const productList = document.getElementById("productList");
                    const counter = document.getElementById("counter");
                    let count = 0;
                    let n = 0;
                    addBtn.addEventListener("click", function() {
                        if (formContainer.getElementsByClassName("form-group")[n].getElementsByTagName("input")[0].value !=
                            '' &&
                            formContainer.getElementsByClassName("form-group")[n].getElementsByTagName("input")[1].value !=
                            '' &&
                            formContainer.getElementsByClassName("form-group")[n].getElementsByTagName("input")[2].value != ''
                        ) {
                            count++;
                            n = count;
                            const formGroup = formContainer.getElementsByClassName("form-group")[n - 1];
                            const newFormGroup = formGroup.cloneNode(true);
                            formContainer.getElementsByClassName("form-group")[n - 1].setAttribute('style', 'display:none');
                            newFormGroup.id = "formGroup" + count;
                            formContainer.appendChild(newFormGroup);
                            counter.getElementsByTagName("span")[0].innerHTML = count;
                            formContainer.getElementsByClassName("form-group")[n].getElementsByTagName("input")[0].value = "";
                            formContainer.getElementsByClassName("form-group")[n].getElementsByTagName("input")[1].value = "";
                            formContainer.getElementsByClassName("form-group")[n].getElementsByTagName("input")[2].value = "";
                            window.alert("Producto añadido");
                        } else {}
                    });

                    function updateProductList() {
                        productList.innerHTML = "<thead><tr><th>#</th><th>Producto</th><th>Unidad</th><th>Cantidad</th></tr></thead>";
                        const products = document.getElementsByClassName("product");
                        const units = document.getElementsByName("unit[]");
                        const quantities = document.getElementsByClassName("quantity");
                        for (let i = 0; i < products.length; i++) {
                            const product = products[i].value;
                            const unit = units[i].value;
                            const quantity = quantities[i].value
                            const num = i + 1;
                            if (product && unit && quantity) {
                                const row = document.createElement("tr");
                                const productCell = document.createElement("td");
                                const unitCell = document.createElement("td");
                                const quantityCell = document.createElement("td");
                                const numCell = document.createElement("td");
                                numCell.textContent = num;
                                productCell.textContent = product;
                                unitCell.textContent = unit;
                                quantityCell.textContent = quantity;
                                row.appendChild(numCell);
                                row.appendChild(productCell);
                                row.appendChild(unitCell);
                                row.appendChild(quantityCell);
                                productList.appendChild(row);
                            }
                        }
                    }

                    addBtn.addEventListener('click', () => {
                        setTimeout(updateProductList, 100);
                    });
                </script>

                <style>
                    table {
                        font-family: arial, sans-serif;
                        background-color: white;
                        text-align: left;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th,
                    td {
                        padding: 1px;

                    }

                    thead {
                        background-color: #246355;
                        border-bottom: solid 5px #0F362D;
                        color: white;
                    }

                    #theadtotal {
                        background-color: #1b6453;
                        border-bottom: solid 2.5px #268c74;
                        border-top: solid 2.5px #268c74;
                        color: white;
                    }

                    tr:nth-child(even) {
                        background-color: #ddd;
                    }

                    tr:hover td {
                        background-color: #369681;
                        color: white;
                    }
                </style>

            </div>
        </div>

    @endsection
