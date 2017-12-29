<?php
/*
MIT License

Copyright (c) 2017 David Hui

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

//Get access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.clarifai.com/v1/token/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//Add your own client ID and client Secret http://clarifai.com
curl_setopt($ch, CURLOPT_POSTFIELDS, "client_id=YOURCLIENTID&client_secret=YOURCLIENTSECRET&grant_type=client_credentials");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$json = json_decode($result, true);
$access_token = $json['access_token'];

//Send image 
$matching = curl_init();
$url = $_GET['url'];
$part1 = '{"inputs":[{"data":{"image":{"url":"';
$part2 = '"}}}]}';
$postfield = $part1 . $url . $part2;

curl_setopt($matching, CURLOPT_URL, "https://api.clarifai.com/v2/models/SnapASnake/outputs");
curl_setopt($matching, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($matching, CURLOPT_POSTFIELDS, $postfield);
curl_setopt($matching, CURLOPT_POST, 1);
curl_setopt($matching, CURLOPT_SSL_VERIFYPEER, false);
$auth = "Authorization: Bearer" . ' ' . $access_token;

$headers = array();
$headers[] = $auth;
$headers[] = "Content-Type: application/json";
curl_setopt($matching, CURLOPT_HTTPHEADER, $headers);

$return = curl_exec($matching);
if (curl_errno($matching)) {
    echo 'Error:' . curl_error($matching);
}
curl_close ($matching);
$jsondone = json_decode($return, true);
$mostpredict = $jsondone["outputs"][0]["data"]["concepts"][0]["name"];

//Print most confident answer

//echo ucwords($mostpredict);
header("HTTP/1.1 303 See Other");
//Replace
header("Location: https://snapasnake.info/animalallies/snapasnake/resultdirector.php?result=" . $mostpredict);
?>