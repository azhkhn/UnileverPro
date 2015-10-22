SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `productid` DESC
 LIMIT 4 
 Execution Time:0.55342197418213

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `count` DESC
 LIMIT 4 
 Execution Time:0.066295862197876

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
AND `recommend` = 1
ORDER BY `recommend` DESC
 LIMIT 4 
 Execution Time:0.032079935073853

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.29262208938599

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'slide'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.25676703453064

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'subslide'
ORDER BY `s`.`ordering` DESC
 LIMIT 2 
 Execution Time:0.039282083511353

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'feature'
ORDER BY `s`.`ordering` DESC
 LIMIT 3 
 Execution Time:0.00085115432739258

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'partner'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.017371892929077

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `productid` DESC
 LIMIT 4 
 Execution Time:0.045411109924316

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
ORDER BY `count` DESC
 LIMIT 4 
 Execution Time:0.00082302093505859

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '2'
AND `recommend` = 1
ORDER BY `recommend` DESC
 LIMIT 4 
 Execution Time:0.00095796585083008

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '2'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.029459953308105

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'slide'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.0060110092163086

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'subslide'
ORDER BY `s`.`ordering` DESC
 LIMIT 2 
 Execution Time:0.00083804130554199

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'feature'
ORDER BY `s`.`ordering` DESC
 LIMIT 3 
 Execution Time:0.00081396102905273

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '2'
AND `s`.`type` = 'partner'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.0057370662689209

