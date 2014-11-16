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
    <style type="text/css">
    body{

      font-size: 12px;
    }
    </style>
  </head>
  <body class="container">
<div class="row"> 
  <div class="table-responsive">
<table class="table table-bordered table-striped table-condensed">
      <thead>
        <tr>
             <th>id</th> 
             <th>City</th>
             <th>Sitename</th>
             <th>States</th>
             <th>Study Type</th>
             <th>Other</th>
         
        </tr>
      </thead>
      <tbody>
        
        @foreach($data as $t)
    	<tr>	
          <td>{{$t->id}}</td>
          <td>{{$t->city}}</td>
    			<td>{{$t->sitename}}</td>
          <td>{{$t->state}}</td>
    	    <td>{{$t->study_type}}</td>
    			<td>other</td>
    	</tr>
    	@endforeach 
    	
     
      </tbody>
</table>
</div>
{{HTML::link('trials?next=1&prev=0','Next',array('class'=>' btn btn-primary pull-right',Session::get('next-disable')))}} 


</div>




  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>

