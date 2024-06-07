@extends('layouts.page.layout-groupTypeProduct')
@section('title', $firstGroupTypeGroup->TENNHOM_LOAI . ' - BachHoaXanh.com')
@section('content')
    @include('layouts.infoUser')
    <main class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="row g-0 p-0 d-flex flex-nowrap justify-content-lg-between">
            @include('layouts.menu')
            <div class="g-0" style=" padding-left: calc(var(--margin-left) + var(--width-menu)); width: calc(var(--width-menu) * 2 + var(--width-search)); ">
                <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left)); background: var(--bgcolor-white); border-radius: 8px; ">
                    <div class="breadcrumb-item-icon position-relative p-3">
                        <a href="#" class="stretched-link">
                            <i class="fa-solid fa-chevron-left" style=" color: var(--contentcolor);  font-weight: bold; overflow-wrap: break-word; text-decoration: none; font-size: 23px;  "></i>
                        </a>
                    </div>
                    <div class="breadcrumb-item-text fw-bold p-3">{{ $firstGroupTypeGroup->TENNHOM_LOAI }}</div>
                </div>
                <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                    <menu class="card-group-menu-with-type g-0 mt-2 p-2 d-flex justify-content-start flex-nowrap align-items-center gap-2" style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                        @php
                            $TypeProduct = DB::table('loai_mathang')
                                ->where('loai_mathang.MANHOM_LOAI', $firstGroupTypeGroup->MANHOM_LOAI)
                                ->get();
                        @endphp
                        @foreach ($TypeProduct as $values)
                            <div class="p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column" style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                                <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 70px; overflow: hidden">
                                    <img class="object-fit-contain" src="{{ env('PATH_IMAGE_TYPE_PRODUCT') }}{{ $values->PICTURE }}" alt="Menu items Add" style="width: 100%; height: 100%" />
                                </div>
                                <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 50px; overflow: hidden">
                                    <a href="/TypeProduct/{{ convertVietnamese($values->TENLOAI) . '--' . Str::lower($values->MALOAI) }}" class="card-menu-content-bottom text-center m-0 truncate"
                                        style="  color: var(--contentcolor);  font-weight: bold; overflow-wrap: break-word;  text-decoration: none;  ">
                                        {{ $values->TENLOAI }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </menu>
                </div>
                @include('layouts.warningNotification')
                <div class="container-fluid g-0 m-auto mt-5 position-relative" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left)); background: var(--bgcolor-gradient); border-radius: 8px;border-top: 3px solid #006133; ">
                    <div
                        class="before:absolute before:left-[-9px] before:top-[-1px] before:border-r-[9px] before:border-t-[16px] before:border-r-[#00AC5B] before:border-t-transparent after:absolute after:right-[-9px] after:top-[-1px] after:border-l-[9px] after:border-t-[16px] after:border-l-[#00AC5B] after:border-t-transparent bg-[#00AC5B] text-[#fff] after:!border-l-[#3b854e] cate_title slider-card-group-spec-title position-absolute top-0 start-50 translate-middle text-center">
                        <h3 class="m-0 fw-bold ps-5 px-5 pt-1 pb-1" style="background: var(--bgcolor-items); background-clip: text; color: transparent">
                            KHUYẾN MÃI
                        </h3>
                    </div>
                    <div class="" style="height: 40px"></div>
                    <div class="slider-card-group p-2 g-0 m-0 d-flex justify-content-between flex-wrap align-items-center" style="width: 100%">
                        <div class="slider-card-group-item-spec p-1" style=" width: calc((var(--width-menu) + var(--width-search) - var(--margin-left) - (8px * 4)) / 5 ); min-height: 300px; background: var(--bgcolor-white); border-radius: 5px; ">
                            <div class="slider-card-group-item-inf g-0 p-0 position-relative">
                                <div class="slider-card-group-item-top d-flex flex-column justify-content-center">
                                    <div class="slider-card-group-item-img m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 211px; overflow: hidden">
                                        <img class="object-fit-contain" src="../folderImages/images/products/products_avt/sanpham2.png" alt="" style="width: 100%; height: auto" />
                                    </div>
                                    <div class="slider-card-group-item-product-spec">
                                        <a href="#" class="stretched-link">
                                            <h6 class="m-0 truncate">Hành tây</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="slider-card-group-item-bottom g-0 p-0">
                                    {{-- <div class="slider-card-group-item-content"></div> --}}
                                    <div class="slider-card-group-item-prices g-0 p-0 d-flex justify-content-center flex-column">
                                        <div class="slider-card-group-item-price-spec g-0">
                                            <span class="ms-2 fw-bold" style="font-size: 16px; color: var(--contentcolor-dark)">90.000đ/Túi
                                                100g</span>
                                            <br />
                                            <span class="ms-2 text-decoration-line-through" style="font-size: 14px; color: var(--contentcolor-dark)">100.000đ</span>
                                            <div class="animaiton-badges badge bg-danger">10%</div>
                                            <br />
                                            <span class="ms-2" style="font-size: 14px; color: var(--contentcolor-dark)">20.000đ/kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-card-group-item-btnbuy g-0 p-0 mt-2">
                                <div class="slider-card-group-item-btnprice g-0">
                                    <button type="button" class="animate-gradient btn d-flex justify-content-center align-items-center" style="color: var(--contentcolor-light); width: 100%; font-weight: bold">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span class="ms-2">MUA NGAY</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-card-more pt-2 pb-2 text-center mt-3 fw-bold position-relative">
                        <a class="stretched-link" href="#" style="text-decoration: none; color: var(--contentcolor-light); font-size: 20px">Xem thêm các
                            sản phẩm Rau củ nấm
                            <i class="fa-solid fa-chevron-right" style="color: var(--contentcolor-light); font-size: 20px"></i>
                        </a>
                    </div>
                </div>
                @php
                    $TypeProducts = DB::table('loai_mathang')
                        ->where('loai_mathang.MANHOM_LOAI', $firstGroupTypeGroup->MANHOM_LOAI)
                        ->get();
                @endphp
                @foreach ($TypeProducts as $typeProduct)
                    <div class="slider-card-group-spec-div container-fluid g-0 m-auto mt-5 position-relative" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left));  background: var(--bgcolor-sale); border-radius: 8px; ">
                        <div
                            class="before:absolute before:left-[-9px] before:top-[-1px] before:border-r-[9px] before:border-t-[16px] before:border-r-[#00AC5B] before:border-t-transparent after:absolute after:right-[-9px] after:top-[-1px] after:border-l-[9px] after:border-t-[16px] after:border-l-[#00AC5B] after:border-t-transparent bg-[#00AC5B] text-[#fff] after:!border-l-[#3b854e] cate_title slider-card-group-spec-title position-absolute top-0 start-50 translate-middle text-center">
                            <h3 class="m-0 fw-bold ps-5 px-5 pt-1 pb-1">
                                {{ $typeProduct->TENLOAI }}
                            </h3>
                        </div>
                        <div class="" style="height: 40px"></div>
                        <div class="slider-card-group p-2 g-0 m-0 d-flex justify-content-between flex-nowrap align-items-center" style="width: 100%">
                            @php
                                $products = DB::table('mat_hang')
                                    ->where('mat_hang.MALOAI', $typeProduct->MALOAI)
                                    ->get();
                            @endphp
                            @if ($products->count() > 0)
                                @foreach ($products as $valueProduct)
                                    <div class="slider-card-group-item-spec p-1" style="width: calc( (var(--width-menu) + var(--width-search) - var(--margin-left) - (8px * 4)) / 5 ); min-height: 300px; background: var(--bgcolor-white); border-radius: 5px;">
                                        <div class="slider-card-group-item-inf g-0 p-0 position-relative">
                                            <div class="slider-card-group-item-top d-flex flex-column justify-content-center">
                                                <div class="slider-card-group-item-img m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 211px; overflow: hidden">
                                                    <img class="object-fit-contain" src="{{ env('PATH_IMAGE_GROUP_TYPE_PRODUCT') }}{{ $valueProduct->PICTURE }}" alt="" style="width: 100%; height: auto" />
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
                                                <button type="button" class="animate-gradient btn d-flex justify-content-center align-items-center" style="color: var(--contentcolor-light); width: 100%; font-weight: bold">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                    <span class="ms-2">MUA NGAY</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="slider-card-more pt-2 pb-2 text-center mt-3 fw-bold position-relative">
                            <a class="stretched-link" href="/TypeProduct/{{ convertVietnamese($typeProduct->TENLOAI) . '--' . Str::lower($typeProduct->MALOAI) }}" style="text-decoration: none; color: var(--contentcolor-light); font-size: 20px">Xem thêm các
                                sản phẩm {{ $typeProduct->TENLOAI }}
                                <i class="fa-solid fa-chevron-right" style="color: var(--contentcolor-light); font-size: 20px"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
                @include('layouts.footer-small')
            </div>
        </div>
    </main>
@endsection
