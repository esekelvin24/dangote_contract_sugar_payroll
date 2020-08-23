/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : dangote_sugar_payroll

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 04/02/2020 19:56:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank_bincodes
-- ----------------------------
DROP TABLE IF EXISTS `bank_bincodes`;
CREATE TABLE `bank_bincodes`  (
  `bin_code` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `bank` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`bin_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bank_bincodes
-- ----------------------------
INSERT INTO `bank_bincodes` VALUES ('011', 'First Bank of Nigeria');
INSERT INTO `bank_bincodes` VALUES ('023', 'CitiBank');
INSERT INTO `bank_bincodes` VALUES ('030', 'Heritage');
INSERT INTO `bank_bincodes` VALUES ('032', 'Union Bank');
INSERT INTO `bank_bincodes` VALUES ('033', 'United Bank for Africa');
INSERT INTO `bank_bincodes` VALUES ('035', 'Wema Bank');
INSERT INTO `bank_bincodes` VALUES ('044', 'Access Bank');
INSERT INTO `bank_bincodes` VALUES ('050', 'Ecobank Plc');
INSERT INTO `bank_bincodes` VALUES ('057', 'Zenith Bank');
INSERT INTO `bank_bincodes` VALUES ('058', 'GTBank Plc');
INSERT INTO `bank_bincodes` VALUES ('063', 'Diamond Bank');
INSERT INTO `bank_bincodes` VALUES ('068', 'Standard Chartered Bank');
INSERT INTO `bank_bincodes` VALUES ('070', 'Fidelity Bank');
INSERT INTO `bank_bincodes` VALUES ('076', 'Skye Bank');
INSERT INTO `bank_bincodes` VALUES ('082', 'Keystone Bank');
INSERT INTO `bank_bincodes` VALUES ('084', 'Enterprise Bank');
INSERT INTO `bank_bincodes` VALUES ('100', 'SunTrust Bank');
INSERT INTO `bank_bincodes` VALUES ('214', 'First City Monument Bank');
INSERT INTO `bank_bincodes` VALUES ('215', 'Unity Bank');
INSERT INTO `bank_bincodes` VALUES ('221', 'Stanbic IBTC Bank');
INSERT INTO `bank_bincodes` VALUES ('232', 'Sterling Bank');
INSERT INTO `bank_bincodes` VALUES ('301', 'JAIZ Bank');
INSERT INTO `bank_bincodes` VALUES ('302', 'Eartholeum');
INSERT INTO `bank_bincodes` VALUES ('303', 'ChamsMobile');
INSERT INTO `bank_bincodes` VALUES ('304', 'Stanbic Mobile Money');
INSERT INTO `bank_bincodes` VALUES ('305', 'Paycom');
INSERT INTO `bank_bincodes` VALUES ('306', 'eTranzact');
INSERT INTO `bank_bincodes` VALUES ('307', 'EcoMobile');
INSERT INTO `bank_bincodes` VALUES ('308', 'FortisMobile');
INSERT INTO `bank_bincodes` VALUES ('309', 'FBNMobile');
INSERT INTO `bank_bincodes` VALUES ('311', 'ReadyCash (Parkway)');
INSERT INTO `bank_bincodes` VALUES ('313', 'Mkudi');
INSERT INTO `bank_bincodes` VALUES ('314', 'FET');
INSERT INTO `bank_bincodes` VALUES ('315', 'GTMobile');
INSERT INTO `bank_bincodes` VALUES ('317', 'Cellulant');
INSERT INTO `bank_bincodes` VALUES ('318', 'Fidelity Mobile');
INSERT INTO `bank_bincodes` VALUES ('319', 'TeasyMobile');
INSERT INTO `bank_bincodes` VALUES ('320', 'VTNetworks');
INSERT INTO `bank_bincodes` VALUES ('322', 'ZenithMobile');
INSERT INTO `bank_bincodes` VALUES ('323', 'Access Money');
INSERT INTO `bank_bincodes` VALUES ('324', 'Hedonmark');
INSERT INTO `bank_bincodes` VALUES ('325', 'MoneyBox');
INSERT INTO `bank_bincodes` VALUES ('326', 'Sterling Mobile');
INSERT INTO `bank_bincodes` VALUES ('327', 'Pagatech');
INSERT INTO `bank_bincodes` VALUES ('328', 'TagPay');
INSERT INTO `bank_bincodes` VALUES ('329', 'PayAttitude Online');
INSERT INTO `bank_bincodes` VALUES ('401', 'ASO Savings and & Loans');
INSERT INTO `bank_bincodes` VALUES ('402', 'Jubilee Life Mortgage Bank');
INSERT INTO `bank_bincodes` VALUES ('403', 'SafeTrust Mortgage Bank');
INSERT INTO `bank_bincodes` VALUES ('415', 'Imperial Homes Mortgage Bank');
INSERT INTO `bank_bincodes` VALUES ('501', 'Fortis Microfinance Bank');
INSERT INTO `bank_bincodes` VALUES ('523', 'Trustbond');
INSERT INTO `bank_bincodes` VALUES ('526', 'Parralex');
INSERT INTO `bank_bincodes` VALUES ('551', 'Covenant Microfinance Bank');
INSERT INTO `bank_bincodes` VALUES ('552', 'NPF MicroFinance Bank');
INSERT INTO `bank_bincodes` VALUES ('559', 'Coronation Merchant Bank');
INSERT INTO `bank_bincodes` VALUES ('560', 'Page MFBank');
INSERT INTO `bank_bincodes` VALUES ('601', 'FSDH');
INSERT INTO `bank_bincodes` VALUES ('990', 'Omoluabi Mortgage Bank');
INSERT INTO `bank_bincodes` VALUES ('999', 'NIP Virtual Bank');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `department_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `department_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`department_id`) USING BTREE,
  INDEX `department_id`(`department_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('dep01', 'Finance & Budget', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');
INSERT INTO `department` VALUES ('dep02', 'Technical Services', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');
INSERT INTO `department` VALUES ('dep03', 'Agriculture', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');
INSERT INTO `department` VALUES ('dep04', 'Irrigation', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');
INSERT INTO `department` VALUES ('dep05', 'Civil Engineering', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');
INSERT INTO `department` VALUES ('dep06', 'Admin', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');
INSERT INTO `department` VALUES ('dep07', 'Security', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');
INSERT INTO `department` VALUES ('dep08', 'Cane Haulage', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');
INSERT INTO `department` VALUES ('dep09', 'Data Management', 'ese.kelvin@dangoteprojects.com', '2019-09-12 16:40:10');

-- ----------------------------
-- Table structure for designation
-- ----------------------------
DROP TABLE IF EXISTS `designation`;
CREATE TABLE `designation`  (
  `designation_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `designation_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `department_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `category_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `staff_type_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`designation_id`) USING BTREE,
  INDEX `fk3_department_id`(`department_id`) USING BTREE,
  INDEX `fk2_staff_type_id`(`staff_type_id`) USING BTREE,
  INDEX `fk_2_category_id`(`category_id`) USING BTREE,
  CONSTRAINT `fk2_staff_type_id` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`staff_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk3_department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_2_category_id` FOREIGN KEY (`category_id`) REFERENCES `job_category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of designation
-- ----------------------------
INSERT INTO `designation` VALUES ('100', 'Data Capture Clerk', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('101', 'Chef', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('102', 'Stores Assistant', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('103', 'Supervisor', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat05', 'ST01');
INSERT INTO `designation` VALUES ('104', 'Security Supervisor', 'dep07', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('105', 'Timekeeper', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('106', 'Tractor Driver', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('107', 'Excavator Operator', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('108', 'Planting Supervisor', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat05', 'ST01');
INSERT INTO `designation` VALUES ('109', 'Grader Operator', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('110', 'Dozer Operator', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('111', 'Plant Mechanic', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('112', 'Land Prep Tractor Driver', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('113', 'Truck Driver', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('114', 'Assistant Plant Mechanic', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('115', 'Electrical Maintenance', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('116', 'Civils Supervisor', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat05', 'ST01');
INSERT INTO `designation` VALUES ('117', 'Electrical Foreman', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('118', 'Pump Operator', 'dep04', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('119', 'Tipper Driver', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('120', 'Stores Assistant', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('121', 'Land Prep Tractor Driver', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('122', 'Team Leader', 'dep04', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('123', 'Payloader ', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('124', 'Truck Driver', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('125', 'Compactor Operator', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('126', 'Planting Leader', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('127', 'Carpenter', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('128', 'Mason', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('129', 'Iron Bender', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('130', 'Crop Protection Leaders', 'dep04', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('131', 'Crop Protection Leaders', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('132', 'Tipper Driver', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('133', 'Payloader Operator', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('134', 'Crop Nutrition Leaders', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('135', 'Harvest Leader', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('136', 'Vehicle Driver', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('137', 'Irrigator', 'dep04', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('138', 'Plumber', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('139', 'Telehandler Operator', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('140', 'Security Guard', 'dep07', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat07', 'ST01');
INSERT INTO `designation` VALUES ('141', 'Housekeeper', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat07', 'ST01');
INSERT INTO `designation` VALUES ('142', 'Survey Assistant', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('143', 'Vehicle Driver', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('144', 'Survey Assistant', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('145', 'Pump Operator', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('146', 'Housekeeper', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:57', 'cat07', 'ST01');
INSERT INTO `designation` VALUES ('147', 'Load Master', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('148', 'Plant Mechanic', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('149', 'Chef', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat07', 'ST01');
INSERT INTO `designation` VALUES ('150', 'Sanitation', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat07', 'ST01');
INSERT INTO `designation` VALUES ('151', 'Gateman', 'dep07', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat07', 'ST01');
INSERT INTO `designation` VALUES ('152', 'Stores Assistant', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat07', 'ST01');
INSERT INTO `designation` VALUES ('153', 'Irrigator', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('154', 'Irrigation Maintenance', 'dep04', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('155', 'Boilermaker', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('156', 'Pump Operator', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('157', 'Dozer Operator', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('158', 'Pump Operator', 'dep04', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('159', 'Security Guard', 'dep07', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('160', 'Data Clerk', 'dep09', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('161', 'Fuel Attendant', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('162', 'Fuel Clerk', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('163', 'Forest Observer', 'dep07', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat07', 'ST01');
INSERT INTO `designation` VALUES ('164', 'Asst. Data', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('165', 'Finance Asst.', 'dep01', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('166', 'Crane Opt', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('167', 'Mechanic', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('168', 'Welder', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('169', 'Electrician', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('170', 'It Technicians', 'dep09', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('171', 'Survey Assistant', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('172', 'General Work', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:58', 'cat07', 'ST02');
INSERT INTO `designation` VALUES ('87', 'Supervisor', 'dep03', 'b@yahoo.com', '2019-12-07 16:28:55', 'cat05', 'ST01');
INSERT INTO `designation` VALUES ('88', 'Asst Crm', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:55', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('89', 'Hr Asst', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:55', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('90', 'Asst Purchase', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:55', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('91', 'Secretary', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:55', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('92', 'Asst Crm', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:55', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('93', 'Data Capt Clerk', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('94', 'Store Asst', 'dep02', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('95', 'Civils Foreman', 'dep05', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('96', '', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('97', 'Asst Crm', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('98', 'Asst Data Capture', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');
INSERT INTO `designation` VALUES ('99', 'Timekeeper', 'dep06', 'b@yahoo.com', '2019-12-07 16:28:56', 'cat06', 'ST01');

-- ----------------------------
-- Table structure for designation_salary_package
-- ----------------------------
DROP TABLE IF EXISTS `designation_salary_package`;
CREATE TABLE `designation_salary_package`  (
  `designation_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `salary_desc_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `monthly_amount` decimal(38, 2) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`designation_id`, `salary_desc_code`) USING BTREE,
  INDEX `designation_id`(`designation_id`) USING BTREE,
  INDEX `salary_desc_code`(`salary_desc_code`) USING BTREE,
  CONSTRAINT `fk_designation_id` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `salary_desc_code` FOREIGN KEY (`salary_desc_code`) REFERENCES `salary_description` (`salary_desc_code`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of designation_salary_package
-- ----------------------------
INSERT INTO `designation_salary_package` VALUES ('100', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('101', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('102', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('103', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('104', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('105', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('106', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('107', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('108', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('109', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('110', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('111', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('112', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('113', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('114', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('115', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('116', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('117', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('118', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('119', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('120', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('121', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('122', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('123', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('124', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('125', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('126', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('127', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('128', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('129', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('130', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('131', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('132', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('133', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('134', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('135', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('136', 'sd01', 36400.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('137', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('138', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('139', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('140', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('141', 'sd01', 28600.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('142', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('143', 'sd01', 36400.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('144', 'sd01', 28600.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('145', 'sd01', 28600.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('146', 'sd01', 36400.00, 'b@yahoo.com', '2019-12-07 16:28:57');
INSERT INTO `designation_salary_package` VALUES ('147', 'sd01', 28600.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('148', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('149', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('150', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('151', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('152', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('153', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('154', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('155', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('156', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('157', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('158', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('159', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('160', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('161', 'sd01', 31200.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('162', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('163', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('164', 'sd01', 55000.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('165', 'sd01', 55000.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('166', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('167', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('168', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('169', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('170', 'sd01', 55000.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('171', 'sd01', 33800.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('172', 'sd01', 26650.00, 'b@yahoo.com', '2019-12-07 16:28:58');
INSERT INTO `designation_salary_package` VALUES ('87', 'sd01', 39000.00, 'b@yahoo.com', '2019-12-07 16:28:55');
INSERT INTO `designation_salary_package` VALUES ('88', 'sd01', 55000.00, 'b@yahoo.com', '2019-12-07 16:28:55');
INSERT INTO `designation_salary_package` VALUES ('89', 'sd01', 55000.00, 'b@yahoo.com', '2019-12-07 16:28:55');
INSERT INTO `designation_salary_package` VALUES ('90', 'sd01', 55000.00, 'b@yahoo.com', '2019-12-07 16:28:55');
INSERT INTO `designation_salary_package` VALUES ('91', 'sd01', 55000.00, 'b@yahoo.com', '2019-12-07 16:28:55');
INSERT INTO `designation_salary_package` VALUES ('92', 'sd01', 50000.00, 'b@yahoo.com', '2019-12-07 16:28:55');
INSERT INTO `designation_salary_package` VALUES ('93', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('94', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('95', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('96', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('97', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('98', 'sd01', 55000.00, 'b@yahoo.com', '2019-12-07 16:28:56');
INSERT INTO `designation_salary_package` VALUES ('99', 'sd01', 45000.00, 'b@yahoo.com', '2019-12-07 16:28:56');

-- ----------------------------
-- Table structure for gendata
-- ----------------------------
DROP TABLE IF EXISTS `gendata`;
CREATE TABLE `gendata`  (
  `table_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gendata
-- ----------------------------
INSERT INTO `gendata` VALUES ('menu', 81);
INSERT INTO `gendata` VALUES ('payroll', 7);
INSERT INTO `gendata` VALUES ('payroll_cat_id', 348);
INSERT INTO `gendata` VALUES ('timesheet', 30);
INSERT INTO `gendata` VALUES ('department', 0);
INSERT INTO `gendata` VALUES ('designation', 172);
INSERT INTO `gendata` VALUES ('category', 0);
INSERT INTO `gendata` VALUES ('C3000', 2);
INSERT INTO `gendata` VALUES ('B6000', 34);
INSERT INTO `gendata` VALUES ('B2000', 35);
INSERT INTO `gendata` VALUES ('B5000', 8);
INSERT INTO `gendata` VALUES ('C5000', 2);
INSERT INTO `gendata` VALUES ('B7000', 3);
INSERT INTO `gendata` VALUES ('B3000', 95);
INSERT INTO `gendata` VALUES ('B4000', 18);
INSERT INTO `gendata` VALUES ('A7000', 63);
INSERT INTO `gendata` VALUES ('A6000', 16);
INSERT INTO `gendata` VALUES ('A2000', 3);
INSERT INTO `gendata` VALUES ('B9000', 2);
INSERT INTO `gendata` VALUES ('B1000', 1);
INSERT INTO `gendata` VALUES ('A3000', 70);

-- ----------------------------
-- Table structure for imei
-- ----------------------------
DROP TABLE IF EXISTS `imei`;
CREATE TABLE `imei`  (
  `imei_no` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  INDEX `imei_imei_no_unique`(`imei_no`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for job_category
-- ----------------------------
DROP TABLE IF EXISTS `job_category`;
CREATE TABLE `job_category`  (
  `category_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_category
-- ----------------------------
INSERT INTO `job_category` VALUES ('cat01', 'General Manager', 'ese.kelvin@dangoteprojects.com', '2019-09-12 11:09:12');
INSERT INTO `job_category` VALUES ('cat02', 'Department Head', 'ese.kelvin@dangoteprojects.com', '2019-09-12 11:09:12');
INSERT INTO `job_category` VALUES ('cat03', 'Managers/Engineers', 'ese.kelvin@dangoteprojects.com', '2019-09-12 11:09:12');
INSERT INTO `job_category` VALUES ('cat04', 'Senior Staff', 'ese.kelvin@dangoteprojects.com', '2019-09-12 11:09:12');
INSERT INTO `job_category` VALUES ('cat05', 'Supervisor', 'ese.kelvin@dangoteprojects.com', '2019-09-12 11:09:12');
INSERT INTO `job_category` VALUES ('cat06', 'Skill', 'ese.kelvin@dangoteprojects.com', '2019-09-12 11:09:12');
INSERT INTO `job_category` VALUES ('cat07', 'Unskill', 'ese.kelvin@dangoteprojects.com', '2019-09-12 11:09:12');

-- ----------------------------
-- Table structure for lga
-- ----------------------------
DROP TABLE IF EXISTS `lga`;
CREATE TABLE `lga`  (
  `stateid` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `State` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lga` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lgaid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`lgaid`) USING BTREE,
  INDEX `lgaid`(`lgaid`) USING BTREE,
  INDEX `lgaid_2`(`lgaid`) USING BTREE,
  INDEX `lgaid_3`(`lgaid`) USING BTREE,
  INDEX `lgaid_4`(`lgaid`) USING BTREE,
  INDEX `lgaid_5`(`lgaid`) USING BTREE,
  INDEX `lgaid_6`(`lgaid`) USING BTREE,
  INDEX `lgaid_7`(`lgaid`) USING BTREE,
  INDEX `lgaid_8`(`lgaid`) USING BTREE,
  INDEX `lgaid_9`(`lgaid`) USING BTREE,
  INDEX `lgaid_10`(`lgaid`) USING BTREE,
  INDEX `lgaid_11`(`lgaid`) USING BTREE,
  INDEX `lgaid_12`(`lgaid`) USING BTREE,
  INDEX `lgaid_13`(`lgaid`) USING BTREE,
  INDEX `lgaid_14`(`lgaid`) USING BTREE,
  INDEX `lgaid_15`(`lgaid`) USING BTREE,
  INDEX `lgaid_16`(`lgaid`) USING BTREE,
  INDEX `lgaid_17`(`lgaid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 827 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lga
-- ----------------------------
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Asaritoru', 2);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Aboh mbaise', 3);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Oluyole', 5);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Bekwara', 6);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Abeokuta east', 7);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Yemoji', 8);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Etsakor', 9);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ethiope west', 10);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Idemili', 11);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Ijumu iyara', 12);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Mopa-muro', 13);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Aba north', 14);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Aba south', 15);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Arochukwu', 16);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Bende', 17);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Ikwuano', 18);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Isiala-ngwa north', 19);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Isiala-ngwa south', 20);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Isukwuato', 21);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Obiomangwa', 22);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Ohafia', 23);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Osisioma ngwa', 24);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Ugwunagbo', 25);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Ukwa east', 26);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Ukwa west', 27);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Umuahia north', 28);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Umuahia south', 29);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Umu-nneochi', 30);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Demsa', 31);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Fufore', 32);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Ganye', 33);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Girei', 34);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Gombi', 35);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Guyuk', 36);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Hong', 37);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Jada', 38);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Lamurde', 39);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Madagali', 40);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Maiha', 41);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Mayo-belwa', 42);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Michika', 43);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Mubi north', 44);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Mubi south', 45);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Numan', 46);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Shelleng', 47);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Song', 48);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Toungo', 49);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Yola north', 50);
INSERT INTO `lga` VALUES ('002', 'ADAMAWA', 'Yola south', 51);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Abak', 52);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Eastern obolo', 53);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Eket', 54);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Esit eket', 55);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Essien udim', 56);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Etim ekpo', 57);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Etinan', 58);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Ibeno', 59);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Ibesikpo asutan', 60);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Ibiono ibom', 61);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Ika', 62);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Ikono', 63);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Ikot abasi', 64);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Ikot ekpene', 65);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Ini', 66);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Itu', 67);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Mbo', 68);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Mkpat enin', 69);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Nsit atai', 70);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Nsit ibom', 71);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Nsit ubium', 72);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Uruan', 73);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Urue-offong/oruko', 74);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Uyo', 75);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Aguata', 76);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Anambra east', 77);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Anambra west', 78);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Anaocha', 79);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Awka north', 80);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Awka south', 81);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Ayamelum', 82);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Dunukofia', 83);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Ekwusigo', 84);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Idemili north', 85);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Idemili south', 86);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Ihiala', 87);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Njikoka', 88);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Nnewi north', 89);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Obanliku', 90);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Obubra', 91);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Obudu', 92);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Odukpani', 93);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Ogoja', 94);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Yakurr', 95);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Yala', 96);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Aniocha north', 97);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Aniocha south', 98);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Bomadi', 99);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Burutu', 100);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ethiope east', 101);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ethiope west', 102);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ika north', 103);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ika south', 104);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Isoko north', 105);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Isoko south', 106);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ndokwa east', 107);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ndokwa west', 108);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Okpe', 109);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Oshimili north', 110);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Oshimili south', 111);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Patani', 112);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Sapele', 113);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Udu', 114);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ughelli north', 115);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ughelli south', 116);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Ukwuani', 117);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Uvwie', 118);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Warri north', 119);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Warri south', 120);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Warri south west', 121);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Abakaliki', 122);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Afikpo north', 123);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Afikpo south', 124);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Ebonyi', 125);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Ezza north', 126);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Ezza south', 127);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Ikwo', 128);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Ishielu', 129);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Ivo', 130);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Izzi', 131);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Ohaozara', 132);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Ohaukwu', 133);
INSERT INTO `lga` VALUES ('011', 'EBONYI', 'Onicha', 134);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Akoko-edo', 135);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Egor', 136);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Esan central', 137);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Esan north east', 138);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Esan south east', 139);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Esan west', 140);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Etsako central', 141);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Etsako east', 142);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Etsako west', 143);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Igueben', 144);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Ikpoba-okha', 145);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Oredo', 146);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Orhionmwon', 147);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Ovia north east', 148);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Ovia south west', 149);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Owan east', 150);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Owan west', 151);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Uhunmwonde', 152);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'ADK', 153);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'DEA', 154);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'EFY', 155);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'MUE', 156);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'LAW', 157);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'AMK', 158);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'EMR', 159);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'DEK', 160);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'JER', 161);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'KER', 162);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'KLE', 163);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'YEK', 164);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'GED', 165);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'SSE', 166);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'TUN', 167);
INSERT INTO `lga` VALUES ('013', 'EKITI', 'YEE', 168);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Aninri', 169);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Awgu', 170);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Enugu east', 171);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Enugu north', 172);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Enugu south', 173);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Ezeagu', 174);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Enugu', 175);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Igbo-etit', 176);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Igbo-eze north', 177);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Igho-eze south', 178);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Isi-uzo', 179);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Nkanu east', 180);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Nkanu west', 181);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Nnewi south', 182);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Ogbaru', 183);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Onitsha north', 184);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Onitsha south', 185);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Orumba north', 186);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Orumba south', 187);
INSERT INTO `lga` VALUES ('004', 'ANAMBRA', 'Oyi', 188);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Alkaleri', 189);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Bauchi', 190);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Bogoro', 191);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Damban', 192);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Darazo', 193);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Dass', 194);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Gamawa', 195);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Ganjuwa', 196);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Giade', 197);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Itas/gadau', 198);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Jama\'are', 199);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Katagun', 200);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Gusau', 201);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Kirfi', 202);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Misau', 203);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Ningi', 204);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Shira', 205);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Tafawa-balewa', 206);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Toro', 207);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Warji', 208);
INSERT INTO `lga` VALUES ('005', 'BAUCHI', 'Zaki', 209);
INSERT INTO `lga` VALUES ('006', 'BAYELSA', 'Brass', 210);
INSERT INTO `lga` VALUES ('006', 'BAYELSA', 'Ekeremor', 211);
INSERT INTO `lga` VALUES ('006', 'BAYELSA', 'Kolokuma/opokuma', 212);
INSERT INTO `lga` VALUES ('006', 'BAYELSA', 'Nembe', 213);
INSERT INTO `lga` VALUES ('006', 'BAYELSA', 'Ogbia', 214);
INSERT INTO `lga` VALUES ('006', 'BAYELSA', 'Sagbama', 215);
INSERT INTO `lga` VALUES ('006', 'BAYELSA', 'Southern ijaw', 216);
INSERT INTO `lga` VALUES ('006', 'BAYELSA', 'Yenegoa', 217);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Ado', 218);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Agatu', 219);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Apa', 220);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Buruku', 221);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Gboko', 222);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Guma', 223);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Gwer east', 224);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Gwer west', 225);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Katsina-ala', 226);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Konshisha', 227);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Kwande', 228);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Logo', 229);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Makurdi', 230);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Obi', 231);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Ogbadibo', 232);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Oju', 233);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Okpokwu', 234);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Ohimini', 235);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Oturkpo', 236);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Tarka', 237);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Ukum', 238);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Ushongo', 239);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Vandeikya', 240);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Abadam', 241);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Askira/uba', 242);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Bama', 243);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Bayo', 244);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Biu', 245);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Chibok', 246);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Damboa', 247);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Dikwa', 248);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Gubio', 249);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Guzamala', 250);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Gwoza', 251);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Hawul', 252);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Jere', 253);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Kaga', 254);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Kala/balge', 255);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Konduga', 256);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Kukawa', 257);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Kwaya kusar', 258);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Mafa', 259);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Magumeri', 260);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Maiduguri', 261);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Marte', 262);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Mobbar', 263);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Monguno', 264);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Ngala', 265);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Nganzai', 266);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Shani', 267);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Abi', 268);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Akamkpa', 269);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Akpabuyo', 270);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Bakassi', 271);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Bekwara', 272);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Biase', 273);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Boki', 274);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Calabar-municipal', 275);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Calabar south', 276);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Etung', 277);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Ikom', 278);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Nsukka', 279);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Oji-river', 280);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Udenu', 281);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Udi', 282);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Uzo-uwani', 283);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Akko', 284);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Balanga', 285);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Billiri', 286);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Dukku', 287);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Funakaye', 288);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Gombe', 289);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Kaltungo', 290);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Kwami', 291);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Nafada', 292);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Shomgom', 293);
INSERT INTO `lga` VALUES ('016', 'GOMBE', 'Yamaltu/deba', 294);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ahiazu-mbaise', 295);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ehime-mbano', 296);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ezinihitte', 297);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ideato north', 298);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ideato south', 299);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ihitte-uboma', 300);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ikeduru', 301);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Isiala mbano', 302);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Isu', 303);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Mbaitoli', 304);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ngor-okpala', 305);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Njaba', 306);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Nwangele', 307);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Nkwerre', 308);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Obowo', 309);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Oguta', 310);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ohaji/egbema', 311);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Okigwe', 312);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Orlu', 313);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Orsu', 314);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Oru east', 315);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Oru west', 316);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Owerri muni.', 317);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Owerri north', 318);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Owerri west', 319);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Onuimo', 320);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Auyo', 321);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Babura', 322);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Birnin kudu', 323);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Biriniwa', 324);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Buji', 325);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Dutse', 326);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Gagarawa', 327);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Garki', 328);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Gumel', 329);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Guri', 330);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Gwaram', 331);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Gwiwa', 332);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Hadejia', 333);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Jahun', 334);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Kafin', 335);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Hausa', 336);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Kaugama', 337);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Kazaure', 338);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Kiri kasamma', 339);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Kiyawa', 340);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Maigatari', 341);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Malam madori', 342);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Miga', 343);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Ringim', 344);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Roni', 345);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Sule-tankarkar', 346);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Taura', 347);
INSERT INTO `lga` VALUES ('018', 'JIGAWA', 'Yankwashi', 348);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Birnin-gwari', 349);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Chikun', 350);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Giwa', 351);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Igabi', 352);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Ikara', 353);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Jaba', 354);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Jema\'a', 355);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Kachia', 356);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Kaduna north', 357);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Kaduna south', 358);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Kagarko', 359);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Kajuru', 360);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Kaura', 361);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Kubau', 362);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Kudan', 363);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Lere', 364);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Makarfi', 365);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Sabon-gari', 366);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Sanga', 367);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Soba', 368);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Zangon-kataf', 369);
INSERT INTO `lga` VALUES ('019', 'KADUNA', 'Zaria', 370);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Ajingi', 371);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Albasu', 372);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Bagwai', 373);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Bebeji', 374);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Bichi', 375);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Bunkure', 376);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Dala', 377);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Dambatta', 378);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Dawakin kudu', 379);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Dawakin tofa', 380);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Doguwa', 381);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Fagge', 382);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Gabasawa', 383);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Garko', 384);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Garum mallarn', 385);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Gaya', 386);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Gezawa', 387);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Gwale', 388);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Gwarzo', 389);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Kabo', 390);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Kano municipal', 391);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Karaye', 392);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Kibiya', 393);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Kiru', 394);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Kumbotso', 395);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Kunchi', 396);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Kura', 397);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Madobi', 398);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Makoda', 399);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Minjibir', 400);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Nasarawa', 401);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Rano', 402);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Rimin gado', 403);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Rogo', 404);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Shanono', 405);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Sumaila', 406);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Takai', 407);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Tarauni', 408);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Tofa', 409);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Tsanyawa', 410);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Tudun wada', 411);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Ungogo', 412);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Warawa', 413);
INSERT INTO `lga` VALUES ('020', 'KANO', 'Wudil', 414);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Bakori', 415);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Batagarawa', 416);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Batsari', 417);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Baure', 418);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Bindawa', 419);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Charanchi', 420);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Dandume', 421);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Danja', 422);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Dan musa', 423);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Daura', 424);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Dutsi', 425);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Dutsin-ma', 426);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Faskari', 427);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Funtua', 428);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Ingawa', 429);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Jibia', 430);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Kafur', 431);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Kaita', 432);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Kankara', 433);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Kankia', 434);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Katsina', 435);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Kurfi', 436);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Kusada', 437);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Mai\'adua', 438);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Malumfashi', 439);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Mani', 440);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Mashi', 441);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Matazu', 442);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Musawa', 443);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Rimi', 444);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Sabuwa', 445);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Safana', 446);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Sandamu', 447);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Zongo', 448);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Aleiro', 449);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Arewa-dandi', 450);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Argungu', 451);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Augie', 452);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Bagudo', 453);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Birnin kebbi', 454);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Bunza', 455);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Dandi', 456);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Fakai', 457);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Gwandu', 458);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Jega', 459);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Kalgo', 460);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Koko/besse', 461);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Maiyama', 462);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Ngaski', 463);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Sakaba', 464);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Shanga', 465);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Suru', 466);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Wasagu/danko', 467);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Yauri', 468);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Zuru', 469);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Adavi', 470);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Ajaojuta', 471);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Ankpa', 472);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Bassa', 473);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Dekina', 474);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Ibaji', 475);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Igalamela-odolu', 476);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Ijumu', 477);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Ijumu', 478);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Kabba/bunu', 479);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Kogi', 480);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Lokoja', 481);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Mopa-muro', 482);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Ofu', 483);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Ogori/megongo', 484);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Okehi', 485);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Olamabolo', 486);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Omala', 487);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Yagba east', 488);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Yagba west', 489);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Asa', 490);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Baruten', 491);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Edu', 492);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Ekiti', 493);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Ifelodun', 494);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Ilorin south', 495);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Ilorin west', 496);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Irepodun', 497);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Isin', 498);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Kaiama', 499);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Moro', 500);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Offa', 501);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Oke-ero', 502);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Oyun', 503);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Pategi', 504);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Agege', 505);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Ajeromi-ifelodun', 506);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Alimosho', 507);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Amuwo-odofin', 508);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Apapa', 509);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Badagry', 510);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Epe', 511);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Eti-osa', 512);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Ibeju/lekki', 513);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Ifako-ijaye', 514);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Ikeja', 515);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Ikorodu', 516);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Kosofe', 517);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Lagos island', 518);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Lagos mainland', 519);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Mushin', 520);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Ojo', 521);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Oshodi-isolo', 522);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Shomolu', 523);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Surulere', 524);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Akwanga', 525);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Awe', 526);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Doma', 527);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Karu', 528);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Keana', 529);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Keffi', 530);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Kokona', 531);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Lafia', 532);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Nasarawa', 533);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Nasarawa-eggon', 534);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Obi', 535);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Toto', 536);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Wamba', 537);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Agaie', 538);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Agwara', 539);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Bida', 540);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Borgu', 541);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Bosso', 542);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Chanchaga', 543);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Edati', 544);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Gbako', 545);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Gurara', 546);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Katcha', 547);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Kontagora', 548);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Lapai', 549);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Lavun', 550);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Magama', 551);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Mariga', 552);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Mashegu', 553);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Mokwa', 554);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Muya', 555);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Paikoro', 556);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Rafi', 557);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Rajau', 558);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Shiroro', 559);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Suleja', 560);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Tafa', 561);
INSERT INTO `lga` VALUES ('027', 'NIGER', 'Wushishi', 562);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Abeokuta north', 563);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Abeokuta south', 564);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ado-odo/ota', 565);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Egbado north', 566);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Egbado south', 567);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ekwekoro', 568);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ifo', 569);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ijebu east', 570);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ijebu north', 571);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ijebu north east', 572);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ijebu-ode', 573);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ikenne', 574);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Imeko-afon', 575);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ipokia', 576);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Obafemi-owode', 577);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ogun waterside', 578);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Odeda', 579);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Odogbolu', 580);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Remo north', 581);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Shagamu', 582);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Akoko north east', 583);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Akoko north west', 584);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Akoko south east', 585);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Akoko south west', 586);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Akure north', 587);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Akuresouth', 588);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ese-odo', 589);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Idanre', 590);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ifedore', 591);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ilaje', 592);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ile-oluji-okeigbo', 593);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Irele', 594);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Odigbo', 595);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Okitipupa', 596);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ondo east', 597);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ondo west', 598);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ose-owo', 599);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Aiyedade', 600);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Aiyedire', 601);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Atakumosa east', 602);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Atakumose-west', 603);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Boluwaduro', 604);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Boripe', 605);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ede north', 606);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ede south', 607);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Egbedore', 608);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ejigbo', 609);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ife central', 610);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ife east', 611);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ife north', 612);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ife south', 613);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ifedayo', 614);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ifelodun', 615);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ila', 616);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ilasha east', 617);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ilesha west', 618);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Irepodun', 619);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Irewole', 620);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Isokan', 621);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Iwo', 622);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Obokun', 623);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Odo-otin', 624);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Ola-oluwa', 625);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Olorunda', 626);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Oriade', 627);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Orolu', 628);
INSERT INTO `lga` VALUES ('030', 'OSUN', 'Osogbo', 629);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Afijio', 630);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Akinyele', 631);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Atiba', 632);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Atigbo', 633);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Egbeda', 634);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ibadan central', 635);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ibadan north', 636);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ibadan north west', 637);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ibadan south west', 638);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ibadan south east', 639);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ibarapa central', 640);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ibarapa east', 641);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ibarapa north', 642);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ido', 643);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Irepo', 644);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Iseyin', 645);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Itesiwaju', 646);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Iwajowa', 647);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Kajola', 648);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Lagelu', 649);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ogbomoso north', 650);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ogbomoso south', 651);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ogo oluwa', 652);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Olorunsogo', 653);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Oluyole', 654);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ona-ara', 655);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Orelope', 656);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ori ire', 657);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Oyo east', 658);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Oyo west', 659);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Saki east', 660);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Saki west', 661);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Surelere', 662);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Barikin ladi', 663);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Bassa', 664);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Bokkos', 665);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Jos east', 666);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Jos north', 667);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Jos south', 668);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Kanam', 669);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Kanke', 670);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Langtang north', 671);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Langtang south', 672);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Mangu', 673);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Mikang', 674);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Pankshin', 675);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Qua\'an pan', 676);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Riyom', 677);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Shendam', 678);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Wase', 679);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Abua/odual', 680);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Ahoada east', 681);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Ahoada west', 682);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Akuku toru', 683);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Andoni', 684);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Asari-toru', 685);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Bonny', 686);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Degema', 687);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Emohua', 688);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Eleme', 689);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Etche', 690);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Gokana', 691);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Ikwerre', 692);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Khana', 693);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Obia/akpor', 694);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Ogba/egbema/ndoni', 695);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Ogu/bolo', 696);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Okrika', 697);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Omumma', 698);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Opobo/nkoro', 699);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Oyigbo', 700);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Port harcourt', 701);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Tai', 702);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Binji', 703);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Bodinga', 704);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Dange-shuni', 705);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Gada', 706);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Goronyo', 707);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Gudu', 708);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Gwadabawa', 709);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Illela', 710);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Isa', 711);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Kware', 712);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Kebbe', 713);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Rabah', 714);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Sabon birni', 715);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Shagari', 716);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Silame', 717);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Sokoto north', 718);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Sokoto south', 719);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Tambuwal', 720);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Tangaza', 721);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Tureta', 722);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Wamakko', 723);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Wurno', 724);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Yabo', 725);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Ardo-kola', 726);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Bali', 727);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Donga', 728);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Gashaka', 729);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Gassol', 730);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Ibi', 731);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Jalingo', 732);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Karim-lamido', 733);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Kurmi', 734);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Lau', 735);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Sarduana', 736);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Takum', 737);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Ussa', 738);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Wukari', 739);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Yorro', 740);
INSERT INTO `lga` VALUES ('035', 'TARABA', 'Zing', 741);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Bade', 742);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Bursari', 743);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Damaturu', 744);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Fika', 745);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Fune', 746);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Geidam', 747);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Gujba', 748);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Gulani', 749);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Jakusko', 750);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Karasuwa', 751);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Machina', 752);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Nangere', 753);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Nguru', 754);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Potiskum', 755);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Tarmua', 756);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Yunusari', 757);
INSERT INTO `lga` VALUES ('036', 'YOBE', 'Yusufari', 758);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Anka', 759);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Bakurna', 760);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Birnin magaji', 761);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Bukkuyum', 762);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Bungudu', 763);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Gummi', 764);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Kaura namoda', 765);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Maradun', 766);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Maru', 767);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Shinkafi', 768);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Talata', 769);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Mafara', 770);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Tsafe', 771);
INSERT INTO `lga` VALUES ('037', 'ZAMFARA', 'Zumi', 772);
INSERT INTO `lga` VALUES ('026', 'NASARAWA', 'Eggon', 773);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ile oluji', 774);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Sagamu', 775);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Opeji', 776);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ijebu ode', 777);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Ishan', 778);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ondo central', 779);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Otukpo', 780);
INSERT INTO `lga` VALUES ('015', 'FCT', 'Abaji', 781);
INSERT INTO `lga` VALUES ('015', 'FCT', 'Abuja Municipal', 782);
INSERT INTO `lga` VALUES ('015', 'FCT', 'Bwari', 783);
INSERT INTO `lga` VALUES ('015', 'FCT', 'Gwagwalada', 784);
INSERT INTO `lga` VALUES ('015', 'FCT', 'Kuje', 785);
INSERT INTO `lga` VALUES ('015', 'FCT', 'Kwali', 786);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ehime mbano', 787);
INSERT INTO `lga` VALUES ('014', 'ENUGU', 'Oji river', 788);
INSERT INTO `lga` VALUES ('031', 'OYO', 'Ogbomosho', 789);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Akure south', 790);
INSERT INTO `lga` VALUES ('009', 'CROSS RIVERS', 'Odupani', 791);
INSERT INTO `lga` VALUES ('017', 'IMO', 'Ngor okpala', 792);
INSERT INTO `lga` VALUES ('007', 'BENUE', 'Ador', 793);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Okobo', 794);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Idah', 795);
INSERT INTO `lga` VALUES ('001', 'ABIA', 'Ugwunagbor', 796);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Ogba/Egbem/Noom', 797);
INSERT INTO `lga` VALUES ('023', 'KOGI', 'Okene', 798);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Akoko', 799);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Owo', 800);
INSERT INTO `lga` VALUES ('022', 'KEBBI', 'Kamba', 801);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Water side', 802);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Egado South', 803);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Imeko Afon', 804);
INSERT INTO `lga` VALUES ('032', 'PLATEAU', 'Panilshin', 805);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ikalo', 806);
INSERT INTO `lga` VALUES ('025', 'LAGOS', 'Eredo', 807);
INSERT INTO `lga` VALUES ('021', 'KATSINA', 'Manufanoti', 808);
INSERT INTO `lga` VALUES ('034', 'SOKOTO', 'Kofa atiku', 809);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Onna', 811);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Udium', 812);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Ake', 813);
INSERT INTO `lga` VALUES ('012', 'EDO', 'Uromi', 814);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Oron', 815);
INSERT INTO `lga` VALUES ('003', 'AKWA IBOM', 'Oruk', 816);
INSERT INTO `lga` VALUES ('010', 'DELTA', 'Aniocha', 817);
INSERT INTO `lga` VALUES ('029', 'ONDO', 'Ose', 818);
INSERT INTO `lga` VALUES ('024', 'KWARA', 'Oro', 819);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Yewa', 820);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Yewa South', 821);
INSERT INTO `lga` VALUES ('028', 'OGUN', 'Yewa North', 822);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Opobo/Nkoro', 823);
INSERT INTO `lga` VALUES ('033', 'RIVERS', 'Onelga', 824);
INSERT INTO `lga` VALUES ('008', 'BORNO', 'Maiduguri .M.C', 826);

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `menu_id` bigint(20) NOT NULL,
  `menu_name` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_url` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `parent_id` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sub_menu` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_level` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_order` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_layout_position` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_header` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon_class` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `status` tinyint(1) UNSIGNED ZEROFILL NULL DEFAULT 0,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Administration', '/administration', '', 'true', '0', '1', '', '001', 'fa  fa-user-md mr-20', '2019-09-02 12:18:47', NULL, 1);
INSERT INTO `menu` VALUES (2, 'View', '/view', '', 'true', '0', '0', '', '002', 'fa fa-table mr-20', '2019-09-02 12:18:47', NULL, 1);
INSERT INTO `menu` VALUES (3, 'User List', '/user-list', '1', 'false', '1', '1', '', '', '', '2019-09-02 12:18:47', NULL, 1);
INSERT INTO `menu` VALUES (4, 'Menu List', '/menu-list', '1', 'false', '1', '3', '', '', '', '2019-09-02 12:18:47', NULL, 0);
INSERT INTO `menu` VALUES (5, 'Change Password', '/change-password', '1', 'false', '1', '2', '', '', '', '2019-09-02 12:18:47', NULL, 0);
INSERT INTO `menu` VALUES (6, 'Roles', '/role-list', '1', 'false', '1', '1', '', '', '', '2019-09-02 12:18:47', NULL, 0);
INSERT INTO `menu` VALUES (7, 'Dashboard', '/dashboard', '', 'false', '0', '0', '', '001', 'fa fa-home mr-20', '2019-09-02 12:18:47', NULL, 1);
INSERT INTO `menu` VALUES (8, 'Department', '/department-list', '14', 'false', '1', '2', '', '', '', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (9, 'Position', '/designation-list', '14', 'false', '1', '3', '', '', '', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (10, 'Job Category', '/category-list', '14', 'false', '1', '3', '', '', '', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (11, 'Staff Setup', '/staff-management', '', 'true', '0', '1', '', '003', 'fa fa-users mr-20', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (12, 'Monthly Grows Salary', '/designation-salary-list', '14', 'false', '1', '4', '', '', '', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (13, 'Staff List', '/staff-list', '11', 'false', '1', '1', '', '', '', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (14, 'Department Setup', '/department-management', '', 'true', '0', '0', '', '003', 'fa fa-building mr-20', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (15, 'Attendance Setup', '/attendance-setup', '', 'true', '0', '4', '', '004', 'fa fa-clock-o mr-20', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (16, 'Print Time Sheet', '/print-time-sheet', '15', 'false', '1', '1', '', '', '', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (17, 'Approve Staff', '/approve-staff-list', '11', 'false', '1', '2', '', '', '', '2019-09-26 11:48:32', NULL, 1);
INSERT INTO `menu` VALUES (18, 'Capture Time Sheet', '/capture-time-sheet', '15', 'false', '1', '2', '', '', '', '2019-09-18 11:12:26', NULL, 1);
INSERT INTO `menu` VALUES (20, 'Payroll', '/payroll', '', 'true', '0', '5', '', '005', 'fa fa-file mr-20', '2019-09-26 11:48:32', NULL, 1);
INSERT INTO `menu` VALUES (21, 'Payroll Generation', '/payroll-generation/create', '20', 'false', '1', '1', '', '', '', '2019-09-26 11:48:32', NULL, 1);
INSERT INTO `menu` VALUES (23, 'Departmental Monthly Payroll', '/departmental-payroll-list', '20', 'false', '1', '2', '', '', '', '2019-09-26 11:48:32', NULL, 1);

-- ----------------------------
-- Table structure for menu_category_header
-- ----------------------------
DROP TABLE IF EXISTS `menu_category_header`;
CREATE TABLE `menu_category_header`  (
  `id` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  INDEX `menu_category_header_id_unique`(`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_category_header
