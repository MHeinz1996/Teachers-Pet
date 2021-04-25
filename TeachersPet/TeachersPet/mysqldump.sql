-- File name: C:\Users\sally\Google Drive\CTU\GroupProject Part 2\TeachersPet\TeachersPet\TeachersPet\mysqldump.sql
-- Created by  


--
-- Table structure for table `django_migrations`
--

CREATE TABLE `django_migrations` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `app` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `applied` DATETIME NOT NULL,
  PRIMARY KEY (`id` ASC)
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `django_content_type`
--

CREATE TABLE `django_content_type` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `app_label` VARCHAR(100) NOT NULL,
  `model` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id` ASC),
  UNIQUE KEY `django_content_type_app_label_model_76bd3d3b_uniq` (`app_label` ASC,`model` ASC)
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `auth_group`
--

CREATE TABLE `auth_group` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id` ASC)
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `auth_permission`
--

CREATE TABLE `auth_permission` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `content_type_id` INT NOT NULL DEFAULT 0,
  `codename` VARCHAR(100) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id` ASC),
  UNIQUE KEY `auth_permission_content_type_id_codename_01ab375a_uniq` (`content_type_id` ASC,`codename` ASC),
  KEY `auth_permission_content_type_id_2f476e4b` (`content_type_id` ASC),
  CONSTRAINT `content_type_id_django_content_type_id` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `password` VARCHAR(128) NOT NULL,
  `last_login` DATETIME NULL DEFAULT '00-00-00 00:00:00',
  `is_superuser` TEXT NOT NULL,
  `username` VARCHAR(150) NOT NULL,
  `last_name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(254) NOT NULL,
  `is_staff` TEXT NOT NULL,
  `is_active` TEXT NOT NULL,
  `date_joined` DATETIME NOT NULL,
  `first_name` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id` ASC)
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `auth_group_permissions`
--

CREATE TABLE `auth_group_permissions` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `group_id` INT NOT NULL DEFAULT 0,
  `permission_id` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id` ASC),
  UNIQUE KEY `auth_group_permissions_group_id_permission_id_0cd325b0_uniq` (`group_id` ASC,`permission_id` ASC),
  KEY `auth_group_permissions_group_id_b120cbf9` (`group_id` ASC),
  KEY `auth_group_permissions_permission_id_84c5c92e` (`permission_id` ASC),
  CONSTRAINT `permission_id_auth_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `group_id_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `auth_user_user_permissions`
--

CREATE TABLE `auth_user_user_permissions` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `user_id` INT NOT NULL DEFAULT 0,
  `permission_id` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id` ASC),
  UNIQUE KEY `auth_user_user_permissions_user_id_permission_id_14a6b632_uniq` (`user_id` ASC,`permission_id` ASC),
  KEY `auth_user_user_permissions_user_id_a95ead1b` (`user_id` ASC),
  KEY `auth_user_user_permissions_permission_id_1fbb5f2c` (`permission_id` ASC),
  CONSTRAINT `permission_id_auth_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `auth_user_groups`
--

CREATE TABLE `auth_user_groups` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `user_id` INT NOT NULL DEFAULT 0,
  `group_id` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id` ASC),
  UNIQUE KEY `auth_user_groups_user_id_group_id_94350c0c_uniq` (`user_id` ASC,`group_id` ASC),
  KEY `auth_user_groups_user_id_6a12ed8b` (`user_id` ASC),
  KEY `auth_user_groups_group_id_97559544` (`group_id` ASC),
  CONSTRAINT `group_id_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `app_lookupdepartment`
--

