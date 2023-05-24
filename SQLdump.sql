-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--


-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `setcategory` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(255) NOT NULL,
  `size` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentsassets`
--

CREATE TABLE `commentsassets` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `page_key` int(255) NOT NULL,
  `comment` varchar(1023) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentsgames`
--

CREATE TABLE `commentsgames` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `page_key` int(255) NOT NULL,
  `comment` varchar(1023) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentsposts`
--

CREATE TABLE `commentsposts` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `page_key` int(255) NOT NULL,
  `comment` varchar(1023) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `id` int(255) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `resettime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `attempt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` varchar(255) NOT NULL,
  `setcategory` varchar(255) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `headlineimage` varchar(255) NOT NULL,
  `text1` varchar(3000) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `alt1` varchar(255) NOT NULL,
  `text2` varchar(3000) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `alt2` varchar(255) NOT NULL,
  `text3` varchar(3000) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `alt3` varchar(255) NOT NULL,
  `text4` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `validated` tinyint(1) NOT NULL,
  `validationcode` varchar(255) NOT NULL,
  `passwordvalidationcode` varchar(255) NOT NULL,
  `expire` tinyint(1) NOT NULL,
  `passwordresetexpire` tinyint(1) NOT NULL,
  `resettime` timestamp NOT NULL DEFAULT current_timestamp(),
  `passwordresettime` timestamp NOT NULL DEFAULT current_timestamp(),
  `deletetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usertype` varchar(255) NOT NULL,
  `emailchange` varchar(255) NOT NULL,
  `changedate` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `ip` varchar(45) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  `newusers` int(255) NOT NULL,
  `newgamecomments` int(255) NOT NULL,
  `newpostcomments` int(255) NOT NULL,
  `newassetcomments` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentsassets`
--
ALTER TABLE `commentsassets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentsgames`
--
ALTER TABLE `commentsgames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentsposts`
--
ALTER TABLE `commentsposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginattempts`
--
ALTER TABLE `loginattempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `commentsassets`
--
ALTER TABLE `commentsassets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `commentsgames`
--
ALTER TABLE `commentsgames`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commentsposts`
--
ALTER TABLE `commentsposts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginattempts`
--
ALTER TABLE `loginattempts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;