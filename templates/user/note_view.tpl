{include file="../user_header.tpl" title="Notiya"}
			<body>
				{include file="../../templates/user/nav.tpl" title="Notiya"}
				<div class="container">
					<div class="row">
						<div style="margin-top:10px;" class="span12">
							{if isset($error)}
								<div class="alert alert-error">{$error}</div>
							{else}
								<div id="errors" class="row-fluid">
								</div>
								<div class="well row-fluid">
									<div style="margin-bottom:10px;" class="row-fluid">
										<a id="edit" class="btn">ویرایش</a>
										<input id="type" type="hidden" value="{$type}">
										<input id="id" type="hidden" value="{$id}">
									</div>
									<div id="content" class="row-fluid">
										{if $type == 'note'}
											{$title}
											{$content}
										{else if $type == 'link'}
											{$title}
											{$content}
											{$des}
										{/if}
									</div>
								</div>
							{/if}
						</div>
					</div>
					<script type="text/javascript" src="../assets/ajax/ajax.js"></script>
					<script type="text/javascript">
						var errorFlag=false;
						var title="";
						var content="";
						var des="";
						$(document).ready(function(){
							$('#note-title').keypress(function() {
								if((errorFlag) && ($('#note-title').val!=''))
								{
									$('#title-control').removeClass('error');
									$('#errors').html("");
							  	}
							});
							$('#edit').click(function()
							{
								$('#edit').css("display","none");
								var type=$('#type').val();
								switch(type)
								{
									case 'note':
										title=$('#note-title').html();
										content=$('#note-content').html();
										var editable="<input id=\"note-title\" class=\"span6\" value=\""+title+"\" type=\"text\" placeholder=\"عنوان یادداشت\"><textarea id=\"note-content\" class=\"span12\" rows=\"4\" placeholder=\"متن یادداشت\">"+content+"</textarea><p><a id=\"save\" class=\"btn btn-success\">ذخیره</a> <a id=\"cancel\" class=\"btn btn-danger\">انصراف</a></p>"
										$('#content').html(editable);
										break;
									case 'link':
										title=$('#link-title').html();
										content=$('#link-content').html();
										des=$('#link-des').html();
										var editable="<input id=\"link-title\" class=\"span6\" value=\""+title+"\" type=\"text\" placeholder=\"عنوان لینک\"><input id=\"link-content\" class=\"span12\" type=\"text\" value=\""+content+"\" placeholder=\"Link\" name=\"link-content\" style=\"direction:ltr;text-align:left;\"><textarea id=\"link-description\" class=\"span12\" name=\"link-description\" rows=\"2\" placeholder=\"توضیحات\">"+des+"</textarea><p><a id=\"save\" class=\"btn btn-success\">ذخیره</a> <a id=\"cancel\" class=\"btn btn-danger\">انصراف</a></p>"
										$('#content').html(editable);
										break;
								}
							});
							$('#cancel').live("click",function()
							{
								$('#edit').css("display","none");
								var type=$('#type').val();
								switch(type)
								{
									case 'note':
										var uneditable="<h2 id=\"note-title\">"+title+"</h2><p id=\"note-content\">"+content+"</p>";
										$('#edit').css("display","");
										$('#content').html(uneditable);
										break;
									case 'link':
										var uneditable="<h2 id=\"link-title\">"+title+"</h2><p id=\"link-content\" class=\"lead\" style=\"direction:ltr;text-align:left\">"+content+"</p><p id=\"link-des\">"+des+"</p>";
										$('#edit').css("display","");

										$('#content').html(uneditable);
										break;
								}
							});
						});
						function validation(type)
						{
							switch(type)
							{
								case 'note':
									if($('#note-title').val()=='')
									{
										errorFlag=true;
										$('#errors').html("<div class=\"alert alert-error\">عنوان یادداشت را وارد کنید.</div>");
										$('#title-control').addClass('error');
										$('#note-title').focus();
									}
									return true;
									break;
							}
							return false;
						}

					</script>
{include file="../footer.tpl"}
				