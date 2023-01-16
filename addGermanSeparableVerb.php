<?php

require_once 'includes/include.php';

$stem = $argv[1]; // verbal root
$prefix = $argv[2]; // prefix


echo "Adding German separable verb '" . $prefix . ' ' . $stem . PHP_EOL;
$inf = $prefix . '·' . $stem . '(en)';
// present indicative
$s1 = '(ich) ' . $stem . 'e ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'e';
$s2 = '(du) ' . $stem . 'st ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'st';
$s3 = '(er/sie/es) ' . $stem . 't ... ' . $prefix . ' / ... ' .  $prefix . $stem . 't';
$p1 = '(wir) ' . $stem . 'en ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'en';
$p2 = '(ihr) ' . $stem . 't ... ' . $prefix . ' / ... ' .  $prefix . $stem . 't';
$p3 = '(sie) ' . $stem . 'en ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'en';
// present subjunctive
$sbj = $prefix . '·' . $stem . 'e-';
$sbjs1 = '(ich) ' . $stem . 'e ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'e';
$sbjs2 = '(du) ' . $stem . 'est ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'est';
$sbjs3 = '(er/sie/es) ' . $stem . 'e ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'e';
$sbjp1 = '(wir) ' . $stem . 'en ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'en';
$sbjp2 = '(ihr) ' . $stem . 'et ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'et';
$sbjp3 = '(sie) ' . $stem . 'en ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'en';
// past indicative
$pst = $prefix . '·' . $stem . 't-';
$psts1 = '(ich) ' . $stem . 'te ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'te';
$psts2 = '(du) ' . $stem . 'test ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'test';
$psts3 = '(er/sie/es) ' . $stem . 'te ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'te';
$pstp1 = '(wir) ' . $stem . 'ten ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'ten';
$pstp2 = '(ihr) ' . $stem . 'tet ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'tet';
$pstp3 = '(sie) ' . $stem . 'ten ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'ten';

// past subjunctive
$pstsbj = $prefix . '·' . $stem . 'te-';
$pstsbjs1 = '(ich) ' . $stem . 'te ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'te';
$pstsbjs2 = '(du) ' . $stem . 'test ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'test';
$pstsbjs3 = '(er/sie/es) ' . $stem . 'te ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'te';
$pstsbjp1 = '(wir) ' . $stem . 'ten ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'ten';
$pstsbjp2 = '(ihr) ' . $stem . 'tet ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'tet';
$pstsbjp3 = '(sie) ' . $stem . 'ten ... ' . $prefix . ' / ... ' .  $prefix . $stem . 'ten';

$db = new models\database();

$sql = <<<SQL
  INSERT INTO lexicopia (`wordform`, `lang`, `gloss`, `morphosyntax`, `notes`)
    VALUES(:wordform, :lang, :gloss, :morphosyntax, :notes);
SQL;

$db->exec($sql, array(":wordform" => $inf, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"separable verb", ":notes"=>""));
$db->exec($sql, array(":wordform" => $s1, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $s2, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $s3, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $p1, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $p2, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $p3, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $sbj, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $sbjs1, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $sbjs2, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $sbjs3, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $sbjp1, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $sbjp2, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $sbjp3, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pst, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $psts1, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $psts2, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $psts3, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstp1, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstp2, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstp3, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstsbj, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstsbjs1, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstsbjs2, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstsbjs3, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstsbjp1, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstsbjp2, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));
$db->exec($sql, array(":wordform" => $pstsbjp3, ":lang"=>"de", ":gloss"=>"", ":morphosyntax"=>"", ":notes"=>""));


$sql = <<<SQL
  SELECT id FROM lexicopia WHERE wordform = :wf AND lang = :lang AND morphosyntax = :ms
SQL;
$results = $db->fetch($sql, array(":wf" => $inf, ":lang" => "de", ":ms" => "separable verb"));
$infid = $results[0]['id'];

$sql = <<<SQL
  INSERT INTO lexicopia_links (`from_id`, `to_id`, `type`)
    VALUES(:from, :to, :type);
