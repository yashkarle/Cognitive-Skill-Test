<?php 

session_start();
$m=new MongoClient();
$db=$m->pluto;
$colluser=$db->user;
$questuser=array('username'=>$_SESSION['username']);
$cursoruser=$colluser->findone($questuser);

$score=$cursoruser['score_graph'];
//print_r($score);

// content="text/plain; charset=utf-8"
require_once ('/usr/share/php5/jpgraph/src/jpgraph.php');
require_once ('/usr/share/php5/jpgraph/src/jpgraph_line.php');

$l=sizeof($score);
$datay = array($score[$l-5],$score[$l-4],$score[$l-3],$score[$l-2],$score[$l-1],0);

// Setup the graph
$graph = new Graph(500,250);
$graph->SetScale("intlin",0,$aYMax=50);
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetBox(false);

$graph->title->Set('YOUR GRAPHICAL ANALYSIS');
$graph->ygrid->Show(true);
$graph->xgrid->Show(false);
$graph->yaxis->HideZeroLabel();
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('blue', '#55eeff', GRAD_HOR, BGRAD_PLOT);
$graph->xaxis->SetTickLabels(array('0','1','2','3','4','5'));

// Create the line
$p1 = new LinePlot($datay);
$graph->Add($p1);

$p1->SetFillGradient('yellow','red');
$p1->SetStepStyle();
$p1->SetColor('#808000');

// Output line
$graph->Stroke();
?>