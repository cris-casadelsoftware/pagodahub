@extends('layouts.app')

@section('content')
    <script>
        window.onload = function() {
            console.log("function called...");
            ///// Dias /////
            var hoy = new Date();
            var ayer = new Date(hoy.getTime() - (1 * 24 * 60 * 60 * 1000));
            document.getElementById("hoy").value = hoy.toISOString().split("T")[0];
            document.getElementById("ayer").value = ayer.toISOString().split("T")[0];
            /////     /////
        }


        function sumcash() {
            var cash1 = 0;
            var cash5 = 0;
            var cash10 = 0;
            var cash20 = 0;
            var cash50 = 0;
            var cash100 = 0;
            var totalcash = 0;
            cash1 = document.getElementsByName('cash1');
            cash5 = document.getElementsByName('cash5');
            cash10 = document.getElementsByName('cash10');
            cash20 = document.getElementsByName('cash20');
            cash50 = document.getElementsByName('cash50');
            cash100 = document.getElementsByName('cash100');
            cash1 = parseFloat(cash1[0].value);
            cash5 = parseFloat(cash5[0].value);
            cash10 = parseFloat(cash10[0].value);
            cash20 = parseFloat(cash20[0].value);
            cash50 = parseFloat(cash50[0].value);
            cash100 = parseFloat(cash100[0].value);
            if (isNaN(cash1)) {
                cash1 = 0;
            }
            if (isNaN(cash5)) {
                cash5 = 0;
            }
            if (isNaN(cash10)) {
                cash10 = 0;
            }
            if (isNaN(cash20)) {
                cash20 = 0;
            }
            if (isNaN(cash50)) {
                cash50 = 0;
            }
            if (isNaN(cash100)) {
                cash100 = 0;
            }
            totalcash = cash1 + cash5 + cash10 + cash20 + cash50 + cash100;
            var cashx1 = parseFloat(cash1 * 1);
            var cashx5 = parseFloat(cash5 * 5);
            var cashx10 = parseFloat(cash10 * 10);
            var cashx20 = parseFloat(cash20 * 20);
            var cashx50 = parseFloat(cash50 * 50);
            var cashx100 = parseFloat(cash100 * 100);

            document.getElementById("cashx1").value = cashx1.toFixed(2);
            document.getElementById("cashx5").value = cashx5.toFixed(2);
            document.getElementById("cashx10").value = cashx10.toFixed(2);
            document.getElementById("cashx20").value = cashx20.toFixed(2);
            document.getElementById("cashx50").value = cashx50.toFixed(2);
            document.getElementById("cashx100").value = cashx100.toFixed(2);
            document.getElementById("totalxcash").value = (cashx1 + cashx5 + cashx10 +
                cashx20 + cashx50 + cashx100).toFixed(2);
            document.getElementById("totalcash").value = totalcash.toFixed(2);

        }
    </script>
    <div class="p-2 m-0 border-0 bd-example">
        <form method="get" action="{{ route('home') }}">
            <button type="submit" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house"
                    viewBox="0 0 16 16">
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
                        <div class="row row-cols-1 row-cols-sm-1">
                            <div class="col">
                                <div class="input-group mb-4">
                                    <span
                                        class="input-group-text border-0 bg-transparent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                    <div class="col"><label for="inputEmail4" class="form-label"><b>Fecha de
                                                hoy</b></label>
                                        <input type="date" class="form-control" id="hoy" readonly>
                                    </div>
                                    <span class="input-group-text border-0 bg-transparent">&nbsp;&nbsp;&nbsp;</span>
                                    <div class="col"><label for="inputEmail4" class="form-label"><b>Fecha de
                                                ayer</b></label>
                                        <input type="date" class="form-control" id="ayer" readonly>
                                    </div>
                                </div>
                                <div class="row row-cols-2">


                                </div>
                                <br>
                            </div>
                            <div class="col">
                                <br>
                                <div class="row row-cols-2">
                                    <div class="col"> <label class="form-label">Efectivo</label></div>
                                    <div class="col"> <label class="form-label"></label></div>
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">$1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg
                                            xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" name="cash1" onchange="sumcash();">
                                    <span class="input-group-text border-0 bg-transparent">=</span>
                                    <input type="number" class="form-control border-0 bg-transparent" id="cashx1">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">$5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg
                                            xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" name="cash5" onchange="sumcash();">
                                    <span class="input-group-text border-0 bg-transparent">=</span>
                                    <input type="number" class="form-control border-0 bg-transparent" id="cashx5">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">$10&nbsp;&nbsp;&nbsp;<svg
                                            xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" name="cash10" onchange="sumcash();">
                                    <span class="input-group-text border-0 bg-transparent">=</span>
                                    <input type="number" class="form-control border-0 bg-transparent" id="cashx10">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">$20&nbsp;&nbsp;&nbsp;<svg
                                            xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" name="cash20" onchange="sumcash();">
                                    <span class="input-group-text border-0 bg-transparent">=</span>
                                    <input type="number" class="form-control border-0 bg-transparent" id="cashx20">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">$50&nbsp;&nbsp;&nbsp;<svg
                                            xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-asterisk" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" name="cash50" onchange="sumcash();">
                                    <span class="input-group-text border-0 bg-transparent">=</span>
                                    <input type="number" class="form-control border-0 bg-transparent" id="cashx50">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-text">$100&nbsp;<svg xmlns="http://www.w3.org/2000/svg"
                                            width="10" height="10" fill="currentColor" class="bi bi-asterisk"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z" />
                                        </svg>
                                    </span>
                                    <input type="number" class="form-control" name="cash100" onchange="sumcash();">
                                    <span class="input-group-text border-0 bg-transparent">=</span>
                                    <input type="number" class="form-control border-0 bg-transparent" id="cashx100">
                                </div>
                            </div>
                            <div class="col">

                                <div class="input-group mb-4">
                                    <span class="input-group-text border-0 bg-transparent">Total&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                    <input type="number" class="form-control border-0 bg-transparent" id="totalcash">
                                    <span class="input-group-text border-0 bg-transparent">&nbsp;&nbsp;&nbsp;</span>
                                    <input type="number" class="form-control border-0 bg-transparent" id="totalxcash">
                                </div>

                            </div>
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="button">Guardar</button>
                                    <button type="button" class="btn btn-outline-secondary">
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
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
