<?php

require_once 'includes/include.php';

$stem = $argv[1];

echo "Adding o/a-stem Old Gaelic adjective '" . $stem . PHP_EOL;

$db = new models\database();

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $stem, ":lang"=>"sga", ":gloss"=>$argv[2], ":morphosyntax"=>"o/ā-stem adjective", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "i<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "i<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "u<sup>H</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "aiḃ", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "i<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "i<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "aiḃ", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));

$sql = <<<SQL
  SELECT id FROM lexicopia WHERE wordform = :wf AND lang = :lang AND morphosyntax = :ms
SQL;
$results = $db->fetch($sql, array(":wf" => $stem, ":lang" => "sga", ":ms" => "o/ā-stem adjective"));
$id = $results[0]['id'];

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+1, ":to"=>$id, ":type"=>"masculine nominative singular"));
$db->exec($sql, array(":from" => $id+2, ":to"=>$id, ":type"=>"masculine accusative singular"));
$db->exec($sql, array(":from" => $id+3, ":to"=>$id, ":type"=>"masculine genitive singular"));
$db->exec($sql, array(":from" => $id+4, ":to"=>$id, ":type"=>"masculine dative singular"));
$db->exec($sql, array(":from" => $id+5, ":to"=>$id, ":type"=>"masculine nominative plural"));
$db->exec($sql, array(":from" => $id+6, ":to"=>$id, ":type"=>"masculine accusative plural"));
$db->exec($sql, array(":from" => $id+7, ":to"=>$id, ":type"=>"masculine genitive plural"));
$db->exec($sql, array(":from" => $id+8, ":to"=>$id, ":type"=>"masculine dative plural"));
$db->exec($sql, array(":from" => $id+9, ":to"=>$id, ":type"=>"masculine nominative dual"));
$db->exec($sql, array(":from" => $id+10, ":to"=>$id, ":type"=>"masculine accusative dual"));
$db->exec($sql, array(":from" => $id+11, ":to"=>$id, ":type"=>"masculine genitive dual"));
$db->exec($sql, array(":from" => $id+12, ":to"=>$id, ":type"=>"masculine dative dual"));

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;

$db->exec($sql, array(":wordform" => $stem . "<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "i<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "a<sup>H</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "a<sup>H</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "aiḃ", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "a", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "a", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "aiḃ", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+13, ":to"=>$id, ":type"=>"neuter nominative singular"));
$db->exec($sql, array(":from" => $id+14, ":to"=>$id, ":type"=>"neuter accusative singular"));
$db->exec($sql, array(":from" => $id+15, ":to"=>$id, ":type"=>"neuter genitive singular"));
$db->exec($sql, array(":from" => $id+16, ":to"=>$id, ":type"=>"neuter dative singular"));
$db->exec($sql, array(":from" => $id+17, ":to"=>$id, ":type"=>"neuter nominative plural"));
$db->exec($sql, array(":from" => $id+18, ":to"=>$id, ":type"=>"neuter accusative plural"));
$db->exec($sql, array(":from" => $id+19, ":to"=>$id, ":type"=>"neuter genitive plural"));
$db->exec($sql, array(":from" => $id+20, ":to"=>$id, ":type"=>"neuter dative plural"));
$db->exec($sql, array(":from" => $id+21, ":to"=>$id, ":type"=>"neuter nominative dual"));
$db->exec($sql, array(":from" => $id+22, ":to"=>$id, ":type"=>"neuter accusative dual"));
$db->exec($sql, array(":from" => $id+23, ":to"=>$id, ":type"=>"neuter genitive dual"));
$db->exec($sql, array(":from" => $id+24, ":to"=>$id, ":type"=>"neuter dative dual"));
$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;

$db->exec($sql, array(":wordform" => $stem . "<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "i<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "ie<sup>H</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "i<sup>L</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "a<sup>H</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "a<sup>H</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "aiḃ", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "a<sup>H</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "a<sup>H</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "<sup>N</sup>", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $stem . "aiḃ", ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+25, ":to"=>$id, ":type"=>"feminine nominative singular"));
$db->exec($sql, array(":from" => $id+26, ":to"=>$id, ":type"=>"feminine accusative singular"));
$db->exec($sql, array(":from" => $id+27, ":to"=>$id, ":type"=>"feminine genitive singular"));
$db->exec($sql, array(":from" => $id+28, ":to"=>$id, ":type"=>"feminine dative singular"));
$db->exec($sql, array(":from" => $id+29, ":to"=>$id, ":type"=>"feminine nominative plural"));
$db->exec($sql, array(":from" => $id+30, ":to"=>$id, ":type"=>"feminine accusative plural"));
$db->exec($sql, array(":from" => $id+31, ":to"=>$id, ":type"=>"feminine genitive plural"));
$db->exec($sql, array(":from" => $id+32, ":to"=>$id, ":type"=>"feminine dative plural"));
$db->exec($sql, array(":from" => $id+33, ":to"=>$id, ":type"=>"feminine nominative dual"));
$db->exec($sql, array(":from" => $id+34, ":to"=>$id, ":type"=>"feminine accusative dual"));
$db->exec($sql, array(":from" => $id+35, ":to"=>$id, ":type"=>"feminine genitive dual"));
$db->exec($sql, array(":from" => $id+36, ":to"=>$id, ":type"=>"feminine dative dual"));
echo "Dunnit" . PHP_EOL;
