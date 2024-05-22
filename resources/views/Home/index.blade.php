@extends('layouts.page.layout-home')
@section('content')
    <main class="container-fluid g-0 m-auto"
        style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="row g-0 p-0 d-flex flex-nowrap justify-content-lg-between">
            <div class="g-0 p-0" style="width: var(--width-menu); height: 100vh; position: fixed; top: 0px; z-index: 99999">
                <nav class="container-fluid g-0 p-0 m-0" style="width: 100%">
                    <div class="accordion" id="accordionExample" style="padding-top: 105px">
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
            <div class="g-0"
                style="
         padding-left: calc(var(--margin-left) + var(--width-menu));
         width: calc(var(--width-menu) * 2 + var(--width-search));
      ">
                <div class="container-fluid g-0 m-auto"
                    style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                    <menu class="g-0 mt-2 p-2 d-flex justify-content-start flex-nowrap align-items-center"
                        style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                        <div class="p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/add.png"
                                    alt="Menu items Add" style="width: 100%; height: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Mua
                                    lại đơn củ
                                </a>
                            </div>
                        </div>
                        <div class="p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/raucu.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Rau,
                                    củ, nấm, trái cây
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/thit.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Thịt
                                    heo
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/haisan.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Cá,
                                    hải sản, khô
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/bia.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Bia,
                                    nước có cồn
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/nuocngot.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Nước
                                    ngọt
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/banhkeo.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Bánh
                                    kẹo các loại
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/gao.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Gạo
                                    các loại
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/snack.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Bánh
                                    snack, rong biển
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/traicay.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Trái
                                    cây
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/nuocgiat.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;
                     ">Nước
                                    giặc
                                </a>
                            </div>
                        </div>
                        <div class="stretched-link-taga p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column"
                            style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="../folderImages/images/typeProducts/nuocxa.png"
                                    alt="Menu items Add" style="width: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center"
                                style="width: 100%; height: 50px; overflow: hidden">
                                <a href="#" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="
                        color: var(--contentcolor);
                        font-weight: bold;
                        overflow-wrap: break-word;
                        text-decoration: none;">Nước
                                    xả
                                </a>
                            </div>
                        </div>
                    </menu>
                </div>
                <div class="container-fluid g-0 m-auto"
                    style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                    <div class="banner-single-items d-flex flex-lg-nowrap align-items-center" style="width: 100%">
                        <div class="banner-single-item" style="width: 100%">
                            <img src="../folderImages/images/bannerQC_groupTypeProduct/khuyenmai1.png" alt=""
                                style="width: 100%" />
                        </div>
                        <div class="banner-single-item">
                            <img src="../folderImages/images/bannerQC_groupTypeProduct/khuyenmai2.png" alt=""
                                style="width: 100%" />
                        </div>
                    </div>
                </div>
                <div class="container-fluid g-0 m-auto mt-3"
                    style="
            width: calc(var(--width-menu) + var(--width-search) - var(--margin-left));
            background: var(--bgcolor-sale);
            border-radius: 8px;
         ">
                    <div class="slider-card-group p-2 g-0 m-0" style="width: 100%">
                        <div class="slider-card-group-title mb-4 d-flex justify-content-between align-items-center">
                            <h3 class="m-0 fw-bold"
                                style="background: var(--bgcolor-items); background-clip: text; color: transparent">
                                KHUYẾN MÃI SỐC
                            </h3>
                            <a href="#" style="text-decoration: none; color: #007e42">Xem thêm các khuyến mãi khác
                                <i class="fa-solid fa-chevron-right"
                                    style="
                        background: var(--bgcolor-items);
                        background-clip: text;
                        color: transparent;
                        font-size: 15px;
                     "></i>
                            </a>
                        </div>
                        <div class="slider-card-group-item p-1"
                            style="
                  width: calc(
                     (var(--width-menu) + var(--width-search) - var(--margin-left) - (8px * 4)) / 5
                  );
                  min-height: 300px;
                  background: var(--bgcolor-card);
                  border-radius: 5px;
               ">
                            <div
                                class="slider-card-group-item-top d-flex flex-column justify-content-center position-relative">
                                <div class="slider-card-group-item-img m-auto d-flex justify-content-center align-items-center"
                                    style="width: 100%; height: 211px; overflow: hidden">
                                    <img class="object-fit-contain"
                                        src="../folderImages/images/products/products_avt/sanpham1.png" alt=""
                                        style="width: 100%; height: auto" />
                                </div>
                                <div class="slider-card-group-item-product">
                                    <a class="stretched-link" href="#">
                                        <h6 class="m-0 truncate">Thùng 24 hộp sữa chua nha đam ít đường Vinamilk 100g</h6>
                                    </a>
                                </div>
                                <div
                                    class="slider-card-group-item-top-sale animaiton-badges badge bg-danger position-absolute top-0 end-0">
                                    10%
                                </div>
                            </div>
                            <div class="slider-card-group-item-bottom g-0 p-0">
                                <div class="slider-card-group-item-content"></div>
                                <div
                                    class="slider-card-group-item-prices g-0 p-0 d-flex justify-content-center align-items-center">
                                    <div class="slider-card-group-item-price g-0">
                                        <span class="ms-2 fw-bold"
                                            style="font-size: 16px; color: var(--contentcolor-price)">90.000đ</span>
                                        <span class="ms-2 text-decoration-line-through"
                                            style="font-size: 14px; color: var(--contentcolor-light)">100.000đ</span>
                                    </div>
                                    <div class="slider-card-group-item-btnprice g-0">
                                        <button type="button"
                                            class="btn d-flex justify-content-center align-items-center ps-3 px-3"
                                            style="background: #006133; color: var(--contentcolor-light)">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            <span class="ms-2">MUA</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid g-0 m-auto mt-5 position-relative"
                    style="
            width: calc(var(--width-menu) + var(--width-search) - var(--margin-left));
            background: var(--bgcolor-sale);
            border-radius: 8px;
            border-top: 3px solid #006133;
         ">
                    <div
                        class="before:absolute before:left-[-9px] before:top-[-1px] before:border-r-[9px] before:border-t-[16px] before:border-r-[#00AC5B] before:border-t-transparent after:absolute after:right-[-9px] after:top-[-1px] after:border-l-[9px] after:border-t-[16px] after:border-l-[#00AC5B] after:border-t-transparent bg-[#00AC5B] text-[#fff] after:!border-l-[#3b854e] cate_title slider-card-group-spec-title position-absolute top-0 start-50 translate-middle text-center">
                        <h3 class="m-0 fw-bold ps-5 px-5 pt-1 pb-1"
                            style="background: var(--bgcolor-items); background-clip: text; color: transparent">
                            RAU - CỦ - NẤM
                        </h3>
                    </div>
                    <div class="" style="height: 40px"></div>
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
                                        <img class="object-fit-contain" src="../images/product/sanpham2.png"
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
                    <div class="slider-card-more pt-2 pb-2 text-center mt-3 fw-bold position-relative">
                        <a class="stretched-link" href="#"
                            style="text-decoration: none; color: var(--contentcolor-light); font-size: 20px">Xem thêm các
                            sản phẩm Rau củ nấm
                            <i class="fa-solid fa-chevron-right"
                                style="color: var(--contentcolor-light); font-size: 20px"></i>
                        </a>
                    </div>
                </div>
                @include('layouts.footer-small')
            </div>
        </div>
    </main>
@endsection
