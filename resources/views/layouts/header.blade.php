    <header class="container-fluid g-0 m-auto pt-2" style="
   background: var(--bgcolor-items);
   box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
   position: fixed;
   top: 0px;
   z-index: 1000;
">
        <div class="row g-0 m-auto mb-1" style="width: calc(var(--width-menu) * 2 + var(--width-search))">
            <div class="col object-fit-cover g-0 d-flex justify-content-start align-items-center" style="width: var(--width-menu)">
                <a href="/"><img src="{{ asset('../folderImages/images/icons/logo.png') }}" alt="Logo Bách Hóa Xanh - Trang chủ" style="width: 80%; cursor: pointer" /></a>
            </div>
            <div class="col-6 g-0 ps-4 px-4 d-flex justify-content-center flex-nowrap align-items-center" style="width: var(--width-search); position: relative">
                <div class="input-group input-group-sm">
                    <span class="input-group-text" style="background: var(--bgcolor-light)">
                        <i class="fa-solid fa-magnifying-glass" style="
                  background: var(--bgcolor-items);
                  background-clip: text;
                  color: transparent;
                  font-size: 22px;
               "></i>
                    </span>
                    <input id="search_input" type="text" class="form-control" style="background: var(--bgcolor-light)" placeholder="Nhập tên sản phẩm cần tìm" />
                    <span class="input-group-text p-0">
                        <button class="btn" type="button" style="background: var(--bgcolor-light)">
                            <i class="fa-solid fa-cart-shopping" style="
                     background: var(--bgcolor-items);
                     background-clip: text;
                     color: transparent;
                     font-size: 22px;
                  "></i>
                        </button>
                    </span>
                </div>
                <div id="search_popup" class="search_focus container-fluid g-0 m-auto p-3"
                    style="
            display: none;
            width: calc(100% - 48px);
            position: absolute;
            top: 55px;
            z-index: 999999999999;
            background-color: #e8ecef;
            border-radius: 8px;
            border: 1px solid #8d8c8c;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.12), 0 2px 2px rgba(0, 0, 0, 0.12),
               0 4px 4px rgba(0, 0, 0, 0.12), 0 8px 8px rgba(0, 0, 0, 0.12), 0 16px 16px rgba(0, 0, 0, 0.12);
            max-height: 500px;
            overflow: auto;
         ">
                    <h5 class="fw-bold m-0 mb-3">Tìm kiếm phổ biến</h5>
                    <div class="container-fluid g-0 m-auto" style="width: 100%">
                        <ul class="d-flex p-0 justify-content-start flex-wrap align-items-center gap-2" style="list-style-type: none">
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Sữa</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Bánh kẹo</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Rau củ</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Thịt</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Cá hải sản</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Nước ngọt</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Bia</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Gạo</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Bánh snack</a>
                            </li>
                            <li class="p-2 ps-3 px-3" style="
                     border-radius: 10px;
                     box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.13), 0 1px 4px 0 rgba(0, 0, 0, 0.11);
                  ">
                                <a href="#">Trái cây</a>
                            </li>
                        </ul>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action mb-1 d-flex justify-content-between align-items-center" style="border-radius: 25px; border: none">Bánh su kem <i class="fa-solid fa-magnifying-glass"></i></a>
                            <a href="#" class="list-group-item list-group-item-action mb-1 d-flex justify-content-between align-items-center" style="border-radius: 25px; border: none">Bánh quy sữa <i class="fa-solid fa-magnifying-glass"></i></a>
                            <a href="#" class="list-group-item list-group-item-action mb-1 d-flex justify-content-between align-items-center" style="border-radius: 25px; border: none">Bánh quy sữa socola <i class="fa-solid fa-magnifying-glass"></i></a>
                            <a href="#" class="list-group-item list-group-item-action mb-1 d-flex justify-content-between align-items-center" style="border-radius: 25px; border: none">Bánh quy sữa socola <i class="fa-solid fa-magnifying-glass"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col g-0 d-flex justify-content-center flex-nowrap align-items-center" style="width: var(--width-menu)">
                <button id="popup_Login" type="button" class="btn animaiton-badges" style="background: #006133; color: var(--contentcolor-light)">
                    <i class="fa-solid fa-user"></i>
                    <span class="ms-3" style="font-weight: bold; font-size: 18px">Đăng Nhập</span>
                </button>
            </div>
        </div>
        <div class="row g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search))">
            <div id="hover-trigger" class="g-0 text-center" style="width: var(--width-menu)">
                <div class="productportfolio g-0 p-1 text-white d-flex justify-content-center flex-nowrap align-items-center gap-2" style="
            cursor: pointer;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background: #006133;
         ">
                    <i class="fa-solid fa-bars" style="font-size: 27px"></i>
                    <span class="ms-3" style="font-weight: bold; font-size: 16px">DANH MỤC SẢN PHẨM</span>
                </div>
            </div>
            <div class="g-0 ps-4 px-4" style="width: var(--width-search)"></div>
            <div class="g-0 text-center" style="width: var(--width-menu)">
                <div class="g-0 p-1 m-auto text-white d-flex justify-content-center flex-nowrap align-items-center gap-2 position-relative"
                    style="
            width: var(--width-menu);
            cursor: pointer;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background: #006133;
         ">
                    <i class="fa-solid fa-basket-shopping" style="font-size: 27px"></i>
                    <span class="ms-3" style="font-weight: bold; font-size: 16px">THÔNG TIN GIỎ HÀNG</span>
                    <div class="position-absolute top-0 start-100 p-2 translate-middle badge rounded-pill bg-danger">
                        <div class="animaiton-badges">
                            <span>có 5sp</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
