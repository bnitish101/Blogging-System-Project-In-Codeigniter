<?php include_once ('admin_header.php'); ?>
<div class="container">
<!--form class="form-horizontal"-->
<?php echo form_open_multipart('admin/store_article', ['class'=>'form-horizontal']); ?><!--55 to upload any file-->
<?php echo form_hidden('user_id', $this->session->userdata('user_id')) ?>
<?php echo form_hidden('created_at', date('Y-m-d H:i:s')); ?><!--53 to add date in the 'created_at' column-->
  <fieldset>
    <legend>Add Article</legend>
	<!--?php if ($error = $this->session->flashdata('login_faild')): ?-->
	<!-- execute if flashdata is set, which is specifies in the login page-->
	<!--div class = "row">
		<div class = "col-lg-6">
			<div class = "alert alert-dismissible alert-danger">
				<?= $error ?>
			</div>
		</div>
	</div-->
	<?php/* endif;*/?>
    <div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-4 control-label">Article Title</label>
			  <div class="col-lg-8">
			  <?php echo form_input(['name'=>'title', 'class'=>'form-control', 'placeholder'=>'Article Title', 'value'=>set_value('title')]); ?>
				<!--input type="text" class="form-control" id="inputEmail" placeholder="UserName"-->
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<?php echo form_error('title'); ?>
		</div>
	</div>
    <div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-4 control-label">Article body</label>
			  <div class="col-lg-8">
				<?php echo form_textarea(['name'=>'body', 'class'=>'form-control', 'placeholder'=>'Article Body', 'value'=>set_value('body')]); ?>
				<!--input type="password" class="form-control" id="inputPassword" placeholder="Password"-->
				  
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<?php echo form_error('body'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
			  <label for="inputEmail" class="col-lg-4 control-label">Select Image</label>
			  <div class="col-lg-8">
			  <?php echo form_upload(['name'=>'userfile', 'class'=>'form-control']); ?>
				<!--input type="text" class="form-control" id="inputEmail" placeholder="UserName"-->
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<?php if(isset($upload_error)) echo $upload_error; ?>
		</div>
	</div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <!--button type="reset" class="btn btn-default">Cancel</button-->
		<?php echo form_reset(['name'=>'reset', 'value'=>'Reset', 'class'=>'btn btn-default']),
		form_submit(['name'=>'submit', 'value'=>'Submit', 'class'=>'btn btn-primary']);?>
        <!--button type="submit" class="btn btn-primary">Submit</button-->
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php include_once ('admin_footer.php'); ?>