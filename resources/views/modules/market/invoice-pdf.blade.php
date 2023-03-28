<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>

    </title>
</head>
<style>
    table {
        font-family: arial, sans-serif;
        font-size: 8px;
        background-color: white;
        text-align: left;
        border-collapse: collapse;
        width: 100%;
    }
    th,
    td {
        padding: 1px;
        /* border: 1px solid #0F362D; */
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


<body>
    <div class="col-11">
        <h1>Pago facturas de Credito</h1>
        <div class="row">
            <div class="col-10">
                <h2>Proveedor</h2>
                <p>Winston Churchill</p>
            </div>
        </div>
        <hr />
        <div class="row ">
            <div class="col">
                <h5>Facturar a</h5>
                <p> Arian Manuel Garcia Reynoso </p>
            </div>
            <div class="col">
                <h5>Fecha</h5>
                <p>09/05/2019</p>
            </div>
        </div>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>wew</th>
                    <th>ewe</th>
                    <th>ew</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">23</td>
                        <td>43</td>
                        <td>532</td>
                    </tr>
                    <tr>
                        <td scope="row">hasdasd</td>
                        <td>hasdasd</td>
                        <td>hasdasd</td>
                    </tr>
                </tbody>
        </table>

        <div class="row">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Cant.</th>
                        <th>Descripcion</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Clases de Cha-Cha-Cha</td>
                        <td>3,000.00</td>
                        <td>3,000.00</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Clases de Salsa</td>
                        <td>4,000.00</td>
                        <td>12,000.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Total Factura</th>
                        <th>RD$15,000.00</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</body>
</html>
