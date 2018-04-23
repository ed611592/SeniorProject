-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 08:24 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Chip`
--

-- --------------------------------------------------------

--
-- Table structure for table `Fav_Subject`
--

CREATE TABLE `Fav_Subject` (
  `subj_ID` int(11) NOT NULL,
  `subj_name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Fav_Subject`
--

INSERT INTO `Fav_Subject` (`subj_ID`, `subj_name`, `quantity`) VALUES
(1, 'Math', 6),
(2, 'English/Reading', 7),
(3, 'Science', 5),
(4, 'History', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Least_Fav_Subject`
--

CREATE TABLE `Least_Fav_Subject` (
  `subj_ID` int(11) NOT NULL,
  `subj_name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Least_Fav_Subject`
--

INSERT INTO `Least_Fav_Subject` (`subj_ID`, `subj_name`, `quantity`) VALUES
(1, 'Math', 6),
(2, 'English/Reading', 6),
(3, 'Science', 2),
(4, 'History', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `Q_ID` int(11) NOT NULL,
  `Q_text` text NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `story` text,
  `Surv_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`Q_ID`, `Q_text`, `option1`, `option2`, `option3`, `option4`, `story`, `Surv_ID`) VALUES
(1, 'I’m from a town called Munksville, Chiptucky! Where are you from?', 'Radnor', 'Bryn Mawr', 'Wayne', 'Paoli', 'I just got a call from my friend, Simon. He said someone has stolen his nut collection. I need your help to solve the mystery. But first, I want to ask you a few questions to make sure you qualify for the job.', 1),
(2, 'I live in a BIG log with my mommy and daddy chipmunks! How about you?', 'I live with my mom and dad!', 'I live with my mom and someone else / I live with my dad and someone else!', 'I just live with my mom! / I just live with my dad!', 'I live with a step mom / I live with a step dad!', '', 1),
(3, 'When I go to school, my favorite classes are music class and woodshop! What is your favorite class?', 'Math', 'English/Reading', 'Science', 'History', 'Great! You qualified for the job! Let’s get started right away. Let’s ride our bikes over to Simon’s house. Oh, no! My bike’s chain is broken! Can you answer these two questions and help me to fix it?', 1),
(4, 'My least favorite class is gym (I’m too small to play the games!). What’s your least favorite class', 'Math', 'English/Reading', 'Science', 'History', '', 1),
(5, 'I have 8 siblings! That’s a lot right? How many siblings do you have?', 'I don’t have any siblings!', 'I have 1-2 siblings', 'I have 3 or more siblings', 'I have siblings and at least one of them is a step sibling or adopted', 'Awesome! It’s fixed. Now, off to Simon’s house!.....\r\n\r\nOh no! Someone broke the bridge to Simon’s house! It must have been from the thief trying to make a quick escape. Let’s investigate the bridge. Hey! What’s that lying on the ground over there? Can you answer these questions so that we can find out what it is?', 1),
(6, 'I really like going to school! It’s so much fun! What about you?', 'I like going to school every day!', 'I like going to school most days!', 'Sometimes I like going to school and sometimes I don’t', 'I never like going to school!', '', 1),
(7, 'I like most of the kids in my school but some people are really mean! What about your school? Do you get along with people?', 'I like spending time with a lot of different kids at school', 'I like hanging out with some of the kids at school', 'I have trouble getting along with the kids at school', 'I like to spend time by myself at school', 'Ah-ha! It’s a red bandana. I wonder who this could belong to? \r\nThere’s my friend Simon! “Hi Simon!”\r\n“Hi Chip! Please help me! I can’t believe my whole nut collection is gone!”\r\n\r\n“Don’t worry Simon, we are on the case! We found this red bandana, does this look familiar to you?”\r\n“Actually yes! That belongs to someone in that group of kids in our class that teases me sometimes. I bet it was one of them! ”', 1),
(8, 'Remember how I said there are meanies at my school? Well… sometimes they bully me. Does that happen to you?', 'No, I never feel bullied at school', 'Yes, I feel like I get bullied every once in a while', 'Yes, I feel like I get bullied a couple times a week', 'Yes, I feel like I get bullied almost every day', '', 1),
(9, 'I’m a brown chipmunk, but some of my friends are more grey! What do you look like?', 'I’m a white (caucasian) person!', 'I’m a black / African American person!', 'I’m a Hispanic person!', 'I’m an Asian person / Pacific Islander', 'Let’s get off our bikes and walk around the bridge to go into Simon’s house to look for more clues. Wait! Look over there at Simon’s opened window! That must be how the thief snuck in.\r\n\r\nI see footprints on the windowsill. Let me think about what type of animal would leave this footprint...while we are thinking, can you answer these questions about you?\r\n', 1),
(10, 'I wish I could play sports but, like I said, I’m too small. My family still does a lot though. My oldest brother, Chap,  plays a lot of sports and my older sister is in the chess club! What about you? Are you in any sports, clubs or any other activities?', 'Yes, I’m in some clubs in school and some outside of school', 'Yes, I’m in at least one club at school', 'Yes, I’m in at least one school activity', 'No, I’m not in any school activities', '', 1),
(11, 'I don’t have a computer at home but that’s okay because my brothers, sisters and I like to play a lot of games outside.', 'Yes, I can get on the computer/internet quick and easily at home', 'Yes I can usually get onto the computer/internet at home.', 'Sometimes I can get onto the computer/internet at home but sometimes I can’t.', 'No, I can’t get on the computer/internet at home.', 'I got it! This looks like the footprint of a fox. There is a Fox, named Foxy, in our class! It must have been her. But where could she have gone with Simon’s nut collection? Let’s take a look around. \r\n\r\nLooks like there are three different pathways he could have taken. Can you answer a few more questions to help us figure out the next clue?', 1),
(12, 'I try to work really hard in school because I want to make my mom and dad happy and I like doing well in school! How do you feel about school?', 'School is important to me. I work really hard and I do really well!', 'School is important to me. I work as hard as I can but I’m still struggling in school.', 'School isn’t important to me but I still do well!', 'School isn’t important to me and I don’t do very well in school.', '', 1),
(13, 'Sometimes my homework is really hard! When that happens, it can be hard for me to finish it. Do you have trouble finishing your homework?', 'No, I never have trouble finishing my homework', 'Yes, sometimes I have trouble finishing my homework and sometimes I don’t', 'Yes, I have trouble finishing my homework a lot of the time', 'Yes, I always have trouble finishing my homework', '', 1),
(14, 'Sometimes it’s hard for me to fall asleep at night because I’m so excited for all the activities I get to do the next day! Do you ever have trouble sleeping?', 'No, I never have trouble sleeping', 'Yes, sometimes I have trouble sleeping and sometimes I don’t', 'Yes, I have trouble sleeping a lot of the time', 'Yes, I always have trouble sleeping', 'I see something! In pathway 2, there seems to be at trail of nuts. Foxy must have gone that way after she left Simon’s house. Let’s see where this path leads us.\r\n\r\nIt led us to Smithville, where all the fox’s in town live. But how will we figure out which den is Foxy’s? Can you answer another question to find the next clue?\r\n', 1),
(15, 'I’ve learned to be really patient because my siblings and I have to take turns doing a lot of things. What about you? How do you handle waiting for your turn?', 'I never have trouble waiting my turn. I’m very patient', 'Sometimes I have trouble waiting my turn and sometimes I don’t', 'I have trouble waiting my turn a lot of the time', 'I always have trouble waiting my turn', '', 1),
(16, 'Do you think that you live in a nice, big house house?', 'Yes, our house is bigger and nicer than most of my friends', 'Yes, our house is big and nice but some of my friends’ houses are bigger and nicer', 'Our house is nice but it is small', 'Our house is not big or nice', 'Look I see another red bandana! Remember we found one earlier? That must be where Foxy lives. That looks like a nice, cozy den! Hopefully this can help us solve the mystery...We should knock on the door knock on the door.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Responses`
--

CREATE TABLE `Responses` (
  `Student_Answer` float NOT NULL,
  `Q_ID` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `R_id` int(11) NOT NULL,
  `Surv_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Responses`
--

INSERT INTO `Responses` (`Student_Answer`, `Q_ID`, `S_ID`, `R_id`, `Surv_ID`) VALUES
(1, 1, 1, 1, 1),
(3, 2, 1, 2, 1),
(1, 3, 1, 3, 1),
(4, 4, 1, 4, 1),
(1, 5, 1, 5, 1),
(3, 6, 1, 6, 1),
(2, 7, 1, 7, 1),
(2, 8, 1, 8, 1),
(3, 9, 1, 9, 1),
(4, 10, 1, 10, 1),
(1, 11, 1, 11, 1),
(1, 12, 1, 12, 1),
(1, 13, 1, 13, 1),
(2, 14, 1, 14, 1),
(1, 15, 1, 15, 1),
(3, 16, 1, 16, 1),
(4, 1, 2, 17, 1),
(1, 2, 2, 18, 1),
(1, 3, 2, 19, 1),
(2, 4, 2, 20, 1),
(2, 5, 2, 21, 1),
(1, 6, 2, 22, 1),
(1, 7, 2, 23, 1),
(1, 8, 2, 24, 1),
(1, 9, 2, 25, 1),
(3, 10, 2, 26, 1),
(1, 11, 2, 27, 1),
(2, 12, 2, 28, 1),
(3, 13, 2, 29, 1),
(1, 14, 2, 30, 1),
(1, 15, 2, 31, 1),
(1, 16, 2, 32, 1),
(2, 1, 3, 33, 1),
(2, 2, 3, 34, 1),
(3, 3, 3, 35, 1),
(1, 4, 3, 36, 1),
(1, 5, 3, 37, 1),
(2, 6, 3, 38, 1),
(2, 7, 3, 39, 1),
(1, 8, 3, 40, 1),
(1, 9, 3, 41, 1),
(4, 10, 3, 42, 1),
(1, 11, 3, 43, 1),
(2, 12, 3, 44, 1),
(1, 13, 3, 45, 1),
(1, 14, 3, 46, 1),
(1, 15, 3, 47, 1),
(3, 16, 3, 48, 1),
(2, 1, 4, 49, 1),
(1, 2, 4, 50, 1),
(2, 3, 4, 51, 1),
(4, 4, 4, 52, 1),
(1, 5, 4, 53, 1),
(1, 6, 4, 54, 1),
(2, 7, 4, 55, 1),
(1, 8, 4, 56, 1),
(1, 9, 4, 57, 1),
(3, 10, 4, 58, 1),
(1, 11, 4, 59, 1),
(1, 12, 4, 60, 1),
(1, 13, 4, 61, 1),
(1, 14, 4, 62, 1),
(1, 15, 4, 63, 1),
(1, 16, 4, 64, 1),
(3, 1, 5, 65, 1),
(1, 2, 5, 66, 1),
(1, 3, 5, 67, 1),
(2, 4, 5, 68, 1),
(1, 5, 5, 69, 1),
(2, 6, 5, 70, 1),
(3, 7, 5, 71, 1),
(2, 8, 5, 72, 1),
(1, 9, 5, 73, 1),
(3, 10, 5, 74, 1),
(1, 11, 5, 75, 1),
(4, 12, 5, 76, 1),
(2, 13, 5, 77, 1),
(3, 14, 5, 78, 1),
(2, 15, 5, 79, 1),
(3, 16, 5, 80, 1),
(2, 1, 6, 81, 1),
(1, 2, 6, 82, 1),
(3, 3, 6, 83, 1),
(2, 4, 6, 84, 1),
(2, 5, 6, 85, 1),
(3, 6, 6, 86, 1),
(1, 7, 6, 87, 1),
(1, 8, 6, 88, 1),
(1, 9, 6, 89, 1),
(4, 10, 6, 90, 1),
(1, 11, 6, 91, 1),
(4, 12, 6, 92, 1),
(3, 13, 6, 93, 1),
(3, 14, 6, 94, 1),
(2, 15, 6, 95, 1),
(3, 16, 6, 96, 1),
(1, 1, 7, 97, 1),
(1, 2, 7, 98, 1),
(2, 3, 7, 99, 1),
(3, 4, 7, 100, 1),
(2, 5, 7, 101, 1),
(2, 6, 7, 102, 1),
(2, 7, 7, 103, 1),
(1, 8, 7, 104, 1),
(1, 9, 7, 105, 1),
(3, 10, 7, 106, 1),
(1, 11, 7, 107, 1),
(1, 12, 7, 108, 1),
(1, 13, 7, 109, 1),
(4, 14, 7, 110, 1),
(1, 15, 7, 111, 1),
(1, 16, 7, 112, 1),
(1, 1, 8, 113, 1),
(1, 2, 8, 114, 1),
(2, 3, 8, 115, 1),
(4, 4, 8, 116, 1),
(1, 5, 8, 117, 1),
(2, 6, 8, 118, 1),
(2, 7, 8, 119, 1),
(1, 8, 8, 120, 1),
(1, 9, 8, 121, 1),
(4, 10, 8, 122, 1),
(1, 11, 8, 123, 1),
(1, 12, 8, 124, 1),
(1, 13, 8, 125, 1),
(3, 14, 8, 126, 1),
(1, 15, 8, 127, 1),
(4, 16, 8, 128, 1),
(3, 1, 9, 129, 1),
(1, 2, 9, 130, 1),
(1, 3, 9, 131, 1),
(2, 4, 9, 132, 1),
(3, 5, 9, 133, 1),
(3, 6, 9, 134, 1),
(1, 7, 9, 135, 1),
(2, 8, 9, 136, 1),
(1, 9, 9, 137, 1),
(3, 10, 9, 138, 1),
(1, 11, 9, 139, 1),
(3, 12, 9, 140, 1),
(1, 13, 9, 141, 1),
(1, 14, 9, 142, 1),
(1, 15, 9, 143, 1),
(2, 16, 9, 144, 1),
(2, 1, 10, 145, 1),
(1, 2, 10, 146, 1),
(2, 3, 10, 147, 1),
(1, 4, 10, 148, 1),
(3, 5, 10, 149, 1),
(2, 6, 10, 150, 1),
(2, 7, 10, 151, 1),
(2, 8, 10, 152, 1),
(1, 9, 10, 153, 1),
(3, 10, 10, 154, 1),
(2, 11, 10, 155, 1),
(2, 12, 10, 156, 1),
(3, 13, 10, 157, 1),
(2, 14, 10, 158, 1),
(2, 15, 10, 159, 1),
(4, 16, 10, 160, 1),
(3, 1, 11, 161, 1),
(1, 2, 11, 162, 1),
(1, 3, 11, 163, 1),
(4, 4, 11, 164, 1),
(2, 5, 11, 165, 1),
(2, 6, 11, 166, 1),
(1, 7, 11, 167, 1),
(2, 8, 11, 168, 1),
(1, 9, 11, 169, 1),
(3, 10, 11, 170, 1),
(1, 11, 11, 171, 1),
(1, 12, 11, 172, 1),
(1, 13, 11, 173, 1),
(3, 14, 11, 174, 1),
(2, 15, 11, 175, 1),
(2, 16, 11, 176, 1),
(4, 1, 12, 177, 1),
(2, 2, 12, 178, 1),
(3, 3, 12, 179, 1),
(2, 4, 12, 180, 1),
(2, 5, 12, 181, 1),
(3, 6, 12, 182, 1),
(2, 7, 12, 183, 1),
(2, 8, 12, 184, 1),
(1, 9, 12, 185, 1),
(4, 10, 12, 186, 1),
(2, 11, 12, 187, 1),
(4, 12, 12, 188, 1),
(3, 13, 12, 189, 1),
(2, 14, 12, 190, 1),
(2, 15, 12, 191, 1),
(4, 16, 12, 192, 1),
(1, 1, 13, 193, 1),
(3, 2, 13, 194, 1),
(3, 3, 13, 195, 1),
(1, 4, 13, 196, 1),
(2, 5, 13, 197, 1),
(3, 6, 13, 198, 1),
(2, 7, 13, 199, 1),
(2, 8, 13, 200, 1),
(1, 9, 13, 201, 1),
(3, 10, 13, 202, 1),
(2, 11, 13, 203, 1),
(2, 12, 13, 204, 1),
(2, 13, 13, 205, 1),
(3, 14, 13, 206, 1),
(1, 15, 13, 207, 1),
(4, 16, 13, 208, 1),
(2, 1, 14, 209, 1),
(1, 2, 14, 210, 1),
(1, 3, 14, 211, 1),
(2, 4, 14, 212, 1),
(1, 5, 14, 213, 1),
(3, 6, 14, 214, 1),
(1, 7, 14, 215, 1),
(1, 8, 14, 216, 1),
(1, 9, 14, 217, 1),
(3, 10, 14, 218, 1),
(1, 11, 14, 219, 1),
(2, 12, 14, 220, 1),
(2, 13, 14, 221, 1),
(2, 14, 14, 222, 1),
(2, 15, 14, 223, 1),
(3, 16, 14, 224, 1),
(3, 1, 15, 225, 1),
(1, 2, 15, 226, 1),
(2, 3, 15, 227, 1),
(1, 4, 15, 228, 1),
(2, 5, 15, 229, 1),
(2, 6, 15, 230, 1),
(1, 7, 15, 231, 1),
(1, 8, 15, 232, 1),
(1, 9, 15, 233, 1),
(3, 10, 15, 234, 1),
(1, 11, 15, 235, 1),
(1, 12, 15, 236, 1),
(2, 13, 15, 237, 1),
(2, 14, 15, 238, 1),
(1, 15, 15, 239, 1),
(3, 16, 15, 240, 1),
(4, 1, 16, 241, 1),
(2, 2, 16, 242, 1),
(2, 3, 16, 243, 1),
(1, 4, 16, 244, 1),
(1, 5, 16, 245, 1),
(3, 6, 16, 246, 1),
(3, 7, 16, 247, 1),
(3, 8, 16, 248, 1),
(1, 9, 16, 249, 1),
(4, 10, 16, 250, 1),
(3, 11, 16, 251, 1),
(2, 12, 16, 252, 1),
(2, 13, 16, 253, 1),
(2, 14, 16, 254, 1),
(3, 15, 16, 255, 1),
(4, 16, 16, 256, 1),
(1, 1, 17, 257, 1),
(3, 2, 17, 258, 1),
(2, 3, 17, 259, 1),
(3, 4, 17, 260, 1),
(2, 5, 17, 261, 1),
(3, 6, 17, 262, 1),
(3, 7, 17, 263, 1),
(2, 8, 17, 264, 1),
(2, 9, 17, 265, 1),
(4, 10, 17, 266, 1),
(3, 11, 17, 267, 1),
(1, 12, 17, 268, 1),
(1, 13, 17, 269, 1),
(2, 14, 17, 270, 1),
(1, 15, 17, 271, 1),
(4, 16, 17, 272, 1),
(2, 1, 18, 273, 1),
(1, 2, 18, 274, 1),
(3, 3, 18, 275, 1),
(1, 4, 18, 276, 1),
(2, 5, 18, 277, 1),
(3, 6, 18, 278, 1),
(1, 7, 18, 279, 1),
(2, 8, 18, 280, 1),
(1, 9, 18, 281, 1),
(3, 10, 18, 282, 1),
(2, 11, 18, 283, 1),
(3, 12, 18, 284, 1),
(2, 13, 18, 285, 1),
(1, 14, 18, 286, 1),
(1, 15, 18, 287, 1),
(3, 16, 18, 288, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `S_ID` int(11) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `AVG_Grade` float NOT NULL,
  `teach_ID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`S_ID`, `fName`, `AVG_Grade`, `teach_ID`, `username`, `password`, `lName`) VALUES
(1, 'Andy', 90, 1, 'Andy', 'DA41BCEFF97B1CF96078FFB249B3D66E', 'Less'),
(2, 'Brandy', 65, 1, 'Brandy', '6C29E9CC4042D972B15FF0304E636886', 'Jackson-Shorts'),
(3, 'Emily', 70, 1, 'Emily', 'B02AE5AAEFE3F7090668DF034B0F2324', 'DeMarco'),
(4, 'Shara', 95, 1, 'Shara', '683713f2c613cf8986b3f7dd1d5362f2', 'Lavin'),
(5, 'Chad', 68, 1, 'Chad', 'e03653dedd6f4e142f4aca131995964f', 'Goodman'),
(6, 'Sally', 70, 1, 'Sally', '3fa8b9cc38915ca488e412b59a8aaa79', 'Dunhill'),
(7, 'Shelly', 96, 1, 'Shelly', 'f7ba507db5b5b1150eabf5707f0334dd', 'Seashell'),
(8, 'Katy', 92, 1, 'Katy', '3225d24edf6b0aecf7e58f22c4219d93', 'Bell'),
(9, 'Hermione', 95, 1, 'Hermione', '183ebb073bd063e1d40b34f0e0282621', 'Granger'),
(10, 'Lana', 80, 1, 'Lana', '07eadbea3700b64f60e855ef80a6605b', 'OMally'),
(11, 'Eric', 88, 1, 'Eric', '77dcd555f38b965d220a13a3bb080260', 'Foreman'),
(12, 'Ariel', 73, 1, 'Ariel', '1f15ab596db50ec96e9b45ed76947c99', 'Mermaid'),
(13, 'Anna', 75, 1, 'Anna', '97a9d330e236c8d067f01da1894a5438', 'Banana'),
(14, 'Drew', 78, 1, 'Drew', '4744ccf98ed9fcec2a3224ebb13333ed', 'Draw'),
(15, 'Payton', 84, 1, 'Payton', 'f8a8f44f017f9db322f8ac95925a343d', 'Pennysworth'),
(16, 'Carissa', 87, 1, 'Carissa', '6f7ed7e84db6b5a146eec0c3635a01be', 'Marissa'),
(17, 'Harry', 90, 1, 'Harry', 'db05833c29e688b5ab54d5e8608a72ec', 'Potter'),
(18, 'Luke', 82, 1, 'Luke', 'b21dfb148d20b1febdd8d86417f925c1', 'Skywalker');

-- --------------------------------------------------------

--
-- Table structure for table `Survey`
--

CREATE TABLE `Survey` (
  `Name` varchar(20) NOT NULL,
  `Surv_ID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Survey`
--

INSERT INTO `Survey` (`Name`, `Surv_ID`, `Date`) VALUES
('Adventure', 1, '2018-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE `Teacher` (
  `teach_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`teach_ID`, `Name`, `username`, `password`) VALUES
(1, 'Jane Smith', 'Jane', '8D788385431273D11E8B43BB78F3AA41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Fav_Subject`
--
ALTER TABLE `Fav_Subject`
  ADD PRIMARY KEY (`subj_ID`);

--
-- Indexes for table `Least_Fav_Subject`
--
ALTER TABLE `Least_Fav_Subject`
  ADD PRIMARY KEY (`subj_ID`);

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`Q_ID`),
  ADD KEY `Surv_ID` (`Surv_ID`);

--
-- Indexes for table `Responses`
--
ALTER TABLE `Responses`
  ADD PRIMARY KEY (`R_id`),
  ADD KEY `Q_ID` (`Q_ID`),
  ADD KEY `S_ID` (`S_ID`),
  ADD KEY `Surv_ID` (`Surv_ID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `teach_ID` (`teach_ID`);

--
-- Indexes for table `Survey`
--
ALTER TABLE `Survey`
  ADD PRIMARY KEY (`Surv_ID`);

--
-- Indexes for table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`teach_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Fav_Subject`
--
ALTER TABLE `Fav_Subject`
  MODIFY `subj_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Least_Fav_Subject`
--
ALTER TABLE `Least_Fav_Subject`
  MODIFY `subj_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `Q_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Responses`
--
ALTER TABLE `Responses`
  MODIFY `R_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `Student`
--
ALTER TABLE `Student`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Survey`
--
ALTER TABLE `Survey`
  MODIFY `Surv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `teach_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`Surv_ID`) REFERENCES `Survey` (`Surv_ID`);

--
-- Constraints for table `Responses`
--
ALTER TABLE `Responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`Q_ID`) REFERENCES `Question` (`Q_ID`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`S_ID`) REFERENCES `Student` (`S_ID`),
  ADD CONSTRAINT `responses_ibfk_3` FOREIGN KEY (`Surv_ID`) REFERENCES `Survey` (`Surv_ID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`teach_ID`) REFERENCES `Teacher` (`teach_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
