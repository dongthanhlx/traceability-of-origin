@extends('layouts.app')

@section('content')
    @include('nav')

    <div x-data="admin">
        <div class="mx-5 my-2 d-flex justify-content-between">
            <div class="input-group mw-100 d-inline-flex" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Nhập từ cần tìm kiếm" aria-label="search" aria-describedby="search" x-model="text">
                <button class="btn btn-outline-secondary" type="button" id="search" @click="search()">Tìm kiếm</button>
            </div>

            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#create" @click="processing = {}">
                Thêm khách hàng
            </button>
        </div>

        <table class="table table-hover">
            <thead>
                <th>#</th>

                <template x-for="title in titles">
                    <th scope="col" x-text="title"></th>
                </template>

                <th>Action</th>
            </thead>

            <tbody>
            <template x-for="(customer, index) in customers">
                <tr>
                    <th scope="row" x-text="index + 1"></th>

                    <template x-for="field in fields">
                        <th x-text="customer[field]" class="font-weight-normal"></th>
                    </template>

                    <th class="flex">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#update" @click="select(index, customer)">
                            Edit
                        </button>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete" @click="select(index, customer)">
                            Delete
                        </button>
                    </th>
                </tr>
            </template>
            </tbody>
        </table>

        @include('admin.modal', ['type' => 'create'])
        @include('admin.modal', ['type' => 'update'])

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Xóa thông tin bệnh nhân</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn chắc chắn muốn xóa thông tin bệnh nhân <span class="text-uppercase text-danger font-weight-bold" x-text="processing.patient"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" @click="destroy">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
