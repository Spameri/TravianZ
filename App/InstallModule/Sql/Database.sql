SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `a2b`
--

CREATE TABLE IF NOT EXISTS `a2b` (
 `id` int(11) NULL AUTO_INCREMENT,
 `ckey` varchar(255) NULL,
 `time_check` int(11) NULL DEFAULT '0',
 `to_vid` int(11) NULL,
 `u1` int(11) NULL,
 `u2` int(11) NULL,
 `u3` int(11) NULL,
 `u4` int(11) NULL,
 `u5` int(11) NULL,
 `u6` int(11) NULL,
 `u7` int(11) NULL,
 `u8` int(11) NULL,
 `u9` int(11) NULL,
 `u10` int(11) NULL,
 `u11` int(11) NULL,
 `type` smallint(1) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `a2b`
--

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
 `id` INT( 25 ) NULL AUTO_INCREMENT PRIMARY KEY ,
 `userid` INT( 25 ) NULL ,
 `name` VARCHAR( 50 ) NULL ,
 `url` VARCHAR( 150 ) NULL ,
 `pos` INT( 10 ) NULL
) ENGINE = MYISAM;

--
-- Dumping data for table `links`
--

-- --------------------------------------------------------

--
-- Table structure for table `abdata`
--

CREATE TABLE IF NOT EXISTS `abdata` (
 `vref` int(11) NULL,
 `a1` tinyint(2) NULL DEFAULT '0',
 `a2` tinyint(2) NULL DEFAULT '0',
 `a3` tinyint(2) NULL DEFAULT '0',
 `a4` tinyint(2) NULL DEFAULT '0',
 `a5` tinyint(2) NULL DEFAULT '0',
 `a6` tinyint(2) NULL DEFAULT '0',
 `a7` tinyint(2) NULL DEFAULT '0',
 `a8` tinyint(2) NULL DEFAULT '0',
 `b1` tinyint(2) NULL DEFAULT '0',
 `b2` tinyint(2) NULL DEFAULT '0',
 `b3` tinyint(2) NULL DEFAULT '0',
 `b4` tinyint(2) NULL DEFAULT '0',
 `b5` tinyint(2) NULL DEFAULT '0',
 `b6` tinyint(2) NULL DEFAULT '0',
 `b7` tinyint(2) NULL DEFAULT '0',
 `b8` tinyint(2) NULL DEFAULT '0',
 PRIMARY KEY (`vref`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `abdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `activate`
--

CREATE TABLE IF NOT EXISTS `activate` (
 `id` int(255) NULL AUTO_INCREMENT,
 `username` varchar(100) NULL,
 `password` varchar(100) NULL,
 `email` text NULL,
 `tribe` tinyint(1) NULL,
 `access` tinyint(1) NULL DEFAULT '1',
 `act` varchar(10) NULL,
 `timestamp` int(11) NULL DEFAULT '0',
 `location` text NULL,
 `act2` varchar(10) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `activate`
--


-- --------------------------------------------------------

--
-- Table structure for table `active`
--

CREATE TABLE IF NOT EXISTS `active` (
 `username` varchar(100) NULL,
 `timestamp` int(11) NULL,
 PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `active`
--


-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE IF NOT EXISTS `admin_log` (
 `id` int(11) NULL AUTO_INCREMENT,
 `user` text NULL,
 `log` text NULL,
 `time` int(25) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `admin_log`
--


-- --------------------------------------------------------
--
-- Table structure for table `allimedal`
--

CREATE TABLE IF NOT EXISTS `allimedal` (
 `id` int(11) NULL AUTO_INCREMENT,
 `allyid` int(11) NULL,
 `categorie` int(11) NULL,
 `plaats` int(11) NULL,
 `week` int(11) NULL,
 `points` bigint(255) NULL,
 `img` varchar(255) NULL,
 `del` tinyint(1) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `artefacts`
--

CREATE TABLE IF NOT EXISTS `artefacts` (
 `id` int(11) NULL AUTO_INCREMENT,
 `vref` int(11) NULL,
 `owner` int(11) NULL,
 `type` tinyint(2) NULL,
 `size` tinyint(1) NULL,
 `conquered` int(11) NULL,
 `name` varchar(100) NULL,
 `desc` text NULL,
 `effect` varchar(100) NULL,
 `img` varchar(20) NULL,
 `active` tinyint(1) NULL,
 `kind` tinyint(1) NULL DEFAULT '0',
 `bad_effect` tinyint(1) NULL DEFAULT '0',
 `effect2` tinyint(2) NULL DEFAULT '0',
 `lastupdate` int(11) NULL DEFAULT '0', 
 PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Table structure for table `s1_artefacts`
--
-- --------------------------------------------------------

--
-- Table structure for table `alidata`
--

CREATE TABLE IF NOT EXISTS `alidata` (
 `id` int(11) NULL AUTO_INCREMENT,
 `name` varchar(100) NULL,
 `tag` varchar(100) NULL,
 `leader` int(11) NULL,
 `coor` int(11) NULL,
 `advisor` int(11) NULL,
 `recruiter` int(11) NULL,
 `notice` text NULL,
 `desc` text NULL,
 `max` tinyint(2) NULL,
 `ap` bigint(255) NULL DEFAULT '0',
 `dp` bigint(255) NULL DEFAULT '0',
 `Rc` bigint(255) NULL DEFAULT '0',
 `RR` bigint(255) NULL DEFAULT '0',
 `Aap` bigint(255) NULL DEFAULT '0',
 `Adp` bigint(255) NULL DEFAULT '0',
 `clp` bigint(255) NULL DEFAULT '0',
 `oldrank` bigint(255) NULL DEFAULT '0',
 `forumlink` varchar(150) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `alidata`
--


-- --------------------------------------------------------

--
-- Table structure for table `ali_invite`
--

CREATE TABLE IF NOT EXISTS `ali_invite` (
 `id` int(11) NULL AUTO_INCREMENT,
 `uid` int(11) NULL,
 `alliance` int(11) NULL,
 `sender` int(11) NULL,
 `timestamp` int(11) NULL,
 `accept` int(1) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ali_invite`
--


-- --------------------------------------------------------

--
-- Table structure for table `ali_log`
--

CREATE TABLE IF NOT EXISTS `ali_log` (
 `id` int(11) NULL AUTO_INCREMENT,
 `aid` int(11) NULL,
 `comment` text NULL,
 `date` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ali_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `ali_permission`
--

CREATE TABLE IF NOT EXISTS `ali_permission` (
 `id` int(11) NULL AUTO_INCREMENT,
 `uid` int(11) NULL,
 `alliance` int(11) NULL,
 `rank` varchar(100) NULL,
 `opt1` int(1) NULL DEFAULT '0',
 `opt2` int(1) NULL DEFAULT '0',
 `opt3` int(1) NULL DEFAULT '0',
 `opt4` int(1) NULL DEFAULT '0',
 `opt5` int(1) NULL DEFAULT '0',
 `opt6` int(1) NULL DEFAULT '0',
 `opt7` int(1) NULL DEFAULT '0',
 `opt8` int(1) NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ali_permission`
--


-- --------------------------------------------------------

--
-- Table structure for table `attacks`
--

CREATE TABLE IF NOT EXISTS `attacks` (
 `id` int(11) NULL AUTO_INCREMENT,
 `vref` int(11) NULL,
 `t1` int(11) NULL,
 `t2` int(11) NULL,
 `t3` int(11) NULL,
 `t4` int(11) NULL,
 `t5` int(11) NULL,
 `t6` int(11) NULL,
 `t7` int(11) NULL,
 `t8` int(11) NULL,
 `t9` int(11) NULL,
 `t10` int(11) NULL,
 `t11` int(11) NULL,
 `attack_type` tinyint(1) NULL,
 `ctar1` int(11) NULL, 
 `ctar2` int(11) NULL,
 `spy` int(11) NULL, 
 `b1` tinyint(1) NULL, 
 `b2` tinyint(1) NULL, 
 `b3` tinyint(1) NULL, 
 `b4` tinyint(1) NULL, 
 `b5` tinyint(1) NULL, 
 `b6` tinyint(1) NULL, 
 `b7` tinyint(1) NULL, 
 `b8` tinyint(1) NULL, 
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `attacks`
--


-- --------------------------------------------------------

--
-- Table structure for table `banlist`
--

CREATE TABLE IF NOT EXISTS `banlist` (
 `id` int(11) NULL AUTO_INCREMENT,
 `uid` int(11) NULL,
 `name` varchar(100) NULL,
 `reason` varchar(30) NULL,
 `time` int(11) NULL,
 `end` varchar(10) NULL,
 `admin` int(11) NULL,
 `active` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banlist`
--


-- --------------------------------------------------------

--
-- Table structure for table `bdata`
--

CREATE TABLE IF NOT EXISTS `bdata` (
 `id` int(11) NULL AUTO_INCREMENT,
 `wid` int(11) NULL,
 `field` tinyint(2) NULL,
 `type` tinyint(2) NULL,
 `loopcon` tinyint(1) NULL,
 `timestamp` int(11) NULL,
 `master` tinyint(1) NULL,
 `level` tinyint(3) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `build_log`
--

CREATE TABLE IF NOT EXISTS `build_log` (
 `id` int(11) NULL AUTO_INCREMENT,
 `wid` int(11) NULL,
 `log` text NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `build_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
 `id` int(20) NULL AUTO_INCREMENT,
 `id_user` int(11) NULL,
 `name` varchar(255) NULL,
 `alli` varchar(255) NULL,
 `date` varchar(255) NULL,
 `msg` varchar(255) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
 `lastgavemedal` int(11) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
INSERT INTO `config` VALUES (0);

--
-- Dumping data for table `config`
--


-- --------------------------------------------------------

--
-- Table structure for table `deleting`
--

CREATE TABLE IF NOT EXISTS `deleting` (
 `uid` int(11) NULL,
 `timestamp` int(11) NULL,
 PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deleting`
--


-- --------------------------------------------------------

--
-- Table structure for table `demolition`
--

CREATE TABLE IF NOT EXISTS `demolition` (
 `vref` int(11) NULL,
 `buildnumber` int(11) NULL DEFAULT '0',
 `lvl` int(11) NULL DEFAULT '0',
 `timetofinish` int(11) NULL,
 PRIMARY KEY (`vref`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `demolition`
--


-- --------------------------------------------------------

--
-- Table structure for table `diplomacy`
--

CREATE TABLE IF NOT EXISTS `diplomacy` (
 `id` int(11) NULL AUTO_INCREMENT,
 `alli1` int(11) NULL,
 `alli2` int(11) NULL,
 `type` tinyint(1) NULL,
 `accepted` tinyint(1) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
--
-- Dumping data for table `diplomacy`
--


-- --------------------------------------------------------

--
-- Table structure for table `enforcement`
--

CREATE TABLE IF NOT EXISTS `enforcement` (
 `id` int(11) NULL AUTO_INCREMENT,
 `u1` int(11) NULL DEFAULT '0',
 `u2` int(11) NULL DEFAULT '0',
 `u3` int(11) NULL DEFAULT '0',
 `u4` int(11) NULL DEFAULT '0',
 `u5` int(11) NULL DEFAULT '0',
 `u6` int(11) NULL DEFAULT '0',
 `u7` int(11) NULL DEFAULT '0',
 `u8` int(11) NULL DEFAULT '0',
 `u9` int(11) NULL DEFAULT '0',
 `u10` int(11) NULL DEFAULT '0',
 `u11` int(11) NULL DEFAULT '0',
 `u12` int(11) NULL DEFAULT '0',
 `u13` int(11) NULL DEFAULT '0',
 `u14` int(11) NULL DEFAULT '0',
 `u15` int(11) NULL DEFAULT '0',
 `u16` int(11) NULL DEFAULT '0',
 `u17` int(11) NULL DEFAULT '0',
 `u18` int(11) NULL DEFAULT '0',
 `u19` int(11) NULL DEFAULT '0',
 `u20` int(11) NULL DEFAULT '0',
 `u21` int(11) NULL DEFAULT '0',
 `u22` int(11) NULL DEFAULT '0',
 `u23` int(11) NULL DEFAULT '0',
 `u24` int(11) NULL DEFAULT '0',
 `u25` int(11) NULL DEFAULT '0',
 `u26` int(11) NULL DEFAULT '0',
 `u27` int(11) NULL DEFAULT '0',
 `u28` int(11) NULL DEFAULT '0',
 `u29` int(11) NULL DEFAULT '0',
 `u30` int(11) NULL DEFAULT '0',
 `u31` int(11) NULL DEFAULT '0',
 `u32` int(11) NULL DEFAULT '0',
 `u33` int(11) NULL DEFAULT '0',
 `u34` int(11) NULL DEFAULT '0',
 `u35` int(11) NULL DEFAULT '0',
 `u36` int(11) NULL DEFAULT '0',
 `u37` int(11) NULL DEFAULT '0',
 `u38` int(11) NULL DEFAULT '0',
 `u39` int(11) NULL DEFAULT '0',
 `u40` int(11) NULL DEFAULT '0',
 `u41` int(11) NULL DEFAULT '0',
 `u42` int(11) NULL DEFAULT '0',
 `u43` int(11) NULL DEFAULT '0',
 `u44` int(11) NULL DEFAULT '0',
 `u45` int(11) NULL DEFAULT '0',
 `u46` int(11) NULL DEFAULT '0',
 `u47` int(11) NULL DEFAULT '0',
 `u48` int(11) NULL DEFAULT '0',
 `u49` int(11) NULL DEFAULT '0',
 `u50` int(11) NULL DEFAULT '0',
 `hero` tinyint(1) NULL DEFAULT '0',
 `from` int(11) NULL DEFAULT '0',
 `vref` int(11) NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `enforcement`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmlist`
--

CREATE TABLE IF NOT EXISTS `farmlist` (
 `id` int(11) NULL AUTO_INCREMENT,
 `wref` int(11) NULL,
 `owner` int(11) NULL,
 `name` varchar(100) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `farmlist`
--


-- --------------------------------------------------------

--
-- Table structure for table `fdata`
--

CREATE TABLE IF NOT EXISTS `fdata` (
 `vref` int(11) NULL,
 `f1` tinyint(2) NULL DEFAULT '0',
 `f1t` tinyint(2) NULL DEFAULT '0',
 `f2` tinyint(2) NULL DEFAULT '0',
 `f2t` tinyint(2) NULL DEFAULT '0',
 `f3` tinyint(2) NULL DEFAULT '0',
 `f3t` tinyint(2) NULL DEFAULT '0',
 `f4` tinyint(2) NULL DEFAULT '0',
 `f4t` tinyint(2) NULL DEFAULT '0',
 `f5` tinyint(2) NULL DEFAULT '0',
 `f5t` tinyint(2) NULL DEFAULT '0',
 `f6` tinyint(2) NULL DEFAULT '0',
 `f6t` tinyint(2) NULL DEFAULT '0',
 `f7` tinyint(2) NULL DEFAULT '0',
 `f7t` tinyint(2) NULL DEFAULT '0',
 `f8` tinyint(2) NULL DEFAULT '0',
 `f8t` tinyint(2) NULL DEFAULT '0',
 `f9` tinyint(2) NULL DEFAULT '0',
 `f9t` tinyint(2) NULL DEFAULT '0',
 `f10` tinyint(2) NULL DEFAULT '0',
 `f10t` tinyint(2) NULL DEFAULT '0',
 `f11` tinyint(2) NULL DEFAULT '0',
 `f11t` tinyint(2) NULL DEFAULT '0',
 `f12` tinyint(2) NULL DEFAULT '0',
 `f12t` tinyint(2) NULL DEFAULT '0',
 `f13` tinyint(2) NULL DEFAULT '0',
 `f13t` tinyint(2) NULL DEFAULT '0',
 `f14` tinyint(2) NULL DEFAULT '0',
 `f14t` tinyint(2) NULL DEFAULT '0',
 `f15` tinyint(2) NULL DEFAULT '0',
 `f15t` tinyint(2) NULL DEFAULT '0',
 `f16` tinyint(2) NULL DEFAULT '0',
 `f16t` tinyint(2) NULL DEFAULT '0',
 `f17` tinyint(2) NULL DEFAULT '0',
 `f17t` tinyint(2) NULL DEFAULT '0',
 `f18` tinyint(2) NULL DEFAULT '0',
 `f18t` tinyint(2) NULL DEFAULT '0',
 `f19` tinyint(2) NULL DEFAULT '0',
 `f19t` tinyint(2) NULL DEFAULT '0',
 `f20` tinyint(2) NULL DEFAULT '0',
 `f20t` tinyint(2) NULL DEFAULT '0',
 `f21` tinyint(2) NULL DEFAULT '0',
 `f21t` tinyint(2) NULL DEFAULT '0',
 `f22` tinyint(2) NULL DEFAULT '0',
 `f22t` tinyint(2) NULL DEFAULT '0',
 `f23` tinyint(2) NULL DEFAULT '0',
 `f23t` tinyint(2) NULL DEFAULT '0',
 `f24` tinyint(2) NULL DEFAULT '0',
 `f24t` tinyint(2) NULL DEFAULT '0',
 `f25` tinyint(2) NULL DEFAULT '0',
 `f25t` tinyint(2) NULL DEFAULT '0',
 `f26` tinyint(2) NULL DEFAULT '0',
 `f26t` tinyint(2) NULL DEFAULT '0',
 `f27` tinyint(2) NULL DEFAULT '0',
 `f27t` tinyint(2) NULL DEFAULT '0',
 `f28` tinyint(2) NULL DEFAULT '0',
 `f28t` tinyint(2) NULL DEFAULT '0',
 `f29` tinyint(2) NULL DEFAULT '0',
 `f29t` tinyint(2) NULL DEFAULT '0',
 `f30` tinyint(2) NULL DEFAULT '0',
 `f30t` tinyint(2) NULL DEFAULT '0',
 `f31` tinyint(2) NULL DEFAULT '0',
 `f31t` tinyint(2) NULL DEFAULT '0',
 `f32` tinyint(2) NULL DEFAULT '0',
 `f32t` tinyint(2) NULL DEFAULT '0',
 `f33` tinyint(2) NULL DEFAULT '0',
 `f33t` tinyint(2) NULL DEFAULT '0',
 `f34` tinyint(2) NULL DEFAULT '0',
 `f34t` tinyint(2) NULL DEFAULT '0',
 `f35` tinyint(2) NULL DEFAULT '0',
 `f35t` tinyint(2) NULL DEFAULT '0',
 `f36` tinyint(2) NULL DEFAULT '0',
 `f36t` tinyint(2) NULL DEFAULT '0',
 `f37` tinyint(2) NULL DEFAULT '0',
 `f37t` tinyint(2) NULL DEFAULT '0',
 `f38` tinyint(2) NULL DEFAULT '0',
 `f38t` tinyint(2) NULL DEFAULT '0',
 `f39` tinyint(2) NULL DEFAULT '0',
 `f39t` tinyint(2) NULL DEFAULT '0',
 `f40` tinyint(2) NULL DEFAULT '0',
 `f40t` tinyint(2) NULL DEFAULT '0',
 `f99` tinyint(2) NULL DEFAULT '0',
 `f99t` tinyint(2) NULL DEFAULT '0',
 `wwname` varchar(100) NULL DEFAULT 'World Wonder',
 PRIMARY KEY (`vref`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `fdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `forum_cat`
--

CREATE TABLE IF NOT EXISTS `forum_cat` (
 `id` int(11) NULL AUTO_INCREMENT,
 `owner` varchar(255) NULL,
 `alliance` varchar(255) NULL,
 `forum_name` varchar(255) NULL,
 `forum_des` text NULL,
 `forum_area` varchar(255) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forum_cat`
--


-- --------------------------------------------------------

--
-- Table structure for table `forum_edit`
--

CREATE TABLE IF NOT EXISTS `forum_edit` (
 `id` int(11) NULL AUTO_INCREMENT,
 `alliance` varchar(255) NULL,
 `result` varchar(255) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forum_edit`
--


-- --------------------------------------------------------

--
-- Table structure for table `forum_post`
--

CREATE TABLE IF NOT EXISTS `forum_post` (
 `id` int(11) NULL AUTO_INCREMENT,
 `post` longtext NULL,
 `topic` varchar(255) NULL,
 `owner` varchar(255) NULL,
 `date` varchar(255) NULL,
 `alliance0` int(11) NULL,
 `player0` int(11) NULL,
 `coor0` int(11) NULL,
 `report0` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forum_post`
--


-- --------------------------------------------------------

--
-- Table structure for table `forum_survey`
--

CREATE TABLE IF NOT EXISTS `forum_survey` (
 `topic` int(11) NULL,
 `title` varchar(255) NULL,
 `option1` varchar(255) NULL,
 `option2` varchar(255) NULL,
 `option3` varchar(255) NULL,
 `option4` varchar(255) NULL,
 `option5` varchar(255) NULL,
 `option6` varchar(255) NULL,
 `option7` varchar(255) NULL,
 `option8` varchar(255) NULL,
 `vote1` int(11) NULL DEFAULT '0',
 `vote2` int(11) NULL DEFAULT '0',
 `vote3` int(11) NULL DEFAULT '0',
 `vote4` int(11) NULL DEFAULT '0',
 `vote5` int(11) NULL DEFAULT '0',
 `vote6` int(11) NULL DEFAULT '0',
 `vote7` int(11) NULL DEFAULT '0',
 `vote8` int(11) NULL DEFAULT '0',
 `voted` text NULL,
 `ends` int(11) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forum_survey`
--


-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

CREATE TABLE IF NOT EXISTS `forum_topic` (
 `id` int(11) NULL AUTO_INCREMENT,
 `title` varchar(255) NULL,
 `post` longtext NULL,
 `date` varchar(255) NULL,
 `post_date` varchar(255) NULL,
 `cat` varchar(255) NULL,
 `owner` varchar(255) NULL,
 `alliance` varchar(255) NULL,
 `ends` varchar(255) NULL,
 `close` varchar(255) NULL,
 `stick` varchar(255) NULL,
 `alliance0` int(11) NULL,
 `player0` int(11) NULL,
 `coor0` int(11) NULL,
 `report0` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `forum_topic`
--


-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE IF NOT EXISTS `general` (
 `id` int(11) NULL AUTO_INCREMENT,
 `casualties` int(11) NULL,
 `time` int(11) NULL,
 `shown` tinyint(1) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `general`
--


-- --------------------------------------------------------

--
-- Table structure for table `gold_fin_log`
--

CREATE TABLE IF NOT EXISTS `gold_fin_log` (
 `id` int(11) NULL AUTO_INCREMENT,
 `wid` int(11) NULL,
 `log` text NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gold_fin_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE IF NOT EXISTS `hero` (
 `heroid` int(11) NULL AUTO_INCREMENT,
 `uid` int(11) NULL,
 `unit` smallint(2) NULL,
 `name` tinytext NULL,
 `wref` int(11) NULL,
 `level` tinyint(3) NULL,
 `points` int(3) NULL,
 `experience` int(11) NULL,
 `dead` tinyint(1) NULL,
 `health` float(12,9) NULL,
 `attack` tinyint(3) NULL,
 `defence` tinyint(3) NULL,
 `attackbonus` tinyint(3) NULL,
 `defencebonus` tinyint(3) NULL,
 `regeneration` tinyint(3) NULL,
 `autoregen` int(2) NULL,
 `lastupdate` int(11) NULL,
 `trainingtime` int(11) NULL,
 `inrevive` tinyint(1) NULL,
 `intraining` tinyint(1) NULL,
 PRIMARY KEY (`heroid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `hero`
--



-- --------------------------------------------------------

--
-- Table structure for table `illegal_log`
--

CREATE TABLE IF NOT EXISTS `illegal_log` (
 `id` int(11) NULL AUTO_INCREMENT,
 `user` int(11) NULL,
 `log` text NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `illegal_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE IF NOT EXISTS `login_log` (
 `id` int(11) NULL AUTO_INCREMENT,
 `uid` int(11) NULL,
 `ip` varchar(15) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE IF NOT EXISTS `market` (
 `id` int(11) NULL AUTO_INCREMENT,
 `vref` int(11) NULL,
 `gtype` tinyint(1) NULL,
 `gamt` int(11) NULL,
 `wtype` tinyint(1) NULL,
 `wamt` int(11) NULL,
 `accept` tinyint(1) NULL,
 `maxtime` int(11) NULL,
 `alliance` int(11) NULL,
 `merchant` tinyint(2) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `market`
--


-- --------------------------------------------------------

--
-- Table structure for table `market_log`
--

CREATE TABLE IF NOT EXISTS `market_log` (
 `id` int(11) NULL AUTO_INCREMENT,
 `wid` int(11) NULL,
 `log` text NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `market_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `mdata`
--

CREATE TABLE IF NOT EXISTS `mdata` (
 `id` int(11) NULL AUTO_INCREMENT,
 `target` int(11) NULL,
 `owner` int(11) NULL,
 `topic` varchar(100) NULL,
 `message` text NULL,
 `viewed` tinyint(1) NULL,
 `archived` tinyint(1) NULL,
 `send` tinyint(1) NULL,
 `time` int(11) NULL DEFAULT '0',
 `deltarget` int(11) NULL,
 `delowner` int(11) NULL,
 `alliance` int(11) NULL,
 `player` int(11) NULL,
 `coor` int(11) NULL,
 `report` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `medal`
--

CREATE TABLE IF NOT EXISTS `medal` (
 `id` int(11) NULL AUTO_INCREMENT,
 `userid` int(11) NULL,
 `categorie` int(11) NULL,
 `plaats` int(11) NULL,
 `week` int(11) NULL,
 `points` varchar(15) NULL,
 `img` varchar(10) NULL,
 `del` tinyint(1) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `medal`
--


-- --------------------------------------------------------

--
-- Table structure for table `movement`
--

CREATE TABLE IF NOT EXISTS `movement` (
 `moveid` int(11) NULL AUTO_INCREMENT,
 `sort_type` tinyint(4) NULL DEFAULT '0',
 `from` int(11) NULL DEFAULT '0',
 `to` int(11) NULL DEFAULT '0',
 `ref` int(11) NULL DEFAULT '0',
 `ref2` int(11) NULL DEFAULT '0',
 `starttime` int(11) NULL DEFAULT '0',
 `endtime` int(11) NULL DEFAULT '0',
 `proc` tinyint(1) NULL DEFAULT '0',
 `send` tinyint(1) NULL,
 `wood` int(11) NULL,
 `clay` int(11) NULL,
 `iron` int(11) NULL,
 `crop` int(11) NULL,
 PRIMARY KEY (`moveid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `movement`
--


-- --------------------------------------------------------

--
-- Table structure for table `ndata`
--

CREATE TABLE IF NOT EXISTS `ndata` (
 `id` int(11) NULL AUTO_INCREMENT,
 `uid` int(11) NULL,
 `toWref` int(11) NULL,
 `ally` int(11) NULL,
 `topic` text NULL,
 `ntype` tinyint(1) NULL,
 `data` text NULL,
 `time` int(11) NULL,
 `viewed` tinyint(1) NULL,
 `archive` tinyint(1) NULL DEFAULT '0',
 `del` tinyint(1) NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ndata`
--


-- --------------------------------------------------------

--
-- Table structure for table `odata`
--

CREATE TABLE IF NOT EXISTS `odata` (
 `wref` int(11) NULL,
 `type` tinyint(2) NULL,
 `conqured` int(11) NULL,
 `wood` int(11) NULL,
 `iron` int(11) NULL,
 `clay` int(11) NULL,
 `maxstore` int(11) NULL,
 `crop` int(11) NULL,
 `maxcrop` int(11) NULL,
 `lastupdated` int(11) NULL,
 `lastupdated2` int(11) NULL,
 `loyalty` float(9,6) NULL DEFAULT '100',
 `owner` int(11) NULL DEFAULT '2',
 `name` varchar(32) NULL DEFAULT 'Unoccupied Oasis',
 `high` tinyint(1) NULL,
 PRIMARY KEY (`wref`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `odata`
--


-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE IF NOT EXISTS `online` (
 `name` varchar(32) NULL,
 `uid` int(11) NULL,
 `time` varchar(32) NULL,
 `sit` tinyint(1) NULL,
 UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `prisoners`
--

CREATE TABLE IF NOT EXISTS `prisoners` (
 `id` int(11) NULL AUTO_INCREMENT,
 `wref` int(11) NULL,
 `from` int(11) NULL,
 `t1` int(11) NULL,
 `t2` int(11) NULL,
 `t3` int(11) NULL,
 `t4` int(11) NULL,
 `t5` int(11) NULL,
 `t6` int(11) NULL,
 `t7` int(11) NULL,
 `t8` int(11) NULL,
 `t9` int(11) NULL,
 `t10` int(11) NULL,
 `t11` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prisoners`
--


-- --------------------------------------------------------

--
-- Table structure for table `raidlist`
--

CREATE TABLE IF NOT EXISTS `raidlist` (
 `id` int(11) NULL AUTO_INCREMENT,
 `lid` int(11) NULL,
 `towref` int(11) NULL,
 `x` int(11) NULL,
 `y` int(11) NULL,
 `distance` varchar(5) NULL DEFAULT '0',
 `t1` int(11) NULL,
 `t2` int(11) NULL,
 `t3` int(11) NULL,
 `t4` int(11) NULL,
 `t5` int(11) NULL,
 `t6` int(11) NULL,
 `t7` int(11) NULL,
 `t8` int(11) NULL,
 `t9` int(11) NULL,
 `t10` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `raidlist`
--


-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
 `id` int(11) NULL AUTO_INCREMENT,
 `vref` int(11) NULL,
 `tech` varchar(3) NULL,
 `timestamp` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `research`
--


-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
 `id` int(11) NULL AUTO_INCREMENT,
 `uid` int(11) NULL,
 `wid` int(11) NULL,
 `from` int(11) NULL,
 `wood` int(5) NULL,
 `clay` int(5) NULL,
 `iron` int(5) NULL,
 `crop` int(5) NULL,
 `start` tinyint(2) NULL,
 `deliveries` tinyint(1) NULL,
 `merchant` int(11) NULL,
 `timestamp` int(11) NULL,
 `timeleft` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `route`
--


-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE IF NOT EXISTS `send` (
 `id` int(11) NULL AUTO_INCREMENT,
 `wood` int(11) NULL,
 `clay` int(11) NULL,
 `iron` int(11) NULL,
 `crop` int(11) NULL,
 `merchant` tinyint(2) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `send`
--


-- --------------------------------------------------------

--
-- Table structure for table `tdata`
--

CREATE TABLE IF NOT EXISTS `tdata` (
 `vref` int(11) NULL,
 `t2` tinyint(1) NULL DEFAULT '0',
 `t3` tinyint(1) NULL DEFAULT '0',
 `t4` tinyint(1) NULL DEFAULT '0',
 `t5` tinyint(1) NULL DEFAULT '0',
 `t6` tinyint(1) NULL DEFAULT '0',
 `t7` tinyint(1) NULL DEFAULT '0',
 `t8` tinyint(1) NULL DEFAULT '0',
 `t9` tinyint(1) NULL DEFAULT '0',
 `t12` tinyint(1) NULL DEFAULT '0',
 `t13` tinyint(1) NULL DEFAULT '0',
 `t14` tinyint(1) NULL DEFAULT '0',
 `t15` tinyint(1) NULL DEFAULT '0',
 `t16` tinyint(1) NULL DEFAULT '0',
 `t17` tinyint(1) NULL DEFAULT '0',
 `t18` tinyint(1) NULL DEFAULT '0',
 `t19` tinyint(1) NULL DEFAULT '0',
 `t22` tinyint(1) NULL DEFAULT '0',
 `t23` tinyint(1) NULL DEFAULT '0',
 `t24` tinyint(1) NULL DEFAULT '0',
 `t25` tinyint(1) NULL DEFAULT '0',
 `t26` tinyint(1) NULL DEFAULT '0',
 `t27` tinyint(1) NULL DEFAULT '0',
 `t28` tinyint(1) NULL DEFAULT '0',
 `t29` tinyint(1) NULL DEFAULT '0',
 `t32` tinyint(1) NULL DEFAULT '0',
 `t33` tinyint(1) NULL DEFAULT '0',
 `t34` tinyint(1) NULL DEFAULT '0',
 `t35` tinyint(1) NULL DEFAULT '0',
 `t36` tinyint(1) NULL DEFAULT '0',
 `t37` tinyint(1) NULL DEFAULT '0',
 `t38` tinyint(1) NULL DEFAULT '0',
 `t39` tinyint(1) NULL DEFAULT '0',
 `t42` tinyint(1) NULL DEFAULT '0',
 `t43` tinyint(1) NULL DEFAULT '0',
 `t44` tinyint(1) NULL DEFAULT '0',
 `t45` tinyint(1) NULL DEFAULT '0',
 `t46` tinyint(1) NULL DEFAULT '0',
 `t47` tinyint(1) NULL DEFAULT '0',
 `t48` tinyint(1) NULL DEFAULT '0',
 `t49` tinyint(1) NULL DEFAULT '0',
 PRIMARY KEY (`vref`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `tech_log`
--

CREATE TABLE IF NOT EXISTS `tech_log` (
 `id` int(11) NULL AUTO_INCREMENT,
 `wid` int(11) NULL,
 `log` text NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tech_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
 `id` int(11) NULL AUTO_INCREMENT,
 `vref` int(11) NULL,
 `unit` tinyint(2) NULL,
 `amt` int(11) NULL,
 `pop` int(11) NULL,
 `timestamp` int(11) NULL,
 `eachtime` int(11) NULL,
 `timestamp2` int(11) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `training`
--


-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
 `vref` int(11) NULL,
 `u1` int(11) NULL DEFAULT '0',
 `u2` int(11) NULL DEFAULT '0',
 `u3` int(11) NULL DEFAULT '0',
 `u4` int(11) NULL DEFAULT '0',
 `u5` int(11) NULL DEFAULT '0',
 `u6` int(11) NULL DEFAULT '0',
 `u7` int(11) NULL DEFAULT '0',
 `u8` int(11) NULL DEFAULT '0',
 `u9` int(11) NULL DEFAULT '0',
 `u10` int(11) NULL DEFAULT '0',
 `u11` int(11) NULL DEFAULT '0',
 `u12` int(11) NULL DEFAULT '0',
 `u13` int(11) NULL DEFAULT '0',
 `u14` int(11) NULL DEFAULT '0',
 `u15` int(11) NULL DEFAULT '0',
 `u16` int(11) NULL DEFAULT '0',
 `u17` int(11) NULL DEFAULT '0',
 `u18` int(11) NULL DEFAULT '0',
 `u19` int(11) NULL DEFAULT '0',
 `u20` int(11) NULL DEFAULT '0',
 `u21` int(11) NULL DEFAULT '0',
 `u22` int(11) NULL DEFAULT '0',
 `u23` int(11) NULL DEFAULT '0',
 `u24` int(11) NULL DEFAULT '0',
 `u25` int(11) NULL DEFAULT '0',
 `u26` int(11) NULL DEFAULT '0',
 `u27` int(11) NULL DEFAULT '0',
 `u28` int(11) NULL DEFAULT '0',
 `u29` int(11) NULL DEFAULT '0',
 `u30` int(11) NULL DEFAULT '0',
 `u31` int(11) NULL DEFAULT '0',
 `u32` int(11) NULL DEFAULT '0',
 `u33` int(11) NULL DEFAULT '0',
 `u34` int(11) NULL DEFAULT '0',
 `u35` int(11) NULL DEFAULT '0',
 `u36` int(11) NULL DEFAULT '0',
 `u37` int(11) NULL DEFAULT '0',
 `u38` int(11) NULL DEFAULT '0',
 `u39` int(11) NULL DEFAULT '0',
 `u40` int(11) NULL DEFAULT '0',
 `u41` int(11) NULL DEFAULT '0',
 `u42` int(11) NULL DEFAULT '0',
 `u43` int(11) NULL DEFAULT '0',
 `u44` int(11) NULL DEFAULT '0',
 `u45` int(11) NULL DEFAULT '0',
 `u46` int(11) NULL DEFAULT '0',
 `u47` int(11) NULL DEFAULT '0',
 `u48` int(11) NULL DEFAULT '0',
 `u49` int(11) NULL DEFAULT '0',
 `u50` int(11) NULL DEFAULT '0',
 `u99` int(11) NULL DEFAULT '0',
 `u99o` int(11) NULL DEFAULT '0',
 `hero` int(11) NULL DEFAULT '0',
 PRIMARY KEY (`vref`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NULL AUTO_INCREMENT,
 `username` varchar(100) NULL,
 `password` varchar(100) NULL,
 `email` text NULL,
 `tribe` tinyint(1) NULL,
 `access` tinyint(1) NULL DEFAULT '1',
 `gold` int(9) NULL DEFAULT '0',
 `gender` tinyint(1) NULL DEFAULT '0',
 `birthday` date NULL DEFAULT '0000-00-00',
 `location` text NULL,
 `desc1` text NULL,
 `desc2` text NULL,
 `plus` int(11) NULL DEFAULT '0',
 `goldclub` int(11) NULL DEFAULT '0',
 `b1` int(11) NULL DEFAULT '0',
 `b2` int(11) NULL DEFAULT '0',
 `b3` int(11) NULL DEFAULT '0',
 `b4` int(11) NULL DEFAULT '0',
 `sit1` int(11) NULL DEFAULT '0',
 `sit2` int(11) NULL DEFAULT '0',
 `alliance` int(11) NULL DEFAULT '0',
 `sessid` varchar(100) NULL,
 `act` varchar(10) NULL,
 `timestamp` int(11) NULL DEFAULT '0',
 `ap` int(11) NULL DEFAULT '0',
 `apall` int(11) NULL DEFAULT '0',
 `dp` int(11) NULL DEFAULT '0',
 `dpall` int(11) NULL DEFAULT '0',
 `protect` int(11) NULL,
 `quest` tinyint(2) NULL,
 `quest_time` int(11) NULL,
 `gpack` varchar(255) NULL DEFAULT 'gpack/travian_default/',
 `cp` float(14,5) NULL DEFAULT '1',
 `lastupdate` int(11) NULL,
 `RR` int(255) NULL DEFAULT '0',
 `Rc` int(255) NULL DEFAULT '0',
 `ok` tinyint(1) NULL DEFAULT '0',
 `clp` bigint(255) NULL DEFAULT '0',
 `oldrank` bigint(255) NULL DEFAULT '0',
 `regtime` int(11) NULL DEFAULT '0',
 `invited` int(11) NULL DEFAULT '0',
 `friend0` int(11) NULL DEFAULT '0',
 `friend1` int(11) NULL DEFAULT '0',
 `friend2` int(11) NULL DEFAULT '0',
 `friend3` int(11) NULL DEFAULT '0',
 `friend4` int(11) NULL DEFAULT '0',
 `friend5` int(11) NULL DEFAULT '0',
 `friend6` int(11) NULL DEFAULT '0',
 `friend7` int(11) NULL DEFAULT '0',
 `friend8` int(11) NULL DEFAULT '0',
 `friend9` int(11) NULL DEFAULT '0',
 `friend10` int(11) NULL DEFAULT '0',
 `friend11` int(11) NULL DEFAULT '0',
 `friend12` int(11) NULL DEFAULT '0',
 `friend13` int(11) NULL DEFAULT '0',
 `friend14` int(11) NULL DEFAULT '0',
 `friend15` int(11) NULL DEFAULT '0',
 `friend16` int(11) NULL DEFAULT '0',
 `friend17` int(11) NULL DEFAULT '0',
 `friend18` int(11) NULL DEFAULT '0',
 `friend19` int(11) NULL DEFAULT '0',
 `friend0wait` int(11) NULL DEFAULT '0',
 `friend1wait` int(11) NULL DEFAULT '0',
 `friend2wait` int(11) NULL DEFAULT '0',
 `friend3wait` int(11) NULL DEFAULT '0',
 `friend4wait` int(11) NULL DEFAULT '0',
 `friend5wait` int(11) NULL DEFAULT '0',
 `friend6wait` int(11) NULL DEFAULT '0',
 `friend7wait` int(11) NULL DEFAULT '0',
 `friend8wait` int(11) NULL DEFAULT '0',
 `friend9wait` int(11) NULL DEFAULT '0',
 `friend10wait` int(11) NULL DEFAULT '0',
 `friend11wait` int(11) NULL DEFAULT '0',
 `friend12wait` int(11) NULL DEFAULT '0',
 `friend13wait` int(11) NULL DEFAULT '0',
 `friend14wait` int(11) NULL DEFAULT '0',
 `friend15wait` int(11) NULL DEFAULT '0',
 `friend16wait` int(11) NULL DEFAULT '0',
 `friend17wait` int(11) NULL DEFAULT '0',
 `friend18wait` int(11) NULL DEFAULT '0',
 `friend19wait` int(11) NULL DEFAULT '0',
 `maxevasion` mediumint(3) NULL DEFAULT '0',
 `village_select` bigint(20) DEFAULT NULL,
 `vac_time` varchar(255) NULL DEFAULT '0',
 `vac_mode` int(2) NULL DEFAULT '0',
 `vactwoweeks` varchar(255) NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

ALTER TABLE `users`
CHANGE `lastupdate` `lastupdate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
AFTER `cp`,
CHANGE `regtime` `regtime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
AFTER `oldrank`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `tribe`, `access`, `gold`, `gender`, `birthday`, `location`, `desc1`, `desc2`, `plus`, `b1`, `b2`, `b3`, `b4`, `sit1`, `sit2`, `alliance`, `sessid`, `act`, `timestamp`, `ap`, `apall`, `dp`, `dpall`, `protect`, `quest`, `gpack`, `cp`, `lastupdate`, `RR`, `Rc`, `ok`) VALUES
(5, 'Multihunter', '', 'multihunter@travianx.mail', 0, 9, 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'gpack/travian_default/', 1, 0, 0, 0, 0),
(1, 'Support', '', 'support@travianx.mail', 0, 8, 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'gpack/travian_default/', 1, 0, 0, 0, 0),
(2, 'Nature', '', 'support@travianx.mail', 4, 8, 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'gpack/travian_default/', 1, 0, 0, 0, 0),
(4, 'Taskmaster', '', 'support@travianx.mail', 0, 8, 0, 0, '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'gpack/travian_default/', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vdata`
--

CREATE TABLE IF NOT EXISTS `vdata` (
`wref` int(11) NULL,
`owner` int(11) NULL,
`name` varchar(100) NULL,
`capital` tinyint(1) NULL,
`pop` int(11) NULL,
`cp` int(11) NULL,
`celebration` int(11) NULL DEFAULT '0',
`type` int(11) NULL DEFAULT '0',
`wood` float(12,2) NULL,
`clay` float(12,2) NULL,
`iron` float(12,2) NULL,
`maxstore` int(11) NULL,
`crop` float(12,2) NULL,
`maxcrop` int(11) NULL,
`lastupdate` int(11) NULL,
`lastupdate2` int(11) NULL DEFAULT '0', 
`loyalty` float(9,6) NULL DEFAULT '100',
`exp1` int(11) NULL DEFAULT '0',
`exp2` int(11) NULL DEFAULT '0',
`exp3` int(11) NULL DEFAULT '0',
`created` int(11) NULL,
`natar` tinyint(1) NULL DEFAULT '0',
`starv` int(11) NULL DEFAULT '0',
`starvupdate` int(11) NULL DEFAULT '0',
`evasion` tinyint(1) NULL DEFAULT '0',
PRIMARY KEY (`wref`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `vdata`
CHANGE `lastupdate` `lastupdate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
CHANGE `created` `created` DATETIME NULL DEFAULT CURRENT_TIMESTAMP;

--
-- Dumping data for table `vdata`
--


-- --------------------------------------------------------

--
-- Table structure for table `wdata`
--

CREATE TABLE IF NOT EXISTS `wdata` (
 `id` int(11) NULL AUTO_INCREMENT,
 `fieldtype` tinyint(2) NULL,
 `oasistype` tinyint(2) NULL,
 `x` int(11) NULL,
 `y` int(11) NULL,
 `occupied` tinyint(1) NULL,
 `image` varchar(3) NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `wdata`
--

-- --------------------------------------------------------
--
-- Table structure for table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
 `uid` int(11) NULL,
 `npw` varchar(100) NULL,
 `cpw` varchar(100) NULL,
 `used` tinyint(1) NULL DEFAULT '0',
 `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `password`
--

-- --------------------------------------------------------
--
-- Table structure for table `ww_attacks`
--

CREATE TABLE IF NOT EXISTS `ww_attacks` (
 `vid` int(25) NULL,
 `attack_time` int(25) NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `password`
--

-- --------------------------------------------------------
CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE 'utf8_general_ci' NOT NULL,
  `description` text COLLATE 'utf8_general_ci' NOT NULL
) COMMENT='' ENGINE='InnoDB' COLLATE 'utf8_general_ci';
ALTER TABLE `building`
ADD PRIMARY KEY `id` (`id`);

CREATE TABLE `building_levels` (
  `building` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `production` int(11) NOT NULL,
  `wood` int(11) NOT NULL,
  `clay` int(11) NOT NULL,
  `iron` int(11) NOT NULL,
  `crop` int(11) NOT NULL,
  `pop` int(11) NOT NULL,
  `culturepoints` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `parameter` int(11) NOT NULL
) COMMENT='' ENGINE='InnoDB' COLLATE 'utf8_general_ci';

ALTER TABLE `building_levels`
ADD FOREIGN KEY (`building`) REFERENCES `building` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Adminer 3.7.1 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+01:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `building` (`id`, `name`, `description`) VALUES
  (1, 'Woodcutter',
   'The Woodcutter cuts down trees in order to produce lumber. The further you extend the woodcutter the more lumber is produced by him.'),
  (2, 'Clay Pit', 'Clay is produced here. By increasing its level you increase its clay production.'),
  (3, 'Iron Mine', 'Here miners produce the precious resource iron. By increasing the mine`s level you increase its iron production.'),
  (4, 'Cropland', 'Your population`s food is produced here. By increasing the farm`s level you increase its crop production.'),
  (5, 'Sawmill', 'Here wood delivered by your Woodcutters is processed. Based on its level your sawmill can increase your wood production by up to 25 percent.'),
  (6, 'Brickyard', 'Here clay is processed into bricks. Based on its level your Brickyard can increase your clay production by up to 25 percent.'),
  (7, 'Iron Foundry', 'Iron is smelted here. Based on its level your Iron Foundry can increase your iron production by up to 25 percent.'),
  (8, 'Grain Mill', 'Here your grain is milled in order to produce flour. Based on its level your grain mill can increase your crop production by up to 25 percent.'),
  (9, 'Bakery', 'Here the flour produced in your mill is used to bake bread. In addition with the Grain Mill the increase in crop production can go up to 50 percent.'),
  (10, 'Warehouse', 'The resources wood, clay and iron are stored in your Warehouse. By increasing its level you increase your Warehouse\'s capacity.'),
  (11, 'Granary', 'Crop produced by your farms is stored in the Granary. By increasing its level you increase the Granary\'s capacity.'),
  (12, 'Blacksmith', 'In the blacksmith\'s melting furnaces your warriors\' weapons are enhanced. By increasing its level you can order the fabrication of even better weapons.'),
  (13, 'Armoury', 'In the armoury\'s melting furnaces your warriors\' armour is enhanced. By increasing its level you can order the fabrication of even better armour.'),
  (14, 'Tournament Square', 'At the Tournament Square your troops can train their stamina. The further the building is upgraded the faster your troops are beyond a minimum distance of 20 squares.'),
  (15, 'Main Building', 'In the main building the village\'s master builders live. The higher its level the faster your master builders complete the construction of new buildings.'),
  (16, 'Rally Point', 'Your village\'s troops meet here. From here you can send them out to conquer, raid or reinforce other villages.'),
  (17, 'Marketplace', 'At the Marketplace you can trade resources with other players. The higher its level, the more resources can be transported at the same time.'),
  (18, 'Embassy', 'The embassy is a place for diplomats. The higher its level the more options the king gains.'),
  (19, 'Barracks', 'All foot soldiers are trained in the barracks. The higher the level of the barracks, the faster the troops are trained.'),
  (20, 'Stable', 'Cavalry can be trained in the stable. The higher its level the faster the troops are trained.'),
  (21, 'Workshop', 'Siege engines like catapults and rams can be built in the workshop. The higher its level the faster the units are produced.'),
  (22, 'Academy', 'In the academy new unit types can be researched. By increasing its level you can order the research of better units.'),
  (23, 'Cranny', 'The cranny is used to hide some of your resources when the village is attacked. These resources cannot be stolen.'),
  (24, 'Town Hall', 'You can hold pompous celebrations in the Town Hall. Such a celebration increases your culture points. Building up your Town Hall to a higher level will decrease the length of the celebration.'),
  (25, 'Residence', 'The residence is a small palace, where the king or queen lives when (s)he visits the village. The residence protects the village against enemies who want to conquer it.'),
  (26, 'Palace', 'The king or queen of the empire lives in the palace. Only one palace can exist in your realm at a time. You need a palace in order to proclaim a village to be your capital.'),
  (27, 'Treasury', 'The riches of your empire are kept in the treasury. The treasury has room for one treasure. After you have captured an artefact it takes 24 hours on a normal server or 12 hours on a thrice speed server to be effective.'),
  (28, 'Trade Office', 'In the trade office the merchants\' carts get improved and equipped with powerful horses. The higher its level the more your merchants are able to carry.'),
  (29, 'Great Barracks', 'Foot soldiers are trained in the great barracks. The higher the level of the barracks, the faster the troops are trained.'),
  (30, 'Great Stable', 'Cavalry can be trained in the great stable. The higher its level the faster the troops are trained.'),
  (31, 'City Wall', 'By building a City Wall you can protect your village against the barbarian hordes of your enemies. The higher the wall\'s level, the higher the bonus given to your forces\' defence.'),
  (32, 'Earth Wall', 'By building a Earth Wall you can protect your village against the barbarian hordes of your enemies. The higher the wall\'s level, the higher the bonus given to your forces\' defence.'),
  (33, 'Palisade', 'By building a Palisade you can protect your village against the barbarian hordes of your enemies. The higher the wall\'s level, the higher the bonus given to your forces\' defence.'),
  (34, 'Stonemason\'s Lodge', 'The stonemason\'s lodge is an expert at cutting stone. The further the building is extended the higher the stability of the village\'s buildings.'),
  (35, 'Brewery', 'Tasty mead is brewed in the Brewery and later quaffed by the soldiers during the celebrations.'),
  (36, 'Trapper', 'The trapper protects your village with well hidden traps. This means that unwary enemies can be imprisoned and won\'t be able to harm your village anymore.'),
  (37, 'Hero\'s Mansion', 'In the Hero\'s mansion you can train your own hero and at level 10, 15 and 20 you can conquer oases with Hero in the immediate vicinity.'),
  (38, 'Great Warehouse', 'Wood, clay and iron are stored in the warehouse. The great warehouse offers you more space and keeps your goods drier and safer than the normal one.'),
  (39, 'Great Granary', 'Crop produced by your farms is stored in the granary. The great granary offers you more space and keeps your crops drier and safer than the normal one.'),
  (40, 'World Wonder', 'The World Wonder (otherwise known as a Wonder of the World) is as wonderful as it sounds. This building is built in order to win the server. Each level of the World Wonder costs hundreds of thousands (even millions) of resources to build.'),
  (41, 'Horse Drinking Trough', 'The horse drinking trough of the Romans decreases the training time of cavalry and the upkeep of these troops as well.'),
  (42, 'Great Workshop',
   'Siege engines like catapults and rams can be built in the great workshop. The higher its level the faster the units are produced.');

INSERT INTO `building_levels` (`building`, `level`, `production`, `wood`, `clay`, `iron`, `crop`, `pop`, `culturepoints`, `time`, `parameter`)
VALUES
  (1, 3, 15, 110, 280, 140, 165, 1, 2, 620, 0),
  (1, 6, 50, 520, 1300, 650, 780, 2, 3, 3560, 0),
  (1, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
  (1, 1, 5, 40, 100, 50, 60, 2, 1, 260, 0),
  (1, 2, 9, 65, 165, 85, 100, 1, 1, 620, 0),
  (1, 4, 22, 185, 465, 235, 280, 1, 2, 2100, 0),
  (1, 5, 33, 310, 780, 390, 465, 1, 2, 3560, 0),
  (1, 7, 70, 870, 2170, 1085, 1300, 2, 4, 9620, 0),
  (1, 8, 100, 1450, 3625, 1810, 2175, 2, 4, 15590, 0),
  (1, 9, 145, 2420, 6050, 3025, 3630, 2, 5, 25150, 0),
  (1, 10, 200, 4040, 10105, 5050, 6060, 2, 6, 40440, 0),
  (1, 11, 280, 6750, 16870, 8435, 10125, 2, 7, 64900, 0),
  (1, 12, 375, 11270, 28175, 14090, 16905, 2, 9, 104050, 0),
  (1, 13, 495, 18820, 47055, 23525, 28230, 2, 11, 166680, 0),
  (1, 14, 635, 31430, 78580, 39290, 47150, 2, 13, 266880, 0),
  (1, 15, 800, 52490, 131230, 65615, 78740, 2, 15, 427210, 0),
  (1, 16, 1000, 87660, 219155, 109575, 131490, 3, 18, 683730, 0),
  (1, 17, 1300, 146395, 365985, 182995, 219590, 3, 22, 1094170, 0),
  (1, 18, 1600, 244480, 611195, 305600, 366715, 3, 27, 1750880, 0),
  (1, 19, 2000, 408280, 1020695, 510350, 612420, 3, 32, 2801600, 0),
  (1, 20, 2450, 681825, 1704565, 852280, 1022740, 3, 38, 4482770, 0),
  (2, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
  (2, 1, 5, 80, 40, 80, 50, 2, 1, 220, 0),
  (2, 2, 9, 135, 65, 135, 85, 1, 1, 550, 0),
  (2, 3, 15, 225, 110, 225, 140, 1, 2, 1080, 0),
  (2, 4, 22, 375, 185, 375, 235, 1, 2, 1930, 0),
  (2, 5, 33, 620, 310, 620, 390, 1, 2, 3290, 0),
  (2, 6, 50, 1040, 520, 1040, 650, 2, 3, 5470, 0),
  (2, 7, 70, 1735, 870, 1735, 1085, 2, 4, 8950, 0),
  (2, 8, 100, 2900, 1450, 2900, 1810, 2, 4, 14520, 0),
  (2, 9, 145, 4840, 2420, 4840, 3025, 2, 5, 23430, 0),
  (2, 10, 200, 8080, 4040, 8080, 5050, 2, 6, 37690, 0),
  (2, 11, 280, 13500, 6750, 13500, 8435, 2, 7, 60510, 0),
  (2, 12, 375, 22540, 11270, 22540, 14090, 2, 9, 97010, 0),
  (2, 13, 495, 37645, 18820, 37645, 23525, 2, 11, 155420, 0),
  (2, 14, 635, 62865, 31430, 62865, 39290, 2, 13, 248870, 0),
  (2, 15, 800, 104985, 52490, 104985, 65615, 2, 15, 398390, 0),
  (2, 16, 1000, 175320, 87660, 175320, 109575, 3, 18, 637620, 0),
  (2, 17, 1300, 292790, 146395, 292790, 182995, 3, 22, 1020390, 0),
  (2, 18, 1600, 488955, 244480, 488955, 305600, 3, 27, 1632820, 0),
  (2, 19, 2000, 816555, 408280, 816555, 510350, 3, 32, 2612710, 0),
  (2, 20, 2450, 1363650, 681825, 1363650, 852280, 3, 38, 4180540, 0),
  (3, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
  (3, 1, 5, 100, 80, 30, 60, 3, 1, 450, 0),
  (3, 2, 9, 165, 135, 50, 100, 2, 1, 920, 0),
  (3, 3, 15, 280, 225, 85, 165, 2, 2, 1670, 0),
  (3, 4, 22, 465, 375, 140, 280, 2, 2, 2880, 0),
  (3, 5, 33, 780, 620, 235, 465, 2, 2, 4800, 0),
  (3, 6, 50, 1300, 1040, 390, 780, 2, 3, 7880, 0),
  (3, 7, 70, 2170, 1735, 650, 1300, 2, 4, 12810, 0),
  (3, 8, 100, 3625, 2900, 1085, 2175, 2, 4, 20690, 0),
  (3, 9, 145, 6050, 4840, 1815, 3630, 2, 5, 33310, 0),
  (3, 10, 200, 10105, 8080, 3030, 6060, 2, 6, 53500, 0),
  (3, 11, 280, 16870, 13500, 5060, 10125, 3, 7, 85800, 0),
  (3, 12, 375, 28175, 22540, 8455, 16905, 3, 9, 137470, 0),
  (3, 13, 495, 47055, 37645, 14115, 28230, 3, 11, 220160, 0),
  (3, 14, 635, 78580, 62865, 23575, 47150, 3, 13, 352450, 0),
  (3, 15, 800, 131230, 104985, 39370, 78740, 3, 15, 564120, 0),
  (3, 16, 1000, 219155, 175320, 65745, 131490, 3, 18, 902760, 0),
  (3, 17, 1300, 365985, 292790, 109795, 219590, 3, 22, 145546, 0),
  (3, 18, 1600, 611195, 488955, 183360, 366715, 3, 27, 2311660, 0),
  (3, 19, 2000, 1020695, 816555, 306210, 612420, 3, 32, 3698850, 0),
  (3, 20, 2450, 1704565, 1363650, 511370, 1022740, 3, 38, 5918370, 0),
  (4, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0),
  (4, 1, 5, 70, 90, 70, 20, 0, 1, 150, 0),
  (4, 2, 9, 115, 150, 115, 35, 0, 1, 440, 0),
  (4, 3, 15, 195, 250, 195, 55, 0, 2, 900, 0),
  (4, 4, 22, 325, 420, 325, 95, 0, 2, 1650, 0),
  (4, 5, 33, 545, 700, 545, 155, 0, 2, 2830, 0),
  (4, 6, 50, 910, 1170, 910, 260, 1, 3, 4730, 0),
  (4, 7, 70, 1520, 1950, 1520, 435, 1, 4, 7780, 0),
  (4, 8, 100, 2535, 3260, 2535, 725, 1, 4, 12190, 0),
  (4, 9, 145, 4235, 5445, 4235, 1210, 1, 5, 19690, 0),
  (4, 10, 200, 7070, 9095, 7070, 2020, 1, 6, 31700, 0),
  (4, 11, 280, 11810, 15185, 11810, 3375, 1, 7, 50910, 0),
  (4, 12, 375, 19725, 25360, 19725, 5635, 1, 9, 84700, 0),
  (4, 13, 495, 32940, 42350, 32940, 9410, 1, 11, 135710, 0),
  (4, 14, 635, 55005, 70720, 55005, 15715, 1, 13, 217340, 0),
  (4, 15, 800, 91860, 118105, 91860, 26245, 1, 15, 347950, 0),
  (4, 16, 1000, 153405, 197240, 153405, 43830, 2, 18, 556910, 0),
  (4, 17, 1300, 256190, 329385, 256190, 73195, 2, 22, 891260, 0),
  (4, 18, 1600, 427835, 550075, 427835, 122240, 2, 27, 1426210, 0),
  (4, 19, 2000, 714485, 918625, 714485, 204140, 2, 32, 2282140, 0),
  (4, 20, 2450, 1193195, 1534105, 1193195, 340915, 2, 38, 3651630, 0),
  (5, 1, 0, 520, 380, 290, 90, 4, 1, 3000, 5),
  (5, 2, 0, 935, 685, 520, 160, 2, 1, 5700, 10),
  (5, 3, 0, 1685, 1230, 940, 290, 2, 2, 9750, 15),
  (5, 4, 0, 3035, 2215, 1690, 525, 2, 2, 15830, 20),
  (5, 5, 0, 5460, 3990, 3045, 945, 2, 2, 24940, 25),
  (6, 1, 0, 440, 480, 320, 50, 3, 1, 2240, 5),
  (6, 2, 0, 790, 865, 575, 90, 2, 1, 4560, 10),
  (6, 3, 0, 1425, 1555, 1035, 160, 2, 2, 8040, 15),
  (6, 4, 0, 2565, 2800, 1865, 290, 2, 2, 13260, 20),
  (6, 5, 0, 4620, 5040, 3360, 525, 2, 2, 21090, 25),
  (7, 1, 0, 200, 450, 510, 120, 6, 1, 4080, 5),
  (7, 2, 0, 360, 810, 920, 215, 3, 1, 7320, 10),
  (7, 3, 0, 650, 1460, 1650, 390, 3, 2, 12180, 15),
  (7, 4, 0, 1165, 2625, 2975, 700, 3, 2, 19470, 20),
  (7, 5, 0, 2100, 4725, 5355, 1260, 3, 2, 30410, 25),
  (8, 1, 0, 500, 440, 380, 1240, 3, 1, 1840, 5),
  (8, 2, 0, 900, 790, 685, 2230, 2, 1, 3960, 10),
  (8, 3, 0, 1620, 1425, 1230, 4020, 2, 2, 7140, 15),
  (8, 4, 0, 2915, 2565, 2215, 7230, 2, 2, 11910, 20),
  (8, 5, 0, 5250, 4620, 3990, 13015, 2, 2, 19070, 25),
  (9, 1, 0, 1200, 1480, 870, 1600, 4, 1, 3680, 5),
  (9, 2, 0, 2160, 2665, 1565, 2880, 2, 1, 6720, 10),
  (9, 3, 0, 3890, 4795, 2820, 5185, 2, 2, 11280, 15),
  (9, 4, 0, 7000, 8630, 5075, 9330, 2, 2, 18120, 20),
  (9, 5, 0, 12595, 15535, 9135, 16795, 2, 2, 28380, 25),
  (10, 1, 0, 130, 160, 90, 40, 1, 1, 2000, 1200),
  (10, 2, 0, 165, 205, 115, 50, 1, 1, 2620, 1700),
  (10, 3, 0, 215, 260, 145, 65, 1, 2, 3340, 2300),
  (10, 4, 0, 275, 335, 190, 85, 1, 2, 4170, 3100),
  (10, 5, 0, 350, 430, 240, 105, 1, 2, 5140, 4000),
  (10, 6, 0, 445, 550, 310, 135, 1, 3, 6260, 5000),
  (10, 7, 0, 570, 705, 395, 175, 1, 4, 7570, 6300),
  (10, 8, 0, 730, 900, 505, 225, 1, 4, 9080, 7800),
  (10, 9, 0, 935, 1115, 650, 290, 1, 5, 10830, 9600),
  (10, 10, 0, 1200, 1475, 830, 370, 1, 6, 12860, 11800),
  (10, 11, 0, 1535, 1890, 1065, 470, 2, 7, 15220, 14400),
  (10, 12, 0, 1965, 2420, 1360, 605, 2, 9, 17950, 17600),
  (10, 13, 0, 2515, 3095, 1740, 775, 2, 11, 21130, 21400),
  (10, 14, 0, 3220, 3960, 2230, 990, 2, 13, 24810, 25900),
  (10, 15, 0, 4120, 5070, 2850, 1270, 2, 15, 29080, 31300),
  (10, 16, 0, 5275, 6490, 3650, 1625, 2, 18, 34030, 37900),
  (10, 17, 0, 6750, 8310, 4675, 2075, 2, 22, 39770, 45700),
  (10, 18, 0, 8640, 10635, 5980, 2660, 2, 27, 46440, 55100),
  (10, 19, 0, 11060, 13610, 7655, 3405, 2, 32, 54170, 66400),
  (10, 20, 0, 14155, 17420, 9800, 4355, 2, 38, 63130, 80000),
  (11, 1, 0, 80, 100, 70, 20, 1, 1, 1600, 1200),
  (11, 2, 0, 100, 130, 90, 25, 1, 1, 2160, 1700),
  (11, 3, 0, 130, 165, 115, 35, 1, 2, 2800, 2300),
  (11, 4, 0, 170, 210, 145, 40, 1, 2, 3550, 3100),
  (11, 5, 0, 215, 270, 190, 55, 1, 2, 4420, 4000),
  (11, 6, 0, 275, 345, 240, 70, 1, 3, 5420, 5000),
  (11, 7, 0, 350, 440, 310, 90, 1, 4, 6590, 6300),
  (11, 8, 0, 450, 565, 395, 115, 1, 4, 7950, 7800),
  (11, 9, 0, 575, 720, 505, 145, 1, 5, 9520, 9600),
  (11, 10, 0, 740, 920, 645, 185, 1, 6, 11340, 11800),
  (11, 11, 0, 945, 1180, 825, 235, 2, 7, 13450, 14400),
  (11, 12, 0, 1210, 1510, 1060, 300, 2, 9, 15910, 17600),
  (11, 13, 0, 1545, 1935, 1355, 385, 2, 11, 18750, 21400),
  (11, 14, 0, 1980, 2475, 1735, 495, 2, 13, 22050, 25900),
  (11, 15, 0, 2535, 3170, 2220, 635, 2, 15, 25880, 31300),
  (11, 16, 0, 3245, 4055, 2840, 810, 2, 18, 30320, 37900),
  (11, 17, 0, 4155, 5190, 3635, 1040, 2, 22, 35470, 45700),
  (11, 18, 0, 5315, 6645, 4650, 1330, 2, 27, 41450, 55100),
  (11, 19, 0, 6805, 8505, 5955, 1700, 2, 32, 48380, 66400),
  (11, 20, 0, 8710, 10890, 7620, 2180, 2, 38, 56420, 80000),
  (12, 1, 0, 170, 200, 380, 130, 4, 2, 2000, 100),
  (12, 2, 0, 220, 255, 485, 165, 2, 3, 2620, 96),
  (12, 3, 0, 280, 330, 625, 215, 2, 3, 3340, 93),
  (12, 4, 0, 355, 420, 795, 275, 2, 4, 4170, 90),
  (12, 5, 0, 455, 535, 1020, 350, 2, 5, 5140, 86),
  (12, 6, 0, 585, 685, 1305, 445, 3, 6, 6260, 83),
  (12, 7, 0, 750, 880, 1670, 570, 3, 7, 7570, 80),
  (12, 8, 0, 955, 1125, 2140, 730, 3, 9, 9080, 77),
  (12, 9, 0, 1225, 1440, 2740, 935, 3, 10, 10830, 75),
  (12, 10, 0, 1570, 1845, 3505, 1200, 3, 12, 12860, 72),
  (12, 11, 0, 2005, 2360, 4485, 1535, 3, 15, 15220, 69),
  (12, 12, 0, 2570, 3020, 5740, 1965, 3, 18, 17950, 67),
  (12, 13, 0, 3290, 3870, 7350, 2515, 3, 21, 21130, 64),
  (12, 14, 0, 4210, 4950, 9410, 3220, 3, 26, 24810, 62),
  (12, 15, 0, 5390, 6340, 12045, 4120, 3, 31, 29080, 60),
  (12, 16, 0, 6895, 8115, 15415, 5275, 4, 37, 34030, 58),
  (12, 17, 0, 8825, 10385, 19730, 6750, 4, 44, 39770, 56),
  (12, 18, 0, 11300, 13290, 25255, 8640, 4, 53, 46440, 54),
  (12, 19, 0, 14460, 17015, 32325, 11060, 4, 64, 54170, 52),
  (12, 20, 0, 18510, 21780, 41380, 14155, 4, 77, 63130, 50),
  (13, 1, 0, 130, 210, 410, 130, 4, 2, 2000, 100),
  (13, 2, 0, 165, 270, 525, 165, 2, 3, 2620, 96),
  (13, 3, 0, 215, 345, 670, 215, 2, 3, 3340, 93),
  (13, 4, 0, 275, 440, 860, 275, 2, 4, 4170, 90),
  (13, 5, 0, 350, 565, 1100, 350, 2, 5, 5140, 86),
  (13, 6, 0, 445, 720, 1410, 445, 3, 6, 6260, 83),
  (13, 7, 0, 570, 925, 1805, 570, 3, 7, 7570, 80),
  (13, 8, 0, 730, 1180, 2310, 730, 3, 9, 9080, 77),
  (13, 9, 0, 935, 1515, 2955, 935, 3, 10, 10830, 75),
  (13, 10, 0, 1200, 1935, 3780, 1200, 3, 12, 12860, 72),
  (13, 11, 0, 1535, 2480, 4840, 1535, 3, 15, 15220, 69),
  (13, 12, 0, 1965, 3175, 6195, 1965, 3, 18, 17950, 67),
  (13, 13, 0, 2515, 4060, 7930, 2515, 3, 21, 21130, 64),
  (13, 14, 0, 3220, 5200, 10150, 3220, 3, 26, 24810, 62),
  (13, 15, 0, 4120, 6655, 12995, 4120, 3, 31, 29080, 60),
  (13, 16, 0, 5275, 8520, 16630, 5275, 4, 37, 34030, 58),
  (13, 17, 0, 6750, 10905, 21290, 6750, 4, 44, 39770, 56),
  (13, 18, 0, 8640, 13955, 27250, 8640, 4, 53, 46440, 54),
  (13, 19, 0, 11060, 17865, 34880, 11060, 4, 64, 54170, 52),
  (13, 20, 0, 14155, 22865, 44645, 14155, 4, 77, 63130, 50),
  (14, 1, 0, 1750, 2250, 1530, 240, 1, 1, 3500, 110),
  (14, 2, 0, 2240, 2880, 1960, 305, 1, 1, 4360, 120),
  (14, 3, 0, 2865, 3685, 2505, 395, 1, 2, 5360, 130),
  (14, 4, 0, 3670, 4720, 3210, 505, 1, 2, 6510, 140),
  (14, 5, 0, 4700, 6040, 4105, 645, 1, 2, 7860, 150),
  (14, 6, 0, 6015, 7730, 5255, 825, 1, 3, 9410, 160),
  (14, 7, 0, 7695, 9895, 6730, 1055, 1, 4, 11220, 170),
  (14, 8, 0, 9850, 12665, 8615, 1350, 1, 4, 13320, 180),
  (14, 9, 0, 12610, 16215, 11025, 1730, 1, 5, 15750, 190),
  (14, 10, 0, 16140, 20755, 14110, 2215, 1, 6, 18570, 200),
  (14, 11, 0, 20660, 26565, 18065, 2835, 2, 7, 21840, 210),
  (14, 12, 0, 26445, 34000, 23120, 3625, 2, 9, 25630, 220),
  (14, 13, 0, 33850, 43520, 29595, 4640, 2, 11, 30030, 230),
  (14, 14, 0, 43330, 55705, 37880, 5940, 2, 13, 35140, 240),
  (14, 15, 0, 55460, 71305, 48490, 7605, 2, 15, 41060, 250),
  (14, 16, 0, 70990, 91270, 62065, 9735, 2, 18, 47930, 260),
  (14, 17, 0, 90865, 116825, 79440, 12460, 2, 22, 55900, 270),
  (14, 18, 0, 116305, 149540, 101685, 15950, 2, 27, 65140, 280),
  (14, 19, 0, 148875, 191410, 130160, 20415, 2, 32, 75860, 290),
  (14, 20, 0, 190560, 245005, 166600, 26135, 2, 38, 88300, 300),
  (15, 1, 0, 70, 40, 60, 20, 2, 2, 2620, 100),
  (15, 2, 0, 90, 50, 75, 25, 1, 3, 3220, 96),
  (15, 3, 0, 115, 65, 100, 35, 1, 3, 3880, 93),
  (15, 4, 0, 145, 85, 125, 40, 1, 4, 4610, 90),
  (15, 5, 0, 190, 105, 160, 55, 1, 5, 5410, 86),
  (15, 6, 0, 240, 135, 205, 70, 2, 6, 6300, 83),
  (15, 7, 0, 310, 175, 265, 90, 2, 7, 7280, 80),
  (15, 8, 0, 395, 225, 340, 115, 2, 9, 8380, 77),
  (15, 9, 0, 505, 290, 430, 145, 2, 10, 9590, 75),
  (15, 10, 0, 645, 370, 555, 185, 2, 12, 10940, 72),
  (15, 11, 0, 825, 470, 710, 235, 2, 15, 12440, 69),
  (15, 12, 0, 1060, 605, 905, 300, 2, 18, 14120, 67),
  (15, 13, 0, 1355, 775, 1160, 385, 2, 21, 15980, 64),
  (15, 14, 0, 1735, 990, 1485, 495, 2, 26, 18050, 62),
  (15, 15, 0, 2220, 1270, 1900, 635, 2, 31, 20370, 60),
  (15, 16, 0, 2840, 1625, 2435, 810, 3, 37, 22950, 58),
  (15, 17, 0, 3635, 2075, 3115, 1040, 3, 44, 25830, 56),
  (15, 18, 0, 4650, 2660, 3990, 1330, 3, 53, 29040, 54),
  (15, 19, 0, 5955, 3405, 5105, 1700, 3, 64, 32630, 52),
  (15, 20, 0, 7620, 4355, 6535, 2180, 3, 77, 32632, 50),
  (16, 1, 0, 110, 160, 90, 70, 1, 1, 670, 0),
  (16, 2, 0, 140, 205, 115, 90, 1, 1, 870, 0),
  (16, 3, 0, 180, 260, 145, 115, 1, 2, 1110, 0),
  (16, 4, 0, 230, 335, 190, 145, 1, 2, 1390, 0),
  (16, 5, 0, 295, 430, 240, 190, 1, 2, 1710, 0),
  (16, 6, 0, 380, 550, 310, 240, 1, 3, 2090, 0),
  (16, 7, 0, 485, 705, 395, 310, 1, 4, 2520, 0),
  (16, 8, 0, 620, 900, 505, 395, 1, 4, 3030, 0),
  (16, 9, 0, 795, 1155, 650, 505, 1, 5, 3610, 0),
  (16, 10, 0, 1015, 1475, 830, 645, 1, 6, 4290, 0),
  (16, 11, 0, 1300, 1890, 1065, 825, 2, 7, 5070, 0),
  (16, 12, 0, 1660, 2420, 1360, 1060, 2, 9, 5980, 0),
  (16, 13, 0, 2130, 3095, 1740, 1355, 2, 11, 7040, 0),
  (16, 14, 0, 2725, 3960, 2230, 1735, 2, 13, 8270, 0),
  (16, 15, 0, 3485, 5070, 2850, 2220, 2, 15, 9690, 0),
  (16, 16, 0, 4460, 6490, 3650, 2840, 2, 18, 11340, 0),
  (16, 17, 0, 5710, 8310, 4675, 3635, 2, 22, 13260, 0),
  (16, 18, 0, 7310, 10635, 5980, 4650, 2, 27, 15480, 0),
  (16, 19, 0, 9360, 13610, 7655, 5955, 2, 32, 18060, 0),
  (16, 20, 0, 11980, 17420, 9800, 7620, 2, 38, 21040, 0),
  (17, 1, 0, 80, 70, 120, 70, 4, 4, 1800, 1),
  (17, 2, 0, 100, 90, 155, 90, 2, 4, 2390, 2),
  (17, 3, 0, 130, 115, 195, 115, 2, 5, 3070, 3),
  (17, 4, 0, 170, 145, 250, 145, 2, 6, 3860, 4),
  (17, 5, 0, 215, 190, 320, 190, 2, 7, 4780, 5),
  (17, 6, 0, 275, 240, 410, 240, 3, 9, 5840, 6),
  (17, 7, 0, 350, 310, 530, 310, 3, 11, 7080, 7),
  (17, 8, 0, 450, 395, 675, 395, 3, 13, 8510, 8),
  (17, 9, 0, 575, 505, 865, 505, 3, 15, 10170, 9),
  (17, 10, 0, 740, 645, 1105, 645, 3, 19, 12100, 10),
  (17, 11, 0, 945, 825, 1415, 825, 3, 22, 14340, 11),
  (17, 12, 0, 1210, 1060, 1815, 1060, 3, 27, 16930, 12),
  (17, 13, 0, 1545, 1355, 2320, 1355, 3, 32, 19940, 13),
  (17, 14, 0, 1980, 1735, 2970, 1735, 3, 39, 23430, 14),
  (17, 15, 0, 2535, 2220, 3805, 2220, 3, 46, 27480, 15),
  (17, 16, 0, 3245, 2840, 4870, 2840, 4, 55, 32180, 16),
  (17, 17, 0, 4155, 3635, 6230, 3635, 4, 67, 37620, 17),
  (17, 18, 0, 5315, 4650, 7975, 4650, 4, 80, 43940, 18),
  (17, 19, 0, 6805, 5955, 10210, 5955, 4, 96, 51270, 19),
  (17, 20, 0, 8710, 7620, 13065, 7620, 4, 115, 59780, 20),
  (18, 1, 0, 180, 130, 150, 80, 3, 5, 2000, 0),
  (18, 2, 0, 230, 165, 190, 100, 2, 6, 2620, 0),
  (18, 3, 0, 295, 215, 245, 130, 2, 7, 3340, 9),
  (18, 4, 0, 375, 275, 315, 170, 2, 8, 4170, 12),
  (18, 5, 0, 485, 350, 405, 215, 2, 10, 5140, 15),
  (18, 6, 0, 620, 445, 515, 275, 2, 12, 6260, 18),
  (18, 7, 0, 790, 570, 660, 350, 2, 14, 7570, 21),
  (18, 8, 0, 1015, 730, 845, 450, 2, 17, 9080, 24),
  (18, 9, 0, 1295, 935, 1080, 575, 2, 21, 10830, 27),
  (18, 10, 0, 1660, 1200, 1385, 740, 2, 25, 12860, 30),
  (18, 11, 0, 2125, 1535, 1770, 945, 3, 30, 15220, 33),
  (18, 12, 0, 2720, 1965, 2265, 1210, 3, 36, 17950, 36),
  (18, 13, 0, 3480, 2515, 2900, 1545, 3, 43, 21130, 39),
  (18, 14, 0, 4455, 3220, 3715, 1980, 3, 51, 24810, 42),
  (18, 15, 0, 5705, 4120, 4755, 2535, 3, 62, 29080, 45),
  (18, 16, 0, 7300, 5275, 6085, 3245, 3, 74, 34030, 48),
  (18, 17, 0, 9345, 6750, 7790, 4155, 3, 89, 39770, 51),
  (18, 18, 0, 11965, 8640, 9970, 5315, 3, 106, 46440, 54),
  (18, 19, 0, 15315, 11060, 12760, 6805, 3, 128, 54170, 57),
  (18, 20, 0, 19600, 14155, 16335, 8710, 3, 153, 63130, 60),
  (19, 1, 0, 210, 140, 260, 120, 4, 1, 2000, 100),
  (19, 2, 0, 270, 180, 335, 155, 2, 1, 2620, 90),
  (19, 3, 0, 345, 230, 425, 195, 2, 2, 3340, 81),
  (19, 4, 0, 440, 295, 545, 250, 2, 2, 4170, 73),
  (19, 5, 0, 565, 375, 700, 320, 2, 2, 5140, 66),
  (19, 6, 0, 720, 480, 895, 410, 3, 3, 6260, 59),
  (19, 7, 0, 925, 615, 1145, 530, 3, 4, 7570, 53),
  (19, 8, 0, 1180, 790, 1465, 675, 3, 4, 9080, 48),
  (19, 9, 0, 1515, 1010, 1875, 865, 3, 5, 10830, 43),
  (19, 10, 0, 1935, 1290, 2400, 1105, 3, 6, 12860, 39),
  (19, 11, 0, 2480, 1655, 3070, 1415, 3, 7, 15220, 35),
  (19, 12, 0, 3175, 2115, 3930, 1815, 3, 9, 17950, 31),
  (19, 13, 0, 4060, 2710, 5030, 2320, 3, 11, 21130, 28),
  (19, 14, 0, 5200, 3465, 6435, 2970, 3, 13, 24810, 25),
  (19, 15, 0, 6655, 4435, 8240, 3805, 3, 15, 29080, 23),
  (19, 16, 0, 8520, 5680, 10545, 4870, 4, 18, 34030, 21),
  (19, 17, 0, 10905, 7270, 13500, 6230, 4, 22, 39770, 19),
  (19, 18, 0, 13955, 9305, 17280, 7975, 4, 27, 46440, 17),
  (19, 19, 0, 17865, 11910, 22120, 10210, 4, 32, 54170, 15),
  (19, 20, 0, 22865, 15245, 28310, 13065, 4, 38, 63130, 14),
  (20, 1, 0, 260, 140, 220, 100, 5, 2, 2200, 100),
  (20, 2, 0, 335, 180, 280, 130, 3, 3, 2850, 90),
  (20, 3, 0, 425, 230, 360, 165, 3, 3, 3610, 81),
  (20, 4, 0, 545, 295, 460, 210, 3, 4, 4490, 73),
  (20, 5, 0, 700, 375, 590, 270, 3, 5, 5500, 66),
  (20, 6, 0, 895, 480, 755, 345, 3, 6, 6680, 59),
  (20, 7, 0, 1145, 615, 970, 440, 3, 7, 8050, 53),
  (20, 8, 0, 1465, 790, 1240, 565, 3, 9, 9640, 48),
  (20, 9, 0, 1875, 1010, 1585, 720, 3, 10, 11480, 43),
  (20, 10, 0, 2400, 1290, 2030, 920, 3, 12, 13620, 39),
  (20, 11, 0, 3070, 1655, 2595, 1180, 4, 15, 16100, 35),
  (20, 12, 0, 3930, 2115, 3325, 1510, 4, 18, 18980, 31),
  (20, 13, 0, 5030, 2710, 4255, 1935, 4, 21, 22310, 28),
  (20, 14, 0, 6435, 3465, 5445, 2475, 4, 26, 26180, 25),
  (20, 15, 0, 8240, 4435, 6970, 3170, 4, 31, 30670, 23),
  (20, 16, 0, 10545, 5680, 8925, 4055, 4, 37, 35880, 21),
  (20, 17, 0, 13500, 7270, 11425, 5190, 4, 44, 41920, 19),
  (20, 18, 0, 17280, 9305, 14620, 6645, 4, 53, 48930, 17),
  (20, 19, 0, 22120, 11910, 18715, 8505, 4, 64, 57060, 15),
  (20, 20, 0, 28310, 15245, 23955, 10890, 4, 77, 66490, 14),
  (21, 1, 0, 460, 510, 600, 320, 3, 4, 3000, 100),
  (21, 2, 0, 590, 655, 770, 410, 2, 4, 3780, 90),
  (21, 3, 0, 755, 835, 985, 525, 2, 5, 4680, 81),
  (21, 4, 0, 965, 1070, 1260, 670, 2, 6, 5730, 73),
  (21, 5, 0, 1235, 1370, 1610, 860, 2, 7, 6950, 66),
  (21, 6, 0, 1580, 1750, 2060, 1100, 2, 9, 8360, 59),
  (21, 7, 0, 2025, 2245, 2640, 1405, 2, 11, 10000, 53),
  (21, 8, 0, 2590, 2870, 3380, 1800, 2, 13, 11900, 48),
  (21, 9, 0, 3315, 3675, 4325, 2305, 2, 15, 14110, 43),
  (21, 10, 0, 4245, 4705, 5535, 2950, 2, 19, 16660, 39),
  (21, 11, 0, 5430, 6020, 7085, 3780, 3, 22, 19630, 35),
  (21, 12, 0, 6950, 7705, 9065, 4835, 3, 27, 23070, 31),
  (21, 13, 0, 8900, 9865, 11605, 6190, 3, 32, 27060, 28),
  (21, 14, 0, 11390, 12625, 14855, 7925, 3, 39, 31690, 25),
  (21, 15, 0, 14580, 16165, 19015, 10140, 3, 46, 37060, 23),
  (21, 16, 0, 18660, 20690, 24340, 12980, 3, 55, 43290, 21),
  (21, 17, 0, 23885, 26480, 31155, 16615, 3, 67, 50520, 19),
  (21, 18, 0, 30570, 33895, 39875, 21270, 3, 80, 58900, 17),
  (21, 19, 0, 39130, 43385, 51040, 27225, 3, 96, 68630, 15),
  (21, 20, 0, 50090, 55535, 65335, 34845, 3, 115, 79910, 14),
  (22, 1, 0, 220, 160, 90, 40, 4, 5, 2000, 100),
  (22, 2, 0, 280, 205, 115, 50, 2, 6, 2620, 96),
  (22, 3, 0, 360, 260, 145, 65, 2, 7, 3340, 93),
  (22, 4, 0, 460, 335, 190, 85, 2, 8, 4170, 90),
  (22, 5, 0, 590, 430, 240, 105, 2, 10, 5140, 86),
  (22, 6, 0, 755, 550, 310, 135, 3, 12, 6260, 83),
  (22, 7, 0, 970, 705, 395, 175, 3, 14, 7570, 80),
  (22, 8, 0, 1240, 900, 505, 225, 3, 17, 9080, 77),
  (22, 9, 0, 1585, 1155, 650, 290, 3, 21, 10830, 75),
  (22, 10, 0, 2030, 1475, 830, 370, 3, 25, 12860, 72),
  (22, 11, 0, 2595, 1890, 1065, 470, 3, 30, 15220, 69),
  (22, 12, 0, 3325, 2420, 1360, 605, 3, 36, 17950, 67),
  (22, 13, 0, 4255, 3095, 1740, 775, 3, 43, 21130, 64),
  (22, 14, 0, 5445, 3960, 2230, 990, 3, 51, 24810, 62),
  (22, 15, 0, 6970, 5070, 2850, 1270, 3, 62, 29080, 60),
  (22, 16, 0, 8925, 6490, 3650, 1625, 4, 74, 34030, 58),
  (22, 17, 0, 11425, 8310, 4675, 2075, 4, 89, 39770, 56),
  (22, 18, 0, 14620, 10635, 5980, 2660, 4, 106, 46440, 54),
  (22, 19, 0, 18715, 13610, 7655, 3405, 4, 128, 54170, 52),
  (22, 20, 0, 23955, 17420, 9800, 4355, 4, 153, 63134, 50),
  (23, 1, 0, 40, 50, 30, 10, 0, 1, 750, 100),
  (23, 2, 0, 50, 65, 40, 15, 0, 1, 1170, 130),
  (23, 3, 0, 65, 80, 50, 15, 0, 2, 1660, 170),
  (23, 4, 0, 85, 105, 65, 20, 0, 2, 2220, 220),
  (23, 5, 0, 105, 135, 80, 25, 0, 2, 2880, 280),
  (23, 6, 0, 135, 170, 105, 35, 1, 3, 3640, 360),
  (23, 7, 0, 175, 220, 130, 45, 1, 4, 4520, 460),
  (23, 8, 0, 225, 280, 170, 55, 1, 4, 5540, 600),
  (23, 9, 0, 290, 360, 215, 70, 1, 5, 6730, 770),
  (23, 10, 0, 370, 460, 275, 90, 1, 6, 8110, 1000),
  (24, 1, 0, 1250, 1110, 1260, 600, 4, 6, 12500, 100),
  (24, 2, 0, 1600, 1420, 1615, 770, 2, 7, 14800, 96),
  (24, 3, 0, 2050, 1820, 2065, 985, 2, 9, 17468, 93),
  (24, 4, 0, 2620, 2330, 2640, 1260, 2, 10, 20563, 90),
  (24, 5, 0, 3355, 2980, 3380, 1610, 2, 12, 24153, 86),
  (24, 6, 0, 4295, 3815, 4330, 2060, 3, 15, 28317, 83),
  (24, 7, 0, 5500, 4880, 5540, 2640, 3, 18, 33148, 80),
  (24, 8, 0, 7035, 6250, 7095, 3380, 3, 21, 38752, 77),
  (24, 9, 0, 9005, 8000, 9080, 4325, 3, 26, 45252, 75),
  (24, 10, 0, 11530, 10240, 11620, 5535, 3, 31, 52793, 72),
  (24, 11, 0, 14755, 13105, 14875, 7085, 3, 37, 61539, 69),
  (24, 12, 0, 18890, 16775, 19040, 9065, 3, 45, 71686, 67),
  (24, 13, 0, 24180, 21470, 24370, 11605, 3, 53, 83455, 64),
  (24, 14, 0, 30950, 27480, 31195, 14855, 3, 64, 97108, 62),
  (24, 15, 0, 39615, 35175, 39930, 19015, 3, 77, 112946, 60),
  (24, 16, 0, 50705, 45025, 51110, 24340, 4, 92, 131317, 58),
  (24, 17, 0, 64905, 57635, 65425, 31155, 4, 111, 152628, 56),
  (24, 18, 0, 83075, 73770, 83740, 39875, 4, 133, 177348, 54),
  (24, 19, 0, 106340, 94430, 107190, 51040, 4, 160, 206024, 52),
  (24, 20, 0, 136115, 120870, 137200, 65335, 4, 192, 239287, 50),
  (25, 1, 0, 580, 460, 350, 180, 1, 2, 2000, 100),
  (25, 2, 0, 740, 590, 450, 230, 1, 3, 2620, 90),
  (25, 3, 0, 950, 755, 575, 295, 1, 3, 3340, 81),
  (25, 4, 0, 1215, 965, 735, 375, 1, 4, 4170, 73),
  (25, 5, 0, 1555, 1235, 940, 485, 1, 5, 5140, 66),
  (25, 6, 0, 1995, 1580, 1205, 620, 1, 6, 6260, 59),
  (25, 7, 0, 2550, 2025, 1540, 790, 1, 7, 7570, 53),
  (25, 8, 0, 3265, 2590, 1970, 1015, 1, 9, 9080, 48),
  (25, 9, 0, 4180, 3315, 2520, 1295, 1, 10, 10830, 43),
  (25, 10, 0, 5350, 4245, 3230, 1660, 1, 12, 12860, 39),
  (25, 11, 0, 6845, 5430, 4130, 2125, 2, 15, 15220, 35),
  (25, 12, 0, 8765, 6950, 5290, 2720, 2, 18, 17950, 31),
  (25, 13, 0, 11220, 8900, 6770, 3480, 2, 21, 21130, 28),
  (25, 14, 0, 14360, 11390, 8665, 4455, 2, 26, 24810, 25),
  (25, 15, 0, 18380, 14580, 11090, 5705, 2, 31, 29080, 23),
  (25, 16, 0, 23530, 18660, 14200, 7300, 2, 37, 34030, 21),
  (25, 17, 0, 30115, 23885, 18175, 9345, 2, 44, 39770, 19),
  (25, 18, 0, 38550, 30570, 23260, 11965, 2, 53, 46440, 17),
  (25, 19, 0, 49340, 39130, 29775, 15315, 2, 64, 54170, 15),
  (25, 20, 0, 63155, 50090, 38110, 19600, 2, 77, 63130, 14),
  (26, 1, 0, 550, 800, 750, 250, 1, 6, 5000, 100),
  (26, 2, 0, 705, 1025, 960, 320, 1, 7, 6100, 90),
  (26, 3, 0, 900, 1310, 1230, 410, 1, 9, 7380, 81),
  (26, 4, 0, 1155, 1680, 1575, 525, 1, 10, 8860, 73),
  (26, 5, 0, 1475, 2145, 2015, 670, 1, 12, 10570, 66),
  (26, 6, 0, 1890, 2750, 2575, 860, 1, 15, 12560, 59),
  (26, 7, 0, 2420, 3520, 3300, 1100, 1, 18, 14880, 53),
  (26, 8, 0, 3095, 4505, 4220, 1405, 1, 21, 17560, 48),
  (26, 9, 0, 3965, 5765, 5405, 1800, 1, 26, 20660, 43),
  (26, 10, 0, 5075, 7380, 6920, 2305, 1, 31, 24270, 39),
  (26, 11, 0, 6495, 9445, 8855, 2950, 2, 37, 28450, 35),
  (26, 12, 0, 8310, 12090, 11335, 3780, 2, 45, 33306, 31),
  (26, 13, 0, 10640, 15475, 14505, 4835, 2, 53, 38935, 28),
  (26, 14, 0, 13615, 19805, 18570, 6190, 2, 64, 45465, 25),
  (26, 15, 0, 17430, 25355, 23770, 7925, 2, 77, 53039, 23),
  (26, 16, 0, 22310, 32450, 30425, 10140, 2, 92, 61825, 21),
  (26, 17, 0, 28560, 41540, 38940, 12980, 2, 111, 72018, 19),
  (26, 18, 0, 36555, 53170, 49845, 16615, 2, 133, 83840, 17),
  (26, 19, 0, 46790, 68055, 63805, 21270, 2, 160, 97555, 15),
  (26, 20, 0, 59890, 87110, 81675, 27225, 2, 192, 113464, 14),
  (27, 1, 0, 2880, 2740, 2580, 990, 4, 7, 8000, 0),
  (27, 2, 0, 3630, 3450, 3250, 1245, 2, 9, 9580, 0),
  (27, 3, 0, 4570, 4350, 4095, 1570, 2, 10, 11410, 0),
  (27, 4, 0, 5760, 5480, 5160, 1980, 2, 12, 13540, 0),
  (27, 5, 0, 7260, 6905, 6505, 2495, 2, 15, 16010, 0),
  (27, 6, 0, 9145, 8700, 8195, 3145, 3, 18, 18870, 0),
  (27, 7, 0, 11525, 10965, 10325, 3960, 3, 21, 22180, 0),
  (27, 8, 0, 14520, 13815, 13010, 4990, 3, 26, 26030, 0),
  (27, 9, 0, 18295, 17405, 16390, 6290, 3, 31, 30500, 0),
  (27, 10, 0, 23055, 21930, 20650, 7925, 3, 37, 35680, 1),
  (27, 11, 0, 9045, 27635, 26020, 9985, 3, 45, 41690, 1),
  (27, 12, 0, 6600, 34820, 32785, 12580, 3, 53, 48660, 1),
  (27, 13, 0, 46115, 43875, 41310, 15850, 3, 64, 56740, 1),
  (27, 14, 0, 58105, 55280, 52050, 19975, 3, 77, 66120, 1),
  (27, 15, 0, 73210, 69655, 65585, 25165, 3, 92, 77000, 1),
  (27, 16, 0, 92245, 87760, 82640, 31710, 4, 111, 89620, 1),
  (27, 17, 0, 116230, 110580, 104125, 39955, 4, 133, 104260, 1),
  (27, 18, 0, 146450, 139330, 131195, 50340, 4, 160, 121240, 1),
  (27, 19, 0, 184530, 175560, 165305, 63430, 4, 192, 140940, 1),
  (27, 20, 0, 232505, 221205, 208285, 79925, 4, 230, 163790, 1),
  (28, 1, 0, 1400, 1330, 1200, 400, 3, 4, 3000, 110),
  (28, 2, 0, 1790, 1700, 1535, 510, 2, 4, 3780, 120),
  (28, 3, 0, 2295, 2180, 1965, 655, 2, 5, 4680, 130),
  (28, 4, 0, 2935, 2790, 2515, 840, 2, 6, 5730, 140),
  (28, 5, 0, 3760, 3570, 3220, 1075, 2, 7, 6950, 150),
  (28, 6, 0, 4810, 4570, 4125, 1375, 2, 9, 8360, 160),
  (28, 7, 0, 6155, 5850, 5280, 1760, 2, 11, 10000, 170),
  (28, 8, 0, 7880, 7485, 6755, 2250, 2, 13, 11900, 180),
  (28, 9, 0, 10090, 9585, 8645, 2880, 2, 15, 14110, 190),
  (28, 10, 0, 12915, 12265, 11070, 3690, 2, 19, 16660, 200),
  (28, 11, 0, 16530, 15700, 14165, 4720, 3, 22, 19630, 210),
  (28, 12, 0, 21155, 20100, 18135, 6045, 3, 27, 23070, 220),
  (28, 13, 0, 27080, 25725, 23210, 7735, 3, 32, 27060, 230),
  (28, 14, 0, 34660, 32930, 29710, 9905, 3, 39, 31690, 240),
  (28, 15, 0, 44370, 42150, 38030, 12675, 3, 46, 37060, 250),
  (28, 16, 0, 56790, 53950, 48680, 16225, 3, 55, 43290, 260),
  (28, 17, 0, 72690, 69060, 62310, 20770, 3, 67, 50520, 270),
  (28, 18, 0, 93045, 88395, 79755, 26585, 3, 80, 58900, 280),
  (28, 19, 0, 119100, 113145, 102085, 34030, 3, 96, 68630, 290),
  (28, 20, 0, 152445, 144825, 130670, 43555, 3, 115, 79910, 300),
  (29, 1, 0, 630, 420, 780, 360, 4, 1, 2000, 100),
  (29, 2, 0, 805, 540, 1000, 460, 2, 1, 2620, 90),
  (29, 3, 0, 1035, 690, 1275, 585, 2, 2, 3340, 81),
  (29, 4, 0, 1320, 885, 1635, 750, 2, 2, 4170, 73),
  (29, 5, 0, 1695, 1125, 2100, 960, 2, 2, 5140, 66),
  (29, 6, 0, 2160, 1440, 2685, 1230, 3, 3, 6260, 59),
  (29, 7, 0, 2775, 1845, 3435, 1590, 3, 4, 7570, 53),
  (29, 8, 0, 3540, 2370, 4395, 2025, 3, 4, 9080, 48),
  (29, 9, 0, 4545, 3030, 5625, 2595, 3, 5, 10830, 43),
  (29, 10, 0, 5805, 3870, 7200, 3315, 3, 6, 12860, 39),
  (29, 11, 0, 7460, 4965, 9210, 4245, 3, 7, 15220, 35),
  (29, 12, 0, 9525, 6345, 11790, 5445, 3, 9, 17950, 31),
  (29, 13, 0, 12180, 8130, 15090, 6960, 3, 11, 21130, 28),
  (29, 14, 0, 15600, 10395, 19305, 8910, 3, 13, 24810, 25),
  (29, 15, 0, 19965, 13305, 24720, 11415, 3, 15, 29080, 23),
  (29, 16, 0, 25560, 17040, 31635, 14610, 4, 18, 34030, 21),
  (29, 17, 0, 32715, 21810, 40500, 18690, 4, 22, 39770, 19),
  (29, 18, 0, 41870, 27915, 51840, 23925, 4, 27, 46440, 17),
  (29, 19, 0, 53595, 35730, 66360, 30630, 4, 32, 54170, 15),
  (29, 20, 0, 68595, 45735, 84930, 39195, 4, 38, 63130, 14),
  (30, 1, 0, 780, 420, 660, 300, 5, 2, 2200, 100),
  (30, 2, 0, 1000, 540, 845, 385, 3, 3, 2850, 90),
  (30, 3, 0, 1280, 690, 1080, 490, 3, 3, 3610, 81),
  (30, 4, 0, 1635, 880, 1385, 630, 3, 4, 4490, 73),
  (30, 5, 0, 2095, 1125, 1770, 805, 3, 5, 5500, 66),
  (30, 6, 0, 2680, 1445, 2270, 1030, 3, 6, 6680, 59),
  (30, 7, 0, 3430, 1845, 2905, 1320, 3, 7, 8050, 53),
  (30, 8, 0, 4390, 2365, 3715, 1690, 3, 9, 9640, 48),
  (30, 9, 0, 5620, 3025, 4755, 2160, 3, 10, 11480, 43),
  (30, 10, 0, 7195, 3875, 6085, 2765, 3, 12, 13620, 39),
  (30, 11, 0, 9210, 4960, 7790, 3540, 4, 15, 16100, 35),
  (30, 12, 0, 11785, 6345, 9975, 4535, 4, 18, 18980, 31),
  (30, 13, 0, 15085, 8125, 12765, 5805, 4, 21, 22310, 28),
  (30, 14, 0, 19310, 10400, 16340, 7430, 4, 26, 26180, 25),
  (30, 15, 0, 24720, 13310, 20915, 9505, 4, 31, 30670, 23),
  (30, 16, 0, 31640, 17035, 26775, 12170, 4, 37, 35880, 21),
  (30, 17, 0, 40500, 21810, 34270, 15575, 4, 44, 41920, 19),
  (30, 18, 0, 51840, 27915, 43865, 19940, 4, 53, 48930, 17),
  (30, 19, 0, 66355, 35730, 56145, 25520, 4, 64, 57060, 15),
  (30, 20, 0, 84935, 45735, 71870, 32665, 4, 77, 66490, 14),
  (31, 1, 0, 70, 90, 170, 70, 0, 1, 2000, 3),
  (31, 2, 0, 90, 115, 220, 90, 0, 1, 2620, 6),
  (31, 3, 0, 115, 145, 280, 115, 0, 2, 3340, 9),
  (31, 4, 0, 145, 190, 355, 145, 0, 2, 4170, 13),
  (31, 5, 0, 190, 240, 455, 190, 0, 2, 5140, 16),
  (31, 6, 0, 240, 310, 585, 240, 1, 3, 6260, 19),
  (31, 7, 0, 310, 395, 750, 310, 1, 4, 7570, 23),
  (31, 8, 0, 395, 505, 955, 395, 1, 4, 9080, 27),
  (31, 9, 0, 505, 650, 1225, 505, 1, 5, 10830, 30),
  (31, 10, 0, 645, 830, 1570, 645, 1, 6, 12860, 34),
  (31, 11, 0, 825, 1065, 2005, 825, 1, 7, 15220, 38),
  (31, 12, 0, 1060, 1360, 2570, 1060, 1, 9, 17950, 43),
  (31, 13, 0, 1355, 1740, 3290, 1355, 1, 11, 21130, 47),
  (31, 14, 0, 1735, 2230, 4210, 1735, 1, 13, 24810, 51),
  (31, 15, 0, 2220, 2850, 5390, 2220, 1, 15, 29080, 56),
  (31, 16, 0, 2840, 3650, 6895, 2840, 2, 18, 34030, 60),
  (31, 17, 0, 3635, 4675, 8825, 3635, 2, 22, 39770, 65),
  (31, 18, 0, 4650, 5980, 11300, 4650, 2, 27, 46440, 70),
  (31, 19, 0, 5955, 7655, 14460, 5955, 2, 32, 54170, 75),
  (31, 20, 0, 7620, 9800, 18510, 7620, 2, 38, 63130, 81),
  (32, 1, 0, 120, 200, 0, 80, 0, 1, 2000, 2),
  (32, 2, 0, 155, 255, 0, 100, 0, 1, 2620, 4),
  (32, 3, 0, 195, 330, 0, 130, 0, 2, 3340, 6),
  (32, 4, 0, 250, 420, 0, 170, 0, 2, 4170, 8),
  (32, 5, 0, 320, 535, 0, 215, 0, 2, 5140, 10),
  (32, 6, 0, 410, 685, 0, 275, 1, 3, 6260, 13),
  (32, 7, 0, 530, 880, 0, 350, 1, 4, 7570, 15),
  (32, 8, 0, 675, 1125, 0, 450, 1, 4, 9080, 17),
  (32, 9, 0, 865, 1440, 0, 575, 1, 5, 10830, 20),
  (32, 10, 0, 1105, 1845, 0, 740, 1, 6, 12860, 22),
  (32, 11, 0, 1415, 2360, 0, 945, 1, 7, 15220, 24),
  (32, 12, 0, 1815, 3020, 0, 1210, 1, 9, 17950, 27),
  (32, 13, 0, 2320, 3870, 0, 1545, 1, 11, 21130, 29),
  (32, 14, 0, 2970, 4950, 0, 1980, 1, 13, 24810, 32),
  (32, 15, 0, 3805, 6340, 0, 2535, 1, 15, 29080, 35),
  (32, 16, 0, 4870, 8115, 0, 3245, 2, 18, 34030, 37),
  (32, 17, 0, 6230, 10385, 0, 4155, 2, 22, 39770, 40),
  (32, 18, 0, 7975, 13290, 0, 5315, 2, 27, 46440, 43),
  (32, 19, 0, 10210, 17015, 0, 6805, 2, 32, 54170, 46),
  (32, 20, 0, 13065, 21780, 0, 8710, 2, 38, 63130, 49),
  (33, 1, 0, 160, 100, 80, 60, 0, 1, 2000, 2),
  (33, 2, 0, 205, 130, 100, 75, 0, 1, 2620, 5),
  (33, 3, 0, 260, 165, 130, 100, 0, 2, 3340, 8),
  (33, 4, 0, 335, 210, 170, 125, 0, 2, 4170, 10),
  (33, 5, 0, 430, 270, 215, 160, 0, 2, 5140, 13),
  (33, 6, 0, 550, 345, 275, 205, 1, 3, 6260, 16),
  (33, 7, 0, 705, 440, 350, 265, 1, 4, 7570, 19),
  (33, 8, 0, 900, 565, 450, 340, 1, 4, 9080, 22),
  (33, 9, 0, 1155, 720, 575, 430, 1, 5, 10830, 25),
  (33, 10, 0, 1475, 920, 740, 555, 1, 6, 12860, 28),
  (33, 11, 0, 1890, 1180, 945, 710, 1, 7, 15220, 31),
  (33, 12, 0, 2420, 1510, 1210, 905, 1, 9, 17950, 34),
  (33, 13, 0, 3095, 1935, 1545, 1160, 1, 11, 21130, 38),
  (33, 14, 0, 3960, 2475, 1980, 1485, 1, 13, 24810, 41),
  (33, 15, 0, 5070, 3170, 2535, 1900, 1, 15, 29080, 45),
  (33, 16, 0, 6490, 4055, 3245, 2435, 2, 18, 34030, 48),
  (33, 17, 0, 8310, 5190, 4155, 3115, 2, 22, 39770, 52),
  (33, 18, 0, 10635, 6645, 5315, 3990, 2, 27, 46440, 56),
  (33, 19, 0, 13610, 8505, 6805, 5105, 2, 32, 54170, 60),
  (33, 20, 0, 17420, 10890, 8710, 6535, 2, 38, 63130, 64),
  (34, 1, 0, 155, 130, 125, 70, 2, 1, 2200, 110),
  (34, 2, 0, 200, 165, 160, 90, 1, 1, 3150, 120),
  (34, 3, 0, 255, 215, 205, 115, 1, 2, 4260, 130),
  (34, 4, 0, 325, 275, 260, 145, 1, 2, 5540, 140),
  (34, 5, 0, 415, 350, 335, 190, 1, 2, 7020, 150),
  (34, 6, 0, 535, 445, 430, 240, 2, 3, 8750, 160),
  (34, 7, 0, 680, 570, 550, 310, 2, 4, 10750, 170),
  (34, 8, 0, 875, 730, 705, 395, 2, 4, 13070, 180),
  (34, 9, 0, 1115, 935, 900, 505, 2, 5, 15760, 190),
  (34, 10, 0, 1430, 1200, 1155, 645, 2, 6, 18880, 200),
  (34, 11, 0, 1830, 1535, 1475, 825, 2, 7, 22500, 210),
  (34, 12, 0, 2340, 1965, 1890, 1060, 2, 9, 26700, 220),
  (34, 13, 0, 3000, 2515, 2420, 1355, 2, 11, 31570, 230),
  (34, 14, 0, 3840, 3220, 3095, 1735, 2, 13, 37220, 240),
  (34, 15, 0, 4910, 4120, 3960, 2220, 2, 15, 43780, 250),
  (34, 16, 0, 6290, 5275, 5070, 2840, 3, 18, 51380, 260),
  (34, 17, 0, 8050, 6750, 6490, 3635, 3, 22, 60200, 270),
  (34, 18, 0, 10300, 8640, 8310, 4650, 3, 27, 70430, 280),
  (34, 19, 0, 13185, 11060, 10635, 5955, 3, 32, 82300, 290),
  (34, 20, 0, 16880, 14155, 13610, 7620, 3, 38, 96070, 300),
  (35, 1, 0, 1460, 930, 1250, 1740, 6, 5, 8000, 1),
  (35, 2, 0, 2045, 1300, 1750, 2435, 3, 6, 9880, 2),
  (35, 3, 0, 2860, 1825, 2450, 3410, 3, 7, 12060, 3),
  (35, 4, 0, 4005, 2550, 3430, 4775, 3, 8, 14590, 4),
  (35, 5, 0, 5610, 3575, 4800, 6685, 3, 10, 17530, 5),
  (35, 6, 0, 7850, 5000, 6725, 9360, 4, 12, 20930, 6),
  (35, 7, 0, 10995, 7000, 9410, 13100, 4, 14, 24880, 7),
  (35, 8, 0, 15390, 9805, 13175, 18340, 4, 17, 29460, 8),
  (35, 9, 0, 21545, 13725, 18445, 25680, 4, 21, 34770, 9),
  (35, 10, 0, 30165, 19215, 25825, 35950, 4, 25, 40930, 10),
  (36, 1, 0, 100, 100, 100, 100, 4, 1, 2000, 10),
  (36, 2, 0, 130, 130, 130, 130, 2, 1, 2320, 22),
  (36, 3, 0, 165, 165, 165, 165, 2, 2, 2690, 35),
  (36, 4, 0, 210, 210, 210, 210, 2, 2, 3120, 49),
  (36, 5, 0, 270, 270, 270, 270, 2, 2, 3620, 64),
  (36, 6, 0, 345, 345, 345, 345, 3, 3, 4200, 80),
  (36, 7, 0, 440, 440, 440, 440, 3, 4, 4870, 97),
  (36, 8, 0, 565, 565, 565, 565, 3, 4, 5650, 115),
  (36, 9, 0, 720, 720, 720, 720, 3, 5, 6560, 134),
  (36, 10, 0, 920, 920, 920, 920, 3, 6, 7610, 154),
  (36, 11, 0, 1180, 1180, 1180, 1180, 3, 7, 8820, 175),
  (36, 12, 0, 1510, 1510, 1510, 1510, 3, 9, 10230, 196),
  (36, 13, 0, 1935, 1935, 1935, 1935, 3, 11, 11870, 218),
  (36, 14, 0, 2475, 2475, 2475, 2475, 3, 13, 13770, 241),
  (36, 15, 0, 3170, 3170, 3170, 3170, 3, 15, 15980, 265),
  (36, 16, 0, 4055, 4055, 4055, 4055, 4, 18, 18530, 290),
  (36, 17, 0, 5190, 5190, 5190, 5190, 4, 22, 21500, 316),
  (36, 18, 0, 6645, 6645, 6645, 6645, 4, 27, 24940, 343),
  (36, 19, 0, 8505, 8505, 8505, 8505, 4, 32, 28930, 371),
  (36, 20, 0, 10890, 10890, 10890, 10890, 4, 38, 33550, 400),
  (37, 1, 0, 700, 670, 700, 240, 2, 1, 2300, 0),
  (37, 2, 0, 930, 890, 930, 320, 1, 1, 2670, 0),
  (37, 3, 0, 1240, 1185, 1240, 425, 1, 2, 3090, 0),
  (37, 4, 0, 1645, 1575, 1645, 565, 1, 2, 3590, 0),
  (37, 5, 0, 2190, 2095, 2190, 750, 1, 2, 4160, 0),
  (37, 6, 0, 2915, 2790, 2915, 1000, 2, 3, 4830, 0),
  (37, 7, 0, 3875, 3710, 3875, 1330, 2, 4, 5600, 0),
  (37, 8, 0, 5155, 4930, 5155, 1765, 2, 4, 6500, 0),
  (37, 9, 0, 6855, 6560, 6855, 2350, 2, 5, 7540, 0),
  (37, 10, 0, 9115, 8725, 9115, 3125, 2, 6, 8750, 1),
  (37, 11, 0, 12125, 11605, 12125, 4155, 2, 7, 10150, 1),
  (37, 12, 0, 16125, 15435, 16125, 5530, 2, 9, 11770, 1),
  (37, 13, 0, 21445, 20525, 21445, 7350, 2, 11, 13650, 1),
  (37, 14, 0, 28520, 27300, 28520, 9780, 2, 13, 15840, 1),
  (37, 15, 0, 37935, 36310, 37935, 13005, 2, 15, 18370, 2),
  (37, 16, 0, 50450, 48290, 50450, 17300, 3, 18, 21310, 2),
  (37, 17, 0, 67100, 64225, 67100, 23005, 3, 22, 24720, 2),
  (37, 18, 0, 89245, 85420, 89245, 30600, 3, 27, 28680, 2),
  (37, 19, 0, 118695, 113605, 118695, 40695, 3, 32, 33260, 2),
  (37, 20, 0, 157865, 151095, 157865, 54125, 3, 38, 38590, 3),
  (38, 1, 0, 650, 800, 450, 200, 1, 1, 9000, 3600),
  (38, 2, 0, 830, 1025, 575, 255, 1, 1, 10740, 5100),
  (38, 3, 0, 1065, 1310, 735, 330, 1, 2, 12760, 6900),
  (38, 4, 0, 1365, 1680, 945, 420, 1, 2, 15100, 9300),
  (38, 5, 0, 1745, 2145, 1210, 535, 1, 2, 17820, 12000),
  (38, 6, 0, 2235, 2750, 1545, 685, 1, 3, 20970, 15000),
  (38, 7, 0, 2860, 3520, 1980, 880, 1, 4, 24620, 18900),
  (38, 8, 0, 3660, 4505, 2535, 1125, 1, 4, 28860, 23400),
  (38, 9, 0, 4685, 5765, 3245, 1440, 1, 5, 33780, 28800),
  (38, 10, 0, 5995, 7380, 4150, 1845, 1, 6, 39480, 35400),
  (38, 11, 0, 7675, 9445, 5315, 2360, 2, 7, 46100, 43200),
  (38, 12, 0, 9825, 12090, 6800, 3020, 2, 9, 53780, 52800),
  (38, 13, 0, 12575, 15475, 8705, 3870, 2, 11, 62680, 64200),
  (38, 14, 0, 16095, 19805, 11140, 4950, 2, 13, 73010, 77700),
  (38, 15, 0, 20600, 25355, 14260, 6340, 2, 15, 84990, 93900),
  (38, 16, 0, 26365, 32450, 18255, 8115, 2, 18, 98890, 113700),
  (38, 17, 0, 33750, 41540, 23365, 10385, 2, 22, 115010, 137100),
  (38, 18, 0, 43200, 53170, 29910, 13290, 2, 27, 133710, 165300),
  (38, 19, 0, 55295, 68055, 38280, 17015, 2, 32, 155400, 199200),
  (38, 20, 0, 70780, 87110, 49000, 21780, 2, 38, 180570, 240000),
  (39, 1, 0, 400, 500, 350, 100, 1, 1, 7000, 3600),
  (39, 2, 0, 510, 640, 450, 130, 1, 1, 8420, 5100),
  (39, 3, 0, 655, 820, 575, 165, 1, 2, 10070, 6900),
  (39, 4, 0, 840, 1050, 735, 210, 1, 2, 11980, 9300),
  (39, 5, 0, 1075, 1340, 940, 270, 1, 2, 14190, 12000),
  (39, 6, 0, 1375, 1720, 1205, 345, 1, 3, 16770, 15000),
  (39, 7, 0, 1760, 2200, 1540, 440, 1, 4, 19750, 18900),
  (39, 8, 0, 2250, 2815, 1970, 565, 1, 4, 23210, 23400),
  (39, 9, 0, 2880, 3605, 2520, 720, 1, 5, 27220, 28800),
  (39, 10, 0, 3690, 4610, 3230, 920, 1, 6, 31880, 35400),
  (39, 11, 0, 4720, 5905, 4130, 1180, 2, 7, 37280, 43200),
  (39, 12, 0, 6045, 7555, 5290, 1510, 2, 9, 43540, 52800),
  (39, 13, 0, 7735, 9670, 6770, 1935, 2, 11, 50810, 64200),
  (39, 14, 0, 9905, 12380, 8665, 2475, 2, 13, 59240, 77700),
  (39, 15, 0, 12675, 15845, 11090, 3170, 2, 15, 69010, 93900),
  (39, 16, 0, 16225, 20280, 14200, 4055, 2, 18, 80360, 113700),
  (39, 17, 0, 20770, 25960, 18175, 5190, 2, 22, 93510, 137100),
  (39, 18, 0, 26585, 33230, 23260, 6645, 2, 27, 108780, 165300),
  (39, 19, 0, 34030, 42535, 29775, 8505, 2, 32, 126480, 199200),
  (39, 20, 0, 43555, 54445, 38110, 10890, 2, 38, 147020, 240000),
  (40, 1, 0, 66700, 69050, 72200, 13200, 1, 0, 18000, 0),
  (40, 2, 0, 68535, 70950, 74185, 13565, 1, 0, 18850, 0),
  (40, 3, 0, 70420, 72900, 76225, 13935, 1, 0, 19720, 0),
  (40, 4, 0, 72355, 74905, 78320, 14320, 1, 0, 20590, 0),
  (40, 5, 0, 74345, 76965, 80475, 14715, 1, 0, 21480, 0),
  (40, 6, 0, 76390, 79080, 82690, 15120, 1, 0, 22380, 0),
  (40, 7, 0, 78490, 81255, 84965, 15535, 1, 0, 23290, 0),
  (40, 8, 0, 80650, 83490, 87300, 15960, 1, 0, 24220, 0),
  (40, 9, 0, 82865, 85785, 89700, 16400, 1, 0, 25160, 0),
  (40, 10, 0, 85145, 88145, 92165, 16850, 1, 0, 26110, 0),
  (40, 11, 0, 87485, 90570, 94700, 17315, 2, 0, 27080, 0),
  (40, 12, 0, 89895, 93060, 97305, 17790, 2, 0, 28060, 0),
  (40, 13, 0, 92365, 95620, 99980, 18280, 2, 0, 29050, 0),
  (40, 14, 0, 94905, 98250, 102730, 18780, 2, 0, 30060, 0),
  (40, 15, 0, 97515, 100950, 105555, 19300, 2, 0, 31080, 0),
  (40, 16, 0, 100195, 103725, 108460, 19830, 2, 0, 32110, 0),
  (40, 17, 0, 102950, 106580, 111440, 20375, 2, 0, 33160, 0),
  (40, 18, 0, 105785, 109510, 114505, 20935, 2, 0, 34230, 0),
  (40, 19, 0, 108690, 112520, 117655, 21510, 2, 0, 35300, 0),
  (40, 20, 0, 111680, 115615, 120890, 22100, 2, 0, 36400, 0),
  (40, 21, 0, 114755, 118795, 124215, 22710, 3, 0, 37510, 0),
  (40, 22, 0, 117910, 122060, 127630, 23335, 3, 0, 38630, 0),
  (40, 23, 0, 121150, 125420, 131140, 23975, 3, 0, 39770, 0),
  (40, 24, 0, 124480, 128870, 134745, 24635, 3, 0, 40930, 0),
  (40, 25, 0, 127905, 132410, 138455, 25315, 3, 0, 42100, 0),
  (40, 26, 0, 131425, 136055, 142260, 26010, 3, 0, 43290, 0),
  (40, 27, 0, 135035, 139795, 146170, 26725, 3, 0, 44500, 0),
  (40, 28, 0, 138750, 143640, 150190, 27460, 3, 0, 45720, 0),
  (40, 29, 0, 142565, 147590, 154320, 28215, 3, 0, 46960, 0),
  (40, 30, 0, 146485, 151650, 158565, 28990, 3, 0, 48220, 0),
  (40, 31, 0, 150515, 155820, 162925, 29785, 4, 0, 49500, 0),
  (40, 32, 0, 154655, 160105, 167405, 30605, 4, 0, 50790, 0),
  (40, 33, 0, 158910, 164505, 172010, 31450, 4, 0, 52100, 0),
  (40, 34, 0, 163275, 169030, 176740, 32315, 4, 0, 53430, 0),
  (40, 35, 0, 167770, 173680, 181600, 33200, 4, 0, 54780, 0),
  (40, 36, 0, 172380, 178455, 186595, 34115, 4, 0, 56140, 0),
  (40, 37, 0, 177120, 183360, 191725, 35055, 4, 0, 57530, 0),
  (40, 38, 0, 181995, 188405, 197000, 36015, 4, 0, 58940, 0),
  (40, 39, 0, 186995, 193585, 202415, 37005, 4, 0, 60360, 0),
  (40, 40, 0, 192140, 198910, 207985, 38025, 4, 0, 61810, 0),
  (40, 41, 0, 197425, 204380, 213705, 39070, 5, 0, 63270, 0),
  (40, 42, 0, 202855, 210000, 219580, 40145, 5, 0, 64760, 0),
  (40, 43, 0, 208430, 215775, 225620, 41250, 5, 0, 66260, 0),
  (40, 44, 0, 214165, 221710, 231825, 42385, 5, 0, 67790, 0),
  (40, 45, 0, 220055, 227805, 238200, 43550, 5, 0, 69340, 0),
  (40, 46, 0, 226105, 234070, 244750, 44745, 5, 0, 70910, 0),
  (40, 47, 0, 232320, 240505, 251480, 45975, 5, 0, 72500, 0),
  (40, 48, 0, 238710, 247120, 258395, 47240, 5, 0, 74120, 0),
  (40, 49, 0, 245275, 253915, 265500, 48540, 5, 0, 75760, 0),
  (40, 50, 0, 252020, 260900, 272800, 49875, 5, 0, 77420, 0),
  (40, 51, 0, 258950, 268075, 280305, 51245, 6, 0, 79100, 0),
  (40, 52, 0, 266070, 275445, 288010, 52655, 6, 0, 80810, 0),
  (40, 53, 0, 273390, 283020, 295930, 54105, 6, 0, 82540, 0),
  (40, 54, 0, 280905, 290805, 304070, 55590, 6, 0, 84290, 0),
  (40, 55, 0, 288630, 298800, 312430, 57120, 6, 0, 86070, 0),
  (40, 56, 0, 296570, 307020, 321025, 58690, 6, 0, 87880, 0),
  (40, 57, 0, 304725, 315460, 329850, 60305, 6, 0, 89710, 0),
  (40, 58, 0, 313105, 324135, 338925, 61965, 6, 0, 91570, 0),
  (40, 59, 0, 321715, 333050, 348245, 63670, 6, 0, 93450, 0),
  (40, 60, 0, 330565, 342210, 357820, 65420, 6, 0, 95360, 0),
  (40, 61, 0, 339655, 351620, 367660, 67220, 7, 0, 97290, 0),
  (40, 62, 0, 348995, 361290, 377770, 69065, 7, 0, 99250, 0),
  (40, 63, 0, 358590, 371225, 388160, 70965, 7, 0, 101240, 0),
  (40, 64, 0, 368450, 381435, 398835, 72915, 7, 0, 103260, 0),
  (40, 65, 0, 378585, 391925, 409800, 74920, 7, 0, 105310, 0),
  (40, 66, 0, 388995, 402700, 421070, 76985, 7, 0, 107380, 0),
  (40, 67, 0, 399695, 413775, 432650, 79100, 7, 0, 109480, 0),
  (40, 68, 0, 410685, 425155, 444550, 81275, 7, 0, 111620, 0),
  (40, 69, 0, 421980, 436845, 456775, 83510, 7, 0, 113780, 0),
  (40, 70, 0, 433585, 448860, 469335, 85805, 7, 0, 115970, 0),
  (40, 71, 0, 445505, 461205, 482240, 88165, 8, 0, 118200, 0),
  (40, 72, 0, 457760, 473885, 495505, 90590, 8, 0, 120450, 0),
  (40, 73, 0, 470345, 486920, 509130, 93080, 8, 0, 122740, 0),
  (40, 74, 0, 483280, 500310, 523130, 95640, 8, 0, 125060, 0),
  (40, 75, 0, 496570, 514065, 537520, 98270, 8, 0, 127410, 0),
  (40, 76, 0, 510225, 528205, 552300, 100975, 8, 0, 129790, 0),
  (40, 77, 0, 524260, 542730, 567490, 103750, 8, 0, 132210, 0),
  (40, 78, 0, 538675, 557655, 583095, 106605, 8, 0, 134660, 0),
  (40, 79, 0, 553490, 572990, 599130, 109535, 8, 0, 137140, 0),
  (40, 80, 0, 568710, 588745, 615605, 112550, 8, 0, 139660, 0),
  (40, 81, 0, 584350, 604935, 632535, 115645, 9, 0, 142220, 0),
  (40, 82, 0, 600420, 621575, 649930, 118825, 9, 0, 144810, 0),
  (40, 83, 0, 616930, 638665, 667800, 122090, 9, 0, 147440, 0),
  (40, 84, 0, 633895, 656230, 686165, 125450, 9, 0, 150100, 0),
  (40, 85, 0, 651330, 674275, 705035, 128900, 9, 0, 152800, 0),
  (40, 86, 0, 669240, 692820, 724425, 132445, 9, 0, 155540, 0),
  (40, 87, 0, 687645, 711870, 744345, 136085, 9, 0, 158320, 0),
  (40, 88, 0, 706555, 731445, 764815, 139830, 9, 0, 161140, 0),
  (40, 89, 0, 725985, 751560, 785850, 143675, 9, 0, 163990, 0),
  (40, 90, 0, 745950, 772230, 807460, 147625, 9, 0, 166890, 0),
  (40, 91, 0, 766460, 793465, 829665, 151685, 10, 0, 169820, 0),
  (40, 92, 0, 787540, 815285, 852480, 155855, 10, 0, 172800, 0),
  (40, 93, 0, 809195, 837705, 875920, 160140, 10, 0, 175820, 0),
  (40, 94, 0, 831450, 860745, 900010, 164545, 10, 0, 178880, 0),
  (40, 95, 0, 854315, 884415, 924760, 169070, 10, 0, 181990, 0),
  (40, 96, 0, 877810, 908735, 950190, 173720, 10, 0, 185130, 0),
  (40, 97, 0, 901950, 933725, 976320, 178495, 10, 0, 188330, 0),
  (40, 98, 0, 926750, 959405, 1000000, 183405, 10, 0, 191560, 0),
  (40, 99, 0, 952235, 985785, 1000000, 188450, 10, 0, 194840, 0),
  (40, 100, 0, 1000000, 1000000, 1000000, 193630, 10, 0, 198170, 0),
  (41, 1, 0, 780, 420, 660, 540, 5, 2, 2200, 1),
  (41, 2, 0, 1000, 540, 845, 690, 3, 3, 3152, 1),
  (41, 3, 0, 1280, 690, 1080, 885, 3, 3, 4256, 1),
  (41, 4, 0, 1635, 880, 1385, 1130, 3, 4, 5537, 1),
  (41, 5, 0, 2095, 1125, 1770, 1450, 3, 5, 7023, 1),
  (41, 6, 0, 2680, 1445, 2270, 1855, 3, 6, 8747, 1),
  (41, 7, 0, 3430, 1845, 2905, 2375, 3, 7, 10747, 1),
  (41, 8, 0, 4390, 2365, 3715, 3040, 3, 9, 13066, 1),
  (41, 9, 0, 5620, 3025, 4755, 3890, 3, 10, 15757, 1),
  (41, 10, 0, 7195, 3875, 6085, 4980, 3, 12, 18878, 1),
  (41, 11, 0, 9210, 4960, 7790, 6375, 4, 15, 22498, 1),
  (41, 12, 0, 11785, 6345, 9975, 8160, 4, 18, 26698, 1),
  (41, 13, 0, 15085, 8125, 12765, 10445, 4, 21, 31569, 1),
  (41, 14, 0, 19310, 10400, 16340, 13370, 4, 26, 37220, 1),
  (41, 15, 0, 24720, 13310, 20915, 17115, 4, 31, 43776, 1),
  (41, 16, 0, 31640, 17035, 26775, 21905, 4, 37, 51380, 1),
  (41, 17, 0, 40500, 21810, 34270, 28040, 4, 44, 60201, 1),
  (41, 18, 0, 51840, 27915, 43865, 35890, 4, 53, 70433, 1),
  (41, 19, 0, 66355, 35730, 56145, 45940, 4, 64, 82302, 1),
  (41, 20, 0, 84935, 45735, 71870, 58800, 4, 77, 96070, 1),
  (42, 1, 0, 1380, 1530, 1800, 960, 3, 4, 3000, 100),
  (42, 2, 0, 1770, 1915, 2310, 1230, 2, 4, 3780, 90),
  (42, 3, 0, 2215, 2505, 2955, 1575, 2, 5, 4680, 81),
  (42, 4, 0, 2895, 3210, 3780, 2010, 2, 6, 5730, 73),
  (42, 5, 0, 3705, 4110, 4830, 2580, 2, 7, 6950, 66),
  (42, 6, 0, 4740, 5250, 6180, 3300, 2, 9, 8360, 59),
  (42, 7, 0, 6075, 6735, 7920, 4215, 2, 11, 10000, 53),
  (42, 8, 0, 7730, 8610, 10140, 5600, 2, 13, 11900, 48),
  (42, 9, 0, 9945, 11025, 12975, 4615, 2, 15, 14110, 43),
  (42, 10, 0, 12735, 14115, 16605, 8850, 2, 19, 16660, 39),
  (42, 11, 0, 16290, 18060, 23415, 11340, 3, 22, 19630, 35),
  (42, 12, 0, 20850, 23115, 27195, 14505, 3, 27, 23070, 31),
  (42, 13, 0, 26700, 29595, 34815, 18570, 3, 32, 27060, 28),
  (42, 14, 0, 34170, 37875, 44565, 23775, 3, 39, 31690, 25),
  (42, 15, 0, 43740, 48495, 57045, 30420, 3, 46, 37060, 23),
  (42, 16, 0, 55980, 62070, 73020, 38940, 3, 55, 43290, 21),
  (42, 17, 0, 71655, 79440, 93465, 49485, 3, 67, 50520, 19),
  (42, 18, 0, 91710, 101685, 119625, 63810, 3, 80, 58900, 17),
  (42, 19, 0, 105650, 117140, 137810, 73510, 3, 96, 68630, 15),
  (42, 20, 0, 125225, 138840, 159995, 87090, 3, 115, 79910, 14);


SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+01:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `building_requirement`;
CREATE TABLE `building_requirement` (
  `building`         INT(11)    NOT NULL,
  `require_level`    INT(11)    NOT NULL,
  `require_building` INT(11)    NOT NULL,
  `exclude_building` TINYINT(1) NOT NULL,
  KEY `building` (`building`),
  CONSTRAINT `building_requirement_ibfk_1` FOREIGN KEY (`building`) REFERENCES `building` (`id`)
    ON DELETE CASCADE
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


INSERT INTO `building_requirement` (`building`, `require_level`, `require_building`, `exclude_building`) VALUES
  (5, 10, 1, 0),
  (5, 5, 15, 0),
  (6, 10, 2, 0),
  (6, 5, 15, 0),
  (7, 5, 15, 0),
  (7, 10, 3, 0),
  (8, 5, 4, 0),
  (9, 10, 4, 0),
  (9, 5, 8, 0),
  (9, 5, 15, 0),
  (10, 1, 15, 0),
  (11, 1, 15, 0),
  (12, 3, 15, 0),
  (12, 3, 22, 0),
  (13, 1, 22, 0),
  (13, 3, 15, 0),
  (14, 15, 16, 0),
  (16, 1, 15, 0),
  (17, 1, 10, 0),
  (17, 3, 15, 0),
  (17, 1, 11, 0),
  (18, 1, 15, 0),
  (19, 3, 15, 0),
  (19, 1, 16, 0),
  (20, 3, 12, 0),
  (20, 5, 22, 0),
  (21, 5, 15, 0),
  (21, 10, 22, 0),
  (22, 3, 15, 0),
  (22, 3, 19, 0),
  (24, 10, 22, 0),
  (24, 10, 15, 0),
  (25, 0, 0, 26),
  (25, 5, 15, 0),
  (26, 5, 15, 0),
  (26, 1, 18, 0),
  (26, 0, 0, 25),
  (27, 10, 15, 0),
  (27, 0, 0, 40),
  (28, 10, 20, 0),
  (28, 20, 17, 0),
  (29, 20, 19, 0),
  (30, 20, 20, 0),
  (34, 5, 15, 0),
  (34, 3, 26, 0),
  (35, 10, 16, 0),
  (35, 20, 11, 0),
  (36, 1, 16, 0),
  (37, 1, 16, 0),
  (37, 3, 15, 0),
  (38, 10, 15, 0),
  (39, 10, 15, 0),
  (41, 10, 16, 0),
  (41, 20, 1, 0),
  (41, 10, 16, 0),
  (41, 20, 20, 0),
  (42, 20, 21, 0),
  (42, 10, 15, 0);