<?php

namespace views;
use models;

class entry {

	private $_model;   // an instance of models\entry

	public function __construct($model) {
		$this->_model = $model;
	}

	public function show() {
    $lang = $this->_model->getLang();
    //$html = "<h1>" . models\language::normalise($this->_model->getWordform(),$lang) . "</h1>";
		$html = "<h1>" . $this->_model->getWordform() . "</h1>";
    $html .= "<dl>";
    $html .= "<dt>Language</dt><dd>" . models\language::nameLang($lang) . "</dd>";
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
          $html .= models\language::normalise($nextFrom[3],$lang2) . "</a> ";
					$html .= "</dd>";
        }
      }
      if ($etymons) {
        $html .= "<dt>Etymons</dt><dd><ul>";
        foreach ($etymons as $nextFrom) {
          $lang2 = $nextFrom[2];
          $html .= "<li>[" . models\language::nameLang($lang2) . "] <a href=\"?id=" . $nextFrom[0] . "\">" ;
          $html .= models\language::normalise($nextFrom[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
    }
    $tos = $this->_model->getTos();
    if ($tos) {
      $conjugatedForms = [];
			$presents = [];
			$pasts = [];
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
				else if ($nextTo[1]=="present") {
          $presents[] = $nextTo;
        }
				else if ($nextTo[1]=="past") {
          $pasts[] = $nextTo;
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
          $html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
			if ($presents || $pasts || $subjunctives || $optatives || $middles) {
				$html .= "<dt>Tenses, moods etc.</dt><dd><ul>";
				foreach ($presents as $nextTo) {
					$html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
					$lang2 = $nextTo[2];
					$html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
					$html .= "</li>";
				}
				foreach ($pasts as $nextTo) {
					$html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
					$lang2 = $nextTo[2];
					$html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
					$html .= "</li>";
				}
				foreach ($subjunctives as $nextTo) {
					$html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
					$lang2 = $nextTo[2];
					$html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
					$html .= "</li>";
				}
				foreach ($optatives as $nextTo) {
					$html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
					$lang2 = $nextTo[2];
					$html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
					$html .= "</li>";
				}
				foreach ($middles as $nextTo) {
					$html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
					$lang2 = $nextTo[2];
					$html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
					$html .= "</li>";
				}
				$html .= "</ul></dd>";
			}
      if ($derivatives) {
        $html .= "<dt>Derivatives</dt><dd><ul>";
				foreach ($imperfectives as $nextTo) {
          $html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        foreach ($derivatives as $nextTo) {
          $html .= "<li>[" . $this->_describeLink($nextTo[1]) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
			if ($compounds) {
        $html .= "<dt>Compounds</dt><dd><ul>";
        foreach ($compounds as $nextTo) {
          $html .= "<li><a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
      if ($etymons) {
        $html .= "<dt>Etymon of </dt><dd><ul>";
        foreach ($etymons as $nextTo) {
          $lang2 = $nextTo[2];
          $html .= "<li>[" . models\language::nameLang($lang2) . "] <a href=\"?id=" . $nextTo[0] . "\">" ;
          $html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
          $html .= "</li>";
        }
        $html .= "</ul></dd>";
      }
			if ($cfs) {
        $html .= "<dt>See also</dt><dd><ul>";
        foreach ($cfs as $nextTo) {
          $html .= "<li><a href=\"?id=" . $nextTo[0] . "\">" ;
          $lang2 = $nextTo[2];
          $html .= models\language::normalise($nextTo[3],$lang2) . "</a> ";
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

	public function showTree() {
		echo "<ul style=\"list-style-type:none; padding-left: 0;\">";
		echo $this->_makeTree("");
		echo "</ul>";
	}

  private function _makeTree($bullet) {
		$html = "<li>" . $bullet;
    if ($bullet !== "➡️") {
			$html .= "<small class=\"text-muted\">[";
			$html .= models\language::nameLang($this->_model->getLang());
			$html .= "]</small> ";
		}
		$html .= "<a href=\"?id=";
		$html .= $this->_model->getId();
		$html .= "\">";
		$html .= $this->_model->getWordform();
		$html .= "</a>";
		$tos = $this->_model->getTos();
    if ($tos) {
			$html .= "<ul style=\"list-style-type:none\">";
      $etymons = [];
			$compounds = [];
      foreach ($tos as $nextTo) {
        if ($nextTo[1]=="etymon") {
          $etymons[] = $nextTo;
        }
				else if ($nextTo[1]=="compound") {
          $compounds[] = $nextTo;
        }
      }
      if ($etymons) {
        foreach ($etymons as $nextTo) {
          $html .= (new entry(new models\entry($nextTo[0])))->_makeTree("↘️");
        }
      }
			if ($compounds) {
        foreach ($compounds as $nextTo) {
          $html .= (new entry(new models\entry($nextTo[0])))->_makeTree("➡️");
        }
      }
			$html .= "</ul>";
    }
		$html .= "</li>";
		return $html;
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
