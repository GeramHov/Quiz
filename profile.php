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

<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-5 col-md-5 col-sm-5 d-flex flex-wrap">
            <img src="https://raw.githubusercontent.com/Ashwinvalento/cartoon-avatar/master/lib/images/male/86.png" alt="" width="60" height="60">
            <h4 class="mx-2 my-3" style="color:white">Bonjour <span style="font-size: 35px "><?php echo $pseudo; ?></span> , bienvenue sur votre profil </h4>
            <h3 class="my-4" style="color:white">Votre meilleur score : <i> <?="{$userBestScore} en {$userBestQuestionsTheme}"?></i></h3> 
            <div class="my-1">
                <h4>Meilleurs Scores</h4>
                <form style="width:50vw; padding-top:5vh;" action="profile.php" method="get">
                    <button class="btn btn-secondary rounded-0 mx-1" style="height: 40px; width: 110px" type="submit" name="unsetBestsChoice" value="ok">Général</button>
                    <button class="btn btn-danger rounded-0 mx-1" style="height: 40px; width: 110px" type="submit" name="bestsChoice" value="HTML-CSS">HTML-CSS</button>
                    <button class="btn btn-warning rounded-0 mx-1" style="height: 40px; width: 110px" type="submit" name="bestsChoice" value="JavaScript">JavaScript</button>
                    <button class="btn btn-primary rounded-0 mx-1" style="height: 40px; width: 110px" type="submit" name="bestsChoice" value="PHP">PHP</button>
                </form>
            </div>
<section id="bestScores" class="my-5 text-center pt-5">

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

<div class="podium">

<div class="podium__item">
    <div class="podium__rank second">
        <strong style="font-size: 30px; color:white">2</strong>
        <p style="color:black"><?=$bestsScores[1]['pseudo']?></p>
        <p style="color:black"><?=$bestsScores[1]['score']?> points en <?=$bestsScores[1]['questions_theme']?></p>
    </div>
  </div>

  <div class="podium__item">
      <div class="podium__rank first">
          <svg class="podium__number" viewBox="0 0 27.476 75.03" xmlns="http://www.w3.org/2000/svg">
              <g transform="matrix(1, 0, 0, 1, 214.957736, -43.117417)">
                  <path class="st8" d="M -198.928 43.419 C -200.528 47.919 -203.528 51.819 -207.828 55.219 C -210.528 57.319 -213.028 58.819 -215.428 60.019 L -215.428 72.819 C -210.328 70.619 -205.628 67.819 -201.628 64.119 L -201.628 117.219 L -187.528 117.219 L -187.528 43.419 L -198.928 43.419 L -198.928 43.419 Z" style="fill: #000;"/>
                </g>
            </svg>
            <p style="color:black"><?=$bestsScores[0]['pseudo']?></p>
            <p style="color:black"><?=$bestsScores[0]['score']?> points en <?=$bestsScores[0]['questions_theme']?></p>
    </div>
</div>

  <div class="podium__item">
      <div class="podium__rank third">
        <strong style="font-size: 25px; color:white">3</strong>
        <p style="color:black"><?=$bestsScores[2]['pseudo']?></p>
        <p class="mb-0" style="color:black"><?=$bestsScores[2]['score']?> points en <?=$bestsScores[2]['questions_theme']?></p>
    </div>
  </div>

</section>
        </div>
        <div class="col col-lg-7 col-md-7 col-sm-7 flex-column justify-content-start">
            
                <h2 class="mx-4" style="color:white">Vos derniers scores</h2>
                <form style="width:50vw; padding-top:5vh; margin-left:36px;" action="profile.php" method="get">
                <button class="btn btn-secondary rounded-0 mx-1" style="height: 40px; width: 110px" type="submit" name="unsetUserChoice" value="ok">Général</button>
                <button class="btn btn-danger rounded-0 mx-1" style="height: 40px; width: 110px" type="submit" name="userChoice" value="HTML-CSS">HTML-CSS</button>
                <button class="btn btn-warning rounded-0 mx-1" style="height: 40px; width: 110px" type="submit" name="userChoice" value="JavaScript">JavaScript</button>
                <button class="btn btn-primary rounded-0 mx-1" style="height: 40px; width: 110px" type="submit" name="userChoice" value="PHP">PHP</button>
                </form>

                <svg class="rounded-3" width="50vw" height="60vh" viewBox="0 300 1600 500" style="background-color: transparent;">
    
                <text style="font-size:50; fill:white; text-anchor:middle;" x="750" y="70">Vos derniers scores</text>  

    
                <g transform="translate(140,80)">
                <rect width="1330" height="790" stroke="white" fill="transparent" stroke-width="1"/>
                 <line x1="-20" y1="790" x2="0" y2="790" stroke="white" />
                 <text style="font-size:40; fill:white" x="-60" y="795">0</text>
                 <line x1="-20" y1="632" x2="0" y2="632" stroke="white" />
                 <text style="font-size:40; fill:white" x="-60" y="637">25</text>
                 <line x1="-20" y1="474" x2="0" y2="474" stroke="white" />
                 <text style="font-size:40; fill:white;" x="-60" y="479">50</text>
                 <line x1="-20" y1="316" x2="0" y2="316" stroke="white" />
                 <text style="font-size:40; fill:white" x="-60" y="320">75</text>
                 <line x1="-20" y1="158" x2="0" y2="158" stroke="white" />
                 <text style="font-size:40; fill:white" x="-70" y="163">100</text>
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
                    $color = 'fill:#dc4c64';
                    break;
                case 'JavaScript':
                    $color = 'fill:#e4A11b';
                    break;
                case 'PHP':
                    $color = 'fill:#0d6efd';
                    break;
            }
            echo "
            <g transform='translate({$i},{$positionY})' style='font-size: 25'>
            <rect width='50' height='{$currentScore}' style='{$color}'/>
            <text style='fill:white' x='' y='{$textPositionY}' style='text-anchor:start'>{$score['niceDate']}</text>
            </g>
            ";
            $i += 80;
        }

        ?>
    </g>

</svg>
        </div>
    </div>
</div>

<!-- Histogramme Scores du profil -->


<!-- Meilleurs Scores Globaux-->

    <!-- Ouverture de la DB et requetes Bests Scores -->




