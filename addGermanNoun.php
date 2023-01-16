<?php

require_once 'includes/include.php';

$stem = $argv[1]; // noun root

echo "Adding German noun '" . $stem . PHP_EOL;
$ns = '(ein/der) ' . $stem;
$as = '(einen/den) ' . $stem;
$gs = '(eines/des) ' . $stem;
$ds = '(einem/dem) ' . $stem;
$np = '(keine/die) ' . $stem;
$ap = '(keine/die) ' . $stem;
$gp = '(keiner/der) ' . $stem;
$dp = '(keinen/den) ' . $stem;

$db = new models\database();

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;

$db->exec($sql, array(":wordform" => $stem, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"noun", ":notes"=>""));
$db->exec($sql, array(":wordform" => $ns, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $as, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gs, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $ds, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $np, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $ap, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gp, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $dp, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));

$sql = <<<SQL
  SELECT id FROM lexicopia WHERE wordform = :wf AND lang = :lang AND morphosyntax = :ms
SQL;
$results = $db->fetch($sql, array(":wf" => $stem, ":lang" => "de", ":ms" => "noun"));
$stemid = $results[0]['id'];

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $stemid+1, ":to"=>$stemid, ":type"=>"nominative singular"));
$db->exec($sql, array(":from" => $stemid+2, ":to"=>$stemid, ":type"=>"accusative singular"));
$db->exec($sql, array(":from" => $stemid+3, ":to"=>$stemid, ":type"=>"genitive singular"));
$db->exec($sql, array(":from" => $stemid+4, ":to"=>$stemid, ":type"=>"dative singular"));
$db->exec($sql, array(":from" => $stemid+5, ":to"=>$stemid, ":type"=>"nominative plural"));
$db->exec($sql, array(":from" => $stemid+6, ":to"=>$stemid, ":type"=>"accusative plural"));
$db->exec($sql, array(":from" => $stemid+7, ":to"=>$stemid, ":type"=>"genitive plural"));
$db->exec($sql, array(":from" => $stemid+8, ":to"=>$stemid, ":type"=>"dative plural"));

echo "Dunnit" . PHP_EOL;
