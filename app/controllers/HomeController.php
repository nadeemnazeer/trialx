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

			
			if(Input::has('next')){	
			 $cond= Session::get('query')."&fq=".$paramName.":".$paramValue;
			 Session::push('prev',Session::get('query'));
			 Session::put('query',$cond);}
			elseif(Input::has('prev')){

				$arr = Session::get('prev');
				$top = array_pop($arr);
				
				Session::forget('prev');

				foreach ($arr as $value) {
					Session::push('prev',$value);
				}
			 	Session::put('query',$top);
			 	$cond = Session::get('query');
			 }
			 else{
			 	$cond= Session::get('query')."&fq=".$paramName.":".$paramValue;
			    Session::put('query',$cond);

			 }
			}

			//checking if we have already calculated entropy for the medical condition with name = $name, so as to avoid overhead of recalculating it
			if (!(Session::has($name))){
				echo "setting session";
				Session::put($name,$name);

				//storing the calculated entropies of different facets in array
				$questions = array("phase" => Helper::getEntropy('phase',$name), "gender" => Helper::getEntropy('gender',$name), "treatment_status" => Helper::getEntropy('treatment_status',$name), "state" => Helper::getEntropy('state',$name),"city" => Helper::getEntropy('city',$name));

				//As higher the entropy is, higher an event is unlikely, we sort the array based on entropy values in descending order, so the next question will be selected that has maximum entropy
				arsort($questions);

				//we store questions to be asked in descending order of entropy in session, so q1 being the first question , and its value being the question name, e.g: q1=city
           			$i=1;
           			foreach ($questions as $key => $val) {
           			Session::put("q".$i, $key);
					   $i=$i+1;
					}

				
				
			}
			
		   
			
			if(Input::has('next')){
				
				Session::put('qCount',Session::get('qCount')+1);

			}
			elseif(Input::has('prev')){
				Session::put('qCount',Session::get('qCount')-1);
				
			}
		
			$currQuestion = Session::get('q'.Session::get('qCount'));
			
		   
			//array for storing the possible values of answers to questions which we had already stored in session while calculating entropy in getEntropy() function.
			$categories = array();
			$dis="";
			
			

			//disabling the next button, if we asked all the 5 questions
			if(Session::get('qCount') > 5){
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

		public function getSearch2(){

			$currParamName=Input::get('currParamName');
			$currParamValue=Input::get('currParamValue');
			$name=Input::get('name');

		
			
			$query="";
				$query += $name."&fq=".$currParamName.":".$currParamValue;
			

			return View::make('search.index2')
			->with('query',$query);

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
