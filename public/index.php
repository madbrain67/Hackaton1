<?php

session_start();

date_default_timezone_set('Europe/Paris');

//echo '<pre>'.print_r($_SESSION['user'], true).'</pre>';
//session_destroy();

require '../vendor/autoload.php';
require_once __DIR__.'/../config/defines.php';
require_once __DIR__.'/../config/db.php';
require '../config/router.php';


/*
// Create a client with a base URI
$client = new GuzzleHttp\Client(
    [
    'base_uri' => 'http://easteregg.wildcodeschool.fr/api/',
    ]
);

$response = $client->request('GET', 'eggs');
*/
/*
$response = $client->request('GET', 'eggs', [
    'key' => 'random',
]
);
*/
/*
$body = $response->getBody();
$u = $body->getContents();
//echo $body->getContents();
//echo '<pre>'.print_r(json_decode($u), true).'</pre>';
$zz = json_decode($u);
*/
/*
    [0] => stdClass Object
        (
            [id] => 5cac51240d488f0da6151bcd
            [name] => Egg of Tuna
            [color] => #7e3703
            [caliber] => L
            [farming] => 3
            [country] => KP
            [rarity] => junk
            [image] => https://cdn.shopify.com/s/files/1/0993/5182/products/CXBO_Chocolate_Disco_Egg_large.png?v=1519913456
            [power] => decrease physical proctection:9
            [meta] => stdClass Object
                (
                    [revision] => 0
                    [created] => 1554982481291
                    [version] => 0
                )

            [$loki] => 1
            [validity] => 2019-04-17T14:32:02.378Z
        )
*/
/*
for ($i = 0; $i < count($zz); ++$i) {
    echo 'id : '.$zz[$i]->id.'<br>';
    echo 'name : '.$zz[$i]->name.'<br>';
    echo 'color : '.$zz[$i]->color.'<br>';
    echo 'caliber : '.$zz[$i]->caliber.'<br>';
    echo 'farming : '.$zz[$i]->farming.'<br>';
    echo 'country : '.$zz[$i]->country.'<br>';
    echo 'rarity : '.$zz[$i]->rarity.'<br>';
    echo '<img src="'.$zz[$i]->image.'" width="150"><br>';
    echo 'power : '.$zz[$i]->power.'<br>';

    echo 'revision : '.$zz[$i]->meta->revision.'<br>';
    echo 'created : '.$zz[$i]->meta->created.'<br>';
    echo 'version : '.$zz[$i]->meta->version.'<br>';

    //echo '$loki : '.$zz[$i]->$loki.'<br>';
    echo 'validity : '.$zz[$i]->validity.'<br>';

    echo '<br>';
    echo '<br>';
    echo '<br>';
}

$response = $client->request('GET', 'characters');
*/

/*
$response = $client->request('GET', 'eggs', [
    'key' => 'random',
]
);
*/

/*
$body = $response->getBody();
$u = $body->getContents();
$zz = json_decode($u);
//echo $body->getContents();
//echo '<pre>'.print_r(json_decode($u), true).'</pre>';

for ($i = 0; $i < count($zz); ++$i) {
    echo '<img src="'.$zz[$i]->image.'" width="150"><br>';
}
*/
