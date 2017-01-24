
# hit-spy
计划做一个计数器，用于各类渠道统计访问量。
<a href="https://yingou.net">
<img src="https://hit.yingou.net/image/s.jpg" />
</a>
#FBI WARNING
##项目已废弃
+ github上自带图床，不再支持外部图片
+ https趋势之后，外联图片这件事会越来越谨慎吧
+ 毕竟这是个偷取header信息的项目

##项目初衷
在任何可以插入外链图片的地方插入一个图片。背后调用接口请求 Google Analytics，统计用户的访问数据。
优点：  
+ 避免adblock屏蔽直接使用统计脚本。
+ 图片可实际展示图片，不被发现这是统计脚本
+ Google Analytics 专业好用，不需要再去做统计报表之类的。（如果不想用也可以直接根据log分析。
+ 应用场景广泛， 邮件是否已读，某些不访问量统计的地方。

留着Repo，是提供一种思路。本来是想调通了之后，好好规划下成为一个方便配置，方便统计数据的工具。

###使用方法
新建一个配置 继承Config，覆盖里面的方法


```php
<?php

class ImageConfig extends Config
{
    public $analyticsTrackingId='';
}
```

实际访问 ／**image**／xxx.jpg 第一个目录对应Config类名 ImageConfig ，后面的参数可以自己写逻辑给google的内容