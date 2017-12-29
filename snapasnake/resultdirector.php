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
$result = $_GET['result'];

switch ($result) {
    case "blueracer":
        header("HTTP/1.1 303 See Other");
	header("Location: https://snapasnake.info/animalallies/snapasnake/blueracer.html");
        break;
    case "butlergaret":
        header("HTTP/1.1 303 See Other");
	header("Location: https://snapasnake.info/animalallies/demo.html");
        break;
    case "easternhognose":
        header("HTTP/1.1 303 See Other");
	header("Location: https://snapasnake.info/animalallies/snapasnake/hognose.html");
        break;
    case "eriewater":
        header("HTTP/1.1 303 See Other");
	header("Location: https://snapasnake.info/animalallies/snapasnake/eriewater.html");
        break;
    case "queensnake":
        header("HTTP/1.1 303 See Other");
	header("Location: https://snapasnake.info/animalallies/snapasnake/queensnake.html");
        break;
    case "redbellywater":
        header("HTTP/1.1 303 See Other");
	header("Location: https://snapasnake.info/animalallies/snapasnake/redbellied.html");
        break;
    case "smoothgreen":
        header("HTTP/1.1 303 See Other");
	header("Location: https://snapasnake.info/animalallies/snapasnake/smoothgreen.html");
        break;
}
?>