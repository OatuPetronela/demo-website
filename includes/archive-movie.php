<div class="row">
            <?php 
                $i = 1;
                foreach($movies as $movie){ ?>
                    <div class=" col-sm-12 col-md-4 col-xl-4" id="<?php echo $movie['id'] ?> ">
                    <div class="card">
                        <img class=" card-img-top " src="<?php echo $movie['poster'] ?> " alt="Titanic ">
                        <div class="card-body ">
                            <h5 class="card-title "><?php echo $movie['title'] ?></h5>
                            <p><?php echo $movie['description'] . '...' ?></p>
                           <a href=" <?php echo $movie['permalink'] ?>" class="btn btn-success ">Read more</a>
                        </div>
                    </div>
                </div>
                    <?php
                }
            ?>
        </div>