<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Tên Loại Tin Tức</label>
          <input type="text" name="name" class="form-control" value="{{ (isset($_REQUEST['name']) ? $_REQUEST['name'] : '') }}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở về</button>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
      </div>
    </div>
  </div>
</div>