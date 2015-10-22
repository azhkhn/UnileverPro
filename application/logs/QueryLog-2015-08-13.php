SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `productid` DESC
 LIMIT 4 
 Execution Time:0.34088277816772

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `count` DESC
 LIMIT 4 
 Execution Time:0.065402030944824

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
AND `recommend` = 1
ORDER BY `recommend` DESC
 LIMIT 4 
 Execution Time:0.014887094497681

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.26902794837952

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'slide'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.20371794700623

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'subslide'
ORDER BY `s`.`ordering` DESC
 LIMIT 2 
 Execution Time:0.04305100440979

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'feature'
ORDER BY `s`.`ordering` DESC
 LIMIT 3 
 Execution Time:0.0020279884338379

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'partner'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.025012969970703

SELECT `s`.`sliderid`, `sd`.`imageurl`, `sd`.`title`, `sd`.`description`, `sd`.`createddate`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `languageid` = 2
ORDER BY `sliderid` DESC
 LIMIT 5 
 Execution Time:0.044794082641602

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `productid` DESC
 LIMIT 5 
 Execution Time:0.011551856994629

SELECT COUNT(*) AS `numrows` FROM `PAGES` 
 Execution Time:0.11827492713928

SELECT COUNT(*) AS `numrows` FROM `USERS` 
 Execution Time:0.0079119205474854

SELECT COUNT(*) AS `numrows` FROM `CATEGORIES` 
 Execution Time:0.043628931045532

SELECT COUNT(*) AS `numrows` FROM `PRODUCTS` 
 Execution Time:0.00089597702026367

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.035749197006226

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.020433187484741

SELECT `A`.`menuid`, `B`.`title`, `A`.`level`
FROM `MENUS` `A`
JOIN `MENUDETAIL` `B` ON `A`.`menuid` = `B`.`menuid`
WHERE `B`.`languageid` = 2
AND `A`.`level` < '2' 
 Execution Time:0.019307136535645

SELECT `p`.`pageid`, `pd1`.`title`, `u`.`userid`, `u`.`username`
FROM `PAGES` `p`
JOIN `USERS` `u` ON `p`.`userid` = `u`.`userid`
JOIN `PAGEDETAIL` `pd1` ON `p`.`pageid` = `pd1`.`pageid`
WHERE `pd1`.`languageid` = 2
ORDER BY `pageid` DESC 
 Execution Time:0.14619779586792

SELECT `c`.`categoryid`, `c`.`title`
FROM `CATEGORYDETAIL` `c`
WHERE `c`.`languageid` = '2'
ORDER BY `c`.`categoryid` DESC 
 Execution Time:0.070058107376099

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.018022060394287

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.018292188644409

SELECT DISTINCT(A.menuid), `A`.`level`, `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 2 
 Execution Time:0.070116996765137

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.0011758804321289

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.0011920928955078

UPDATE `MENUS` SET `ordering` = '3'
WHERE `menuid` = '2' 
 Execution Time:0.0094850063323975

UPDATE `MENUS` SET `ordering` = '2'
WHERE `menuid` = '2' 
 Execution Time:0.0034170150756836

UPDATE `MENUS` SET `ordering` = '3'
WHERE `menuid` = '10' 
 Execution Time:0.038687944412231

UPDATE `MENUS` SET `ordering` = '0'
WHERE `menuid` = '1' 
 Execution Time:0.0022459030151367

SELECT DISTINCT(A.menuid), `A`.`level`, `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 2 
 Execution Time:0.016557216644287

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.0016989707946777

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.00092387199401855

SELECT DISTINCT(A.menuid), `A`.`level`, `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 2 
 Execution Time:0.0010740756988525

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.0010960102081299

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.0015268325805664

SELECT DISTINCT(A.menuid), `A`.`level`, `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 2 
 Execution Time:0.044272184371948

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.0014569759368896

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.0016770362854004

UPDATE `MENUS` SET `ordering` = '1'
WHERE `menuid` = '2' 
 Execution Time:0.035401821136475

SELECT DISTINCT(A.menuid), `A`.`level`, `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `C`.`languageid`, (SELECT title FROM MENUDETAIL WHERE menuid=A.subof AND languageid=1) AS suboftitle
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof`=`B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid`=`C`.`menuid`
WHERE `C`.`languageid` = 2 
 Execution Time:0.48004794120789

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.089627027511597

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.030455112457275

