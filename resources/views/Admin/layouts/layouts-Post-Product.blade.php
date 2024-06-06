<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta ame="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png"
        href="https://static.ybox.vn/2021/5/3/1621424753923-Logo%20chuan-7%20copy.jpg" />
    <title>Bài viết - Quản lý bài viết mặt hàng</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('Admin.sidenav', ['active' => 'post'])
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('Admin.nav', ['title' => 'Trang quản lý bài viết mặt hàng.'])
        <div class="container-fluid py-4">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    @include('Admin.settings')
    <!--   Core JS Files   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
    <script>
        document.getElementById('topmuasamedit').addEventListener('change', function() {
            this.value = this.checked ? 1 : 0;
        });
    </script>
    <script>
        document.getElementById('topmuasamcreate').addEventListener('change', function() {
            this.value = this.checked ? 1 : 0;
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#ajax-table-Product').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('ManagerPostProducts') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'MAMH',
                        name: 'MAMH'
                    },
                    {
                        data: 'TENMH',
                        name: 'TENMH'
                    },

                    {
                        data: 'PICTURE',
                        name: 'PICTURE',
                        render: function(data, type, full, meta) {
                            return '<img src="' + data + '" style="width: 60px; margin: auto""/>';
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                lengthMenu: [{
                    label: 'Hiển thị 5 loại.',
                    value: 5
                }, {
                    label: 'Hiển thị 10 loại.',
                    value: 10
                }, {
                    label: 'Hiển thị 15 loại.',
                    value: 15
                }, {
                    label: 'Hiển thị 20 loại.',
                    value: 20
                }, {
                    label: 'Hiển thị 30 loại.',
                    value: 30
                }, {
                    label: 'Hiển thị 60 loại.',
                    value: 60
                }, {
                    label: 'All',
                    value: -1
                }],
                language: {
                    "emptyTable": "Không có dữ liệu trong bảng",
                    "info": "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi.",
                    "infoEmpty": "Hiển thị 0 đến 0 của 0 bản ghi",
                    "infoFiltered": "(Lọc từ _MAX_ tổng số bản ghi)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Hiển thị bản ghi _MENU_ ",
                    "loadingRecords": "Đang tải...",
                    "processing": "Đang xử lý...",
                    "search": "Tìm kiếm thông tin:",
                    "zeroRecords": "Không tìm thấy kết quả",
                }
            });
        });

        function createPost(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: `{{ url('/bai-viet-mat-hang-create') }}/${id}`,
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        $('#bai-viet-mat-hang-create').modal('show');
                        $('#createPostProductFrom').find('input[name="maBV"]').val(data.maBV);
                        $('#createPostProductFrom').find('input[name="maMH"]').val(id);
                    } else {
                        Swal.fire({
                            title: "Thông Báo !",
                            text: data.message,
                            icon: "warning"
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Thông Báo !",
                        text: "Có lỗi xảy ra !",
                        icon: "error"
                    });
                }
            });
        }
        $('#createPostProductFrom').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('ManagerPostProductsCreate') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        Swal.fire({
                            title: "Thông Báo !",
                            text: data.message,
                            icon: "success"
                        });
                        $('#bai-viet-mat-hang-create').modal('hide');
                        $('#createPostProductFrom').trigger('reset');
                    } else {
                        Swal.fire({
                            title: "Thông Báo !",
                            text: data.message,
                            icon: "warning"
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Thông Báo !",
                        text: "Có lỗi xảy ra !",
                        icon: "error"
                    });
                }
            });
        });

        function createPostDetail(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: `{{ url('/chi-tiet-bai-viet-create') }}/${id}`,
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        $('#chi-tiet-bai-viet-create').modal('show');
                        $('#createPostDetailProductFrom').find('input[name="maBVTag"]').val(data.maBVTag);
                        $('#createPostDetailProductFrom').find('input[name="maBV"]').val(data.maBV);
                    } else {
                        Swal.fire({
                            title: "Thông Báo !",
                            text: data.message,
                            icon: "warning"
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Thông Báo !",
                        text: "Có lỗi xảy ra !",
                        icon: "error"
                    });
                }
            });
        }
        $('#createPostDetailProductFrom').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('ManagerPostDetaiCreate') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        Swal.fire({
                            title: "Thông Báo !",
                            text: data.message,
                            icon: "success"
                        });
                        $('#chi-tiet-bai-viet-create').modal('hide');
                        $('#createPostDetailProductFrom').trigger('reset');
                    } else {
                        Swal.fire({
                            title: "Thông Báo !",
                            text: data.message,
                            icon: "warning"
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Thông Báo !",
                        text: "Có lỗi xảy ra !",
                        icon: "error"
                    });
                }
            });
        });
        function deleteProduct(id) {
            Swal.fire({
                title: "Bạn có muốn xóa tất cả thông tin về tin tức của mặt hàng này không?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "GET",
                        url: `{{ url('/chi-tiet-bai-viet-delete') }}/${id}`,
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    title: "Thông Báo !",
                                    text: data.message,
                                    icon: "success"
                                });
                                // $('#ajax-table-Product').DataTable().ajax.reload();
                            } else {
                                Swal.fire({
                                    title: "Thông Báo !",
                                    text: data.message,
                                    icon: "warning"
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: "Thông Báo !",
                                text: "Có lỗi xảy ra trong quá trình xóa !",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>

</body>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const selectElement = document.getElementById('tenThongTin');
        const inputElement = document.getElementById('thongtin');

        selectElement.addEventListener('change', function() {
            const selectedValue = this.value;
            inputElement.value = selectedValue;
        });
    });
</script>

</html>
