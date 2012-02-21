<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Being Humans Improv</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <div class="central-column">
            <?php
              $currentPage="cast";
              include 'navbar.php';
            ?>
            <?php include 'announce.php' ?>
            <div class="central-column-inner">
                <h1>The Cast of Being Humans Improv</h1>
                <center>
                    <table class="picture-frame">
                        <tr>
                            <td rowspan="2">
                                <img src="images/shapeimage_1_cast.png"/>
                            </td>
                            <td colspan="2">
                                <img src="images/shapeimage_2_show.png"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="images/shapeimage_3_dohickey.png"/>
                            </td>
                            <td>
                                <img src="images/shapeimage_4_dog.png"/>
                            </td>
                        </tr>
                    </table>
                </center>
                <hr/>
                <?php
                  include 'bios/include-bios.php';
                ?>
            </div>
        </div>
    </body>
</html>
