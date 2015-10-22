SELECT *, (SELECT COUNT(A.foodid) FROM FOODS A WHERE A.foodtypeid=B.foodtypeid) AS TOTL FROM FOODTYPES B ORDER BY B.title 
 Execution Time:0.25701498985291

SELECT `A`.`foodid`, `A`.`title` As `food_title`, `A`.`description` As `food_description`, `A`.`foodtypeid`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`, `B`.`title` As `foodtype_title`, `B`.`description` As `footype_description`
FROM `FOODS` `A`
JOIN `FOODTYPES` `B` ON `A`.`foodtypeid`=`B`.`foodtypeid` 
 Execution Time:0.25801491737366

SELECT *
FROM `MENUS` 
 Execution Time:0.25701498985291

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.25501394271851

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.25601482391357

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.25501394271851

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.25701498985291

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.23601293563843

SELECT `A`.`foodid`, `A`.`title`, `A`.`description`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`
FROM `FOODS` `A`
WHERE `A`.`promotiontype` = '1'
ORDER BY `A`.`foodid` DESC
 LIMIT 1 
 Execution Time:0.26501607894897

SELECT `A`.`foodid`, `A`.`title`, `A`.`description`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`
FROM `FOODS` `A`
WHERE `A`.`promotiontype` = '2'
ORDER BY `A`.`foodid` DESC
 LIMIT 1 
 Execution Time:0.26401519775391

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.26501488685608

SELECT `p`.`postid`, `p`.`title`, `p`.`shortdescription`, `p`.`longdescription`, `p`.`postdate`, `p`.`thumbnailurl`, `u`.`userid`, `u`.`username`
FROM `POSTS` `p`
JOIN `USERS` `u` ON `p`.`userid` = `u`.`userid`
ORDER BY `postid` DESC 
 Execution Time:0.29201722145081

SELECT *
FROM `MENUS` 
 Execution Time:0.26201510429382

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.26301503181458

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.27101492881775

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.26301503181458

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.26201510429382

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.26201510429382

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.26601600646973

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.26701498031616

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.26201486587524

SELECT *
FROM `MENUS` 
 Execution Time:0.27901601791382

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.2720160484314

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.2720160484314

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.27101516723633

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.27101612091064

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.27201509475708

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.27101612091064

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.27101612091064

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.27101516723633

SELECT *, (SELECT COUNT(A.foodid) FROM FOODS A WHERE A.foodtypeid=B.foodtypeid) AS TOTL FROM FOODTYPES B ORDER BY B.title 
 Execution Time:0.25701403617859

SELECT `A`.`foodid`, `A`.`title` As `food_title`, `A`.`description` As `food_description`, `A`.`foodtypeid`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`, `B`.`title` As `foodtype_title`, `B`.`description` As `footype_description`
FROM `FOODS` `A`
JOIN `FOODTYPES` `B` ON `A`.`foodtypeid`=`B`.`foodtypeid` 
 Execution Time:0.25801396369934

SELECT *
FROM `MENUS` 
 Execution Time:0.25701403617859

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.25601410865784

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.25701498985291

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.25701498985291

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.25601387023926

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.25901412963867

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.25501489639282

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.26001501083374

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.25701498985291

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.25801491737366

SELECT `A`.`foodid`, `A`.`title`, `A`.`description`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`
FROM `FOODS` `A`
WHERE `A`.`promotiontype` = '1'
ORDER BY `A`.`foodid` DESC
 LIMIT 1 
 Execution Time:0.25801420211792

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.26301503181458

SELECT `A`.`foodid`, `A`.`title`, `A`.`description`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`
FROM `FOODS` `A`
WHERE `A`.`promotiontype` = '2'
ORDER BY `A`.`foodid` DESC
 LIMIT 1 
 Execution Time:0.26301503181458

