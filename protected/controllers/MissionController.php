<?php

class MissionController extends Controller
{
	public function actionGetMission(){
		$mission = Mission::model()->findByPk($_GET['mission_id'])->attributes;
		$load = ["mission" => $mission , "requirements" =>MissionRequirements::returnRequirements($_GET['mission_id'])];
		echo json_encode($load);
	}
}
