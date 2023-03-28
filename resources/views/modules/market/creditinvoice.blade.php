@extends('layouts.app')

@section('content')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="p-3 m-0 border-0 bd-example">
        <div class="card w-auto">
            <div class="card-header">
                <h1>Resumen facturas proveedores</h1>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="container text-center">
                        <form name="loanslist" id="loanslist" method="post" action="{{ route('creditinvoice') }}">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="" class="form-label">Busqueda de proveedor</label>
                                    <div class="input-group w-100">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Buscar proveedor"
                                            aria-label="Input group example" aria-describedby="basic-addon1"
                                            spellcheck="false" data-ms-editor="true" name="name_supplier"
                                            id="name_supplier">
                                    </div>
                                </div>
                                <div class="col">
                                    {{--  <div class="col">
                                        <label for="" class="form-label">Fecha</label>
                                        <input class="form-control" type="date" name="date-day" id="">
                                    </div> --}}
                                </div>
                                <div class="col">
                                    <div class="col">
                                        <label for="" class="form-label">.</label>
                                        <button class="btn btn-outline-secondary form-control"
                                            type="submit">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <h1>Facturas por pagar</h1>
                    <form name="" id="" method="post" action="{{ route('updatecreditinvoice') }}">
                        @csrf
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Factura</th>
                                    <th>Proveedor</th>
                                    <th>Total</th>
                                    <th>Pagado</th>
                                    <th>Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (@isset($facturasdeldia))
                                    @foreach ($facturasdeldia as $data)
                                        {{-- <p>{{ $data }}</p> --}}
                                        @if ($data->total_credit > 0)
                                            @if ($data->status != 'Pagado')
                                                <tr data-invoice-id="{{ $data->id }}">

                                                    <td>{{ $data->invoice_day }}</td>
                                                    <td>{{ $data->invoice_number }}</td>
                                                    <td>{{ $data->name_supplier }}</td>
                                                    <td>
                                                        <input type="number" name="" id=""
                                                            class="form-control border-0 bg-transparent" readonly
                                                            value="{{ $data->total_credit }}"
                                                            data-credit="{{ $data->total_credit }}">
                                                    </td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox" value="{{ $data->id }}"
                                                            onclick="actualizarTotal()" name="checkPagar[]" id="myCheckbox"
                                                            style="height: 25px;width: 25px;">
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal{{ $data->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z">
                                                                    </path>
                                                                    <path
                                                                        d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </center>
                                                        <!-- Modal -->
                                                        <div class="modal fade " id="exampleModal{{ $data->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                <div class="modal-content text-dark">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                            Detalle
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-bordered border-black">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Producto</th>
                                                                                    <th>Cantidad</th>
                                                                                    <th>Precio</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach (json_decode($data->product) as $index => $product)
                                                                                    @if ($loop->index < count(json_decode($data->product)) && 'Credito' == json_decode($data->payment_type)[$index])
                                                                                        <tr>
                                                                                            <td>{{ json_decode($data->product)[$index] }}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ json_decode($data->invoice_quantity)[$index] }}
                                                                                            </td>
                                                                                            <td>
                                                                                                @php
                                                                                                    echo number_format(json_decode($data->price)[$index], 2, ',', ' ');
                                                                                                @endphp
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                <td colspan="2">Total</td>
                                                                                <td>
                                                                                    @php
                                                                                        echo number_format($data->total_credit, 2, ',', ' ');
                                                                                    @endphp
                                                                                </td>
                                                                            </tbody>
                                                                        </table>
                                                                        @foreach (json_decode($data->file_image) as $index => $file_image)
                                                                            <br>
                                                                            <p>evidencia: Imagen #{{ $index + 1 }}</p>
                                                                            @if ($loop->index < count(json_decode($data->file_image)))
                                                                                <div class="card h-100 w-100">
                                                                                    <div class="card card-body">
                                                                                        <img src=" {{ json_decode($data->file_image)[$index] }}"
                                                                                            alt="" border="1">
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                @endif
                            </tbody>
                            <tfoot style="background-color: #c7e1f7;">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <div>
                                            <label for="total-credit">Total a pagar:</label>
                                            <input type="number" name="total-credit" id="total-credit"
                                                class="form-control border-0 bg-transparent" readonly value="0">
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                <script>
                                    function actualizarTotal() {
                                        let total = 0;
                                        let checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                                        checkboxes.forEach(function(checkbox) {
                                            let row = checkbox.closest('tr');
                                            let credit = parseFloat(row.querySelector('input[type="number"]').dataset.credit);
                                            total += credit;
                                        });
                                        document.getElementById('total-credit').value = total.toFixed(2);
                                    }
                                </script>
                            </tfoot>
                        </table>
                        <center>
                            <button type="submit" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z">
                                    </path>
                                    <path
                                        d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z">
                                    </path>
                                </svg>
                                Cambiar de status a pagado (Genera PDF con detalles)
                            </button>
                        </center>
                    </form>
                    <br><br>
                    <h1>Facturas Pagadas</h1>
                    <div class="row">
                        <div class="col">
                            <h1>Efectivo</h1>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Factura</th>
                                        <th>Proveedor</th>
                                        <th>Total</th>
                                        <th>Estatus</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (@isset($facturasdeldia))
                                        @foreach ($facturasdeldia as $data)
                                            @if ($data->total_cash > 0)
                                                <tr>
                                                    <td>{{ $data->invoice_day }}</td>
                                                    <td>{{ $data->invoice_number }}</td>
                                                    <td>{{ $data->name_supplier }}</td>
                                                    <td>{{ $data->total_cash }}</td>
                                                    <td>Pagado</td>
                                                    <td>
                                                        <center>
                                                            <button type="button" class="btn btn-outline-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z">
                                                                    </path>
                                                                    <path
                                                                        d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z">
                                                                    </path>
                                                                </svg>
                                                                detalle
                                                            </button>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <h1>Credito</h1>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Factura</th>
                                        <th>Proveedor</th>
                                        <th>Total</th>
                                        <th>Estatus</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (@isset($facturasdeldia))
                                        @foreach ($facturasdeldia as $data)
                                            @if ($data->status == 'Pagado')
                                                <tr>
                                                    <td>{{ $data->invoice_day }}</td>
                                                    <td>{{ $data->invoice_number }}</td>
                                                    <td>{{ $data->name_supplier }}</td>
                                                    <td>{{ $data->total_credit }}</td>
                                                    <td>{{ $data->status }}</td>
                                                    <td>
                                                        <center>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal{{ $data->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zM11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z">
                                                                    </path>
                                                                    <path
                                                                        d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293 2.354.646zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z">
                                                                    </path>
                                                                </svg>
                                                                detalle
                                                            </button>
                                                        </center>
                                                        <!-- Modal -->
                                                        <div class="modal fade " id="exampleModal{{ $data->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                <div class="modal-content text-dark">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5"
                                                                            id="exampleModalLabel">
                                                                            Detalle
                                                                        </h1>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-bordered border-success">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Producto</th>
                                                                                    <th>Unidad</th>
                                                                                    <th>Cantidad</th>
                                                                                    <th>Precio</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach (json_decode($data->product) as $index => $product)
                                                                                    @if ($loop->index < count(json_decode($data->product)) && 'Credito' == json_decode($data->payment_type)[$index])
                                                                                        <tr>
                                                                                            <td>{{ json_decode($data->product)[$index] }}
                                                                                            </td>
                                                                                            <td> {{ json_decode($data->unit)[$index] }}
                                                                                            </td>
                                                                                            <td> {{ json_decode($data->quantity)[$index] }}
                                                                                            </td>
                                                                                            <td>
                                                                                                @php
                                                                                                    echo number_format(json_decode($data->price)[$index], 2, ',', ' ');
                                                                                                @endphp
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                                <td colspan="3">Total</td>
                                                                                <td>{{ $data->total_credit }}</td>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        tr:hover td {
            background-color: #e9f3f1;
            color: rgb(0, 0, 0);
        }
    </style>
    {{-- <img id="myImage" width="25%" src="img/outline_payment_black_24dp.png">
    <script>
        function cambiarImagen() {
            var imagen = document.getElementById("myImage");
            var checkbox = document.getElementById("myCheckbox");

            if (checkbox.checked) {
                imagen.src = "img/outline_credit_score_black_24dp.png";
            } else {
                imagen.src = "img/outline_payment_black_24dp.png";
            }
        }
    </script> --}}
@endsection
