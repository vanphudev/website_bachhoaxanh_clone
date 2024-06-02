<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="m-0" target="_blank">
            <img src="https://static.ybox.vn/2021/5/3/1621424753923-Logo%20chuan-7%20copy.jpg" style="width: 60px; height: 60px; border-radius: 50%" />
            <span class="ms-1 font-weight-bold">ADMIN MANAGER</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}" href="{{ route('Dashboard') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Nghiệp Vụ</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active == 'product' ? 'active' : '' }}" href="{{ route('ManagerProducts') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAABGElEQVR4nN3UwSrEURQG8F9CwsoTkGSlbCw8hR3lBaSJpbWwkJSNGmxshGxYyQPYISsWSpQkCyJKYuavqbOYxphm/iMLp766595zvnvvd78u3+MUSQ3IIaNCJCmwWgvhfMl6C+7qIXzBcRHO6j1h8ttXTv4/YS4FYbYSYSZ2rBZZ9PuLaMc4DnCCPQyVqRuMtV30YATdxQWFZAlPP+gzh0Z0YA35MPcyHvGJBUxhuED4UIXo99jHFhZDu8L8OWZxG/m1OF0tL5qPnpXYIAm8x/V14uOH5k2sYwM7gRmM4aao7gh9xTpupzT0G6bRVPpyA1FwGRpdVUF2iN5KthlFa4ybMVHm3yvgFZNoSOPNtrDDBZ5Dw65KHV9q4uVuom4jSQAAAABJRU5ErkJggg==">
                    </div>
                    <span class="nav-link-text ms-1">Sản Phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active == 'Typeproduct' ? 'active' : '' }}" href="{{ route('ManagerTypeProduct') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAABGElEQVR4nN3UwSrEURQG8F9CwsoTkGSlbCw8hR3lBaSJpbWwkJSNGmxshGxYyQPYISsWSpQkCyJKYuavqbOYxphm/iMLp766595zvnvvd78u3+MUSQ3IIaNCJCmwWgvhfMl6C+7qIXzBcRHO6j1h8ttXTv4/YS4FYbYSYSZ2rBZZ9PuLaMc4DnCCPQyVqRuMtV30YATdxQWFZAlPP+gzh0Z0YA35MPcyHvGJBUxhuED4UIXo99jHFhZDu8L8OWZxG/m1OF0tL5qPnpXYIAm8x/V14uOH5k2sYwM7gRmM4aao7gh9xTpupzT0G6bRVPpyA1FwGRpdVUF2iN5KthlFa4ybMVHm3yvgFZNoSOPNtrDDBZ5Dw65KHV9q4uVuom4jSQAAAABJRU5ErkJggg==">
                    </div>
                    <span class="nav-link-text ms-1">Loại mặt hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active == 'Employees' ? 'active' : '' }}" href="{{ route('ManagerEmployees') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAABXUlEQVR4nNWTQSuEYRDHfxKliNA6LFFOSsmBqxS58CEckHLzAVxcNjcXdxdFOQipLe3FN+CwJ2ySFotasZFXo3k1Tc+u141/TT0z85//O88888J/Qj+QAcrACTBYgzsGnCo3A7R5wgzwDkTGzoC6gFgzcO+4B56UdQSxY6ARaAXGgRHldgMXjvvsBc8d4Q5o185LJr4DDAEDQMXEb73gtRPcAJqAx0Dnl0A9sGdiRS9YdEXLwHBALLY+fYxIbd2KtQBvrmAN6AjExV61+031S0DaCkpyBcgBD0o60px/zXi+gn31t6mBnJKW1N8NCG5pLq/+jdmAb4wCh6boBZjWWT2ZuJx7gYnAh7Lx1eUBPgKEKyAFzJuYnDsDexipyRi+ZuITBWBW12PRxOXcAMwpJ3ImN6iKHmBV/4K4oKwxyf0KC7oe1fawopxE6PpBzO5jKongVAKx2CaT9fiX8AlHI7VGosZ1pwAAAABJRU5ErkJggg==">
                    </div>
                    <span class="nav-link-text ms-1">Nhân viên</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active == 'GroupTypeProduct' ? 'active' : '' }}" href="{{ route('ManagerGroupTypeProduct') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>box-3d-50</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(603.000000, 0.000000)">
                                            <path class="color-background"
                                                d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                            </path>
                                            <path class="color-background opacity-6"
                                                d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z">
                                            </path>
                                            <path class="color-background opacity-6"
                                                d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Nhóm loại mặt hàng</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ $active == 'Customers' ? 'active' : '' }}" href="{{ route('ManagerCustomers') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADfUlEQVR4nO2ZW4hOURTHf4x7IR6EEDNNiiIlI6WI5FbK5GmK1PAmlEuUcpvx4lIiSuFZeSDXMeQWIoXcJpT7NdPkEuN2tLROrVbfNzPf+fb5zNT8a/dN++zzX2udvfe6DbSjHa0GQ4FKYA8wwz3rBOwFLuvzhUA/WgE6AxXATSAy4xvQw6yb4p7L+A3UArOADv9D+fFAXQbFZLxQ42L0B95nWRsBV4ExhVR+JfAzw1c/ASwHBmR4pycwDVgDXAR+ufeFb2khlF/tBH8FNiY408OAncAPxydzqWGOE3YDKM2TcyRwy/FuIgX0BV4bIdeAXoG4ewDHDPcfYCaBsckI+JCCG+ymdyOW8UbvTRB0Ad4a8gUZzvM94L66zKQYBHw0cuRuBcFs92WsixQfXuPO8HFgYkL/vszwPAplwBZDut0pv7UJ//4cOAgsBibrTvXRDyBHRuLDcKAMmAdUA2fN++9CGXDekJab+R1O4bsaYaNA40AoAx4b0hIz/8XMH9GcZwSw292ZJOOS7lYQ1BtiS1oFfAJ2qfIWRcAEYAmwX93uQzXsm0bieuAVcBs4ClwxcuQjBIM9Fh1JD5ONHEkQg8FubZoYYOTITrU5A4qMHDliQbDBhfi0EZmxLl+yWY7wAumjzsn01V1OqHXRtTfpYwhwzsgVHRKjwRANpLD1daRDdEgMG6gk0SoUBhu5ktwlhs1LThTIiEHASSNXEsXEmJQhxEvkHEV4jHYFU+z1pudLvFaJLPE+wmOjkyFxYFUo8qku5w+WpxuUauPrun6gsQRGF03cYiMk62xzOGwMWE8bRLm7zLIrzQUlOXqNOdQBz/RCxyhTWZHynFY3G6S4X9TM+jMJi5lqw7Ezw3MxIkhn7k0zvaFcvnyk46nbgXHAS7fmez4G9FTFYzKptgqVhkeh+Coc2eI8BJboUWvQX1tzJ+FrMQ65zvL8BAK7AU/cuic6n7oBklrfcWFf2izdmxBYrQmiNAME1qvZMTfL+tBH8l8N+8AR2/zdC/ysf0tAFKzIYsCKLOuDGxB3rWuypL9eYJUqtbmFO1Dl1qdiQNxirNSqbU4TBnh0zXIHZD4TUjOAPAQW6w426G9xnnxB0WrjQEvhI3G9aw5v06iaa7TOKxLnAv9/g0jLxbiJ1ZhAeRmnCmXAYE28Go2Hij2MYGuOO9CoyheywdAOmsJfkb8LlPiKfZ0AAAAASUVORK5CYII=">
                    </div>
                    <span class="nav-link-text ms-1">Khách hàng</span>
                </a>
            </li> --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Hệ Thống</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/profile.html">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>customer-support</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(1.000000, 0.000000)">
                                            <path class="color-background opacity-6"
                                                d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                            </path>
                                            <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Thông tin cá nhân </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/sign-in.html">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>document</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(154.000000, 300.000000)">
                                            <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">LogOut</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
