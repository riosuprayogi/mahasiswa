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
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        
        <form action="<?php echo base_url('user/form_insert'); ?>" method="post">
        <div class="box-body">
                <div class="form-group">
                  <label for="nim">NIM</label>
                  <input type="text" class="form-control" id="nim" placeholder="Enter NIM">
                  <small class=icon fa fa-ban><?= form_error('nim'); ?></small>
                </div> 

                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="Enter Nama">
                  <small class=icon fa fa-ban><?= form_error('nama'); ?></small>
                </div> 

                <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin</label> 
                  <div class="radio">
                  <label>
                      <input type="radio" name="jeniskelamin" id="jeniskelamin" value="PRIA" checked>PRIA
                  </label>
                  </div>
                  <div class="radio">
                    <label for="jeniskelamin">
                      <input type="radio" name="jeniskelamin" id="jeniskelamin" value="WANITA">WANITA
                    </label>
                  </div>
                </div>

                <div class="form-group">
                <label for="id_jurusan">Jurusan</label>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                <option>1. DKV</option>
                <option>2. Teknik Informatika</option>
                <option>3. Sistem Informasi</option>
                <option>4. Teknik Industri</option>
                </select>
              </div>


              <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" id="alamat" placeholder="Enter Alamat">
                  <small class=icon fa fa-ban><?= form_error('alamat'); ?></small>
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" id="foto">

                  <p class="help-block">Example block-level help text here.</p>
                </div> 

              
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        
          </div>
          </form>
    </section> 
  </div>

  


