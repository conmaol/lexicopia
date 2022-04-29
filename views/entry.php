<?php

namespace views;
use models;

class entry {

	private $_model;   // an instance of models\entry
  private $_db;

	public function __construct($model) {
		$this->_model = $model;
    $this->_db = new models\database();
	}

	public function show() {
    $lang = $this->_model->getLang();
    $html = "<h1>" . $this->_normalise($this->_model->getWordform(),$lang) . "</h1>";
    $html .= "<dl>";
    $html .= "<dt>Language</dt><dd>" . $this->_nameLang($lang) . "</dd>";
    $morph = $this->_model->getMorphoSyntax();
    if ($morph) {
      $html .= "<dt>Morphosyntax</dt><dd>" . $morph . "</dd>";
    }
    $html .= "<dt>Gloss</dt><dd>" . $this->_model->getGloss() . "</dd>";
    $froms = $this->_model->getFroms();
    if ($froms) {
      $etymons = [];
      $others = [];
      foreach ($froms as $nextFrom) {
        if ($nextFrom[1]=="etymon") {
          $etymons[] = $nextFrom;
        }
        else {
          $others[] = $nextFrom;
        }
      }
      if ($others) {
        foreach ($others as $nextFrom) {
					$html .= "<dt>" . ucfirst($this->_describeLink($nextFrom[1])) . " of</dt><dd>";
          $html .= "<a href=\"?id=" . $nextFrom[0] . "\">" ;
          $lang2 = $nextFrom[2];
          $html .= $this->_normalise($nextFrom[3],$lang2) . "</a> ";
					$html .= "</dd>";
        }
      }
      if ($etymons) {
        $html .= "<dt>Etymons</dt><dd><ul>";
        foreach ($etymons as $nextFrom) {
          $lang2 = $nextFrom[2];
          $html .= "<li>[" . $this->_nameLang($lang2) . "] <a href=\"?id=" . $nextFrom[0] . "\">" ;
          $html .= $this->_normalise($nextFrom[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
    }
    $tos = $this->_model->getTos();
    if ($tos) {
      $conjugatedForms = [];
			$subjunctives = [];
			$optatives = [];
			$middles = [];
			$imperfectives = [];
      $derivatives = [];
      $etymons = [];
			$cfs = [];
			$compounds = [];
      foreach ($tos as $nextTo) {
        if ($nextTo[1]=="etymon") {
          $etymons[] = $nextTo;
        }
				else if ($nextTo[1]=="cf") {
          $cfs[] = $nextTo;
        }
				else if ($nextTo[1]=="compound") {
          $compounds[] = $nextTo;
        }
				else if ($nextTo[1]=="subjunctive") {
          $subjunctives[] = $nextTo;
        }
				else if ($nextTo[1]=="optative") {
          $optatives[] = $nextTo;
        }
				else if ($nextTo[1]=="middle") {
          $middles[] = $nextTo;
        }
				else if ($nextTo[1]=="imperfective") {
          $imperfectives[] = $nextTo;
        }
        else if (strpos($nextTo[1],"1")!==FALSE || strpos($nextTo[1],"2")!==FALSE || strpos($nextTo[1],"3")!==FALSE) {
          $conjugatedForms[] = $nextTo;
        }
        else {
          $derivatives[] = $nextTo;
        }
      }
      if ($conjugatedForms) {
        $html .= "<dt>Conjugated forms</dt><dd><ul>";
        foreach ($conjugatedForms as $nextTo) {
          $html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
			if ($subjunctives || $optatives) {
				$html .= "<dt>Moods etc.</dt><dd><ul>";
				foreach ($subjunctives as $nextTo) {
					$html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
					$lang2 = $nextTo[2];
					$html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
					$html .= "</li>";
				}
				foreach ($optatives as $nextTo) {
					$html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
					$lang2 = $nextTo[2];
					$html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
					$html .= "</li>";
				}
				foreach ($middles as $nextTo) {
					$html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
					$lang2 = $nextTo[2];
					$html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
					$html .= "</li>";
				}
				$html .= "</ul></dd>";
			}
      if ($derivatives) {
        $html .= "<dt>Derivatives</dt><dd><ul>";
				foreach ($imperfectives as $nextTo) {
          $html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        foreach ($derivatives as $nextTo) {
          $html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
			if ($compounds) {
        $html .= "<dt>Compounds</dt><dd><ul>";
        foreach ($compounds as $nextTo) {
          $html .= "<li><a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
      if ($etymons) {
        $html .= "<dt>Etymon of </dt><dd><ul>";
        foreach ($etymons as $nextTo) {
          $lang2 = $nextTo[2];
          $html .= "<li>[" . $this->_nameLang($lang2) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
          $html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
			if ($cfs) {
        $html .= "<dt>See also</dt><dd><ul>";
        foreach ($cfs as $nextTo) {
          $html .= "<li><a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
    }
		$notes = $this->_model->getNotes();
		if ($notes) {
			$html .= "<dt>Notes</dt><dd>" . $notes . "</dd>";
		}
    $html .= "</dl>";
		echo $html;
	}

  private function _normalise($wordform,$lang) {
    $wordform = str_replace('aa','ā',$wordform);
    $wordform = str_replace('ee','ē',$wordform);
    $wordform = str_replace('ii','ī',$wordform);
    $wordform = str_replace('oo','ō',$wordform);
    $wordform = str_replace('uu','ū',$wordform);
    $wordform = str_replace('AA','ā́',$wordform);
    $wordform = str_replace('EE','ḗ',$wordform);
    $wordform = str_replace('II','ī́',$wordform);
    $wordform = str_replace('A','á',$wordform);
    $wordform = str_replace('E','é',$wordform);
    $wordform = str_replace('I','í',$wordform);
    $wordform = str_replace('O','ó',$wordform);
    if ($lang=="pie") {
      $wordform = str_replace('h2','h<sub>2</sub>',$wordform);
      $wordform = str_replace('h1','h<sub>1</sub>',$wordform);
      $wordform = str_replace('gj','ǵ',$wordform);
			$wordform = str_replace('dh','d<sup>h</sup>',$wordform);
      $wordform = str_replace('M','m̥',$wordform);
      $wordform = str_replace('N','n̥',$wordform);
      $wordform = '*' . $wordform;
    }
    else if ($lang=="pit" || $lang=="pclt" || $lang=="pde" || $lang=="pii" || $lang=="pia") {
      $wordform = '*' . $wordform;
    }
    $wordform = str_replace(' ','',$wordform);
    return $wordform;
  }

  private function _nameLang($lang) {
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
      return "Scottish Gaelic";
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
		else if ($lang=="pii") {
      return "Proto-Indo-Iranian";
    }
		else if ($lang=="pia") {
      return "Proto-Indo-Aryan";
    }
		else if ($lang=="skt") {
      return "Sanskrit";
    }
  }

  private function _describeLink($rel) {
    if ($rel=="1s") {
      return "first person singular";
    }
    if ($rel=="2s") {
        return "second person singular";
    }
    if ($rel=="3s") {
        return "third person singular";
    }
		if ($rel=="13s") {
        return "first/third person singular";
    }
		if ($rel=="123s") {
        return "singular";
    }
		if ($rel=="23s2p") {
        return "second/third person singular; second person plural";
    }
    if ($rel=="1d") {
        return "first person dual";
    }
    if ($rel=="2d") {
        return "second person dual";
    }
    if ($rel=="3d") {
        return "third person dual";
    }
    if ($rel=="23d") {
        return "second/third person dual";
    }
    if ($rel=="1p") {
        return "first person plural";
    }
    if ($rel=="2p") {
        return "second person plural";
    }
    if ($rel=="3p") {
        return "third person plural";
    }
		if ($rel=="123p") {
        return "plural";
    }
		if ($rel=="13p") {
        return "first/third person plural";
    }
		if ($rel=="123dp") {
        return "non-singular";
    }
    else return $rel;
  }

}
