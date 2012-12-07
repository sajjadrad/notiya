<?php
	require('../../controls/conf.php');

	if(isset($_POST['type']))
	{
		$_type = $_POST['type'];
		switch ($_type) {
			
			case 'note':
				$notes=R::find('note_head','note_type=?',array("note"));
				if($notes)
				{
					$output="<table class=\"table table-bordered table-striped\"><colgroup><col class=\"span1\"><col class=\"span7\"></colgroup><thead><tr><th>ردیف</th><th>یادداشت</th></tr></thead><tbody>";
					$i=1;
					foreach ($notes as $note)
					{
						//echo $note['note_title'];
						$output=$output."<tr><td>".$i."</td><td><a href=
						\"note.php?id=".$note['uniqid']."\">".$note['note_title']."</a></td></tr>";
						$i++;
					}
					$output=$output."</tbody></table>";
					echo $output;
				}
				break;
			case 'link':
				$notes=R::find('note_head','note_type=?',array("link"));
				if($notes)
				{
					$output="<table class=\"table table-bordered table-striped\"><colgroup><col class=\"span1\"><col class=\"span7\"></colgroup><thead><tr><th>ردیف</th><th>لینک</th></tr></thead><tbody>";
					$i=1;
					foreach ($notes as $note)
					{
						//echo $note['note_title'];
						$output=$output."<tr><td>".$i."</td><td><a href=
						\"note.php?id=".$note['uniqid']."\">".$note['note_title']."</a></td></tr>";
						$i++;
					}
					$output=$output."</tbody></table>";
					echo $output;
				}
				break;
		}
	}
?>