INSERT INTO Users (email, username, password)
VALUES
 ('admin@mail.com', 'admin', 'admin'),
 ('artur@mail.com', 'Artur', 'artur123'),
 ('pavel@mail.com', 'Pavel', 'pavel123'),
 ('anatol@mail.com', 'Anatol', 'anatol123'),
 ('edmund@mail.com', 'Edmund', 'edmund123'),
 ('torsten@mail.com', 'Torsten', 'torsten123');

INSERT INTO Hashtags (name)
VALUES
 ('context'),
 ('collection'),
 ('uncle'),
 ('moment'),
 ('farmer'),
 ('fishing'),
 ('newspaper'),
 ('resolution');

INSERT INTO Channels (name, description, owner)
VALUES
 ('Midnight', 'nt pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so be', 2),
 ('Significance', 'pleasure rationally encounter consequences that are', 3),
 ('Organization', 'ever undertakes laborious physical exercise, ex', 4),
 ('Recognition', ' rejects, dislikes, or avoids pleasure itself, because it is pleasure', 5),
 ('Platform', 'f itself, because it is pain, but because occasionally circumstances occur', 6);

INSERT INTO Channels (name, description, trusted, owner)
VALUES
 ('Climate', 'But I must explain to you how all this mistaken idea', true, 4),
 ('Medicine', 'here anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious phys', true, 5),
 ('Definition', 'pleasure and praising pain was born and I will give you a ', true, 6);

INSERT INTO Topics (title, description)
VALUES
 ('Lady', 'Welcome to the website. If youre here, youre likely looking to find random words. '),
 ('Initiative', 'Random Word Generator is the perfect tool to help you do this.'),
 ('Story', 'While this tool isn''t a word creator'),
 ('Tennis', 'It is a word generator that will generate random words for a variety of activities or uses.'),
 ('Library', 'Even better, it allows you to adjust the parameters of the random words to best fit your needs.');

INSERT INTO TopicHashtags (hashtag, topic)
VALUES
 (1, 1),
 (1, 2),
 (1, 3),
 (2, 4),
 (2, 1),
 (2, 2),
 (3, 3),
 (3, 4),
 (3, 1),
 (4, 2),
 (4, 3),
 (4, 4),
 (5, 1),
 (5, 2),
 (5, 3),
 (6, 4),
 (6, 1),
 (6, 2),
 (7, 3),
 (7, 4),
 (7, 1),
 (8, 2),
 (8, 3),
 (8, 4);

