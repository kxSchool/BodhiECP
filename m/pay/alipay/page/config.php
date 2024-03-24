<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2018051960109976",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEArDC9upmenCoeRF30MPGK06xW0rldV0Ja1F7kpDnhyGzH7avOwNMR/VuKwXY49kCjBe456HwVzDnipyCdLZXumdncxpTJqR2FdoS+kyywCpmYOHBTkL4bwO6ocQlRJKM8nZgXmS09mRsgZA5mlyXwDXLwEs0E4121jTaEPT5GemzFGzwcrn0zDigTQYlIOzrk4gH1uMxYLA2+psPTniN4HXCRkZwJdEjx5v88yF8dh6f+JgppsjMciXsmJb65znNpIcpeYSex9LZGtU8mcFxqKgBYk3frit9/IysxHSbH6pAIQeZA2PdY3YSihlJcxpY2FKYBYSEEn6cdAvVgSvuAfQIDAQABAoIBADQeiL87knvYb9Ln0WsjIY9SofEktHEeH5oaowBmmMXuz1FMaMeK2+4hUE2guDspc27vHc4WCQ8JEmbeA1VyBYfCHwZosOWkjupB4eFwbFS5Cw9CSLkOIh5y3r9gP5RkaIuXJsVxoSx/vn0qsrjbfd7ERJCcR/d+PN7ieoKDIBgb5tOf6UQwh9ZvnZ2gC3oXnZZ+LJd0mdPf3XN3E3eB1HM7HLkf2xOwWJADT8n5hDkfIoFLbfFgpDAErQcE0MdqaZLGVHQecBw/m7jRh492MoFb/1z8Xx+ir6BLe8gYP18A2YwQu/HXKfzIAS06HAjC72iVb183vBP0MT7u3wsLNoECgYEA4ldx5Ngj0475njaYlZlUXemzodf5dJfGNzZVjZ0j22W0Em3ZWX5iAcgOHMK68o6d/Ef7ZGJMp+6AyZsTZfNpH8QcIVsX9uKutUlqGjyf3HAEOLcGosBLDlCNFpGmpnaK+cxKGiMEkF29/81J5C6BRk04fKHRUFyEnINtjdeFzx0CgYEAwsDP7HGnEyMmGA7NohLEmohlNRqpjM/DaiCUYiExbT0hP3mzle/K4P3KRSjRHTHbIKqh5DnJPmh0ulCL3gqRRl6ZH1/r7cdnDch8ckGgKaPBcr0Fltd8y4iQ9xmPcW+uRmQ8aFbMDpZ9N/faD4jhP8wdSaIXt7mP5YStnyQg2OECgYEAs3cae5VVct2e1u/7NEMLPhubruwMg4IETKrsUwkR8VhG24X2HJu1Iix55BwTF1g1tF9u2T2IAm999lzbmK7T37gjhd8wtTUvydaYJo2DQ8odzspwnINT/9mmxQpf1QWRVFfDOc4iREXP7Q/dUuv83L1F2KyFxu5Ux7T+HMWS95ECgYEAgowzFKD+yPJHx9qsdxczmQ8TIKzVuOFQceSS8tCjTEGs9trCyiAqk/Ur0H5S5soTxGr9CHq/7sigboAtsdLNnSkuZXysLwD6kJ+y4/gfv6nYs+wHQh0Ct4C9BBarM/QUE3V/lMWSFblFCO5oyv8LVvOhMkmosmx+C/GLXOEf76ECgYBk/G6y2kHf0UluOK3mv3JYO4s8yvx7sOj82TLPZL1uSQzB0/XiWV4Zf7vx+8jde1619+/yHCAmX3eW2KiuQtgo9P3un9vzm4RUAwCpcEPTIhbC1f6pn3dYIyoweQQMy2P5hN5XZomDcOAspQQurEv1QZIb+QmX5ULXOY35f9EXvg==",
		
		//异步通知地址
		'notify_url' => "http://www.kxschool.com/page/alipay/page/notify_url.php",
		
		//同步跳转
		'return_url' => "http://www.kxschool.com/page/alipay/page/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAoJRB3RQVUpyqO5tEL1O0GKHHZtbYrzdmBt/+BX7GSBtyK4m0XLD8IbzUurpsoAH7mnb7G/bTZoiYE7JlkxTSuyjZVG/4buroH99fpKJhdIYNjDUODBjCaa9/j97Z4FKT3oLt9H/b5zgoXiDsCc2JqR6akVZ+tIpzTA35BTABZSKdDUgZzbrzRbeTWkT6KnEHGiqrYrfBNAAKmiE1pNM/NoKJX4mI70RIku9GeoUdccIgnlFSXH3RCfboqOI+F9B0ZiPY2Z6amU5Q5M31Eu4NSIL+CIOqis79J5V4VwpRMo0q7E/TYyWCMUcelL9pttGuk5FUFIIabivmMFIUG0m7bwIDAQAB",
);