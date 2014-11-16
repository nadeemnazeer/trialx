<?php

class Helper{

	//function which takes facet name as param and retutns its entropy. 
   public static function getEntropy($facetName,$name){
       
       $xml = simplexml_load_file("http://66.228.43.27:8080/solr/select?q=".$name."&facet=true&facet.field=".$facetName."&rows=1");


       	//total number of trials
        $totalTrials = $xml->result['numFound'];
        $ent = 0;

        //reading and parsing the xml nodes to get the distribution list
		$chil1  = $xml->lst[1];
		$chil2  = $chil1->lst[1];
		$chil3  = $chil2->lst[0];

		foreach ($chil3 as $item) {

		//storing in array , all possible values for the facet Name in Session, which we can later use in populating dropdowns 	
		Session::push('q.'.$facetName, (string)$item['name']);

		//calculating the entropy
		$ent += $item/$totalTrials * log($item/$totalTrials);
		
		}



		 return $ent;

   }

   public static function getTrialCount($name, $cond){
       
       $xml = simplexml_load_file("http://66.228.43.27:8080/solr/select?q=".$name.$cond."&rows=1");

        $totalTrials = $xml->result['numFound'];
        $ent = 0;
		$chil1  = $xml->result;
		
		// foreach ($chil1 as $doc) {
		// 	print_r($doc);
		// }

		// foreach ($chil1->doc[1]->arr[0] as $str) {
		// 	echo $str;
		// }
		
		return $totalTrials;
		



   }
    public static function getTrials($name, $cond,$start,$rows){
       
       $xml = simplexml_load_file("http://66.228.43.27:8080/solr/select?q=".$name.$cond."&start=".$start."&rows=".$rows);

        $totalTrials = $xml->result['numFound'];
        (int) $totalTrials;
        $ent = 0;
		$docs  = $xml->result;
		
		// foreach ($docs as $doc) {
		// 	echo $doc->arr[0];
		// }
		//calculating end of items
		$end = $rows;
		Session::put('next-disable',"");
		if($totalTrials-$start < $rows){
			$end = $totalTrials-$start;
			Session::put('next-disable',"disabled");
		}

		//get ids
		$ids = array();
		for ($i=0; $i<$end; $i++) {
			$str="";
		if($docs->doc[$i]->str[4]["name"] == "id" ){	
			
				$str=$docs->doc[$i]->str[4];
				
			
		}
		array_push($ids,$str);
		}
		

		//echo $docs->doc[1]->arr[0]["name"];
		//get cities
		$cities =array();
		for ($i=0; $i<$end; $i++) {
			$str="";
		if($docs->doc[$i]->arr[0]["name"] == "city" ){
			foreach ($docs->doc[$i]->arr[0] as $city) {
				$str.=$city.",";
				
			}
		}	
		array_push($cities,$str);
		}


		//get coordinates
		$coordinates =array();
		for ($i=0; $i<$end; $i++) {
			$str="";
		if($docs->doc[$i]->arr[2]["name"] == "coordinates" ){	
			foreach ($docs->doc[$i]->arr[2] as $coordinate) {
				$str.=$coordinate.",";
				
			}
		}
		array_push($coordinates,$str);
		}

		//get states
		$states =array();
		for ($i=0; $i<$end; $i++) {
			$str="";
		if($docs->doc[$i]->arr[5]["name"] == "state" ){	
			foreach ($docs->doc[$i]->arr[5] as $state) {
				$str.=$state.",";
				
			}
		}
		array_push($states,$str);
		}

		//get sitenames
		$sitenames =array();
		for ($i=0; $i<$end; $i++) {
			$str="";
		if($docs->doc[$i]->arr[3]["name"] == "sitenames" ){	
			foreach ($docs->doc[$i]->arr[3] as $sitename) {
				$str.=$sitename.",";
				
			}
		}
		array_push($sitenames,$str);
		}

		//get study_types
		$study_types = array();
		for ($i=0; $i<$end; $i++) {
			$str="";
		if($docs->doc[$i]->str[7]["name"] == "study_type" ){	
			
				$str=$docs->doc[$i]->str[7];
				
			
		}
		array_push($study_types,$str);
		}

		//combine data
		$data = array();
		for ($i=0; $i<$end; $i++) {
			$t = new Trial();
			$t->id = $ids[$i];
			$t->city = $cities[$i];
			$t->coordinate = $coordinates[$i];
			$t->state = $states[$i];
			$t->sitename = $sitenames[$i];
			$t->study_type = $study_types[$i];
			array_push($data,$t);
		}
		
		//

		
		return $data;
		



   }

  
}