@extends('layouts.main')

@section('title', 'Pelanggan')

@push('styles')
@endpush

@section('main')
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 fw-bold">@yield('title')</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Tambah</button>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </nav>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Daya Listrik</th>
                        <th>Tarif Listrik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if($pelanggans->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Data Kosong</td>
                        </tr>
                    @endif
                    @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelanggan->nama }}</td>
                            <td>{{ $pelanggan->no_hp }}</td>
                            <td>{{ $pelanggan->alamat }}</td>
                            <td>{{ $pelanggan->tarif->daya }} VA</td>
                            <td class="text-end">Rp. {{ number_format($pelanggan->tarif->tarif, 0, ',', '.') }}</td>
                            <td>
                                <a href="#" class="text-primary me-2" data-id="{{ $pelanggan->id }}"
                                    data-nama="{{ $pelanggan->nama }}" data-alamat="{{ $pelanggan->alamat }}"
                                    data-tarif-id="{{ $pelanggan->tarif_id }}" data-no-hp="{{ $pelanggan->no_hp }}"
                                    data-tarif="{{ $pelanggan->tarif->tarif }}" data-daya="{{ $pelanggan->tarif->daya }}"
                                    onclick="showEditModal(this)">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                               <a href="{{ route('pelanggan.destroy', $pelanggan->id) }}" class="text-danger"><i
                                        class="bi bi-trash-fill"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    @include('pages.pelanggan.modal')
@endsection

@push('scripts')
    <script>
        function showEditModal(element) {
            const id = element.getAttribute('data-id');
            const tarifId = element.getAttribute('data-tarif-id');
            const nama = element.getAttribute('data-nama');
            const alamat = element.getAttribute('data-alamat');
            const noHp = element.getAttribute('data-no-hp');

            document.getElementById('editId').value = id;
            document.getElementById('editTarifId').value = tarifId;
            document.getElementById('editNama').value = nama;
            document.getElementById('editAlamat').value = alamat;
            document.getElementById('editPhone').value = noHp;

            const editModal = new bootstrap.Modal(document.getElementById('editPelangganModal'));
            editModal.show();
        }
    </script>
@endpush
