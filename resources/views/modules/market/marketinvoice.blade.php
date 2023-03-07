@extends('layouts.app')
@section('title', 'Page Title')

@section('content')

    <div class="p-5 m-0 border-0 bd-example">
        <div class="card">
            <div class="card-header p-3 mb-2 bg-secondary bg-opacity-50">
                <div class="fs-2 mb-3">
                    Facturas
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-receipt" viewBox="0 0 16 16">
                        <path
                            d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z">
                        </path>
                        <path
                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z">
                        </path>
                    </svg>

                </div>
            </div>
            <br>
            <center>
                <form name="market" id="market" method="post" action="{{ route('market.day') }}">
                    <div class="form-group w-50">
                        @csrf
                        <label class="form-label">Facturas de descargas (Ingresar la fecha correspondiente con el día de
                            descarga)</label>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control border border-dark" spellcheck="false"
                                data-ms-editor="true" name="day">
                            <button class="btn btn-outline-secondary border border-dark " type=""
                                id="button-addon2">Buscar</button>
                        </div>
                    </div>
                </form>
            </center>
            <div class="p-4 m-0 border-0">
                @if (isset($comprasdeldia))
                    @if (count($comprasdeldia) == 0)
                        <p class="fs-5">Sin registros para el día seleccionado</p>
                    @endif
                    @if (count($comprasdeldia) > 1)
                        <div class="modal" tabindex="-1" style="display: block">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title"> Se encontraron descargas {{ count($comprasdeldia) }}
                                            del día seleccionado </h1>
                                    </div>
                                    <div class="modal-body">
                                        <form name="market" id="market" method="post"
                                            action="{{ route('market.day') }}">
                                            @csrf
                                            @foreach ($comprasdeldia as $data)
                                                <center>
                                                    <br>
                                                    <button type="submit" name="proveedor" value="{{ $data->id }}"
                                                        type="button" class="btn btn-outline-dark w-50">
                                                        Lista {{ $data->id }} - #Facturas
                                                        {{ $data->invoice_amount }} -
                                                        [<svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-clock-history"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                                            <path
                                                                d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                                            <path
                                                                d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                                        </svg> {{ $data->created_at->isoFormat('h:mm:ss A') }} ]
                                                    </button>
                                                    <br>
                                                    <input style="display:none" type="text" name="day"
                                                        value="{{ $data->id }}">
                                                </center>
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @foreach ($comprasdeldia as $data)
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                                <div class="col">
                                    Existe una compra relacionada con la fecha de busqueda: Lista {{ $data->id }}
                                    Fecha {{ $data->shoppingday }}
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered border-success">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Producto</th>
                                            <th>Unidad</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach (json_decode($data->product) as $index => $product)
                                            @if ($loop->index < count(json_decode($data->product)) - 1)
                                                <tr>
                                                    <td> <input class="border-0 bg-transparent" type="text"
                                                            name="index[]" value="{{ $index + 1 }}" readonly>
                                                    </td>
                                                    <td>
                                                        <input class="border-0 bg-transparent" type="text"
                                                            name="product[]" value="{{ $product }}"
                                                            data-product-value="{{ $product }}" readonly>
                                                    </td>
                                                    <td>
                                                        <input class="border-0 bg-transparent" type="text" name="unit[]"
                                                            value=" {{ json_decode($data->unit)[$index] }}"
                                                            data-unit-value="{{ json_decode($data->unit)[$index] }}"
                                                            readonly>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <h5>Total de registros: {{ count(json_decode($data->product)) - 1 }}</h5> --}}
                            </div>
                            <br>

                            <div class="card">
                                <h5 class="card-header">
                                    <p id="counter"><b>Nuevas Facturas <span></span> </b></p>
                                </h5>
                                <div class="card-body">

                                    <div style="display: block" id="proveedor-form-0">
                                        <form name="market" id="market" method="post"
                                            action="{{ route('creditinvoice') }}">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col">
                                                    <label class="form-label">Nombre Proveedor</label>
                                                    <input type="text" class="form-control" name="nombreProveedor"
                                                        placeholder="Ingrese el nombre del proveedor" required>
                                                </div>
                                                <div class="col">
                                                    <label class="form-label">Numero Factura</label>
                                                    <input type="number" class="form-control" name="numerofactura"
                                                        placeholder="# Factura" required>
                                                </div>
                                            </div>

                                            <br>
                                            <table class="table" id="productos-table">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad</th>
                                                        <th>Cantidad factura</th>
                                                        <th>Diferencia</th>
                                                        <th>Precio</th>
                                                        <th>Pago metodo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Total</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>
                                                            <p>Total diferencia: <span id="totaldif">0.00</span></p>
                                                        </th>
                                                        <th>
                                                            <p>Total precio: <span id="total">0.00</span></p>
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <a class="btn btn-outline-success" id="agregar-producto-btn">Agregar +
                                                productos</a>
                                            <div class="p-4 m-0 border-0">
                                                <input class="form-control" type="file" id="formFile" name=""
                                                    multiple onchange="mostrarImagenesPrevias()">
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
                                            <center>
                                                <button type="submit" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-receipt-cutoff"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z">
                                                        </path>
                                                        <path
                                                            d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z">
                                                        </path>
                                                    </svg>
                                                    Guardar
                                                </button>
                                            </center>


                                        </form>
                                    </div>
                                </div>
                            </div>
                            <script>
                                // Escuchar el evento click del botón "Agregar más productos"
                                document.getElementById('agregar-producto-btn').addEventListener('click', function(event) {
                                    event.preventDefault(); // Prevenir el comportamiento por defecto del botón
                                    const opcionSeleccionada = document.getElementsByName('product[]');
                                    if (opcionSeleccionada.length > document.getElementById('productos-table').rows.length - 2) {
                                        var productosTable = document.getElementById('productos-table');
                                        var row = productosTable.tBodies[0].insertRow();
                                        var productoCell = row.insertCell(0);
                                        var unidadCell = row.insertCell(1);
                                        var cantidadCell = row.insertCell(2);
                                        var canfacCell = row.insertCell(3);
                                        var difCell = row.insertCell(4);
                                        var precioCell = row.insertCell(5);
                                        var pago = row.insertCell(6);
                                        productoCell.innerHTML =
                                            '<input type="text" class="form-control" name="producto[]" list="datalistOptions" required id="opcionSeleccionada"><datalist id="datalistOptions"> @foreach (json_decode($data->product) as $index => $product) @if ($loop->index < count(json_decode($data->product)) - 1) <option value="{{ $product }}"></option> @endif @endforeach </datalist>';
                                        unidadCell.innerHTML =
                                            '<input list="opciones" class="form-control border-0 bg-transparent" name="unidad[]" readonly required><datalist id="opciones"> @foreach (json_decode($data->product) as $index => $product) @if ($loop->index < count(json_decode($data->product)) - 1) <option value="{{ json_decode($data->unit)[$index] }}"></option> @endif @endforeach </datalist>'
                                        cantidadCell.innerHTML =
                                            '<input type="number" class="form-control border-0 bg-transparent" name="cantidad[]" readonly required >';
                                        canfacCell.innerHTML = '<input type="number" class="form-control" name="canfac[]" required>';
                                        difCell.innerHTML =
                                            '<input type="number" class="form-control border-0 bg-transparent" name="dif[]" readonly required>';
                                        precioCell.innerHTML = '<input type="number" class="form-control" name="precio[]" required>';
                                        pago.innerHTML =
                                            '<select class="form-control" name="metododepago[]" required> <option value="Efectivo" > Efectivo</option><option value="Credito">Credito</option></select>';

                                        var productoInput = productoCell.querySelector('input');
                                        productoInput.addEventListener('input', autocompletado);

                                        var cantidadInput = cantidadCell.querySelector('input');
                                        cantidadInput.addEventListener('input', actualizarTotal);
                                        var canfacInput = canfacCell.querySelector('input');
                                        canfacInput.addEventListener('input', actualizarTotal);
                                        var precioInput = precioCell.querySelector('input');
                                        precioInput.addEventListener('input', actualizarTotal);
                                    } else {
                                        alert("no puede agregar mas productos");
                                    }

                                });

                                // Función para actualizar el total de la suma
                                function actualizarTotal() {
                                    var precios = document.getElementsByName('precio[]');
                                    var cantidades = document.getElementsByName('cantidad[]');
                                    var canfac = document.getElementsByName('canfac[]');
                                    var difs = document.getElementsByName('dif[]');

                                    var total = 0;
                                    var totaldif = 0;

                                    for (var i = 0; i < precios.length; i++) {
                                        total += parseFloat(precios[i].value) || 0;
                                        var cantidad = parseFloat(cantidades[i].value) || 0;
                                        var cantidadfac = parseFloat(canfac[i].value) || 0;
                                        var dif = cantidad - cantidadfac;
                                        difs[i].value = dif.toFixed(2);
                                        totaldif += parseFloat(difs[i].value) || 0;
                                    }
                                    // Actualizar el elemento HTML que muestra el total
                                    document.getElementById('totaldif').textContent = totaldif.toFixed(2);
                                    document.getElementById('total').textContent = total.toFixed(2);
                                }

                                function autocompletado() {
                                    const opcionSeleccionada = document.getElementsByName('producto[]');
                                    const uni = document.getElementsByName("unidad[]");
                                    const can = document.getElementsByName("cantidad[]");
                                    for (var i = 0; i < opcionSeleccionada.length; i++) {
                                        /* console.log(opcionSeleccionada[i].value); */
                                        const opcion = opcionSeleccionada[i].value;
                                        switch (opcion) {
                                            @foreach (json_decode($data->product) as $index => $product)
                                                @if ($loop->index < count(json_decode($data->product)) - 1)
                                                    case '{{ $product }}':
                                                    /* console.log('Se compraron  {{ $product }}'); */
                                                    uni[i].value = '{{ json_decode($data->unit)[$index] }}';
                                                    can[i].value = '{{ json_decode($data->quantity)[$index] }}';
                                                    break;
                                                @endif
                                            @endforeach
                                            default:
                                                uni[i].value = '';
                                                can[i].value = '';
                                        }

                                    }
                                }
                            </script>
                            <br>
                            <div class="card" style="background-color:cadetblue; border-color:darkblue;">
                                <img class="card-img-top" src="holder.js/100x180/" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">Listado de facturas generadas el dia (
                                        {{ $data->shoppingday }})</h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fechas</th>
                                                <th>Facturas</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row">03-03-2023</td>
                                                <td>1PG00150</td>
                                                <td>120.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
            <br>
        </div>
        <br>

    </div>
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
