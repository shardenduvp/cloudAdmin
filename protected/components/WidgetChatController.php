<?php
class WidgetChatController extends CWidget
{
	public $visible	=	true;
	public $pid		=	null;
	public $res = array(
		"avtar"=>"https://www.filepicker.io/api/file/A9r6eU3JQOxoJXvAWPgY");
	public function init()
	{
		if($this->visible)
		{

		}
	}

	public function run()
	{
		if($this->visible)
		{
			$this->renderContent();
		}
	}
	protected function renderContent()
	{
		$this->Chat();
		
	}	
	protected function Chat()
	{
		//CVarDumper::dump($this->pid,10,1);

		if(1||isset($_REQUEST["pid"]) ){

			$pid = base64_decode($this->pid);		
			
			$setVariable = array();
			//CVarDumper::dump($supplier->users->chatRoomHasUsers,10,1);
			if(!empty($pid))
			{
				
				$project = SuppliersProjects::model()->findByPk($pid);
				$limit_num_messages = 10;
				$allusers = ChatRoomHasUsers::model()->findAllByAttributes(array("chat_room_id"=>$project->chat_room_id));

				$chatRoomUsers = CHtml::listData($allusers,"id","id");

				//get data of chat messages on the basis of all users in that room collected from above query
				$chatData = ChatMessages::model()->findAllByAttributes(array("chat_message_has_user_id"=>$chatRoomUsers),array('order'=>'id desc','limit'=>$limit_num_messages));

				//Get the chatRoomHasUser table id
				$criteria = new CDbCriteria();
				$criteria->join ='LEFT JOIN chat_room ON chat_room.id = t.chat_room_id';
				$criteria->condition = 'chat_room.room_type = :room_type and t.chat_room_id=:chat_room_id and t.users_id= :user_id';
				/*0 will be for admin chat */
				$criteria->params = array(":room_type" => "1","chat_room_id"=>$project->chat_room_id,"user_id"=>Yii::app()->user->id);
				$roomUser = ChatRoomHasUsers::model()->find($criteria);
				unset($criteria);
				//get all the messages which I have not seen.

				$criteria = new CDbCriteria();
				$notSeenMessages = ChatMessages::model()->find($criteria);
				//CVarDumper::dump($allusers,10,1);die;
				$setVariable["chatData"]=$chatData ;
				$setVariable["project"]=$project;
				$setVariable["roomUser"]=$roomUser;
				$setVariable["allusers"]=$allusers;
				$setVariable["admin"]=Users::model()->findByPk(1);

			}
			$this->render('widgetChat',$setVariable);
		}else
		{
			$this->render('widgetChat');
		}
	}// end of method
}
