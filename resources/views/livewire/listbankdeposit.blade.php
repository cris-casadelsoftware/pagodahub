<div class="table-responsive">
    <table class="table table-bordered">
        <thead id="miTablaPersonalizada">
            {{-- <input type="week" class="form-control" placeholder="#Vale" wire:model="date"  data-date-format="DD MMMM YYYY" aria-label="Username" aria-describedby="basic-addon1"> --}}
            <th>Fecha</th>
            <th>Banco</th>
            <th>Depócito a banco</th>
            <th>Abjuto de imagenes</th>

        </thead>
        <tbody>
            {{-- {{ $bankrequests }} --}}
            @foreach ($bankdeposits as $data)
                <tr>
                    <td>{{ $data->created_at->format('d-m-Y') }} </td>
                    <td>{{ $data->banks }}</td>
                    <td>$ {{ $data->cash }}</td>
                    <td>
                        @foreach (json_decode($data->file_img) as $index => $file_img)
                            @if ($loop->index < count(json_decode($data->file_img)))
                                <img src="" alt="{{ $loop->index }}">
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col">
            {{ $bankdeposits->links() }}
        </div>
    </div>
</div>
<!-- Modal -->
<style>
    #miTablaPersonalizada th {
        width: 100px;
        border: 1px solid;
    }

    table {
        table-layout: fixed;
    }
</style>
