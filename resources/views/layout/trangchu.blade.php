<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cổng TTĐT Sở Tư Pháp Hà Tĩnh</title>
    <!--  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- font-google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <!-- taiwind css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css" integrity="sha512-wl80ucxCRpLkfaCnbM88y4AxnutbGk327762eM9E/rRTvY/ZGAHWMZrYUq66VQBYMIYDFpDdJAOGSLyIPHZ2IQ==" crossorigin="anonymous" />

    <!-- owl carousel -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <script src="/js/owlcarousel/owl.carousel.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> -->
    <script type="text/javascript" src="https://sites.google.com/site/iristipsblogger/file/hoamai-hoadao.js"></script>
    <!-- css -->
    <link href="/css/index.css" rel="stylesheet">
    <link href="/css/repon.css" rel="stylesheet">

    <!-- <style>
        .owl-item {
            height: 600px;
        }

        .item {
            height: 650px;
        }
    </style> -->

</head>

<body class="  w-full mx-auto  shadow-xl" style="background-color: #a7cdd3; ">
    <div class="bg-white lg:px-4 sm:w-full">
        <header>

            
            <div class="sm:block hidden" style="background-image: url('/images/banner-so-yu-phap-xhuan.png'); height: 220px; width: 100%; background-size: cover;">
            </div>
            <div class="w-full mx-auto ">
                
                <!-- menu mobile -->
                <div class="sidebar w-full flex mb-4 mx-auto text-white lg:justify-center sm:flex justify-end   " id='menu'>

                    <nav class="mr-4 lg:mr-0">
                        <ul class="mx-auto set-menu">
                            <li><a href="/" class="text-white">
                                    <i class="fas fa-home"></i>
                                </a></li> 
                            @foreach ($danhmuc as $dm)
                            <li>
                                @if($dm['loaidanhmuc_id'] == 3 || $dm['loaidanhmuc_id'] == 1)
                                <a href="#" class="text-white font-bold" style="font-size: 16px;">{{$dm['label']}} </a>
                                @else
                                <a href="/danh-muc/{{$dm['slug']}}" class="text-white font-bold">{{$dm['label']}}</a>
                                @endif
                                @if ($dm['kiemtra']==1)
                                @include('layout.childmobile', ['danhmuc' => $dm['children']])
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <div class="icon">
                            <i class="fas fa-bars"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        @yield('content')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var nut = document.querySelector('div.icon i');
                var mobile = document.querySelector('ul');
                nut.addEventListener('click', function() {
                    mobile.classList.toggle('active');
                })
            })
        </script>
        <footer class="footer text-white mt-4 pl-2 pt-8 pb-2" style="background-color:#215bac;">
            <div class=" mx-auto">
                <div class="font-bold text-xl text-white">
                    CỔNG THÔNG TIN ĐIỆN TỬ SỞ TƯ PHÁP HÀ TĨNH
                </div>
                <div class="text-white">
                    Email: sotuphap@hatinh.gov.vn - Website: http://dancaxunghe.vn - fanpge: dancaxunghe.vn
                </div>
                <div class="text-white">
                    Địa chỉ: Số 92, đường Phan Đình Phùng, thành phố Hà Tĩnh, tỉnh Hà Tĩnh
                </div>
                <div class="text-white">
                    Điện thoại/ Fax: 0239.3856654
                </div>
                <div class="text-white">
                Ghi rõ nguồn Cổng thông tin điện tử Sở Tư pháp (http://tuphap.hatinh.gov.vn/) khi trích dẫn lại tin từ địa chỉ này.
                </div>
            </div>
        </footer>
    </div>
    <script type="text/javascript" src="./js/hoamai-hoadao.js"></script>
</body>

</html>