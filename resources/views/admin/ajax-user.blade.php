@extends('admin.layouts.app')
@section('content')
</div>
</aside>
<div class="content-wrapper" style="min-height: 1336px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý user</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách bài viết</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    @can('add_user')
                                        <button type="button" class="btn-primary" data-toggle="modal"
                                                data-target="#addUserModal">Thêm mới
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="dataPost" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tên tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Ngày</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="tbody">
                                @foreach($users as $key => $value )

                                    <tr class="row{{ $value->id }}">
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->username }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            @can('edit_user')
                                                <button data-url="{{ route('user.edit',$value->id) }}" type="button"
                                                        data-toggle="modal" data-target="#editUserModal"
                                                        class="btn btn-warning update">Sửa
                                                </button>
                                            @endcan
                                            @can('delete_user')
                                                <button iduser="{{ $value->id }}" type="button"
                                                        class="btn btn-danger delete">Xóa
                                                </button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div>
    </section>
</div>


<!-- Modal add -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPost" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Họ tên</label>
                            <input type="text" name="name" class="form-control" id="name"
                                   placeholder="Tên tài khoản">
                            @error('name')
                            <small class="alert-danger form-text text-muted text-white">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Địa chỉ email">
                            @error('email')
                            <small class="alert-danger form-text text-muted text-white">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Tên tài khoản</label>
                            <input type="text" name="username" class="form-control" id="username"
                                   placeholder="Tên tài khoản">
                            @error('username')
                            <small class="alert-danger form-text text-muted text-white">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Mật khẩu') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   autocomplete="new-password" placeholder="Mật khẩu">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Phân quyền</label>
                            <select class="custom-select" name="level" id="level">
                                <option selected disabled value="">Chọn quyền tài khoản</option>
                                <option value="0">Khách hàng</option>
                                <option value="1">Admin</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Chọn vai trò') }}</label>
                            <br/>
                            <select name="role_id[]" class="form-control select2" multiple
                                    style="width: 100%">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal edit -->

<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Cập nhật user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditUser" method="post" action="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Tên tài khoản</label>
                            <input type="text" name="username" class="form-control" id="username1"
                                   placeholder="Tên tài khoản" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Họ tên</label>
                            <input type="text" name="name" class="form-control" id="name1"
                                   placeholder="Tên tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email1"
                                   placeholder="Địa chỉ email">
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Mật khẩu mới') }}</label>
                            <input id="password1" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Phân quyền</label>
                            <select class="custom-select level-user" name="level" id="level">
                                <option selected disabled value="">Chọn quyền tài khoản</option>
                                <option value="0">Khách hàng</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Chọn vai trò') }}</label>
                            <br/>
                            <select name="role_id[]" id="select-init" class="form-control select2 option-role" multiple
                                    style="width: 100%">
                                {{--                                <option value=""></option>--}}
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        // $('.select2').select2({
        //     'placeholder': 'Chọn vai trò',
        // })

        function clearData() {
            $('#name').val('');
            $('#email').val('');
            $('#username').val('');
            $('#password').val('');
        }

        function deleteUser(urlDelete, id) {
            if (confirm("Bạn có chắc chắn muốn xóa không?")) {
                let row = $('.row' + id);
                $.ajax({
                    url: urlDelete + '/' + id,
                    type: 'delete',
                    success: function (data) {
                        row.remove();
                    }
                })
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formPost').submit(function (e) {
            e.preventDefault();

            let formData = new FormData($('#formPost')[0]);
            $.ajax({
                type: 'POST',
                url: '{{ route('user.store') }}',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response) {
                        $('#addUserModal').hide();
                        $('.modal-backdrop').hide();
                        clearData();
                        setTimeout(function () {
                            window.location.href = "/admin/users";
                        }, 300);
                    }
                },
                error: function () {
                    console.log("Lỗi");
                }
            });
        });

        $('.delete').click(function () {
            let id = $(this).attr("iduser");
            let b = deleteUser("/admin/users/destroy", id);
        });

        $('.update').click(function (e) {
            clearRole();
            var url = $(this).attr('data-url');
            e.preventDefault();
            var levelUser = $('.level-user');


            $.ajax({
                type: 'get',
                url: url,
                success: function (response) {
                    let roles = response.roles;
                    let vals = ""; //danh 1,23,5,6
                    roles.forEach(e => vals += e.id += ',');
                    console.log(vals)
                    showRole(vals);

                    $('#name1').val(response.name);
                    $('#email1').val(response.email);
                    $('#username1').val(response.username);
                    $('#password1').val(response.password);
                    $('.level-user').val(response.level);

                    $('#formEditUser').attr('data-url', '/admin/users/update/' + response.id);
                },
                error: function () {
                    console.log("Lỗi");
                }
            })
        });

        $('#formEditUser').submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            let formEditUser = new FormData($('#formEditUser')[0]);

            $.ajax({
                type: 'post',
                url: url,
                data: formEditUser,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response) {
                        $('#editUserModal').hide();
                        $('.modal-backdrop').hide();
                        clearData();
                        setTimeout(function () {
                            window.location.href = "/admin/users";
                        }, 300);
                    }
                },
                error: function () {
                    console.log("Lỗi");
                }
            });
        })

        $("#select2-init option").each(function () {
            console.log($(this));
        });

        function showRole(ids) {
            $.each(ids.split(","), function (i, e) {
                $("#select-init option[value='" + e + "']").prop("selected", true);
            });
        }

        function clearRole() {
            $("#select-init option").each(function () {
                $(this).prop("selected", false);
            }).val();
        }
    </script>
@endpush
@endsection
