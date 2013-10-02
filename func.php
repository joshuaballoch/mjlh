<?php

    // Quote variable to make safe
    function clean_input($value)
    {
        // Stripslashes
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        // Quote if not integer
        if (!is_numeric($value)) {
            $value = "'" . mysql_real_escape_string($value, GetMyConnection()) . "'";
        }
        return $value;
    }

    function getSwitchLanguageLink($currentLanguage) {
       //Put the current page URL in $pageURL
       $pageURL = 'http';
       if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
       $pageURL .= "://";
       if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
       } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
       }

       if ($currentLanguage == "en")
       {
         $newLanguage = "fr";
         $linkText = "Fran&ccedil;ais</a>";
       }
       else
       {
         $newLanguage = "en";
         $linkText = "English</a>&nbsp;";
       }

       if (strrpos($pageURL, "?"))
       {
         if (stripos($pageURL, "lang="))
         {
            $pageURL = str_ireplace("lang=".$currentLanguage,"lang=".$newLanguage,$pageURL);
         }
         else
         {
           $pageURL = $pageURL . "&lang=" . $newLanguage;
         }
       }
       else
       {
         $pageURL = $pageURL . "?lang=" . $newLanguage;
       }

       return "<a href = '" . $pageURL . "'>" . $linkText;
    }

    function talk($en, $fr, $myLanguage)
    {
       if ($myLanguage == "fr")
       {
         print $fr;
       }
       else
       {
         print $en;
       }
    }

    // Original PHP code by Chirp Internet: www.chirp.com.au
    // Please acknowledge use of this code by including this header.
    function myTruncate($string, $limit, $break=".", $pad="...")
    {
      // return with no change if string is shorter than $limit
      if(strlen($string) <= $limit) return $string;
      // is $break present between $limit and the end of the string?
      if(false !== ($breakpoint = strpos($string, $break, $limit)))
      {
        if($breakpoint < strlen($string) - 1) { $string = substr($string, 0, $breakpoint) . $pad; }
      }
      return $string;
    }
?>
