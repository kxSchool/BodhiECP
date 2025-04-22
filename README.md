# Bodhi Economy Platform
### 电商平台孵化器  [ **[欢迎投资](http://bp.kxschool.com/kxschool-BP.pdf)** ]

> **基于BodhiEC Platform开发的电商平台_创业项目演示：** 
>-   [ **[五金汽配城-MRO集采供应链平台](http://wcpl.kxschool.com)** ] http://wcpl.kxschool.com
>-  -  服务商中心 http://shopcpl.kxschool.com
>-  -  中台系统 http://admincpl.kxschool.com
>-  -  供应商中心 http://crmcpl.kxschool.com
>-  -  APP接口 http://apicpl.kxschool.com
>-   [ **[一站式创业孵化服务平台](http://wryb.kxschool.com)** ] http://wryb.kxschool.com
>-  -  手机端H5 http://m.kxschool.com
>-  -  服务商中心 http://crm.kxschool.com
>-  -  中台系统 http://admin.kxschool.com
>-   [ **[办公楼-租赁及物业管理平台](http://wyg.kxschool.com)** ] http://wyg.kxschool.com
>-  -  手机版H5 http://myg.kxschool.com/html
>-  -  入驻企业系统 http://renteryg.kxschool.com
>-  -  资产与物业系统 http://propertyyg.kxschool.com
>-  -  办公楼商家系统 http://shopyg.kxschool.com
>-  -  中台系统 http://adminyg.kxschool.com
>-   [ **[演剧院-全景选座购票系统](http://wpm.kxschool.com)** ] http://wpm.kxschool.com
>-  -  服务商中心 http://crmpm.kxschool.com 
>-  -  网站中台 http://adminpm.kxschool.com
>-   [ **[心理咨询师-在线诊所](http://wxr.kxschool.com)** ] http://wxr.kxschool.com
>-  -  服务商中心 http://wxr.kxschool.com
>-  -  网站中台 http://adminxr.kxschool.com
>-   [ **[ 心理咨询师-模拟国考沪考APP]** ]         
>-  - 网站中台 http://adminxr.kxschool.com
>-   [ **[ 心理咨询蓝牙血糖仪游戏APP]** ]         
>-  - 网站中台 http://adminxr.kxschool.com


### 软件概述
该项目经历了15年的打磨和近10年的多行业平台定制开发沉淀积累，最大程度整合了国内近20多年的电商平台业务；主要针对中小规模企业、互联网创业公司需求，5-6人的技术团队，基于BodhiEC Platform深度开发，可以完成企业内的门户网站、电商平台、仓库管理系统、ERP、OMS、MES、等等应用软件定制开发集成，协助企业全面的数字化转型。不同于传统的闭门造车式开源电商，完全基于大投资下的互联网创业项目移植整合而来，是难得的一款务实型B2B开源电商平台。

### 软件架构
项目设为四大子项目文件目录：网站中台(admin)、服务商后台(crm)、PC网站(www)、手机端H5(m)，指定到统一的CONFIG配置文件(bodhi_config.php)，根据性能需要配置文件中可将数据库配置为读写分离模式。以轻量级CodeIgniter开源框架编写，满足了开发人员在编码过程中的MVC模式，和高性能并发的要求。
- 可根据该系统结构，作为系统基座二次开发成C2C、B2C、ERP、OMS、CRM等企业软件系统。系统为多库、读写分离模式，用户表按设定的表记录数自动切割分表读写。
- 可根据业务性能的需要，快速替换掉CodeIgniter框架，采用VUE/Python/Go/.netCore/SpringCloud重写业务逻辑，尽量减少引入第三方包库进行编码，否则技术债务会越来越大。
- 系统功能设计灵活，用户体系及权限可独立运行。业务功能自由添加，数据库可增可删，表结构的调整成本低。脚本语言不会像编译性语言项目，最简单的修改，也得整体打包发布并暂停整个服务器，非常适合创业初期的要求，创意快速落地、开发效率高。

### 安装教程

1.  PHP>=5.6
2.  MYSQL>=5.7
3.  NGINX/APACHE>=2.4
4.  [视频教程](https://space.bilibili.com/19566721)https://space.bilibili.com/19566721

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
3.  CodeIgniter [[学习资料](https://www.w3cschool.cn/codeIgniter3)]
4.  Log4php
5.  Ueditor

 - [开心学派计算机工作室](http://www.kxschool.com)  28586585@qq.com
