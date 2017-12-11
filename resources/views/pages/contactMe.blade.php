@extends('pages/basePage')
@section('contentBody')
    <div class="content">
        <div class="container">
            <div class="row">
                <h3>联系管理员&nbsp;&nbsp;|&nbsp;&nbsp;<span>contact us</span> </h3>
                <div class="col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1">
                    <form>
                        <h3>Contact From</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg"  id="name" placeholder="Enter name" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" id="email" placeholder="Enter Your Email" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="subject" id="subject" placeholder="Subject" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control" rows="4" cols="25" required="required" placeholder="Message" style="height: 190px;"></textarea>
                                </div>
                                <button type="button" class="btn col-md-12" id="submitcontact">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('resources/views/pages/js/index.js')}}"></script>
    <script>
        $(function () {
            $('#submitcontact').on("click",function () {
                $.ajax({
                    url: '/graduateDesign/user/email',
                    type: 'post',
                    data: {
                        'from': $('#name').val(),
                        'email': $('#email').val(),
                        'subject': $('#subject').val(),
                        'msg':$('#message').val(),
                    }
                })
                    .done(function(data) {
                        $('#name').html('');
                        $('#email').html('');
                        $('#subject').html('');
                        $('#message').html('');
                        alert(data);
                    })
            })
        })
    </script>
@endsection
