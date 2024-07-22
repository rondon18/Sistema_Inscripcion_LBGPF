$("#link1").click(function() {
		$("#seccion3, #seccion2").hide();
		$("#seccion1").fadeIn();
		$("#link3, #link2").removeClass("active");
		$("#link1").addClass("active");
	});

	$("#link2").click(function() {
		$("#seccion1, #seccion3").hide();
		$("#seccion2").fadeIn();
		$("#link1, #link3").removeClass("active");
		$("#link2").addClass("active");
	});

	$("#link3").click(function() {
		$("#seccion1, #seccion2").hide();
		$("#seccion3").fadeIn();
		$("#link1, #link2").removeClass("active");
		$("#link3").addClass("active");
	});