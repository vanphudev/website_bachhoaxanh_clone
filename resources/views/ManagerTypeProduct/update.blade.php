@if (isset($type_product))
    <div class="mb-3">
        <label class="form-label">Mã loại mặt hàng:</label>
        <input type="text" name="maLMH" class="form-control" value="{{ $type_product->MALOAI }}" placeholder="Mã loại mặt hàng tạo tự động" readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Tên loại mặt hàng:</label>
        <input type="text" name="tenLMH" class="form-control" value="{{ $type_product->TENLOAI }}" placeholder="Tên mặt hàng" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nhóm loại mặt hàng:</label>
        <select class="form-select" id="maNLMH" required>
            @php
                $nhom_loai_mat_hang = DB::table('nhom_loai_mathang')->get();
            @endphp
            <option disabled>Chọn nhóm loại mặt hàng.</option>
            @foreach ($nhom_loai_mat_hang as $item)
                @if ($item->MANHOM_LOAI == $type_product->MANHOM_LOAI)
                    <option value="{{ $item->MANHOM_LOAI }}" selected>{{ $item->TENNHOM_LOAI }}</option>
                @endif
                <option value="{{ $item->MANHOM_LOAI }}">{{ $item->TENNHOM_LOAI }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Chọn sản phẩm làm Top mua sắm:</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="topmuasam" value="1" id="topmuasam" {{ $type_product->TOP_MUASAM == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="topmuasam">
                Top mua sắm.
            </label>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Thêm ảnh loại mặt hàng:</label>
        <input class="form-control" name="picture" type="file" required>
    </div>
@endif
