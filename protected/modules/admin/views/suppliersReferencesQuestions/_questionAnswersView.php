

<div class="row" >
<div class="textfont col-md-8">
	<?php
		foreach ($model as $answer) 
		{
			echo "<b>".$answer->reviewQuestions->title."</b>"."<br />";?>
	<?php 
			echo CHtml::textfield('answer['.$answer->id.'][answer]',$answer->answers,array('class'=>'form-control'));  
			echo CHtml::hiddenField('answer['.$answer->id.'][id]',$answer->id);
			echo CHtml::hiddenField('answer['.$answer->id.'][questionId]',$answer->review_questions_id);
			echo CHtml::hiddenField('answer['.$answer->id.'][referencesId]',$answer->suppliers_has_references_id);

		}

	?>
	<br />
</div>
<div class="col-md-4">
</div>

</div>