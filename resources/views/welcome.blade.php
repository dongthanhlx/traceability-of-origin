@extends('layouts.app')

@section('body')
    <div class="d-flex flex-column" x-data="guest">
        <header class="container px-5 py-3">
            <img src={{ asset('storage/logo.png') }} alt="logo">
        </header>

        <main class="bg-light">
            <div class="container p-5 text-center">
                <h2 class="text-uppercase text-primary">Truy xuất nguồn gốc xuất xứ vật liệu</h2>

                <img src={{ asset('storage/hinh-cercon.jpg') }} alt="image" class="my-3 rounded shadow img-fluid" style="max-width: 35%;">

                <div class="m-3  mx-auto" style="max-width: 35%;">
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
        </main>

        <footer>

        </footer>

        @include('modal')
    </div>
@endsection
