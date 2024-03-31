# Bodhi E-Commerce(菩提大电商)

- - 基于BodhiEC开发的三种商业模式实施项目演示
- -  [ **[一站式创业孵化服务平台](http://wryb.kxschool.com)** ] http://wyrb.kxschool.com  
- - -  手机版 http://m.kxschool.com 
- - -  服务商中心 http://crm.kxschool.com 
- - -  网站中台 http://admin.kxschool.com
- -  [ **[汽配城-MRO集采供应链平台](http://www.kxschool.com)** ] http://wchepeilong.kxschool.com
- -  [ **[办公楼-租赁及物业管理平台](http://www.kxschool.com)** ] http://wygoffice.kxschool.com
- -  [ **[心理咨询师-在线诊所](http://www.kxschool.com)** ] http://wxr.kxschool.com
- -  [ **[演剧院-在线选座购票系统](http://www.kxschool.com)** ] http://wpm.kxschool.com

### 软件架构
项目设为四大子项目文件目录：网站中台(admin)、服务商后台(crm)、PC网站(www)、手机端H5(m)，指定到统一的CONFIG配置文件(bodhi_config.php)，根据性能需要配置文件中可将数据库配置为读写分离模式。以轻量级CodeIgniter开源框架编写，满足了开发人员在编码过程中的MVC模式，和高性能并发的要求。
- 可根据该系统结构，作为系统基座二次开发成B2C、ERP、OA、CRM等企业软件系统。系统为多库、读写分离模式，用户表按设定的表记录数自动切割分表读写。
- 可根据业务性能的需要，快速替换掉CodeIgniter框架，采用VUE/Python/Go/.netCore/SpringCloud重写业务逻辑。
- 系统功能设计灵活，用户体系及权限可独立运行。业务功能自由添加，数据库可增可删，表结构的调整成本低。脚本语言不会像编译性语言项目，最简单的修改，也得整体打包发布并暂停整个服务器，非常适合创业初期的要求，创意快速落地、开发效率高。

### 安装教程

1.  PHP
2.  MYSQL
3.  APACHE/NGINX

### 使用说明

1.  基于docker容器的一键安装
2.  基于宝塔环境安装
3.  基于LAMP/LNMP环境安装
4.  基于WAMP环境安装
5.  基于虚拟机【VMWARE/宝塔/LNMP】环境安装( **推荐** )
6.  买家账号：15371715719 密码：111111；服务商铺号：241 服务商账号：admin 密码：111111；中台账号：admin 密码：111111；

### 参与贡献

1.  Bootstrap
2.  Jquery
3.  CodeIgniter
4.  Log4php
5.  Ueditor

 - [大牛计算机工作室](http://www.kxschool.com)  28586585@qq.com
