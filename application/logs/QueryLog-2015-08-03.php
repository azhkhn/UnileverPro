SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.409811973572

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.377838134766

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.289534091949

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.341622114182

INSERT INTO `PRODUCTS` (`categoryid`, `userid`, `seotitle`, `seodescription`) VALUES ('1', '1', 'CLOTHES SEO TITLE', 'CLOTHES DESCRIPITON SEO') 
 Execution Time:0.318620920181

INSERT INTO `PRODUCTDETAIL` (`languageid`, `title`, `description`, `productid`) VALUES ('1', 'KHMER', 'KHMER DESCRIPTION', 65) 
 Execution Time:0.463780879974

INSERT INTO `PRODUCTDETAIL` (`languageid`, `title`, `description`, `productid`) VALUES ('2', 'ENGLISH', 'ENGLISH DESCRIPTION', 65) 
 Execution Time:0.368984937668

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.348592996597

SELECT `A`.`menuid`, `B`.`title`
FROM `MENUS` `A`
JOIN `MENUDETAIL` `B` ON `A`.`menuid` = `B`.`menuid`
WHERE `B`.`languageid` = 1
AND `A`.`level` < '2' 
 Execution Time:0.286208868027

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.321268081665

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.339339971542

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.285773038864

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.453989028931

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.308621168137

SELECT `c`.`categoryid`, `c`.`title`
FROM `CATEGORYDETAIL` `c`
WHERE `c`.`languageid` = 2
ORDER BY `c`.`categoryid` DESC 
 Execution Time:0.331408977509

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.343459844589

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.320441007614

SELECT `u`.`userid`, `u`.`username`, `r`.`name` AS `usertype`, `u`.`active`
FROM `USERS` `u`
JOIN `ROLES` `r` ON `r`.`roleid` = `u`.`usertype` 
 Execution Time:0.295300006866

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.288884878159

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.339622974396

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.305478811264

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.316935062408

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 1 
 Execution Time:0.350958108902

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.297219991684

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.340018987656

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.387968063354

SELECT `A`.`menuid`, `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `C`.`languageid`, `D`.`languagename`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
JOIN `LANGUAGES` `D` ON `C`.`languageid` = `D`.`languageid`
WHERE `A`.`menuid` = '39' 
 Execution Time:0.396622180939

SELECT `A`.`menuid`, `B`.`title`
FROM `MENUS` `A`
JOIN `MENUDETAIL` `B` ON `A`.`menuid` = `B`.`menuid`
WHERE `B`.`languageid` = 1
AND `A`.`level` < '2' 
 Execution Time:0.301577091217

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.346524953842

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.316070079803

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.449742078781

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.293534040451

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.344428062439

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.348628997803

SELECT `A`.`menuid`, `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `C`.`languageid`, `D`.`languagename`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
JOIN `LANGUAGES` `D` ON `C`.`languageid` = `D`.`languageid`
WHERE `A`.`menuid` = '39' 
 Execution Time:0.350091934204

SELECT `A`.`menuid`, `B`.`title`
FROM `MENUS` `A`
JOIN `MENUDETAIL` `B` ON `A`.`menuid` = `B`.`menuid`
WHERE `B`.`languageid` = 1
AND `A`.`level` < '2' 
 Execution Time:0.317852973938

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.292438030243

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.287265062332

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.287178039551

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.293968915939

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.396430015564

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.337454080582

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.292850017548

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.293729066849

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.291123151779

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:1.11610484123

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.852915048599

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.391519784927

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:1.15634393692

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.641196012497

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.386090040207

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.431746959686

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.287594079971

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.299911975861

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.402432918549

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.365311145782

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.290396928787

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.295423030853

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.294845104218

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.355796098709

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.29684305191

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.357340097427

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.3432700634

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.336850881577

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.442776203156

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.342310905457

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.309720039368

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.519275903702

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.342063903809

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.291610956192

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.450450181961

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.349162101746

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.321743011475

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.35005402565

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.393655061722

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.342363119125

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.345935106277

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.305709838867

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.32865691185

