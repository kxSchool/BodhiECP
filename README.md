# BodhiEC Platform(菩提电商平台)
### 菩提电商平台
 - **[针对企业数字化转型，快速搭建成熟的多商户电商平台](http://www.kxschool.com)**  _适用于企业项目深度开发，只需项目负责人、UI、前端、后端，四人即可快速开发运营，大幅降低团队要求，搭建可靠的企业数字化系统,为适应当前的平台经济而生。非常适合在当下经济环境低落的阶段，项目0-1快速构建运营。我们提供的是一套符合企业发展规律的数字化转型方案，是一种企业软件工程思想，项目建立在为企业赋能的理念上，着力于技术架构的设计：企业项目的特点是成本控制、用户数据、权限流程、客户维护及订单库存管理。_ 
 - **[平台经济的三大电商交易模式](http://www.kxschool.com)**  _默认模式为平台统一管理商品和发布上架，各地方供应商只能报价；第二种模式为平台只负责订单及收款，供应商自由发布商品，平台定期与供应商进行采购结算；第三种模式为平台以竞标合同为订单主体，供应商只能报价和发物流，平台按合同限定的应收应付条款，定期自动财务结算。_ 

- [ **如您希望降低项目风险，欢迎与我们团队合作** ](http://www.kxschool.com)** _该项目吸收了国内外各大知名开源电商的优缺点，开发语言及技术框架的选型；我们希望打造一款适合国内企业的高效B2B电子商务开源项目，降低组建IT团队的成本和快速开发、项目立现。_ 
- [ **欢迎各界友商参与投资合作** ](http://www.kxschool.com) _默认模式为平台统一管理商品和发布上架，各地方供应商只能报价；第二种模式为平台只负责订单及收款，供应商自由发布商品，平台定期与供应商进行采购结算；第三种模式为平台以竞标合同为订单主体，供应商只能报价和发物流，平台按合同限定的应收应付条款，定期自动财务结算。_ 
### 项目适用
- 该项目主要针对中小规模企业、互联网创业公司需求，5-6人的技术团队，基于BodhiEC Platform深度开发，可以完成企业内的门户网站、电商平台、仓库管理系统、ERP、OA、MES、等等应用软件定制开发集成，协助企业全面的数字化应用。

> **基于BodhiEC Platform开发的电子商务平台_创业项目演示：** 
>-   [ **[五金汽配城-MRO集采供应链平台](http://wcpl.kxschool.com)** ] http://wcpl.kxschool.com
>-  -  服务商中心 http://shopcpl.kxschool.com
>-  -  网站中台 http://admincpl.kxschool.com
>-   [ **[一站式创业孵化服务平台](http://wryb.kxschool.com)** ] http://wryb.kxschool.com
>-  -  手机版 http://m.kxschool.com
>-  -  服务商中心 http://crm.kxschool.com 
>-  -  中台系统 http://admin.kxschool.com 
>-   [ **[办公楼-租赁及物业管理平台](http://wyg.kxschool.com)** ] http://wyg.kxschool.com
>-  -  手机版 http://myg.kxschool.com/html 
>-  -  服务商中心 http://propertyyg.kxschool.com 
>-  -  入驻公司 http://renteryg.kxschool.com 
>-  -  网站中台 http://adminyg.kxschool.com
>-   [ **[心理咨询师-在线诊所](http://wxr.kxschool.com)** ] http://wxr.kxschool.com
>-  -  服务商中心 http://wxr.kxschool.com
>-  -  网站中台 http://adminxr.kxschool.com
>-   [ **[演剧院-全景选座购票系统](http://wpm.kxschool.com)** ] http://wpm.kxschool.com
>-  -  服务商中心 http://crmpm.kxschool.com 
>-  -  网站中台 http://adminpm.kxschool.com
>-   [ **[ 心理咨询师-模拟国考沪考APP]** ]         
>-  - 网站中台 http://adminxr.kxschool.com
>-   [ **[ 心理咨询蓝牙血糖仪游戏APP]** ]         
>-  - 网站中台 http://adminxr.kxschool.com



### 软件架构
项目设为四大子项目文件目录：网站中台(admin)、服务商后台(crm)、PC网站(www)、手机端H5(m)，指定到统一的CONFIG配置文件(bodhi_config.php)，根据性能需要配置文件中可将数据库配置为读写分离模式。以轻量级CodeIgniter开源框架编写，满足了开发人员在编码过程中的MVC模式，和高性能并发的要求。
- 可根据该系统结构，作为系统基座二次开发成C2C、B2C、ERP、OMS、CRM等企业软件系统。系统为多库、读写分离模式，用户表按设定的表记录数自动切割分表读写。
- 可根据业务性能的需要，快速替换掉CodeIgniter框架，采用VUE/Python/Go/.netCore/SpringCloud重写业务逻辑，尽量减少引入第三方包库进行编码，否则技术债务会越来越大。
- 系统功能设计灵活，用户体系及权限可独立运行。业务功能自由添加，数据库可增可删，表结构的调整成本低。脚本语言不会像编译性语言项目，最简单的修改，也得整体打包发布并暂停整个服务器，非常适合创业初期的要求，创意快速落地、开发效率高。

### 安装教程

1.  PHP<=5.6
2.  MYSQL<=5.7
3.  NGINX/APACHE<=2.4
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
