<?php
    include_once('PHP/header.php');
    include_once('PHP/script.php');
    //Ouverture de la bdd et requete scores user
        require_once('./traitements/config.php');

        $query = $db->prepare(" SELECT score, questions_theme FROM scores 
                                WHERE user_id = :user_id
                                ORDER BY score DESC 
                                LIMIT 1
                            ");
        $query -> execute(['user_id' => $_SESSION['user_id']]);
        $userBest = $query->fetch();
        $userBestScore = $userBest['score'];
        $userBestQuestionsTheme = $userBest['questions_theme'];

?>

<div class="container d-flex justify-content-start text-center mx-3 my-5">
    <img src="https://raw.githubusercontent.com/Ashwinvalento/cartoon-avatar/master/lib/images/male/86.png" alt="" width="80" height="80">
    <h3 class="mx-5" style="color:white">Bonjour <?php echo $pseudo; ?> , bienvenue sur votre profil </h3>
</div>
<div class="container d-flex justify-content-start text-center mx-3">
    <h3 class="mx-5" style="color:white">Votre meilleur score : <?="{$userBestScore} en {$userBestQuestionsTheme}"?></h3> 
</div>

<!-- Histogramme Scores du profil -->
<section id="userScores">

    <h2>Vos derniers scores</h2>
    <form action="profile.php" method="get">
        <button type="submit" name="unsetUserChoice" value="ok">Général</button>
        <button type="submit" name="userChoice" value="HTML-CSS">HTML-CSS</button>
        <button type="submit" name="userChoice" value="JavaScript">JavaScript</button>
        <button type="submit" name="userChoice" value="PHP">PHP</button>
    </form>

    <svg width="40%" height="40%" viewBox="0 0 1500 1000" style="background-color: blue;">
    <title>Scores du joueur</title>
    
    <text style="font-size:50; fill:white; text-anchor:middle;" x="750" y="70">Vos derniers scores</text>  

    
    <g transform="translate(140,80)">
        <rect width="1330" height="790" stroke="white" fill="transparent" stroke-width="1"/>
        <line x1="-20" y1="790" x2="0" y2="790" stroke="white" />
        <text style="font-size:30; fill:white" x="-60" y="795">0</text>
        <line x1="-20" y1="632" x2="0" y2="632" stroke="white" />
        <text style="font-size:30; fill:white" x="-60" y="637">25</text>
        <line x1="-20" y1="474" x2="0" y2="474" stroke="white" />
        <text style="font-size:30; fill:white;" x="-60" y="479">50</text>
        <line x1="-20" y1="316" x2="0" y2="316" stroke="white" />
        <text style="font-size:30; fill:white" x="-60" y="320">75</text>
        <line x1="-20" y1="158" x2="0" y2="158" stroke="white" />
        <text style="font-size:30; fill:white" x="-70" y="163">100</text>
    </g>
    
    <g transform="translate(15,70)" >
        <?php
        //Ouverture de la bdd et requete scores user
        require_once('./traitements/config.php');

        if (isset($_GET['userChoice'])) {
            $query = $db->prepare(" SELECT * FROM scores 
                                    WHERE user_id = :user_id AND questions_theme = :theme
                                    ORDER BY date
                                    LIMIT 16
                                ");
            $query -> execute   ([
                                'user_id' => $_SESSION['user_id'],
                                'theme' => $_GET['userChoice']
                                ]);
        } else {
            $query = $db->prepare(" SELECT * FROM scores 
                                    WHERE user_id = :user_id
                                    ORDER BY date
                                    LIMIT 16
                                ");
            $query -> execute   ([
                                'user_id' => $_SESSION['user_id']
                                ]);
        }
    
        $scores = $query->fetchAll();
        $i = 170;


        foreach($scores as $score) {
            $currentScore = $score['score']*6.3;
            $positionY = 798 - $currentScore;
            $textPositionY = $currentScore + 40;
            echo "
            <g transform='translate({$i},{$positionY})' style='font-size: 30'>
            <rect width='50' height='{$currentScore}' style='fill:red'/>
            <text x='27' y='{$textPositionY}' style='text-anchor:middle'>{$score['date']}</text>
            </g>
            ";
            $i += 80;
        }

        ?>
        <!-- <g transform="translate(170,360)" style="font-size: 30">
        <rect width="50" height="440" style="fill:red"/>
        <text x="27" y="480" style="text-anchor:middle">1.1</text>
        </g>
        
        <g transform="translate(250, 310)" style="font-size: 30">
        <rect width=50 height="490" style="fill:red"/>
        <text x="27" y="530" style="text-anchor:middle">1.2</text>
        </g>
        
        <g transform="translate(330, 375)" style="font-size: 30">
        <rect width="50" height="395" y="30" style="fill:red"/>
        <text x="27" y="465" style="text-anchor:middle">1.3</text>
        </g>
        
        <g transform="translate(410, 455)" style="font-size: 30">
        <rect width="50" height="538" y="-193" style="fill:red"/>
        <text x="27" y="385" style="text-anchor:middle">2.1</text>
        </g>
        
        <g transform="translate(490, 100)" style="font-size: 30">
        <rect width="50" height="466" y="233" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">2.2</text>
        </g>
        
        <g transform="translate(570, 100)" style="font-size: 30">
        <rect width="50" height="515" y="185" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">2.3</text>
        </g>
        
        <g transform="translate(650, 100)" style="font-size: 30">
        <rect width="50" height="459" y="240" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">2.4</text>
        </g>
        
        <g transform="translate(730, 100)" style="font-size: 30">
        <rect width="50" height="347" y="353" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">3.1</text>
        </g>
        
        <g transform="translate(810, 100)" style="font-size: 30">
        <rect width="50" height="435" y="264" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">3.2</text>
        </g>
        
        <g transform="translate(890, 100)" style="font-size: 30">
        <rect width="50" height="387" y="313" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">3.3</text>
        </g>
        
        <g transform="translate(970, 100)" style="font-size: 30">
        <rect width="50" height="350" y="350" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">3.4</text>
        </g>
        
        <g transform="translate(1050, 100)" style="font-size: 30">
        <rect width="50" height="425" y="274" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">4.1</text>
        </g>
        
        <g transform="translate(1130, 100)" style="font-size: 30">
        <rect width="50" height="400" y="300" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">4.2</text>
        </g>
        
        <g transform="translate(1210, 100)" style="font-size: 30">
        <rect width="50" height="459" y="241" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">4.3</text>
        </g>
        
        <g transform="translate(1290, 100)" style="font-size: 30">
        <rect width="50" height="538" y="162" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">5.1</text>
        </g>
        
        <g transform="translate(1370, 100)" style="font-size: 30">
        <rect width="50" height="530" y="170" style="fill:red"/>
        <text x="27" y="740" style="text-anchor:middle">5.2</text>
        </g> -->
    </g>
    
    </svg>
</section>
            <?php
                
                // foreach($scores as $score){
                //     $scoreHeight = $score['score']*100;
                //     echo    "<li data-ejeX='{$scoreHeight}' style='height:{$scoreHeight}%'>
                //                 <i>{$score['questions_theme']}</i>
                             
                //             </li>";
                // }
            ?>


