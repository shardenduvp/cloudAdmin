<?php $form=$this->beginWidget('CActiveForm', array(
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
        'id'=>'searchUsers'
    ),
)); ?>

<?php
    $count = 1;
    echo CHtml::hiddenField("", $count, array('id'=>'filtersCount'));
?>

<div class="row mb10">
  <div class="col-md-12">
    <?php echo CHtml::label('Enter a Title for The Group', 'GroupTitle'); ?>
    <?php echo CHtml::textField('Group[title]', '', array('class'=>'form-control', 'placeholder'=>'Enter a title', 'id'=>'GroupTitle')); ?>
  </div>
</div>

<!-- Filter for searching users -->
<div class="panel-group allFilters" id="accordion" role="tablist" aria-multiselectable="true">

  <div class="hide" id="dummyPanel">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading0" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
        <h4 class="panel-title cursorp clearfix">
          <a class="pull-left">Filter</a>
          <span class="fa fa-times dismissFilter pull-right"></span>
          <span class="fa fa-angle-down ml10" ></span>
        </h4>
      </div>
      <div id="collapse0" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading0">
        <div class="panel-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        </div>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default filterPanel">
    <div class="panel-heading" role="tab" id="heading1">
      <h4 class="panel-title cursorp clearfix"  data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
        <a class="pull-left">Filter</a>
        <span class="fa fa-times dismissFilter pull-right"></span>
        <span class="fa fa-angle-down ml10" ></span>
      </h4>
    </div>
    <div id="collapse1" class="colpan panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3">
            <?php echo CHtml::label('From', 'fromField'.$count); ?>
            <?php echo CHtml::dropDownList('From['.$count.'][user]', '', array('1'=>'Suppliers', '2'=>'Clients'), array('empty'=>'Select User', 'class'=>'form-control fromField', 'id'=>'fromField'.$count)); ?>
          </div>
          <div class="col-md-9">
            <div class="row initialInfo">
              <div class="col-md-12">
                <p class="mt30">Select a user to further filter the users...</p>
              </div>
            </div>

            <div class="row supplierFilters" style="display:none;">
              <div class="col-md-12">
                <div role="tabpanel" class="nomar">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tabs-sm" role="tablist">
                    <li role="presentation" class="active"><a href="#supStatus" aria-controls="supStatus" role="tab" data-toggle="tab">Status</a></li>
                    <li role="presentation"><a href="#supAdddate" aria-controls="supAdddate" role="tab" data-toggle="tab">Add Date</a></li>
                    <li role="presentation"><a href="#supLocation" aria-controls="supLocation" role="tab" data-toggle="tab">Location</a></li>
                    <li role="presentation"><a href="#supLeads" aria-controls="supLeads" role="tab" data-toggle="tab">Leads</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content tabH">
                    <div role="tabpanel" class="tab-pane active" id="supStatus">
                      <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                          <?php echo CHtml::dropDownList('Suppliers['.$count.'][status]', '', array('0'=>'Disabled', '1'=>'Newly Added', '2'=>'Approved', '3'=>'Verified'), array('empty'=>'Select Status', 'class'=>'form-control', 'id'=>'supStatusField'.$count)); ?>
                        </div>
                        <div class="col-md-3"></div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="supAdddate">
                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                          <?php 
                            echo CHtml::dropDownList("Suppliers[".$count."][dateOp]","",array(
                                  '>'=>'>',
                                  '<'=>'<',
                                  '='=>'=',
                                  '<='=>'<=',
                                  '>='=>'>=',
                                  '<>'=>'<>',
                                ),
                              array('empty'=>'Operators', 'class'=>'form-control', 'id'=>'suppStart_date_op'.$count)
                            );
                          ?>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                          <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                              'name' => 'Suppliers['.$count.'][date]',
                              'htmlOptions' => array(
                                'dateFormat' => 'yy-mm-dd',
                                'size' => '52',         // textField size
                                'maxlength' => '100' ,
                                'class'=>'form-control',   // textField maxlength
                                'placeholder'=>'Select a date'
                              ),
                              'options' => array(
                                'dateFormat'=>'yy-mm-dd',
                                'changeMonth'=>true,
                                'changeYear'=>true,
                              ),
                            ));
                          ?>
                        </div>
                        <div class="col-md-1"></div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="supLocation">Tab 3</div>
                    <div role="tabpanel" class="tab-pane" id="supLeads">Tab 4</div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row clientFilters" style="display:none;">
              <div class="col-md-12">
                <div role="tabpanel" class="nomar">

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs tabs-sm" role="tablist">
                    <li role="presentation" class="active"><a href="#clStatus" aria-controls="clStatus" role="tab" data-toggle="tab">Status</a></li>
                    <li role="presentation"><a href="#clAdddate" aria-controls="clAdddate" role="tab" data-toggle="tab">Add Date</a></li>
                    <li role="presentation"><a href="#clLocation" aria-controls="clLocation" role="tab" data-toggle="tab">Location</a></li>
                    <li role="presentation"><a href="#clLeads" aria-controls="clLeads" role="tab" data-toggle="tab">Leads</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content tabH">
                    <div role="tabpanel" class="tab-pane active" id="status">
                      <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                          <?php echo CHtml::dropDownList('Client['.$count.'][status]', '', array('0'=>'Disabled', '1'=>'Newly Added', '2'=>'Approved', '3'=>'Verified'), array('empty'=>'Select Status', 'class'=>'form-control', 'id'=>'supStatusField'.$count)); ?>
                        </div>
                        <div class="col-md-3"></div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="adddate">Tab 2</div>
                    <div role="tabpanel" class="tab-pane" id="location">Tab 3</div>
                    <div role="tabpanel" class="tab-pane" id="leads">Tab 4</div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add more here -->
</div>

<br/>
<!-- Add more filter button -->
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-2 pull-right">
        <?php echo CHtml::button('+ Add Filter', array('class'=>'btn vpblueLight', 'id'=>'addMoreFilters')); ?>
      </div>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>

<script type="text/javascript">

    var countFilters = $('#filtersCount').val();

    $(document).ready(function() {
      //switch filters
      $('.fromField').on('change', function() {
        var optionSelected = $("option:selected", this);
        var val = this.value;
        $('.initialInfo').hide();
        $('.clientFilters').hide();
        $('.supplierFilters').hide();
        if(val === "" || val == 0) $('.initialInfo').show();
        else if(val == 1) $('.supplierFilters').show();
        else if(val == 2) $('.clientFilters').show();
      });

      $('#addMoreFilters').click(function() {
        countFilters++;
        $('.colpan').collapse('hide');
        var dummy = $('#dummyPanel').html();
        var d = $(dummy);
        d.find('#heading0').attr('id', 'heading'+countFilters);
        d.find('#heading'+countFilters).attr('href', '#collapse'+countFilters);
        d.find('#heading'+countFilters).attr('aria-controls', 'collapse'+countFilters);
        d.find('#collapse0').attr('id', 'collapse'+countFilters);
        d.find('#collapse'+countFilters).attr('aria-labelledby', 'heading'+countFilters);
        d.find('#collapse'+countFilters).addClass('colpan');
        d.addClass('filterPanel');
        if ($(".allFilters .filterPanel")[0]){
          d.insertAfter('.allFilters .filterPanel:last');
        } else {
          $(".allFilters").append(d);
        }
      });

      $('.allFilters').on('click', '.dismissFilter', function() {
        var el = $(this).closest('.filterPanel');
        $(el,$('.allFilters')).remove();
      });
    });
</script>