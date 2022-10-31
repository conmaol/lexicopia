<?php

require_once 'includes/include.php';

$stem = str_replace('_', ' ', $argv[1]);

echo "Adding first declension Latin noun '" . $stem . " ( a )'" . PHP_EOL;
$nomsg = $stem . " a";
echo "Nom. sg. " . $nomsg . PHP_EOL;
$accsg = $stem . " a m";
echo "Acc. sg. " . $accsg . PHP_EOL;
$gensg = $stem . " ae";
echo "Gen./dat. sg. " . $gensg . PHP_EOL;
$ablsg = $stem . " aa";
echo "Abl. sg. " . $ablsg . PHP_EOL;
echo "Nom. pl. " . $gensg . PHP_EOL;
$accpl = $stem . " aa s";
echo "Acc. pl. " . $accpl . PHP_EOL;
$genpl = str_replace('O','o',str_replace('I','i',str_replace('A','a',str_replace('E','e',$stem)))) . " AA r u m";
echo "Gen. pl. " . $genpl . PHP_EOL;
$datpl = $stem . " ii s";
echo "Dat./Abl. pl. " . $datpl . PHP_EOL;
$db = new models\database();

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $stem . " ( a )", ":lang"=>"la", ":gloss"=>$argv[2], ":morphosyntax"=>"first declension noun", ":notes"=>""));

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $nomsg, ":lang"=>"la", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $accsg, ":lang"=>"la", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"la", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $ablsg, ":lang"=>"la", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $accpl, ":lang"=>"la", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $genpl, ":lang"=>"la", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $datpl, ":lang"=>"la", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));

$sql = <<<SQL
  SELECT id FROM lexicopia WHERE wordform = :wf
SQL;
$results = $db->fetch($sql, array(":wf" => $stem . " ( a )"));
$id = $results[0]['id'];
//echo $id . PHP_EOL;
//echo $id+1 . PHP_EOL;

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+1, ":to"=>$id, ":type"=>"nominative singular"));

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+2, ":to"=>$id, ":type"=>"accusative singular"));
$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+3, ":to"=>$id, ":type"=>"genitive/dative singular"));
$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+4, ":to"=>$id, ":type"=>"ablative singular"));
$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+3, ":to"=>$id, ":type"=>"nominative plural"));
$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+5, ":to"=>$id, ":type"=>"accusative plural"));
$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+6, ":to"=>$id, ":type"=>"genitive plural"));
$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+7, ":to"=>$id, ":type"=>"dative/ablative plural"));



echo "Dunnit" . PHP_EOL;
