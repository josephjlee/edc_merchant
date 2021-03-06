
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Form_system_incoming/add';
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
      System Incoming<small><?= cclang('list_all'); ?></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">System Incoming</li>
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
                        <?php is_allowed('form_system_incoming_export', function(){?>
                        <a class="btn btn-flat btn-success" title="<?= cclang('export', 'Form System Incoming'); ?>" href="<?= site_url('administrator/form_system_incoming/export'); ?>"><i class="fa fa-file-excel-o" ></i> <?= cclang('export'); ?></a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">System Incoming</h3>
                     <h5 class="widget-user-desc"><?= cclang('list_all', 'System Incoming'); ?>  <i class="label bg-yellow"><?= $form_system_incoming_counts; ?>  <?= cclang('items'); ?></i></h5>
                  </div>

                  <form name="form_form_system_incoming" id="form_form_system_incoming" action="<?= base_url('administrator/form_system_incoming/index'); ?>">
                  
                  <div class="table-responsive">
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>Kode Sales</th>
                           <th>No Identitas</th>
                           <th>Nama Nasabah</th>
                           <th>Dob</th>
                           <th>Nama Perusahaan</th>
                           <th>Kota</th>
                           <th>Jenis Perusahaan</th>
                           <th>Kode Pos</th>
                           <th>Sourcecode</th>
                           <th>Keterangan</th>
                           <th>Batch Id</th>
                           <th>Status</th>
                           <!-- <th>Action</th> -->
                        </tr>
                     </thead>
                     <tbody id="tbody_form_system_incoming">
                     <?php foreach($form_system_incomings as $form_system_incoming): ?>
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $form_system_incoming->id; ?>">
                           </td>
                           <td><?= _ent($form_system_incoming->kode_sales); ?></td> 
                           <td><?= _ent($form_system_incoming->no_identitas); ?></td> 
                           <td><?= _ent($form_system_incoming->nama_nasabah); ?></td> 
                           <td><?= _ent($form_system_incoming->dob); ?></td> 
                           <td><?= _ent($form_system_incoming->nama_perusahaan); ?></td> 
                           <td><?= _ent($form_system_incoming->kota); ?></td> 
                           <td><?= _ent($form_system_incoming->jenis_perusahaan); ?></td> 
                           <td><?= _ent($form_system_incoming->kode_pos); ?></td> 
                           <td><?= _ent($form_system_incoming->sourcecode); ?></td> 
                           <td><?= _ent($form_system_incoming->keterangan); ?></td> 
                           <td><?= _ent($form_system_incoming->batch_id); ?></td> 
                           <td><?= _ent($form_system_incoming->status); ?></td>
                           <!-- <td width="200"> -->
                              <?php is_allowed('form_system_incoming_view', function() use ($form_system_incoming){?>
                              <!-- <a href="<?= site_url('administrator/form_system_incoming/view/' . $form_system_incoming->id); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> <?= cclang('view_button'); ?> -->
                              <?php }) ?>
                              <?php is_allowed('form_system_incoming_update', function() use ($form_system_incoming){?>
                              <!-- <a href="<?= site_url('administrator/form_system_incoming/edit/' . $form_system_incoming->id); ?>" class="label-default"><i class="fa fa-edit "></i> <?= cclang('update_button'); ?></a> -->
                              <?php }) ?>
                              <?php is_allowed('form_system_incoming_delete', function() use ($form_system_incoming){?>
                              <!-- <a href="javascript:void(0);" data-href="<?= site_url('administrator/form_system_incoming/delete/' . $form_system_incoming->id); ?>" class="label-default remove-data"><i class="fa fa-close"></i> <?= cclang('remove_button'); ?></a> -->
                               <?php }) ?>
                           <!-- </td> -->
<?/*
 */?>

                        </tr>
                      <?php endforeach; ?>
                      <?php if ($form_system_incoming_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                            <?= cclang('data_is_not_avaiable', 'Form System Incoming'); ?>
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
                            <option <?= $this->input->get('f') == 'kode_sales' ? 'selected' :''; ?> value="kode_sales">Kode Sales</option>
                           <option <?= $this->input->get('f') == 'no_identitas' ? 'selected' :''; ?> value="no_identitas">No Identitas</option>
                           <option <?= $this->input->get('f') == 'nama_nasabah' ? 'selected' :''; ?> value="nama_nasabah">Nama Nasabah</option>
                           <option <?= $this->input->get('f') == 'dob' ? 'selected' :''; ?> value="dob">Dob</option>
                           <option <?= $this->input->get('f') == 'nama_perusahaan' ? 'selected' :''; ?> value="nama_perusahaan">Nama Perusahaan</option>
                           <option <?= $this->input->get('f') == 'kota' ? 'selected' :''; ?> value="kota">Kota</option>
                           <option <?= $this->input->get('f') == 'jenis_perusahaan' ? 'selected' :''; ?> value="jenis_perusahaan">Jenis Perusahaan</option>
                           <option <?= $this->input->get('f') == 'kode_pos' ? 'selected' :''; ?> value="kode_pos">Kode Pos</option>
                           <option <?= $this->input->get('f') == 'sourcecode' ? 'selected' :''; ?> value="sourcecode">Sourcecode</option>
                           <option <?= $this->input->get('f') == 'keterangan' ? 'selected' :''; ?> value="keterangan">Keterangan</option>
                           <option <?= $this->input->get('f') == 'batch_id' ? 'selected' :''; ?> value="batch_id">Batch Id</option>
                           <option <?= $this->input->get('f') == 'status' ? 'selected' :''; ?> value="status">Status</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="<?= cclang('filter_search'); ?>">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/form_system_incoming');?>" title="<?= cclang('reset_filter'); ?>">
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

<!-- Page script -->
<script>
  $(document).ready(function(){
   
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "<?= cclang('are_you_sure'); ?>",
          text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
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
      var serialize_bulk = $('#form_form_system_incoming').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?= cclang('yes_delete_it'); ?>",
            cancelButtonText: "<?= cclang('no_cancel_plx'); ?>",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/form_system_incoming/delete?' + serialize_bulk;      
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