INSERT INTO `PRODUCTS` (`categoryid`, `userid`, `seotitle`, `seodescription`) VALUES ('1', '1', 'CLOTHES SEO TITLE', 'CLOTHES DESCRIPITON SEO') 
 Execution Time:0.372602939606

INSERT INTO `PRODUCTDETAIL` (`languageid`, `title`, `description`, `productid`) VALUES ('1', 'KHMER', 'KHMER DESCRIPTION', 66) 
 Execution Time:0.307536125183

INSERT INTO `PRODUCTDETAIL` (`languageid`, `title`, `description`, `productid`) VALUES ('2', 'ENGLISH', 'ENGLISH DESCRIPTION', 66) 
 Execution Time:0.309634208679

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.293193101883

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.458734035492

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.382582902908

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.367110967636

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.345630884171

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.3305580616

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28201603889465

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.33301997184753

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.34101891517639

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.3110179901123

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.33502006530762

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.33001899719238

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.32501912117004

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.32101798057556

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.30401802062988

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.31701803207397

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28301596641541

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.37502217292786

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.35902094841003

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.31501793861389

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.25601506233215

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.25001406669617

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28801703453064

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.25401496887207

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.23801302909851

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26501607894897

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.25701403617859

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.25501489639282

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.25701403617859

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.25801491737366

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.27101588249207

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.25701522827148

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.24101305007935

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26201486587524

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26401519775391

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26501488685608

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.24901390075684

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.23601293563843

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.24301385879517

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.22901296615601

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.24301409721375

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26701521873474

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.23501420021057

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28501605987549

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.34201884269714

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.35902094841003

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.31901812553406

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28901600837708

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.32001900672913

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.3370189666748

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.30201697349548

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28101587295532

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26701498031616

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.25901389122009

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26701498031616

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28601598739624

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.27501606941223

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28101587295532

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.246013879776

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.2720160484314

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.31701898574829

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.31601810455322

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28001594543457

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.3110179901123

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26001501083374

INSERT INTO `SLIDERS` (`userid`, `ordering`, `type`) VALUES ('1', '2', 'slide') 
 Execution Time:0.48302793502808

INSERT INTO `SLIDERDETAIL` (`languageid`, `title`, `caption`, `description`, `imageurl`, `sliderid`) VALUES ('1', 'test', 'test', '<p>test</p>\n', 'http://localhost/smartmartpro/public/upload/slider-background2.jpg', 4) 
 Execution Time:0.3110179901123

INSERT INTO `SLIDERDETAIL` (`languageid`, `title`, `description`, `imageurl`, `sliderid`) VALUES ('2', 'សដដស', '<p>សដងដង</p>\n', 'http://localhost/smartmartpro/public/upload/slider-background2.jpg', 4) 
 Execution Time:0.31101703643799

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.29301595687866

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.3110179901123

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26501488685608

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.28001594543457

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.33101892471313

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26701498031616

INSERT INTO `SLIDERS` (`userid`, `ordering`, `type`) VALUES ('1', '3', 'slide') 
 Execution Time:0.31001782417297

INSERT INTO `SLIDERDETAIL` (`languageid`, `title`, `caption`, `description`, `imageurl`, `sliderid`) VALUES ('2', 'ok', 'ok', '<p><br />\nok</p>\n', 'http://localhost/smartmartpro/public/upload/offer-background.jpg', 5) 
 Execution Time:0.31401801109314

INSERT INTO `SLIDERDETAIL` (`languageid`, `title`, `description`, `imageurl`, `sliderid`) VALUES ('1', 'តេសត', '<p>សដថសថ</p>\n', 'http://localhost/smartmartpro/public/upload/offer-background.jpg', 5) 
 Execution Time:0.31901812553406

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = 2
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.31401777267456

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.30301690101624

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.31801795959473

SELECT `s`.`sliderid`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = 2
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.30601811408997

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.24901509284973

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.2980170249939

