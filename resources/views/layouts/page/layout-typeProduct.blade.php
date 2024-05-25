<!DOCTYPE html>
<html lang="vi-VN">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Loại Sản Phẩm - BachHoaXanh.com')</title>
    <link rel="shortcut icon" type="image/png" href="/folderImages/images/logo/logo_icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../css/stylebody.css" />
    <link rel="stylesheet" href="../css/stylecss-content-home.css" />
    <link rel="stylesheet" href="../css/stylecss-footer.css" />
    <link rel="stylesheet" href="../css/stylecardsale.css" />
    <link rel="stylesheet" href="../css/stylebreadcrumb.css" />
    <link rel="stylesheet" href="../css/stylecardmenu.css" />
    <link rel="stylesheet" href="../css/stylenavmenu.css" />
    <link rel="stylesheet" href="../css/styleSearchInput.css" />
    <link rel="stylesheet" href="../css/styleSlickSliderAndFancybox.css" />
</head>

<body>
    <div class="container-fluid g-0 m-auto">
        @include('layouts.header')
        @yield('content')
    </div>
</body>
<!-- Thư viện JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="../../../js/jsEvent.js"></script>
<script type="text/javascript" src="../../../js/jsSearch.js "></script>
<script type="text/javascript" src="../../../js/jsPopup.js"></script>
<script type="text/javascript" src="../../../js/jsSlickSlider.js"></script>
<script type="text/javascript" src="../../../js/jsFancybox.js"></script>

</html>
