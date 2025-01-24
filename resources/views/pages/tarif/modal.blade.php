  <!-- Modal -->
  <div class="modal fade" id="addTarifModal" tabindex="-1" aria-labelledby="addTarifModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <form action="{{ route('tarif.store') }}" method="POST">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addTarifModalLabel">Tambah @yield('title')</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      @csrf

                      <div class="row g-3">
                          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                          <div class="col-md-12">
                              <label for="name" class="form-label">Daya</label>
                              <div class="input-group mb-3">
                                  <input type="number" class="form-control text-end" placeholder="Masukan daya listrik"
                                      aria-label="Daya" aria-describedby="tambahDayaGroup" id="daya" required name="daya">
                                  <span class="input-group-text" id="tambahDayaGroup">VA</span>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <label for="phone" class="form-label">Tarif Per KWH</label>
                              <div class="input-group mb-3">
                                  <span class="input-group-text" id="tambahTarifGroup">Rp. </span>
                                  <input type="number" class="form-control text-end" placeholder="Tarif per kWh"
                                      aria-label="Tarif" aria-describedby="tambahTarifGroup" id="tarif" required name="tarif">
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
  <div class="modal fade" id="editTarifModal" tabindex="-1" aria-labelledby="editTarifModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editTarifModalLabel">Edit @yield('title')</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('tarif.update') }}" method="POST" id="editTarifForm">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id" id="editId">
                      <div class="row g-3">
                          <div class="col-md-12">
                              <label for="editDaya" class="form-label">Daya</label>
                              <div class="input-group mb-3">
                                  <input type="text" class="form-control text-end" placeholder="Masukan daya listrik"
                                      aria-label="Daya" aria-describedby="editDayaGroup" id="editDaya" name="daya"
                                      required>
                                  <span class="input-group-text" id="editDayaGroup">VA</span>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <label for="editTarif" class="form-label">Tarif Per KWH</label>
                              <div class="input-group mb-3">
                                  <span class="input-group-text" id="editTarifGroup">Rp. </span>
                                  <input type="text" class="form-control text-end" placeholder="Masukan daya listrik"
                                      aria-label="Daya" aria-describedby="editTarifGroup" id="editTarif" name="tarif"
                                      required>
                              </div>
                          </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" form="editTarifForm">Simpan</button>
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
              </div>
          </div>
      </div>
  </div>
