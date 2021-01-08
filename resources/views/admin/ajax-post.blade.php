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
                    <h1>Quản lý bài viết</h1>
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
                                    <button type="button" class="btn-primary" data-toggle="modal"
                                            data-target="#addPostModal">Thêm mới
                                    </button>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="dataPost" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Tiêu đề</th>
                                    <th>Hình</th>
                                    <th>Nội dung tóm tắt</th>
                                    <th>Người tạo</th>
                                    <th>Ngày</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="tbody">
                                @foreach($posts as $key => $value )

                                    <tr class="row{{ $value->id }}">
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>
                                            <img src="/images/{{ $value->url_image }}" alt="" height="60">
                                        </td>
                                        <td>{{ $value->content_summary }}</td>
                                        <td width="10%">{{ $value->user->username }}</td>
                                        <td width="10%">{{ $value->created_at }}</td>
                                        <td width="11%">
                                            <button data-url="{{ route('post.edit',$value->id) }}" type="button"
                                                    data-toggle="modal" data-target="#editPostModal"
                                                    class="btn btn-warning update">Sửa
                                            </button>
                                            <button idpost="{{ $value->id }}" type="button"
                                                    class="btn btn-danger delete">Xóa
                                            </button>
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
<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm mới bài viết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPost" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" class="form-control" id="title"
                                   placeholder="Tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="content_text">Nội dung</label>
                            <textarea class="form-control" name="content_text" id="content_text" rows="3"
                                      placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content_summary">Nội dung tóm tắt</label>
                            <input type="text" class="form-control" name="content_summary" id="content_summary"
                                   placeholder="Nội dung tóm tăt">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="url_image" class="custom-file-input" id="url_image">
                                    <label class="custom-file-label" for="url_image">Hình ảnh</label>
                                </div>
                            </div>
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

<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Cập nhật bài viết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditPost" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" class="form-control" id="title1"
                                   placeholder="Tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="content_text">Nội dung</label>
                            <textarea class="form-control" name="content_text" id="content_text1" rows="3"
                                      placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content_summary">Nội dung tóm tắt</label>
                            <input type="text" class="form-control" name="content_summary" id="content_summary1"
                                   placeholder="Nội dung tóm tăt">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label> <br/>
                            <img id="editImage" alt="" height="60"> <br/>
                            <br/>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="url_image" class="custom-file-input" id="url_image1">
                                    <label class="custom-file-label" for="url_image">Hình ảnh</label>
                                </div>
                            </div>
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
        function clearData() {
            $('#title').val('');
            $('#content_text').val('');
            $('#content_summary').val('');
            $('#url_image').val('');
        }

        function deletePost(urlDelete, id) {
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
                url: '{{ route('post.store') }}',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response) {
                        $('#addPostModal').hide();
                        $('.modal-backdrop').hide();
                        clearData();
                        setTimeout(function () {
                            window.location.href = "/admin/posts";
                        }, 300);
                    }
                },
                error: function () {
                    console.log("Lỗi");
                }
            });
        });

        $('.delete').click(function () {
            let id = $(this).attr("idpost");
            console.log(id);
            let b = deletePost("/admin/posts/destroy", id);
        });

        $('.update').click(function (e) {
            var url = $(this).attr('data-url');
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: url,
                success: function (response) {
                    $('#title1').val(response.title);
                    $('#content_text1').val(response.content_text);
                    $('#content_summary1').val(response.content_summary);
                    $('#editImage').attr('src', '../images/' + response.url_image);
                    $('#formEditPost').attr('data-url', '/admin/posts/update/' + response.id)
                },
                error: function () {
                    console.log("Lỗi");
                }

            })
        });

        $('#formEditPost').submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            let formEditPost = new FormData($('#formEditPost')[0]);
            console.log(url);
            $.ajax({
                type: 'post',
                url: url,
                data: formEditPost,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    if (response) {
                        $('#editPostModal').hide();
                        $('.modal-backdrop').hide();
                        // clearData();
                        setTimeout(function () {
                            window.location.href = "/admin/posts";
                        }, 300);
                    }
                },
                error: function () {
                    console.log("Lỗi");
                }
            });
        })

    </script>
@endpush
@endsection
