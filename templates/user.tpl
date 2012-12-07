{include file="../templates/user_header.tpl" title="Notiya"}
			<body>
				{include file="../templates/user/nav.tpl" title="Notiya"}
				<div class="container">
					<div class="row">
						<div class="span12">
							<div class="well" style="margin-top:10px;">
								<div class="row-fluid">
									<select id="type" name="type">
										<option value="note">یادداشت</option>
										<option value="link">لینک</option>
									</select>
								</div>
								<div class="row-fluid">
										<input id="add" type="submit" class="btn btn-success" value="اضافه کردن"/>
										<input id="view" type="submit" class="btn btn-primary" value="مشاهده"/>
								</div>
								<div class="row-fluid" style="margin-top:10px;">
									<div  id="result" class="span12">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript" src="../assets/ajax/ajax.js"></script>
				<script type="text/javascript">
					var errorFlag=false;
					$(document).ready(function(){

						$('#note-title').keypress(function() {
							if((errorFlag) && ($('#note-title').val!=''))
							{
								$('#title-control').removeClass('error');
								$('#errors').html("");
								errorFlag=false;
						  	}
						});
						$('#add').click(function()
						{
							var temp=$('#type').val();
							window.location.href = "add.php?type="+temp;
						});
						$('#view').click(function()
						{

							var tempType = $('#type').val();
							var data = { "type" : tempType}
							request("ajax/list.php",data,"result");
							//alert(result);
							//$('#result').html(result);
						});

						

					});
					
				</script>
{include file="../templates/footer.tpl"}
				