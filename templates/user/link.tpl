{include file="../user_header.tpl" title="Note"}
			<body>
				{include file="../../templates/user/nav.tpl" title="Note"}
				<div class="container">
					<div class="row">
						<div style="margin-top:10px;" class="span12">
							<div id="errors" class="row-fluid">
							</div>
							<div class="row-fluid">
								<form autocomplete="off" onsubmit="return validation('link');" class="well" method="POST" action="add.php">
									
										
										<input type="hidden" name="type" value="{$type}">
										<div id="title-control" class="control-group">
											<input id="link-title" name="link-title" type="text" class="span6" placeholder="عنوان لینک">
										</div>
									
										<input style="direction:ltr;text-align:left;" id="link-content" name="link-content" type="text" class="span12" placeholder="Link">
										
										<textarea placeholder="توضیحات" id="link-description" class="span12" rows="2" name="link-description"></textarea>
									
									<button type="submit" id="save" class="btn btn-primary">ذخیره</button>
								</form>
							</div>
						
						
					</div>
				</div>
				<script type="text/javascript" src="../assets/ajax/ajax.js"></script>
				<script type="text/javascript">
					var errorFlag=false;
					$(document).ready(function(){
						$('#link-title').keypress(function() {
							if((errorFlag) && ($('#link-title').val!=''))
							{
								$('#title-control').removeClass('error');
								$('#errors').html("");
						  	}
						});
					});
					function validation(type)
					{
						//alert("hi");
						switch(type)
						{
							case 'note':
								if($('#note-title').val()=='')
								{
									errorFlag=true;
									$('#errors').html("<div class=\"alert alert-error\">عنوان یادداشت را وارد کنید.</div>");
									$('#title-control').addClass('error');
									$('#note-title').focus();
									return false;
								}
								return true;
								break;
							case 'link':
								if($('#link-title').val()=='')
								{
									errorFlag=true;
									$('#errors').html("<div class=\"alert alert-error\">عنوان لینک را وارد کنید.</div>");
									$('#title-control').addClass('error');
									$('#link-title').focus();
									return false;
								}
								return true;
								break;
						}
						return false;
					}

				</script>
{include file="../footer.tpl"}
				