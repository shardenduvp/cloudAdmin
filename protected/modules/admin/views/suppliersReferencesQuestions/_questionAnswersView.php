<div class="row" >

	<div class="textfont col-md-8">
		<?php
			foreach ($model as $answer) 
			{
				echo "<b>".$answer->reviewQuestions->title."</b>"."<br />";?>
			<?php echo CHtml::textfield('answer["'.$answer->id.'"]',$answer->answers,array('class'=>'form-control','disabled'=>'true'));  ?><br />
			<?php	
				}
			?>
	</div>

	<div class="col-md-2">
	</div>

</div> 