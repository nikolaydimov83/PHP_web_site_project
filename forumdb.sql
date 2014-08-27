-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forumdb`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'New Category', 'Category to discuss categorial things with'),
(2, 'More Cats', 'Here we discuss cats. '),
(3, 'Insanity', 'Our own forum''s mental asylum.'),
(4, 'Programming', 'This is not a place for tourists');

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_topic` (`post_topic`),
  KEY `post_by` (`post_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(1, 'This is a good day to make a post so i''m going to be posting : )', '2014-08-26 16:26:16', 5, 2),
(2, 'It works!', '2014-08-26 16:27:08', 5, 2),
(3, 'About cats', '2014-08-26 17:52:39', 7, 2),
(4, 'Stuff', '2014-08-27 04:39:41', 7, 2),
(5, 'Stuff', '2014-08-27 04:39:46', 7, 2),
(6, 'MaekReply', '2014-08-27 04:57:07', 7, 2),
(7, 'One Two Threee Four Five Six', '2014-08-27 04:59:58', 7, 2),
(8, 'One Two Threee Four Five Six ', '2014-08-27 05:00:20', 7, 2),
(9, 'One Two Threee Four Five Six ', '2014-08-27 05:00:27', 7, 2);

-- --------------------------------------------------------

--
-- Структура на таблица `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL,
  `topic_views` int(8) NOT NULL,
  `topic_replies` int(8) NOT NULL,
  `topic_details` text NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_cat` (`topic_cat`),
  KEY `topic_by` (`topic_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Схема на данните от таблица `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`, `topic_views`, `topic_replies`, `topic_details`) VALUES
