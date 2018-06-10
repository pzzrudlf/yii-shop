DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `cat_id` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '分类id',
  `extend_cat_id` int(11) DEFAULT 0 COMMENT '扩展分类id',
  `goods_sn` varchar(60) NOT NULL DEFAULT '' COMMENT '商品编号',
  `goods_name` varchar(120) NOT NULL DEFAULT '' COMMENT '商品名称',
  `click_count` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '点击数',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '品牌id',
  `store_count` smallint(5) unsigned NOT NULL DEFAULT 10 COMMENT '库存数量',
  `comment_count` smallint(5) DEFAULT 0 COMMENT '商品评论数',
  `weight` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '商品重量克为单位',
  `volume` double(10,4) unsigned NOT NULL DEFAULT 0.0000 COMMENT '商品体积。单位立方米',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT 0.00 COMMENT '市场价',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT 0.00 COMMENT '本店价',
  `cost_price` decimal(10,2) DEFAULT 0.00 COMMENT '商品成本价',
  `price_ladder` text DEFAULT NULL COMMENT '价格阶梯',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '商品关键词',
  `goods_remark` varchar(255) NOT NULL DEFAULT '' COMMENT '商品简单描述',
  `goods_content` text DEFAULT NULL COMMENT '商品详细描述',
  `mobile_content` text DEFAULT NULL COMMENT '手机端商品详情',
  `original_img` varchar(255) NOT NULL DEFAULT '' COMMENT '商品上传原始图',
  `is_virtual` tinyint(3) unsigned NOT NULL DEFAULT 0 COMMENT '是否为虚拟商品 1是，0否',
  `virtual_indate` int(11) DEFAULT 0 COMMENT '虚拟商品有效期',
  `virtual_limit` smallint(6) DEFAULT 0 COMMENT '虚拟商品购买上限',
  `virtual_refund` tinyint(1) DEFAULT 1 COMMENT '是否允许过期退款， 1是，0否',
  `is_on_sale` tinyint(1) unsigned NOT NULL DEFAULT 1 COMMENT '是否上架',
  `is_free_shipping` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否包邮0否1是',
  `on_time` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '商品上架时间',
  `sort` smallint(4) unsigned NOT NULL DEFAULT 50 COMMENT '商品排序',
  `is_recommend` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否推荐',
  `is_new` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '是否新品',
  `is_hot` tinyint(1) DEFAULT 0 COMMENT '是否热卖',
  `last_update` int(10) unsigned NOT NULL DEFAULT 0 COMMENT '最后更新时间',
  `goods_type` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '商品所属类型id，取值表goods_type的cat_id',
  `spec_type` smallint(5) DEFAULT 0 COMMENT '商品规格类型，取值表goods_type的cat_id',
  `give_integral` mediumint(8) unsigned NOT NULL DEFAULT 0 COMMENT '购买商品赠送积分',
  `exchange_integral` int(10) NOT NULL DEFAULT 0 COMMENT '积分兑换：0不参与积分兑换，积分和现金的兑换比例见后台配置',
  `suppliers_id` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '供货商ID',
  `sales_sum` int(11) DEFAULT 0 COMMENT '商品销量',
  `prom_type` tinyint(1) DEFAULT 0 COMMENT '0默认1抢购2团购3优惠促销4预售5虚拟(5其实没用)6拼团',
  `prom_id` int(11) NOT NULL DEFAULT 0 COMMENT '优惠活动id',
  `commission` decimal(10,2) DEFAULT 0.00 COMMENT '佣金用于分销分成',
  `spu` varchar(128) DEFAULT '' COMMENT 'SPU',
  `sku` varchar(128) DEFAULT '' COMMENT 'SKU',
  `template_id` int(11) unsigned DEFAULT 0 COMMENT '运费模板ID',
  `video` varchar(255) DEFAULT '' COMMENT '视频',
  PRIMARY KEY (`goods_id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `cat_id` (`cat_id`),
  KEY `last_update` (`last_update`),
  KEY `brand_id` (`brand_id`),
  KEY `goods_number` (`store_count`),
  KEY `goods_weight` (`weight`),
  KEY `sort_order` (`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品表';


DROP TABLE IF EXISTS `goods_attribute`;
CREATE TABLE `goods_attribute` (
  `attr_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '属性id',
  `attr_name` varchar(60) NOT NULL DEFAULT '' COMMENT '属性名称',
  `type_id` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '属性分类id',
  `attr_index` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '0不需要检索 1关键字检索 2范围检索',
  `attr_type` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT '0唯一属性 1单选属性 2复选属性',
  `attr_input_type` tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT ' 0 手工录入 1从列表中选择 2多行文本框',
  `attr_values` text NOT NULL COMMENT '可选值列表',
  `order` tinyint(3) unsigned NOT NULL DEFAULT 50 COMMENT '属性排序',
  PRIMARY KEY (`attr_id`),
  KEY `cat_id` (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品模型属性表(生产日期等)';


DROP TABLE IF EXISTS `goods_attr_by_spu`;
CREATE TABLE `goods_attr_by_spu` (
  `goods_attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性id自增',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT 0 COMMENT '商品id',
  `attr_id` smallint(5) unsigned NOT NULL DEFAULT 0 COMMENT '属性id',
  `attr_value` text NOT NULL COMMENT '属性值',
  `attr_price` varchar(255) NOT NULL DEFAULT '' COMMENT '属性价格',
  PRIMARY KEY (`goods_attr_id`),
  KEY `goods_id` (`goods_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品属性表(跟商品模型属性表关联)';

DROP TABLE IF EXISTS `goods_spec_detail`;
CREATE TABLE `goods_spec_detail` (
  `item_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品规格id',
  `goods_id` int(11) DEFAULT 0 COMMENT '商品id',
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '规格键名',
  `key_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '规格键名中文',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `store_count` int(11) unsigned DEFAULT 10 COMMENT '库存数量',
  `bar_code` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '' COMMENT '商品条形码',
  `sku` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '' COMMENT 'SKU',
  `spec_img` varchar(255) DEFAULT NULL COMMENT '规格商品主图',
  `prom_id` int(10) DEFAULT 0 COMMENT '活动id',
  `prom_type` tinyint(2) DEFAULT 0 COMMENT '参加活动类型',
  PRIMARY KEY (`item_id`),
  KEY `key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品sku规格表，与商品id关联，与规格表笛卡尔积';


