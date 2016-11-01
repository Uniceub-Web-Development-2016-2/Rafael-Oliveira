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
			$all_missions = sizeof(EventHasMission::model()->findAllByAttributes(array("em_event_id" => $event->event_id)));
			
			//void division by zero which could break the code
			if($all_missions == 0){
				$all_missions = 1;

			}

			//all completed missions in a event
			$comp = Emc::model()->findAllByAttributes(array("event_id" => $event->event_id , "user_id_fk" => $_POST["user_id"]));
			


			$percent  = (round( 100 * (sizeof($comp) / $all_missions)));
			//avoid big numbers that could break the layout
			if($percent > 100){
				$percent = 100;
			}

			$load[] =  Array(
				"event_content" =>	$event->attributes,
				"missions" => Mission::returnEventMissionAndCompletion($event->event_id , $_POST["user_id"]),
				"percent" => $percent
			);
			
		}
			
		echo json_encode($load);	
		
	}

	
}