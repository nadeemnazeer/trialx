<?php

class Entropy{

   public static function calEntropy($facetName){
       $xml = simplexml_load_file("http://66.228.43.27:8080/solr/select?q=myeloma&facet=true&facet.field=".$facetName."&rows=0");

        $totalTrials = $xml->result['numFound'];
        $ent = 0;
		$chil1  = $xml->lst[1];
		$chil2  = $chil1->lst[1];
		$chil3  = $chil2->lst[0];

		foreach ($chil3 as $item) {
		$ent += $item/$totalTrials * log($item/$totalTrials);
		
		}



		 return $ent;

   }

}