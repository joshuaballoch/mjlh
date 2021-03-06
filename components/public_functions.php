<?php
  function curPageURL() {
   $pageURL = 'http';
   $pageURL .= "://";
   if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
   } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
   }
   return $pageURL;
  }

  // printTruncated was pulled from http://stackoverflow.com/questions/5128137/how-to-pass-a-variable-through-the-require-or-include-function-of-php
  function printTruncated($maxLength, $html, $pad="...", $isUtf8=true)
  {
    $printedLength = 0;
    $position = 0;
    $tags = array();

    // For UTF-8, we need to count multibyte sequences as one character.
    $re = $isUtf8
      ? '{</?([a-z]+)[^>]*>|&#?[a-zA-Z0-9]+;|[\x80-\xFF][\x80-\xBF]*}'
      : '{</?([a-z]+)[^>]*>|&#?[a-zA-Z0-9]+;}';

    while ($printedLength < $maxLength && preg_match($re, $html, $match, PREG_OFFSET_CAPTURE, $position))
    {
      list($tag, $tagPosition) = $match[0];

      // Print text leading up to the tag.
      $str = substr($html, $position, $tagPosition - $position);
      if ($printedLength + strlen($str) > $maxLength)
      {
        print(substr($str, 0, $maxLength - $printedLength));
        $printedLength = $maxLength;
        break;
      }

      print($str);
      $printedLength += strlen($str);
      if ($printedLength >= $maxLength) break;

      if ($tag[0] == '&' || ord($tag) >= 0x80)
      {
        // Pass the entity or UTF-8 multibyte sequence through unchanged.
        print($tag);
        $printedLength++;
      }
      else
      {
        // Handle the tag.
        $tagName = $match[1][0];
        if ($tag[1] == '/')
        {
          // This is a closing tag.

          $openingTag = array_pop($tags);
          assert($openingTag == $tagName); // check that tags are properly nested.

          print($tag);
        }
        else if ($tag[strlen($tag) - 2] == '/')
        {
          // Self-closing tag.
          print($tag);
        }
        else
        {
          // Opening tag.
          print($tag);
          $tags[] = $tagName;
        }
      }

      // Continue after the tag.
      $position = $tagPosition + strlen($tag);
    }

    // Print any remaining text.
    if ($printedLength < $maxLength && $position < strlen($html))
      print(substr($html, $position, $maxLength - $printedLength));

    // add pad before end
    if (isset($pad) && $pad) {
      printf(' ...');
    }
    // Close any open tags.
    while (!empty($tags))
      printf('</%s>', array_pop($tags));

  }

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
     if ( array_key_exists("HTTPS",$_SERVER) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
     $pageURL .= "://";
     if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
     } else {
      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
     }

     if ($currentLanguage == "en")
     {
       $newLanguage = "fr";
       $linkText = "français</a>";
     }
     else
     {
       $newLanguage = "en";
       $linkText = "english</a>";
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
