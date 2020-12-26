<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Mahasiswa
        <small>list mahasiswa</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Mahasiswa</h3>
              <a href="<?= base_url('user/laporanpdf')?>" class="fa fa-download btn btn-danger pull-right"> Download PDF</a>
              <a href="<?= base_url('index.php/User/export')?>" class="fa fa-file-excel-o btn btn-success pull-right"> Download Excel</a>
              <a href="<?= base_url('user/form_insert')?>" class="fa fa-plus btn btn-info pull-right"> Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mhs" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Major</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                </thead>
                <tbody>
                
                <?php  
                
                  $no = 1;
                  
                  if ($jumlah_data > 0) {  
                    foreach ($data_mahasiswa as $row)   
                    { ?>  
                      <tr>  
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->nim?></td> 
                        <td><?php echo $row->nama?></td>
                        <td><img src="<?php echo base_url().'uploads/'.$row->foto ?>" width = 60px"> </td>
                        <td><?php echo $row->namaJurusan?></td>
                        <td><?php echo $row->jenis_kelamin?></td> 
                        <td><?php echo $row->alamat?></td>  
                        <td>
                          <a href="<?php echo base_url(); ?>index.php/user/ubah/<?php echo $row->nim; ?>" class="btn btn-info btn-xs" onclick="return confirm('Are You Sure To Edit?')">Edit</a>   
                          <a href="<?php echo base_url(); ?>index.php/user/hapus/<?php echo $row->nim; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure To Delete?')">Delete</a>
                        </td> 
                        
                      </tr>  
                      <?php     
                    }  
                    
                    } else { ?>  
                    <tr align='center'>  
                    <td colspan=6>Data Mahasiswa kosong</td>  
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