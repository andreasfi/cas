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
        // Get infos
        $result = Event::fetch_all_events();

        // Variables depuis BD
        $title ="Tour de suisse";
        $description = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";

        $this->vars['title'] = "Rando de test";
        $this->vars['description'] = $description;


        $this->vars['msg'] = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
        $this->vars['pageTitle'] = "Details";
        $this->vars['pageMessage'] = "Détails concernant la sortie";
        // calculs
    }

    function inscription(){

    }

    function ajoutsortie(){

    }

}