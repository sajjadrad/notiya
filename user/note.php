<?php
	@session_start();
	if(isset($_SESSION['_validUser']))
	{
		$_userid=$_SESSION['_validUser'];
		require('../libs/Smarty.class.php');
		require('../controls/conf.php');
		$smarty = new Smarty;
		$smarty->debugging = false;
		$smarty->caching = false;
		$smarty->cache_lifetime = 120;
		$smarty->assign("nav","true",true);
		if(isset($_GET['id']))
		{
			$_uniqid=$_GET['id'];
			$note=R::findOne('note_head','uniqid=? and user_id=?',array($_uniqid,$_userid));
			if($note)
			{
				$_type=$note->note_type;
				$smarty->assign("id",$_uniqid,true);
				switch ($_type) {
					case 'note':
						$smarty->assign("type","note",true);
						$metas=$note->ownNote_meta;
						$title="<h2 id=\"note-title\">".$note->note_title."</h2>";
						$smarty->assign("title",$title,true);
						foreach ($metas as $meta)
						{
							switch($meta['meta_title'])
							{
								case 'note_content':
									$content="<p id=\"note-content\">".$meta['meta_value']."</p>";
									$smarty->assign("content",$content,true);
									break;
							}
						}
						$smarty->display('../templates/user/note_view.tpl');
						break;
					case 'wiki':
						$smarty->assign("type","wiki",true);
						$metas=$note->ownNote_meta;
						$title="<h2 id=\"wiki-title\">".$note->note_title."</h2>";
						$smarty->assign("title",$title,true);
						foreach ($metas as $meta)
						{
							switch($meta['meta_title'])
							{
								case 'wiki_content':
									$content=$meta['meta_value'];
									require_once("../controls/wiki/wikia.inc.php");
									$content=htmlspecialchars($content);
									$map=generateMap($content);
									$content=parse($content);
									$smarty->assign("content",$content,true);
									$smarty->assign("map",$map,true);
									break;
							}
						}
						$smarty->display('../templates/user/note_view.tpl');
						break;
					case 'link':
						$smarty->assign("type","link",true);
						$metas=$note->ownNote_meta;
						$title="<h2 id=\"link-title\">".$note->note_title."</h2>";
						$smarty->assign("title",$title,true);
						foreach ($metas as $meta)
						{
							switch($meta['meta_title'])
							{
								case 'link_content':
									$content="<p id=\"link-content\" style=\"direction:ltr;text-align:left\" class=\"lead\">".$meta['meta_value']."</p>";
									$smarty->assign("content",$content,true);
									break;
								case 'link_description':
									$des="<p id=\"link-des\">".$meta['meta_value']."</p>";
									$smarty->assign("des",$des,true);
									break;
							}
						}
						$smarty->display('../templates/user/note_view.tpl');
						break;
				}
			}
			else
			{
				$smarty->assign("error","پیدا نشد",true);
				$smarty->display('../templates/user/note_view.tpl');
			}
		}
	}
	else
	{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login.php">';
	}
	
	
?>