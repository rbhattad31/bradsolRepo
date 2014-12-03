<?php
/* @var $this EbrPurchaseController */
/* @var $model EbrPurchase */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ebr-purchase-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->dropDownList($model,'group_id',Utilities::getGroupsList(),array('empty' => 'Select a group')); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>
	
	
<div class="row">
		<?php echo $form->labelEx($model,'shop_id'); ?>
		<?php echo $form->dropDownList($model,'shop_id',$allShops,array('empty' => 'Select a shop')); ?>
		<?php echo $form->error($model,'shop_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model' => $model,
		'attribute' => "product_id",
		'source'=>$this->createUrl('site/suggestProductsAndVendors'),
		'options'=>array(
				'showAnim'=>'fold',
		),
));
		 ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array(
        'disabled'=>'true'
    )); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'purchase_amount'); ?>
		<?php echo $form->textField($model,'purchase_amount'); ?>
		<?php echo $form->error($model,'purchase_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_number'); ?>
		<?php echo $form->textField($model,'invoice_number'); ?>
		<?php echo $form->error($model,'invoice_number'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'invoice_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'model' => $model,
	'attribute' => 'invoice_date',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
'showOn' => 'both',             // also opens with a button
'dateFormat' => 'yy-mm-dd',     // format of "2012-12-25"
'showOtherMonths' => true,      // show dates in other months
'selectOtherMonths' => true,    // can seelect dates in other months
'changeYear' => true,           // can change year
'changeMonth' => true,          // can change month
'yearRange' => '2000:2099',     // range of year
'minDate' => '2000-01-01',      // minimum date
'maxDate' => '2099-12-31',      // maximum date
'showButtonPanel' => true,
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
)); ?>
		<?php echo $form->error($model,'invoice_date'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->