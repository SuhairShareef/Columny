<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>News Website</title>
</head>

<body>
    <div class="container" style="height:fit-content">

        <div class="row header" style="height:13%">
            <div class="logo col-md-4 h-100">
                <img class="img-fluid h-100" id="logo" src="assets/img/shasha_logo.png" alt="">
            </div>
            <div class="ad-top col-md-8 h-100 mr-right">
                <img class="img-fluid ad1" style="padding:10px" id="ad1" src="assets/img/ad2.png" alt="">
            </div>

        </div>
        <div class="row" style="height:fit-content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-right">
                        <li class="nav-item active">
                            <a class="nav-link pull-right" href="#">الرئيسية<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">أهم الأخبار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">عالمي وعربي</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">أخبار فلسطين</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ترفيه
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">صحة وحياة</a>
                                <a class="dropdown-item" href="#">علوم وتكنولوجيا</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">ادم وحواء</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">منوعات وفن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">مقالات</a>
                        </li>
                    </ul>
                    <form class="form-inline mr-auto my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="البحث" aria-label="Search">
                        <button class="btn btn-danger my-2 my-sm-1" type="submit">hhh</button>
                    </form>
                </div>
            </nav>
        </div>

        <div class="row marquee" style="height:fit-content">
            <div class="alert alert-danger alert-dismissible col-md-12" role="alert">
                <strong>
                    <marquee direction="right">
                        – الرئيس يصدر توجيهاته بأهمية العمل الحثيث على تطبيق أحكام القانون وملاحقة المخالفين
                        لتدابير الطوارئ
                        &emsp; &emsp; &emsp; &emsp;
                        – غيث: الاحتلال يضع العراقيل أمام أي عمل من طرفنا
                        &emsp; &emsp; &emsp; &emsp;
                        – تسجيل 13 إصابة جديدة بـ”كورونا”.. و31 وفاة في صفوف ابناء الجاليات الفلسطينية بالعالم
                    </marquee>
            </div>
        </div>
        <div class="row main-content" style="fit-content">
            <div class="main-news col-md-8 h-100">
                <div class="row" style="{height:12.5%; padding:10px}">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row left" style="margin:10px 0">
                    <a href="#" class="col-md-8 feature" style="background-image: url('assets/img/feature.jpg')">
                        <h4 class="feature-title">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</h4>
                    </a>
                    <div class="most-recent col-md-4">
                        <a href="#" class="row recent h-25">
                            <img class="recent-pic col-md-4 img-fluid" src="assets/img/2.jpeg">
                            <div class="title col-md-8">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                        </a>
                        <hr>
                        <a href="#" class="row recent h-25">
                            <img class="recent-pic col-md-4 img-fluid" src="assets/img/3.jpeg">
                            <div class="title col-md-8">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                        </a>
                        <hr>
                        <a href="#" class="row recent h-25">
                            <img class="recent-pic col-md-4 img-fluid" src="assets/img/4.jpeg">
                            <div class="title col-md-8">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                        </a>
                        <hr>
                        <a href="#" class="row recent h-25">
                            <img class="recent-pic col-md-4 img-fluid" src="assets/img/feature.jpg">
                            <div class="title col-md-8">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                        </a>
                    </div>
                </div>
                <div class="row" style="height:15%">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row buttom-news" style="height:25%">
                    <a href="#" class="row recent col-md-3">
                        <img class="recent-pic img-fluid h-75" src="assets/img/2.jpeg">
                        <div class="title h-25">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                    </a>
                    <hr>
                    <a href="#" class="row recent col-md-3">
                        <img class="recent-pic img-fluid h-75" src="assets/img/3.jpeg">
                        <div class="title h-25">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                    </a>
                    <hr>
                    <a href="#" class="row recent col-md-3">
                        <img class="recent-pic img-fluid h-75" src="assets/img/4.jpeg">
                        <div class="title h-25">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                    </a>
                    <hr>
                    <a href="#" class="row recent col-md-3">
                        <img class="recent-pic img-fluid h-75" src="assets/img/feature.jpg">
                        <div class="title h-25">إسرائيل تبدأ بتخزين 'العلاج المعجزة' لفيروس كورونا</div>
                    </a>
                </div>
            </div>
            <div class="suggestions col-md-4 h-100">
                <div class="row">
                    <img class="col-md-12 live" src="assets/img/live.png" alt="">
                </div>
                <div class="row">
                    <img class="col-md-12 ad2" src="assets/img/ad3.png" alt="">
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>