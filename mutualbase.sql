DROP DATABASE mutualbase;
CREATE DATABASE mutualbase;

USE mutualbase;

CREATE TABLE members (
	member_id INTEGER unsigned NOT NULL auto_increment,
	firstname varchar(100) default NULL,
	lastname varchar(100) default NULL,
	email varchar(100) NOT NULL default '',
	passwd varchar(60) NOT NULL default '',
	PRIMARY KEY (member_id)
) ENGINE=MyISAM;

CREATE TABLE lists (
	list_id INTEGER unsigned NOT NULL auto_increment,
	admin_id INTEGER unsigned NOT NULL default 0,
	listname varchar(100) NOT NULL default '',
	listtype varchar(20) default NULL,
	PRIMARY KEY (list_id)
) ENGINE=MyISAM;

CREATE TABLE listmembers (
	link_id INTEGER unsigned NOT NULL auto_increment,
	member_id INTEGER unsigned NOT NULL default 0,
	list_id INTEGER unsigned NOT NULL default 0,
	PRIMARY KEY (link_id)
) ENGINE=MyISAM;

CREATE TABLE categories (
	cat_id INTEGER unsigned NOT NULL auto_increment,
	list_id INTEGER unsigned NOT NULL default 0,
	catname varchar(100) NOT NULL default '',
	PRIMARY KEY (cat_id)
) ENGINE=MyISAM;

CREATE TABLE listitems (
	item_id INTEGER unsigned NOT NULL auto_increment,
	parentlist_id INTEGER unsigned NOT NULL default 0,
	user_id_add INTEGER unsigned NOT NULL default 0,
	user_id_del INTEGER unsigned default NULL,
	itemname varchar(100) NOT NULL default '',
	category varchar(100) NOT NULL default '',
	datecreate datetime default NULL,
	datedelete datetime default NULL,
	PRIMARY KEY (item_id)
) ENGINE=MyISAM;

INSERT INTO members (firstname, email, passwd) VALUES ('mAdmin', 'mAdmin@mutualist.com', MD5('Adminpass1'));

INSERT INTO lists (admin_id, listname, listtype) VALUES ('1', 'Example List', 'list');
INSERT INTO lists (admin_id, listname, listtype) VALUES ('1', 'Example Event', 'event');

INSERT INTO listmembers (member_id, list_id) VALUES ('1', '1');
INSERT INTO listmembers (member_id, list_id) VALUES ('1', '2');

INSERT INTO categories (list_id, catname) VALUES ('1', 'Produce');
INSERT INTO categories (list_id, catname) VALUES ('1', 'Meat/Dairy');
INSERT INTO categories (list_id, catname) VALUES ('1', 'Baked Goods');
INSERT INTO categories (list_id, catname) VALUES ('1', 'Dry/Canned Goods');
INSERT INTO categories (list_id, catname) VALUES ('1', 'Household Items');

INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Carrots', 'Produce');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Cucumber', 'Produce');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Apples', 'Produce');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Lemon', 'Produce');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Basil', 'Produce');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Mint', 'Produce');

INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Chicken Breast', 'Meat/Dairy');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Ground Beef', 'Meat/Dairy');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Milk', 'Meat/Dairy');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Yogurt', 'Meat/Dairy');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Butter', 'Meat/Dairy');

INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Whole Wheat Bread', 'Baked Goods');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Croissants', 'Baked Goods');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Muffins', 'Baked Goods');

INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Fettucine Noodles', 'Dry/Canned Goods');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Tomato Sauce', 'Dry/Canned Goods');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Condensed Milk', 'Dry/Canned Goods');

INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Dish Soap', 'Household Items');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Hand Soap', 'Household Items');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Toilet Paper', 'Household Items');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Garbage Bags', 'Household Items');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('1', 'Compost Bags', 'Household Items');

INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('2', 'Cookies', 'Event');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('2', 'Brownies', 'Event');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('2', 'Chips/Salsa', 'Event');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('2', 'Popcorn', 'Event');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('2', 'Pop', 'Event');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('2', 'Beer', 'Event');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('2', 'Plates', 'Event');
INSERT INTO listitems (parentlist_id, itemname, category) VALUES ('2', 'Cups', 'Event');