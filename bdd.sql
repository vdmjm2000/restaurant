

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `date_booking` date DEFAULT NULL,
  `nbr_people` int(11) NOT NULL,
  `time_booking` time NOT NULL
)



CREATE TABLE `categorie_recipe` (
  `id_categorie_recipe` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) 


CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(250) NOT NULL,
  `recipe1` varchar(100) NOT NULL,
  `recipe2` varchar(100) NOT NULL,
  `recipe3` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) 



CREATE TABLE `picture` (
  `id_picture` int(11) NOT NULL,
  `picture` int(11) NOT NULL,
  `description` int(11) NOT NULL
) 



CREATE TABLE `recipe` (
  `id_recipe` int(11) NOT NULL,
  `id_categorie_recipe` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` blob NOT NULL
)



CREATE TABLE `time_booked` (
  `id_time` int(11) NOT NULL,
  `time_book` time NOT NULL,
  `capacity` int(11) NOT NULL,
  `date_time` date NOT NULL
)




CREATE TABLE `time_table` (
  `id_timeTable` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `open_timelunch` time NOT NULL,
  `close_timelunch` time NOT NULL,
  `open_timeDinner` time NOT NULL,
  `close_timeDinner` time NOT NULL
) 



CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `civilite` tinyint(1) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `adresse` varchar(500) NOT NULL,
  `tel` text NOT NULL,
  `commentaire` varchar(500) NOT NULL,
  `pseudo` varchar(10) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `admin` int(11) NOT NULL,
  `id_booked` int(11) NOT NULL
) 


ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);


ALTER TABLE `categorie_recipe`
  ADD PRIMARY KEY (`id_categorie_recipe`);


ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `picture`
  ADD PRIMARY KEY (`id_picture`);


ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id_recipe`);


ALTER TABLE `time_booked`
  ADD PRIMARY KEY (`id_time`);


ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id_timeTable`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`nom`);




ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=428;


ALTER TABLE `categorie_recipe`
  MODIFY `id_categorie_recipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;


ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `picture`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `recipe`
  MODIFY `id_recipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;


ALTER TABLE `time_booked`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `time_table`
  MODIFY `id_timeTable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;



