<!-- Modal -->
<div class="modal fade" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Search for People to Create a New Group</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->renderPartial('message/_search'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn vpblueLight" >Create Group</button>
      </div>
    </div>
  </div>
</div>

<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header mb0">
            <h1>Broadcast Messages</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 full-width">
        <div class="messages clearfix">
            <div class="sidebar rightSep">
                <?php $this->renderPartial('message/_groups'); ?>
            </div>
            <div class="page">
                <?php $this->renderPartial('message/_chat'); ?>
            </div>
        </div>
    </div>
</div>