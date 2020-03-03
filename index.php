<!DOCTYPE html>
    <html>
        <head>
        <meta http-equiv="refresh" content="35">
            <style>
            body{ 
                padding:10px; 
                color:  #000000;  
                font-variant: small-caps; 
                font-size:5em; 
                text-align: center;
            }
            h2{   
                font-size:0.3em;
                text-align: center;
                padding:10px;
            }
            
            </style>
        </head>
            <body style="background-color: #f0f8ff">
            <header>Risultati stazione Meteo</header>
            <h2>
                <table align = "center" border=”1″ cellspacing=”1″ cellpadding=”1″>
                <tr>
                <td width="30%" bgcolor="#e6e6fa">&nbsp;Timestamp&nbsp;</td>
                <td bgcolor="#90ee90">&nbsp;Temperatura&nbsp;</td>
                <td bgcolor="#ffffff">&nbsp;Umidità&nbsp;</td>
                <td bgcolor="#f08080">&nbsp;Pressione&nbsp;</td>
                </tr> 

                <?php
                   
                   include("connect.php");
                    

                    $link2=Connection();

                    $query2 = $link2 -> query("SELECT Timestamp,Temperatura,Umidita,Pressione FROM `stazione_metereologica` ORDER BY Timestamp"); 
                    $i = 0;
                        while($row = $query2 ->fetch(PDO::FETCH_BOTH) ){
                            echo '<tr>
                                    <td bgcolor="#e6e6fa"> ' . $row['Timestamp'] . '</td>
                                    <td bgcolor="#90ee90"> ' . $row['Temperatura'] . " °C" . '</td>
                                    <td bgcolor="#ffffff"> ' . $row['Umidita'] .  " %" .'</td>
                                    <td bgcolor="#f08080"> ' . $row['Pressione'] . " hPa" . '</td> 
                                </tr>';
                            $i++;
                        }   
                    
                ?>
                </table>
            </h2>
            </body>
</html>