CREATE TABLE `app_lookupdepartment` (
  `departmentName` VARCHAR(50) NOT NULL,
  `id` INT NOT NULL  AUTO_INCREMENT,
  PRIMARY KEY (`id` ASC)
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `django_session`
--

CREATE TABLE `django_session` (
  `session_key` VARCHAR(40) NOT NULL,
  `session_data` TEXT NOT NULL,
  `expire_date` DATETIME NOT NULL,
  PRIMARY KEY (`session_key` ASC),
  KEY `django_session_expire_date_a5c62663` (`expire_date` ASC)
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `app_lookupcourse`
--

CREATE TABLE `app_lookupcourse` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `coursename` VARCHAR(50) NOT NULL,
  `department` TEXT NULL,
  `courseCode` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id` ASC),
  KEY `app_lookupcourse_department_2ecec1ca` (`department` ASC),
  CONSTRAINT `department_app_lookupdepartment_id` FOREIGN KEY (`department`) REFERENCES `app_lookupdepartment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `app_lookupterm`
--

CREATE TABLE `app_lookupterm` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `term` VARCHAR(50) NOT NULL,
  `termStart` DATE NOT NULL,
  `termEnd` DATE NOT NULL,
  `term_status` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`id` ASC)
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `app_courseschedule`
--

CREATE TABLE `app_courseschedule` (
  `course_id` INT NOT NULL DEFAULT 0,
  `term_id` INT NOT NULL DEFAULT 0,
  `teacher_id` INT NULL DEFAULT 0,
  `id` INT NOT NULL  AUTO_INCREMENT,
  PRIMARY KEY (`id` ASC),
  KEY `app_courseschedule_course_id_eea1e54c` (`course_id` ASC),
  KEY `app_courseschedule_term_id_7ac66fa1` (`term_id` ASC),
  KEY `app_courseschedule_teacher_id_8960455f` (`teacher_id` ASC),
  CONSTRAINT `teacher_id_auth_user_id` FOREIGN KEY (`teacher_id`) REFERENCES `auth_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `term_id_app_lookupterm_id` FOREIGN KEY (`term_id`) REFERENCES `app_lookupterm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `course_id_app_lookupcourse_id` FOREIGN KEY (`course_id`) REFERENCES `app_lookupcourse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `app_teachercertification`
--

CREATE TABLE `app_teachercertification` (
  `certification` VARCHAR(255) NOT NULL,
  `certDate` DATE NOT NULL,
  `expirationDate` DATE NOT NULL,
  `teacher_id` INT NULL DEFAULT 0,
  `id` INT NOT NULL  AUTO_INCREMENT,
  PRIMARY KEY (`id` ASC),
  KEY `app_teachercertification_teacher_id_a997bef8` (`teacher_id` ASC),
  CONSTRAINT `teacher_id_auth_user_id` FOREIGN KEY (`teacher_id`) REFERENCES `auth_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `django_admin_log`
--

CREATE TABLE `django_admin_log` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `action_time` DATETIME NOT NULL,
  `object_id` TEXT NULL,
  `object_repr` VARCHAR(200) NOT NULL,
  `change_message` TEXT NOT NULL,
  `content_type_id` INT NULL DEFAULT 0,
  `user_id` INT NOT NULL DEFAULT 0,
  `action_flag` TEXT NOT NULL,
  PRIMARY KEY (`id` ASC),
  KEY `django_admin_log_content_type_id_c4bce8eb` (`content_type_id` ASC),
  KEY `django_admin_log_user_id_c564eba6` (`user_id` ASC),
  CONSTRAINT `user_id_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `content_type_id_django_content_type_id` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `app_courseassignment`
--

CREATE TABLE `app_courseassignment` (
  `assignmentDate` DATE NOT NULL,
  `dueDate` DATE NOT NULL,
  `description` TEXT NOT NULL,
  `pointsPossible` TEXT NOT NULL,
  `course_schedule_id` INT NOT NULL DEFAULT 0,
  `id` INT NOT NULL  AUTO_INCREMENT,
  PRIMARY KEY (`id` ASC),
  KEY `app_courseassignment_course_schedule_id_a7a544cf` (`course_schedule_id` ASC),
  CONSTRAINT `course_schedule_id_app_courseschedule_id` FOREIGN KEY (`course_schedule_id`) REFERENCES `app_courseschedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `app_coursestudent`
--

CREATE TABLE `app_coursestudent` (
  `id` INT NOT NULL  AUTO_INCREMENT,
  `grade` TEXT NULL,
  `student_id` INT NULL DEFAULT 0,
  `course_id` TEXT NOT NULL,
  PRIMARY KEY (`id` ASC),
  KEY `app_coursestudent_student_id_01f10fcf` (`student_id` ASC),
  KEY `app_coursestudent_course_id_fe2631c5` (`course_id` ASC),
  CONSTRAINT `course_id_app_courseschedule_id` FOREIGN KEY (`course_id`) REFERENCES `app_courseschedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `student_id_auth_user_id` FOREIGN KEY (`student_id`) REFERENCES `auth_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

--
-- Table structure for table `app_studentsubmission`
--

CREATE TABLE `app_studentsubmission` (
  `dateUploaded` DATE NOT NULL,
  `submission` VARCHAR(100) NOT NULL,
  `pointsearned` TEXT NOT NULL,
  `teacherNotes` TEXT NOT NULL,
  `assignment_id` TEXT NOT NULL,
  `student_id` INT NULL DEFAULT 0,
  `id` INT NOT NULL  AUTO_INCREMENT,
  PRIMARY KEY (`id` ASC),
  KEY `app_studentsubmission_assignment_id_fd64f68d` (`assignment_id` ASC),
  KEY `app_studentsubmission_student_id_26bae9b1` (`student_id` ASC),
  CONSTRAINT `student_id_auth_user_id` FOREIGN KEY (`student_id`) REFERENCES `auth_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `assignment_id_app_courseassignment_id` FOREIGN KEY (`assignment_id`) REFERENCES `app_courseassignment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) DEFAULT CHARSET=utf8 ENGINE=InnoDB;

