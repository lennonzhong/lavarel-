@extends('pages\basePage')
@section('content')
    <div class="topbanner">
        <img src="{{asset('resources/views/pages/images/replaybg.jpg')}}" alt="">
    </div>
    @endsection
@section('contentBody')
    <div id="replayContent">
        <div class="container">
            <div class="row">
                <div class="replay_add">
                    <textarea id="addreplay" placeholder="写来留言，或者提出你的疑问待人解决"></textarea>
                    <button class="btn btn-md btn-default sendReplay">发表</button>
                </div>
                <div class="replay_list">
                    @foreach($users as $key=>$user)
                        <div class="clearfix replay_item">
                            <div class="col-md-2 replay_icon">
                                <img src="{{url('resources/views/pages/images/'.$user->icon)}}">
                                <p class="text-center">{{$user->username}}</p>
                            </div>
                            <div class="col-md-8 replay_text">
                                <ul>
                                    @foreach($data[$key] as $dt)
                                        <li>
                                            <div class="col-md-2 text-right">{{$dt->sender}}&nbsp;说:</div>
                                            <div class="col-md-offset-2">
                                                {{$dt->content}}
                                                <p class="text-left" style="font-size: 12px">{{$dt->time}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                {{--内容框--}}
                                <div class="replayOp">
                                    <button class="btn btn-sm btn-default" onclick="TargetReplay({{$key}},{{$data[$key][count($data[$key])-1]->id}})">回复</button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteReplay({{$data[$key][count($data[$key])-1]->id}})">删除</button>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $replay->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('resources/views/pages/node_modules/jquery/dist/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('resources/views/org//layui/css/layui.css')}}">
<script src="{{asset('resources/views/org/layui/layui.js')}}"></script>
<script>
    $(function () {
        $(".sendReplay").on("click",function () {
            var content= $('#addreplay').val();
            if(content){
                $.ajax({
                    url: '/graduateDesign/addReplay',
                    type: 'post',
                    data: {
                        "parent_id":0,
                        "son_id":0,
                        "content": content,
                        "time": getTime(),
                        "replay_order":getOrder()
                    }
                })
                    .done(function(data) {
                        layui.use('layer', function () {
                            if (data.status) {
                                layer.msg(data.msg, {
                                    offset: [
                                        500,
                                        $(window).width()/2
                                    ],
                                    icon: 1,
                                    time: 1200
                                });
                            } else {
                                layer.msg(data.msg, {
                                    offset: [
                                        500,
                                        $(window).width()/2-100
                                    ],
                                    icon: 2,
                                    time: 1200
                                });
                            }
                            setTimeout(function () {
                                window.location.href = window.location;
                            },1200);
                        });
                    })
            }
           else{
                layui.use('layer', function () {
                    layer.msg('评论不能为空...',{
                        offset: [
                            500,
                            $(window).width()/2-100
                        ],
                        icon: 2,
                        time: 1200
                    });
                })
            }
        })
    })
    
    function deleteReplay(id) {
        layui.use('layer', function () {
            var layer = layui.layer;
            layer.confirm('您确定删除吗？', {
                btn: ['确定', '取消'],
                offset: [
                    400,
                    $(window).width()/2-100
                ]
            }, function () {
                $.ajax({
                    url: '/graduateDesign/replay/delete',
                    type: 'post',
                    data: {
                        "id": id
                    }
                })
                    .done(function (data) {
                        if (data.status) {
                            layer.msg(data.msg, {
                                icon: 1,
                                time: 1200
                            });
                        } else {
                            layer.msg(data.msg, {
                                icon: 2,
                                time: 1200
                            });
                        }
                        setTimeout(function () {
                            window.location.href = window.location;
                        },1200);
                    })
            }, function () {
                layer.msg('未做任何操作', {
                    icon: 1,
                    time: 1000
                });
            });
        })
    }

    function TargetReplay(index,id) {
        console.log(index);
        console.log(id);
        var str='';
            str+='<div class="replayToPerson">';
            str+='<textarea style="width: 100%;height: 80px" class="replayContent"></textarea>';
            str+='<button class="btn btn-md btn-default sendTo">发送回复</button>';
            str+='<button class="btn btn-md btn-danger cancelReplay" style="margin-left: 20px">取消</button>';
            str+='</div>';
        $('.replayToPerson').remove();
        $('.replay_text:eq('+index+')').append(str);
        $('.cancelReplay').on("click",function () {
            $('.replayToPerson').css({
                "display":"none"
            })
        });

        $('.sendTo').on("click",function () {
            var content=$('.replayContent').val();
            if (content==''){
                layui.use('layer', function () {
                    layer.msg('回复内容不为空...',{
                        offset: [
                            400,
                            $(window).width()/2-100
                        ],
                        icon: 2,
                        time: 1000
                    });
                })
            }else{
                $.ajax({
                          url: '/graduateDesign/replay/addReplay',
                          type: 'post',
                          data: {
                              id:id,
                              time:getTime(),
                              replay_order:getOrder(),
                              content: content
                          }
                      })
                      .done(function(data) {
                          if (data.status==1){
                              layui.use('layer', function () {
                                  layer.msg(data.msg,{
                                      offset: [
                                          400,
                                          $(window).width()/2-100
                                      ],
                                      icon: 1,
                                      time: 1000
                                  });
                              })
                              setTimeout(function () {
                                  window.location=window.location;
                              },1100);
                          }else{
                              layui.use('layer', function () {
                                  layer.msg('回复内容不为空...',{
                                      offset: [
                                          400,
                                          $(window).width()/2-100
                                      ],
                                      icon: 2,
                                      time: 1000
                                  });
                              })
                          }
                      })
            }
            $('.replayToPerson').remove();
        })
    }

    function getTime() {
        var time;
        var date=new Date();
        time= date.getFullYear()+'/';
        time+= (date.getMonth()+1)>9 ? (date.getMonth()+1)+'/': '0'+(date.getMonth()+1)+'/';
        time+= date.getDate()>9?date.getDate()+' ':'0'+date.getDate()+' ';
        time+=date.getHours()>9?date.getHours()+':':'0'+date.getHours()+':';
        time+=date.getMinutes()>9?date.getMinutes()+':':'0'+date.getMinutes()+':';
        time+=date.getSeconds()>9?date.getSeconds()+'':'0'+date.getSeconds()+'';
        return time;
    }
    function getOrder() {
        var time;
        var date=new Date();
        time= date.getFullYear()+'';
        time+= (date.getMonth()+1)+'';
        time+= date.getDate()+'';
        time+=date.getHours()+'';
        time+=date.getMinutes()+'';
        time+=date.getSeconds()+'';
        time+=date.getMilliseconds()+'';
        return time;
    }
</script>