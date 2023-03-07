@extends('layouts.app')

@section('content')
    <div class="p-5 m-0 border-0 bd-example">
        <div class="card w-auto">
            <div class="card-header">
                Presupuesto
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Fecha</label>
                    <input type="date" name="" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div><br>
                <div class="form-group">
                    <label for="">Montos</label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                        placeholder="">
                </div><br>
                <div class="form-group">
                    <label for="">Concepto</label>
                    <select class="form-control" name="" id="">
                        <option>Mercado</option>
                        <option>Factura</option>
                    </select>
                </div><br>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
@endsection
