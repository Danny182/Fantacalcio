-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generato il: Mar 04, 2014 alle 20:24
-- Versione del server: 5.5.27
-- Versione PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `id_giocatore` int(10) unsigned DEFAULT NULL,
  KEY `ind3` (`id_squadra`),
  KEY `ind4` (`id_giocatore`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `campionato`
--

CREATE TABLE IF NOT EXISTS `campionato` (
  `id_campionato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL DEFAULT '',
  `admin` varchar(30) NOT NULL DEFAULT '',
  `id_admin` int(11) NOT NULL,
  `n_part` int(11) NOT NULL DEFAULT '1' COMMENT 'numero dei partecipanti al campionato',
  `formazione_automatica` varchar(5) NOT NULL DEFAULT 'si' COMMENT 'inserire formazione automaticamente?',
  `penalita` int(11) NOT NULL DEFAULT '0' COMMENT 'penalita punti in caso di mancato inserimento formazione',
  `mod_difesa_gazzetta` varchar(5) NOT NULL DEFAULT 'no' COMMENT 'modificatore difesa gazzetta',
  `mod_portiere` varchar(5) NOT NULL DEFAULT 'no' COMMENT 'modificatore portiere',
  `mod_difesa` varchar(5) NOT NULL DEFAULT 'no' COMMENT 'modificatore difesa',
  `mod_centrocampo` varchar(5) NOT NULL DEFAULT 'no' COMMENT 'modificatore centrocampo',
  `mod_attacco` varchar(5) NOT NULL DEFAULT 'no' COMMENT 'modificatore attacco',
  `mod_modulo` varchar(5) NOT NULL DEFAULT 'no' COMMENT 'possibilità di modifica modulo',
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
  `modulo_343` varchar(5) NOT NULL DEFAULT 'si' COMMENT 'se "si" il modulo è consentito',
  `modulo_352` varchar(5) NOT NULL DEFAULT 'si' COMMENT 'se "si" il modulo è consentito',
  `modulo_361` varchar(5) NOT NULL DEFAULT 'no' COMMENT 'se "si" il modulo è consentito',
  `modulo_433` varchar(5) NOT NULL DEFAULT 'si' COMMENT 'se "si" il modulo è consentito',
  `modulo_442` varchar(5) NOT NULL DEFAULT 'si' COMMENT 'se "si" il modulo è consentito',
  `modulo_451` varchar(5) NOT NULL DEFAULT 'si',
  `modulo_253` varchar(5) NOT NULL DEFAULT 'no',
  `modulo_334` varchar(5) NOT NULL DEFAULT 'no',
  `modulo_424` varchar(5) NOT NULL DEFAULT 'no',
  `modulo_532` varchar(5) NOT NULL DEFAULT 'si',
  `modulo_541` varchar(5) NOT NULL DEFAULT 'si',
  `modulo_550` varchar(5) NOT NULL DEFAULT 'no',
  `partecipanti` text COMMENT 'email o username dei partecipanti al campionato',
  PRIMARY KEY (`id_campionato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dump dei dati per la tabella `campionato`
--

INSERT INTO `campionato` (`id_campionato`, `nome`, `password`, `admin`, `id_admin`, `n_part`, `formazione_automatica`, `penalita`, `mod_difesa_gazzetta`, `mod_portiere`, `mod_difesa`, `mod_centrocampo`, `mod_attacco`, `mod_modulo`, `n_sostituzioni`, `bonus_gol_portiere`, `bonus_gol_difensore`, `bonus_gol_centrocampista`, `bonus_gol_attaccante`, `bonus_gol_rigore`, `bonus_rigore_parato`, `bonus_assist`, `bonus_portiere`, `bonus_casa`, `bonus_gol_vittoria`, `bonus_gol_pareggio`, `bonus_capitano`, `malus_gol_subito`, `ammonizione`, `espulsione`, `malus_rigore_sbagliato`, `malus_autogol`, `voto_giocatore_sv`, `voto_giocatore_ss`, `punti_primo_gol`, `punti_range_gol`, `modulo_343`, `modulo_352`, `modulo_361`, `modulo_433`, `modulo_442`, `modulo_451`, `modulo_253`, `modulo_334`, `modulo_424`, `modulo_532`, `modulo_541`, `modulo_550`, `partecipanti`) VALUES
(97, 'aa', '', '', 0, 0, 'si', 0, 'no', 'no', 'no', 'no', 'no', 'no', 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, '343.3', 'si', 'no', 'si', 'si', 'si', 'no', 'no', 'no', 'si', 'si', 'no', ''),
(99, 'pestello league', '', '', 0, 0, 'si', 0, 'no', 'no', 'no', 'no', 'no', 'no', 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, '343.3', 'si', 'no', 'si', 'si', 'si', 'no', 'no', 'no', 'si', 'si', 'no', ''),
(100, 'sfds', 'das', 'daniel', 33, 4, 'si', 0, 'no', 'no', 'no', 'no', 'no', 'no', 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 'si', 'si', 'no', 'si', 'si', 'si', 'no', 'no', 'no', 'si', 'si', 'no', 'gianniÂ£gianniÂ£gianniÂ£'),
(101, 'sfds', 'das', 'daniel', 33, 4, 'si', 0, 'no', 'no', 'no', 'no', 'no', 'no', 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 'si', 'si', 'no', 'si', 'si', 'si', 'no', 'no', 'no', 'si', 'si', 'no', 'gianniÂ£gianniÂ£gianniÂ£'),
(102, '', '', '', 0, 0, '', 0, 'no', 'no', 'no', 'no', 'no', 'no', 3, 3, 3, 3, 3, 3, 3, 1, 0, 2, 0, 0, 0, 1, 0.5, 1, 3, 3, 0, 0, 66, 6, 'si', 'si', 'no', 'si', 'si', 'si', 'no', 'no', 'no', 'si', 'si', 'no', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `giocatore`
--

CREATE TABLE IF NOT EXISTS `giocatore` (
  `id_giocatore` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `citta` varchar(30) DEFAULT NULL,
  `ruolo` varchar(20) DEFAULT NULL,
  `valore` int(11) DEFAULT NULL,
  `scadenza` date DEFAULT NULL,
  `gol_fatti` int(11) DEFAULT NULL,
  `gol_subiti` int(11) DEFAULT NULL,
  `ammonizioni` int(11) DEFAULT NULL,
  `espulsioni` int(11) DEFAULT NULL,
  `voto` float DEFAULT NULL,
  PRIMARY KEY (`id_giocatore`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifica`
--

CREATE TABLE IF NOT EXISTS `notifica` (
  `id_notifica` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) DEFAULT NULL,
  `testo` longtext,
  `letta` tinyint(4) NOT NULL DEFAULT '0',
  `id_mittente` int(10) unsigned DEFAULT NULL,
  `id_utente` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_notifica`),
  KEY `ind1` (`id_utente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dump dei dati per la tabella `notifica`
--

INSERT INTO `notifica` (`id_notifica`, `tipo`, `testo`, `letta`, `id_mittente`, `id_utente`) VALUES
(35, 'invito al campionato', 'Ciao! Sei stato invitato ad unirti al torneo pestello league  dall amministratore della lega <br>Gabriele Barlacchi \n    Per unirti ai tuoi amici basta cliccare nel link sotto e seguire le indicazioni, in pochi minuti il gioco Ã¨ fatto!<br>\n    Buon divertimento!<br>\n    <a href = "crea_campionato/iscrivi-squadra.php?id_camp=99&&var=0">Iscrivi la tua squadra al campionato</a>', 1, 30, 33);

-- --------------------------------------------------------

--
-- Struttura della tabella `squadra`
--

CREATE TABLE IF NOT EXISTS `squadra` (
  `id_squadra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `id_campionato` int(10) unsigned DEFAULT NULL,
  `id_utente` int(10) unsigned DEFAULT NULL,
  `id_stadio` int(11) unsigned DEFAULT NULL,
  `punti` int(11) DEFAULT '0',
  `iscritta` tinyint(1) NOT NULL DEFAULT '0',
  `storia` text,
  `logo` varchar(200) DEFAULT NULL,
  `nome_stadio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_squadra`),
  KEY `ind1` (`id_campionato`),
  KEY `ind2` (`id_utente`),
  KEY `id_stadio` (`id_stadio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dump dei dati per la tabella `squadra`
--

INSERT INTO `squadra` (`id_squadra`, `nome`, `id_campionato`, `id_utente`, `id_stadio`, `punti`, `iscritta`, `storia`, `logo`, `nome_stadio`) VALUES
(57, 'gabri team', 97, 30, NULL, 0, 1, NULL, '', NULL),
(58, 'pestello', 99, 30, NULL, 0, 1, NULL, '', NULL),
(59, 'daniel Team', 99, 33, NULL, 0, 1, NULL, '', NULL),
(60, 'gianni Team', NULL, 34, NULL, 0, 0, 'Scrivi la tua storia...', '../img/logo-squadra/es.png', NULL),
(61, 'Prova', NULL, 30, NULL, 0, 0, NULL, '', NULL),
(68, 'la bambola', NULL, 30, 3, 0, 0, 'ssss', '../img/logo-squadra/fiorentina.jpg', NULL),
(70, 'Fiorentina', NULL, 30, 1, 0, 0, '    Scrivi qualcosa sulla tua squadra...\r\n\r\n', '../img/logo-squadra/fiorentina.png', 'Artemio Franchi'),
(71, 'squadra_test', 100, 33, NULL, 0, 1, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `stadio`
--

CREATE TABLE IF NOT EXISTS `stadio` (
  `id_stadio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `img` varchar(50) NOT NULL DEFAULT '../img/stadio1.png',
  PRIMARY KEY (`id_stadio`),
  KEY `id_stadio` (`id_stadio`)
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
-- Struttura della tabella `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `id_utente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `citta` varchar(20) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `domanda` varchar(50) DEFAULT NULL,
  `risposta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_utente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `nome`, `cognome`, `email`, `data_nascita`, `citta`, `user`, `password`, `domanda`, `risposta`) VALUES
(30, 'gabriele', 'barlacchi', 'barlacchi.gabriele@gmail.com', '1994-08-29', 'montevarchi', 'gabri', 'pestello', 'Il tuo colore preferito', 'celeste'),
(33, 'daniel', 'zanchi', 'zanchi@gmail.com', '1993-09-03', 'figline', 'daniel', 'vaggio', 'Il tuo colore preferito', 'blu'),
(34, 'gianni', 'barlacchi', 'barlacchi.gianni@gmail.com', '1987-10-05', 'montevarchi', 'gianni', 'pestello87', 'Il tuo colore preferito', 'giallo');

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
