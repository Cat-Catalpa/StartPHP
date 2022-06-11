## StartPHP v0.5

欢迎使用 StartPHP v0.5,本框架采用 MVC 架构模式开发，致力于打造出一款以轻量化、易上手、功能完善的高效 PHP 后端框架。

---

> StartPHP 对于 PHP 运行环境要求是 7.1 或以上。

[框架官网](https://startphp.catcatalpa.com)
[开发文档](https://doc.startphp.catcatalpa.com)
[开源地址](https://github.com/catcatalpa/startphp)
[开源协议](https://github.com/catcatalpa/StartPHP/blob/master/LICENSE)

> StartPHP v0.5 的更新日志如下：

- 新增Session操作机制
- 新增多语言输出模式
- 新增调试模式及系统信息输出功能
- 新增重定向与页面回退操作函数
- 取消了模型和控制器命名规范的前后缀格式
- 可控制是否在框架初始化时连接数据库
- 简化了部分数据库操作函数的调用逻辑
- 前端初始示例页面UI排版整改
- 前端调用系统文件支持传入参数
- 调整了部分文件的目录关系
- 修复了在保留预置数据库配置的情况下框架初始化会报错的Bug
- 修复其他部分已知Bug

> 正在开发/完善：

- 全面完善模板引擎解析机制
- 全面完善ORM对象关系映射机制
- Redis机制
- 处理请求与响应
- 支持生成与记录错误日志
- 更加安全的验证机制

=======
> StartPHP目录结构：

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
├─node                  cli工具配置目录
│  └─bin                配置文件目录【禁止修改】
│
├─public                静态资源存储目录
│
├─startphp              框架系统目录
│  ├─cache              缓存文件目录
│  │
│  ├─config             配置文件目录
│  │  ├─config.php      系统基础配置文件
│  │  ├─entrance.php    指定应用入口文件
│  │  └─database.php    数据库配置文件
│  │
│  ├─core               系统核心目录
│  │  ├─boot.php        启动引导文件
│  │  ├─database.php    对象关系映射核心文件
│  │  ├─helper.php      框架函数全局化文件
│  │  └─router.php      路由解析文件
│  │
│  └─premodel           预装模型目录
│     ├─error.php       错误捕捉文件
│     ├─autoload.php    自动加载文件
│     ├─view.php        视图渲染文件
│     ├─parsefile.php   页面路由文件
│     ├─parseurl.php    网址解析文件
│     ├─hook.php        行为拓展文件
│     ├─throwerr.php    异常抛出文件
│     ├─session.php     Session操作文件
│     └─devdebug.php    调试模式信息输出文件
│
├─robots.txt            爬虫检索协议
├─.htaccess             apache伪静态规则文件
├─.user.ini             php防跨站配置文件
├─README.md             README文件
├─LICENSE               Apache2.0开源协议文件
└─index.php             框架入口文件
```

> StartPHP在经授权后使用了以下项目的部分或全部代码用于实现框架部分功能

|   项目名   |    作者    |  开源协议  |            开源地址            |  代码用途  |      使用程度     |
|------------|-----------:|:----------:|:------------------------------:|:----------:|:-----------------:|


