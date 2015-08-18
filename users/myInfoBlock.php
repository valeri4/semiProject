<?php

function viewInfoBlock() {
    
    //Custom Function from helpers.php
    $bdateview = dateFormat($_SESSION['loggedUser']['u_b_day']);
    
    echo '<div class="userInfoContainer">
    <h3>My Page:</h3>
    <div class="userInfo">
        <div class="profileImg">
            <img src="css/images/man.jpg" alt="Profile Photo"/>
        </div>
        <div class="infoTest">
            <div class="perfonalInfo">
                <ul>
                    <li><strong>First Name: </strong>' . $_SESSION['loggedUser']['u_f_name'] . '</li>
                    <li><strong>Last Name: </strong>' . $_SESSION['loggedUser']['u_l_name'] . '</li>
                    <li><strong>Birthday: </strong>' . $bdateview . '</li>
                </ul>
            </div>
            <div class="personalAbout">
                <p><strong>About me:</strong></p>
                <div class="aboutText">' . $_SESSION['loggedUser']['u_about'] . '</div>
            </div>
        </div>
    </div>
</div>';

}
