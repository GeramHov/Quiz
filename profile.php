<?php
    include_once('PHP/header.php');
    include_once('PHP/script.php');
    //Ouverture de la bdd et requete meileur score user
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
                $query = $db->prepare(" SELECT *, DATE_FORMAT(date,'%d/%m') AS niceDate  FROM scores 
                                        WHERE user_id = :user_id AND questions_theme = :theme
                                        ORDER BY date
                                        LIMIT 16
                                    ");
                $query -> execute   ([
                                    'user_id' => $_SESSION['user_id'],
                                    'theme' => $_GET['userChoice']
                                    ]);
            } else {
                $query = $db->prepare(" SELECT *, DATE_FORMAT(date,'%d/%m') AS niceDate FROM scores 
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
                switch($score['questions_theme']) {
                    case 'HTML-CSS':
                        $color = 'fill:white';
                        break;
                    case 'JavaScript':
                        $color = 'fill:yellow';
                        break;
                    case 'PHP':
                        $color = 'fill:purple';
                        break;
                }
                echo "
                <g transform='translate({$i},{$positionY})' style='font-size: 25'>
                <rect width='50' height='{$currentScore}' style='{$color}'/>
                <text x='27' y='{$textPositionY}' style='text-anchor:middle'>{$score['niceDate']}</text>
                </g>
                ";
                $i += 80;
            }

            ?>
        </g>
    
    </svg>
</section>

<!-- Meilleurs Scores Globaux-->
<section id="bestsScores">
    <h2>Meilleurs Scores</h2>
    <form action="profile.php" method="get">
        <button type="submit" name="unsetBestsChoice" value="ok">Général</button>
        <button type="submit" name="bestsChoice" value="HTML-CSS">HTML-CSS</button>
        <button type="submit" name="bestsChoice" value="JavaScript">JavaScript</button>
        <button type="submit" name="bestsChoice" value="PHP">PHP</button>
    </form>
    <!-- Ouverture de la DB et requetes Bests Scores -->
    <?php
    require_once('./traitements/config.php');

    if (isset($_GET['bestsChoice'])) {
        $query = $db->prepare(" SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS niceDate FROM scores 
                                JOIN users ON users.id = scores.user_id
                                WHERE questions_theme = :theme
                                ORDER BY score DESC
                                LIMIT 3
                            ");
        $query -> execute   ([
                            'theme' => $_GET['bestsChoice']
                            ]);
    } else {
        $query = $db->prepare(" SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS niceDate FROM scores
                                JOIN users ON users.id = scores.user_id
                                ORDER BY score DESC
                                LIMIT 3
                            ");
        $query -> execute();
    }
    $bestsScores = $query->fetchAll();
    ?>

    <div id="generalPodium">

        <div id="secondScore">
            <p>2nd</p>
            <p><?=$bestsScores[1]['pseudo']?></p>
            <p><?=$bestsScores[1]['score']?> points en <?=$bestsScores[1]['questions_theme']?></p>
            <p>le <?=$bestsScores[1]['niceDate']?> </p>
        </div>

        <div id="firstScore">
            <p>1er</p>
            <p><?=$bestsScores[0]['pseudo']?></p>
            <p><?=$bestsScores[0]['score']?> points en <?=$bestsScores[0]['questions_theme']?></p>
            <p>le <?=$bestsScores[0]['niceDate']?> </p>
        </div>

        <div id="thirdScore">
            <p>3e</p>
            <p><?=$bestsScores[2]['pseudo']?></p>
            <p><?=$bestsScores[2]['score']?> points en <?=$bestsScores[2]['questions_theme']?></p>
            <p>le <?=$bestsScores[2]['niceDate']?> </p>
        </div>
    </div>
</section>




