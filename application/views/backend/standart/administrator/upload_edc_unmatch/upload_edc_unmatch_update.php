
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Upload Edc Unmatch        <small>Edit Upload Edc Unmatch</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/upload_edc_unmatch'); ?>">Upload Edc Unmatch</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Upload Edc Unmatch</h3>
                            <h5 class="widget-user-desc">Edit Upload Edc Unmatch</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/upload_edc_unmatch/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_upload_edc_unmatch', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_upload_edc_unmatch', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="MERCHANT_DBA_NAME" class="col-sm-2 control-label">MERCHANT DBA NAME 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MERCHANT_DBA_NAME" id="MERCHANT_DBA_NAME" placeholder="MERCHANT DBA NAME" value="<?= set_value('MERCHANT_DBA_NAME', $upload_edc_unmatch->MERCHANT_DBA_NAME); ?>">
                                <small class="info help-block">
                                <b>Input MERCHANT DBA NAME</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MSO" class="col-sm-2 control-label">MSO 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MSO" id="MSO" placeholder="MSO" value="<?= set_value('MSO', $upload_edc_unmatch->MSO); ?>">
                                <small class="info help-block">
                                <b>Input MSO</b> Max Length : 25.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SOURCE_CODE" class="col-sm-2 control-label">SOURCE CODE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SOURCE_CODE" id="SOURCE_CODE" placeholder="SOURCE CODE" value="<?= set_value('SOURCE_CODE', $upload_edc_unmatch->SOURCE_CODE); ?>">
                                <small class="info help-block">
                                <b>Input SOURCE CODE</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="WILAYAH" class="col-sm-2 control-label">WILAYAH 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="WILAYAH" id="WILAYAH" placeholder="WILAYAH" value="<?= set_value('WILAYAH', $upload_edc_unmatch->WILAYAH); ?>">
                                <small class="info help-block">
                                <b>Input WILAYAH</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CHANNEL" class="col-sm-2 control-label">CHANNEL 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CHANNEL" id="CHANNEL" placeholder="CHANNEL" value="<?= set_value('CHANNEL', $upload_edc_unmatch->CHANNEL); ?>">
                                <small class="info help-block">
                                <b>Input CHANNEL</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TAHUN" class="col-sm-2 control-label">TAHUN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-2">
                                <select  class="form-control chosen chosen-select-deselect" name="TAHUN" id="TAHUN" data-placeholder="Select TAHUN" >
                                    <option value=""></option>
                                    <?php for ($i = 1970; $i < date('Y')+100; $i++){ ?>
                                    <option <?=  $i ==  $upload_edc_unmatch->TAHUN ? 'selected' : ''; ?> value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php }; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input TAHUN</b> Max Length : 4.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="BULAN" class="col-sm-2 control-label">BULAN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="BULAN" id="BULAN" placeholder="BULAN" value="<?= set_value('BULAN', $upload_edc_unmatch->BULAN); ?>">
                                <small class="info help-block">
                                <b>Input BULAN</b> Max Length : 5.</small>
                            </div>
                        </div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/upload_edc_unmatch';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_upload_edc_unmatch = $('#form_upload_edc_unmatch');
        var data_post = form_upload_edc_unmatch.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_upload_edc_unmatch.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#upload_edc_unmatch_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
           
    
    }); /*end doc ready*/
</script>