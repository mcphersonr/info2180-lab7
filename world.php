<?php

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$country=$_GET['country'];
$checkbox=$_GET['checkbox'];

function country($sql){
  $doc='<ul>';
  while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    $doc.= '<h3>' . $row['name'].'</h3>';
    $doc.= '<li>'. 'Codename: ' . $row['code'] . '</li>';
    $doc.= '<li>'. 'Continent: ' . $row['continent'] . '</li>';
    $doc.= '<li>'. 'Region: ' . $row['region'] . '</li>';
    $doc.= '<li>'. 'Surface Area: ' . $row['surface_area'] . '</li>';
    $doc.= '<li>'. 'Independence Year: ' . $row['independence_year'] . '</li>';
    $doc.= '<li>'. 'Population: ' . $row['population'] . '</li>';
    $doc.= '<li>'. 'Life Expectancy: ' . $row['life_expectancy'] . '</li>';
    $doc.= '<li>'. 'Gross National Product (GNP): ' . $row['gnp'] . '</li>';
    $doc.= '<li>'. 'Old (GNP): ' . $row['gnp_old'] . '</li>';
    $doc.= '<li>'. 'Local Name: ' . $row['local_name'] . '</li>';
    $doc.= '<li>'. 'Government: ' . $row['government_form'] . '</li>';
    $doc.= '<li>'. 'Head of State: ' . $row['head_of_state'] . '</li>';
    $doc.= '<li>'. 'Capital: ' . $row['capital'] . '</li>';
    $doc.= '<li>'. 'Code 2: ' . $row['code2'] . '</li>';
  }
  $doc.= '</ul></br></br>';
  echo $doc;
};

if($checkbox==="true"){
  $stmt = $conn->query("SELECT * FROM countries");
  country($stmt);
} 

if($checkbox==="false"){
  $stmt = $conn->query("SELECT * FROM countries where name='".$country."'");
  country($stmt);
}

