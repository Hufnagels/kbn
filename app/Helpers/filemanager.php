<?php

function lfm_filename($data, $actioneventName = NULL, $request = NULL)
{
  $filename = NULL;
  if (file_exists($data))
  {
    $filename = asset($imageDirectory.'/'. $this->image);
  }
  return $filename;
}


/*
HELPER FUNCTIONS - REMOVE SPECIAL CHARS
*/
function cleanString($text) {
    $utf8 = array(
        '/[áàâãªä]/u'   =>   'a',
        '/[ÁÀÂÃÄ]/u'    =>   'A',
        '/[ÍÌÎÏ]/u'     =>   'I',
        '/[íìîï]/u'     =>   'i',
        '/[éèêë]/u'     =>   'e',
        '/[ÉÈÊË]/u'     =>   'E',
        '/[óòôõºö]/u'   =>   'o',
        '/[ÓÒÔÕÖ]/u'    =>   'O',
        '/[úùûü]/u'     =>   'u',
        '/[ÚÙÛÜ]/u'     =>   'U',
        '/ç/'           =>   'c',
        '/Ç/'           =>   'C',
        '/ñ/'           =>   'n',
        '/Ñ/'           =>   'N',
        '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u'    =>   '', // Literally a single quote
        '/[“”«»„]/u'    =>   '', // Double quote
        '/ /'           =>   '', // nonbreaking space (equiv. to 0x160)
        '/[\/\&%#\$]/'  =>   '_'
    );
    // preg_replace("/[\/\&%#\$]/", "_", $yourString);
    return preg_replace(array_keys($utf8), array_values($utf8), $text);
}

function hyphenize($string) {
    $dict = array(
        "I'm"      => "I am",
        "thier"    => "their",
    );
    return strtolower(
        preg_replace(
          array( '#[\\s-]+#', '#[^A-Za-z0-9\. -]+#' ),
          array( '-', '' ),
          // the full cleanString() can be download from http://www.unexpectedit.com/php/php-clean-string-of-utf8-chars-convert-to-similar-ascii-char
          cleanString(
              str_replace( // preg_replace to support more complicated replacements
                  array_keys($dict),
                  array_values($dict),
                  urldecode($string)
              )
          )
        )
    );
}

// SPLIT NAME TO PARTS
function split_name_lastName($name) {
    //$name = cleanString($name);
    $arr = explode(' ', $name);
    $num = count($arr);
    $first_name = '';
    $middle_name = '';
    $last_name = '';
    if ($num == 2) {
        list($first_name, $last_name) = $arr;
    } else {
        list($first_name, $middle_name, $last_name) = $arr;
    }
    $response = (empty($first_name) || $num > 3) ? false : array(
        'first_name' => cleanString($first_name),
        'middle_name' => cleanString($middle_name),
        'last_name' => cleanString($last_name),
    );
    $response = ($response == false ? 'admin' : strtolower(cleanString($last_name)));
    return $response;
}

function split_name($name) {
    $name = cleanString($name);
    $parts = array();

    while ( strlen( trim($name)) > 0 ) {
        $name = trim($name);
        $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $parts[] = $string;
        $name = trim( preg_replace('#'.$string.'#', '', $name ) );
    }

    if (empty($parts)) {
        return false;
    }

    $parts = array_reverse($parts);
    $name = array();
    $name['first_name'] = $parts[0];
    $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
    $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');

    return $name;
}