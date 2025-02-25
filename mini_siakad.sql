-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Okt 2019 pada 09.04
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_user_id` int(11) NOT NULL,
  `attendance_schedule_id` int(11) NOT NULL,
  `attendance_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attendance_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'dosen'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_course_id` int(11) NOT NULL,
  `schedule_user_id` int(11) NOT NULL,
  `schedule_start_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `schedule_end_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `schedule_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_code` varchar(15) NOT NULL COMMENT 'NIM/Kode Dosen',
  `user_name` varchar(64) NOT NULL,
  `user_dob` date NOT NULL,
  `user_address` text NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `user_phone_number` varchar(20) NOT NULL,
  `user_gender` enum('L','P') NOT NULL,
  `user_image` varchar(64) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_code`, `user_name`, `user_dob`, `user_address`, `user_email`, `user_phone_number`, `user_gender`, `user_image`, `user_password`, `user_role_id`) VALUES
(1, '1001', 'Resi', '2019-10-10', '', '', '', 'L', '', '$2y$10$2rqhXJX1xd8sq9Hth7b2Bej3SGlgOl.UxSMr9Vi8Q9wP.lrbZq3YO', 1),
(2, 'admin', 'Administrator', '1998-09-14', 'Kampus', 'admin@gmail.com', '089634372389', 'L', '', '$2y$10$awU4LKIqqArglcF5eGm.eOzLFZ0PiETUEpdHdvmgu4VnxLqCxWmTG', 1),
(3, 'dosen', 'Imam Sutanto', '2019-10-05', 'Kampus', 'imam@gmail.com', '', 'L', 'aceh-marathon.jpg', '$2y$10$yvGmehXDf4d5HQTiU4s8dudz6BA6DgdW.Mw5I0596YVW.xOFessbu', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `schedule_id` (`attendance_schedule_id`),
  ADD KEY `user_id` (`attendance_user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `course_id` (`schedule_course_id`),
  ADD KEY `user_id` (`schedule_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_code`),
  ADD KEY `role_id` (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`attendance_schedule_id`) REFERENCES `schedule` (`schedule_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`attendance_user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`schedule_course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`schedule_user_id`) REFERENCES `users` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
