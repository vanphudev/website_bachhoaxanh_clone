<div id="menu" class="g-0 p-0" style="width: calc(var(--width-menu)) ; max-height: calc(100vh - 115px); position: fixed; top: 105px; z-index: 99999; border-bottom-left-radius: 12px;
border-bottom-right-radius: 12px;">
    @php
        $groupTypeProduct = DB::table('nhom_loai_mathang')->get();
    @endphp
    <nav class="container-fluid g-0 p-0 m-0" style="width: 100%;">
        <div class="accordion" id="accordionExample">
            @if (!isset($groupTypeProduct))
                <div class="accordion-item" style="border-top-left-radius: 0px; border-top-right-radius: 0px; border-top: none">
                    <h2 class="accordion-header" id="heading1">
                        <div style="color: #000000; background: transparent" class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            Không có dữ liệu
                        </div>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                        <div class="accordion-body p-2">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action">Không có dữ liệu</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($groupTypeProduct as $index => $product)
                    <div class="accordion-item">
                        <h1 class="accordion-header d-flex justify-content-start align-items-center" id="heading{{ $index }}">
                            <div style="color: #000000; background: transparent; font-size: 16px; text-transform: uppercase; " class="accordion-button collapsed fw-bold ps-2 px-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="true"
                                aria-controls="collapse{{ $index }}">
                                {{ $product->TENNHOM_LOAI }}
                            </div>
                        </h1>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-2">
                                <ul class="list-group list-group-flush">
                                    @php
                                        $typeProduct = DB::table('loai_mathang')
                                            ->where('loai_mathang.MANHOM_LOAI', $product->MANHOM_LOAI)
                                            ->select('TENLOAI', 'MALOAI')
                                            ->get();
                                    @endphp
                                    @foreach ($typeProduct as $key => $items)
                                        <li class="list-group-item list-group-item-action"><a href="/TypeProduct/{{ convertVietnamese($items->TENLOAI) . '--' . Str::lower($items->MALOAI) }}" style="text-decoration: none;">{{ $items->TENLOAI }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </nav>
</div>