-- ----------------------------
INSERT INTO `menu_category_header` VALUES ('001', 'Administration', '2019-09-16 15:45:08', NULL);
INSERT INTO `menu_category_header` VALUES ('002', 'Report', '2019-09-16 15:45:08', NULL);
INSERT INTO `menu_category_header` VALUES ('003', 'HR Managment', '2019-09-18 10:53:52', NULL);
INSERT INTO `menu_category_header` VALUES ('004', 'Time Sheet Managment', '2019-09-19 16:10:33', NULL);
INSERT INTO `menu_category_header` VALUES ('005', 'Payroll management', '2019-09-20 13:01:20', NULL);

-- ----------------------------
-- Table structure for menugroup
-- ----------------------------
DROP TABLE IF EXISTS `menugroup`;
CREATE TABLE `menugroup`  (
  `role_id` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `menu_id` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`role_id`, `menu_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'InnoDB free: 6144 kB; InnoDB free: 6144 kB; InnoDB free: 614' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menugroup
-- ----------------------------
INSERT INTO `menugroup` VALUES ('0', '19');
INSERT INTO `menugroup` VALUES ('0', '21');
INSERT INTO `menugroup` VALUES ('0', '22');
INSERT INTO `menugroup` VALUES ('0', '24');
INSERT INTO `menugroup` VALUES ('1', '1');
INSERT INTO `menugroup` VALUES ('1', '10');
INSERT INTO `menugroup` VALUES ('1', '11');
INSERT INTO `menugroup` VALUES ('1', '12');
INSERT INTO `menugroup` VALUES ('1', '13');
INSERT INTO `menugroup` VALUES ('1', '14');
INSERT INTO `menugroup` VALUES ('1', '15');
INSERT INTO `menugroup` VALUES ('1', '16');
INSERT INTO `menugroup` VALUES ('1', '17');
INSERT INTO `menugroup` VALUES ('1', '18');
INSERT INTO `menugroup` VALUES ('1', '20');
INSERT INTO `menugroup` VALUES ('1', '23');
INSERT INTO `menugroup` VALUES ('1', '3');
INSERT INTO `menugroup` VALUES ('1', '4');
INSERT INTO `menugroup` VALUES ('1', '5');
INSERT INTO `menugroup` VALUES ('1', '6');
INSERT INTO `menugroup` VALUES ('1', '7');
INSERT INTO `menugroup` VALUES ('1', '8');
INSERT INTO `menugroup` VALUES ('1', '9');
INSERT INTO `menugroup` VALUES ('2', '1');
INSERT INTO `menugroup` VALUES ('2', '11');
INSERT INTO `menugroup` VALUES ('2', '12');
INSERT INTO `menugroup` VALUES ('2', '13');
INSERT INTO `menugroup` VALUES ('2', '14');
INSERT INTO `menugroup` VALUES ('2', '15');
INSERT INTO `menugroup` VALUES ('2', '16');
INSERT INTO `menugroup` VALUES ('2', '17');
INSERT INTO `menugroup` VALUES ('2', '3');
INSERT INTO `menugroup` VALUES ('2', '7');
INSERT INTO `menugroup` VALUES ('2', '8');
INSERT INTO `menugroup` VALUES ('2', '9');
INSERT INTO `menugroup` VALUES ('3', '11');
INSERT INTO `menugroup` VALUES ('3', '13');
INSERT INTO `menugroup` VALUES ('3', '15');
INSERT INTO `menugroup` VALUES ('3', '16');
INSERT INTO `menugroup` VALUES ('3', '18');
INSERT INTO `menugroup` VALUES ('3', '19');
INSERT INTO `menugroup` VALUES ('3', '20');
INSERT INTO `menugroup` VALUES ('3', '23');
INSERT INTO `menugroup` VALUES ('3', '5');
INSERT INTO `menugroup` VALUES ('3', '7');
INSERT INTO `menugroup` VALUES ('4', '11');
INSERT INTO `menugroup` VALUES ('4', '7');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(11) NOT NULL,
  `migration` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (0, '2019_09_17_132300_role_user', 3);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_105033_create_i_m_e_i_s_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_21_082319_create_parameters_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_08_21_103008_create_menus_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_09_01_234420_create_roles_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_09_02_000907_role__user', 1);
INSERT INTO `migrations` VALUES (8, '2019_09_02_101602_category__header', 1);
INSERT INTO `migrations` VALUES (11, '2014_10_12_000000_create_users_table', 2);

-- ----------------------------
-- Table structure for parameter
-- ----------------------------
DROP TABLE IF EXISTS `parameter`;
CREATE TABLE `parameter`  (
  `parameter_name` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `parameter_value` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `parameter_description` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of parameter
-- ----------------------------
INSERT INTO `parameter` VALUES ('server', '127.0.0.1', 'Server IP', '2019-09-16 15:45:05', NULL);
INSERT INTO `parameter` VALUES ('staff_image_path', '/dorc/public/user_img', 'Path to where user images are stored', '2019-09-16 15:45:05', NULL);
INSERT INTO `parameter` VALUES ('transfer_protocol', 'http', 'Transfer protocol of the image url', '2019-09-16 15:45:05', NULL);
INSERT INTO `parameter` VALUES ('break_duration', '1', 'Daily break duration', '2019-09-24 14:52:32', NULL);
INSERT INTO `parameter` VALUES ('resumption_time', '7', 'Daily Resumption time', '2019-09-24 14:52:32', NULL);
INSERT INTO `parameter` VALUES ('max_daily_over_time', '2', 'Maximum Overtime from monday to saturday', '2019-09-24 14:52:32', NULL);
INSERT INTO `parameter` VALUES ('max_sunday_over_time', '4', 'Maximum Overtime for sundays in hours', '2019-09-24 14:52:32', NULL);
INSERT INTO `parameter` VALUES ('work_days', '6', 'the default No. of work days in a week', '2019-09-24 14:52:32', NULL);
INSERT INTO `parameter` VALUES ('work_daily_hrs', '8', 'Hours worked in a day', '2019-09-24 14:52:32', NULL);
INSERT INTO `parameter` VALUES ('max_ot', '10', 'Maximum Overtime a Payroll Officer can input', '2019-10-25 16:14:28', NULL);
INSERT INTO `parameter` VALUES ('monthly_work_days', '26', 'Monthly default work days', '2019-10-30 05:15:42', NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for payroll_creation
-- ----------------------------
DROP TABLE IF EXISTS `payroll_creation`;
CREATE TABLE `payroll_creation`  (
  `payroll_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `month_of` date NOT NULL,
  `status` tinyint(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `rollback_at` datetime(0) NULL DEFAULT NULL,
  `rollback_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `department_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `staff_type_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`month_of`, `status`, `department_id`, `staff_type_id`) USING BTREE,
  INDEX `payroll_id`(`payroll_id`) USING BTREE,
  INDEX `department_id_fk2`(`department_id`) USING BTREE,
  INDEX `staff_type_id_fk2`(`staff_type_id`) USING BTREE,
  CONSTRAINT `department_id_fk2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `staff_type_id_fk2` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`staff_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payroll_creation
-- ----------------------------
INSERT INTO `payroll_creation` VALUES ('00043118900361238477', 'b@yahoo.com', '2020-01-28 12:38:47', '2020-01-01', 0, NULL, NULL, 'dep09', 'ST01');

-- ----------------------------
-- Table structure for payroll_staff_record
-- ----------------------------
DROP TABLE IF EXISTS `payroll_staff_record`;
CREATE TABLE `payroll_staff_record`  (
  `payroll_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `staff_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payment_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_description` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` decimal(10, 2) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `default_working_days` int(10) NULL DEFAULT NULL,
  `absence_from_work` int(11) NULL DEFAULT NULL,
  `days_worked` int(11) NULL DEFAULT NULL,
  `payee` decimal(10, 2) NULL DEFAULT NULL COMMENT 'payee for the number of days worked',
  `gross_salary` decimal(10, 2) NULL DEFAULT NULL COMMENT 'Monthly gross salary',
  `overtime_hrs` int(11) NULL DEFAULT NULL,
  `overtime_pay` decimal(10, 2) NULL DEFAULT NULL,
  `month_of` date NOT NULL,
  `cat_group_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(4) NULL DEFAULT NULL,
  `updated_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `advance` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `arrears` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `entry_order` int(11) NULL DEFAULT NULL,
  `absent_deduction` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`staff_id`, `month_of`, `payment_description`) USING BTREE,
  INDEX `staff_id`(`staff_id`) USING BTREE,
  INDEX `payroll_id_fk`(`payroll_id`) USING BTREE,
  CONSTRAINT `fk1_staff_id` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `payroll_id` FOREIGN KEY (`payroll_id`) REFERENCES `payroll_creation` (`payroll_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for position_codes
-- ----------------------------
DROP TABLE IF EXISTS `position_codes`;
CREATE TABLE `position_codes`  (
  `prefix` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `suffix` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `department_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `category_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`prefix`, `suffix`) USING BTREE,
  INDEX `prefix`(`prefix`) USING BTREE,
  INDEX `suffix`(`suffix`) USING BTREE,
  INDEX `department_id_fk`(`department_id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of position_codes
-- ----------------------------
INSERT INTO `position_codes` VALUES (' C', '1000', 'dep01', 'cat05');
INSERT INTO `position_codes` VALUES ('A', '1000', 'dep01', 'cat07');
INSERT INTO `position_codes` VALUES ('A', '2000', 'dep02', 'cat07');
INSERT INTO `position_codes` VALUES ('A', '3000', 'dep03', 'cat07');
INSERT INTO `position_codes` VALUES ('A', '4000', 'dep04', 'cat07');
INSERT INTO `position_codes` VALUES ('A', '5000', 'dep05', 'cat07');
INSERT INTO `position_codes` VALUES ('A', '6000', 'dep06', 'cat07');
INSERT INTO `position_codes` VALUES ('A', '7000', 'dep07', 'cat07');
INSERT INTO `position_codes` VALUES ('A', '8000', 'dep08', 'cat07');
INSERT INTO `position_codes` VALUES ('A', '9000', 'dep09', 'cat07');
INSERT INTO `position_codes` VALUES ('B', '1000', 'dep01', 'cat06');
INSERT INTO `position_codes` VALUES ('B', '2000', 'dep02', 'cat06');
INSERT INTO `position_codes` VALUES ('B', '3000', 'dep03', 'cat06');
INSERT INTO `position_codes` VALUES ('B', '4000', 'dep04', 'cat06');
INSERT INTO `position_codes` VALUES ('B', '5000', 'dep05', 'cat06');
INSERT INTO `position_codes` VALUES ('B', '6000', 'dep06', 'cat06');
INSERT INTO `position_codes` VALUES ('B', '7000', 'dep07', 'cat06');
INSERT INTO `position_codes` VALUES ('B', '8000', 'dep08', 'cat06');
INSERT INTO `position_codes` VALUES ('B', '9000', 'dep09', 'cat06');
INSERT INTO `position_codes` VALUES ('C', '2000', 'dep02', 'cat05');
INSERT INTO `position_codes` VALUES ('C', '3000', 'dep03', 'cat05');
INSERT INTO `position_codes` VALUES ('C', '4000', 'dep04', 'cat05');
INSERT INTO `position_codes` VALUES ('C', '5000', 'dep05', 'cat05');
INSERT INTO `position_codes` VALUES ('C', '6000', 'dep06', 'cat05');
INSERT INTO `position_codes` VALUES ('C', '7000', 'dep07', 'cat05');
INSERT INTO `position_codes` VALUES ('C', '8000', 'dep08', 'cat05');
INSERT INTO `position_codes` VALUES ('C', '9000', 'dep09', 'cat05');
INSERT INTO `position_codes` VALUES ('D', '1000', 'dep01', 'cat04');
INSERT INTO `position_codes` VALUES ('D', '2000', 'dep02', 'cat04');
INSERT INTO `position_codes` VALUES ('D', '3000', 'dep03', 'cat04');
INSERT INTO `position_codes` VALUES ('D', '4000', 'dep04', 'cat04');
INSERT INTO `position_codes` VALUES ('D', '5000', 'dep05', 'cat04');
INSERT INTO `position_codes` VALUES ('D', '6000', 'dep06', 'cat04');
INSERT INTO `position_codes` VALUES ('D', '7000', 'dep07', 'cat04');
INSERT INTO `position_codes` VALUES ('D', '8000', 'dep08', 'cat04');
INSERT INTO `position_codes` VALUES ('D', '9000', 'dep09', 'cat04');
INSERT INTO `position_codes` VALUES ('E', '1000', 'dep01', 'cat03');
INSERT INTO `position_codes` VALUES ('E', '2000', 'dep02', 'cat03');
INSERT INTO `position_codes` VALUES ('E', '3000', 'dep03', 'cat03');
INSERT INTO `position_codes` VALUES ('E', '4000', 'dep04', 'cat03');
INSERT INTO `position_codes` VALUES ('E', '5000', 'dep05', 'cat03');
INSERT INTO `position_codes` VALUES ('E', '6000', 'dep06', 'cat03');
INSERT INTO `position_codes` VALUES ('E', '7000', 'dep07', 'cat03');
INSERT INTO `position_codes` VALUES ('E', '8000', 'dep08', 'cat03');
INSERT INTO `position_codes` VALUES ('E', '9000', 'dep09', 'cat03');
INSERT INTO `position_codes` VALUES ('F', '1', 'dep01', 'cat02');
INSERT INTO `position_codes` VALUES ('F', '2', 'dep02', 'cat02');
INSERT INTO `position_codes` VALUES ('F', '3', 'dep03', 'cat02');
INSERT INTO `position_codes` VALUES ('F', '4', 'dep04', 'cat02');
INSERT INTO `position_codes` VALUES ('F', '5', 'dep05', 'cat02');
INSERT INTO `position_codes` VALUES ('F', '6', 'dep06', 'cat02');
INSERT INTO `position_codes` VALUES ('F', '7', 'dep07', 'cat02');
INSERT INTO `position_codes` VALUES ('F', '8', 'dep08', 'cat02');
INSERT INTO `position_codes` VALUES ('F', '9', 'dep09', 'cat02');
INSERT INTO `position_codes` VALUES ('G', '1', 'dep01', 'cat01');

-- ----------------------------
-- Table structure for reporting_to
-- ----------------------------
DROP TABLE IF EXISTS `reporting_to`;
CREATE TABLE `reporting_to`  (
  `department_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `report_to_cat_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reporting_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`department_id`, `category_id`, `report_to_cat_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reporting_to
-- ----------------------------
INSERT INTO `reporting_to` VALUES ('dep03', 'cat05', 'cat04', 'D3001', NULL, NULL);
INSERT INTO `reporting_to` VALUES ('dep03', 'cat06', '', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `role_id` int(11) NOT NULL,
  `user_id` int(20) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 23, NULL, NULL);
INSERT INTO `role_user` VALUES (2, 25, NULL, NULL);
INSERT INTO `role_user` VALUES (3, 26, NULL, NULL);
INSERT INTO `role_user` VALUES (1, 27, NULL, NULL);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL,
  `role_name` varchar(199) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role_enable` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Developer Mode', 1, '2019-09-16 15:45:06', NULL);
INSERT INTO `roles` VALUES (2, 'Admin', 1, '2019-09-16 15:45:06', NULL);
INSERT INTO `roles` VALUES (3, 'Payroll Officer', 1, '2019-09-16 15:45:06', NULL);

-- ----------------------------
-- Table structure for salary_description
-- ----------------------------
DROP TABLE IF EXISTS `salary_description`;
CREATE TABLE `salary_description`  (
  `salary_desc_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `item_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`salary_desc_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of salary_description
-- ----------------------------
INSERT INTO `salary_description` VALUES ('sd01', 'Monthly Gross Rate', NULL, NULL);
INSERT INTO `salary_description` VALUES ('sd02', 'Additional Pay', NULL, NULL);
INSERT INTO `salary_description` VALUES ('sd03', 'Housing', NULL, NULL);

-- ----------------------------
-- Table structure for section
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section`  (
  `section_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `section_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `department_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`section_id`) USING BTREE,
  INDEX `department_id`(`department_id`) USING BTREE,
  CONSTRAINT `department_id_kf` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO `section` VALUES ('012931', 'SAP', 'dep09', 'ese.kelvin@dangoteprojects.com', '2019-10-16 16:14:46', '2019-10-16 16:14:48');
INSERT INTO `section` VALUES ('212333', 'FIELDS', 'dep03', 'ese.kelvin@dangoteprojects.com', '2019-10-16 16:15:21', NULL);
INSERT INTO `section` VALUES ('3231122', 'Software', 'dep09', 'ese.kelvin@dangoteprojects.com', '2019-10-16 16:15:21', NULL);
INSERT INTO `section` VALUES ('3231123', 'Support', 'dep09', 'ese.kelvin@dangoteprojects.com', '2019-10-16 16:15:21', NULL);
INSERT INTO `section` VALUES ('391222', 'E7 Security Post', 'dep07', 'ese.kelvin@dangoteprojects.com', '2019-10-16 16:15:21', NULL);

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `staff_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `first_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `other_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `marital_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `lgaid` int(11) NULL DEFAULT NULL,
  `mobile_phone` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `bin_code` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `account_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `account_number` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bvn` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `designation_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  `staff_type_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `category_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `engagement_date` date NULL DEFAULT NULL,
  `reporting_to` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`staff_id`) USING BTREE,
  INDEX `staff_id`(`staff_id`) USING BTREE,
  INDEX `bin_code`(`bin_code`) USING BTREE,
  INDEX `lgaid`(`lgaid`) USING BTREE,
  INDEX `staff_type_id`(`staff_type_id`) USING BTREE,
  INDEX `section_id`(`section_id`) USING BTREE,
  INDEX `designation_id`(`designation_id`) USING BTREE,
  INDEX `category_id_NW`(`category_id`) USING BTREE,
  CONSTRAINT `bin_code` FOREIGN KEY (`bin_code`) REFERENCES `bank_bincodes` (`bin_code`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `category_id_NW` FOREIGN KEY (`category_id`) REFERENCES `job_category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `designation_id` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `lgaid` FOREIGN KEY (`lgaid`) REFERENCES `lga` (`Lgaid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `section_id` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `staff_type_id` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`staff_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('A2001', 'YAKUBU', 'MUSA', 'ZAKARI', NULL, NULL, 'Male', NULL, NULL, '09029788222', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:09', '032', 'YAKUBU ZAKARI MUSA', '0123185146', '', '152', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A2002', 'KHALID', 'ABDULLAHI', 'USMAN', NULL, NULL, 'Male', NULL, NULL, '08083800178', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:09', '214', 'KHALID USMAN ABDULLAHI', '5096973019', '22386317204', '152', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A2003', 'ABDULLAHI,', 'MUHAMMED', 'MUHAMMED', NULL, NULL, 'Male', NULL, NULL, '08028046595', 'muhammedabdullahimuhammed@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:09', '058', 'ABDULLAHI, MUHAMMED MUHAMMED', '0451630176', '22505969105', '152', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3001', 'USMAN', 'SANUSI ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'USMAN  SANUSI ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3002', 'ZAINAB', 'ISA', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'ZAINAB  ISA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3003', 'SANI', 'UZAIRU ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'SANI  UZAIRU ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3004', 'INDATU', 'HABU', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'INDATU  HABU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3005', 'MARYAM ', 'ROGO', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'MARYAM   ROGO', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3006', 'HALIMA', 'MUSA', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'HALIMA  MUSA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3007', 'MAIMUNA', 'ADAMU', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'MAIMUNA  ADAMU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3008', 'HUDU', 'USMAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'HUDU  USMAN', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3009', 'HAJARA', 'MOHAMMED', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'HAJARA  MOHAMMED', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3010', 'HAUWA', 'SULE', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'HAUWA  SULE', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3011', 'ZIAULHAQ ', 'MOHAMMED ', 'SHEHU', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'ZIAULHAQ  SHEHU MOHAMMED ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3012', 'ADAMU', 'KHALIFA ', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'ADAMU  KHALIFA ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3013', 'ABDULMIMIN ', 'BULALA', 'YAHUZA', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'ABDULMIMIN  YAHUZA BULALA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3014', 'MARYAM', 'UMAR ', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'MARYAM  UMAR ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3015', 'ZUWAIRA ', 'HASSAN', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'ZUWAIRA   HASSAN', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3016', 'AISHA', 'USMAN', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'AISHA  USMAN', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3017', 'HAUWA ', 'IDRIS', 'JEGA', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'HAUWA  JEGA IDRIS', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3018', 'ILIYASU', 'SHARABILU ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'ILIYASU  SHARABILU ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3019', 'ADUNIYA', 'ATOBI ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'ADUNIYA  ATOBI ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3020', 'GODIYA', 'ELIKANA', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'GODIYA  ELIKANA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3021', 'AMINA', 'ADAMU', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'AMINA  ADAMU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3022', 'KHADIJA ', 'YUNUSA', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'KHADIJA   YUNUSA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3023', 'AISHA', 'YAKUBU', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'AISHA  YAKUBU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3024', 'HALIMA ', 'YAKUBU', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'HALIMA   YAKUBU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3025', 'MARYAM', 'MUSA', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'MARYAM  MUSA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3026', 'MOHAMMED', 'SHUAIBU ', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'MOHAMMED  SHUAIBU ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3027', 'PATU', 'YAKUBU', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'PATU  YAKUBU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3028', 'ABUBAKAR', 'NUHU  ', '.I.', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'ABUBAKAR .I. NUHU  ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3029', 'ASO', 'ABDULAHI ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'ASO  ABDULAHI ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3030', 'HAMZA', 'JABIRU ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'HAMZA  JABIRU ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3031', 'GAMBO', 'USMAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'GAMBO  USMAN', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3032', 'HASSAN', 'UBANDOMA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'HASSAN  UBANDOMA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3033', 'WAZIRI', 'MOHAMMED  ', 'KASSIM', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'WAZIRI KASSIM MOHAMMED  ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3034', 'MOHAMMED', 'BABA ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'MOHAMMED  BABA ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3035', 'BABAN', 'UMAR ', 'KWATA', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'BABAN KWATA UMAR ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3036', 'MOHAMMED', 'UMAR ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'MOHAMMED  UMAR ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3037', 'MARYAM', 'LAGU', 'ALHAJI', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'MARYAM ALHAJI LAGU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3038', 'GODWIN', 'VIGH', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'GODWIN  VIGH', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3039', 'ISKILU', 'SULEIMAN ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'ISKILU  SULEIMAN ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3040', 'ABUBAKAR', 'ABDULKARIM ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'ABUBAKAR  ABDULKARIM ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3041', 'ISA', 'AHMED ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:14', NULL, 'ISA  AHMED ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3042', 'MUSA', 'YAKUBU ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'MUSA  YAKUBU ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3043', 'AKWE', 'IBRAHIM ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'AKWE  IBRAHIM ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3044', 'ISIYAKA', 'ABDULLAHI ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'ISIYAKA  ABDULLAHI ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3045', 'ALI', 'HASSAN ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'ALI  HASSAN ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3046', 'IBRAHIM', 'ALHASSAN ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'IBRAHIM  ALHASSAN ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3047', 'SAMSON', 'DAVID ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'SAMSON  DAVID ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3048', 'HASHIMU', 'ABDULLAHI ', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'HASHIMU  ABDULLAHI ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3049', 'DANTALA', 'SADAM ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'DANTALA  SADAM ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3050', 'DANTANI', 'KASIMU ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'DANTANI  KASIMU ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3051', 'JOHN', 'EZEKIEL ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'JOHN  EZEKIEL ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3052', 'SHALELE', 'ABUBAKAR .S. ', '.S. ', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'SHALELE .S.  ABUBAKAR .S. ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3053', 'MURTALA', 'SABO ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'MURTALA  SABO ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3054', 'USMAN', 'SHAMSU ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'USMAN  SHAMSU ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3055', 'IBRAHIM', 'ABUBAKAR ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:15', NULL, 'IBRAHIM  ABUBAKAR ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3056', 'HASSAN', 'MUSTAPHA ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'HASSAN  MUSTAPHA ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3057', 'OBAM', 'DAVID ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'OBAM  DAVID ', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3058', 'ALI', 'HASSAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'ALI  HASSAN', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3059', 'DANTALA', 'ABDULGANIYU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'DANTALA  ABDULGANIYU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3060', 'ABUBAKAR', 'ABDULRAHAM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'ABUBAKAR  ABDULRAHAM', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3061', 'HALADU', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'HALADU  IBRAHIM', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3062', 'USMAN', 'AZUKA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'USMAN  AZUKA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3063', 'MUSA', 'BASHIR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'MUSA  BASHIR', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3064', 'SULEIMAN', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'SULEIMAN  ABUBAKAR', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3065', 'TARBO', 'TERPASE', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'TARBO  TERPASE', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3066', 'AHMED', 'GADDAFI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'AHMED  GADDAFI', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3067', 'YAHAYA', 'DAHIRU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'YAHAYA  DAHIRU', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3068', 'MUSA', 'HARUNA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'MUSA  HARUNA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3069', 'TANKO', 'YAHAYA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'TANKO  YAHAYA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A3070', 'ADAMU', 'MAMUDA', '.B.', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:16', NULL, 'ADAMU .B. MAMUDA', '', '', '172', 1, 'ST02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6001', 'NANDI', 'JOB', 'DAAN', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '032', 'NANDI DAAN JOB', '0035425426', '', '146', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6002', 'ESTHER', 'DANJUMA', 'CHAGGA', NULL, NULL, 'Female', NULL, NULL, '08067395670', 'estherdanjuma@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:05', '070', 'ESTHER CHAGGA DANJUMA', '6235397594', '22287182035', '146', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6003', 'MOHAMMED', 'ILIYASU', 'NASIRU', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '063', 'MOHAMMED NASIRU ILIYASU', '0011360451', '', '146', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6004', 'ADAMU', 'SHUAIBU', 'GALADIMA', NULL, NULL, 'Male', NULL, NULL, '07014926119', 'shuaibuadamugaladima61@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:05', '214', 'ADAMU GALADIMA SHUAIBU', '4995607012', '22456838437', '146', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6005', 'UMAR', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '08122823769', 'NIL', 'b@yahoo.com', '2019-12-07 16:29:05', '032', 'UMAR  IBRAHIM', '0093143896', '22485781614', '146', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6006', 'PATRICK', 'TINA', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '063', 'PATRICK  TINA', '0100970620', '', '146', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6007', 'SARATU', 'ABDULLAHI', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'SARATU  ABDULLAHI', '0107347269', '', '149', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6008', 'ZAINAB', 'UMAR', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'ZAINAB  UMAR', '0104768326', '', '149', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6009', 'ADAMA', 'USMAN', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'ADAMA  USMAN', '0103624746', '', '149', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6010', 'ISA', 'AHMED', '', NULL, NULL, 'Male', NULL, NULL, '09017162765', 'NIL', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'ISA  AHMED', '0118858042', '22531802674', '150', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6011', 'RAHMATU', 'HASSAN', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'RAHMATU  HASSAN', '0091584686', '', '149', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6012', 'UMAR', 'USMAN,', '', NULL, NULL, 'Male', NULL, NULL, '08124784291', 'umarusmantunga@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:08', '058', 'UMAR  USMAN,', '0162599702', '22374460686', '150', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6013', 'THADDEUS', 'AYAAKAA', '', NULL, NULL, 'Male', NULL, NULL, '08025704988', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'THADDEUS  AYAAKAA', '0065958008', '22444439794', '150', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6014', 'ISMAILA', 'ISA', '', NULL, NULL, 'Male', NULL, NULL, '07089363198', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:09', '032', 'ISMAILA  ISA', '0121309054', '22489028346', '150', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6015', 'DAUDA', 'MUJAHID', '', NULL, NULL, 'Male', NULL, NULL, '07010464883', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:09', '032', 'DAUDA  MUJAHID', '0121327913', '22535891111', '150', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A6016', 'PAUL', 'FRIDAY', '', NULL, NULL, 'Male', NULL, NULL, '07012320108', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:09', '032', 'PAUL  FRIDAY', '0121829091', '22536384900', '150', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7001', 'YAHO', 'HAMZA', 'ABDULLAHI', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '221', 'YAHO ABDULLAHI HAMZA', '0024942376', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7002', 'JINJIMI', 'ABDULLAHI', 'ALIYU', NULL, NULL, 'Male', NULL, NULL, '09077099148', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:05', '063', 'JINJIMI ALIYU ABDULLAHI', '0079574962', '22394085119', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7003', 'ABDULMUMIN', 'HASSAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'ABDULMUMIN  HASSAN', '0102447212', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7004', 'ADAMU', 'MOHAMMADU', 'T', NULL, NULL, 'Male', NULL, NULL, '09020430178', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'ADAMU T MOHAMMADU', '0102031651', '2.25052E+11', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7005', 'MOHAMMED', 'AUWAL', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:06', '076', 'MOHAMMED  AUWAL', '3051184780', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7006', 'ZAKARI', 'DALHATU', '', NULL, NULL, 'Male', NULL, NULL, '08084334744', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'ZAKARI  DALHATU', '0040657704', '22331615212', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7007', 'BAKA', 'SARKIN-', 'DANLAMI', NULL, NULL, 'Male', NULL, NULL, '07087359300', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'BAKA DANLAMI SARKIN-', '0047030173', '22337178823', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7008', 'IORFA', 'AKURAGAA', '', NULL, NULL, 'Male', NULL, NULL, '09027849265', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'IORFA  AKURAGAA', '0102047076', '22504168000', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7009', 'ISA', 'SHUAIBU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'ISA  SHUAIBU', '0101159420', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7010', 'ISYAKA', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '07088685469', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '214', 'ISYAKA  ABUBAKAR', '5157893012', '22494741740', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7011', 'AKURAGA', 'JACOB', '', NULL, NULL, 'Male', NULL, NULL, '07018789792', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'AKURAGA  JACOB', '0102380964', '22500332649', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7012', 'MUHAMMED', 'DAHIRU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:06', '214', 'MUHAMMED  DAHIRU', '5329361011', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7013', 'KUMAGA', 'ABEDA', 'SAMUEL', NULL, NULL, 'Male', NULL, NULL, '08129215784', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'KUMAGA SAMUEL ABEDA', '0102673400', '22453216010', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7014', 'SOJA', 'AGYEMA', '', NULL, NULL, 'Male', NULL, NULL, '07080721832', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '032', 'SOJA  AGYEMA', '0101235586', '22477482930', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7015', 'SULEIMAN', 'UMAR', 'UMAR', NULL, NULL, 'Male', NULL, NULL, '08088175611', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:06', '214', 'SULEIMAN UMAR UMAR', '4791371016', '22454663189', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7016', 'UMARU', 'ABDULLAHI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:06', '214', 'UMARU  ABDULLAHI', '5335669015', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7017', 'ZAKARI', 'USMAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:06', '214', 'ZAKARI  USMAN', '5326361010', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7018', 'ZUBAIRU', 'SHUAIBU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'ZUBAIRU  SHUAIBU', '0101213344', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7019', 'MOHAMMED', 'MOHAMMED', 'AHMED', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '050', 'MOHAMMED AHMED MOHAMMED', '4223069968', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7020', 'BABA', 'MUHAMMED ', 'ADAMU', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '063', 'BABA ADAMU MUHAMMED ', '0012418108', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7021', 'SANUSI', 'MOHAMMED ', '', NULL, NULL, 'Male', NULL, NULL, '08120898428', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:07', '044', 'SANUSI  MOHAMMED ', '0739243440', '22447744398', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7022', 'MURTALA', 'HASSAN', '', NULL, NULL, 'Male', NULL, NULL, '09071729134', 'NIL', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'MURTALA  HASSAN', '0084457694', '22475792644', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7023', 'NDAGI', 'SULE', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '214', 'NDAGI  SULE', '5163031011', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7024', 'UMAR', 'RABIU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'UMAR  RABIU', '0101454895', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7025', 'MUSA', 'SALE', '', NULL, NULL, 'Male', NULL, NULL, '09076398753', 'NIL', 'b@yahoo.com', '2019-12-07 16:29:07', '063', 'MUSA  SALE', '0036008383', '22388131079', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7026', 'BAWA', 'MOHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '214', 'BAWA  MOHAMMED', '5281944019', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7027', 'TANKO', 'ALIYU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '214', 'TANKO  ALIYU', '5382231010', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7028', 'MUHAMMAD', 'ABDULLAHI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'MUHAMMAD  ABDULLAHI', '0106195212', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7029', 'YAKUBU', 'UMAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'YAKUBU  UMAR', '0100032757', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7030', 'IBRAHIM', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'IBRAHIM  ABUBAKAR', '0102154903', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7031', 'AUDU', 'KORAU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '214', 'AUDU  KORAU', '4790403017', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7032', 'ARMAYAU', 'USMAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'ARMAYAU  USMAN', '0101308091', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7033', 'D.', 'ABUBAKAR', 'SULEIMAN', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'D. SULEIMAN ABUBAKAR', '0037807264', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7034', 'AMINA', 'ALHAJI', 'L', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'AMINA L ALHAJI', '0102542698', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7035', 'BASIRU', 'MOHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '08088635021', 'NIL', 'b@yahoo.com', '2019-12-07 16:29:07', '215', 'BASIRU  MOHAMMED', '0021202883', '22290548868', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7036', 'KAMALLUDDEEN', 'ALI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '032', 'KAMALLUDDEEN  ALI', '0116714977', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7037', 'ABDULLAHI', 'NAFIU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:07', '057', 'ABDULLAHI  NAFIU', '2119964390', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7038', 'ABDULLAHI', 'MALL MIKAILU', 'RIDWAN', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'ABDULLAHI RIDWAN MALL MIKAILU', '0035421318', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7039', 'DANKISHIYA', 'USMAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'DANKISHIYA  USMAN', '0101556988', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7040', 'IBRAHIM', 'ABUBAKAR', 'MUHAMMAD', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '058', 'IBRAHIM MUHAMMAD ABUBAKAR', '0432590161', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7041', 'NUHU', 'ZAKARI', 'ATTAJIRI', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '058', 'NUHU ATTAJIRI ZAKARI', '0431850426', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7042', 'MUSA', 'ABDULLAHI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'MUSA  ABDULLAHI', '0116749117', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7043', 'UMAR', 'ADAMU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'UMAR  ADAMU', '0116936184', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7044', 'IORLUMUN', 'AEL', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'IORLUMUN  AEL', '0117265593', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7045', 'HASSAN', 'ABDULLAHI', '', NULL, NULL, 'Male', NULL, NULL, '07012080805', 'hassanabdullahiawe@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'HASSAN  ABDULLAHI', '0040246478', '22476167539', '151', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7046', 'MOHAMMED', 'ISHAKA ', 'L', NULL, NULL, 'Male', NULL, NULL, '09022536308', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'MOHAMMED L ISHAKA ', '0099252035', '22499583509', '151', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7047', 'HARUNA', 'MUSTAPHA,', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '058', 'HARUNA  MUSTAPHA,', '0234536396', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7048', 'DANIEL', 'DOOM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'DANIEL  DOOM', '0107952805', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7049', 'IBRAHIM', 'ADAMU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '214', 'IBRAHIM  ADAMU', '4931488019', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7050', 'MARYAM', 'MAHAMMADU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '032', 'MARYAM  MAHAMMADU', '0106349314', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7051', 'DANMAMA', 'MOHAMMED', 'ADAMUD', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:08', '214', 'DANMAMA ADAMUD MOHAMMED', '4802789018', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7052', 'SULEIMAN', 'YUNUSA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'SULEIMAN  YUNUSA', '0084837221', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7053', 'AHMADU', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'AHMADU  IBRAHIM', '0101469237', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7054', 'BALA', 'YUSUF ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'BALA  YUSUF ', '0116791446', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7055', 'KASIMU', 'ALKASIMU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '214', 'KASIMU  ALKASIMU', '6348709011', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7056', 'CHINDO', 'GAMBO', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'CHINDO  GAMBO', '0121598317', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7057', 'SALEH', 'MOHAMMED ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '214', 'SALEH  MOHAMMED ', '0428124019', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7058', 'TANKO', 'MOHAMMED ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'TANKO  MOHAMMED ', '0070664347', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7059', 'ABUBAKAR', 'MOHAMMED ', 'T', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'ABUBAKAR T MOHAMMED ', '0123759794', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7060', 'IBRAHIM', 'ABDULLAHI', 'U', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'IBRAHIM U ABDULLAHI', '0035427585', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7061', 'SHAYA', 'AHMED ', 'U', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'SHAYA U AHMED ', '0035429431', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7062', 'JAFARU', 'KASIMU ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '063', 'JAFARU  KASIMU ', '0096359379', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('A7063', 'UMAR', 'BALA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'UMAR  BALA', '0124075882', '', '163', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B1001', 'HARUNA', 'SHURAH', 'ZAKARI', '', '0000-00-00', 'Male', '', NULL, '', NULL, 'c@yahoo.com', '2019-12-07 16:29:12', '063', 'HARUNA ZAKARI SHURAH', '0038782519', '', '165', 1, 'ST01', NULL, '2019-12-19 15:06:26', 'cat06', NULL, '2019-12-19', NULL);
INSERT INTO `staff` VALUES ('B2001', 'LUKMAN', 'RAYYANU ', '', NULL, NULL, 'Male', NULL, NULL, '09072726101', 'rayyanlukman@gmail.com', 'b@yahoo.com', '2019-12-07 16:28:59', '032', 'LUKMAN  RAYYANU ', '67053732', '22362893681', '93', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2002', 'BULUS', 'AZENU', 'DANLAMI', NULL, NULL, 'Male', NULL, NULL, '08024502363', 'azenudanlami@gmail.com', 'b@yahoo.com', '2019-12-07 16:28:59', '070', 'BULUS DANLAMI AZENU', '6239523474', '22361060475', '94', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2003', 'SHEHU', 'YERO', '.M', NULL, NULL, 'Male', NULL, NULL, '09019809551', 'shehumusayero@yahoo.com', 'b@yahoo.com', '2019-12-07 16:29:00', '032', 'SHEHU .M YERO', '0042038868', '22201143393', '152', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2004', 'BABA', 'HUSSEINI', '', NULL, NULL, 'Male', NULL, NULL, '08087496822', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:00', '030', 'BABA  HUSSEINI', '1500586475', '', '148', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2005', 'FRANCIS', 'WATAKIRI', '', NULL, NULL, 'Male', NULL, NULL, '07088345592', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:01', '033', 'FRANCIS  WATAKIRI', '2125055996', '22411907110', '148', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2006', 'MIANA', 'YUSU', '', NULL, NULL, 'Male', NULL, NULL, '08088807318', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:01', '030', 'MIANA  YUSU', '1500853489', '', '148', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2007', 'KATTADA', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '07089770899', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:01', '214', 'KATTADA  ABUBAKAR', '5244033011', '22502783153', '114', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2008', 'AONDOTSEA', 'JOSHUA', 'MBAIORGA', NULL, NULL, 'Male', NULL, NULL, '09070657361', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:01', '044', 'AONDOTSEA MBAIORGA JOSHUA', '0724333705', '22321879248', '148', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2009', 'MUZAMMILU', 'ZUNAIDU', '', NULL, NULL, 'Male', NULL, NULL, '07088959529', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:01', '033', 'MUZAMMILU  ZUNAIDU', '2096865543', '22432763450', '152', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2010', 'SALIHU', 'BALA', '', NULL, NULL, 'Male', NULL, NULL, '08087197552', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:01', '032', 'SALIHU  BALA', '0100940977', '22447192519', '114', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2011', 'ILIYASU', 'MUHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '08087070960', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '011', 'ILIYASU  MUHAMMED', '3077557761', '22292603857', '124', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2012', 'UMARU', 'MUSTAPHA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'UMARU  MUSTAPHA', '0041852386', '', '124', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2013', 'HALILU', 'YAHAYA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'HALILU  YAHAYA', '0101305557', '', '114', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2014', 'FRIDAY', 'MOMOH', 'O', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '011', 'FRIDAY O MOMOH', '3090917959', '', '171', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2015', 'ALIYU', 'MOHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '032', 'ALIYU  MOHAMMED', '0101255731', '', '171', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2016', 'MUHAMMAD', 'ZUBAIRU', 'BELLO', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '214', 'MUHAMMAD BELLO ZUBAIRU', '5307840017', '', '147', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2017', 'BASHIR', 'SOFIYANU', '', NULL, NULL, 'Male', NULL, NULL, '09026638794', 'bashirsafiyanu@yahoo.com', 'b@yahoo.com', '2019-12-07 16:29:05', '214', 'BASHIR  SOFIYANU', '2775912019', '22302289312', '148', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2018', 'ABDULRAHIM', 'ABUBAKAR,', '', NULL, NULL, 'Male', NULL, NULL, '08020306663', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:09', '058', 'ABDULRAHIM  ABUBAKAR,', '0223314099', '22321598543', '171', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2019', 'UMAR', 'TARAZIU', 'TUNGA', NULL, NULL, 'Male', NULL, NULL, '08120947370', 'umartaraziu2020@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:09', '214', 'UMAR TUNGA TARAZIU', '5056521010', '22412107762', '171', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2020', 'GAMBO', 'ADAMU', 'ATUBA', NULL, NULL, 'Male', NULL, NULL, '07016508388', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '214', 'GAMBO ATUBA ADAMU', '4953833019', '', '155', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2021', 'ABDULHAMID', 'AHMAD', '', NULL, NULL, 'Male', NULL, NULL, '07088558188', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '058', 'ABDULHAMID  AHMAD', '0250138538', '22443014121', '158', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2022', 'HARUNA', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '08025466713', 'harunaabubakar1988@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:12', '214', 'HARUNA  ABUBAKAR', '5199797019', '22471305169', '171', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2023', 'NASIRU', 'MURWANU', 'MUHAMMED', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '214', 'NASIRU MUHAMMED MURWANU', '5296548017', '', '161', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2024', 'HALIDU', 'DAUDA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '063', 'HALIDU  DAUDA', '0041831738', '', '162', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2025', 'MUGU', 'SHINKUT ', 'JONATHAN', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '011', 'MUGU JONATHAN SHINKUT ', '3023031011', '', '161', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2026', 'USMAN', 'JIBRIN ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'USMAN  JIBRIN ', '0044013409', '', '161', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2027', 'USMAN', 'DANLAMI', 'W', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'USMAN W DANLAMI', '0063265580', '', '162', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2028', 'JOSEPH', 'AMINU ', 'ARIKO', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '058', 'JOSEPH ARIKO AMINU ', '0231161320', '', '166', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2029', 'MOHAMMED', 'SHEHU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', NULL, 'MOHAMMED  SHEHU', '', '', '166', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2030', 'LABA', 'MOSES ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', NULL, 'LABA  MOSES ', '', '', '167', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2031', 'FRIDAY', 'PETER', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', NULL, 'FRIDAY  PETER', '', '', '168', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2032', 'JIBRIN', 'SULEIMAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', '050', 'JIBRIN  SULEIMAN', '0351217039', '', '169', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2033', 'CLEMENT', 'DOOGA', 'AONDOWASE', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'CLEMENT AONDOWASE DOOGA', '', '', '171', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2034', 'KAMALUDEEN', 'MUHAMMED', 'A', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'KAMALUDEEN A MUHAMMED', '', '', '171', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B2035', 'ISA', 'AHMAD', 'SAIDU', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'ISA SAIDU AHMAD', '', '', '171', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3001', 'MUSA', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:00', '032', 'MUSA  ABUBAKAR', '0101237212', '', '106', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3002', 'ABDULAZIZ', 'ABDULLAHIM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:00', '032', 'ABDULAZIZ  ABDULLAHIM', '0101223389', '', '107', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3003', 'BAKO', 'MAIDAWA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:00', '063', 'BAKO  MAIDAWA', '0012887047', '', '109', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3004', 'AMINU', 'SIYAKA, ', '', NULL, NULL, 'Male', NULL, NULL, '08062940557', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:00', '058', 'AMINU  SIYAKA, ', '0127198061', '22265670320', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3005', 'ABDULKARIM', 'OGOSHI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:00', '032', 'ABDULKARIM  OGOSHI', '0101218349', '', '106', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3006', 'AUTA', 'ALI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '032', 'AUTA  ALI', '0101396557', '', '121', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3007', 'IBRAHIM', 'BABAARI', 'B', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '032', 'IBRAHIM B BABAARI', '0101609004', '', '106', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3008', 'ABDULLAHI', 'JIBRIN', 'YIRGAU', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '011', 'ABDULLAHI YIRGAU JIBRIN', '3077673777', '', '107', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3009', 'DANLAMI', 'SAMUEL ', 'YUSUFU', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '011', 'DANLAMI YUSUFU SAMUEL ', '3073009578', '', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3010', 'ADAMU', 'SULEIMAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '032', 'ADAMU  SULEIMAN', '0101216802', '', '124', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3011', 'ALKASIM', 'HUSSAINI,', 'OTAKI', NULL, NULL, 'Male', NULL, NULL, '08022518553', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:01', '058', 'ALKASIM OTAKI HUSSAINI,', '0240364712', '22429554403', '124', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3012', 'TERDOO', 'KATSU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '032', 'TERDOO  KATSU', '0101227325', '', '106', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3013', 'JAMIL', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '082', 'JAMIL  ABUBAKAR', '6010489431', '', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3014', 'AYUBA', 'UMAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '214', 'AYUBA  UMAR', '5257030018', '', '124', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3015', 'MIKAILA', 'MAGAYAKI', 'PAKACHI', NULL, NULL, 'Male', NULL, NULL, '07016819500', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '215', 'MIKAILA PAKACHI MAGAYAKI', '0036239782', '22487452361', '124', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3016', 'ALI', 'ABDULLAHI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'ALI  ABDULLAHI', '0101227961', '', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3017', 'DANLAMI', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '214', 'DANLAMI  IBRAHIM', '5168403011', '', '109', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3018', 'SADANU', 'MUHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'SADANU  MUHAMMED', '0102345428', '', '121', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3019', 'EMMANUEL', 'MICHEAL', 'J', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'EMMANUEL J MICHEAL', '0120065227', '', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3020', 'MASALLAH', 'ADAMU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'MASALLAH  ADAMU', '0120351238', '', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3021', 'ISAH', 'AUDU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'ISAH  AUDU', '0117969592', '', '123', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3022', 'MUHAMMED', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '08034522054', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'MUHAMMED  ABUBAKAR', '0037865815', '22405058923', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3023', 'SALE', 'ALI', '', NULL, NULL, 'Male', NULL, NULL, '09017699125', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'SALE  ALI', '0123280807', '22170106562', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3024', 'SHIAIBU', 'YUSUF', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'SHIAIBU  YUSUF', '0102548047', '', '125', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3025', 'MUSA', 'ILIYASU', '', NULL, NULL, 'Male', NULL, NULL, '08029152459', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'MUSA  ILIYASU', '0106593306', '22501455138', '107', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3026', 'ALI', 'ABDULRAZAK', '', NULL, NULL, 'Male', NULL, NULL, '07088390747', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'ALI  ABDULRAZAK', '0118126259', '22530720984', '107', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3027', 'OKPEYA', 'MUSA', 'HARUNA', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '063', 'OKPEYA HARUNA MUSA', '0090209317', '', '107', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3028', 'UMAR', 'IBRAHIM', 'MOHAMMED', NULL, NULL, 'Male', NULL, NULL, '07017180502', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '214', 'UMAR MOHAMMED IBRAHIM', '4792371013', '22446497899', '126', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3029', 'SULEIMAN', 'SALLAU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'SULEIMAN  SALLAU', '0101605147', '', '131', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3030', 'AMINU', 'SURAJO ', '', NULL, NULL, 'Male', NULL, NULL, '09016305101', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'AMINU  SURAJO ', '0120278207', '22533773901', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3031', 'HALLIRU', 'MOHAMMED', 'SULEIMAN', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '214', 'HALLIRU SULEIMAN MOHAMMED', '5081357013', '', '107', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3032', 'JAFARU', 'MUHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '09016713596', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'JAFARU  MUHAMMED', '0101286100', '22499306339', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3033', 'YAHAYA', 'OSAMA', 'NUHU', NULL, NULL, 'Male', NULL, NULL, '08087668924', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '044', 'YAHAYA NUHU OSAMA', '0818261796', '22530908621', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3034', 'DALHATU', 'ABDULLAHI', '', NULL, NULL, 'Male', NULL, NULL, '08035596485', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:03', '032', 'DALHATU  ABDULLAHI', '0041590006', '22517923720', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3035', 'SANI', 'TANKO', 'USMAN', NULL, NULL, 'Male', NULL, NULL, '08069168692', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:03', '221', 'SANI USMAN TANKO', '0024659469', '22394614915', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3036', 'ABUBAKAR', 'IDRIS', 'BUHARI', NULL, NULL, 'Male', NULL, NULL, '08024222944', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:03', '032', 'ABUBAKAR BUHARI IDRIS', '0120284440', '22533641408', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3037', 'UBA', 'HARUNA', 'IBRAHIM', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:03', '063', 'UBA IBRAHIM HARUNA', '0051384949', '', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3038', 'AHMED', 'TANIMU', '', NULL, NULL, 'Male', NULL, NULL, '08035596485', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:03', '050', 'AHMED  TANIMU', '0261196510', '22517923720', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3039', 'ABDULLAHI', 'SHUAIBU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:03', '032', 'ABDULLAHI  SHUAIBU', '0101226641', '', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3040', 'JOSEPH', 'CHRISTOPHER', '', NULL, NULL, 'Male', NULL, NULL, '09075930859', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:03', '044', 'JOSEPH  CHRISTOPHER', '0823091126', '22534095778', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3041', 'AMIN', 'SALE,', 'MOHAMMED', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:03', '058', 'AMIN MOHAMMED SALE,', '0227975159', '', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3042', 'MOHAMMED', 'IBRAHIM', 'WULLY', NULL, NULL, 'Male', NULL, NULL, '09014518485', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:03', '215', 'MOHAMMED WULLY IBRAHIM', '0027110359', '22421889691', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3043', 'BAKO', 'USENI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:03', '033', 'BAKO  USENI', '2071770770', '', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3044', 'DAIYYBU', 'USMAN', 'ABUBAKAR', NULL, NULL, 'Male', NULL, NULL, '08135397384', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:03', '063', 'DAIYYBU ABUBAKAR USMAN', '0108777502', '22509062293', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3045', 'ABDULSALAM', 'SHAIBU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '032', 'ABDULSALAM  SHAIBU', '0102108937', '', '125', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3046', 'ABUBAKAR', 'ABDULLAHI - ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '044', 'ABUBAKAR  ABDULLAHI - ', '1218227421', '', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3047', 'JIBRIN', 'RISILA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '214', 'JIBRIN  RISILA', '5167714017', '', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3048', 'IBRAHIM', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '063', 'IBRAHIM  ABUBAKAR', '0036742885', '', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3049', 'NASIRU', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '215', 'NASIRU  ABUBAKAR', '0007652967', '', '133', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3050', 'AHMED', 'SHEHU', 'A', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '032', 'AHMED A SHEHU', '0102147945', '', '109', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3051', 'HARUNA', 'SHEHU', '', NULL, NULL, 'Male', NULL, NULL, '08026657216', 'shehubanua2017@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:04', '063', 'HARUNA  SHEHU', '0036787242', '22320057214', '126', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3052', 'AYOLE', 'SULEIMAN', 'ABDULLAHI', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '063', 'AYOLE ABDULLAHI SULEIMAN', '0072648554', '', '134', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3053', 'ISA', 'MOHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '214', 'ISA  MOHAMMED', '5393464012', '', '135', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3054', 'ABUBAKAR', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '032', 'ABUBAKAR  IBRAHIM', '0100930286', '', '131', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3055', 'MARTINS', 'MHEMBE', 'AONDOVER', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '033', 'MARTINS AONDOVER MHEMBE', '2060217046', '', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3056', 'ISMAILA', 'MUSA,', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '058', 'ISMAILA  MUSA,', '0045829438', '', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3057', 'YUSUF', 'SULEIMAN', '', NULL, NULL, 'Male', NULL, NULL, '09021074671', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:04', '214', 'YUSUF  SULEIMAN', '5319625013', '22483878254', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3058', 'MONDAY', 'DAUDA', 'J', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '032', 'MONDAY J DAUDA', '0118276123', '', '139', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3059', 'ALIYU', 'JIBRIN', 'SULEIMAN', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '033', 'ALIYU SULEIMAN JIBRIN', '2089442375', '', '126', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3060', 'RAYYANU', 'ISA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '032', 'RAYYANU  ISA', '0101150300', '', '131', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3061', 'ISAAC', 'DANSHATU', 'AMINU', NULL, NULL, 'Male', NULL, NULL, '09011537343', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:05', '033', 'ISAAC AMINU DANSHATU', '2089652127', '', '133', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3062', 'ABDULRASHEED', 'SHEU', '', NULL, NULL, 'Male', NULL, NULL, '09029299469', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:05', '032', 'ABDULRASHEED  SHEU', '0101149502', '22503192497', '107', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3063', 'YAKUBU', 'MOHAMMED,', 'AWE', NULL, NULL, 'Male', NULL, NULL, '07063585984', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:05', '058', 'YAKUBU AWE MOHAMMED,', '0119386623', '22224242356', '132', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3064', 'RISILANU', 'UMAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '214', 'RISILANU  UMAR', '5306255014', '', '121', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3065', 'VICTOR', 'BULUS', 'AWASHU', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '011', 'VICTOR AWASHU BULUS', '3125540824', '', '107', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3066', 'SHITU', 'ABDULLAHI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:10', '033', 'SHITU  ABDULLAHI', '2106533769', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3067', 'AJAMA', 'ELKANA', '', NULL, NULL, 'Male', NULL, NULL, '07010985682', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'AJAMA  ELKANA', '0101151675', '22501186632', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3068', 'HUZAIFA', 'JIBRIN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'HUZAIFA  JIBRIN', '0102422938', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3069', 'HABILA', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '07014665106', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'HABILA  ABUBAKAR', '0093142837', '22484471431', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3070', 'AKOSA', 'DANGANA', '', NULL, NULL, 'Male', NULL, NULL, '09075128645', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'AKOSA  DANGANA', '0101161218', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3071', 'HOSEA', 'YOHANNA', 'AJAMA', NULL, NULL, 'Male', NULL, NULL, '08129773329', 'hoseayohana001@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'HOSEA AJAMA YOHANNA', '0101135600', '22503345619', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3072', 'SHALELE', 'ADAMU', 'SANI', NULL, NULL, 'Male', NULL, NULL, '07018820081', 'abachashelele2@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'SHALELE SANI ADAMU', '0101156515', '22451118330', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3073', 'ABAWA', 'TUWASE', '', NULL, NULL, 'Male', NULL, NULL, '08083491943', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'ABAWA  TUWASE', '0101245734', '22503193061', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3074', 'HARUNA', 'YAHUZA', '', NULL, NULL, 'Male', NULL, NULL, '07017179057', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '063', 'HARUNA  YAHUZA', '0083102807', '22405476624', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3075', 'HUSSEINI', 'MOHAMMAD', '', NULL, NULL, 'Male', NULL, NULL, '07077440882', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'HUSSEINI  MOHAMMAD', '0101207682', '22503345761', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3076', 'EMMANUEL', 'SOLOMON', '', NULL, NULL, 'Male', NULL, NULL, '07087354472', 'emmanuelsolomon001@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'EMMANUEL  SOLOMON', '0101150977', '22502936362', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3077', 'IMAM', 'ABDULSALAM', 'YAHUZA', NULL, NULL, 'Male', NULL, NULL, '07081191880', '', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'IMAM YAHUZA ABDULSALAM', '0101155635', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3078', 'ILIYASU', 'MUSA', '', NULL, NULL, 'Male', NULL, NULL, '07087578717', '', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'ILIYASU  MUSA', '0101448016', '22503346296', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3079', 'PAUL', 'MOSES', '', NULL, NULL, 'Male', NULL, NULL, '08022728712', 'mosespaulalayin241@yahoo.com', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'PAUL  MOSES', '0102511669', '22499588753', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3080', 'SADANU', 'MUHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'SADANU  MUHAMMED', '0101227349', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3081', 'AJAMA', 'MATHIAS', '', NULL, NULL, 'Male', NULL, NULL, '07016733130', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'AJAMA  MATHIAS', '0101135648', '22501996495', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3082', 'DANTALA', 'DANTANI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'DANTALA  DANTANI', '0066253762', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3083', 'ALFA', 'ASOLA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'ALFA  ASOLA', '0101297513', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3084', 'SAMAILA', 'ABAWA', '', NULL, NULL, 'Male', NULL, NULL, '07080969788', 'samailaabawa@gmail', 'b@yahoo.com', '2019-12-07 16:29:11', '214', 'SAMAILA  ABAWA', '4788719014', '22446389820', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3085', 'IRIMIYA', 'MIKA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'IRIMIYA  MIKA', '0101158038', '', '157', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3086', 'YAKUBU', 'IBRAHIM', 'ABUBAKAR', NULL, NULL, 'Male', NULL, NULL, '07011500992', 'faransa509@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'YAKUBU ABUBAKAR IBRAHIM', '0091001684', '22336942920', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3087', 'HAMIDU', 'ABDULRAZAK', '', NULL, NULL, 'Male', NULL, NULL, '08082498196', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'HAMIDU  ABDULRAZAK', '0101288609', '22503218069', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3088', 'DANLADI', 'ASHESHI', 'ENOCH', NULL, NULL, 'Male', NULL, NULL, '07082620104', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'DANLADI ENOCH ASHESHI', '0101157275', '22503367206', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3089', 'EZEKIEL', 'VIGHE', 'T', NULL, NULL, 'Male', NULL, NULL, '07018325876', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'EZEKIEL T VIGHE', '0060865989', '22432849279', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3090', 'ADAMU', 'IBRAHIM', 'SHALELE', NULL, NULL, 'Male', NULL, NULL, '08086108055', '', 'b@yahoo.com', '2019-12-07 16:29:11', '214', 'ADAMU SHALELE IBRAHIM', '5308129012', '22507745792', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3091', 'ENOCH', 'KADIRI', 'DANLAMI', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '058', 'ENOCH DANLAMI KADIRI', '0154221121', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3092', 'SALIHU', 'USMAN', 'ABDULLAHI', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '058', 'SALIHU ABDULLAHI USMAN', '0455177406', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3093', 'MOHAMMED', 'YAHAYA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'MOHAMMED  YAHAYA', '0102315609', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3094', 'TANKO', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'TANKO  IBRAHIM', '0035431054', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B3095', 'SAFIYANU', 'ALI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'SAFIYANU  ALI', '0101236143', '', '109', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4001', 'JAMILU', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:01', '032', 'JAMILU  IBRAHIM', '0101305519', '', '158', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4002', 'SULEIMAN', 'AMIRU', 'SANGARI', NULL, NULL, 'Male', NULL, NULL, '07088883438', 'amirusuleiman308@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:01', '063', 'SULEIMAN SANGARI AMIRU', '0087975672', '22423291243', '158', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4003', 'SAFIYANU', 'RABILU', '', NULL, NULL, 'Male', NULL, NULL, '08080678813', 'rabilusafiyanutunga@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:02', '076', 'SAFIYANU  RABILU', '3031173847', '', '122', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4004', 'SARKI', 'MUSA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '214', 'SARKI  MUSA', '4952970012', '', '131', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4005', 'BONIFACE', 'SATI,', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '033', 'BONIFACE  SATI,', '2085620856', '', '131', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4006', 'S', 'CHRISTOPHER', 'C', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '032', 'S C CHRISTOPHER', '0101225084', '', '153', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4007', 'ABUBAKAR', 'SARKI', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'ABUBAKAR  SARKI', '0101160008', '', '154', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4008', 'ABDULLAHI', 'ISMAILA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'ABDULLAHI  ISMAILA', '0101209583', '', '154', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4009', 'YAKUBU', 'YAHAYA ', 'FARANSA', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '057', 'YAKUBU FARANSA YAHAYA ', '2120824025', '', '154', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4010', 'ADAMU', 'MUSA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'ADAMU  MUSA', '0101101704', '', '154', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4011', 'AYOLE', 'YUSUF', 'ADAMU', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '221', 'AYOLE ADAMU YUSUF', '0023363523', '', '158', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4012', 'MUBARAK', 'UMAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'MUBARAK  UMAR', '0101308754', '', '154', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4013', 'SADIQ', 'MUSA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '063', 'SADIQ  MUSA', '0036788005', '', '154', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4014', 'ABDULLAHI', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'ABDULLAHI  ABUBAKAR', '0101220326', '', '154', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4015', 'IBRAHIM', 'YUSUF', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'IBRAHIM  YUSUF', '0101234785', '', '154', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4016', 'MUSA', 'MOHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '07084285957', 'kalamullahtunga@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'MUSA  MOHAMMED', '0102633677', '22296829695', '158', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4017', 'SULE', 'MUHAMMED', 'SULEIMAN', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '314', 'SULE SULEIMAN MUHAMMED', '6555328045', '', '158', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B4018', 'GADAFI', 'ALI', '', NULL, NULL, 'Male', NULL, NULL, '09029796967', '', 'b@yahoo.com', '2019-12-07 16:29:12', '032', 'GADAFI  ALI', '0102095376', '22496737318', '158', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B5001', 'YASAR', 'SALE ', 'ABUBAKAR', NULL, NULL, 'Male', NULL, NULL, '07083907471', 'Nil', 'b@yahoo.com', '2019-12-07 16:28:59', '058', 'YASAR ABUBAKAR SALE ', '0258455206', '22452378281', '95', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B5002', 'HASSAN', 'KHALID ', '', NULL, NULL, 'Male', NULL, NULL, '09019849649', 'khalidhassan12345@gmail.com', 'b@yahoo.com', '2019-12-07 16:28:59', '030', 'HASSAN  KHALID ', '1001337057', '22274958558', '95', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B5003', 'SAADU', 'UMAR', '', NULL, NULL, 'Male', NULL, NULL, '07019648008', 'saadumarafa855@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:01', '032', 'SAADU  UMAR', '0097623486', '22494651571', '115', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B5004', 'DANIEL', 'DONATUS', '', NULL, NULL, 'Male', NULL, NULL, '08069648367', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:01', '214', 'DANIEL  DONATUS', '2846884018', '22242961118', '117', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B5005', 'SALEH', 'ALIYU', '', NULL, NULL, 'Male', NULL, NULL, '09016754017', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'SALEH  ALIYU', '0119391469', '22532469630', '127', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B5006', 'UMAR', 'IDRIS', '', NULL, NULL, 'Male', NULL, NULL, '08037499030', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'UMAR  IDRIS', '0045415550', '22336581295', '128', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B5007', 'SAIDU', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '08087349690', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:02', '032', 'SAIDU  IBRAHIM', '0109661202', '22435428112', '129', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B5008', 'IMAM', 'ABUBAKAR', 'HAMZA', NULL, NULL, 'Male', NULL, NULL, '08082433534', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:04', '032', 'IMAM HAMZA ABUBAKAR', '0037842308', '22336579300', '138', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6001', 'MOHAMMED', 'UMAR,', 'SARKI', NULL, NULL, 'Male', NULL, NULL, '09022690843', 'umarsarkimohammed@gmail.com', 'b@yahoo.com', '2019-12-07 16:28:59', '058', 'MOHAMMED SARKI UMAR,', '0159981590', '', '97', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6002', 'ABDULHADI', 'SULEIMAN,', '', NULL, NULL, 'Male', NULL, NULL, '07014366746', 'suleimanabdulhadi78@gmail.com', 'b@yahoo.com', '2019-12-07 16:28:59', '058', 'ABDULHADI  SULEIMAN,', '0254616416', '22258623161', '89', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6003', 'MUHAMMED', 'ABUBAKAR', '', NULL, NULL, 'Male', NULL, NULL, '07033965963', 'abubakarmuhammed969@gmail.com', 'b@yahoo.com', '2019-12-07 16:28:59', '050', 'MUHAMMED  ABUBAKAR', '5183061339', '22326195275', '90', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6004', 'BALA', 'ABDULMUTALIB', 'IBRAHIM', NULL, NULL, 'Male', NULL, NULL, '07038439994', 'stylistics@gmail.com', 'b@yahoo.com', '2019-12-07 16:28:59', '044', 'BALA IBRAHIM ABDULMUTALIB', '0777617773', '22308923533', '91', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6005', 'DAHIRU ', 'ALIYU', 'RIBI', NULL, NULL, 'Male', NULL, NULL, '08088774487', 'Nil', 'b@yahoo.com', '2019-12-07 16:28:59', '011', 'DAHIRU  RIBI ALIYU', '3009905790', '22341724263', '97', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6006', 'LARABA', 'ANDUWA', '', NULL, NULL, 'Female', NULL, NULL, '08069088289', 'Nil', 'b@yahoo.com', '2019-12-07 16:28:59', '070', 'LARABA  ANDUWA', '6080253128', '22291297590', '96', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6007', 'MUSA', 'UMAR ', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:00', '032', 'MUSA  UMAR ', '0037543870', '', '97', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6008', 'RUFAI', 'MOHAMMED', 'ABDULLAHI', NULL, NULL, 'Male', NULL, NULL, '08025971895', 'mrufai733@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:00', '063', 'RUFAI ABDULLAHI MOHAMMED', '0059921311', '22221164024', '98', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6009', 'UMAR', 'MOHAMMED', 'ASO', NULL, NULL, 'Male', NULL, NULL, '08020559699', 'umarmohammedaso21@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:00', '033', 'UMAR ASO MOHAMMED', '2099820981', '22355653494', '99', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6010', 'MOHAMMED', 'ADAMU', '', NULL, NULL, 'Male', NULL, NULL, '08086415628', 'onthemoveawe@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:00', '032', 'MOHAMMED  ADAMU', '0035416567', '22322433861', '100', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6011', 'SALIHU,', 'AHMAD,', 'FARANSA', NULL, NULL, 'Male', NULL, NULL, '07082562237', 'sa.faransa@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:00', '058', 'SALIHU, FARANSA AHMAD,', '0024993176', '22259512190', '100', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6012', 'FELICIA', 'ALABI, ', '', NULL, NULL, 'Female', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:00', '058', 'FELICIA  ALABI, ', '0138811724', '', '149', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6013', 'ABDULLAHI', 'MOHAMMED ', 'WAZIRI', NULL, NULL, 'Male', NULL, NULL, '08027467668', 'moh\'dabdullahiwaziri2@yahoo.com', 'b@yahoo.com', '2019-12-07 16:29:00', '011', 'ABDULLAHI WAZIRI MOHAMMED ', '3068253757', '22222252522', '99', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6014', 'ABUBAKAR', 'UMAR', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:02', '214', 'ABUBAKAR  UMAR', '5328230013', '', '99', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6015', 'YUNUSA', 'AMINU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '057', 'YUNUSA  AMINU', '2212281767', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6016', 'YUNUSA', 'ABUBAKAR,', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:04', '058', 'YUNUSA  ABUBAKAR,', '0252398231', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6017', 'EGWURUBE', 'JULIUS', '', NULL, NULL, 'Male', NULL, NULL, '07032069663', 'jls_egwurube@yahoo.com', 'b@yahoo.com', '2019-12-07 16:29:05', '063', 'EGWURUBE  JULIUS', '0070254272', '22343837022', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6018', 'MUHAMMED', 'SHABA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '033', 'MUHAMMED  SHABA', '2035024253', '', '158', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6019', 'HALIRU', 'SHAMWILU', '', NULL, NULL, 'Male', NULL, NULL, '09021729042', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:05', '214', 'HALIRU  SHAMWILU', '5299018012', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6020', 'HUDU', 'MOHAMMED,', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '076', 'HUDU  MOHAMMED,', '3040446365', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6021', 'BABANGIDA', 'DANLAMI', '', NULL, NULL, 'Male', NULL, NULL, '08028552774', 'NIL', 'b@yahoo.com', '2019-12-07 16:29:05', '032', 'BABANGIDA  DANLAMI', '0101334795', '22503602291', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6022', 'YAKUBU', 'UMAR', 'ABUBAKAR', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '011', 'YAKUBU ABUBAKAR UMAR', '3039176834', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6023', 'IBRAHIM', 'SALIHU', 'IDRIS', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '032', 'IBRAHIM IDRIS SALIHU', '0037327177', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6024', 'ABDURAHMAN', 'MUHAMMED', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '032', 'ABDURAHMAN  MUHAMMED', '0112969346', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6025', 'MIKE', 'NANA,', 'SHIAONDO', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '058', 'MIKE SHIAONDO NANA,', '0224586239', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6026', 'ISA', 'GAMBO', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:05', '044', 'ISA  GAMBO', '0065661097', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6027', 'HASSAN', 'MUSA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:09', '032', 'HASSAN  MUSA', '0101101027', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6028', 'DANLADI', 'ABDULLAHI', '', NULL, NULL, 'Male', NULL, NULL, '08125700243', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:10', '032', 'DANLADI  ABDULLAHI', '0031023549', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6029', 'OSHAFU', 'YUNUSA', 'HAMZA', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '063', 'OSHAFU HAMZA YUNUSA', '033671139', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6030', 'ATTAYI ', 'MOHAMMED', 'I', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', NULL, 'ATTAYI  I MOHAMMED', '', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6031', 'JOB', 'DAAN', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', NULL, 'JOB  DAAN', '', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6032', 'MUHAMMAD', 'ALIYU', 'T', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '044', 'MUHAMMAD T ALIYU', '0039016704', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6033', 'MAKU', 'JACOB', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '011', 'MAKU  JACOB', '3062501047', '', '143', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B6034', 'MUSA', 'KABIRU,', 'IBRAHIM', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '058', 'MUSA IBRAHIM KABIRU,', '0200596739', '', '164', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B7001', 'SAFIYANU', 'UMAR', 'I.', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:00', '032', 'SAFIYANU I. UMAR', '0041571401', '', '104', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B7002', 'MUSA', 'DAHIRU', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'MUSA  DAHIRU', '0102307682', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B7003', 'BAGARE', 'IBRAHIM', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:11', '032', 'BAGARE  IBRAHIM', '0101225682', '', '159', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B9001', 'MUHAMMED', 'IBRAHIM', 'KHAMIS', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:12', '214', 'MUHAMMED KHAMIS IBRAHIM', '5216153011', '', '160', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('B9002', 'MOHAMMED ', 'IMRAN ', 'AHMED', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:13', NULL, 'MOHAMMED  AHMED IMRAN ', '', '', '170', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('C3001', 'YAKUBU', 'BULALA', 'SABO', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:28:59', '214', 'YAKUBU SABO BULALA', '1021699021', '', '87', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('C3002', 'DALLATU', 'MUSTAPHA', 'ABDULLAHI', NULL, NULL, 'Male', NULL, NULL, '07037452550', 'Nil', 'b@yahoo.com', '2019-12-07 16:29:00', '044', 'DALLATU ABDULLAHI MUSTAPHA', '0739431476', '22289766176', '108', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('C5001', 'RAPHAEL', 'DARIYA', '', NULL, NULL, 'Male', NULL, NULL, '', '', 'b@yahoo.com', '2019-12-07 16:29:00', '032', 'RAPHAEL  DARIYA', '0013550513', '', '87', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `staff` VALUES ('C5002', 'HASSAN', 'HALADU', '', NULL, NULL, 'Male', NULL, NULL, '09026392918', 'haladuhassan@gmail.com', 'b@yahoo.com', '2019-12-07 16:29:01', '082', 'HASSAN  HALADU', '6016520400', '', '116', 1, 'ST01', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for staff_other_allowances
-- ----------------------------
DROP TABLE IF EXISTS `staff_other_allowances`;
CREATE TABLE `staff_other_allowances`  (
  `staff_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `salary_desc_code` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `monthly_amount` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`staff_id`, `salary_desc_code`) USING BTREE,
  INDEX `staff_id`(`staff_id`) USING BTREE,
  INDEX `fk_salary_desc_code`(`salary_desc_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff_other_allowances
-- ----------------------------
INSERT INTO `staff_other_allowances` VALUES ('C3001', 'sd01', NULL, NULL, 31000.00);

-- ----------------------------
-- Table structure for staff_type
-- ----------------------------
DROP TABLE IF EXISTS `staff_type`;
CREATE TABLE `staff_type`  (
  `staff_type_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `staff_type_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`staff_type_id`) USING BTREE,
  INDEX `staff_type_id`(`staff_type_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff_type
-- ----------------------------
INSERT INTO `staff_type` VALUES ('ST01', 'Temporary Staff', 'ese.kelvin@dangoteprojects.com', '2019-10-05 18:31:38', 1);
INSERT INTO `staff_type` VALUES ('ST02', 'Casual Staff', 'ese.kelvin@dangoteprojects.com', '2019-10-05 18:32:22', 1);

-- ----------------------------
-- Table structure for temporary_migration
-- ----------------------------
DROP TABLE IF EXISTS `temporary_migration`;
CREATE TABLE `temporary_migration`  (
  `sn` int(11) NULL DEFAULT NULL,
  `staff_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `other_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `department` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `job_category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `monthly_rate` decimal(10, 2) NULL DEFAULT NULL,
  `additional_pay` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `account_no` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bvn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `staff_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of temporary_migration
-- ----------------------------
INSERT INTO `temporary_migration` VALUES (1, '1001', 'BULALA', 'YAKUBU', 'SABO', 'Male', 'AGRIC', 'SUPERVISOR', 'Supervisor', 39000.00, '31000.00', '1021699021', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (2, '1002', 'UMAR,', 'MOHAMMED', 'SARKI', 'Male', 'ADMIN', 'ASST CRM', 'SKILL', 55000.00, '', '0159981590', 'GTB', 'umarsarkimohammed@gmail.com', '09022690843', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (3, '1003', 'SULEIMAN,', 'ABDULHADI', '', 'Male', 'ADMIN', 'HR ASST', 'SKILL', 55000.00, '', '0254616416', 'GTB', 'suleimanabdulhadi78@gmail.com', '07014366746', '22258623161', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (4, '1004', 'ABUBAKAR', 'MUHAMMED', '', 'Male', 'ADMIN', 'ASST PURCHASE', 'SKILL', 55000.00, '', '5183061339', 'Eco Bank', 'abubakarmuhammed969@gmail.com', '07033965963', '22326195275', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (5, '1005', 'ABDULMUTALIB', 'BALA', 'IBRAHIM', 'Male', 'ADMIN', 'SECRETARY', 'SKILL', 55000.00, '', '0777617773', 'Acess Bank', 'stylistics@gmail.com', '07038439994', '22308923533', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (6, '1006', 'ALIYU', 'DAHIRU ', 'RIBI', 'Male', 'ADMIN', 'ASST CRM', 'SKILL', 50000.00, '', '3009905790', 'First Bank', 'Nil', '08088774487', '22341724263', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (7, '1007', 'RAYYANU ', 'LUKMAN', '', 'Male', 'Technical services', 'Data capt clerk', 'SKILL', 45000.00, '', '67053732', 'Union Bank', 'rayyanlukman@gmail.com', '09072726101', '22362893681', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (8, '1008', 'AZENU', 'BULUS', 'DANLAMI', 'Male', 'Technical services', 'STORE ASST', 'SKILL', 45000.00, '', '6239523474', 'Fidelity Bank', 'azenudanlami@gmail.com', '08024502363', '22361060475', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (9, '1009', 'SALE ', 'YASAR', 'ABUBAKAR', 'Male', 'Civil Engineering', 'civils foreman', 'SKILL', 45000.00, '', '0258455206', 'GTB', 'Nil', '07083907471', '22452378281', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (10, '1010', 'KHALID ', 'HASSAN', '', 'Male', 'Civil Engineering', 'civils foreman', 'SKILL', 45000.00, '', '1001337057', 'HERITAGE BANK', 'khalidhassan12345@gmail.com', '09019849649', '22274958558', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (11, '1011', 'ANDUWA', 'LARABA', '', 'Female', 'ADMIN', '', 'SKILL', 45000.00, '', '6080253128', 'Fidelity', 'Nil', '08069088289', '22291297590', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (12, '1012', 'UMAR ', 'MUSA', '', 'Male', 'ADMIN', 'ASST CRM', 'SKILL', 45000.00, '', '0037543870', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (13, '1013', 'MOHAMMED', 'RUFAI', 'ABDULLAHI', 'Male', 'ADMIN', 'ASST DATA CAPTURE', 'SKILL', 55000.00, '', '0059921311', 'Diamond Bank', 'mrufai733@gmail.com', '08025971895', '22221164024', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (14, '1014', 'MOHAMMED', 'UMAR', 'ASO', 'Male', 'ADMIN', 'timekeeper', 'SKILL', 45000.00, '', '2099820981', 'UBA', 'umarmohammedaso21@gmail.com', '08020559699', '22355653494', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (15, '1015', 'ADAMU', 'MOHAMMED', '', 'Male', 'ADMIN', 'data capture clerk', 'SKILL', 45000.00, '', '0035416567', 'Union Bank', 'onthemoveawe@gmail.com', '08086415628', '22322433861', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (16, '1016', 'AHMAD,', 'SALIHU,', 'FARANSA', 'Male', 'ADMIN', 'data capture clerk', 'SKILL', 45000.00, '', '0024993176', 'GTB', 'sa.faransa@gmail.com', '07082562237', '22259512190', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (17, '1017', 'ALABI, ', 'FELICIA', '', 'Female', 'ADMIN', 'chef', 'SKILL', 45000.00, '', '0138811724', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (18, '1018', 'YERO', 'SHEHU', '.M', 'Male', 'Technical services', 'stores assistant', 'SKILL', 45000.00, '', '0042038868', 'Union Bank', 'shehumusayero@yahoo.com', '09019809551', '22201143393', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (19, '1019', 'DARIYA', 'RAPHAEL', '', 'Male', 'Civil Engineering', 'Supervisor', 'Supervisor', 39000.00, '', '0013550513', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (20, '1020', 'UMAR', 'SAFIYANU', 'I.', 'Male', 'security Supervisor', 'security Supervisor', 'SKILL', 39000.00, '', '0041571401', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (21, '1021', 'MOHAMMED ', 'ABDULLAHI', 'WAZIRI', 'Male', 'ADMIN', 'timekeeper', 'SKILL', 33800.00, '', '3068253757', 'First Bank', 'moh\'dabdullahiwaziri2@yahoo.com', '08027467668', '22222252522', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (22, '1022', 'ABUBAKAR', 'MUSA', '', 'Male', 'Agriculture', 'tractor driver', 'SKILL', 39000.00, '', '0101237212', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (23, '1023', 'ABDULLAHIM', 'ABDULAZIZ', '', 'Male', 'agriculture', 'excavator operator', 'SKILL', 39000.00, '', '0101223389', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (24, '1024', 'MUSTAPHA', 'DALLATU', 'ABDULLAHI', 'Male', 'agriculture', 'planting supervisor', 'Supervisor', 39000.00, '', '0739431476', 'Access Bank', 'Nil', '07037452550', '22289766176', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (25, '1025', 'MAIDAWA', 'BAKO', '', 'Male', 'agriculture', 'grader operator', 'SKILL', 39000.00, '', '0012887047', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (26, '1026', 'SIYAKA, ', 'AMINU', '', 'Male', 'agriculture', 'dozer operator', 'SKILL', 39000.00, '', '0127198061', 'GTB', 'Nil', '08062940557', '22265670320', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (27, '1027', 'OGOSHI', 'ABDULKARIM', '', 'Male', 'agriculture', 'tractor driver', 'SKILL', 39000.00, '', '0101218349', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (28, '1028', 'HUSSEINI', 'BABA', '', 'Male', 'Technical services', 'plant mechanic', 'SKILL', 39000.00, '', '1500586475', 'Heritage Bank', 'Nil', '08087496822', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (29, '1029', 'ALI', 'AUTA', '', 'Male', 'agriculture', 'land prep tractor driver', 'SKILL', 39000.00, '', '0101396557', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (30, '1030', 'BABAARI', 'IBRAHIM', 'B', 'Male', 'agriculture', 'tractor driver', 'SKILL', 39000.00, '', '0101609004', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (31, '1031', 'WATAKIRI', 'FRANCIS', '', 'Male', 'Technical services', 'plant mechanic', 'SKILL', 39000.00, '', '2125055996', 'UBA', 'Nil', '07088345592', '22411907110', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (32, '1032', 'JIBRIN', 'ABDULLAHI', 'YIRGAU', 'Male', 'agriculture', 'excavator operator', 'SKILL', 39000.00, '', '3077673777', 'First Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (33, '1033', 'SAMUEL ', 'DANLAMI', 'YUSUFU', 'Male', 'agriculture', 'dozer operator', 'SKILL', 39000.00, '', '3073009578', 'First Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (34, '1034', 'YUSU', 'MIANA', '', 'Male', 'Technical services', 'plant mechanic', 'SKILL', 39000.00, '', '1500853489', 'Heritage Bank', 'Nil', '08088807318', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (35, '1035', 'SULEIMAN', 'ADAMU', '', 'Male', 'agriculture', 'truck driver', 'SKILL', 33800.00, '', '0101216802', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (36, '1036', 'HUSSAINI,', 'ALKASIM', 'OTAKI', 'Male', 'agriculture', 'truck driver', 'SKILL', 33800.00, '', '0240364712', 'GTB', 'Nil', '08022518553', '22429554403', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (37, '1037', 'ABUBAKAR', 'KATTADA', '', 'Male', 'Technical services', 'assistant plant mechanic', 'SKILL', 33800.00, '', '5244033011', 'FCMB', 'Nil', '07089770899', '22502783153', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (38, '1038', 'JOSHUA', 'AONDOTSEA', 'MBAIORGA', 'Male', 'Technical services', 'plant mechanic', 'SKILL', 39000.00, '', '0724333705', 'Access Bank', 'Nil', '09070657361', '22321879248', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (39, '1039', 'KATSU', 'TERDOO', '', 'Male', 'agriculture', 'tractor driver', 'SKILL', 39000.00, '', '0101227325', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (40, '1040', 'UMAR', 'SAADU', '', 'Male', 'Civil Engineering', 'electrical maintenance', 'SKILL', 33800.00, '', '0097623486', 'Union Bank', 'saadumarafa855@gmail.com', '07019648008', '22494651571', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (41, '1041', 'HALADU', 'HASSAN', '', 'Male', 'Civil Engineering', 'civils supervisor', 'Supervisor', 33800.00, '', '6016520400', 'Keystone', 'haladuhassan@gmail.com', '09026392918', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (42, '1042', 'DONATUS', 'DANIEL', '', 'Male', 'Civil Engineering', 'electrical foreman', 'SKILL', 33800.00, '', '2846884018', 'FCMB', 'Nil', '08069648367', '22242961118', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (43, '1043', 'IBRAHIM', 'JAMILU', '', 'Male', 'irrigation', 'pump operator', 'SKILL', 33800.00, '', '0101305519', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (44, '1044', 'ABUBAKAR', 'JAMIL', '', 'Male', 'agriculture', 'tipper driver', 'SKILL', 33800.00, '', '6010489431', 'KEYSTONE', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (45, '1045', 'ZUNAIDU', 'MUZAMMILU', '', 'Male', 'Technical services', 'stores assistant', 'SKILL', 33800.00, '', '2096865543', 'UBA', 'Nil', '07088959529', '22432763450', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (46, '1046', 'AMIRU', 'SULEIMAN', 'SANGARI', 'Male', 'irrigation', 'pump operator', 'SKILL', 33800.00, '', '0087975672', 'Diamond Bank', 'amirusuleiman308@gmail.com', '07088883438', '22423291243', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (47, '1047', 'BALA', 'SALIHU', '', 'Male', 'Technical services', 'assistant plant mechanic', 'SKILL', 33800.00, '', '0100940977', 'Union Bank', 'Nil', '08087197552', '22447192519', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (48, '1048', 'UMAR', 'AYUBA', '', 'Male', 'agriculture', 'truck driver', 'SKILL', 33800.00, '', '5257030018', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (49, '1049', 'MAGAYAKI', 'MIKAILA', 'PAKACHI', 'Male', 'agriculture', 'truck driver', 'SKILL', 33800.00, '', '0036239782', 'UNITY BANK', 'Nil', '07016819500', '22487452361', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (50, '1050', 'ABDULLAHI', 'ALI', '', 'Male', 'agriculture', 'dozer operator', 'SKILL', 39000.00, '', '0101227961', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (51, '1051', 'IBRAHIM', 'DANLAMI', '', 'Male', 'agriculture', 'grader operator', 'SKILL', 39000.00, '', '5168403011', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (52, '1052', 'UMAR', 'ABUBAKAR', '', 'Male', 'ADMIN', 'timekeeper', 'SKILL', 33800.00, '', '5328230013', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (53, '1053', 'MUHAMMED', 'SADANU', '', 'Male', 'agriculture', 'land prep tractor driver', 'SKILL', 33800.00, '', '0102345428', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (54, '1054', 'MICHEAL', 'EMMANUEL', 'J', 'Male', 'agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0120065227', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (55, '1055', 'ADAMU', 'MASALLAH', '', 'Male', 'agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0120351238', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (56, '1056', 'RABILU', 'SAFIYANU', '', 'Male', 'irrigation', 'Team Leader', 'SKILL', 33800.00, '', '3031173847', 'SKYE BANK', 'rabilusafiyanutunga@gmail.com', '08080678813', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (57, '1057', 'AUDU', 'ISAH', '', 'Male', 'Agriculture', 'payloader ', 'SKILL', 39000.00, '', '0117969592', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (58, '1058', 'MUHAMMED', 'ILIYASU', '', 'Male', 'Technical services', 'truck driver', 'SKILL', 33800.00, '', '3077557761', 'First Bank', 'Nil', '08087070960', '22292603857', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (59, '1059', 'MUSTAPHA', 'UMARU', '', 'Male', 'Technical services', 'truck driver', 'SKILL', 33800.00, '', '0041852386', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (60, '1060', 'ABUBAKAR', 'MUHAMMED', '', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0037865815', 'Union Bank', 'Nil', '08034522054', '22405058923', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (61, '1061', 'ALI', 'SALE', '', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0123280807', 'Union Bank', 'Nil', '09017699125', '22170106562', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (62, '1062', 'YUSUF', 'SHIAIBU', '', 'Male', 'Agriculture', 'compactor operator', 'SKILL', 39000.00, '', '0102548047', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (63, '1063', 'YAHAYA', 'HALILU', '', 'Male', 'Technical services', 'assistant plant mechanic', 'SKILL', 33800.00, '', '0101305557', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (64, '1064', 'ILIYASU', 'MUSA', '', 'Male', 'Agriculture', 'excavator operator', 'SKILL', 39000.00, '', '0106593306', 'Union Bank', 'Nil', '08029152459', '22501455138', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (65, '1065', 'ABDULRAZAK', 'ALI', '', 'Male', 'Agriculture', 'excavator operator', 'SKILL', 39000.00, '', '0118126259', 'Union Bank', 'Nil', '07088390747', '22530720984', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (66, '1066', 'MUSA', 'OKPEYA', 'HARUNA', 'Male', 'Agriculture', 'excavator operator', 'SKILL', 39000.00, '', '0090209317', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (67, '1067', 'IBRAHIM', 'UMAR', 'MOHAMMED', 'Male', 'Agriculture', 'planting leader', 'SKILL', 31200.00, '', '4792371013', 'FCMB', 'Nil', '07017180502', '22446497899', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (68, '1068', 'ALIYU', 'SALEH', '', 'Male', 'Civil Engineering', 'Carpenter', 'SKILL', 31200.00, '', '0119391469', 'Union Bank', 'Nil', '09016754017', '22532469630', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (69, '1069', 'IDRIS', 'UMAR', '', 'Male', 'Civil Engineering', 'Mason', 'SKILL', 31200.00, '', '0045415550', 'Union Bank', 'Nil', '08037499030', '22336581295', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (70, '1070', 'IBRAHIM', 'SAIDU', '', 'Male', 'Civil Engineering', 'Iron Bender', 'SKILL', 31200.00, '', '0109661202', 'Union Bank', 'Nil', '08087349690', '22435428112', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (71, '1071', 'MUSA', 'SARKI', '', 'Male', 'irrigation', 'crop protection leaders', 'SKILL', 31200.00, '', '4952970012', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (72, '1072', 'SALLAU', 'SULEIMAN', '', 'Male', 'Agriculture', 'crop protection leaders', 'SKILL', 31200.00, '', '0101605147', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (73, '1073', 'SURAJO ', 'AMINU', '', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 31200.00, '', '0120278207', 'Union Bank', 'Nil', '09016305101', '22533773901', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (74, '1074', 'MOHAMMED', 'HALLIRU', 'SULEIMAN', 'Male', 'Agriculture', 'excavator operator', 'SKILL', 39000.00, '', '5081357013', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (75, '1075', 'SATI,', 'BONIFACE', '', 'Male', 'irrigation', 'crop protection leaders', 'SKILL', 31200.00, '', '2085620856', 'UBA', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (76, '1076', 'MUHAMMED', 'JAFARU', '', 'Male', 'Agriculture', 'dozer operator', 'SKILL', 39000.00, '', '0101286100', 'Union Bank', 'Nil', '09016713596', '22499306339', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (77, '1077', 'OSAMA', 'YAHAYA', 'NUHU', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0818261796', 'Access', 'Nil', '08087668924', '22530908621', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (78, '1078', 'ABDULLAHI', 'DALHATU', '', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0041590006', 'Union Bank', 'Nil', '08035596485', '22517923720', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (79, '1079', 'TANKO', 'SANI', 'USMAN', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0024659469', 'STANBIC', 'Nil', '08069168692', '22394614915', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (80, '1080', 'IDRIS', 'ABUBAKAR', 'BUHARI', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0120284440', 'Union Bank', 'Nil', '08024222944', '22533641408', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (81, '1081', 'HARUNA', 'UBA', 'IBRAHIM', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0051384949', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (82, '1082', 'TANIMU', 'AHMED', '', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0261196510', 'ECO BANK', 'Nil', '08035596485', '22517923720', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (83, '1083', 'SHUAIBU', 'ABDULLAHI', '', 'Male', 'Agriculture', 'dozer operator', 'SKILL', 39000.00, '', '0101226641', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (84, '1084', 'CHRISTOPHER', 'JOSEPH', '', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0823091126', 'ACCESS', 'Nil', '09075930859', '22534095778', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (85, '1085', 'SALE,', 'AMIN', 'MOHAMMED', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0227975159', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (86, '1086', 'IBRAHIM', 'MOHAMMED', 'WULLY', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0027110359', 'UNITY BANK', 'Nil', '09014518485', '22421889691', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (87, '1087', 'USENI', 'BAKO', '', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '2071770770', 'UBA', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (88, '1088', 'USMAN', 'DAIYYBU', 'ABUBAKAR', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0108777502', 'Diamond Bank', 'Nil', '08135397384', '22509062293', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (89, '1089', 'SHAIBU', 'ABDULSALAM', '', 'Male', 'Agriculture', 'compactor operator', 'SKILL', 39000.00, '', '0102108937', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (90, '1090', 'ABDULLAHI - ', 'ABUBAKAR', '', 'Male', 'Agriculture', 'dozer operator', 'SKILL', 39000.00, '', '1218227421', 'Access', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (91, '1091', 'RISILA', 'JIBRIN', '', 'Male', 'Agriculture', 'dozer operator', 'SKILL', 39000.00, '', '5167714017', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (92, '1092', 'ABUBAKAR', 'IBRAHIM', '', 'Male', 'Agriculture', 'dozer operator', 'SKILL', 39000.00, '', '0036742885', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (93, '1093', 'ABUBAKAR', 'NASIRU', '', 'Male', 'Agriculture', 'payloader operator', 'SKILL', 39000.00, '', '0007652967', 'Unity', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (94, '1094', 'SHEHU', 'AHMED', 'A', 'Male', 'Agriculture', 'grader operator', 'SKILL', 39000.00, '', '0102147945', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (95, '1095', 'SHEHU', 'HARUNA', '', 'Male', 'Agriculture', 'planting leader', 'SKILL', 31200.00, '', '0036787242', 'Diamond Bank', 'shehubanua2017@gmail.com', '08026657216', '22320057214', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (96, '1096', 'SULEIMAN', 'AYOLE', 'ABDULLAHI', 'Male', 'Agriculture', 'crop nutrition leaders', 'SKILL', 31200.00, '', '0072648554', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (97, '1097', 'MOHAMMED', 'ISA', '', 'Male', 'Agriculture', 'harvest leader', 'SKILL', 31200.00, '', '5393464012', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (98, '1098', 'IBRAHIM', 'ABUBAKAR', '', 'Male', 'Agriculture', 'crop protection leaders', 'SKILL', 31200.00, '', '0100930286', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (99, '1099', 'MHEMBE', 'MARTINS', 'AONDOVER', 'Male', 'Agriculture', 'dozer operator', 'SKILL', 39000.00, '', '2060217046', 'UBA', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (100, '1100', 'MUSA,', 'ISMAILA', '', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0045829438', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (101, '1101', 'SULEIMAN', 'YUSUF', '', 'Male', 'Agriculture', 'vehicle driver', 'SKILL', 36400.00, '', '5319625013', 'FCMB', 'Nil', '09021074671', '22483878254', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (102, '1102', 'CHRISTOPHER', 'S', 'C', 'Male', 'irrigation', 'Irrigator', 'SKILL', 26650.00, '', '0101225084', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (103, '1103', 'ABUBAKAR', 'IMAM', 'HAMZA', 'Male', 'Civil Engineering', 'Plumber', 'SKILL', 31200.00, '', '0037842308', 'Union Bank', 'Nil', '08082433534', '22336579300', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (104, '1104', 'DAUDA', 'MONDAY', 'J', 'Male', 'Agriculture', 'telehandler operator', 'SKILL', 39000.00, '', '0118276123', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (105, '1105', 'JIBRIN', 'ALIYU', 'SULEIMAN', 'Male', 'Agriculture', 'planting leader', 'SKILL', 31200.00, '', '2089442375', 'UBA', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (106, '1106', 'ISA', 'RAYYANU', '', 'Male', 'Agriculture', 'crop protection leaders', 'SKILL', 31200.00, '', '0101150300', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (107, '1107', 'HAMZA', 'YAHO', 'ABDULLAHI', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0024942376', 'Stanbic IBTC', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (108, '1108', 'JOB', 'NANDI', 'DAAN', 'Male', 'ADMIN', 'housekeeper', 'UNSKILL', 28600.00, '', '0035425426', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (109, '1109', 'MOMOH', 'FRIDAY', 'O', 'Male', 'Technical services', 'survey assistant', 'SKILL', 39000.00, '', '3090917959', 'First Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (110, '1110', 'AMINU', 'YUNUSA', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '2212281767', 'Zenith bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (111, '1111', 'ABUBAKAR,', 'YUNUSA', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0252398231', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (112, '1112', 'DANJUMA', 'ESTHER', 'CHAGGA', 'Female', 'ADMIN', 'housekeeper', 'UNSKILL', 28600.00, '', '6235397594', 'Fidelity', 'estherdanjuma@gmail.com', '08067395670', '22287182035', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (113, '1113', 'MOHAMMED', 'ALIYU', '', 'Male', 'Technical services', 'survey assistant', 'SKILL', 28600.00, '', '0101255731', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (114, '1114', 'JULIUS', 'EGWURUBE', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0070254272', 'Diamond Bank', 'jls_egwurube@yahoo.com', '07032069663', '22343837022', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (115, '1115', 'SHABA', 'MUHAMMED', '', 'Male', 'ADMIN', 'pump operator', 'SKILL', 28600.00, '', '2035024253', 'UBA', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (116, '1116', 'ILIYASU', 'MOHAMMED', 'NASIRU', 'Male', 'ADMIN', 'housekeeper', 'UNSKILL', 28600.00, '', '0011360451', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (117, '1117', 'SHAMWILU', 'HALIRU', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '5299018012', 'FCMB', 'Nil', '09021729042', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (118, '1118', 'SHUAIBU', 'ADAMU', 'GALADIMA', 'Male', 'ADMIN', 'housekeeper', 'UNSKILL', 28600.00, '', '4995607012', 'FCMB', 'shuaibuadamugaladima61@gmail.com', '07014926119', '22456838437', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (119, '1119', 'MOHAMMED,', 'HUDU', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '3040446365', 'SKYE BANK', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (120, '1120', 'DANLAMI', 'BABANGIDA', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0101334795', 'Union Bank', 'NIL', '08028552774', '22503602291', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (121, '1121', 'UMAR', 'YAKUBU', 'ABUBAKAR', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '3039176834', 'First Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (122, '1122', 'SALIHU', 'IBRAHIM', 'IDRIS', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0037327177', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (123, '1123', 'MUHAMMED', 'ABDURAHMAN', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0112969346', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (124, '1124', 'NANA,', 'MIKE', 'SHIAONDO', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0224586239', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (125, '1125', 'IBRAHIM', 'UMAR', '', 'Male', 'ADMIN', 'housekeeper', 'UNSKILL', 36400.00, '', '0093143896', 'Union Bank', 'NIL', '08122823769', '22485781614', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (126, '1126', 'GAMBO', 'ISA', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0065661097', 'Access Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (127, '1127', 'TINA', 'PATRICK', '', 'Female', 'ADMIN', 'Housekeeper', 'UNSKILL', 28600.00, '', '0100970620', 'ACCESS Diamond ', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (128, '1128', 'DANSHATU', 'ISAAC', 'AMINU', 'Male', 'Agriculture', 'payloader operator', 'SKILL', 39000.00, '', '2089652127', 'UBA', 'Nil', '09011537343', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (129, '1129', 'SHEU', 'ABDULRASHEED', '', 'Male', 'Agriculture', 'excavator operator', 'SKILL', 39000.00, '', '0101149502', 'Union Bank', 'Nil', '09029299469', '22503192497', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (130, '1130', 'ZUBAIRU', 'MUHAMMAD', 'BELLO', 'Male', 'Technical services', 'load master', 'SKILL', 28600.00, '', '5307840017', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (131, '1131', 'MOHAMMED,', 'YAKUBU', 'AWE', 'Male', 'Agriculture', 'tipper driver', 'SKILL', 33800.00, '', '0119386623', 'GTB', 'Nil', '07063585984', '22224242356', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (132, '1132', 'UMAR', 'RISILANU', '', 'Male', 'Agriculture', 'land prep tractor driver', 'SKILL', 39000.00, '', '5306255014', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (133, '1133', 'BULUS', 'VICTOR', 'AWASHU', 'Male', 'Agriculture', 'excavator operator', 'SKILL', 39000.00, '', '3125540824', 'First Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (134, '1134', 'SOFIYANU', 'BASHIR', '', 'Male', 'Technical services', 'plant mechanic', 'SKILL', 33800.00, '', '2775912019', 'FCMB', 'bashirsafiyanu@yahoo.com', '09026638794', '22302289312', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (135, '1135', 'ABDULLAHI', 'JINJIMI', 'ALIYU', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0079574962', 'Diamond Bank', 'Nil', '09077099148', '22394085119', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (136, '1136', 'HASSAN', 'ABDULMUMIN', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0102447212', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (137, '1137', 'MOHAMMADU', 'ADAMU', 'T', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0102031651', 'Union Bank', 'Nil', '09020430178', '2.25052E+11', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (138, '1138', 'AUWAL', 'MOHAMMED', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '3051184780', 'SKYE BANk', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (139, '1139', 'DALHATU', 'ZAKARI', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0040657704', 'Union Bank', 'Nil', '08084334744', '22331615212', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (140, '1140', 'SARKIN-', 'BAKA', 'DANLAMI', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0047030173', 'Union Bank', 'Nil', '07087359300', '22337178823', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (141, '1141', 'AKURAGAA', 'IORFA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0102047076', 'Union Bank', 'Nil', '09027849265', '22504168000', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (142, '1142', 'SHUAIBU', 'ISA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0101159420', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (143, '1143', 'ABUBAKAR', 'ISYAKA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '5157893012', 'FCMB', 'Nil', '07088685469', '22494741740', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (144, '1144', 'JACOB', 'AKURAGA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0102380964', 'Union Bank', 'Nil', '07018789792', '22500332649', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (145, '1145', 'DAHIRU', 'MUHAMMED', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '5329361011', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (146, '1146', 'ABEDA', 'KUMAGA', 'SAMUEL', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0102673400', 'Union Bank', 'Nil', '08129215784', '22453216010', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (147, '1147', 'AGYEMA', 'SOJA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0101235586', 'Union Bank', 'Nil', '07080721832', '22477482930', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (148, '1148', 'UMAR', 'SULEIMAN', 'UMAR', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '4791371016', 'FCMB', 'Nil', '08088175611', '22454663189', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (149, '1149', 'ABDULLAHI', 'UMARU', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '5335669015', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (150, '1150', 'USMAN', 'ZAKARI', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '5326361010', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (151, '1151', 'SHUAIBU', 'ZUBAIRU', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0101213344', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (152, '1152', 'MOHAMMED', 'MOHAMMED', 'AHMED', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '4223069968', 'Eco bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (153, '1153', 'MUHAMMED ', 'BABA', 'ADAMU', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0012418108', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (154, '1154', 'MOHAMMED ', 'SANUSI', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0739243440', 'Access Bank', 'Nil', '08120898428', '22447744398', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (155, '1155', 'HASSAN', 'MURTALA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0084457694', 'Union Bank', 'NIL', '09071729134', '22475792644', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (156, '1156', 'SULE', 'NDAGI', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '5163031011', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (157, '1157', 'RABIU', 'UMAR', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0101454895', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (158, '1158', 'SALE', 'MUSA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0036008383', 'Diamond Bank', 'NIL', '09076398753', '22388131079', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (159, '1159', 'MOHAMMED', 'BAWA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '5281944019', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (160, '1160', 'ALIYU', 'TANKO', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '5382231010', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (161, '1161', 'ABDULLAHI', 'MUHAMMAD', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0106195212', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (162, '1162', 'UMAR', 'YAKUBU', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0100032757', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (163, '1163', 'ABUBAKAR', 'IBRAHIM', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0102154903', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (164, '1164', 'KORAU', 'AUDU', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '4790403017', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (165, '1165', 'USMAN', 'ARMAYAU', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0101308091', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (166, '1166', 'ABUBAKAR', 'D.', 'SULEIMAN', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0037807264', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (167, '1167', 'ALHAJI', 'AMINA', 'L', 'Female', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0102542698', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (168, '1168', 'MOHAMMED', 'BASIRU', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0021202883', 'UNITY BANK', 'NIL', '08088635021', '22290548868', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (169, '1169', 'ABDULLAHI', 'SARATU', '', 'Female', 'ADMIN', 'chef', 'UNSKILL', 26650.00, '', '0107347269', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (170, '1170', 'UMAR', 'ZAINAB', '', 'Female', 'ADMIN', 'chef', 'UNSKILL', 26650.00, '', '0104768326', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (171, '1171', 'USMAN', 'ADAMA', '', 'Female', 'ADMIN', 'chef', 'UNSKILL', 26650.00, '', '0103624746', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (172, '1172', 'ALI', 'KAMALLUDDEEN', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0116714977', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (173, '1173', 'NAFIU', 'ABDULLAHI', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '2119964390', 'Zenith Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (174, '1174', 'MALL MIKAILU', 'ABDULLAHI', 'RIDWAN', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0035421318', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (175, '1175', 'USMAN', 'DANKISHIYA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0101556988', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (176, '1176', 'ABUBAKAR', 'IBRAHIM', 'MUHAMMAD', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0432590161', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (177, '1177', 'ZAKARI', 'NUHU', 'ATTAJIRI', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0431850426', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (178, '1178', 'ABDULLAHI', 'MUSA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0116749117', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (179, '1179', 'ADAMU', 'UMAR', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0116936184', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (180, '1180', 'AEL', 'IORLUMUN', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0117265593', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (181, '1181', 'AHMED', 'ISA', '', 'Male', 'ADMIN', 'sanitation', 'UNSKILL', 26650.00, '', '0118858042', 'Union Bank', 'NIL', '09017162765', '22531802674', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (182, '1182', 'ABDULLAHI', 'HASSAN', '', 'Male', 'Security ', 'gateman', 'UNSKILL', 26650.00, '', '0040246478', 'Union Bank', 'hassanabdullahiawe@gmail.com', '07012080805', '22476167539', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (183, '1183', 'ISHAKA ', 'MOHAMMED', 'L', 'Male', 'Security ', 'gateman', 'UNSKILL', 26650.00, '', '0099252035', 'Union Bank', 'Nil', '09022536308', '22499583509', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (184, '1184', 'MUSTAPHA,', 'HARUNA', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0234536396', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (185, '1185', 'HASSAN', 'RAHMATU', '', 'Female', 'ADMIN', 'chef', 'UNSKILL', 26650.00, '', '0091584686', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (186, '1186', 'DOOM', 'DANIEL', '', 'Male', 'Security ', 'Security guard', 'UNSKILL', 26650.00, '', '0107952805', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (187, '1187', 'ADAMU', 'IBRAHIM', '', 'Male', 'Security ', 'Security guard', 'UNSKILL', 26650.00, '', '4931488019', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (188, '1188', 'MAHAMMADU', 'MARYAM', '', 'Male', 'Security ', 'Security guard', 'UNSKILL', 26650.00, '', '0106349314', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (189, '1189', 'MOHAMMED', 'DANMAMA', 'ADAMUD', 'Male', 'Security ', 'Security guard', 'UNSKILL', 26650.00, '', '4802789018', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (190, '1190', 'USMAN,', 'UMAR', '', 'Male', 'ADMIN', 'sanitation', 'UNSKILL', 26650.00, '', '0162599702', 'GTB', 'umarusmantunga@gmail.com', '08124784291', '22374460686', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (191, '1191', 'AYAAKAA', 'THADDEUS', '', 'Male', 'ADMIN', 'sanitation', 'UNSKILL', 26650.00, '', '0065958008', 'Union Bank', 'Nil', '08025704988', '22444439794', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (192, '1192', 'ISA', 'ISMAILA', '', 'Male', 'ADMIN', 'sanitation', 'UNSKILL', 26650.00, '', '0121309054', 'Union Bank', 'Nil', '07089363198', '22489028346', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (193, '1193', 'MUJAHID', 'DAUDA', '', 'Male', 'ADMIN', 'sanitation', 'UNSKILL', 26650.00, '', '0121327913', 'Union Bank', 'Nil', '07010464883', '22535891111', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (194, '1194', 'FRIDAY', 'PAUL', '', 'Male', 'ADMIN', 'sanitation', 'UNSKILL', 26650.00, '', '0121829091', 'Union Bank', 'Nil', '07012320108', '22536384900', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (195, '1195', 'MUSA', 'YAKUBU', 'ZAKARI', 'Male', 'Technical services', 'stores assistant', 'UNSKILL', 26650.00, '', '0123185146', 'Union Bank', 'Nil', '09029788222', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (196, '1196', 'ABDULLAHI', 'KHALID', 'USMAN', 'Male', 'Technical services', 'stores assistant', 'UNSKILL', 26650.00, '', '5096973019', 'FCMB', 'Nil', '08083800178', '22386317204', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (197, '1197', 'MUHAMMED', 'ABDULLAHI,', 'MUHAMMED', 'Male', 'Technical services', 'stores assistant', 'UNSKILL', 26650.00, '', '0451630176', 'GTB', 'muhammedabdullahimuhammed@gmail.com', '08028046595', '22505969105', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (198, '1198', 'MUSA', 'HASSAN', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0101101027', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (199, '1199', 'ABUBAKAR,', 'ABDULRAHIM', '', 'Male', 'Technical services', 'survey assistant', 'SKILL', 28600.00, '', '0223314099', 'GTB', 'Nil', '08020306663', '22321598543', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (200, '1200', 'TARAZIU', 'UMAR', 'TUNGA', 'Male', 'Technical services', 'survey assistant', 'SKILL', 28600.00, '', '5056521010', 'FCMB', 'umartaraziu2020@gmail.com', '08120947370', '22412107762', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (201, '1201', 'YUNUSA', 'SULEIMAN', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0084837221', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (202, '1202', 'ABDULLAHI', 'SHITU', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '2106533769', 'UBA', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (203, '1203', 'SARKI', 'ABUBAKAR', '', 'Male', 'irrigation', 'irrigation maintenance', 'SKILL', 26650.00, '', '0101160008', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (204, '1204', 'ELKANA', 'AJAMA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101151675', 'Union Bank', 'Nil', '07010985682', '22501186632', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (205, '1205', 'JIBRIN', 'HUZAIFA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0102422938', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (206, '1206', 'ABDULLAHI', 'DANLADI', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0031023549', 'Union Bank', 'Nil', '08125700243', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (207, '1207', 'ABUBAKAR', 'HABILA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0093142837', 'Union Bank', 'Nil', '07014665106', '22484471431', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (208, '1208', 'DANGANA', 'AKOSA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101161218', 'Union Bank', 'Nil', '09075128645', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (209, '1209', 'YOHANNA', 'HOSEA', 'AJAMA', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101135600', 'Union Bank', 'hoseayohana001@gmail.com', '08129773329', '22503345619', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (210, '1210', 'ADAMU', 'SHALELE', 'SANI', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101156515', 'Union Bank', 'abachashelele2@gmail.com', '07018820081', '22451118330', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (211, '1211', 'ADAMU', 'GAMBO', 'ATUBA', 'Male', 'Technical services', 'boilermaker', 'SKILL', 26650.00, '', '4953833019', 'FCMB', 'Nil', '07016508388', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (212, '1212', 'ISMAILA', 'ABDULLAHI', '', 'Male', 'irrigation', 'irrigation maintenance', 'SKILL', 26650.00, '', '0101209583', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (213, '1213', 'AHMAD', 'ABDULHAMID', '', 'Male', 'Technical services', 'pump operator', 'SKILL', 26650.00, '', '0250138538', 'GTB', 'Nil', '07088558188', '22443014121', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (214, '1214', 'TUWASE', 'ABAWA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101245734', 'Union Bank', 'Nil', '08083491943', '22503193061', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (215, '1215', 'YAHUZA', 'HARUNA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0083102807', 'Diamond Bank', 'Nil', '07017179057', '22405476624', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (216, '1216', 'MOHAMMAD', 'HUSSEINI', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101207682', 'Union Bank', 'Nil', '07077440882', '22503345761', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (217, '1217', 'SOLOMON', 'EMMANUEL', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101150977', 'Union Bank', 'emmanuelsolomon001@gmail.com', '07087354472', '22502936362', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (218, '1218', 'ABDULSALAM', 'IMAM', 'YAHUZA', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101155635', 'Union Bank', '', '07081191880', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (219, '1219', 'MUSA', 'ILIYASU', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101448016', 'Union Bank', '', '07087578717', '22503346296', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (220, '1220', 'MOSES', 'PAUL', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0102511669', 'Union Bank', 'mosespaulalayin241@yahoo.com', '08022728712', '22499588753', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (221, '1221', 'MUHAMMED', 'SADANU', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101227349', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (222, '1222', 'MATHIAS', 'AJAMA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101135648', 'Union Bank', '', '07016733130', '22501996495', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (223, '1223', 'YAHAYA ', 'YAKUBU', 'FARANSA', 'Male', 'irrigation', 'irrigation maintenance', 'SKILL', 26650.00, '', '2120824025', 'Zenith Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (224, '1224', 'DANTANI', 'DANTALA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0066253762', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (225, '1225', 'ASOLA', 'ALFA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101297513', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (226, '1226', 'ABAWA', 'SAMAILA', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '4788719014', 'FCMB', 'samailaabawa@gmail', '07080969788', '22446389820', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (227, '1227', 'MIKA', 'IRIMIYA', '', 'Male', 'Agriculture', 'dozer operator', 'SKILL', 26650.00, '', '0101158038', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (228, '1228', 'IBRAHIM', 'YAKUBU', 'ABUBAKAR', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0091001684', 'Union Bank', 'faransa509@gmail.com', '07011500992', '22336942920', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (229, '1229', 'ABDULRAZAK', 'HAMIDU', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101288609', 'Union Bank', '', '08082498196', '22503218069', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (230, '1230', 'IBRAHIM', 'AHMADU', '', 'Male', 'Security ', 'security guard', 'UNSKILL', 26650.00, '', '0101469237', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (231, '1231', 'MUSA', 'ADAMU', '', 'Male', 'irrigation', 'irrigation maintenance', 'SKILL', 26650.00, '', '0101101704', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (232, '1232', 'ASHESHI', 'DANLADI', 'ENOCH', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0101157275', 'Union Bank', '', '07082620104', '22503367206', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (233, '1233', 'VIGHE', 'EZEKIEL', 'T', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0060865989', 'Union Bank', '', '07018325876', '22432849279', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (234, '1234', 'YUSUF', 'AYOLE', 'ADAMU', 'Male', 'irrigation', 'pump operator', 'SKILL', 26650.00, '', '0023363523', 'IBTC', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (235, '1235', 'UMAR', 'MUBARAK', '', 'Male', 'irrigation', 'irrigation maintenance', 'SKILL', 26650.00, '', '0101308754', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (236, '1236', 'MUSA', 'SADIQ', '', 'Male', 'irrigation', 'irrigation maintenance', 'SKILL', 26650.00, '', '0036788005', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (237, '1237', 'IBRAHIM', 'ADAMU', 'SHALELE', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '5308129012', 'FCMB', '', '08086108055', '22507745792', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (238, '1238', 'ABUBAKAR', 'ABDULLAHI', '', 'Male', 'irrigation', 'irrigation maintenance', 'SKILL', 26650.00, '', '0101220326', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (239, '1239', 'YUSUF', 'IBRAHIM', '', 'Male', 'irrigation', 'irrigation maintenance', 'SKILL', 26650.00, '', '0101234785', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (240, '1240', 'DAHIRU', 'MUSA', '', 'Male', 'Security ', 'security guard', 'SKILL', 26650.00, '', '0102307682', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (241, '1241', 'KADIRI', 'ENOCH', 'DANLAMI', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0154221121', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (242, '1242', 'IBRAHIM', 'BAGARE', '', 'Male', 'Security ', 'security guard', 'SKILL', 26650.00, '', '0101225682', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (243, '1243', 'MOHAMMED', 'MUSA', '', 'Male', 'irrigation', 'pump operator', 'SKILL', 26650.00, '', '0102633677', 'Union Bank', 'kalamullahtunga@gmail.com', '07084285957', '22296829695', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (244, '1244', 'MUHAMMED', 'SULE', 'SULEIMAN', 'Male', 'irrigation', 'pump operator', 'SKILL', 26650.00, '', '6555328045', 'FIDELITY', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (245, '1245', 'USMAN', 'SALIHU', 'ABDULLAHI', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0455177406', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (246, '1246', 'YAHAYA', 'MOHAMMED', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0102315609', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (247, '1247', 'IBRAHIM', 'TANKO', '', 'Male', 'Agriculture', 'irrigator', 'SKILL', 26650.00, '', '0035431054', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (248, '1248', 'ALI', 'GADAFI', '', 'Male', 'irrigation', 'pump operator', 'SKILL', 26650.00, '', '0102095376', 'Union Bank', '', '09029796967', '22496737318', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (249, '1249', 'ABUBAKAR', 'HARUNA', '', 'Male', 'Technical services', 'survey assistant', 'SKILL', 39000.00, '', '5199797019', 'FCMB', 'harunaabubakar1988@gmail.com', '08025466713', '22471305169', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (250, '1250', 'ALI', 'SAFIYANU', '', 'Male', 'Agriculture', 'grader operator', 'SKILL', 39000.00, '', '0101236143', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (251, '1251', 'IBRAHIM', 'MUHAMMED', 'KHAMIS', 'Male', 'Data Magement', 'Data Clerk', 'SKILL', 33800.00, '', '5216153011', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (252, '1252', 'MURWANU', 'NASIRU', 'MUHAMMED', 'Male', 'Technical services', 'FUEL Attendant', 'SKILL', 31200.00, '', '5296548017', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (253, '1253', 'DAUDA', 'HALIDU', '', 'Male', 'Technical services', 'Fuel Clerk', 'SKILL', 33800.00, '', '0041831738', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (254, '1254', 'SHINKUT ', 'MUGU', 'JONATHAN', 'Male', 'Technical services', 'FUEL Attendant', 'SKILL', 31200.00, '', '3023031011', 'First Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (255, '1255', 'JIBRIN ', 'USMAN', '', 'Male', 'Technical services', 'FUEL Attendant', 'SKILL', 31200.00, '', '0044013409', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (256, '1256', 'DANLAMI', 'USMAN', 'W', 'Male', 'Technical services', 'Fuel Clerk', 'SKILL', 33800.00, '', '0063265580', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (257, '1257', 'YUSUF ', 'BALA', '', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0116791446', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (258, '1258', 'ALKASIMU', 'KASIMU', '', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '6348709011', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (259, '1259', 'GAMBO', 'CHINDO', '', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0121598317', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (260, '1260', 'MOHAMMED ', 'SALEH', '', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0428124019', 'FCMB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (261, '1261', 'MOHAMMED ', 'TANKO', '', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0070664347', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (262, '1262', 'MOHAMMED ', 'ABUBAKAR', 'T', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0123759794', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (263, '1263', 'ABDULLAHI', 'IBRAHIM', 'U', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0035427585', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (264, '1264', 'AHMED ', 'SHAYA', 'U', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0035429431', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (265, '1265', 'KASIMU ', 'JAFARU', '', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0096359379', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (266, '1266', 'BALA', 'UMAR', '', 'Male', 'Security ', 'Forest Observer', 'UNSKILL', 26650.00, '', '0124075882', 'Union Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (267, '1267', 'YUNUSA', 'OSHAFU', 'HAMZA', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '033671139', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (268, '1268', 'MOHAMMED', 'ATTAYI ', 'I', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (269, '1269', 'DAAN', 'JOB', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (270, '1270', 'ALIYU', 'MUHAMMAD', 'T', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '0039016704', 'Access', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (271, '1271', 'JACOB', 'MAKU', '', 'Male', 'ADMIN', 'vehicle driver', 'SKILL', 36400.00, '', '3062501047', 'First Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (272, '1272', 'KABIRU,', 'MUSA', 'IBRAHIM', 'Male', 'ADMIN', 'ASST. DATA', 'SKILL', 55000.00, '', '0200596739', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (273, '1273', 'SHURAH', 'HARUNA', 'ZAKARI', 'Male', 'Finance', 'Finance Asst.', 'SKILL', 55000.00, '', '0038782519', 'Diamond Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (274, '1274', 'AMINU ', 'JOSEPH', 'ARIKO', 'Male', 'Technical services', 'CRANE OPT', 'SKILL', 39000.00, '', '0231161320', 'GTB', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (275, '1275', 'SHEHU', 'MOHAMMED', '', 'Male', 'Technical services', 'CRANE OPT', 'SKILL', 39000.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (276, '1276', 'MOSES ', 'LABA', '', 'Male', 'Technical services', 'MECHANIC', 'SKILL', 39000.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (277, '1277', 'PETER', 'FRIDAY', '', 'Male', 'Technical services', 'WELDER', 'SKILL', 39000.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (278, '1278', 'SULEIMAN', 'JIBRIN', '', 'Male', 'Technical services', 'ELECTRICIAN', 'SKILL', 39000.00, '', '0351217039', 'Eco Bank', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (279, '1279', 'IMRAN ', 'MOHAMMED ', 'AHMED', 'Male', 'Data Magement', 'IT TECHNICIANS', 'SKILL', 55000.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (280, '1280', 'DOOGA', 'CLEMENT', 'AONDOWASE', 'Male', 'Technical services', 'survey assistant', 'SKILL', 33800.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (281, '1281', 'MUHAMMED', 'KAMALUDEEN', 'A', 'Male', 'Technical services', 'survey assistant', 'SKILL', 39000.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (282, '1282', 'AHMAD', 'ISA', 'SAIDU', 'Male', 'Technical services', 'survey assistant', 'SKILL', 39000.00, '', '', '', '', '', '', 'ST01', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'SANUSI ', 'USMAN', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ISA', 'ZAINAB', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'UZAIRU ', 'SANI', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'HABU', 'INDATU', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ROGO', 'MARYAM ', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'MUSA', 'HALIMA', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ADAMU', 'MAIMUNA', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'USMAN', 'HUDU', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'MOHAMMED', 'HAJARA', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'SULE', 'HAUWA', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'MOHAMMED ', 'ZIAULHAQ ', 'SHEHU', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'KHALIFA ', 'ADAMU', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'BULALA', 'ABDULMIMIN ', 'YAHUZA', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'UMAR ', 'MARYAM', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'HASSAN', 'ZUWAIRA ', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'USMAN', 'AISHA', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'IDRIS', 'HAUWA ', 'JEGA', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'SHARABILU ', 'ILIYASU', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ATOBI ', 'ADUNIYA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ELIKANA', 'GODIYA', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ADAMU', 'AMINA', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'YUNUSA', 'KHADIJA ', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'YAKUBU', 'AISHA', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'YAKUBU', 'HALIMA ', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'MUSA', 'MARYAM', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'SHUAIBU ', 'MOHAMMED', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'YAKUBU', 'PATU', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'NUHU  ', 'ABUBAKAR', '.I.', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABDULAHI ', 'ASO', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'JABIRU ', 'HAMZA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'USMAN', 'GAMBO', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'UBANDOMA', 'HASSAN', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'MOHAMMED  ', 'WAZIRI', 'KASSIM', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'BABA ', 'MOHAMMED', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'UMAR ', 'BABAN', 'KWATA', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'UMAR ', 'MOHAMMED', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'LAGU', 'MARYAM', 'ALHAJI', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'VIGH', 'GODWIN', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'SULEIMAN ', 'ISKILU', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABDULKARIM ', 'ABUBAKAR', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'AHMED ', 'ISA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'YAKUBU ', 'MUSA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'IBRAHIM ', 'AKWE', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABDULLAHI ', 'ISIYAKA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'HASSAN ', 'ALI', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ALHASSAN ', 'IBRAHIM', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'DAVID ', 'SAMSON', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABDULLAHI ', 'HASHIMU', '', 'Female', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'SADAM ', 'DANTALA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'KASIMU ', 'DANTANI', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'EZEKIEL ', 'JOHN', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABUBAKAR .S. ', 'SHALELE', '.S. ', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'SABO ', 'MURTALA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'SHAMSU ', 'USMAN', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABUBAKAR ', 'IBRAHIM', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'MUSTAPHA ', 'HASSAN', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'DAVID ', 'OBAM', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'HASSAN', 'ALI', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABDULGANIYU', 'DANTALA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABDULRAHAM', 'ABUBAKAR', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'IBRAHIM', 'HALADU', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'AZUKA', 'USMAN', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'BASHIR', 'MUSA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'ABUBAKAR', 'SULEIMAN', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'TERPASE', 'TARBO', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'GADDAFI', 'AHMED', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'DAHIRU', 'YAHAYA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'HARUNA', 'MUSA', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'YAHAYA', 'TANKO', '', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);
INSERT INTO `temporary_migration` VALUES (11111, '111111', 'MAMUDA', 'ADAMU', '.B.', 'Male', 'Agriculture', 'General Work', 'UNSKILL', 26650.00, '', '', '', '', '', '', 'ST02', NULL);

-- ----------------------------
-- Table structure for time_sheet
-- ----------------------------
DROP TABLE IF EXISTS `time_sheet`;
CREATE TABLE `time_sheet`  (
  `sheet_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `department_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `section_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `job_allocation` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `started_at` date NOT NULL,
  `expired_at` date NULL DEFAULT NULL,
  `status` int(1) UNSIGNED ZEROFILL NULL DEFAULT 0,
  `approved_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `approved_at` datetime(0) NULL DEFAULT NULL,
  `staff_type_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`department_id`, `started_at`, `staff_type_id`) USING BTREE,
  INDEX `sheet_id`(`sheet_id`) USING BTREE,
  INDEX `staff_type_id_fk`(`staff_type_id`) USING BTREE,
  CONSTRAINT `department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `staff_type_id_fk` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`staff_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of time_sheet
-- ----------------------------
INSERT INTO `time_sheet` VALUES ('00431189003612381630', 'dep09', '#', NULL, 'b@yahoo.com', '2020-01-28 12:38:16', '2020-01-01', '2020-01-05', 1, NULL, NULL, 'ST01');

-- ----------------------------
-- Table structure for time_sheet_capture
-- ----------------------------
DROP TABLE IF EXISTS `time_sheet_capture`;
CREATE TABLE `time_sheet_capture`  (
  `sheet_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `staff_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `created_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `approved_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `approved_at` datetime(0) NULL DEFAULT NULL,
  `ot` int(11) NULL DEFAULT NULL,
  `numb_days` int(11) NULL DEFAULT NULL,
  `absent` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`sheet_id`, `staff_id`) USING BTREE,
  INDEX `fk_staff_id`(`staff_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of time_sheet_capture
-- ----------------------------
INSERT INTO `time_sheet_capture` VALUES ('00431189003612381630', 'B9001', 1, 'b@yahoo.com', '2020-01-28 12:38:30', NULL, NULL, 0, 6, 0, '2020-01-28 12:38:30');
INSERT INTO `time_sheet_capture` VALUES ('00431189003612381630', 'B9002', 1, 'b@yahoo.com', '2020-01-28 12:38:31', NULL, NULL, 0, 6, 0, '2020-01-28 12:38:31');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `othername` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_phone` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `passchg_logon` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pass_expire` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pass_dateexpire` datetime(0) NULL DEFAULT NULL,
  `user_disabled` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_locked` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `day_1` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `day_2` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `day_3` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `day_4` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `day_5` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `day_6` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `day_7` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `override_wh` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pin_missed` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `modified` datetime(0) NULL DEFAULT NULL,
  `hint_question` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `hint_answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `department_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (23, 'Ese', 'Uvbiekpahor', 'Kelvin', 'male', 'bala@yahoo.com', '2019-09-17', NULL, '$2y$10$a4KmzC/6vEVtpRD0A.O4wuAlvD4aN6zdVOXUNA8kpzoqeYoII9Auu', '08097191027', '0', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, 'bala@yahoo.com', 'lMregGyG74OcMgcvJWjoHA2uKddAJERLvz7bKzhWZFDRuxY43UIEIO0hkQi3', '2019-09-17 15:51:27', '2019-12-07 16:31:45', 'dep06');
INSERT INTO `users` VALUES (25, 'Adamu', 'Moah', 'Junaidu', 'male', 'a@yahoo.com', '1971-05-04', NULL, '$2y$10$zPvtmV7hG9SMGCbbN75pte2AwiID0CxUj9MpSYdGPWLZxYJBlCWVK', '08097191027', '0', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, 'a@yahoo.com', NULL, '2019-11-05 16:01:40', '2019-12-07 16:32:08', 'dep09');
INSERT INTO `users` VALUES (26, 'Victor', 'Mabuba', NULL, 'female', 'b@yahoo.com', '1995-11-15', NULL, '$2y$10$nwzzZujg9gyVeYwpjMv6aOXk5Gsfrjb/xBhIqhr6RE.IK.hTvmHeO', '08097191027', '0', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, 'bala@yahoo.com', NULL, '2019-11-05 16:02:56', '2019-12-07 16:32:25', 'dep06');
INSERT INTO `users` VALUES (27, 'Support', 'Staff', NULL, NULL, 'c@yahoo.com', '1995-11-23', NULL, '$2y$10$Enw/ICAXCyBsbBxDJiB4v.r8d0erbU4t2rJz5Xp/mwn4EKsJGlH06', '08097191027', '0', NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, 'bala@yahoo.com', NULL, '2019-11-05 16:26:55', '2019-12-07 16:33:18', 'dep06');

-- ----------------------------
-- View structure for designation_salary_view
-- ----------------------------
DROP VIEW IF EXISTS `designation_salary_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `designation_salary_view` AS SELECT
designation.category_id,
designation.designation_name,
Sum(designation_salary_package.monthly_amount) AS monthly_amount,
designation_salary_package.created_by,
designation_salary_package.created_at,
department.department_id,
department.department_name,
designation.staff_type_id,
staff_type.staff_type_name,
designation.designation_id
FROM
designation_salary_package
LEFT JOIN designation ON designation_salary_package.designation_id = designation.designation_id
INNER JOIN salary_description ON designation_salary_package.salary_desc_code = salary_description.salary_desc_code
LEFT JOIN department ON designation.department_id = department.department_id
LEFT JOIN staff_type ON designation.staff_type_id = staff_type.staff_type_id
GROUP BY
designation_salary_package.designation_id ;

-- ----------------------------
-- View structure for designation_view
-- ----------------------------
DROP VIEW IF EXISTS `designation_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `designation_view` AS SELECT
designation.designation_id,
department.department_name,
designation.designation_name,
job_category.category_name,
designation.created_by,
designation.created_at,
department.department_id,
job_category.category_id
FROM
designation
INNER JOIN department ON designation.department_id = department.department_id
INNER JOIN job_category ON designation.category_id = job_category.category_id ;

-- ----------------------------
-- View structure for payroll_departmental_view
-- ----------------------------
DROP VIEW IF EXISTS `payroll_departmental_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `payroll_departmental_view` AS SELECT
department.department_id,
department.department_name,
payroll_creation.payroll_id,
payroll_creation.created_by,
payroll_creation.created_at,
payroll_creation.month_of,
payroll_creation.`status`,
payroll_creation.rollback_at,
payroll_creation.rollback_by,
Sum(payroll_staff_record.amount) AS monthly_net,
staff_type.staff_type_name,
payroll_creation.staff_type_id
FROM
department
INNER JOIN payroll_creation ON payroll_creation.department_id = department.department_id
LEFT JOIN payroll_staff_record ON payroll_staff_record.payroll_id = payroll_creation.payroll_id
INNER JOIN staff_type ON payroll_creation.staff_type_id = staff_type.staff_type_id
GROUP BY
payroll_creation.payroll_id ;

-- ----------------------------
-- View structure for payroll_view
-- ----------------------------
DROP VIEW IF EXISTS `payroll_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `payroll_view` AS SELECT
payroll_creation.payroll_id,
payroll_staff_record.staff_id,
staff.first_name,
staff.last_name,
staff.other_name,
payroll_creation.month_of,
Sum(payroll_staff_record.amount) AS monthly_net,
department.department_name,
payroll_creation.created_at,
payroll_creation.created_by,
designation.designation_id,
designation.department_id,
payroll_staff_record.cat_group_id,
designation.designation_name,
payroll_creation.`status`,
payroll_staff_record.updated_at,
payroll_staff_record.updated_by,
bank_bincodes.bank,
staff.account_name,
staff.account_number,
payroll_staff_record.default_working_days,
payroll_staff_record.absence_from_work,
payroll_staff_record.absent_deduction,
payroll_staff_record.days_worked,
payroll_staff_record.payee,
payroll_staff_record.gross_salary,
payroll_staff_record.overtime_hrs,
payroll_staff_record.advance,
payroll_staff_record.arrears,
payroll_staff_record.overtime_pay
FROM
payroll_creation
LEFT JOIN payroll_staff_record ON payroll_staff_record.payroll_id = payroll_creation.payroll_id
LEFT JOIN staff ON staff.staff_id = payroll_staff_record.staff_id
INNER JOIN designation ON staff.designation_id = designation.designation_id
INNER JOIN department ON designation.department_id = department.department_id
LEFT JOIN bank_bincodes ON staff.bin_code = bank_bincodes.bin_code
GROUP BY
payroll_staff_record.cat_group_id ;

-- ----------------------------
-- View structure for staff_other_allowance_view
-- ----------------------------
DROP VIEW IF EXISTS `staff_other_allowance_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `staff_other_allowance_view` AS SELECT
staff_other_allowances.staff_id,
staff.first_name,
staff.last_name,
staff.other_name,
staff.gender,
salary_description.item_name,
staff_other_allowances.created_at,
staff_other_allowances.created_by,
staff_other_allowances.monthly_amount,
staff.designation_id
FROM
staff_other_allowances
INNER JOIN staff ON staff_other_allowances.staff_id = staff.staff_id
INNER JOIN salary_description ON staff_other_allowances.salary_desc_code = salary_description.salary_desc_code ;

-- ----------------------------
-- View structure for staff_time_sheet_view
-- ----------------------------
DROP VIEW IF EXISTS `staff_time_sheet_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `staff_time_sheet_view` AS SELECT
time_sheet_capture.sheet_id,
staff.first_name,
staff.last_name,
staff.other_name,
time_sheet_capture.created_by,
time_sheet_capture.created_at,
time_sheet_capture.ot,
time_sheet_capture.numb_days,
time_sheet_capture.absent,
time_sheet.`status`,
staff.staff_id,
time_sheet.started_at,
department.department_id,
department.department_name,
staff.staff_type_id,
time_sheet.section_id
FROM
time_sheet_capture
INNER JOIN staff ON time_sheet_capture.staff_id = staff.staff_id
INNER JOIN time_sheet ON time_sheet_capture.sheet_id = time_sheet.sheet_id
INNER JOIN department ON time_sheet.department_id = department.department_id ;

-- ----------------------------
-- View structure for staff_view
-- ----------------------------
DROP VIEW IF EXISTS `staff_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `staff_view` AS SELECT
staff.staff_id,
staff.first_name,
staff.last_name,
staff.other_name,
staff.marital_status,
staff.dob,
staff.gender,
staff.address,
lga.State,
lga.lga,
staff.mobile_phone,
staff.email,
staff.created_by,
staff.created_at,
bank_bincodes.bin_code,
bank_bincodes.bank,
staff.account_name,
staff.account_number,
staff.bvn,
department.department_name,
designation.designation_name,
staff.staff_type_id,
staff_type.staff_type_name,
department.department_id,
staff.`status`,
section.section_name,
staff.section_id,
staff.designation_id,
job_category.category_name,
designation.category_id,
lga.stateid,
lga.lgaid,
staff.engagement_date
FROM
staff
LEFT JOIN lga ON staff.lgaid = lga.lgaid
INNER JOIN designation ON staff.designation_id = designation.designation_id
LEFT JOIN bank_bincodes ON staff.bin_code = bank_bincodes.bin_code
INNER JOIN department ON designation.department_id = department.department_id
INNER JOIN staff_type ON staff.staff_type_id = staff_type.staff_type_id
LEFT JOIN section ON staff.section_id = section.section_id
LEFT JOIN job_category ON designation.category_id = job_category.category_id ;

-- ----------------------------
-- View structure for time_sheet_view
-- ----------------------------
DROP VIEW IF EXISTS `time_sheet_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `time_sheet_view` AS SELECT
time_sheet.sheet_id,
department.department_name,
time_sheet.section_id,
time_sheet.created_at,
time_sheet.`status`,
time_sheet.approved_by,
time_sheet.approved_at,
time_sheet.job_allocation,
time_sheet.created_by,
time_sheet.started_at,
time_sheet.expired_at,
department.department_id,
time_sheet.staff_type_id,
section.section_name,
staff_type.staff_type_name
FROM
time_sheet
INNER JOIN department ON time_sheet.department_id = department.department_id
LEFT JOIN section ON section.department_id = department.department_id AND time_sheet.section_id = section.section_id
INNER JOIN staff_type ON time_sheet.staff_type_id = staff_type.staff_type_id ;

SET FOREIGN_KEY_CHECKS = 1;
