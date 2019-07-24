<script src="<?= BASE_ASSET; ?>js/custom.js"></script>

<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>

<?php $this->load->view('core_template/fine_upload'); ?>
<!--  -->

<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Form_unmatchedc/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      UnmatchEDC<small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">UnmatchEDC</li>
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
                     <div class="row pull-right">
                        <?php is_allowed('form_unmatchedc_export', function(){?>
                           <a class="btn btn-flat btn-success" title="<?= cclang('Upload', 'Unmatch EDC'); ?>" href="<?= site_url('/administrator/form/view/5'); ?>"><i class="fa fa-file-excel-o" ></i> UPLOAD FILE</a>

                           <!-- <a class="btn btn-flat btn-success" title="<?= cclang('export', 'Form Unmatchedc'); ?>" href="<?= site_url('administrator/form_unmatchedc/export'); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?></a> -->
                           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->
                           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

                           <!-- <a class="btn btn-flat btn-success" id="upload_modal1" title="UPLOAD" href="#"><i class="fa fa-file-excel-o" ></i> UPLOAD </a> -->

                        
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">UnmatchEDC</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', 'UnmatchEDC'); ?>  <i class="label bg-yellow"><?= $form_unmatchedc_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_form_unmatchedc" id="form_form_unmatchedc" action="<?= base_url('administrator/form_unmatchedc/index'); ?>">
                  
                  <div class="table-responsive">
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>File</th>
                           <th>Jumlah Rows</th>
                           <th>Timestamp</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_form_unmatchedc">
                     <?php foreach($form_unmatchedcs as $form_unmatchedc): ?>
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $form_unmatchedc->id; ?>">
                           </td>
                           <td>
                              <?php if (!empty($form_unmatchedc->file)): ?>
                                <?php if (is_image($form_unmatchedc->file)): ?>
                                <a class="fancybox" rel="group" href="<?= BASE_URL . 'uploads/form_unmatchedc/' . $form_unmatchedc->file; ?>">
                                  <img src="<?= BASE_URL . 'uploads/form_unmatchedc/' . $form_unmatchedc->file; ?>" class="image-responsive" alt="image form_unmatchedc" title="file form_unmatchedc" width="40px">
                                </a>
                                <?php else: ?>
                                  <a href="<?= BASE_URL . 'administrator/file/download/form_unmatchedc/' . $form_unmatchedc->file; ?>">
                                   <img src="<?= get_icon_file($form_unmatchedc->file); ?>" class="image-responsive image-icon" alt="image form_unmatchedc" title="file <?= $form_unmatchedc->file; ?>" width="40px"> 
                                 </a>
                                <?php endif; ?>
                              <?php endif; ?>
                           </td>
<?php 
$link_csv = BASE_URL . 'uploads/form_unmatchedc/' . $form_unmatchedc->file;
$fp = file($link_csv);
$jumlah_rows =  count($fp)-1;
?>                           
                           <td><?= _ent($jumlah_rows); ?></td>

                           <td><?= _ent($form_unmatchedc->timestamp); ?></td> 
                           <td width="200">


                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/form_unmatchedc/delete/' . $form_unmatchedc->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> APPROVE</a>

                              <!-- <?php is_allowed('form_unmatchedc_view', function() use ($form_unmatchedc){?>
                              <a href="<?= site_url('administrator/form_unmatchedc/view/' . $form_unmatchedc->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?>
                              <?php }) ?>
                              <?php is_allowed('form_unmatchedc_update', function() use ($form_unmatchedc){?>
                              <a href="<?= site_url('administrator/form_unmatchedc/edit/' . $form_unmatchedc->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a>
                              <?php }) ?>
                              <?php is_allowed('form_unmatchedc_delete', function() use ($form_unmatchedc){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/form_unmatchedc/delete/' . $form_unmatchedc->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a>
                               <?php }) ?> -->

                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($form_unmatchedc_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                            <?= cclang('data_is_not_avaiable', 'Form UnmatchEDC'); ?>
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete"><?= cclang('delete'); ?></option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="apply bulk actions"><?= cclang('apply_button'); ?></button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="<?= cclang('filter'); ?>" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value=""><?= cclang('all'); ?></option>
                            <option <?= $this->input->get('f') == 'file' ? 'selected' :''; ?> value="file">File</option>
                           <option <?= $this->input->get('f') == 'timestamp' ? 'selected' :''; ?> value="timestamp">Timestamp</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/form_unmatchedc');?>" title="<?= cclang('reset_filter'); ?>">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
                     </div>
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:800px">

            <!--  -->
            <!-- <div class="modal-content">

                <div class="modal-header">
                <center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detail report Wilayah '.$wilayah.' </h4>
                    <h5 class="modal-title" id="myModalLabel">Bulan :  '.$bulan.'  Tahun : '.$tahun.'</h5>
                </center>
                </div>

            <div class="modal-body"> -->

            <!--  -->
            <span class="loading loading-hide">
            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
            <i><?= cclang('loading_saving_data'); ?></i>
            </span>

            <div id="result_modal"></div>

            <!--  -->
            </div>

            </div>
            <!--  -->
                </div>
            </div>
<!--MODAL-->


<!-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div> -->


<!-- Page script -->
<script>
  $(document).ready(function(){

   $(document).on('click', '#upload_modal1', function (e) {

console.log('klikkkkk modal');


$('#myModal').modal('show');





// var url='<?= site_url('administrator/edc_detail/getModalResult1/') ?>'+dataTahun+'/'+dataBulan+'/'+Wilayah+'/'+TYPE_MID;

var url='<?= site_url('administrator/edc_detail/getModalUploadUnmatcEdc/') ?>';
// 
$('#result_modal').load(url);


});   


    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_approve_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_approve_it'); ?>",
          cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_form_unmatchedc').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_approve_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_approve_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/form_unmatchedc/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "<?= cclang('please_choose_bulk_action_first'); ?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>

<!--  -->

<!-- Page script -->
<script>
    $(document).ready(function(){
          $('.form-preview').submit(function(){
        return false;
     });

     $('input[type="checkbox"].flat-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
     });


    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_form_unmatchedc = $('#form_form_unmatchedc');
        var data_post = form_form_unmatchedc.serializeArray();
        var save_type = $(this).attr('data-stype');
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + 'form/form_unmatchedc/submit',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id_file = $('#form_unmatchedc_file_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            if (typeof id_file !== 'undefined') {
                    $('#form_unmatchedc_file_galery').fineUploader('deleteFile', id_file);
                }
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
            window.location.href = res.redirect; 
            // dev 08072019                
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 1000);
        });
    
        return false;
      }); /*end btn save*/


      
             
       var params = {};
       params[csrf] = token;

       $('#form_unmatchedc_file_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + 'form/form_unmatchedc/upload_file_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + 'form/form_unmatchedc/delete_file_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
          multiple : false,
          validation: {
              allowedExtensions: ["*"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#form_unmatchedc_file_galery').fineUploader('getUuid', id);
                   $('#form_unmatchedc_file_uuid').val(uuid);
                   $('#form_unmatchedc_file_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#form_unmatchedc_file_uuid').val();
                  $.get(BASE_URL + 'form/form_unmatchedc/delete_file_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#form_unmatchedc_file_uuid').val('');
                  $('#form_unmatchedc_file_name').val('');
                }
              }
          }
      }); /*end file galey*/
           
    }); /*end doc ready*/
</script>