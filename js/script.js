$(document).ready(function () {
	$(".del").bind("click", function(e){
		return confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement ?");
	});
});
