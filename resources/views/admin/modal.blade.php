<div class="modal fade" id="{{ $type == 'create' ? 'create': 'update' }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modalLabel">{{ $type == 'create' ? 'Thêm khách hàng': 'Cập nhật thông tin khách hàng' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="code" class="col-sm-4 col-form-label font-weight-bold">Mã thẻ</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" x-model="processing.code">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="isActive" class="col-sm-4 col-form-label font-weight-bold">Ngày kích hoạt</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" x-model="processing.is_active">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="patient" class="col-sm-4 col-form-label font-weight-bold">Bệnh nhân</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" x-model="processing.patient">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="birthday" class="col-sm-4 col-form-label font-weight-bold">Ngày sinh</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" x-model="processing.birthday">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="phone" class="col-sm-4 col-form-label font-weight-bold">Điện thoại</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" x-model="processing.phone">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="doctor" class="col-sm-4 col-form-label font-weight-bold">Bác sỹ</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" x-model="processing.doctor">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="dentistry" class="col-sm-4 col-form-label font-weight-bold">Nha khoa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" x-model="processing.dentistry">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="lab" class="col-sm-4 col-form-label font-weight-bold">Labo</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" x-model="processing.lab">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="type" class="col-sm-4 col-form-label font-weight-bold">Loại đĩa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" x-model="processing.type">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="numOfTeeth" class="col-sm-4 col-form-label font-weight-bold">Số lượng răng</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" x-model="processing.num_of_teeth">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="locations" class="col-sm-4 col-form-label font-weight-bold">Vị trí răng</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" x-model="processing.locations">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Hủy</button>

                @if($type == 'create')
                    <button class="btn btn-primary" @click="store">Thêm</button>
                @else
                    <button class="btn btn-primary" @click="update">Cập nhật</button>
                @endif
            </div>
        </div>
    </div>
</div>
