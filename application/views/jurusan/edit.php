<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Jurusan
        <small>Add Jurusan</small>
      </h1>
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


                <?php   
                  $id               =    $data_jurusan['id'];
                  $namaJurusan      =    $data_jurusan['namaJurusan'];      
                ?>


                  <?php echo form_open_multipart('jurusan/ubah_data'); ?> 
                    <div class="form-group">
                      <label for="id">ID*</label>
                      <input type="text" class="form-control" name="id" value="<?php echo $id;?>" placeholder="Masukkan ID" size="50"><?php echo form_error('id'); ?>
                    </div>

                    <div class="form-group">
                      <label for="namaJurusan">Nama Jurusan*</label>
                      <input type="text" class="form-control" name="namaJurusan" value="<?php echo $namaJurusan;?>" placeholder="Masukkan Nama Jurusan" size="50"><?php echo form_error('namaJurusan'); ?>
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