INSERT INTO Messages VALUES (1,'KwaZulu-Natal Health MEC Nomagugu Simelane says the 20% increase in Covid-19 infections over a seven-day moving average recorded in the province is cause for alarm.','2022-05-01 19:25:09',0,2,4,4),(2,'Of the new confirmed infections, the eThekwini metro accounted for at least 80% of cases, followed by the Umgungundlovu District at 7% and Ilembe at 5%.','2022-05-01 19:25:18',0,6,4,1),(3,'\"So indeed, these latest statistics are of huge concern to us. Clearly, something is happening. At this stage, we\'re not sure whether this is the fifth wave or not, but these developments are cause for concern.','2022-05-01 19:25:29',0,3,4,6),(4,'\"That is why we are urging all the people of this province to stay alert, and to practice all the necessary precautions, such as wearing face masks, maintaining social distancing, and washing their hands regularly with soap and water or hand sanitiser.\"','2022-05-01 19:25:40',0,7,4,4),(5,'The MEC also noted her concern around the rising number of patients hospitalised for Covid-19.','2022-05-01 19:25:50',0,4,4,5),(6,'We are pleading with those who have not been vaccinated to come forward and get the jab. This is for their own good because people who are not vaccinated are more likely to be infected with Covid-19 and more likely to transmit Covid-19 to others,\" Simelane said.','2022-05-01 19:25:59',0,2,4,7),(7,'On Friday, News24 reported South Africa had seen an increase in Covid-19 cases over the last two weeks, but it remained unclear whether the country is entering the fifth wave.','2022-05-01 19:26:11',0,8,4,2),(8,'The Microsoft cofounder was pushing countries to take the threat of a global pandemic more seriously long before Covid-19 arrived, warning viewers of a 2015 TED Talk the world was \"not ready\" for a deadly outbreak. ','2022-05-01 19:27:14',0,3,5,6),(9,'Speaking to the FT ahead of the release of his upcoming book, \"How to Prevent the Next Pandemic\", Gates said his proposed \"Global Epidemic Response and Mobilization\" initiative should fall under the WHO\'s management.','2022-05-01 19:27:22',0,2,5,8),(10,'The billionaire philanthropist suggested the task force be put together to monitor global health emergencies and coordinate responses across countries. The epidemic response team could be made up of experts including computer modelers as well as epidemiologists, he said. ','2022-05-01 19:27:37',0,1,5,1),(11,'preparing for future outbreaks, adding that \"even those people are distracted with many other activities\". \"The current WHO funding is not at all serious about pandemics,\" Gates told the FT.','2022-05-01 19:27:49',0,2,5,7),(12,'Gates said that more funding was needed to prevent future pandemics: \"It seems wild to me that we could fail to look at this tragedy and not, on behalf of the citizens of the world, make these investments.','2022-05-01 19:28:00',0,2,5,2),(13,'The WHO has been the subject of scrutiny since Covid-19 began causing havoc around the world at the start of 2020, with critics arguing the body didn\'t do enough to warn the world how dangerous the virus was early on. ','2022-05-01 19:28:09',0,6,5,6),(14,'The WHO did not immediately respond to Insider\'s requests for comment. ','2022-05-01 19:28:18',0,2,5,3),(15,'Elon Musk\'s SpaceX Starlink has inked its first deal with a major airline to offer passengers in-flight Wi-Fi, with Hawaiian Airlines set to offer the service starting 2023.','2022-05-01 19:29:44',0,2,6,5),(16,'Hawaiian said Monday that it will equip its Airbus A330 and A321neo aircraft, and incoming Boeing 787-9s, with Starlink equipment.','2022-05-01 19:29:57',0,3,6,7),(17,'On Friday, semi-private regional jet service JSX said it had signed a deal with Starlink to provide free in-flight Wi-Fi across its fleet. The first JSX plane offering Starlink will take off later this year, the company said in a press release sent to Insider.','2022-05-01 19:30:05',0,3,6,7),(18,'Hawaiian Airlines CEO Peter Ingram said Monday: \"We waited until technology caught up with our high standards for guest experience, but it will be worth the wait.\"','2022-05-01 19:30:13',0,4,6,7),(19,'Hawaiian said free Starlink Wi-Fi would be provided to every guest onboard flights between the Hawiian islands and the continental US, Asia, and Oceania. It said it and Starlink were \"in the initial stages of implementation and expect to begin installing the product on select aircraft next year.\"','2022-05-01 19:30:23',0,4,6,3),(20,'Hawiian added it was \"not currently planning to deploy the service on its Boeing 717 aircraft that operate short flights between the Hawaiian Islands.\"','2022-05-01 19:30:32',0,4,6,5),(21,'China is reportedly taking steps to protect its overseas assets, amid fears the country could one day be subjected to sanctions similar to those imposed on Russia. ','2022-05-01 19:30:48',0,2,6,6),(22,'According to the Financial Times, Chinese officials recently held an emergency meeting with domestic and foreign banks to discuss how the state might protect its assets, should it ever face similar penalties. ','2022-05-01 19:30:57',0,2,6,1),(23,'One source told the newspaper: \"If China attacks Taiwan, decoupling of the Chinese and western economies will be far more severe than [decoupling with] Russia because China\'s economic footprint touches every part of the world.\" ','2022-05-01 19:31:05',0,7,6,5),(24,'According to the South China Morning Post, China has $3.2 trillion in foreign reserves. The FT reported that senior regulators including Yi Huiman, chairman of the China Securities Regulatory Commission, and Xiao Gang, who head the CSRC from 2013 to 2016, asked bankers how they could protect their overseas assets.','2022-05-01 19:31:13',0,2,6,4),(25,'\"If there is an invasion of Taiwan, China would expect the US to summon as broad a range of sanctions as possible.\"','2022-05-01 19:31:19',0,2,6,5),(26,'Insider approached China\'s Ministry of Foreign Affairs for comment.','2022-05-01 19:31:31',0,2,6,7);
INSERT INTO Messages (body, dispatch_time, private, hashtag, owner, channel) VALUES ('Growth stock stars of pandemic tumble into bear market Top hedge fund executives believe market conditions of past decade have changed for good','2022-05-01 19:25:39',0,2,1,8),('How far will the Fed and the Bank of England raise interest rates? Market Questions is the FT s guide to the week ahead','2022-05-01 19:25:54',0,2,1,6),('Renminbi on course for steepest monthly fall as China s economy slows Currency sell-off sharpens after president pledges all out infrastructure spending ','2022-05-01 19:26:07',0,7,1,1),('We need new savings options to ward off retirement funding crisis As social security faces numerous solvency and structural issues, we must turn to fresh strategies','2022-05-01 19:26:15',0,3,1,5),('Archegos: alleged deceptions and oversight failings soured this dough Premium content The debacle resulting in Bill Hwang s arrest has inspired calls for better disclosure of swaps holdings','2022-05-01 19:26:30',0,4,1,8),('China pension reforms lure international investors BlackRock among asset managers preparing new products for private retirement scheme debut','2022-05-01 19:26:45',0,4,1,3),('FT Asset Management Baillie Gifford s Renaissance man Plus, defence stocks charge ahead, tough times for venture capital and printmaker Tom Hammics latest exhibition','2022-05-01 19:26:56',0,4,1,7),('ETF HubLatest news on ETFs First combined gold-bitcoin ETP launches in Europe Expert questions long-term wisdom of the fund, but ByteTree executive says the two assets make sense as a paired investment','2022-05-01 19:27:47',0,3,2,3),('FT Magazine On the hunt for oligarchs in the wild west of corporate intelligence','2022-05-01 19:27:59',0,7,2,1),('InterviewVisual Arts Artists Jane and Louise Wilson on the duality of experience','2022-05-01 19:28:16',0,2,2,8),('FT MagazineRobert Shrimsley The Moggfather: why the minister for Brexit opportunities needs to get more Sicilian','2022-05-01 19:28:28',0,8,2,3),('FT MagazineSimon Kuper Don t say things that are obviously true, and other conference survival tips','2022-05-01 19:28:37',0,5,2,7),('Hear it from the experts Let our global subject matter experts broaden your perspective with timely insights and opinions you can t find anywhere else.','2022-05-01 19:29:03',0,3,2,5),('Cult Shop: a Jaipur jeweller s fit for a princess','2022-05-01 19:29:29',0,6,2,6),(' Charlie probably knew far better than the rest of us that death was coming ','2022-05-01 19:30:39',0,1,3,5),('Camberwell from an unkempt lad pad into a stylish sanctuary in an effort to convince her to move in. Having worked in the charity sector for the past decade, he had just begun studying to become an occupational therapist. He was fitter than ever, tanned from his jogs around the park and basketball ','2022-05-01 19:31:05',0,5,3,1),('US holds high-level talks with UK over China threat to Taiwan White House consults European allies over what it sees as more assertive activity by Beijing','2022-05-01 19:31:21',0,4,3,4),('British Virgin Islands premier rejects direct rule from London Dilemma for UK as islanders oppose recommendation at heart of corruption inquiry','2022-05-01 19:31:36',0,7,3,6),('Cutting China tariffs will offer no respite from rising prices US policymakers must stand firm on the need to confront Beijing and rebalance global trade','2022-05-01 19:31:45',0,8,3,2),('What you should know if you re fiddling your expenses The pandemic has eased the scourge of fraudulent claims','2022-05-01 19:32:09',0,2,3,6),('It s OK to be quiet in meetings Some of the smartest people rarely speak in work gatherings but everyone listens when they do','2022-05-01 19:32:21',0,6,3,7);