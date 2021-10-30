<button type="button" class="btn" data-toggle="modal" data-target="#show-lookup" id="show" hidden></button>

<div class="modal fade" id="show-lookup" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="modalLabel">Thông tin khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless table-hover">
                    <tbody>
                        <tr class="table-light">
                            <th scope="row">Mã thẻ</th>
                            <td x-text="customer.code" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Ngày kích hoạt</th>
                            <td x-text="customer.is_active"></td>
                        </tr>

                        <tr class="table-light">
                            <th scope="row">Tên khách hàng</th>
                            <td x-text="customer.patient" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Ngày sinh</th>
                            <td x-text="customer.birthday"></td>
                        </tr>

                        <tr class="table-light">
                            <th scope="row">Điện thoại</th>
                            <td x-text="customer.phone"></td>
                        </tr>

                        <tr>
                            <th scope="row">Bác sỹ</th>
                            <td x-text="customer.doctor" class="text-uppercase"></td>
                        </tr>

                        <tr class="table-light">
                            <th scope="row">Nha khoa</th>
                            <td x-text="customer.dentistry" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Labo</th>
                            <td x-text="customer.lab" class="text-uppercase"></td>
                        </tr>

                        <tr class="table-light">
                            <th scope="row">Loại đĩa</th>
                            <td x-text="customer.type" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Số lượng răng</th>
                            <td x-text="customer.num_of_teeth"></td>
                        </tr>

                        <tr class="table-light">
                            <th scope="row">Vị trí răng</th>
                            <td x-text="customer.locations"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
