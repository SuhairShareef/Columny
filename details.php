<?php 
session_start();
require_once('includes/config.php');

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/style.css">
    <link type="text/css" rel="stylesheet" href="assets/details.css">

    <link rel="shortcut icon" href="assets/img/tab-icon" type="image/x-icon" />

    <title>Details</title>

</head>

<body>
    <div class="container" style="height:fit-content">

        <!-- Header -->
        <?php include('includes/header.php');?>

        <!-- Navbar -->
        <?php include('includes/nav.php');?>

        <!-- Urgent Bar -->
        <?php include('includes/urgent.php');?>

        <!-- Main Content -->
        <div class="row main-content" style="fit-content">

            <!-- Home Page -->
            <div class="details main-news  col-md-8 h-100">
                <div class="row" style="{height:12.5%; padding:10px}">
                    <img class="col-md-12 ad2" src="assets/img/ad2.png" alt="">
                </div>
                <div class="row news-main-title">
                    رمضان استثنائي هذا العام لن يُمحى من ذاكرة المسلمين
                </div>
                <div class=" row news-img">
                    <img src="assets/img/74.jpeg" alt="" class="main-img img-fluid">
                </div>
                <div class="row news-date">
                    2020-04-20
                </div>
                <div class="row news-content">
                    شاشة نيوز: يبدو أن شهر رمضان لهذا العام لن يكون مثل الأعوام السابقة، وسط الأزمة التي يعيشها العالم
                    بسبب فيروس كورونا، ولن يمحى من ذاكرة المسلمين ولا صفحات التاريخ.

                    ويستعد المسلمون في كل أنحاء العالم لاستقبال الشهر الكريم خلال أيام معدودات، وسط جو من الكآبة غير
                    المسبوقة، يخفف من وطأتها اللجوء إلى تكثيف العبادات والدعاء إلى الله بزوال الجائحة والمرض.

                    فمن إلغاء ولائم الإفطار مع العائلة إلى تعليق الصلاة في المساجد وخاصة صلاة التراويح، إجراءات صارمة
                    فرضتها الحكومات للحد من انتشار الفيروس القاتل، بما في ذلك المفتي العام للسعودية الشيخ عبد العزيز آل
                    الشيخ.

                    وفرضت المملكة التي يزورها ملايين المسلمين سنويا لأداء العمرة ومناسك الحج، إجراءات وقائية صارمة للحد
                    من انتشار الوباء، تشمل منع التجمعات بما في ذلك صلاة الجماعة ومناسك العمرة.

                    وفي الأسابيع الماضية، بدا المسجد الحرام والكعبة التي لطالما اكتظت بعشرات آلاف من المصلين، شبه خاليين
                    من المصلين.

                    وقال مؤذن المسجد الحرام علي ملا "قلوبنا تبكي"، مضيفا "اعتدنا على ازدحام المسجد الحرام بالناس خلال
                    الليل والنهار وكل الأوقات". وتابع "شعرت بألم داخلي".

                    ولم تعلن السعودية حتى الآن عن قرار يتعلق بموسم الحج في يوليو المقبل، ولكن من المرجح أن يتم إلغاء
                    الموسم للمرة الأولى في التاريخ الحديث بسبب الفيروس.

                    وكانت السعودية طلبت في أواخر مارس الماضي من المسلمين التريث قبل إبرام عقود الحج والعمرة.

                    من جهته، أعلن مفتي القدس والديار الفلسطينية الشيخ محمد حسين أن صلاة التروايح ستكون أيضا في المنازل،
                    ودعا المواطنين إلى عدم تحري هلال رمضان هذا العام.

                    وتأتي هذه القيود استجابة لتوصيات منظمة الصحة العالمية التي حثت الدول الإسلامية على "إعادة النظر
                    جديا" في أي احتفالات دينية جماعية.

                    وهذا العام، قام الكثير من المسلمين بإعادة توجيه ميزانياتهم لشهر رمضان لشراء القفازات والأقنعة وغيرها
                    من أساليب الوقاية من الفيروس.

                    وفي إيران، الدولة الأكثر تضررا من فيروس كورونا في الشرق الأوسط، دعا المرشد الأعلى الإيراني آية الله
                    علي خامنئي الشعب إلى الصلاة في المنازل خلال شهر رمضان.

                    وقال إنه في غياب التجمعات العامة أثناء رمضان "ينبغي علينا ألا نهمل الصلاة والدعاء والتواضع في
                    وحدتنا".
                </div>
            </div>

            <!-- SideNav -->
            <?php include('includes/sidenav.php');?>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>