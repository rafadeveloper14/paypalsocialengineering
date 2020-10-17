CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `email` varchar(499) NOT NULL,
  `password` varchar(499) NOT NULL,
  `usado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`,`usado`);

ALTER TABLE `contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;
