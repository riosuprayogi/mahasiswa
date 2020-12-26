<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact US
        <small>Contact US</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content col-xs-5">

    <div class="register-box-body " >
    <p class="login-box-msg">Contact US</p>

    <form action="<?php echo base_url('auth/registration'); ?>" method="post">
               <?=form_open()?>
                <div class="form-group row">
                 <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="name" class="form-control" id="inputEmail3" placeholder="Email">
                    <?=form_error('name')?>
                  </div>
                </div>
               <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                 <div class="col-sm-10">
                   <?=form_input('email',set_value('email'),array('class' => 'form-control','id' => 'inputPassword3','placeholder'=>'Input Your Name!'))?>
                   <?=form_error('email')?>
                 </div>
               </div>

               <div class = "form-group row">
                <?=form_label('Message','idmessage',array('class' => 'col-sm-2 col-form-label'))?>
                  <div class = "col-sm-10">
                  <?=form_textarea('message', set_value('message'), array('id' => 'idmessage'))?>
                  <?=form_error('message')?>
                  </div>

               </div>

                <div class="form-group row">
                 <div class="col-sm-10">
                 <?=form_submit('sendmail','Send Email',array('class'=> 'btn btn-primary'))?>
                  </div>
                </div>
              </form>
          </div>
        </div>
    </section> 
  </div>