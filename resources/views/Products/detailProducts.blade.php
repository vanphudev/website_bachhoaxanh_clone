@extends('layouts.page.layout-detailProduct')
@section('content')
    <div id="menu-fixed-hover" class="menu-fixed-hover container-fluid g-0 m-auto pt-2"
        style="
   width: 100%;
   height: 100vh;
   display: none;
   position: fixed;
   top: 0px;
   background-color: rgba(44, 44, 44, 0.5);
   z-index: 800;
">
        <div class="row g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search))">
            <div id="productportfolio" class="g-0 text-center" style="width: var(--width-menu); padding-top: 96px">
                <div class="productportfolio g-0 text-white d-flex justify-content-center flex-nowrap"
                    style="cursor: pointer; max-height: calc(100vh - 110px); padding: 2px">
                    <nav class="container-fluid g-0 p-0 m-0" id="accordionExample"
                        style="width: 100%; height: auto; overflow: auto">
                        <div class="accordion">
                            <div class="accordion-item"
                                style="
                     border-color: #006133;
                     border-top-left-radius: 0px;
                     border-top-right-radius: 0px;
                     border-top: none;
                  ">
                                <h2 class="accordion-header" id="heading1">
                                    <div style="color: #469c4b; background: transparent"
                                        class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        Accordion Item #1
                                    </div>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-2">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action">An item</li>
                                            <li class="list-group-item list-group-item-action">A second item</li>
                                            <li class="list-group-item list-group-item-action">A third item</li>
                                            <li class="list-group-item list-group-item-action">A fourth item</li>
                                            <li class="list-group-item list-group-item-action">And a fifth one</li>
                                            <li class="list-group-item list-group-item-action">An item</li>
                                            <li class="list-group-item list-group-item-action">A second item</li>
                                            <li class="list-group-item list-group-item-action">A third item</li>
                                            <li class="list-group-item list-group-item-action">A fourth item</li>
                                            <li class="list-group-item list-group-item-action">And a fifth one</li>
                                            <li class="list-group-item list-group-item-action">An item</li>
                                            <li class="list-group-item list-group-item-action">A second item</li>
                                            <li class="list-group-item list-group-item-action">A third item</li>
                                            <li class="list-group-item list-group-item-action">A fourth item</li>
                                            <li class="list-group-item list-group-item-action">And a fifth one</li>
                                            <li class="list-group-item list-group-item-action">An item</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item"
                                style="
                     border-color: #006133;
                     border-bottom-left-radius: 12px;
                     border-bottom-right-radius: 12px;
                  ">
                                <h2 class="accordion-header" id="heading2">
                                    <div style="color: #469c4b; background: transparent"
                                        class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                        Accordion Item #1
                                    </div>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body p-2">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action">An item</li>
                                            <li class="list-group-item list-group-item-action">A second item</li>
                                            <li class="list-group-item list-group-item-action">A third item</li>
                                            <li class="list-group-item list-group-item-action">A fourth item</li>
                                            <li class="list-group-item list-group-item-action">And a fifth one</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="g-0 ps-4 px-4" style="width: var(--width-search + --width-menu)"></div>
        </div>
    </div>
    <div id="popup_Login_show" class="menu-fixed-hover container-fluid g-0 m-auto pt-2"
        style="
   width: 100%;
   height: 100vh;
   display: none;
   position: fixed;
   top: 0px;
   background-color: rgba(44, 44, 44, 0.5);
   z-index: 800;
