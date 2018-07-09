<!--Navbar-->
    <?php

    session_start();

    $isSessionSet = false;
    $isRegistrationMade= false;
    session_start();
    if (isset($_SESSION["utente"])){
       $isSessionSet = true;
    }

    if(isset($_SESSION["registrazione"])){
         //registrazione avvenuta con successo, nascondi il signUP
        $isRegistrationMade = true;
        unset($_SESSION["registrazione"]);
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
            <i class="fa fa-gamepad" aria-hidden="true"></i>
                <strong> vgSWAP</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="float-right"><!--floating right navbar elements-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                        <?php
                        session_start();
                            if($isSessionSet){
                                //sessione impostata, login fatto!
                                $nome = $_SESSION["utente"]["nome"];
                                $cognome = $_SESSION["utente"]["cognome"];
                                echo '<ul class="navbar-nav mr-auto">

                                    <div class="dropdown">
                                    <a class="btn  trasparent  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ciao, '.$nome.' '.$cognome.'
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Il mio profilo</a>
                                    <a class="dropdown-item" href="#">Help?</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Esci<i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                    </div>
                                    </div>
    
                                    </ul>';

                            }elseif ($isRegistrationMade) {
                                //non è ancora stato fatto il login
                                echo '<ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                    <a class="nav-link" href="loginForm.php">Login<i class="fa fa-sign-in" aria-hidden="true"></i> </a>
                                    </li>
                                    <li class="nav-item">
                                     <a class="nav-link" href="#">Help
                                    <i class="fa fa-question" aria-hidden="true"></i></a>
                                    </li>
                                    </ul>';
                            }else{
                                //default: homepage classica
                                echo '<ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                    <a class="nav-link" href="loginForm.php">Login<i class="fa fa-sign-in" aria-hidden="true"></i> </a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="SignUp.php">Sign Up
                                    <i class="fa fa-level-up" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item">
                                     <a class="nav-link" href="#">Help
                                    <i class="fa fa-question" aria-hidden="true"></i></a>
                                    </li>
                                    </ul>';
                            }
                        ?>
                </div>
            </div>
            
        </div>
    </nav>
    <!--/navbar-->