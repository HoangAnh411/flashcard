-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2026 at 09:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flashcard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `is_learned` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`id`, `question`, `answer`, `is_learned`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'What is a variable?', 'A named storage location in memory that holds a value which can be changed during program execution.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(2, 'What is an array?', 'A data structure that stores a collection of elements, typically of the same type, in contiguous memory locations.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(3, 'What is OOP?', 'Object-Oriented Programming is a paradigm based on the concept of objects, which contain data (attributes) and code (methods).', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(4, 'What is a function?', 'A reusable block of code that performs a specific task and can be called by name.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(5, 'What is SQL?', 'Structured Query Language, used to communicate with and manipulate relational databases.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(6, 'What is MVC?', 'Model-View-Controller, a software design pattern that separates an application into three interconnected components.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(7, 'What is an API?', 'Application Programming Interface, a set of rules and protocols that allows different software applications to communicate.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(8, 'What is Git?', 'A distributed version control system used for tracking changes in source code during software development.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(9, 'What is a loop?', 'A control flow statement that allows code to be executed repeatedly based on a given condition.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(10, 'What is a class?', 'A blueprint or template for creating objects, defining properties and methods that the objects will have.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(11, 'What is recursion?', 'A technique where a function calls itself to solve a problem by breaking it down into smaller, similar sub-problems.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(12, 'What is a database index?', 'A data structure that improves the speed of data retrieval operations on a database table at the cost of additional storage space.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(13, 'What is the difference between == and === in JavaScript?', '== compares values with type coercion, while === compares both value and type without coercion (strict equality).', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(14, 'What is a REST API?', 'Representational State Transfer API, an architectural style that uses HTTP methods (GET, POST, PUT, DELETE) to interact with resources.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(15, 'What is Docker?', 'A platform for developing, shipping, and running applications inside lightweight, portable containers.', 0, 1, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(16, 'What is the speed of light?', 'Approximately 299,792,458 meters per second (about 3 x 10^8 m/s) in a vacuum.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(17, 'What is photosynthesis?', 'The process by which plants convert sunlight, carbon dioxide, and water into glucose and oxygen.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(18, 'What is DNA?', 'Deoxyribonucleic acid, a molecule that carries the genetic instructions for the development and functioning of living organisms.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(19, 'What is Newton\'s First Law of Motion?', 'An object at rest stays at rest and an object in motion stays in motion unless acted upon by an external force.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(20, 'What is the periodic table?', 'A tabular arrangement of chemical elements organized by atomic number, electron configuration, and recurring chemical properties.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(21, 'What is the theory of relativity?', 'Einstein\'s theory that describes the relationship between space, time, and gravity. E=mc² shows mass-energy equivalence.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(22, 'What is an atom?', 'The smallest unit of matter that retains the chemical properties of an element, consisting of protons, neutrons, and electrons.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(23, 'What is evolution?', 'The process of change in all forms of life over generations through natural selection, genetic drift, and mutation.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(24, 'What is the water cycle?', 'The continuous movement of water through evaporation, condensation, precipitation, and collection back into bodies of water.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(25, 'What is gravity?', 'A fundamental force of nature that attracts objects with mass toward each other. On Earth, it accelerates objects at ~9.8 m/s².', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(26, 'What is a black hole?', 'A region of spacetime where gravity is so strong that nothing, not even light, can escape from it.', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(27, 'What are mitochondria?', 'Organelles found in cells that generate most of the cell\'s supply of ATP (energy). Known as the \"powerhouse of the cell\".', 0, 2, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(28, 'When did World War II end?', 'September 2, 1945, when Japan formally surrendered aboard the USS Missouri.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(29, 'Who was the first President of the United States?', 'George Washington, who served from 1789 to 1797.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(30, 'What was the Renaissance?', 'A cultural movement from the 14th to 17th century that began in Italy, marking the transition from the Middle Ages to modernity.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(31, 'When was the Declaration of Independence signed?', 'August 2, 1776, although it was adopted by the Continental Congress on July 4, 1776.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(32, 'What was the Industrial Revolution?', 'A period of major industrialization from the late 1700s to early 1800s, transitioning from hand production to machine manufacturing.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(33, 'What was the Cold War?', 'A period of geopolitical tension (1947-1991) between the United States and the Soviet Union and their respective allies.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(34, 'Who built the Great Wall of China?', 'Construction began during the Qin Dynasty (221-206 BC) under Emperor Qin Shi Huang, and continued over many centuries.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(35, 'What was the French Revolution?', 'A period of radical political and societal change in France (1789-1799) that ended the monarchy and established a republic.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(36, 'When did the Roman Empire fall?', 'The Western Roman Empire fell in 476 AD when Germanic leader Odoacer deposed Emperor Romulus Augustulus.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(37, 'What was the Silk Road?', 'An ancient network of trade routes connecting the East and West, from China to the Mediterranean, active from ~130 BC to 1453 AD.', 0, 3, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(38, 'How do you say \"Hello\" in Japanese?', 'こんにちは (Konnichiwa)', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(39, 'How do you say \"Thank you\" in French?', 'Merci', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(40, 'How do you say \"Goodbye\" in Spanish?', 'Adiós', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(41, 'How do you say \"I love you\" in Korean?', '사랑해요 (Saranghaeyo)', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(42, 'How do you say \"Good morning\" in German?', 'Guten Morgen', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(43, 'How do you say \"Please\" in Italian?', 'Per favore', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(44, 'How do you say \"Water\" in Chinese (Mandarin)?', '水 (Shuǐ)', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(45, 'How do you say \"Friend\" in Portuguese?', 'Amigo (male) / Amiga (female)', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(46, 'How do you say \"Beautiful\" in Arabic?', 'جميل (Jameel) for masculine / جميلة (Jameela) for feminine', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(47, 'How do you say \"Yes\" and \"No\" in Russian?', 'Да (Da) = Yes, Нет (Nyet) = No', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(48, 'How do you say \"Excuse me\" in Vietnamese?', 'Xin lỗi', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(49, 'How do you say \"How are you?\" in Thai?', 'สบายดีไหม (Sabai dee mai?)', 0, 4, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(50, 'What is the Pythagorean theorem?', 'In a right triangle, the square of the hypotenuse equals the sum of squares of the other two sides: a² + b² = c².', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(51, 'What is Pi (π)?', 'An irrational number approximately equal to 3.14159, representing the ratio of a circle\'s circumference to its diameter.', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(52, 'What is a prime number?', 'A natural number greater than 1 that has no positive divisors other than 1 and itself. Examples: 2, 3, 5, 7, 11, 13.', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(53, 'What is the quadratic formula?', 'x = (-b ± √(b² - 4ac)) / 2a, used to find solutions of ax² + bx + c = 0.', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(54, 'What is a factorial?', 'The product of all positive integers less than or equal to n. Written as n! Example: 5! = 5 × 4 × 3 × 2 × 1 = 120.', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(55, 'What is the difference between mean, median, and mode?', 'Mean = average of all values. Median = middle value when sorted. Mode = most frequently occurring value.', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(56, 'What is a derivative in calculus?', 'A measure of how a function changes as its input changes. It represents the slope of the tangent line at any point on a curve.', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(57, 'What is the Fibonacci sequence?', 'A sequence where each number is the sum of the two preceding ones: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, ...', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(58, 'What is logarithm?', 'The inverse operation of exponentiation. log_b(x) = y means b^y = x. Example: log₂(8) = 3 because 2³ = 8.', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(59, 'What is the area of a circle?', 'A = πr², where r is the radius of the circle.', 0, 5, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(60, 'What is the largest continent by area?', 'Asia, covering approximately 44.58 million km² (about 30% of Earth\'s total land area).', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(61, 'What is the longest river in the world?', 'The Nile River, stretching approximately 6,650 km through northeastern Africa.', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(62, 'What is the highest mountain in the world?', 'Mount Everest, standing at 8,849 meters (29,032 feet) above sea level, located in the Himalayas.', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(63, 'What is the largest ocean?', 'The Pacific Ocean, covering approximately 165.25 million km², larger than all the land area on Earth combined.', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(64, 'What is the smallest country in the world?', 'Vatican City, with an area of just 0.49 km² (about 121 acres), located within Rome, Italy.', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(65, 'What is the largest desert in the world?', 'Antarctica (cold desert) at 14.2 million km². The largest hot desert is the Sahara at 9.2 million km².', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(66, 'How many countries are there in the world?', '195 countries are recognized by the United Nations (193 member states + 2 observer states).', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(67, 'What is the capital of Australia?', 'Canberra (not Sydney or Melbourne as commonly mistaken).', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(68, 'What are the 7 continents?', 'Asia, Africa, North America, South America, Antarctica, Europe, and Australia/Oceania.', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(69, 'What is the Ring of Fire?', 'A horseshoe-shaped zone around the Pacific Ocean where about 75% of the world\'s volcanoes and 90% of earthquakes occur.', 0, 6, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(70, 'Who wrote \"Romeo and Juliet\"?', 'William Shakespeare, written around 1594-1596. It is one of his most famous tragedies.', 0, 7, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(71, 'What is a sonnet?', 'A 14-line poem with a specific rhyme scheme. Two main types: Shakespearean (ABAB CDCD EFEF GG) and Petrarchan (ABBAABBA + CDECDE).', 0, 7, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(72, 'Who wrote \"1984\"?', 'George Orwell, published in 1949. A dystopian novel about totalitarianism and surveillance.', 0, 7, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(73, 'What is the difference between a simile and a metaphor?', 'A simile compares using \"like\" or \"as\" (e.g., brave as a lion). A metaphor states something IS something else (e.g., time is money).', 0, 7, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(74, 'Who wrote \"The Great Gatsby\"?', 'F. Scott Fitzgerald, published in 1925. Set in the Jazz Age, it explores themes of wealth, class, and the American Dream.', 0, 7, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(75, 'What is an allegory?', 'A narrative in which characters and events represent abstract ideas or moral qualities. Example: \"Animal Farm\" by George Orwell.', 0, 7, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(76, 'Who wrote \"Don Quixote\"?', 'Miguel de Cervantes, published in two parts (1605 and 1615). Often considered the first modern novel.', 0, 7, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(77, 'What is a haiku?', 'A traditional Japanese poem consisting of three lines with 5, 7, and 5 syllables respectively. Often about nature or seasons.', 0, 7, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(78, 'What is Cloud Computing?', 'The delivery of computing services (servers, storage, databases, networking) over the internet. Examples: AWS, Azure, Google Cloud.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(79, 'What is Machine Learning?', 'A subset of AI where systems learn and improve from experience without being explicitly programmed, using algorithms and statistical models.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(80, 'What is Blockchain?', 'A decentralized, distributed digital ledger that records transactions across many computers, making records difficult to alter retroactively.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(81, 'What is the Internet of Things (IoT)?', 'A network of physical devices embedded with sensors and software that connect and exchange data over the internet.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(82, 'What is 5G?', 'The fifth generation of mobile network technology, offering speeds up to 100x faster than 4G with lower latency.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(83, 'What is Cybersecurity?', 'The practice of protecting systems, networks, and programs from digital attacks, unauthorized access, and data breaches.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(84, 'What is Artificial Intelligence (AI)?', 'The simulation of human intelligence by machines, enabling them to perform tasks like learning, reasoning, and problem-solving.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(85, 'What is Big Data?', 'Extremely large datasets that can be analyzed computationally to reveal patterns, trends, and associations. Defined by Volume, Velocity, and Variety.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(86, 'What is a VPN?', 'Virtual Private Network, a service that encrypts your internet connection and hides your IP address for privacy and security.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51'),
(87, 'What is Open Source software?', 'Software with source code that anyone can inspect, modify, and distribute. Examples: Linux, Firefox, WordPress, Laravel.', 0, 8, '2026-04-19 00:36:51', '2026-04-19 00:36:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flashcards_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD CONSTRAINT `flashcards_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
