<?php

require_once 'includes/include.php';

$stem = $argv[1];

echo "Adding masculine o-stem Old Gaelic noun '" . $stem . PHP_EOL;
$nomsg = $stem;
echo "Nom. sg. " . $nomsg . PHP_EOL;
$accsg = $stem . "<sup>N</sup>";
echo "Acc. sg. " . $accsg . PHP_EOL;
$gensg = $stem . "<sup>L</sup>";
echo "Gen. sg. " . $gensg . PHP_EOL;
echo "Dat. sg. " . $gensg . PHP_EOL;
echo "Nom. pl. " . $gensg . PHP_EOL;
$accpl = $stem . "u<sup>H</sup>";
echo "Acc. pl. " . $accpl . PHP_EOL;
echo "Gen. pl. " . $accsg . PHP_EOL;
$datpl = $stem . "aiḃ";
echo "Dat. pl. " . $datpl . PHP_EOL;
$nomdl = "dá " . $stem . "<sup>L</sup>";
echo "Nom. dl. " . $nomdl . PHP_EOL;
echo "Acc. dl. " . $nomdl . PHP_EOL;
echo "Gen. dl. " . $nomdl . PHP_EOL;
$datdl = "díḃ " . $datpl;
echo "Dat. dl. " . $datdl . PHP_EOL;

$db = new models\database();

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;

$db->exec($sql, array(":wordform" => $stem, ":lang"=>"sga", ":gloss"=>$argv[2], ":morphosyntax"=>"masculine o-stem noun", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $accsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $accpl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $accsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $datpl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $datdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));

$sql = <<<SQL
  SELECT id FROM lexicopia WHERE wordform = :wf AND lang = :lang AND morphosyntax = :ms
SQL;
$results = $db->fetch($sql, array(":wf" => $stem, ":lang" => "sga", ":ms" => "masculine o-stem noun"));
$id = $results[0]['id'];

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+1, ":to"=>$id, ":type"=>"nominative singular"));
$db->exec($sql, array(":from" => $id+2, ":to"=>$id, ":type"=>"accusative singular"));
$db->exec($sql, array(":from" => $id+3, ":to"=>$id, ":type"=>"genitive singular"));
$db->exec($sql, array(":from" => $id+4, ":to"=>$id, ":type"=>"dative singular"));
$db->exec($sql, array(":from" => $id+5, ":to"=>$id, ":type"=>"nominative plural"));
$db->exec($sql, array(":from" => $id+6, ":to"=>$id, ":type"=>"accusative plural"));
$db->exec($sql, array(":from" => $id+7, ":to"=>$id, ":type"=>"genitive plural"));
$db->exec($sql, array(":from" => $id+8, ":to"=>$id, ":type"=>"dative plural"));
$db->exec($sql, array(":from" => $id+9, ":to"=>$id, ":type"=>"nominative dual"));
$db->exec($sql, array(":from" => $id+10, ":to"=>$id, ":type"=>"accusative dual"));
$db->exec($sql, array(":from" => $id+11, ":to"=>$id, ":type"=>"genitive dual"));
$db->exec($sql, array(":from" => $id+12, ":to"=>$id, ":type"=>"dative dual"));

echo "Adding definites" . PHP_EOL;
$nomsg = "in " . $stem;
echo "Nom. sg. " . $nomsg . PHP_EOL;
$accsg = "in<sup>N</sup> " . $stem . "<sup>N</sup>";
echo "Acc. sg. " . $accsg . PHP_EOL;
$gensg = "in<sup>L</sup> " . $stem . "<sup>L</sup>";
echo "Gen. sg. " . $gensg . PHP_EOL;
$datsg = "-(si)n<sup>L</sup> " . $stem . "<sup>L</sup>";
echo "Dat. sg. " . $datsg . PHP_EOL;
echo "Nom. pl. " . $gensg . PHP_EOL;
$accpl = "inna<sup>H</sup> " . $stem . "u<sup>H</sup>";
echo "Acc. pl. " . $accpl . PHP_EOL;
$genpl = "inna<sup>N</sup> " . $stem . "u<sup>N</sup>";
echo "Gen. pl. " . $genpl . PHP_EOL;
$datpl = "-(s)naiḃ " . $stem . "aiḃ";
echo "Dat. pl. " . $datpl . PHP_EOL;
$nomdl = "in dá " . $stem . "<sup>L</sup>";
echo "Nom. dl. " . $nomdl . PHP_EOL;
echo "Acc. dl. " . $nomdl . PHP_EOL;
echo "Gen. dl. " . $nomdl . PHP_EOL;
$datdl = "-(s)naiḃ díḃ " . $datpl;
echo "Dat. dl. " . $datdl . PHP_EOL;

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $nomsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $accsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $datsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $accpl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $genpl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $datpl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $datdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));


$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+13, ":to"=>$id, ":type"=>"nominative singular definite"));
$db->exec($sql, array(":from" => $id+14, ":to"=>$id, ":type"=>"accusative singular definite"));
$db->exec($sql, array(":from" => $id+15, ":to"=>$id, ":type"=>"genitive singular definite"));
$db->exec($sql, array(":from" => $id+16, ":to"=>$id, ":type"=>"dative singular definite"));
$db->exec($sql, array(":from" => $id+17, ":to"=>$id, ":type"=>"nominative plural definite"));
$db->exec($sql, array(":from" => $id+18, ":to"=>$id, ":type"=>"accusative plural definite"));
$db->exec($sql, array(":from" => $id+19, ":to"=>$id, ":type"=>"genitive plural definite"));
$db->exec($sql, array(":from" => $id+20, ":to"=>$id, ":type"=>"dative plural definite"));
$db->exec($sql, array(":from" => $id+21, ":to"=>$id, ":type"=>"nominative dual definite"));
$db->exec($sql, array(":from" => $id+22, ":to"=>$id, ":type"=>"accusative dual definite"));
$db->exec($sql, array(":from" => $id+23, ":to"=>$id, ":type"=>"genitive dual definite"));
$db->exec($sql, array(":from" => $id+24, ":to"=>$id, ":type"=>"dative dual definite"));





echo "Dunnit" . PHP_EOL;
