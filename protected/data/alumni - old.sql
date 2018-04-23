/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : alumni

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-05 00:54:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `al_event`
-- ----------------------------
DROP TABLE IF EXISTS `al_event`;
CREATE TABLE `al_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `event_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `place` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `event_name_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description_ar` text COLLATE utf8_bin,
  `place_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `al_event_ibfk_1` (`created_by`),
  CONSTRAINT `al_event_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_event
-- ----------------------------

-- ----------------------------
-- Table structure for `al_event_participant`
-- ----------------------------
DROP TABLE IF EXISTS `al_event_participant`;
CREATE TABLE `al_event_participant` (
  `event_participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `participant_status` int(11) NOT NULL,
  PRIMARY KEY (`event_participant_id`),
  KEY `al_event_participant_ibfk_1` (`event_id`),
  KEY `participant_status` (`participant_status`),
  KEY `participant_id` (`participant_id`),
  CONSTRAINT `al_event_participant_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `al_event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `al_event_participant_ibfk_2` FOREIGN KEY (`participant_status`) REFERENCES `al_participation_status` (`participation_status_id`),
  CONSTRAINT `al_event_participant_ibfk_3` FOREIGN KEY (`participant_id`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_event_participant
-- ----------------------------

-- ----------------------------
-- Table structure for `al_group`
-- ----------------------------
DROP TABLE IF EXISTS `al_group`;
CREATE TABLE `al_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `description` text COLLATE utf8_bin,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`group_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `al_group_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `al_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_group
-- ----------------------------

-- ----------------------------
-- Table structure for `al_group_chat`
-- ----------------------------
DROP TABLE IF EXISTS `al_group_chat`;
CREATE TABLE `al_group_chat` (
  `group_chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`group_chat_id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `al_group_chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `al_group_chat_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `al_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_group_chat
-- ----------------------------

-- ----------------------------
-- Table structure for `al_group_participant`
-- ----------------------------
DROP TABLE IF EXISTS `al_group_participant`;
CREATE TABLE `al_group_participant` (
  `group_participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  PRIMARY KEY (`group_participant_id`),
  KEY `participant_id` (`participant_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `al_group_participant_ibfk_1` FOREIGN KEY (`participant_id`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `al_group_participant_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `al_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_group_participant
-- ----------------------------

-- ----------------------------
-- Table structure for `al_news`
-- ----------------------------
DROP TABLE IF EXISTS `al_news`;
CREATE TABLE `al_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `news_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `created_by` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `news_name_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description_ar` text COLLATE utf8_bin,
  PRIMARY KEY (`news_id`),
  KEY `al_event_ibfk_1` (`created_by`),
  CONSTRAINT `al_news_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_news
-- ----------------------------

-- ----------------------------
-- Table structure for `al_page`
-- ----------------------------
DROP TABLE IF EXISTS `al_page`;
CREATE TABLE `al_page` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `page_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `page_name_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description_ar` text COLLATE utf8_bin,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_page
-- ----------------------------

-- ----------------------------
-- Table structure for `al_participation_status`
-- ----------------------------
DROP TABLE IF EXISTS `al_participation_status`;
CREATE TABLE `al_participation_status` (
  `participation_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `participation_status_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `participation_status_name_ar` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`participation_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_participation_status
-- ----------------------------
INSERT INTO `al_participation_status` VALUES ('1', 'Interested', 'مهتم');
INSERT INTO `al_participation_status` VALUES ('2', 'Going', 'ينوون الحضور');

-- ----------------------------
-- Table structure for `al_training_course`
-- ----------------------------
DROP TABLE IF EXISTS `al_training_course`;
CREATE TABLE `al_training_course` (
  `training_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `training_course_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` decimal(10,0) DEFAULT '0',
  `description` text COLLATE utf8_bin NOT NULL,
  `training_course_url` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `place` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `training_course_name_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description_ar` text COLLATE utf8_bin,
  `place_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`training_course_id`),
  KEY `al_training_course_ibfk_1` (`created_by`),
  CONSTRAINT `al_training_course_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_training_course
-- ----------------------------

-- ----------------------------
-- Table structure for `al_training_course_participant`
-- ----------------------------
DROP TABLE IF EXISTS `al_training_course_participant`;
CREATE TABLE `al_training_course_participant` (
  `training_course_participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `training_course_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `participant_status` int(11) NOT NULL,
  PRIMARY KEY (`training_course_participant_id`),
  KEY `participant_status` (`participant_status`),
  KEY `training_course_id` (`training_course_id`),
  KEY `participant_id` (`participant_id`),
  CONSTRAINT `al_training_course_participant_ibfk_1` FOREIGN KEY (`participant_status`) REFERENCES `al_participation_status` (`participation_status_id`),
  CONSTRAINT `al_training_course_participant_ibfk_2` FOREIGN KEY (`training_course_id`) REFERENCES `al_training_course` (`training_course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `al_training_course_participant_ibfk_3` FOREIGN KEY (`participant_id`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_training_course_participant
-- ----------------------------

-- ----------------------------
-- Table structure for `al_user`
-- ----------------------------
DROP TABLE IF EXISTS `al_user`;
CREATE TABLE `al_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `national_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `major` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `graduation_year` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_type_id` int(11) NOT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(4) DEFAULT '0',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `user_type_id` (`user_type_id`),
  CONSTRAINT `al_user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `al_user_type` (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_user
-- ----------------------------

-- ----------------------------
-- Table structure for `al_user_type`
-- ----------------------------
DROP TABLE IF EXISTS `al_user_type`;
CREATE TABLE `al_user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_user_type
-- ----------------------------

-- ----------------------------
-- Table structure for `al_volunteer_work`
-- ----------------------------
DROP TABLE IF EXISTS `al_volunteer_work`;
CREATE TABLE `al_volunteer_work` (
  `volunteer_work_id` int(11) NOT NULL AUTO_INCREMENT,
  `volunteer_work_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `place` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `volunteer_work_name_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description_ar` text COLLATE utf8_bin,
  `place_ar` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`volunteer_work_id`),
  KEY `al_volunteer_work_ibfk_1` (`created_by`),
  CONSTRAINT `al_volunteer_work_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_volunteer_work
-- ----------------------------

-- ----------------------------
-- Table structure for `al_volunteer_work_participant`
-- ----------------------------
DROP TABLE IF EXISTS `al_volunteer_work_participant`;
CREATE TABLE `al_volunteer_work_participant` (
  `volunteer_work_participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `volunteer_work_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `participant_status` int(11) NOT NULL,
  PRIMARY KEY (`volunteer_work_participant_id`),
  KEY `participant_status` (`participant_status`),
  KEY `volunteer_work_participant_ibfk_2` (`participant_id`),
  KEY `volunteer_work_id` (`volunteer_work_id`),
  CONSTRAINT `al_volunteer_work_participant_ibfk_1` FOREIGN KEY (`participant_status`) REFERENCES `al_participation_status` (`participation_status_id`),
  CONSTRAINT `al_volunteer_work_participant_ibfk_2` FOREIGN KEY (`participant_id`) REFERENCES `al_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `al_volunteer_work_participant_ibfk_3` FOREIGN KEY (`volunteer_work_id`) REFERENCES `al_volunteer_work` (`volunteer_work_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of al_volunteer_work_participant
-- ----------------------------
