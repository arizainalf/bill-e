@extends('layouts.main')

@section('title', 'Tarif')

@push('styles')
@endpush

@section('main')
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 fw-bold">@yield('title')</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTarifModal">Tambah</button>
        </div>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </nav>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th width="5%">No</th>
                        <th>Daya</th>
                        <th>Tarif Listrik per KWH</th>
                        <th>Dibuat Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tarifs as $tarif)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tarif->daya }} VA</td>
                            <td class="text-end">Rp. {{ number_format($tarif->tarif, 0, ',', '.') }}</td>
                            <td>{{ $tarif->user->name }}</td>
                            <td>
                                <a href="#" class="text-primary me-2" data-id="{{ $tarif->id }}"
                                    data-daya="{{ $tarif->daya }}" data-tarif="{{ $tarif->tarif }}"
                                    onclick="showEditModal(this)">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <a href="{{ route('tarif.destroy', $tarif->id) }}" class="text-danger"><i
                                        class="bi bi-trash-fill"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="d-flex justify-content-between align-items-center mt-3">
            <span>Showing 6 to 10 of 11 results</span>
            <div>
                <label for="perPage" class="me-2">Per page</label>
                <select id="perPage" class="form-select form-select-sm d-inline-block" style="width: auto;">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                </select>
            </div>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div> --}}

    </div>

    @include('pages.tarif.modal')
@endsection

@push('scripts')
    <script>
        function showEditModal(element) {
            const id = element.getAttribute('data-id');
            const daya = element.getAttribute('data-daya');
            const tarif = element.getAttribute('data-tarif');

            document.getElementById('editId').value = id;
            document.getElementById('editDaya').value = daya;
            document.getElementById('editTarif').value = tarif;

            const editModal = new bootstrap.Modal(document.getElementById('editTarifModal'));
            editModal.show();
        }
    </script>
@endpush
