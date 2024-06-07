@extends('layouts.page.layout-home')
@section('content')
    @include('layouts.infoUser')
    <main class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="row g-0 p-0 d-flex flex-nowrap justify-content-lg-between">
            @include('layouts.menu')
            <div class="g-0" style="padding-left: calc(var(--margin-left) + var(--width-menu)); width: calc(var(--width-menu) * 2 + var(--width-search)); ">
                <div class="container-fluid g-0 m-auto mb-5" style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                    <menu class="g-0 mt-2 p-2 d-flex justify-content-start flex-nowrap align-items-center" style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                        @php
                            $product = DB::table('loai_mathang')->join('nhom_loai_mathang', 'nhom_loai_mathang.MANHOM_LOAI', '=', 'loai_mathang.MANHOM_LOAI')->where('loai_mathang.TOP_MUASAM', 1)->limit(12)->get();
                        @endphp
                        @if (isset($product))
                            @foreach ($product as $key => $value)
                                <div class="p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column" style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                                    <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 70px; overflow: hidden">
                                        <img class="object-fit-contain" src="{{ env('PATH_IMAGE_TYPE_PRODUCT') }}{{ $value->PICTURE }}" alt="Menu items Add" style="width: 100%" />
                                    </div>
                                    <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 50px; overflow: hidden">
                                        <a href="/TypeProduct/{{ convertVietnamese($value->TENLOAI) . '--' . Str::lower($value->MALOAI) }}" class="card-menu-content-bottom text-center m-0 truncate"
                                            style="color: var(--contentcolor); font-weight: bold; overflow-wrap: break-word; text-decoration: none;">{{ $value->TENLOAI }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </menu>
                </div>
                @include('layouts.warningNotification')
                @php
                    $giamGia = DB::table('giam_gia')->select('MAMH', DB::raw('COUNT(*) as count_lan_giam_gia'))->groupBy('MAMH')->orderByDesc('count_lan_giam_gia')->limit(10)->get();
                @endphp
                @if (isset($giamGia))
                    <div class="container-fluid g-0 m-auto mb-5 pb-3" style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left)); background: var(--bgcolor-sale); border-radius: 8px; ">
                        <div class="slider-card-group-title mb-3 p-3 d-flex justify-content-between align-items-center">
                            <h3 class="m-0 fw-bold" style="background: var(--bgcolor-items); background-clip: text; color: transparent">
                                KHUYẾN MÃI SỐC
                            </h3>
                        </div>
                        <div class="slider-card-group-khuyyenmai p-2  m-0  d-flex justify-content-between flex-nowrap align-items-center gap-2" style="width: 100%">
                            @foreach ($giamGia as $values)
                                @php
                                    $productDetail = DB::table('mat_hang')
                                        ->where('MAMH', $values->MAMH)
                                        ->first();
                                @endphp
                                @php
                                    $discount = DB::table('giam_gia')
                                        ->where('giam_gia.MAMH', $productDetail->MAMH)
                                        ->orderBy('giam_gia.LAN_GIAM_GIA', 'desc')
                                        ->select('giam_gia.TILE_GIAM_GIA')
                                        ->first();
                                @endphp
                                @if (isset($productDetail))
                                    <div class="slider-card-group-item p-1 " style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left) - (8px * 4) - 40px) / 5); margin-left: 4px; margin-right: 4px;  min-height: 300px; background: var(--bgcolor-card); border-radius: 5px;">
                                        <div class="slider-card-group-item-top d-flex flex-column justify-content-center position-relative">
                                            <div class="slider-card-group-item-img m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 211px; overflow: hidden">
                                                <img class="object-fit-contain" src="{{ env('PATH_IMAGE_PRODUCT_AVT') }}{{ $productDetail->PICTURE }}" alt="" style="width: 100%; height: auto" />
                                            </div>
                                            <div class="slider-card-group-item-product text-center">
                                                <a class="stretched-link" href="/Product/{{ convertVietnamese($productDetail->TENMH) . '--' . Str::lower($productDetail->MAMH) }}">
                                                    <h6 class="m-0 truncate">{{ $productDetail->TENMH }}</h6>
                                                </a>
                                            </div>
                                            <div class="slider-card-group-item-top-sale animaiton-badges badge bg-danger position-absolute top-0 end-0" style="font-size: 14px">
                                                - {{ $discount->TILE_GIAM_GIA }}%
                                            </div>
                                        </div>
                                        <div class="slider-card-group-item-bottom g-0 p-0">
                                            <div class="slider-card-group-item-content"></div>
                                            <div class="slider-card-group-item-prices g-0 p-0 d-flex justify-content-center align-items-center">
                                                <div class="slider-card-group-item-price g-0">
                                                    @if (isset($discount))
                                                        @if ($productDetail->KHOILUONG == 1)
                                                            <span class="ms-2 fw-bold" style="font-size: 19px; color: #faed65">{{ format_currency_vnd($productDetail->GIA_BAN * ($productDetail->SO_GAM / 1000) * (1 - $discount->TILE_GIAM_GIA / 100)) }}</span>
                                                        @else
                                                            <span class="ms-2 fw-bold" style="font-size: 19px; color: #faed65">{{ format_currency_vnd($productDetail->GIA_BAN * (1 - $discount->TILE_GIAM_GIA / 100)) }}
                                                            </span>
                                                        @endif
                                                    @else
                                                        @if ($productDetail->KHOILUONG == 1)
                                                            <span class="ms-2 fw-bold" style="font-size: 19px; color: #faed65">{{ format_currency_vnd($productDetail->GIA_BAN * ($productDetail->SO_GAM / 1000)) }}</span>
                                                        @else
                                                            <span class="ms-2 fw-bold" style="font-size: 19px; color: #faed65">{{ format_currency_vnd($productDetail->GIA_BAN) }}</span>
                                                        @endif
                                                        <br>
                                                    @endif
                                                    @if (isset($discount))
                                                        @if ($productDetail->KHOILUONG == 1)
                                                            <span class="ms-2 fw-bold text-decoration-line-through" style="font-size: 16px;  color: white">{{ format_currency_vnd($productDetail->GIA_BAN * ($productDetail->SO_GAM / 1000)) }}</span>
                                                            <br>
                                                        @else
                                                            <span class="ms-2 fw-bold text-decoration-line-through" style="font-size: 16px;  color: white">{{ format_currency_vnd($productDetail->GIA_BAN) }}</span>
                                                            <br>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="slider-card-group-item-btnprice g-0">
                                                    <button type="button" class="btn d-flex justify-content-center align-items-center ps-3 px-3" style="background: #006133; color: var(--contentcolor-light)">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                        <span class="ms-2">MUA</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @php
                    $groupTypeProduct = DB::table('nhom_loai_mathang')->get();
                @endphp
                @if (isset($groupTypeProduct) || count($groupTypeProduct) > 0)
                    @foreach ($groupTypeProduct as $key => $values)
                        @php
                            $typeProduct = DB::table('loai_mathang')
                                ->where('loai_mathang.MANHOM_LOAI', $values->MANHOM_LOAI)
                                ->where('loai_mathang.TOP_MUASAM', 1)
                                ->get();
                        @endphp
                        @if (isset($typeProduct))
                            @php
                                $bannerQC = DB::table('panner_qc_nhomloaimathang')
                                    ->where('panner_qc_nhomloaimathang.MANHOM_LOAI', $values->MANHOM_LOAI)
                                    ->get();
                            @endphp
                            @if (count($bannerQC) > 0)
                                <div class="container-fluid g-0 m-auto mb-5" style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                                    <div class="banner-single-items d-flex flex-lg-nowrap align-items-center" style="width: 100%">
                                        @foreach ($bannerQC as $item)
                                            <div class="banner-single-item" style="width: 100%">
                                                <img src="{{ env('PATH_IMAGE_BANNERQC') }}{{ $item->PICTURE }}" alt="" style="width: 100%" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @foreach ($typeProduct as $typeProducts)
                                @php
                                    $product = DB::table('mat_hang')
                                        ->where('mat_hang.MALOAI', $typeProducts->MALOAI)
                                        ->where('mat_hang.TINHTRANG', 1)
                                        ->limit(5)
                                        ->get();
                                @endphp
                                @if (count($product) > 0)
                                    <div class="slider-card-group-spec-div container-fluid g-0 m-auto mb-5 position-relative" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left)); background: var(--bgcolor-sale);border-radius: 8px; border-top: 3px solid #006133;">
                                        <div
                                            class="before:absolute before:left-[-9px] before:top-[-1px] before:border-r-[9px] before:border-t-[16px] before:border-r-[#00AC5B] before:border-t-transparent after:absolute after:right-[-9px] after:top-[-1px] after:border-l-[9px] after:border-t-[16px] after:border-l-[#00AC5B] after:border-t-transparent bg-[#00AC5B] text-[#fff] after:!border-l-[#3b854e] cate_title slider-card-group-spec-title position-absolute top-0 start-50 translate-middle text-center">
                                            <h3 class="m-0 fw-bold ps-5 px-5 pt-1 pb-1">
                                                {{ $typeProducts->TENLOAI }}
                                            </h3>
                                        </div>
                                        <div class="mt-4 d-flex mx-3 align-items-end justify-content-end" style="height: 40px;">
                                            <a href="/GroupProduct/{{ convertVietnamese($values->TENNHOM_LOAI) . '--' . Str::lower($values->MANHOM_LOAI) }}" style="text-decoration: none; color: #00aa58">Xem thêm các sản phẩm cùng nhóm
                                                {{ $values->TENNHOM_LOAI }} <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 16px"></i></a>
                                        </div>
                                        <div class="slider-card-group p-2 m-0 d-flex justify-content-between flex-nowrap align-items-center" style="width: 100%">
                                            @foreach ($product as $valueProduct)
                                                <div class="slider-card-group-item-spec p-1" style=" width: calc((var(--width-menu) + var(--width-search) - var(--margin-left) - (4px * 4) - 16px) / 5 ); min-height: 300px; background: var(--bgcolor-white); border-radius: 5px;">
                                                    <div class="slider-card-group-item-inf g-0 p-0 position-relative">
                                                        <div class="slider-card-group-item-top d-flex flex-column justify-content-center">
                                                            <div class="slider-card-group-item-img m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 211px; overflow: hidden">
                                                                <img class="object-fit-contain" src="{{ env('PATH_IMAGE_PRODUCT_AVT') }}/{{ $valueProduct->PICTURE }}" alt="" style="width: 100%; height: auto" />
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
                                                                            <span class="ms-2 fw-bold" style="font-size: 16px; color: var(--contentcolor-dark)">{{ format_currency_vnd($valueProduct->GIA_BAN) }}<span
                                                                                    style="font-size: 13px; color: #9DA7BC">/{{ $valueProduct->DONVITINH }}.</span></span>
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
                                        </div>
                                        <div class="slider-card-more pt-2 pb-2 text-center mt-3 fw-bold position-relative">
                                            <a class="stretched-link" href="/TypeProduct/{{ convertVietnamese($typeProducts->TENLOAI) . '--' . Str::lower($typeProducts->MALOAI) }}" style="text-decoration: none; color: var(--contentcolor-light); font-size: 20px">Xem thêm các
                                                sản phẩm {{ $typeProducts->TENLOAI }}
                                                <i class="fa-solid fa-chevron-right" style="color: var(--contentcolor-light); font-size: 20px"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
                @include('layouts.footer-small')
            </div>
        </div>
    </main>
@endsection
