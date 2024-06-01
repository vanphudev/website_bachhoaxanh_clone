@if (Cookie::has('user_data'))
    @php
        $user_data = json_decode(Crypt::decryptString(Cookie::get('user_data')), true);
        $shortened_name = strlen($user_data['name']) > 18 ? substr($user_data['name'], 0, 18) . '...' : $user_data['name'];
    @endphp
    <div id="popup_Login_show" class="menu-fixed-hover container-fluid g-0 m-auto pt-2" style=" width: 100%; height: 100vh; display: none; position: fixed; top: 0px; background-color: rgba(44, 44, 44, 0.5); z-index: 990;">
        <div class="row g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105px; position: relative">
            <button id="popup_Login_hide" class="btn d-flex justify-content-center align-items-center" style="position: absolute; right: calc(var(--width-menu) + 60px);  top: 105px;  width: 50px; height: 50px;  border-radius: 50%; background-color: white; ">
                <i class="fa-solid fa-xmark" style="font-size: 40px"></i>
            </button>
            <div class="g-0 text-center" style=" width: calc(var(--width-menu) + 50px); margin-left: calc(var(--width-search) + var(--width-menu) - 50px); ">
                <div class="productportfolio g-0 text-white d-flex flex-column justify-content-center" style="cursor: pointer; max-height: calc(100vh - 110px); padding: 2px">
                    <div class="container-fluid g-0 m-auto p-3" style="width: 100%; border-radius: 10px; background-color: white">
                        <div class="fw-bold">
                            <p class="fw-bold m-0" style="color: #006133; font-size: 20px">BachHoaXanh, Xin chào!</p>
                            <p style="color: #ebb319">Anh/Chị {{ $shortened_name }}</p>
                        </div>
                        <div class="list-group mb-3" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25)">
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true" style="background-color: #006133; color: white; font-weight: bold; font-size: 20px">
                                Thông tin cá nhân
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <p class="p-0 m-0">Lịch sử mua hàng</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-location-dot"></i>
                                <p class="p-0 m-0">Địa chỉ nhận hàng</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="{{ route('Cart') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <p class="p-0 m-0">Giỏ hàng</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="{{ route('UpdateInfo') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-user-pen"></i>
                                <p class="p-0 m-0">Sửa thông tin cá nhân</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                        <div class="list-group mb-3" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25)">
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true" style="background-color: #006133; color: white; font-weight: bold; font-size: 20px">
                                Hỗ trợ khách hàng
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-align: start; font-size: 18px">
                                <i class="fa-solid fa-phone"></i>
                                <p class="p-0 m-0">
                                    Tổng đài tư vấn: <br />
                                    1900.1908 (7:30 - 21:00)
                                </p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-align: start; font-size: 18px">
                                <i class="fa-regular fa-envelope"></i>
                                <p class="p-0 m-0">Liên hệ/Góp ý</p>
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                        <div class="list-group mb-1" style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25)">
                            <a href="#" class="list-group-item list-group-item-action" aria-current="true" style="background-color: #006133; color: white; font-weight: bold; font-size: 20px">
                                Hệ thống
                            </a>
                            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="text-align: start; font-size: 18px">
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
@endif
