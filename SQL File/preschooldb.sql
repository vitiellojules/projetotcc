-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/02/2025 às 20:29
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `preschooldb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `AdminuserName` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserType` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `AdminuserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserType`) VALUES
(2, 'Admin', 'admin', 3785854545, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-03-16 21:30:00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `teacherId` int(10) DEFAULT NULL,
  `className` varchar(255) DEFAULT NULL,
  `ageGroup` varchar(150) DEFAULT NULL,
  `classTiming` varchar(120) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `feacturePic` varchar(255) DEFAULT NULL,
  `addedBy` varchar(150) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `teacherId`, `className`, `ageGroup`, `classTiming`, `capacity`, `feacturePic`, `addedBy`, `postingDate`) VALUES
(6, 6, 'Desenho ', '2-3 Anos', '8-9 AM', '20', '2caa0b8764441ee80ee0c71adce607101731357280jpeg', 'admin', '2024-11-11 20:34:40'),
(7, 7, 'Dança', '4-5 Anos', '10-11 AM', '20', 'cbf2a1fee4137d3ea214ed8a61b9957a1731357331jpeg', 'admin', '2024-11-11 20:35:31'),
(8, 8, 'Esporte', '2-3 Anos', '10-11 AM', '15', '7da19528b50f058da7a81140e9fbacaf1731357377.jpg', 'admin', '2024-11-11 20:36:17'),
(9, 9, 'Desenho e Esporte', '5-6 Anos', '8-9 AM', '10', '7da19528b50f058da7a81140e9fbacaf1731361417.jpg', 'admin', '2024-11-11 21:43:37'),
(10, 7, 'diversao', '18 Meses-3 Anos', '8-9 AM', '35', 'cbf2a1fee4137d3ea214ed8a61b9957a1733178634jpeg', 'admin', '2024-12-02 22:30:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblenrollment`
--

CREATE TABLE `tblenrollment` (
  `id` int(11) NOT NULL,
  `enrollmentNumber` bigint(12) DEFAULT NULL,
  `fatherName` varchar(120) DEFAULT NULL,
  `motherName` varchar(120) DEFAULT NULL,
  `parentmobNo` bigint(12) DEFAULT NULL,
  `parentEmail` varchar(150) DEFAULT NULL,
  `childName` varchar(150) DEFAULT NULL,
  `childAge` varchar(200) DEFAULT NULL,
  `enrollProgram` varchar(255) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `enrollStatus` varchar(100) DEFAULT NULL,
  `officialRemark` mediumtext DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblenrollment`
--

INSERT INTO `tblenrollment` (`id`, `enrollmentNumber`, `fatherName`, `motherName`, `parentmobNo`, `parentEmail`, `childName`, `childAge`, `enrollProgram`, `message`, `postingDate`, `enrollStatus`, `officialRemark`, `updationDate`) VALUES
(6, 733744978, 'Jean da silva ', 'Maria clara ', 3785958622, 'pedro@gmail.com', 'aluno  ifsc ', '3-4 Anos', 'PlayGroup-1.8 to 3 years', 'Alo ', '2024-11-11 20:44:52', 'Aceito', 'boa noite ', '2024-11-23 21:42:16'),
(7, 381125794, 'teste matricular ', 'aluno ifsc ', 2415452145, 'pedro@gmail.com', 'aluno  ifsc ', '2-3 Anos', 'PlayGroup-1.8 a 3 anos', 'boa noiteeeeee', '2024-11-11 22:18:56', 'Aceito', 'boa noite ', '2024-11-11 22:20:04'),
(8, 490211017, 'JOSE DA SILVA ', 'Mae de JESUS ', 47997375466, 'pedro@gmail.com', 'aluna da creche ', '18 Meses-2 Anos', '', 'Bonsoir le monde . je suis tres heureux ', '2024-11-23 23:42:58', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'Creche', 'Objetivo da Nossa Creche\r\n\r\nNossa creche tem como objetivo principal oferecer um ambiente seguro, acolhedor e estimulante para o desenvolvimento integral das crianças em suas primeiras etapas de vida. Buscamos promover o aprendizado por meio de atividades lúdicas e pedagógicas, que incentivem o desenvolvimento social, emocional, cognitivo e motor.\r\n\r\nAlém disso, queremos ser um apoio essencial para as famílias, proporcionando tranquilidade aos responsáveis ao garantir que suas crianças sejam cuidadas com dedicação, respeito e atenção individualizada. Valorizamos a curiosidade natural dos pequenos, criando experiências que despertem o interesse pelo aprendizado e fortaleçam habilidades fundamentais para a vida.\r\n\r\nNossa missão é preparar as crianças para os próximos passos em sua jornada educacional, ao mesmo tempo em que construímos memórias significativas e um vínculo de confiança com suas famílias. ', NULL, NULL, '2024-11-23 14:31:10'),
(2, 'contactus', 'Contact Us', 'rua Sete de maio 139 Apto 18 Blumenau SC ', 'vitiello.j1994@aluno.ifsc.edu.br', 47997375466, '2024-11-23 14:27:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblteachers`
--

CREATE TABLE `tblteachers` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `teacherEmail` varchar(255) DEFAULT NULL,
  `teacherMobileNo` bigint(11) DEFAULT NULL,
  `teacherSubject` varchar(255) DEFAULT NULL,
  `teacherPic` varchar(255) DEFAULT NULL,
  `AddedBy` varchar(120) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblteachers`
--

INSERT INTO `tblteachers` (`id`, `fullName`, `teacherEmail`, `teacherMobileNo`, `teacherSubject`, `teacherPic`, `AddedBy`, `regDate`) VALUES
(7, 'Prof_B', 'gaspar.aluno@gmail.comj', 3785858454, 'B_2', 'cbf2a1fee4137d3ea214ed8a61b9957a1731357144jpeg', 'admin', '2024-11-11 20:32:24'),
(8, 'Prof_C', 'm@gmail.com', 3785845454, 'C_3', '7da19528b50f058da7a81140e9fbacaf1731357188.jpg', 'admin', '2024-11-11 20:33:08'),
(9, 'teste Professor ', 'alunoifsc@gmail.com', 3785858454, 'A_1', '888a00af8357db453d0cb69ad554f6131731361351.jpg', 'admin', '2024-11-11 21:42:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `id` int(11) NOT NULL,
  `gurdianName` varchar(220) DEFAULT NULL,
  `gurdianEmail` varchar(220) DEFAULT NULL,
  `childName` varchar(225) DEFAULT NULL,
  `childAge` varchar(120) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `officeRemark` mediumtext DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `visitTime` varchar(220) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblvisitor`
--

INSERT INTO `tblvisitor` (`id`, `gurdianName`, `gurdianEmail`, `childName`, `childAge`, `message`, `whatsapp`, `officeRemark`, `status`, `visitTime`, `postingDate`, `updationDate`) VALUES
(3, 'aluno ifsc gaspar ', 'vit@gmail.com', 'paulo dias ', '3-4 Anos', 'Bom dia ', NULL, 'dhhdkk', 'Visited', '2024-11-20T07:42', '2024-11-11 20:42:23', '2024-12-01 03:30:25'),
(4, 'teste sistema ', 'aluno.ifsc@gaspar.com', 'Julia Silva Clara', '4-5 Anos', 'boa noite ', NULL, 'iuhiuj', 'Visited', '2024-11-26T17:01', '2024-11-11 22:01:50', '2024-11-11 22:14:20'),
(5, 'davi wevely ', 'm@gmail.com', 'aluna aluna ', '3-4 Anos', 'alo davi ', NULL, NULL, NULL, '2024-11-22T17:02', '2024-11-19 16:02:45', NULL),
(6, 'aluno ifsc gaspar ', 'aluno.ifsc@gaspar.com', 'Julia Silva Clara', '18 Meses-2 Anos', 'lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', '2147483647', NULL, NULL, '2024-12-18T15:38', '2024-12-06 15:38:38', NULL),
(7, 'aluno ifsc gaspar ', 'vitiello.jules@gmail.com', 'rua gaspar ', '3-4 Anos', 'tttttttttttttttttttttttttttt', '2147483647', NULL, NULL, '2024-12-10T17:09', '2024-12-06 16:09:29', NULL),
(8, 'aluno ads 6 ', 'gaspar.aluno@gmail.comj', 'segunda feira', '3-4 Anos', 'boa noite ', '2147483647', NULL, NULL, '2024-12-18T17:11', '2024-12-10 17:11:32', NULL),
(9, 'aluno    ifsc gaspar ', 'alunoifsc@gmail.com', 'jules aluno', '18 Meses-2 Anos', 'alo ifsc ', '2147483647', NULL, NULL, '2024-12-19T20:48', '2024-12-14 23:48:59', NULL),
(10, 'joao perdf', 'gaspar.aluno@gmail.comj', 'aluno  ifsc ', '4-5 Anos', 'BOA NOITE ', '2147483647', NULL, NULL, '2024-12-19T22:56', '2024-12-16 22:57:23', NULL),
(11, 'renato prof', 'gaspar.aluno@gmail.comj', 'aluna aluna ', '4-5 Anos', 'boa noite testando whatts', '2147483647', NULL, NULL, '2024-12-11T23:00', '2024-12-16 23:01:05', NULL),
(12, 'teste2 ', 'vit@gmail.com', 'jules aluno', '2-3 Anos', 'testendo ', '47988466922', NULL, NULL, '2024-12-03T23:07', '2024-12-16 23:07:53', NULL),
(13, 'teste sistema ', 'alunoifsc@gmail.com', 'jules aluno', '18 Month-3 Year', 'allloooddh', NULL, NULL, NULL, '2025-01-31T12:22', '2025-01-29 15:22:34', NULL),
(14, 'aluno ifsc gaspar ', 'aluno.ifsc@gaspar.com', 'jules aluno', '2-3 Year', 'problemas ', '11985875465', NULL, NULL, '2025-01-31T16:59', '2025-01-29 15:59:57', NULL),
(15, 'aluno    ifsc gaspar ', 'alunoifsc@gmail.com', 'jules aluno', '3-4 Year', 'teste de novo ', '66989898584', NULL, NULL, '2025-02-21T17:05', '2025-01-29 16:05:34', NULL),
(16, 'aluno    ifsc gaspar ', 'alunoifsc@gmail.com', 'jules aluno', '3-4 Year', 'teste de novo ', '47997552238', NULL, NULL, '2025-02-21T17:05', '2025-01-29 16:07:39', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblenrollment`
--
ALTER TABLE `tblenrollment`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `tblteachers`
--
ALTER TABLE `tblteachers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tblenrollment`
--
ALTER TABLE `tblenrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblteachers`
--
ALTER TABLE `tblteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
