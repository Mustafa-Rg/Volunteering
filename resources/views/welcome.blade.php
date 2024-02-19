<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>جسر العون</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body style="background-color: #eee;">
    
    <nav class="navbar navbar-expand-lg navo position-sticky container   sticky-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto links1">
                    <div class="sign">
                        <div class="sign-in" onclick="changeUrl ()"> انشاء حساب</div>
                        <div class="login" onclick="changeUrl2()"> التسجيل</div>
                    </div>
                    <div class="lonk">
                        <a class="  link-color  nav-link" href="#">تواصل معنا</a>
                        <a class="  link-color  nav-link" href="#">عنا</a>
                        <a class="  link-color  nav-link" href="#" onclick="changeUrlShow ()" >عرض الفرص</a>
                        <a class="  link-color  nav-link active" aria-current="page" href="index.html" onclick="changeUrlMain()">الرئيسية</a>
                    </div>
                </div>    
            </div>
            <a class=" logo navbar-brand" href="#">  <p class="fw-build fz-3"> جسر العون </p></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="top container">
        <div class="row">
            <div class="col-3">
                <div class="row ">
                    <div class="col-4 ss text-center ss1  " > <p>البحث</p></div>
                    <div class="text-center col-4 ss ss2" style="background-color: white; color: black; "> 
                    <p>الفلتره</p>
                    <i class="fa-solid fa-sliders"></i>
                    </div>

                </div>
            </div>
        <div class="col-3">
            <select name="" id="" class="select">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
                </select>
        </div>
            <div class="col-6 search">
                <input type="text" placeholder="ابحث" dir="rtl">
                <i class="fa-solid fa-magnifying-glass iconofseach"></i>
            </div>
        </div>
    </div>

    <div class="SHOW container">
        <!--A single post-->
        <div class="post " dir="rtl">
            <div class="post-head " >  
                <div class="volnteer">متطوع</div>
                <div class="hours" dir="rtl">20 ساعه / شهر </div>
            </div>
            <div class="post-duties">
                <h5>المهام و المسؤليات</h5> <br>
            <p>مساعدة قادة الكشافة والمرشدات في تنفيذ الأنشطة والبرامج.
                الإشراف على سلامة وأمن المشاركين في الأنشطة.
                تقديم الدعم اللوجستي والتنظيمي للفعاليات.
                المشاركة في التخطيط والتحضير للأنشطة والبرامج.
                نشر الوعي حول الكشافة والمرشدات في المجتمع.
                تمثيل المفوضية الليبية للكشافة والمرشدات في الفعاليات والمناسبات.
                أداء أي مهام أخرى حسب الحاجة.</p>
            </div>
            <hr>
            <div class="post-requirments">
                <h5>المؤهلات المطلوبه</h5>
                <p>الإلمام بحركة الكشافة والمرشدات وأهدافها.
                    القدرة على العمل الجماعي والتواصل الفعال.
                    روح المسؤولية والالتزام.
                    مهارات قيادية جيدة.
                    القدرة على العمل في بيئة متنوعة.
                    إتقان اللغة العربية</p>
            </div>
            <hr>
            <div class="post-extra"> 
                <p>نحن نبحث عن أشخاص متحمسين ومتفانين للعمل مع الشباب ومساعدتهم 
                على تحقيق إمكاناتهم الكاملة. إذا كنت مهتمًا بالتطوع مع المفوضية الليبية للكشافة 
                والمرشدات، فنحن ندعوك لتقديم طلبك.</p>
            </div>
            <hr>
            <div class="post-org">

                <img src="{{ asset('img/f12e4e537b73a8aeedd04db147e6bf73.png') }}" alt="">
                <div class="dtl">
                    <h5>مفوضيه الكشاف و المرشدات</h5>
                    <p><span> بنغازي</span></p>
                </div>
            </div>

            <div class="post-btn"> <button>نشر</button></div>
        </div>
    </div>

    <!--Link JS files -->
    <script src="{{ asset('js/new-bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/code.js') }}"></script>
</body>
</html>