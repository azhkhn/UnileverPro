SELECT `p`.`postid`, `p`.`title`, `p`.`shortdescription`, `p`.`longdescription`, `p`.`postdate`, `p`.`thumbnailurl`, `u`.`userid`, `u`.`username`
FROM `POSTS` `p`
JOIN `USERS` `u` ON `p`.`userid` = `u`.`userid`
ORDER BY `postid` DESC 
 Execution Time:0.30101799964905

SELECT `p`.`pageid`, `p`.`title`, `p`.`createddate`, `u`.`userid`, `u`.`username`
FROM `PAGES` `p`
JOIN `USERS` `u` ON `p`.`userid` = `u`.`userid`
ORDER BY `pageid` DESC 
 Execution Time:1.0020570755005

SELECT `M1`.`menuid`, `M1`.`Title` `title`, `M1`.`linkto`, `M1`.`ordering`, `M2`.`title` `suboftitle`
FROM `MENUS` `M1`
LEFT JOIN `MENUS` `M2` ON `M1`.`subof`=`M2`.`menuid` 
 Execution Time:0.26901602745056

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid` 
 Execution Time:0.3370201587677

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid` 
 Execution Time:0.27301478385925

SELECT `M1`.`menuid`, `M1`.`Title` `title`, `M1`.`linkto`, `M1`.`ordering`, `M2`.`title` `suboftitle`
FROM `MENUS` `M1`
LEFT JOIN `MENUS` `M2` ON `M1`.`subof`=`M2`.`menuid` 
 Execution Time:0.29201698303223

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid` 
 Execution Time:0.26201391220093

SELECT `A`.`foodid`, `A`.`title` As `food_title`, `A`.`description` As `food_description`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`, `B`.`title` As `foodtype_title`, `B`.`description` As `footype_description`
FROM `FOODS` `A`
JOIN `FOODTYPES` `B` ON `A`.`foodtypeid`=`B`.`foodtypeid` 
 Execution Time:0.2850170135498

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s` 
 Execution Time:0.92005300521851

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s` 
 Execution Time:0.28401589393616

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s` 
 Execution Time:0.27201509475708

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s` 
 Execution Time:0.27401614189148

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid` 
 Execution Time:0.30701804161072

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s` 
 Execution Time:0.31501793861389

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid` 
 Execution Time:0.69203996658325

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid` 
 Execution Time:0.29101610183716

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s` 
 Execution Time:0.33101892471313

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` ASC 
 Execution Time:0.39802289009094

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` 
 Execution Time:0.4170241355896

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.27901601791382

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` 
 Execution Time:0.36702108383179

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.28401589393616

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:1.4870851039886

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` 
 Execution Time:0.72504186630249

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` 
 Execution Time:0.34301900863647

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:1.21107006073

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` 
 Execution Time:0.30801820755005

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.31301808357239

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.26301503181458

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` 
 Execution Time:0.42302393913269

