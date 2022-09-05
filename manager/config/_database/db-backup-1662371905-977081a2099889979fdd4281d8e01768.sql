DROP TABLE IF EXISTS djfk_achievements;

CREATE TABLE `djfk_achievements` (
  `achiveid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL DEFAULT '0',
  `lastscore` char(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`achiveid`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS djfk_assignment_submissions;

CREATE TABLE `djfk_assignment_submissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `subject` text,
  `assignment_brief` text,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO djfk_assignment_submissions VALUES("9","5","9","test","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel odio sed turpis maximus blandit quis a orci. Cras libero velit, tincidunt non dapibus tincidunt, ultricies sit amet ante. Sed massa magna, dignissim at cursus gravida, lacinia et arcu. Morbi volutpat mauris ac blandit ultrices. Aenean mattis ex vel lacinia molestie. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti. Maecenas congue elementum lectus, nec commodo me","2019-08-08 23:54:23");



DROP TABLE IF EXISTS djfk_assignment_uploads;

CREATE TABLE `djfk_assignment_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_sub_id` int(11) NOT NULL,
  `file_address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO djfk_assignment_uploads VALUES("4","9","1251821811_644449-996188.jpg"),
("5","9","ACT-MIT-Contract-996188.pdf");



DROP TABLE IF EXISTS djfk_assignments;

CREATE TABLE `djfk_assignments` (
  `assignment_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `assignment_questions` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`assignment_id`),
  UNIQUE KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS djfk_course;

