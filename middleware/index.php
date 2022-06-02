<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>MiddleWare</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form action="middleware.php" method="get">
                <br/>
                device : <input type="text" placeholder="device" name="device" value="C50EE9" maxlength="6" />
                <br/>
                data : <input type="text" placeholder="data" name="data" value="0064c3340027e7007BEE9E04" maxlength="24"  />
                <br/>
                time : <input type="text" name="time"  value="<?php echo time(); ?>" readonly="readonly"   />    
                <input type="submit" value="Envoyer"/>
            </form>
        </div>
    </body>
</html>
