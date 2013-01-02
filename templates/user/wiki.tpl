{include file="../user_header.tpl" title="Notiya"}
			<body>
				{include file="../../templates/user/nav.tpl" title="Note"}
				<div class="container">
					<div class="row">
						<div style="margin-top:10px;" class="span12">
							<div id="errors" class="row-fluid">
							</div>
							<div class="row-fluid">
								<form autocomplete="off" onsubmit="return validation('wiki');" class="well" method="POST" action="add.php">
										<input type="hidden" name="type" value="{$type}">
										<div id="title-control" class="control-group">
											<input id="wiki-title" name="wiki-title" type="text" class="span6" placeholder="عنوان مطلب">
										</div>
									
										
										<textarea id="note-content" class="span12" rows="20" name="wiki-content"></textarea>
									
									<button type="submit" id="save" class="btn btn-primary">ذخیره</button>
								</form>
							</div>
					</div>
				</div>
				<script type="text/javascript" src="../assets/js/scripts.js"></script>
				<script type="text/javascript" src="../assets/ajax/ajax.js"></script>
				<script type="text/javascript">
					var errorFlag=false;
					$(document).ready(function(){
						$('#wiki-title').keypress(function() {
							if((errorFlag) && ($('#wiki-title').val!=''))
							{
								errorFlag=false;
								$('#title-control').removeClass('error');
								$('#errors').html("");
						  	}
						});
					});
				</script>
{include file="../footer.tpl"}
				