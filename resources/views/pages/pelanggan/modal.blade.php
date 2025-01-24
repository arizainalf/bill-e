  <!-- Modal -->
  <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <form action="{{ route('pelanggan.store') }}" method="POST">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addCustomerModalLabel">Tambah @yield('title')</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      @csrf
                      <div class="row g-3">
                        <input type="hidden" name="editId">
                          <div class="col-md-12">
                              <label for="name" class="form-label">Nama</label>
                              <input type="text" class="form-control" id="name" name="nama" required>
                          </div>
                          <div class="col-md-12">
                              <label for="phone" class="form-label">No. HP</label>
                              <input type="text" class="form-control" id="phone" name="no_hp" required>
                          </div>
                          <div class="col-12">
                              <label for="address" class="form-label">Alamat</label>
                              <textarea class="form-control" id="address" name="alamat" rows="2" required></textarea>
                          </div>
                          <div class="col-md-12">
                              <label for="name" class="form-label">Daya</label>
                              <div class="input-group mb-3">
                                  <select class="form-select" aria-label="Daya" aria-describedby="tambahDayaGroup"
                                      id="daya" name="tarif_id">
                                      <option selected>Masukan daya listrik</option>
                                      @foreach ($tarifs as $tarif)
                                          <option value="{{ $tarif->id }}">{{ $tarif->daya }}</option>
                                      @endforeach
                                  </select>
                                  <span class="input-group-text" id="tambahDayaGroup">VA</span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                  </div>
              </form>
          </div>
      </div>
  </div>



  <!-- Modal Edit -->
  <div class="modal fade" id="editPelangganModal" tabindex="-1" aria-labelledby="editPelangganModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editPelangganModalLabel">Edit @yield('title')</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('pelanggan.update') }}" method="POST" id="editPelangganForm">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id" id="editId">
                      <div class="row g-3">
                          <div class="col-md-12">
                              <label for="name" class="form-label">Nama</label>
                              <input type="text" class="form-control" id="editNama" name="nama" required>
                          </div>
                          <div class="col-md-12">
                              <label for="phone" class="form-label">No. HP</label>
                              <input type="text" class="form-control" id="editPhone" name="no_hp" required>
                          </div>
                          <div class="col-12">
                              <label for="address" class="form-label">Alamat</label>
                              <textarea class="form-control" id="editAlamat" name="alamat" rows="2" required></textarea>
                          </div>
                          <div class="col-md-12">
                              <label for="name" class="form-label">Daya</label>
                              <div class="input-group mb-3">
                                  <select class="form-select" aria-label="Daya" aria-describedby="tambahDayaGroup"
                                      id="editTarifId" name="tarif_id">
                                      <option selected>Masukan daya listrik</option>
                                      @foreach ($tarifs as $tarif)
                                          <option value="{{ $tarif->id }}">{{ $tarif->daya }}</option>
                                      @endforeach
                                  </select>
                                  <span class="input-group-text" id="tambahDayaGroup">VA</span>
                              </div>
                          </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" form="editPelangganForm">Simpan</button>
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>
