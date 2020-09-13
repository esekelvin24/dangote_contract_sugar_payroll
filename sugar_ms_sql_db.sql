/*
 Navicat Premium Data Transfer

 Source Server         : MSSQL
 Source Server Type    : SQL Server
 Source Server Version : 14001000
 Source Host           : LTREFIK-212\SQLEXPRESS:1433
 Source Catalog        : dangote_sugar_payroll
 Source Schema         : dbo

 Target Server Type    : SQL Server
 Target Server Version : 14001000
 File Encoding         : 65001

 Date: 13/09/2020 15:16:24
*/


-- ----------------------------
-- Table structure for bank_bincodes
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[bank_bincodes]') AND type IN ('U'))
	DROP TABLE [dbo].[bank_bincodes]
GO

CREATE TABLE [dbo].[bank_bincodes] (
  [bin_code] varchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [bank] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[bank_bincodes] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of bank_bincodes
-- ----------------------------
INSERT INTO [dbo].[bank_bincodes] VALUES (N'011', N'First Bank of Nigeria')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'023', N'CitiBank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'030', N'Heritage')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'032', N'Union Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'033', N'United Bank for Africa')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'035', N'Wema Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'044', N'Access Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'050', N'Ecobank Plc')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'057', N'Zenith Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'058', N'GTBank Plc')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'063', N'Diamond Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'068', N'Standard Chartered Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'070', N'Fidelity Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'076', N'Skye Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'082', N'Keystone Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'084', N'Enterprise Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'100', N'SunTrust Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'214', N'First City Monument Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'215', N'Unity Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'221', N'Stanbic IBTC Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'232', N'Sterling Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'301', N'JAIZ Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'302', N'Eartholeum')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'303', N'ChamsMobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'304', N'Stanbic Mobile Money')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'305', N'Paycom')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'306', N'eTranzact')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'307', N'EcoMobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'308', N'FortisMobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'309', N'FBNMobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'311', N'ReadyCash (Parkway)')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'313', N'Mkudi')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'314', N'FET')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'315', N'GTMobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'317', N'Cellulant')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'318', N'Fidelity Mobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'319', N'TeasyMobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'320', N'VTNetworks')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'322', N'ZenithMobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'323', N'Access Money')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'324', N'Hedonmark')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'325', N'MoneyBox')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'326', N'Sterling Mobile')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'327', N'Pagatech')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'328', N'TagPay')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'329', N'PayAttitude Online')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'401', N'ASO Savings and & Loans')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'402', N'Jubilee Life Mortgage Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'403', N'SafeTrust Mortgage Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'415', N'Imperial Homes Mortgage Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'501', N'Fortis Microfinance Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'523', N'Trustbond')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'526', N'Parralex')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'551', N'Covenant Microfinance Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'552', N'NPF MicroFinance Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'559', N'Coronation Merchant Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'560', N'Page MFBank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'601', N'FSDH')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'990', N'Omoluabi Mortgage Bank')
GO

INSERT INTO [dbo].[bank_bincodes] VALUES (N'999', N'NIP Virtual Bank')
GO


-- ----------------------------
-- Table structure for department
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[department]') AND type IN ('U'))
	DROP TABLE [dbo].[department]
GO

CREATE TABLE [dbo].[department] (
  [department_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [department_name] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[department] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO [dbo].[department] VALUES (N'dep01', N'Finance & Budget', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO

INSERT INTO [dbo].[department] VALUES (N'dep02', N'Technical Services', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO

INSERT INTO [dbo].[department] VALUES (N'dep03', N'Agriculture', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO

INSERT INTO [dbo].[department] VALUES (N'dep04', N'Irrigation', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO

INSERT INTO [dbo].[department] VALUES (N'dep05', N'Civil Engineering', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO

INSERT INTO [dbo].[department] VALUES (N'dep06', N'Admin', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO

INSERT INTO [dbo].[department] VALUES (N'dep07', N'Security', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO

INSERT INTO [dbo].[department] VALUES (N'dep08', N'Cane Haulage', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO

INSERT INTO [dbo].[department] VALUES (N'dep09', N'Data Management', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 16:40:10')
GO


-- ----------------------------
-- Table structure for designation
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[designation]') AND type IN ('U'))
	DROP TABLE [dbo].[designation]
GO

CREATE TABLE [dbo].[designation] (
  [designation_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [designation_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [department_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL,
  [category_id] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [staff_type_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[designation] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of designation
-- ----------------------------
INSERT INTO [dbo].[designation] VALUES (N'100', N'Data Capture Clerk', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'101', N'Chef', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'102', N'Stores Assistant', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'103', N'Supervisor', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat05', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'104', N'Security Supervisor', N'dep07', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'105', N'Timekeeper', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'106', N'Tractor Driver', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'107', N'Excavator Operator', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'108', N'Planting Supervisor', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat05', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'109', N'Grader Operator', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'110', N'Dozer Operator', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'111', N'Plant Mechanic', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'112', N'Land Prep Tractor Driver', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'113', N'Truck Driver', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'114', N'Assistant Plant Mechanic', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'115', N'Electrical Maintenance', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'116', N'Civils Supervisor', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat05', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'117', N'Electrical Foreman', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'118', N'Pump Operator', N'dep04', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'119', N'Tipper Driver', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'120', N'Stores Assistant', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'121', N'Land Prep Tractor Driver', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'122', N'Team Leader', N'dep04', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'123', N'Payloader ', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'124', N'Truck Driver', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'125', N'Compactor Operator', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'126', N'Planting Leader', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'127', N'Carpenter', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'128', N'Mason', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'129', N'Iron Bender', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'130', N'Crop Protection Leaders', N'dep04', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'131', N'Crop Protection Leaders', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'132', N'Tipper Driver', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'133', N'Payloader Operator', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'134', N'Crop Nutrition Leaders', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'135', N'Harvest Leader', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'136', N'Vehicle Driver', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'137', N'Irrigator', N'dep04', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'138', N'Plumber', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'139', N'Telehandler Operator', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'140', N'Security Guard', N'dep07', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat07', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'141', N'Housekeeper', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat07', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'142', N'Survey Assistant', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'143', N'Vehicle Driver', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'144', N'Survey Assistant', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'145', N'Pump Operator', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'146', N'Housekeeper', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:57', N'cat07', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'147', N'Load Master', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'148', N'Plant Mechanic', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'149', N'Chef', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat07', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'150', N'Sanitation', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat07', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'151', N'Gateman', N'dep07', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat07', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'152', N'Stores Assistant', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat07', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'153', N'Irrigator', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'154', N'Irrigation Maintenance', N'dep04', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'155', N'Boilermaker', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'156', N'Pump Operator', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'157', N'Dozer Operator', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'158', N'Pump Operator', N'dep04', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'159', N'Security Guard', N'dep07', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'160', N'Data Clerk', N'dep09', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'161', N'Fuel Attendant', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'162', N'Fuel Clerk', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'163', N'Forest Observer', N'dep07', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat07', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'164', N'Asst. Data', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'165', N'Finance Asst.', N'dep01', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'166', N'Crane Opt', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'167', N'Mechanic', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'168', N'Welder', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'169', N'Electrician', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'170', N'It Technicians', N'dep09', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'171', N'Survey Assistant', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'172', N'General Work', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:58', N'cat07', N'ST02')
GO

INSERT INTO [dbo].[designation] VALUES (N'87', N'Supervisor', N'dep03', N'b@yahoo.com', N'2019-12-07 16:28:55', N'cat05', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'88', N'Asst Crm', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:55', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'89', N'Hr Asst', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:55', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'90', N'Asst Purchase', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:55', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'91', N'Secretary', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:55', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'92', N'Asst Crm', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:55', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'93', N'Data Capt Clerk', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'94', N'Store Asst', N'dep02', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'95', N'Civils Foreman', N'dep05', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'96', N'', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'97', N'Asst Crm', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'98', N'Asst Data Capture', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO

INSERT INTO [dbo].[designation] VALUES (N'99', N'Timekeeper', N'dep06', N'b@yahoo.com', N'2019-12-07 16:28:56', N'cat06', N'ST01')
GO


-- ----------------------------
-- Table structure for designation_salary_package
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[designation_salary_package]') AND type IN ('U'))
	DROP TABLE [dbo].[designation_salary_package]
GO

CREATE TABLE [dbo].[designation_salary_package] (
  [designation_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [salary_desc_code] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [monthly_amount] decimal(38,2)  NULL,
  [created_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[designation_salary_package] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of designation_salary_package
-- ----------------------------
INSERT INTO [dbo].[designation_salary_package] VALUES (N'100', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'101', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'102', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'103', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'104', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'105', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'106', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'107', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'108', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'109', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'110', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'111', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'112', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'113', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'114', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'115', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'116', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'117', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'118', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'119', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'120', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'121', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'122', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'123', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'124', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'125', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'126', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'127', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'128', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'129', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'130', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'131', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'132', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'133', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'134', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'135', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'136', N'sd01', N'36400.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'137', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'138', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'139', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'140', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'141', N'sd01', N'28600.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'142', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'143', N'sd01', N'36400.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'144', N'sd01', N'28600.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'145', N'sd01', N'28600.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'146', N'sd01', N'36400.00', N'b@yahoo.com', N'2019-12-07 16:28:57')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'147', N'sd01', N'28600.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'148', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'149', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'150', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'151', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'152', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'153', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'154', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'155', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'156', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'157', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'158', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'159', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'160', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'161', N'sd01', N'31200.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'162', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'163', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'164', N'sd01', N'55000.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'165', N'sd01', N'55000.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'166', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'167', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'168', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'169', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'170', N'sd01', N'55000.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'171', N'sd01', N'33800.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'172', N'sd01', N'26650.00', N'b@yahoo.com', N'2019-12-07 16:28:58')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'87', N'sd01', N'39000.00', N'b@yahoo.com', N'2019-12-07 16:28:55')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'88', N'sd01', N'55000.00', N'b@yahoo.com', N'2019-12-07 16:28:55')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'89', N'sd01', N'55000.00', N'b@yahoo.com', N'2019-12-07 16:28:55')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'90', N'sd01', N'55000.00', N'b@yahoo.com', N'2019-12-07 16:28:55')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'91', N'sd01', N'55000.00', N'b@yahoo.com', N'2019-12-07 16:28:55')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'92', N'sd01', N'50000.00', N'b@yahoo.com', N'2019-12-07 16:28:55')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'93', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'94', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'95', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'96', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'97', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'98', N'sd01', N'55000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO

INSERT INTO [dbo].[designation_salary_package] VALUES (N'99', N'sd01', N'45000.00', N'b@yahoo.com', N'2019-12-07 16:28:56')
GO


-- ----------------------------
-- Table structure for gendata
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[gendata]') AND type IN ('U'))
	DROP TABLE [dbo].[gendata]
GO

CREATE TABLE [dbo].[gendata] (
  [table_name] varchar(30) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [table_id] int  NOT NULL
)
GO

ALTER TABLE [dbo].[gendata] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of gendata
-- ----------------------------
INSERT INTO [dbo].[gendata] VALUES (N'menu', N'81')
GO

INSERT INTO [dbo].[gendata] VALUES (N'payroll', N'18')
GO

INSERT INTO [dbo].[gendata] VALUES (N'payroll_cat_id', N'3871')
GO

INSERT INTO [dbo].[gendata] VALUES (N'timesheet', N'93')
GO

INSERT INTO [dbo].[gendata] VALUES (N'department', N'0')
GO

INSERT INTO [dbo].[gendata] VALUES (N'designation', N'172')
GO

INSERT INTO [dbo].[gendata] VALUES (N'category', N'0')
GO

INSERT INTO [dbo].[gendata] VALUES (N'C3000', N'2')
GO

INSERT INTO [dbo].[gendata] VALUES (N'B6000', N'34')
GO

INSERT INTO [dbo].[gendata] VALUES (N'B2000', N'35')
GO

INSERT INTO [dbo].[gendata] VALUES (N'B5000', N'8')
GO

INSERT INTO [dbo].[gendata] VALUES (N'C5000', N'2')
GO

INSERT INTO [dbo].[gendata] VALUES (N'B7000', N'3')
GO

INSERT INTO [dbo].[gendata] VALUES (N'B3000', N'95')
GO

INSERT INTO [dbo].[gendata] VALUES (N'B4000', N'18')
GO

INSERT INTO [dbo].[gendata] VALUES (N'A7000', N'63')
GO

INSERT INTO [dbo].[gendata] VALUES (N'A6000', N'16')
GO

INSERT INTO [dbo].[gendata] VALUES (N'A2000', N'3')
GO

INSERT INTO [dbo].[gendata] VALUES (N'B9000', N'2')
GO

INSERT INTO [dbo].[gendata] VALUES (N'B1000', N'1')
GO

INSERT INTO [dbo].[gendata] VALUES (N'A3000', N'70')
GO


-- ----------------------------
-- Table structure for imei
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[imei]') AND type IN ('U'))
	DROP TABLE [dbo].[imei]
GO

CREATE TABLE [dbo].[imei] (
  [imei_no] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [email] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[imei] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for job_category
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[job_category]') AND type IN ('U'))
	DROP TABLE [dbo].[job_category]
GO

CREATE TABLE [dbo].[job_category] (
  [category_id] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [category_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[job_category] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of job_category
-- ----------------------------
INSERT INTO [dbo].[job_category] VALUES (N'cat01', N'General Manager', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 19:09:12')
GO

INSERT INTO [dbo].[job_category] VALUES (N'cat02', N'Department Head', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 19:09:12')
GO

INSERT INTO [dbo].[job_category] VALUES (N'cat03', N'Managers/Engineers', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 19:09:12')
GO

INSERT INTO [dbo].[job_category] VALUES (N'cat04', N'Senior Staff', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 19:09:12')
GO

INSERT INTO [dbo].[job_category] VALUES (N'cat05', N'Supervisor', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 19:09:12')
GO

INSERT INTO [dbo].[job_category] VALUES (N'cat06', N'Skill', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 19:09:12')
GO

INSERT INTO [dbo].[job_category] VALUES (N'cat07', N'Unskill', N'ese.kelvin@dangoteprojects.com', N'2019-09-12 19:09:12')
GO


-- ----------------------------
-- Table structure for lga
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[lga]') AND type IN ('U'))
	DROP TABLE [dbo].[lga]
GO

CREATE TABLE [dbo].[lga] (
  [stateid] varchar(3) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [State] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [lga] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [lgaid] int  NOT NULL
)
GO

ALTER TABLE [dbo].[lga] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of lga
-- ----------------------------
INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Asaritoru', N'2')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Aboh mbaise', N'3')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Oluyole', N'5')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Bekwara', N'6')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Abeokuta east', N'7')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Yemoji', N'8')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Etsakor', N'9')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ethiope west', N'10')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Idemili', N'11')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Ijumu iyara', N'12')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Mopa-muro', N'13')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Aba north', N'14')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Aba south', N'15')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Arochukwu', N'16')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Bende', N'17')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Ikwuano', N'18')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Isiala-ngwa north', N'19')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Isiala-ngwa south', N'20')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Isukwuato', N'21')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Obiomangwa', N'22')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Ohafia', N'23')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Osisioma ngwa', N'24')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Ugwunagbo', N'25')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Ukwa east', N'26')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Ukwa west', N'27')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Umuahia north', N'28')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Umuahia south', N'29')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Umu-nneochi', N'30')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Demsa', N'31')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Fufore', N'32')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Ganye', N'33')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Girei', N'34')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Gombi', N'35')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Guyuk', N'36')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Hong', N'37')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Jada', N'38')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Lamurde', N'39')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Madagali', N'40')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Maiha', N'41')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Mayo-belwa', N'42')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Michika', N'43')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Mubi north', N'44')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Mubi south', N'45')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Numan', N'46')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Shelleng', N'47')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Song', N'48')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Toungo', N'49')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Yola north', N'50')
GO

INSERT INTO [dbo].[lga] VALUES (N'002', N'ADAMAWA', N'Yola south', N'51')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Abak', N'52')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Eastern obolo', N'53')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Eket', N'54')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Esit eket', N'55')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Essien udim', N'56')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Etim ekpo', N'57')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Etinan', N'58')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Ibeno', N'59')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Ibesikpo asutan', N'60')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Ibiono ibom', N'61')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Ika', N'62')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Ikono', N'63')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Ikot abasi', N'64')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Ikot ekpene', N'65')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Ini', N'66')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Itu', N'67')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Mbo', N'68')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Mkpat enin', N'69')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Nsit atai', N'70')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Nsit ibom', N'71')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Nsit ubium', N'72')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Uruan', N'73')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Urue-offong/oruko', N'74')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Uyo', N'75')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Aguata', N'76')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Anambra east', N'77')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Anambra west', N'78')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Anaocha', N'79')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Awka north', N'80')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Awka south', N'81')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Ayamelum', N'82')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Dunukofia', N'83')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Ekwusigo', N'84')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Idemili north', N'85')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Idemili south', N'86')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Ihiala', N'87')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Njikoka', N'88')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Nnewi north', N'89')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Obanliku', N'90')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Obubra', N'91')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Obudu', N'92')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Odukpani', N'93')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Ogoja', N'94')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Yakurr', N'95')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Yala', N'96')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Aniocha north', N'97')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Aniocha south', N'98')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Bomadi', N'99')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Burutu', N'100')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ethiope east', N'101')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ethiope west', N'102')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ika north', N'103')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ika south', N'104')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Isoko north', N'105')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Isoko south', N'106')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ndokwa east', N'107')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ndokwa west', N'108')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Okpe', N'109')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Oshimili north', N'110')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Oshimili south', N'111')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Patani', N'112')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Sapele', N'113')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Udu', N'114')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ughelli north', N'115')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ughelli south', N'116')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Ukwuani', N'117')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Uvwie', N'118')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Warri north', N'119')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Warri south', N'120')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Warri south west', N'121')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Abakaliki', N'122')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Afikpo north', N'123')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Afikpo south', N'124')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Ebonyi', N'125')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Ezza north', N'126')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Ezza south', N'127')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Ikwo', N'128')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Ishielu', N'129')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Ivo', N'130')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Izzi', N'131')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Ohaozara', N'132')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Ohaukwu', N'133')
GO

INSERT INTO [dbo].[lga] VALUES (N'011', N'EBONYI', N'Onicha', N'134')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Akoko-edo', N'135')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Egor', N'136')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Esan central', N'137')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Esan north east', N'138')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Esan south east', N'139')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Esan west', N'140')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Etsako central', N'141')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Etsako east', N'142')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Etsako west', N'143')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Igueben', N'144')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Ikpoba-okha', N'145')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Oredo', N'146')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Orhionmwon', N'147')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Ovia north east', N'148')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Ovia south west', N'149')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Owan east', N'150')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Owan west', N'151')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Uhunmwonde', N'152')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'ADK', N'153')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'DEA', N'154')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'EFY', N'155')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'MUE', N'156')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'LAW', N'157')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'AMK', N'158')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'EMR', N'159')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'DEK', N'160')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'JER', N'161')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'KER', N'162')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'KLE', N'163')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'YEK', N'164')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'GED', N'165')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'SSE', N'166')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'TUN', N'167')
GO

INSERT INTO [dbo].[lga] VALUES (N'013', N'EKITI', N'YEE', N'168')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Aninri', N'169')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Awgu', N'170')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Enugu east', N'171')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Enugu north', N'172')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Enugu south', N'173')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Ezeagu', N'174')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Enugu', N'175')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Igbo-etit', N'176')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Igbo-eze north', N'177')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Igho-eze south', N'178')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Isi-uzo', N'179')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Nkanu east', N'180')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Nkanu west', N'181')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Nnewi south', N'182')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Ogbaru', N'183')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Onitsha north', N'184')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Onitsha south', N'185')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Orumba north', N'186')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Orumba south', N'187')
GO

INSERT INTO [dbo].[lga] VALUES (N'004', N'ANAMBRA', N'Oyi', N'188')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Alkaleri', N'189')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Bauchi', N'190')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Bogoro', N'191')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Damban', N'192')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Darazo', N'193')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Dass', N'194')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Gamawa', N'195')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Ganjuwa', N'196')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Giade', N'197')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Itas/gadau', N'198')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Jama''are', N'199')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Katagun', N'200')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Gusau', N'201')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Kirfi', N'202')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Misau', N'203')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Ningi', N'204')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Shira', N'205')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Tafawa-balewa', N'206')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Toro', N'207')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Warji', N'208')
GO

INSERT INTO [dbo].[lga] VALUES (N'005', N'BAUCHI', N'Zaki', N'209')
GO

INSERT INTO [dbo].[lga] VALUES (N'006', N'BAYELSA', N'Brass', N'210')
GO

INSERT INTO [dbo].[lga] VALUES (N'006', N'BAYELSA', N'Ekeremor', N'211')
GO

INSERT INTO [dbo].[lga] VALUES (N'006', N'BAYELSA', N'Kolokuma/opokuma', N'212')
GO

INSERT INTO [dbo].[lga] VALUES (N'006', N'BAYELSA', N'Nembe', N'213')
GO

INSERT INTO [dbo].[lga] VALUES (N'006', N'BAYELSA', N'Ogbia', N'214')
GO

INSERT INTO [dbo].[lga] VALUES (N'006', N'BAYELSA', N'Sagbama', N'215')
GO

INSERT INTO [dbo].[lga] VALUES (N'006', N'BAYELSA', N'Southern ijaw', N'216')
GO

INSERT INTO [dbo].[lga] VALUES (N'006', N'BAYELSA', N'Yenegoa', N'217')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Ado', N'218')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Agatu', N'219')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Apa', N'220')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Buruku', N'221')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Gboko', N'222')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Guma', N'223')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Gwer east', N'224')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Gwer west', N'225')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Katsina-ala', N'226')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Konshisha', N'227')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Kwande', N'228')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Logo', N'229')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Makurdi', N'230')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Obi', N'231')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Ogbadibo', N'232')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Oju', N'233')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Okpokwu', N'234')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Ohimini', N'235')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Oturkpo', N'236')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Tarka', N'237')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Ukum', N'238')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Ushongo', N'239')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Vandeikya', N'240')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Abadam', N'241')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Askira/uba', N'242')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Bama', N'243')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Bayo', N'244')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Biu', N'245')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Chibok', N'246')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Damboa', N'247')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Dikwa', N'248')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Gubio', N'249')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Guzamala', N'250')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Gwoza', N'251')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Hawul', N'252')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Jere', N'253')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Kaga', N'254')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Kala/balge', N'255')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Konduga', N'256')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Kukawa', N'257')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Kwaya kusar', N'258')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Mafa', N'259')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Magumeri', N'260')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Maiduguri', N'261')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Marte', N'262')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Mobbar', N'263')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Monguno', N'264')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Ngala', N'265')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Nganzai', N'266')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Shani', N'267')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Abi', N'268')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Akamkpa', N'269')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Akpabuyo', N'270')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Bakassi', N'271')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Bekwara', N'272')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Biase', N'273')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Boki', N'274')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Calabar-municipal', N'275')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Calabar south', N'276')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Etung', N'277')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Ikom', N'278')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Nsukka', N'279')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Oji-river', N'280')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Udenu', N'281')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Udi', N'282')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Uzo-uwani', N'283')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Akko', N'284')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Balanga', N'285')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Billiri', N'286')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Dukku', N'287')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Funakaye', N'288')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Gombe', N'289')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Kaltungo', N'290')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Kwami', N'291')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Nafada', N'292')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Shomgom', N'293')
GO

INSERT INTO [dbo].[lga] VALUES (N'016', N'GOMBE', N'Yamaltu/deba', N'294')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ahiazu-mbaise', N'295')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ehime-mbano', N'296')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ezinihitte', N'297')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ideato north', N'298')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ideato south', N'299')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ihitte-uboma', N'300')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ikeduru', N'301')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Isiala mbano', N'302')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Isu', N'303')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Mbaitoli', N'304')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ngor-okpala', N'305')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Njaba', N'306')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Nwangele', N'307')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Nkwerre', N'308')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Obowo', N'309')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Oguta', N'310')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ohaji/egbema', N'311')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Okigwe', N'312')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Orlu', N'313')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Orsu', N'314')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Oru east', N'315')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Oru west', N'316')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Owerri muni.', N'317')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Owerri north', N'318')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Owerri west', N'319')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Onuimo', N'320')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Auyo', N'321')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Babura', N'322')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Birnin kudu', N'323')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Biriniwa', N'324')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Buji', N'325')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Dutse', N'326')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Gagarawa', N'327')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Garki', N'328')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Gumel', N'329')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Guri', N'330')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Gwaram', N'331')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Gwiwa', N'332')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Hadejia', N'333')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Jahun', N'334')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Kafin', N'335')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Hausa', N'336')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Kaugama', N'337')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Kazaure', N'338')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Kiri kasamma', N'339')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Kiyawa', N'340')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Maigatari', N'341')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Malam madori', N'342')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Miga', N'343')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Ringim', N'344')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Roni', N'345')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Sule-tankarkar', N'346')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Taura', N'347')
GO

