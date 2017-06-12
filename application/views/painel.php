<!DOCTYPE html>
<html>
    <body>
        <?php
            if(isset($login)){
		    	echo "<h1> $login Bem-vindo ao TESTE </h1>";
		        echo "<form action='/ci/dbnome/logout' method=post>";
		        echo "    <input type=submit value=Logout> ";
		    }else{
		    	echo "<h1> INTRUSO! </h1>";
		    }
        ?>
    </body>
</html>