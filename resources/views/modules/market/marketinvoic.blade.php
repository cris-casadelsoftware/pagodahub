@extends('layouts.app')
@section('title', 'Page Title')


@section('content')
    <div class="p-5 m-0 border-0 bd-example">
        <form name="market" id="market" method="post" action="{{ route('market.day') }}">
            <div class="card">
                <div class="card-header">
                    <h1>Facturas</h1>
                </div>
                <br>
                <center>

                    <div class="form-group w-50">

                        @csrf
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" placeholder="" aria-label="" aria-describedby=""
                                spellcheck="false" data-ms-editor="true" name="day">
                            <button class="btn btn-outline-secondary" type="" id="button-addon2">Buscar</button>
                        </div>

                    </div>
                </center>
                <div class="p-4 m-0 border-0">
                    @if (isset($comprasdeldia))
                        {{-- {{ count($comprasdeldia) }} --}}
                        @if (count($comprasdeldia) == 0)
                            <h1>Sin registros para el día seleccionado</h1>
                        @endif
                        @if (count($comprasdeldia) > 1)
                            <div class="modal" tabindex="-1" style="display: block">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Seleccione un proveedor
                                                {{ count($comprasdeldia) }}
                                            </h1>
                                        </div>
                                        <div class="modal-body">
                                            <h1></h1>
                                            <form name="market" id="market" method="post"
                                                action="{{ route('market.day') }}">
                                                @csrf
                                                @foreach ($comprasdeldia as $data)
                                                    <center>
                                                        <button type="submit" name="proveedor"
                                                            value="{{ $data->supplier }}" type="button"
                                                            class="btn btn-outline-dark w-50">{{ $data->supplier }}
                                                            [<svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-clock-history" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                                                <path
                                                                    d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                                                <path
                                                                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                                            </svg> {{ $data->created_at->isoFormat('h:mm:ss A') }} ]
                                                        </button>
                                                        <br><br>
                                                        <input style="display:none" type="text" name="day"
                                                            value="{{ $data->id }}">
                                                    </center>
                                                @endforeach
                                                {{-- <button type="submit" class="form-control btn btn-primary">Buscar</button> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($comprasdeldia as $data)
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                                    <div class="col">{{-- {{ $data->id }} --}}
                                        <h4>Regristo de compra: {{ $data->id }}</h4>
                                    </div>
                                    <div class="col">
                                        <h4>Numero de factura:
                                            <input class="w-100 form-control" type="number" name="NFactura" id="NFactura"
                                                value="" required onchange="" step="" min="0">
                                        </h4>
                                    </div>
                                    <div class="col">
                                        <h4>Proveedor: {{ $data->supplier }}</h4>
                                    </div>
                                </div>
                                {{ $data }}
                                <div class="table-responsive">
                                    <table class="table table-bordered border-success">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Producto</th>
                                                <th>Unidad</th>
                                                <th>Cantidad</th>
                                                <th>Cantidad factura</th>
                                                <th>Diferencia</th>
                                                <th>Precio</th>
                                                <th>Metodo de Pago</th>
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
                                                            <input class="border-0 bg-transparent" type="text"
                                                                name="unit[]"
                                                                value=" {{ json_decode($data->unit)[$index] }}"
                                                                data-unit-value="{{ json_decode($data->unit)[$index] }}"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <input class="border-0 bg-transparent" type="number"
                                                                name="quantity[]"
                                                                id="quantity{{ $index + 1 }}{{ $product }}"
                                                                value="{{ json_decode($data->quantity)[$index] }}"
                                                                data-quantity-value="{{ json_decode($data->quantity)[$index] }}"
                                                                readonly>
                                                        </td>
                                                        Codigo funcional

                                                        <td>
                                                            <input class="w-100 " type="number" name="differenceFactura[]"
                                                                id="differenceFactura{{ $index + 1 }}" value=""
                                                                required onchange="sumadiferencia();" step="0.01"
                                                                min="0">
                                                        </td>
                                                        <td>
                                                            <input class="w-100 border-0 bg-transparent" type="number"
                                                                id="difference{{ $index + 1 }}" name="difference[]"
                                                                value="" readonly>
                                                        </td>
                                                        <script>
                                                            // Obtener las entradas numéricas
                                                            const quantity {
                                                                {
                                                                    $index + 1
                                                                }
                                                            } = document.getElementById('quantity{{ $index + 1 }}{{ $product }}');
                                                            const differenceFactura {
                                                                {
                                                                    $index + 1
                                                                }
                                                            } = document.getElementById('differenceFactura{{ $index + 1 }}');
                                                            const difference {
                                                                {
                                                                    $index + 1
                                                                }
                                                            } = document.getElementById('difference{{ $index + 1 }}');

                                                            // Agregar un evento input a la entrada differenceFactura
                                                            differenceFactura {
                                                                {
                                                                    $index + 1
                                                                }
                                                            }.addEventListener('input', function() {
                                                                // Obtener los valores de las entradas numéricas
                                                                const quantityValue {
                                                                    {
                                                                        $index + 1
                                                                    }
                                                                } = quantity {
                                                                    {
                                                                        $index + 1
                                                                    }
                                                                }.value;
                                                                const differenceFacturaValue {
                                                                    {
                                                                        $index + 1
                                                                    }
                                                                } = differenceFactura {
                                                                    {
                                                                        $index + 1
                                                                    }
                                                                }.value;

                                                                // Calcular la diferencia
                                                                const differenceValue {
                                                                        {
                                                                            $index + 1
                                                                        }
                                                                    } = differenceFacturaValue {
                                                                        {
                                                                            $index + 1
                                                                        }
                                                                    } -
                                                                    quantityValue {
                                                                        {
                                                                            $index + 1
                                                                        }
                                                                    };

                                                                // Mostrar el resultado en la entrada difference
                                                                difference {
                                                                    {
                                                                        $index + 1
                                                                    }
                                                                }.value = differenceValue {
                                                                    {
                                                                        $index + 1
                                                                    }
                                                                };
                                                                sumadiferencia();
                                                            });
                                                        </script>
                                                        <td>
                                                            <input class="w-100 " type="number" name="price[]"
                                                                value="" data-price-value=""
                                                                onchange="sumadiferencia();" step="0.01"
                                                                min="0" required>
                                                        </td>
                                                        <td>
                                                            <select class="w-100" name="paymentoption[]"
                                                                onChange="toggleTable(this)" required>
                                                                <option value="Efectivo"
                                                                    data-option-value="{{ $index }}">
                                                                    Efectivo</option>
                                                                <option value="Credito"
                                                                    data-option-value="{{ $index }}">
                                                                    Credito
                                                                </option>
                                                            </select>
                                                        </td>


                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                        <tr>
                                            <th COLSPAN=8></th>
                                        </tr>
                                        <tr>
                                            <th COLSPAN=3> Totales</th>
                                            <th>
                                                <input class="border-0 bg-transparent" type="number" name="sumquan"
                                                    id="sumquan" value="" readonly>
                                            </th>
                                            <th>
                                                <input class="border-0 bg-transparent" type="number" name="sumdifac"
                                                    id="sumdifac" value="" readonly>
                                            </th>
                                            <th>
                                                <input class="border-0 bg-transparent" type="number" name="sumdif"
                                                    id="sumdif" value="" readonly>
                                            </th>
                                            <th>
                                                <input class="border-0 bg-transparent" type="number" name="sumpre"
                                                    id="sumpre" value="" readonly>
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                        <script>
                                            function sumadiferencia() {
                                                var sum_quantity = 0;
                                                var sum_difference = 0;
                                                var sum_price = 0;
                                                var sum_differenceFactura = 0;
                                                var elements = document.getElementsByName('index[]');
                                                var elements_quantity = document.getElementsByName('quantity[]');
                                                var elements_differenceFactura = document.getElementsByName('differenceFactura[]');
                                                var elements_difference = document.getElementsByName('difference[]');
                                                var elements_price = document.getElementsByName('price[]');
                                                for (var i = 0; i < elements.length; i++) {

                                                    var x_quantity = parseFloat(elements_quantity[i].value);
                                                    var x_differenceFactura = parseFloat(elements_differenceFactura[i].value);
                                                    var x_difference = parseFloat(elements_difference[i].value);
                                                    var x_price = parseFloat(elements_price[i].value);

                                                    sum_quantity = sum_quantity + x_quantity;
                                                    sum_differenceFactura = sum_differenceFactura + x_differenceFactura;
                                                    sum_difference = sum_difference + x_difference;
                                                    sum_price = sum_price + x_price;

                                                    document.getElementById("sumquan").value = sum_quantity.toFixed(2);
                                                    document.getElementById("sumdifac").value = sum_differenceFactura.toFixed(2);
                                                    document.getElementById("sumdif").value = sum_difference.toFixed(2);
                                                    document.getElementById("sumpre").value = sum_price.toFixed(2);
                                                }
                                            }
                                        </script>
                                    </table>
                                </div>
                                <div class="container">
                                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1">
                                        <div class="col">
                                            <h3>Total de registros: {{ count(json_decode($data->product)) - 1 }}</h3>
                                        </div>
                                    </div>
                                </div>

                                {{-- BAAASSSEE
                                    <div class="card">
                                    <h5 class="card-header">Proveedor</h5>
                                    <div class="card-body">
                                        <label class="form-label">Nombre Proveedor</label>
                                        <input type="text" class="form-control" name="" id=""
                                            placeholder="">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>PRODUCTO</th>
                                                    <th>CANTIDAD</th>
                                                    <th>PRECIO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="row"> <input type="text" class="form-control"
                                                            name="" id="" placeholder=""></td>
                                                    <td>
                                                        <input type="text" class="form-control" name=""
                                                            id="" placeholder="">
                                                    </td>
                                                    <td> <input type="text" class="form-control" name=""
                                                            id="" placeholder=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a class="btn btn-primary">añadir mas productos</a>
                                    </div>
                                </div>
                                <a class="btn btn-primary">añadir un proveedor</a> --}}
                                <div class="card">
                                    <h5 class="card-header">Proveedor</h5>
                                    <div class="card-body">
                                        <p id="counter"><b>Proveedores: <span>0</span> </b></p>
                                        <div style="display: none" id="proveedor-form-0">
                                            <div class="progress" role="progressbar"
                                                aria-label="Animated striped example" aria-valuenow="75"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success" style="width: 0%"></div>
                                            </div>
                                            <label class="form-label">Nombre Proveedor</label>
                                            <input type="text" class="form-control" name="nombreProveedor"
                                                placeholder="Ingrese el nombre del proveedor">
                                            <table class="table" id="productos-table">
                                                <thead>
                                                    <tr>
                                                        <th>PRODUCTO</th>
                                                        <th>CANTIDAD</th>
                                                        <th>PRECIO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" name="producto[]"
                                                                placeholder="Ingrese el nombre del producto">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="cantidad[]"
                                                                placeholder="Ingrese la cantidad">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="precio[]"
                                                                placeholder="Ingrese el precio">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <a class="btn btn-primary a" id="agregar-producto-btn">Agregar +
                                                productos</a>
                                            <div class="progress" role="progressbar"
                                                aria-label="Animated striped example" aria-valuenow="75"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar bg-success" style="width: 100%"></div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" id="duplicar-formulario">Añadir +
                                        proveedores</button>
                                </div>
                                <script>
                                    const counter = document.getElementById("counter");
                                    let contador = 0;
                                    // Escuchar el evento click del botón "Duplicar formulario"
                                    document.getElementById('duplicar-formulario').addEventListener('click', function(event) {
                                        event.preventDefault(); // Prevenir el comportamiento por defecto del botón
                                        var formularioOriginal = document.getElementById(`proveedor-form-0`);
                                        var formularioDuplicado = formularioOriginal.cloneNode(true); // Duplicar el formulario completo
                                        contador++;
                                        formularioDuplicado.id = `proveedor-form-${contador}`;
                                        formularioDuplicado.style.display = "block";
                                        counter.getElementsByTagName("span")[0].innerHTML = contador;
                                        formularioOriginal.parentNode.appendChild(
                                            formularioDuplicado); // Agregar el formulario duplicado después del original
                                    });

                                    // Escuchar el evento click del botón "Agregar más productos"
                                    document.getElementById('agregar-producto-btn').addEventListener('click', function(event) {
                                        event.preventDefault(); // Prevenir el comportamiento por defecto del botón
                                        var productosTable = document.getElementById('productos-table');
                                        var row = productosTable.insertRow();
                                        var productoCell = row.insertCell(0);
                                        var cantidadCell = row.insertCell(1);
                                        var precioCell = row.insertCell(2);
                                        productoCell.innerHTML =
                                            '<input type="text" class="form-control" name="producto[]" placeholder="Ingrese el nombre del producto">';
                                        cantidadCell.innerHTML =
                                            '<input type="text" class="form-control" name="cantidad[]" placeholder="Ingrese la cantidad">';
                                        precioCell.innerHTML =
                                            '<input type="text" class="form-control" name="precio[]" placeholder="Ingrese el precio">';
                                    });
                                </script>

                                {{-- <div class="p-4 m-0 border-0">
                                        <div class="card border-success">
                                            <h5 class="card-header">Lista de productos a credito</h5>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered border-success">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Producto</th>
                                                                <th>Unidad</th>
                                                                <th>Cantidad</th>
                                                                <th>Cantidad factura</th>
                                                                <th>Diferencia</th>
                                                                <th>Precio</th>
                                                                <th>Metodo de Pago</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="table-container">

                                                        </tbody>

                                                    </table>
                                                </div>
                                                <script>
                                                    function toggleTable(selectElement) {
                                                        var tableContainer = document.getElementById("table-container");
                                                        var selectedValue = selectElement.options[selectElement.selectedIndex].value;
                                                        const selectedOption = selectElement.options[selectElement.selectedIndex];
                                                        const optionValue = selectedOption.dataset.optionValue;
                                                        console.log(selectedValue);
                                                        console.log(optionValue);
                                                        if (selectedValue === "Credito") {
                                                            // Agregar tabla de crédito
                                                            var newTable = document.createElement("tr");
                                                            // Obtener los valores de los input existentes
                                                            var indexs = document.getElementsByName("index[]");
                                                            var products = document.getElementsByName("product[]");
                                                            var units = document.getElementsByName("unit[]");
                                                            var quantities = document.getElementsByName("quantity[]");
                                                            var differenceFacturas = document.getElementsByName("differenceFactura[]");
                                                            var differences = document.getElementsByName("difference[]");
                                                            var prices = document.getElementsByName("price[]");

                                                            // Construir el contenido de la tabla con los valores obtenidos
                                                            var tableContent = "";
                                                            var i = optionValue;
                                                            newTable.id = optionValue;
                                                            tableContent +=
                                                                `
                                                                <td><input class="border-0 bg-transparent" type="text" readonly value="${indexs[i].value}"></td>
                                                                <td><input class="border-0 bg-transparent" type="text" readonly value="${products[i].value}"></td>
                                                                <td><input class="border-0 bg-transparent" type="text" readonly value="${units[i].value}"></td>
                                                                <td><input class="border-0 bg-transparent" type="text" readonly value="${quantities[i].value}"></td>
                                                                <td><input class="border-0 bg-transparent" type="text" readonly value="${differenceFacturas[i].value}"></td>
                                                                <td><input class="border-0 bg-transparent" type="text" readonly value="${differences[i].value}"></td>
                                                                <td><input class="border-0 bg-transparent" type="text" readonly value="${prices[i].value}"></td>
                                                                <td><input class="border-0 bg-transparent" type="text" readonly value="Credito"></td>
                                                            `;

                                                            // Insertar el contenido de la tabla en el elemento nuevo
                                                            newTable.innerHTML = `<tbody>${tableContent}</tbody>`;
                                                            tableContainer.appendChild(newTable);
                                                        } else {
                                                            // Eliminar tabla de crédito si existe var creditTable = tableContainer.querySelector("table");

                                                            var creditTable = document.getElementById(optionValue);
                                                            console.log(creditTable);
                                                            if (creditTable) {
                                                                tableContainer.removeChild(creditTable);
                                                            }
                                                        }
                                                    }
                                                </script>

                                                <br>
                                                <a href="#" class="btn btn-primary">imprimir factura credito</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                <div class="p-4 m-0 border-0">
                                    <input class="form-control" type="file" id="formFile" name="" multiple
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
                            @endforeach
                        @endif
                    @endif


                </div>

                <br>
            </div>
        </form>
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
