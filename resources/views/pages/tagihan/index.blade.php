@extends('layouts.main')

@section('title', 'Tagihan')

@push('styles')
@endpush

@section('main')
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 fw-bold">@yield('title')</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTagihanModal">Tambah</button>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tagihan.index') }}">@yield('title')</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </nav>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Pelanggan</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Daya</th>
                        <th>Tarif Per KWH</th>
                        <th>Pemakaian KWH</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if ($tagihans->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Data Kosong</td>
                        </tr>
                    @endif
                    @foreach ($tagihans as $tagihan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tagihan->pelanggan->nama }}</td>
                            <td>{{ $tagihan->bulan }}</td>
                            <td>{{ $tagihan->tahun }}</td>
                            <td>{{ $tagihan->pelanggan->tarif->daya }} VA</td>
                            <td class="text-end">Rp. {{ number_format($tagihan->pelanggan->tarif->tarif, 0, ',', '.') }} / KWH</td>
                            <td>{{ $tagihan->pemakaian }} KWH</td>
                            <td class="text-end">Rp. {{ number_format($tagihan->tagihan, 0, ',', '.') }}</td>
                            <td>
                                <a href="#" class="text-primary me-2" data-id="{{ $tagihan->id }}"
                                    data-pelanggan-id="{{ $tagihan->pelanggan->id }}" data-bulan="{{ $tagihan->bulan }}"
                                    data-tahun="{{ $tagihan->tahun }}" data-pemakaian="{{ $tagihan->pemakaian }}"
                                    onclick="showEditModal(this)">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <a href="{{ route('tagihan.destroy', $tagihan->id) }}" class="text-danger"><i
                                        class="bi bi-trash-fill"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    @include('pages.tagihan.modal')
@endsection

@push('scripts')
    <script>
        function showEditModal(element) {
            const id = element.getAttribute('data-id');
            const pelangganId = element.getAttribute('data-pelanggan-id');
            const bulan = element.getAttribute('data-bulan'); // Ambil data bulan
            const tahun = element.getAttribute('data-tahun'); // Ambil data tahun
            const pemakaian = element.getAttribute('data-pemakaian');

            // Isi input dengan nilai yang diperoleh
            document.getElementById('editId').value = id;
            document.getElementById('editPelanggan').value = pelangganId;
            document.getElementById('editBulan').value = `${tahun}-${bulan.padStart(2, '0')}`; // Format menjadi YYYY-MM
            document.getElementById('editPemakaian').value = pemakaian;

            const editModal = new bootstrap.Modal(document.getElementById('editTagihanModal'));
            editModal.show();
        }
    </script>
@endpush
