## StartPHP v0.4

欢迎使用 StartPHP,本框架采用 MVC 架构模式开发，致力于打造出一款以轻量化、易上手、功能完善的高效 PHP 后端框架。

---

> StartPHP 对于 PHP 运行环境要求是 7.0 或以上

[框架官网](https://startphp.catcatalpa.com)
[框架下载](https://startphp.catcatalpa.com/download)
[开源地址](https://github.com/catcatalpa/startphp)
[开源协议](https://github.com/catcatalpa/StartPHP/blob/master/LICENSE)

> StartPHP v0.4 的更新日志如下：

- 新增对象关系映射系统
- 新增全局配置变量文件
- 新增静态资源存储目录
- 支持自定义应用入口文件
- 支持在前端引入框架文件
- 完善了模板引擎解析机制
- 优化了环境变量引用机制
- 优化了错误异常捕获机制
- 全新的前端报错页面样式
- 全新的前端模板示例样式
- 页面可引入多个框架文件
- 框架官网和文档网站上线
- 开源协议由MIT变更为Apache2.0
- 全面引入并完善命名空间调用机制与命名规则
- 修复特点场景下Model文件调用错误的Bug
- 修复前端模板无法调用部分已定义变量的Bug
- 修复了前端模板在移动端设备显示时自适应样式错误的Bug
- 修复其他部分已知Bug

> 正在开发/完善：

- 全面完善模板引擎解析机制
- 全面完善ORM对象关系映射机制
- 前端调用系统文件支持传入参数
- Session操作
- Redis机制
- 处理请求与接受响应
- 支持多语言
- 支持生成与记录错误日志
- 更加安全的验证机制
- 生命周期钩子机制(Hook)

> StartPHP目录结构：

根目录
├─app                   应用目录
│  └─index              示例应用目录
│     ├─index.php       页面文件
│     └─controller      controller文件目录 
│
├─model                 模型目录
│
├─node                  cli工具配置目录
│  └─bin                配置文件目录【禁止修改】
│
├─node                  cli工具配置目录
│
├─public                静态资源存储目录
│
├─startphp              框架系统目录
│  ├─cache              缓存文件目录
│  ├─config             配置文件目录
│  │  ├─config.php      系统基础配置文件
│  │  ├─entrance.php    指定应用入口文件
│  │  ├─vars.php        环境变量配置文件
│  │  └─env.php         全局配置变量文件
│  │
│  ├─core               系统核心目录
│  │  ├─boot.php        启动引导文件
│  │  └─router.php      路由解析文件
│  └─premodel           预装模型目录
│     ├─error.php       错误捕捉文件
│     ├─parsefile.php   页面路由文件
│     ├─parseurl.php    网址解析文件
│     └─view.php        视图渲染文件
│
├─vender                第三方依赖目录
│
├─robots.txt            爬虫检索协议
├─.htaccess             apache伪静态规则文件
├─.user.ini             php防跨站配置文件
├─README.md             README文件
├─LICENSE               Apache2.0开源协议文件
└─index.php             框架入口文件

> StartPHP在经授权后使用了以下项目的部分或全部代码用于实现框架部分功能

|   项目名   |    作者    |  开源协议  |            开源地址            |  代码用途  |      使用程度     |
|------------|-----------:|:----------:|:------------------------------:|:----------:|:-----------------:|
|    Medoo   | Angel Lai  |    MIT     |https://github.com/catfan/Medoo/|对象关系映射|提供ORM系统实现思路|


