ALTER TABLE `admin`  ADD `nama` VARCHAR(255) NOT NULL DEFAULT 'noname'  AFTER `image`,  ADD `wilayah` VARCHAR(255) NOT NULL DEFAULT 'no wilayah'  AFTER `nama`,  ADD `no_telepon` VARCHAR(255) NOT NULL DEFAULT '08'  AFTER `wilayah`,  ADD `admin_role` INT(1) NOT NULL DEFAULT '1'  AFTER `no_telepon`;