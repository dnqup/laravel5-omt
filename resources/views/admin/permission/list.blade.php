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
                    <h1>Quản lý Permission</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Permission</li>
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
                            <h3 class="card-title">Danh sách permission</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    @can('add_permission')
                                        <a href="{{ route('permission.create') }}">
                                            <button type="button" class="btn-primary">Thêm mới</button>
                                        </a>
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
                                    <th>Tên permission</th>
                                    <th>Mô tả</th>
                                    <th>Key code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="tbody">
                                @foreach($permissions as $key => $value )

                                    <tr class="row{{ $value->id }}">
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->display_name }}</td>
                                        <td>{{ $value->key_code }}</td>
                                        <td>
                                            @can('edit_permission')
                                                <a href="{{ route('permission.edit', $value->id) }}">
                                                    <button type="button" class="btn btn-warning">Sửa</button>
                                                </a>
                                            @endcan
                                            @can('delete_permission')
                                                <a href="{{ route('permission.destroy', $value->id) }}">
                                                    <button type="button" class="btn btn-danger">Xóa</button>
                                                </a>
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

@endsection
