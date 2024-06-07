@extends('layouts.page.layout-search')
@section('title', 'Kết quả tìm kiếm ' . $keySearch . ' tại Bách Hóa Xanh.')
@section('content')
    @include('layouts.infoUser')
    <main class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="row g-0 p-0 d-flex flex-nowrap justify-content-lg-between">
            @include('layouts.menu')
            <div class="g-0" style=" padding-left: calc(var(--margin-left) + var(--width-menu)); width: calc(var(--width-menu) * 2 + var(--width-search)); ">
                <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left)); background: var(--bgcolor-white); border-radius: 8px; ">
                    <div class="breadcrumb-item-icon position-relative p-3">
                        <a href="./" class="stretched-link">
                            <i class="fa-solid fa-chevron-left" style=" color: var(--contentcolor); font-weight: bold; overflow-wrap: break-word; text-decoration: none; font-size: 23px; "></i>
                        </a>
                    </div>
                    <div class="breadcrumb-item-text p-3">
                        Tìm thấy <span class="fw-bold">{{ count($result) }}</span> kết quả phù hợp với từ khóa
                        <span class="fw-bold">"{{ $keySearch }}"</span>.
                    </div>
                </div>
                @if (count($result) == 0)
                    <div class="container-fluid g-0 m-auto mt-3" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left));background: var(--bgcolor-white); border-radius: 10px; ">
                        <p class="p-3 fw-bold m-0 text-center" style="color: #000000">Rất tiếc vì chúng tôi không tìm thấy thông tin sản phẩm phù hợp với từ khóa <span style="color: red">"{{ $keySearch }}"</span> của bạn.
                        </p>
                        <hr class="m-2" />
                        <div class="d-flex p-3 flex-column">
                            <img class="m-auto" style="width: 30%;" src="./folderImages/images/icons/search-not_found.png" alt="Not Found">
                            <a href="./" class="btn btn-outline-primary m-auto">Quay về trang chủ</a>
                        </div>
                    </div>
                @else
                    <div class="container-fluid g-0 m-auto mt-3" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left));background: var(--bgcolor-white); border-radius: 10px; ">
                        <h4 class="p-3 fw-bold m-0" style="color: #006133">
                            <i class="fa-solid fa-filter mx-2"></i>Tham khảo loại sản phẩm tương ứng.
                        </h4>
                        <hr class="m-2" />
                        <menu class="card-group-menu-with-type-search g-0 mt-2 p-2 d-flex justify-content-start flex-nowrap align-items-center gap-2" style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                            @if ($groupTypeProduct != null)
                                @foreach ($groupTypeProduct as $values)
                                    <div class="p-2 card-menu-items-search d-flex justify-content-center flex-nowrap flex-column" style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                                        <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 70px; overflow: hidden">
                                            <img class="object-fit-contain" src="{{ env('PATH_IMAGE_TYPE_PRODUCT') }}{{ $values->PICTURE }}" alt="Menu items Add" style="width: 100%" />
                                        </div>
                                        <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 50px; overflow: hidden">
                                            <a href="/TypeProduct/{{ convertVietnamese($values->TENLOAI) . '--' . Str::lower($values->MALOAI) }}" class="card-menu-content-bottom text-center m-0 truncate"
                                                style="  color: var(--contentcolor); font-weight: bold; overflow-wrap: break-word; text-decoration: none; ">
                                                {{ $values->TENLOAI }}
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </menu>
                    </div>
                    <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                        <div class="filter-groups d-flex justify-content-start align-items-center gap-3 p-3 ps-4 px-4" style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                            <div class="filter-groups-item">
                                <div class="dropdown">
                                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sắp xếp theo
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="/Search?key={{ $keySearch }}&sortDesc={{ 'desc' }}">Giá bán giảm dần.</a></li>
                                        <li><a class="dropdown-item" href="/Search?key={{ $keySearch }}&sortAsc={{ 'asc' }}">Giá bán tăng dần.</a></li>
                                        <li><a class="dropdown-item" href="/Search?key={{ $keySearch }}&discount={{ 'discount' }}">Sản phẩm đang giảm giá.</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-groups-brands p-1 d-flex justify-content-start flex-nowrap align-items-center" style="width: 950px">
                                @if ($groupTypeProduct != null)
                                    @foreach ($groupTypeProduct as $values)
                                        <div class="filter-groups-brand-item mx-2 object-fit-contain p-2" style="height: 90px">
                                            <img src="{{ env('PATH_IMAGE_BRAND') }}{{ $values->PICTURE }}" alt="Thương hiệu 01" style="width: 100%; height: 100%" />
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid g-0 m-auto mt-3 position-relative" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left)); background: var(--bgcolor-white);  border-radius: 8px; ">
                        <div class="slider-card-group-noneSlickSlider d-flex justify-content-start flex-wrap p-2 g-0 m-0" style="width: 100%">
                            @if ($result != null)
                                @foreach ($result as $valueProduct)
                                    <div class="slider-card-group-item-spec p-1" style=" width: calc((var(--width-menu) + var(--width-search) - var(--margin-left) - (8px * 4) + 16px) / 5 ); min-height: 300px;  background: var(--bgcolor-white);  border-radius: 5px; ">
                                        <div class="slider-card-group-item-inf g-0 p-0 position-relative">
                                            <div class="slider-card-group-item-top d-flex flex-column justify-content-center">
                                                <div class="slider-card-group-item-img m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 211px; overflow: hidden">
                                                    <img class="object-fit-contain" src="{{ env('PATH_IMAGE_PRODUCT_AVT') }}{{ $valueProduct->PICTURE }}" alt="" style="width: 100%; height: auto" />
                                                </div>
                                                <div class="slider-card-group-item-product-spec">
                                                    <a href="/Product/{{ convertVietnamese($valueProduct->TENMH) . '--' . Str::lower($valueProduct->MAMH) }}" class="stretched-link">
                                                        <h6 class="m-0 truncate">{{ $valueProduct->TENMH }}</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="slider-card-group-item-bottom g-0 p-0">
                                                <div class="slider-card-group-item-prices g-0 p-0 d-flex justify-content-center flex-column">
                                                    <div class="slider-card-group-item-price-spec g-0">
                                                        @php
                                                            $discount = DB::table('giam_gia')
                                                                ->where('giam_gia.MAMH', $valueProduct->MAMH)
                                                                ->orderBy('giam_gia.LAN_GIAM_GIA', 'desc')
                                                                ->select('giam_gia.TILE_GIAM_GIA')
                                                                ->first();
                                                        @endphp
                                                        @if (isset($discount))
                                                            @if ($valueProduct->KHOILUONG == 1)
                                                                <span class="ms-2 fw-bold" style="font-size: 16px; color: var(--contentcolor-dark)">{{ format_currency_vnd($valueProduct->GIA_BAN * ($valueProduct->SO_GAM / 1000) * (1 - $discount->TILE_GIAM_GIA / 100)) }}<span
                                                                        style="font-size: 13px; color: #9DA7BC">/{{ $valueProduct->SO_GAM }} gam.</span></span>
                                                            @else
                                                                <span class="ms-2 fw-bold" style="font-size: 16px; color: var(--contentcolor-dark)">{{ format_currency_vnd($valueProduct->GIA_BAN * (1 - $discount->TILE_GIAM_GIA / 100)) }}
                                                                    /{{ $valueProduct->DONVITINH }}
                                                                </span>
                                                            @endif
                                                        @else
                                                            @if ($valueProduct->KHOILUONG == 1)
                                                                <span class="ms-2 fw-bold" style="font-size: 16px; color: var(--contentcolor-dark)">{{ format_currency_vnd($valueProduct->GIA_BAN * ($valueProduct->SO_GAM / 1000)) }}<span
                                                                        style="font-size: 13px; color: #9DA7BC">/{{ $valueProduct->SO_GAM }} gam.</span></span>
                                                            @else
                                                                <span class="ms-2 fw-bold" style="font-size: 16px; color: var(--contentcolor-dark)">{{ format_currency_vnd($valueProduct->GIA_BAN) }}<span style="font-size: 13px; color: #9DA7BC">/{{ $valueProduct->DONVITINH }}.</span></span>
                                                            @endif
                                                            <br>
                                                        @endif
                                                        @if (isset($discount))
                                                            <div class="animaiton-badges badge bg-danger">- {{ $discount->TILE_GIAM_GIA }}%</div>
                                                            <br>
                                                        @endif
                                                        @if (isset($discount))
                                                            @if ($valueProduct->KHOILUONG == 1)
                                                                <span class="ms-2 fw-bold text-decoration-line-through" style="font-size: 16px;  color: #9DA7BC">{{ format_currency_vnd($valueProduct->GIA_BAN * ($valueProduct->SO_GAM / 1000)) }}</span>
                                                                <br>
                                                            @else
                                                                <span class="ms-2 fw-bold text-decoration-line-through" style="font-size: 16px;  color: #9DA7BC">{{ format_currency_vnd($valueProduct->GIA_BAN) }}</span>
                                                                <br>
                                                            @endif
                                                        @endif
                                                        @if ($valueProduct->KHOILUONG == 1)
                                                            <span class="ms-2 fw-bold" style="font-size: 16px; color: var(--contentcolor-dark)">{{ format_currency_vnd($valueProduct->GIA_BAN) }}<span style="font-size: 13px; color: #9DA7BC">/{{ $valueProduct->DONVITINH }}
                                                                    1Kg.</span></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider-card-group-item-btnbuy g-0 p-0 mt-2">
                                            <div class="slider-card-group-item-btnprice g-0">
                                                <button type="button" class="btn d-flex justify-content-center align-items-center" style="color: var(--contentcolor-light); width: 100%; font-weight: bold; color: #006133; background-color: #d4f8db">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                    <span class="ms-2">MUA NGAY</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endif
                @include('layouts.footer-small')
            </div>
        </div>
    </main>
@endsection
