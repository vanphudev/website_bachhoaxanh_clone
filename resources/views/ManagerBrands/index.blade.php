@extends('Admin.layouts.layouts-Brands')
@section('content')
    <h3 style="margin-bottom: 20px;">Thương hiệu</h3>
    <div class="col-12" style="">
        <div class="mb-3" style="width: 500px; float: left;">
            <input type="text" class="form-control" placeholder="Theo mã, tên thương hiệu...">
        </div>

        <div style="display: flex; flex-wrap: wrap; float: right;">
            <a class="btn btn-success" href="" style="margin-right: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256" style="fill:#000000;">
                    <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <g transform="scale(4,4)">
                            <path
                                d="M28.01758,5.51758l-1.00586,0.00781c-0.674,0.029 -1.35048,0.08355 -2.02148,0.18555c-5.392,0.76 -10.35475,4.14431 -13.09375,8.94531c-1.38,2.391 -2.2092,5.11863 -2.4082,7.89063l-0.04297,1.02344l-0.01953,0.8457l-0.03906,1.68945l-0.07617,3.37891l-0.28711,12.51563h-6.02344l10,14l10,-14h-6.02344l-0.28711,-12.51562l-0.14062,-6.57812c0.039,-1.727 0.46091,-3.443 1.25391,-5c1.576,-3.124 4.66927,-5.51441 8.19727,-6.19141c0.44,-0.091 0.88694,-0.14836 1.33594,-0.19336l1.52539,-0.07617l3.37891,-0.14844l6.75977,-0.29687v-5l-6.75781,-0.29687l-3.37891,-0.14844zM51,8l-10,14h6.02344l0.28711,12.51563l0.14063,6.57813c-0.039,1.727 -0.46091,3.443 -1.25391,5c-1.576,3.124 -4.66927,5.51441 -8.19727,6.19141c-0.44,0.091 -0.88694,0.14836 -1.33594,0.19336l-1.52539,0.07617l-3.37891,0.14844l-6.75977,0.29688v5l6.75781,0.29688l3.37891,0.14844l0.8457,0.03711l1.00586,-0.00781c0.674,-0.029 1.35048,-0.08355 2.02148,-0.18555c5.392,-0.76 10.35475,-4.14431 13.09375,-8.94531c1.38,-2.391 2.2092,-5.11863 2.4082,-7.89062l0.04297,-1.02344l0.01953,-0.8457l0.03906,-1.68945l0.07617,-3.37891l0.28711,-12.51562h6.02344z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
            <a class="btn btn-success" href="" style="margin-right: 20px;">
                <Span>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,256,256" style="fill:#000000;">
                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <g transform="scale(10.66667,10.66667)">
                                <path
                                    d="M12,2c-5.523,0 -10,4.477 -10,10c0,5.523 4.477,10 10,10c5.523,0 10,-4.477 10,-10c0,-5.523 -4.477,-10 -10,-10zM16,13h-3v3c0,0.552 -0.448,1 -1,1v0c-0.552,0 -1,-0.448 -1,-1v-3h-3c-0.552,0 -1,-0.448 -1,-1v0c0,-0.552 0.448,-1 1,-1h3v-3c0,-0.552 0.448,-1 1,-1v0c0.552,0 1,0.448 1,1v3h3c0.552,0 1,0.448 1,1v0c0,0.552 -0.448,1 -1,1z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </Span>
                Thêm mới
            </a>
        </div>

        <table id="table" class="table table-hover table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Mã Thương Hiệu</th>
                    <th scope="col">Tên Thương Hiệu</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Mô Tả</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <tr>
                    <td>NV000001</td>
                    <td>Nguyễn Văn A</td>
                    <td>
                        <img style="width: 60px; margin: auto" src="{{ env('PATH_IMAGE_PRODUCT_AVT') }}sanpham1.png" alt="" />
                    </td>
                    <td>mô tả ...</td>
                    <td>
                        <a class="btn btn-primary text-center" href="" style="margin-right: 20px; margin-bottom: 0">
                            <img width="24px"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABeklEQVR4nNXVsU5UURDG8YUeYzB0JBRLQ8IWvIDB2oaEBxALCqx4AunhAQy9UqpZTCwo7E2goHMLDFiQQIkkFpifmTjKzXrv7mEDMUxymrln/t+c79y5t9W6D4FpbGMHC7cNn8U3fMc5LvGkbuM4VtHFXmW9x6MGeDvhZ+hgCocpstAP3/U7eiUCruER65X8VAq+rm6OziPWCm1p4yRBB/iBp/msk3a9qhaELb0R4B08xOcUWc98nGy6WvQp1k3hret8iOynCwGf7S8cKqABXrHlT+ftuuKBApjB1wb4HE5rOy8RwAMc5fGXGjo/qe28UGADVzlEfy0ohg8SyPk4xgfMV3xeKoYPEVisWpNdx0kUw4cIbOECk1jGR/zMO6mFx9T/M/kDBN7lVMa3Rb5JLzExoNkY2m6pwDzeYhOP405GcqN0kkvivwns4MstCfSC1598fpPPdVPgRXKe1Q1Ut+GHs1e4oi4iOGN16mNYSbtGEXgTndfC7zJ+AQTYPuOM4fZdAAAAAElFTkSuQmCC">

                        </a>
                        <a class="btn btn-danger text-center" href="#" style="margin-bottom: 0">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABPElEQVR4nO2UsUpDQRBFo5b5gnSmipUWGjv9gQhqkUIbsVEbS2Ot2ESIhXZqGVEERdIEWxtBu2Bv8APSpFQ4snAXh0B0dw2pcmF4y8zcOY9ldzOZkf4rYAI4ATr8yK1rwPggADv019YgAHUNewHKCrd2qqcMXAW6xKsLLIcALkjXeQggDzSMqQHc9onevsnQbSoaYx7YBWaBFcWccq7mNR80XIApY5wG3oAD8+eHys2YvkIMIGeMC8ArUDWAY+UWTV8uBpA1xhLwBJwawJlyS6YvGwMYAz5lXAMedbo84FK5dfV8OU8wQBD/NGwDD7pwHnClnL/lnajhArRlrgA3wJ0B3APXwL563lMALZmPtNdlff26pJpTKwXQlPnZvEG94WpOzRTApjkhf2kjGiBIBfj4ZbCr7SUNH2lo+gbukw7mXFPP3AAAAABJRU5ErkJggg==">
                        </a>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
@endsection
