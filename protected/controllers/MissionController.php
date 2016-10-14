<?php

class MissionController extends Controller
{
	public function actionGetMission(){
		$mission = Mission::model()->findByPk($_POST['mission_id'])->attributes;
		$load = ["mission" => $mission , "requirements" =>MissionRequirements::returnRequirements($_POST['mission_id'])];
		echo json_encode($load);
	}
}