SELECT `A`.`foodid`, `A`.`title` As `food_title`, `A`.`description` As `food_description`, `A`.`foodtypeid`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`, `B`.`title` As `foodtype_title`, `B`.`description` As `footype_description`
FROM `FOODS` `A`
JOIN `FOODTYPES` `B` ON `A`.`foodtypeid`=`B`.`foodtypeid` 
 Execution Time:0.27901601791382

SELECT *
FROM `MENUS` 
 Execution Time:0.28501605987549

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.28501582145691

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.28501605987549

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.28501605987549

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.2850170135498

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.28601598739624

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.28501605987549

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.28501605987549

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.28601598739624

SELECT *
FROM `MENUS` 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.26301598548889

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.26301503181458

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.26401591300964

SELECT *
FROM `FOODTYPES`
ORDER BY `foodtypeid` DESC 
 Execution Time:0.25601506233215

SELECT *
FROM `FOODS`
WHERE `foodid` = '18' 
 Execution Time:0.25601506233215

SELECT *
FROM `MENUS` 
 Execution Time:0.23401403427124

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.23501300811768

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.23501396179199

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.23401284217834

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.23501396179199

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.23401308059692

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.23401403427124

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.23301315307617

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.23401308059692

SELECT *
FROM `MENUS` 
 Execution Time:0.27701592445374

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.27601599693298

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.27701497077942

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.27701497077942

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.27701616287231

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.27701592445374

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.27701592445374

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.27701616287231

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.27601599693298

SELECT *
FROM `FOODTYPES`
ORDER BY `foodtypeid` DESC 
 Execution Time:0.27801609039307

SELECT *
FROM `FOODS`
WHERE `foodid` = '10' 
 Execution Time:0.27801585197449

SELECT *
FROM `MENUS` 
 Execution Time:0.25501394271851

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.25401401519775

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.25401520729065

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.25601387023926

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.25501394271851

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.25701522827148

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.25401401519775

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.25601410865784

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.25401496887207

SELECT *
FROM `MENUS` 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.31001687049866

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.26401591300964

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.26301503181458

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.26401495933533

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.26301503181458

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.26301503181458

SELECT *
FROM `FOODTYPES`
ORDER BY `foodtypeid` DESC 
 Execution Time:0.25701498985291

SELECT *
FROM `FOODS`
WHERE `foodid` = '27' 
 Execution Time:0.25701498985291

SELECT *
FROM `MENUS` 
 Execution Time:0.22601199150085

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.24001312255859

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.28101706504822

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.2250120639801

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.2250120639801

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.24101400375366

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.22601294517517

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.22501301765442

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.22501301765442

SELECT *
FROM `MENUS` 
 Execution Time:0.25701498985291

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.25601482391357

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.25601482391357

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.25601387023926

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.25601482391357

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.25501489639282

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.32101798057556

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.25601410865784

UPDATE `FOODS` SET `title` = 'Coca Cola', `description` = 'Coca Cola in Cafe Chateau ', `thumbnailurl` = 'http://localhost/coffeeshoppro/public/upload/good-rest.jpg', `promotiontype` = '2', `price` = '0.5', `userid` = '1', `foodtypeid` = '1', `foodid` = '27', `seotitle` = 'bbb', `seodescription` = 'bbb'
WHERE `foodid` = '27' 
 Execution Time:0.28101587295532

SELECT `A`.`foodid`, `A`.`title` As `food_title`, `A`.`description` As `food_description`, `A`.`foodtypeid`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`, `B`.`title` As `foodtype_title`, `B`.`description` As `footype_description`
FROM `FOODS` `A`
JOIN `FOODTYPES` `B` ON `A`.`foodtypeid`=`B`.`foodtypeid` 
 Execution Time:0.28401589393616

SELECT *
FROM `MENUS` 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.25601482391357

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.25601387023926

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.25601387023926

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.25601506233215

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.25701403617859

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.25701498985291

SELECT *
FROM `MENUS` 
 Execution Time:0.27101492881775

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.27101588249207

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.27101516723633

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.270015001297

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.27001595497131

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.27101492881775

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.27301621437073

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.27101492881775

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.27101612091064

SELECT *, (SELECT COUNT(A.foodid) FROM FOODS A WHERE A.foodtypeid=B.foodtypeid) AS TOTL FROM FOODTYPES B ORDER BY B.title 
 Execution Time:0.31801891326904

SELECT `A`.`foodid`, `A`.`title` As `food_title`, `A`.`description` As `food_description`, `A`.`foodtypeid`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`, `B`.`title` As `foodtype_title`, `B`.`description` As `footype_description`
FROM `FOODS` `A`
JOIN `FOODTYPES` `B` ON `A`.`foodtypeid`=`B`.`foodtypeid` 
 Execution Time:0.29801678657532

SELECT *
FROM `MENUS` 
 Execution Time:0.22601294517517

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.22501301765442

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.22501301765442

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.22501301765442

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.22601294517517

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.22501301765442

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.22501301765442

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.22501301765442

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.22501301765442

SELECT `s`.`serviceid`, `s`.`title`, `s`.`description`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`
FROM `SERVICES` `s`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.22601318359375

