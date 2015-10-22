SELECT `s`.`sliderid`, `sd`.`imageurl`, `sd`.`title`, `sd`.`description`, `sd`.`createddate`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `languageid` = 2
ORDER BY `sliderid` DESC
 LIMIT 5 
 Execution Time:1.4777140617371

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '1'
ORDER BY `productid` DESC
 LIMIT 5 
 Execution Time:1.6202239990234

SELECT COUNT(*) AS `numrows` FROM `PAGES` 
 Execution Time:0.14665102958679

SELECT COUNT(*) AS `numrows` FROM `USERS` 
 Execution Time:0.016842842102051

SELECT COUNT(*) AS `numrows` FROM `CATEGORIES` 
 Execution Time:0.056164979934692

SELECT COUNT(*) AS `numrows` FROM `PRODUCTS` 
 Execution Time:0.033792018890381

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:24.814357995987

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.081578969955444

