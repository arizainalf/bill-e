  <!-- Modal -->
  <!-- Modal Add -->
  <div class="modal fade" id="addTagihanModal" tabindex="-1" aria-labelledby="addTagihanModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <form action="{{ route('tagihan.store') }}" method="POST">
                  @csrf
                  <div class="modal-header">
                      <h5 class="modal-title" id="addTagihanModalLabel">Tambah @yield('title')</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="addPelanggan" class="form-label">Pelanggan</label>
                          <select class="form-select" id="addPelanggan" name="pelanggan_id">
                              @foreach ($pelanggans as $pelanggan)
                                  <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="addBulan" class="form-label">Tahun, Bulan</label>
                          <input type="month" name="bulan" class="form-control" id="addBulan">
                      </div>
                      <div class="mb-3">
                          <label for="addPemakaian" class="form-label">Pemakaian</label>
                          <input type="number" name="pemakaian" class="form-control" id="addPemakaian">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                  </div>
              </form>
          </div>
      </div>
  </div>


  <!-- Modal Edit -->
  <!-- Modal Edit -->
  <div class="modal fade" id="editTagihanModal" tabindex="-1" aria-labelledby="editTagihanModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <form action="{{ route('tagihan.update') }}" method="POST" id="editTagihanForm">
                  @csrf
                  @method('PUT')
                  <div class="modal-header">
                      <h5 class="modal-title" id="editTagihanModalLabel">Edit @yield('title')</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <input type="hidden" name="id" id="editId">
                      <div class="mb-3">
                          <label for="editPelanggan" class="form-label">Pelanggan</label>
                          <select class="form-select" id="editPelanggan" name="pelanggan_id">
                              @foreach ($pelanggans as $pelanggan)
                                  <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="editBulan" class="form-label">Tahun, Bulan</label>
                          <input type="month" name="bulan" class="form-control" id="editBulan">
                      </div>
                      <div class="mb-3">
                          <label for="editPemakaian" class="form-label">Pemakaian</label>
                          <input type="number" name="pemakaian" class="form-control" id="editPemakaian">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
