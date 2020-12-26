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
    <section class="content col-xs-7">

    <div class="register-box-body " >
    <p class="login-box-msg">Contact US</p>

    <div class="content-frm">
    <!-- Display the status message -->
    <?php if(!empty($status)){ ?>
    <div class="status <?php echo $status['type']; ?>"><?php echo $status['msg']; ?></div>
    <?php } ?>

    <form action="" method="post">
        <div class="form-cw">
            <h2>Contact Us</h2>
            <button type="submit" name="contactSubmit" class="frm-submit" value="Submit">
                <img src="<?php echo base_url('assets/images/mail.png'); ?>">
            </button>
            <div class="clear"></div>
        </div>

    <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" 
            placeholder="Enter Your Name!">
            <?php echo form_error('name','<p class="field-error">','</p>'); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" 
            placeholder="Enter Your Email!">
            <?php echo form_error('email','<p class="field-error">','</p>'); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" 
            placeholder="Enter Your Subject!">
            <?php echo form_error('subject','<p class="field-error">','</p>'); ?>
            <span class="glyphicon glyphicon-pushpin form-control-feedback"></span>
        </div>

      <div class="form-group has-feedback">
            <textarea rows="10" cols="70" class="form-control" name="subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" 
            placeholder="Enter Your Message!"></textarea>
            <?php echo form_error('message','<p class="field-error">','</p>'); ?>
        <span class="glyphicon glyphicon-comment form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name="contactSubmit" value="Send" class="btn btn-success ">
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="row">
      <div class="col-md-12"> 
        
      </div>
    </div>
          </div>
        </div>
    </section> 
  </div>