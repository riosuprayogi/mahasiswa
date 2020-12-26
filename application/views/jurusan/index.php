<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Jurusan
        <small>list jurusan</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Jurusan</h3>
              <a href="<?= base_url('user/laporanpdf')?>" class="fa fa-download btn btn-danger pull-right"> Download PDF</a>
              <a href="<?= base_url('index.php/User/export')?>" class="fa fa-file-excel-o btn btn-success pull-right"> Export To Excel</a>
              <a href="<?= base_url('jurusan/form_insert')?>" class="fa fa-plus btn btn-info pull-right"> Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mhs" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Nama Jurusan</th>
                    <th>Action</th>
                </thead>
                <tbody>
                
                <?php  
                
                  $no = 1;
                  
                  if ($jumlah_data > 0) {  
                    foreach ($data_jurusan as $row)   
                    { ?>  
                      <tr>  
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->id?></td>
                        <td><?php echo $row->namaJurusan?></td>  
                        <td align="center">
                          <a href="<?php echo base_url(); ?>index.php/jurusan/ubah/<?php echo $row->id; ?>" class="btn btn-info btn-xs" onclick="return confirm('Are You Sure To Edit?')" >Edit</a>   
                        </td> 
                        
                      </tr>  
                      <?php     
                    }  
                    
                    } else { ?>  
                    <tr align='center'>  
                    <td colspan=6>Data Jurusan kosong</td>  
                    </tr>  
                    <?php } ?>
                    
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->