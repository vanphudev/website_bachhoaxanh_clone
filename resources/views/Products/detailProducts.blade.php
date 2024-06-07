@extends('layouts.page.layout-detailProduct')
@section('title', $firstProduct->TENMH)
@section('content')
    @include('layouts.menu-hover')
    @include('layouts.infoUser')
    <main class="container-fluid g-0 m-auto" style="width: calc(var(--width-menu) * 2 + var(--width-search)); padding-top: 105.5px">
        <div class="container-fluid g-0 p-0 m-auto" style="width: 100%">
            <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap align-items-center" style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                <div class="p-3">
                    <a href="/">
                        <i class="fa-solid fa-house" style="color: var(--contentcolor); font-weight: bold;  overflow-wrap: break-word;  text-decoration: none;font-size: 23px;"></i>
                    </a>
                </div>
                <div class="breadcrumb-item-text fw-bold p-2">
                    @php
                        $TypeProduct = DB::table('loai_mathang')
                            ->where('MALOAI', $firstProduct->MALOAI)
                            ->first();
                    @endphp
                    <a href="/TypeProduct/{{ convertVietnamese($TypeProduct->TENLOAI) . '--' . Str::lower($TypeProduct->MALOAI) }}" style="text-decoration: none; color: var(--contentcolor)"> {{ $TypeProduct->TENLOAI }} </a>
                    <i class="fa-solid fa-chevron-right" style=" color: var(--contentcolor); font-weight: bold; overflow-wrap: break-word; text-decoration: none; font-size: 17px;"></i>
                    <a href="/Product/{{ convertVietnamese($firstProduct->TENMH) . '--' . Str::lower($firstProduct->MAMH) }}" style="text-decoration: none; color: var(--contentcolor)">{{ $firstProduct->TENMH }}</a>
                </div>
            </div>
            <div class="container-fluid g-0 m-auto mt-2 d-flex justify-content-start flex-nowrap" style="width: 100%">
                <div class="g-0 p-0" style="width: calc(var(--width-search) + 150px - 8px); margin-right: 8px; border-radius: 5px">
                    <div class="detail-images-product-info g-0 m-0 p-2 mb-2" style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                        @php
                            $imgagesProduct = DB::table('picture_mat_hang')
                                ->where('picture_mat_hang.MAMH', $firstProduct->MAMH)
                                ->get();
                        @endphp
                        @if ($imgagesProduct->count() > 0)
                            <div class="images-product-info-items d-flex align-items-center mb-5 m-auto">
                                @foreach ($imgagesProduct as $imgProduct)
                                    <div class="images-product-info-item">
                                        <a href="{{ env('PATH_IMAGE_PRODUCT_DETAIL') }}{{ $imgProduct->PICTURE }}" data-fancybox="gallery" data-caption="Single image">
                                            <img src="{{ env('PATH_IMAGE_PRODUCT_DETAIL') }}{{ $imgProduct->PICTURE }}" alt="Hình ảnh: {{ $firstProduct->TENMH }}" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="images-product-info-nav-items d-flex align-items-center">
                                @foreach ($imgagesProduct as $imgProduct)
                                    <div class="images-product-info-nav-item d-flex justify-content-center align-items-center" style="width: 100%; height: 110px">
                                        <img src="{{ env('PATH_IMAGE_PRODUCT_DETAIL') }}{{ $imgProduct->PICTURE }}" alt="Hình ảnh: {{ $firstProduct->TENMH }}" />
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="images-product-info-items d-flex align-items-center mb-5 m-auto">
                                <div class="images-product-info-item">
                                    <a href="{{ env('PATH_IMAGE_PRODUCT_DETAIL') }}noproduct.png" data-fancybox="gallery" data-caption="Single image">
                                        <img src="{{ env('PATH_IMAGE_PRODUCT_DETAIL') }}noproduct.png" alt="" />
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    @php
                        $products = DB::table('mat_hang')
                            ->where('mat_hang.MALOAI', $firstProduct->MALOAI)
                            ->where('mat_hang.MAMH', '!=', $firstProduct->MAMH)
                            ->get();
                    @endphp
                    @if (isset($products))
                        <div class="related-product-info g-0 m-0 p-3 mb-2" style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                            <div class="p-2">
                                <h3 class="p-0 fw-bold">Sản phẩm liên quan</h3>
                            </div>
                            <div class="slider-card-group p-2 m-0  d-flex justify-content-between flex-nowrap align-items-center" style="width: 100%">
                                @foreach ($products as $valueProduct)
                                    <div class="slider-card-group-item-spec p-1" style="width: calc((var(--width-menu) + var(--width-search) - var(--margin-left) - (4px * 5)) / 5 ); min-height: 300px; background: var(--bgcolor-white); border-radius: 5px; border: 1px solid #006133">
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
                                                <button id="buy_now" type="button" class=" btn d-flex justify-content-center align-items-center" style="color: #17c700; width: 100%; font-weight: bold; background-color: #E4F5E7">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                    <span class="ms-2">MUA NGAY</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @php
                        $thomasProduct = DB::table('thong_tin_mat_hang')
                            ->where('thong_tin_mat_hang.MAMH', $firstProduct->MAMH)
                            ->get();
                    @endphp
                    @if ($thomasProduct->count() > 0)
                        <div class="product-info g-0 m-0 p-3 mb-2" style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                            <div class="detail-product-info g-0 m-0 p-0 mb-3" style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                                <div class="p-2 mb-2">
                                    <h3 class="p-0 fw-bold">Thông tin sản phẩm</h3>
                                </div>
                                <div class="p-2 mb-2 g-0">
                                    <div class="content-product-info mb-3">
                                        {{ $firstProduct->MO_TA }}
                                    </div>
                                    <div class="table-content-product-info">
                                        <table class="table table-bordered table-hover">
                                            <tbody class="align-middle" style="font-size: 16px">
                                                @foreach ($thomasProduct as $valuesThomas)
                                                    <tr>
                                                        <th scope="row" class="text-center" style="background-color: var(--bgcolor-table-detail); width: 180px">
                                                            {{ $valuesThomas->TEN_THONG_TIN }}
                                                        </th>
                                                        <td>{{ $valuesThomas->NOI_DUNG }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $baiViet = DB::table('baiviet_sanpham')
                            ->where('baiviet_sanpham.MAMH', $firstProduct->MAMH)
                            ->select('baiviet_sanpham.*')
                            ->first();
                        $chiTietBaiViet = null;
                        if (isset($baiViet)) {
                            $chiTietBaiViet = DB::table('baiviet_tag')
                                ->where('baiviet_tag.ID_BAIVIET', $baiViet->ID_BAIVIET)
                                ->select('baiviet_tag.*')
                                ->get();
                        }
                    @endphp
                    @if (isset($chiTietBaiViet))
                        <div class="posts-product-info g-0 m-0 p-3 mb-2" style="width: 100%; background: var(--bgcolor-white); border-radius: 5px">
                            <div class="p-2 mb-2">
                                <h3 class="p-0 fw-bold">Bài viết sản phẩm</h3>
                            </div>
                            @foreach ($chiTietBaiViet as $values)
                                <div class="p-2 mb-2">
                                    <h4 class="p-0 fw-bold">{{ $values->TIEUDE }}</h4>
                                    <div class="p-2">{{ $values->NOIDUNG }}</div>
                                    <div class="p-2 m-auto text-center">
                                        <img src="{{ env('PATH_IMAGE_BAIVIET') }}/{{ $values->PICTURE }}" alt="" style="width: 60%; ">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div id="target-element" class="g-0 p-3 d-block" style=" width: calc(var(--width-menu) * 2 - 150px); background: var(--bgcolor-white);  border-radius: 5px; position: sticky; top: 130px; z-index: 100; height: calc(100vh - 170px); ">
                    <div class="name-product">
                        <h1 style="font-size: 27px; font-weight: bold">{{ $firstProduct->TENMH }}</h1>
                    </div>
                    <div class="shared-link-product d-flex justify-content-end align-items-center mb-3">
                        <button type="button" id="shareButton" class="btn btn-outline-success d-flex justify-content-center align-items-center gap-1">
                            <i class="fa-solid fa-copy" style="font-size: 20px"></i>
                            <span class="ms-2" style="font-size: 20px; font-weight: bold">Chia sẻ</span>
                        </button>
                    </div>
                    <div class=" mb-4">
                        <div class="g-0">
                            @php
                                $discount = DB::table('giam_gia')
                                    ->where('giam_gia.MAMH', $firstProduct->MAMH)
                                    ->orderBy('giam_gia.LAN_GIAM_GIA', 'desc')
                                    ->select('giam_gia.TILE_GIAM_GIA')
                                    ->first();
                            @endphp
                            @if (isset($discount))
                                @if ($firstProduct->KHOILUONG == 1)
                                    <span class="ms-2 fw-bold" style="font-size: 40px; color: red">{{ format_currency_vnd($firstProduct->GIA_BAN * ($firstProduct->SO_GAM / 1000) * (1 - $discount->TILE_GIAM_GIA / 100)) }}<span style="font-size: 24px; color: #9DA7BC">/{{ $firstProduct->SO_GAM }}
                                            gam.</span></span>
                                @else
                                    <span class="ms-2 fw-bold" style="font-size: 40px; color: red">{{ format_currency_vnd($firstProduct->GIA_BAN * (1 - $discount->TILE_GIAM_GIA / 100)) }}
                                        <span style="font-size: 24px; color: #9DA7BC">/{{ $firstProduct->DONVITINH }}.</span>
                                    </span>
                                @endif
                            @else
                                @if ($firstProduct->KHOILUONG == 1)
                                    <span class="ms-2 fw-bold" style="font-size: 40px; color: red">{{ format_currency_vnd($firstProduct->GIA_BAN * ($firstProduct->SO_GAM / 1000)) }}<span style="font-size: 24px; color: #9DA7BC">/{{ $firstProduct->SO_GAM }} gam.</span></span>
                                @else
                                    <span class="ms-2 fw-bold" style="font-size: 40px; color: red">{{ format_currency_vnd($firstProduct->GIA_BAN) }}<span style="font-size: 24px; color: #9DA7BC">/{{ $firstProduct->DONVITINH }}.</span></span>
                                @endif
                                <br>
                            @endif
                            @if (isset($discount))
                                <div class="animaiton-badges badge bg-danger" style="font-size: 17px">- {{ $discount->TILE_GIAM_GIA }}%</div>
                                <br>
                            @endif
                            @if (isset($discount))
                                @if ($firstProduct->KHOILUONG == 1)
                                    <span class="ms-2 fw-bold text-decoration-line-through" style="font-size: 25px;  color: #9DA7BC">{{ format_currency_vnd($firstProduct->GIA_BAN * ($firstProduct->SO_GAM / 1000)) }}</span>
                                    <br>
                                @else
                                    <span class="ms-2 fw-bold text-decoration-line-through" style="font-size: 25px;  color: #9DA7BC">{{ format_currency_vnd($firstProduct->GIA_BAN) }}</span>
                                    <br>
                                @endif
                            @endif
                            @if ($firstProduct->KHOILUONG == 1)
                                <span class="ms-2 fw-bold" style="font-size: 28px; color: var(--contentcolor-dark)">{{ format_currency_vnd($firstProduct->GIA_BAN) }}<span style="font-size: 13px; color: #9DA7BC">/{{ $firstProduct->DONVITINH }}
                                        1Kg.</span></span>
                            @endif
                        </div>
                    </div>
                    <div class="btn-buy-product">
                        <button id="addToCards" data_product="{{ $firstProduct->MAMH }}" type="button" class="animate-gradient btn d-flex justify-content-center align-items-center"
                            style="color: var(--contentcolor-light);  width: 100%;  font-weight: bold;  font-size: 24px;  border-radius: 10px; ">
                            <span>MUA NGAY</span>
                        </button>
                    </div>
                    <div class="response-product">
                        @include('layouts.warningNotification')
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var copyUrlButton = document.getElementById("shareButton");
            copyUrlButton.addEventListener("click", function() {
                var currentUrl = window.location.href;
                copyToClipboard(currentUrl);
                copyUrlButton.innerHTML = '<i class="fa-solid fa-check" style="font-size: 20px"></i><span class="ms-2" style="font-size: 20px; font-weight: bold">Đã sao chép</span>';
            });

            function copyToClipboard(text) {
                navigator.clipboard.writeText(text)
                    .then(function() {
                        console.log("Copied to clipboard successfully: " + text);
                    })
                    .catch(function(error) {
                        console.error("Failed to copy to clipboard: ", error);
                    });
            }
        });
    </script>
@endsection
