$(document).ready(function () {
	$(".modal").on("hidden.bs.modal", function () {
		$(".modal-body input").val("");
	});
});
