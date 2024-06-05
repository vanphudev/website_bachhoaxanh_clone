<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta ame="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" href="https://static.ybox.vn/2021/5/3/1621424753923-Logo%20chuan-7%20copy.jpg" />
    <title>Nhóm loại mặt hàng - Quản lý nhóm loại mặt hàng</title>
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="g-sidenav-show bg-gray-100">
    @include('Admin.sidenav', ['active' => 'GroupTypeProduct'])
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('Admin.nav', ['title' => 'Trang quản lý nhóm loại sản phẩm.'])
        <div class="container-fluid py-4">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    @include('Admin.settings')
    <!--   Core JS Files   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#ajax-groupTypeProduct').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('ManagerGroupTypeProducts') }}",
                type: 'GET'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'MANHOM_LOAI',
                    name: 'MANHOM_LOAI'
                },
                {
                    data: 'TENNHOM_LOAI',
                    name: 'TENNHOM_LOAI'
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
            searching: true,
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

    function addGroupsTypeProduct() {
        $('#createGroupTypeProductFromm').trigger('reset');
        $('#nhom-loai-mat-hang-create').modal('show');
    }

    function editTypeProduct(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: `{{ url('/loai-mat-hang-update') }}/${id}`,
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    $('#updateTypeProductFrom').trigger('reset');
                    $('#loai-mat-hang-update').modal('show');
                    $('#updateTypeProductFrom').find('input[name="tenLMH"]').val(data.product.TENLOAI);
                    $('#updateTypeProductFrom').find('select[name="maNLMH"]').val(data.product.MANHOM_LOAI);
                    $('#updateTypeProductFrom').find('input[name="topmuasam"]').val(data.product.TOP_MUASAM);
                    if (data.product.TOP_MUASAM == 1) {
                        $('#updateTypeProductFrom').find('input[name="topmuasam"]').prop('checked', true);
                        $('#updateTypeProductFrom').find('input[name="topmuasam"]').val(1);
                    }
                    $('#updateTypeProductFrom').find('input[name="id"]').val(data.product.MALOAI);
                    var imagePath = `{{ env('PATH_IMAGE_TYPE_PRODUCT') }}`;
                    $('#updateTypeProductFrom').find('img[name="picture"]').attr('src', imagePath + data.product.PICTURE);
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


    function deleteTypeProduct(id) {
        Swal.fire({
            title: "Bạn có muốn xóa loại mặt hàng này không?",
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
                    url: `{{ url('/loai-mat-hang-delete') }}/${id}`,
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
                            $('#ajax-table-typeProduct').DataTable().ajax.reload();
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

    $('#updateTypeProductFrom').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{ route('ManagerTypeProductEdit') }}",
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
                    $('#loai-mat-hang-update').modal('hide');
                    $('#ajax-table-typeProduct').DataTable().ajax.reload();
                    $('#updateTypeProductFrom').trigger('reset');
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

    $('#createGroupTypeProductFrom').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "{{ route('ManagerGroupTypeProductsCreate') }}",
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
                    $('#nhom-loai-mat-hang-create').modal('hide');
                    $('#ajax-groupTypeProduct').DataTable().ajax.reload();
                    $('#createGroupTypeProductFrom').trigger('reset');
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
                    text: data.message,
                    icon: "error"
                });
            }
        });
    });
</script>

</html>
