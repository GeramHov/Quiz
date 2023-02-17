-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Feb 17, 2023 at 10:46 AM
-- Server version: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004-log
-- PHP Version: 8.1.14

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
  `a4` text NOT NULL,
  `a5` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `theme`, `question`, `true_answer`, `a1`, `a2`, `a3`, `a4`, `a5`) VALUES
(1, 'PHP', 'Quel opérateur est utilisé pour vérifier si deux valeurs sont égales et sont du même type ?', '<xml>===</xml>', '<xml>==</xml>', '<xml>===</xml>', '<xml>!=</xml>', '<xml>=</xml>', NULL),
(2, 'PHP', 'Quelle commande PHP pouvez-vous utiliser pour remplacer plusieurs commandes \"if-then\" ?', 'La commande \"switch-case\"', 'La commande \"while\"', 'La commande \"for\"', 'La commande \"switch-case\"', 'La commande \"for each\"', NULL),
(3, 'JavaScript', 'Dans quel élement HTML peut-on ajouter du JavaScript?', '<xmp><script></xmp>', '<xmp><scr></xmp>', '<xmp><js></xmp>', '<xmp><script></xmp>', '<xmp><jscript></xmp>', NULL),
(4, 'JavaScript', 'Quel est la syntaxe correcte de JavaScript pour changer le contenu d\'un élément HTML ci-dessous: <br> <xmp><p id=\"demo\">Ceci est une démonstration.</p></xmp>', 'document.getElementById(\"demo\").innerHTML = \"Hello World!\"; ', 'document.getElement(\"p\").innerHTML = \"Hello World!\";', 'document.getElementByName(\"p\").innerHTML = \"Hello World!\";', 'document.getElementById(\"demo\").innerHTML = \"Hello World!\"; ', '#demo.innerHTML = \"Hello World!\";', NULL),
(5, 'JavaScript', 'Quel est l\'endroit correct pour ajouter du JavaScript ?', 'La section < head > et la section < body >', 'La section < head > et la section < body >', 'La section < head >', 'La section < body >', 'La section < footer >', NULL),
(6, 'JavaScript', 'Quel est la syntaxe correcte pour appeler un script externe nommé \"xxx.js\" ?', '< script src=\"xxx.js\" >', '< script src=\"xxx\" >', '< script href=\"xxx.js\" >', '< script name=\"xxx.js\" >', '< script src=\"xxx.js\" >', NULL),
(7, 'JavaScript', 'Comment marquer \"Hello World\" dans la box d\'alerte ?', 'alert(\"Hello World\"); ', 'alertBox(\"Hello World\");', 'alert(\"Hello World\"); ', 'msgBox(\"Hello World\");', 'msg(\"Hello World\");', NULL),
(8, 'JavaScript', 'Comment créer une fonction dans JavaScript ?', 'function myFunction()', '()=> function', 'function myFunction()', 'function:myFunction()', 'myFunction()  ', NULL),
(9, 'JavaScript', 'Comment écrire une condition IF dans JavaScript ?', '<xmp>if (i == 5)</xmp>', 'if i = 5', '<xmp>if (i == 5)</xmp>', '<xmp>if i == 5 then</xmp>', 'if i = 5 then', NULL),
(10, 'JavaScript', 'Comment écrire une condition IF quand le \"i\" n\'est pas égale à 5 ?', '<xmp>if (i != 5)</xmp>', '<xmp>if (i != 5)</xmp>', 'if i <> 5', 'if (i <> 5)', '<xmp>if i =! 5 then</xmp>', NULL),
(11, 'JavaScript', 'Comment commencer un cycle \"while\" dans JavaScript ?', 'while (i <= 10)  ', 'while i=1 to 10; i++', 'while i = 1 to 10', 'while (i <= 10; i++)', 'while (i <= 10)  ', NULL),
(12, 'JavaScript', 'Comment commencer un cycle \"FOR\" dans JavaScript ?', 'for (i = 0; i <= 5; i++) ', 'for i = 1 to 5', 'for (i = 0; i <= 5; i++) ', 'for (i <= 5; i++)', 'for (i = 0; i <= 5)', NULL),
(13, 'JavaScript', 'Comment ajouter un commentaire dans JavaScript ?', '//This is a comment', '\'This is a comment', '< !--This is a comment-- >', '//This is a comment', '/This is a comment', NULL),
(14, 'JavaScript', 'Comment commenter plusieurs lignes sur JavaScript ?', '/*This comment has more than one line*/', '/*This comment has more than one line*/', '//This comment has more than one line// ', '< !--This comment has more than one line-- >', '// This comment has more than one line', NULL),
(15, 'JavaScript', 'Comment déclarer un tableau (array) dans JavaScript ?', 'const colors = [\"red\", \"green\", \"blue\"] ', 'const colors = \"red\", \"green\", \"blue\"', 'const colors = [\"red\", \"green\", \"blue\"] ', 'const colors = (1:\"red\", 2:\"green\", 3:\"blue\")', 'const colors = 1 = (\"red\"), 2 = (\"green\"), 3 = (\"blue\")', NULL),
(16, 'JavaScript', 'Comment arrondir le chiffre 7.25 à l\'entier le plus proche ?', 'Math.round(7.25)  ', 'rnd(7.25)', 'Math.round(7.25)  ', 'Math.rnd(7.25)', 'round(7.25)', NULL),
(17, 'JavaScript', 'Comment trouver le chiffre avec sa valeur la plus grande de X et Y ?', 'Math.max(x, y)  ', 'top(x, y)', 'ceil(x, y)', 'Math.max(x, y)  ', 'Math.ceil(x, y)', NULL),
(18, 'JavaScript', 'Comment trouver le nom du navigateur du client ?', 'navigator.appName  ', 'client.navName', 'browser.name', 'navigator.name', 'navigator.appName  ', NULL),
(19, 'JavaScript', 'Quel évenement se déclenche quand un utilisateur clicke sur un élement HTML ?', 'onclick', 'onchange', 'onmouseover', 'onmouseclick', 'onclick', NULL),
(20, 'JavaScript', 'Comment déclarer une variable dans JavaScript ?', 'const carName', 'v carName', 'const carName', 'variable carName', '$ carName', NULL),
(21, 'JavaScript', 'Quel opérateur utilise-t-on pour assigner une valeur à un variable JavaScript ?', '=', 'x', '-', '*', '=', NULL),
(22, 'JavaScript', 'Qu\'est-ce que va retourner le code suivant : Boolean(10>9) ?', 'true', 'NaN', 'false', 'true', 'null', NULL),
(23, 'HTML-CSS', 'Que veut dire HTML ?', 'Hyper Text Markup Language', 'Hyper Text Markup Language', 'Hyperlinks and Text Markup Language', 'Home Tool Markup Language', 'Hyperlinks Markup Language', NULL),
(24, 'HTML-CSS', 'Que veut dire CSS ?', 'Cascading Style Sheets', 'Creative Style Sheets', 'Cascading Style Sheets', 'Computer Style Sheets', 'Colorful Style Sheets', NULL),
(25, 'HTML-CSS', 'Qui crée les standards WEB ?', 'The World Wide Web Consortium ', 'Google', 'Mozilla', 'Microsoft', 'The World Wide Web Consortium ', NULL),
(26, 'HTML-CSS', 'Comment appeler un fichier .css externe correctement dans HTML ?', '< link rel=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\" >', '< style src=\"mystyle.css\" >', '< link rel=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\" >', '< stylesheet>mystyle.css</stylesheet >', '< link href=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\" >', NULL),
(27, 'HTML-CSS', 'Comment sauter correctement une ligne dans HTML ?', '<xmp><br></xmp>', '<xmp><break></xmp>', '<xmp><br></xmp>', '<xmp><lb></xmp>', '<xmp><hr></xmp>', NULL),
(28, 'HTML-CSS', 'Quelle propriété CSS utilise-t-on pour changer la couleur d\'un texte ?', 'color', 'text-color', 'fgcolor', 'font-color', 'color', NULL),
(29, 'HTML-CSS', 'Quelle est la bonne syntaxe pour ouvrir le lien dans une nouvelle page ?', '< a href=\"url\" target=\"_blank\" >', '< a href=\"url\" new >', '< a href=\"url\" target=\"new\" >', '< a href=\"url\" target=\"_blank\" >', '< a href=\"url\" target=\"new page\" >', NULL),
(30, 'HTML-CSS', 'Quelle est la propriété CSS qui change la taille d\'un texte ?', 'font-size', 'text-style', 'font-size', 'font-style', 'text-size', NULL),
(31, 'HTML-CSS', 'Comment créer correctement un input text ?', '<xmp><input type=\"text\"></xmp>', '<xmp><input type=\"textfield\"></xmp>', '<xmp><input type=\"text\"></xmp>', '<xmp><textinput type=\"text\"></xmp>', '<xmp><textfield></xmp>', NULL),
(32, 'HTML-CSS', 'Comment peut-on changer la police ?', 'font-family', 'font-style', 'font-weight', 'font-family', 'text-family', NULL),
(33, 'HTML-CSS', 'Comment créer un drop-down list dans HTML ?', '<xmp><select></xmp>', '<xmp><input type=\"dropdown\"></xmp>', '<xmp><input type=\"list\"></xmp>', '<xmp><list></xmp>', '<xmp><select></xmp>', NULL),
(34, 'HTML-CSS', 'Comment appeler un élement avec id=\"demo\" dans CSS ?', '#demo', '.demo', '#demo', '*demo', 'demo', NULL),
(35, 'HTML-CSS', 'Quelle est la syntaxe correcte pour intégrer une image dans un document HTML ?', '< img src=\"image.gif\" alt=\"MyImage\" >', '< img src=\"image.gif\" alt=\"MyImage\" >', '< image src=\"image.gif\" alt=\"MyImage\" >', '< img href=\"image.gif\" alt=\"MyImage\" >', '< img alt=\"MyImage\">image.gif</img >', NULL),
(36, 'HTML-CSS', 'Comment appeler correctement un élement <xml><p></xml> dans un div ?', 'div p', 'div.p', 'div + p', 'div p', 'div, p', NULL),
(37, 'HTML-CSS', 'Quel attribut HTML affiche le texte alternatif d\'une image si celle-ci n\'est pas affiché ?', 'alt', 'src', 'title', 'alt', 'longdesc', NULL),
(38, 'HTML-CSS', 'Quelle est la valeur défaut de l\'attribut \"position\" dans CSS ?', 'static', 'absolute', 'static', 'relative', 'fixed', NULL),
(39, 'HTML-CSS', 'Quelle est la syntaxe correcte pour afficher une vidéo dans HTML ?', '<xmp><video></xmp>', '<xmp><media></xmp>', '<xmp><movie></xmp>', '<xmp><video></xmp>', '<xmp><vid></xmp>', NULL),
(40, 'HTML-CSS', 'Quel attribut HTML permet de spécifier que input doit être absolument rempli ?', 'required', 'placeholder', 'formvalidate', 'required', 'validate', NULL),
(41, 'HTML-CSS', 'Quel élement HTML défini les liens de navigation ?', '<xmp><nav></xmp>', '<xmp><nav></xmp>', '<xmp><navigate></xmp>', '<xmp><navigation></xmp>', '<xmp><a></xmp>', NULL),
(42, 'HTML-CSS', 'Quel élement HTML spécifie une en-tête pour le document ?', '<xmp><header></xmp>', '<xmp><section></xmp>', '<xmp><top></xmp>', '<xmp><head></xmp>', '<xmp><header></xmp>', NULL),
(43, 'PHP', 'Que veut dire PHP?', 'PHP: Hypertext Preprocessor ', 'PHP: Hypertext Preprocessor ', 'Private Home Page', 'Personal Hypertext Processor', 'Personal Home Processor', NULL),
(44, 'PHP', 'Comment écrire \"Hello World\" en PHP?', 'echo \"Hello World\";', '\"Hello World\";', 'Document.Write(\"Hello World\");', 'Document.Print(\"Hello World\");', 'echo \"Hello World\";', NULL),
(45, 'PHP', 'Avec quel symbole définit-on les variables en PHP?', '$', '&', '!', '£', '$', NULL),
(46, 'PHP', 'Comment terminer correctement un status en PHP?', '<xml>;</xml>', '<xml>.</xml>', '<xml>;</xml>', '<xml>,</xml>', '<xml></php></xml>', NULL),
(47, 'PHP', 'Comment on enregistre l\'information depuis un formulaire avec le methode \"GET\"?', '$_GET[];', '$_POST[];', '$_GET[];', 'Request.QueryString;', 'Request.Form;', NULL),
(48, 'PHP', 'Quel est le moyen correct pour inclure le fichier \"time.inc\" en PHP?', '< ?php include \"time.inc\"; ?>', '< ?php include:\"time.inc\"; ?>', '< !-- include file=\"time.inc\" -->', '< ?php include file=\"time.inc\"; ?>', '< ?php include \"time.inc\"; ?>', NULL),
(49, 'PHP', 'Comment créer une fonction en PHP?', 'function myFunction()', 'new_function myFunction()', 'function myFunction()', 'create myFunction()', '$function()', NULL),
(50, 'PHP', 'Comment ouvrir le fichier \"time.txt\" en lecture en PHP?', 'fopen(\"time.txt\",\"r\");', 'fopen(\"time.txt\",\"r\");', 'fopen(\"time.txt\",\"r+\");', 'open(\"time.txt\");', 'open(\"time.txt\",\"read\");', NULL),
(51, 'PHP', 'Quelle variable superglobale PHP permets de garder l\'information concernant les en-têtes, chemins, location du script ?', '$_SERVER', '$_SERVER', '$_SESSION', '$_GET', '$GLOBALS', NULL),
(52, 'PHP', 'Comment ajouter 1 à la variable $count ?', '$count++;', '$count =+1;', 'count++;', '++count;', '$count++;', NULL),
(53, 'PHP', 'Comment ajouter un commentaire dans PHP ?', '<xml>/*...*/</xml>', '<xml>*\\...\\*</xml>', '< !--...-- >', '<xml>/*...*/</xml>', '<comment>...</comment>', NULL),
(54, 'PHP', 'Parmi les variables suivantes quelle a une syntaxe incorrecte ?', '$my-Var', '$my_Var', '$my-Var', '$myVar', '$v', NULL),
(55, 'PHP', 'Comment créer un cookie dans PHP ?', 'setcookie()', 'setcookie()', 'makecookie()', 'createcookie', 'bakecoockie()', NULL),
(56, 'PHP', 'Comment créer un tableau (array) en PHP ?', '$cars = array(\"Volvo\", \"BMW\", \"Toyota\");', '$cars = array[\"Volvo\", \"BMW\", \"Toyota\"];', '$cars = \"Volvo\", \"BMW\", \"Toyota\";', '$cars = array(\"Volvo\", \"BMW\", \"Toyota\");', '$cars = (\"Volvo\", \"BMW\", \"Toyota\");', NULL),
(57, 'PHP', 'Le scrypt PHP est entouré par des délimiteurs, lesquels ?', '<xmp><?php...?></xmp>', '<xmp><&>...</&></xmp>', '<xmp><script>...</script></xmp>', '<xmp><?php>...</?></xmp>', '<xmp><?php...?></xmp>', NULL),
(58, 'PHP', 'La syntaxe du PHP est similaire à ... ?', 'Perl and C', 'Perl and C', 'VBScript', 'JavaScript', 'Ruby', NULL),
(59, 'PHP', 'Parmi les réponses suivantes quelle n\'est pas un framework PHP?', 'Meteor', 'Symphony', 'Meteor', 'Yii', 'Laravel', NULL),
(60, 'PHP', 'Si la directive session.cookie_lifetime est défini à 3600, le cookie va avoir une durée de vie égale à ... ?', '3600 seconds', '3600 minutes', '3600 seconds', '3.6 seconds', '3600 heures', NULL);

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

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `score`, `user_id`, `date`, `questions_theme`) VALUES
(44, 0, 7, '2023-02-16', 'JavaScript'),
(45, 0, 7, '2023-02-16', 'PHP'),
(46, 0, 9, '2023-02-16', 'PHP'),
(47, 0, 6, '2023-02-16', 'JavaScript'),
(48, 20, 6, '2023-02-16', 'JavaScript'),
(49, 68, 10, '2023-02-16', 'PHP'),
(50, 17, 10, '2023-02-16', 'HTML-CSS'),
(51, 36, 10, '2023-02-16', 'JavaScript'),
(52, 49, 11, '2023-02-16', 'HTML-CSS'),
(53, 31, 11, '2023-02-16', 'JavaScript'),
(54, 65, 11, '2023-02-16', 'PHP'),
(55, 71, 12, '2023-02-16', 'HTML-CSS'),
(56, 65, 12, '2023-02-16', 'HTML-CSS'),
(57, 37, 13, '2023-02-16', 'JavaScript'),
(58, 70, 13, '2023-02-16', 'JavaScript'),
(59, 53, 14, '2023-02-17', 'HTML-CSS'),
(60, 33, 14, '2023-02-17', 'HTML-CSS'),
(61, 17, 14, '2023-02-17', 'HTML-CSS'),
(62, 47, 14, '2023-02-17', 'HTML-CSS'),
(63, 77, 14, '2023-02-17', 'HTML-CSS'),
(64, 61, 14, '2023-02-17', 'JavaScript'),
(65, 63, 14, '2023-02-17', 'JavaScript'),
(66, 38, 14, '2023-02-17', 'JavaScript'),
(67, 61, 14, '2023-02-17', 'JavaScript'),
(68, 61, 14, '2023-02-17', 'JavaScript'),
(69, 56, 14, '2023-02-17', 'JavaScript'),
(70, 57, 14, '2023-02-17', 'PHP'),
(71, 53, 14, '2023-02-17', 'PHP'),
(72, 56, 14, '2023-02-17', 'PHP'),
(73, 70, 14, '2023-02-17', 'PHP'),
(74, 54, 15, '2023-02-17', 'HTML-CSS'),
(75, 63, 15, '2023-02-17', 'JavaScript'),
(76, 38, 15, '2023-02-17', 'PHP'),
(77, 19, 15, '2023-02-17', 'PHP'),
(78, 29, 15, '2023-02-17', 'JavaScript');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `avatar`) VALUES
(6, 'Bean', 'avatars/avatar_3.jpg'),
(7, 'Gueram', 'avatars/avatar_6.jpg'),
(8, 'Shrek', 'avatars/avatar_2.jpg'),
(9, 'John', 'avatars/avatar_9.jpg'),
(10, 'Renaud', 'avatars/avatar_1.jpg'),
(11, 'Troll', 'avatars/avatar_6.jpg'),
(12, 'Nicolas', 'avatars/avatar_7.jpg'),
(13, 'Jackie', 'avatars/avatar_9.jpg'),
(14, 'Bart', 'avatars/avatar_8.jpg'),
(15, 'Alexandre', 'avatars/avatar_10.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
