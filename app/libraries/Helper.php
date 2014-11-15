<?php

class Helper{

   public static function getEntropy($facetName){
       
       $xml = simplexml_load_file("http://66.228.43.27:8080/solr/select?q=myeloma&facet=true&facet.field=".$facetName."&rows=1");

        $totalTrials = $xml->result['numFound'];
        $ent = 0;
		$chil1  = $xml->lst[1];
		$chil2  = $chil1->lst[1];
		$chil3  = $chil2->lst[0];

		foreach ($chil3 as $item) {
		Session::push('q.'.$facetName, (string)$item['name']);
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
		
		//get cities
		$cities =array();
		for ($i=0; $i<$end; $i++) {
			$str="";
		foreach ($docs->doc[$i]->arr[0] as $city) {
			$str.=$city.",";
			
		}
		array_push($cities,$str);
		}


		//get coordinates
		$coordinates =array();
		for ($i=0; $i<$end; $i++) {
			$str="";
		foreach ($docs->doc[$i]->arr[2] as $coordinate) {
			$str.=$coordinate.",";
			
		}
		array_push($coordinates,$str);
		}

		$d = array();
		for ($i=0; $i<$end; $i++) {
			$t = new Trial();
			$t->city = $cities[$i];
			$t->coordinate = $coordinates[$i];
			array_push($d,$t);
		}
		
		//

		$data = array("totalTrials"=>$totalTrials,"cities"=>$cities,"coordinates"=>$coordinates);
		return $d;
		



   }

    public static function getTypes($facetName){
       
       $xml = simplexml_load_file("http://66.228.43.27:8080/solr/select?q=myeloma&facet=true&facet.field=".$facetName."&rows=0");

        $totalTrials = $xml->result['numFound'];
        $ent = 0;
		$chil1  = $xml->lst[1];
		$chil2  = $chil1->lst[1];
		$chil3  = $chil2->lst[0];

		foreach ($chil3 as $item) {
		echo $item['name'];
		
		}



   }

}