SQL;
$db->exec($sql, array(":from" => $infid+1, ":to"=>$infid, ":type"=>"1s"));
$db->exec($sql, array(":from" => $infid+2, ":to"=>$infid, ":type"=>"2s"));
$db->exec($sql, array(":from" => $infid+3, ":to"=>$infid, ":type"=>"3s"));
$db->exec($sql, array(":from" => $infid+4, ":to"=>$infid, ":type"=>"1p"));
$db->exec($sql, array(":from" => $infid+5, ":to"=>$infid, ":type"=>"2p"));
$db->exec($sql, array(":from" => $infid+6, ":to"=>$infid, ":type"=>"3p"));
$sbjid = $infid+7;
$db->exec($sql, array(":from" => $sbjid, ":to"=>$infid, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $sbjid+1, ":to"=>$sbjid, ":type"=>"1s"));
$db->exec($sql, array(":from" => $sbjid+2, ":to"=>$sbjid, ":type"=>"2s"));
$db->exec($sql, array(":from" => $sbjid+3, ":to"=>$sbjid, ":type"=>"3s"));
$db->exec($sql, array(":from" => $sbjid+4, ":to"=>$sbjid, ":type"=>"1p"));
$db->exec($sql, array(":from" => $sbjid+5, ":to"=>$sbjid, ":type"=>"2p"));
$db->exec($sql, array(":from" => $sbjid+6, ":to"=>$sbjid, ":type"=>"3p"));
$pstid = $sbjid+7;
$db->exec($sql, array(":from" => $pstid, ":to"=>$infid, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstid+1, ":to"=>$pstid, ":type"=>"1s"));
$db->exec($sql, array(":from" => $pstid+2, ":to"=>$pstid, ":type"=>"2s"));
$db->exec($sql, array(":from" => $pstid+3, ":to"=>$pstid, ":type"=>"3s"));
$db->exec($sql, array(":from" => $pstid+4, ":to"=>$pstid, ":type"=>"1p"));
$db->exec($sql, array(":from" => $pstid+5, ":to"=>$pstid, ":type"=>"2p"));
$db->exec($sql, array(":from" => $pstid+6, ":to"=>$pstid, ":type"=>"3p"));
$pstsbjid = $pstid+7;
$db->exec($sql, array(":from" => $pstsbjid, ":to"=>$pstid, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $pstsbjid, ":to"=>$sbjid, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstsbjid+1, ":to"=>$pstsbjid, ":type"=>"1s"));
$db->exec($sql, array(":from" => $pstsbjid+2, ":to"=>$pstsbjid, ":type"=>"2s"));
$db->exec($sql, array(":from" => $pstsbjid+3, ":to"=>$pstsbjid, ":type"=>"3s"));
$db->exec($sql, array(":from" => $pstsbjid+4, ":to"=>$pstsbjid, ":type"=>"1p"));
$db->exec($sql, array(":from" => $pstsbjid+5, ":to"=>$pstsbjid, ":type"=>"2p"));
$db->exec($sql, array(":from" => $pstsbjid+6, ":to"=>$pstsbjid, ":type"=>"3p"));

$db->exec($sql, array(":from" => $sbjid+1, ":to"=>$infid+1, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $sbjid+2, ":to"=>$infid+2, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $sbjid+3, ":to"=>$infid+3, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $sbjid+4, ":to"=>$infid+4, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $sbjid+5, ":to"=>$infid+5, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $sbjid+6, ":to"=>$infid+6, ":type"=>"subjunctive"));

$db->exec($sql, array(":from" => $pstid+1, ":to"=>$infid+1, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstid+2, ":to"=>$infid+2, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstid+3, ":to"=>$infid+3, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstid+4, ":to"=>$infid+4, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstid+5, ":to"=>$infid+5, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstid+6, ":to"=>$infid+6, ":type"=>"past"));

$db->exec($sql, array(":from" => $pstsbjid+1, ":to"=>$pstid+1, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $pstsbjid+2, ":to"=>$pstid+2, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $pstsbjid+3, ":to"=>$pstid+3, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $pstsbjid+4, ":to"=>$pstid+4, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $pstsbjid+5, ":to"=>$pstid+5, ":type"=>"subjunctive"));
$db->exec($sql, array(":from" => $pstsbjid+6, ":to"=>$pstid+6, ":type"=>"subjunctive"));

$db->exec($sql, array(":from" => $pstsbjid+1, ":to"=>$sbjid+1, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstsbjid+2, ":to"=>$sbjid+2, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstsbjid+3, ":to"=>$sbjid+3, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstsbjid+4, ":to"=>$sbjid+4, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstsbjid+5, ":to"=>$sbjid+5, ":type"=>"past"));
$db->exec($sql, array(":from" => $pstsbjid+6, ":to"=>$sbjid+6, ":type"=>"past"));

echo "Dunnit" . PHP_EOL;
