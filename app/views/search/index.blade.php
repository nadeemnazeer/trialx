<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TrialX</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

  
      {{HTML::style('css/jquery.fancybox.css')}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    .btn-cstm{
        cursor: default; 

           }
    .circle{
        width: 90px; 
        height: 90px;
        line-height: 90px;
        background:url(images/circle2.png) no-repeat;
        display: block;
        text-align: center;
    }     
    .trl-txt{
        line-height: 90px;
        text-align: right;
        vertical-align: center;
         font-size: 16px;
        font-weight: bold;
    }  
    .trl-txt span{
        font-size: 18px;
        font-weight: bold;
    } 
     .trl-btn{
        padding-top: 30px;
        height: 90px;
        line-height: 90px;
        vertical-align: :middle;
       
    } 
    .r-top{
        padding-top: 40px;
    }
    </style>

  </head>
  <body class="container" style="text-align:center">
  <div class="row" style="padding-top:200px;">
    <div class="col-md-12 col-lg-12" >
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q1')}}">{{Session::get('q1')}}</div><img src="images/arrow2.png">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q2')}}">{{Session::get('q2')}}</div><img src="images/arrow2.png">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q3')}}">{{Session::get('q3')}}</div><img src="images/arrow2.png">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q4')}}">{{Session::get('q4')}}</div><img src="images/arrow2.png">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q5')}}">{{Session::get('q5')}}</div>
    </div>
  </div>
<div class="row r-top">  
<div class="col-md-6 col-lg-6 trl-txt">
<span> Trials Returned:</span>
<div class="circle pull-right">{{ $trials }}</div>
</div>
<div class="col-md-6 col-lg-6 trl-btn">
 {{HTML::link('trials','VIEW TRIALS',array('class'=>'fancybox fancybox.iframe btn btn-danger pull-left'))}} 
</div>
</div>
<div style="padding-top:60px;">
            {{ Form::open(array('url'=>'search', 'class'=>'form-inline form-search', 'role'=>'form','method' => 'get')) }}


            {{Form::label('question',$question,array('style'=>'text-transform:uppercase'))}}:{{Form::select('paramValue', $categories,'',array('class'=>'form-control'))}}
            {{Form::hidden('paramName',$question)}}
            {{Form::hidden('name',$med)}}

            {{ Form::submit('Next', array('class'=>'btn btn-primary',$disabled => $disabled))}}


            {{ Form::close() }}
</div>            
<!--     {{$query}} -->


 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        {{HTML::script('js/jquery.fancybox.js')}}
        <script type="text/javascript">
        $(document).ready(function() {   
           $(".btn-cstm").attr("disabled","disabled");
           $(".{{$question}}").removeClass("btn-warning");
           $(".{{$question}}").addClass("btn-success");
            $(".fancybox").fancybox({
        'width': 900,
        'height': 900,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'type': 'iframe'
    });



      });
    </script>
  </body>
</html>