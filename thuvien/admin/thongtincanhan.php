<?php include('partials/menu.php'); ?>
<!-- Main contents starts -->
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0
        }

        .mySlides {
            display: none
        }


        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: black;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            color: white;
            background-color: pink;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px
            }
        }
    </style>
</head>

<body>

    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <div class="wrapper">
                <h1>Thông tin cá nhân</h1><br>
                <h2>Đề tài: Xây dựng trang web quản lí thư viện sử dụng PHP và MySQL</h2><br>
                <table class="info-member" style="width: 100%;" align="center" class="info">
                    <tr>
                        <td>Họ và tên: </td>
                        <td>Trần Khải Hoàn</td>
                    </tr>
                    <tr>
                        <td>MSSV: </td>
                        <td>59130790</td>
                    </tr>
                    <tr>
                        <td>Lớp học phần: </td>
                        <td>61.CNTT-2</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>hoan.tk.59cntt@ntu.edu.vn</td>
                    </tr>
                    <tr>
                        <td>Link git: </td>
                        <td><a href=""></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <div class="wrapper">
                <h1>Thông tin cá nhân</h1><br>
                <h2>Đề tài: Xây dựng trang web quản lí thư viện sử dụng PHP và MySQL</h2><br>
                <table class="info-member" style="width: 100%;" align="center" class="info">
                    <tr>
                        <td>Họ và tên: </td>
                        <td>Nguyễn Phan Hữu Thọ</td>
                    </tr>
                    <tr>
                        <td>MSSV: </td>
                        <td>61132696</td>
                    </tr>
                    <tr>
                        <td>Lớp học phần: </td>
                        <td>61.CNTT-2</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>tho.nph.61cntt@ntu.edu.vn</td>
                    </tr>
                    <tr>
                        <td>Link git: </td>
                        <td><a href=""></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <div class="wrapper">
                <h1>Thông tin cá nhân</h1><br>
                <h2>Đề tài: Xây dựng trang web quản lí thư viện sử dụng PHP và MySQL</h2><br>
                <table class="info-member" style="width: 100%;" align="center" class="info">
                    <tr>
                        <td>Họ và tên: </td>
                        <td>Phù Quốc Khánh</td>
                    </tr>
                    <tr>
                        <td>MSSV: </td>
                        <td>59131051</td>
                    </tr>
                    <tr>
                        <td>Lớp học phần: </td>
                        <td>61.CNTT-2</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>khanh.pq.59cntt@ntu.edu.vn</td>
                    </tr>
                    <tr>
                        <td>Link git: </td>
                        <td><a href=""></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)">1</span>
        <span class="dot" onclick="currentSlide(2)">2</span>
        <span class="dot" onclick="currentSlide(3)">3</span>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

</body>

</html>

<!-- Main contents ends -->
<?php include('partials/footer.php'); ?>