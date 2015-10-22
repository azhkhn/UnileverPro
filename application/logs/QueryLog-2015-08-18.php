SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '1'
ORDER BY `productid` DESC
 LIMIT 4 
 Execution Time:1.5651550292969

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '1'
ORDER BY `count` DESC
 LIMIT 4 
 Execution Time:0.15280103683472

SELECT `pd`.`productid`, `pd`.`description`, `p`.`categoryid`, `pd`.`title`, `pd`.`caption`, `pd`.`createddate`, `p`.`thumbnailurl`, `p`.`price`, `p`.`recommend`
FROM `PRODUCTS` `p`
JOIN `PRODUCTDETAIL` `pd` ON `p`.`productid` = `pd`.`productid`
WHERE `pd`.`languageid` = '1'
AND `recommend` = 1
ORDER BY `recommend` DESC
 LIMIT 4 
 Execution Time:0.055262804031372

SELECT DISTINCT(A.menuid), `A`.`subof`, `A`.`ordering`, `A`.`linkto`, `C`.`title`, `C`.`description`, `A`.`level`
FROM `MENUS` `A`
LEFT JOIN `MENUS` `B` ON `A`.`subof` =  `B`.`menuid`
JOIN `MENUDETAIL` `C` ON `A`.`menuid` = `C`.`menuid`
WHERE `C`.`languageid` = '1'
ORDER BY `A`.`subof`, `A`.`ordering` 
 Execution Time:0.44046306610107

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '1'
AND `s`.`type` = 'slide'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.44235801696777

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '1'
AND `s`.`type` = 'subslide'
ORDER BY `s`.`ordering` DESC
 LIMIT 2 
 Execution Time:0.052268028259277

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '1'
AND `s`.`type` = 'feature'
ORDER BY `s`.`ordering` DESC
 LIMIT 3 
 Execution Time:0.013216018676758

SELECT `s`.`sliderid`, `s`.`linkto`, `s`.`ordering`, `s`.`type`, `sd`.`title`, `sd`.`languageid`, `sd`.`caption`, `sd`.`description`, `sd`.`imageurl`
FROM `SLIDERS` `s`
JOIN `SLIDERDETAIL` `sd` ON `s`.`sliderid` = `sd`.`sliderid`
WHERE `sd`.`languageid` = '1'
AND `s`.`type` = 'partner'
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.042229890823364

