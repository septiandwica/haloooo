
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `std_nim` varchar(50) NOT NULL,
  `std_name` varchar(100) NOT NULL,
  `std_major` varchar(50) NOT NULL,
  `std_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `students` (`id`, `std_nim`, `std_name`, `std_major`, `std_batch`) VALUES
(1, '0121', 'Alex', 'CIS', 2023),
(2, '0122', 'Nauval', 'CIS', 2023),
(3, '0123', 'Kevin', 'CIS', 2023),
(4, '0124', 'Sam', 'CIS', 2023),
(5, '0125', 'Tian', 'CIS', 2023),
(6, '0128', 'Bani', 'CIS', 2023);

ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
