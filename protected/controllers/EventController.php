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
			$missions = Array();

			foreach ($event->eventHasMissions as $hasMission) {
				$mission = $hasMission->mission->attributes;
				$mission["completed"] = Mission::returnCompletion($mission["id"] , $_GET["user_id"]);
				$missions[] = $mission;
			}

			$load[] =  Array(
				"event_content" =>	$event->attributes,
				"missions" => $missions

			);
			
		}
			
		echo json_encode($load);	
		
	}

	
}