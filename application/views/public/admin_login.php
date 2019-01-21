<?php include ('public_header.php'); ?>
<div class="container">
<!--form class="form-horizontal"-->
<?php echo form_open('login/admin_login', ['class'=>'form-horizontal']); ?>
  <fieldset>
    <legend>Admin Login</legend>
	<?php if ($error = $this->session->flashdata('login_faild')): ?>
	<!-- execute if flashdata is set, which is specifies in the login page-->
	<div class = "row">
		<div class = "col-lg-6">
			<div class = "alert alert-dismissible alert-danger">
				<?= $error ?>
			</div>
		</div>
	</div>
	<?php endif;?>
    <div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-2 control-label">User Name</label>
			  <div class="col-lg-10">
			  <?php echo form_input(['name'=>'username', 'class'=>'form-control', 'placeholder'=>'Username', 'value'=>set_value('username')]); ?>
				<!--input type="text" class="form-control" id="inputEmail" placeholder="UserName"-->
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<?php echo form_error('username'); ?>
		</div>
	</div>
    <div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			  <label for="inputPassword" class="col-lg-2 control-label">Password</label>
			  <div class="col-lg-10">
				<?php echo form_password(['name'=>'password', 'class'=>'form-control', 'placeholder'=>'Password', ''=>'']); ?>
				<!--input type="password" class="form-control" id="inputPassword" placeholder="Password"-->
				  
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<?php echo form_error('password'); ?>
		</div>
	</div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <!--button type="reset" class="btn btn-default">Cancel</button-->
		<?php echo form_reset(['name'=>'reset', 'value'=>'Reset', 'class'=>'btn btn-default']),
		form_submit(['name'=>'submit', 'value'=>'Login', 'class'=>'btn btn-primary']);?>
        <!--button type="submit" class="btn btn-primary">Submit</button-->
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php include ('public_footer.php'); ?>