INSERT INTO [dbo].[lga] VALUES (N'018', N'JIGAWA', N'Yankwashi', N'348')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Birnin-gwari', N'349')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Chikun', N'350')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Giwa', N'351')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Igabi', N'352')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Ikara', N'353')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Jaba', N'354')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Jema''a', N'355')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Kachia', N'356')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Kaduna north', N'357')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Kaduna south', N'358')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Kagarko', N'359')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Kajuru', N'360')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Kaura', N'361')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Kubau', N'362')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Kudan', N'363')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Lere', N'364')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Makarfi', N'365')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Sabon-gari', N'366')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Sanga', N'367')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Soba', N'368')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Zangon-kataf', N'369')
GO

INSERT INTO [dbo].[lga] VALUES (N'019', N'KADUNA', N'Zaria', N'370')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Ajingi', N'371')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Albasu', N'372')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Bagwai', N'373')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Bebeji', N'374')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Bichi', N'375')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Bunkure', N'376')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Dala', N'377')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Dambatta', N'378')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Dawakin kudu', N'379')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Dawakin tofa', N'380')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Doguwa', N'381')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Fagge', N'382')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Gabasawa', N'383')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Garko', N'384')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Garum mallarn', N'385')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Gaya', N'386')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Gezawa', N'387')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Gwale', N'388')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Gwarzo', N'389')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Kabo', N'390')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Kano municipal', N'391')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Karaye', N'392')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Kibiya', N'393')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Kiru', N'394')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Kumbotso', N'395')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Kunchi', N'396')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Kura', N'397')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Madobi', N'398')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Makoda', N'399')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Minjibir', N'400')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Nasarawa', N'401')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Rano', N'402')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Rimin gado', N'403')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Rogo', N'404')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Shanono', N'405')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Sumaila', N'406')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Takai', N'407')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Tarauni', N'408')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Tofa', N'409')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Tsanyawa', N'410')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Tudun wada', N'411')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Ungogo', N'412')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Warawa', N'413')
GO

INSERT INTO [dbo].[lga] VALUES (N'020', N'KANO', N'Wudil', N'414')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Bakori', N'415')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Batagarawa', N'416')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Batsari', N'417')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Baure', N'418')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Bindawa', N'419')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Charanchi', N'420')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Dandume', N'421')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Danja', N'422')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Dan musa', N'423')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Daura', N'424')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Dutsi', N'425')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Dutsin-ma', N'426')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Faskari', N'427')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Funtua', N'428')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Ingawa', N'429')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Jibia', N'430')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Kafur', N'431')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Kaita', N'432')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Kankara', N'433')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Kankia', N'434')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Katsina', N'435')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Kurfi', N'436')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Kusada', N'437')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Mai''adua', N'438')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Malumfashi', N'439')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Mani', N'440')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Mashi', N'441')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Matazu', N'442')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Musawa', N'443')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Rimi', N'444')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Sabuwa', N'445')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Safana', N'446')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Sandamu', N'447')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Zongo', N'448')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Aleiro', N'449')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Arewa-dandi', N'450')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Argungu', N'451')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Augie', N'452')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Bagudo', N'453')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Birnin kebbi', N'454')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Bunza', N'455')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Dandi', N'456')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Fakai', N'457')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Gwandu', N'458')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Jega', N'459')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Kalgo', N'460')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Koko/besse', N'461')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Maiyama', N'462')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Ngaski', N'463')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Sakaba', N'464')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Shanga', N'465')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Suru', N'466')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Wasagu/danko', N'467')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Yauri', N'468')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Zuru', N'469')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Adavi', N'470')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Ajaojuta', N'471')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Ankpa', N'472')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Bassa', N'473')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Dekina', N'474')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Ibaji', N'475')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Igalamela-odolu', N'476')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Ijumu', N'477')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Ijumu', N'478')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Kabba/bunu', N'479')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Kogi', N'480')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Lokoja', N'481')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Mopa-muro', N'482')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Ofu', N'483')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Ogori/megongo', N'484')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Okehi', N'485')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Olamabolo', N'486')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Omala', N'487')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Yagba east', N'488')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Yagba west', N'489')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Asa', N'490')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Baruten', N'491')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Edu', N'492')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Ekiti', N'493')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Ifelodun', N'494')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Ilorin south', N'495')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Ilorin west', N'496')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Irepodun', N'497')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Isin', N'498')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Kaiama', N'499')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Moro', N'500')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Offa', N'501')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Oke-ero', N'502')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Oyun', N'503')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Pategi', N'504')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Agege', N'505')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Ajeromi-ifelodun', N'506')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Alimosho', N'507')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Amuwo-odofin', N'508')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Apapa', N'509')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Badagry', N'510')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Epe', N'511')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Eti-osa', N'512')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Ibeju/lekki', N'513')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Ifako-ijaye', N'514')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Ikeja', N'515')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Ikorodu', N'516')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Kosofe', N'517')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Lagos island', N'518')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Lagos mainland', N'519')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Mushin', N'520')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Ojo', N'521')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Oshodi-isolo', N'522')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Shomolu', N'523')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Surulere', N'524')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Akwanga', N'525')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Awe', N'526')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Doma', N'527')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Karu', N'528')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Keana', N'529')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Keffi', N'530')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Kokona', N'531')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Lafia', N'532')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Nasarawa', N'533')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Nasarawa-eggon', N'534')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Obi', N'535')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Toto', N'536')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Wamba', N'537')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Agaie', N'538')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Agwara', N'539')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Bida', N'540')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Borgu', N'541')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Bosso', N'542')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Chanchaga', N'543')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Edati', N'544')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Gbako', N'545')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Gurara', N'546')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Katcha', N'547')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Kontagora', N'548')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Lapai', N'549')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Lavun', N'550')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Magama', N'551')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Mariga', N'552')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Mashegu', N'553')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Mokwa', N'554')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Muya', N'555')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Paikoro', N'556')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Rafi', N'557')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Rajau', N'558')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Shiroro', N'559')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Suleja', N'560')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Tafa', N'561')
GO

INSERT INTO [dbo].[lga] VALUES (N'027', N'NIGER', N'Wushishi', N'562')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Abeokuta north', N'563')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Abeokuta south', N'564')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ado-odo/ota', N'565')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Egbado north', N'566')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Egbado south', N'567')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ekwekoro', N'568')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ifo', N'569')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ijebu east', N'570')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ijebu north', N'571')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ijebu north east', N'572')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ijebu-ode', N'573')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ikenne', N'574')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Imeko-afon', N'575')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ipokia', N'576')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Obafemi-owode', N'577')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ogun waterside', N'578')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Odeda', N'579')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Odogbolu', N'580')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Remo north', N'581')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Shagamu', N'582')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Akoko north east', N'583')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Akoko north west', N'584')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Akoko south east', N'585')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Akoko south west', N'586')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Akure north', N'587')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Akuresouth', N'588')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ese-odo', N'589')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Idanre', N'590')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ifedore', N'591')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ilaje', N'592')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ile-oluji-okeigbo', N'593')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Irele', N'594')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Odigbo', N'595')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Okitipupa', N'596')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ondo east', N'597')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ondo west', N'598')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ose-owo', N'599')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Aiyedade', N'600')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Aiyedire', N'601')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Atakumosa east', N'602')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Atakumose-west', N'603')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Boluwaduro', N'604')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Boripe', N'605')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ede north', N'606')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ede south', N'607')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Egbedore', N'608')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ejigbo', N'609')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ife central', N'610')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ife east', N'611')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ife north', N'612')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ife south', N'613')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ifedayo', N'614')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ifelodun', N'615')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ila', N'616')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ilasha east', N'617')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ilesha west', N'618')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Irepodun', N'619')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Irewole', N'620')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Isokan', N'621')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Iwo', N'622')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Obokun', N'623')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Odo-otin', N'624')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Ola-oluwa', N'625')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Olorunda', N'626')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Oriade', N'627')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Orolu', N'628')
GO

INSERT INTO [dbo].[lga] VALUES (N'030', N'OSUN', N'Osogbo', N'629')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Afijio', N'630')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Akinyele', N'631')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Atiba', N'632')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Atigbo', N'633')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Egbeda', N'634')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ibadan central', N'635')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ibadan north', N'636')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ibadan north west', N'637')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ibadan south west', N'638')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ibadan south east', N'639')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ibarapa central', N'640')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ibarapa east', N'641')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ibarapa north', N'642')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ido', N'643')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Irepo', N'644')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Iseyin', N'645')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Itesiwaju', N'646')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Iwajowa', N'647')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Kajola', N'648')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Lagelu', N'649')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ogbomoso north', N'650')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ogbomoso south', N'651')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ogo oluwa', N'652')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Olorunsogo', N'653')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Oluyole', N'654')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ona-ara', N'655')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Orelope', N'656')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ori ire', N'657')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Oyo east', N'658')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Oyo west', N'659')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Saki east', N'660')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Saki west', N'661')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Surelere', N'662')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Barikin ladi', N'663')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Bassa', N'664')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Bokkos', N'665')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Jos east', N'666')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Jos north', N'667')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Jos south', N'668')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Kanam', N'669')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Kanke', N'670')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Langtang north', N'671')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Langtang south', N'672')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Mangu', N'673')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Mikang', N'674')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Pankshin', N'675')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Qua''an pan', N'676')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Riyom', N'677')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Shendam', N'678')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Wase', N'679')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Abua/odual', N'680')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Ahoada east', N'681')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Ahoada west', N'682')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Akuku toru', N'683')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Andoni', N'684')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Asari-toru', N'685')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Bonny', N'686')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Degema', N'687')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Emohua', N'688')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Eleme', N'689')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Etche', N'690')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Gokana', N'691')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Ikwerre', N'692')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Khana', N'693')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Obia/akpor', N'694')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Ogba/egbema/ndoni', N'695')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Ogu/bolo', N'696')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Okrika', N'697')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Omumma', N'698')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Opobo/nkoro', N'699')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Oyigbo', N'700')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Port harcourt', N'701')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Tai', N'702')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Binji', N'703')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Bodinga', N'704')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Dange-shuni', N'705')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Gada', N'706')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Goronyo', N'707')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Gudu', N'708')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Gwadabawa', N'709')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Illela', N'710')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Isa', N'711')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Kware', N'712')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Kebbe', N'713')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Rabah', N'714')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Sabon birni', N'715')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Shagari', N'716')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Silame', N'717')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Sokoto north', N'718')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Sokoto south', N'719')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Tambuwal', N'720')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Tangaza', N'721')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Tureta', N'722')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Wamakko', N'723')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Wurno', N'724')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Yabo', N'725')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Ardo-kola', N'726')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Bali', N'727')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Donga', N'728')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Gashaka', N'729')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Gassol', N'730')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Ibi', N'731')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Jalingo', N'732')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Karim-lamido', N'733')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Kurmi', N'734')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Lau', N'735')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Sarduana', N'736')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Takum', N'737')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Ussa', N'738')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Wukari', N'739')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Yorro', N'740')
GO

INSERT INTO [dbo].[lga] VALUES (N'035', N'TARABA', N'Zing', N'741')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Bade', N'742')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Bursari', N'743')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Damaturu', N'744')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Fika', N'745')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Fune', N'746')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Geidam', N'747')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Gujba', N'748')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Gulani', N'749')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Jakusko', N'750')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Karasuwa', N'751')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Machina', N'752')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Nangere', N'753')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Nguru', N'754')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Potiskum', N'755')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Tarmua', N'756')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Yunusari', N'757')
GO

INSERT INTO [dbo].[lga] VALUES (N'036', N'YOBE', N'Yusufari', N'758')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Anka', N'759')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Bakurna', N'760')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Birnin magaji', N'761')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Bukkuyum', N'762')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Bungudu', N'763')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Gummi', N'764')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Kaura namoda', N'765')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Maradun', N'766')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Maru', N'767')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Shinkafi', N'768')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Talata', N'769')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Mafara', N'770')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Tsafe', N'771')
GO

INSERT INTO [dbo].[lga] VALUES (N'037', N'ZAMFARA', N'Zumi', N'772')
GO

INSERT INTO [dbo].[lga] VALUES (N'026', N'NASARAWA', N'Eggon', N'773')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ile oluji', N'774')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Sagamu', N'775')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Opeji', N'776')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ijebu ode', N'777')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Ishan', N'778')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ondo central', N'779')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Otukpo', N'780')
GO

INSERT INTO [dbo].[lga] VALUES (N'015', N'FCT', N'Abaji', N'781')
GO

INSERT INTO [dbo].[lga] VALUES (N'015', N'FCT', N'Abuja Municipal', N'782')
GO

INSERT INTO [dbo].[lga] VALUES (N'015', N'FCT', N'Bwari', N'783')
GO

INSERT INTO [dbo].[lga] VALUES (N'015', N'FCT', N'Gwagwalada', N'784')
GO

INSERT INTO [dbo].[lga] VALUES (N'015', N'FCT', N'Kuje', N'785')
GO

INSERT INTO [dbo].[lga] VALUES (N'015', N'FCT', N'Kwali', N'786')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ehime mbano', N'787')
GO

INSERT INTO [dbo].[lga] VALUES (N'014', N'ENUGU', N'Oji river', N'788')
GO

INSERT INTO [dbo].[lga] VALUES (N'031', N'OYO', N'Ogbomosho', N'789')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Akure south', N'790')
GO

INSERT INTO [dbo].[lga] VALUES (N'009', N'CROSS RIVERS', N'Odupani', N'791')
GO

INSERT INTO [dbo].[lga] VALUES (N'017', N'IMO', N'Ngor okpala', N'792')
GO

INSERT INTO [dbo].[lga] VALUES (N'007', N'BENUE', N'Ador', N'793')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Okobo', N'794')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Idah', N'795')
GO

INSERT INTO [dbo].[lga] VALUES (N'001', N'ABIA', N'Ugwunagbor', N'796')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Ogba/Egbem/Noom', N'797')
GO

INSERT INTO [dbo].[lga] VALUES (N'023', N'KOGI', N'Okene', N'798')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Akoko', N'799')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Owo', N'800')
GO

INSERT INTO [dbo].[lga] VALUES (N'022', N'KEBBI', N'Kamba', N'801')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Water side', N'802')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Egado South', N'803')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Imeko Afon', N'804')
GO

INSERT INTO [dbo].[lga] VALUES (N'032', N'PLATEAU', N'Panilshin', N'805')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ikalo', N'806')
GO

INSERT INTO [dbo].[lga] VALUES (N'025', N'LAGOS', N'Eredo', N'807')
GO

INSERT INTO [dbo].[lga] VALUES (N'021', N'KATSINA', N'Manufanoti', N'808')
GO

INSERT INTO [dbo].[lga] VALUES (N'034', N'SOKOTO', N'Kofa atiku', N'809')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Onna', N'811')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Udium', N'812')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Ake', N'813')
GO

INSERT INTO [dbo].[lga] VALUES (N'012', N'EDO', N'Uromi', N'814')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Oron', N'815')
GO

INSERT INTO [dbo].[lga] VALUES (N'003', N'AKWA IBOM', N'Oruk', N'816')
GO

INSERT INTO [dbo].[lga] VALUES (N'010', N'DELTA', N'Aniocha', N'817')
GO

INSERT INTO [dbo].[lga] VALUES (N'029', N'ONDO', N'Ose', N'818')
GO

INSERT INTO [dbo].[lga] VALUES (N'024', N'KWARA', N'Oro', N'819')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Yewa', N'820')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Yewa South', N'821')
GO

INSERT INTO [dbo].[lga] VALUES (N'028', N'OGUN', N'Yewa North', N'822')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Opobo/Nkoro', N'823')
GO

INSERT INTO [dbo].[lga] VALUES (N'033', N'RIVERS', N'Onelga', N'824')
GO

INSERT INTO [dbo].[lga] VALUES (N'008', N'BORNO', N'Maiduguri .M.C', N'826')
GO


-- ----------------------------
-- Table structure for menu
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[menu]') AND type IN ('U'))
	DROP TABLE [dbo].[menu]
GO

CREATE TABLE [dbo].[menu] (
  [menu_id] bigint  NOT NULL,
  [menu_name] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [menu_url] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [parent_id] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [sub_menu] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [menu_level] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [menu_order] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [menu_layout_position] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [category_header] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [icon_class] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL,
  [status] tinyint  NULL
)
GO

ALTER TABLE [dbo].[menu] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO [dbo].[menu] VALUES (N'1', N'Administration', N'/administration', N'', N'true', N'0', N'1', N'', N'001', N'fa  fa-user-md mr-20', N'2019-09-02 12:18:47', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'2', N'View', N'/view', N'', N'true', N'0', N'0', N'', N'002', N'fa fa-table mr-20', N'2019-09-02 12:18:47', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'3', N'User List', N'/user-list', N'1', N'false', N'1', N'1', N'', N'', N'', N'2019-09-02 12:18:47', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'4', N'Menu List', N'/menu-list', N'1', N'false', N'1', N'3', N'', N'', N'', N'2019-09-02 12:18:47', NULL, N'0')
GO

INSERT INTO [dbo].[menu] VALUES (N'5', N'Change Password', N'/change-password', N'1', N'false', N'1', N'2', N'', N'', N'', N'2019-09-02 12:18:47', NULL, N'0')
GO

INSERT INTO [dbo].[menu] VALUES (N'6', N'Roles', N'/role-list', N'1', N'false', N'1', N'1', N'', N'', N'', N'2019-09-02 12:18:47', NULL, N'0')
GO

INSERT INTO [dbo].[menu] VALUES (N'7', N'Dashboard', N'/dashboard', N'', N'false', N'0', N'0', N'', N'001', N'fa fa-home mr-20', N'2019-09-02 12:18:47', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'8', N'Department', N'/department-list', N'14', N'false', N'1', N'2', N'', N'', N'', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'9', N'Position', N'/designation-list', N'14', N'false', N'1', N'3', N'', N'', N'', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'10', N'Job Category', N'/category-list', N'14', N'false', N'1', N'3', N'', N'', N'', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'11', N'Staff Setup', N'/staff-management', N'', N'true', N'0', N'1', N'', N'003', N'fa fa-users mr-20', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'12', N'Monthly Gross Salary', N'/designation-salary-list', N'14', N'false', N'1', N'4', N'', N'', N'', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'13', N'Staff List', N'/staff-list', N'11', N'false', N'1', N'1', N'', N'', N'', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'14', N'Department Setup', N'/department-management', N'', N'true', N'0', N'0', N'', N'003', N'fa fa-building mr-20', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'15', N'Attendance Setup', N'/attendance-setup', N'', N'true', N'0', N'4', N'', N'004', N'fa fa-clock-o mr-20', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'16', N'Print Time Sheet', N'/print-time-sheet', N'15', N'false', N'1', N'1', N'', N'', N'', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'17', N'Approve Staff', N'/approve-staff-list', N'11', N'false', N'1', N'2', N'', N'', N'', N'2019-09-26 11:48:32', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'18', N'Capture Time Sheet', N'/capture-time-sheet', N'15', N'false', N'1', N'2', N'', N'', N'', N'2019-09-18 11:12:26', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'20', N'Payroll', N'/payroll', N'', N'true', N'0', N'5', N'', N'005', N'fa fa-file mr-20', N'2019-09-26 11:48:32', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'21', N'Payroll Generation', N'/payroll-generation/create', N'20', N'false', N'1', N'1', N'', N'', N'', N'2019-09-26 11:48:32', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'23', N'Departmental Monthly Payroll', N'/departmental-payroll-list', N'20', N'false', N'1', N'2', N'', N'', N'', N'2019-09-26 11:48:32', NULL, N'1')
GO

INSERT INTO [dbo].[menu] VALUES (N'24', N'Approve Monthly Payroll', N'/approve-monthly-payroll', N'20', N'false', N'1', N'3', N'', N'', N'', N'2019-09-26 11:48:32', NULL, N'1')
GO


-- ----------------------------
-- Table structure for menu_category_header
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[menu_category_header]') AND type IN ('U'))
	DROP TABLE [dbo].[menu_category_header]
GO

CREATE TABLE [dbo].[menu_category_header] (
  [id] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [name] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[menu_category_header] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of menu_category_header
-- ----------------------------
INSERT INTO [dbo].[menu_category_header] VALUES (N'001', N'Administration', N'2019-09-16 15:45:08', NULL)
GO

INSERT INTO [dbo].[menu_category_header] VALUES (N'002', N'Report', N'2019-09-16 15:45:08', NULL)
GO

INSERT INTO [dbo].[menu_category_header] VALUES (N'003', N'HR Managment', N'2019-09-18 10:53:52', NULL)
GO

INSERT INTO [dbo].[menu_category_header] VALUES (N'004', N'Time Sheet Managment', N'2019-09-19 16:10:33', NULL)
GO

INSERT INTO [dbo].[menu_category_header] VALUES (N'005', N'Payroll management', N'2019-09-20 13:01:20', NULL)
GO


-- ----------------------------
-- Table structure for menugroup
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[menugroup]') AND type IN ('U'))
	DROP TABLE [dbo].[menugroup]
GO

CREATE TABLE [dbo].[menugroup] (
  [role_id] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [menu_id] varchar(5) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[menugroup] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'InnoDB free: 6144 kB; InnoDB free: 6144 kB; InnoDB free: 614',
'SCHEMA', N'dbo',
'TABLE', N'menugroup'
GO


-- ----------------------------
-- Records of menugroup
-- ----------------------------
INSERT INTO [dbo].[menugroup] VALUES (N'0', N'19')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'0', N'21')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'0', N'22')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'1')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'10')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'11')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'12')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'13')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'14')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'15')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'16')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'17')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'18')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'20')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'23')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'24')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'3')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'4')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'5')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'6')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'7')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'8')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'1', N'9')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'1')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'11')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'12')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'13')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'14')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'15')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'16')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'17')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'20')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'24')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'3')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'7')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'8')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'2', N'9')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'11')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'13')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'15')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'16')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'18')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'19')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'20')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'23')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'5')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'3', N'7')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'4', N'11')
GO

INSERT INTO [dbo].[menugroup] VALUES (N'4', N'7')
GO


-- ----------------------------
-- Table structure for migrations
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[migrations]') AND type IN ('U'))
	DROP TABLE [dbo].[migrations]
GO

CREATE TABLE [dbo].[migrations] (
  [id] int  NOT NULL,
  [migration] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [batch] int  NOT NULL
)
GO

ALTER TABLE [dbo].[migrations] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO [dbo].[migrations] VALUES (N'0', N'2019_09_17_132300_role_user', N'3')
GO

INSERT INTO [dbo].[migrations] VALUES (N'2', N'2014_10_12_100000_create_password_resets_table', N'1')
GO

INSERT INTO [dbo].[migrations] VALUES (N'3', N'2019_08_19_105033_create_i_m_e_i_s_table', N'1')
GO

INSERT INTO [dbo].[migrations] VALUES (N'4', N'2019_08_21_082319_create_parameters_table', N'1')
GO

INSERT INTO [dbo].[migrations] VALUES (N'5', N'2019_08_21_103008_create_menus_table', N'1')
GO

INSERT INTO [dbo].[migrations] VALUES (N'6', N'2019_09_01_234420_create_roles_table', N'1')
GO

INSERT INTO [dbo].[migrations] VALUES (N'7', N'2019_09_02_000907_role__user', N'1')
GO

INSERT INTO [dbo].[migrations] VALUES (N'8', N'2019_09_02_101602_category__header', N'1')
GO

INSERT INTO [dbo].[migrations] VALUES (N'11', N'2014_10_12_000000_create_users_table', N'2')
GO


-- ----------------------------
-- Table structure for parameter
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[parameter]') AND type IN ('U'))
	DROP TABLE [dbo].[parameter]
GO

