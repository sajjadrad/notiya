﻿<?php
	require('../libs/Smarty.class.php');
	require('../controls/conf.php');
	$smarty = new Smarty;

	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	if(isset($_GET['id']))
	{
		$_uniqid=$_GET['id'];
		$note=R::findOne('note_head','uniqid=?',array($_uniqid));
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
	}
	
?>