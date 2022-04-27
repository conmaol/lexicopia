<?php

namespace models;

class entry {

  private $_id;
  private $_wordform;
  private $_lang;
  private $_morphoSyntax;
  private $_gloss;
  private $_tos = [];
  private $_froms = [];
  private $_notes;
  private $_db;   // an instance of models\database

	public function __construct($id) {
    $this->_db = new database();
    $this->_id = $id;
    $sql = "SELECT * FROM `lexicopia` WHERE `id` = :id";
    $results = $this->_db->fetch($sql, array(":id" => $id));
    $result = $results[0];
    $this->_wordform = $result["wordform"];
    $this->_lang = $result["lang"];
    $this->_morphoSyntax = $result["morphosyntax"];
    $this->_gloss = $result["gloss"];
    $this->_notes = $result["notes"];
    //tos
    $sql = <<<SQL
SELECT lexicopia_links.from_id, lexicopia_links.type, lexicopia.lang, lexicopia.wordform
FROM lexicopia_links INNER JOIN lexicopia ON lexicopia_links.from_id=lexicopia.id
WHERE lexicopia_links.to_id = :id
SQL;
    $results = $this->_db->fetch($sql, array(":id" => $id));
    foreach ($results as $nextResult) {
      $this->_tos[] = [$nextResult["from_id"], $nextResult["type"], $nextResult["lang"], $nextResult["wordform"]];
    }
    //froms
    $sql = <<<SQL
SELECT lexicopia_links.to_id, lexicopia_links.type, lexicopia.lang, lexicopia.wordform
FROM lexicopia_links INNER JOIN lexicopia ON lexicopia_links.to_id=lexicopia.id
WHERE lexicopia_links.from_id = :id
SQL;
    $results = $this->_db->fetch($sql, array(":id" => $id));
    foreach ($results as $nextResult) {
      $this->_froms[] = [$nextResult["to_id"], $nextResult["type"], $nextResult["lang"], $nextResult["wordform"]];
    }
	}

  public function getId() {
    return $this->_id;
	}

  public function getWordform() {
    return $this->_wordform;
	}

  public function getLang() {
    return $this->_lang;
	}

  public function getMorphoSyntax() {
    return $this->_morphoSyntax;
	}

  public function getGloss() {
    return $this->_gloss;
  }

  public function getNotes() {
    return $this->_notes;
  }

  public function getTos() {
    return $this->_tos;
  }

  public function getFroms() {
    return $this->_froms;
  }

}
