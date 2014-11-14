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
    </style>

  </head>
  <body class="container">
  <div class="row" style="padding-top:200px;">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q1')}}">{{Session::get('q1')}}</div><img src="images/arrow2.png">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q2')}}">{{Session::get('q2')}}</div><img src="images/arrow2.png">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q3')}}">{{Session::get('q3')}}</div><img src="images/arrow2.png">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q4')}}">{{Session::get('q4')}}</div><img src="images/arrow2.png">
      <div class="btn btn-warning btn-lg btn-cstm {{Session::get('q5')}}">{{Session::get('q5')}}</div>
  </div>
<div class="row">  

<h2>Trials Returned:: {{ $trials }}</h2> {{HTML::link('trials','View Trials',array('class'=>'fancybox fancybox.iframe btn btn-danger'))}} 

    {{ Form::open(array('url'=>'search', 'class'=>'form-search', 'role'=>'form','method' => 'get')) }}
        <div class="row">
                <div class="input-group row">
                    <div class="col-lg-4 col-md-4">
                    {{Form::label('question',$question,array('style'=>'text-transform:uppercase'))}}:</div> 
                    <div class="col-lg-5 col-md-5">
                    {{Form::select('paramValue', $categories,'',array('class'=>'form-control'))}}
                    {{Form::hidden('paramName',$question)}}
                    {{Form::hidden('name',$med)}}
                    </div>
                    <div class="col-lg-3 col-md-3">
                    {{ Form::submit('Next', array('class'=>'btn btn-primary',$disabled => $disabled))}}
                    </div>
                   
                </div>
        </div>
    {{ Form::close() }}
    {{$query}}
</div>


 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        {{HTML::script('js/jquery.fancybox.js')}}
        <script type="text/javascript">
        $(document).ready(function() {   
           $(".btn-cstm").attr("disabled","disabled");
           $(".{{$question}}").removeAttr("disabled");
          $(".{{$question}}").removeClass("btn-warning");
           $(".{{$question}}").addClass("btn-success");




      });
    </script>
  </body>
</html>