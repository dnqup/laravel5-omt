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
                    <h1>Cập nhật vai trò (Role)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">role</li>
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
                            <form method="POST" action="{{ route('role.update', $role->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên vai trò</label>
                                    <input type="text" name="name" value="{{ old('name') ? old('name') : $role->name }}" class="form-control"
                                           id="name" placeholder="Tên vai trò">
                                    @error('name')
                                    <small class="alert-danger form-text text-muted text-white">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Mô tả vai trò</label>
                                    <textarea name="display_name" placeholder="Mô tả vai trò" class="form-control"
                                              id="display_name" rows="3">{{ old('display_name') ? old('display_name') : $role->display_name }}"</textarea>
                                    @error('display_name')
                                    <small class="alert-danger form-text text-muted text-white">{{ $message }}</small>
                                    @enderror
                                </div>
                                @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox"
                                               value="{{ $permission->id }}"
                                               name="permission_id[]"
                                               class="form-check-input"
                                               id="permission_id{{ $permission->id }}"
                                            {{ $pemissionsChecked->contains('id', $permission->id) ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label"
                                               for="permission_id{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
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
