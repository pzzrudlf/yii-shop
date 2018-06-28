# 基于Yii2的B2C商城
php7+yii2+mysql5.5

    类目：类目是一个树状结构的系统，大体上可以分成4-5级。如手机->智能手机->苹果手机类目，在这里面，手机是一级类目，苹果手机是三级类目，也是叶子类目。
    
    SPU：苹果6（商品聚合信息的最小单位），如手机->苹果手机->苹果6，苹果6就是SPU。
    
    SKU：土豪金 16G 苹果6 （商品的不可再分的最小单元）。

```php
composer config -g repo.packagist composer https://packagist.phpcomposer.com

composer install

php init 

php yii migrate

php yii init/admin

php yii serve -p 5000 -t @backend/web

php yii serve -p 5001 -t @frontend/web
```
# 本项目还在开发中
1. admin 
2. rbac
3. menu
4. goods
5. order
6. address
7. express
8. article
9. system setting

(yii2.0.15)[https://github.com/blacksmoke26/yii2-manual-chm/releases]




