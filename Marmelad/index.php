<?php 
/**
    * Creates simple url variable to use when needed
    * WE show different nav for different users or none users
    * We watch varukorg for changes and display them in shopping cart
    * if we are not in home page, we display a extra home link to show how to get back.$_COOKIE
    * The main function of the doc to display views depending on $_GET from /views/  
*/
    session_start();
    include('php/logout/logout.php');
    include('php/produkt/varukorg.php');

    // url handle
    $urlfull = $_SERVER['REQUEST_URI'];
    $url = str_replace("/marmelad/", "", $urlfull);

    // Returns a string if the URL has parameters or NULL if not
    if ($url !== "") {
        $url .= '&';
    } else {
        $url .= '?';
    }
?>

<!DOCTYPE html>

<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Plommonmannen</title>
        <link rel="stylesheet" href="css/style.css" />
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        
    </head>
    <body>
        <div id="wrapper">
            <header>
                <nav>
                    <div>
                        <?php
                            //if logged in nav
                            if ( isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME'])  ){ 
                                if($_SESSION['USER_ACCESS'] === 1){
                                    echo '<a href="?view=admin">Admin</a>';
                                }
                                echo '<a href="?logout=logout">Logga ut</a>';
                            } 
                            else {
                                echo '<a href="?view=login">Logga in</a>';
                                echo '<a href="?view=register">Registrera</a>'; 
                            }
                        ?>
                    </div>

                    <div id="varukorg">
                        <?php if(isset($_SESSION['VARUKORG'])): ?>
                            <div id="lista">
                                <a href="?view=varukorg">Varukorg</a>
                                <div id="itemCounter">
                                    <?php echo "<p>".count($_SESSION['VARUKORG'])."</p>" ?>
                                </div>
                            </div>
                            <div id="dropdown">
                                    <?php 
                                    $totalPrice = 0;
                                    foreach($_SESSION['VARUKORG'] as $key=>$item){
                                        $totalPrice += $item['pris'];
                                        echo "<ul>";
                                        echo "<li><img src='./".$item['img']."'></li>";
                                        echo "<li>".$item['namn']."</li>";
                                        echo "<li>".$item['antal']." st á</li>";
                                        echo "<li>".$item['pris']." kr</li>";
                                        //echo "<a href='".$url."shopping=remove&Itemindex=".$key."'>X</a>";
                                        echo "</ul>";
                                    }?>
                                    <ul class="korgTotal">
                                        <li>Totalt: <?php echo $totalPrice; ?> kr.</li>
                                    </ul>
                                    <div>
                                        <a href="php/produkt/buy.php">Till betalning</a>
                                        <a id="tom" href="<?php echo $url.'shopping=remove&Itemindex=all' ?>">Töm</a> 
                                    </div>
                                  
                            </div>
                        <?php endif;?>
                    </div>
                </nav>
                <a href="/marmelad"><img src="img/plommonmannen.png" alt=""></a>
                <?php 
                    if(isset($_GET['view'])){
                        if($_GET['view'] !== "home"){
                            echo '<a href="?view=home" class="smallfont">Home</a>';
                        }
                    }
                ?>
            </header>
            
            <div id="main">  
            <?php
                if(isset($_GET['view'])){
                    include('views/' . $_GET['view'] . '.php'); 
                } else {
                    include("views/home.php");
                }  
            ?>
            </div>
            <footer>    
                <div id="info">
                    <p>Plommonmannen</p>
                    <p>Stavgatan 16</p>  
                    <p>Lomma</p>
                    <p>076-867 77 22</p>
                    <a href="https://www.facebook.com/plommonmannen">https://www.facebook.com/plommonmannen</a>
                </div>
                
            </footer>
        </div>
        <script src="js/script.js"></script>
    </body>
</html>