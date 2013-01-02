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
              case 'wiki':
                if($('#wiki-title').val()=='')
                {
                  errorFlag=true;
                  $('#errors').html("<div class=\"alert alert-error\">عنوان مطلب را وارد کنید.</div>");
                  $('#title-control').addClass('error');
                  $('#wiki-title').focus();
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