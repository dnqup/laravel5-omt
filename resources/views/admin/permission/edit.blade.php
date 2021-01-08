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
                    <h1>Cập nhật permission</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">permission</li>
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

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <form method="POST" action="{{ route('permission.update', $permission->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" value="{{ old('name') ? old('name') : $permission->name }}" class="form-control" id="name"
                                           placeholder="name">
                                    @error('name')
                                    <small class="alert-danger form-text text-muted text-white">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="display_name">display name</label>
                                    <input type="text" name="display_name" value="{{ old('display_name') ? old('display_name') : $permission->display_name }}" class="form-control" id="display_name"
                                           placeholder="display name">
                                    @error('display_name')
                                    <small class="alert-danger form-text text-muted text-white">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="key_code">key_code</label>
                                    <input type="text" name="key_code" value="{{ old('key_code') ? old('key_code') : $permission->key_code }}" class="form-control" id="key_code"
                                           placeholder="key_code">
                                    @error('key_code')
                                    <small class="alert-danger form-text text-muted text-white">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </form>
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
