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

			//resetting the start page position of trial view
			Session::put('start',0);	
	
			$cond="";
			if($paramName != ""){	
			 $cond= Session::get('query')."&fq=".$paramName.":".$paramValue;
			 Session::put('query',$cond);
			}

			//checking if we have already calculated entropy for the medical condition with name = $name, so as to avoid overhead of recalculating it
			if (!(Session::has($name))){
				echo "setting session";
				Session::put($name,$name);

				//storing the calculated entropies of different facets in array
				$questions = array("phase" => Helper::getEntropy('phase'), "gender" => Helper::getEntropy('gender'), "treatment_status" => Helper::getEntropy('treatment_status'), "state" => Helper::getEntropy('state'),"city" => Helper::getEntropy('city'));

				//As higher the entropy is, higher an event is unlikely, we sort the array based on entropy values in ascending order
				asort($questions);

				//we store questions to be asked in ascending order of entropy in session, so q1 being the first question , and its value being the question name, e.g: q1=city
           			$i=1;
           			foreach ($questions as $key => $val) {
           			Session::put("q".$i, $key);
					   $i=$i+1;
					}

				
				
			}

			//keeping track of current questions
			$qCount = Session::get('qCount');

			//getting current question name
			$currQuestion = Session::get('q'.$qCount);
			
			//array for storing the possible values of answers to questions which we had already stored in session while calculating entropy in getEntropy() function.
			$categories = array();
			$dis="";
			
			Session::put('qCount',$qCount+1);

			//disabling the next button, if we asked all the 5 questions
			if(Session::get('qCount') > 6){
				$dis = "disabled";
			}
			else{
			//populating the array of possible values for question	
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
