-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 09 月 21 日 13:38
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `lrfbeyond_demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `art`
--

CREATE TABLE `art` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 导出表中的数据 `art`
--

INSERT INTO `art` (`id`, `title`) VALUES
(1, 'jQuery+CSS实现垂直滚动效果'),
(2, 'jQuery+CSS实现的图片滚动效果'),
(3, '使用CSS和jQuery制作漂亮的下拉选项菜单'),
(4, '使用jQuery和CSS控制页面打印区域'),
(5, '使用livequery插件对动态创建的DOM元素进行事件绑定'),
(6, 'jQuery结合PHP和MySQL读取和发表评论'),
(7, '使用PHP强制下载PDF文件'),
(8, '使用CSS让DIV固定位置'),
(9, 'jQuery实现切换页面布局'),
(10, 'jQuery实现图片与文本信息切换动画效果'),
(11, 'jQuery实现无刷新切换主题皮肤功能'),
(12, 'jQuery实现列表框双向选择操作'),
(13, '使用jQuery操作Cookies'),
(14, 'jQuery+PHP+MySQL实现二级联动下拉菜单');
