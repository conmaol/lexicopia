<?php

namespace views;
use models;

class language {

	private $_model;   // an instance of models\language

	public function __construct($model) {
		$this->_model = $model;
	}

  public function show() {
		if ($this->_model->getId()=="la") {
			$this->printLatin();
		}
		else if ($this->_model->getId()=="sga") {
			$this->printOldGaelic();
		}
  }

	private function printOldGaelic() {
		$name = $this->_model->getName();
		$html = "<h1>" . $name . "</h1>";
		$html .= "<h3>Masculine o-stem nouns</h3>";
		$html .= "<ul>";
    foreach ($this->_model->getHeadwords() as $nextHw) {
      if ($nextHw[2]=="masculine o-stem noun") {
        $html .= '<li><a href="?id=' . $nextHw[0] . '">' . $nextHw[1] . '</a></li>';
      }
    }
    $html .= "</ul>";
		$html .= "<h3>Neuter o-stem nouns</h3>";
		$html .= "<ul>";
    foreach ($this->_model->getHeadwords() as $nextHw) {
      if ($nextHw[2]=="neuter o-stem noun") {
        $html .= '<li><a href="?id=' . $nextHw[0] . '">' . $nextHw[1] . '</a></li>';
      }
    }
    $html .= "</ul>";
		echo $html;
  }

  private function printLatin() {
    $name = $this->_model->getName();
    $html = "<h1>" . $name . "</h1>";
    $html .= "<h3>First declension nouns</h3>";
    $html .= "<ul>";
    foreach ($this->_model->getHeadwords() as $nextHw) {
      if ($nextHw[2]=="first declension noun") {
        $html .= '<li><a href="?id=' . $nextHw[0] . '">' . models\language::normalise($nextHw[1],$this->_model->getId()) . '</a></li>';
      }
    }
    $html .= "</ul>";
    $html .= "<h5>Masculine</h5>";
    $html .= "<ul>";
    foreach ($this->_model->getHeadwords() as $nextHw) {
      if ($nextHw[2]=="masculine first declension noun") {
        $html .= '<li><a href="?id=' . $nextHw[0] . '">' . models\language::normalise($nextHw[1],$this->_model->getId()) . '</a></li>';
      }
    }
    $html .= "</ul>";
    $html .= "<h5>Proper</h5>";
    $html .= "<ul>";
    foreach ($this->_model->getHeadwords() as $nextHw) {
      if ($nextHw[2]=="first declension proper noun") {
        $html .= '<li><a href="?id=' . $nextHw[0] . '">' . models\language::normalise($nextHw[1],$this->_model->getId()) . '</a></li>';
      }
    }
    $html .= "</ul>";
    $html .= "<h5>Masculine proper</h5>";
    $html .= "<ul>";
    foreach ($this->_model->getHeadwords() as $nextHw) {
      if ($nextHw[2]=="masculine first declension proper noun") {
        $html .= '<li><a href="?id=' . $nextHw[0] . '">' . models\language::normalise($nextHw[1],$this->_model->getId()) . '</a></li>';
      }
    }
    $html .= "</ul>";
    echo $html;
  }

}
