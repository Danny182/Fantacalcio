-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Gen 21, 2015 alle 16:08
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

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
-- Struttura della tabella `appartiene`
--

CREATE TABLE IF NOT EXISTS `appartiene` (
  `id_squadra` int(10) unsigned DEFAULT NULL,
  `id_giocatore` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `appartiene`
--

INSERT INTO `appartiene` (`id_squadra`, `id_giocatore`) VALUES
(82, 35),
(82, 35),
(82, 100),
(82, 100),
(82, 36);

-- --------------------------------------------------------

--
-- Struttura della tabella `campionato`
--

CREATE TABLE IF NOT EXISTS `campionato` (
`id_campionato` int(10) unsigned NOT NULL,
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
  `n_attaccanti` int(11) NOT NULL COMMENT 'numero max di attaccanti'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dump dei dati per la tabella `campionato`
--

INSERT INTO `campionato` (`id_campionato`, `nome`, `password`, `admin`, `id_admin`, `n_part`, `formazione_automatica`, `penalita`, `mod_difesa_gazzetta`, `mod_portiere`, `mod_difesa`, `mod_centrocampo`, `mod_attacco`, `mod_modulo`, `n_sostituzioni`, `bonus_gol_portiere`, `bonus_gol_difensore`, `bonus_gol_centrocampista`, `bonus_gol_attaccante`, `bonus_gol_rigore`, `bonus_rigore_parato`, `bonus_assist`, `bonus_portiere`, `bonus_casa`, `bonus_gol_vittoria`, `bonus_gol_pareggio`, `bonus_capitano`, `malus_gol_subito`, `ammonizione`, `espulsione`, `malus_rigore_sbagliato`, `malus_autogol`, `voto_giocatore_sv`, `voto_giocatore_ss`, `punti_primo_gol`, `punti_range_gol`, `modulo_343`, `modulo_352`, `modulo_361`, `modulo_433`, `modulo_442`, `modulo_451`, `modulo_253`, `modulo_334`, `modulo_424`, `modulo_532`, `modulo_541`, `modulo_550`, `partecipanti`, `n_portieri`, `n_difensori`, `n_centrocampisti`, `n_attaccanti`) VALUES
(97, 'aa', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 127, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0),
(99, 'pestello league', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 127, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0),
(100, 'sfds', 'das', 'daniel', 33, 4, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'gianniÂ£gianniÂ£gianniÂ£', 0, 0, 0, 0),
(101, 'sfds', 'das', 'daniel', 33, 4, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'gianniÂ£gianniÂ£gianniÂ£', 0, 0, 0, 0),
(102, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0),
(103, 'gabri', 'pestello', 'gabri', 30, 3, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 'danny.zanchi@gmail.com£daniel£', 0, 0, 0, 0),
(104, 'pernulla', 'pernulla', 'daniel', 33, 2, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'gabri£', 0, 0, 0, 0),
(105, 'nullo', 'nullo', 'daniel', 33, 2, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'dd@gmail.com£', 0, 0, 0, 0),
(106, 'prova', 'provaa', 'daniel', 33, 2, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'gabri£', 1, 23, 10, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `giocatore`
--

CREATE TABLE IF NOT EXISTS `giocatore` (
`id_giocatore` int(10) unsigned NOT NULL,
  `cognome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `nazionalita` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ruolo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valore` int(11) DEFAULT NULL,
  `squadra` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_squadra_giocatore` int(11) NOT NULL,
  `n_maglia` int(5) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=721 ;

--
-- Dump dei dati per la tabella `giocatore`
--

INSERT INTO `giocatore` (`id_giocatore`, `cognome`, `nome`, `data_nascita`, `nazionalita`, `ruolo`, `valore`, `squadra`, `id_squadra_giocatore`, `n_maglia`) VALUES
(30, 'Consigli', 'Andrea  ', '1987-01-27', 'ita', 'P', 1, 'atalanta', 1, 47),
(31, 'Frezzolini', 'Giorgio  ', '1976-01-21', 'ita', 'P', NULL, 'atalanta', 1, 78),
(32, 'Sportiello', 'Marco  ', '1992-05-10', 'ita', 'P', NULL, 'atalanta', 1, 37),
(33, 'Barba', 'Gianluca  ', '1995-02-27', 'ita', 'D', NULL, 'atalanta', 1, 92),
(34, 'Bellini', 'Gianpaolo  ', '1980-03-27', 'ita', 'D', NULL, 'atalanta', 1, 6),
(35, 'Benalouane', 'Yohan  ', '1987-03-28', 'tun', 'D', NULL, 'atalanta', 1, 29),
(36, 'Brivio', 'Davide  ', '1988-03-17', 'ita', 'D', NULL, 'atalanta', 1, 28),
(37, 'Caldara', 'Mattia  ', '1994-05-05', 'ita', 'D', NULL, 'atalanta', 1, 15),
(38, 'Del Grosso', 'Cristiano  ', '1983-03-24', 'ita', 'D', NULL, 'atalanta', 1, 27),
(39, 'Lucchini', 'Stefano  ', '1980-10-02', 'ita', 'D', NULL, 'atalanta', 1, 3),
(40, 'Nica', 'Constantin  ', '1993-03-18', 'rou', 'D', NULL, 'atalanta', 1, 93),
(41, 'Scaloni', 'Lionel Sebastian ', '1978-05-16', 'arg', 'D', NULL, 'atalanta', 1, 4),
(42, 'Stendardo', 'Guglielmo  ', '1981-05-06', 'ita', 'D', NULL, 'atalanta', 1, 2),
(43, 'Yepes', 'Mario Alberto ', '1976-01-13', 'col', 'D', NULL, 'atalanta', 1, 33),
(44, 'Baselli', 'Daniele  ', '1992-03-12', 'ita', 'C', NULL, 'atalanta', 1, 18),
(45, 'Bonaventura', 'Giacomo  ', '1989-08-22', 'ita', 'C', NULL, 'atalanta', 1, 10),
(46, 'Brienza', 'Franco  ', '1979-03-19', 'ita', 'C', NULL, 'atalanta', 1, 23),
(47, 'Carmona', '  ', '1987-02-21', 'chi', 'C', NULL, 'atalanta', 1, 17),
(48, 'Cazzola', 'Riccardo  ', '1985-10-08', 'ita', 'C', NULL, 'atalanta', 1, 44),
(49, 'Cigarini', 'Luca  ', '1986-06-20', 'ita', 'C', NULL, 'atalanta', 1, 21),
(50, 'Estigarribia', 'Marcelo  ', '1987-09-21', 'par', 'C', NULL, 'atalanta', 1, 20),
(51, 'Giorgi', 'Luigi  ', '1987-04-19', 'ita', 'C', NULL, 'atalanta', 1, 5),
(52, 'Kone', 'Moussa  ', '1990-02-12', 'civ', 'C', NULL, 'atalanta', 1, 90),
(53, 'Migliaccio', 'Giulio  ', '1981-06-23', 'ita', 'C', NULL, 'atalanta', 1, 8),
(54, 'Moralez', 'Maximiliano  ', '1987-02-27', 'arg', 'C', NULL, 'atalanta', 1, 11),
(55, 'Parigi', 'Giacomo  ', '1996-06-17', 'ita', 'C', NULL, 'atalanta', 1, 97),
(56, 'Raimondi', 'Cristian  ', '1981-04-30', 'ita', 'C', NULL, 'atalanta', 1, 77),
(57, 'Bentancourt', 'Morales Rubén Dani', '1993-03-02', 'uru', 'A', NULL, 'atalanta', 1, 9),
(58, 'De Luca', 'Giuseppe  ', '1991-10-11', 'ita', 'A', NULL, 'atalanta', 1, 91),
(59, 'Denis', 'German Gustavo ', '1981-09-10', 'arg', 'A', NULL, 'atalanta', 1, 19),
(60, 'Livaja', 'Marko  ', '1993-08-26', 'cro', 'A', NULL, 'atalanta', 1, 7),
(61, 'Olausson', 'Joakim  ', '1995-01-14', 'swe', 'A', NULL, 'atalanta', 1, 95),
(62, 'Pugliese', 'Mario  ', '1996-03-26', 'ita', 'A', NULL, 'atalanta', 1, 96),
(63, 'Varano', 'Federico  ', '1995-01-21', 'ita', 'A', NULL, 'atalanta', 1, 94),
(97, 'Malagoli', 'Matteo  ', '1995-01-02', 'ita', 'P', NULL, 'bologna', 2, 16),
(98, 'Stojanovic', 'Dejan  ', '1993-07-19', 'aut', 'P', NULL, 'bologna', 2, 32),
(99, 'Antonsson', 'Mikael  ', '1981-05-31', 'swe', 'D', NULL, 'bologna', 2, 5),
(100, 'Cech', 'Marek  ', '1983-08-26', 'svk', 'D', NULL, 'bologna', 2, 35),
(101, 'Cherubin', 'Nicolò  ', '1986-12-02', 'ita', 'D', NULL, 'bologna', 2, 21),
(102, 'Crespo', '  ', '1987-02-09', 'esp', 'D', NULL, 'bologna', 2, 75),
(103, 'Garics', 'György  ', '1984-03-08', 'aut', 'D', NULL, 'bologna', 2, 8),
(104, 'Maini', 'Marco  ', '1995-04-14', 'ita', 'D', NULL, 'bologna', 2, 29),
(105, 'Mantovani', 'Andrea  ', '1984-06-22', 'ita', 'D', NULL, 'bologna', 2, 22),
(106, 'Masina', 'Adam  ', '1994-01-02', 'mar', 'D', NULL, 'bologna', 2, 2),
(107, 'Morleo', 'Archimede  ', '1983-09-26', 'ita', 'D', NULL, 'bologna', 2, 3),
(108, 'Natali', 'Cesare  ', '1979-04-05', 'ita', 'D', NULL, 'bologna', 2, 14),
(109, 'Sørensen', 'Frederik  ', '1992-04-14', 'den', 'D', NULL, 'bologna', 2, 6),
(110, 'Christodoulopoulos', 'Lazaros  ', '1986-12-19', 'gre', 'C', NULL, 'bologna', 2, 19),
(111, 'Della Rocca', 'Francesco  ', '1987-09-14', 'ita', 'C', NULL, 'bologna', 2, 7),
(112, 'Friberg', 'Erik  ', '1986-02-10', 'swe', 'C', NULL, 'bologna', 2, 11),
(113, 'Ibson', '  ', '1983-11-07', 'bra', 'C', NULL, 'bologna', 2, 20),
(114, 'Kone', 'Panagiotis  ', '1987-07-26', 'gre', 'C', NULL, 'bologna', 2, 33),
(115, 'Krhin', 'Rene  ', '1990-05-21', 'svn', 'C', NULL, 'bologna', 2, 4),
(116, 'Pazienza', 'Michele  ', '1982-08-05', 'ita', 'C', NULL, 'bologna', 2, 24),
(117, 'Perez', 'Diego  ', '1980-05-18', 'uru', 'C', NULL, 'bologna', 2, 15),
(118, 'Acquafresca', 'Robert  ', '1987-09-11', 'ita', 'A', NULL, 'bologna', 2, 12),
(119, 'Bianchi', 'Rolando  ', '1983-02-15', 'ita', 'A', NULL, 'bologna', 2, 9),
(120, 'Cristaldo', 'Jonathan Ezequiel ', '1989-03-05', 'arg', 'A', NULL, 'bologna', 2, 99),
(121, 'Laxalt', 'Diego  ', '1993-09-07', 'uru', 'A', NULL, 'bologna', 2, 13),
(122, 'Moscardelli', 'Davide  ', '1980-02-03', 'ita', 'A', NULL, 'bologna', 2, 10),
(123, 'Paponi', 'Daniele  ', '1988-04-16', 'ita', 'A', NULL, 'bologna', 2, 88),
(124, 'Avramov', 'Vlada  ', '1979-04-05', 'srb', 'P', NULL, 'cagliari', 3, 25),
(125, 'Carboni', 'Werther  ', '1996-04-04', 'ita', 'P', NULL, 'cagliari', 3, 28),
(126, 'Silvestri', 'Marco  ', '1991-03-02', 'ita', 'P', NULL, 'cagliari', 3, 1),
(127, 'Astori', 'Davide  ', '1987-01-07', 'ita', 'D', NULL, 'cagliari', 3, 13),
(128, 'Bastrini', 'Alessandro  ', '1987-04-03', 'ita', 'D', NULL, 'cagliari', 3, 3),
(129, 'Danilo', 'Avelar  ', '1989-06-09', 'bra', 'D', NULL, 'cagliari', 3, 8),
(130, 'Del Fabro', ' Dario ', '1995-03-24', 'ita', 'D', NULL, 'cagliari', 3, 34),
(131, 'Murru', 'Nicola  ', '1994-12-16', 'ita', 'D', NULL, 'cagliari', 3, 29),
(132, 'Oikonomou', 'Marios  ', '1992-10-06', 'gre', 'D', NULL, 'cagliari', 3, 19),
(133, 'Perico', 'Gabriele  ', '1984-03-11', 'ita', 'D', NULL, 'cagliari', 3, 24),
(134, 'Pisano', 'Francesco  ', '1986-04-29', 'ita', 'D', NULL, 'cagliari', 3, 14),
(135, 'Rossettini', 'Luca  ', '1985-05-09', 'ita', 'D', NULL, 'cagliari', 3, 15),
(136, 'Adryan', '  ', '1994-08-10', 'bra', 'C', NULL, 'cagliari', 3, 32),
(137, 'Cabrera', 'Matias  ', '1986-05-16', 'uru', 'C', NULL, 'cagliari', 3, 22),
(138, 'Conti', 'Daniele  ', '1979-01-09', 'ita', 'C', NULL, 'cagliari', 3, 5),
(139, 'Cossu', 'Andrea  ', '1980-05-03', 'ita', 'C', NULL, 'cagliari', 3, 7),
(140, 'Demontis', 'Andrea  ', '1995-01-10', 'ita', 'C', NULL, 'cagliari', 3, 36),
(141, 'Dessena', 'Daniele  ', '1987-05-10', 'ita', 'C', NULL, 'cagliari', 3, 21),
(142, 'Ekdal', 'Albin  ', '1989-07-28', 'swe', 'C', NULL, 'cagliari', 3, 20),
(143, 'Eriksson', 'Sebastian  ', '1989-01-31', 'swe', 'C', NULL, 'cagliari', 3, 16),
(144, 'Solinas', 'Simone  ', '1996-03-03', 'ita', 'C', NULL, 'cagliari', 3, 38),
(145, 'Suella', 'Michele  ', '1995-01-09', 'ita', 'C', NULL, 'cagliari', 3, 35),
(146, 'Vecino', '  ', '1991-08-24', 'uru', 'C', NULL, 'cagliari', 3, 27),
(147, 'Ibarbo', 'Victor  ', '1990-05-19', 'col', 'A', NULL, 'cagliari', 3, 23),
(148, 'Ibraimi', 'Agim  ', '1988-08-29', 'mkd', 'A', NULL, 'cagliari', 3, 10),
(149, 'Masia', 'Alessandro  ', '1995-09-28', 'ita', 'A', NULL, 'cagliari', 3, 30),
(150, 'Nenê', '  ', '1983-07-28', 'bra', 'A', NULL, 'cagliari', 3, 18),
(151, 'Pinilla', '  ', '1984-02-04', 'chi', 'A', NULL, 'cagliari', 3, 51),
(152, 'Sau', 'Marco  ', '1987-11-03', 'ita', 'A', NULL, 'cagliari', 3, 9),
(153, 'Andujar', 'Mariano Gonzalo ', '1983-07-30', 'arg', 'P', NULL, 'catania', 4, 21),
(154, 'Costanzo', 'Giorgio  ', '1994-01-01', 'ita', 'P', NULL, 'catania', 4, 41),
(155, 'Ficara', 'Giuseppe  ', '1995-08-24', 'ita', 'P', NULL, 'catania', 4, 35),
(156, 'Frison', 'Alberto  ', '1988-01-22', 'ita', 'P', NULL, 'catania', 4, 1),
(157, 'Alvarez', '  ', '1984-04-17', 'arg', 'D', NULL, 'catania', 4, 22),
(158, 'Bellusci', 'Giuseppe  ', '1989-08-21', 'ita', 'D', NULL, 'catania', 4, 14),
(159, 'Biraghi', 'Cristiano  ', '1992-09-01', 'ita', 'D', NULL, 'catania', 4, 34),
(160, 'Brugaletta', 'Simone  ', '1994-01-19', 'ita', 'D', NULL, 'catania', 4, 38),
(161, 'Cabalceta', '  ', '1993-01-09', 'crc', 'D', NULL, 'catania', 4, 31),
(162, 'Capuano', 'Ciro  ', '1981-07-10', 'ita', 'D', NULL, 'catania', 4, 33),
(163, 'De Matteis', 'Michele  ', '1995-01-01', 'ita', 'D', NULL, 'catania', 4, 37),
(164, 'Gyomber', 'Norbert  ', '1992-07-03', 'svk', 'D', NULL, 'catania', 4, 24),
(165, 'Legrottaglie', 'Nicola  ', '1976-10-20', 'ita', 'D', NULL, 'catania', 4, 6),
(166, 'Monzon', 'Luciano Fabian ', '1987-04-13', 'arg', 'D', NULL, 'catania', 4, 18),
(167, 'Peruzzi', 'Lucchetti Gino ', '1992-06-09', 'arg', 'D', NULL, 'catania', 4, 2),
(168, 'Rolín', '  ', '1989-02-07', 'uru', 'D', NULL, 'catania', 4, 5),
(169, 'Spolli', 'Nicolas Federico ', '1983-02-20', 'arg', 'D', NULL, 'catania', 4, 3),
(170, 'Almirón', 'Sergio Bernardo ', '1980-11-07', 'arg', 'C', NULL, 'catania', 4, 4),
(171, 'Barrientos', 'Pablo Cesar ', '1985-01-17', 'arg', 'C', NULL, 'catania', 4, 28),
(172, 'Castro', 'Lucas Nahuel ', '1989-04-09', 'arg', 'C', NULL, 'catania', 4, 19),
(173, 'Garufi', 'Sergio Agatino ', '1995-09-16', 'ita', 'C', NULL, 'catania', 4, 39),
(174, 'Izco', 'Mariano Julio ', '1983-03-13', 'arg', 'C', NULL, 'catania', 4, 13),
(175, 'Lodi', 'Francesco  ', '1984-03-23', 'ita', 'C', NULL, 'catania', 4, 10),
(176, 'Plašil', 'Jaroslav  ', '1982-01-05', 'cze', 'C', NULL, 'catania', 4, 8),
(177, 'Bergessio', 'Gonzalo Ruben ', '1984-07-20', 'arg', 'A', NULL, 'catania', 4, 9),
(178, 'Boateng', 'Kingsley  ', '1994-04-07', 'ita', 'A', NULL, 'catania', 4, 23),
(179, 'Fedato', 'Francesco  ', '1992-10-15', 'ita', 'A', NULL, 'catania', 4, 7),
(180, 'Gallo', 'Agostino  ', '1993-03-05', 'ita', 'A', NULL, 'catania', 4, 40),
(181, 'Keko', '  ', '1991-12-27', 'esp', 'A', NULL, 'catania', 4, 26),
(182, 'Leto', 'Sebastián Eduardo ', '1986-08-30', 'arg', 'A', NULL, 'catania', 4, 11),
(183, 'Petkovic', 'Bruno  ', '1994-09-16', 'cro', 'A', NULL, 'catania', 4, 32),
(184, 'Rinaudo', 'Fabián Andrés ', '1987-09-15', 'arg', 'A', NULL, 'catania', 4, 15),
(185, 'Agazzi', 'Michael  ', '1984-07-03', 'ita', 'P', NULL, 'chievo', 5, 25),
(186, 'Moschin', 'Simone  ', '1995-01-20', 'ita', 'P', NULL, 'chievo', 5, 96),
(187, 'Puggioni', 'Christian  ', '1981-01-17', 'ita', 'P', NULL, 'chievo', 5, 1),
(188, 'Squizzi', 'Lorenzo  ', '1974-06-20', 'ita', 'P', NULL, 'chievo', 5, 18),
(189, 'Aldrovandi', 'Simone  ', '1994-04-02', 'ita', 'D', NULL, 'chievo', 5, 13),
(190, 'Bernardini', 'Alessandro  ', '1987-01-21', 'ita', 'D', NULL, 'chievo', 5, 2),
(191, 'Canini', 'Michele  ', '1985-06-05', 'ita', 'D', NULL, 'chievo', 5, 5),
(192, 'Cesar', 'Bostjan  ', '1982-07-09', 'svn', 'D', NULL, 'chievo', 5, 12),
(193, 'Costa', 'Filippo  ', '1995-05-21', 'ita', 'D', NULL, 'chievo', 5, 36),
(194, 'Dainelli', 'Dario  ', '1979-06-09', 'ita', 'D', NULL, 'chievo', 5, 3),
(195, 'Dramé', 'Boukary  ', '1985-07-22', 'sen', 'D', NULL, 'chievo', 5, 93),
(196, 'Frey', 'Nicolas Sebastien ', '1984-03-06', 'fra', 'D', NULL, 'chievo', 5, 21),
(197, 'Rubin', 'Matteo  ', '1987-07-09', 'ita', 'D', NULL, 'chievo', 5, 33),
(198, 'Sardo', 'Gennaro  ', '1979-05-08', 'ita', 'D', NULL, 'chievo', 5, 17),
(199, 'Bentivoglio', 'Simone  ', '1985-05-29', 'ita', 'C', NULL, 'chievo', 5, 9),
(200, 'Calello', 'Adrian Danièl ', '1987-05-14', 'arg', 'C', NULL, 'chievo', 5, 14),
(201, 'Dos Santos', '  ', '1984-09-07', 'bra', 'C', NULL, 'chievo', 5, 4),
(202, 'Guana', 'Roberto  ', '1981-01-21', 'ita', 'C', NULL, 'chievo', 5, 11),
(203, 'Guarente', 'Tiberio  ', '1985-11-01', 'ita', 'C', NULL, 'chievo', 5, 23),
(204, 'Hetemaj', 'Perparim  ', '1986-12-12', 'fin', 'C', NULL, 'chievo', 5, 56),
(205, 'Kupisz', 'Tomasz  ', '1990-01-02', 'pol', 'C', NULL, 'chievo', 5, 6),
(206, 'Radovanovic', 'Ivan  ', '1988-08-29', 'srb', 'C', NULL, 'chievo', 5, 8),
(207, 'Rigoni', 'Luca  ', '1984-12-07', 'ita', 'C', NULL, 'chievo', 5, 27),
(208, 'Toskic', 'Idriz  ', '1995-10-12', 'ita', 'C', NULL, 'chievo', 5, 58),
(209, 'Da Silva', 'Victor Matheus ', '1995-01-04', 'bra', 'A', NULL, 'chievo', 5, 95),
(210, 'Lazarevic', 'Dejan  ', '1990-02-15', 'svn', 'A', NULL, 'chievo', 5, 7),
(211, 'Mbaye', 'Maodo Malick ', '1995-11-06', 'sen', 'A', NULL, 'chievo', 5, 24),
(212, 'Obinna', '  ', '1987-03-25', 'nga', 'A', NULL, 'chievo', 5, 10),
(213, 'Paloschi', 'Alberto  ', '1990-01-04', 'ita', 'A', NULL, 'chievo', 5, 43),
(214, 'Paredes', 'Leandro Daniel ', '1994-06-29', 'arg', 'A', NULL, 'chievo', 5, 19),
(215, 'Pellissier', 'Sergio  ', '1979-04-12', 'ita', 'A', NULL, 'chievo', 5, 31),
(216, 'Stoian', 'Adrian  ', '1991-02-11', 'rou', 'A', NULL, 'chievo', 5, 39),
(217, 'Théréau', 'Cyril  ', '1983-04-24', 'fra', 'A', NULL, 'chievo', 5, 77),
(218, 'Troiani', 'Michele  ', '1996-07-21', 'ita', 'A', NULL, 'chievo', 5, 57),
(219, 'Bardini', 'Lorenzo  ', '1996-04-12', 'ita', 'P', NULL, 'fiorentina', 6, 39),
(220, 'Bertolacci', 'Isaia  ', '1996-05-17', 'ita', 'P', NULL, 'fiorentina', 6, 41),
(221, 'Lezzerini', 'Luca  ', '1995-03-24', 'ita', 'P', NULL, 'fiorentina', 6, 24),
(222, 'Lupatelli', 'Cristiano  ', '1978-06-21', 'ita', 'P', NULL, 'fiorentina', 6, 12),
(223, 'Neto', '  ', '1989-07-19', 'bra', 'P', NULL, 'fiorentina', 6, 1),
(224, 'Rosati', 'Antonio  ', '1983-06-26', 'ita', 'P', NULL, 'fiorentina', 6, 25),
(225, 'Compper', 'Marvin Abel ', '1985-06-14', 'ger', 'D', NULL, 'fiorentina', 6, 5),
(226, 'Diakité', 'Modibo  ', '1987-03-02', 'fra', 'D', NULL, 'fiorentina', 6, 3),
(227, 'Empereur', 'Alan Pereira ', '1994-03-10', 'bra', 'D', NULL, 'fiorentina', 6, 36),
(228, 'Gonzalo', 'Rodriguez  ', '1984-04-10', 'arg', 'D', NULL, 'fiorentina', 6, 2),
(229, 'Hegazi', 'Ahmed Elsayed ', '1991-01-25', 'egy', 'D', NULL, 'fiorentina', 6, 6),
(230, 'Madrigali', 'Saverio  ', '1995-01-28', 'ita', 'D', NULL, 'fiorentina', 6, 35),
(231, 'Pasqual', 'Manuel  ', '1982-03-13', 'ita', 'D', NULL, 'fiorentina', 6, 23),
(232, 'Roncaglia', 'Facundo Sebastian ', '1987-02-10', 'arg', 'D', NULL, 'fiorentina', 6, 4),
(233, 'Savic', 'Stefan  ', '1991-01-08', 'mne', 'D', NULL, 'fiorentina', 6, 15),
(234, 'Tomovic', 'Nenad  ', '1987-08-30', 'srb', 'D', NULL, 'fiorentina', 6, 40),
(235, 'Venuti', 'Lorenzo  ', '1995-04-12', 'ita', 'D', NULL, 'fiorentina', 6, 34),
(236, 'Ambrosini', 'Massimo  ', '1977-05-29', 'ita', 'C', NULL, 'fiorentina', 6, 21),
(237, 'Anderson', '  ', '1988-04-13', 'bra', 'C', NULL, 'fiorentina', 6, 88),
(238, 'Aquilani', 'Alberto  ', '1984-07-07', 'ita', 'C', NULL, 'fiorentina', 6, 10),
(239, 'Bakic', 'Marko  ', '1993-11-01', 'mne', 'C', NULL, 'fiorentina', 6, 8),
(240, 'Borja', 'Valero  ', '1985-01-12', 'esp', 'C', NULL, 'fiorentina', 6, 20),
(241, 'Capezzi', 'Leonardo  ', '1995-03-28', 'ita', 'C', NULL, 'fiorentina', 6, 31),
(242, 'Cuadrado', '  ', '1988-05-26', 'col', 'C', NULL, 'fiorentina', 6, 11),
(243, 'Fazzi', 'Nicolò  ', '1995-03-02', 'ita', 'C', NULL, 'fiorentina', 6, 38),
(244, 'Gulin', 'Axel  ', '1995-07-19', 'ita', 'C', NULL, 'fiorentina', 6, 37),
(245, 'Ilicic', 'Josip  ', '1988-01-29', 'svn', 'C', NULL, 'fiorentina', 6, 72),
(246, 'Joaquín', '  ', '1981-07-21', 'esp', 'C', NULL, 'fiorentina', 6, 17),
(247, 'Mati', 'Fernandez  ', '1986-05-15', 'chi', 'C', NULL, 'fiorentina', 6, 14),
(248, 'Matos', '  ', '1993-02-27', 'bra', 'C', NULL, 'fiorentina', 6, 30),
(249, 'Pizarro', 'Cortes David Marcelo', '1979-09-11', 'chi', 'C', NULL, 'fiorentina', 6, 7),
(250, 'Vargas', '  ', '1983-10-05', 'per', 'C', NULL, 'fiorentina', 6, 66),
(251, 'Wolski', 'Rafal  ', '1992-11-10', 'pol', 'C', NULL, 'fiorentina', 6, 27),
(252, 'Gomez', 'Garcia Mario ', '1985-07-10', 'ger', 'A', NULL, 'fiorentina', 6, 33),
(253, 'Matri', 'Alessandro  ', '1984-08-19', 'ita', 'A', NULL, 'fiorentina', 6, 32),
(254, 'Rebic', 'Ante  ', '1993-09-21', 'cro', 'A', NULL, 'fiorentina', 6, 9),
(255, 'Rossi', 'Giuseppe  ', '1987-02-01', 'ita', 'A', NULL, 'fiorentina', 6, 49),
(256, 'Albertoni', 'Marco  ', '1995-08-05', 'ita', 'P', NULL, 'genoa', 7, 0),
(257, 'Bizzarri', 'Albano Benjamin ', '1977-11-09', 'arg', 'P', NULL, 'genoa', 7, 53),
(258, 'Donnarumma', 'Antonio  ', '1990-07-07', 'ita', 'P', NULL, 'genoa', 7, 32),
(259, 'Perin', 'Mattia  ', '1992-11-10', 'ita', 'P', NULL, 'genoa', 7, 1),
(260, 'Antonelli', 'Luca  ', '1987-02-11', 'ita', 'D', NULL, 'genoa', 7, 13),
(261, 'Antonini', 'Luca  ', '1982-08-04', 'ita', 'D', NULL, 'genoa', 7, 3),
(262, 'Blaze', 'Allan Junior ', '1994-06-24', 'fra', 'D', NULL, 'genoa', 7, 94),
(263, 'Burdisso', 'Nicolas Andrés ', '1981-04-12', 'arg', 'D', NULL, 'genoa', 7, 8),
(264, 'De Ceglie', 'Paolo  ', '1986-09-17', 'ita', 'D', NULL, 'genoa', 7, 29),
(265, 'De Maio', 'Sébastien  ', '1987-03-05', 'fra', 'D', NULL, 'genoa', 7, 4),
(266, 'Gamberini', 'Alessandro  ', '1981-08-27', 'ita', 'D', NULL, 'genoa', 7, 5),
(267, 'Marchese', 'Giovanni  ', '1984-10-17', 'ita', 'D', NULL, 'genoa', 7, 15),
(268, 'Motta', 'Marco  ', '1986-05-14', 'ita', 'D', NULL, 'genoa', 7, 21),
(269, 'Portanova', 'Daniele  ', '1978-12-17', 'ita', 'D', NULL, 'genoa', 7, 90),
(270, 'Sokoli', 'Paulo  ', '1995-03-29', 'alb', 'D', NULL, 'genoa', 7, 44),
(271, 'Vrsaljko', 'Sime  ', '1992-01-10', 'cro', 'D', NULL, 'genoa', 7, 20),
(272, 'Bertolacci', 'Andrea  ', '1991-01-11', 'ita', 'C', NULL, 'genoa', 7, 91),
(273, 'Cabral', '  ', '1988-10-22', 'sui', 'C', NULL, 'genoa', 7, 79),
(274, 'Cofie', 'Isaac  ', '1991-09-20', 'gha', 'C', NULL, 'genoa', 7, 14),
(275, 'Fetfatzidis', 'Giannis  ', '1990-12-21', 'gre', 'C', NULL, 'genoa', 7, 18),
(276, 'Kucka', 'Juraj  ', '1987-02-26', 'svk', 'C', NULL, 'genoa', 7, 33),
(277, 'Matuzalem', '  ', '1980-06-10', 'bra', 'C', NULL, 'genoa', 7, 27),
(278, 'Rafati', 'Jami  ', '1994-04-26', 'ita', 'C', NULL, 'genoa', 7, 19),
(279, 'Sturaro', 'Stefano  ', '1993-03-09', 'ita', 'C', NULL, 'genoa', 7, 69),
(280, 'Calaiò', 'Emanuele  ', '1982-01-08', 'ita', 'A', NULL, 'genoa', 7, 16),
(281, 'Centurión', 'Adrián Ricardo ', '1993-01-19', 'arg', 'A', NULL, 'genoa', 7, 26),
(282, 'Di Marco', 'Francesco  ', '1995-07-28', 'ita', 'A', NULL, 'genoa', 7, 96),
(283, 'Gilardino', 'Alberto  ', '1982-07-05', 'ita', 'A', NULL, 'genoa', 7, 11),
(284, 'Konaté', 'Pape Moussa ', '1993-04-03', 'sen', 'A', NULL, 'genoa', 7, 77),
(285, 'Sculli', 'Giuseppe  ', '1981-03-23', 'ita', 'A', NULL, 'genoa', 7, 10),
(286, 'Velocci', 'Tiberio  ', '1995-07-23', 'ita', 'A', NULL, 'genoa', 7, 23),
(287, 'Borra', 'Daniele  ', '1995-07-28', 'ita', 'P', NULL, 'verona', 8, 98),
(288, 'Mihaylov', 'Nikolay Borislavov ', '1988-06-28', 'bul', 'P', NULL, 'verona', 8, 31),
(289, 'Nicolas', '  ', '1988-04-12', 'bra', 'P', NULL, 'verona', 8, 12),
(290, 'Rafael', '  ', '1982-03-03', 'bra', 'P', NULL, 'verona', 8, 1),
(291, 'Agostini', 'Alessandro  ', '1979-07-23', 'ita', 'D', NULL, 'verona', 8, 33),
(292, 'Albertazzi', 'Michelangelo  ', '1991-01-07', 'ita', 'D', NULL, 'verona', 8, 3),
(293, 'Cacciatore', 'Fabrizio  ', '1986-10-08', 'ita', 'D', NULL, 'verona', 8, 29),
(294, 'Gonzalez', 'Alejandro Damian ', '1988-03-23', 'uru', 'D', NULL, 'verona', 8, 23),
(295, 'Maietta', 'Domenico  ', '1982-08-03', 'ita', 'D', NULL, 'verona', 8, 22),
(296, 'Marques', 'Pinto Rafael ', '1983-09-21', 'bra', 'D', NULL, 'verona', 8, 25),
(297, 'Moras', 'Vangelis  ', '1981-08-26', 'gre', 'D', NULL, 'verona', 8, 18),
(298, 'Pillud', 'Ivan Alexis ', '1986-04-24', 'arg', 'D', NULL, 'verona', 8, 4),
(299, 'Cirigliano', 'Ezequiel Adrian ', '1992-01-24', 'arg', 'C', NULL, 'verona', 8, 14),
(300, 'Donadel', 'Marco  ', '1983-04-21', 'ita', 'C', NULL, 'verona', 8, 30),
(301, 'Donati', 'Massimo  ', '1981-03-26', 'ita', 'C', NULL, 'verona', 8, 5),
(302, 'Hallfredsson', 'Emil  ', '1984-06-29', 'isl', 'C', NULL, 'verona', 8, 10),
(303, 'Jankovic', 'Bosko  ', '1984-03-01', 'srb', 'C', NULL, 'verona', 8, 11),
(304, 'Marquinho', '  ', '1986-07-03', 'bra', 'C', NULL, 'verona', 8, 7),
(305, 'Martinho', '  ', '1988-04-15', 'bra', 'C', NULL, 'verona', 8, 6),
(306, 'Rabusic', 'Michal  ', '1989-09-17', 'cze', 'C', NULL, 'verona', 8, 19),
(307, 'Romulo', '  ', '1987-05-22', 'bra', 'C', NULL, 'verona', 8, 2),
(308, 'Sala', 'Jacopo  ', '1991-12-05', 'ita', 'C', NULL, 'verona', 8, 26),
(309, 'Cacia', 'Daniele  ', '1983-08-23', 'ita', 'A', NULL, 'verona', 8, 8),
(310, 'Donsah', 'Godfred  ', '1996-06-07', NULL, 'A', NULL, 'verona', 8, 17),
(311, 'Gomez', '  ', '1985-05-20', 'arg', 'A', NULL, 'verona', 8, 21),
(312, 'Iturbe', '  ', '1993-06-04', 'arg', 'A', NULL, 'verona', 8, 15),
(313, 'Toni', 'Luca  ', '1977-05-26', 'ita', 'A', NULL, 'verona', 8, 9),
(314, 'Carrizo', 'Juan Pablo ', '1984-05-06', 'arg', 'P', NULL, 'inter', 9, 30),
(315, 'Castellazzi', 'Luca  ', '1975-07-19', 'ita', 'P', NULL, 'inter', 9, 12),
(316, 'Handanovic', 'Samir  ', '1984-07-14', 'svn', 'P', NULL, 'inter', 9, 1),
(317, 'Maniero', 'Luca  ', '1995-06-12', 'ita', 'P', NULL, 'inter', 9, 45),
(318, 'Andreolli', 'Marco  ', '1986-06-10', 'ita', 'D', NULL, 'inter', 9, 6),
(319, 'Campagnaro', 'Hugo Armando ', '1980-06-27', 'arg', 'D', NULL, 'inter', 9, 14),
(320, 'Chivu', 'Cristian  ', '1980-10-26', 'rou', 'D', NULL, 'inter', 9, 26),
(321, 'D''Ambrosio', 'Danilo  ', '1988-09-09', 'ita', 'D', NULL, 'inter', 9, 33),
(322, 'Dalla Riva', ' Stefano ', '1995-04-01', 'ita', 'D', NULL, 'inter', 9, 95),
(323, 'Eguelfi', 'Fabio  ', '1995-02-15', 'ita', 'D', NULL, 'inter', 9, 59),
(324, 'Jonathan', '  ', '1986-02-27', 'bra', 'D', NULL, 'inter', 9, 2),
(325, 'Juan', 'Jesus  ', '1991-06-10', 'bra', 'D', NULL, 'inter', 9, 5),
(326, 'Nagatomo', 'Yuto  ', '1986-09-12', 'jpn', 'D', NULL, 'inter', 9, 55),
(327, 'Paramatti', 'Lorenzo  ', '1995-02-02', 'ita', 'D', NULL, 'inter', 9, 43),
(328, 'Ranocchia', 'Andrea  ', '1988-02-16', 'ita', 'D', NULL, 'inter', 9, 23),
(329, 'Rolando', '  ', '1985-08-31', 'por', 'D', NULL, 'inter', 9, 35),
(330, 'Samuel', 'Walter Adrian ', '1978-03-23', 'arg', 'D', NULL, 'inter', 9, 25),
(331, 'Wallace', '  ', '1994-05-01', 'bra', 'D', NULL, 'inter', 9, 18),
(332, 'Bonazzoli', 'Federico  ', '1997-05-21', 'ita', 'C', NULL, 'inter', 9, 97),
(333, 'Cambiasso', 'Esteban Matías ', '1980-08-18', 'arg', 'C', NULL, 'inter', 9, 19),
(334, 'Capello', 'Alessandro  ', '1995-12-12', 'ita', 'C', NULL, 'inter', 9, 47),
(335, 'Guarin', '  ', '1986-06-30', 'col', 'C', NULL, 'inter', 9, 13),
(336, 'Hernanes', '  ', '1985-05-29', 'bra', 'C', NULL, 'inter', 9, 88),
(337, 'Kovacic', 'Mateo  ', '1994-05-06', 'cro', 'C', NULL, 'inter', 9, 10),
(338, 'Kuzmanovic', 'Zdravko  ', '1987-09-22', 'srb', 'C', NULL, 'inter', 9, 17),
(339, 'Mariga', '  ', '1987-04-04', 'ken', 'C', NULL, 'inter', 9, 77),
(340, 'Mudingayi', 'Gaby  ', '1981-10-01', 'bel', 'C', NULL, 'inter', 9, 16),
(341, 'Puscas', 'George Alexandru ', '1996-04-08', 'rou', 'C', NULL, 'inter', 9, 28),
(342, 'Taider', 'Saphir Sliti ', '1992-02-29', 'alg', 'C', NULL, 'inter', 9, 21),
(343, 'Zanetti', 'Javier  ', '1973-08-10', 'arg', 'C', NULL, 'inter', 9, 4),
(344, 'Álvarez', 'Ricardo Gabriel ', '1988-04-12', 'arg', 'C', NULL, 'inter', 9, 11),
(345, 'Acampora', 'Gennaro  ', '1994-03-29', 'ita', 'A', NULL, 'inter', 9, 50),
(346, 'Botta', '  ', '1990-01-31', 'arg', 'A', NULL, 'inter', 9, 20),
(347, 'Donkor', 'Isaac Opoku ', '1995-08-15', 'gha', 'A', NULL, 'inter', 9, 54),
(348, 'Icardi', 'Mauro Emanuel ', '1993-02-19', 'arg', 'A', NULL, 'inter', 9, 9),
(349, 'Milito', 'Diego Alberto ', '1979-06-12', 'arg', 'A', NULL, 'inter', 9, 22),
(350, 'Mira', 'Andrea  ', '1995-01-17', 'ita', 'A', NULL, 'inter', 9, 34),
(351, 'Palacio', 'Rodrigo  ', '1982-02-05', 'arg', 'A', NULL, 'inter', 9, 8),
(352, 'Buffon', 'Gianluigi  ', '1978-01-28', 'ita', 'P', NULL, 'juventus', 10, 1),
(353, 'Citti', 'Leonardo  ', '1995-07-14', 'ita', 'P', NULL, 'juventus', 10, 50),
(354, 'Rubinho', '  ', '1982-08-04', 'bra', 'P', NULL, 'juventus', 10, 34),
(355, 'Storari', 'Marco  ', '1977-01-07', 'ita', 'P', NULL, 'juventus', 10, 30),
(356, 'Vannucchi', 'Gianmarco  ', '1995-07-30', 'ita', 'P', NULL, 'juventus', 10, 36),
(357, 'Barzagli', 'Andrea  ', '1981-05-08', 'ita', 'D', NULL, 'juventus', 10, 15),
(358, 'Bonucci', 'Leonardo  ', '1987-05-01', 'ita', 'D', NULL, 'juventus', 10, 19),
(359, 'Caceres', '  ', '1987-04-07', 'uru', 'D', NULL, 'juventus', 10, 4),
(360, 'Chiellini', 'Giorgio  ', '1984-08-14', 'ita', 'D', NULL, 'juventus', 10, 3),
(361, 'Lichtsteiner', 'Stephan  ', '1984-01-16', 'sui', 'D', NULL, 'juventus', 10, 26),
(362, 'Ogbonna', '  ', '1988-05-23', 'ita', 'D', NULL, 'juventus', 10, 5),
(363, 'Peluso', 'Federico  ', '1984-01-20', 'ita', 'D', NULL, 'juventus', 10, 13),
(364, 'Romagna', 'Filippo  ', '1997-05-26', 'ita', 'D', NULL, 'juventus', 10, 0),
(365, 'Untersee', 'Joel  ', '1994-02-11', 'sui', 'D', NULL, 'juventus', 10, 35),
(366, 'Asamoah', 'Kwadwo  ', '1988-12-09', 'gha', 'C', NULL, 'juventus', 10, 22),
(367, 'Bnou', 'Marzouk Younes ', '1996-03-02', 'mar', 'C', NULL, 'juventus', 10, 40),
(368, 'Isla', 'Mauricio Anibal ', '1988-06-12', 'chi', 'C', NULL, 'juventus', 10, 33),
(369, 'Marchisio', 'Claudio  ', '1986-01-19', 'ita', 'C', NULL, 'juventus', 10, 8),
(370, 'Mattiello', 'Federico  ', '1995-07-14', 'ita', 'C', NULL, 'juventus', 10, 38),
(371, 'Padoin', 'Simone  ', '1984-03-18', 'ita', 'C', NULL, 'juventus', 10, 20),
(372, 'Pepe', 'Simone  ', '1983-08-30', 'ita', 'C', NULL, 'juventus', 10, 7),
(373, 'Pirlo', 'Andrea  ', '1979-05-19', 'ita', 'C', NULL, 'juventus', 10, 21),
(374, 'Pogba', 'Paul Labile ', '1993-03-15', 'fra', 'C', NULL, 'juventus', 10, 6),
(375, 'Vidal', '  ', '1987-05-22', 'chi', 'C', NULL, 'juventus', 10, 23),
(376, 'Gerbaudo', 'Matteo  ', '1995-05-10', 'ita', 'A', NULL, 'juventus', 10, 42),
(377, 'Giovinco', 'Sebastian  ', '1987-01-26', 'ita', 'A', NULL, 'juventus', 10, 12),
(378, 'Llorente', '  ', '1985-02-26', 'esp', 'A', NULL, 'juventus', 10, 14),
(379, 'Osvaldo', 'Pablo Daniel ', '1986-01-12', 'ita', 'A', NULL, 'juventus', 10, 18),
(380, 'Quagliarella', 'Fabio  ', '1983-01-31', 'ita', 'A', NULL, 'juventus', 10, 27),
(381, 'Slivka', 'Vykintas  ', '1995-04-29', 'ltu', 'A', NULL, 'juventus', 10, 39),
(382, 'Tevez', 'Carlos Alberto ', '1984-02-05', 'arg', 'A', NULL, 'juventus', 10, 10),
(383, 'Vucinic', 'Mirko  ', '1983-10-01', 'mne', 'A', NULL, 'juventus', 10, 9),
(384, 'Berisha', 'Etrit  ', '1989-03-10', 'alb', 'P', NULL, 'lazio', 11, 1),
(385, 'De Angelis', 'Filippo  ', '1996-02-21', 'ita', 'P', NULL, 'lazio', 11, 47),
(386, 'Guerrieri', 'Guido  ', '1996-02-25', 'ita', 'P', NULL, 'lazio', 11, 55),
(387, 'Marchetti', 'Federico  ', '1983-02-07', 'ita', 'P', NULL, 'lazio', 11, 22),
(388, 'Strakosha', 'Thomas  ', '1995-03-19', 'alb', 'P', NULL, 'lazio', 11, 95),
(389, 'Biava', 'Giuseppe  ', '1977-05-08', 'ita', 'D', NULL, 'lazio', 11, 20),
(390, 'Cana', 'Lorik  ', '1983-07-27', 'alb', 'D', NULL, 'lazio', 11, 27),
(391, 'Cavanda', 'Luis Pedro ', '1991-01-02', 'bel', 'D', NULL, 'lazio', 11, 39),
(392, 'Ciani', 'Michael  ', '1984-04-06', 'fra', 'D', NULL, 'lazio', 11, 2),
(393, 'Dias', '  ', '1979-05-15', 'bra', 'D', NULL, 'lazio', 11, 3),
(394, 'Elez', 'Josip  ', '1994-04-25', 'cro', 'D', NULL, 'lazio', 11, 16),
(395, 'Filippini', 'Lorenzo  ', '1995-07-28', 'ita', 'D', NULL, 'lazio', 11, 48),
(396, 'Konko', 'Abdoulay  ', '1984-03-09', 'fra', 'D', NULL, 'lazio', 11, 29),
(397, 'Mattia', 'Simone  ', '1996-01-19', 'ita', 'D', NULL, 'lazio', 11, 50),
(398, 'Novaretti', 'Diego Martin ', '1985-05-09', 'arg', 'D', NULL, 'lazio', 11, 85),
(399, 'Paterni', 'Nico  ', '1995-09-16', 'ita', 'D', NULL, 'lazio', 11, 56),
(400, 'Pereirinha', '  ', '1988-03-02', 'por', 'D', NULL, 'lazio', 11, 17),
(401, 'Perocchi', 'Andrea  ', '1996-08-05', 'ita', 'D', NULL, 'lazio', 11, 57),
(402, 'Pollace', 'Gianluca  ', '1995-12-25', 'ita', 'D', NULL, 'lazio', 11, 58),
(403, 'Radu', 'Stefan Daniel ', '1986-10-22', 'rou', 'D', NULL, 'lazio', 11, 26),
(404, 'Serpieri', 'Riccardo  ', '1994-02-15', 'ita', 'D', NULL, 'lazio', 11, 25),
(405, 'Antic', 'Milos  ', '1994-10-28', 'srb', 'C', NULL, 'lazio', 11, 94),
(406, 'Biglia', 'Lucas Rodrigo ', '1986-01-30', 'arg', 'C', NULL, 'lazio', 11, 5),
(407, 'Candreva', 'Antonio  ', '1987-02-28', 'ita', 'C', NULL, 'lazio', 11, 87),
(408, 'Crecco', 'Luca  ', '1995-09-06', 'ita', 'C', NULL, 'lazio', 11, 4),
(409, 'Ederson', '  ', '1986-01-13', 'bra', 'C', NULL, 'lazio', 11, 10),
(410, 'Felipe', 'Anderson  ', '1993-04-15', 'bra', 'C', NULL, 'lazio', 11, 7),
(411, 'Gonzalez', '  ', '1984-10-29', 'uru', 'C', NULL, 'lazio', 11, 15),
(412, 'Kakuta', 'Gaël  ', '1991-06-21', 'fra', 'C', NULL, 'lazio', 11, 21),
(413, 'Ledesma', 'Cristian Daniel ', '1982-09-24', 'ita', 'C', NULL, 'lazio', 11, 24),
(414, 'Lombardi', 'Cristiano  ', '1995-08-19', 'ita', 'C', NULL, 'lazio', 11, 49),
(415, 'Lulic', 'Senad  ', '1986-01-18', 'bih', 'C', NULL, 'lazio', 11, 19),
(416, 'Mauri', 'Stefano  ', '1980-01-08', 'ita', 'C', NULL, 'lazio', 11, 6),
(417, 'Milani', 'Simone  ', '1997-04-09', 'ita', 'C', NULL, 'lazio', 11, 51),
(418, 'Onazi', 'Eddy Ogenyi ', '1992-12-25', 'nga', 'C', NULL, 'lazio', 11, 23),
(419, 'Palombi', 'Simone  ', '1996-04-23', 'ita', 'C', NULL, 'lazio', 11, 54),
(420, 'Tounkara', 'Mamadou  ', '1996-01-19', 'esp', 'C', NULL, 'lazio', 11, 45),
(421, 'Alfaro', '  ', '1988-04-28', 'uru', 'A', NULL, 'lazio', 11, 30),
(422, 'Hélder', 'Postiga  ', '1982-08-02', 'por', 'A', NULL, 'lazio', 11, 46),
(423, 'Keita', '  ', '1995-03-08', 'esp', 'A', NULL, 'lazio', 11, 14),
(424, 'Klose', 'Miroslav  ', '1978-06-09', 'ger', 'A', NULL, 'lazio', 11, 11),
(425, 'Minala', 'Joseph Marie ', '1996-08-24', 'cmr', 'A', NULL, 'lazio', 11, 58),
(426, 'Murgia', 'Alessandro  ', '1996-08-09', 'ita', 'A', NULL, 'lazio', 11, 52),
(427, 'Pace', 'Lorenzo  ', '1995-03-10', 'ita', 'A', NULL, 'lazio', 11, 53),
(428, 'Perea', 'Brayan  ', '1993-02-25', 'col', 'A', NULL, 'lazio', 11, 34),
(429, 'Silvagni', 'Lorenzo  ', '1995-01-23', 'ita', 'A', NULL, 'lazio', 11, 59),
(430, 'Aldegani', 'Gabriele  ', '1976-05-10', 'ita', 'P', NULL, 'livorno', 12, 37),
(431, 'Anania', 'Luca  ', '1980-06-21', 'ita', 'P', NULL, 'livorno', 12, 22),
(432, 'Bardi', 'Francesco  ', '1992-01-18', 'ita', 'P', NULL, 'livorno', 12, 1),
(433, 'Cipriani', 'Matteo  ', '1996-01-01', 'ita', 'P', NULL, 'livorno', 12, 96),
(434, 'Castellini', 'Paolo  ', '1979-03-25', 'ita', 'D', NULL, 'livorno', 12, 0),
(435, 'Ceccherini', 'Federico  ', '1992-05-11', 'ita', 'D', NULL, 'livorno', 12, 17),
(436, 'Coda', 'Andrea  ', '1985-04-25', 'ita', 'D', NULL, 'livorno', 12, 85),
(437, 'Emerson', '  ', '1980-08-16', 'bra', 'D', NULL, 'livorno', 12, 23),
(438, 'Gemiti', 'Giuseppe  ', '1981-05-03', 'ger', 'D', NULL, 'livorno', 12, 3),
(439, 'Mbaye', 'Ibrahima  ', '1994-11-19', 'sen', 'D', NULL, 'livorno', 12, 15),
(440, 'Mesbah', 'Djamel  ', '1984-10-09', 'alg', 'D', NULL, 'livorno', 12, 11),
(441, 'Piccini', 'Cristiano  ', '1992-09-26', 'ita', 'D', NULL, 'livorno', 12, 2),
(442, 'Rinaudo', 'Leandro  ', '1983-05-09', 'ita', 'D', NULL, 'livorno', 12, 77),
(443, 'Tiritiello', 'Andrea  ', '1995-03-28', 'ita', 'D', NULL, 'livorno', 12, 95),
(444, 'Valentini', 'Nahuel  ', '1988-09-19', 'arg', 'D', NULL, 'livorno', 12, 33),
(445, 'Bartolini', 'Daniele  ', '1995-03-05', 'ita', 'C', NULL, 'livorno', 12, 16),
(446, 'Benassi', 'Marco  ', '1994-09-08', 'ita', 'C', NULL, 'livorno', 12, 24),
(447, 'Biagianti', 'Marco  ', '1984-04-19', 'ita', 'C', NULL, 'livorno', 12, 27),
(448, 'Duncan', 'Joseph Alfred ', '1993-03-10', 'gha', 'C', NULL, 'livorno', 12, 41),
(449, 'Greco', 'Leandro  ', '1986-07-19', 'ita', 'C', NULL, 'livorno', 12, 19),
(450, 'Luci', 'Andrea  ', '1985-03-30', 'ita', 'C', NULL, 'livorno', 12, 10),
(451, 'Mosquera', '  ', '1991-02-17', 'col', 'C', NULL, 'livorno', 12, 14),
(452, 'Belfodil', 'Ishak  ', '1992-01-12', 'alg', 'A', NULL, 'livorno', 12, 21),
(453, 'Biasci', 'Tommaso  ', '1994-11-10', 'ita', 'A', NULL, 'livorno', 12, 32),
(454, 'Borja', '  ', '1993-01-26', 'col', 'A', NULL, 'livorno', 12, 29),
(455, 'Emeghara', 'Innocent  ', '1989-05-27', 'sui', 'A', NULL, 'livorno', 12, 20),
(456, 'Paulinho', '  ', '1986-01-10', 'bra', 'A', NULL, 'livorno', 12, 9),
(457, 'Siligardi', 'Luca  ', '1988-01-26', 'ita', 'A', NULL, 'livorno', 12, 26),
(458, 'Abbiati', 'Christian  ', '1977-07-08', 'ita', 'P', NULL, 'milan', 13, 32),
(459, 'Amelia', 'Marco  ', '1982-04-02', 'ita', 'P', NULL, 'milan', 13, 1),
(460, 'Coppola', 'Ferdinando  ', '1978-06-10', 'ita', 'P', NULL, 'milan', 13, 35),
(461, 'Ferrari', 'Lorenzo  ', '1996-03-09', 'ita', 'P', NULL, 'milan', 13, 61),
(462, 'Gabriel', '  ', '1992-09-27', 'bra', 'P', NULL, 'milan', 13, 59),
(463, 'Abate', 'Ignazio  ', '1986-11-12', 'ita', 'D', NULL, 'milan', 13, 20),
(464, 'Bonera', 'Daniele  ', '1981-05-31', 'ita', 'D', NULL, 'milan', 13, 25),
(465, 'Constant', 'Kevin  ', '1987-05-10', 'gui', 'D', NULL, 'milan', 13, 21),
(466, 'De Sciglio', 'Mattia  ', '1992-10-20', 'ita', 'D', NULL, 'milan', 13, 2),
(467, 'Iotti', 'Luca  ', '1995-11-09', 'ita', 'D', NULL, 'milan', 13, 36),
(468, 'Mexès', 'Philippe  ', '1982-03-30', 'fra', 'D', NULL, 'milan', 13, 5),
(469, 'Pinato', 'Marco  ', '1995-01-09', 'ita', 'D', NULL, 'milan', 13, 38),
(470, 'Rami', 'Adil  ', '1985-12-27', 'fra', 'D', NULL, 'milan', 13, 13),
(471, 'Silvestre', 'Matias Augustin ', '1984-09-25', 'arg', 'D', NULL, 'milan', 13, 26),
(472, 'Zaccardo', 'Cristian  ', '1981-12-21', 'ita', 'D', NULL, 'milan', 13, 81),
(473, 'Zapata', 'Cristian  ', '1986-09-30', 'col', 'D', NULL, 'milan', 13, 17),
(474, 'Benedicic', 'Zan  ', '1995-10-03', 'svn', 'C', NULL, 'milan', 13, 31),
(475, 'Birsa', 'Valter  ', '1986-08-07', 'svn', 'C', NULL, 'milan', 13, 14),
(476, 'Cristante', 'Bryan  ', '1995-03-03', 'ita', 'C', NULL, 'milan', 13, 24),
(477, 'De Jong', 'Nigel  ', '1984-11-30', 'ned', 'C', NULL, 'milan', 13, 34),
(478, 'Di Molfetta', 'Davide  ', '1996-06-23', 'ita', 'C', NULL, 'milan', 13, 39),
(479, 'Emanuelson', 'Urby  ', '1986-06-16', 'ned', 'C', NULL, 'milan', 13, 28),
(480, 'Essien', 'Michael  ', '1982-12-03', 'gha', 'C', NULL, 'milan', 13, 15),
(481, 'Honda', 'Keisuke  ', '1986-06-13', 'jpn', 'C', NULL, 'milan', 13, 10),
(482, 'Montolivo', 'Riccardo  ', '1985-01-18', 'ita', 'C', NULL, 'milan', 13, 18),
(483, 'Muntari', 'Sulley Ali ', '1984-08-27', 'gha', 'C', NULL, 'milan', 13, 4),
(484, 'Poli', 'Andrea  ', '1989-09-29', 'ita', 'C', NULL, 'milan', 13, 16),
(485, 'Saponara', 'Riccardo  ', '1991-12-21', 'ita', 'C', NULL, 'milan', 13, 8),
(486, 'Taarabt', 'Adel  ', '1989-05-24', 'mar', 'C', NULL, 'milan', 13, 23),
(487, 'Balotelli', 'Mario  ', '1990-08-12', 'ita', 'A', NULL, 'milan', 13, 45),
(488, 'El  Shaarawy', 'Stephan  ', '1992-10-27', 'ita', 'A', NULL, 'milan', 13, 92),
(489, 'Kaká', '  ', '1982-04-22', 'bra', 'A', NULL, 'milan', 13, 22),
(490, 'Mastalli', 'Alessandro  ', '1996-02-07', 'ita', 'A', NULL, 'milan', 13, 41),
(491, 'Modic', 'Andrej  ', '1996-03-07', 'bih', 'A', NULL, 'milan', 13, 42),
(492, 'Pazzini', 'Giampaolo  ', '1984-08-02', 'ita', 'A', NULL, 'milan', 13, 11),
(493, 'Petagna', 'Andrea  ', '1995-06-30', 'ita', 'A', NULL, 'milan', 13, 37),
(494, 'Piccinocchi', 'Mario  ', '1995-02-21', 'ita', 'A', NULL, 'milan', 13, 40),
(495, 'Robinho', '  ', '1984-01-25', 'bra', 'A', NULL, 'milan', 13, 7),
(496, 'Colombo', 'Roberto  ', '1975-08-24', 'ita', 'P', NULL, 'napoli', 14, 15),
(497, 'Contini', 'Baranovsky Nikita ', '1996-05-21', 'ukr', 'P', NULL, 'napoli', 14, 12),
(498, 'Doblas', 'Santana Antonio David', '1980-08-05', 'esp', 'P', NULL, 'napoli', 14, 80),
(499, 'Rafael', '  ', '1990-05-20', 'bra', 'P', NULL, 'napoli', 14, 1),
(500, 'Reina', 'José Manuel ', '1982-08-31', 'esp', 'P', NULL, 'napoli', 14, 25),
(501, 'Albiol', 'Raul  ', '1985-09-04', 'esp', 'D', NULL, 'napoli', 14, 33),
(502, 'Britos', 'Miguel Angel ', '1985-07-17', 'uru', 'D', NULL, 'napoli', 14, 5),
(503, 'Fernandez', 'Federico  ', '1989-02-21', 'arg', 'D', NULL, 'napoli', 14, 21),
(504, 'Ghoulam', 'Faouzi  ', '1991-02-01', 'alg', 'D', NULL, 'napoli', 14, 31),
(505, 'Girardi', 'Michele  ', '1996-08-04', 'ita', 'D', NULL, 'napoli', 14, 43),
(506, 'Guardiglio', 'Vincenzo  ', '1996-08-02', 'ita', 'D', NULL, 'napoli', 14, 44),
(507, 'Henrique', '  ', '1986-10-14', 'bra', 'D', NULL, 'napoli', 14, 4),
(508, 'Maggio', 'Christian  ', '1982-02-11', 'ita', 'D', NULL, 'napoli', 14, 11),
(509, 'Mangiapia', 'Gianluigi  ', '1996-07-06', 'ita', 'D', NULL, 'napoli', 14, 45),
(510, 'Mesto', 'Giandomenico  ', '1982-05-25', 'ita', 'D', NULL, 'napoli', 14, 16),
(511, 'Palumbo', 'Giorgio  ', '1997-01-16', 'ita', 'D', NULL, 'napoli', 14, 46),
(512, 'Réveillère', 'Anthony  ', '1979-11-10', 'fra', 'D', NULL, 'napoli', 14, 2),
(513, 'Supino', 'Marco  ', '1996-06-21', 'ita', 'D', NULL, 'napoli', 14, 48),
(514, 'Uvini', 'Bruno  ', '1991-06-03', 'bra', 'D', NULL, 'napoli', 14, 3),
(515, 'Zuñiga', '  ', '1985-12-14', 'col', 'D', NULL, 'napoli', 14, 18),
(516, 'Bariti', 'Davide  ', '1991-07-07', 'ita', 'C', NULL, 'napoli', 14, 13),
(517, 'Behrami', 'Valon  ', '1985-04-19', 'sui', 'C', NULL, 'napoli', 14, 85),
(518, 'Di Fiore', 'Alessandro  ', '1996-04-09', 'ita', 'C', NULL, 'napoli', 14, 41),
(519, 'Dzemaili', 'Blerim  ', '1986-04-12', 'sui', 'C', NULL, 'napoli', 14, 20),
(520, 'Hamsik', 'Marek  ', '1987-07-27', 'svk', 'C', NULL, 'napoli', 14, 17),
(521, 'Inler', 'Gökhan  ', '1984-06-27', 'sui', 'C', NULL, 'napoli', 14, 88),
(522, 'Jorginho', '  ', '1991-12-20', 'ita', 'C', NULL, 'napoli', 14, 8),
(523, 'Radosevic', 'Josip  ', '1994-04-03', 'cro', 'C', NULL, 'napoli', 14, 22),
(524, 'Tutino', 'Gennaro  ', '1996-08-20', 'ita', 'C', NULL, 'napoli', 14, 49),
(525, 'Bifulco', 'Alfredo  ', '1997-01-19', 'ita', 'A', NULL, 'napoli', 14, 40),
(526, 'Callejón', 'José María ', '1987-02-11', 'esp', 'A', NULL, 'napoli', 14, 7),
(527, 'Gaetano', 'Felice  ', '1996-01-08', 'ita', 'A', NULL, 'napoli', 14, 42),
(528, 'Higuaín', 'Gonzalo  ', '1987-12-10', 'arg', 'A', NULL, 'napoli', 14, 9),
(529, 'Insigne', 'Lorenzo  ', '1991-06-04', 'ita', 'A', NULL, 'napoli', 14, 24),
(530, 'Mertens', 'Dries  ', '1987-05-06', 'bel', 'A', NULL, 'napoli', 14, 14),
(531, 'Palmiero', 'Luca  ', '1996-05-01', 'ita', 'A', NULL, 'napoli', 14, 96),
(532, 'Pandev', 'Goran  ', '1983-07-27', 'mkd', 'A', NULL, 'napoli', 14, 19),
(533, 'Prezioso', 'Mario  ', '1996-04-15', 'ita', 'A', NULL, 'napoli', 14, 47),
(534, 'Romano', 'Antonio  ', '1996-03-23', 'ita', 'A', NULL, 'napoli', 14, 60),
(535, 'Zapata', 'Duvan Esteban ', '1991-04-01', 'col', 'A', NULL, 'napoli', 14, 91),
(536, 'Bajza', 'Pavol  ', '1991-09-04', 'svk', 'P', NULL, 'parma', 15, 91),
(537, 'Coric', 'Marijan  ', '1995-02-06', 'cro', 'P', NULL, 'parma', 15, 95),
(538, 'Mirante', 'Antonio  ', '1983-07-08', 'ita', 'P', NULL, 'parma', 15, 83),
(539, 'Pavarini', 'Nicola  ', '1974-02-24', 'ita', 'P', NULL, 'parma', 15, 1),
(540, 'Rossetto', 'Diego  ', '1996-01-19', 'ita', 'P', NULL, 'parma', 15, 55),
(541, 'Cassani', 'Mattia  ', '1983-08-26', 'ita', 'D', NULL, 'parma', 15, 2),
(542, 'Felipe', '  ', '1984-07-31', 'bra', 'D', NULL, 'parma', 15, 19),
(543, 'Lucarelli', 'Alessandro  ', '1977-07-22', 'ita', 'D', NULL, 'parma', 15, 6),
(544, 'Molinaro', 'Cristian  ', '1983-07-30', 'ita', 'D', NULL, 'parma', 15, 3),
(545, 'Paletta', 'Gabriel Alejandro ', '1986-02-15', 'ita', 'D', NULL, 'parma', 15, 29),
(546, 'Rossini', 'Jonathan  ', '1989-04-05', 'sui', 'D', NULL, 'parma', 15, 35),
(547, 'Sall', 'Dembel  ', '1994-06-16', 'sen', 'D', NULL, 'parma', 15, 51),
(548, 'Vergara', 'Jherson  ', '1994-05-26', 'col', 'D', NULL, 'parma', 15, 31),
(549, 'Zagnoni', 'Davide  ', '1995-02-19', 'ita', 'D', NULL, 'parma', 15, 34),
(550, 'Acquah', 'Afriyie  ', '1992-01-05', 'gha', 'C', NULL, 'parma', 15, 30),
(551, 'Biabiany', 'Jonathan Ludovic ', '1988-04-28', 'fra', 'C', NULL, 'parma', 15, 7),
(552, 'Galloppa', 'Daniele  ', '1985-05-15', 'ita', 'C', NULL, 'parma', 15, 8),
(553, 'Gargano', '  ', '1984-07-23', 'uru', 'C', NULL, 'parma', 15, 5),
(554, 'Gobbi', 'Massimo  ', '1980-10-31', 'ita', 'C', NULL, 'parma', 15, 18),
(555, 'Jankovic', 'Filip  ', '1995-01-17', 'srb', 'C', NULL, 'parma', 15, 22),
(556, 'Marchionni', 'Marco  ', '1980-07-22', 'ita', 'C', NULL, 'parma', 15, 32),
(557, 'Martinez', 'Martin Gonzalo ', '1996-04-02', 'arg', 'C', NULL, 'parma', 15, 33),
(558, 'Mauri', 'Jose  ', '1996-05-16', 'arg', 'C', NULL, 'parma', 15, 26),
(559, 'Munari', 'Gianni  ', '1983-06-24', 'ita', 'C', NULL, 'parma', 15, 24),
(560, 'Obi', 'Joel Chukwuma ', '1991-05-22', 'nga', 'C', NULL, 'parma', 15, 20),
(561, 'Parolo', 'Marco  ', '1985-01-25', 'ita', 'C', NULL, 'parma', 15, 16),
(562, 'Schelotto', 'Ezequiel Matias ', '1989-05-23', 'ita', 'C', NULL, 'parma', 15, 23),
(563, 'Amauri', '  ', '1980-06-03', 'ita', 'A', NULL, 'parma', 15, 11),
(564, 'Cassano', 'Antonio  ', '1982-07-12', 'ita', 'A', NULL, 'parma', 15, 99),
(565, 'Cerri', 'Alberto  ', '1996-04-16', 'ita', 'A', NULL, 'parma', 15, 9),
(566, 'Nyantakyi', 'Solomon  ', '1996-03-25', 'gha', 'A', NULL, 'parma', 15, 45),
(567, 'Palladino', 'Raffaele  ', '1984-04-17', 'ita', 'A', NULL, 'parma', 15, 17),
(568, 'Pozzi', 'Nicola  ', '1986-06-30', 'ita', 'A', NULL, 'parma', 15, 10),
(569, 'De Sanctis', 'Morgan  ', '1977-03-26', 'ita', 'P', NULL, 'roma', 16, 26),
(570, 'Lobont', 'Bogdan  ', '1978-01-18', 'rou', 'P', NULL, 'roma', 16, 1),
(571, 'Skorupski', 'Lukasz  ', '1991-05-05', 'pol', 'P', NULL, 'roma', 16, 28),
(572, 'Balzaretti', 'Federico  ', '1981-12-06', 'ita', 'D', NULL, 'roma', 16, 42),
(573, 'Benatia', '  ', '1987-04-17', 'mar', 'D', NULL, 'roma', 16, 17),
(574, 'Castan', 'Leandro  ', '1986-11-05', 'bra', 'D', NULL, 'roma', 16, 5),
(575, 'Dodô', '  ', '1992-02-06', 'bra', 'D', NULL, 'roma', 16, 3),
(576, 'Jedvaj', 'Tin  ', '1995-11-28', 'cro', 'D', NULL, 'roma', 16, 33),
(577, 'Maicon', '  ', '1981-07-26', 'bra', 'D', NULL, 'roma', 16, 13),
(578, 'Romagnoli', 'Alessio  ', '1995-01-12', 'ita', 'D', NULL, 'roma', 16, 46),
(579, 'Tolói', 'Rafael  ', '1990-10-10', 'bra', 'D', NULL, 'roma', 16, 2),
(580, 'Torosidis', 'Vasileios  ', '1985-06-10', 'gre', 'D', NULL, 'roma', 16, 35),
(581, 'De Rossi', 'Daniele  ', '1983-07-24', 'ita', 'C', NULL, 'roma', 16, 16),
(582, 'Di Mariano', 'Francesco  ', '1996-04-20', 'ita', 'C', NULL, 'roma', 16, 96),
(583, 'Florenzi', 'Alessandro  ', '1991-03-11', 'ita', 'C', NULL, 'roma', 16, 24),
(584, 'Michel', 'Bastos  ', '1983-08-02', 'bra', 'C', NULL, 'roma', 16, 20),
(585, 'Nainggolan', 'Radja  ', '1988-05-04', 'bel', 'C', NULL, 'roma', 16, 44),
(586, 'Pjanic', 'Miralem  ', '1990-04-02', 'bih', 'C', NULL, 'roma', 16, 15),
(587, 'Ricci', 'Federico  ', '1994-05-27', 'ita', 'C', NULL, 'roma', 16, 94),
(588, 'Strootman', 'Kevin  ', '1990-02-13', 'ned', 'C', NULL, 'roma', 16, 6),
(589, 'Taddei', '  ', '1980-03-06', 'bra', 'C', NULL, 'roma', 16, 11),
(590, 'Battaglia', 'Simone  ', '1995-03-18', 'ita', 'A', NULL, 'roma', 16, 97),
(591, 'Destro', 'Mattia  ', '1991-03-20', 'ita', 'A', NULL, 'roma', 16, 22),
(592, 'Gervinho', '  ', '1987-05-27', 'civ', 'A', NULL, 'roma', 16, 27),
(593, 'Ljajic', 'Adem  ', '1991-09-29', 'srb', 'A', NULL, 'roma', 16, 8),
(594, 'Mazzitelli', 'Luca  ', '1995-11-15', 'ita', 'A', NULL, 'roma', 16, 95),
(595, 'Totti', 'Francesco  ', '1976-09-27', 'ita', 'A', NULL, 'roma', 16, 10),
(596, 'Da Costa', 'Angelo Esmael Junior', '1983-11-12', 'bra', 'P', NULL, 'sampdoria', 17, 1),
(597, 'Falcone', 'Wladimiro  ', '1995-04-12', 'ita', 'P', NULL, 'sampdoria', 17, 95),
(598, 'Fiorillo', 'Vincenzo  ', '1990-01-13', 'ita', 'P', NULL, 'sampdoria', 17, 30),
(599, 'Berardi', 'Gaetano  ', '1988-08-21', 'sui', 'D', NULL, 'sampdoria', 17, 13),
(600, 'Costa', 'Andrea  ', '1986-02-01', 'ita', 'D', NULL, 'sampdoria', 17, 3),
(601, 'De Silvestri', 'Lorenzo  ', '1988-05-23', 'ita', 'D', NULL, 'sampdoria', 17, 29),
(602, 'Fornasier', 'Michele  ', '1993-08-22', 'ita', 'D', NULL, 'sampdoria', 17, 44),
(603, 'Gastaldello', 'Daniele  ', '1983-06-25', 'ita', 'D', NULL, 'sampdoria', 17, 28),
(604, 'Mustafi', 'Shkodran  ', '1992-04-17', 'ger', 'D', NULL, 'sampdoria', 17, 8),
(605, 'Palombo', 'Angelo  ', '1981-09-25', 'ita', 'D', NULL, 'sampdoria', 17, 17),
(606, 'Regini', 'Vasco  ', '1990-09-09', 'ita', 'D', NULL, 'sampdoria', 17, 19),
(607, 'Bjarnason', 'Birkir  ', '1988-05-27', 'isl', 'C', NULL, 'sampdoria', 17, 22),
(608, 'Krsticic', 'Nenad  ', '1990-07-03', 'srb', 'C', NULL, 'sampdoria', 17, 10),
(609, 'Obiang', '  ', '1992-03-27', 'esp', 'C', NULL, 'sampdoria', 17, 14),
(610, 'Renan', '  ', '1986-06-19', 'bra', 'C', NULL, 'sampdoria', 17, 5),
(611, 'Rodriguez', 'Matías Nicolás ', '1986-04-14', 'arg', 'C', NULL, 'sampdoria', 17, 6),
(612, 'Salamon', 'Bartosz  ', '1991-05-01', 'pol', 'C', NULL, 'sampdoria', 17, 4),
(613, 'Sansone', 'Gianluca  ', '1987-05-12', 'ita', 'C', NULL, 'sampdoria', 17, 12),
(614, 'Sestu', 'Alessio  ', '1983-09-29', 'ita', 'C', NULL, 'sampdoria', 17, 77),
(615, 'Soriano', 'Roberto  ', '1991-02-08', 'ita', 'C', NULL, 'sampdoria', 17, 21),
(616, 'Wszolek', 'Pawel  ', '1992-04-30', 'pol', 'C', NULL, 'sampdoria', 17, 15),
(617, 'Eder', '  ', '1986-11-15', 'bra', 'A', NULL, 'sampdoria', 17, 23),
(618, 'Gabbiadini', 'Manolo  ', '1991-11-26', 'ita', 'A', NULL, 'sampdoria', 17, 11),
(619, 'Lombardo', 'Mattia  ', '1995-02-14', 'ita', 'A', NULL, 'sampdoria', 17, 31),
(620, 'Maxi', 'Lopez  ', '1984-04-03', 'arg', 'A', NULL, 'sampdoria', 17, 7),
(621, 'Okaka', '  ', '1989-08-09', 'ita', 'A', NULL, 'sampdoria', 17, 9),
(622, 'Pegolo', 'Gianluca  ', '1981-03-25', 'ita', 'P', NULL, 'sassuolo', 18, 79),
(623, 'Perilli', 'Simone  ', '1995-01-07', 'ita', 'P', NULL, 'sassuolo', 18, 12),
(624, 'Polito', 'Ciro  ', '1979-04-12', 'ita', 'P', NULL, 'sassuolo', 18, 99),
(625, 'Pomini', 'Alberto  ', '1981-03-17', 'ita', 'P', NULL, 'sassuolo', 18, 1),
(626, 'Acerbi', 'Francesco  ', '1988-02-10', 'ita', 'D', NULL, 'sassuolo', 18, 15),
(627, 'Antei', 'Luca  ', '1992-04-19', 'ita', 'D', NULL, 'sassuolo', 18, 5),
(628, 'Ariaudo', 'Lorenzo  ', '1989-06-11', 'ita', 'D', NULL, 'sassuolo', 18, 6),
(629, 'Bianco', 'Paolo  ', '1977-08-20', 'ita', 'D', NULL, 'sassuolo', 18, 20),
(630, 'Cannavaro', 'Paolo  ', '1981-06-26', 'ita', 'D', NULL, 'sassuolo', 18, 28),
(631, 'Caselli', 'Lorenzo  ', '1995-01-15', 'ita', 'D', NULL, 'sassuolo', 18, 19),
(632, 'Gazzola', 'Marcello  ', '1985-04-03', 'ita', 'D', NULL, 'sassuolo', 18, 23),
(633, 'Longhi', 'Alessandro  ', '1989-06-25', 'ita', 'D', NULL, 'sassuolo', 18, 3),
(634, 'Manfredini', 'Thomas  ', '1980-05-27', 'ita', 'D', NULL, 'sassuolo', 18, 21),
(635, 'Mendes', 'Pedro Filipe Teodosio', '1990-10-01', 'por', 'D', NULL, 'sassuolo', 18, 33),
(636, 'Pucino', 'Raffaele  ', '1991-05-03', 'ita', 'D', NULL, 'sassuolo', 18, 2),
(637, 'Terranova', 'Emanuele  ', '1987-04-14', 'ita', 'D', NULL, 'sassuolo', 18, 26),
(638, 'Vacondio', 'Daniele  ', '1994-04-01', 'ita', 'D', NULL, 'sassuolo', 18, 13),
(639, 'Ziegler', 'Reto  ', '1986-01-16', 'sui', 'D', NULL, 'sassuolo', 18, 86),
(640, 'Antonio', 'Sanabria  ', '1996-03-04', 'par', 'C', NULL, 'sassuolo', 18, 96),
(641, 'Biondini', 'Davide  ', '1983-01-24', 'ita', 'C', NULL, 'sassuolo', 18, 16),
(642, 'Brighi', 'Matteo  ', '1981-02-14', 'ita', 'C', NULL, 'sassuolo', 18, 22),
(643, 'Chibsah', 'Yussif Raman ', '1993-03-10', 'gha', 'C', NULL, 'sassuolo', 18, 45),
(644, 'Gliozzi', 'Ettore  ', '1995-09-23', 'ita', 'C', NULL, 'sassuolo', 18, 95),
(645, 'Lodesani', 'Davide  ', '1995-05-04', 'ita', 'C', NULL, 'sassuolo', 18, 29),
(646, 'Magnanelli', 'Francesco  ', '1984-11-12', 'ita', 'C', NULL, 'sassuolo', 18, 4),
(647, 'Marrone', 'Luca  ', '1990-03-28', 'ita', 'C', NULL, 'sassuolo', 18, 8),
(648, 'Missiroli', 'Simone  ', '1986-05-23', 'ita', 'C', NULL, 'sassuolo', 18, 7),
(649, 'Rosi', 'Aleandro  ', '1987-05-17', 'ita', 'C', NULL, 'sassuolo', 18, 87),
(650, 'Alexe', 'Marius  ', '1990-02-22', 'rou', 'A', NULL, 'sassuolo', 18, 11),
(651, 'Alhassan', 'Abass  ', '1995-01-21', 'gha', 'A', NULL, 'sassuolo', 18, 18),
(652, 'Berardi', 'Domenico  ', '1994-08-01', 'ita', 'A', NULL, 'sassuolo', 18, 25),
(653, 'Castelletto', 'Eros  ', '1995-08-11', 'ita', 'A', NULL, 'sassuolo', 18, 30),
(654, 'Farias', '  ', '1990-05-10', 'bra', 'A', NULL, 'sassuolo', 18, 70),
(655, 'Floccari', 'Sergio  ', '1981-11-12', 'ita', 'A', NULL, 'sassuolo', 18, 9),
(656, 'Floro Flores', 'Antonio  ', '1983-06-18', 'ita', 'A', NULL, 'sassuolo', 18, 83),
(657, 'Masucci', 'Gaetano  ', '1984-10-26', 'ita', 'A', NULL, 'sassuolo', 18, 14),
(658, 'Sansone', 'Nicola Domenico ', '1991-09-10', 'ita', 'A', NULL, 'sassuolo', 18, 17),
(659, 'Zaza', 'Simone  ', '1991-06-25', 'ita', 'A', NULL, 'sassuolo', 18, 10),
(660, 'Berni', 'Tommaso  ', '1983-03-06', 'ita', 'P', NULL, 'torino', 19, 32),
(661, 'Gillet', 'Jean Francois ', '1979-05-31', 'bel', 'P', NULL, 'torino', 19, 1),
(662, 'Gomis', 'Lys  ', '1989-10-06', 'sen', 'P', NULL, 'torino', 19, 23),
(663, 'Padelli', 'Daniele  ', '1985-10-25', 'ita', 'P', NULL, 'torino', 19, 30),
(664, 'Saracco', 'Umberto  ', '1994-04-10', 'ita', 'P', NULL, 'torino', 19, 28),
(665, 'Barreca', 'Antonio  ', '1995-03-18', 'ita', 'D', NULL, 'torino', 19, 34),
(666, 'Bovo', 'Cesare  ', '1983-01-14', 'ita', 'D', NULL, 'torino', 19, 5),
(667, 'Darmian', 'Matteo  ', '1989-12-02', 'ita', 'D', NULL, 'torino', 19, 36),
(668, 'Glik', 'Kamil  ', '1988-02-03', 'pol', 'D', NULL, 'torino', 19, 25),
(669, 'Maksimovic', 'Nikola  ', '1991-11-25', 'srb', 'D', NULL, 'torino', 19, 19),
(670, 'Moretti', 'Emiliano  ', '1981-06-11', 'ita', 'D', NULL, 'torino', 19, 24),
(671, 'Pasquale', 'Giovanni  ', '1982-01-05', 'ita', 'D', NULL, 'torino', 19, 26),
(672, 'Rodriguez', '  ', '1984-03-21', 'uru', 'D', NULL, 'torino', 19, 2),
(673, 'Vesovic', 'Marko  ', '1991-08-28', 'mne', 'D', NULL, 'torino', 19, 29),
(674, 'Aramu', 'Mattia  ', '1995-05-14', 'ita', 'C', NULL, 'torino', 19, 49),
(675, 'Basha', 'Migjen  ', '1987-01-05', 'alb', 'C', NULL, 'torino', 19, 4),
(676, 'El Kaddouri', 'Omar  ', '1990-08-21', 'mar', 'C', NULL, 'torino', 19, 7),
(677, 'Farnerud', 'Alexander  ', '1984-05-01', 'swe', 'C', NULL, 'torino', 19, 8),
(678, 'Gazzi', 'Alessandro Carlo ', '1983-01-28', 'ita', 'C', NULL, 'torino', 19, 14),
(679, 'Gyasi', 'Emmanuel  ', '1994-01-11', 'gha', 'C', NULL, 'torino', 19, 31),
(680, 'Kurtic', 'Jasmin  ', '1989-01-10', 'svn', 'C', NULL, 'torino', 19, 27),
(681, 'Masiello', 'Salvatore  ', '1982-01-31', 'ita', 'C', NULL, 'torino', 19, 17),
(682, 'Tachtsidis', 'Panagiotis  ', '1991-02-15', 'gre', 'C', NULL, 'torino', 19, 77),
(683, 'Vives', 'Giuseppe  ', '1980-07-14', 'ita', 'C', NULL, 'torino', 19, 20),
(684, 'Barreto', '  ', '1985-07-12', 'bra', 'A', NULL, 'torino', 19, 10),
(685, 'Cerci', 'Alessio  ', '1987-07-23', 'ita', 'A', NULL, 'torino', 19, 11),
(686, 'Immobile', 'Ciro  ', '1990-02-20', 'ita', 'A', NULL, 'torino', 19, 9),
(687, 'Larrondo', '  ', '1988-08-16', 'arg', 'A', NULL, 'torino', 19, 16),
(688, 'Meggiorini', 'Riccardo  ', '1985-09-04', 'ita', 'A', NULL, 'torino', 19, 69),
(689, 'Benussi', 'Francesco  ', '1981-10-15', 'ita', 'P', NULL, 'udinese', 20, 99),
(690, 'Brkic', 'Zeljko  ', '1986-07-09', 'srb', 'P', NULL, 'udinese', 20, 1),
(691, 'Kelava', 'Ivan  ', '1988-02-20', 'cro', 'P', NULL, 'udinese', 20, 30),
(692, 'Scuffet', 'Simone  ', '1996-05-31', 'ita', 'P', NULL, 'udinese', 20, 22),
(693, 'Basta', 'Dusan  ', '1984-08-18', 'srb', 'D', NULL, 'udinese', 20, 8),
(694, 'Berra', 'Filippo  ', '1995-02-06', 'ita', 'D', NULL, 'udinese', 20, 41),
(695, 'Bubnjic', 'Igor  ', '1992-07-17', 'cro', 'D', NULL, 'udinese', 20, 6),
(696, 'Danilo', '  ', '1984-05-10', 'bra', 'D', NULL, 'udinese', 20, 5);
INSERT INTO `giocatore` (`id_giocatore`, `cognome`, `nome`, `data_nascita`, `nazionalita`, `ruolo`, `valore`, `squadra`, `id_squadra_giocatore`, `n_maglia`) VALUES
(697, 'Domizzi', 'Maurizio  ', '1980-06-28', 'ita', 'D', NULL, 'udinese', 20, 11),
(698, 'Douglas', 'Do Santos ', '1994-03-22', 'bra', 'D', NULL, 'udinese', 20, 19),
(699, 'Gabriel', 'Silva  ', '1991-05-13', 'bra', 'D', NULL, 'udinese', 20, 34),
(700, 'Heurtaux', 'Thomas  ', '1988-07-03', 'fra', 'D', NULL, 'udinese', 20, 75),
(701, 'Naldo', '  ', '1988-08-25', 'bra', 'D', NULL, 'udinese', 20, 4),
(702, 'Neuton', '  ', '1990-03-14', 'bra', 'D', NULL, 'udinese', 20, 2),
(703, 'Widmer', 'Silvan  ', '1993-03-05', 'sui', 'D', NULL, 'udinese', 20, 27),
(704, 'Allan', '  ', '1991-01-08', 'bra', 'C', NULL, 'udinese', 20, 3),
(705, 'Badu', 'Emmanuel Agyemang ', '1990-12-02', 'gha', 'C', NULL, 'udinese', 20, 7),
(706, 'Fernandes', '  ', '1994-09-08', 'por', 'C', NULL, 'udinese', 20, 32),
(707, 'Jadson', '  ', '1993-08-30', 'bra', 'C', NULL, 'udinese', 20, 18),
(708, 'Lazzari', 'Andrea  ', '1984-12-03', 'ita', 'C', NULL, 'udinese', 20, 21),
(709, 'Mlinar', 'Frano  ', '1992-03-30', 'cro', 'C', NULL, 'udinese', 20, 14),
(710, 'Pereyra', 'Roberto Maximiliano ', '1991-01-07', 'arg', 'C', NULL, 'udinese', 20, 37),
(711, 'Pinzi', 'Giampiero  ', '1981-03-11', 'ita', 'C', NULL, 'udinese', 20, 66),
(712, 'Yebda', 'Hassan  ', '1984-05-14', 'alg', 'C', NULL, 'udinese', 20, 20),
(713, 'Zielinski', 'Piotr  ', '1994-05-20', 'pol', 'C', NULL, 'udinese', 20, 94),
(714, 'Beleck', 'A Beka Steve Leo', '1993-02-10', 'cmr', 'A', NULL, 'udinese', 20, 15),
(715, 'Bertoia', 'Marco  ', '1995-05-24', 'ita', 'A', NULL, 'udinese', 20, 42),
(716, 'Di Natale', 'Antonio  ', '1977-10-13', 'ita', 'A', NULL, 'udinese', 20, 10),
(717, 'Maicosuel', '  ', '1986-06-16', 'bra', 'A', NULL, 'udinese', 20, 70),
(718, 'Muriel', '  ', '1991-04-16', 'col', 'A', NULL, 'udinese', 20, 9),
(719, 'Nico', 'Lopez  ', '1993-10-01', 'uru', 'A', NULL, 'udinese', 20, 17),
(720, 'Curci', 'Gianluca  ', '1985-07-12', 'ita', 'P', NULL, 'bologna', 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE IF NOT EXISTS `notifica` (
`id_notifica` int(10) unsigned NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `testo` longtext,
  `letta` tinyint(4) NOT NULL DEFAULT '0',
  `id_mittente` int(10) unsigned DEFAULT NULL,
  `id_utente` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dump dei dati per la tabella `notifica`
--

INSERT INTO `notifica` (`id_notifica`, `tipo`, `testo`, `letta`, `id_mittente`, `id_utente`) VALUES
(1, NULL, 'ciao prova di notifica', 1, 30, 33),
(2, NULL, 'ciao prova rdi notifica', 1, 30, 33),
(3, NULL, 'dsdasdasdasdas', 1, 30, 33),
(4, NULL, 'dsadasdas', 1, 30, 33),
(5, NULL, 'dsadasdfffffffffas', 1, 30, 33),
(6, NULL, 'sssssss', 1, 30, 33),
(7, NULL, 'sssssss', 1, 30, 33),
(8, NULL, 'ciao prova', 1, 30, 33),
(9, 'invito al campionato', 'Ciao! Sei stato invitato ad unirti al torneo gabri  dall amministratore della lega <br>gabri\n    Per unirti ai tuoi amici basta cliccare nel link sotto e seguire le indicazioni, in pochi minuti il gioco è fatto!<br>\n    Buon divertimento!<br>\n    <a href = "crea_campionato/iscrivi-squadra.php?id_camp=103&&var=0">Iscrivi la tua squadra al campionato</a>', 1, 30, 33),
(10, 'invito al campionato', 'Sei stato invitato ad unirti al torneo pernulla  dall amministratore della lega <br>daniel\n    Per unirti ai tuoi amici basta cliccare nel link sotto e seguire le indicazioni, in pochi minuti il gioco è fatto!<br>\n    Buon divertimento!<br>\n    <a href = "crea_campionato/iscrivi-squadra.php?id_camp=104&&var=0">Iscrivi la tua squadra al campionato</a>', 0, 33, 30),
(11, 'invito al campionato', 'Sei stato invitato ad unirti al torneo prova  dall amministratore della lega <br>daniel\n    Per unirti ai tuoi amici basta cliccare nel link sotto e seguire le indicazioni, in pochi minuti il gioco è fatto!<br>\n    Buon divertimento!<br>\n    <a href = "crea_campionato/iscrivi-squadra.php?id_camp=106&&var=0">Iscrivi la tua squadra al campionato</a>', 0, 33, 30);

-- --------------------------------------------------------

--
-- Struttura della tabella `squadra`
--

CREATE TABLE IF NOT EXISTS `squadra` (
`id_squadra` int(10) unsigned NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `id_campionato` int(10) unsigned DEFAULT NULL,
  `id_utente` int(10) unsigned DEFAULT NULL,
  `id_stadio` int(11) unsigned DEFAULT NULL,
  `punti` int(11) DEFAULT '0',
  `iscritta` tinyint(1) NOT NULL DEFAULT '0',
  `storia` text,
  `logo` varchar(200) DEFAULT NULL,
  `nome_stadio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dump dei dati per la tabella `squadra`
--

INSERT INTO `squadra` (`id_squadra`, `nome`, `id_campionato`, `id_utente`, `id_stadio`, `punti`, `iscritta`, `storia`, `logo`, `nome_stadio`) VALUES
(57, 'gabri team', 97, 30, NULL, 0, 1, NULL, '', NULL),
(58, 'pestello', 99, 30, NULL, 0, 1, NULL, '', NULL),
(59, 'daniel Team', 99, 33, NULL, 0, 1, NULL, '', NULL),
(60, 'gianni Team', NULL, 34, NULL, 0, 0, 'Scrivi la tua storia...', '../img/logo-squadra/es.png', NULL),
(61, 'Prova', 103, 30, NULL, 0, 1, NULL, '', NULL),
(68, 'la bambola', NULL, 30, 3, 0, 0, 'ssss', '../img/logo-squadra/fiorentina.jpg', NULL),
(70, 'Fiorentina', NULL, 30, 1, 0, 0, '    Scrivi qualcosa sulla tua squadra...\r\n\r\n', '../img/logo-squadra/fiorentina.png', 'Artemio Franchi'),
(71, 'squadra_test', 100, 33, NULL, 0, 1, NULL, '', NULL),
(75, ' Team', NULL, 36, 1, 0, 0, NULL, '../img/logo-squadra/fiorentina.jpg', NULL),
(76, 'dsadasdasdasdasdasdasdasdas', 104, 33, NULL, 0, 1, NULL, NULL, NULL),
(77, '', NULL, 33, 1, 0, 0, 'prova di sotria', '../img/logo-squadra/milan.jpg', ''),
(78, 'dasdasdasdas', 105, 33, 3, 0, 1, 'dasd', '../img/logo-squadra/milan.jpg', ''),
(79, 'teamz', 106, 33, NULL, 0, 1, NULL, NULL, NULL),
(80, 'Daniel', NULL, 33, 1, 0, 0, '', '../img/logo-squadra/fiorentina.png', 'Zanchi'),
(81, 'ttttttttttttt', NULL, 33, 1, 0, 0, '', '../img/logo-squadra/fiorentina.png', 'dasdada'),
(82, 'sdasdwdasd', 103, 33, 1, 0, 0, '', '../img/logo-squadra/fiorentina.png', 'dsdaw');

-- --------------------------------------------------------

--
-- Struttura della tabella `stadio`
--

CREATE TABLE IF NOT EXISTS `stadio` (
`id_stadio` int(10) unsigned NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `img` varchar(50) NOT NULL DEFAULT '../img/stadio1.png'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `stadio`
--

INSERT INTO `stadio` (`id_stadio`, `nome`, `img`) VALUES
(1, 'Il castello Impenetrabile', '../img/stadio/stadio1.png'),
(2, 'Il tempio del gladiatore', '../img/stadio/stadio3.png'),
(3, 'Lo stadio incandescente', '../img/stadio/stadio2.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `statistica`
--

CREATE TABLE IF NOT EXISTS `statistica` (
`id_statistica` int(11) NOT NULL,
  `id_giocatore` int(11) NOT NULL,
  `anno` year(4) DEFAULT NULL COMMENT 'es. 2013 si riferisce alla stagione 2013/2014',
  `giornata` int(11) DEFAULT NULL,
  `gol` int(11) DEFAULT NULL,
  `assist` int(11) DEFAULT NULL,
  `ammonito` int(11) DEFAULT NULL,
  `espulso` int(11) DEFAULT NULL,
  `presenza` int(11) DEFAULT NULL,
  `voto` float DEFAULT NULL,
  `rig_sbagliato` int(11) DEFAULT NULL,
  `autogol` int(11) DEFAULT NULL,
  `gol_subito` int(11) DEFAULT NULL,
  `gol_pareggio` int(11) DEFAULT NULL,
  `gol_vittoria` int(11) DEFAULT NULL,
  `gol_su_rigore` int(11) DEFAULT NULL,
  `rigore_parato` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=255 ;

--
-- Dump dei dati per la tabella `statistica`
--

INSERT INTO `statistica` (`id_statistica`, `id_giocatore`, `anno`, `giornata`, `gol`, `assist`, `ammonito`, `espulso`, `presenza`, `voto`, `rig_sbagliato`, `autogol`, `gol_subito`, `gol_pareggio`, `gol_vittoria`, `gol_su_rigore`, `rigore_parato`) VALUES
(1, 30, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(2, 38, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(3, 39, 2013, 31, 0, 0, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(4, 40, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(5, 42, 2013, 31, 0, 0, 1, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(6, 44, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(7, 45, 2013, 31, 0, 0, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(8, 47, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(9, 49, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(10, 50, 2013, 31, 1, 0, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(11, 56, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 58, 2013, 31, 1, 1, 0, 0, 1, 7.54, 0, 0, 0, 0, 1, 0, 0),
(13, 59, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(14, 60, 2013, 31, 0, 0, 1, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(15, 99, 2013, 31, 0, 0, 0, 0, 1, 5.5, 0, 0, 0, 0, 0, 0, 0),
(16, 101, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(17, 102, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(18, 103, 2013, 31, 0, 0, 0, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(19, 108, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(20, 110, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(21, 113, 2013, 31, 0, 0, 0, 0, 1, 4.5, 0, 0, 0, 0, 0, 0, 0),
(22, 115, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(23, 117, 2013, 31, 0, 0, 0, 0, 1, 4.51, 0, 0, 0, 0, 0, 0, 0),
(24, 118, 2013, 31, 0, 0, 1, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(25, 120, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(26, 122, 2013, 31, 0, 0, 1, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(27, 124, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 2, 0, 0, 0, 0),
(28, 127, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(29, 129, 2013, 31, 0, 0, 1, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(30, 134, 2013, 31, 0, 1, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(31, 135, 2013, 31, 0, 0, 1, 0, 1, 5.5, 0, 0, 0, 0, 0, 0, 0),
(32, 137, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(33, 138, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(34, 139, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 142, 2013, 31, 0, 0, 1, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(36, 143, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(37, 146, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(38, 147, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(39, 148, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(40, 153, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 1, 0, 0, 0, 0),
(41, 158, 2013, 31, 0, 0, 1, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(42, 164, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(43, 166, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(44, 167, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 171, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(46, 174, 2013, 31, 0, 0, 1, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(47, 175, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(48, 177, 2013, 31, 0, 0, 1, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(49, 179, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 181, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(51, 182, 2013, 31, 0, 0, 1, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(52, 185, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 3, 0, 0, 0, 0),
(53, 190, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(54, 192, 2013, 31, 0, 0, 0, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(55, 194, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(56, 196, 2013, 31, 0, 0, 0, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(57, 198, 2013, 31, 0, 0, 0, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(58, 199, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(59, 203, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 204, 2013, 31, 0, 0, 0, 0, 1, 4.5, 0, 0, 0, 0, 0, 0, 0),
(61, 206, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(62, 211, 2013, 31, 0, 0, 0, 0, 1, 5.5, 0, 0, 0, 0, 0, 0, 0),
(63, 212, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(64, 213, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(65, 220, 2013, 31, 0, 0, 1, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(66, 223, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(67, 233, 2013, 31, 0, 0, 1, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(68, 234, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(69, 236, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 238, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(71, 242, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(72, 245, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(73, 248, 2013, 31, 0, 0, 1, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(74, 250, 2013, 31, 0, 0, 0, 0, 1, 6.03, 0, 0, 0, 0, 0, 0, 0),
(75, 251, 2013, 31, 0, 0, 1, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(76, 253, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(77, 259, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 3, 0, 0, 0, 0),
(78, 260, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(79, 264, 2013, 31, 0, 0, 0, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(80, 265, 2013, 31, 0, 0, 0, 0, 1, 4.51, 0, 0, 0, 0, 0, 0, 0),
(81, 267, 2013, 31, 0, 0, 0, 0, 1, 4.5, 0, 0, 0, 0, 0, 0, 0),
(82, 268, 2013, 31, 0, 0, 0, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(83, 275, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(84, 279, 2013, 31, 0, 0, 1, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(85, 283, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(86, 285, 2013, 31, 0, 0, 0, 0, 1, 4.51, 0, 0, 0, 0, 0, 0, 0),
(87, 290, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(88, 291, 2013, 31, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 292, 2013, 31, 0, 0, 0, 1, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(90, 293, 2013, 31, 0, 0, 1, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(91, 295, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(92, 296, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(93, 297, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(94, 300, 2013, 31, 1, 0, 0, 0, 1, 7.03, 0, 0, 0, 0, 1, 0, 0),
(95, 301, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(96, 302, 2013, 31, 0, 0, 0, 0, 1, 7.02, 0, 0, 0, 0, 0, 0, 0),
(97, 304, 2013, 31, 0, 1, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(98, 308, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(99, 312, 2013, 31, 0, 1, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(100, 313, 2013, 31, 2, 0, 0, 0, 1, 7.54, 0, 0, 0, 0, 0, 0, 0),
(101, 316, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 2, 0, 0, 0, 0),
(102, 321, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(103, 324, 2013, 31, 0, 1, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(104, 329, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(105, 330, 2013, 31, 0, 0, 1, 0, 1, 5.5, 0, 0, 0, 0, 0, 0, 0),
(106, 335, 2013, 31, 0, 0, 0, 0, 1, 4.01, 0, 0, 0, 0, 0, 0, 0),
(107, 336, 2013, 31, 1, 0, 1, 0, 1, 6.03, 0, 0, 0, 0, 0, 0, 0),
(108, 338, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(109, 343, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(110, 346, 2013, 31, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(111, 348, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(112, 351, 2013, 31, 1, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(113, 352, 2013, 31, 0, 0, 0, 0, 1, 7.53, 0, 0, 2, 0, 0, 0, 0),
(114, 358, 2013, 31, 0, 0, 1, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(115, 359, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(116, 360, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(117, 361, 2013, 31, 0, 0, 1, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(118, 366, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(119, 368, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(120, 369, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(121, 373, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(122, 374, 2013, 31, 0, 0, 0, 0, 1, 5.5, 0, 0, 0, 0, 0, 0, 0),
(123, 375, 2013, 31, 0, 0, 1, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(124, 378, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(125, 379, 2013, 31, 0, 0, 0, 0, 1, 5.02, 0, 0, 0, 0, 0, 0, 0),
(126, 383, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(127, 387, 2013, 31, 0, 0, 0, 0, 1, 4.51, 0, 0, 2, 0, 0, 0, 0),
(128, 389, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(129, 390, 2013, 31, 0, 0, 1, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(130, 392, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 1, 0, 0, 0, 0, 0),
(131, 396, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(132, 398, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(133, 403, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(134, 407, 2013, 31, 1, 0, 1, 0, 1, 6.54, 0, 0, 0, 0, 1, 0, 0),
(135, 410, 2013, 31, 0, 0, 1, 0, 1, 4.51, 0, 0, 0, 0, 0, 0, 0),
(136, 415, 2013, 31, 1, 1, 0, 0, 1, 7.04, 0, 0, 0, 0, 0, 0, 0),
(137, 416, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(138, 418, 2013, 31, 0, 0, 1, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(139, 423, 2013, 31, 0, 1, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(140, 424, 2013, 31, 1, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(141, 432, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 2, 0, 0, 0, 0),
(142, 434, 2013, 31, 0, 0, 1, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(143, 437, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(144, 440, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(145, 444, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(146, 446, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(147, 447, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(148, 448, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(149, 449, 2013, 31, 0, 1, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(150, 452, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(151, 455, 2013, 31, 1, 0, 0, 0, 1, 6.03, 0, 0, 0, 1, 0, 0, 0),
(152, 456, 2013, 31, 1, 0, 0, 0, 1, 7.54, 0, 0, 0, 0, 0, 0, 0),
(153, 457, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(154, 458, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(155, 464, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(156, 470, 2013, 31, 0, 1, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(157, 472, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(158, 477, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(159, 479, 2013, 31, 0, 1, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(160, 480, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(161, 481, 2013, 31, 0, 1, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(162, 483, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(163, 484, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(164, 486, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(165, 487, 2013, 31, 1, 0, 0, 0, 1, 7.04, 0, 0, 0, 0, 1, 0, 0),
(166, 495, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(167, 500, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(168, 501, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(169, 504, 2013, 31, 0, 0, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(170, 507, 2013, 31, 0, 0, 1, 0, 1, 7.04, 0, 0, 0, 0, 0, 0, 0),
(171, 519, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(172, 520, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(173, 521, 2013, 31, 0, 0, 1, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(174, 522, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(175, 529, 2013, 31, 0, 1, 0, 0, 1, 7.54, 0, 0, 0, 0, 0, 0, 0),
(176, 530, 2013, 31, 1, 0, 0, 0, 1, 7.04, 0, 0, 0, 0, 0, 0, 0),
(177, 532, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(178, 538, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 3, 0, 0, 0, 0),
(179, 541, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(180, 543, 2013, 31, 0, 0, 1, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(181, 544, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(182, 550, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(183, 551, 2013, 31, 1, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(184, 554, 2013, 31, 0, 0, 0, 0, 1, 5.5, 0, 0, 0, 0, 0, 0, 0),
(185, 556, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(186, 559, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(187, 561, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(188, 562, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(189, 564, 2013, 31, 0, 0, 1, 0, 1, 7.02, 0, 0, 0, 0, 0, 0, 0),
(190, 567, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(191, 569, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(192, 573, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(193, 574, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(194, 578, 2013, 31, 0, 0, 1, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(195, 580, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(196, 581, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(197, 583, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(198, 585, 2013, 31, 0, 1, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(199, 586, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(200, 589, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(201, 591, 2013, 31, 1, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 1, 0, 0),
(202, 592, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(203, 595, 2013, 31, 0, 1, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(204, 596, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(205, 601, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(206, 602, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(207, 603, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(208, 604, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(209, 605, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(210, 608, 2013, 31, 0, 0, 0, 0, 1, 5.5, 0, 0, 0, 0, 0, 0, 0),
(211, 610, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(212, 615, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(213, 617, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(214, 618, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(215, 621, 2013, 31, 0, 0, 1, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(216, 622, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 2, 0, 0, 0, 0),
(217, 630, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(218, 632, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(219, 633, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(220, 635, 2013, 31, 0, 0, 1, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(221, 641, 2013, 31, 0, 0, 0, 0, 1, 5.5, 0, 0, 0, 0, 0, 0, 0),
(222, 643, 2013, 31, 0, 0, 0, 0, 1, 5.52, 0, 0, 0, 0, 0, 0, 0),
(223, 648, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(224, 654, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(225, 655, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(226, 657, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(227, 659, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(228, 663, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 1, 0, 0, 0, 0),
(229, 666, 2013, 31, 0, 0, 0, 0, 1, 6.52, 0, 0, 0, 0, 0, 0, 0),
(230, 667, 2013, 31, 0, 0, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(231, 668, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(232, 669, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(233, 673, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(234, 675, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(235, 676, 2013, 31, 1, 0, 1, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(236, 677, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(237, 680, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(238, 682, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(239, 683, 2013, 31, 0, 1, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(240, 685, 2013, 31, 1, 1, 0, 0, 1, 7.04, 0, 0, 0, 0, 1, 0, 0),
(241, 688, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(242, 692, 2013, 31, 0, 0, 0, 0, 1, 7.54, 0, 0, 0, 0, 0, 0, 0),
(243, 693, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(244, 697, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(245, 700, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 0, 0, 0, 0, 0),
(246, 703, 2013, 31, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(247, 704, 2013, 31, 0, 0, 0, 0, 1, 6.01, 0, 0, 0, 0, 0, 0, 0),
(248, 705, 2013, 31, 0, 0, 0, 0, 1, 5.51, 0, 0, 0, 0, 0, 0, 0),
(249, 706, 2013, 31, 0, 0, 0, 0, 1, 6.53, 0, 0, 0, 0, 0, 0, 0),
(250, 710, 2013, 31, 0, 1, 0, 0, 1, 7.03, 0, 0, 0, 0, 0, 0, 0),
(251, 711, 2013, 31, 0, 0, 0, 0, 1, 5.01, 0, 0, 0, 0, 0, 0, 0),
(252, 716, 2013, 31, 1, 0, 0, 0, 1, 6.54, 0, 0, 0, 0, 1, 0, 0),
(253, 720, 2013, 31, 0, 0, 0, 0, 1, 6.02, 0, 0, 2, 0, 0, 0, 0),
(254, -2146826246, 2013, 31, 0, 0, 0, 0, 1, 7.54, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
`id_utente` int(10) unsigned NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `citta` varchar(20) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `domanda` varchar(50) DEFAULT NULL,
  `risposta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `nome`, `cognome`, `email`, `data_nascita`, `citta`, `user`, `password`, `domanda`, `risposta`) VALUES
(30, 'gabriele', 'barlacchi', 'barlacchi.gabriele@gmail.com', '1994-08-29', 'montevarchi', 'gabri', 'pestello', 'Il tuo colore preferito', 'celeste'),
(33, 'Daniel', 'Zanchi', 'danny.zanchi@gmail.com', '1993-02-24', 'Vaggio', 'daniel', 'vaggio', 'Il tuo colore preferito', 'nero'),
(34, 'gianni', 'barlacchi', 'barlacchi.gianni@gmail.com', '1987-10-05', 'montevarchi', 'gianni', 'pestello87', 'Il tuo colore preferito', 'giallo'),
(36, '', '', '', '0000-00-00', '', '', '', 'Il tuo colore preferito', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appartiene`
--
ALTER TABLE `appartiene`
 ADD KEY `ind3` (`id_squadra`), ADD KEY `ind4` (`id_giocatore`);

--
-- Indexes for table `campionato`
--
ALTER TABLE `campionato`
 ADD PRIMARY KEY (`id_campionato`);

--
-- Indexes for table `giocatore`
--
ALTER TABLE `giocatore`
 ADD PRIMARY KEY (`id_giocatore`);

--
-- Indexes for table `notifica`
--
ALTER TABLE `notifica`
 ADD PRIMARY KEY (`id_notifica`), ADD KEY `ind1` (`id_utente`);

--
-- Indexes for table `squadra`
--
ALTER TABLE `squadra`
 ADD PRIMARY KEY (`id_squadra`), ADD KEY `ind1` (`id_campionato`), ADD KEY `ind2` (`id_utente`), ADD KEY `id_stadio` (`id_stadio`);

--
-- Indexes for table `stadio`
--
ALTER TABLE `stadio`
 ADD PRIMARY KEY (`id_stadio`), ADD KEY `id_stadio` (`id_stadio`);

--
-- Indexes for table `statistica`
--
ALTER TABLE `statistica`
 ADD PRIMARY KEY (`id_statistica`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
 ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campionato`
--
ALTER TABLE `campionato`
MODIFY `id_campionato` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `giocatore`
--
ALTER TABLE `giocatore`
MODIFY `id_giocatore` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=721;
--
-- AUTO_INCREMENT for table `notifica`
--
ALTER TABLE `notifica`
MODIFY `id_notifica` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `squadra`
--
ALTER TABLE `squadra`
MODIFY `id_squadra` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `stadio`
--
ALTER TABLE `stadio`
MODIFY `id_stadio` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `statistica`
--
ALTER TABLE `statistica`
MODIFY `id_statistica` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=255;
--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
MODIFY `id_utente` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `appartiene`
--
ALTER TABLE `appartiene`
ADD CONSTRAINT `appartiene_ibfk_1` FOREIGN KEY (`id_squadra`) REFERENCES `squadra` (`id_squadra`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `appartiene_ibfk_2` FOREIGN KEY (`id_giocatore`) REFERENCES `giocatore` (`id_giocatore`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `notifica`
--
ALTER TABLE `notifica`
ADD CONSTRAINT `notifica_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limiti per la tabella `squadra`
--
ALTER TABLE `squadra`
ADD CONSTRAINT `squadra_ibfk_1` FOREIGN KEY (`id_campionato`) REFERENCES `campionato` (`id_campionato`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `squadra_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `squadra_ibfk_3` FOREIGN KEY (`id_stadio`) REFERENCES `stadio` (`id_stadio`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
