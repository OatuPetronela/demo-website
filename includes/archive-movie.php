            <?php
            if (strlen($moviePlot) > 100) { // conditia respectiva 
                $description = mb_strimwidth($moviePlot, 0, 100);

                return $description . "...";
            } else {
                return $moviePlot;
            }


            ?>
            </div>