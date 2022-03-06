@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column" x-data="guest">
        <header class="container px-5 py-3">
{{--            <img src={{ asset('storage/tooth.png') }} alt="logo">--}}
        </header>

        <main class="bg-light container p-5">
            <div class="text-center">
                <h2 class="text-uppercase text-primary">Truy xuất nguồn gốc xuất xứ vật liệu</h2>

                <img src={{ asset('storage/hinh-cercon.jpg') }} alt="image" class="my-3 rounded shadow img-fluid" style="max-width: 35%; min-width: 300px;">

                <div class="m-3  mx-auto" style="max-width: 35%; min-width: 300px;">
                    <input type="text" class="form-control mb-2" placeholder="Nhập mã thẻ" x-model="code" required>
                    <input type="number" class="form-control" placeholder="Nhập năm sinh" min="1900" max="2100" step="1" x-model="year" required>

                    <template x-if="errorForm">
                        <div class="text-danger my-2 font-weight-bold" x-text="errorForm"></div>
                    </template>
                </div>

                <template x-if="error">
                    <div class="text-danger my-2 font-weight-bold" x-text="error"></div>
                </template>

                <div class="form-check mt-4 mb-3 d-inline-block">
                    <input type="checkbox" class="form-check-input" value="" id="check" style="width: 18px; height: 18px; top: -4px;" :checked="isAccept" x-model="isAccept" required>
                    <label for="check" class="form-check-label opacity-75 ml-2">Tôi đồng ý việc sử dụng các thông tin cá nhân cung cấp trên website này cho mục đích truy xuất nguồn gốc xuất xứ vật liệu phục hình Cercon.</label>
                </div>

                <template x-if="errorNotAccept">
                    <div class="text-danger mb-3 font-weight-bold" x-text="errorNotAccept"></div>
                </template>

                <div>
                    <button type="button" class="btn btn-primary" @click="lookup()">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin-bottom: 2px;" x-show="processing"></span>

                        <img src={{ asset('storage/search.svg') }} alt="search" x-show="!processing">
                        Tra cứu
                    </button>
                </div>
            </div>

            <template x-if="customer.code">
                <div class="d-flex justify-content-center mt-5">
                    <table class="table w-50 bg-white shadow rounded">
                        <thead class="bg-primary text-white font-weight-normal" style="font-size: 18px;">
                            <tr>
                                <th colspan="2" class="font-weight-normal"><span><img src={{ asset('storage/info.svg') }} alt="info"></span> Thông tin nguồn gốc vật liệu</th>
                            </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <th scope="row">Mã thẻ</th>
                            <td x-text="customer.code" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Ngày kích hoạt</th>
                            <td x-text="customer.is_active"></td>
                        </tr>

                        <tr>
                            <th scope="row">Tên khách hàng</th>
                            <td x-text="customer.patient" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Ngày sinh</th>
                            <td x-text="customer.birthday"></td>
                        </tr>

                        <tr>
                            <th scope="row">Điện thoại</th>
                            <td x-text="customer.phone"></td>
                        </tr>

                        <tr>
                            <th scope="row">Bác sỹ</th>
                            <td x-text="customer.doctor" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Nha khoa</th>
                            <td x-text="customer.dentistry" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Labo</th>
                            <td x-text="customer.lab" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Loại đĩa</th>
                            <td x-text="customer.type" class="text-uppercase"></td>
                        </tr>

                        <tr>
                            <th scope="row">Số lượng răng</th>
                            <td x-text="customer.num_of_teeth"></td>
                        </tr>

                        <tr>
                            <th scope="row">Vị trí răng</th>
                            <td x-text="customer.locations"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </template>
        </main>

        <div class="bg-white">
            <div class="p-5 container">
                <div class="pb-3">
                    <div class="text-primary font-weight-bold">Chi Tiết:</div>

                    <ol class="list-group px-3" style="line-height: 35px">
                        <li>Phục hình Cercon được sản xuất bằng vật liệu chính hãng nhập khẩu bởi Công ty TNHH Dentsply Sirona Việt Nam.</li>
                        <li>Khách hàng sử dụng phục hình Cercon đúng với hướng dẫn của bác sĩ  điều trị.</li>
                        <li>Bác sĩ điều trị và Labo nha khoa chịu trách nhiệm thực hiện và bảo hành, đảm bảo tính thẩm mỹ, chức năng của phục hình.</li>
                    </ol>
                </div>

                <div>
                    <div class="text-primary font-weight-bold">Một Số Lưu Ý Khi Sử Dụng Phục Hình Cercon:</div>

                    <ol class="list-group px-3" style="line-height: 35px">
                        <li>Sau khi gắn phục hình bạn cần thời gian để quen với phục hình mới, răng và nướu có thể nhạy cảm vài ngày đầu khi mang phục hình. </li>
                        <li>Cũng như răng thật bạn nên bảo vệ phục hình bằng cách không dùng răng cắn hoặc nhai thức ăn quá cứng (xương, nước đá…). Bạn nên tránh dùng thức ăn quá nóng hay quá lạnh. Súc miệng bằng nước muối ấm có thể mang lại cảm giác dễ chịu hơn.</li>
                        <li>Giữ vệ sinh răng miệng sau khi ăn, luôn chải răng, dùng chỉ nha khoa nếu cần để bảo vệ nướu và phần răng thật bên dưới phục hình.</li>
                        <li>Nếu phục hình không thăng bằng khi ăn nhai bạn nên liên hệ bác sĩ điều trị.</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="bg-light">
            <div class="container p-5">
                <div class="mb-4">
                    <h4 class="text-uppercase mb-3">DANH SÁCH NHA KHOA</h4>

                    <div class="d-flex text-uppercase justify-content-around" style="font-size: 18px;">
                        <a href="/">TP. HỒ CHÍ MINH</a>
                        <a href="/">HÀ NỘI</a>
                        <a href="/">CÁC TỈNH KHÁC</a>
                    </div>
                </div>

                <div>
                    <h4 class="text-uppercase mb-3">DANH SÁCH LABO</h4>

                    <div class="d-flex text-uppercase justify-content-around" style="font-size: 18px;">
                        <a href="/">TP. HỒ CHÍ MINH</a>
                        <a href="/">HÀ NỘI</a>
                        <a href="/">CÁC TỈNH KHÁC</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-primary text-white">
            <div class="container px-5 py-4">
                <div style="font-size: 16px">Đơn vị nhập khẩu chính thức vật liệu Cercon:</div>

                <ul class="list-group list-unstyled">
                    <li class="py-1"><span><img src={{ asset('storage/home.svg') }} alt=""></span> Công ty TNHH Dentsply Sirona Việt Nam</li>
                    <li class="py-1"><span><img src={{ asset('storage/map-pin.svg') }} alt=""></span> Lầu 20A Tòa nhà Vincom Center Đồng Khởi, 72 Lê Thánh Tôn và 45A Lý Tự Trọng, P. Bến Nghé, Q.1, TP Hồ Chí Minh</li>
                    <li class="py-1"><span><img src={{ asset('storage/phone.svg') }} alt=""></span> Tel: <a href="tel:028 3622 0080" class="text-white">028 3622 0080</a> - Hotline: <a href="tel:028 3622 0080" class="text-white">028 3622 0080</a></li>
                    <li class="py-1"><span><img src={{ asset('storage/mail.svg') }} alt=""></span> Email: <a href="mailto:hang.nguyen@dentsplysirona.com" class="text-white">hang.nguyen@dentsplysirona.com</a></li>
                    <li class="py-1"><span><img src={{ asset('storage/share-2.svg') }} alt=""></span> <a href="/" class="text-white">www.dentsplysirona.com.vn</a></li>
                </ul>

                <hr class="bg-white">

                <div>Copyright &copy; 2017 Dentsply Sirona Việt Nam</div>
            </div>
        </footer>

{{--        @include('modal')--}}
    </div>
@endsection
