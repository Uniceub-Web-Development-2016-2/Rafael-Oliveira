<?php

class RewardController extends Controller
{
	

	/**
	 * Displays the login page
	 */
	public function actionGetRewards()
	{

		$rewards = Reward::model()->findAll();
		$load = Array();	
		
		foreach($rewards as $reward){
			//all missions in a event
			$all_missions = RMC::model()->findAllByAttributes(array("reward_id" => $reward->reward_id));
			//all completed missions in a event
			$comp = RMC::model()->findAllByAttributes(array("reward_id" => $reward->reward_id , "user_id_fk" => $_POST["user_id"]));
			$percent  = (round( 100 * (sizeof($comp) / sizeof($all_missions))));
			

			$load[] =  Array(
				"reward_content" =>	$reward->attributes,
				"missions" => Mission::returnRewardMissionAndCompletion($reward->reward_id , $_POST["user_id"]),
				"percent" => $percent
			);
			
		}
			
		echo json_encode($load);	
		
	}

	
}