<?php
	
	class MissionCompletedController extends Controller{
		
		public function actionSaveCompletion(){

			$mission_comp = MissionCompleted::model()->findByAttributes(array("user_id_fk" => $_POST["user_id_fk"] , "mission_id_fk" => $_POST["mission_id_fk"]));
			if($mission_comp == null){

				$mission_comp = new MissionCompleted;
			}

			$attr = $_POST;

			$attr["completed_date"] = date("Y-m-d");
			
			$mission_comp->attributes = $attr;
			$mission_comp->save();

			echo json_encode(true);
		}
	}

?>

