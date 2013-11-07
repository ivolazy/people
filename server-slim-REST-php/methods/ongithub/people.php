<?php$route = '/ongithub/people/';$app->get($route, function ()  use ($app){	if(isset($_REQUEST['query'])){ $query = $_REQUEST['query']; } else { $query = '';}	$ObjectText = file_get_contents('https://raw.github.com/ongithub/people/gh-pages/people.json');	$ObjectResult = json_decode($ObjectText,true);	$ReturnObject = array();	foreach($ObjectResult as $Object){		$IncludeRecord = 1;		$id = $Object['id'];		$name = $Object['name'];		$givenName = $Object['givenName'];		$familyName = $Object['familyName'];		$description = $Object['description'];		$url = $Object['url'];		$image = $Object['image'];		$keywords = $Object['keywords'];		$streetAddress = $Object['streetAddress'];		$addressLocality = $Object['addressLocality'];		$addressRegion = $Object['addressRegion'];		$postalCode = $Object['postalCode'];		$telephone = $Object['telephone'];		$email = $Object['email'];		$birthDate = $Object['birthDate'];		$gender = $Object['gender'];		if($query!=''){		$IncludeRecord = 0;			if(strpos(strtolower($givenName),strtolower($query)) === 0 || strpos(strtolower($familyName),strtolower($query)) === 0 || strpos(strtolower($description),strtolower($query)) === 0)				{				$IncludeRecord = 1;				}			}		if($IncludeRecord==1)			{			$F = array();			$F['id'] = $id;			$F['name'] = $name;			$F['givenName'] = $givenName;			$F['familyName'] = $familyName;			$F['description'] = $description;			$F['url'] = $url;			$F['image'] = $image;			$F['keywords'] = $keywords;			$F['streetAddress'] = $streetAddress;			$F['addressLocality'] = $addressLocality;			$F['addressRegion'] = $addressRegion;			$F['postalCode'] = $postalCode;			$F['telephone'] = $telephone;			$F['email'] = $email;			$F['birthDate'] = $birthDate;			$F['gender'] = $gender;			array_push($ReturnObject, $F);			}		}		$app->response()->header("Content-Type", "application/json");		echo format_json(json_encode($ReturnObject));	});$route = '/ongithub/people/:id';$app->get($route, function ($IncomingID)  use ($app){	$ObjectText = file_get_contents('https://raw.github.com/ongithub/people/gh-pages/people.json');	$ObjectResult = json_decode($ObjectText,true);	$ReturnObject = array();	foreach($ObjectResult as $Object){		$IncludeRecord = 0;		$id = $Object['id'];		$name = $Object['name'];		$givenName = $Object['givenName'];		$familyName = $Object['familyName'];		$description = $Object['description'];		$url = $Object['url'];		$image = $Object['image'];		$keywords = $Object['keywords'];		$streetAddress = $Object['streetAddress'];		$addressLocality = $Object['addressLocality'];		$addressRegion = $Object['addressRegion'];		$postalCode = $Object['postalCode'];		$telephone = $Object['telephone'];		$email = $Object['email'];		$birthDate = $Object['birthDate'];		$gender = $Object['gender'];		if($IncomingID==$id)			{			$IncludeRecord=1;			}		if($IncludeRecord==1)			{			$F = array();			$F['id'] = $id;			$F['name'] = $name;			$F['givenName'] = $givenName;			$F['familyName'] = $familyName;			$F['description'] = $description;			$F['url'] = $url;			$F['image'] = $image;			$F['keywords'] = $keywords;			$F['streetAddress'] = $streetAddress;			$F['addressLocality'] = $addressLocality;			$F['addressRegion'] = $addressRegion;			$F['postalCode'] = $postalCode;			$F['telephone'] = $telephone;			$F['email'] = $email;			$F['birthDate'] = $birthDate;			$F['gender'] = $gender;			array_push($ReturnObject, $F);			}		}		$app->response()->header("Content-Type", "application/json");		echo format_json(json_encode($ReturnObject));	});?>