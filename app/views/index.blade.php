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

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="container">
<div class="row" style="padding-top:200px;">  
    {{ Form::open(array('url'=>'search', 'class'=>'form-search', 'role'=>'form','method' => 'get')) }}
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6">
            <h2>What is your medical condition?</h2>
                <div class="input-group">

                    {{ Form::text('name', '', array('class'=>'form-control', 'placeholder'=>'Search for a medical condition.'))}}
                    <span class="input-group-btn">
                    {{ Form::submit('Search', array('class'=>'btn btn-default'))}}
                    </span>
                </div>
        </div>
        <div class="col-lg-3 col-md-3"></div>
    {{ Form::close() }}
</div>




  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>