SELECT `userid`, `username`, `usertype`
FROM `USERS`
WHERE `username` = 'admin'
AND `password` = '21232f297a57a5a743894a0e4a801fc3'
AND `active` = 1
 LIMIT 1 
 Execution Time:0.27640604972839

SELECT `userid`, `username`, `usertype`
FROM `USERS`
WHERE `username` = 'admin'
AND `password` = '21232f297a57a5a743894a0e4a801fc3'
AND `active` = 1
 LIMIT 1 
 Execution Time:0.4070520401001

SELECT `userid`, `username`, `usertype`
FROM `USERS`
WHERE `username` = 'admin'
AND `password` = '21232f297a57a5a743894a0e4a801fc3'
AND `active` = 1
 LIMIT 1 
 Execution Time:0.26590085029602

SELECT `userid`, `username`, `usertype`
FROM `USERS`
WHERE `username` = 'test'
AND `password` = '098f6bcd4621d373cade4e832627b4f6'
AND `active` = 1
 LIMIT 1 
 Execution Time:0.28400802612305

SELECT `userid`, `username`, `usertype`
FROM `USERS`
WHERE `username` = 'test'
AND `password` = '098f6bcd4621d373cade4e832627b4f6'
AND `active` = 1
 LIMIT 1 
 Execution Time:0.27075982093811

SELECT `userid`, `username`, `usertype`
FROM `USERS`
WHERE `username` = 'admin'
AND `password` = '21232f297a57a5a743894a0e4a801fc3'
AND `active` = 1
 LIMIT 1 
 Execution Time:0.26316714286804

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.26420497894287

SELECT `u`.`userid`, `u`.`username`, `u`.`password`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype`
WHERE `userid` = '1' 
 Execution Time:0.26788806915283

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.29661798477173

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.26306414604187

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.2744288444519

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.28486680984497

SELECT `u`.`userid`, `u`.`username`, `u`.`password`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype`
WHERE `userid` = '1' 
 Execution Time:0.28885197639465

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.26626420021057

SELECT `u`.`userid`, `u`.`username`, `u`.`password`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype`
WHERE `userid` = '1' 
 Execution Time:0.26560497283936

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.28813290596008

SELECT `u`.`userid`, `u`.`username`, `u`.`password`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype`
WHERE `userid` = '1' 
 Execution Time:0.27206993103027

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.29024910926819

SELECT `u`.`userid`, `u`.`username`, `u`.`password`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype`
WHERE `userid` = '3' 
 Execution Time:0.26308798789978

INSERT INTO `MENUS` (`ordering`, `subof`) VALUES ('1', NULL) 
 Execution Time:0.26719999313354

INSERT INTO `MENUDETAIL` (`languageid`, `title`, `description`, `menuid`) VALUES ('1', 'ទំនាក់ទំនងយើងខ្ញុំ', 'ទំនាក់ទំនង', 5) 
 Execution Time:0.27762198448181

INSERT INTO `MENUDETAIL` (`languageid`, `title`, `description`, `menuid`) VALUES ('2', 'Contact Us', 'Contact Us', 5) 
 Execution Time:0.26345014572144

INSERT INTO `MENUS` (`ordering`, `subof`) VALUES ('1', NULL) 
 Execution Time:0.27310013771057

INSERT INTO `MENUDETAIL` (`languageid`, `title`, `description`, `menuid`) VALUES ('1', 'ទំនាក់ទំនងយើងខ្ញុំ', 'ទំនាក់ទំនង', 6) 
 Execution Time:0.27182197570801

INSERT INTO `MENUDETAIL` (`languageid`, `title`, `description`, `menuid`) VALUES ('2', 'Contact Us', 'Contact Us', 6) 
 Execution Time:0.27173709869385

INSERT INTO `MENUS` (`ordering`, `subof`) VALUES ('1', NULL) 
 Execution Time:0.27381300926208

INSERT INTO `MENUDETAIL` (`languageid`, `title`, `description`, `menuid`) VALUES ('1', 'ទំនាក់ទំនងយើងខ្ញុំ', 'ទំនាក់ទំនង', 7) 
 Execution Time:0.27106213569641

INSERT INTO `MENUDETAIL` (`languageid`, `title`, `description`, `menuid`) VALUES ('2', 'Contact Us', 'Contact Us', 7) 
 Execution Time:0.27092599868774

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `C`.`title`, `C`.`description`, `C`.`languageid`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 2 
 Execution Time:0.26625990867615

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `C`.`title`, `C`.`description`, `C`.`languageid`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 2 
 Execution Time:0.27345895767212

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 1 
 Execution Time:0.26367712020874

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 1 
 Execution Time:0.26517581939697

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 1 
 Execution Time:0.2635509967804

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.26439714431763

