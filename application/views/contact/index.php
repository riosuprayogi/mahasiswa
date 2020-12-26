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
    
    <!-- Contact form -->
    <form action="" method="post">
        
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" autofocus value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" placeholder="Insert Name!">
            <?php echo form_error('name','<p class="field-error">','</p>'); ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" placeholder="Insert Email!">
            <?php echo form_error('email','<p class="field-error">','</p>'); ?>
            <span class="fa fa-at form-control-feedback"></span>
        </div>
        
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" placeholder="Insert Subject!">
            <?php echo form_error('subject','<p class="field-error">','</p>'); ?>
            <span class="glyphicon glyphicon-pushpin form-control-feedback"></span>
        </div>
        
        <div class="form-group has-feedback">
            <textarea rows="10" cols="70" name="message" class="form-control" placeholder="Insert Your Message!"><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
            <?php echo form_error('message','<p class="field-error">','</p>'); ?>
            <span class="glyphicon glyphicon-comment form-control-feedback"></span>
        </div>
        
        <div class="row">
        <!-- /.col -->
            <div class="col-xs-4">
                <input type="submit" name="contactSubmit" value="Send" class="btn btn-info ">
            </div>
        <!-- /.col -->
        </div>
    </form>
</div>


          </div>
        </div>
    </section> 
  </div>