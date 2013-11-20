<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<?php
     require_once $_SERVER["DOCUMENT_ROOT"]."/secure/dbconnect.php";
     //Input handling routines
     require_once $_SERVER["DOCUMENT_ROOT"]."/components/public_functions.php";

    //Check for valid session token in the cookie.
    $verified = "0";
    if (isset($_COOKIE['tkn']))
    {
      //Else, retrieve language from cookie if it exists
      $checktoken = $_COOKIE['tkn'];

      //This is where the session timeout is set. Currently at 3600 seconds i.e. 60 mins.
      $verifyquery = "select count(*) from USERS where session_token = " . clean_input($checktoken) . " and (unix_timestamp(now()) - unix_timestamp(session_last_action)) < 3600";
      $verifyresult = mysql_query($verifyquery, GetMyConnection()) or die('Verify query failed: ' . mysql_error());
      $verified = mysql_result($verifyresult, 0);
      if ($verified == "1")
      {
        //Update user record to restart expiry timer
        $updatequery = "update USERS set session_last_action = now() where session_token = " . clean_input($checktoken);
        $updateresult = mysql_query($updatequery, GetMyConnection()) or die('Update query failed: ' . mysql_error());
      }
    }
?>
<html>
      <head>
            <title>MJLH Website Administrative Backend</title>
            <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >

            <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css" media="all">
            <link rel="stylesheet" type="text/css" href="/css/mjlh.css" media="all">
            <link rel="stylesheet" type="text/css" href="/vendor/summernote/summernote.css" media="all">
            <link rel="stylesheet" type="text/css" href="/vendor/summernote/summernote-bs3.css" media="all">

            <!-- Icon Fonts -->
            <link rel="stylesheet" href="/vendor/fontello-css/fontello.css">
            <!--[if IE 7]>
            <link rel="stylesheet" href="/vendor/fontello-css/fontello-ie7.css"><![endif]-->

            <script type="text/javascript" src="/vendor/jquery.js"></script>
            <script type="text/javascript" src="/vendor/respond.min.js"></script>
            <script type="text/javascript" src="/vendor/modernizr.min.js"></script>
            <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="/vendor/summernote/summernote.min.js" charset="utf-8"></script>
            <script type="text/javascript" src="/js/textedit.js" charset="utf-8"></script>

      </head>
      <body>
      <center><h3>MJLH Website Administrative Backend</h3></center>

      <?php
           if ($verified == "1")
           {//verified

             if (array_key_exists('_new_content_submit_check', $_POST))
             {
                if ($_POST['content_id'] != "")
                {
                   $insertquery = "insert ignore into CONTENT set content_id=". clean_input($_POST['content_id']);
                   $insertresult = mysql_query($insertquery, GetMyConnection()) or die('Error inserting content: ' . mysql_error());
                }
             }
             if (array_key_exists('_new_blog_submit_check', $_POST))
             {
                $insertquery = "insert ignore into BLOGS set blog_id=''";
                $insertresult = mysql_query($insertquery, GetMyConnection()) or die('Error inserting content: ' . mysql_error());
                $_REQUEST['blog_id'] = mysql_insert_id();
             }
             //If we're verified, display the action bar.
             ?>

             <table><tr><td valign = "top">
               <div id = "actiondiv">
                    <h3>Actions</h3>
                    <b>Pages</b><br>
                    <ul>
                        <li>Edit Page:<SELECT name="editcontentselect" SIZE="1" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <?php
                           $query = "select content_id from CONTENT";
                           $result = mysql_query($query, GetMyConnection()) or die('Error getting content list: ' . mysql_error());
                           while ($line = mysql_fetch_assoc($result))
                           {
                             if ($_REQUEST['content_id'] == $line['content_id'])
                             {
                               echo "<option selected = 'selected' ";
                             }
                             else
                             {
                               echo "<option ";
                             }
                             echo "value = 'http://".$_SERVER['HTTP_HOST']."/backend/backend.php?content_id=" . $line['content_id'] . "'>" .$line['content_id'] . "</option>\n";
                           }
                        ?>
                        </SELECT>
                        </li>

                        <li>Create New Page:<form name="newpageform" method="post" action="backend.php">
                             <input type = "text" name = "content_id" length = "10">
                             <input type = "hidden" name = "_new_content_submit_check" value = "1">
                             <input type = "submit" value = "Go">
                             </form>
                        </li>

                    </ul>
                    <b>Blogs</b><br>
                    <ul>
                        <li>Edit Blog:<SELECT name="editblogselect" SIZE="1" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <?php
                           $query = "select blog_id, author from BLOGS";
                           $result = mysql_query($query, GetMyConnection()) or die('Error getting blog list: ' . mysql_error());
                           while ($line = mysql_fetch_assoc($result))
                           {
                             if ($_REQUEST['blog_id'] == $line['blog_id'])
                             {
                               echo "<option selected = 'selected' ";
                             }
                             else
                             {
                               echo "<option ";
                             }
                             echo "value = 'http://".$_SERVER['HTTP_HOST']."/backend/backend.php?blog_id=" . $line['blog_id'] . "'>" .$line['blog_id']. " (" .$line['author'] . ")</option>\n";
                           }
                        ?>
                        </SELECT>
                        </li>

                        <li>Create New Blog:<form name="newblogform" method="post" action="backend.php">
                             <input type = "hidden" name = "_new_blog_submit_check" value = "1">
                             <input type = "submit" value = "Go">
                             </form>
                        </li>

                    </ul>
                    <b>Volumes</b><br>
                    <ul>
                        <li>Edit Volume:<SELECT name="editblogselect" SIZE="1" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <?php
                           $query = "select * from VOLUMES";
                           $result = mysql_query($query, GetMyConnection()) or die('Error getting volume list: ' . mysql_error());
                           while ($line = mysql_fetch_assoc($result))
                           {
                             if ($_REQUEST['volume_num'] == $line['VOLUME_NUM'] && $_REQUEST['issue_num'] == $line['ISSUE_NUM'])
                             {
                               echo "<option selected = 'selected' ";
                             }
                             else
                             {
                               echo "<option ";
                             }
                             echo "value = 'http://".$_SERVER['HTTP_HOST']."/backend/backend.php?volume_num=" . $line['VOLUME_NUM'] . "&issue_num=".$line['ISSUE_NUM']."'> ( Volume " .$line['VOLUME_NUM'] . " Issue ".$line['ISSUE_NUM']." Item Id " .$line['ITEM_ID']. " Title: ".$line["TITLE"].")</option>\n";
                           }
                        ?>
                        </SELECT>
                        </li>
                        <li>Edit Volume Item:<SELECT name="editblogselect" SIZE="1" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <?php
                           if ( $_REQUEST['volume_num'] && $_REQUEST['issue_num']) {
                             $query = "select * from VOLUME_ITEMS where VOLUME_NUM = ".$_REQUEST['volume_num']." and ISSUE_NUM = ".$_REQUEST['issue_num'] ;
                           } else if ($_REQUEST['volume_item_id']) {
                             $query2 = "select VOLUME_NUM, ISSUE_NUM from VOLUME_ITEMS where ITEM_ID = ".$_REQUEST['volume_item_id'];
                             $result2 = mysql_query($query, GetMyConnection()) or die('Error getting volume item: ' . mysql_error());
                             $line2 = mysql_fetch_assoc($result2);
                             $query = "select * from VOLUME_ITEMS where VOLUME_NUM = ".$line2['VOLUME_NUM']." and ISSUE_NUM = ".$line2['ISSUE_NUM'] ;
                           } else {
                             $query = "select * from VOLUME_ITEMS";
                           }

                           $result = mysql_query($query, GetMyConnection()) or die('Error getting volume item list: ' . mysql_error());
                           while ($line = mysql_fetch_assoc($result))
                           {
                             if ($_REQUEST['volume_item_id'] == $line['ITEM_ID'])
                             {
                               echo "<option selected = 'selected' ";
                             }
                             else
                             {
                               echo "<option ";
                             }
                             echo "value = 'http://".$_SERVER['HTTP_HOST']."/backend/backend.php?volume_item_id=" . $line['ITEM_ID'] . "'> ( Volume " .$line['VOLUME_NUM'] . " Issue ".$line['ISSUE_NUM']." Item Id " .$line['ITEM_ID']. " Title: ".$line["TITLE"].")</option>\n";
                           }
                        ?>
                        </SELECT>
                        </li>
                    </ul>
                    <b>Announcements</b><br>
                    <ul>
                        <li><a href = "backend.php?action=announcements">Edit Announcements</a>
                        </li>
                    </ul>
                    <b>Colloquium</b><br>
                    <ul>
                        <li><a href = "backend.php?action=colloqreg">Colloquium Registrations</a>
                        </li>
                    </ul>

               </div>
               </td><td valign ='top'>
             <?php

            //If data was posted, save it to the DB here.
            if (array_key_exists('_content_edit_submit_check', $_POST))
            {
                if ($_POST['content_id'] != "")
                {
                   $replacequery = "replace into CONTENT values (". clean_input($_POST['content_id']) .",". clean_input($_POST['en']) . ",". clean_input($_POST['fr']) .")";
                   $replaceresult = mysql_query($replacequery, GetMyConnection()) or die('Error saving content: ' . mysql_error());
                }
            }
            if (array_key_exists('_blog_edit_submit_check', $_POST))
            {
                if ($_POST['blog_id'] != "")
                {
                   $replacequery = "replace into BLOGS values (". clean_input($_POST['blog_id']) .",". clean_input($_POST['title']) . ",". clean_input($_POST['author']) . ",". clean_input($_POST['date']). ",". clean_input($_POST['entry']).")";
                   $replaceresult = mysql_query($replacequery, GetMyConnection()) or die('Error saving blog: ' . mysql_error());
                }
            }


             //Check for a URL parameter to display the appropriate record from the CONTENT table
             if (array_key_exists('content_id', $_REQUEST) && $_REQUEST['content_id'] != "")
             {//edit content
                 $query = "select * from CONTENT where content_id =".clean_input($_REQUEST['content_id']);
                 $result = mysql_query($query, GetMyConnection()) or die('Error getting contents: ' . mysql_error());
                 $line = mysql_fetch_assoc($result);
                 ?>
                      <form name="form" method="post" action="backend.php?content_id=<?php echo $line['CONTENT_ID']; ?>">
                       <input type = "hidden" name = "_content_edit_submit_check" value = "1">
                       <input type = "hidden" name = "content_id" value = "<?php echo $line['CONTENT_ID']; ?>">
                       <div style = "width:900px;">
                       English:<br>
                            <textarea class="wysiwyg" cols="40" id="eneditor" name="en" rows="5"><?php echo $line['EN']; ?></textarea>
                       French:<br>
                            <textarea class="wysiwyg" cols="40" id="freditor" name="fr" rows="5"><?php echo $line['FR']; ?></textarea>
                       </div>
                       <input type = "submit" value = "Save">
                       </form>
                 <?php

             }//edit content
             //Check for a URL parameter to display the appropriate record from the BLOG table
             if (array_key_exists('blog_id', $_REQUEST) && $_REQUEST['blog_id'] != "")
             {//edit blog
                 $query = "select * from BLOGS where blog_id =".clean_input($_REQUEST['blog_id']);
                 $result = mysql_query($query, GetMyConnection()) or die('Error getting blog: ' . mysql_error());
                 $line = mysql_fetch_assoc($result);
                 ?>
                      <form name="form" method="post" action="backend.php?blog_id=<?php echo $line['BLOG_ID']; ?>">
                       <input type = "hidden" name = "_blog_edit_submit_check" value = "1">
                       <input type = "hidden" name = "blog_id" value = "<?php echo $line['BLOG_ID']; ?>">
                       <div style = "width:900px;">
                       Title: <input type = "text" name = "title" value = "<?php echo $line['TITLE']; ?>"><br>
                       Author: <input type = "text" name = "author" value = "<?php echo $line['AUTHOR']; ?>"><br>
                       Date(YYYY-MM-DD): <input type = "text" name = "date" value = "<?php echo $line['BLOG_DATE']; ?>"><br>
                       Entry:<br>
                            <textarea class="wysiwyg" cols="40" id="entryeditor" name="entry" rows="5"><?php echo $line['ENTRY']; ?></textarea>

                       </div>
                       <input type = "submit" value = "Save">
                       </form>
                 <?php

             }//edit blog

             if (array_key_exists('action', $_GET))
             {
               if ($_GET['action'] == "announcements")
               {
                 if (array_key_exists('del_id', $_GET))
                 {  //Delete an announcement
                     $query = "delete from ANNOUNCEMENTS where ANN_ID = ".clean_input($_GET['del_id']). " limit 1";
                     $result = mysql_query($query, GetMyConnection()) or die('Error deleting announcement: ' . mysql_error());
                 }
                 if (array_key_exists('_new_ann_submit_check', $_POST))
                 {
                     $insertquery = "insert into ANNOUNCEMENTS values ('',CURDATE(),". clean_input($_POST['en']) . ",". clean_input($_POST['fr']) .")";
                     $insertresult = mysql_query($insertquery, GetMyConnection()) or die('Error saving content: ' . mysql_error());
                 }
                  //Display edit announcements section
                  ?>

                  <form name="form" method="post" action="backend.php?action=announcements">
                  <input type = "hidden" name = "_new_ann_submit_check" value = "1">
                   <div style = "width:900px;margin-left: 10px;">
                   <strong>New Announcement:</strong><br>
                    English:<br>
                      <textarea cols="40" name="en" rows="5"></textarea><br>
                    French:<br>
                      <textarea cols="40" name="fr" rows="5"></textarea>
                   </div>
                 <input type = "submit" value = "Save">
                 </form>
                 <hr><br>
                   <?php
                 $query = "select * from ANNOUNCEMENTS order by ANN_DATE desc";
                 $result = mysql_query($query, GetMyConnection()) or die('Error getting announcement list: ' . mysql_error());
                 echo "<strong>Past Announcements:</strong><ul>";
                 while ($line = mysql_fetch_assoc($result))
                 {
                   echo "<li><p>English:<i> " . $line['EN']. "</i></p><p>French:<i>" .$line['FR']. "</i></p>\n";
                   echo "<a href = \"backend.php?action=announcements&del_id=" . $line['ANN_ID'] . "\">Delete</a></li>\n";
                 }
               }//Edit announcements

               if ($_GET['action'] == "colloqreg")
               {
                 if (array_key_exists('notified', $_GET))
                 {  //Update NOTIFIED
                     $query = "update COLLOQUIUM set NOTIFIED = MOD(NOTIFIED+1,2) where EMAIL = ".clean_input($_GET['notified']). " limit 1";
                     $result = mysql_query($query, GetMyConnection()) or die('Error updating NOTIFIED: ' . mysql_error());
                 }
                 if (array_key_exists('paid', $_GET))
                 {  //Update PAID
                     $query = "update COLLOQUIUM set PAID = MOD(PAID+1,2) where EMAIL = ".clean_input($_GET['paid']). " limit 1";
                     $result = mysql_query($query, GetMyConnection()) or die('Error updating PAID: ' . mysql_error());
                 }

                 echo"<center><h2>Colloquium Registrations 2010</h2></center>";
                 echo "<table cellpadding = '2' border = '1'><tr>\n";
                 echo "<th>E-mail</th>\n";
                 echo "<th>Name</th>\n";
                 echo "<th>Student Y/N</th>\n";
                 echo "<th>Uni./Emp.</th>\n";
                 echo "<th>Program/Field</th>\n";
                 echo "<th>Small Groups Y/N</th>\n";
                 echo "<th>How They Heard</th>\n";
                 echo "<th>Payment Method</th>\n";
                 echo "<th>Reg. Date</th>\n";
                 echo "<th>Notified?<br>(Click to toggle)</th>\n";
                 echo "<th>Paid?<br>(Click to toggle)</th>\n";
                 echo "</tr>\n";
                 //Display registrant data
                 $query = "select EMAIL, NAME, STUDENT, UNIVERSITY, PROGRAM, SMALL_GROUP_YN, HOW_DID_YOU_HEAR, PAYMETHOD, REG_DATE, CONCAT(\"<a href = 'backend.php?action=colloqreg&notified=\",EMAIL,\"'>\",IF(NOTIFIED,\"Yes\",\"No\"),\"</a>\"), CONCAT(\"<a href = 'backend.php?action=colloqreg&paid=\",EMAIL,\"'>\",IF(PAID,\"Yes\",\"No\"),\"</a>\") from COLLOQUIUM";
                 $result = mysql_query($query, GetMyConnection()) or die('Error getting registrants: ' . mysql_error());
                  while ($line = mysql_fetch_assoc($result))
                  {
                      echo "\t<tr>\n";

                      foreach ($line as $col_value)
                      {
                          echo "\t\t<td>$col_value</td>\n";
                      }
                      echo "\t</tr>\n";
                  }

                  echo "</table>\n";
               }

             }



             echo "</td></tr></table>";



           }//verified
           else
           {
             echo "<center>Session expired. Please <a href = 'index.html'>click here</a> to log in again.</center>" ;
           }
      ?>

      </body>
</html>
