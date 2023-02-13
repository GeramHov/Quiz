-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Feb 13, 2023 at 01:33 PM
-- Server version: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004-log
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `theme` text NOT NULL,
  `question` text NOT NULL,
  `true_answer` text NOT NULL,
  `a1` text NOT NULL,
  `a2` text NOT NULL,
  `a3` text NOT NULL,
  `a4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `theme`, `question`, `true_answer`, `a1`, `a2`, `a3`, `a4`) VALUES
(1, 'PHP', 'Quel opérateur est utilisé pour vérifier si deux valeurs sont égales et sont du même type ?', '===', '==', '===', '!=', '='),
(2, 'PHP', 'Quelle commande PHP pouvez-vous utiliser pour remplacer plusieurs commandes \"if-then\" ?', 'La commande \"switch-case\"', 'La commande \"while\"', 'La commande \"for\"', 'La commande \"switch-case\"', 'La commande \"for each\"'),
(3, 'JavaScript', 'Dans quel élement HTML peut-on ajouter du JavaScript?', '<script>', '<scripting>', '<js>', '<script>', '<javascript>'),
(4, 'JavaScript', 'Quel est le syntaxe correct de JavaScript pour changer le contenu d\'un élément HTML ci-dessous: <br> <xmp><p id=\"demo\">Ceci est une démonstration.</p>>/xmp>', 'document.getElementById(\"demo\").innerHTML = \"Hello World!\"; ', 'document.getElement(\"p\").innerHTML = \"Hello World!\";', 'document.getElementByName(\"p\").innerHTML = \"Hello World!\";', 'document.getElementById(\"demo\").innerHTML = \"Hello World!\";  ', '#demo.innerHTML = \"Hello World!\";'),
(5, 'JavaScript', 'Quel est l\'endroit correcte pour ajouter du JavaScript ?', 'La section <xmp><head></xmp> et la section <xmp><body></xmp>', 'La section <xmp><head></xmp> et la section <xmp><body></xmp>', 'La section <xmp><head></xmp>', 'La section <xmp><body></xmp>', 'La section <xmp><footer></xmp>'),
(6, 'JavaScript', 'Quel est le syntaxe correcte pour appeler un script externe nommé \"xxx.js\" ?', '<xmp><script src=\"xxx.js\"></xmp>', '<xmp><script src=\"xxx\"></xmp>', '<xmp><script href=\"xxx.js\"></xmp>', '<xmp><script name=\"xxx.js\"></xmp>', '<xmp><script src=\"xxx.js\"></xmp>'),
(7, 'JavaScript', 'Comment marquer \"Hello World\" dans la box d\'alerte ?', 'alert(\"Hello World\"); ', 'alertBox(\"Hello World\");', 'alert(\"Hello World\"); ', 'msgBox(\"Hello World\");', 'msg(\"Hello World\");'),
(8, 'JavaScript', 'Comment créer une fonction dans JavaScript ?', 'function myFunction() ', '()=> function', 'function = myFunction()', 'function:myFunction()', 'function myFunction()  '),
(9, 'JavaScript', 'Comment écrire une condition IF dans JavaScript ?', 'if (i == 5) ', 'if i = 5', 'if (i == 5) ', 'if i == 5 then', 'if i = 5 then'),
(10, 'JavaScript', 'Comment écrire une condition IF quand le \"i\" n\'est pas égale à 5 ?', 'if (i != 5) ', 'if (i != 5) ', 'if i <> 5', 'if (i <> 5)', 'if i =! 5 then'),
(11, 'JavaScript', 'Comment commencer un cycle \"while\" dans JavaScript ?', 'while (i <= 10)  ', 'while i=1 to 10; i++', 'while i = 1 to 10', 'while (i <= 10; i++)', 'while (i <= 10)  '),
(12, 'JavaScript', 'Comment commencer un cycle \"FOR\" dans JavaScript ?', 'for (i = 0; i <= 5; i++) ', 'for i = 1 to 5', 'for (i = 0; i <= 5; i++) ', 'for (i <= 5; i++)', 'for (i = 0; i <= 5)'),
(13, 'JavaScript', 'Comment ajouter un commentaire dans JavaScript ?', '//This is a comment ', '\'This is a comment', '<!--This is a comment-->', '//This is a comment ', '/This is a comment'),
(14, 'JavaScript', 'Comment commenter plusieurs lignes sur JavaScript ?', '/*This comment has more than one line*/ ', '/*This comment has more than one line*/ ', '//This comment has more than one line// ', '<!--This comment has more than one line-->', '// This comment has more than one line'),
(15, 'JavaScript', 'Comment déclarer un tableau (array) dans JavaScript ?', 'const colors = [\"red\", \"green\", \"blue\"] ', 'const colors = \"red\", \"green\", \"blue\"', 'const var colors = [\"red\", \"green\", \"blue\"] ', 'const colors = (1:\"red\", 2:\"green\", 3:\"blue\")', 'const colors = 1 = (\"red\"), 2 = (\"green\"), 3 = (\"blue\")'),
(16, 'JavaScript', 'Comment arrondir le chiffre 7.25 à l\'entier le plus proche ?', 'Math.round(7.25)  ', 'rnd(7.25)', 'Math.round(7.25)  ', 'Math.rnd(7.25)', 'round(7.25)'),
(17, 'JavaScript', 'Comment trouver le chiffre avec sa valeur la plus grande de X et Y ?', 'Math.max(x, y)  ', 'top(x, y)', 'ceil(x, y)', 'Math.max(x, y)  ', 'Math.ceil(x, y)'),
(18, 'JavaScript', 'Comment trouver le nom du navigateur du client ?', 'navigator.appName  ', 'client.navName', 'browser.name', 'navigator.name', 'navigator.appName  '),
(19, 'JavaScript', 'Quel évenement se déclanche quand un utilisateur click sur un élement HTML ?', 'onclick', 'onchange', 'onmouseover', 'onmouseclick', 'onclick'),
(20, 'JavaScript', 'Comment déclarer un variable dans JavaScript ?', 'const carName', 'v carName', 'const carName', 'variable carName', '$ carName'),
(21, 'JavaScript', 'Quel opérateur utilise-t-on pour assigner une valeur à un variable JavaScript ?', '=', 'x', '-', '*', '='),
(22, 'JavaScript', 'Que est-ce que va retourner le code suivant : Boolean(10>9) ?', 'true', 'NaN', 'false', 'true', 'null'),
(23, 'HTML-CSS', 'Que veut dire HTML ?', 'Hyper Text Markup Language', 'Hyper Text Markup Language', 'Hyperlinks and Text Markup Language', 'Home Tool Markup Language', 'Hyperlinks Markup Language'),
(24, 'HTML-CSS', 'Que veut dire CSS ?', 'Cascading Style Sheets', 'Creative Style Sheets', 'Cascading Style Sheets', 'Computer Style Sheets', 'Colorful Style Sheets'),
(25, 'HTML-CSS', 'Qui crée les standards WEB ?', 'The World Wide Web Consortium ', 'Google', 'Mozilla', 'Microsoft', 'The World Wide Web Consortium '),
(26, 'HTML-CSS', 'Comment appeler un fichier .css externe correctement dans HTML ?', '<link rel=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\"> ', '<style src=\"mystyle.css\">  ', '<link rel=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\">  ', '<stylesheet>mystyle.css</stylesheet>', '<link href=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\"> '),
(27, 'HTML-CSS', 'Comment correctement sauter d\'une ligne dans HTML ?', '<br>', '<break>', '<br>', '<lb>', '<hr>'),
(28, 'HTML-CSS', 'Quel propriété CSS utilie-t-on pour changer la couler d\'un texte ?', 'color', 'text-color', 'fgcolor', 'font-color', 'color'),
(29, 'HTML-CSS', 'Quel est la bonne syntaxe pour ouvrir le lien dans une nouvelle page ?', '<a href=\"url\" target=\"_blank\">', '<a href=\"url\" new>', '<a href=\"url\" target=\"new\">', '<a href=\"url\" target=\"_blank\">', '<a href=\"url\" target=\"new page\">'),
(30, 'HTML-CSS', 'Quelle est la propriété CSS qui change le taille d\'un texte ?', 'font-size', 'text-style', 'font-size', 'font-style', 'text-size'),
(31, 'HTML-CSS', 'Comment créer correctement un input text ?', '<input type=\"text\">', '<input type=\"textfield\">', '<input type=\"text\">', '<textinput type=\"text\">', '<textfield>'),
(32, 'HTML-CSS', 'Comment peut-on changer la police ?', 'font-family', 'font-style', 'font-weight', 'font-family', 'text-family'),
(33, 'HTML-CSS', 'Comment créer un drop-down list dans HTML ?', '<select>', '<input type=\"dropdown\">', '<input type=\"list\">', '<list>', '<select>'),
(34, 'HTML-CSS', 'Comment appeler un élement avec id=\"demo\" dans CSS ?', '#demo', '.demo', '#demo', '*demo', 'demo'),
(35, 'HTML-CSS', 'Quelle est la syntaxe correcte pour intégrer une image dans un document HTML ?', '<img src=\"image.gif\" alt=\"MyImage\">', '<img src=\"image.gif\" alt=\"MyImage\">', '<image src=\"image.gif\" alt=\"MyImage\">', '<img href=\"image.gif\" alt=\"MyImage\">', '<img alt=\"MyImage\">image.gif</img>'),
(36, 'HTML-CSS', 'Comment appeler correctement un élement <xml><p></xml> dans un div ?', 'div p', 'div.p', 'div + p', 'div p', 'div, p'),
(37, 'HTML-CSS', 'Quel attribut HTML affiche le texte alternatif d\'une image si celle-ci n\'est pas affiché ?', 'alt', 'src', 'title', 'alt', 'longdesc'),
(38, 'HTML-CSS', 'Quelle est la valeur défaut de l\'attribut \"position\" dans CSS ?', 'static', 'absolute', 'static', 'relative', 'fixed'),
(39, 'HTML-CSS', 'Quelle est la syntaxe correcte pour afficher une vidéo dans HTML ?', '<xml><video></xml>', '<xml><media></xml>', '<xml><movie></xml>', '<xml><video></xml>', '<xml><vid></xml>'),
(40, 'HTML-CSS', 'Quel attribut HTML permet de spécifier que input doit être absolument rempli ?', 'required', 'placeholder', 'formvalidate', 'required', 'validate'),
(41, 'HTML-CSS', 'Quel élement HTML défini les liens de navigation ?', '<xml><nav></xml>', '<xml><nav></xml>', '<xml><navigate></xml>', '<xml><navigation></xml>', '<xml><a></xml>'),
(42, 'HTML-CSS', 'Quel élement HTML spécifie une en-tête pour le document ?', '<xml><header></xml>', '<xml><section></xml>', '<xml><top></xml>', '<xml><head></xml>', '<xml><header></xml>'),
(43, 'PHP', 'Que veut dire PHP?', 'PHP: Hypertext Preprocessor ', 'PHP: Hypertext Preprocessor ', 'Private Home Page', 'Personal Hypertext Processor', 'Personal Home Processor'),
(44, 'PHP', 'Comment écrire \"Hello World\" en PHP?', 'echo \"Hello World\";', '\"Hello World\";', 'Document.Write(\"Hello World\");', 'Document.Print(\"Hello World\");', 'echo \"Hello World\";'),
(45, 'PHP', 'Avec quel symbol on défini les variables en PHP?', '$', '&', '!', '£', '$'),
(46, 'PHP', 'Comment terminer correctement un status en PHP?', ';', '.', ';', ',', '<xml></php></xml>'),
(47, 'PHP', 'Comment on enregistre l\'information depuis un formulaire avec le methode \"GET\"?', '$_GET[];', '$_POST[];', '$_GET[];', 'Request.QueryString;', 'Request.Form;'),
(48, 'PHP', 'Quel est le moyen correcte pour inclure le fichier \"time.inc\" en PHP?', '<xml><?php include \"time.inc\"; ?></xml>', '<xml><?php include:\"time.inc\"; ?></xml>', '<xml><!-- include file=\"time.inc\" --></xml>', '<xml><?php include file=\"time.inc\"; ?></xml>', '<xml><?php include \"time.inc\"; ?></xml>'),
(49, 'PHP', 'Comment créer une fonction en PHP?', 'function myFunction()', 'new_function myFunction()', 'function myFunction()', 'create myFunction()', '$function()'),
(50, 'PHP', 'Comment ouvrir le fichier \"time.txt\" en lecture en PHP?', 'fopen(\"time.txt\",\"r\");', 'fopen(\"time.txt\",\"r\");', 'fopen(\"time.txt\",\"r+\");', 'open(\"time.txt\");', 'open(\"time.txt\",\"read\");'),
(51, 'PHP', 'Quelle variable superglobale PHP permets de garder l\'information concernant les en-têtes, chemins, location du script ?', '$_SERVER', '$_SERVER', '$_SESSION', '$_GET', '$GLOBALS'),
(52, 'PHP', 'Comment ajouter 1 à la variable $count ?', '$count++;', '$count =+1;', 'count++;', '++count;', '$count++;'),
(53, 'PHP', 'Comment ajouter un commentaire dans PHP ?', '/*...*/', '*\\...\\*', '<!--...-->', '/*...*/', '<xml><comment>...</comment></xml>'),
(54, 'PHP', 'Parmi les variables suivantes quelle a une syntaxe incorrecte ?', '$my-Var', '$my_Var', '$my-Var', '$myVar', '$v'),
(55, 'PHP', 'Comment créer un cookie dans PHP ?', 'setcookie()', 'setcookie()', 'makecookie()', 'createcookie', 'bakecoockie()'),
(56, 'PHP', 'Comment créer un tableau (array) en PHP ?', '$cars = array(\"Volvo\", \"BMW\", \"Toyota\");', '$cars = array[\"Volvo\", \"BMW\", \"Toyota\"];', '$cars = \"Volvo\", \"BMW\", \"Toyota\";', '$cars = array(\"Volvo\", \"BMW\", \"Toyota\");', '$cars = (\"Volvo\", \"BMW\", \"Toyota\");'),
(57, 'PHP', 'Le scrypte PHP est entouré par des délimiteurs, lesquels ?', '<xml><?php...?></xml>', '<xml><&>...</&></xml>', '<xml><script>...</script></xml>', '<xml><?php>...</?></xml>', '<xml><?php...?></xml>'),
(58, 'PHP', 'La syntaxe du PHP est similaire à ... ?', 'Perl and C', 'Perl and C', 'VBScript', 'JavaScript', 'Ruby'),
(59, 'PHP', 'Parmi les réponses suivantes quelle n\'est pas un framework PHP?', 'Meteor', 'Symphony', 'Meteor', 'Yii', 'Laravel'),
(60, 'PHP', 'Si la directive session.cookie_lifetime est défini à 3600, le cookie va avoir une durée de vie égale à ... ?', '3600 seconds', '3600 minutes', '3600 seconds', '3.6 seconds', '3600 heures');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `questions_theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
