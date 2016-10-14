<?php

class EventController extends Controller
{
	

	/**
	 * Displays the login page
	 */
	public function actionGetEvents()
	{

		$events = Event::model()->findAll();
		$load = Array();	
		
		foreach($events as $event){
			//all missions in a event
			$all_missions = Emc::model()->findAllByAttributes(array("event_id" => $event->event_id));
			//all completed missions in a event
			$comp = Emc::model()->findAllByAttributes(array("event_id" => $event->event_id , "user_id_fk" => $_POST["user_id"]));
			$percent  = (round( 100 * (sizeof($comp) / sizeof($all_missions))));
			

			$load[] =  Array(
				"event_content" =>	$event->attributes,
				"missions" => Mission::returnEventMissionAndCompletion($event->event_id , $_POST["user_id"]),
				"percent" => $percent
			);
			
		}
			
		echo json_encode($load);	
		
	}

	
}