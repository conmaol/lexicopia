<?php

require_once 'includes/include.php';

$stem = $argv[1];

echo "Adding neuter o-stem Old Gaelic noun '" . $stem . PHP_EOL;
$nomsg = $stem . "<sup>N</sup>";
echo "Nom. sg. " . $nomsg . PHP_EOL;
echo "Acc. sg. " . $nomsg . PHP_EOL;
$gensg = $stem . "<sup>L</sup>";
echo "Gen. sg. " . $gensg . PHP_EOL;
echo "Dat. sg. " . $gensg . PHP_EOL;
$nompl1 = $stem . "<sup>L</sup>";
$nompl2 = $stem . "a<sup>H</sup>";
echo "Nom. pl. " . $nompl1 . PHP_EOL;
echo "Nom. pl. " . $nompl2 . PHP_EOL;
echo "Acc. pl. " . $nompl1 . PHP_EOL;
echo "Acc. pl. " . $nompl2 . PHP_EOL;
echo "Gen. pl. " . $nomsg . PHP_EOL;
$datpl = $stem . "aiḃ";
echo "Dat. pl. " . $datpl . PHP_EOL;
$nomdl = "dá " . $stem . "<sup>N</sup>";
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
$db->exec($sql, array(":wordform" => $stem, ":lang"=>"sga", ":gloss"=>$argv[2], ":morphosyntax"=>"neuter o-stem noun", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nompl1, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nompl2, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nompl1, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nompl2, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $datpl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $datdl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));

$sql = <<<SQL
  SELECT id FROM lexicopia WHERE wordform = :wf AND lang = :lang AND morphosyntax = :ms
SQL;
$results = $db->fetch($sql, array(":wf" => $stem, ":lang" => "sga", ":ms" => "neuter o-stem noun"));
$id = $results[0]['id'];
//echo $id . PHP_EOL;
//echo $id+1 . PHP_EOL;

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $id+1, ":to"=>$id, ":type"=>"nominative singular"));
$db->exec($sql, array(":from" => $id+2, ":to"=>$id, ":type"=>"accusative singular"));
$db->exec($sql, array(":from" => $id+3, ":to"=>$id, ":type"=>"genitive singular"));
$db->exec($sql, array(":from" => $id+4, ":to"=>$id, ":type"=>"dative singular"));
$db->exec($sql, array(":from" => $id+5, ":to"=>$id, ":type"=>"short nominative plural"));
$db->exec($sql, array(":from" => $id+6, ":to"=>$id, ":type"=>"long nominative plural"));
$db->exec($sql, array(":from" => $id+7, ":to"=>$id, ":type"=>"short accusative plural"));
$db->exec($sql, array(":from" => $id+8, ":to"=>$id, ":type"=>"long accusative plural"));
$db->exec($sql, array(":from" => $id+9, ":to"=>$id, ":type"=>"genitive plural"));
$db->exec($sql, array(":from" => $id+10, ":to"=>$id, ":type"=>"dative plural"));
$db->exec($sql, array(":from" => $id+11, ":to"=>$id, ":type"=>"nominative dual"));
$db->exec($sql, array(":from" => $id+12, ":to"=>$id, ":type"=>"accusative dual"));
$db->exec($sql, array(":from" => $id+13, ":to"=>$id, ":type"=>"genitive dual"));
$db->exec($sql, array(":from" => $id+14, ":to"=>$id, ":type"=>"dative dual"));

echo "Adding definites '" . PHP_EOL;
$nomsg = "a<sup>N</sup> " . $stem . "<sup>N</sup>";
echo "Nom. sg. " . $nomsg . PHP_EOL;
echo "Acc. sg. " . $nomsg . PHP_EOL;
$gensg = "in<sup>L</sup> " . $stem . "<sup>L</sup>";
echo "Gen. sg. " . $gensg . PHP_EOL;
$datsg = "-(si)n<sup>L</sup> " . $stem . "<sup>L</sup>";
echo "Dat. sg. " . $datsg . PHP_EOL;
$nompl = "inna " . $stem . "<sup>L</sup>" . PHP_EOL;
echo "Nom. pl. " . $nompl . PHP_EOL;
echo "Acc. pl. " . $nompl . PHP_EOL;
$genpl = "inna<sup>N</sup> " . $stem . "<sup>N</sup>";
echo "Gen. pl. " . $genpl . PHP_EOL;
$datpl = "-(s)naiḃ " . $stem . "aiḃ";
echo "Dat. pl. " . $datpl . PHP_EOL;
$nomdl = "in dá<sup>n</sup> " . $stem . "<sup>N</sup>";
echo "Nom. dl. " . $nomdl . PHP_EOL;
echo "Acc. dl. " . $nomdl . PHP_EOL;
echo "Gen. dl. " . $nomdl . PHP_EOL;
$datdl = "-(s)naiḃ díḃ " . $stem . "aiḃ";
echo "Dat. dl. " . $datdl . PHP_EOL;

$db = new models\database();

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;
$db->exec($sql, array(":wordform" => $nomsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nomsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $gensg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $datsg, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nompl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $nompl, ":lang"=>"sga", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
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
$db->exec($sql, array(":from" => $id+15, ":to"=>$id, ":type"=>"nominative singular definite"));
$db->exec($sql, array(":from" => $id+16, ":to"=>$id, ":type"=>"accusative singular definite"));
$db->exec($sql, array(":from" => $id+17, ":to"=>$id, ":type"=>"genitive singular definite"));
$db->exec($sql, array(":from" => $id+18, ":to"=>$id, ":type"=>"dative singular definite"));
$db->exec($sql, array(":from" => $id+19, ":to"=>$id, ":type"=>"nominative plural definite"));
$db->exec($sql, array(":from" => $id+20, ":to"=>$id, ":type"=>"accusative plural definite"));
$db->exec($sql, array(":from" => $id+21, ":to"=>$id, ":type"=>"genitive plural definite"));
$db->exec($sql, array(":from" => $id+22, ":to"=>$id, ":type"=>"dative plural definite"));
$db->exec($sql, array(":from" => $id+23, ":to"=>$id, ":type"=>"nominative dual definite"));
$db->exec($sql, array(":from" => $id+24, ":to"=>$id, ":type"=>"accusative dual definite"));
$db->exec($sql, array(":from" => $id+25, ":to"=>$id, ":type"=>"genitive dual definite"));
$db->exec($sql, array(":from" => $id+26, ":to"=>$id, ":type"=>"dative dual definite"));

echo "Dunnit" . PHP_EOL;
