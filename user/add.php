<?php
	@session_start();
	if(isset($_SESSION['_validUser']))
	{
		require('../libs/Smarty.class.php');
		require('../controls/conf.php');
		$smarty = new Smarty;

		$smarty->debugging = false;
		$smarty->caching = true;
		$smarty->cache_lifetime = 120;
		$smarty->assign("nav","true",true);
		if(isset($_GET['type']))
		{
			$_noteType=$_GET['type'];
			switch ($_noteType)
			{
				case 'note':
					$smarty->assign("type",$_noteType,true);
					$smarty->display('../templates/user/note.tpl');
					break;
				case 'wiki':
					$smarty->assign("type",$_noteType,true);
					$smarty->display('../templates/user/wiki.tpl');
					break;
				case 'link':
					$smarty->assign("type",$_noteType,true);
					$smarty->display('../templates/user/link.tpl');
					break;
				default:
					# code...
					break;
			}
		}
		else if((isset($_POST['type'])))
		{
			$_noteType=$_POST['type'];
			switch ($_noteType)
			{
				case 'note':
					if(isset($_POST['note-title']))
					{
						$_noteTitle=$_POST['note-title'];
						$_noteContent=$_POST['note-content'];
						$_note=R::dispense('note_head');
						$_note->user_id=$_SESSION['_validUser'];
						$_note->note_title=$_noteTitle;
						$_note->note_type="note";
						date_default_timezone_set("Asia/Tehran");
						$_note->create_date=date("d M Y - h:i:s A");
						$_note->uniqid=uniqid();
						list($_noteMeta)=R::dispense('note_meta',2);
						$_noteMeta->meta_title="note_content";
						$_noteMeta->meta_value=$_noteContent;
						$_note->ownNote_meta=array($_noteMeta);
						R::store($_note);
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
					}
					break;
				case 'wiki':
					if(isset($_POST['wiki-title']))
					{
						$_noteTitle=$_POST['wiki-title'];
						$_noteContent=$_POST['wiki-content'];
						$_note=R::dispense('note_head');
						$_note->user_id=$_SESSION['_validUser'];
						$_note->note_title=$_noteTitle;
						$_note->note_type="wiki";
						date_default_timezone_set("Asia/Tehran");
						$_note->create_date=date("d M Y - h:i:s A");
						$_note->uniqid=uniqid();
						list($_noteMeta)=R::dispense('note_meta',2);
						$_noteMeta->meta_title="wiki_content";
						$_noteMeta->meta_value=$_noteContent;
						$_note->ownNote_meta=array($_noteMeta);
						R::store($_note);
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
					}
					break;
				case 'link':
					if(isset($_POST['link-title']))
					{
						$_noteTitle=$_POST['link-title'];
						$_noteContent=$_POST['link-content'];
						$_noteDes=$_POST['link-description'];
						$_note=R::dispense('note_head');
						$_note->user_id=$_SESSION['_validUser'];;
						$_note->note_title=$_noteTitle;
						$_note->note_type="link";
						$_note->uniqid=uniqid();
						date_default_timezone_set("Asia/Tehran");
						$_note->create_date=date("d M Y - h:i:s A");
						list($_linkContentMeta,$_linkDesMeta)=R::dispense('note_meta',2);
						$_linkContentMeta->meta_title="link_content";
						$_linkContentMeta->meta_value=$_noteContent;
						$_linkDesMeta->meta_title="link_description";
						$_linkDesMeta->meta_value=$_noteDes;
						$_note->ownNote_meta=array($_linkContentMeta,$_linkDesMeta);
						R::store($_note);
						echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
					}
					break;
			}
		}
	}
	else
	{
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login.php">';
	}
	//
?>