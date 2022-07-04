<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lọc Nâng Cao</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3">
              <label class="form-label">Tên Nhân Viên</label>             
              <div class="col-lg-8">
                <div class="input text">
                  <input type="text" name="name" value="{{ (isset($_REQUEST['name']) ? $_REQUEST['name'] : '') }}" class="form-control filter-column f-name"  id="name">
                </div>
              </div>             
          </div>     
          <div class="mb-3">
              <label class="form-label">Số Điện Thoại</label>             
              <div class="col-lg-8">
                <div class="input text">
                  <input type="text" name="phone" value="{{ (isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '') }}" class="form-control filter-column f-name"  id="phone">
                </div>
              </div>             
          </div>     
          <div class="mb-3">
              <label class="form-label">Địa Chỉ</label>             
              <div class="col-lg-8">
                <div class="input text">
                  <input type="text" name="address" value="{{ (isset($_REQUEST['address']) ? $_REQUEST['address'] : '') }}" class="form-control filter-column f-name"  id="address">
                </div>
              </div>             
          </div>     
          <div class="mb-3">
              <label class="form-label">Nhóm Nhân Viên</label>             
              <div class="col-lg-8">
                <select class="form-select form-control" name="user_group_id">
                  <option value="">Vui lòng chọn</option>
                  @foreach($userGroups as $userGroup)
                  <option value="{{ $userGroup->id }}" @selected( isset($_REQUEST['user_group_id']) ? $_REQUEST['user_group_id'] == $userGroup->id : false )>
                      {{ $userGroup->name }}               
                  </option>
                  @endforeach
              </select>
              </div>             
          </div>     
        </div>     
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở về</button>
          <button type="submit" class="btn btn-primary" id="apply-filter">Tìm kiếm</button>
          <a href="{{ route('users.index') }}" class="btn btn-dark ">Đặt lại</a>

        </div>
      </div>
    </div>
  </div>