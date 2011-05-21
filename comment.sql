CREATE TABLE `COMMENT` (
`comment_id`  int(11) NOT NULL AUTO_INCREMENT ,
`comment_item_id`  int(11) NOT NULL  ,
`email`  varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`site`  varchar(200) CHARACTER SET utf8 COLLATE utf8_icelandic_ci NULL DEFAULT NULL ,
`comment`  varchar(4000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`add_date`  timestamp NULL DEFAULT NULL ,
PRIMARY KEY (`comment_id`),
INDEX `I_EMAIL` USING BTREE (`email`) ,
INDEX `I_ADD_DATE` USING BTREE (`add_date`) 
INDEX `I_COMMENT_ITEM_ID` USING BTREE (`comment_item_id`) 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=233
ROW_FORMAT=COMPACT
;