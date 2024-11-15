<tr>
    <td>{{ $no }}</td>
    <td>
        {{ $kodeRekening->kode_rekening }}
    </td>
    <td>{{ $kodeRekening->uraian }}</td>
    <td>
        <button type="button" data-bs-toggle="modal" data-bs-target="#inlineFormadd{{ $kodeRekening->id }}"
            class="btn btn-success rounded-circle"><i class="fa fa-plus"></i>
        </button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#inlineForm{{ $kodeRekening->id }}"
            class="btn btn-warning rounded-circle"><i class="fa fa-edit"></i>
        </button>
        <form action="/kodrek/hapus/{{ $kodeRekening->id }}" method="POST" class="d-inline hapus">
            @method('delete') @csrf
            <button type="button" onclick="hapus({{ $kodeRekening->id }})" class="btn btn-danger rounded-circle"><i
                    class="fa fa-trash"></i>
            </button>
        </form>
    </td>
</tr>

@foreach ($kodeRekening->childrenRecursive as $child)
    @include('components.kodrek_row', ['kodeRekening' => $child, 'no' => $no])
@endforeach
