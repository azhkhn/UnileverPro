SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `productid` DESC
 LIMIT 4 
 Execution Time:0.49438095092773

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `count` DESC
 LIMIT 4 
 Execution Time:0.10390400886536

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
AND `recommend` = 1
ORDER BY `recommend` DESC
 LIMIT 4 
 Execution Time:0.03348183631897

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.39452505111694

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'slide'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.27676606178284

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'subslide'
ORDER BY `s`.`ordering` DESC
 LIMIT 2 
 Execution Time:0.05544900894165

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'feature'
ORDER BY `s`.`ordering` DESC
 LIMIT 3 
 Execution Time:0.0021729469299316

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'partner'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.0077259540557861

