@extends('layouts.page.layout-typeProduct')
@section('title', $firstTypeGroup->TENLOAI . ' - BachHoaXanh.com')
@section('content')
    @include('layouts.infoUser')
    <main class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="row g-0 p-0 d-flex flex-nowrap justify-content-lg-between">
            @include('layouts.menu')
            <div class="g-0" style="padding-left: calc(var(--margin-left) + var(--width-menu)); width: calc(var(--width-menu) * 2 + var(--width-search));">
                <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center" style=" width: calc(var(--width-menu) + var(--width-search) - var(--margin-left)); background: var(--bgcolor-white); border-radius: 8px; ">
                    <div class="breadcrumb-item-icon position-relative p-3">
                        <a href="/" class="stretched-link">
                            <i class="fa-solid fa-chevron-left" style=" color: var(--contentcolor);  font-weight: bold;  overflow-wrap: break-word; text-decoration: none; font-size: 23px;"></i>
                        </a>
                    </div>
                    <div class="breadcrumb-item-text fw-bold p-3">{{ $firstTypeGroup->TENLOAI }}</div>
                </div>
                <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                    <menu class="card-group-menu-with-type g-0 mt-2 p-2 d-flex justify-content-start flex-nowrap align-items-center gap-2" style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                        <div class="card-group-menu-active p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column" style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 70px; overflow: hidden">
                                <img class="object-fit-contain" src="{{ env('PATH_IMAGE_TYPE_PRODUCT') }}{{ $firstTypeGroup->PICTURE }}" alt="Menu items Add" style="width: 100%; height: 100%" />
                            </div>
                            <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 50px; overflow: hidden">
                                <a href="/TypeProduct/{{ convertVietnamese($firstTypeGroup->TENLOAI) . '--' . Str::lower($firstTypeGroup->MALOAI) }}" class="card-menu-content-bottom text-center m-0 truncate"
                                    style="color: var(--contentcolor); font-weight: bold; overflow-wrap: break-word; text-decoration: none; ">{{ $firstTypeGroup->TENLOAI }}</a>
                            </div>
                        </div>
                        @php
                            $typeProducts = DB::table('loai_mathang')
                                ->where('loai_mathang.MANHOM_LOAI', $firstTypeGroup->MANHOM_LOAI)
                                ->where('loai_mathang.MALOAI', '!=', $firstTypeGroup->MALOAI)
                                ->get();
                        @endphp
                        @if (isset($typeProducts))
                            @foreach ($typeProducts as $values)
                                <div class="p-2 card-menu-items d-flex justify-content-center flex-nowrap flex-column" style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left)) / 12)">
                                    <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 70px; overflow: hidden">
                                        <img class="object-fit-contain" src="{{ env('PATH_IMAGE_TYPE_PRODUCT') }}{{ $values->PICTURE }}" alt="Menu items Add" style="width: 100%; height: 100%" />
                                    </div>
                                    <div class="card-menu-img-top m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 50px; overflow: hidden">
                                        <a href="/TypeProduct/{{ convertVietnamese($values->TENLOAI) . '--' . Str::lower($values->MALOAI) }}" class="card-menu-content-bottom text-center m-0 truncate"
                                            style="color: var(--contentcolor); font-weight: bold; overflow-wrap: break-word; text-decoration: none; ">{{ $values->TENLOAI }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </menu>
                </div>
                @include('layouts.warningNotification')
                <div class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left))">
                    <div class="filter-groups d-flex justify-content-start align-items-center gap-3 p-3 ps-4 px-4" style="background: var(--bgcolor-white); border-radius: 10px; width: 100%">
                        <div class="filter-groups-item position-relative" style="font-weight: bold; font-size: 25px;color:#04733C;">
                            <i class="fa-solid fa-filter" style="color:#04733C; font-weight: bold; overflow-wrap: break-word; text-decoration: none; font-size: 23px;"></i>
                            Bộ lọc
                        </div>
                        <div class="filter-groups-item">
                            <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sắp xếp theo
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="/TypeProduct/{{ convertVietnamese($firstTypeGroup->TENLOAI) . '--' . Str::lower($firstTypeGroup->MALOAI) }}?sortAsc={{ 'asc' }}">Giá bán tăng dần</a></li>
                                    <li><a class="dropdown-item" href="/TypeProduct/{{ convertVietnamese($firstTypeGroup->TENLOAI) . '--' . Str::lower($firstTypeGroup->MALOAI) }}?sortDesc={{ 'desc' }}">Giá bán giảm dần</a></li>
                                    <li><a class="dropdown-item" href="/TypeProduct/{{ convertVietnamese($firstTypeGroup->TENLOAI) . '--' . Str::lower($firstTypeGroup->MALOAI) }}?discount={{ 'discount' }}">Sản phẩm giảm giá</a></li>
                                </ul>
                            </div>
                        </div>
                        @php
                            $brands = null;
                            $brands = DB::table('thuong_hieu')
                                ->join('mat_hang', 'thuong_hieu.MA_TH', '=', 'mat_hang.MA_TH')
                                ->where('mat_hang.MALOAI', $firstTypeGroup->MALOAI)
                                ->select('thuong_hieu.*')
                                ->distinct()
                                ->get();
                        @endphp
                        @if (isset($brands))
                            <div class="filter-groups-item">
                                <div class="dropdown">
                                    <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Thương hiệu
                                    </button>
                                    <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton2">
                                        <ul style="list-style-type: none; width: 400px" class="p-0 m-0 g-0 d-flex justify-content-start flex-nowrap align-items-center">
                                            @foreach ($brands as $values)
                                                <li style="width: 100px; height: auto">
                                                    <a class="dropdown-item" href="/TypeProduct/{{ convertVietnamese($firstTypeGroup->TENLOAI) . '--' . Str::lower($firstTypeGroup->MALOAI) }}?filterBrand={{ Str::lower($values->MA_TH) }}">
                                                        <img style="width: 100%" src="{{ env('PATH_IMAGE_BRAND') }}{{ $values->PICTURE }}" alt="" />
                                                    </a>
                                                </li>
                                            @endforeach
                                            <li style="width: 100px; height: auto">
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="container-fluid g-0 m-auto mt-3 position-relative" style="width: calc(var(--width-menu) + var(--width-search) - var(--margin-left)); background: var(--bgcolor-white); border-radius: 8px; ">
                    <div class="slider-card-group p-2 g-0 m-0 d-flex justify-content-start flex-wrap align-items-center" style="width: 100%">
                        @if (isset($filterBrand))
                            @php
                                $roducts = DB::table('mat_hang')
                                    ->join('thuong_hieu', 'mat_hang.MA_TH', '=', 'thuong_hieu.MA_TH')
                                    ->where('mat_hang.MALOAI', $firstTypeGroup->MALOAI)
                                    ->where('mat_hang.MA_TH', $filterBrand)
                                    ->select('mat_hang.*')
                                    ->get();
                            @endphp
                        @elseif (isset($sortAsc))
                            @php
                                $roducts = DB::table('mat_hang')
                                    ->select('mat_hang.*', DB::raw('calculate_final_price(mat_hang.MAMH) as FINAL_PRICE'))
                                    ->where('mat_hang.MALOAI', $firstTypeGroup->MALOAI)
                                    ->orderBy('FINAL_PRICE', 'asc')
                                    ->get();
                            @endphp
                        @elseif (isset($sortDesc))
                            @php
                                $roducts = DB::table('mat_hang as mh')
                                    ->select('mh.*', DB::raw('calculate_final_price(mh.MAMH) as FINAL_PRICE'))
                                    ->where('mh.MALOAI', $firstTypeGroup->MALOAI)
                                    ->orderBy('FINAL_PRICE', 'desc')
                                    ->get();
                            @endphp
                        @elseif (isset($discount))
                            @php
                                $roducts = DB::table('mat_hang')
                                    ->join('giam_gia', 'mat_hang.MAMH', '=', 'giam_gia.MAMH')
                                    ->where('MALOAI', $firstTypeGroup->MALOAI)
                                    ->orderBy('giam_gia.LAN_GIAM_GIA', 'desc')
                                    ->select('mat_hang.*')
                                    ->get();
                            @endphp
                        @else
                            @php
                                $roducts = DB::table('mat_hang')
                                    ->where('MALOAI', $firstTypeGroup->MALOAI)
                                    ->get();
                            @endphp
                        @endif
                        @if (isset($roducts))
                            @foreach ($roducts as $valueProduct)
                                <div class="slider-card-group-item-spec p-1" style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left) - (8px * 4) - 4px) / 5); min-height: 300px; background: var(--bgcolor-white);  border-radius: 5px; ">
                                    <div class="slider-card-group-item-inf g-0 p-0 position-relative">
                                        <div class="slider-card-group-item-top d-flex flex-column justify-content-center">
                                            <div class="slider-card-group-item-img m-auto d-flex justify-content-center align-items-center" style="width: 100%; height: 211px; overflow: hidden">
                                                <img class="object-fit-contain" src="{{ env('PATH_IMAGE_TYPE_PRODUCT') }}{{ $valueProduct->PICTURE }}" alt="" style="width: 100%; height: auto" />
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
                                            <button type="button" class=" btn d-flex justify-content-center align-items-center" style="color: #04733C; width: 100%; font-weight: bold; background-color: #E4F5E7">
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
                @include('layouts.footer-small')
            </div>
        </div>
    </main>
@endsection
