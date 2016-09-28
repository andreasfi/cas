<?php
/**
 * Created by PhpStorm.
 * User: andreasfi
 * Date: 26.09.16
 * Time: 01:00
 */


class sortiesController extends Controller{
    function sorties(){

    }
    function propositions(){
        
        $this->vars['propositions'] = json_encode(Event::fetch_all_events());

    }
    function details(){

    }

    function inscription(){

    }
	
	function ajoutsortie(){
		
	}
    
}