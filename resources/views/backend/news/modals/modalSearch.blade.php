<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3">
          <label class="form-label">Tên Tin Tức</label>
          <input type="text" name="title" class="form-control" value="{{ (isset($_REQUEST['title']) ? $_REQUEST['title'] : '') }}">
        </div>
        <div class="mb-3">
          <label class="form-label">Thể Loại Tin Tức</label>
          <select class="form-select form-control" name="category_id">
                  <option value="">Vui lòng chọn</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" @selected( isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] == $category->id : false )>
                      {{ $category->name }}               
                  </option>
                  @endforeach
              </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở về</button>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
      </div>
    </div>
  </div>
</div>