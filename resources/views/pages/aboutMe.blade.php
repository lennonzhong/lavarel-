@extends('pages/basePage')
@section('content')
    <div class="background">
        <img src="{{url('resources/views/pages/images/me.jpg')}}">
    </div>
@endsection
@section('contentBody')
    <section id="content">
        <div class="container">
            <p class="text-center"> Let me introduce myself.</p>
            <div class="personInfo col-lg-8 col-lg-offset-2">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="{{url('resources/views/pages/images/header.jpg')}}" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>Lorem ipsum Exercitation culpa qui dolor consequat exercitation fugiat laborum ex ea eiusmod ad do aliqua occaecat nisi ad irure sunt id pariatur Duis laboris amet exercitation veniam labore consectetur ea id quis eiusmod.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-2" id="Personskill">
                <div class="profile col-lg-5 ">
                    <h3>profile</h3>
                    <p>Lorem ipsum Qui veniam ut consequat ex ullamco nulla in non ut esse in magna sint minim officia consectetur nisi commodo ea magna pariatur nisi cillum.</p>
                    <ul class="profile-list">
                        <li>
                            <strong>FULLNAME:</strong><br>
                            <span>Lennon Zhong</span>
                        </li>
                        <li>
                            <strong>BIRTH DATE:</strong><br>
                            <span>June 3, 1995</span>
                        </li>
                        <li>
                            <strong>WEBSITE:</strong><br>
                            <span>blog.freezone.website</span>
                        </li>
                        <li>
                            <strong>EMAIL:</strong><br>
                            <span>804537383@qq.com</span>
                        </li>
                        <li>
                            <strong>Graduated School:</strong><br>
                            <span>ChengDu Neusoft</span>
                        </li>
                    </ul>
                </div>
                <div class="skill col-lg-5">
                    <h3>skill</h3>
                    <p>Lorem ipsum Qui veniam ut consequat ex ullamco nulla in non ut esse in magna sint minim officia consectetur nisi commodo ea magna pariatur nisi cillum.</p>
                    <ul class="profile-list">
                        <li>
                            <strong>HTML5:</strong><br>
                            <span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                              </div>
                            </div>
                            <div class="toolTip text-center" style=" top: -30px;left: 280px;">
                                <span>90%</span>
                            </div>
                        </span>
                        </li>
                        <li>
                            <strong>CSS3:</strong><br>
                            <span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                              </div>
                            </div>
                            <div class="toolTip text-center" style=" top: -30px;left: 140px;">
                                <span>50%</span>
                            </div>
                        </span>
                        </li>
                        <li>
                            <strong>JavaScript:</strong><br>
                            <span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                              </div>
                            </div>
                            <div class="toolTip text-center" style=" top: -30px;left: 200px;">
                                <span>70%</span>
                            </div>
                        </span>
                        </li>
                        <li>
                            <strong>JQuery:</strong><br>
                            <span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                              </div>
                            </div>
                            <div class="toolTip text-center" style=" top: -30px;left: 230px;">
                                <span>75%</span>
                            </div>
                        </span>
                        </li>
                        <li>
                            <strong>PHP:</strong><br>
                            <span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                              </div>
                            </div>
                            <div class="toolTip text-center" style=" top: -30px;left: 110px;">
                                <span>40%</span>
                            </div>
                        </span>
                        </li>
                        <li>
                            <strong>Java:</strong><br>
                            <span>
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                              </div>
                            </div>
                            <div class="toolTip text-center" style=" top: -30px;left: 80px;">
                                <span>30%</span>
                            </div>
                        </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="educateTree">
        <div class="container">
            <h1 class="text-center">More of my Education</h1>
            <p>Lorem ipsum Do commodo in proident enim in dolor cupidatat adipisicing dolore officia nisi aliqua incididunt Ut veniam lorem ipsum Consectetur ut in in eu do.</p>
            <div class="time-line-block col-lg-10 col-lg-offset-1">
                <div class="col-lg-5 text-right">
                    <h3>大学一年级</h3>
                    <p>2014-08-30</p>
                </div>
                <div class="col-lg-5 text-left">
                    <h3>University of Life</h3>
                    <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet est occaecat nisi.</p>
                </div>
            </div>
            <div class="time-line-block col-lg-10 col-lg-offset-1">
                <div class="col-lg-5 text-right">
                    <h3>大学一年级</h3>
                    <p>2014-08-30</p>
                </div>
                <div class="col-lg-5 text-left">
                    <h3>University of Life</h3>
                    <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet est occaecat nisi.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('resources/views/pages/js/index.js')}}"></script>
    <script src="{{url('resources/views/pages/js/about.js')}}"></script>
    @endsection
