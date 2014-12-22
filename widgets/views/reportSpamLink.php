<!-- Link in menu for reporting the post -->
<li> <a href="#"
	id="reportLinkPost_modal_postreport_<?php echo $object->id ?>"
	data-toggle="modal"
	data-target="#submitSpamReport_<?php echo $object->id ?>"> <?php echo '<i class="fa fa-exclamation-circle"></i> ' . Yii::t('SpamReporter.widgets_views_reportSpamLink', 'Report post'); ?>
</a>


<!-- Modal with reasons of report -->
	<div class="modal" id="submitSpamReport_<?php echo $object->id;?>"
		tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">

		<div class="modal-dialog modal-dialog-small animated pulse">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">
						<strong><?php echo  Yii::t('SpamReporter.widgets_views_reportSpamLink', 'Help Us Understand What\'s Happening'); ?>
						</strong>
					</h4>

				</div>
				<hr />
				<?php  
				$form = $this->beginWidget('HActiveForm', array(
			            'id' => 'report-post-form',
			        ));?>
				<?php echo $form->hiddenField($model,'object_id',array('value'=> $object -> id));?>
				<div class="modal-body text-left">


					<?php echo $form->labelEx($model, 'reason'); ?>
					<br />
					<?php echo $form->radioButtonList($model,'reason',array('1'=>Yii::t('SpamReporter.widgets_views_reportSpamLink', 'Does not belong to this space'),
							'2'=>Yii::t('SpamReporter.widgets_views_reportSpamLink', 'It\'s offensive'),
							'3'=>Yii::t('SpamReporter.widgets_views_reportSpamLink', 'It\'s spam'))); ?>
					<?php echo $form->error($model, 'reason'); ?>



				</div>
				<hr />
				<div class="modal-footer">

					<?php echo HHtml::ajaxSubmitButton(Yii::t('SpamReporter.widgets_views_reportSpamLink', 'Submit'), $this->createUrl("//spamreporter/spamreporter/report", array()), array( //array('model' => $model, 'id' => $id)), array(
							'type' => 'POST',
							'success' => 'data = JSON.parse(data); if(data.success) $("#reportLinkPost_modal_postreport_<?php echo $object->id?>").hide()',
					), array('class' => 'btn btn-primary', 'data-dismiss' => "modal", 'disabled' => 'disabled'));
					?>
				</div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</li>


<script type="text/javascript">

    $(document).ready(function () {
        // move modal to body
        $('#submitSpamReport_<?php echo $object->id;?>').appendTo(document.body);
     
    });


    $(function(){
    	$('#submitSpamReport_<?php echo $object->id;?>').find("input[type='radio']").change(function(){

    		$('#submitSpamReport_<?php echo $object->id;?>').find("input[type='submit']").prop("disabled", false);
  
        });
    });

</script>
