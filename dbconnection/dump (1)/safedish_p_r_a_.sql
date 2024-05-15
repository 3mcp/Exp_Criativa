-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: safedish
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `p_r_a_`
--

DROP TABLE IF EXISTS `p_r_a_`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_r_a_` (
  `IdPRA` int NOT NULL AUTO_INCREMENT,
  `NomePRA` varchar(200) DEFAULT NULL,
  `UsernamePRA` varchar(50) DEFAULT NULL,
  `EmailPRA` varchar(200) DEFAULT NULL,
  `SenhaPRA` varchar(200) DEFAULT NULL,
  `FotoPRA` mediumblob,
  `AdminUser` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`IdPRA`),
  UNIQUE KEY `UsernamePRA` (`UsernamePRA`),
  UNIQUE KEY `EmailPRA` (`EmailPRA`)
) ENGINE=InnoDB AUTO_INCREMENT=674 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_r_a_`
--

LOCK TABLES `p_r_a_` WRITE;
/*!40000 ALTER TABLE `p_r_a_` DISABLE KEYS */;
INSERT INTO `p_r_a_` VALUES (1,'SuperAdmin','sysAdmin','admin@gmail.com','a43c27c2babefd68df8a694900f30a1c',NULL,1),(595,'Usuario Teste','usertest','teste@teste.com','304f6f0d19e227540533c0204fb4406e',_binary '‰PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0\0\0\0\0\0\0Ã¦$\È\0\0\0sBIT\Û\áO\à\0\0\0	pHYs\0\0¿\0\0¿~sE\0\0\0tEXtSoftware\0www.inkscape.org›\î<\Z\0\0\0PLTEÿÿÿ\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0#·\á\0\0\0ÿtRNS\0	\n\r\Z !\"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~€‚ƒ„…†‡ˆ‰Š‹ŒŽ‘’“”•–—˜™š›œžŸ ¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶·¸¹º»¼½¾¿ÀÁ\Â\Ã\Ä\Å\Æ\Ç\È\É\Ê\Ë\Ì\Í\Î\Ï\Ð\Ñ\Ò\Ó\Ô\Õ\Ö\×\Ø\Ù\Ú\Û\Ü\Ý\Þ\ß\à\á\â\ã\ä\å\æ\ç\è\é\ê\ë\ì\í\î\ïðñòóôõö÷øùúûüýþ\ë\Ù5\0\0­IDAT\íÁ	€\Ïuþ?ð\ç÷;\ßÆ˜1ŒûÜ¦Œò#¿Ü*…JXm-\í/\åH[J¥ÿ¶t¨-m%Ò…\ÖFýv‰Z·~–²9BlŽ\"÷5c3cf¾\ÏH9\æøŸ\ãõþ\Ì\ëñ\0”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)ùSÒ®\ê\Ôó\áC†¾ø\ê›ïŒ›4u\ÚgŸM›:i\Ü;o¾ú\â\Ð!\î\Ùéª´?”§øk_{\ÏÀ\á\ã>ùbÃ† \àÀ\Æ/>7|\à=\×\ÖöC™\ËW\ãÊ»Ÿ\Z;s.#–»yþØ§î¾²†\Ê$1\r\î6cc6-“½qÆ°;\Ä@‰W¥\íc\ãWf\Ó\Ù+\Ç?Ö¶\n”PÕºþi\Þ\ÚnÏ¼?u­%Š\ï\Ò>l¦ƒ6\Ð\çR”e®\Z4\ã ]ppÆ «\Ê@¹)\æ\Ê\ç—\ä\ÐE9Kž¿2\Ê\Õ\ïzˆšzou(g®û\ã\ê \Å®þ\ãu(‡Ô¸ÿ\ïG(Î‘¿\ß_\ÊvUZT@¡\n=T\ÊF)}\äS´ü}S lQ±×œ<\Z oN¯ŠP+\ß\ã³4Æ‰\Ïz”‡²NË±Y4L\ÖØ–P–H\î÷\rôM¿d¨h]3ñ8u|\â5PQH°ž†[? *2-?Ì¥\ä~\Ø*l¾Î‹\é‹;û \ÂÿÀ&zÊ¦\â¡BU\å¹ýôœý\ÏU\nEƒ÷³\éI\Ù\ï7€*I«AzVpF+¨\â4ýŒ÷YS¨¢\\>¥ÀôË¡\n\Óð\ã K…\à\Ç\r¡Î—6¹€¥FÁ\ä4¨³¥~\ÏR%ÿƒT¨3*Ž\Êc©“7ª\"\ÔI1ý²T:\Ø/\nm×±\ÔZ\×¥\Ý\Å\ÓYªM¿¥Y\â+9,\år^IDi\å»o÷\Ü\çC©t\ÅrªS–_\Ò\'þ•<ªŸ\ä½R\æ†\ÍTg\Ù|J“\ä±T\ç›ŒR\ãŽ=T\ØsJ‡šÓ©\n5½&¼\Ï\×7ƒª}}ð¸\Zó¨Š1¯<­\ËAªb\ì\ïJCU¢1	ð¨æ›¨B°©9¼\È?\äUHNñ\Ãs\ê,¢\nÙ¢:ð˜ß¦S…!ý·ð’2c¨\Â4¦<£\îrª°-¯¸\é\0U\ÜO’O‘ü!0_\Ò4ªˆMK‚\á\Zn¤Š\ÂÆ†0\Ú]YTQÉº\æŠy*j¯\ÅÀP	3©,03Fª¾’\Ê+«\Ã@\r¿§²\È÷\raœ3¨,“q#\Ó\ã•…Nô€Qž¥²Ø³0G\ì*\ËMˆ…!*,¤²Á\Â\n0Bå¯©lñue Æ·T6ù¶Ä«÷•m¾«\á\ÒvP\ÙhG\ZDk¼—\ÊV{C°‡¨lv¨Äº.“\Êv™\×A¨öÇ©p¼=Dº5—\Ê¹·B ²©’}\ÄiEå˜¬\Ö¦I:•ƒÒ›@”K÷S9jÿ¥ä¢T\ÛyÄ¨µ•\Êq[kAˆ*¨\\°¡\nDH^M\åŠ\Õ\É \ÌT.ù¢\\\ç›Jåš©>¸\íe*½—õ¡rU¸ª]•«ò\ÚÁEP¹\ìHc¸¦\æ*\×\í¨	—”_E%ÀªòpE\ÌgT\"|7Œ¢b\\Ðƒf\Ë\Þ÷Ÿ¦}ðÁ´+þ³/›f\ë\Ç]‘M3\í™?¢Ï•—T‰\Ã9\âª\\reŸó÷\ÐL\ÙWÀa)\Ûhœ#‹\ß\í\×&\ÅJi\Ó\ï\Ý\ÅGhœm)p”\r³ö•kQ\à\ÚW\Ö\Ò0óüp\Ò\Ë4\É\Ñ\ÔA˜\ê<0\ã(Mò2Ô•\æ\Øõf»2ˆH™vo\î¢9º\Â1—e\ÒÁ]ˆB \ëü \r‘y’¸fH\Ñ\0Q«ÿúašaC\"\á›F#¬\ìK\Äß·ŒF˜\æƒ§‚SZÀBMÿR@<\\žCù\æ7…ÅšÌ¦|9—\Ãve\×Q¼U7\Ã7®¤x\ë\Ê\Ân#)\ÝÖ»}°…¯\ÛJ76k¤lƒm\âú lÁö°U\å=-8*	¶J\Z¤h{*\ÃNŸP´\í7\Âv7n§hŸÀF})Ú„$8 iE\ëÛ¤£`û:\Ã!÷Q°ci°I\ì\n\n6­\nSe\Z[{<G¹2zÀQ=2(\×s°E\Ã\\Šµ>K]O±r\Âþ¥k^8®\Â<Šµ\Ô\ë=B±\Þ	Àw(\Ö#°\\\Ý,\n•\ß.\éŸO¡²\ê\Âjÿ PGnkn9B¡þ‹u§P\Û\ZÁE¶Q¨\î°T\Ê~Ê´¼*\\Uu9eÚŸ+M¢L+“\á²ä•”i,Ôž2­©\×UZC™\Ú\Ã2ñ\Û(Òº\Ê ò:Š´-VJ‘\ÖW…U\×S¤¡°H\íc”hS\rQc%:VÖ˜L‰¾«1j}G‰&\Ã­ƒh[]Rw\n¶†|\Ë(P\æe\å²L\n´Ì‡\è\ÝC‚!L\ç ºQK\ØEž…8\ÏR ]	ˆ\Ö0\n4\Ýq|\Ó)\Ð0D©^6\åù6%~Ky²\ë!:QžôK \Ò%\é”\ç#D¥5\å)\è\0¡:PžÖˆ\Æ\Ê3b\r¦<…6”g.›Ky\Ú r‹)Î‘:¬\ÎŠ³»™òôh}(\ÏÍˆ\ÔWg„›Cq¾B„:Rœ#u \\#§#\"\â[EqzC¼\Þg•‘\èJq\æÀ\0s(NWDÀÿoJ“Q¨Aiþ\íGøºSœ\Þ0BoŠ\Óaóm 4«|0‚o¥\Ù\àC¸:Rœv0D;Š\Ó\áZDi\æ\Ãó)\Í\"„©9¥	6…1š)Ms„g\n¥™ƒL¡4S–zù\æD*’z‚\Â\ä\×C8FPšQ0\Ê(J3a¨Ia2«À(U2)Lf„n¥\n\Ã¥4ƒ²Ø\æH\"“x„\Â\ìŒE¨\î¡4#aœ‘”\æ„j\r…	Ö‡q\ê)\Ì\Z„¨5¥™Í¢4­š?Sš[` [(ÍŸ’¤£f“òm¢0G“Š(M©?¥ù=Bñ5…\ÉL„‘3)\Ì\×ASJóõ¥iŠ’½Ka‚i0TZÂ¼‹%¡0K`¬%\æHJÒ“\Ò<\nc=Jiz¢$K)L°ŒU\'Ha–¢(\ÍW0\ØW”¦Š÷:¥ƒ\r¤4¯£X¾”&K¥4;|(\ÎÕ”fŒ¶Š\Ò\\âŒ¤4OÁhOQš‘(†7¥i\0£5 4»ý(ZJ³†[GiÚ hoSša0\Ü0Jó6Š³\Ò\Ü\Ã\ÝLiöÅ (m)M~\"—˜OiÚ¢(\ïSš\Õ0\ÞjJó>Š8@iF\Ãx£)Í\0\n×ž\ât‡ñºSœö(\Ü{§.ŒW—â¼‡\Âm§4;\á;)\Ívª!\Åùð\Åiˆ\Â 8ý\áý)\Î\0f>\ÅihFq\æ£	9”&7\0\äRšœ\\¨#\Å\ÙO\ØHq:\âB£)\Î,x\Â,Š3\Z\ÚBqÞ‚\'¼Eq¶\ài”\ç1x\Âc”\'\r\ç\ëOyn‡\'\ÜNyú\ã|³)\ÏÁþ‹ò\Ì\ÆybSœ`<<!>HqŽ\Ç\â\\­)\Ï.x\Ä.\Ê\Ó\Z\çz‚ò,†G,¦<O\à\\\Ó(\Ïx\Ä\Ê3\r\ç\ÚGy†\Â#†Rž}8G}\n\ÔÑŸ\Õ\Ç\Ù\î£@½\à½(\Ð}8\Û8\nt<\â.\n4g\Û@nƒG\ÜF6\à,)”¨\r<¢\r%JÁ/:Q¢fðˆf”¨~1œ5€G4 D\Ãñ‹/(QmxDmJô~\æË¢D\ÉðˆdJ”\å\Ã©)\0P¤TœÑ…\å\Â3r)Qœ1”e\Â32)\ÑPœñ7Jtžq‚ý\rgl¢H1ðˆŠ´	?)W@‘\Ê\Ã#(RA9œÖ‚2U†GT¦L-pZo\ÊTQ‡2õ\ÆioR¦4xD}\Êô&Nûœ25G\\N™>\Çi)Ó•ðˆÖ”\é N©J¡ºÀ#:Q¨ª8©…zñ\0…j…“ºQ¨\à\ÏS¨n8i…\ZC¡†\à¤÷(Ô§ðˆO)\Ô{8i.…Z	øšB\Í\ÅI›(\ÔNx\Än\nµ	?ò\åP¨¼xBL>…\Êñ¨I±.\'\\B±j¸šb\ÝO\èH±®ð;Š5ž0býÀ\Ók<<a<\Åz\ZÀ8Šõ/xÂ¿(\Ö8\0³)V:<!ƒb\Í°œrU‡Ô \\\Ël¡\\m\á7R®-\02(\×\Óð€Á”+P°Yð€™,€j,\Ý\ãùQ°jhH\É\Z\Âx\r)YC\\K\É\î‡ñ\î§d×¢%û\0Æ›HÉº 7%\Û\ã}G\ÉzcE«\ÃÕ hƒ0œ¢=\Ãõ¦h\Ã1Ž¢-…\á>¡h\ãð1EÖ†\Ñ\Ê¥hce{F»•²\ÍÀ\Êö%Œöe›ƒ\Ï)[°Löeû_R¸þ0\ØS¸/±’\Â-Á†Q¸•XK\á‚5a,\ß÷n-6QºG`¬(\Ý&|O\éþ	cM t\ßc7¥+¨C%dQº\Ý8DñúÁP=(\Þ!¥x‹`¨…\ï(NP¼`c\éWAŠwA\Ê÷!Œô\å\"—ò\å_%eR¾d\Ñ\0c` \'h€L¦rkÁ8\í4ÀA\ì¥	FÀ8\Ýh‚\Ý\ØA«\Ó,§	¶c0†iC#l\Æ\Z!=	fYB#|‹µ4\Ã`\å6ša5V\Ò{\ãaÿ74\Ã2,¥!†Aþ‡†X‚\Ò\ÛcaŒ¸­4\ÄB|JSô1¡)þI4Å¡ª0D¥}4\ÅdŒ¤1>‚!þBcŒ\Âs4G¡#\Íñ¥9v\'\Ã\0É»hŽþ\èAƒŒƒ\Æ\Ó ÿƒN4I[ˆ×ž&¹\×\Ò$[\ËA¸\Ä4I+4¢QF@¸÷i”ú¨E£´‚hmi–”£YþÁ¶\Ñ(Á “fy‚¦Y\Ò|C³œh±®\Ò,›L£a\Ö\'C¨r›i˜\Ï¼F\Ó,@¦\É4\Í\0\Ñ8c!\Ò \Z\ç\0hžA\è–\Z\ç~\0i4O°+\ÄiAó´W@óoa*l¤.Ãv\Ð@{\êB”˜Y4Q~´ˆ&Z›A|i¢C8i<4;rŒ¢‘\Öà¤§i¦·!\Æ4\ÓLœÔ†zB ¡F\ã¤V4TÁý¡W†\Z€“ª\ÐX\ÏA€^ù4Uœ’Ec‰Ûž ¹\ê\â”oh®™ñp\×K4W–§L§Á–¦ÀEþwi°\å8\íušlc=¸&v\nM6§õ£\Ñv7KR\Òhƒq\Ú-4Û‘\áŠ\Æ[i¶\ÛqZ\Z\r—\Û\r.\èšE\Ã]Œ\Ó\âN\ÐpÁpš\ïù \rwÜŸ,£ñþ^	Žª0\Æ[3Þ¤ù~¸j³æ›Œ3\î¢¼€C\â^- Àu\è	\Ë.†#\Z­¡\'\\ƒŸ\í¤\'€\íüe\Óò\âñ³ÿ¥G¬»\Z6kµ‚±\Z¿xœ^[	6ª:>H¯x¿hM\ï\Ø\ß36‰\éŸA\ï\è…_\Ä\å\ÐCþs_\0v¸u-½¤Î²”ž²µO,,\Óm\r=%Ë³¼F\Ùþ`X¨L\ß\ï\è1ÿ‡³\ÝA\Ï\ÙùHYX$ñ\É\ÝôœWp¶šô =\Ê\Ã•_8L\êŠsl§›\Ú9Qñ_ÿ\î1zR\rœc\n=*}\\[?\"\ä¿þ\í½ô¨õ8Wz×ž‘­>ÿõo\ï¥wÆ¹ZP¶\à\ÒÁ\rºc¤¶¾\Ô2að_ÿö^zÚ¯q®\Ø\ã”+gV\ß\êøQó=Œ\\\î\Ê÷z7	 D1zŒ\\r”‘\Ë¿“\âT\ÄyS¨Œ¿Þ™ˆŸ\ÔY\Ë\èdÿ\ë­{úQ„À\å=G/=\Æ\è\ìj\ß5£vS¶•8\ßpJtðÝ›cq–\ÄYŒ\Þ\Ño¿˜9á§\êÖ®yjròE\Ínº³\ï\à\ácþwÁšlFoEMœ\ä¿nô\n6\ç\ëBqrþ\Ö9\ç‰MÑ¦\Æ\ãÿõ\ï\ì£T\íp¾Šy”eIßŠ(Lÿ|Š|çˆ¹q\Â1J”[˜OAþ3ô\"\å¶,\nu\ì\\ \é”çŸ¸P?J‘ùNk§\ÉŠ´\ã¿Q¨\ËG¦0Cq¡ZAŠ°¾_\"J8‰}Y\rE)\Û}a’\\…B,£ûò§µE(ºeP˜¼¡\'õ\Å=c¿…B·\íÿc]„¨\ÞŠ²¡9JR¦÷·\â\Ï(Ì¥t×²{\Ê t1\Ï\äQŒ\à¨x„Àw\ë\ç\ávj]4û*„©õ\nñ\ÃMU³óèº£eQ¨?\Ò-ÁOš#|‰)Â‡\ÉC\Ý72\é²i(\\Kº£`jcD\æŽ\èºC¿E˜*>@Wõ@\á|;é‚¼‰\r±„s\èª\à\äš_ùg2èž¼J(\Âh:.wL*¢’:ƒ.Z\Ú\n‘©øò1º\ås¥-œz¢\Öa#]²£;\"Wmd\Ýñ(Š8LG-n	+\Ä>™I}&Q©;.n¨‡\"M¢ƒ6v†UªO\ÒaÁ‰5µúS‚t\Ü*\í\×tÌ¾°P‹\éA:iIsX\â\ê\ÕtÚ“(Z¹\ãtÆ±a‰°\Øe\ãO\Ð!Á™\×Á*þ‡\ÓQ5QŒOèˆ¿Õ‚\rj¿‘EäŒ½Vª<¦€š\â\ÜK\ì¸6©ø\Ì\Ú\ìÐ‹\Õ`µ\æ_\Ñ9÷¢8•òh·‚7\Ë\Ã>ño£¶>’\0øz\í§CŽ\'¢Xi³\Õ\Ía¯À\íe\ÓîŒM’ß§3¦ x÷\ÒVÇžÀ~I=\Ðj\Ë­;µÿN¸\r\Å+{6šý+8¤\ÖÀoh¡õO_»%O¤ýöP‚Wi›\ã\ÂI‡\ï %¶oGt\ÞK»BIRƒ´Éš†p˜¯é€™\éŒJöÿ=wµN©ü1m\Ö%šE[G”üM|šÁˆd\Íý\Ã5qpV·C´\Ó”¬#\í°·\Ü\ãoöÄ§‡–ôO¶À\Õ\ç\ÓF¡dþm´\Þ?ª\ÂmU¯\íó§™›òX‚ü-³G=\Ü\îW~¸\ÅÿRv9–Œ¦\Õr±\r:\r7kñ\ê\ïö\ãYrl[·t\î˜\';]\×uL§MþŒPTÎ¡µvµ„Dþ¤Z—6¿\á†—\ÕN@”\ÔÕ´G3„d-µ¬&TxÊŽ§–#4­i¥Ie¡\Â\Ö\'‡Ö»!ZE\Ë<‰f\ß\Ój‡\ã¢Þ´Jz¨\È\ÔXC‹½P•K§56¦AE*i!-¬ %–T€Š\\\ÜZi>B—¤æ–ƒŠ†\ï\rZ\è6„a£÷÷8¨(=¤U\Öú†.ŒÚ„¨¨\Ý}‚ù\Â³ƒQz\Ëe›\Ó\Û\Ë¡¬\Ñ>‡Vx\áI\Éd4AY\åöŒ\Þþx„\éF\á(\ëü&ŸQ{\Z\áªp˜e¥»¥¬Š\Ûÿc¤þêƒ²T\Ï £ó\ZÂ—°‘™e±•\ÜZˆÀ\ãŒ\È\ÒrP–\ÈhŒA$\Ê\îd\ÖU„²ÁŒ\\ND\ä÷\ß÷5¡\ìPf)#6‘‰\Ý\Æpe_ej?0BYU¡û®žPvizœ‘†H\ÅldxÞ‡²\Ïo‘\Ã±n\Ëò2P6z‰‘Œ\Èù\Ö2\ëB\Ù\É7“\á\ÛSQ\è\Ì\Ð\Üe¯J»¶~ˆ\Ê\n†\ìPv»•\á\Ú‡¨´g¨–ø l÷>\Ã\ÔQZ\Â\Ð\ä4€²_ù-\Ër¢Ô†¡y\n\Ê	\×0Á+µùÅš\0”#†3“½¦ù,Y~3(g”YË­¼Á’½\nå”¦\ÕÓ°B\Âv–ds<”c\Æ3D\Û\Ê\Â·±$m¡œS\ã(CóX\ä#o”“†2$‹`•\ê\é,N°)”“\Ê\íd\nšÀ2°8C9«Cð6¬\ãû‚E\ËOƒr–\ïk–hg,\Ô0—E\Z\å´6,Q\'X\ê%»6”\ã\æ²\ÃZe6±¯C9¯‹w¸\Z,v=—[\Êy¾\r,V/Xn<õ!”~\Ï\â,„õ*\íga®…rC¹C,\Úñ‹aƒß±ÿ†r\Ç\Ë,\Ú \Øb./\Ô\ÊµóX”U\Ø\"õ8\Ïw4	\Ê%SX„œF°\É`žo”[Ú°\Â.•<\ÏPnñ\ïc¡\æú`›\Ôžc”{Æ°0kÀFwð¯@¹§ók\Øj\Ïv\r”{\â2x¡q°W\Ü\nþ\âP”‹þ\Êl.›]”ÎŸý\ÊMwð|y­`»_ógwC¹©\Üqžg(0‚?É¯åª™<×‚8 vO[\å®!<\Ç\Ö8¢\Þažò,”»n\âÙŽ6†C:ñ”\ÎP\îªÈ³Ç¼Î“.‚r\Ùþbœû/’™>(—}ÄŸ\ÍôÁAu‘_B¹m \ÏXŸGuò(·\ÝÀŸ¤§Áa\â\ï¡Ü–\ä)·Ài/¯‚r\Ýnž2Î«S\Êukx\Ò¨Rj.´ªT)õ’û\ëB•V¯“ym J­Ád?¨Ò«\'\ÇB•b·-ƒ*\ÅR«C)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”RJ)¥”\áþ?Œ­¸\è\'¶¥ó\0\0\0\0IEND®B`‚',0);
/*!40000 ALTER TABLE `p_r_a_` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-15 10:29:52
