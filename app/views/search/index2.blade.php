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
        color: #c12e2a;
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

<div style="padding-top:30px;">
            {{ Form::open(array('url'=>'search2/'.$query, 'class'=>'form-inline form-search', 'role'=>'form','method' => 'get')) }}


            {{Form::label('question','question',array('style'=>'text-transform:uppercase'))}}&nbsp;{{Form::select('paramValue', array('val1'=>'val1','val2'=>'val2'),'',array('class'=>'form-control'))}}
            {{Form::hidden('paramName','question')}}
            {{Form::hidden('name','name')}}

            {{ Form::submit('Next', array('class'=>'btn btn-primary'))}}


            {{ Form::close() }}
            {{$query}}

</div>  


          
<!--     {{$query}} -->


 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        {{HTML::script('js/jquery.fancybox.js')}}
        <script type="text/javascript">
        $(document).ready(function() {   
           $(".btn-cstm").attr("disabled","disabled");
        
            $(".fancybox").fancybox({
        'width': 1000,
        'height': 900,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'type': 'iframe'
    });



      });
    </script>
  </body>
</html>