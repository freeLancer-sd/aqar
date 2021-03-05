@extends('themes.main')

@section('content')
    @push('css')
        <style>
            #map {
                height: 100%;
            }
        </style>
    @endpush
    <div class="container-fluid">
        <main role="main" class="pb-3">
            <section id="how-it-works">
                <div class="container">
                    <h2>ماذا ستجد في منصة العان </h2>
                    <div class="flex">
                        <div>
                            <span class="fas fa-home" action="link"> </span>
                            <h4>احجز استراحة </h4>
                            <p>استكشف الاستراحات والصالات المتاحة من العان </p>

                        </div>
                        <div>
                            <span class="fas fa-chart-line"></span>
                            <h4>اعلن عن عقارك</h4>
                            <p>العان ستمكنك من الوصول الي اكبر عدد من المستخدمين والمستثمرين في مجال العقار ممايفتح
                                امامك فرص اكثر وفي زمن اقل </p>
                        </div>

                        <div>
                            <span class="fas fa-dollar-sign"></span>
                            <h4>اشتري عقارك</h4>
                            <p>اغتنم افضل الفرص بمتابعة عروض العان العقاريه </p>
                        </div>

                        <div>
                            <span class="fas fa-home"></span>
                            <h4>ابحث عن عقارك </h4>
                            <p>يبدا المستقبل بايجاد الخيارات المناسبة لك . حيث ستجد مختلف الوحدات السكنية وبخيارات
                                متعددة ومنصةالعان ستساعدك في استكشاف هذه الخيارات </p>

                        </div>

                    </div>
                </div>
            </section>
            <!-- الاسلايدر الاول عروض البيع  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$    -->

            <div class="container row">
                <div class="col-md-8">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            @foreach($pays as $pay)
                                <div class="carousel-item " style="max-height:300px">
                                    <img src="{{$pay->images[0]->url}}" alt="Property 1"
                                         style="max-height:200px;width:400px"/>
                                    <div class="property-details">
                                        <p class="price">{{$pay->price}}</p>
                                        <span class="beds">{{$pay->price}}</span>
                                        <span class="baths">{{$pay->price}}</span>
                                        <span class="sqft">{{$pay->space}}</span>
                                        <address>
                                            480 12th, Unit 14, San Francisco, CA
                                        </address>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">السابق</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">التالي</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 class="text-warning text-right">عروض البيع</h1>
                    <p class="text-right">اطلع علي احدث العروض والفرص الاستثماريه والاراضي السكنية والمزارع وغيرها من
                        العقارات</p>
                </div>

            </div>
            <br/>
            <!-- الاسلايدر الثاني  عروض الايجار  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$    -->
            <div class="container row">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">
                    <h1 class="text-warning text-right">عروض الايجار</h1>
                    <p class=" text-right">تعرف علي افضل شركات ومكاتب التشيد والبناء والمقاولات </p>
                </div>

            </div>

            <!-- الاسلايدر الثالث   الاعلانات  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$    -->
            <section id="properties">
                <div class="container">
                    <h2>الــعروض</h2>
                    <div id="properties-slider" class="slick">
                        <div>
                            <img src="img/loginbg.jpeg" alt="Property 1"/>
                            <div class="property-details">
                                <p class="price">$3,400,000</p>
                                <span class="beds">6 beds</span>
                                <span class="baths">4 baths</span>
                                <span class="sqft">4,250 sqft.</span>
                                <address>
                                    480 12th, Unit 14, San Francisco, CA
                                </address>
                            </div>
                        </div>

                        <div>
                            <img src="img/loginbg.jpeg" alt="Property 1"/>
                            <div class="property-details">
                                <p class="price">$3,400,000</p>
                                <span class="beds">6 beds</span>
                                <span class="baths">4 baths</span>
                                <span class="sqft">4,250 sqft.</span>
                                <address>
                                    480 12th, Unit 14, San Francisco, CA
                                </address>
                            </div>
                        </div>

                        <div>
                            <img src="img/loginbg.jpeg" alt="Property 1"/>
                            <div class="property-details">
                                <p class="price">$3,400,000</p>
                                <span class="beds">6 beds</span>
                                <span class="baths">4 baths</span>
                                <span class="sqft">4,250 sqft.</span>
                                <address>
                                    480 12th, Unit 14, San Francisco, CA
                                </address>
                            </div>
                        </div>

                        <div>
                            <img src="img/loginbg.jpeg" alt="Property 1"/>
                            <div class="property-details">
                                <p class="price">$3,400,000</p>
                                <span class="beds">6 beds</span>
                                <span class="baths">4 baths</span>
                                <span class="sqft">4,250 sqft.</span>
                                <address>
                                    480 12th, Unit 14, San Francisco, CA
                                </address>
                            </div>
                        </div>

                        <div>
                            <img src="img/loginbg.jpeg" alt="Property 1"/>
                            <div class="property-details">
                                <p class="price">$3,400,000</p>
                                <span class="beds">6 beds</span>
                                <span class="baths">4 baths</span>
                                <span class="sqft">4,250 sqft.</span>
                                <address>
                                    480 12th, Unit 14, San Francisco, CA
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class=" text-center ">
                        <a class="btn btn-warning text-white">الاعلانات العــــــــروض</a>
                    </div>
                </div>
            </section>
            <!-- قسم لماذا العان العقاري    $$$$$$$$$$$$$$$$$$$$$$$$$$$$$    -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-right">لماذا العان العقاريه </h2>
                        <p class="large-paragraph text-right">الإدارة الحديثة تعتمد على الدراسة والدراية بتقنية
                            المعلومات وتوظيفه في مجال العقاروادارة الاملاك والخبرة والإستراتيجية السليمة والكوادر
                            التسويقية المدربة واختيار العميل بعناية </p>
                        <p class="description text-right">
                            تمتلك منصة العان بفضل الله فريق متكامل ذو خبرة سابقة في حركة السوق تمكنهم من تقديم المشورة
                            المناسبة وذلك من خلال هذه القيم
                        </p>
                        <ul class="list-group  btn-outline-warning">
                            <li class="list-group-item text-right">المصداقيه</li>
                            <li class="list-group-item text-right">الشفافيه</li>
                            <li class="list-group-item text-right">المهنيه</li>
                            <li class="list-group-item text-right">مواكبه التقنيه</li>
                            <li class="list-group-item text-right">الريادة</li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-center">
                        <img style="height:100%;width:100%" src="img/Emara 6.jpg"/>
                    </div>
                </div>
            </div>
            <!-- قسم خدمات العان  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$    -->
            <section id="services">
                <div class="container">
                    <h2>خدمـات العـان</h2>
                    <div class="flex">
                        <div>
                            <div class="fas fa-home"></div>
                            <div class="services-card-right">
                                <h3 class="text-right">عروض الايجار</h3>
                                <p class="text-right"> حيث ستجد مختلف الوحدات السكنية وبخيارات متعددة ومنصةالعان ستساعدك
                                    في استكشاف هذه الخيارات </p>
                                <a class="btn btn-outline-warning text-right"> استكـشـف...</a>
                            </div>
                        </div>

                        <div>
                            <div class="fas fa-dollar-sign"></div>
                            <div class="services-card-right">
                                <h3 class="text-right">اشتري عقارك</h3>
                                <p class="text-right">يبدا المستقبل بايجاد الخيارات المناسبة لك والتعرف علي اخر العروض
                                    المتوفرة </p>
                                <a class="btn btn-outline-warning text-right"> استكـشـف... </a>
                            </div>
                        </div>

                        <div>
                            <div class="fas fa-chart-line"></div>
                            <div class="services-card-right">
                                <h3 class="text-right">اعلن عن عقار</h3>
                                <p class="text-right">اعلن عن عقارك معنا للوصول لاكبر عدد من المستثمرين </p>
                                <a class="text-right btn btn-outline-warning"> استكـشـف... </a>
                            </div>
                        </div>

                        <div>
                            <div class="fas fa-building"></div>
                            <div class="services-card-right">
                                <h3 class="text-right">مكاتب العقارات</h3>
                                <p class="text-right ">يمكنك الاطلاع علي مكاتب العقار وشركاء العان في منطقتك </p>
                                <a class="text-right btn btn-outline-warning">استكـشـف ...</a>
                            </div>
                        </div>

                        <div>
                            <div class="fas fa-search"></div>
                            <div class="services-card-right">
                                <h3 class="text-right">البحث بالخريطة</h3>
                                <p class="text-right">للوصول السريع للعروض المتوفرة يمكنك الاستعراض عن طريق الخري</p>
                                <a class="text-right btn btn-outline-warning"> استكـشـف...</a>
                            </div>
                        </div>

                        <div>
                            <div class="fas fa-building"></div>
                            <div class="services-card-right">
                                <h3 class="text-right">شركات البناء والتشيد</h3>
                                <p class="text-right">استكشف افضل واكبر شركات مواد البناء في منطقتك </p>
                                <a class="text-right btn btn-outline-warning">استكـشـف...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- قسم عن العان  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$    -->
            <section id="aboutElaan">
                <div class="col card  border-warning">
                    <div class="row no-gutters">
                        <div class="col-md-4 ">
                            <img src="img/alaannew.jpg" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item text-right active">
                                            <h1>رؤية العان </h1>
                                            <br/><br/>
                                            <p class="text-dark font-weight-normal lead">منصة العان العقاري رائدة في
                                                تقديم الخدمات العقارية بمهنية ومصداقية فيها من الشفافية لتحقيق أقصى
                                                درجات الرضى لدى العملاء وتسعى بمواكبة التقنيه في مجال العقار العالمي
                                                لتحقيق الهدف المرضي والمواكب لعصرنا ورؤية ٢٠٣٠</p>

                                        </div>
                                        <div class="carousel-item text-right">
                                            <h1>التسويق العقاري</h1>
                                            <br/><br/>
                                            <p class=" text-dark font-weight-normal lead">

                                                التسويق هو دراسة السوق العقاري واحتياجاته وإعداد الأسس السليمة التي
                                                تتناسب مع المنتج المراد تسويقه.

                                            </p>

                                        </div>
                                        <div class="carousel-item text-right">
                                            <h1> إدارة الأمــلاك والممتلكات </h1>
                                            <br/><br/>
                                            <p class="text-dark font-weight-normal lead ">
                                                الإدارة الحديثة تعتمد على الدراسة والدراية بتقنية المعلومات وتوظيفه في
                                                مجال العقاروادارة الاملاك والخبرة والإستراتيجية السليمة والكوادر
                                                التسويقية المدربة واختيار العميل بعناية
                                            </p>


                                        </div>
                                        <div class="carousel-item text-right">
                                            <h1> التواصل الفعال </h1>
                                            <br/><br/>
                                            <p class=" text-dark font-weight-normal lead">

                                                منصة العان تفخر بكل عملائها من مؤسسات وشركات وافراد وتحتفظ بكل عناوينهم
                                                للتواصل معهم من خلال البريد او عن طريق رسائل SMS او بوسائل الاتصال من
                                                واتس اب
                                            </p>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>



        </main>
    </div>

@endsection
@push('scripts')
    <script src="{{asset('js/home.js')}}"></script>
    <script src="{{asset('js/map.js')}}"></script>
@endpush
