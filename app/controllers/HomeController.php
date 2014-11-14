<?php

class HomeController extends BaseController {



	public function getIndex()
	{
		Session::flush();
		Session::put('qCount',1);
		Session::put('start',0);
  		return View::make('index');
	}

	public function getSearch(){
			$paramName=Input::get('paramName');;
			$paramValue=Input::get('paramValue');;
			$name=Input::get('name');
			Session::put('name',$name);

			
			$cond="";
			if($paramName != ""){	
			 $cond= Session::get('query')."&fq=".$paramName.":".$paramValue;
			 Session::put('query',$cond);
			}

			if (!(Session::has($name))){
				echo "setting session";
				Session::put($name,$name);
				$items = array("phase" => Helper::getEntropy('phase'), "gender" => Helper::getEntropy('gender'), "treatment_status" => Helper::getEntropy('treatment_status'), "state" => Helper::getEntropy('state'),"city" => Helper::getEntropy('city'));
				      arsort($items);
           			$i=1;
           			foreach ($items as $key => $val) {

					   Session::put("q".$i, $key);
					   $i=$i+1;
					}

				
				
			}

			// foreach (Session::get('q.phase') as $city) {
			// 	echo $city;
			// }
			// echo Session::get('q3');
			// echo "<br>";
		 //   echo Helper::getTrialCount($name,$cond);
			$qCount = Session::get('qCount');
			$currQuestion = Session::get('q'.$qCount);
			$categories = array();
			$dis="";
		
			Session::put('qCount',$qCount+1);
			if(Session::get('qCount') > 6){
				$dis = "disabled";
			}
			else{
			foreach (Session::get('q.'.$currQuestion) as $qi) {
				$categories[$qi] = $qi;
			}

			}

			asort($categories);
		   return View::make('search.index')
		   ->with('trials',Helper::getTrialCount($name,$cond))
		   ->with('med',$name)
		   ->with('question',$currQuestion)
		   ->with('categories',$categories)
		   ->with('disabled',$dis)
		   ->with('query',$cond);
		  


	}

	public function getTrials(){

			$name= Session::get('name');
			$query = Session::get('query');
			
			$start = Session::get('start');
			Session::put('start',$start+10);	

			 return View::make('trials')
			  ->with('data',Helper::getTrials($name,$query,$start,10));


	}



}
