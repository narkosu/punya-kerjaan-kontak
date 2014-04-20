<?php

if($this->getAction()->getId()!='inbox') 
$this->breadcrumbs=array(
		ucfirst($this->module->id)=>array('inbox'),
		ucfirst($this->getAction()->getId()) 
);
else
	$this->breadcrumbs=array($this->module->id);

if($this->module->authManager)
{
	$authNew = Yii::app()->user->checkAccess("Mailbox.Message.New");
	$authInbox = Yii::app()->user->checkAccess("Mailbox.Message.Inbox");
	$authSent = Yii::app()->user->checkAccess("Mailbox.Message.Sent");
	$authTrash = Yii::app()->user->checkAccess("Mailbox.Message.Trash");
}
else
{
	$authNew = $this->module->sendMsgs && (!$this->module->readOnly || $this->module->isAdmin());
	$authInbox = ( !$this->module->readOnly || $this->module->isAdmin() );
	$authTrash = $this->module->trashbox && (!$this->module->readOnly || $this->module->isAdmin());
	$authSent = $this->module->sentbox && (!$this->module->readOnly || $this->module->isAdmin());
}


//$this->renderpartial('_menu');

if(isset($_GET['Message_sort']))
	$sortby = $_GET['Message_sort'];
elseif(isset($_GET['Mailbox_sort']))
	$sortby = $_GET['Mailbox_sort'];
else
	$sortby = '';
$ie6br = <<<EOD
<!--[if lt IE 6]>
<br clear="all" />
<![endif]-->
EOD;
echo '<div id="mailbox-list" class="mailbox-list ui-helper-clearfix" sortby="'.$sortby.'">';

$this->renderpartial('_flash');
//echo $dataProvider->getItemCount();

if($dataProvider->getItemCount() > 0) {
?>
<form id="message-list-form" action="<?php echo $this->createUrl($this->getId().'/'.$this->getAction()->getId()); ?>" method="post">
	<input type="hidden" class="mailbox-count" name="ui[]" value="<?php echo $dataProvider->getItemCount(); ?>" />
	<input type="hidden" class="mailbox-sortby" name="ui[]" value="<?php echo $sortby; ?>" />
	<div class="mailbox-clistview-container ui-helper-clearfix">
	<?php
		
	if($dataProvider->getItemCount() > 1 && $this->getAction()->getId() != 'sent') : ?>
		<div style="float:left;margin-bottom: 5px;" class="btn-group mailbox-checkall-buttonsx">
			<button class="checkall" />Check All</button>
			<button class="uncheckall" />Uncheck All</button>
		</div>
	<?php
	endif;
  /*
  if($authNew) :
      ?>
      <div style="float:left;margin-bottom: 5px;margin-left:5px" class="btn-group mailbox-checkall-buttonsx">
        <div style="padding:11px;" ><a href="<?php echo $this->createUrl('message/new'); ?>">New Message</a></div>
      </div>
    <?php endif; 
   * 
   */ ?>
   
<?php /*
$this->widget('zii.widgets.CListView', array(
    'id'=>'mailbox',
    'dataProvider'=>$dataProvider,
    'itemView'=>'_list',
    'itemsTagName'=>'table',
    'template'=>'<div class="mailbox-summary">{summary}</div>{sorter}'.$ie6br.'<div id="mailbox-items" class="ui-helper-clearfix">{items}</div>{pager}',
    'sortableAttributes'=>$this->getAction()->getId()=='sent'?
	array('created'=>'Date Sent') :
	array('modified'=>'Date Received'),
    'loadingCssClass'=>'mailbox-loading',
    'ajaxUpdate'=>'mailbox-list',
    'afterAjaxUpdate'=>'$.yiimailbox.updateMailbox',
    'emptyText'=>'<div style="width:100%"><h3>You have no mail in your '.$this->getAction()->getId().' folder.</h3></div>',
    //'htmlOptions'=>array('class'=>'ui-helper-clearfix'),
    'sorterHeader'=>'', 
    'sorterCssClass'=>'mailbox-sorter',
    'itemsCssClass'=>'mailbox-items-tbl ui-helper-clearfix',
    'pagerCssClass'=>'mailbox-pager',
    //'updateSelector'=>'.inbox',
));*/
echo '<table>';
foreach ( $dataProvider->getData() as $ie=>$msg){
	
	$this->renderpartial('_list',array('data'=>$msg));
}
echo '</table>';
?>
	<?php if($this->getAction()->getId()!='sents') : ?>
<div style="clear:left"> <span class="mailbox-buttons-label">With selected:</span> 
		<?php if($this->getAction()->getId()=='trash') : ?>
	<input type="submit" id="mailbox-action-restore" class="btn mailbox-button" name="button[restore]" value="restore" /> 
	<input type="submit" id="mailbox-action-delete" class="btn mailbox-button" name="button[delete]" value="delete forever" />
		<?php else: ?>
			<?php if(!$this->module->readOnly || ( $this->module->readOnly && !$this->module->isAdmin()) ): ?>
	<input type="submit" id="mailbox-action-delete" class="btn mailbox-button" name="button[delete]" value="delete" /> 
			<?php endif; ?>
	<input type="submit" id="mailbox-action-read" class="btn mailbox-button" name="button[read]" value="read" /> 
	<input type="submit" id="mailbox-action-unread" class="btn mailbox-button" name="button[unread]" value="unread" /> 
		<?php endif; ?>
</div>
	<?php endif; ?>
	</div>
</form>

<?php

}
else {
	$this->renderpartial('_empty');
} 

?>
</div>

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
	$('.message-subject').hide();
});
/*]]>*/
</script>