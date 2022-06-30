CREATE TABLE `app_backend_php`.`users` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `names` VARCHAR(255) NOT NULL , `surnames` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `is_active` TINYINT(1) NOT NULL DEFAULT '1' , `is_reset_password` TINYINT(1) NOT NULL DEFAULT '0' , `role_id` INT(11) NOT NULL , `created_id` INT(11) NOT NULL , `created_ip` VARCHAR(40) NOT NULL , `created_date` DATETIME NOT NULL , `modified_id` INT(11) NOT NULL , `modified_ip` VARCHAR(40) NOT NULL , `modified_date` DATETIME NOT NULL , PRIMARY KEY (`id`), INDEX (`role_id`), UNIQUE (`email`)) ENGINE = InnoDB;

CREATE TABLE `app_backend_php`.`roles` ( `id` INT(11) NOT NULL , `name` VARCHAR(255) NOT NULL ) ENGINE = InnoDB;

ALTER TABLE `app_backend_php`.`roles` ADD PRIMARY KEY (`id`);

ALTER TABLE `users` ADD FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `roles` (`id`, `name`) VALUES ('1', 'Administrador'), ('2', 'Visita')


INSERT INTO `users` (`id`, `names`, `surnames`, `email`, `password`, `is_active`, `is_reset_password`, `role_id`, `created_id`, `created_ip`, `created_date`, `modified_id`, `modified_ip`, `modified_date`) VALUES
(2, 'Waldo Elías', 'Rojo Contreras', 'waldo.rojo.desarrollador@gmail.com', '$2y$10$l6y1SNafuLcHu/KcawNpQOo1FxyRcxYWTD3.R4XNmeG1RJAzPXvhS', 1, 0, 1, 1, '::1', '2022-06-29 03:20:09', 1, '::1', '2022-06-29 03:52:02');