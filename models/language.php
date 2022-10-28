<?php

namespace models;

class language {

  private $_id;
  private $_name;
  private $_headwords = [];
  private $_db;   // an instance of models\database

	public function __construct($lang) {
    $this->_db = new database();
    $this->_id = $lang;
    $this->_name = $this::nameLang($lang);
    $sql = "SELECT * FROM lexicopia WHERE lang = :lang AND morphosyntax != '' ORDER BY wordform";
    $results = $this->_db->fetch($sql, array(":lang" => $lang));
    $result = $results[0];
    foreach ($results as $nextResult) {
      $this->_headwords[] = [$nextResult['id'], $nextResult['wordform'], $nextResult['morphosyntax']];
    }
  }

  public function getId() {
    return $this->_id;
  }

  public function getName() {
    return $this->_name;
  }

  public function getHeadwords() {
    return $this->_headwords;
  }




  public static function nameLang($lang) {
    if ($lang=="pie") {
      return "Proto-Indo-European";
    }
    else if ($lang=="pit") {
      return "Proto-Italic";
    }
    else if ($lang=="pclt") {
      return "Proto-Celtic";
    }
    else if ($lang=="la") {
      return "Latin";
    }
    else if ($lang=="sga") {
      return "Old Gaelic";
    }
		else if ($lang=="gd") {
      return "Modern Scottish Gaelic";
    }
		else if ($lang=="ang") {
      return "Anglo-Saxon";
    }
		else if ($lang=="de") {
      return "German";
    }
		else if ($lang=="pde") {
      return "Proto-Germanic";
    }
    else if ($lang=="pwde") {
      return "Proto-West-Germanic";
    }
    else if ($lang=="ohde") {
      return "Old High German";
    }
    else if ($lang=="mhde") {
      return "Middle High German";
    }
		else if ($lang=="pii") {
      return "Proto-Indo-Iranian";
    }
		else if ($lang=="pia") {
      return "Proto-Indo-Aryan";
    }
		else if ($lang=="skt") {
      return "Sanskrit";
    }
		else if ($lang=="got") {
      return "Gothic";
    }
    else if ($lang=="pbrth") {
      return "Proto-Brythonic";
    }
    else if ($lang=="br") {
      return "Modern Breton";
    }
    else if ($lang=="obt") {
      return "Old Breton";
    }
    else if ($lang=="cy") {
      return "Modern Welsh";
    }
    else if ($lang=="owl") {
      return "Old Welsh";
    }
    else if ($lang=="wlm") {
      return "Middle Welsh";
    }
    else if ($lang=="enm") {
      return "Middle English";
    }
    else if ($lang=="en") {
      return "Modern English";
    }
    else if ($lang=="phe") {
      return "Proto-Hellenic";
    }
    else if ($lang=="grc") {
      return "Ancient Greek";
    }
    else if ($lang=="el") {
      return "Modern Greek";
    }
    else if ($lang=="xtg") {
      return "Gaulish";
    }
    else if ($lang=="es") {
      return "Modern Spanish";
    }
  }

  public static function normalise($wordform,$lang) {
    if ($lang=="de") { return $wordform; } 
    if ($lang=="pie") {
      $wordform = str_replace('aa','ā',$wordform);
      $wordform = str_replace('ee','ē',$wordform);
      $wordform = str_replace('ii','ī',$wordform);
      $wordform = str_replace('oo','ō',$wordform);
      $wordform = str_replace('uu','ū',$wordform);
      $wordform = str_replace('AA','ā́',$wordform);
      $wordform = str_replace('EE','ḗ',$wordform);
      $wordform = str_replace('II','ī́',$wordform);
  		$wordform = str_replace('OO','ṓ',$wordform);
      $wordform = str_replace('UU','ū́',$wordform);
      $wordform = str_replace('A','á',$wordform);
      $wordform = str_replace('E','é',$wordform);
      $wordform = str_replace('I','í',$wordform);
      $wordform = str_replace('O','ó',$wordform);
      $wordform = str_replace('U','ú',$wordform);
      $wordform = str_replace('ī́í','I',$wordform);
      $wordform = str_replace('h2','h<sub>2</sub>',$wordform);
      $wordform = str_replace('h1','h<sub>1</sub>',$wordform);
      $wordform = str_replace('gj','ǵ',$wordform);
      $wordform = str_replace('kj','ḱ',$wordform);
			$wordform = str_replace('dh','d<sup>h</sup>',$wordform);
      $wordform = str_replace('M','m̥',$wordform);
      $wordform = str_replace('N','n̥',$wordform);
      $wordform = '*' . $wordform;
    }
    else if ($lang=="pit" || $lang=="pclt" || $lang=="pde" || $lang=="pwde" || $lang=="pii" || $lang=="pia") {
      $wordform = '*' . $wordform;
    }
    if ($lang!="sga") { $wordform = str_replace(' ','',$wordform); }
    return $wordform;
  }

}
