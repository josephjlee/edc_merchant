
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Upload Edc Unmatch      <small><?= cclang('detail', ['Upload Edc Unmatch']); ?> </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/upload_edc_unmatch'); ?>">Upload Edc Unmatch</a></li>
      <li class="active"><?= cclang('detail'); ?></li>
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
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Upload Edc Unmatch</h3>
                     <h5 class="widget-user-desc">Detail Upload Edc Unmatch</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_upload_edc_unmatch" id="form_upload_edc_unmatch" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">MID </label>

                        <div class="col-sm-8">
                           <?= _ent($upload_edc_unmatch->MID); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">MERCHANT DBA NAME </label>

                        <div class="col-sm-8">
                           <?= _ent($upload_edc_unmatch->MERCHANT_DBA_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">MSO </label>

                        <div class="col-sm-8">
                           <?= _ent($upload_edc_unmatch->MSO); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">SOURCE CODE </label>

                        <div class="col-sm-8">
                           <?= _ent($upload_edc_unmatch->SOURCE_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">WILAYAH </label>

                        <div class="col-sm-8">
                           <?= _ent($upload_edc_unmatch->WILAYAH); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CHANNEL </label>

                        <div class="col-sm-8">
                           <?= _ent($upload_edc_unmatch->CHANNEL); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">TAHUN </label>

                        <div class="col-sm-8">
                           <?= _ent($upload_edc_unmatch->TAHUN); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">BULAN </label>

                        <div class="col-sm-8">
                           <?= _ent($upload_edc_unmatch->BULAN); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('upload_edc_unmatch_update', function() use ($upload_edc_unmatch){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit upload_edc_unmatch (Ctrl+e)" href="<?= site_url('administrator/upload_edc_unmatch/edit/'.$upload_edc_unmatch->MID); ?>"><i class="fa fa-edit" ></i> <?= cclang('update', ['Upload Edc Unmatch']); ?> </a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/upload_edc_unmatch/'); ?>"><i class="fa fa-undo" ></i> <?= cclang('go_list_button', ['Upload Edc Unmatch']); ?></a>
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
