<?php

namespace Anax\View;

?>
<h1>Ip validator</h1>

<form action="<?= url("ip/validate"); ?>" method="post">
    <fieldset>
        <legend>Ip validator</legend>
            <input type="text" name="ipAddress">
        <p>
            <input type="submit" value="Submit">
        </p>
    </fieldset>
</form>

<h2>REST API</h2>

<p>För att skicka en ip-adress som GET-variabel så anropar du "api" föjlt av GET-variabeln "ip" och sedan ip-adressen.</p>
<p>Exempel:</p>
<p>redovisa/htdocs/api?ip={ip-adress}</p>

<p>Full länk:</p>
<p>http://www.student.bth.se/~jolu17/dbwebb-kurser/ramverk1/me/redovisa/htdocs/api?ip={ip-adress}</p>


<ul>
    <li><a href="api?ip=194.47.150.9">Domain example </a></li>
    <li><a href="api?ip=172.217.22.163">Domain example </a></li>
    <li><a href="api?ip=194.47.150.9">IPV4 example</a></li>
    <li><a href="api?ip=2a00:1450:400f:808::2003">IPV6 example </a></li>
</ul>