CREATE TABLE `djfk_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_number` int(11) NOT NULL,
  `course_title` char(200) DEFAULT NULL,
  `course_summary` char(200) DEFAULT NULL,
  `course_banner` char(200) DEFAULT NULL,
  `course_brief` longtext,
  `course_notes` varchar(500) DEFAULT NULL,
  `course_notes_reference_brief` varchar(500) DEFAULT NULL,
  `course_reference_links` varchar(1000) DEFAULT NULL,
  `course_video` varchar(500) DEFAULT NULL,
  `course_embedded_video` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_number` (`course_number`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO djfk_course VALUES("19","2","Self Awareness","","img18.jpg","||/~Objective/~<p>By the end of this session you will be able to:</p>
("20","3","Body Changes at Puberty","","img12.jpg","||/~Objectives/~<p>The objectives of this module are to:</p>
("21","4","Sexuality","","img16.jpg","||/~Objectives/~<ul>
("23","5","Teen Pregnancy and Sexually Transmitted Infections","","eye-for-ebony-399310-unsplash.jpg","||/~Objectives/~<p>The Objectives of this module are to:</p>
("24","6","Appreciating Me - Self Esteem","","img14.jpg","||/~Objective/~<p>By the end of this session you should be able to:</p>
("25","7","Appreciating Others - Interpersonal Relationships","","img15.jpg","||/~Objectives/~<p>By the end of this session you should be able to:</p>
("26","8","Goal Setting (My future/Academics/ Studies/Talents)","","img12.jpg","||/~Objectives/~<p>By the end of this session you should be able to:</p>
("27","9","Financial Planning Basics in financial planning","","img28.jpg","||/~Objectives/~<p>Budgeting &ndash; making a personal budget</p>
("28","10","Managing Risky Situations - Negotiation Skills Risky Situations Review","","img29.jpg","||/~Situations/~<ol>
("29","11","Gender Based Violence (GBV) and Conflict","","img31.jpg","||/~Session Goals/~<ul>
("31","1","Introduction","","img10.jpg","||/~What is Lasting Impressions?/~<p>Lasting Impressions is a programme that helps the adolescents to understand the change that occur in them during this stage and how to cope with the challenges associated with these changes.</p>



DROP TABLE IF EXISTS djfk_files;

CREATE TABLE `djfk_files` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_name` varchar(50) DEFAULT NULL,
  `document_path` varchar(50) DEFAULT NULL,
  `course_code` int(11) DEFAULT NULL,
  `uploaded_by` varchar(50) DEFAULT NULL,
  `uploaded_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS djfk_institution;

CREATE TABLE `djfk_institution` (
  `inst_id` int(11) NOT NULL,
  `institutionname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`inst_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS djfk_manager_users;

CREATE TABLE `djfk_manager_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype` text,
  `createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `username` char(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `lastlogintime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO djfk_manager_users VALUES("1","admin","2019-06-10 12:43:03","admin","NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==","2022-09-02 09:25:46");



DROP TABLE IF EXISTS djfk_mentor;

CREATE TABLE `djfk_mentor` (
  `mentor_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mentor_tel` varchar(100) DEFAULT NULL,
  `mentor_gender` varchar(100) DEFAULT NULL,
  `mentor_dateofbirth` date DEFAULT NULL,
  `mentor_county` varchar(100) DEFAULT NULL,
  `progprev` varchar(100) DEFAULT NULL,
  `progby` varchar(100) DEFAULT NULL,
  `yesprogprev` varchar(100) DEFAULT NULL,
  `howdidyou` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `lastlogintime` datetime DEFAULT NULL,
  `usercode` varchar(50) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT 'placeholder.png',
  `user_type` char(50) DEFAULT NULL,
  PRIMARY KEY (`mentor_id`),
  UNIQUE KEY `mantor_email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO djfk_mentor VALUES("13","Jael Wachia","jael.w@email.com","1234567890","Female","1986-01-27","Nandi","No","...","","Peers/Friends","NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==","0","2021-03-29 11:40:21","teqfel2Xb2","placeholder.png","ment"),
("14","David Peter Mulwale","davidpmulu@gmail.com","0721806514","Male","1980-02-08","Nairobi","No","...","","Google search","NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==","0","2021-04-06 11:00:20","cugHwEPJ1Y","placeholder.png","ment"),
("15","Livingston Musumba","l_musumba@yahoo.com","1234567890","Male","2000-02-02","Nairobi","No","...","","Google search","NTk5NDQ3MWFiYjAxMTEyYWZjYzE4MTU5ZjZjYzc0YjRmNTExYjk5ODA2ZGE1OWIzY2FmNWE5YzE3M2NhY2ZjNQ==","0","0000-00-00 00:00:00","KsM7OvdwmE","placeholder.png","ment"),
("16","Robert Kibuga","rkibuga@bethelnetwork.com","1234567890=","Male","1990-01-01","Nairobi","Yes","AKGIS","","Google search","OWY3MzVlMGRmOWExZGRjNzAyYmYwYTFhN2I4MzAzM2Y5ZjcxNTNhMDBjMjlkZTgyY2VkYWRjOTk1NzI4OWIwNQ==","0","0000-00-00 00:00:00","SxzLkpdw7C","placeholder.png","ment");



DROP TABLE IF EXISTS djfk_news;

CREATE TABLE `djfk_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO djfk_news VALUES("1","This new  title","Lorem ipsum dolor sit amet, consectetur adipiscing elit.","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae magna non elit hendrerit facilisis. Sed feugiat bibendum mauris, quis maximus turpis interdum sit amet. Integer et eros leo. Ut sit amet fringilla mi. Maecenas scelerisque leo et lorem hendrerit, ac posuere odio luctus. Sed lacus est, aliquam sit amet urna quis, porta egestas enim. Etiam suscipit vulputate lacus, non laoreet nisi iaculis in. Duis dictum diam ut pulvinar interdum. Quisque eget egestas velit. Aenean bibendum in dui id congue.");



DROP TABLE IF EXISTS djfk_questions;

CREATE TABLE `djfk_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thematicnum` int(11) NOT NULL DEFAULT '0',
  `question_part` int(11) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `questiontype` char(50) DEFAULT '',
  `answers` text NOT NULL,
  `correct_ans` text NOT NULL,
  `comments` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

INSERT INTO djfk_questions VALUES("58","31","3","Have you ever heard of life skills?  ","radio","Yes~No","","","0"),
("59","31","5","Where did you learn about this online programme?","checkboxes","At School~Through a Friend~Saw it on TV  ~Accidentally stumbled on it~Other ","","","0"),
("60","31","5","If other, please specify","inputtext","","","","0"),
("61","31","5","What is your age bracket?","radio","Under 12 ~13-15~16-18~Over 18","","","0"),
("62","19","3","In this activity you are required to take a piece of paper and write about who are.
("63","19","8","Which of the following is true about Self Awareness?","radio","You cannot understand others if you can\'t understand yourself
("64","19","8","Which of the following can you change about yourself?","radio","Race~Tribe~Height~Nationality
("65","19","8","What are the five dimensions of an individual?","radio","Emotional, Physical, mental, spiritual and soul
("66","19","8","Match the parts in the self awareness fruit tree with what they represent.<br />I.	Our attitudes (towards self; others; community; work) or thought  system","radio","Roots~Stem~Fruits
("67","19","8","II.	Our values; background (family; social; schooling)","checkboxes","Roots ~Stem~Fruits
("68","19","8","III.	Our behavior; mannerisms","radio","Roots~Stem~Fruits
("69","20","2","Name the female body parts changes during puberty? (A, B C as shown in diagram)","radio","A â€“ Chest; 	B- Hips and 	C- Body hair
("70","20","4","What are some of the emotional changes you have noticed?","inputtext","","","","0"),
("71","20","7","What happened to Jacky?","checkboxes","Jacky got her periods~Jacky had internal bleeding
("72","20","9","Which sentence below correctly describes puberty?","checkboxes","A transition period where one is no longer considered a child~A period of transition period where one is no longer a child but not yet an adult~A transition period where a girl becomes a woman or a boy becomes a man.
("73","20","9","Which of the following is part of the female external genitals?","checkboxes","Pubic hair ~Vagina ~Clitoris ~Inner lips~Outer lips
("74","20","9","Which of the following is part of the female internal genitals?","checkboxes","Womb ~Vagina ~Ovaries~Stomach~Cervix~Uterus
("75","20","9","How many ovaries does the female body contain?","radio","4 (Four)~1 (One)~2 (Two)~3 (Three)
("76","20","9","How many times in a year does one in puberty ovulate?","radio","52~12~24~1
("77","20","9","What organ connects the Vagina to the Uterus?","radio","Fallopian Tube~Clitoris~Cervix~Inner lips
("78","21","6","According to the story, what are some ways HIV is transmitted?","checkboxes","Through sex~Mother to Child	~Shaking Hands	~Mosquito bite ~Coming into contact with specific bodily fluids of someone living with the virus (e.g. blood, semen, breast milk).~Sharing injecting equipment~Through contaminated blood transfusions.~Through bodily fluids, like saliva, sweat or urine, to transmit it from one person to another.
("79","21","6","Can young people get HIV?","checkboxes","Yes~No","Yes","","0"),
("80","21","6","Can you tell if one is infected by simply looking?","checkboxes","Yes~No","No","","0"),
("81","21","6","Which of the following cannot protect you from getting infected with HIV?","checkboxes","Abstinence~Avoid sharing Injectables~Wearing a Mask
("82","21","8","How did Nancy get HIV?","checkboxes","She contracted it at birth~She was lured by an older man into having sex~She got it when playing her favorite sport, netball.
("83","21","8","How did she find out she has HIV?","radio","She was told by people that she looks like someone who has HIV~She was tested at a VCT center~Her instincts~Other people told her the status of the man who lured her into having sex
("84","21","8","One can tell someone has HIV by simply looking at them?","radio","True~False","False","","0"),
("85","21","8","HIV does not affect young people? ","radio","True~False","False","","0"),
("86","21","11","What does HIV stand for?","radio","Human Immune Virus~Human Immune Deficiency Virus~Human Immuno Virus~Human Immunodeficiency Virus","Human Immunodeficiency Virus","","0"),
("87","21","11","What does AIDS stand for?","radio","Acquired Immune Deficiency Sickness~Acquired Immunodeficiency Syndrome~Acquired Immune Deficiency Syndrome~Acquired Immune Defense System
("88","21","11","What does VCT Stand for?","radio","Volunteer Counseling Trainer~Voluntary Counseling and Training~Voluntary Counseling and Testing~Volunteer Counselor and Trainer
("89","23","3","Which of the following is not an STI?","radio","Chlamydia~gonorrhea~syphilis~genital herpes,~HIV and trichomoniasis~Covid-19","Covid-19","","0"),
("90","23","3","Which of the following are common symptoms of STIs?","checkboxes","Sores, blisters, warts or pimples near the Genital area or mouth~Unusual discharge (in color, texture, Amount or odor) from vagina.~Pain or itching in the pubic/genital area.~Burning when urinating.~Pain in the abdominal area (in women).
("91","23","6","According to the story, what is one sign that one is pregnant?","radio","Change in oneÃ¯Â¿Â½s behavior~Waking up late in the morning~Missing monthly period~Feeling drowsy in the morning
("92","23","6","How did Odhiambo react to the news that she was pregnant?","radio","He accepted responsibility~He wanted proof by DNA to accept responsibility~He denied any responsibility and wants nothing to do with Jennifer~He agreed to meet JenniferÃ¯Â¿Â½s parents
("93","23","6","How did Jane and HillaryÃ¯Â¿Â½s views change after the pregnancy test?","radio","They felt relieved but did not change their views~They now know the risks of having sex and chose to not go the same path again~They decided they will use protection in future~None of the above
("94","23","9","You can get pregnant by kissing              ","radio","Myth~Fact","Myth","The only way a woman can get pregnant is if the sperms enter her vagina and womb and fertilize an egg. This usually occurs during sexual intercourse, but sperms can also enter a womanÃ¢â‚¬â„¢s vagina if a man Ã¢â‚¬Å“comesÃ¢â‚¬Â when his penis is near the entrance to the vagina, but not inside.","0"),
("95","23","9","If a girl misses her period, she is definitely pregnant ","radio","Myth~Fact","Myth","This is not true! When girls first start having periods, they often have irregular cycles and may even skip a month or more in between their periods from time to time. However, if a girl has had sex and she misses a period, she could be pregnant (Remember Jane in the story we just read). The best advice for her is to see a doctor right away to check.","0"),
("96","23","9","A girl can get pregnant if she has sexual intercourse standing up","radio","Myth~Fact","Fact","If a boy and a girl have sex something magical happens. Sperms from the boy go up from the vagina into the womb and the tubes. They swim like mad to be the first one entering the egg. And if this happens; the girl is pregnant.
("97","23","9","A girl cannot get pregnant if she has sex during her Ã¯Â¿Â½safe daysÃ¯Â¿Â½","radio","Myth~Fact","Myth","The Ã¢â‚¬Ëœsafe daysÃ¢â‚¬â„¢ are not 100% safe, and one can still get pregnant.
("98","23","9","A girl can get pregnant the very first time she has sexual intercourse","radio","Myth~Fact","Fact","Of course she can! It happens every day, much to the surprise and disappointment of many young girls (Remember Jennifer in the story we read earlier). Pregnancy can also occur before a girl has had her first period.
("99","23","9","If you take a lot of hot tea just after sex then you can prevent getting pregnant","radio","Myth~Fact","Myth","You are NOT safe if you drink any strong liquids that people say will prevent pregnancy or induce abortion. You are NOT safe if you wash your vagina with vinegar, coke or other fluids.
("100","23","9","Withdrawal or pulling the penis out of the vagina before the man ejaculates is an effective way to avoid pregnancy ","radio","Myth~Fact","Myth","No this is NOT safe! It is a way that makes many teenage girls pregnant. A fluid called pre-cum or pre-ejaculate comes out of the penis before ejaculation. Each drop contains thousands of sperms. Even if the penis is pulled out of the vagina before ejaculation, pre-ejaculate inside the vagina has enough sperm to start a pregnancy.","0"),
("101","23","9","The first semen in boys cannot make girls pregnant ","radio","Myth~Fact","Myth","Occasionally pregnancy can occur even before a boy has had his first wet dream so it does not matter whether itÃ¢â‚¬â„¢s the first semen or not. If he has sex, he is at risk of making a girl pregnant.","0"),
("102","24","4","Please list three things that will cause you to have a great sense of value.","inputtext","","","","0"),
("103","24","4","List three things that will make one have low sense of value (Self Esteem)","inputtext","","","","0"),
("104","24","4","What are the benefits of a good sense of self-esteem?","inputtext","","","","0"),
("105","24","7","What are some of the ways you could help Natali if she were your close friend?","inputtext","","","","0"),
("106","24","8","Which of the following statements comes close to describing what self-esteem is?","radio","Self esteem is when you show confidence and are not afraid~The core perceptions and beliefs that others have placed on us~The value or worth you unconsciously assign to yourselves
("107","24","8","What things affect our self-esteem POSITIVELY?","radio","Someone judging us harshly~Positive reinforcement from people~Inability to match our own expectations~Having money
("108","24","8","What things affect our self esteem NEGATIVELY?","radio","Someone judging us harshly~Positive reinforcement from people~Good looking Clothes~Talents we have
("109","24","8","Which of the following is not a BENEFIT of self-esteem?","radio","Great confidence~Ability to ignore risky situations~Ability to take criticism positively~Ability to pursue ones goals and dreams to the end
("110","25","8","Relationship pressure in commonly referred as peer pressure","radio","True~False","True","","0"),
("111","25","8","Peer pressure affects everyone ","radio","True~False","True","","0"),
("112","25","8","Peer pressure can be negative or positive","radio","True~False","True","","0"),
("113","25","8","Which of the following is true?","radio","I do not need to worry about peer pressure, it only happens to teenagers~Positive pressure can be able to produce desired long term goals~Those who are influenced by peer pressure are weak people that do not have self esteem~Those who go through difficult situations in life are more likely to be affected by peer pressure because of desperation
("114","26","6","If you do not think about and write down your goals in life then you have no way of knowing where you will be in future?","radio","True~False","True","","0"),
("115","26","6","One should only start planning for their future once they have completed school. Otherwise if they fail their exams they will not achieve what they desire in life. ","radio","True~False","False","","0"),
("116","26","6","Once you set your future goals, you cannot change them   ","radio","True~False","False","","0"),
("117","26","6","Why is it important to start thinking of your future at an early age","radio","It will help you not to die poor~It will help me start working a step at a time and create priorities in my life that will make me more focused and increase my chances of making my goals a reality.~Nowadays people mature early~I cannot fail if I start early","It will help me start working a step at a time and create priorities in my life that will make me more focused and increase my chances of making my goals a reality.","","0"),
("118","27","5","Which of the following statement defines the term BUDGET?","radio","It is a record of how we spend money~It is a summary of what I expect to earn in future~It is a summary of estimated income and how one intends to spend it over time~It is what the country\'s finance minister reads every year as part of government spending
("119","27","5","Which of the following is not a form of income?","radio","The pocket money you receive~Money received from assisting someone do an activity~Refund of caution money~Money sent as gift from relatives","Refund of caution money","","0"),
("120","27","5","Should you think of your financial goals while you are a student in primary or secondary school? ","radio","Yes~No","Yes","","0"),
("121","27","5","What will happen if your expenses are higher than your income?","radio","You will be in debt~You will have more savings to make~Because there are good days and bad days the situation will correct itself in the good days~Just edit your budget and increase the income amount to balance it off
("122","27","5","What I want has a higher priority than what I need in a budget?  ","radio","True~False ","False ","","0"),
("123","28","1","Situation 1: 
("124","28","1","Situation 2: It has been a tough time for Mary. She has grown up with a relative who there is every sign that she has a lot of money but it is not clear where this comes from. She comes home late at night and sometimes she does not come at all. The other day she saw her being dropped by a man who was driving a very nice car. The man came into the house and seemingly wants to be friends with Mary. He has been sending her gifts whenever she is in town. What should Mary do?","inputtext","","","","0"),
("125","28","6","Situation 1: Njoki was invited to go with her friends to a birthday party. Everything was fine until some three boys came in with a bag full of bottles. It was as though everyone was waiting for this moment.
("126","28","6","Situation 2: Kate has had a classmate who is very kind to her. He often comes with sweets and shares with her only. One day, on their way from school, the boy asked if she could help carry something that he was taking home. On the way home, he talked about how he has admired her and her family. He requested if he could get just one favor from her.
("127","28","6","Situation 3: In the last three years, there has been some girls who have been dropping out of school and have gone to do various things in the city. They have been coming to visit have the latest phones in the market and are very smartly dressed. One break time, Achieng found some girls discussing this and were planning to join their former friends. Please advise Achieng on how she can deal with this.","inputtext","","","","0"),
("128","28","5","Which of the following is not a risky behavior?","radio","Using drugs and alcohol~Receiving gifts and money from people other than close family~Being in a relationship with somebody who is older than you~Having casual sex~Being in a hidden or isolated place~Always walking home from school or going places with friends you value
("129","28","5","What is peer pressure?","radio","Urging by peers to do wrong things~Pressure from those people I trust to do something~Real or imagined force or coercion one experiences from his or her peers to act or behave in a certain way~A pressure brought about when one becomes a teenager
("130","28","5","What is one helpful way for dealing with peer pressure?","radio","Avoid groups~Be assertive~Report people putting your under pressure to the local chief~Call 911
("131","28","5","When dealing with peer pressure you:<br />a)	Should speak in a clear voice","radio","True~False","True","","0"),
("132","28","5","b)	Look at the other person(s) straight in the eyes as you speak","radio","True~False","True","","0"),
("133","28","5","c)	Use polite but firm words		","radio","True~False","True","","0"),
("134","28","5","d)	Should not give chance for the other party to talk","radio","True~False","False","","0"),
("135","28","5","e)	Use and repeat the word \'NO\' often","radio","True~False","True","","0"),
("136","29","13","Which of the following is not a form of GBV?","radio","Sexual~Physical ~Gender Discrimination~Voting for a different gender in an election~Emotional/ Mental~Social/Economic ~Harmful Traditional Practices
("137","29","13","Which of the following in not an example of GBV?","radio","Rape/Attempted Rape~Sexual Abuse,~Sexual Exploitation, ~Forced Early Marriage~Mass failure of one gender in an exam~Domestic Violence: Intimate Partner or Other Family Members, ~Trafficking for Sex or Labor, Female Genital Cutting (FGC)
("138","29","13","Which of the following is true on why there are many cases of underreporting of GBV cases?<br />a)	Self-blame ","radio","True~False","True","","0"),
("139","29","13","b)	Stigma and rejection of their family or community ","radio","True~False","True","","0"),
("140","29","13","c)	Fear of reprisals","radio","True~False","True","","0"),
("141","29","13","d)	Long distances to nearest police station","radio","True~False","False","","0"),
("142","29","13","e)	Mistrust of authorities","radio","True~False","True","","0");



DROP TABLE IF EXISTS djfk_schools;

CREATE TABLE `djfk_schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(100) DEFAULT NULL,
  `location` text,
  `contperson` text,
  `tel` text,
  `email` text,
  `enterby` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

INSERT INTO djfk_schools VALUES("11","Moi High School Keptetet","Test Location","","","","13"),
("14","test1","Test Location","","","","16"),
("15","test 2","Test Location","","","","16"),
("16","School A","Test Location","","","","19"),
("17","School B","Test Location","","","","19"),
("18","School Academy1","Test Location","","","","14"),
("19","Institurion University","Test Location","","","","14"),
("20","Furaha School Nairobi","Test Location","","","","14"),
("21","Salama School Kitui","Test Location","","","","14"),
("24","Madaraka Primary","Test Location","","","","15"),
("25","Langata Primary","","","","","15"),
("26","Test AKGIS School","","","","","16"),
("32","Hekima High School, Kaamba","","","","","13");



DROP TABLE IF EXISTS djfk_studanswers;

CREATE TABLE `djfk_studanswers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` text NOT NULL,
  `usertype` text NOT NULL,
  `themeid` int(11) NOT NULL DEFAULT '0',
  `section` int(11) NOT NULL DEFAULT '0',
  `answers` text NOT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

INSERT INTO djfk_studanswers VALUES("6","JMoonrSnOl","stud","31","5","||lastest~1||59~Accidentally stumbled on it||60~||61~16-18","0"),
("10","JMoonrSnOl","stud","31","3","||58~No","0"),
("11","JMoonrSnOl","stud","31","5","||lastest~1||59~Through a Friend||60~||61~16-18","0"),
("12","JMoonrSnOl","stud","31","5","||lastest~1||59~Through a Friend||60~||61~16-18","0"),
("13","JMoonrSnOl","stud","31","5","||lastest~1||59~Through a Friend||60~||61~16-18","0"),
("14","JMoonrSnOl","stud","19","3","||62~Class","0"),
("15","JMoonrSnOl","stud","19","8","||lastest~1||63~You cannot understand others if you canâ€™t understand yourself
("16","JMoonrSnOl","stud","20","2","||69~A- Breast; 	B- Hips and 	C- Pubic hair
("17","JMoonrSnOl","stud","20","7","||71~Jacky had internal bleeding
("18","JMoonrSnOl","stud","20","9","||lastest~1||72~A transition period where one is no longer considered a child||73~Vagina ||74~Womb ||75~4 (Four)||76~24||77~Fallopian Tube","0"),
("19","JMoonrSnOl","stud","21","6","Array","3"),
("20","JMoonrSnOl","stud","21","8","Array","4"),
("21","SxzLkpdw7C","ment","31","3","","0"),
("22","SxzLkpdw7C","ment","31","5","Array","0"),
("23","SxzLkpdw7C","ment","19","3","Array","0"),
("24","SxzLkpdw7C","ment","19","8","Array","6"),
("25","SxzLkpdw7C","ment","20","2","","1"),
("26","SxzLkpdw7C","ment","20","4","","0"),
("27","SxzLkpdw7C","ment","20","4","","0"),
("28","SxzLkpdw7C","ment","20","4","","0"),
("29","SxzLkpdw7C","ment","20","4","","0"),
("30","SxzLkpdw7C","ment","20","4","","0"),
("31","SxzLkpdw7C","ment","20","4","","0"),
("32","SxzLkpdw7C","ment","20","4","","0"),
("33","SxzLkpdw7C","ment","20","4","","0"),
("34","SxzLkpdw7C","ment","20","4","","0"),
("35","SxzLkpdw7C","ment","20","4","","0"),
("36","SxzLkpdw7C","ment","20","4","","0"),
("37","SxzLkpdw7C","ment","20","4","","0"),
("38","SxzLkpdw7C","ment","20","7","Array","1"),
("39","SxzLkpdw7C","ment","20","9","Array","4"),
("40","SxzLkpdw7C","ment","21","6","Array","4"),
("41","SxzLkpdw7C","ment","21","8","Array","3"),
("42","SxzLkpdw7C","ment","21","11","","3"),
("43","SxzLkpdw7C","ment","24","4","","0"),
("44","SxzLkpdw7C","ment","24","4","","0"),
("45","SxzLkpdw7C","ment","24","7","","0"),
("46","SxzLkpdw7C","ment","24","8","","3"),
("47","SxzLkpdw7C","ment","24","8","","4"),
("48","SxzLkpdw7C","ment","31","3","","0"),
("49","SxzLkpdw7C","ment","31","5","Array","0"),
("50","SxzLkpdw7C","ment","31","5","Array","0"),
("51","SxzLkpdw7C","ment","31","5","Array","0"),
("52","SxzLkpdw7C","ment","31","5","Array","0"),
("53","SxzLkpdw7C","ment","31","5","Array","0"),
("54","SxzLkpdw7C","ment","31","5","Array","0"),
("55","SxzLkpdw7C","ment","31","3","","0"),
("56","SxzLkpdw7C","ment","31","3","","0"),
("57","SxzLkpdw7C","ment","31","5","Array","0"),
("58","SxzLkpdw7C","ment","31","3","","0"),
("59","SxzLkpdw7C","ment","31","3","","0"),
("60","SxzLkpdw7C","ment","31","5","Array","0"),
("61","SxzLkpdw7C","ment","19","3","Array","0"),
("62","SxzLkpdw7C","ment","19","3","Array","0"),
("63","SxzLkpdw7C","ment","31","3","","0"),
("64","SxzLkpdw7C","ment","31","5","Array","0"),
("65","SxzLkpdw7C","ment","19","3","Array","0"),
("66","SxzLkpdw7C","ment","19","3","","0"),
("67","SxzLkpdw7C","ment","19","3","","0"),
("68","SxzLkpdw7C","ment","19","3","","0"),
("69","SxzLkpdw7C","ment","19","8","Array","6"),
("70","SxzLkpdw7C","ment","19","8","","0"),
("71","SxzLkpdw7C","ment","20","2","","0"),
("72","SxzLkpdw7C","ment","20","2","","1"),
("73","SxzLkpdw7C","ment","20","2","","0"),
("74","SxzLkpdw7C","ment","20","4","","0"),
("75","SxzLkpdw7C","ment","20","4","","0"),
("76","SxzLkpdw7C","ment","20","4","","0"),
("77","SxzLkpdw7C","ment","20","4","","0"),
("78","SxzLkpdw7C","ment","20","7","Array","1"),
("79","SxzLkpdw7C","ment","20","9","Array","4"),
("80","SxzLkpdw7C","ment","20","7","","0"),
("81","SxzLkpdw7C","ment","20","9","","0"),
("82","SxzLkpdw7C","ment","21","6","Array","3"),
("83","SxzLkpdw7C","ment","21","8","Array","4"),
("84","SxzLkpdw7C","ment","21","11","","2"),
("85","SxzLkpdw7C","ment","21","11","","3"),
("86","SxzLkpdw7C","ment","24","4","","0"),
("87","SxzLkpdw7C","ment","24","4","","0"),
("88","SxzLkpdw7C","ment","24","4","","0"),
("89","SxzLkpdw7C","ment","24","4","","0"),
("90","SxzLkpdw7C","ment","24","7","","0"),
("91","SxzLkpdw7C","ment","24","8","","4"),
("92","SxzLkpdw7C","ment","25","8","","4"),
("93","SxzLkpdw7C","ment","24","4","","0"),
("94","SxzLkpdw7C","ment","24","4","","0"),
("95","SxzLkpdw7C","ment","24","4","","0"),
("96","SxzLkpdw7C","ment","24","7","","0"),
("97","SxzLkpdw7C","ment","24","8","","3"),
("98","SxzLkpdw7C","ment","24","4","","0"),
("99","SxzLkpdw7C","ment","24","8","","3"),
("100","SxzLkpdw7C","ment","25","8","","4"),
("101","SxzLkpdw7C","ment","26","6","","3"),
("102","SxzLkpdw7C","ment","26","6","","3"),
("103","SxzLkpdw7C","ment","27","5","","4"),
("104","SxzLkpdw7C","ment","27","5","","1"),
("105","SxzLkpdw7C","ment","28","1","","0"),
("106","SxzLkpdw7C","ment","28","1","","0"),
("107","SxzLkpdw7C","ment","28","1","","0"),
("108","SxzLkpdw7C","ment","28","6","","0"),
("109","SxzLkpdw7C","ment","28","7","","7"),
("110","SxzLkpdw7C","ment","31","3","","0"),
("111","SxzLkpdw7C","ment","27","5","","0"),
("112","teqfel2Xb2","ment","31","3","","0"),
("113","teqfel2Xb2","ment","19","3","","0");



DROP TABLE IF EXISTS djfk_student_course;

CREATE TABLE `djfk_student_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `thematic_text_code` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS djfk_tests;

CREATE TABLE `djfk_tests` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_number` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `pretotal` int(11) DEFAULT NULL,
  `posttotal` int(11) DEFAULT NULL,
  `timetaken` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS djfk_user;

CREATE TABLE `djfk_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usercode` varchar(50) DEFAULT NULL,
  `username` char(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `aboutme` text,
  `gender` char(50) DEFAULT NULL,
  `lastlogintime` datetime DEFAULT NULL,
  `avatar` char(50) DEFAULT 'placeholder.png',
  `levelon` int(11) DEFAULT '1',
  `tests_complete` int(10) DEFAULT '0',
  `county` char(50) DEFAULT NULL,
  `inschool` char(50) DEFAULT NULL,
  `schoollevel` char(50) DEFAULT NULL,
  `schoolname` char(50) DEFAULT NULL,
  `schoolloc` char(50) DEFAULT NULL,
  `progprev` char(50) DEFAULT NULL,
  `progby` char(50) DEFAULT NULL,
  `yesprogprev` char(100) DEFAULT NULL,
  `howdidyou` char(50) DEFAULT NULL,
  `user_type` char(50) DEFAULT NULL,
  `mentor` int(11) DEFAULT NULL,
  `completedunits` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO djfk_user VALUES("7","8TNpzIHxNw","James Omolo1","jomollo@email.com","NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==","0000-00-00","","","0000-00-00 00:00:00","placeholder.png","0","0","","","","","","","","","","stud","0",""),
("9","kIObEVtneq","James Ongare","jo@email.com","OWY4NmQwODE4ODRjN2Q2NTlhMmZlYWEwYzU1YWQwMTVhM2JmNGYxYjJiMGI4MjJjZDE1ZDZjMTViMGYwMGEwOA==","2000-02-02","","Male","0000-00-00 00:00:00","placeholder.png","1","0","Nairobi","No","...","","","","","","","stud","0",""),
("10","qvYVkMpBl2","Jack Maranda","jmaranda@email.com","NWZkYjYzNTYxZDVkOWE0MDkyODBhMDUwZjcyZjkxNGUwNTY4MDk2YmNhNTNiZmZkODNmYWYzZmYyNDJiZmE2Nw==","1999-10-12","","Male","0000-00-00 00:00:00","placeholder.png","1","0","Busia","Yes","University/College","","","","","","","stud","0",""),
("15","3ff046YCWx","Livingston Musumba","l_musumba@yahoo.com","NjVlODRiZTMzNTMyZmI3ODRjNDgxMjk2NzVmOWVmZjNhNjgyYjI3MTY4YzBlYTc0NGIyY2Y1OGVlMDIzMzdjNQ==","2000-02-02","","Male","0000-00-00 00:00:00","placeholder.png","1","0","Nairobi","No","University/College","","","","","","","","0",""),
("16","GE6pwoPMyY","Anne Nduta","","","2008-02-05","","Female","","placeholder.png","1","0","Kiambu","Yes","High School","Test AKGIS School","","Yes","AKGIS","This is a test","","stud","13",""),
("20","l0bFt2RbFY","Sophia Jerono","","","2008-07-25","","Female","","placeholder.png","1","0","Kiambu","Yes","High School","Test AKGIS School","","Yes","Other","This is another test","","stud","13","");



DROP TABLE IF EXISTS djfk_videos;

CREATE TABLE `djfk_videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_title` varchar(50) DEFAULT NULL,
  `uploaded_by` varchar(50) DEFAULT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



