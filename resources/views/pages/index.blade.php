@extends('pages/basePage')
@section('content')
    <div id="mySlider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{url('resources/views/pages/images/slider/1.jpg')}}" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="{{url('resources/views/pages/images/slider/2.jpg')}}" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="{{url('resources/views/pages/images/slider/3.jpg')}}" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#mySlider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#mySlider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @endsection
@section('contentBody')
    <script>
        $(function () {
            setInterval(function () {
                $('.right').click();
            },2000);
        })
    </script>
    @endsection
