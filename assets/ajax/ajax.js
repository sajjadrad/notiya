function request(url_str,param,id)
{
	var response="";
	$.ajax({
	  type: "POST",
	  url: url_str,
	  data: param
	})
	.done(function( res ) {
		$('#'+id).html(res);
	});
}
