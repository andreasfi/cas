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
        
        $description = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";

        $this->vars['title'] = $result[0]->getTitle();
        $this->vars['startDate'] = $result[0]->getStartDate();
        $this->vars['endDate'] = $result[0]->getEndDate();
        $this->vars['maxParticipants'] = $result[0]->getMaxParticipants();
        $this->vars['owner'] = $result[0]->getOwner();
        $this->vars['eventCategory'] = $result[0]->getEventCategory();
        $this->vars['difficulty'] = $result[0]->getDifficulty();
        $this->vars['path'] = $result[0]->getPath();


        $this->vars['description'] = $result[0]->getDescription();


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