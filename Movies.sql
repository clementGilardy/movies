-- phpMyAdmin SQL Dump
-- version 4.4.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 08 Mai 2015 à 14:46
-- Version du serveur :  10.0.17-MariaDB-log
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `Movies`
--

CREATE TABLE IF NOT EXISTS `Movies` (
  `id` int(11) NOT NULL,
  `commentaires_id` int(11) DEFAULT NULL,
  `realisateur_id` int(11) DEFAULT NULL,
  `votes_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `synopsis` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_release` datetime NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jaquette` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Movies`
--

INSERT INTO `Movies` (`id`, `commentaires_id`, `realisateur_id`, `votes_id`, `titre`, `synopsis`, `date_release`, `duration`, `jaquette`) VALUES
(1, NULL, 10, NULL, 'Entre amis', ' Richard, Gilles et Philippe sont amis depuis près de cinquante ans. Le temps d’un été, ils embarquent avec leurs compagnes sur un magnifique voilier pour une croisière vers la Corse. Mais la cohabitation à bord d’un bateau n’est pas toujours facile. D’autant que chaque couple a ses problèmes, et que la météo leur réserve de grosses surprises... Entre rires et confessions, griefs et jalousies vont remonter à la surface. Chacun va devoir faire le point sur sa vie et sur ses relations aux autres. L’amitié résistera-t-elle au gros temps ? ', '2015-04-22 00:00:00', '1h30min ', 'uploads/poster/389456.jpg'),
(2, NULL, 17, NULL, 'Good Kill', ' Le Commandant Tommy Egan, pilote de chasse reconverti en pilote de drone, combat douze heures par jour les Talibans derrière sa télécommande, depuis sa base, à Las Vegas. De retour chez lui, il passe l’autre moitié de la journée à se quereller avec sa femme, Molly et ses enfants. Tommy remet cependant sa mission en question. Ne serait-il pas en train de générer davantage de terroristes qu’il n’en extermine ? L’histoire d’un soldat, une épopée lourde de conséquences. ', '2015-04-22 00:00:00', '1h42min ', 'uploads/poster/164909.jpg'),
(3, NULL, 25, NULL, 'Caprice', ' Clément, instituteur, est comblé jusqu''à l''étourdissement : Alicia, une actrice célèbre qu''il admire au plus haut point, devient sa compagne. Tout se complique quand il rencontre Caprice, une jeune femme excessive et débordante qui s''éprend de lui. Entretemps son meilleur ami, Thomas, se rapproche d''Alicia... ', '2015-04-22 00:00:00', '1h40min ', 'uploads/poster/088838.jpg'),
(4, NULL, 35, NULL, 'Broadway Therapy', ' Lorsqu’Isabella rencontre Arnold, un charmant metteur en scène de Broadway, sa vie bascule. À travers les souvenirs – plus ou moins farfelus – qu’elle confie à une journaliste, l’ancienne escort girl de Brooklyn venue tenter sa chance à Hollywood, raconte comment ce « rendez-vous » lui a tout à coup apporté une fortune, et une chance qui ne se refuse pas... Tous ceux qui se trouvent mêlés de près ou de loin à cette délirante histoire vont voir leur vie changer à jamais dans un enchaînement de péripéties aussi réjouissantes qu’imprévisibles. Personne n’en sortira indemne, ni l’épouse d’Arnold, Delta, ni le comédien Seth Gilbert, ni le dramaturge Joshua Fleet, pas même Jane, la psy d’Isabella... ', '2015-04-22 00:00:00', '1h33min ', 'uploads/poster/207677.jpg'),
(5, NULL, 45, NULL, 'Every Thing Will Be Fine', ' Après une dispute avec sa compagne, Tomas, un jeune écrivain en mal d’inspiration, conduit sa voiture sans but sur une route enneigée. En raison de l''épaisse couche de neige et du manque de visibilité, Tomas percute mortellement un jeune garçon qui traversait la route. Après plusieurs années, et alors que ses relations volent en éclats et que tout semble perdu, Tomas trouve un chemin inattendu vers la rédemption : sa tragédie se transforme en succès littéraire. Mais au moment où il pensait avoir passé ce terrible événement, Tomas apprend à ses dépens que certaines personnes n''en ont pas fini avec lui...&nbsp;&nbsp; \r\n\r\n ', '2015-04-22 00:00:00', '1h55min ', 'uploads/poster/343161.jpg'),
(7, NULL, 59, NULL, 'Le Dos Rouge', ' Un cinéaste reconnu travaille sur son prochain film, consacré à la monstruosité dans&nbsp;la peinture. Il est guidé dans ses recherches par une historienne d’art avec laquelle il entame des&nbsp;discussions étranges et passionnées. ', '2015-04-22 00:00:00', '2h7min ', 'uploads/poster/131138.jpg'),
(8, NULL, 61, NULL, 'Sayat Nova - La couleur de la grenade', ' Evocation de la vie du poète arménien Sayat Nova, dont on situe l''existence entre 1717 et 1794 en une serie de plusieurs tableaux. ', '2015-04-22 00:00:00', '1h19min ', 'uploads/poster/462092.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C1B2E806FF7747B4` (`titre`),
  ADD KEY `IDX_C1B2E80617C4B2B0` (`commentaires_id`),
  ADD KEY `IDX_C1B2E806F1D8422E` (`realisateur_id`),
  ADD KEY `IDX_C1B2E8065308DFC8` (`votes_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Movies`
--
ALTER TABLE `Movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Movies`
--
ALTER TABLE `Movies`
  ADD CONSTRAINT `FK_C1B2E80617C4B2B0` FOREIGN KEY (`commentaires_id`) REFERENCES `Commentaire` (`id`),
  ADD CONSTRAINT `FK_C1B2E8065308DFC8` FOREIGN KEY (`votes_id`) REFERENCES `Votes` (`id`),
  ADD CONSTRAINT `FK_C1B2E806F1D8422E` FOREIGN KEY (`realisateur_id`) REFERENCES `Actor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
