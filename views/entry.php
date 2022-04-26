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
        $html .= "<dt>Derivative of</dt><dd><ul>";
        foreach ($others as $nextFrom) {
          $html .= "<li>[" . $this->_describeLink($nextFrom[1],"from") . "] <a href=\"?id=" . $nextFrom[0] . "\">" ;
          $lang2 = $nextFrom[2];
          $html .= $this->_normalise($nextFrom[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
      if ($etymons) {
        $html .= "<dt>Etymon(s)</dt><dd><ul>";
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
          $html .= "<li>[" . $this->_describeLink($nextTo[1],"to") . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= $this->_normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
      if ($derivatives) {
        $html .= "<dt>Derivatives</dt><dd><ul>";
        foreach ($derivatives as $nextTo) {
          $html .= "<li>[" . $this->_describeLink($nextTo[1],"to") . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
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
      $wordform = str_replace('M','m̥',$wordform);
      $wordform = str_replace('N','n̥',$wordform);
      $wordform = '*' . $wordform;
    }
    else if ($lang=="pit" || $lang=="pclt") {
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
  }

  private function _describeLink($rel,$dir) {
    if ($rel=="basic_stem") {
      if ($dir=="to") {
        return "has basic stem";
      }
      else {
        return "is basic stem of verb root";
      }
    }
    if ($rel=="imperfective_stem") {
      if ($dir=="to") {
        return "has derived imperfective verb";
      }
      else {
        return "is derived imperfective verb of";
      }
    }
    if ($rel=="subjunctive_stem") {
      if ($dir=="to") {
        return "has derived subjunctive stem";
      }
      else {
        return "is derived subjunctive stem of";
      }
    }
    if ($rel=="optative_stem") {
      if ($dir=="to") {
        return "has derived optative stem";
      }
      else {
        return "is derived optative stem of";
      }
    }
    if ($rel=="causative_stem") {
      if ($dir=="to") {
        return "has derived causative verb";
      }
      else {
        return "is derived causative verb of";
      }
    }
    if ($rel=="imperfect_stem") {
      if ($dir=="to") {
        return "has imperfect tense stem";
      }
      else {
        return "is imperfect tense stem of";
      }
    }
    if ($rel=="future_stem") {
      if ($dir=="to") {
        return "has future tense stem";
      }
      else {
        return "is future tense stem of";
      }
    }
    if ($rel=="future_subjunctive_stem") {
      if ($dir=="to") {
        return "has future/subjunctive stem";
      }
      else {
        return "is future/subjunctive stem of";
      }
    }
    if ($rel=="pluperfect_subjunctive_stem") {
      if ($dir=="to") {
        return "has pluperfect subjunctive stem";
      }
      else {
        return "is pluperfect subjunctive stem of";
      }
    }
    if ($rel=="pluperfect_stem") {
      if ($dir=="to") {
        return "has pluperfect tense stem";
      }
      else {
        return "is pluperfect tense stem of";
      }
    }
    if ($rel=="present_subjunctive_stem") {
      if ($dir=="to") {
        return "has present subjunctive stem";
      }
      else {
        return "is present subjunctive stem of";
      }
    }
    if ($rel=="imperfect_subjunctive_stem") {
      if ($dir=="to") {
        return "has imperfect subjunctive stem";
      }
      else {
        return "is imperfect subjunctive stem of";
      }
    }
    if ($rel=="perfect_stem") {
      if ($dir=="to") {
        return "has perfect stem";
      }
      else {
        return "is perfect stem of";
      }
    }
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
        return "first/third singular";
    }
		if ($rel=="123s") {
        return "singular";
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
    if ($rel=="p1s") {
        return "first person singular secondary";
    }
    if ($rel=="p2s") {
      if ($dir=="to") {
        return "has second person singular secondary conjugated form";
      }
      else {
        return "is second person singular secondary conjugated form of";
      }
    }
    if ($rel=="p3s") {
      if ($dir=="to") {
        return "has third person singular secondary conjugated form";
      }
      else {
        return "is third person singular secondary conjugated form of";
      }
    }
    if ($rel=="p1d") {
      if ($dir=="to") {
        return "has first person dual secondary conjugated form";
      }
      else {
        return "is first person dual secondary conjugated form of";
      }
    }
    if ($rel=="p2d") {
      if ($dir=="to") {
        return "has second person dual secondary conjugated form";
      }
      else {
        return "is second person dual secondary conjugated form of";
      }
    }
    if ($rel=="p3d") {
      if ($dir=="to") {
        return "has third person dual secondary conjugated form";
      }
      else {
        return "is third person dual secondary conjugated form of";
      }
    }
    if ($rel=="p23d") {
      if ($dir=="to") {
        return "has second/third person dual secondary conjugated form";
      }
      else {
        return "is second/third person dual secondary conjugated form of";
      }
    }
    if ($rel=="p1p") {
      if ($dir=="to") {
        return "has first person plural secondary conjugated form";
      }
      else {
        return "is first person plural secondary conjugated form of";
      }
    }
    if ($rel=="p2p") {
      if ($dir=="to") {
        return "has second person plural secondary conjugated form";
      }
      else {
        return "is second person plural secondary conjugated form of";
      }
    }
    if ($rel=="p3p") {
      if ($dir=="to") {
        return "has third person plural secondary conjugated form";
      }
      else {
        return "is third person plural secondary conjugated form of";
      }
    }
    else return $rel;
  }

}