">
        <div class="row g-0 m-auto"
            style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105px; position: relative">
            <button id="popup_Login_hide" class="btn d-flex justify-content-center align-items-center"
                style="
         position: absolute;
         right: calc(var(--width-menu) + 60px);
         top: 105px;
         width: 50px;
         height: 50px;
         border-radius: 50%;
         background-color: white;
      ">
                <i class="fa-solid fa-xmark" style="font-size: 40px"></i>
            </button>
            <div class="g-0 text-center"
                style="
         width: calc(var(--width-menu) + 50px);
         margin-left: calc(var(--width-search) + var(--width-menu) - 50px);
      ">
                <div class="productportfolio g-0 text-white d-flex flex-column justify-content-center"
                    style="cursor: pointer; max-height: calc(100vh - 110px); padding: 2px">
                    <div class="container-fluid g-0 m-auto p-3"
                        style="width: 100%; border-radius: 10px; background-color: white">
                        <div class="fw-bold">
                            <p class="fw-bold m-0" style="color: #006133; font-size: 20px">BachHoaXanh, Xin chào!</p>
                            <p style="color: #ebb319">Anh/Chị Nguyễn Văn Phú</p>
                        </div>
                        <div class="list-group mb-3" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25)">
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true"
                                style="background-color: #006133; color: white; font-weight: bold; font-size: 20px">
                                Thông tin cá nhân
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <p class="p-0 m-0">Lịch sử mua hàng</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-location-dot"></i>
                                <p class="p-0 m-0">Địa chỉ nhận hàng</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p class="p-0 m-0">Giỏ hàng</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-user-pen"></i>
                                <p class="p-0 m-0">Sửa thông tin cá nhân</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                        <div class="list-group mb-3" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25)">
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true"
                                style="background-color: #006133; color: white; font-weight: bold; font-size: 20px">
                                Hỗ trợ khách hàng
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-phone"></i>
                                <p class="p-0 m-0">
                                    Tổng đài tư vấn: <br />
                                    1900.1908 (7:30 - 21:00)
                                </p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                style="text-align: start; font-size: 18px">
                                <i class="fa-regular fa-envelope"></i>
                                <p class="p-0 m-0">Liên hệ/Góp ý</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                        <div class="list-group mb-1" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25)">
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true"
                                style="background-color: #006133; color: white; font-weight: bold; font-size: 20px">
                                Hệ thống
                            </a>
                            <a href="#"
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <p class="p-0 m-0">Đăng xuất</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="container-fluid g-0 m-auto"
        style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="container-fluid g-0 p-0 m-auto" style="width: 100%">
            <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center"
                style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                <div class="p-3">
                    <a href="#">
                        <i class="fa-solid fa-house"
                            style="
                  color: var(--contentcolor);
                  font-weight: bold;
                  overflow-wrap: break-word;
                  text-decoration: none;
                  font-size: 23px;
               "></i>
                    </a>
                </div>
                <div class="breadcrumb-item-text fw-bold p-2">
                    <a href="#" style="text-decoration: none; color: var(--contentcolor)"> Loại sản phẩm </a>
                    <i class="fa-solid fa-chevron-right"
                        style="
               color: var(--contentcolor);
               font-weight: bold;
               overflow-wrap: break-word;
               text-decoration: none;
               font-size: 17px;
            "></i>
                    <a href="#" style="text-decoration: none; color: var(--contentcolor)">Tên sản phẩm</a>
                </div>
            </div>
            <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap" style="width: 100%">
                <div class="g-0 p-0"
                    style="width: calc(var(--width-search) + 150px - 8px); margin-right: 8px; border-radius: 5px">
                    <div class="detail-images-product-info g-0 m-0 p-2 mb-2"
                        style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                        <div class="images-product-info-items d-flex align-items-center mb-5 m-auto">
                            <div class="images-product-info-item">
                                <a href="../folderImages/images/products/products_avt/sanpham3.png"
                                    data-fancybox="gallery" data-caption="Single image">
                                    <img src="../folderImages/images/products/products_avt/sanpham3.png" alt="" />
                                </a>
                            </div>
                            <div class="images-product-info-item">
                                <a href="../folderImages/images/products/products_avt/sanpham2.png"
                                    data-fancybox="gallery" data-caption="Single image">
                                    <img src="../folderImages/images/products/products_avt/sanpham2.png" alt="" />
                                </a>
                            </div>
                            <div class="images-product-info-item">
                                <a href="../folderImages/images/products/products_avt/sanpham1.png"
                                    data-fancybox="gallery" data-caption="Single image">
                                    <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                                </a>
                            </div>
                            <div class="images-product-info-item">
                                <a href="../folderImages/images/products/products_avt/sanpham2.png"
                                    data-fancybox="gallery" data-caption="Single image">
                                    <img src="../folderImages/images/products/products_avt/sanpham2.png" alt="" />
                                </a>
                            </div>
                            <div class="images-product-info-item">
                                <a href="../folderImages/images/products/products_avt/sanpham2.png"
                                    data-fancybox="gallery" data-caption="Single image">
                                    <img src="../folderImages/images/products/products_avt/sanpham2.png" alt="" />
                                </a>
                            </div>
                            <div class="images-product-info-item">
                                <a href="../folderImages/images/products/products_avt/sanpham1.png"
                                    data-fancybox="gallery" data-caption="Single image">
                                    <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                                </a>
                            </div>
                            <div class="images-product-info-item">
                                <a href="../folderImages/images/products/products_avt/sanpham2.png"
                                    data-fancybox="gallery" data-caption="Single image">
                                    <img src="../folderImages/images/products/products_avt/sanpham2.png" alt="" />
                                </a>
                            </div>
                            <div class="images-product-info-item">
                                <a href="../folderImages/images/products/products_avt/sanpham1.png"
                                    data-fancybox="gallery" data-caption="Single image">
                                    <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="images-product-info-nav-items d-flex align-items-center">
                            <div class="images-product-info-nav-item d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 110px">
                                <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                            </div>
                            <div class="images-product-info-nav-item d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 110px">
                                <img src="../folderImages/images/products/products_avt/sanpham2.png" alt="" />
                            </div>
                            <div class="images-product-info-nav-item d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 110px">
                                <img src="../folderImages/images/products/products_avt/sanpham2.png" alt="" />
                            </div>
                            <div class="images-product-info-nav-item d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 110px">
                                <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                            </div>
                            <div class="images-product-info-nav-item d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 110px">
                                <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                            </div>
                            <div class="images-product-info-nav-item d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 110px">
                                <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                            </div>
                            <div class="images-product-info-nav-item d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 110px">
                                <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                            </div>
                            <div class="images-product-info-nav-item d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 110px">
                                <img src="../folderImages/images/products/products_avt/sanpham1.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="related-product-info g-0 m-0 p-3 mb-2"
                        style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                        <div class="p-2">
                            <h3 class="p-0 fw-bold">Sản phẩm liên quan</h3>
                        </div>
                        <div class="slider-card-group p-2 g-0 m-0" style="width: 100%">
                            <div class="slider-card-group-item-spec p-1"
                                style="
                     width: calc(
                        (var(--width-menu) + var(--width-search) - var(--margin-left) - (8px * 4)) / 5
                     );
                     min-height: 300px;
                     background: var(--bgcolor-white);
                     border-radius: 5px;
                  ">
                                <div class="slider-card-group-item-inf g-0 p-0 position-relative">
                                    <div class="slider-card-group-item-top d-flex flex-column justify-content-center">
                                        <div class="slider-card-group-item-img m-auto d-flex justify-content-center align-items-center"
                                            style="width: 100%; height: 211px; overflow: hidden">
                                            <img class="object-fit-contain"
                                                src="../folderImages/images/products/products_avt/sanpham2.png"
                                                alt="" style="width: 100%; height: auto" />
                                        </div>
                                        <div class="slider-card-group-item-product-spec">
                                            <a href="#" class="stretched-link">
                                                <h6 class="m-0 truncate">Hành tây</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="slider-card-group-item-bottom g-0 p-0">
                                        <div class="slider-card-group-item-content"></div>
                                        <div
                                            class="slider-card-group-item-prices g-0 p-0 d-flex justify-content-center flex-column">
                                            <div class="slider-card-group-item-price-spec g-0">
                                                <span class="ms-2 fw-bold"
                                                    style="font-size: 16px; color: var(--contentcolor-dark)">90.000đ/Túi
                                                    100g</span>
                                                <br />
                                                <span class="ms-2 text-decoration-line-through"
                                                    style="font-size: 14px; color: var(--contentcolor-dark)">100.000đ</span>
                                                <div class="animaiton-badges badge bg-danger">10%</div>
                                                <br />
                                                <span class="ms-2"
                                                    style="font-size: 14px; color: var(--contentcolor-dark)">20.000đ/kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-card-group-item-btnbuy g-0 p-0 mt-2">
                                    <div class="slider-card-group-item-btnprice g-0">
                                        <button type="button"
                                            class="animate-gradient btn d-flex justify-content-center align-items-center"
                                            style="color: var(--contentcolor-light); width: 100%; font-weight: bold">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            <span class="ms-2">MUA NGAY</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info g-0 m-0 p-3 mb-0"
                        style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                        <div class="detail-product-info g-0 m-0 p-0 mb-3"
                            style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                            <div class="p-2 mb-2">
                                <h3 class="p-0 fw-bold">Thông tin sản phẩm</h3>
                            </div>
                            <div class="p-2 mb-2 g-0">
                                <div class="content-product-info mb-3">
                                    Nước mắm Barona được dùng để chấm, ướp, hoặc dùng làm gia vị cho các món ăn. Nước mắm
                                    Phan Thiết Barona chai 750ml là sản phẩm được chiết xuất với thành phần chính là tinh
                                    cốt nước mắm cá cơm Phan Thiết và muối, mang đến hương vị thơm ngon đậm đà cho mỗi bữa
                                    ăn.
                                </div>
                                <div class="table-content-product-info">
                                    <table class="table table-bordered border-success table-hover">
                                        <tbody class="align-middle" style="font-size: 20px">
                                            <tr>
                                                <th scope="row" class="text-center"
                                                    style="background-color: var(--bgcolor-table-detail); width: 180px">
                                                    Độ đạm
                                                </th>
                                                <td>12 độ đạm</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center"
                                                    style="background-color: var(--bgcolor-table-detail)">
                                                    Thành phần
                                                </th>
                                                <td>
                                                    Tinh cốt nước mắm cá cơm, muối, chất điều vị, hương nước mắm tổng hợp,
                                                    chất
                                                    tạo ngọt tổng hợp, chất ổn định, màu tự nhiên, chất bảo quản
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center"
                                                    style="background-color: var(--bgcolor-table-detail)">
                                                    Thương hiệu
                                                </th>
                                                <td>Barona (Việt Nam)</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center"
                                                    style="background-color: var(--bgcolor-table-detail)">
                                                    Sản xuất tại
                                                </th>
                                                <td>Việt Nam</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center"
                                                    style="background-color: var(--bgcolor-table-detail)">
                                                    Bảo quản
                                                </th>
                                                <td>
                                                    Nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp, đậy kín sau khi sử
                                                    dụng
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="posts-product-info g-0 m-0 p-2 mb-3"
                            style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                            <div class="p-0 mb-2">
                                <h3 class="p-0 fw-bold">Bài viết sản phẩm</h3>
                            </div>
                            <div>
                                Đôi nét về thương hiệu Barona Barona là thương hiệu thuộc công ty Nam Phương được thành
                                lập vào năm 2013 chuyên cung cấp các sản phẩm nước mắm ngon, chất lượng được nhà nhà lựa
                                chọn tin dùng. Đây là thương hiệu nước mắm đạt chuẩn quản lý ISO & FSSC nên đã xuất khẩu
                                sang các thị trường khó tính như Mỹ và các nước Châu Âu và được người tiêu dùng bình chọn
                                là hàng Việt Nam chất lượng cao. Thành phần dinh dưỡng có trong nước mắm Phan Thiết Barona
                                Sản phẩm nước mắm Phan Thiết Barona 500ml có chứa các thành phần chính là: Tinh cốt nước
                                mắm cá cơm 72%, muối, chất điều vị, protein đậu nành thủy phân, chất điều chỉnh độ acid,
                                hương nước mắm tổng hợp, chất tạo ngọt,... Tất cả các thành phần đều an toàn và được kiểm
                                nghiệm nghiêm ngặt. Theo thông tin trên bao bì, trong 100ml nước mắm Phan Thiết Barona sẽ
                                cung cấp cho cơ thể khoảng 38,7 kcal.
                            </div>
                        </div>
                    </div>
                </div>
                <div id="target-element" class="g-0 p-3 d-block"
                    style="
            width: calc(var(--width-menu) * 2 - 150px);
            background: var(--bgcolor-white);
            border-radius: 5px;
            position: sticky;
            top: 130px;
            z-index: 100;
            height: calc(100vh - 170px);
         ">
                    <div class="name-product">
                        <h1 style="font-size: 27px; font-weight: bold">TÊN SẢN PHẨM</h1>
                    </div>
                    <div class="shared-link-product d-flex justify-content-end align-items-center mb-3">
                        <button type="button"
                            class="btn btn-outline-success d-flex justify-content-center align-items-center gap-1">
                            <i class="fa-solid fa-copy" style="font-size: 20px"></i>
                            <span class="ms-2" style="font-size: 20px; font-weight: bold">Chia sẻ</span>
                        </button>
                    </div>
                    <div class="prices-product mb-4">
                        <div class="slider-card-group-item-price-spec g-0">
                            <span class="ms-2 fw-bold" style="font-size: 23px; color: var(--contentcolor-red)">90.000đ/Túi
                                100g</span>
                            <span class="ms-2 text-decoration-line-through"
                                style="font-size: 15px; color: var(--contentcolor-dark)">100.000đ</span>
                            <div class="animaiton-badges badge bg-danger">10%</div>
                            <br />
                            <span class="ms-2 fw-bold"
                                style="font-size: 20px; color: var(--contentcolor-dark)">(20.000đ/kg)</span>
                        </div>
                    </div>
                    <div class="groups-product-items mb-4 d-flex flex-wrap gap-3 justify-content-around"
                        style="width: 100%">
                        <div class="group-product-item g-0 m-0 d-flex flex-column text-center mx-2" style="width: 160px">
                            <div class="group-product-item-content"
                                style="border-radius: 10px; border: 1px solid #006133">
                                <div class="group-product-item-img object-fit-cover">
                                    <img src="../folderImages/images/products/products_avt/sanpham1.png" alt=""
                                        style="width: 100%; border-top-left-radius: 10px; border-top-right-radius: 10px" />
                                </div>
                                <div class="group-product-item-info"
                                    style="
                        background-color: #006133;
                        border-bottom-left-radius: 7px;
                        border-bottom-right-radius: 7px;
                     ">
                                    <span class="fw-bold" style="font-size: 20px; color: white">Lốc 6 chai</span>
                                </div>
                            </div>
                            <div class="form-check m-auto">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" style="width: 25px; height: 25px" />
                            </div>
                            <div class="group-product-item-price">
                                <span class="fw-bold"
                                    style="font-size: 15px; color: var(--contentcolor-dark)">90.000đ</span>
                            </div>
                        </div>
                        <div class="group-product-item g-0 m-0 d-flex flex-column text-center mx-2" style="width: 160px">
                            <div class="group-product-item-content"
                                style="border-radius: 10px; border: 1px solid #006133">
                                <div class="group-product-item-img object-fit-cover">
                                    <img src="../folderImages/images/products/products_avt/sanpham1.png" alt=""
                                        style="width: 100%; border-top-left-radius: 10px; border-top-right-radius: 10px" />
                                </div>
                                <div class="group-product-item-info"
                                    style="
                        background-color: #006133;
                        border-bottom-left-radius: 7px;
                        border-bottom-right-radius: 7px;
                     ">
                                    <span class="fw-bold" style="font-size: 20px; color: white">Lốc 6 chai</span>
                                </div>
                            </div>
                            <div class="form-check m-auto">
                                <input class="form-check-input" name="inlineRadioOptions" id="inlineRadio1"
                                    type="radio" style="width: 25px; height: 25px" />
                            </div>
                            <div class="group-product-item-price">
                                <span class="fw-bold"
                                    style="font-size: 15px; color: var(--contentcolor-dark)">90.000đ</span>
                            </div>
                        </div>
                        <div class="group-product-item g-0 m-0 d-flex flex-column text-center mx-2" style="width: 160px">
                            <div class="group-product-item-content"
                                style="border-radius: 10px; border: 1px solid #006133">
                                <div class="group-product-item-img object-fit-cover">
                                    <img src="../folderImages/images/products/products_avt/sanpham1.png" alt=""
                                        style="width: 100%; border-top-left-radius: 10px; border-top-right-radius: 10px" />
                                </div>
                                <div class="group-product-item-info"
                                    style="
                        background-color: #006133;
                        border-bottom-left-radius: 7px;
                        border-bottom-right-radius: 7px;
                     ">
                                    <span class="fw-bold" style="font-size: 20px; color: white">Lốc 6 chai</span>
                                </div>
                            </div>
                            <div class="form-check m-auto">
                                <input class="form-check-input" name="inlineRadioOptions" id="inlineRadio3"
                                    type="radio" style="width: 25px; height: 25px" />
                            </div>
                            <div class="group-product-item-price">
                                <span class="fw-bold"
                                    style="font-size: 15px; color: var(--contentcolor-dark)">90.000đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-buy-product">
                        <button type="button"
                            class="animate-gradient btn d-flex justify-content-center align-items-center"
                            style="
                  color: var(--contentcolor-light);
                  width: 100%;
                  font-weight: bold;
                  font-size: 24px;
                  border-radius: 10px;
               ">
                            <span>MUA NGAY</span>
                        </button>
                    </div>
                    <div class="response-product"></div>
                </div>
            </div>
        </div>
    </main>
@endsection
