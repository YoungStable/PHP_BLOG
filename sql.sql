create table bg_Admin(
    admin_id tinyint unsigned primary key auto_increment,
    admin_name varchar(20) not null unique key,
    admin_pass char(32) not null,
    login_ip varchar(30) not null,
    login_nums int unsigned not null default 0,
    login_time int unsigned not null
);

create table bg_Category(
    cate_id smallint unsigned primary key auto_increment,
    cate_name varchar(20) not null unique key,
    cate_pid smallint unsigned not null,
    cate_sort smallint  not null,
    cate_desc varchar(255) 
);

insert into bg_category values
	(1, '慢生活', 0, 1, '慢生活有益健康'),
	(2, '日记', 1, 1, '我的点点滴滴'),
	(3, '欣赏', 1, 2, '请大家随便看看'),
	(4, '程序人生', 1, 3, '程序人生很苦逼'),
	(5, '经典语录', 1, 4, '哥的经典语录'),
	(6, 'PHP课堂', 0, 2, 'PHP相关知识'),
	(7, 'HTML', 6, 1, 'web开发入门知识');


create table bg_article(
    art_id smallint unsigned primary key auto_increment,
    cate_id smallint unsigned not null comment '文章所属分类',
    title varchar(50) not null comment '文章标题',
    thumb varchar(100) not null default 'default.jpg',
    art_desc varchar(255) comment '文章描述',
    content text not null comment '文章内容',
    author varchar(20) not null comment '文章作者',
    hits smallint unsigned not null default 0 comment '点击次数',
    addtime int unsigned not null comment '添加时间',
    is_del enum('0','1') not null default '0' comment '是否删除'
);

alter table bg_article add is_recommend enum('0','1') not null default '0' after addtime;

create table bg_master (
    id tinyint primary key auto_increment,
    nickname varchar(20) not null,
    job varchar(20) not null,
    home varchar(50) not null,
    tel char(11) not null,
    email varchar(50) not null
);

insert into bg_master values(null, 'WangX','PHP','WenZhou','88888888','123456678@gmail.com');

create table bg_singlePage(
    page_id tinyint unsigned primary key auto_increment,
    title varchar(50) not null,
    content text
);

create table bg_user(
    user_id smallint unsigned primary key auto_increment,
    user_name varchar(20) not null unique key,
    user_pwd char(32) not null,
    user_image varchar(100) not null default 'default.jpg',
    user_regtime int unsigned not null  
);

create table bg_comment(
    cmt_id smallint unsigned primary key auto_increment,
    art_id smallint unsigned not null,
    cmt_user varchar(20) not null,
    cmt_content text not null,
    cmt_time int unsigned not null
);

alter table bg_article add reply_nums int unsigned not null default 0 after hits;