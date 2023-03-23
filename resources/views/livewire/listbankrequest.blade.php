<div class="table-responsive">
    <table class="table table-bordered">
        <thead id="miTablaPersonalizada">
            {{-- <input type="week" class="form-control" placeholder="#Vale" wire:model="date"  data-date-format="DD MMMM YYYY" aria-label="Username" aria-describedby="basic-addon1"> --}}
            <th>Semana #</th>
            <th>Fecha</th>
            <th>$1</th>
            <th>$5</th>
            <th>¢0.01</th>
            <th>¢0.05</th>
            <th>¢0.10</th>
            <th>¢0.25</th>
            <th>¢0.50</th>
            <th>¢1.00</th>
            <th>Total pedido</th>
            <th>Abjuntos</th>
        </thead>
        <tbody>
            {{-- {{ $bankrequests }} --}}
            @foreach ($bankrequests as $data)
                <tr>
                    <td>{{ substr($data->weeknumber, 5) }}</td>
                    <td>{{ $data->created_at->format('d-m-Y') }} </td>

                    <td>
                        ${{ $data->cash1 }}
                    </td>
                    <td>
                        ${{ $data->cash5 }}
                    </td>
                    <td>
                        $ {{ $data->roll0_01 }}
                    </td>
                    <td>
                        $ {{ $data->roll0_05 }}
                    </td>
                    <td>
                        ${{ $data->roll0_10 }}
                    </td>
                    <td>
                        ${{ $data->roll0_25 }}
                    </td>
                    <td>
                        $ {{ $data->roll0_50 }}
                    </td>
                    <td>
                        $ {{ $data->roll1_00 }}
                    </td>
                    <td class="text-end"> <b>$
                            @php
                                echo number_format($data->cash1 + $data->cash5 + $data->roll0_01 + $data->roll0_05 + $data->roll0_10 + $data->roll0_25 + $data->roll0_50 + $data->roll1_00, 2, ',', ' ');
                            @endphp
                    </td>
                    <td>
                        <center>
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $data->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-image" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                    <path
                                        d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z">
                                    </path>
                                </svg>
                                ver
                            </button>
                        </center>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $data->id }}"
                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Abjuntos</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach (json_decode($data->file_img) as $index => $file_img)
                                            @if ($loop->index < count(json_decode($data->file_img)))
                                                <div class="card h-100 w-100">
                                                    <div class="card card-body">
                                                        <img src=" {{ json_decode($data->file_img)[$index] }}"
                                                            alt="" border="1">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <center>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col">
            {{ $bankrequests->links() }}
        </div>
    </div>
</div>


<!-- Modal -->


<style>
    #miTablaPersonalizada th {
        width: 100px;
        /* overflow: auto; */
        border: 1px solid;
    }

    table {
        table-layout: fixed;
    }
</style>
