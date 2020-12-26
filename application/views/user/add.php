<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Mahasiswa
        <small>Add Mahasiswa</small>
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
          <h3 class="box-title">Add Page</h3>
        </div>
        
        <div class="container">
          <div class="row">
            <div class = "col-xs-12">
                <body>
                  <?php echo form_open_multipart('user/form_insert'); ?> 
                    <div class="form-group">
                      <label for="nim">NIM*</label>
                      <input type="text" class="form-control" name="nim" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan NIM" size="50"><?php echo form_error('nim'); ?>
                    </div>

                    <div class="form-group">
                      <label for="nama">Name*</label>
                      <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama" size="50"><?php echo form_error('nama'); ?>
                    </div>

                    <div class="form-group">
                      <label for="jenis_kelamin">Gender*</label>
                      <input type="radio" name="jenis_kelamin" value="PRIA" checked> PRIA
                      <input type="radio" name="jenis_kelamin" value="WANITA">WANITA
                      </div>

                      <div class="form-group">
                      <label for="id_jurusan">Major*</label>
                      <select name="id_jurusan" class="form-control">
                        <option>1. DKV</option>
                        <option>2. Teknik Informatika</option>
                        <option>3. Sistem Informasi</option>
                        <option>4. Teknik Industri</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="alamat">Address*</label>
                      <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Masukkan Alamat" size="50"><?php echo form_error('alamat'); ?>
                    </div>

                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" name="foto" size="50"><?php echo form_error('foto'); ?>
                    </div> 

                    <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-success">
                    </div>
                  <?php echo form_close(); ?>
                </body>
            </div>
          </div>
        </div>
    </section> 
  </div>