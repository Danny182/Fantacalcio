-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2015 at 05:12 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fantacalcio`
--

-- --------------------------------------------------------

--
-- Table structure for table `campionato`
--

CREATE TABLE IF NOT EXISTS `campionato` (
  `id_campionato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL DEFAULT '',
  `admin` varchar(30) NOT NULL DEFAULT '',
  `id_admin` int(11) NOT NULL,
  `n_part` int(11) NOT NULL DEFAULT '1' COMMENT 'numero dei partecipanti al campionato',
  `formazione_automatica` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'inserire formazione automaticamente?',
  `penalita` int(11) NOT NULL DEFAULT '0' COMMENT 'penalita punti in caso di mancato inserimento formazione',
  `mod_difesa_gazzetta` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'modificatore difesa gazzetta',
  `mod_portiere` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'modificatore portiere',
  `mod_difesa` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'modificatore difesa',
  `mod_centrocampo` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'modificatore centrocampo',
  `mod_attacco` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'modificatore attacco',
  `mod_modulo` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'possibilità di modifica modulo',
  `n_sostituzioni` int(11) NOT NULL DEFAULT '3' COMMENT 'numero sostituzioni consentite',
  `bonus_gol_portiere` int(11) NOT NULL DEFAULT '3' COMMENT 'bonus se fa gol il portiere',
  `bonus_gol_difensore` int(11) NOT NULL DEFAULT '3' COMMENT 'bonus se fa gol il difensore',
  `bonus_gol_centrocampista` int(11) NOT NULL DEFAULT '3' COMMENT 'bonus se fa gol il centrocampista',
  `bonus_gol_attaccante` int(11) NOT NULL DEFAULT '3' COMMENT 'bonus se fa gol l''attaccante',
  `bonus_gol_rigore` int(11) NOT NULL DEFAULT '3' COMMENT 'bonus se fa gol di rigore',
  `bonus_rigore_parato` int(11) NOT NULL DEFAULT '3' COMMENT 'bonus se para il rigore',
  `bonus_assist` int(11) NOT NULL DEFAULT '1' COMMENT 'bonus se fa assist',
  `bonus_portiere` int(11) NOT NULL DEFAULT '0',
  `bonus_casa` int(11) NOT NULL DEFAULT '2' COMMENT 'bonus se gioca in casa',
  `bonus_gol_vittoria` int(11) NOT NULL DEFAULT '0',
  `bonus_gol_pareggio` int(11) NOT NULL DEFAULT '0',
  `bonus_capitano` int(11) NOT NULL DEFAULT '0' COMMENT 'se il capitano prende + di 7 viene dato il bonus selezionato',
  `malus_gol_subito` int(11) NOT NULL DEFAULT '1' COMMENT 'punti che perde se subisce un gol',
  `ammonizione` float NOT NULL DEFAULT '0.5',
  `espulsione` int(11) NOT NULL DEFAULT '1',
  `malus_rigore_sbagliato` int(11) NOT NULL DEFAULT '3' COMMENT 'punti che perde se sbaglia il rigore',
  `malus_autogol` int(11) NOT NULL DEFAULT '3' COMMENT 'punti che perde se fa autogol',
  `voto_giocatore_sv` int(11) NOT NULL DEFAULT '0' COMMENT 'voto che prende un giocatore se è senza voto',
  `voto_giocatore_ss` int(11) NOT NULL DEFAULT '0' COMMENT 'voto giocatore se non ha sostituto',
  `punti_primo_gol` int(11) NOT NULL DEFAULT '66' COMMENT 'a quanti punti assegnare il primo gol',
  `punti_range_gol` int(11) NOT NULL DEFAULT '6' COMMENT 'ogni quanti punti assegnare un gol',
  `modulo_343` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'se "si" il modulo è consentito',
  `modulo_352` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'se "si" il modulo è consentito',
  `modulo_361` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'se "si" il modulo è consentito',
  `modulo_433` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'se "si" il modulo è consentito',
  `modulo_442` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'se "si" il modulo è consentito',
  `modulo_451` tinyint(1) NOT NULL DEFAULT '1',
  `modulo_253` tinyint(1) NOT NULL DEFAULT '0',
  `modulo_334` tinyint(1) NOT NULL DEFAULT '0',
  `modulo_424` tinyint(1) NOT NULL DEFAULT '0',
  `modulo_532` tinyint(1) NOT NULL DEFAULT '0',
  `modulo_541` tinyint(1) NOT NULL DEFAULT '0',
  `modulo_550` tinyint(1) NOT NULL DEFAULT '0',
  `partecipanti` text COMMENT 'email o username dei partecipanti al campionato',
  `n_portieri` int(11) NOT NULL COMMENT 'numeri max portieri',
  `n_difensori` int(11) NOT NULL COMMENT 'numero max di difensori',
  `n_centrocampisti` int(11) NOT NULL COMMENT 'numero max di centrocampoisti',
  `n_attaccanti` int(11) NOT NULL COMMENT 'numero max di attaccanti',
  `nascondi_rosa` tinyint(1) NOT NULL DEFAULT '0',
  `crediti` int(11) NOT NULL,
  `n_por_panc` int(11) NOT NULL DEFAULT '1',
  `n_dif_panc` int(11) NOT NULL DEFAULT '2',
  `n_cen_panc` int(11) NOT NULL DEFAULT '2',
  `n_att_panc` int(11) NOT NULL DEFAULT '2',
  `n_panchinari` int(11) NOT NULL DEFAULT '7',
  `orario_ins_form` int(11) NOT NULL DEFAULT '30',
  PRIMARY KEY (`id_campionato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `campionato`
--

INSERT INTO `campionato` (`id_campionato`, `nome`, `password`, `admin`, `id_admin`, `n_part`, `formazione_automatica`, `penalita`, `mod_difesa_gazzetta`, `mod_portiere`, `mod_difesa`, `mod_centrocampo`, `mod_attacco`, `mod_modulo`, `n_sostituzioni`, `bonus_gol_portiere`, `bonus_gol_difensore`, `bonus_gol_centrocampista`, `bonus_gol_attaccante`, `bonus_gol_rigore`, `bonus_rigore_parato`, `bonus_assist`, `bonus_portiere`, `bonus_casa`, `bonus_gol_vittoria`, `bonus_gol_pareggio`, `bonus_capitano`, `malus_gol_subito`, `ammonizione`, `espulsione`, `malus_rigore_sbagliato`, `malus_autogol`, `voto_giocatore_sv`, `voto_giocatore_ss`, `punti_primo_gol`, `punti_range_gol`, `modulo_343`, `modulo_352`, `modulo_361`, `modulo_433`, `modulo_442`, `modulo_451`, `modulo_253`, `modulo_334`, `modulo_424`, `modulo_532`, `modulo_541`, `modulo_550`, `partecipanti`, `n_portieri`, `n_difensori`, `n_centrocampisti`, `n_attaccanti`, `nascondi_rosa`, `crediti`, `n_por_panc`, `n_dif_panc`, `n_cen_panc`, `n_att_panc`, `n_panchinari`, `orario_ins_form`) VALUES
(97, 'aa', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 127, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 2, 2, 2, 7, 30),
(99, 'pestello league', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 127, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 2, 2, 2, 7, 30),
(100, 'sfds', 'das', 'daniel', 33, 4, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'gianniÂ£gianniÂ£gianniÂ£', 0, 0, 0, 0, 0, 0, 1, 2, 2, 2, 7, 30),
(101, 'sfds', 'das', 'daniel', 33, 4, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'gianniÂ£gianniÂ£gianniÂ£', 0, 0, 0, 0, 0, 0, 1, 2, 2, 2, 7, 30),
(102, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1, 2, 2, 2, 7, 30),
(103, 'gabri', 'pestello', 'gabri', 30, 3, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 'danny.zanchi@gmail.com£daniel£', 0, 0, 0, 0, 0, 0, 1, 2, 2, 2, 7, 30),
(104, 'pernulla', 'pernulla', 'daniel', 33, 2, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'gabri£', 0, 0, 0, 0, 0, 0, 1, 2, 2, 2, 7, 30),
(105, 'nullo', 'nullo', 'daniel', 33, 2, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'dd@gmail.com£', 0, 0, 0, 0, 0, 0, 1, 2, 2, 2, 7, 30),
(106, 'prova', 'provaa', 'daniel', 33, 2, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'gabri£', 1, 23, 10, 10, 0, 0, 1, 2, 2, 2, 7, 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
