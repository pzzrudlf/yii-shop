# 基于Yii2的B2C商城

    类目：类目是一个树状结构的系统，大体上可以分成4-5级。如手机->智能手机->苹果手机类目，在这里面，手机是一级类目，苹果手机是三级类目，也是叶子类目。
    
    SPU：苹果6（商品聚合信息的最小单位），如手机->苹果手机->苹果6，苹果6就是SPU。
    
    SKU：土豪金 16G 苹果6 （商品的不可再分的最小单元）。


@author pzzrudlf <pzzrudlf@gmail.com>
```php
composer config repo.packagist composer https://packagist.phpcomposer.com

composer install

php init 

php yii migrate

php yii init/admin
```
goods
--
goods_spec
--
goods_attr
--
goods_attr_value
--
to do
1. rbac 
2. menu
3. admin
4. goods
5. article
6. pay
7. express
8. area
9. system setting



