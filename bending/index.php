<?php
$sitename="The Hub MC Bending Interface"; //the title to use for your site
$dbhost="198.23.144.115"; //the host of your mysqli database
$dbname="mc_67920"; //your mysqli database name
$dbuser="mc_67920"; //your preferred mysqli username
$dbpass="2vyat0iq"; //your username's password
$theme="yeti"; //http://bootswatch.com/
?>

<html>
    <head>
        <title><?php echo "$sitename";?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>body { font-size: 140%; }</style>
        
        <link href="https://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" media="screen">
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/<?php echo strtolower( $theme ); ?>/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        <script>
        $(document).ready(function() {
            $('#players').dataTable();
        });
        </script>
    </head>
    
    <body>


        <nav class="navbar navbar-default" role="navigation">
        
            <div class="container-fluid">         
                <a class="navbar-brand" href="http://the-hub-mc.com"><?php echo ( $sitename ); ?></a>              
            </div>
            
        </nav>

        <div class="container">

            <table id="players" class="table table-striped" cellspacing="0">
            
                <thead>                
                    <tr>        
                        <th>Player</th>
                        <th>Element</th>
                        <th>Removed</th>
                        <th>Slot 1</th>
                        <th>Slot 2</th>
                        <th>Slot 3</th>
                        <th>Slot 4</th>
                        <th>Slot 5</th>
                        <th>Slot 6</th>
                        <th>Slot 7</th>
                        <th>Slot 8</th>
                        <th>Slot 9</th>
                    </tr>
                </thead>

                <tbody>
    
                    <?php 
                    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                    if ($mysqli->connect_errno) {
                        printf("Connect failed: %s\n", $mysqli->connect_error);
                        exit();
                    }                    
                    
                    $arrChartData[] = array();
                    $query = 'SELECT player, element, permaremoved, slot1, slot2, slot3, slot4, slot5, slot6, slot7, slot8, slot9 FROM pk_players';
                    $result = $mysqli->query($query) or trigger_error($mysqli->error."[$query]");

                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $arrChartData[] = $row;
                        $player = $row['player'];
                        $element = $row['element'];
                        $permaRemoved = $row['permaremoved'];
                        
                        $slotOne = $row['slot1'];
                        $slotTwo = $row['slot2'];
                        $slotThree = $row['slot3'];
                        $slotFour = $row['slot4'];
                        $slotFive = $row['slot5'];
                        $slotSix = $row['slot6'];
                        $slotSeven = $row['slot7'];
                        $slotEight = $row['slot8'];
                        $slotNine = $row['slot9'];
                        
                        if (empty($permaRemoved)) {
                            $permaRemoved = 'No';
                        }
                        
                        if ($slotOne == 'null') {
                            $slotOne = '';
                        }
                        if ($slotTwo == 'null') {
                            $slotTwo = '';
                        }
                        if ($slotThree == 'null') {
                            $slotThree = '';
                        }
                        if ($slotFour == 'null') {
                            $slotFour = '';
                        }
                        if ($slotFive == 'null') {
                            $slotFive = '';
                        }
                        if ($slotSix == 'null') {
                            $slotSix = '';
                        }
                        if ($slotSeven == 'null') {
                            $slotSeven = '';
                        }
                        if ($slotEight == 'null') {
                            $slotEight = '';
                        }
                        if ($slotNine == 'null') {
                            $slotNine = '';
                        }
                        
                            if(!empty($element)){
                                    
                                if ($element == "a"){
                                    $element = '<span>Air</span>';
                                } else if ($element == "w"){
                                    $element = '<span>Water</span>';
                                } else if ($element == "f"){
                                    $element = '<span>Fire</span>';
                                } else if ($element == "e"){
                                    $element = '<span>Earth</span>';
                                } else if ($element == "c"){
                                    $element = '<span>Chiblocking</span>';
                                } else {
                                    $element = '<span>Avatar</span>';
                                }
                            } else {
                                $element = '<span>Powerless</span>';
                            }
    
                    echo "<tr>";
                    echo '<td><img src="https://mcapi.ca/avatar/2d/'.$player.'/21" title="'.$player.'"></img>&nbsp;&nbsp;<span class="label label-primary">' . $player .'</span>';
                    echo '<td>'.$element.'</td>';
                    echo '<td>'.$permaRemoved.'</td>';
                    echo '<td>'.$slotOne.'</td>';
                    echo '<td>'.$slotTwo.'</td>';
                    echo '<td>'.$slotThree.'</td>';
                    echo '<td>'.$slotFour.'</td>';
                    echo '<td>'.$slotFive.'</td>';
                    echo '<td>'.$slotSix.'</td>';
                    echo '<td>'.$slotSeven.'</td>';       
                    echo '<td>'.$slotEight.'</td>';  
                    echo '<td>'.$slotNine.'</td>';                  
                    } 
                    
                    mysqli_free_result($result);
                    ?>
    
                </tbody>
            </table>
        </div>

        <br>

        <div id="footer">
            <div class="container-fluid">
                <span class="badge"><i class="fa fa-copyright"></i> <?php echo "$sitename";?> <?php echo date("Y"); ?></span>
            </div>
        </div> 
    </body>
</html>
 
