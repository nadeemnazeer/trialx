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
    public static function getTrials($name, $cond){
       
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