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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>
                
                <?php echo form_open("user/cari"); ?>
                <select name="cariberdasarkan">
                  <option value="nama">Nama</option>
                  <option value="nim">NIM</option>
                  <option value="jenis_kelamin">Jenis Kelamin</option> 
                </select>
                <input type="text" name="yangdicari" id="" autofocus>
                <input type="submit" value="Search">
                <br><br>
                <?php echo form_close(); ?> 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="mhs" class="table table-hover">
                  <tbody><tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <td><th>Aksi</th></td>
                    <?php  
                    $no = 1;
                    if ($jumlah_data > 0) {  
                    foreach ($data_mahasiswa as $row)   
                    { ?>  
                      <tr >  
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row->nim?></td> 
                      <td><?php echo $row->nama?></td> 
                      <td><img src="<?php echo base_url().'uploads/'.$row->foto ?>" width = "70px"> </td>
                      <td><?php echo $row->namaJurusan?></td>
                      <td><?php echo $row->jenis_kelamin?></td>   
                      <td><a href="<?php echo base_url(); ?>index.php/user/ubah/<?php echo $row->nim; ?>">Ubah</a></td>   
                      <td><a href="<?php echo base_url(); ?>index.php/user/hapus/<?php echo $row->nim; ?>">Hapus</a></td>   
                      </tr>  
                      <?php  
                  }  
                  } else { ?>  
                    <tr align='center'>  
                    <td colspan=6>Data Mahasiswa kosong</td>  
                    </tr>  
                    <?php } ?>
                </tbody></table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

