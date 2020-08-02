<ol class="breadcrumb">
	<li><a href="<?php echo base_url('dashboard') ?>">Home</a></li>
	<li class="active">Manage Users</li>
</ol>

<div class="panel panel-default">
	<div class="panel-body">
		<fieldset>
			<legend>Manage Users</legend>

			<div id="messages"></div>

			<div class="pull pull-right">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addUser" id="addUserModelBtn">
					<i class="glyphicon glyphicon-plus-sign"></i> Add User
				</button>
			</div>

			<br /> <br /> <br />

			<table id="manageUsersTable" class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>

		</fieldset>
	</div>
</div>

<!-- add user -->
<div class="modal fade" tabindex="-1" role="dialog" id="addUser">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add User</h4>
			</div>

			<form class="form-horizontal" method="post" id="createUserForm" action="Users/create">

				<div class="modal-body">

					<div id="add-user-messages"></div>

					<div class="form-group">
						<label for="fname" class="col-sm-4 control-label">Frist Name : </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="lname" class="col-sm-4 control-label">Last Name : </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="col-sm-4 control-label">Username : </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="username" name="username" placeholder="Username">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-4 control-label">Password : </label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-4 control-label">Email : </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="email" name="email" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<label for="type" class="col-sm-4 control-label">Role : </label>
						<div class="col-sm-8">
							<select class="form-control" name="type" id="type">
								<option value="">Select</option>
								<?php foreach ($resources as $key => $value) { ?>
									<option value="<?php echo $value['id'] ?>"><?php echo $value['text'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save User</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- edit user -->
<div class="modal fade" tabindex="-1" role="dialog" id="updateUserModal">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Edit User</h4>
			</div>

			<form class="form-horizontal" method="post" id="editUserForm" action="users/updateInfo">

				<div class="modal-body">

					<div id="edit-user-messages"></div>

					<div class="form-group">
						<label for="editFname" class="col-sm-4 control-label">First Name : </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="editFname" name="fname" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="editLname" class="col-sm-4 control-label">Last Name : </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="editLname" name="lname" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="editUsername" class="col-sm-4 control-label">Username : </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="editUsername" name="username" placeholder="Username">
						</div>
					</div>
					<!-- <div class="form-group">
						<label for="editPassword" class="col-sm-4 control-label">Password : </label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="editPassword" name="password" placeholder="Password">
						</div>
					</div> -->
					<div class="form-group">
						<label for="editEmail" class="col-sm-4 control-label">Email : </label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="editEmail" name="email" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<label for="editType" class="col-sm-4 control-label">Role : </label>
						<div class="col-sm-8">
							<select class="form-control" name="type" id="editType">
								<option value="">Select</option>
								<?php foreach ($resources as $key => $value) { ?>
									<option value="<?php echo $value['id'] ?>"><?php echo $value['text'] ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<!-- /modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Edit User</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- remove user -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Remove User</h4>
			</div>
			<div class="modal-body">
				<div id="remove-messages"></div>
				<p>Do you really want to remove ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="removeUserBtn">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script type="text/javascript" src="<?php echo base_url('custom/js/users.js') ?>"></script>