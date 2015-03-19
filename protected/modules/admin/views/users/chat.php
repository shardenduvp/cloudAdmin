<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1>Chat Room <small>[<?php echo $room->room_name; ?>]</small></h1>
        </div>
    </div>
</div>

<?php
    $this->Widget('WidgetAdminChatController',array('room_id'=>Yii::app()->request->getParam('room_id'), 'user_id'=>Yii::app()->request->getParam('uid')));
?>