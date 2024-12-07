<?php $no = 1; ?>
<tr>
    <td><?= $no++ ?></td>
    <td>
        {{ $kodeRekening->kode_rekening }}
    </td>
    <td>{{ $kodeRekening->uraian }}</td>
    <td>
        <button type="button" data-bs-toggle="modal" data-bs-target="#inlineFormadd"
            class="btn btn-success rounded-circle btn-tambah-sub" data-id="{{ $kodeRekening->id }}"
            data-parent-id="{{ $kodeRekening->parent_id }}"><i class="fa fa-plus"></i>
        </button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#inlineFormedit"
            class="btn btn-warning rounded-circle btn-ubah" data-id="{{ $kodeRekening->id }}"
            data-kode="{{ $kodeRekening->kode_rekening }}" data-uraian="{{ $kodeRekening->uraian }}"><i
                class="fa fa-edit"></i>
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
    @include('components.kodrek_row', ['kodeRekening' => $child])
@endforeach
