-- --------------------------------------------------------

--
-- Table structure for table `agent`
--


CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `LastActivity` int(55) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
 -- `display_pic`  blob NOT NULL,
 -- `identity_pic`  blob NOT NULL ,
  `referralcodes` varchar(255) NOT NULL UNIQUE,
  `LastActiveDate` varchar(255) NOT NULL,
  `LastActiveTime` varchar(255) NOT NULL,
  `DateLastActivity` date NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `ip_address` double(11,2) NOT NULL,
  `browser_type` varchar(255) NOT NULL,
  `forgetid` int(55) NOT NULL,
  `forget_question` varchar(255) NOT NULL,
  `forget_answer` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` varchar(255) NOT NULL,
  `Mobile` bigint(15) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





CREATE TABLE IF NOT EXISTS `agent_password_reset` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


  ALTER TABLE `agents`

 -- ADD `display_pic`  blob NOT NULL AFTER `email`,
 -- ADD `identity_pic`  blob NOT NULL AFTER `lastname` ;
  ADD `reason` VARCHAR(255) NOT NULL AFTER `referralcodes`;
-- CHANGE `referralcodes` `referralcodes` varchar(255);
-- ALTER TABLE `reports`
-- ADD `notify_status` varchar(255) NOT NULL;

--  ADD `notify_newklump` varchar(255) NOT NULL;
--  ADD `notify_newflutterwave` varchar(255) NOT NULL;


-- ALTER TABLE `reports` DROP `status`;