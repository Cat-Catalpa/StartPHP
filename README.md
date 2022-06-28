# StartPHP v0.6

欢迎使用 StartPHP v 0.6,本框架采用 MVC 架构模式开发，致力于打造出一款以轻量化、易上手、功能完善的高效 PHP 后端框架。

[框架官网](https://startphp.catcatalpa.com)
[开发文档](https://doc.startphp.catcatalpa.com)
[开源地址](https://github.com/catcatalpa/startphp)
[开源协议](https://github.com/catcatalpa/StartPHP/blob/master/LICENSE)

## 在下载本次更新前，您需要了解以下重要事项：

- **因0.6版本注重于完善和调整框架底层机制，故本版本更新日志将对所有更改详细列出。**
- **因0.6版本重构了框架大部分底层机制和运行逻辑，部分机制与以往版本有较大改变，我们建议您在学习最新的框架开发文档后再尝试基于v0.6版本的开发！**
- **StartPHP 对于 PHP 运行环境要求是 7.1 或以上**。

---

## StartPHP v0.6 更新日志如下

### 2022/6/19

- 修复了报错页面`错误位置`部分可能出现XSS反注入的危险Bug
- 修复了本地运行会因为`scandir`函数报错的Bug
- 修复了本地运行时静态资源加载路径错误的Bug
- 修复了当Url中的参数过多时程序无法正常解析控制器路径的Bug
- 修复了`config`目录移动后导致Cli工具无法正常运行的Bug
- 修复了示例页面中GitHub网址错误的Bug
- 删除了预置字体文件
- 修改了示例页面中标题`StartPHP`的字重

### 2022/6/18

- 新增模板基类文件
- `app`目录下的部分全局配置文件调整至`config`目录中
- 将配置文件目录`config`调整至框架根目录中
- 移除原系统预置模型目录，预置模型文件调整至`startphp`根目录中


### 2022/06/11

- 新增`Facade`门面机制
- 新增控制器基类文件
- 新增全局错误日志文件
- 新增类库别名匹配机制
- 新增日志输出保存机制
- 新增生命周期钩子`Hook`机制
- 新增全局依赖目录配置文件
- 新增反XSS注入安全保护机制
- 新增PHP-Cli控制台命令（0.5版本已同步更新此机制）
- 报错页面支持显示具体错误内容
- `全局依赖目录`更名为`容器`
- ORM初始化与数据库连接函数解耦合
- 重写了底层控制器与视图模板运行逻辑
- 重构了系统底层MVC架构和大部分运行流程
- 该版本之后所有的视图模板和模型都由控制器负责管理
- 应用可直接覆盖系统全局设置（部分优先度高的变量除外）
- 所有系统文件全部更换为大写开头命名格式
- 所有应用文件夹全部更换为大写开头命名格式
- 简化了错误捕获机制手动调用所需传递的变量
- 错误捕获机制自适应多语言系统输出错误信息
- 运行报错后可将错误日志保存至PHP错误日志中
- 运行报错后可将错误日志发送至指定的邮箱账号中
- 全局入口文件`index.php`被转至public目录中
- 视图文件`View.php`被转至startphp/core目录中
- 路由文件`Router.php`调整至startphp/core目录中
- 修复了直接访问静态资源文件目录时报错的Bug
- 部分重要系统文件将由引导启动项统一引入和管理
- 将部分必要机制文件和类库整理归入不同文件负责引入
- 删减了部分冗杂代码和删除了各类库间多余的变量传递
- 删除错误报错页面`错误原因`的模块
- 框架的各项规范更加符合`PSR`系列标准中的规定
- 优化系统运行流畅度
- 修复其他部分已知Bug

## 正在开发/完善：

- 更加完善的`Session`和`Cookie`存储机制
- 处理请求与响应
- 更加安全的验证机制

<<<<<<< Updated upstream
=======
<<<<<<< HEAD
<<<<<<< HEAD
## StartPHP目录结构：
=======
=======
>>>>>>> 92e98cfec657c1d7285b3ab65c592cd24525c783
>>>>>>> Stashed changes
=======
> StartPHP目录结构：
>>>>>>> 92e98cfec657c1d7285b3ab65c592cd24525c783

```
根目录
├─app                   应用目录
│  ├─index              示例应用目录
│  │  ├─index.php       页面文件
│  │  └─controller      controller文件目录
│  │
│  ├─index.php          应用独立入口文件实例
│  ├─hook.php           行为拓展配置文件
│  └─env.php            全局配置变量文件
│
├─model                 模型目录
│
├─public                静态资源目录
│   ├─static            静态资源存储目录
│   │  ├─css            CSS文件目录
│   │  ├─fonts.php      字体文件目录
│   │  └─···            其他资源目录
│   ├─favicon.ico       标签缩略图片
│   └─index.php         框架入口文件
│
├─startphp              框架系统目录
│  ├─cache              缓存文件目录
│  │  └─Error.log       运行错误信息存储文件
│  │
│  ├─config             配置文件目录
│  │  ├─config.php      系统基础配置文件
│  │  ├─entrance.php    指定应用入口文件
│  │  └─database.php    数据库配置文件
│  │
│  ├─core               系统核心目录
│  │  ├─boot.php        启动引导文件
│  │  ├─view.php        视图渲染文件
│  │  ├─router.php      路由解析文件
│  │  ├─helper.php      框架函数全局化文件
│  │  └─database.php    对象关系映射核心文件
│  │
│  ├─languages          系统语言目录
│  │  └─zh-cn           中文语言包文件
│  │
│  └─premodel           预置模型目录
│     ├─error.php       错误捕获文件
│     ├─autoload.php    自动加载文件
│     ├─facade.php      门面机制文件
│     ├─parsefile.php   页面路由文件
│     ├─parseurl.php    网址解析文件
│     ├─hook.php        行为拓展文件
│     ├─throwerr.php    异常抛出文件
│     ├─antixss.php     反XSS注入文件
│     ├─controller.php  控制器基类文件
│     ├─aredirect.php   重定向配置文件
│     ├─session.php     Session操作文件
│     ├─cache.php       日志缓存输出文件
│     ├─dependvars.php  全局依赖目录文件
│     └─devdebug.php    调试模式信息输出文件
│
├─README.md             README文件
<<<<<<< HEAD
├─.htaccess             apache伪静态规则文件
└─LICENSE               Apache2.0开源协议文件
=======
├─LICENSE               Apache2.0开源协议文件
└─index.php             框架入口文件
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
>>>>>>> 92e98cfec657c1d7285b3ab65c592cd24525c783
=======
>>>>>>> 92e98cfec657c1d7285b3ab65c592cd24525c783
>>>>>>> Stashed changes
```

## StartPHP在经授权后使用了以下项目的部分或全部代码用于实现框架部分功能

|   项目名   |    作者    |  开源协议  |            开源地址            |  代码用途  |      使用程度     |
|------------|:-----------:|:----------:|:------------------------------:|:----------:|:-----------------:|


