<script type="text/javascript">
	$(".hal_tambah").hide();
	$("#seks").hide();
	$("#hilang").hide();
	$(".menu").click(function(){
		nm = $(this).children("h3").text().toLowerCase();
		$("#isi").html('');
		// $("#isi").append("<div class='col-lg-12 "+nm+"'>"+$("#"+nm).html()+"</div>")
		$("#isi").append($("#hilang").html())
		$(".col-md-12").hide();
		$("#"+nm).show();
		$("#"+nm+" #lihat").show()
		$("#seks").fadeIn();
		$("#aksi").val(nm);
		viewData(nm);
	})
</script>