SELECT `A`.`foodid`, `A`.`title`, `A`.`description`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`
FROM `FOODS` `A`
WHERE `A`.`promotiontype` = '1'
ORDER BY `A`.`foodid` DESC
 LIMIT 1 
 Execution Time:0.25701498985291

SELECT `s`.`slideid`, `s`.`title`, `s`.`caption`, `s`.`linkto`, `s`.`imageurl`, `s`.`ordering`, `u`.`userid`, `u`.`username`
FROM `SLIDES` `s`
JOIN `USERS` `u` ON `s`.`userid` = `u`.`userid`
ORDER BY `s`.`ordering` DESC 
 Execution Time:0.25701498985291

SELECT `A`.`foodid`, `A`.`title`, `A`.`description`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`
FROM `FOODS` `A`
WHERE `A`.`promotiontype` = '2'
ORDER BY `A`.`foodid` DESC
 LIMIT 1 
 Execution Time:0.27801609039307

SELECT *
FROM `FOODTYPES`
ORDER BY `title` ASC 
 Execution Time:0.28401589393616

SELECT `A`.`foodid`, `A`.`title` As `food_title`, `A`.`description` As `food_description`, `A`.`foodtypeid`, `A`.`thumbnailurl`, `A`.`promotiontype`, `A`.`price`, `A`.`userid`, `B`.`title` As `foodtype_title`, `B`.`description` As `footype_description`
FROM `FOODS` `A`
JOIN `FOODTYPES` `B` ON `A`.`foodtypeid`=`B`.`foodtypeid` 
 Execution Time:0.32201910018921

SELECT *
FROM `MENUS` 
 Execution Time:0.2980170249939

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.30101704597473

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.30101704597473

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.29601693153381

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.30901694297791

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.29501605033875

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.26301598548889

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.27501511573792

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.26301503181458

SELECT `p`.`postid`, `p`.`title`, `p`.`shortdescription`, `p`.`longdescription`, `p`.`postdate`, `p`.`thumbnailurl`, `u`.`userid`, `u`.`username`
FROM `POSTS` `p`
JOIN `USERS` `u` ON `p`.`userid` = `u`.`userid`
ORDER BY `postid` DESC 
 Execution Time:0.31501817703247

SELECT *
FROM `MENUS` 
 Execution Time:0.34701991081238

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '2' 
 Execution Time:0.32201790809631

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '3' 
 Execution Time:0.35701990127563

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '10' 
 Execution Time:0.37302088737488

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '11' 
 Execution Time:0.33001899719238

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '4' 
 Execution Time:0.29301714897156

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '5' 
 Execution Time:0.36001992225647

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '6' 
 Execution Time:0.35402083396912

SELECT `menuid`
FROM `MENUS`
WHERE `subof` = '12' 
 Execution Time:0.33501887321472

SELECT `p`.`postid`, `p`.`title`, `p`.`shortdescription`, `p`.`longdescription`, `p`.`postdate`, `p`.`thumbnailurl`, `u`.`userid`, `u`.`username`
FROM `POSTS` `p`
JOIN `USERS` `u` ON `p`.`userid` = `u`.`userid`
WHERE `p`.`title` LIKE '%%' ESCAPE '!'
ORDER BY `postid` DESC
 LIMIT 5 
 Execution Time:1.7300989627838

SELECT `foodid`, `title`, `description`, `thumbnailurl`, `promotiontype`, `price`
FROM `FOODS`
ORDER BY `foodid` DESC
 LIMIT 5 
 Execution Time:0.26601505279541

SELECT `foodtypeid`, `title`, `description`
FROM `FOODTYPES`
ORDER BY `foodtypeid` DESC
 LIMIT 5 
 Execution Time:0.32001900672913

SELECT `p`.`postid`, `p`.`title`, `p`.`shortdescription`, `p`.`longdescription`, `p`.`postdate`, `p`.`thumbnailurl`, `u`.`userid`, `u`.`username`
FROM `POSTS` `p`
JOIN `USERS` `u` ON `p`.`userid` = `u`.`userid`
WHERE `p`.`title` LIKE '%%' ESCAPE '!'
ORDER BY `postid` DESC
 LIMIT 7 
 Execution Time:0.29101586341858

SELECT `p`.`postid`, `p`.`title`, `p`.`shortdescription`, `p`.`longdescription`, `p`.`postdate`, `p`.`thumbnailurl`, `u`.`userid`, `u`.`username`
FROM `POSTS` `p`
JOIN `USERS` `u` ON `p`.`userid` = `u`.`userid`
ORDER BY `postid` DESC 
 Execution Time:0.32501792907715