(4, 'I am a topic subject, get me!', '2014-08-18 18:00:00', 1, 1, 26, 0, 'This is supposed to be a very long text topic Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis qui ullam, quos. Aut corrupti cumque ex delectus asperiores voluptatibus deserunt porro voluptates odit dignissimos facere ipsum rem, excepturi accusantium hic ullam nulla quo quod sapiente labore perferendis, animi, enim quaerat! Autem nostrum, nihil impedit accusantium animi iure tempora a. Vero deleniti nisi repudiandae facere porro, voluptatem illo veniam. Nesciunt est necessitatibus dolores autem iste iure consequuntur voluptatibus numquam fugiat. Necessitatibus a, illum fuga eveniet? Maiores, cum culpa nisi soluta quisquam.'),
(5, 'My first Post!', '2014-08-26 16:26:16', 1, 2, 31, 2, ''),
(6, 'TopicCreation', '2014-08-26 16:27:08', 2, 2, 29, 0, ''),
(7, 'This is a nice topic', '2014-08-26 17:52:39', 2, 2, 128, 3, 'About cats'),
(8, 'A topic', '2014-08-26 17:54:26', 2, 2, 28, 0, 'Topical'),
(9, 'Stairs', '2014-08-27 12:55:49', 3, 4, 1, 0, 'My house is old. Itâ€™s by far the oldest house on our block. We tried to liven it up, to make it comfy, and and we did a pretty good job. We put colorful rugs on the freezing concrete, lamps in every corner. Every room was nice and modern-except the basement.\r\n\r\nWhen I was a little kid, I would sprint up the stairs coming up from the basement. I donâ€™t know what I was afraid of. Maybe a ghost, or a monster in the dark behind me, waiting for me to turn around so it can catch me andâ€¦ I donâ€™t know what it would do.\r\n\r\nBut now, as a seventeen year old boy, Iâ€™m walking up the stairs from my basement, and my childish fears, long repressed, are coming back. I tell myself to shut up, but that dark part in the back of my head tells me to run, to get out NOW. More than anything I want to rocket up those stairs as I did as a child, but I force my feet to take even, normal steps. I feel the overwhelming urge to look behind me, but I also want to win the battle of paranoia thatâ€™s going on in my brain.\r\n\r\nSo I slowly walk up the seemingly endless staircase, my palms sweating and my heart racing the entire way. But about ten steps from the top, I feel an ice cold hand close around my ankle.'),
(10, 'Stairs', '2014-08-27 12:57:58', 3, 4, 2, 0, 'My house is old. Itâ€™s by far the oldest house on our block. We tried to liven it up, to make it comfy, and and we did a pretty good job. We put colorful rugs on the freezing concrete, lamps in every corner. Every room was nice and modern-except the basement.\r\n\r\nWhen I was a little kid, I would sprint up the stairs coming up from the basement. I donâ€™t know what I was afraid of. Maybe a ghost, or a monster in the dark behind me, waiting for me to turn around so it can catch me andâ€¦ I donâ€™t know what it would do.\r\n\r\nBut now, as a seventeen year old boy, Iâ€™m walking up the stairs from my basement, and my childish fears, long repressed, are coming back. I tell myself to shut up, but that dark part in the back of my head tells me to run, to get out NOW. More than anything I want to rocket up those stairs as I did as a child, but I force my feet to take even, normal steps. I feel the overwhelming urge to look behind me, but I also want to win the battle of paranoia thatâ€™s going on in my brain.\r\n\r\nSo I slowly walk up the seemingly endless staircase, my palms sweating and my heart racing the entire way. But about ten steps from the top, I feel an ice cold hand close around my ankle.'),
(11, 'Unity Seminar 26.08.14', '2014-08-27 13:16:38', 4, 4, 4, 0, 'If you''re looking for fun and exciting apps to start writing, you should consider games. Not a game developer? No problem! In this session I''ll cover all the basics of using the Unity game engine, along with your current C# or JavaScript skills, to get started writing cross-platform games. We''ll look at how to navigate the Unity IDE, as well as how to create scenes, add objects to scenes, and add animations to game characters. Join me for this fun and interactive session where your cross-platform games are limited only by your imagination.\r\n\r\nSpeaker is Brian Lagunas'),
(12, 'Regex Tut', '2014-08-27 13:22:10', 4, 4, 2, 0, 'Basically, a regular expression is a pattern describing a certain amount of text. Their name comes from the mathematical theory on which they are based. But we will not dig into that. You will usually find the name abbreviated to "regex" or "regexp". This tutorial uses "regex", because it is easy to pronounce the plural "regexes". On this website, regular expressions are printed as regex highlighted in red.\r\n\r\nThis first example is actually a perfectly valid regex. It is the most basic pattern, simply matching the literal text regex. A "match" is the piece of text, or sequence of bytes or characters that pattern was found to correspond to by the regex processing software. Matches are highlighted in blue on this site.\r\n\r\n\\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\\.[A-Z]{2,4}\\b is a more complex pattern. It describes a series of letters, digits, dots, underscores, percentage signs and hyphens, followed by an at sign, followed by another series of letters, digits and hyphens, finally followed by a single dot and between two and four letters. In other words: this pattern describes an email address.\r\n\r\nWith the above regular expression pattern, you can search through a text file to find email addresses, or verify if a given string looks like an email address. This tutorial uses the term "string" to indicate the text that the regular expression is applied to. This website highlights them in green. The term "string" or "character string" is used by programmers to indicate a sequence of characters. In practice, you can use regular expressions with whatever data you can access using the application or programming language you are working with.'),
(13, 'This isn''t a story', '2014-08-27 13:25:45', 3, 4, 1, 0, 'This is me. Iâ€™m here. Iâ€™m shifting the words that youâ€™re reading, altering them from whatever this person wrote.\r\n\r\nIâ€™ve been here for awhile. For as long as you can remember, anyway. Sometimes I say your name as youâ€™re falling asleep, or whisper urgently in your ear. Do you remember the time that I screamed, throwing panic through you and setting your heart racing?\r\n\r\nThat was fun.\r\n\r\nYouâ€™re wondering who I am. Thatâ€™s only natural. Of course, you already know.\r\n\r\nIâ€™m you. Iâ€™m the real you. Iâ€™m the mind that existed here before you stole my body, before you forgot about being a parasite. Iâ€™m the child who looked the wrong way, asked the wrong question, saw the wrong thingâ€¦ but Iâ€™m not so little any more.\r\n\r\nYou may have forgotten me, but Iâ€™m still here. Iâ€™ve always been here.\r\n\r\nIâ€™m going to get out'),
(14, 'C# for Gurus', '2014-08-27 13:34:35', 4, 4, 3, 0, 'During the development of the .NET Framework, the class libraries were originally written using a managed code compiler system called Simple Managed C (SMC).[14][15][16] In January 1999, Anders Hejlsberg formed a team to build a new language at the time called Cool, which stood for "C-like Object Oriented Language".[17] Microsoft had considered keeping the name "Cool" as the final name of the language, but chose not to do so for trademark reasons. By the time the .NET project was publicly announced at the July 2000 Professional Developers Conference, the language had been renamed C#, and the class libraries and ASP.NET runtime had been ported to C#.\r\n\r\nC#''s principal designer and lead architect at Microsoft is Anders Hejlsberg, who was previously involved with the design of Turbo Pascal, Embarcadero Delphi (formerly CodeGear Delphi, Inprise Delphi and Borland Delphi), and Visual J++. In interviews and technical papers he has stated that flaws[citation needed] in most major programming languages (e.g. C++, Java, Delphi, and Smalltalk) drove the fundamentals of the Common Language Runtime (CLR), which, in turn, drove the design of the C# language itself.\r\n\r\nJames Gosling, who created the Java programming language in 1994, and Bill Joy, a co-founder of Sun Microsystems, the originator of Java, called C# an "imitation" of Java; Gosling further said that "[C# is] sort of Java with reliability, productivity and security deleted."[18][19] Klaus Kreft and Angelika Langer (authors of a C++ streams book) stated in a blog post that "Java and C# are almost identical programming languages. Boring repetition that lacks innovation,"[20] "Hardly anybody will claim that Java or C# are revolutionary programming languages that changed the way we write programs," and "C# borrowed a lot from Java - and vice versa. Now that C# supports boxing and unboxing, we''ll have a very similar feature in Java."[21] In July 2000, Anders Hejlsberg said that C# is "not a Java clone" and is "much closer to C++" in its design.[22]\r\n\r\nSince the release of C# 2.0 in November 2005, the C# and Java languages have evolved on increasingly divergent trajectories, becoming somewhat less similar. One of the first major departures came with the addition of generics to both languages, with vastly different implementations. C# makes use of reification to provide "first-class" generic objects that can be used like any other class, with code generation performed at class-load time.[23] By contrast, Java''s generics are essentially a language syntax feature, and they do not affect the generated byte code, because the compiler performs type erasure on the generic type information after it has verified its correctness.[24]\r\n\r\nFurthermore, C# has added several major features to accommodate functional-style programming, culminating in the LINQ extensions released with C# 3.0 and its supporting framework of lambda expressions, extension methods, and anonymous types.[25] These features enable C# programmers to use functional programming techniques, such as closures, when it is advantageous to their application. The LINQ extensions and the functional imports help developers reduce the amount of "boilerplate" code that is included in common tasks like querying a database, parsing an xml file, or searching through a data structure, shifting the emphasis onto the actual program logic to help improve readability and maintainability.[26]\r\n\r\nC# used to have a mascot called Andy (named after Anders Hejlsberg). It was retired on January 29, 2004.[27]\r\n\r\nC# was originally submitted for review to the ISO subcommittee JTC 1/SC 22[28] under ISO/IEC 23270:2003,[29] which is now withdrawn. It was then approved under ISO/IEC 23270:2006.'),
(15, 'Thousands', '2014-08-27 13:36:58', 3, 4, 1, 0, 'You crawl into bed at around nine. Funny, thatâ€™s a little early for you, but you donâ€™t seem to care. You toss and turn for a few minutes, before you feel it. Somebodyâ€™s watching you, youâ€™re sure of it. You scan the room, finding nothing, but you still feel uneasy.\r\n\r\nYou lay back down, facing the room. You shut your eyes and try to sleep, but you canâ€™t. You still feel the eyes on you, watching you.\r\n\r\nYou pull the covers over your head, and the feeling fades. You relax and close your eyes, but as soon as they shut, the feeling returns. Youâ€™re scared to move the covers, to search for the eyes that you know are watching you.\r\n\r\nYouâ€™re terrified, but you yank the covers down, and as you do your heart skips a beat. You scan the room, seeing absolutely nothing yet again.\r\n\r\nThe feeling disappears, and you scold yourself for acting like such a child. You roll over toward the wall and quickly fall into a peaceful sleep.\r\n\r\nBut let me ask you this: Do you know how many hiding places there are in your room?\r\n\r\nI do. Thousands.');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int(8) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_unique` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(1, 'admin', 'admin', 'admin@admin.me', '2014-08-01 00:00:00', 1),
(2, 'myname', '91dfd9ddb4198affc5c194cd8ce6d338fde470e2', 'oneoneTwo@gmail.com', '2014-08-26 01:08:22', 1),
(3, 'Pesho', 'b0399d2029f64d445bd131ffaa399a42d2f8e7dc', 'pesho_guzara@abv.bg', '2014-08-27 12:36:09', 0),
(4, 'Mitko', '67866a7772ab749f833dc52d82ac7853df866bf5', 'mitko@abv.bg', '2014-08-27 12:53:44', 0);

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Ограничения за таблица `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
