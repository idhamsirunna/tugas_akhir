$(".form-check-input").on("click", function() {
	const menuId = $(this).data("menu");
	const roleId = $(this).data("role");
	$.ajax({
		url: "<?= base_url('admin/changeAccess'); ?>",
		type: "post",
		data: {
			menuId: menuId,
			roleId: roleId
		},
		success: function() {
			document.location.href = "<?= base_url('admin/roleaccess/') ?>" + roleId;
		}
	});
});

$(".custom-file-input").on("change", function() {
	let fileName = $(this)
		.val()
		.split("\\")
		.pop();
	$(this)
		.next(".custom-file-label")
		.addClass("selected")
		.html(fileName);
});
