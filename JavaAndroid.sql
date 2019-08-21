# phpMyAdmin SQL Dump
# version 2.5.6
# http://www.phpmyadmin.net
#
# Хост: localhost
# Время создания: Авг 21 2019 г., 23:45
# Версия сервера: 3.23.53
# Версия PHP: 4.3.6
# 
# БД : `JavaAndroid`
# 

# --------------------------------------------------------

#
# Структура таблицы `categories`
#

CREATE TABLE `categories` (
  `id` int(2) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `meta_d` varchar(255) NOT NULL default '',
  `meta_k` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `lang` char(3) default NULL,
  PRIMARY KEY  (`id`),
  KEY `lang` (`lang`)
) TYPE=MyISAM AUTO_INCREMENT=11 ;

# --------------------------------------------------------

#
# Структура таблицы `comments`
#

CREATE TABLE `comments` (
  `id` int(5) NOT NULL auto_increment,
  `post` int(5) NOT NULL default '0',
  `author` varchar(100) NOT NULL default '',
  `text` text NOT NULL,
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=13 ;

# --------------------------------------------------------

#
# Структура таблицы `comments_setting`
#

CREATE TABLE `comments_setting` (
  `id` int(1) NOT NULL auto_increment,
  `img` varchar(255) NOT NULL default '',
  `sum` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

# --------------------------------------------------------

#
# Структура таблицы `data`
#

CREATE TABLE `data` (
  `id` int(5) NOT NULL auto_increment,
  `cat` int(1) NOT NULL default '0',
  `meta_d` varchar(255) NOT NULL default '',
  `meta_k` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `text` text NOT NULL,
  `view` int(7) NOT NULL default '0',
  `author` varchar(100) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  `mini_img` varchar(255) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `secret` int(1) NOT NULL default '0',
  `rating` int(10) NOT NULL default '5',
  `q_vote` int(10) NOT NULL default '1',
  `lang` char(3) default NULL,
  PRIMARY KEY  (`id`),
  FULLTEXT KEY `text` (`text`),
  KEY `lang` (`lang`)
) TYPE=MyISAM AUTO_INCREMENT=101 ;

# --------------------------------------------------------

#
# Структура таблицы `friends`
#

CREATE TABLE `friends` (
  `id` int(11) NOT NULL auto_increment,
  `link` varchar(255) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=6 ;

# --------------------------------------------------------

#
# Структура таблицы `navigation`
#

CREATE TABLE `navigation` (
  `id` tinyint(1) NOT NULL default '0',
  `title` varchar(50) NOT NULL default '',
  `page` varchar(255) NOT NULL default '',
  `lang` char(3) NOT NULL default '',
  KEY `id` (`id`,`lang`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Структура таблицы `online`
#

CREATE TABLE `online` (
  `id` int(6) NOT NULL auto_increment,
  `ip` char(15) default NULL,
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`),
  KEY `ip` (`ip`)
) TYPE=MyISAM AUTO_INCREMENT=24 ;

# --------------------------------------------------------

#
# Структура таблицы `options`
#

CREATE TABLE `options` (
  `id` int(2) NOT NULL auto_increment,
  `str` int(2) NOT NULL default '0',
  `prcode` int(5) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_comment`
#

CREATE TABLE `poll_comment` (
  `com_id` int(9) NOT NULL auto_increment,
  `poll_id` int(9) NOT NULL default '0',
  `time` int(11) NOT NULL default '0',
  `host` varchar(255) NOT NULL default '',
  `browser` varchar(255) NOT NULL default '',
  `name` varchar(60) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `message` text NOT NULL,
  PRIMARY KEY  (`com_id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_config`
#

CREATE TABLE `poll_config` (
  `config_id` smallint(5) unsigned NOT NULL auto_increment,
  `base_gif` varchar(60) NOT NULL default '',
  `lang` varchar(20) NOT NULL default '',
  `title` varchar(60) NOT NULL default '',
  `vote_button` varchar(30) NOT NULL default '',
  `result_text` varchar(40) NOT NULL default '',
  `total_text` varchar(40) NOT NULL default '',
  `voted` varchar(40) NOT NULL default '',
  `send_com` varchar(40) NOT NULL default '',
  `img_height` int(5) NOT NULL default '0',
  `img_length` int(5) NOT NULL default '0',
  `table_width` varchar(6) NOT NULL default '',
  `bgcolor_tab` varchar(7) NOT NULL default '',
  `bgcolor_fr` varchar(7) NOT NULL default '',
  `font_face` varchar(70) NOT NULL default '',
  `font_color` varchar(7) NOT NULL default '',
  `type` varchar(10) NOT NULL default '0',
  `check_ip` smallint(2) NOT NULL default '0',
  `lock_timeout` int(9) NOT NULL default '0',
  `time_offset` varchar(5) NOT NULL default '0',
  `entry_pp` int(4) unsigned NOT NULL default '0',
  `poll_version` varchar(5) NOT NULL default '0',
  `base_url` varchar(100) NOT NULL default '',
  `result_order` varchar(20) NOT NULL default '',
  `def_options` smallint(3) unsigned NOT NULL default '0',
  `polls_pp` int(5) unsigned NOT NULL default '0',
  `captcha` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`config_id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_data`
#

CREATE TABLE `poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `poll_id` int(11) NOT NULL default '0',
  `option_id` int(11) NOT NULL default '0',
  `option_text` varchar(100) NOT NULL default '',
  `color` varchar(20) NOT NULL default '',
  `votes` int(14) NOT NULL default '0',
  PRIMARY KEY  (`poll_id`,`option_id`),
  KEY `id` (`id`)
) TYPE=MyISAM AUTO_INCREMENT=21 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_index`
#

CREATE TABLE `poll_index` (
  `poll_id` int(11) unsigned NOT NULL auto_increment,
  `question` varchar(100) NOT NULL default '',
  `timestamp` int(11) NOT NULL default '0',
  `status` smallint(2) NOT NULL default '0',
  `logging` smallint(2) NOT NULL default '0',
  `exp_time` int(11) NOT NULL default '0',
  `expire` smallint(2) NOT NULL default '0',
  `comments` smallint(2) NOT NULL default '0',
  PRIMARY KEY  (`poll_id`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_ip`
#

CREATE TABLE `poll_ip` (
  `ip_id` int(11) NOT NULL auto_increment,
  `poll_id` int(11) NOT NULL default '0',
  `ip_addr` varchar(15) NOT NULL default '',
  `timestamp` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ip_id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_log`
#

CREATE TABLE `poll_log` (
  `log_id` int(11) unsigned NOT NULL auto_increment,
  `poll_id` int(11) NOT NULL default '0',
  `option_id` int(11) NOT NULL default '0',
  `timestamp` int(11) NOT NULL default '0',
  `ip_addr` varchar(15) NOT NULL default '',
  `host` varchar(255) NOT NULL default '',
  `agent` varchar(255) NOT NULL default '0',
  PRIMARY KEY  (`log_id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_templates`
#

CREATE TABLE `poll_templates` (
  `tpl_id` int(10) unsigned NOT NULL auto_increment,
  `tplset_id` int(10) unsigned NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `template` mediumtext NOT NULL,
  PRIMARY KEY  (`tpl_id`)
) TYPE=MyISAM AUTO_INCREMENT=41 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_templateset`
#

CREATE TABLE `poll_templateset` (
  `tplset_id` int(10) unsigned NOT NULL auto_increment,
  `tplset_name` varchar(50) NOT NULL default '',
  `created` datetime default '0000-00-00 00:00:00',
  PRIMARY KEY  (`tplset_id`)
) TYPE=MyISAM AUTO_INCREMENT=6 ;

# --------------------------------------------------------

#
# Структура таблицы `poll_user`
#

CREATE TABLE `poll_user` (
  `user_id` smallint(5) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `userpass` varchar(32) NOT NULL default '',
  `session` varchar(32) NOT NULL default '',
  `last_visit` int(11) NOT NULL default '0',
  PRIMARY KEY  (`user_id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

# --------------------------------------------------------

#
# Структура таблицы `settings`
#

CREATE TABLE `settings` (
  `id` int(3) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `meta_d` varchar(255) NOT NULL default '',
  `meta_k` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `page` varchar(255) NOT NULL default '',
  `lang` char(3) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=9 ;

# --------------------------------------------------------

#
# Структура таблицы `userlist`
#

CREATE TABLE `userlist` (
  `id` int(3) NOT NULL auto_increment,
  `user` varchar(50) NOT NULL default '',
  `pass` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;