CREATE TABLE [dbo].[parameter] (
  [parameter_name] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [parameter_value] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [parameter_description] varchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[parameter] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of parameter
-- ----------------------------
INSERT INTO [dbo].[parameter] VALUES (N'server', N'127.0.0.1', N'Server IP', N'2019-09-16 15:45:05', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'staff_image_path', N'/dorc/public/user_img', N'Path to where user images are stored', N'2019-09-16 15:45:05', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'transfer_protocol', N'http', N'Transfer protocol of the image url', N'2019-09-16 15:45:05', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'break_duration', N'1', N'Daily break duration', N'2019-09-24 14:52:32', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'resumption_time', N'7', N'Daily Resumption time', N'2019-09-24 14:52:32', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'max_daily_over_time', N'2', N'Maximum Overtime from monday to saturday', N'2019-09-24 14:52:32', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'max_sunday_over_time', N'40', N'Maximum Overtime for sundays in hours', N'2019-09-24 14:52:32', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'work_days', N'6', N'the default No. of work days in a week', N'2019-09-24 14:52:32', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'work_daily_hrs', N'8', N'Hours worked in a day', N'2019-09-24 14:52:32', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'max_ot', N'10', N'Maximum Overtime a Payroll Officer can input', N'2019-10-25 16:14:28', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'monthly_work_days', N'26', N'Monthly default work days', N'2019-10-30 05:15:42', NULL)
GO

INSERT INTO [dbo].[parameter] VALUES (N'pay_day', N'25', N'Monthly pay day of the month is 25th of each month', N'2020-03-16 09:11:44', NULL)
GO


-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[password_resets]') AND type IN ('U'))
	DROP TABLE [dbo].[password_resets]
GO

CREATE TABLE [dbo].[password_resets] (
  [email] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [token] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[password_resets] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for payroll_creation
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[payroll_creation]') AND type IN ('U'))
	DROP TABLE [dbo].[payroll_creation]
GO

CREATE TABLE [dbo].[payroll_creation] (
  [payroll_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [month_of] date  NOT NULL,
  [status] tinyint  NOT NULL,
  [rollback_at] datetime2(0)  NULL,
  [rollback_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [department_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [staff_type_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [pay_day] int  NULL
)
GO

ALTER TABLE [dbo].[payroll_creation] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of payroll_creation
-- ----------------------------
INSERT INTO [dbo].[payroll_creation] VALUES (N'04311431438801420419', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:42:04', N'2020-09-01', N'0', NULL, NULL, N'dep07', N'ST01', N'25')
GO

INSERT INTO [dbo].[payroll_creation] VALUES (N'04311431438801400918', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:40:09', N'2020-09-01', N'0', NULL, NULL, N'dep09', N'ST01', N'25')
GO

INSERT INTO [dbo].[payroll_creation] VALUES (N'04311431488215035218', N'ese.kelvin@dangoteprojects.com', N'2020-09-13 15:03:52', N'2020-10-01', N'0', NULL, NULL, N'dep09', N'ST01', N'25')
GO


-- ----------------------------
-- Table structure for payroll_staff_record
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[payroll_staff_record]') AND type IN ('U'))
	DROP TABLE [dbo].[payroll_staff_record]
GO

CREATE TABLE [dbo].[payroll_staff_record] (
  [payroll_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [staff_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [payment_type] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [payment_description] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [amount] decimal(15,2)  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [created_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [default_working_days] int  NULL,
  [absence_from_work] int  NULL,
  [days_worked] int  NULL,
  [payee] decimal(15,2)  NULL,
  [gross_salary] decimal(15,2)  NULL,
  [overtime_hrs] int  NULL,
  [overtime_pay] decimal(15,2)  NULL,
  [month_of] date  NOT NULL,
  [cat_group_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [status] tinyint  NULL,
  [updated_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [updated_at] datetime2(0)  NULL,
  [advance] decimal(15,2)  NULL,
  [arrears] decimal(15,2)  NULL,
  [entry_order] int  NULL,
  [absent_deduction] decimal(15,2)  NULL,
  [daily_gross_salary] decimal(10,2)  NULL,
  [present_days_amt] decimal(15,2)  NULL
)
GO

ALTER TABLE [dbo].[payroll_staff_record] SET (LOCK_ESCALATION = TABLE)
GO

EXEC sp_addextendedproperty
'MS_Description', N'payee for the number of days worked',
'SCHEMA', N'dbo',
'TABLE', N'payroll_staff_record',
'COLUMN', N'payee'
GO

EXEC sp_addextendedproperty
'MS_Description', N'Monthly gross salary',
'SCHEMA', N'dbo',
'TABLE', N'payroll_staff_record',
'COLUMN', N'gross_salary'
GO


-- ----------------------------
-- Records of payroll_staff_record
-- ----------------------------
INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7001', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-5669.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403804', NULL, NULL, NULL, N'.00', N'90000.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7001', N'Deduction', N'Payee', N'-5669.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-5669.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403804', NULL, NULL, NULL, N'.00', N'90000.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7001', N'Addition', N'Salary Arrears', N'90000.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-5669.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403804', NULL, NULL, NULL, N'.00', N'90000.00', N'7', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7001', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-5669.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403804', NULL, NULL, NULL, N'.00', N'90000.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7002', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403805', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7002', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403805', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7002', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403805', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7003', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403806', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7003', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403806', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7003', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403806', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7004', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403807', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7004', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403807', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7004', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403807', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7005', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403808', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7005', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403808', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7005', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403808', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7006', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403809', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7006', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403809', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7006', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403809', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7007', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403810', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7007', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403810', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7007', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403810', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7008', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403811', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7008', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403811', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7008', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403811', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7009', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403812', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7009', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403812', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7009', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403812', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7010', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403813', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7010', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403813', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7010', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403813', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7011', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403814', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7011', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403814', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7011', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403814', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7012', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403815', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7012', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403815', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7012', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403815', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7013', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403816', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7013', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403816', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7013', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403816', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7014', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403817', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7014', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403817', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7014', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403817', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7015', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403818', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7015', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403818', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7015', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403818', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7016', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403819', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7016', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403819', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7016', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021403819', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7017', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413820', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7017', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413820', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7017', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413820', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7018', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413821', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7018', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413821', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7018', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413821', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7019', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413822', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7019', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413822', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7019', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413822', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7020', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413823', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7020', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413823', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7020', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413823', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7021', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413824', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7021', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413824', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7021', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413824', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7022', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413825', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7022', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413825', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7022', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413825', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7023', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413826', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7023', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413826', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7023', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413826', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7024', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413827', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7024', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413827', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7024', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413827', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7025', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413828', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7025', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413828', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7025', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413828', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7026', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413829', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7026', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413829', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7026', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413829', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7027', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413830', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7027', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413830', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7027', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413830', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7028', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413831', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7028', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413831', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7028', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413831', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7029', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413832', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7029', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413832', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7029', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413832', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7030', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413833', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7030', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413833', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7030', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413833', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7031', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413834', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7031', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413834', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7031', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413834', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7032', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413835', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7032', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413835', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7032', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413835', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7033', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413836', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7033', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413836', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7033', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413836', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7034', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413837', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7034', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413837', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7034', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413837', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7035', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413838', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7035', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413838', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7035', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413838', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7036', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413839', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7036', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413839', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7036', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413839', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7037', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413840', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7037', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413840', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7037', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413840', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7038', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413841', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7038', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413841', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7038', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413841', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7039', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413842', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7039', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413842', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7039', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413842', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7040', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413843', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7040', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413843', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7040', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413843', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7041', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413844', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7041', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413844', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7041', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413844', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7042', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413845', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7042', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413845', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7042', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413845', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7043', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413846', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7043', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413846', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7043', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413846', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7044', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413847', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7044', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413847', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7044', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413847', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7045', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-82.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413848', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-18450.00', N'1025.00', N'8200.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7045', N'Deduction', N'Payee', N'-82.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-82.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413848', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-18450.00', N'1025.00', N'8200.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7045', N'Deduction', N'Absent From Work', N'-18450.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-82.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413848', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-18450.00', N'1025.00', N'8200.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7057', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413860', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7057', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413860', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7058', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413861', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7058', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413861', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7058', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413861', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7059', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413862', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7059', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413862', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7059', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413862', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7060', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413863', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7060', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413863', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7060', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413863', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7061', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413864', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7061', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413864', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7061', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413864', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7062', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413865', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7062', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413865', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7062', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413865', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7063', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413866', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7063', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413866', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7063', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413866', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7001', N'Addition', N'Gross Salary', N'39000.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-120.00', N'39000.00', N'0', N'.00', N'2020-09-01', N'2021413867', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-27000.00', N'1500.00', N'12000.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7001', N'Deduction', N'Payee', N'-120.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-120.00', N'39000.00', N'0', N'.00', N'2020-09-01', N'2021413867', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-27000.00', N'1500.00', N'12000.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7001', N'Deduction', N'Absent From Work', N'-27000.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-120.00', N'39000.00', N'0', N'.00', N'2020-09-01', N'2021413867', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-27000.00', N'1500.00', N'12000.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7002', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413868', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7002', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413868', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7002', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413868', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7003', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413869', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7003', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413869', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'B7003', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413869', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7046', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-82.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413849', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-18450.00', N'1025.00', N'8200.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7046', N'Deduction', N'Payee', N'-82.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-82.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413849', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-18450.00', N'1025.00', N'8200.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7046', N'Deduction', N'Absent From Work', N'-18450.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'18', N'5', N'-82.00', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413849', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-18450.00', N'1025.00', N'8200.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7047', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413850', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7047', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413850', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7047', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413850', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7048', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413851', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7048', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413851', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7048', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413851', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7049', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413852', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7049', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413852', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7049', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413852', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7050', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413853', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7050', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413853', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7050', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:41', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413853', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7051', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413854', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7051', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413854', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7051', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413854', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7052', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413855', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7052', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413855', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7052', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413855', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7053', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413856', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7053', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413856', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7053', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413856', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7054', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413857', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7054', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413857', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7054', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413857', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7055', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413858', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7055', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413858', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7055', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413858', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7056', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413859', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7056', N'Deduction', N'Payee', N'-30.75', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413859', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7056', N'Deduction', N'Absent From Work', N'-23575.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413859', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431438801420419', N'A7057', N'Addition', N'Gross Salary', N'26650.00', N'2020-09-12 20:21:42', N'ese.kelvin@dangoteprojects.com', N'26', N'23', N'0', N'-30.75', N'26650.00', N'0', N'.00', N'2020-09-01', N'2021413860', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-23575.00', N'1025.00', N'3075.00')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431488215035218', N'B9001', N'Addition', N'Gross Salary', N'33800.00', N'2020-09-13 15:07:05', N'ese.kelvin@dangoteprojects.com', N'26', N'20', N'0', N'-126.92', N'55000.00', N'0', N'.00', N'2020-10-01', N'1507053870', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-42307.60', N'2115.38', N'12692.28')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431488215035218', N'B9001', N'Deduction', N'Payee', N'-126.92', N'2020-09-13 15:07:05', N'ese.kelvin@dangoteprojects.com', N'26', N'20', N'0', N'-126.92', N'55000.00', N'0', N'.00', N'2020-10-01', N'1507053870', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-42307.60', N'2115.38', N'12692.28')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431488215035218', N'B9001', N'Addition', N'Additional Pay', N'21200.00', N'2020-09-13 15:07:05', N'ese.kelvin@dangoteprojects.com', N'26', N'20', N'0', N'-126.92', N'55000.00', N'0', N'.00', N'2020-10-01', N'1507053870', NULL, NULL, NULL, N'.00', N'.00', N'2', N'-42307.60', N'2115.38', N'12692.28')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431488215035218', N'B9001', N'Deduction', N'Absent From Work', N'-42307.60', N'2020-09-13 15:07:05', N'ese.kelvin@dangoteprojects.com', N'26', N'20', N'0', N'-126.92', N'55000.00', N'0', N'.00', N'2020-10-01', N'1507053870', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-42307.60', N'2115.38', N'12692.28')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431488215035218', N'B9002', N'Addition', N'Gross Salary', N'55000.00', N'2020-09-13 15:07:05', N'ese.kelvin@dangoteprojects.com', N'26', N'20', N'0', N'-126.92', N'55000.00', N'0', N'.00', N'2020-10-01', N'1507053871', NULL, NULL, NULL, N'.00', N'.00', N'1', N'-42307.60', N'2115.38', N'12692.28')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431488215035218', N'B9002', N'Deduction', N'Payee', N'-126.92', N'2020-09-13 15:07:05', N'ese.kelvin@dangoteprojects.com', N'26', N'20', N'0', N'-126.92', N'55000.00', N'0', N'.00', N'2020-10-01', N'1507053871', NULL, NULL, NULL, N'.00', N'.00', N'4', N'-42307.60', N'2115.38', N'12692.28')
GO

INSERT INTO [dbo].[payroll_staff_record] VALUES (N'04311431488215035218', N'B9002', N'Deduction', N'Absent From Work', N'-42307.60', N'2020-09-13 15:07:05', N'ese.kelvin@dangoteprojects.com', N'26', N'20', N'0', N'-126.92', N'55000.00', N'0', N'.00', N'2020-10-01', N'1507053871', NULL, NULL, NULL, N'.00', N'.00', N'3', N'-42307.60', N'2115.38', N'12692.28')
GO


-- ----------------------------
-- Table structure for permissions
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[permissions]') AND type IN ('U'))
	DROP TABLE [dbo].[permissions]
GO

CREATE TABLE [dbo].[permissions] (
  [id] bigint  NOT NULL,
  [name] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [guard_name] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[permissions] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for position_codes
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[position_codes]') AND type IN ('U'))
	DROP TABLE [dbo].[position_codes]
GO

CREATE TABLE [dbo].[position_codes] (
  [prefix] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [suffix] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [department_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [category_id] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[position_codes] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of position_codes
-- ----------------------------
INSERT INTO [dbo].[position_codes] VALUES (N' C', N'1000', N'dep01', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'1000', N'dep01', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'2000', N'dep02', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'3000', N'dep03', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'4000', N'dep04', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'5000', N'dep05', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'6000', N'dep06', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'7000', N'dep07', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'8000', N'dep08', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'A', N'9000', N'dep09', N'cat07')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'1000', N'dep01', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'2000', N'dep02', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'3000', N'dep03', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'4000', N'dep04', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'5000', N'dep05', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'6000', N'dep06', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'7000', N'dep07', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'8000', N'dep08', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'B', N'9000', N'dep09', N'cat06')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'C', N'2000', N'dep02', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'C', N'3000', N'dep03', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'C', N'4000', N'dep04', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'C', N'5000', N'dep05', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'C', N'6000', N'dep06', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'C', N'7000', N'dep07', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'C', N'8000', N'dep08', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'C', N'9000', N'dep09', N'cat05')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'1000', N'dep01', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'2000', N'dep02', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'3000', N'dep03', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'4000', N'dep04', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'5000', N'dep05', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'6000', N'dep06', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'7000', N'dep07', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'8000', N'dep08', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'D', N'9000', N'dep09', N'cat04')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'1000', N'dep01', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'2000', N'dep02', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'3000', N'dep03', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'4000', N'dep04', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'5000', N'dep05', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'6000', N'dep06', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'7000', N'dep07', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'8000', N'dep08', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'E', N'9000', N'dep09', N'cat03')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'1', N'dep01', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'2', N'dep02', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'3', N'dep03', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'4', N'dep04', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'5', N'dep05', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'6', N'dep06', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'7', N'dep07', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'8', N'dep08', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'F', N'9', N'dep09', N'cat02')
GO

INSERT INTO [dbo].[position_codes] VALUES (N'G', N'1', N'dep01', N'cat01')
GO


-- ----------------------------
-- Table structure for reporting_to
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[reporting_to]') AND type IN ('U'))
	DROP TABLE [dbo].[reporting_to]
GO

CREATE TABLE [dbo].[reporting_to] (
  [department_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [category_id] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [report_to_cat_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [reporting_code] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[reporting_to] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of reporting_to
-- ----------------------------
INSERT INTO [dbo].[reporting_to] VALUES (N'dep03', N'cat05', N'cat04', N'D3001', NULL, NULL)
GO

INSERT INTO [dbo].[reporting_to] VALUES (N'dep03', N'cat06', N'', NULL, NULL, NULL)
GO


-- ----------------------------
-- Table structure for role_user
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[role_user]') AND type IN ('U'))
	DROP TABLE [dbo].[role_user]
GO

CREATE TABLE [dbo].[role_user] (
  [role_id] int  NOT NULL,
  [user_id] int  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[role_user] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO [dbo].[role_user] VALUES (N'1', N'23', NULL, NULL)
GO

INSERT INTO [dbo].[role_user] VALUES (N'2', N'25', NULL, NULL)
GO

INSERT INTO [dbo].[role_user] VALUES (N'3', N'26', NULL, NULL)
GO

INSERT INTO [dbo].[role_user] VALUES (N'1', N'27', NULL, NULL)
GO


-- ----------------------------
-- Table structure for roles
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[roles]') AND type IN ('U'))
	DROP TABLE [dbo].[roles]
GO

CREATE TABLE [dbo].[roles] (
  [id] int  NOT NULL,
  [role_name] varchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [role_enable] int  NOT NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[roles] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO [dbo].[roles] VALUES (N'1', N'Developer Mode', N'1', N'2019-09-16 15:45:06', NULL)
GO

INSERT INTO [dbo].[roles] VALUES (N'2', N'Admin', N'1', N'2019-09-16 15:45:06', NULL)
GO

INSERT INTO [dbo].[roles] VALUES (N'3', N'Payroll Officer', N'1', N'2019-09-16 15:45:06', NULL)
GO


-- ----------------------------
-- Table structure for salary_description
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[salary_description]') AND type IN ('U'))
	DROP TABLE [dbo].[salary_description]
GO

CREATE TABLE [dbo].[salary_description] (
  [salary_desc_code] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [item_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[salary_description] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of salary_description
-- ----------------------------
INSERT INTO [dbo].[salary_description] VALUES (N'sd01', N'Monthly Gross Rate', NULL, NULL)
GO

INSERT INTO [dbo].[salary_description] VALUES (N'sd02', N'Additional Pay', NULL, NULL)
GO

INSERT INTO [dbo].[salary_description] VALUES (N'sd03', N'Housing', NULL, NULL)
GO


-- ----------------------------
-- Table structure for section
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[section]') AND type IN ('U'))
	DROP TABLE [dbo].[section]
GO

CREATE TABLE [dbo].[section] (
  [section_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [section_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [department_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[section] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of section
-- ----------------------------
INSERT INTO [dbo].[section] VALUES (N'012931', N'SAP', N'dep09', N'ese.kelvin@dangoteprojects.com', N'2019-10-16 16:14:46', N'2019-10-16 16:14:48')
GO

INSERT INTO [dbo].[section] VALUES (N'212333', N'FIELDS', N'dep03', N'ese.kelvin@dangoteprojects.com', N'2019-10-16 16:15:21', NULL)
GO

INSERT INTO [dbo].[section] VALUES (N'3231122', N'Software', N'dep09', N'ese.kelvin@dangoteprojects.com', N'2019-10-16 16:15:21', NULL)
GO

INSERT INTO [dbo].[section] VALUES (N'3231123', N'Support', N'dep09', N'ese.kelvin@dangoteprojects.com', N'2019-10-16 16:15:21', NULL)
GO

INSERT INTO [dbo].[section] VALUES (N'391222', N'E7 Security Post', N'dep07', N'ese.kelvin@dangoteprojects.com', N'2019-10-16 16:15:21', NULL)
GO


-- ----------------------------
-- Table structure for staff
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[staff]') AND type IN ('U'))
	DROP TABLE [dbo].[staff]
GO

CREATE TABLE [dbo].[staff] (
  [staff_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [first_name] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [last_name] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [other_name] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [marital_status] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [dob] date  NULL,
  [gender] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [address] text COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [lgaid] int  NULL,
  [mobile_phone] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [email] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime  NULL,
  [bin_code] varchar(7) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [account_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [account_number] varchar(11) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bvn] varchar(20) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [designation_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [status] tinyint  NULL,
  [staff_type_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [section_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [updated_at] datetime  NULL,
  [category_id] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [updated_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [engagement_date] date  NULL,
  [reporting_to] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[staff] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO [dbo].[staff] VALUES (N'A2001', N'YAKUBU', N'MUSA', N'ZAKARI', NULL, NULL, N'Male', NULL, NULL, N'09029788222', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'032', N'YAKUBU ZAKARI MUSA', N'0123185146', N'', N'152', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A2002', N'KHALID', N'ABDULLAHI', N'USMAN', NULL, NULL, N'Male', NULL, NULL, N'08083800178', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'214', N'KHALID USMAN ABDULLAHI', N'5096973019', N'22386317204', N'152', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A2003', N'ABDULLAHI,', N'MUHAMMED', N'MUHAMMED', NULL, NULL, N'Male', NULL, NULL, N'08028046595', N'muhammedabdullahimuhammed@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'058', N'ABDULLAHI, MUHAMMED MUHAMMED', N'0451630176', N'22505969105', N'152', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3001', N'USMAN', N'SANUSI ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'USMAN  SANUSI ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3002', N'ZAINAB', N'ISA', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'ZAINAB  ISA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3003', N'SANI', N'UZAIRU ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'SANI  UZAIRU ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3004', N'INDATU', N'HABU', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'INDATU  HABU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3005', N'MARYAM ', N'ROGO', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'MARYAM   ROGO', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3006', N'HALIMA', N'MUSA', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'HALIMA  MUSA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3007', N'MAIMUNA', N'ADAMU', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'MAIMUNA  ADAMU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3008', N'HUDU', N'USMAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'HUDU  USMAN', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3009', N'HAJARA', N'MOHAMMED', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'HAJARA  MOHAMMED', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3010', N'HAUWA', N'SULE', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'HAUWA  SULE', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3011', N'ZIAULHAQ ', N'MOHAMMED ', N'SHEHU', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'ZIAULHAQ  SHEHU MOHAMMED ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3012', N'ADAMU', N'KHALIFA ', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'ADAMU  KHALIFA ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3013', N'ABDULMIMIN ', N'BULALA', N'YAHUZA', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'ABDULMIMIN  YAHUZA BULALA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3014', N'MARYAM', N'UMAR ', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'MARYAM  UMAR ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3015', N'ZUWAIRA ', N'HASSAN', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'ZUWAIRA   HASSAN', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3016', N'AISHA', N'USMAN', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'AISHA  USMAN', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3017', N'HAUWA ', N'IDRIS', N'JEGA', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'HAUWA  JEGA IDRIS', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3018', N'ILIYASU', N'SHARABILU ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'ILIYASU  SHARABILU ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3019', N'ADUNIYA', N'ATOBI ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'ADUNIYA  ATOBI ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3020', N'GODIYA', N'ELIKANA', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'GODIYA  ELIKANA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3021', N'AMINA', N'ADAMU', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'AMINA  ADAMU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3022', N'KHADIJA ', N'YUNUSA', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'KHADIJA   YUNUSA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3023', N'AISHA', N'YAKUBU', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'AISHA  YAKUBU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3024', N'HALIMA ', N'YAKUBU', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'HALIMA   YAKUBU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3025', N'MARYAM', N'MUSA', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'MARYAM  MUSA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3026', N'MOHAMMED', N'SHUAIBU ', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'MOHAMMED  SHUAIBU ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3027', N'PATU', N'YAKUBU', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'PATU  YAKUBU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3028', N'ABUBAKAR', N'NUHU  ', N'.I.', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'ABUBAKAR .I. NUHU  ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3029', N'ASO', N'ABDULAHI ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'ASO  ABDULAHI ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3030', N'HAMZA', N'JABIRU ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'HAMZA  JABIRU ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3031', N'GAMBO', N'USMAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'GAMBO  USMAN', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3032', N'HASSAN', N'UBANDOMA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'HASSAN  UBANDOMA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3033', N'WAZIRI', N'MOHAMMED  ', N'KASSIM', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'WAZIRI KASSIM MOHAMMED  ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3034', N'MOHAMMED', N'BABA ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'MOHAMMED  BABA ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3035', N'BABAN', N'UMAR ', N'KWATA', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'BABAN KWATA UMAR ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3036', N'MOHAMMED', N'UMAR ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'MOHAMMED  UMAR ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3037', N'MARYAM', N'LAGU', N'ALHAJI', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'MARYAM ALHAJI LAGU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3038', N'GODWIN', N'VIGH', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'GODWIN  VIGH', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3039', N'ISKILU', N'SULEIMAN ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'ISKILU  SULEIMAN ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3040', N'ABUBAKAR', N'ABDULKARIM ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'ABUBAKAR  ABDULKARIM ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3041', N'ISA', N'AHMED ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:14.000', NULL, N'ISA  AHMED ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3042', N'MUSA', N'YAKUBU ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'MUSA  YAKUBU ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3043', N'AKWE', N'IBRAHIM ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'AKWE  IBRAHIM ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3044', N'ISIYAKA', N'ABDULLAHI ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'ISIYAKA  ABDULLAHI ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3045', N'ALI', N'HASSAN ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'ALI  HASSAN ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3046', N'IBRAHIM', N'ALHASSAN ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'IBRAHIM  ALHASSAN ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3047', N'SAMSON', N'DAVID ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'SAMSON  DAVID ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3048', N'HASHIMU', N'ABDULLAHI ', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'HASHIMU  ABDULLAHI ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3049', N'DANTALA', N'SADAM ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'DANTALA  SADAM ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3050', N'DANTANI', N'KASIMU ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'DANTANI  KASIMU ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3051', N'JOHN', N'EZEKIEL ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'JOHN  EZEKIEL ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3052', N'SHALELE', N'ABUBAKAR .S. ', N'.S. ', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'SHALELE .S.  ABUBAKAR .S. ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3053', N'MURTALA', N'SABO ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'MURTALA  SABO ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3054', N'USMAN', N'SHAMSU ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'USMAN  SHAMSU ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3055', N'IBRAHIM', N'ABUBAKAR ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:15.000', NULL, N'IBRAHIM  ABUBAKAR ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3056', N'HASSAN', N'MUSTAPHA ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'HASSAN  MUSTAPHA ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3057', N'OBAM', N'DAVID ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'OBAM  DAVID ', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3058', N'ALI', N'HASSAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'ALI  HASSAN', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3059', N'DANTALA', N'ABDULGANIYU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'DANTALA  ABDULGANIYU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3060', N'ABUBAKAR', N'ABDULRAHAM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'ABUBAKAR  ABDULRAHAM', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3061', N'HALADU', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'HALADU  IBRAHIM', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3062', N'USMAN', N'AZUKA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'USMAN  AZUKA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3063', N'MUSA', N'BASHIR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'MUSA  BASHIR', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3064', N'SULEIMAN', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'SULEIMAN  ABUBAKAR', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3065', N'TARBO', N'TERPASE', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'TARBO  TERPASE', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3066', N'AHMED', N'GADDAFI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'AHMED  GADDAFI', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3067', N'YAHAYA', N'DAHIRU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'YAHAYA  DAHIRU', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3068', N'MUSA', N'HARUNA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'MUSA  HARUNA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3069', N'TANKO', N'YAHAYA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'TANKO  YAHAYA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A3070', N'ADAMU', N'MAMUDA', N'.B.', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:16.000', NULL, N'ADAMU .B. MAMUDA', N'', N'', N'172', N'1', N'ST02', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6001', N'NANDI', N'JOB', N'DAAN', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'032', N'NANDI DAAN JOB', N'0035425426', N'', N'146', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6002', N'ESTHER', N'DANJUMA', N'CHAGGA', NULL, NULL, N'Female', NULL, NULL, N'08067395670', N'estherdanjuma@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'070', N'ESTHER CHAGGA DANJUMA', N'6235397594', N'22287182035', N'146', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6003', N'MOHAMMED', N'ILIYASU', N'NASIRU', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'063', N'MOHAMMED NASIRU ILIYASU', N'0011360451', N'', N'146', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6004', N'ADAMU', N'SHUAIBU', N'GALADIMA', NULL, NULL, N'Male', NULL, NULL, N'07014926119', N'shuaibuadamugaladima61@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'214', N'ADAMU GALADIMA SHUAIBU', N'4995607012', N'22456838437', N'146', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6005', N'UMAR', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'08122823769', N'NIL', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'032', N'UMAR  IBRAHIM', N'0093143896', N'22485781614', N'146', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6006', N'PATRICK', N'TINA', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'063', N'PATRICK  TINA', N'0100970620', N'', N'146', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6007', N'SARATU', N'ABDULLAHI', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'SARATU  ABDULLAHI', N'0107347269', N'', N'149', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6008', N'ZAINAB', N'UMAR', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'ZAINAB  UMAR', N'0104768326', N'', N'149', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6009', N'ADAMA', N'USMAN', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'ADAMA  USMAN', N'0103624746', N'', N'149', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6010', N'ISA', N'AHMED', N'', NULL, NULL, N'Male', NULL, NULL, N'09017162765', N'NIL', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'ISA  AHMED', N'0118858042', N'22531802674', N'150', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6011', N'RAHMATU', N'HASSAN', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'RAHMATU  HASSAN', N'0091584686', N'', N'149', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6012', N'UMAR', N'USMAN,', N'', NULL, NULL, N'Male', NULL, NULL, N'08124784291', N'umarusmantunga@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'058', N'UMAR  USMAN,', N'0162599702', N'22374460686', N'150', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6013', N'THADDEUS', N'AYAAKAA', N'', NULL, NULL, N'Male', NULL, NULL, N'08025704988', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'THADDEUS  AYAAKAA', N'0065958008', N'22444439794', N'150', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6014', N'ISMAILA', N'ISA', N'', NULL, NULL, N'Male', NULL, NULL, N'07089363198', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'032', N'ISMAILA  ISA', N'0121309054', N'22489028346', N'150', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6015', N'DAUDA', N'MUJAHID', N'', NULL, NULL, N'Male', NULL, NULL, N'07010464883', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'032', N'DAUDA  MUJAHID', N'0121327913', N'22535891111', N'150', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A6016', N'PAUL', N'FRIDAY', N'', NULL, NULL, N'Male', NULL, NULL, N'07012320108', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'032', N'PAUL  FRIDAY', N'0121829091', N'22536384900', N'150', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7001', N'YAHO', N'HAMZA', N'ABDULLAHI', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'221', N'YAHO ABDULLAHI HAMZA', N'0024942376', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7002', N'JINJIMI', N'ABDULLAHI', N'ALIYU', NULL, NULL, N'Male', NULL, NULL, N'09077099148', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'063', N'JINJIMI ALIYU ABDULLAHI', N'0079574962', N'22394085119', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7003', N'ABDULMUMIN', N'HASSAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'ABDULMUMIN  HASSAN', N'0102447212', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7004', N'ADAMU', N'MOHAMMADU', N'T', NULL, NULL, N'Male', NULL, NULL, N'09020430178', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'ADAMU T MOHAMMADU', N'0102031651', N'2.25052E+11', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7005', N'MOHAMMED', N'AUWAL', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'076', N'MOHAMMED  AUWAL', N'3051184780', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7006', N'ZAKARI', N'DALHATU', N'', NULL, NULL, N'Male', NULL, NULL, N'08084334744', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'ZAKARI  DALHATU', N'0040657704', N'22331615212', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7007', N'BAKA', N'SARKIN-', N'DANLAMI', NULL, NULL, N'Male', NULL, NULL, N'07087359300', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'BAKA DANLAMI SARKIN-', N'0047030173', N'22337178823', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7008', N'IORFA', N'AKURAGAA', N'', NULL, NULL, N'Male', NULL, NULL, N'09027849265', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'IORFA  AKURAGAA', N'0102047076', N'22504168000', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7009', N'ISA', N'SHUAIBU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'ISA  SHUAIBU', N'0101159420', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7010', N'ISYAKA', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'07088685469', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'214', N'ISYAKA  ABUBAKAR', N'5157893012', N'22494741740', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7011', N'AKURAGA', N'JACOB', N'', NULL, NULL, N'Male', NULL, NULL, N'07018789792', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'AKURAGA  JACOB', N'0102380964', N'22500332649', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7012', N'MUHAMMED', N'DAHIRU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'214', N'MUHAMMED  DAHIRU', N'5329361011', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7013', N'KUMAGA', N'ABEDA', N'SAMUEL', NULL, NULL, N'Male', NULL, NULL, N'08129215784', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'KUMAGA SAMUEL ABEDA', N'0102673400', N'22453216010', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7014', N'SOJA', N'AGYEMA', N'', NULL, NULL, N'Male', NULL, NULL, N'07080721832', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'032', N'SOJA  AGYEMA', N'0101235586', N'22477482930', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7015', N'SULEIMAN', N'UMAR', N'UMAR', NULL, NULL, N'Male', NULL, NULL, N'08088175611', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'214', N'SULEIMAN UMAR UMAR', N'4791371016', N'22454663189', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7016', N'UMARU', N'ABDULLAHI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'214', N'UMARU  ABDULLAHI', N'5335669015', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7017', N'ZAKARI', N'USMAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:06.000', N'214', N'ZAKARI  USMAN', N'5326361010', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7018', N'ZUBAIRU', N'SHUAIBU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'ZUBAIRU  SHUAIBU', N'0101213344', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7019', N'MOHAMMED', N'MOHAMMED', N'AHMED', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'050', N'MOHAMMED AHMED MOHAMMED', N'4223069968', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7020', N'BABA', N'MUHAMMED ', N'ADAMU', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'063', N'BABA ADAMU MUHAMMED ', N'0012418108', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7021', N'SANUSI', N'MOHAMMED ', N'', NULL, NULL, N'Male', NULL, NULL, N'08120898428', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'044', N'SANUSI  MOHAMMED ', N'0739243440', N'22447744398', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7022', N'MURTALA', N'HASSAN', N'', NULL, NULL, N'Male', NULL, NULL, N'09071729134', N'NIL', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'MURTALA  HASSAN', N'0084457694', N'22475792644', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7023', N'NDAGI', N'SULE', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'214', N'NDAGI  SULE', N'5163031011', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7024', N'UMAR', N'RABIU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'UMAR  RABIU', N'0101454895', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7025', N'MUSA', N'SALE', N'', NULL, NULL, N'Male', NULL, NULL, N'09076398753', N'NIL', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'063', N'MUSA  SALE', N'0036008383', N'22388131079', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7026', N'BAWA', N'MOHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'214', N'BAWA  MOHAMMED', N'5281944019', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7027', N'TANKO', N'ALIYU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'214', N'TANKO  ALIYU', N'5382231010', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7028', N'MUHAMMAD', N'ABDULLAHI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'MUHAMMAD  ABDULLAHI', N'0106195212', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7029', N'YAKUBU', N'UMAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'YAKUBU  UMAR', N'0100032757', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7030', N'IBRAHIM', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'IBRAHIM  ABUBAKAR', N'0102154903', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7031', N'AUDU', N'KORAU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'214', N'AUDU  KORAU', N'4790403017', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7032', N'ARMAYAU', N'USMAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'ARMAYAU  USMAN', N'0101308091', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7033', N'D.', N'ABUBAKAR', N'SULEIMAN', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'D. SULEIMAN ABUBAKAR', N'0037807264', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7034', N'AMINA', N'ALHAJI', N'L', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'AMINA L ALHAJI', N'0102542698', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7035', N'BASIRU', N'MOHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'08088635021', N'NIL', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'215', N'BASIRU  MOHAMMED', N'0021202883', N'22290548868', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7036', N'KAMALLUDDEEN', N'ALI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'032', N'KAMALLUDDEEN  ALI', N'0116714977', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7037', N'ABDULLAHI', N'NAFIU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:07.000', N'057', N'ABDULLAHI  NAFIU', N'2119964390', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7038', N'ABDULLAHI', N'MALL MIKAILU', N'RIDWAN', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'ABDULLAHI RIDWAN MALL MIKAILU', N'0035421318', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7039', N'DANKISHIYA', N'USMAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'DANKISHIYA  USMAN', N'0101556988', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7040', N'IBRAHIM', N'ABUBAKAR', N'MUHAMMAD', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'058', N'IBRAHIM MUHAMMAD ABUBAKAR', N'0432590161', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7041', N'NUHU', N'ZAKARI', N'ATTAJIRI', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'058', N'NUHU ATTAJIRI ZAKARI', N'0431850426', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7042', N'MUSA', N'ABDULLAHI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'MUSA  ABDULLAHI', N'0116749117', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7043', N'UMAR', N'ADAMU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'UMAR  ADAMU', N'0116936184', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7044', N'IORLUMUN', N'AEL', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'IORLUMUN  AEL', N'0117265593', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7045', N'HASSAN', N'ABDULLAHI', N'', NULL, NULL, N'Male', NULL, NULL, N'07012080805', N'hassanabdullahiawe@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'HASSAN  ABDULLAHI', N'0040246478', N'22476167539', N'151', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7046', N'MOHAMMED', N'ISHAKA ', N'L', NULL, NULL, N'Male', NULL, NULL, N'09022536308', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'MOHAMMED L ISHAKA ', N'0099252035', N'22499583509', N'151', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7047', N'HARUNA', N'MUSTAPHA,', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'058', N'HARUNA  MUSTAPHA,', N'0234536396', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7048', N'DANIEL', N'DOOM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'DANIEL  DOOM', N'0107952805', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7049', N'IBRAHIM', N'ADAMU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'214', N'IBRAHIM  ADAMU', N'4931488019', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7050', N'MARYAM', N'MAHAMMADU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'032', N'MARYAM  MAHAMMADU', N'0106349314', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7051', N'DANMAMA', N'MOHAMMED', N'ADAMUD', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:08.000', N'214', N'DANMAMA ADAMUD MOHAMMED', N'4802789018', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7052', N'SULEIMAN', N'YUNUSA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'SULEIMAN  YUNUSA', N'0084837221', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7053', N'AHMADU', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'AHMADU  IBRAHIM', N'0101469237', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7054', N'BALA', N'YUSUF ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'BALA  YUSUF ', N'0116791446', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7055', N'KASIMU', N'ALKASIMU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'214', N'KASIMU  ALKASIMU', N'6348709011', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7056', N'CHINDO', N'GAMBO', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'CHINDO  GAMBO', N'0121598317', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7057', N'SALEH', N'MOHAMMED ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'214', N'SALEH  MOHAMMED ', N'0428124019', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7058', N'TANKO', N'MOHAMMED ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'TANKO  MOHAMMED ', N'0070664347', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7059', N'ABUBAKAR', N'MOHAMMED ', N'T', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'ABUBAKAR T MOHAMMED ', N'0123759794', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7060', N'IBRAHIM', N'ABDULLAHI', N'U', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'IBRAHIM U ABDULLAHI', N'0035427585', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7061', N'SHAYA', N'AHMED ', N'U', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'SHAYA U AHMED ', N'0035429431', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7062', N'JAFARU', N'KASIMU ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'063', N'JAFARU  KASIMU ', N'0096359379', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'A7063', N'UMAR', N'BALA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'UMAR  BALA', N'0124075882', N'', N'163', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B1001', N'HARUNA', N'SHURAH', N'ZAKARI', N'', N'2020-09-12', N'Male', N'', NULL, N'', NULL, N'c@yahoo.com', N'2019-12-07 16:29:12.000', N'063', N'HARUNA ZAKARI SHURAH', N'0038782519', N'', N'165', N'1', N'ST01', NULL, N'2019-12-19 15:06:26.000', N'cat06', NULL, N'2019-12-19', NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2001', N'LUKMAN', N'RAYYANU ', N'', NULL, NULL, N'Male', NULL, NULL, N'09072726101', N'rayyanlukman@gmail.com', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'032', N'LUKMAN  RAYYANU ', N'67053732', N'22362893681', N'93', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2002', N'BULUS', N'AZENU', N'DANLAMI', NULL, NULL, N'Male', NULL, NULL, N'08024502363', N'azenudanlami@gmail.com', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'070', N'BULUS DANLAMI AZENU', N'6239523474', N'22361060475', N'94', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2003', N'SHEHU', N'YERO', N'.M', NULL, NULL, N'Male', NULL, NULL, N'09019809551', N'shehumusayero@yahoo.com', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'032', N'SHEHU .M YERO', N'0042038868', N'22201143393', N'152', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2004', N'BABA', N'HUSSEINI', N'', NULL, NULL, N'Male', NULL, NULL, N'08087496822', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'030', N'BABA  HUSSEINI', N'1500586475', N'', N'148', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2005', N'FRANCIS', N'WATAKIRI', N'', NULL, NULL, N'Male', NULL, NULL, N'07088345592', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'033', N'FRANCIS  WATAKIRI', N'2125055996', N'22411907110', N'148', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2006', N'MIANA', N'YUSU', N'', NULL, NULL, N'Male', NULL, NULL, N'08088807318', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'030', N'MIANA  YUSU', N'1500853489', N'', N'148', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2007', N'KATTADA', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'07089770899', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'214', N'KATTADA  ABUBAKAR', N'5244033011', N'22502783153', N'114', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2008', N'AONDOTSEA', N'JOSHUA', N'MBAIORGA', NULL, NULL, N'Male', NULL, NULL, N'09070657361', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'044', N'AONDOTSEA MBAIORGA JOSHUA', N'0724333705', N'22321879248', N'148', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2009', N'MUZAMMILU', N'ZUNAIDU', N'', NULL, NULL, N'Male', NULL, NULL, N'07088959529', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'033', N'MUZAMMILU  ZUNAIDU', N'2096865543', N'22432763450', N'152', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2010', N'SALIHU', N'BALA', N'', NULL, NULL, N'Male', NULL, NULL, N'08087197552', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'032', N'SALIHU  BALA', N'0100940977', N'22447192519', N'114', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2011', N'ILIYASU', N'MUHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'08087070960', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'011', N'ILIYASU  MUHAMMED', N'3077557761', N'22292603857', N'124', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2012', N'UMARU', N'MUSTAPHA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'UMARU  MUSTAPHA', N'0041852386', N'', N'124', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2013', N'HALILU', N'YAHAYA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'HALILU  YAHAYA', N'0101305557', N'', N'114', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2014', N'FRIDAY', N'MOMOH', N'O', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'011', N'FRIDAY O MOMOH', N'3090917959', N'', N'171', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2015', N'ALIYU', N'MOHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'032', N'ALIYU  MOHAMMED', N'0101255731', N'', N'171', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2016', N'MUHAMMAD', N'ZUBAIRU', N'BELLO', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'214', N'MUHAMMAD BELLO ZUBAIRU', N'5307840017', N'', N'147', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2017', N'BASHIR', N'SOFIYANU', N'', NULL, NULL, N'Male', NULL, NULL, N'09026638794', N'bashirsafiyanu@yahoo.com', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'214', N'BASHIR  SOFIYANU', N'2775912019', N'22302289312', N'148', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2018', N'ABDULRAHIM', N'ABUBAKAR,', N'', NULL, NULL, N'Male', NULL, NULL, N'08020306663', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'058', N'ABDULRAHIM  ABUBAKAR,', N'0223314099', N'22321598543', N'171', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2019', N'UMAR', N'TARAZIU', N'TUNGA', NULL, NULL, N'Male', NULL, NULL, N'08120947370', N'umartaraziu2020@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'214', N'UMAR TUNGA TARAZIU', N'5056521010', N'22412107762', N'171', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2020', N'GAMBO', N'ADAMU', N'ATUBA', NULL, NULL, N'Male', NULL, NULL, N'07016508388', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'214', N'GAMBO ATUBA ADAMU', N'4953833019', N'', N'155', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2021', N'ABDULHAMID', N'AHMAD', N'', NULL, NULL, N'Male', NULL, NULL, N'07088558188', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'058', N'ABDULHAMID  AHMAD', N'0250138538', N'22443014121', N'158', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2022', N'HARUNA', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'08025466713', N'harunaabubakar1988@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'214', N'HARUNA  ABUBAKAR', N'5199797019', N'22471305169', N'171', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2023', N'NASIRU', N'MURWANU', N'MUHAMMED', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'214', N'NASIRU MUHAMMED MURWANU', N'5296548017', N'', N'161', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2024', N'HALIDU', N'DAUDA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'063', N'HALIDU  DAUDA', N'0041831738', N'', N'162', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2025', N'MUGU', N'SHINKUT ', N'JONATHAN', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'011', N'MUGU JONATHAN SHINKUT ', N'3023031011', N'', N'161', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2026', N'USMAN', N'JIBRIN ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'USMAN  JIBRIN ', N'0044013409', N'', N'161', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2027', N'USMAN', N'DANLAMI', N'W', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'USMAN W DANLAMI', N'0063265580', N'', N'162', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2028', N'JOSEPH', N'AMINU ', N'ARIKO', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'058', N'JOSEPH ARIKO AMINU ', N'0231161320', N'', N'166', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2029', N'MOHAMMED', N'SHEHU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', NULL, N'MOHAMMED  SHEHU', N'', N'', N'166', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2030', N'LABA', N'MOSES ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', NULL, N'LABA  MOSES ', N'', N'', N'167', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2031', N'FRIDAY', N'PETER', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', NULL, N'FRIDAY  PETER', N'', N'', N'168', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2032', N'JIBRIN', N'SULEIMAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', N'050', N'JIBRIN  SULEIMAN', N'0351217039', N'', N'169', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2033', N'CLEMENT', N'DOOGA', N'AONDOWASE', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'CLEMENT AONDOWASE DOOGA', N'', N'', N'171', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2034', N'KAMALUDEEN', N'MUHAMMED', N'A', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'KAMALUDEEN A MUHAMMED', N'', N'', N'171', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B2035', N'ISA', N'AHMAD', N'SAIDU', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'ISA SAIDU AHMAD', N'', N'', N'171', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3001', N'MUSA', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'032', N'MUSA  ABUBAKAR', N'0101237212', N'', N'106', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3002', N'ABDULAZIZ', N'ABDULLAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'032', N'ABDULAZIZ  ABDULLAHIM', N'0101223389', N'', N'107', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3003', N'BAKO', N'MAIDAWA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'063', N'BAKO  MAIDAWA', N'0012887047', N'', N'109', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3004', N'AMINU', N'SIYAKA, ', N'', NULL, NULL, N'Male', NULL, NULL, N'08062940557', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'058', N'AMINU  SIYAKA, ', N'0127198061', N'22265670320', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3005', N'ABDULKARIM', N'OGOSHI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'032', N'ABDULKARIM  OGOSHI', N'0101218349', N'', N'106', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3006', N'AUTA', N'ALI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'032', N'AUTA  ALI', N'0101396557', N'', N'121', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3007', N'IBRAHIM', N'BABAARI', N'B', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'032', N'IBRAHIM B BABAARI', N'0101609004', N'', N'106', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3008', N'ABDULLAHI', N'JIBRIN', N'YIRGAU', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'011', N'ABDULLAHI YIRGAU JIBRIN', N'3077673777', N'', N'107', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3009', N'DANLAMI', N'SAMUEL ', N'YUSUFU', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'011', N'DANLAMI YUSUFU SAMUEL ', N'3073009578', N'', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3010', N'ADAMU', N'SULEIMAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'032', N'ADAMU  SULEIMAN', N'0101216802', N'', N'124', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3011', N'ALKASIM', N'HUSSAINI,', N'OTAKI', NULL, NULL, N'Male', NULL, NULL, N'08022518553', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'058', N'ALKASIM OTAKI HUSSAINI,', N'0240364712', N'22429554403', N'124', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3012', N'TERDOO', N'KATSU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'032', N'TERDOO  KATSU', N'0101227325', N'', N'106', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3013', N'JAMIL', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'082', N'JAMIL  ABUBAKAR', N'6010489431', N'', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3014', N'AYUBA', N'UMAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'214', N'AYUBA  UMAR', N'5257030018', N'', N'124', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3015', N'MIKAILA', N'MAGAYAKI', N'PAKACHI', NULL, NULL, N'Male', NULL, NULL, N'07016819500', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'215', N'MIKAILA PAKACHI MAGAYAKI', N'0036239782', N'22487452361', N'124', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3016', N'ALI', N'ABDULLAHI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'ALI  ABDULLAHI', N'0101227961', N'', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3017', N'DANLAMI', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'214', N'DANLAMI  IBRAHIM', N'5168403011', N'', N'109', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3018', N'SADANU', N'MUHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'SADANU  MUHAMMED', N'0102345428', N'', N'121', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3019', N'EMMANUEL', N'MICHEAL', N'J', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'EMMANUEL J MICHEAL', N'0120065227', N'', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3020', N'MASALLAH', N'ADAMU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'MASALLAH  ADAMU', N'0120351238', N'', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3021', N'ISAH', N'AUDU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'ISAH  AUDU', N'0117969592', N'', N'123', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3022', N'MUHAMMED', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'08034522054', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'MUHAMMED  ABUBAKAR', N'0037865815', N'22405058923', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3023', N'SALE', N'ALI', N'', NULL, NULL, N'Male', NULL, NULL, N'09017699125', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'SALE  ALI', N'0123280807', N'22170106562', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3024', N'SHIAIBU', N'YUSUF', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'SHIAIBU  YUSUF', N'0102548047', N'', N'125', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3025', N'MUSA', N'ILIYASU', N'', NULL, NULL, N'Male', NULL, NULL, N'08029152459', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'MUSA  ILIYASU', N'0106593306', N'22501455138', N'107', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3026', N'ALI', N'ABDULRAZAK', N'', NULL, NULL, N'Male', NULL, NULL, N'07088390747', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'ALI  ABDULRAZAK', N'0118126259', N'22530720984', N'107', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3027', N'OKPEYA', N'MUSA', N'HARUNA', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'063', N'OKPEYA HARUNA MUSA', N'0090209317', N'', N'107', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3028', N'UMAR', N'IBRAHIM', N'MOHAMMED', NULL, NULL, N'Male', NULL, NULL, N'07017180502', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'214', N'UMAR MOHAMMED IBRAHIM', N'4792371013', N'22446497899', N'126', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3029', N'SULEIMAN', N'SALLAU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'SULEIMAN  SALLAU', N'0101605147', N'', N'131', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3030', N'AMINU', N'SURAJO ', N'', NULL, NULL, N'Male', NULL, NULL, N'09016305101', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'AMINU  SURAJO ', N'0120278207', N'22533773901', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3031', N'HALLIRU', N'MOHAMMED', N'SULEIMAN', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'214', N'HALLIRU SULEIMAN MOHAMMED', N'5081357013', N'', N'107', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3032', N'JAFARU', N'MUHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'09016713596', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'JAFARU  MUHAMMED', N'0101286100', N'22499306339', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3033', N'YAHAYA', N'OSAMA', N'NUHU', NULL, NULL, N'Male', NULL, NULL, N'08087668924', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'044', N'YAHAYA NUHU OSAMA', N'0818261796', N'22530908621', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3034', N'DALHATU', N'ABDULLAHI', N'', NULL, NULL, N'Male', NULL, NULL, N'08035596485', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'032', N'DALHATU  ABDULLAHI', N'0041590006', N'22517923720', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3035', N'SANI', N'TANKO', N'USMAN', NULL, NULL, N'Male', NULL, NULL, N'08069168692', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'221', N'SANI USMAN TANKO', N'0024659469', N'22394614915', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3036', N'ABUBAKAR', N'IDRIS', N'BUHARI', NULL, NULL, N'Male', NULL, NULL, N'08024222944', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'032', N'ABUBAKAR BUHARI IDRIS', N'0120284440', N'22533641408', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3037', N'UBA', N'HARUNA', N'IBRAHIM', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'063', N'UBA IBRAHIM HARUNA', N'0051384949', N'', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3038', N'AHMED', N'TANIMU', N'', NULL, NULL, N'Male', NULL, NULL, N'08035596485', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'050', N'AHMED  TANIMU', N'0261196510', N'22517923720', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3039', N'ABDULLAHI', N'SHUAIBU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'032', N'ABDULLAHI  SHUAIBU', N'0101226641', N'', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3040', N'JOSEPH', N'CHRISTOPHER', N'', NULL, NULL, N'Male', NULL, NULL, N'09075930859', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'044', N'JOSEPH  CHRISTOPHER', N'0823091126', N'22534095778', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3041', N'AMIN', N'SALE,', N'MOHAMMED', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'058', N'AMIN MOHAMMED SALE,', N'0227975159', N'', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3042', N'MOHAMMED', N'IBRAHIM', N'WULLY', NULL, NULL, N'Male', NULL, NULL, N'09014518485', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'215', N'MOHAMMED WULLY IBRAHIM', N'0027110359', N'22421889691', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3043', N'BAKO', N'USENI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'033', N'BAKO  USENI', N'2071770770', N'', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3044', N'DAIYYBU', N'USMAN', N'ABUBAKAR', NULL, NULL, N'Male', NULL, NULL, N'08135397384', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:03.000', N'063', N'DAIYYBU ABUBAKAR USMAN', N'0108777502', N'22509062293', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3045', N'ABDULSALAM', N'SHAIBU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'032', N'ABDULSALAM  SHAIBU', N'0102108937', N'', N'125', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3046', N'ABUBAKAR', N'ABDULLAHI - ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'044', N'ABUBAKAR  ABDULLAHI - ', N'1218227421', N'', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3047', N'JIBRIN', N'RISILA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'214', N'JIBRIN  RISILA', N'5167714017', N'', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3048', N'IBRAHIM', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'063', N'IBRAHIM  ABUBAKAR', N'0036742885', N'', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3049', N'NASIRU', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'215', N'NASIRU  ABUBAKAR', N'0007652967', N'', N'133', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3050', N'AHMED', N'SHEHU', N'A', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'032', N'AHMED A SHEHU', N'0102147945', N'', N'109', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3051', N'HARUNA', N'SHEHU', N'', NULL, NULL, N'Male', NULL, NULL, N'08026657216', N'shehubanua2017@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'063', N'HARUNA  SHEHU', N'0036787242', N'22320057214', N'126', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3052', N'AYOLE', N'SULEIMAN', N'ABDULLAHI', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'063', N'AYOLE ABDULLAHI SULEIMAN', N'0072648554', N'', N'134', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3053', N'ISA', N'MOHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'214', N'ISA  MOHAMMED', N'5393464012', N'', N'135', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3054', N'ABUBAKAR', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'032', N'ABUBAKAR  IBRAHIM', N'0100930286', N'', N'131', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3055', N'MARTINS', N'MHEMBE', N'AONDOVER', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'033', N'MARTINS AONDOVER MHEMBE', N'2060217046', N'', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3056', N'ISMAILA', N'MUSA,', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'058', N'ISMAILA  MUSA,', N'0045829438', N'', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3057', N'YUSUF', N'SULEIMAN', N'', NULL, NULL, N'Male', NULL, NULL, N'09021074671', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'214', N'YUSUF  SULEIMAN', N'5319625013', N'22483878254', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3058', N'MONDAY', N'DAUDA', N'J', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'032', N'MONDAY J DAUDA', N'0118276123', N'', N'139', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3059', N'ALIYU', N'JIBRIN', N'SULEIMAN', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'033', N'ALIYU SULEIMAN JIBRIN', N'2089442375', N'', N'126', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3060', N'RAYYANU', N'ISA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'032', N'RAYYANU  ISA', N'0101150300', N'', N'131', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3061', N'ISAAC', N'DANSHATU', N'AMINU', NULL, NULL, N'Male', NULL, NULL, N'09011537343', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'033', N'ISAAC AMINU DANSHATU', N'2089652127', N'', N'133', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3062', N'ABDULRASHEED', N'SHEU', N'', NULL, NULL, N'Male', NULL, NULL, N'09029299469', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'032', N'ABDULRASHEED  SHEU', N'0101149502', N'22503192497', N'107', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3063', N'YAKUBU', N'MOHAMMED,', N'AWE', NULL, NULL, N'Male', NULL, NULL, N'07063585984', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'058', N'YAKUBU AWE MOHAMMED,', N'0119386623', N'22224242356', N'132', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3064', N'RISILANU', N'UMAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'214', N'RISILANU  UMAR', N'5306255014', N'', N'121', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3065', N'VICTOR', N'BULUS', N'AWASHU', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'011', N'VICTOR AWASHU BULUS', N'3125540824', N'', N'107', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3066', N'SHITU', N'ABDULLAHI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'033', N'SHITU  ABDULLAHI', N'2106533769', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3067', N'AJAMA', N'ELKANA', N'', NULL, NULL, N'Male', NULL, NULL, N'07010985682', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'AJAMA  ELKANA', N'0101151675', N'22501186632', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3068', N'HUZAIFA', N'JIBRIN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'HUZAIFA  JIBRIN', N'0102422938', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3069', N'HABILA', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'07014665106', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'HABILA  ABUBAKAR', N'0093142837', N'22484471431', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3070', N'AKOSA', N'DANGANA', N'', NULL, NULL, N'Male', NULL, NULL, N'09075128645', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'AKOSA  DANGANA', N'0101161218', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3071', N'HOSEA', N'YOHANNA', N'AJAMA', NULL, NULL, N'Male', NULL, NULL, N'08129773329', N'hoseayohana001@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'HOSEA AJAMA YOHANNA', N'0101135600', N'22503345619', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3072', N'SHALELE', N'ADAMU', N'SANI', NULL, NULL, N'Male', NULL, NULL, N'07018820081', N'abachashelele2@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'SHALELE SANI ADAMU', N'0101156515', N'22451118330', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3073', N'ABAWA', N'TUWASE', N'', NULL, NULL, N'Male', NULL, NULL, N'08083491943', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'ABAWA  TUWASE', N'0101245734', N'22503193061', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3074', N'HARUNA', N'YAHUZA', N'', NULL, NULL, N'Male', NULL, NULL, N'07017179057', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'063', N'HARUNA  YAHUZA', N'0083102807', N'22405476624', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3075', N'HUSSEINI', N'MOHAMMAD', N'', NULL, NULL, N'Male', NULL, NULL, N'07077440882', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'HUSSEINI  MOHAMMAD', N'0101207682', N'22503345761', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3076', N'EMMANUEL', N'SOLOMON', N'', NULL, NULL, N'Male', NULL, NULL, N'07087354472', N'emmanuelsolomon001@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'EMMANUEL  SOLOMON', N'0101150977', N'22502936362', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3077', N'IMAM', N'ABDULSALAM', N'YAHUZA', NULL, NULL, N'Male', NULL, NULL, N'07081191880', N'', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'IMAM YAHUZA ABDULSALAM', N'0101155635', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3078', N'ILIYASU', N'MUSA', N'', NULL, NULL, N'Male', NULL, NULL, N'07087578717', N'', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'ILIYASU  MUSA', N'0101448016', N'22503346296', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3079', N'PAUL', N'MOSES', N'', NULL, NULL, N'Male', NULL, NULL, N'08022728712', N'mosespaulalayin241@yahoo.com', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'PAUL  MOSES', N'0102511669', N'22499588753', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3080', N'SADANU', N'MUHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'SADANU  MUHAMMED', N'0101227349', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3081', N'AJAMA', N'MATHIAS', N'', NULL, NULL, N'Male', NULL, NULL, N'07016733130', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'AJAMA  MATHIAS', N'0101135648', N'22501996495', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3082', N'DANTALA', N'DANTANI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'DANTALA  DANTANI', N'0066253762', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3083', N'ALFA', N'ASOLA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'ALFA  ASOLA', N'0101297513', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3084', N'SAMAILA', N'ABAWA', N'', NULL, NULL, N'Male', NULL, NULL, N'07080969788', N'samailaabawa@gmail', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'214', N'SAMAILA  ABAWA', N'4788719014', N'22446389820', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3085', N'IRIMIYA', N'MIKA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'IRIMIYA  MIKA', N'0101158038', N'', N'157', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3086', N'YAKUBU', N'IBRAHIM', N'ABUBAKAR', NULL, NULL, N'Male', NULL, NULL, N'07011500992', N'faransa509@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'YAKUBU ABUBAKAR IBRAHIM', N'0091001684', N'22336942920', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3087', N'HAMIDU', N'ABDULRAZAK', N'', NULL, NULL, N'Male', NULL, NULL, N'08082498196', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'HAMIDU  ABDULRAZAK', N'0101288609', N'22503218069', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3088', N'DANLADI', N'ASHESHI', N'ENOCH', NULL, NULL, N'Male', NULL, NULL, N'07082620104', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'DANLADI ENOCH ASHESHI', N'0101157275', N'22503367206', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3089', N'EZEKIEL', N'VIGHE', N'T', NULL, NULL, N'Male', NULL, NULL, N'07018325876', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'EZEKIEL T VIGHE', N'0060865989', N'22432849279', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3090', N'ADAMU', N'IBRAHIM', N'SHALELE', NULL, NULL, N'Male', NULL, NULL, N'08086108055', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'214', N'ADAMU SHALELE IBRAHIM', N'5308129012', N'22507745792', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3091', N'ENOCH', N'KADIRI', N'DANLAMI', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'058', N'ENOCH DANLAMI KADIRI', N'0154221121', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3092', N'SALIHU', N'USMAN', N'ABDULLAHI', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'058', N'SALIHU ABDULLAHI USMAN', N'0455177406', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3093', N'MOHAMMED', N'YAHAYA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'MOHAMMED  YAHAYA', N'0102315609', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3094', N'TANKO', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'TANKO  IBRAHIM', N'0035431054', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B3095', N'SAFIYANU', N'ALI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'SAFIYANU  ALI', N'0101236143', N'', N'109', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4001', N'JAMILU', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'032', N'JAMILU  IBRAHIM', N'0101305519', N'', N'158', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4002', N'SULEIMAN', N'AMIRU', N'SANGARI', NULL, NULL, N'Male', NULL, NULL, N'07088883438', N'amirusuleiman308@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'063', N'SULEIMAN SANGARI AMIRU', N'0087975672', N'22423291243', N'158', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4003', N'SAFIYANU', N'RABILU', N'', NULL, NULL, N'Male', NULL, NULL, N'08080678813', N'rabilusafiyanutunga@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'076', N'SAFIYANU  RABILU', N'3031173847', N'', N'122', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4004', N'SARKI', N'MUSA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'214', N'SARKI  MUSA', N'4952970012', N'', N'131', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4005', N'BONIFACE', N'SATI,', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'033', N'BONIFACE  SATI,', N'2085620856', N'', N'131', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4006', N'S', N'CHRISTOPHER', N'C', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'032', N'S C CHRISTOPHER', N'0101225084', N'', N'153', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4007', N'ABUBAKAR', N'SARKI', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'ABUBAKAR  SARKI', N'0101160008', N'', N'154', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4008', N'ABDULLAHI', N'ISMAILA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'ABDULLAHI  ISMAILA', N'0101209583', N'', N'154', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4009', N'YAKUBU', N'YAHAYA ', N'FARANSA', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'057', N'YAKUBU FARANSA YAHAYA ', N'2120824025', N'', N'154', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4010', N'ADAMU', N'MUSA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'ADAMU  MUSA', N'0101101704', N'', N'154', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4011', N'AYOLE', N'YUSUF', N'ADAMU', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'221', N'AYOLE ADAMU YUSUF', N'0023363523', N'', N'158', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4012', N'MUBARAK', N'UMAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'MUBARAK  UMAR', N'0101308754', N'', N'154', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4013', N'SADIQ', N'MUSA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'063', N'SADIQ  MUSA', N'0036788005', N'', N'154', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4014', N'ABDULLAHI', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'ABDULLAHI  ABUBAKAR', N'0101220326', N'', N'154', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4015', N'IBRAHIM', N'YUSUF', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'IBRAHIM  YUSUF', N'0101234785', N'', N'154', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4016', N'MUSA', N'MOHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'07084285957', N'kalamullahtunga@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'MUSA  MOHAMMED', N'0102633677', N'22296829695', N'158', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4017', N'SULE', N'MUHAMMED', N'SULEIMAN', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'314', N'SULE SULEIMAN MUHAMMED', N'6555328045', N'', N'158', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B4018', N'GADAFI', N'ALI', N'', NULL, NULL, N'Male', NULL, NULL, N'09029796967', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'032', N'GADAFI  ALI', N'0102095376', N'22496737318', N'158', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B5001', N'YASAR', N'SALE ', N'ABUBAKAR', NULL, NULL, N'Male', NULL, NULL, N'07083907471', N'Nil', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'058', N'YASAR ABUBAKAR SALE ', N'0258455206', N'22452378281', N'95', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B5002', N'HASSAN', N'KHALID ', N'', NULL, NULL, N'Male', NULL, NULL, N'09019849649', N'khalidhassan12345@gmail.com', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'030', N'HASSAN  KHALID ', N'1001337057', N'22274958558', N'95', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B5003', N'SAADU', N'UMAR', N'', NULL, NULL, N'Male', NULL, NULL, N'07019648008', N'saadumarafa855@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'032', N'SAADU  UMAR', N'0097623486', N'22494651571', N'115', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B5004', N'DANIEL', N'DONATUS', N'', NULL, NULL, N'Male', NULL, NULL, N'08069648367', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'214', N'DANIEL  DONATUS', N'2846884018', N'22242961118', N'117', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B5005', N'SALEH', N'ALIYU', N'', NULL, NULL, N'Male', NULL, NULL, N'09016754017', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'SALEH  ALIYU', N'0119391469', N'22532469630', N'127', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B5006', N'UMAR', N'IDRIS', N'', NULL, NULL, N'Male', NULL, NULL, N'08037499030', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'UMAR  IDRIS', N'0045415550', N'22336581295', N'128', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B5007', N'SAIDU', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'08087349690', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'032', N'SAIDU  IBRAHIM', N'0109661202', N'22435428112', N'129', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B5008', N'IMAM', N'ABUBAKAR', N'HAMZA', NULL, NULL, N'Male', NULL, NULL, N'08082433534', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'032', N'IMAM HAMZA ABUBAKAR', N'0037842308', N'22336579300', N'138', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6001', N'MOHAMMED', N'UMAR,', N'SARKI', NULL, NULL, N'Male', NULL, NULL, N'09022690843', N'umarsarkimohammed@gmail.com', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'058', N'MOHAMMED SARKI UMAR,', N'0159981590', N'', N'97', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6002', N'ABDULHADI', N'SULEIMAN,', N'', NULL, NULL, N'Male', NULL, NULL, N'07014366746', N'suleimanabdulhadi78@gmail.com', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'058', N'ABDULHADI  SULEIMAN,', N'0254616416', N'22258623161', N'89', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6003', N'MUHAMMED', N'ABUBAKAR', N'', NULL, NULL, N'Male', NULL, NULL, N'07033965963', N'abubakarmuhammed969@gmail.com', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'050', N'MUHAMMED  ABUBAKAR', N'5183061339', N'22326195275', N'90', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6004', N'BALA', N'ABDULMUTALIB', N'IBRAHIM', NULL, NULL, N'Male', NULL, NULL, N'07038439994', N'stylistics@gmail.com', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'044', N'BALA IBRAHIM ABDULMUTALIB', N'0777617773', N'22308923533', N'91', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6005', N'DAHIRU ', N'ALIYU', N'RIBI', NULL, NULL, N'Male', NULL, NULL, N'08088774487', N'Nil', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'011', N'DAHIRU  RIBI ALIYU', N'3009905790', N'22341724263', N'97', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6006', N'LARABA', N'ANDUWA', N'', NULL, NULL, N'Female', NULL, NULL, N'08069088289', N'Nil', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'070', N'LARABA  ANDUWA', N'6080253128', N'22291297590', N'96', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6007', N'MUSA', N'UMAR ', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'032', N'MUSA  UMAR ', N'0037543870', N'', N'97', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6008', N'RUFAI', N'MOHAMMED', N'ABDULLAHI', NULL, NULL, N'Male', NULL, NULL, N'08025971895', N'mrufai733@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'063', N'RUFAI ABDULLAHI MOHAMMED', N'0059921311', N'22221164024', N'98', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6009', N'UMAR', N'MOHAMMED', N'ASO', NULL, NULL, N'Male', NULL, NULL, N'08020559699', N'umarmohammedaso21@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'033', N'UMAR ASO MOHAMMED', N'2099820981', N'22355653494', N'99', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6010', N'MOHAMMED', N'ADAMU', N'', NULL, NULL, N'Male', NULL, NULL, N'08086415628', N'onthemoveawe@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'032', N'MOHAMMED  ADAMU', N'0035416567', N'22322433861', N'100', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6011', N'SALIHU,', N'AHMAD,', N'FARANSA', NULL, NULL, N'Male', NULL, NULL, N'07082562237', N'sa.faransa@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'058', N'SALIHU, FARANSA AHMAD,', N'0024993176', N'22259512190', N'100', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6012', N'FELICIA', N'ALABI, ', N'', NULL, NULL, N'Female', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'058', N'FELICIA  ALABI, ', N'0138811724', N'', N'149', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6013', N'ABDULLAHI', N'MOHAMMED ', N'WAZIRI', NULL, NULL, N'Male', NULL, NULL, N'08027467668', N'moh''dabdullahiwaziri2@yahoo.com', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'011', N'ABDULLAHI WAZIRI MOHAMMED ', N'3068253757', N'22222252522', N'99', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6014', N'ABUBAKAR', N'UMAR', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:02.000', N'214', N'ABUBAKAR  UMAR', N'5328230013', N'', N'99', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6015', N'YUNUSA', N'AMINU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'057', N'YUNUSA  AMINU', N'2212281767', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6016', N'YUNUSA', N'ABUBAKAR,', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:04.000', N'058', N'YUNUSA  ABUBAKAR,', N'0252398231', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6017', N'EGWURUBE', N'JULIUS', N'', NULL, NULL, N'Male', NULL, NULL, N'07032069663', N'jls_egwurube@yahoo.com', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'063', N'EGWURUBE  JULIUS', N'0070254272', N'22343837022', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6018', N'MUHAMMED', N'SHABA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'033', N'MUHAMMED  SHABA', N'2035024253', N'', N'158', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6019', N'HALIRU', N'SHAMWILU', N'', NULL, NULL, N'Male', NULL, NULL, N'09021729042', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'214', N'HALIRU  SHAMWILU', N'5299018012', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6020', N'HUDU', N'MOHAMMED,', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'076', N'HUDU  MOHAMMED,', N'3040446365', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6021', N'BABANGIDA', N'DANLAMI', N'', NULL, NULL, N'Male', NULL, NULL, N'08028552774', N'NIL', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'032', N'BABANGIDA  DANLAMI', N'0101334795', N'22503602291', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6022', N'YAKUBU', N'UMAR', N'ABUBAKAR', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'011', N'YAKUBU ABUBAKAR UMAR', N'3039176834', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6023', N'IBRAHIM', N'SALIHU', N'IDRIS', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'032', N'IBRAHIM IDRIS SALIHU', N'0037327177', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6024', N'ABDURAHMAN', N'MUHAMMED', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'032', N'ABDURAHMAN  MUHAMMED', N'0112969346', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6025', N'MIKE', N'NANA,', N'SHIAONDO', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'058', N'MIKE SHIAONDO NANA,', N'0224586239', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6026', N'ISA', N'GAMBO', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:05.000', N'044', N'ISA  GAMBO', N'0065661097', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6027', N'HASSAN', N'MUSA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:09.000', N'032', N'HASSAN  MUSA', N'0101101027', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6028', N'DANLADI', N'ABDULLAHI', N'', NULL, NULL, N'Male', NULL, NULL, N'08125700243', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:10.000', N'032', N'DANLADI  ABDULLAHI', N'0031023549', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6029', N'OSHAFU', N'YUNUSA', N'HAMZA', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'063', N'OSHAFU HAMZA YUNUSA', N'033671139', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6030', N'ATTAYI ', N'MOHAMMED', N'I', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', NULL, N'ATTAYI  I MOHAMMED', N'', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6031', N'JOB', N'DAAN', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', NULL, N'JOB  DAAN', N'', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6032', N'MUHAMMAD', N'ALIYU', N'T', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'044', N'MUHAMMAD T ALIYU', N'0039016704', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6033', N'MAKU', N'JACOB', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'011', N'MAKU  JACOB', N'3062501047', N'', N'143', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B6034', N'MUSA', N'KABIRU,', N'IBRAHIM', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'058', N'MUSA IBRAHIM KABIRU,', N'0200596739', N'', N'164', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B7001', N'SAFIYANU', N'UMAR', N'I.', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'032', N'SAFIYANU I. UMAR', N'0041571401', N'', N'104', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B7002', N'MUSA', N'DAHIRU', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'MUSA  DAHIRU', N'0102307682', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B7003', N'BAGARE', N'IBRAHIM', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:11.000', N'032', N'BAGARE  IBRAHIM', N'0101225682', N'', N'159', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B9001', N'MUHAMMED', N'IBRAHIM', N'KHAMIS', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:12.000', N'214', N'MUHAMMED KHAMIS IBRAHIM', N'5216153011', N'', N'160', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'B9002', N'MOHAMMED ', N'IMRAN ', N'AHMED', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:13.000', NULL, N'MOHAMMED  AHMED IMRAN ', N'', N'', N'170', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'C3001', N'YAKUBU', N'BULALA', N'SABO', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:28:59.000', N'214', N'YAKUBU SABO BULALA', N'1021699021', N'', N'87', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'C3002', N'DALLATU', N'MUSTAPHA', N'ABDULLAHI', NULL, NULL, N'Male', NULL, NULL, N'07037452550', N'Nil', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'044', N'DALLATU ABDULLAHI MUSTAPHA', N'0739431476', N'22289766176', N'108', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'C5001', N'RAPHAEL', N'DARIYA', N'', NULL, NULL, N'Male', NULL, NULL, N'', N'', N'b@yahoo.com', N'2019-12-07 16:29:00.000', N'032', N'RAPHAEL  DARIYA', N'0013550513', N'', N'87', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO

INSERT INTO [dbo].[staff] VALUES (N'C5002', N'HASSAN', N'HALADU', N'', NULL, NULL, N'Male', NULL, NULL, N'09026392918', N'haladuhassan@gmail.com', N'b@yahoo.com', N'2019-12-07 16:29:01.000', N'082', N'HASSAN  HALADU', N'6016520400', N'', N'116', N'1', N'ST01', NULL, NULL, NULL, NULL, NULL, NULL)
GO


-- ----------------------------
-- Table structure for staff_other_allowances
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[staff_other_allowances]') AND type IN ('U'))
	DROP TABLE [dbo].[staff_other_allowances]
GO

CREATE TABLE [dbo].[staff_other_allowances] (
  [staff_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [salary_desc_code] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [created_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL,
  [monthly_amount] decimal(10,2)  NULL
)
GO

ALTER TABLE [dbo].[staff_other_allowances] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of staff_other_allowances
-- ----------------------------
INSERT INTO [dbo].[staff_other_allowances] VALUES (N'B9001', N'sd01', NULL, NULL, N'21200.00')
GO

INSERT INTO [dbo].[staff_other_allowances] VALUES (N'C3001', N'sd01', NULL, NULL, N'31000.00')
GO


-- ----------------------------
-- Table structure for staff_type
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[staff_type]') AND type IN ('U'))
	DROP TABLE [dbo].[staff_type]
GO

CREATE TABLE [dbo].[staff_type] (
  [staff_type_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [staff_type_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL,
  [status] tinyint  NULL
)
GO

ALTER TABLE [dbo].[staff_type] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of staff_type
-- ----------------------------
INSERT INTO [dbo].[staff_type] VALUES (N'ST01', N'Temporary Staff', N'ese.kelvin@dangoteprojects.com', N'2019-10-05 18:31:38', N'1')
GO

INSERT INTO [dbo].[staff_type] VALUES (N'ST02', N'Casual Staff', N'ese.kelvin@dangoteprojects.com', N'2019-10-05 18:32:22', N'1')
GO


-- ----------------------------
-- Table structure for temporary_migration
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[temporary_migration]') AND type IN ('U'))
	DROP TABLE [dbo].[temporary_migration]
GO

CREATE TABLE [dbo].[temporary_migration] (
  [sn] int  NULL,
  [staff_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [surname] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [first_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [other_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [gender] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [department] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [position] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [job_category] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [monthly_rate] decimal(10,2)  NULL,
  [additional_pay] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [account_no] varchar(50) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bank_name] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [email] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [phone] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [bvn] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [staff_type] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [section] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL
)
GO

ALTER TABLE [dbo].[temporary_migration] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of temporary_migration
-- ----------------------------
INSERT INTO [dbo].[temporary_migration] VALUES (N'1', N'1001', N'BULALA', N'YAKUBU', N'SABO', N'Male', N'AGRIC', N'SUPERVISOR', N'Supervisor', N'39000.00', N'31000.00', N'1021699021', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'2', N'1002', N'UMAR,', N'MOHAMMED', N'SARKI', N'Male', N'ADMIN', N'ASST CRM', N'SKILL', N'55000.00', N'', N'0159981590', N'GTB', N'umarsarkimohammed@gmail.com', N'09022690843', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'3', N'1003', N'SULEIMAN,', N'ABDULHADI', N'', N'Male', N'ADMIN', N'HR ASST', N'SKILL', N'55000.00', N'', N'0254616416', N'GTB', N'suleimanabdulhadi78@gmail.com', N'07014366746', N'22258623161', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'4', N'1004', N'ABUBAKAR', N'MUHAMMED', N'', N'Male', N'ADMIN', N'ASST PURCHASE', N'SKILL', N'55000.00', N'', N'5183061339', N'Eco Bank', N'abubakarmuhammed969@gmail.com', N'07033965963', N'22326195275', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'5', N'1005', N'ABDULMUTALIB', N'BALA', N'IBRAHIM', N'Male', N'ADMIN', N'SECRETARY', N'SKILL', N'55000.00', N'', N'0777617773', N'Acess Bank', N'stylistics@gmail.com', N'07038439994', N'22308923533', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'6', N'1006', N'ALIYU', N'DAHIRU ', N'RIBI', N'Male', N'ADMIN', N'ASST CRM', N'SKILL', N'50000.00', N'', N'3009905790', N'First Bank', N'Nil', N'08088774487', N'22341724263', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'7', N'1007', N'RAYYANU ', N'LUKMAN', N'', N'Male', N'Technical services', N'Data capt clerk', N'SKILL', N'45000.00', N'', N'67053732', N'Union Bank', N'rayyanlukman@gmail.com', N'09072726101', N'22362893681', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'8', N'1008', N'AZENU', N'BULUS', N'DANLAMI', N'Male', N'Technical services', N'STORE ASST', N'SKILL', N'45000.00', N'', N'6239523474', N'Fidelity Bank', N'azenudanlami@gmail.com', N'08024502363', N'22361060475', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'9', N'1009', N'SALE ', N'YASAR', N'ABUBAKAR', N'Male', N'Civil Engineering', N'civils foreman', N'SKILL', N'45000.00', N'', N'0258455206', N'GTB', N'Nil', N'07083907471', N'22452378281', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'10', N'1010', N'KHALID ', N'HASSAN', N'', N'Male', N'Civil Engineering', N'civils foreman', N'SKILL', N'45000.00', N'', N'1001337057', N'HERITAGE BANK', N'khalidhassan12345@gmail.com', N'09019849649', N'22274958558', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11', N'1011', N'ANDUWA', N'LARABA', N'', N'Female', N'ADMIN', N'', N'SKILL', N'45000.00', N'', N'6080253128', N'Fidelity', N'Nil', N'08069088289', N'22291297590', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'12', N'1012', N'UMAR ', N'MUSA', N'', N'Male', N'ADMIN', N'ASST CRM', N'SKILL', N'45000.00', N'', N'0037543870', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'13', N'1013', N'MOHAMMED', N'RUFAI', N'ABDULLAHI', N'Male', N'ADMIN', N'ASST DATA CAPTURE', N'SKILL', N'55000.00', N'', N'0059921311', N'Diamond Bank', N'mrufai733@gmail.com', N'08025971895', N'22221164024', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'14', N'1014', N'MOHAMMED', N'UMAR', N'ASO', N'Male', N'ADMIN', N'timekeeper', N'SKILL', N'45000.00', N'', N'2099820981', N'UBA', N'umarmohammedaso21@gmail.com', N'08020559699', N'22355653494', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'15', N'1015', N'ADAMU', N'MOHAMMED', N'', N'Male', N'ADMIN', N'data capture clerk', N'SKILL', N'45000.00', N'', N'0035416567', N'Union Bank', N'onthemoveawe@gmail.com', N'08086415628', N'22322433861', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'16', N'1016', N'AHMAD,', N'SALIHU,', N'FARANSA', N'Male', N'ADMIN', N'data capture clerk', N'SKILL', N'45000.00', N'', N'0024993176', N'GTB', N'sa.faransa@gmail.com', N'07082562237', N'22259512190', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'17', N'1017', N'ALABI, ', N'FELICIA', N'', N'Female', N'ADMIN', N'chef', N'SKILL', N'45000.00', N'', N'0138811724', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'18', N'1018', N'YERO', N'SHEHU', N'.M', N'Male', N'Technical services', N'stores assistant', N'SKILL', N'45000.00', N'', N'0042038868', N'Union Bank', N'shehumusayero@yahoo.com', N'09019809551', N'22201143393', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'19', N'1019', N'DARIYA', N'RAPHAEL', N'', N'Male', N'Civil Engineering', N'Supervisor', N'Supervisor', N'39000.00', N'', N'0013550513', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'20', N'1020', N'UMAR', N'SAFIYANU', N'I.', N'Male', N'security Supervisor', N'security Supervisor', N'SKILL', N'39000.00', N'', N'0041571401', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'21', N'1021', N'MOHAMMED ', N'ABDULLAHI', N'WAZIRI', N'Male', N'ADMIN', N'timekeeper', N'SKILL', N'33800.00', N'', N'3068253757', N'First Bank', N'moh''dabdullahiwaziri2@yahoo.com', N'08027467668', N'22222252522', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'22', N'1022', N'ABUBAKAR', N'MUSA', N'', N'Male', N'Agriculture', N'tractor driver', N'SKILL', N'39000.00', N'', N'0101237212', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'23', N'1023', N'ABDULLAHIM', N'ABDULAZIZ', N'', N'Male', N'agriculture', N'excavator operator', N'SKILL', N'39000.00', N'', N'0101223389', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'24', N'1024', N'MUSTAPHA', N'DALLATU', N'ABDULLAHI', N'Male', N'agriculture', N'planting supervisor', N'Supervisor', N'39000.00', N'', N'0739431476', N'Access Bank', N'Nil', N'07037452550', N'22289766176', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'25', N'1025', N'MAIDAWA', N'BAKO', N'', N'Male', N'agriculture', N'grader operator', N'SKILL', N'39000.00', N'', N'0012887047', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'26', N'1026', N'SIYAKA, ', N'AMINU', N'', N'Male', N'agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'0127198061', N'GTB', N'Nil', N'08062940557', N'22265670320', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'27', N'1027', N'OGOSHI', N'ABDULKARIM', N'', N'Male', N'agriculture', N'tractor driver', N'SKILL', N'39000.00', N'', N'0101218349', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'28', N'1028', N'HUSSEINI', N'BABA', N'', N'Male', N'Technical services', N'plant mechanic', N'SKILL', N'39000.00', N'', N'1500586475', N'Heritage Bank', N'Nil', N'08087496822', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'29', N'1029', N'ALI', N'AUTA', N'', N'Male', N'agriculture', N'land prep tractor driver', N'SKILL', N'39000.00', N'', N'0101396557', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'30', N'1030', N'BABAARI', N'IBRAHIM', N'B', N'Male', N'agriculture', N'tractor driver', N'SKILL', N'39000.00', N'', N'0101609004', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'31', N'1031', N'WATAKIRI', N'FRANCIS', N'', N'Male', N'Technical services', N'plant mechanic', N'SKILL', N'39000.00', N'', N'2125055996', N'UBA', N'Nil', N'07088345592', N'22411907110', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'32', N'1032', N'JIBRIN', N'ABDULLAHI', N'YIRGAU', N'Male', N'agriculture', N'excavator operator', N'SKILL', N'39000.00', N'', N'3077673777', N'First Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'33', N'1033', N'SAMUEL ', N'DANLAMI', N'YUSUFU', N'Male', N'agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'3073009578', N'First Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'34', N'1034', N'YUSU', N'MIANA', N'', N'Male', N'Technical services', N'plant mechanic', N'SKILL', N'39000.00', N'', N'1500853489', N'Heritage Bank', N'Nil', N'08088807318', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'35', N'1035', N'SULEIMAN', N'ADAMU', N'', N'Male', N'agriculture', N'truck driver', N'SKILL', N'33800.00', N'', N'0101216802', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'36', N'1036', N'HUSSAINI,', N'ALKASIM', N'OTAKI', N'Male', N'agriculture', N'truck driver', N'SKILL', N'33800.00', N'', N'0240364712', N'GTB', N'Nil', N'08022518553', N'22429554403', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'37', N'1037', N'ABUBAKAR', N'KATTADA', N'', N'Male', N'Technical services', N'assistant plant mechanic', N'SKILL', N'33800.00', N'', N'5244033011', N'FCMB', N'Nil', N'07089770899', N'22502783153', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'38', N'1038', N'JOSHUA', N'AONDOTSEA', N'MBAIORGA', N'Male', N'Technical services', N'plant mechanic', N'SKILL', N'39000.00', N'', N'0724333705', N'Access Bank', N'Nil', N'09070657361', N'22321879248', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'39', N'1039', N'KATSU', N'TERDOO', N'', N'Male', N'agriculture', N'tractor driver', N'SKILL', N'39000.00', N'', N'0101227325', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'40', N'1040', N'UMAR', N'SAADU', N'', N'Male', N'Civil Engineering', N'electrical maintenance', N'SKILL', N'33800.00', N'', N'0097623486', N'Union Bank', N'saadumarafa855@gmail.com', N'07019648008', N'22494651571', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'41', N'1041', N'HALADU', N'HASSAN', N'', N'Male', N'Civil Engineering', N'civils supervisor', N'Supervisor', N'33800.00', N'', N'6016520400', N'Keystone', N'haladuhassan@gmail.com', N'09026392918', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'42', N'1042', N'DONATUS', N'DANIEL', N'', N'Male', N'Civil Engineering', N'electrical foreman', N'SKILL', N'33800.00', N'', N'2846884018', N'FCMB', N'Nil', N'08069648367', N'22242961118', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'43', N'1043', N'IBRAHIM', N'JAMILU', N'', N'Male', N'irrigation', N'pump operator', N'SKILL', N'33800.00', N'', N'0101305519', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'44', N'1044', N'ABUBAKAR', N'JAMIL', N'', N'Male', N'agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'6010489431', N'KEYSTONE', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'45', N'1045', N'ZUNAIDU', N'MUZAMMILU', N'', N'Male', N'Technical services', N'stores assistant', N'SKILL', N'33800.00', N'', N'2096865543', N'UBA', N'Nil', N'07088959529', N'22432763450', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'46', N'1046', N'AMIRU', N'SULEIMAN', N'SANGARI', N'Male', N'irrigation', N'pump operator', N'SKILL', N'33800.00', N'', N'0087975672', N'Diamond Bank', N'amirusuleiman308@gmail.com', N'07088883438', N'22423291243', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'47', N'1047', N'BALA', N'SALIHU', N'', N'Male', N'Technical services', N'assistant plant mechanic', N'SKILL', N'33800.00', N'', N'0100940977', N'Union Bank', N'Nil', N'08087197552', N'22447192519', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'48', N'1048', N'UMAR', N'AYUBA', N'', N'Male', N'agriculture', N'truck driver', N'SKILL', N'33800.00', N'', N'5257030018', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'49', N'1049', N'MAGAYAKI', N'MIKAILA', N'PAKACHI', N'Male', N'agriculture', N'truck driver', N'SKILL', N'33800.00', N'', N'0036239782', N'UNITY BANK', N'Nil', N'07016819500', N'22487452361', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'50', N'1050', N'ABDULLAHI', N'ALI', N'', N'Male', N'agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'0101227961', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'51', N'1051', N'IBRAHIM', N'DANLAMI', N'', N'Male', N'agriculture', N'grader operator', N'SKILL', N'39000.00', N'', N'5168403011', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'52', N'1052', N'UMAR', N'ABUBAKAR', N'', N'Male', N'ADMIN', N'timekeeper', N'SKILL', N'33800.00', N'', N'5328230013', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'53', N'1053', N'MUHAMMED', N'SADANU', N'', N'Male', N'agriculture', N'land prep tractor driver', N'SKILL', N'33800.00', N'', N'0102345428', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'54', N'1054', N'MICHEAL', N'EMMANUEL', N'J', N'Male', N'agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0120065227', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'55', N'1055', N'ADAMU', N'MASALLAH', N'', N'Male', N'agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0120351238', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'56', N'1056', N'RABILU', N'SAFIYANU', N'', N'Male', N'irrigation', N'Team Leader', N'SKILL', N'33800.00', N'', N'3031173847', N'SKYE BANK', N'rabilusafiyanutunga@gmail.com', N'08080678813', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'57', N'1057', N'AUDU', N'ISAH', N'', N'Male', N'Agriculture', N'payloader ', N'SKILL', N'39000.00', N'', N'0117969592', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'58', N'1058', N'MUHAMMED', N'ILIYASU', N'', N'Male', N'Technical services', N'truck driver', N'SKILL', N'33800.00', N'', N'3077557761', N'First Bank', N'Nil', N'08087070960', N'22292603857', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'59', N'1059', N'MUSTAPHA', N'UMARU', N'', N'Male', N'Technical services', N'truck driver', N'SKILL', N'33800.00', N'', N'0041852386', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'60', N'1060', N'ABUBAKAR', N'MUHAMMED', N'', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0037865815', N'Union Bank', N'Nil', N'08034522054', N'22405058923', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'61', N'1061', N'ALI', N'SALE', N'', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0123280807', N'Union Bank', N'Nil', N'09017699125', N'22170106562', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'62', N'1062', N'YUSUF', N'SHIAIBU', N'', N'Male', N'Agriculture', N'compactor operator', N'SKILL', N'39000.00', N'', N'0102548047', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'63', N'1063', N'YAHAYA', N'HALILU', N'', N'Male', N'Technical services', N'assistant plant mechanic', N'SKILL', N'33800.00', N'', N'0101305557', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'64', N'1064', N'ILIYASU', N'MUSA', N'', N'Male', N'Agriculture', N'excavator operator', N'SKILL', N'39000.00', N'', N'0106593306', N'Union Bank', N'Nil', N'08029152459', N'22501455138', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'65', N'1065', N'ABDULRAZAK', N'ALI', N'', N'Male', N'Agriculture', N'excavator operator', N'SKILL', N'39000.00', N'', N'0118126259', N'Union Bank', N'Nil', N'07088390747', N'22530720984', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'66', N'1066', N'MUSA', N'OKPEYA', N'HARUNA', N'Male', N'Agriculture', N'excavator operator', N'SKILL', N'39000.00', N'', N'0090209317', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'67', N'1067', N'IBRAHIM', N'UMAR', N'MOHAMMED', N'Male', N'Agriculture', N'planting leader', N'SKILL', N'31200.00', N'', N'4792371013', N'FCMB', N'Nil', N'07017180502', N'22446497899', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'68', N'1068', N'ALIYU', N'SALEH', N'', N'Male', N'Civil Engineering', N'Carpenter', N'SKILL', N'31200.00', N'', N'0119391469', N'Union Bank', N'Nil', N'09016754017', N'22532469630', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'69', N'1069', N'IDRIS', N'UMAR', N'', N'Male', N'Civil Engineering', N'Mason', N'SKILL', N'31200.00', N'', N'0045415550', N'Union Bank', N'Nil', N'08037499030', N'22336581295', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'70', N'1070', N'IBRAHIM', N'SAIDU', N'', N'Male', N'Civil Engineering', N'Iron Bender', N'SKILL', N'31200.00', N'', N'0109661202', N'Union Bank', N'Nil', N'08087349690', N'22435428112', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'71', N'1071', N'MUSA', N'SARKI', N'', N'Male', N'irrigation', N'crop protection leaders', N'SKILL', N'31200.00', N'', N'4952970012', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'72', N'1072', N'SALLAU', N'SULEIMAN', N'', N'Male', N'Agriculture', N'crop protection leaders', N'SKILL', N'31200.00', N'', N'0101605147', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'73', N'1073', N'SURAJO ', N'AMINU', N'', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'31200.00', N'', N'0120278207', N'Union Bank', N'Nil', N'09016305101', N'22533773901', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'74', N'1074', N'MOHAMMED', N'HALLIRU', N'SULEIMAN', N'Male', N'Agriculture', N'excavator operator', N'SKILL', N'39000.00', N'', N'5081357013', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'75', N'1075', N'SATI,', N'BONIFACE', N'', N'Male', N'irrigation', N'crop protection leaders', N'SKILL', N'31200.00', N'', N'2085620856', N'UBA', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'76', N'1076', N'MUHAMMED', N'JAFARU', N'', N'Male', N'Agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'0101286100', N'Union Bank', N'Nil', N'09016713596', N'22499306339', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'77', N'1077', N'OSAMA', N'YAHAYA', N'NUHU', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0818261796', N'Access', N'Nil', N'08087668924', N'22530908621', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'78', N'1078', N'ABDULLAHI', N'DALHATU', N'', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0041590006', N'Union Bank', N'Nil', N'08035596485', N'22517923720', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'79', N'1079', N'TANKO', N'SANI', N'USMAN', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0024659469', N'STANBIC', N'Nil', N'08069168692', N'22394614915', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'80', N'1080', N'IDRIS', N'ABUBAKAR', N'BUHARI', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0120284440', N'Union Bank', N'Nil', N'08024222944', N'22533641408', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'81', N'1081', N'HARUNA', N'UBA', N'IBRAHIM', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0051384949', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'82', N'1082', N'TANIMU', N'AHMED', N'', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0261196510', N'ECO BANK', N'Nil', N'08035596485', N'22517923720', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'83', N'1083', N'SHUAIBU', N'ABDULLAHI', N'', N'Male', N'Agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'0101226641', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'84', N'1084', N'CHRISTOPHER', N'JOSEPH', N'', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0823091126', N'ACCESS', N'Nil', N'09075930859', N'22534095778', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'85', N'1085', N'SALE,', N'AMIN', N'MOHAMMED', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0227975159', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'86', N'1086', N'IBRAHIM', N'MOHAMMED', N'WULLY', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0027110359', N'UNITY BANK', N'Nil', N'09014518485', N'22421889691', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'87', N'1087', N'USENI', N'BAKO', N'', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'2071770770', N'UBA', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'88', N'1088', N'USMAN', N'DAIYYBU', N'ABUBAKAR', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0108777502', N'Diamond Bank', N'Nil', N'08135397384', N'22509062293', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'89', N'1089', N'SHAIBU', N'ABDULSALAM', N'', N'Male', N'Agriculture', N'compactor operator', N'SKILL', N'39000.00', N'', N'0102108937', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'90', N'1090', N'ABDULLAHI - ', N'ABUBAKAR', N'', N'Male', N'Agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'1218227421', N'Access', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'91', N'1091', N'RISILA', N'JIBRIN', N'', N'Male', N'Agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'5167714017', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'92', N'1092', N'ABUBAKAR', N'IBRAHIM', N'', N'Male', N'Agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'0036742885', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'93', N'1093', N'ABUBAKAR', N'NASIRU', N'', N'Male', N'Agriculture', N'payloader operator', N'SKILL', N'39000.00', N'', N'0007652967', N'Unity', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'94', N'1094', N'SHEHU', N'AHMED', N'A', N'Male', N'Agriculture', N'grader operator', N'SKILL', N'39000.00', N'', N'0102147945', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'95', N'1095', N'SHEHU', N'HARUNA', N'', N'Male', N'Agriculture', N'planting leader', N'SKILL', N'31200.00', N'', N'0036787242', N'Diamond Bank', N'shehubanua2017@gmail.com', N'08026657216', N'22320057214', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'96', N'1096', N'SULEIMAN', N'AYOLE', N'ABDULLAHI', N'Male', N'Agriculture', N'crop nutrition leaders', N'SKILL', N'31200.00', N'', N'0072648554', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'97', N'1097', N'MOHAMMED', N'ISA', N'', N'Male', N'Agriculture', N'harvest leader', N'SKILL', N'31200.00', N'', N'5393464012', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'98', N'1098', N'IBRAHIM', N'ABUBAKAR', N'', N'Male', N'Agriculture', N'crop protection leaders', N'SKILL', N'31200.00', N'', N'0100930286', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'99', N'1099', N'MHEMBE', N'MARTINS', N'AONDOVER', N'Male', N'Agriculture', N'dozer operator', N'SKILL', N'39000.00', N'', N'2060217046', N'UBA', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'100', N'1100', N'MUSA,', N'ISMAILA', N'', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0045829438', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'101', N'1101', N'SULEIMAN', N'YUSUF', N'', N'Male', N'Agriculture', N'vehicle driver', N'SKILL', N'36400.00', N'', N'5319625013', N'FCMB', N'Nil', N'09021074671', N'22483878254', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'102', N'1102', N'CHRISTOPHER', N'S', N'C', N'Male', N'irrigation', N'Irrigator', N'SKILL', N'26650.00', N'', N'0101225084', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'103', N'1103', N'ABUBAKAR', N'IMAM', N'HAMZA', N'Male', N'Civil Engineering', N'Plumber', N'SKILL', N'31200.00', N'', N'0037842308', N'Union Bank', N'Nil', N'08082433534', N'22336579300', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'104', N'1104', N'DAUDA', N'MONDAY', N'J', N'Male', N'Agriculture', N'telehandler operator', N'SKILL', N'39000.00', N'', N'0118276123', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'105', N'1105', N'JIBRIN', N'ALIYU', N'SULEIMAN', N'Male', N'Agriculture', N'planting leader', N'SKILL', N'31200.00', N'', N'2089442375', N'UBA', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'106', N'1106', N'ISA', N'RAYYANU', N'', N'Male', N'Agriculture', N'crop protection leaders', N'SKILL', N'31200.00', N'', N'0101150300', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'107', N'1107', N'HAMZA', N'YAHO', N'ABDULLAHI', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0024942376', N'Stanbic IBTC', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'108', N'1108', N'JOB', N'NANDI', N'DAAN', N'Male', N'ADMIN', N'housekeeper', N'UNSKILL', N'28600.00', N'', N'0035425426', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'109', N'1109', N'MOMOH', N'FRIDAY', N'O', N'Male', N'Technical services', N'survey assistant', N'SKILL', N'39000.00', N'', N'3090917959', N'First Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'110', N'1110', N'AMINU', N'YUNUSA', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'2212281767', N'Zenith bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'111', N'1111', N'ABUBAKAR,', N'YUNUSA', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0252398231', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'112', N'1112', N'DANJUMA', N'ESTHER', N'CHAGGA', N'Female', N'ADMIN', N'housekeeper', N'UNSKILL', N'28600.00', N'', N'6235397594', N'Fidelity', N'estherdanjuma@gmail.com', N'08067395670', N'22287182035', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'113', N'1113', N'MOHAMMED', N'ALIYU', N'', N'Male', N'Technical services', N'survey assistant', N'SKILL', N'28600.00', N'', N'0101255731', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'114', N'1114', N'JULIUS', N'EGWURUBE', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0070254272', N'Diamond Bank', N'jls_egwurube@yahoo.com', N'07032069663', N'22343837022', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'115', N'1115', N'SHABA', N'MUHAMMED', N'', N'Male', N'ADMIN', N'pump operator', N'SKILL', N'28600.00', N'', N'2035024253', N'UBA', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'116', N'1116', N'ILIYASU', N'MOHAMMED', N'NASIRU', N'Male', N'ADMIN', N'housekeeper', N'UNSKILL', N'28600.00', N'', N'0011360451', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'117', N'1117', N'SHAMWILU', N'HALIRU', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'5299018012', N'FCMB', N'Nil', N'09021729042', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'118', N'1118', N'SHUAIBU', N'ADAMU', N'GALADIMA', N'Male', N'ADMIN', N'housekeeper', N'UNSKILL', N'28600.00', N'', N'4995607012', N'FCMB', N'shuaibuadamugaladima61@gmail.com', N'07014926119', N'22456838437', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'119', N'1119', N'MOHAMMED,', N'HUDU', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'3040446365', N'SKYE BANK', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'120', N'1120', N'DANLAMI', N'BABANGIDA', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0101334795', N'Union Bank', N'NIL', N'08028552774', N'22503602291', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'121', N'1121', N'UMAR', N'YAKUBU', N'ABUBAKAR', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'3039176834', N'First Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'122', N'1122', N'SALIHU', N'IBRAHIM', N'IDRIS', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0037327177', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'123', N'1123', N'MUHAMMED', N'ABDURAHMAN', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0112969346', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'124', N'1124', N'NANA,', N'MIKE', N'SHIAONDO', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0224586239', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'125', N'1125', N'IBRAHIM', N'UMAR', N'', N'Male', N'ADMIN', N'housekeeper', N'UNSKILL', N'36400.00', N'', N'0093143896', N'Union Bank', N'NIL', N'08122823769', N'22485781614', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'126', N'1126', N'GAMBO', N'ISA', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0065661097', N'Access Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'127', N'1127', N'TINA', N'PATRICK', N'', N'Female', N'ADMIN', N'Housekeeper', N'UNSKILL', N'28600.00', N'', N'0100970620', N'ACCESS Diamond ', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'128', N'1128', N'DANSHATU', N'ISAAC', N'AMINU', N'Male', N'Agriculture', N'payloader operator', N'SKILL', N'39000.00', N'', N'2089652127', N'UBA', N'Nil', N'09011537343', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'129', N'1129', N'SHEU', N'ABDULRASHEED', N'', N'Male', N'Agriculture', N'excavator operator', N'SKILL', N'39000.00', N'', N'0101149502', N'Union Bank', N'Nil', N'09029299469', N'22503192497', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'130', N'1130', N'ZUBAIRU', N'MUHAMMAD', N'BELLO', N'Male', N'Technical services', N'load master', N'SKILL', N'28600.00', N'', N'5307840017', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'131', N'1131', N'MOHAMMED,', N'YAKUBU', N'AWE', N'Male', N'Agriculture', N'tipper driver', N'SKILL', N'33800.00', N'', N'0119386623', N'GTB', N'Nil', N'07063585984', N'22224242356', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'132', N'1132', N'UMAR', N'RISILANU', N'', N'Male', N'Agriculture', N'land prep tractor driver', N'SKILL', N'39000.00', N'', N'5306255014', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'133', N'1133', N'BULUS', N'VICTOR', N'AWASHU', N'Male', N'Agriculture', N'excavator operator', N'SKILL', N'39000.00', N'', N'3125540824', N'First Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'134', N'1134', N'SOFIYANU', N'BASHIR', N'', N'Male', N'Technical services', N'plant mechanic', N'SKILL', N'33800.00', N'', N'2775912019', N'FCMB', N'bashirsafiyanu@yahoo.com', N'09026638794', N'22302289312', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'135', N'1135', N'ABDULLAHI', N'JINJIMI', N'ALIYU', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0079574962', N'Diamond Bank', N'Nil', N'09077099148', N'22394085119', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'136', N'1136', N'HASSAN', N'ABDULMUMIN', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0102447212', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'137', N'1137', N'MOHAMMADU', N'ADAMU', N'T', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0102031651', N'Union Bank', N'Nil', N'09020430178', N'2.25052E+11', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'138', N'1138', N'AUWAL', N'MOHAMMED', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'3051184780', N'SKYE BANk', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'139', N'1139', N'DALHATU', N'ZAKARI', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0040657704', N'Union Bank', N'Nil', N'08084334744', N'22331615212', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'140', N'1140', N'SARKIN-', N'BAKA', N'DANLAMI', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0047030173', N'Union Bank', N'Nil', N'07087359300', N'22337178823', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'141', N'1141', N'AKURAGAA', N'IORFA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0102047076', N'Union Bank', N'Nil', N'09027849265', N'22504168000', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'142', N'1142', N'SHUAIBU', N'ISA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0101159420', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'143', N'1143', N'ABUBAKAR', N'ISYAKA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'5157893012', N'FCMB', N'Nil', N'07088685469', N'22494741740', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'144', N'1144', N'JACOB', N'AKURAGA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0102380964', N'Union Bank', N'Nil', N'07018789792', N'22500332649', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'145', N'1145', N'DAHIRU', N'MUHAMMED', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'5329361011', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'146', N'1146', N'ABEDA', N'KUMAGA', N'SAMUEL', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0102673400', N'Union Bank', N'Nil', N'08129215784', N'22453216010', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'147', N'1147', N'AGYEMA', N'SOJA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0101235586', N'Union Bank', N'Nil', N'07080721832', N'22477482930', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'148', N'1148', N'UMAR', N'SULEIMAN', N'UMAR', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'4791371016', N'FCMB', N'Nil', N'08088175611', N'22454663189', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'149', N'1149', N'ABDULLAHI', N'UMARU', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'5335669015', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'150', N'1150', N'USMAN', N'ZAKARI', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'5326361010', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'151', N'1151', N'SHUAIBU', N'ZUBAIRU', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0101213344', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'152', N'1152', N'MOHAMMED', N'MOHAMMED', N'AHMED', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'4223069968', N'Eco bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'153', N'1153', N'MUHAMMED ', N'BABA', N'ADAMU', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0012418108', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'154', N'1154', N'MOHAMMED ', N'SANUSI', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0739243440', N'Access Bank', N'Nil', N'08120898428', N'22447744398', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'155', N'1155', N'HASSAN', N'MURTALA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0084457694', N'Union Bank', N'NIL', N'09071729134', N'22475792644', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'156', N'1156', N'SULE', N'NDAGI', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'5163031011', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'157', N'1157', N'RABIU', N'UMAR', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0101454895', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'158', N'1158', N'SALE', N'MUSA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0036008383', N'Diamond Bank', N'NIL', N'09076398753', N'22388131079', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'159', N'1159', N'MOHAMMED', N'BAWA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'5281944019', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'160', N'1160', N'ALIYU', N'TANKO', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'5382231010', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'161', N'1161', N'ABDULLAHI', N'MUHAMMAD', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0106195212', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'162', N'1162', N'UMAR', N'YAKUBU', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0100032757', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'163', N'1163', N'ABUBAKAR', N'IBRAHIM', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0102154903', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'164', N'1164', N'KORAU', N'AUDU', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'4790403017', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'165', N'1165', N'USMAN', N'ARMAYAU', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0101308091', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'166', N'1166', N'ABUBAKAR', N'D.', N'SULEIMAN', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0037807264', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'167', N'1167', N'ALHAJI', N'AMINA', N'L', N'Female', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0102542698', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'168', N'1168', N'MOHAMMED', N'BASIRU', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0021202883', N'UNITY BANK', N'NIL', N'08088635021', N'22290548868', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'169', N'1169', N'ABDULLAHI', N'SARATU', N'', N'Female', N'ADMIN', N'chef', N'UNSKILL', N'26650.00', N'', N'0107347269', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'170', N'1170', N'UMAR', N'ZAINAB', N'', N'Female', N'ADMIN', N'chef', N'UNSKILL', N'26650.00', N'', N'0104768326', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'171', N'1171', N'USMAN', N'ADAMA', N'', N'Female', N'ADMIN', N'chef', N'UNSKILL', N'26650.00', N'', N'0103624746', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'172', N'1172', N'ALI', N'KAMALLUDDEEN', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0116714977', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'173', N'1173', N'NAFIU', N'ABDULLAHI', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'2119964390', N'Zenith Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'174', N'1174', N'MALL MIKAILU', N'ABDULLAHI', N'RIDWAN', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0035421318', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'175', N'1175', N'USMAN', N'DANKISHIYA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0101556988', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'176', N'1176', N'ABUBAKAR', N'IBRAHIM', N'MUHAMMAD', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0432590161', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'177', N'1177', N'ZAKARI', N'NUHU', N'ATTAJIRI', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0431850426', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'178', N'1178', N'ABDULLAHI', N'MUSA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0116749117', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'179', N'1179', N'ADAMU', N'UMAR', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0116936184', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'180', N'1180', N'AEL', N'IORLUMUN', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0117265593', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'181', N'1181', N'AHMED', N'ISA', N'', N'Male', N'ADMIN', N'sanitation', N'UNSKILL', N'26650.00', N'', N'0118858042', N'Union Bank', N'NIL', N'09017162765', N'22531802674', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'182', N'1182', N'ABDULLAHI', N'HASSAN', N'', N'Male', N'Security ', N'gateman', N'UNSKILL', N'26650.00', N'', N'0040246478', N'Union Bank', N'hassanabdullahiawe@gmail.com', N'07012080805', N'22476167539', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'183', N'1183', N'ISHAKA ', N'MOHAMMED', N'L', N'Male', N'Security ', N'gateman', N'UNSKILL', N'26650.00', N'', N'0099252035', N'Union Bank', N'Nil', N'09022536308', N'22499583509', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'184', N'1184', N'MUSTAPHA,', N'HARUNA', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0234536396', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'185', N'1185', N'HASSAN', N'RAHMATU', N'', N'Female', N'ADMIN', N'chef', N'UNSKILL', N'26650.00', N'', N'0091584686', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'186', N'1186', N'DOOM', N'DANIEL', N'', N'Male', N'Security ', N'Security guard', N'UNSKILL', N'26650.00', N'', N'0107952805', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'187', N'1187', N'ADAMU', N'IBRAHIM', N'', N'Male', N'Security ', N'Security guard', N'UNSKILL', N'26650.00', N'', N'4931488019', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'188', N'1188', N'MAHAMMADU', N'MARYAM', N'', N'Male', N'Security ', N'Security guard', N'UNSKILL', N'26650.00', N'', N'0106349314', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'189', N'1189', N'MOHAMMED', N'DANMAMA', N'ADAMUD', N'Male', N'Security ', N'Security guard', N'UNSKILL', N'26650.00', N'', N'4802789018', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'190', N'1190', N'USMAN,', N'UMAR', N'', N'Male', N'ADMIN', N'sanitation', N'UNSKILL', N'26650.00', N'', N'0162599702', N'GTB', N'umarusmantunga@gmail.com', N'08124784291', N'22374460686', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'191', N'1191', N'AYAAKAA', N'THADDEUS', N'', N'Male', N'ADMIN', N'sanitation', N'UNSKILL', N'26650.00', N'', N'0065958008', N'Union Bank', N'Nil', N'08025704988', N'22444439794', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'192', N'1192', N'ISA', N'ISMAILA', N'', N'Male', N'ADMIN', N'sanitation', N'UNSKILL', N'26650.00', N'', N'0121309054', N'Union Bank', N'Nil', N'07089363198', N'22489028346', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'193', N'1193', N'MUJAHID', N'DAUDA', N'', N'Male', N'ADMIN', N'sanitation', N'UNSKILL', N'26650.00', N'', N'0121327913', N'Union Bank', N'Nil', N'07010464883', N'22535891111', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'194', N'1194', N'FRIDAY', N'PAUL', N'', N'Male', N'ADMIN', N'sanitation', N'UNSKILL', N'26650.00', N'', N'0121829091', N'Union Bank', N'Nil', N'07012320108', N'22536384900', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'195', N'1195', N'MUSA', N'YAKUBU', N'ZAKARI', N'Male', N'Technical services', N'stores assistant', N'UNSKILL', N'26650.00', N'', N'0123185146', N'Union Bank', N'Nil', N'09029788222', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'196', N'1196', N'ABDULLAHI', N'KHALID', N'USMAN', N'Male', N'Technical services', N'stores assistant', N'UNSKILL', N'26650.00', N'', N'5096973019', N'FCMB', N'Nil', N'08083800178', N'22386317204', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'197', N'1197', N'MUHAMMED', N'ABDULLAHI,', N'MUHAMMED', N'Male', N'Technical services', N'stores assistant', N'UNSKILL', N'26650.00', N'', N'0451630176', N'GTB', N'muhammedabdullahimuhammed@gmail.com', N'08028046595', N'22505969105', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'198', N'1198', N'MUSA', N'HASSAN', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0101101027', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'199', N'1199', N'ABUBAKAR,', N'ABDULRAHIM', N'', N'Male', N'Technical services', N'survey assistant', N'SKILL', N'28600.00', N'', N'0223314099', N'GTB', N'Nil', N'08020306663', N'22321598543', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'200', N'1200', N'TARAZIU', N'UMAR', N'TUNGA', N'Male', N'Technical services', N'survey assistant', N'SKILL', N'28600.00', N'', N'5056521010', N'FCMB', N'umartaraziu2020@gmail.com', N'08120947370', N'22412107762', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'201', N'1201', N'YUNUSA', N'SULEIMAN', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0084837221', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'202', N'1202', N'ABDULLAHI', N'SHITU', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'2106533769', N'UBA', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'203', N'1203', N'SARKI', N'ABUBAKAR', N'', N'Male', N'irrigation', N'irrigation maintenance', N'SKILL', N'26650.00', N'', N'0101160008', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'204', N'1204', N'ELKANA', N'AJAMA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101151675', N'Union Bank', N'Nil', N'07010985682', N'22501186632', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'205', N'1205', N'JIBRIN', N'HUZAIFA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0102422938', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'206', N'1206', N'ABDULLAHI', N'DANLADI', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0031023549', N'Union Bank', N'Nil', N'08125700243', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'207', N'1207', N'ABUBAKAR', N'HABILA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0093142837', N'Union Bank', N'Nil', N'07014665106', N'22484471431', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'208', N'1208', N'DANGANA', N'AKOSA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101161218', N'Union Bank', N'Nil', N'09075128645', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'209', N'1209', N'YOHANNA', N'HOSEA', N'AJAMA', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101135600', N'Union Bank', N'hoseayohana001@gmail.com', N'08129773329', N'22503345619', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'210', N'1210', N'ADAMU', N'SHALELE', N'SANI', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101156515', N'Union Bank', N'abachashelele2@gmail.com', N'07018820081', N'22451118330', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'211', N'1211', N'ADAMU', N'GAMBO', N'ATUBA', N'Male', N'Technical services', N'boilermaker', N'SKILL', N'26650.00', N'', N'4953833019', N'FCMB', N'Nil', N'07016508388', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'212', N'1212', N'ISMAILA', N'ABDULLAHI', N'', N'Male', N'irrigation', N'irrigation maintenance', N'SKILL', N'26650.00', N'', N'0101209583', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'213', N'1213', N'AHMAD', N'ABDULHAMID', N'', N'Male', N'Technical services', N'pump operator', N'SKILL', N'26650.00', N'', N'0250138538', N'GTB', N'Nil', N'07088558188', N'22443014121', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'214', N'1214', N'TUWASE', N'ABAWA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101245734', N'Union Bank', N'Nil', N'08083491943', N'22503193061', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'215', N'1215', N'YAHUZA', N'HARUNA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0083102807', N'Diamond Bank', N'Nil', N'07017179057', N'22405476624', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'216', N'1216', N'MOHAMMAD', N'HUSSEINI', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101207682', N'Union Bank', N'Nil', N'07077440882', N'22503345761', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'217', N'1217', N'SOLOMON', N'EMMANUEL', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101150977', N'Union Bank', N'emmanuelsolomon001@gmail.com', N'07087354472', N'22502936362', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'218', N'1218', N'ABDULSALAM', N'IMAM', N'YAHUZA', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101155635', N'Union Bank', N'', N'07081191880', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'219', N'1219', N'MUSA', N'ILIYASU', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101448016', N'Union Bank', N'', N'07087578717', N'22503346296', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'220', N'1220', N'MOSES', N'PAUL', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0102511669', N'Union Bank', N'mosespaulalayin241@yahoo.com', N'08022728712', N'22499588753', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'221', N'1221', N'MUHAMMED', N'SADANU', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101227349', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'222', N'1222', N'MATHIAS', N'AJAMA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101135648', N'Union Bank', N'', N'07016733130', N'22501996495', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'223', N'1223', N'YAHAYA ', N'YAKUBU', N'FARANSA', N'Male', N'irrigation', N'irrigation maintenance', N'SKILL', N'26650.00', N'', N'2120824025', N'Zenith Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'224', N'1224', N'DANTANI', N'DANTALA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0066253762', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'225', N'1225', N'ASOLA', N'ALFA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101297513', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'226', N'1226', N'ABAWA', N'SAMAILA', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'4788719014', N'FCMB', N'samailaabawa@gmail', N'07080969788', N'22446389820', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'227', N'1227', N'MIKA', N'IRIMIYA', N'', N'Male', N'Agriculture', N'dozer operator', N'SKILL', N'26650.00', N'', N'0101158038', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'228', N'1228', N'IBRAHIM', N'YAKUBU', N'ABUBAKAR', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0091001684', N'Union Bank', N'faransa509@gmail.com', N'07011500992', N'22336942920', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'229', N'1229', N'ABDULRAZAK', N'HAMIDU', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101288609', N'Union Bank', N'', N'08082498196', N'22503218069', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'230', N'1230', N'IBRAHIM', N'AHMADU', N'', N'Male', N'Security ', N'security guard', N'UNSKILL', N'26650.00', N'', N'0101469237', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'231', N'1231', N'MUSA', N'ADAMU', N'', N'Male', N'irrigation', N'irrigation maintenance', N'SKILL', N'26650.00', N'', N'0101101704', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'232', N'1232', N'ASHESHI', N'DANLADI', N'ENOCH', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0101157275', N'Union Bank', N'', N'07082620104', N'22503367206', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'233', N'1233', N'VIGHE', N'EZEKIEL', N'T', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0060865989', N'Union Bank', N'', N'07018325876', N'22432849279', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'234', N'1234', N'YUSUF', N'AYOLE', N'ADAMU', N'Male', N'irrigation', N'pump operator', N'SKILL', N'26650.00', N'', N'0023363523', N'IBTC', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'235', N'1235', N'UMAR', N'MUBARAK', N'', N'Male', N'irrigation', N'irrigation maintenance', N'SKILL', N'26650.00', N'', N'0101308754', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'236', N'1236', N'MUSA', N'SADIQ', N'', N'Male', N'irrigation', N'irrigation maintenance', N'SKILL', N'26650.00', N'', N'0036788005', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'237', N'1237', N'IBRAHIM', N'ADAMU', N'SHALELE', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'5308129012', N'FCMB', N'', N'08086108055', N'22507745792', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'238', N'1238', N'ABUBAKAR', N'ABDULLAHI', N'', N'Male', N'irrigation', N'irrigation maintenance', N'SKILL', N'26650.00', N'', N'0101220326', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'239', N'1239', N'YUSUF', N'IBRAHIM', N'', N'Male', N'irrigation', N'irrigation maintenance', N'SKILL', N'26650.00', N'', N'0101234785', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'240', N'1240', N'DAHIRU', N'MUSA', N'', N'Male', N'Security ', N'security guard', N'SKILL', N'26650.00', N'', N'0102307682', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'241', N'1241', N'KADIRI', N'ENOCH', N'DANLAMI', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0154221121', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'242', N'1242', N'IBRAHIM', N'BAGARE', N'', N'Male', N'Security ', N'security guard', N'SKILL', N'26650.00', N'', N'0101225682', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'243', N'1243', N'MOHAMMED', N'MUSA', N'', N'Male', N'irrigation', N'pump operator', N'SKILL', N'26650.00', N'', N'0102633677', N'Union Bank', N'kalamullahtunga@gmail.com', N'07084285957', N'22296829695', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'244', N'1244', N'MUHAMMED', N'SULE', N'SULEIMAN', N'Male', N'irrigation', N'pump operator', N'SKILL', N'26650.00', N'', N'6555328045', N'FIDELITY', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'245', N'1245', N'USMAN', N'SALIHU', N'ABDULLAHI', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0455177406', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'246', N'1246', N'YAHAYA', N'MOHAMMED', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0102315609', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'247', N'1247', N'IBRAHIM', N'TANKO', N'', N'Male', N'Agriculture', N'irrigator', N'SKILL', N'26650.00', N'', N'0035431054', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'248', N'1248', N'ALI', N'GADAFI', N'', N'Male', N'irrigation', N'pump operator', N'SKILL', N'26650.00', N'', N'0102095376', N'Union Bank', N'', N'09029796967', N'22496737318', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'249', N'1249', N'ABUBAKAR', N'HARUNA', N'', N'Male', N'Technical services', N'survey assistant', N'SKILL', N'39000.00', N'', N'5199797019', N'FCMB', N'harunaabubakar1988@gmail.com', N'08025466713', N'22471305169', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'250', N'1250', N'ALI', N'SAFIYANU', N'', N'Male', N'Agriculture', N'grader operator', N'SKILL', N'39000.00', N'', N'0101236143', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'251', N'1251', N'IBRAHIM', N'MUHAMMED', N'KHAMIS', N'Male', N'Data Magement', N'Data Clerk', N'SKILL', N'33800.00', N'', N'5216153011', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'252', N'1252', N'MURWANU', N'NASIRU', N'MUHAMMED', N'Male', N'Technical services', N'FUEL Attendant', N'SKILL', N'31200.00', N'', N'5296548017', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'253', N'1253', N'DAUDA', N'HALIDU', N'', N'Male', N'Technical services', N'Fuel Clerk', N'SKILL', N'33800.00', N'', N'0041831738', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'254', N'1254', N'SHINKUT ', N'MUGU', N'JONATHAN', N'Male', N'Technical services', N'FUEL Attendant', N'SKILL', N'31200.00', N'', N'3023031011', N'First Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'255', N'1255', N'JIBRIN ', N'USMAN', N'', N'Male', N'Technical services', N'FUEL Attendant', N'SKILL', N'31200.00', N'', N'0044013409', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'256', N'1256', N'DANLAMI', N'USMAN', N'W', N'Male', N'Technical services', N'Fuel Clerk', N'SKILL', N'33800.00', N'', N'0063265580', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'257', N'1257', N'YUSUF ', N'BALA', N'', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0116791446', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'258', N'1258', N'ALKASIMU', N'KASIMU', N'', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'6348709011', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'259', N'1259', N'GAMBO', N'CHINDO', N'', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0121598317', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'260', N'1260', N'MOHAMMED ', N'SALEH', N'', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0428124019', N'FCMB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'261', N'1261', N'MOHAMMED ', N'TANKO', N'', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0070664347', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'262', N'1262', N'MOHAMMED ', N'ABUBAKAR', N'T', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0123759794', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'263', N'1263', N'ABDULLAHI', N'IBRAHIM', N'U', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0035427585', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'264', N'1264', N'AHMED ', N'SHAYA', N'U', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0035429431', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'265', N'1265', N'KASIMU ', N'JAFARU', N'', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0096359379', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'266', N'1266', N'BALA', N'UMAR', N'', N'Male', N'Security ', N'Forest Observer', N'UNSKILL', N'26650.00', N'', N'0124075882', N'Union Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'267', N'1267', N'YUNUSA', N'OSHAFU', N'HAMZA', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'033671139', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'268', N'1268', N'MOHAMMED', N'ATTAYI ', N'I', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'269', N'1269', N'DAAN', N'JOB', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'270', N'1270', N'ALIYU', N'MUHAMMAD', N'T', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'0039016704', N'Access', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'271', N'1271', N'JACOB', N'MAKU', N'', N'Male', N'ADMIN', N'vehicle driver', N'SKILL', N'36400.00', N'', N'3062501047', N'First Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'272', N'1272', N'KABIRU,', N'MUSA', N'IBRAHIM', N'Male', N'ADMIN', N'ASST. DATA', N'SKILL', N'55000.00', N'', N'0200596739', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'273', N'1273', N'SHURAH', N'HARUNA', N'ZAKARI', N'Male', N'Finance', N'Finance Asst.', N'SKILL', N'55000.00', N'', N'0038782519', N'Diamond Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'274', N'1274', N'AMINU ', N'JOSEPH', N'ARIKO', N'Male', N'Technical services', N'CRANE OPT', N'SKILL', N'39000.00', N'', N'0231161320', N'GTB', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'275', N'1275', N'SHEHU', N'MOHAMMED', N'', N'Male', N'Technical services', N'CRANE OPT', N'SKILL', N'39000.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'276', N'1276', N'MOSES ', N'LABA', N'', N'Male', N'Technical services', N'MECHANIC', N'SKILL', N'39000.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'277', N'1277', N'PETER', N'FRIDAY', N'', N'Male', N'Technical services', N'WELDER', N'SKILL', N'39000.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'278', N'1278', N'SULEIMAN', N'JIBRIN', N'', N'Male', N'Technical services', N'ELECTRICIAN', N'SKILL', N'39000.00', N'', N'0351217039', N'Eco Bank', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'279', N'1279', N'IMRAN ', N'MOHAMMED ', N'AHMED', N'Male', N'Data Magement', N'IT TECHNICIANS', N'SKILL', N'55000.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'280', N'1280', N'DOOGA', N'CLEMENT', N'AONDOWASE', N'Male', N'Technical services', N'survey assistant', N'SKILL', N'33800.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'281', N'1281', N'MUHAMMED', N'KAMALUDEEN', N'A', N'Male', N'Technical services', N'survey assistant', N'SKILL', N'39000.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'282', N'1282', N'AHMAD', N'ISA', N'SAIDU', N'Male', N'Technical services', N'survey assistant', N'SKILL', N'39000.00', N'', N'', N'', N'', N'', N'', N'ST01', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'SANUSI ', N'USMAN', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ISA', N'ZAINAB', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'UZAIRU ', N'SANI', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'HABU', N'INDATU', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ROGO', N'MARYAM ', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'MUSA', N'HALIMA', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ADAMU', N'MAIMUNA', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'USMAN', N'HUDU', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'MOHAMMED', N'HAJARA', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'SULE', N'HAUWA', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'MOHAMMED ', N'ZIAULHAQ ', N'SHEHU', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'KHALIFA ', N'ADAMU', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'BULALA', N'ABDULMIMIN ', N'YAHUZA', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'UMAR ', N'MARYAM', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'HASSAN', N'ZUWAIRA ', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'USMAN', N'AISHA', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'IDRIS', N'HAUWA ', N'JEGA', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'SHARABILU ', N'ILIYASU', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ATOBI ', N'ADUNIYA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ELIKANA', N'GODIYA', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ADAMU', N'AMINA', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'YUNUSA', N'KHADIJA ', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'YAKUBU', N'AISHA', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'YAKUBU', N'HALIMA ', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'MUSA', N'MARYAM', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'SHUAIBU ', N'MOHAMMED', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'YAKUBU', N'PATU', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'NUHU  ', N'ABUBAKAR', N'.I.', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABDULAHI ', N'ASO', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'JABIRU ', N'HAMZA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'USMAN', N'GAMBO', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'UBANDOMA', N'HASSAN', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'MOHAMMED  ', N'WAZIRI', N'KASSIM', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'BABA ', N'MOHAMMED', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'UMAR ', N'BABAN', N'KWATA', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'UMAR ', N'MOHAMMED', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'LAGU', N'MARYAM', N'ALHAJI', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'VIGH', N'GODWIN', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'SULEIMAN ', N'ISKILU', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABDULKARIM ', N'ABUBAKAR', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'AHMED ', N'ISA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'YAKUBU ', N'MUSA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'IBRAHIM ', N'AKWE', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABDULLAHI ', N'ISIYAKA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'HASSAN ', N'ALI', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ALHASSAN ', N'IBRAHIM', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'DAVID ', N'SAMSON', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABDULLAHI ', N'HASHIMU', N'', N'Female', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'SADAM ', N'DANTALA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'KASIMU ', N'DANTANI', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'EZEKIEL ', N'JOHN', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABUBAKAR .S. ', N'SHALELE', N'.S. ', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'SABO ', N'MURTALA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'SHAMSU ', N'USMAN', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABUBAKAR ', N'IBRAHIM', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'MUSTAPHA ', N'HASSAN', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'DAVID ', N'OBAM', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'HASSAN', N'ALI', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABDULGANIYU', N'DANTALA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABDULRAHAM', N'ABUBAKAR', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'IBRAHIM', N'HALADU', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'AZUKA', N'USMAN', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'BASHIR', N'MUSA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'ABUBAKAR', N'SULEIMAN', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'TERPASE', N'TARBO', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'GADDAFI', N'AHMED', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'DAHIRU', N'YAHAYA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'HARUNA', N'MUSA', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'YAHAYA', N'TANKO', N'', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO

INSERT INTO [dbo].[temporary_migration] VALUES (N'11111', N'111111', N'MAMUDA', N'ADAMU', N'.B.', N'Male', N'Agriculture', N'General Work', N'UNSKILL', N'26650.00', N'', N'', N'', N'', N'', N'', N'ST02', NULL)
GO


-- ----------------------------
-- Table structure for time_sheet
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[time_sheet]') AND type IN ('U'))
	DROP TABLE [dbo].[time_sheet]
GO

CREATE TABLE [dbo].[time_sheet] (
  [sheet_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [department_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [section_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [job_allocation] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL,
  [started_at] date  NOT NULL,
  [expired_at] date  NULL,
  [status] int  NULL,
  [approved_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [approved_at] datetime2(0)  NULL,
  [staff_type_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL
)
GO

ALTER TABLE [dbo].[time_sheet] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of time_sheet
-- ----------------------------
INSERT INTO [dbo].[time_sheet] VALUES (N'04311431434312022192', N'dep07', N'#', NULL, N'ese.kelvin@dangoteprojects.com', N'2020-09-10 12:02:21', N'2020-09-07', N'2020-09-13', N'1', NULL, NULL, N'ST01')
GO

INSERT INTO [dbo].[time_sheet] VALUES (N'04311431488215055093', N'dep09', N'#', NULL, N'ese.kelvin@dangoteprojects.com', N'2020-09-13 15:05:50', N'2020-09-28', N'2020-10-04', N'1', NULL, NULL, N'ST01')
GO


-- ----------------------------
-- Table structure for time_sheet_capture
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[time_sheet_capture]') AND type IN ('U'))
	DROP TABLE [dbo].[time_sheet_capture]
GO

CREATE TABLE [dbo].[time_sheet_capture] (
  [sheet_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [staff_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [status] int  NULL,
  [created_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL,
  [approved_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [approved_at] datetime2(0)  NULL,
  [ot] int  NULL,
  [numb_days] int  NULL,
  [weekends] int  NULL,
  [absent] int  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[time_sheet_capture] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of time_sheet_capture
-- ----------------------------
INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7001', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'2', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7002', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'2', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7003', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7004', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7005', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7006', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7007', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7008', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7009', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7010', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7011', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7012', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7013', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7014', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7015', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7016', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7017', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7018', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7019', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7020', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7021', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7022', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7023', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7024', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7025', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7026', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7027', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7028', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7029', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7030', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7031', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7032', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7033', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7034', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7035', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7036', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7037', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7038', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7039', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7040', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7041', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7042', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7043', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7044', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7045', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'5', N'2', N'0', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7046', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'5', N'2', N'0', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7047', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7048', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7049', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7050', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7051', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7052', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7053', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7054', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7055', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7056', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7057', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7058', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7059', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7060', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7061', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7062', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'A7063', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'B7001', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:39', NULL, NULL, N'0', N'5', N'2', N'0', N'2020-09-12 01:43:39')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'B7002', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431434312022192', N'B7003', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-12 01:43:40', NULL, NULL, N'0', N'0', N'0', N'5', N'2020-09-12 01:43:40')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431488215055093', N'B9001', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-13 15:06:24', NULL, NULL, N'0', N'0', NULL, N'5', N'2020-09-13 15:06:24')
GO

INSERT INTO [dbo].[time_sheet_capture] VALUES (N'04311431488215055093', N'B9002', N'1', N'ese.kelvin@dangoteprojects.com', N'2020-09-13 15:06:24', NULL, NULL, N'0', N'0', NULL, N'5', N'2020-09-13 15:06:24')
GO


-- ----------------------------
-- Table structure for time_sheet_capture_bc
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[time_sheet_capture_bc]') AND type IN ('U'))
	DROP TABLE [dbo].[time_sheet_capture_bc]
GO

CREATE TABLE [dbo].[time_sheet_capture_bc] (
  [sheet_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [staff_id] varchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [status] int  NULL,
  [created_by] varchar(200) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL,
  [approved_by] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [approved_at] datetime2(0)  NULL,
  [ot] int  NULL,
  [numb_days] int  NULL,
  [weekends] int  NULL,
  [absent] int  NULL,
  [updated_at] datetime2(0)  NULL
)
GO

ALTER TABLE [dbo].[time_sheet_capture_bc] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Table structure for users
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[users]') AND type IN ('U'))
	DROP TABLE [dbo].[users]
GO

CREATE TABLE [dbo].[users] (
  [id] int  NOT NULL,
  [name] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [lastname] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [othername] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [gender] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [email] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [dob] date  NULL,
  [email_verified_at] datetime2(0)  NULL,
  [password] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NOT NULL,
  [mobile_phone] nvarchar(199) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [passchg_logon] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pass_expire] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pass_dateexpire] datetime2(0)  NULL,
  [user_disabled] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [user_locked] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [day_1] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [day_2] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [day_3] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [day_4] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [day_5] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [day_6] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [day_7] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [override_wh] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [pin_missed] nchar(1) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [modified] datetime2(0)  NULL,
  [hint_question] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [hint_answer] nvarchar(max) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_by] nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [remember_token] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [created_at] datetime2(0)  NULL,
  [updated_at] datetime2(0)  NULL,
  [department_id] nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS  NULL,
  [god_eye] int  NULL
)
GO

ALTER TABLE [dbo].[users] SET (LOCK_ESCALATION = TABLE)
GO


-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO [dbo].[users] VALUES (N'23', N'Ese', N'Uvbiekpahor', N'', N'male', N'ese.kelvin@dangoteprojects.com', N'1980-11-01', NULL, N'$2y$10$nwzzZujg9gyVeYwpjMv6aOXk5Gsfrjb/xBhIqhr6RE.IK.hTvmHeO', N'08097191027', N'0', NULL, NULL, NULL, NULL, N'1', N'1', N'1', N'1', N'1', N'1', N'1', N'1', NULL, NULL, NULL, NULL, N'ese.kelvin@dangoteprojects.com', N'm8L2NTu2kJAlQ3Rz1U4ylJyJl0H4z17MJ7N9ng9t6xTMx1LhGHziQjpgUtEL', N'2019-09-17 23:51:27', N'2019-12-08 01:31:45', N'dep06', N'1')
GO

INSERT INTO [dbo].[users] VALUES (N'25', N'Demo', N'Supervisor', N'', N'male', N'demo_supervisor@yahoo.com', N'1980-11-01', NULL, N'$2y$10$zPvtmV7hG9SMGCbbN75pte2AwiID0CxUj9MpSYdGPWLZxYJBlCWVK', N'080', N'0', NULL, NULL, NULL, NULL, N'1', N'1', N'1', N'1', N'1', N'1', N'1', N'1', NULL, NULL, NULL, NULL, N'ese.kelvin@dangoteprojects.com', NULL, N'2019-11-06 01:01:40', N'2019-12-08 01:32:08', N'dep09', N'0')
GO

INSERT INTO [dbo].[users] VALUES (N'26', N'Demo', N' Officer', NULL, N'male', N'demo_payroll_officer@yahoo.com', N'1980-11-01', NULL, N'$2y$10$nwzzZujg9gyVeYwpjMv6aOXk5Gsfrjb/xBhIqhr6RE.IK.hTvmHeO', N'080', N'0', NULL, NULL, NULL, NULL, N'1', N'1', N'1', N'1', N'1', N'1', N'1', N'1', NULL, NULL, NULL, NULL, N'ese.kelvin@dangoteprojects.com', NULL, N'2019-11-06 01:02:56', N'2019-12-08 01:32:25', N'dep06', N'0')
GO

INSERT INTO [dbo].[users] VALUES (N'27', N'Demo', N'Admin', NULL, N'male', N'demo_admin@yahoo.com', N'1980-11-01', NULL, N'$2y$10$nwzzZujg9gyVeYwpjMv6aOXk5Gsfrjb/xBhIqhr6RE.IK.hTvmHeO', N'080', N'0', NULL, NULL, NULL, NULL, N'1', N'1', N'1', N'1', N'1', N'1', N'1', N'1', NULL, NULL, NULL, NULL, N'ese.kelvin@dangoteprojects.com', NULL, N'2020-07-08 11:17:30', N'2020-07-08 11:17:30', N'dep06', N'0')
GO


-- ----------------------------
-- View structure for designation_salary_view
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[designation_salary_view]') AND type IN ('V'))
	DROP VIEW [dbo].[designation_salary_view]
GO

CREATE VIEW [dbo].[designation_salary_view] AS SELECT
desg.category_id,
desg.designation_name,
Sum(des_sal_pac.monthly_amount) AS monthly_amount,
des_sal_pac.created_by,
des_sal_pac.created_at,
dep.department_id,
dep.department_name,
desg.staff_type_id,
sftyp.staff_type_name,
desg.designation_id
FROM
dbo.designation_salary_package AS des_sal_pac
LEFT JOIN dbo.designation AS desg ON des_sal_pac.designation_id = desg.designation_id
INNER JOIN dbo.salary_description ON des_sal_pac.salary_desc_code = dbo.salary_description.salary_desc_code
LEFT JOIN dbo.department AS dep ON desg.department_id = dep.department_id
LEFT JOIN dbo.staff_type AS sftyp ON desg.staff_type_id = sftyp.staff_type_id
GROUP BY desg.category_id, desg.designation_name, des_sal_pac.created_by,
des_sal_pac.created_at,
dep.department_id,
dep.department_name,
desg.staff_type_id,
sftyp.staff_type_name,
desg.designation_id
GO


-- ----------------------------
-- View structure for designation_view
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[designation_view]') AND type IN ('V'))
	DROP VIEW [dbo].[designation_view]
GO

CREATE VIEW [dbo].[designation_view] AS SELECT
des.designation_id,
dep.department_name,
des.designation_name,
job_cat.category_name,
des.created_by,
des.created_at,
dep.department_id,
job_cat.category_id
FROM
dbo.designation AS des
INNER JOIN dbo.department AS dep ON des.department_id = dep.department_id
INNER JOIN dbo.job_category AS job_cat ON des.category_id = job_cat.category_id ;
GO


-- ----------------------------
-- View structure for payroll_departmental_view
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[payroll_departmental_view]') AND type IN ('V'))
	DROP VIEW [dbo].[payroll_departmental_view]
GO

CREATE VIEW [dbo].[payroll_departmental_view] AS SELECT
dep.department_id,
dep.department_name,
pay_cr.payroll_id,
pay_cr.created_by,
pay_cr.created_at,
pay_cr.month_of,
pay_cr.status,
pay_cr.rollback_at,
pay_cr.rollback_by,
Sum(pay_str.amount) AS monthly_net,
sftyp.staff_type_name,
pay_cr.staff_type_id,
pay_cr.pay_day
FROM
dbo.department AS dep
INNER JOIN dbo.payroll_creation AS pay_cr ON pay_cr.department_id = dep.department_id
LEFT  JOIN dbo.payroll_staff_record AS pay_str ON pay_str.payroll_id = pay_cr.payroll_id
INNER JOIN dbo.staff_type AS sftyp ON pay_cr.staff_type_id = sftyp.staff_type_id
GROUP BY
pay_cr.payroll_id,
dep.department_id,
dep.department_name,
pay_cr.payroll_id,
pay_cr.created_by,
pay_cr.created_at,
pay_cr.month_of,
pay_cr.status,
pay_cr.rollback_at,
pay_cr.rollback_by,
sftyp.staff_type_name,
pay_cr.staff_type_id,
pay_cr.pay_day
GO


-- ----------------------------
-- View structure for payroll_view
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[payroll_view]') AND type IN ('V'))
	DROP VIEW [dbo].[payroll_view]
GO

CREATE VIEW [dbo].[payroll_view] AS SELECT
payroll_creation.payroll_id,
payroll_staff_record.staff_id,
staff.first_name,
staff.last_name,
staff.other_name,
payroll_creation.month_of,
(max(payroll_staff_record.present_days_amt) + max(payroll_staff_record.overtime_pay) + max(payroll_staff_record.arrears) + max(payroll_staff_record.advance) + max(payroll_staff_record.payee)) AS monthly_net,
department.department_name,
payroll_creation.created_at,
payroll_creation.created_by,
designation.designation_id,
designation.department_id,
payroll_staff_record.cat_group_id,
designation.designation_name,
payroll_creation.status,
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
payroll_staff_record.overtime_pay,
payroll_creation.pay_day,
payroll_staff_record.daily_gross_salary,
payroll_creation.staff_type_id
FROM
dbo.payroll_creation AS payroll_creation
LEFT JOIN dbo.payroll_staff_record AS payroll_staff_record ON payroll_staff_record.payroll_id = payroll_creation.payroll_id
LEFT JOIN dbo.staff AS staff ON staff.staff_id = payroll_staff_record.staff_id
INNER JOIN dbo.designation AS designation ON staff.designation_id = designation.designation_id
INNER JOIN dbo.department AS department ON designation.department_id = department.department_id
LEFT JOIN dbo.bank_bincodes AS bank_bincodes ON staff.bin_code = bank_bincodes.bin_code
GROUP BY
payroll_staff_record.cat_group_id,

payroll_creation.payroll_id,
payroll_staff_record.staff_id,
staff.first_name,
staff.last_name,
staff.other_name,
payroll_creation.month_of,
department.department_name,
payroll_creation.created_at,
payroll_creation.created_by,
designation.designation_id,
designation.department_id,
payroll_staff_record.cat_group_id,
designation.designation_name,
payroll_creation.status,
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
payroll_staff_record.overtime_pay,
payroll_creation.pay_day,
payroll_staff_record.daily_gross_salary,
payroll_creation.staff_type_id
GO


-- ----------------------------
-- View structure for staff_other_allowance_view
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[staff_other_allowance_view]') AND type IN ('V'))
	DROP VIEW [dbo].[staff_other_allowance_view]
GO

CREATE VIEW [dbo].[staff_other_allowance_view] AS SELECT
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
dbo.staff_other_allowances AS staff_other_allowances
INNER JOIN dbo.staff AS staff ON staff_other_allowances.staff_id = staff.staff_id
INNER JOIN dbo.salary_description AS salary_description ON staff_other_allowances.salary_desc_code = salary_description.salary_desc_code ;
GO


-- ----------------------------
-- View structure for staff_time_sheet_view
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[staff_time_sheet_view]') AND type IN ('V'))
	DROP VIEW [dbo].[staff_time_sheet_view]
GO

CREATE VIEW [dbo].[staff_time_sheet_view] AS SELECT
time_sheet_capture.sheet_id,
staff.first_name,
staff.last_name,
staff.other_name,
time_sheet_capture.created_by,
time_sheet_capture.created_at,
time_sheet_capture.ot,
time_sheet_capture.numb_days,
time_sheet_capture.absent,
time_sheet.status,
staff.staff_id,
time_sheet.started_at,
department.department_id,
department.department_name,
staff.staff_type_id,
time_sheet.section_id,
time_sheet.expired_at,
time_sheet_capture.weekends
FROM
dbo.time_sheet_capture AS time_sheet_capture
INNER JOIN dbo.staff AS staff ON time_sheet_capture.staff_id = staff.staff_id
INNER JOIN dbo.time_sheet AS time_sheet ON time_sheet_capture.sheet_id = time_sheet.sheet_id
INNER JOIN dbo.department AS department ON time_sheet.department_id = department.department_id
GO


-- ----------------------------
-- View structure for staff_view
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[staff_view]') AND type IN ('V'))
	DROP VIEW [dbo].[staff_view]
GO

CREATE VIEW [dbo].[staff_view] AS SELECT
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
staff.status,
section.section_name,
staff.section_id,
staff.designation_id,
job_category.category_name,
designation.category_id,
lga.stateid,
lga.lgaid,
staff.engagement_date
FROM
dbo.staff AS staff
LEFT JOIN dbo.lga AS lga 
ON staff.lgaid = lga.lgaid
INNER JOIN dbo.designation AS designation 
ON staff.designation_id = designation.designation_id
LEFT JOIN dbo.bank_bincodes AS bank_bincodes 
ON staff.bin_code = bank_bincodes.bin_code
LEFT JOIN dbo.department AS department 
ON designation.department_id = department.department_id
LEFT JOIN dbo.staff_type AS staff_type 
ON staff.staff_type_id = staff_type.staff_type_id
LEFT JOIN dbo.section AS section 
ON staff.section_id = section.section_id
LEFT JOIN dbo.job_category AS job_category 
ON designation.category_id = job_category.category_id ;
GO


-- ----------------------------
-- View structure for time_sheet_view
-- ----------------------------
IF EXISTS (SELECT * FROM sys.all_objects WHERE object_id = OBJECT_ID(N'[dbo].[time_sheet_view]') AND type IN ('V'))
	DROP VIEW [dbo].[time_sheet_view]
GO

CREATE VIEW [dbo].[time_sheet_view] AS SELECT
time_sheet.sheet_id,
department.department_name,
time_sheet.section_id,
time_sheet.created_at,
time_sheet.status,
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
dbo.time_sheet AS time_sheet
INNER JOIN dbo.department AS department ON time_sheet.department_id = department.department_id
LEFT JOIN dbo.section AS section ON section.department_id = department.department_id AND time_sheet.section_id = section.section_id
INNER JOIN dbo.staff_type AS staff_type ON time_sheet.staff_type_id = staff_type.staff_type_id;
GO


-- ----------------------------
-- Primary Key structure for table staff
-- ----------------------------
ALTER TABLE [dbo].[staff] ADD CONSTRAINT [PK__staff__1963DD9CAC0844E6] PRIMARY KEY CLUSTERED ([staff_id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Indexes structure for table staff_other_allowances
-- ----------------------------
CREATE NONCLUSTERED INDEX [staff_id]
ON [dbo].[staff_other_allowances] (
  [staff_id] ASC
)
GO

CREATE NONCLUSTERED INDEX [fk_salary_desc_code]
ON [dbo].[staff_other_allowances] (
  [salary_desc_code] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table staff_other_allowances
-- ----------------------------
ALTER TABLE [dbo].[staff_other_allowances] ADD CONSTRAINT [PK__staff_ot__62D589888DDE9CD6] PRIMARY KEY CLUSTERED ([staff_id], [salary_desc_code])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Indexes structure for table staff_type
-- ----------------------------
CREATE NONCLUSTERED INDEX [staff_type_id]
ON [dbo].[staff_type] (
  [staff_type_id] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table staff_type
-- ----------------------------
ALTER TABLE [dbo].[staff_type] ADD CONSTRAINT [PK__staff_ty__3639AEA17F8D885F] PRIMARY KEY CLUSTERED ([staff_type_id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Indexes structure for table time_sheet
-- ----------------------------
CREATE NONCLUSTERED INDEX [sheet_id]
ON [dbo].[time_sheet] (
  [sheet_id] ASC
)
GO

CREATE NONCLUSTERED INDEX [staff_type_id_fk]
ON [dbo].[time_sheet] (
  [staff_type_id] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table time_sheet
-- ----------------------------
ALTER TABLE [dbo].[time_sheet] ADD CONSTRAINT [PK__time_she__E030D7ACB898E845] PRIMARY KEY CLUSTERED ([department_id], [started_at], [staff_type_id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Indexes structure for table time_sheet_capture
-- ----------------------------
CREATE NONCLUSTERED INDEX [fk_staff_id]
ON [dbo].[time_sheet_capture] (
  [staff_id] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table time_sheet_capture
-- ----------------------------
ALTER TABLE [dbo].[time_sheet_capture] ADD CONSTRAINT [PK__time_she__3D61C3657AFC5207] PRIMARY KEY CLUSTERED ([sheet_id], [staff_id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Indexes structure for table time_sheet_capture_bc
-- ----------------------------
CREATE NONCLUSTERED INDEX [fk_staff_id]
ON [dbo].[time_sheet_capture_bc] (
  [staff_id] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table time_sheet_capture_bc
-- ----------------------------
ALTER TABLE [dbo].[time_sheet_capture_bc] ADD CONSTRAINT [PK__time_she__3D61C365905C3E48] PRIMARY KEY CLUSTERED ([sheet_id], [staff_id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO


-- ----------------------------
-- Indexes structure for table users
-- ----------------------------
CREATE UNIQUE NONCLUSTERED INDEX [users_email_unique]
ON [dbo].[users] (
  [email] ASC
)
GO


-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE [dbo].[users] ADD CONSTRAINT [PK__users__3213E83FC10AD175] PRIMARY KEY CLUSTERED ([id])
WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON)  
ON [PRIMARY]
GO

