<!DOCTYPE html>
<html lang="vi-VN">

<head>
    <meta charset="UTF-8" />
    <meta ame="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giỏ hàng - BachHoaXanh.com</title>
    <link rel="shortcut icon" type="image/png" href="/folderImages/images/logo/logo_icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/stylebody.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../css/stylecss-content-home.css" />
    <link rel="stylesheet" href="../css/stylecss-login.css" />
    <link rel="stylesheet" href="../css/stylecss-footer.css" />
    <link rel="stylesheet" href="../css/stylecardsale.css" />
    <link rel="stylesheet" href="../css/stylebreadcrumb.css" />
    <link rel="stylesheet" href="../css/stylecardmenu.css" />
    <link rel="stylesheet" href="../css/styleSlickSliderAndFancybox.css" />
    <link rel="stylesheet" href="../css/styleSearchInput.css" />
    <link rel="stylesheet" href="../css/stylenavmenu.css" />
    <link rel="stylesheet" href="../css/styledetailproduct.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('layouts.header')
    @include('layouts.menu-hover')
    @include('layouts.infoUser')
    @yield('content')
    @include('layouts.footer-large')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="../../../js/jsEvent.js"></script>
<script type="text/javascript" src="../../../js/jsSearch.js "></script>
<script type="text/javascript" src="../../../js/jsPopup.js"></script>
<script type="text/javascript" src="../../../js/jsSlickSlider.js"></script>
<script>
    function updateSoLuong(mamh, action) {
        var inputSoluong = document.getElementById("soluong");
        var soluong = parseInt(inputSoluong.value);
        if (action === 'tang') {
            if (soluong < 15) {
                soluong++;
            } else {
                soluong = 15;
                return;
            }
        } else if (action === 'giam') {
            if (soluong > 1) {
                soluong--;
            } else {
                return;
            }
        }

        inputSoluong.value = soluong;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: `/UpdateToCart/${mamh}/${action}`,
            data: {
                mamh: mamh,
                soluong: soluong,
                _token: "{{ csrf_token() }}",
                action: action
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('#soLuongCard').text(response.count);
                    $('#soLuongCardTwo').text(response.count);
                    $('#tongTienCard').text(response.tongtien);
                    $('#tongTienCardTwo').text(response.tongtien);
                    $('#tongThanhTien').text(response.tongtien);
                }
                if (response.error && response.message) {
                    console.log(response.message);
                }
            },
            error: function() {
                console.log('Không thể cập nhật số lượng sản phẩm');
            }
        });
    }

    function deleteItemCards(mamh) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Bạn có muốn xóa không ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Xóa Nó!",
            cancelButtonText: "Không Xóa!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: `/DeleteCart/${mamh}`,
                    data: {
                        mamh: mamh
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        }
                    },
                    error: function() {
                        console.log('Có lỗi xảy ra. Vui lòng thử lại sau!');
                    }
                });
            }
        });
    }
</script>

</html>
