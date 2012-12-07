{include file="../user_header.tpl" title="Notiya"}
			<body>
				{include file="../../templates/user/nav.tpl" title="Note"}
				<div class="container">
					<div class="row">
						<div style="margin-top:10px;" class="span12">
							<div id="errors" class="row-fluid">
							</div>
							<div class="row-fluid">
								<form autocomplete="off" onsubmit="return validation('note');" class="well" method="POST" action="add.php">
									
										
										<input type="hidden" name="type" value="{$type}">
										<div id="title-control" class="control-group">
											<input id="note-title" name="note-title" type="text" class="span6" placeholder="عنوان یادداشت">
										</div>
									
										
										<textarea id="note-content" class="span12" rows="4" name="note-content"></textarea>
									
									<button type="submit" id="save" class="btn btn-primary">ذخیره</button>
								</form>
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
						  	}
						});
						$('#save').click(function()
						{
							//$('#save').attr("disabled", "disabled");
							var title=$('#note-title').val();
							var content=$('#note-content').val();
							var data = { "type":"note", "title": title , "content" : content };
							

							/*
							var data = new Array(3);
							for(var i=0;i<3;i++)
							{
								data[i]=new Array(2);
							}

							data[0][0]="type";
							data[0][1]="note";
							data[1][0]="title";
							data[1][1]=$('#note-title').val();
							data[2][0]="content";
							data[2][2]=$('#note-content').val();*/
							//save_note("hi","hello",data);
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
						}
						return false;
					}

				</script>
{include file="../footer.tpl"}
				