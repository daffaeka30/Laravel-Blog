<!-- Modal -->
<div class="modal fade" id="modalWriter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" id="formWriter">
              <input type="hidden" name="id" id="id">
  
              <div class="mb-3">
                  <label for="is_verified">Verification Status</label>
                  <select name="is_verified" id="is_verified" class="form-select">
                      <option value="" hidden>== Select Status ==</option>
                      <option value="unverified">Unverified</option>
                      <option value="verified">Verified</option>
                  </select>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="formWriter" class="btn btn-primary btnSubmit">Submit</button>
        </div>
      </div>
    </div>
  </div>