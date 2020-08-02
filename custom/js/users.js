var manageUsersTable;
var base_url = $("#base_url").val();

$(document).ready(() => {
	$("#topNavUsers").addClass('active');

	manageUsersTable = $("#manageUsersTable").DataTable({
		'ajax': base_url + 'users/fetchUsersData',
		'order': []
	});

	/*
	*------------------------------------
	* Add user modal button clicked
	*------------------------------------
	*/
	$("#addUserModelBtn").on('click', function () {
		$("#createUserForm")[0].reset();
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$("#add-user-messages").html('');
		$('.text-danger').remove();

		$("#createUserForm").unbind('submit').bind('submit', function () {
			var form = $(this);
			var url = form.attr('action');
			var type = form.attr('method');

			$.ajax({
				url: url,
				type: type,
				data: form.serialize(),
				dataType: 'json',
				success: function (response) {
					if (response.success == true) {

						$("#add-user-messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');

						manageUsersTable.ajax.reload(null, false);

						$("#createUserForm")[0].reset();
						$(".form-group").removeClass('has-error').removeClass('has-success');
						$(".text-danger").remove();
					}
					else {
						$.each(response.messages, function (index, value) {
							var key = $("#" + index);

							key.closest('.form-group')
								.removeClass('has-error')
								.removeClass('has-success')
								.addClass(value.length > 0 ? 'has-error' : 'has-success')
								.find('.text-danger').remove();

							key.after(value);

						});
					}
				} // /success
			}); // /ajax
			return false;
		}); // /create class form submit
	}); // /add class model btn
});

function editUser(user_id = null) {
	if (user_id) {
		/*Clear the form*/
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$('.text-danger').remove();
		$("#edit-user-messages").html('');
		$("#classId").remove();

		$.ajax({
			url: base_url + 'users/fetchUsersData/' + user_id,
			type: 'post',
			dataType: 'json',
			success: function (response) {
				$("#editFname").val(response.fname);
				$("#editLname").val(response.lname);
				$("#editUsername").val(response.username);
				// $("#editPassword").val(response.password);
				$("#editEmail").val(response.email);
				$("#editType").val(response.type);

				$("#editUserForm").unbind('submit').bind('submit', function () {
					var form = $(this);
					var url = form.attr('action');
					var type = form.attr('method');


					$.ajax({
						url: url + '/' + user_id,
						type: type,
						data: form.serialize(),
						dataType: 'json',
						success: function (response) {
							if (response.success == true) {
								$("#edit-user-messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
									'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
									response.messages +
									'</div>');

									manageUsersTable.ajax.reload(null, false);

								$(".form-group").removeClass('has-error').removeClass('has-success');
								$(".text-danger").remove();
							}
							else {
								if (response.messages instanceof Object) {
									$.each(response.messages, function (index, value) {
										var key = $("#edit" + makeFirstCap(index));

										key.closest('.form-group')
											.removeClass('has-error')
											.removeClass('has-success')
											.addClass(value.length > 0 ? 'has-error' : 'has-success')
											.find('.text-danger').remove();

										key.after(value);

									});
								}
								else {
									$("#edit-class-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
										'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
										response.messages +
										'</div>');
								} // /else									
							} // /else
						} // /success
					}); // /ajax

					return false;
				});


			} // /successs
		}); // /ajax
	} // /
}

/*
*------------------------------------
* remove user function
*------------------------------------
*/
function removeUser(user_id = null) {
	if (user_id) {
		$("#removeUserBtn").unbind('click').bind('click', function () {
			$.ajax({
				url: base_url + 'users/remove/' + user_id,
				type: 'post',
				dataType: 'json',
				success: function (response) {
					if (response.success === true) {
						$("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');

							manageUsersTable.ajax.reload(null, false);

						$("#removeUserModal").modal('hide');
					}
					else {
						$("#remove-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							response.messages +
							'</div>');
					}
				} // /success
			}); // /ajax
		}); // /remove class btn
	} // /if
} // /remove class

function makeFirstCap(string = null) {
	let res = string[0].toUpperCase();
	res += string.substr(1);
	return res;
}