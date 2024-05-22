@extends('layouts.page.layout-search')
@section('content')
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
                <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center"
                    style="
            width: calc(var(--width-menu) + var(--width-search) - var(--margin-left));
            background: var(--bgcolor-white);
            border-radius: 8px;
         ">
                    <div class="breadcrumb-item-icon position-relative p-3">
                        <a href="#" class="stretched-link">
                            <i class="fa-solid fa-chevron-left"
                                style="
                     color: var(--contentcolor);
                     font-weight: bold;
                     overflow-wrap: break-word;
                     text-decoration: none;
                     font-size: 23px;
                  "></i>
                        </a>
                    </div>
                    <div class="breadcrumb-item-text p-3">
                        Tìm thấy <span class="fw-bold">66</span> kết quả phù hợp với từ khóa
                        <span class="fw-bold">"sữa"</span>.
                    </div>
                </div>
                <div class="container-fluid g-0 m-auto mt-3"
                    style="
            width: calc(var(--width-menu) + var(--width-search) - var(--margin-left));
            background: var(--bgcolor-white);
            border-radius: 10px;
         ">
                    <h4 class="p-3 fw-bold m-0" style="color: #006133">
                        <i class="fa-solid fa-filter mx-2"></i>Lọc theo nhóm loại:
                    </h4>
                    <hr class="m-2" />
                    <menu
                        class="card-group-menu-with-type-search g-0 mt-2 p-2 d-flex justify-content-start flex-nowrap align-items-center gap-2"
                        style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                        <div class="p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                        <div class="stretched-link-taga p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column"
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
                    </menu>
                </div>
                <div class="container-fluid g-0 m-auto"
                    style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                    <div class="filter-groups d-flex justify-content-start align-items-center gap-3 p-3 ps-4 px-4"
                        style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                        <div class="filter-groups-item">
                            <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sắp xếp theo
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Giá giảm dần</a></li>
                                    <li><a class="dropdown-item" href="#">Giá tăng dần</a></li>
                                    <li><a class="dropdown-item" href="#">Sản phẩm bán nhiều nhất.</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="filter-groups-brands p-1 d-flex justify-content-start flex-nowrap align-items-center"
                            style="width: 950px">
                            <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                <img src="../folderImages/images/brand/dalat-milk-05092023143114.png" alt="Thương hiệu 01"
                                    style="width: 100%; height: 100%" />
                            </div>
                            <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                <img src="../folderImages/images/brand/ensure-13032023112110.png" alt="Thương hiệu 01"
                                    style="width: 100%; height: 100%" />
                            </div>
                            <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                <img src="../folderImages/images/brand/felce-azzurra-0506202113525.png"
                                    alt="Thương hiệu 01" style="width: 100%; height: 100%" />
                            </div>
                            <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                <img src="../folderImages/images/brand/meadow-fresh-03082022162948.png"
                                    alt="Thương hiệu 01" style="width: 100%; height: 100%" />
                            </div>
                            <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                <img src="../folderImages/images/brand/optimum-15032021101124.png" alt="Thương hiệu 01"
                                    style="width: 100%; height: 100%" />
                            </div>
                            <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                <img src="../folderImages/images/brand/romano-04042021185335.png" alt="Thương hiệu 01"
                                    style="width: 100%; height: 100%" />
                            </div>
                            <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                <img src="../folderImages/images/brand/some-by-mi-010420229169.png" alt="Thương hiệu 01"
                                    style="width: 100%; height: 100%" />
                            </div>
                            <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                <img src="../folderImages/images/brand/vaseline-04042021225515.png" alt="Thương hiệu 01"
                                    style="width: 100%; height: 100%" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid g-0 m-auto mt-3 position-relative"
                    style="
            width: calc(var(--width-menu) + var(--width-search) - var(--margin-left));
            background: var(--bgcolor-white);
            border-radius: 8px;
         ">
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
                </div>
                @include('layouts.footer-small')
            </div>
        </div>
    </main>
@endsection
