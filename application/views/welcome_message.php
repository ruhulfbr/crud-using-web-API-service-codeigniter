<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<section id="main">
		<div class="container">
			<h1>Contact Form</h1><hr>
			<div style="display: none;" class="alert alert-success"></div>
			<div style="display: none;" class="alert alert-danger"></div>
			<?php if($title!='Edit'){ ?>
			<form style="width: 400px; margin:0 auto;" class="center" action="<?php echo base_url('welcome/save'); ?>" method="post" id="contact_form">
				<div class="form-group">
					<input type="text" id="name" name="name" placeholder="Enter Name" class="form-control">
				</div>
				<input type="hidden" name="id" id="id" value="">
				<div class="form-group">
					<input type="text" id="email" name="email" placeholder="Enter Email" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" id="phone" name="phone" placeholder="Enter Phone" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success update" value="s" id="submit">Save Contact</button>
				</div>
			</form>
		<?php }else{ ?>
			<form style="width: 400px; margin:0 auto;" class="center" action="<?php echo base_url('welcome/update'); ?>" method="post" id="contact_form">
				<div class="form-group">
					<input type="text" name="contact_id" value="<?php  echo $contact->id; ?>">
					<input type="text" id="name" name="name" value="<?php  echo $contact->name; ?>" class="form-control">
				</div>
				<input type="hidden" name="id" id="id" value="">
				<div class="form-group">
					<input type="text" id="email" name="email" value="<?php  echo $contact->email; ?>" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" id="phone" name="phone" value="<?php  echo $contact->phone; ?>" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success update" value="s" id="submit">Update Contact</button>
				</div>
			</form>

		<?php } ?>

			<hr>
			<h1>Contact List</h1><hr>
			<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Sl No</th>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Phone</th>
			        <th>Date & time</th>
			        <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody id="showdata">
			    	<?php  
			    		$sl = 1;
			    		foreach ($contacts as $contact) {
			    	?>
				      <tr>
				        <td><?php echo $sl++; ?></td>
				        <td><?php echo $contact->name; ?></td>
				        <td><?php echo $contact->email; ?></td>
				        <td><?php echo $contact->phone; ?></td>
				        <td><?php echo $contact->date_time; ?></td>
				        <td>
				        	<a href="<?php echo base_url('welcome/edit/').$contact->id; ?>" class="btn btn-xs btn-primary">Edit</a>
				        	<a href="<?php echo base_url('welcome/delete/').$contact->id; ?>" data-value="<?php echo $contact->id; ?>" data-method="DELETE" onclick="return confirm('Are You About Delete??')" class="btn btn-xs btn-danger">Delete</a>
				        </td>
				      </tr>
				     <?php } ?>
			    </tbody>
			</table>
		</div>
	</section>


<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        	Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>