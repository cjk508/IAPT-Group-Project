CREATE DATABASE  IF NOT EXISTS `iapt2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `iapt2`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: iapt2
-- ------------------------------------------------------
-- Server version	5.5.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `narrative_method`
--

DROP TABLE IF EXISTS `narrative_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `narrative_method` (
  `recipe_id` int(11) NOT NULL,
  `narrative_body` longtext NOT NULL,
  PRIMARY KEY (`recipe_id`),
  CONSTRAINT `narrative_fk1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `narrative_method`
--

LOCK TABLES `narrative_method` WRITE;
/*!40000 ALTER TABLE `narrative_method` DISABLE KEYS */;
INSERT INTO `narrative_method` VALUES (1,'Peel and finely instructions grate the onion and peel and crush the garlic. Finely chop the white part of the lemongrass, then place with the chicken, onion, breadcrumbs, garlic, coriander, lime zest, fish sauce and sugar in a large bowl and mix well with your hands. Shape into 2 patties, cover and chill for at least 10 minutes.\r\nHeat a barbecue or griddle pan until hot. Brush the burgers with a little oil and cook for 4 minutes on each side or until cooked through. Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce. \r\n'),(2,'Preheat the oven to 350 degrees F.  Marinate the sliced tomatoes in French Dressing so they are fully coated.  Take the smoked fish fillets and cut them into pieces 2-3 inches long.  Place all into a small baking dish and add milk.  Bake for 20 minutes or until fish separates into flakes with a fork.  \r\nDrain and reserve ¾ cup of liquid for later.  \r\nGrease a pie pltae and make a crust combining the rice, melted butter and 1 egg.  Turn the crust into the pie plate evenly. \r\nSprinkle the pie crust with half of the shredded Cheddar Cheese and then add slices of fish.  Then, sprinkle the other half of the cheese.  Combined the reserved poaching liquid with 2 eggs and pour into pie plate.  Back for 30 min.  Remove from oven and arrange the tomatoes around the edge, skin up.  Bake for 10 more minutes until set.  Garnish with chopped green onions or chives.\r\n'),(3,'Cook over low heat in a large saucepan, stirring constantly until meat loses its red colour and about half of the liquid has evaporated.  cover and cook about 45 minutes longer.\r\nBoil and mash potatoes and mix in with the meat and allow to cool.  Preheat oven to 450 degrees F.  Prepare psatry for 2-crust, 9 inch pie.  Roll out half and line a 9-inch pie plate.  Fill with cooled meat mixture.  Roll out remainder of dough and cover pie.  Flute and seal edges.  Slash top of crust.  Bake for 10 min and reduce heat to 350 degrees F and bake for 30-40 minutes.'),(4,'Cook the potatoes in a large pan of lightly salted boiling water for 10-12\r\nminutes or until just tender. Add the runner beans and cook for a further 2 minutes. Then drain and rinse under cold running water. Toss the potatoes and beans with the mixed tomatoes, salad onions and spinach and season to taste. For the gremolata, use a vegetable peeler to pare thin strips of rind from the lemon. Carefully remove as much white pith as possible (this is bitter). Finely chop the lemon rind and toss with the garlic and parsley. Season and set aside. Squeeze the juice from the lemon and whizz in a food processor with the peeled tomato and pesto for 10-15 seconds. Pour over the potato mixture and toss through. Scatter over the gremolata to serve.'),(6,'Soak the black beans in cold water overnight. Drain and rinse well. Put them in a large saucepan with plenty of water and bring to the boil. Cook for 25-30 minute, until soft to the bite. Drain well and set aside.      \r\nHeat the oil in a saucepan set over high heat and add the red pepper and onion. Reduce the heat to low, cover and cook for about 8 minutes. Add the cumin, garlic and chillies and cook for a further 2 minutes. Add the beans, tomatoes, vinegar and passata and bring to the boil. Reduce the heat and simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy.\r\nPreheat the grill to high.\r\nTransfer the bean mixture to a flameproof dish and sprinkle the crumbled feta over the top. Cook under the hot grill until the cheese is soft and just starting to brown. Serve hot with corn chips on the side for dipping. '),(7,'Set the oven to heat to a temperature of 240°C or 220°C with a fan assisted oven. Grease a 23cm square, deep edged, cake pan. Then line it with foil taking care to ensure the foil extends a minimum of 10cm over the edges.\r\n \r\nThen grease two other oven trays to place (and bake) the ready-rolled pastry. Bake for approximately fifteen minutes and then cool. Gently flatten the sheets of pastry by hand.\r\n \r\nOnce done measure and trim the sheets to fit into the square cake pan. Place one of the sheets in the bottom of the cake pan pressing down gently.\r\n \r\nAt this point one mixes together the sugar, cornflour, and custard powder in a saucepan. Slowly add the milk till smooth and combined, without any lumps. Turn on the hob burner to medium high and set the saucepan on top. Add in the butter and stir as it melts and the mixture comes to a boil.\r\n \r\nContinue to stir as it thickens, this usually takes around three minutes to attain a good thick consistency.\r\n \r\nNow take it off the heat and stir in the egg yolk and vanilla extract, making sure to mix well and quickly. You can then cover it with cling film and set aside to cool down to room temperature.\r\n \r\nTaking out a small saucepan and a heatproof bowl, set up a \'water bath\' on the hob by filling the saucepan 3/4 full with water and setting it to simmer (low boil). Pop the bowl on top in a lid-like capacity and then pop in the icing sugar, butter and passion fruit pulp from the icing list. Stir that all together over the simmering water until it melts together into a smooth pourable icing. Set aside.\r\n \r\nIn another bowl whip the thickened cream, with a hand mixer, until it forms stif peaks. Then gently fold half of the cream into the custard mixture at a time, using gentle motions and a rounded implement to reduce the number of bubbles in the cream that break.\r\n \r\nOnce all the whipped cream has been combined carefully then spread the mixture out over the puff pastry in the cake pan. Take care to make it as smooth as possible as you don\'t want air pockets under the top layer of pastry. When your happy with that, gently place the second measured slice of puff pastry on top, pressing down a bit to \'seat\' the pastry into the custard.\r\n \r\nPour the icing on top, spreading gently so as not to disturbed what ever flakiness the top pastry has. Cover and cool for a minimum of three hours or overnight.'),(8,'Mix the cumin, coriander and paprika (seasoning ingredients) together with a good grinding of black pepper and a sprinkling of salt, then set aside in a large dish. Heat grill to high. On a board, flatten out the chicken slightly, then drizzle half the oil over and toss in the seasoning until completely coated. Heat the remaining oil in a large frying pan, sizzle the chicken for 5 mins on each side until firm, push to one side of the pan, then fry the bacon for a few mins until cooked.\r\n\r\nWhile the chicken is cooking, halve, stone, peel and slice the avocados, and toast the cut sides of the buns. Cover the tops of the buns with cheese, then grill until melted.\r\n\r\nTo assemble the burgers, spread the buns with mayonnaise if you want, top with a handful of spinach, then a rasher of bacon. To keep the avocado in place, slice the chicken, then alternate between a slice of chicken and avocado. Top with the bun, press down lightly and serve.\r\n'),(9,'Heat oven to 180C/160C fan/gas 4. Line a 20 x 30cm baking tray tin with baking parchment. Put the chocolate, butter and sugar in a pan and gently melt, stirring occasionally with a wooden spoon. Remove from the heat. Stir the eggs, one by one, into the melted chocolate mixture. Sieve over the flour and cocoa, and stir in. Stir in half the raspberries, scrape into the tray, then scatter over the remaining raspberries. Bake on the middle shelf for 30 mins or, if you prefer a firmer texture, for 5 mins more. Cool before slicing into squares. Store in an airtight container for up to 3 days');
/*!40000 ALTER TABLE `narrative_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_ingredients`
--

DROP TABLE IF EXISTS `recipe_ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_ingredients` (
  `ingredient_pool_id` int(11) NOT NULL,
  `ingredient_name` varchar(200) NOT NULL,
  PRIMARY KEY (`ingredient_pool_id`,`ingredient_name`),
  CONSTRAINT `ingredients_fk1` FOREIGN KEY (`ingredient_pool_id`) REFERENCES `ingredient_pools` (`pool_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_ingredients`
--

LOCK TABLES `recipe_ingredients` WRITE;
/*!40000 ALTER TABLE `recipe_ingredients` DISABLE KEYS */;
INSERT INTO `recipe_ingredients` VALUES (1,'1 garlic clove'),(1,'1 small lemongrass stalk'),(1,'1 small onion'),(1,'1 tablespoon chopped fresh coriander'),(1,'1 teaspoon caster sugar'),(1,'1 teaspoon finely grated lime zest'),(1,'1 teaspoon fish sauce'),(1,'200 g minced beef'),(1,'30 g fresh white breadcrumbs'),(1,'light flavoured oil, such as rapeseed, for brushing'),(2,''),(2,'1 cup grated Canadian Cheddar'),(2,'1 cup milk'),(2,'1 pound of smoke fish fillets'),(2,'2 medium tomatoes sliced and marinated in French Dressing'),(2,'2 tablespoons butter, melted'),(2,'3 cups cooked rice'),(2,'3 eggs beaten'),(3,'0.25  teaspoon celery salt'),(3,'0.25  teaspoon of black pepper'),(3,'0.25  teaspoon sage'),(3,'0.5 cup of boiling water'),(3,'1 garlic clove, chopped'),(3,'1 small onion minced'),(3,'1.5 pounds of ground lean pork'),(3,'1.5 teaspoons salt'),(3,'pinch of ground cloves'),(4,'1 ripe tomato, peeled and seeded'),(4,'100 g runner beans, cut diagonally into slices'),(4,'100 g young spinach leaves'),(4,'1⁄2 tablespoon pesto'),(4,'2 salad onions, thinly sliced'),(4,'225 g small new potatoes, scrubbed, cut into bite-sized pieces if necessary'),(4,'325 g ripe mixed tomatoes, (e.g. plum tomatoes, quartered lengthways; yellow and red cherry tomatoes, halved; beefsteak tomatoes, cut into wedges)'),(4,'salt and freshly ground black pepper'),(5,'1 garlic clove, finely chopped'),(5,'1 small red chilli, finely chopped'),(5,'1 small red onion, thinly sliced'),(5,'1 tablespoon olive oil 1/2 small red pepper, deseeded and thinly sliced'),(5,'1 tablespoon red wine vinegar'),(5,'1 teaspoon ground cumin'),(5,'100 g feta cheese, crumbled'),(5,'125 ml passata'),(5,'2 tomatoes, chopped'),(5,'50 g dried black beans '),(5,'corn chips, to serve '),(6,'1 garlic clove'),(6,'1 lime'),(6,'1 small lemongrass stalk'),(6,'1 small onion'),(6,'1 tablespoon fresh coriander'),(6,'1 teaspoon caster sugar'),(6,'1 teaspoon fish sauce'),(6,'200 g minced beef'),(6,'30 g fresh white breadcrumbs'),(6,'light flavoured oil, such as rapeseed, for brushing'),(7,'1 garlic clove'),(7,'1 small lemongrass stalk'),(7,'1 small onion'),(7,'1 tablespoon chopped fresh coriander'),(7,'1 teaspoon caster sugar '),(7,'1 teaspoon finely grated lime zest'),(7,'1 teaspoon fish sauce'),(7,'200 g minced beef'),(7,'30 g fresh white breadcrumbs'),(7,'light flavoured oil, such as rapeseed, for brushing'),(8,'1 cup grated Canadian Cheddar'),(8,'1 cup milk'),(8,'1 pound of smoke fish fillets'),(8,'2 medium tomatoes sliced and marinated in French Dressing'),(8,'2 tablespoons butter, melted'),(8,'3 cups cooked rice'),(8,'3 eggs beaten'),(9,'.5 cup French Dressing'),(9,'1 .5 cups of rice'),(9,'1 block of Canadian Cheddar Cheese'),(9,'1 cup milk'),(9,'1 pound smoke fish fillets'),(9,'2 medium tomatoes'),(9,'2 tablespoons of butter'),(9,'3 eggs'),(9,'Green Onions or Chives'),(10,'0.25  teaspoon celery salt'),(10,'0.25  teaspoon of black pepper'),(10,'0.25  teaspoon sage'),(10,'0.33 cup cold water'),(10,'0.33 cup of cold lard, cubed'),(10,'0.5 cup of boiling water'),(10,'0.67 cup of cold unsalted butter, cubed'),(10,'0.75 tsp salt'),(10,'1 garlic clove, chopped'),(10,'1 small onion minced'),(10,'1.5 pound of ground lean pork'),(10,'1.5 teaspoons salt'),(10,'2.5 cups of all purpose flour'),(10,'pinch of ground cloves'),(11,'0.25 teaspoon black pepper'),(11,'0.25 teaspoon celery salt'),(11,'0.25 teaspoon sage'),(11,'0.5 cup of water'),(11,'1 garlic clove'),(11,'1 knife-tip of ground cloves'),(11,'1 small onion'),(11,'1.5 pounds of ground lean pork'),(11,'1.5 teaspoon of salt'),(11,'3 potatoes'),(12,'1 garlic clove, finely chopped'),(12,'1 small red chilli, finely chopped'),(12,'1 small red onion, thinly sliced'),(12,'1 tablespoon olive oil'),(12,'1 tablespoon red wine vinegar'),(12,'1 teaspoon ground cumin'),(12,'1/2 small red pepper, deseeded and thinly sliced'),(12,'100 g feta cheese, crumbled'),(12,'125 ml passata'),(12,'2 tomatoes, chopped'),(12,'50 g dried black beans'),(12,'corn chips, to serve'),(13,'1 garlic clove'),(13,'1 small red chilli'),(13,'1 small red onion'),(13,'1 tablespoon olive oil'),(13,'1 tablespoon red wine vinegar'),(13,'1 teaspoon ground cumin'),(13,'1/2 small red pepper'),(13,'100 g feta cheese'),(13,'125 ml passata'),(13,'2 tomatoes'),(13,'50 g dried black beans, or 100g canned red kidney beans'),(13,'corn chips to serve'),(14,'0.25 c (30g) custard powder\r\n'),(14,'0.5 c (110g) caster sugar'),(14,'0.5c (75g) cornflour\r\n'),(14,'0.75c (180ml) thickened cream'),(14,'1 egg yolk\r\n'),(14,'1 tsp vanilla extract\r\n'),(14,'2 sheets ready-rolled puff pastry'),(14,'2.5c (625ml) milk\r\n'),(14,'30g butter'),(15,'0.25 c (30g) custard powder\r\n'),(15,'0.5 c (110g) caster sugar'),(15,'0.5c (75g) cornflour\r\n'),(15,'0.75c (180ml) thickened cream'),(15,'1 egg yolk\r\n'),(15,'1 tsp vanilla extract\r\n'),(15,'2 sheets ready-rolled puff pastry'),(15,'2.5c (625ml) milk\r\n'),(15,'30g butter'),(16,'0.5 c (110g) caster sugar'),(16,'0.5c (75g) cornflour\r\n'),(16,'0.75c (180ml) thickened cream'),(16,'1 egg\r\n'),(16,'1 tsp vanilla extract\r\n'),(16,'2.5c (625ml) milk\r\n'),(16,'30g butter'),(16,'Package of ready- rolled puff pastry'),(16,'powdered custard mix\r\n'),(17,'1 tbsp ground coriander'),(17,'1 tbsp ground cumin'),(17,'1 tbsp paprika'),(17,'2 avocados'),(17,'2 tbsp olive oil'),(17,'4 ciabatta rolls, split'),(17,'4 rashers smoked bacon'),(17,'4 skinless chicken breasts'),(17,'4 small handfuls baby spinach leaves'),(17,'4 thin slices of your favourite cheese'),(17,'mayonnaise, to serve (optional)'),(18,'1 tbsp ground coriander'),(18,'1 tbsp ground cumin'),(18,'1 tbsp paprika'),(18,'2 avocados'),(18,'2 tbsp olive oil'),(18,'4 ciabatta rolls, split'),(18,'4 rashers smoked bacon'),(18,'4 skinless chicken breasts'),(18,'4 small handfuls baby spinach leaves'),(18,'4 thin slices of your favourite cheese'),(18,'mayonnaise, to serve (optional)'),(19,'1 tbsp ground coriander'),(19,'1 tbsp ground cumin'),(19,'1 tbsp paprika'),(19,'2 avocados'),(19,'2 tbsp olive oil'),(19,'4 ciabatta rolls, split'),(19,'4 rashers smoked bacon'),(19,'4 skinless chicken breasts'),(19,'4 small handfuls baby spinach leaves'),(19,'4 thin slices of your favourite cheese'),(19,'mayonnaise, to serve (optional)'),(20,'1 fat garlic clove, finely chopped'),(20,'1 small lemon'),(20,'handful of flat-leaf parsley, roughly torn'),(21,'1 ripe tomato, peeled and seeded'),(21,'100 g runner beans, cut diagonally into slices'),(21,'100 g young spinach leaves'),(21,'1⁄2 tablespoon pesto'),(21,'2 salad onions, thinly sliced'),(21,'225 g small new potatoes, scrubbed, cut into bite-sized pieces if necessary'),(21,'325 g ripe mixed tomatoes, (e.g. plum tomatoes, quartered lengthways; yellow and red cherry tomatoes, halved; beefsteak tomatoes, cut into wedges)'),(21,'salt and freshly ground black pepper'),(22,'1 fat garlic clove, finely chopped'),(22,'1 small lemon'),(22,'handful of flat-leaf parsley, roughly torn'),(23,'1 ripe tomato, peeled and seeded'),(23,'100 g runner beans, cut diagonally into slices'),(23,'100 g young spinach leaves'),(23,'1⁄2 tablespoon pesto'),(23,'2 salad onions, thinly sliced'),(23,'225 g small new potatoes, scrubbed, cut into bite-sized pieces if necessary'),(23,'325 g ripe mixed tomatoes, (e.g. plum tomatoes, quartered lengthways; yellow and red cherry tomatoes, halved; beefsteak tomatoes, cut into wedges)'),(23,'salt and freshly ground black pepper'),(24,'1 fat garlic clove, finely chopped'),(24,'1 small lemon'),(24,'handful of flat-leaf parsley, roughly torn'),(25,'0.25 c (60ml) passion fruit pulp'),(25,'1 tsp soft butter'),(25,'1.5c (240g) icing sugar\r\n'),(26,'0.25 c (60ml) passion fruit pulp'),(26,'1 tsp soft butter'),(26,'1.5c (240g) icing sugar\r\n'),(27,'1 can passion fruit pulp'),(27,'1 tsp soft butter'),(27,'1.5c (240g) icing sugar\r\n'),(28,'0.33 cup cold water'),(28,'0.33 cup of cold lard\r\n'),(28,'0.67 cup of cold unsalted butter\r\n'),(28,'0.75 teaspoon of salt'),(28,'2.5 cups of flour'),(29,'100g milk chocolate, broken into chunks'),(29,'140g plain flour'),(29,'200g dark chocolate, broken into chunks'),(29,'200g raspberries'),(29,'250g pack salted butter'),(29,'4 large eggs'),(29,'400g soft light brown sugar'),(29,'50g cocoa powder'),(30,'100g milk chocolate, broken into chunks'),(30,'140g plain flour'),(30,'200g dark chocolate, broken into chunks'),(30,'200g raspberries'),(30,'250g pack salted butter'),(30,'4 large eggs'),(30,'400g soft light brown sugar'),(30,'50g cocoa powder'),(31,'100g milk chocolate, broken into chunks'),(31,'140g plain flour'),(31,'200g dark chocolate, broken into chunks'),(31,'200g raspberries'),(31,'250g pack salted butter'),(31,'4 large eggs'),(31,'400g soft light brown sugar'),(31,'50g cocoa powder');
/*!40000 ALTER TABLE `recipe_ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmented_method`
--

DROP TABLE IF EXISTS `segmented_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmented_method` (
  `recipe_id` int(11) NOT NULL,
  `segmented_step_id` int(11) NOT NULL,
  `segmented_step_description` longtext NOT NULL,
  PRIMARY KEY (`recipe_id`,`segmented_step_id`),
  CONSTRAINT `segmented_fk1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmented_method`
--

LOCK TABLES `segmented_method` WRITE;
/*!40000 ALTER TABLE `segmented_method` DISABLE KEYS */;
INSERT INTO `segmented_method` VALUES (1,1,'Peel and finely grate the onion.'),(1,2,'Peel and crush the garlic.'),(1,3,'Finely chop the white part of the lemongrass.'),(1,4,'Place the beef, onion, breadcrumbs, garlic, coriander, lime zest, lemongrass, fish sauce and sugar in a large bowl.'),(1,5,'Mix well with your hands.'),(1,6,'Shape into 2 patties. '),(1,7,'Cover and chill for at least 10 minutes.'),(1,8,'Heat a barbecue or griddle pan until hot. '),(1,9,'Brush the burgers with a little oil.'),(1,10,'Cook for 4 minutes on each side or until cooked through.'),(1,11,'Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce. '),(2,1,'Preheat oven to 350 degrees F'),(2,2,'Marinate tomatoes in French Dressing'),(2,3,'Cut fish into pieces 2-3 inches long and place in a shallow baking dish.'),(2,4,'Add milk and bake for 20 minutes.'),(2,5,'Drain to reserve ¾ cup of the liquid'),(2,6,'Make a crust by combining the rice, butter and beating in one egg.'),(2,7,'Grease a pie plate and turn crusted into the plate evenly over the bottom.  Make sure sides and rim form a pie shell.'),(2,8,'Sprinkle shell with half of the cheese and arrange fish on top.  Then sprinkle remainder of the cheese.'),(2,9,'Combine the reserved liquid with egg and create a base for the quiche.  Pour into pie plate and bake for 30 minutes.'),(2,10,'Remove from oven and arrange tomatoes with the skin up around the outside.  Return to oven and bake for 10 minutes.'),(2,11,'Garnish with chives or chopped green onions.'),(3,1,'Retrieve a 3-quart saucepan and combine meat, water, spices and garlic.'),(3,2,'Cook over low heat, stiring constantly until meat is brown and half the liquid is gone.'),(3,3,'Cover and cook for about 45 minutes.'),(3,4,'While cooking meat, prepare potatoes.  Boil and mash.'),(3,5,'Mix the meat and potatoes and allow them to cool.'),(3,6,'Preheat oven to 450 degrees F'),(3,7,'Prepare crust for 2-crust, 9-inch pie.  Whisk the flour and salt.'),(3,8,'Blend or cut in butter and lard until it is in coarse crumbs.'),(3,9,'Drizzle with water, tossing a while with a fork until ragged dough forms, and adding 1 tablespoon more water if necessary.'),(3,10,'Divide dough in half and shape into disks.  Wrap and chill in fridge for 30 min.'),(3,11,'Roll out 1 dough into a 9-inch pie crust and line a pie plate.  Fill with the meat mixture.  Roll out and cover the pie with the second dough.'),(3,12,'Bake at 450 degrees F for 10 minutes and reduce heat to 350 degrees F.  Bake for 30-40 more minutes.'),(4,1,'Cook the potatoes in a large pan of lightly salted boiling water for 10-12\r\nminutes or until just tender. '),(4,2,'Add the runner beans and cook for a further 2 minutes. Then drain and rinse under cold running water. '),(4,3,'Toss the potatoes and beans with the mixed tomatoes, salad onions and spinach and season to taste. '),(4,4,'For the gremolata, use a vegetable peeler to pare thin strips of rind from the lemon. Carefully remove as much white pith as possible (this is bitter). Finely chop the lemon rind and toss with the garlic and parsley. Season and set aside. '),(4,5,'Squeeze the juice from the lemon and whizz in a food processor with the peeled tomato and pesto for 10-15 seconds. \r\n'),(4,6,'Pour over the potato mixture and toss through. '),(4,7,'Scatter over the gremolata to serve. '),(6,1,'Soak the black beans in cold water overnight.'),(6,2,'Drain and rinse well.'),(6,3,'Put them in a large saucepan with plenty of water.'),(6,4,'Bring to the boil.'),(6,5,'Cook for 25-30 minutes, until soft to the bite.'),(6,6,'Drain well.'),(6,7,'Set aside.'),(6,8,'Heat the oil in a saucepan set over high heat.'),(6,9,'Add the red pepper and onion.'),(6,10,'Reduce the heat to low.'),(6,11,'Cover and cook for about 8 minutes.'),(6,12,'Add the cumin, garlic and chillies.'),(6,13,'Cook for a further 2 minutes.'),(6,14,'Add the beans, tomatoes, vinegar and passata.'),(6,15,'Bring to the boil.'),(6,16,'Reduce the heat'),(6,17,'Simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy.'),(6,18,'Preheat the grill to high.'),(6,19,'Transfer the bean mixture to a flameproof dish.'),(6,20,'Sprinkle the crumbled feta over the top.'),(6,21,'Cook under the hot grill until the cheese is soft and just starting to brown.'),(6,22,'Serve hot with corn chips on the side for dipping.   '),(7,1,'Preheat oven to 240°C/220°C fan-forced. Grease deep, 23cm square cake pan; line with foil, extending the foil 10cm over the sides of pan.'),(7,2,'Place each pastry sheet on separate greased oven trays. Bake about 15 minutes, cool and flatten pastry with hands; place one pastry sheet in pan, trim to fit if necessary.'),(7,3,'Meanwhile, combine sugar, cornflour and custard powder in a medium saucepan; gradually add milk stirring until smooth. Add butter; stir over heat until mixture boils and thickens. Simmer, stirring, about 3minutes or until custard is thick and smooth. Remove from heat; stir in egg yolk and extract. Cover surface with clingfilm; cool to room temperature.'),(7,4,'Make passion fruit icing; place all ingredients into a heatproof bowl over a small saucepan of simmering water; stir until icing is spreadable.'),(7,5,'Whip cream till peaks form. Fold into custard in two batches. Spread custard mixture over pastry in pan. Top with remaining pastry, trim to fit if necessary; press down slightly. Spread pastry with icing; refrigerate 3 hours or overnight.'),(8,1,'Mix the cumin, coriander and paprika (seasoning ingredients) together with a good grinding of black pepper and a sprinkling of salt, then set aside in a large dish. Heat grill to high. On a board, flatten out the chicken slightly, then drizzle half the oil over and toss in the seasoning until completely coated. Heat the remaining oil in a large frying pan, sizzle the chicken for 5 mins on each side until firm, push to one side of the pan, then fry the bacon for a few mins until cooked.'),(8,2,'While the chicken is cooking, halve, stone, peel and slice the avocados, and toast the cut sides of the buns. Cover the tops of the buns with cheese, then grill until melted.'),(8,3,'To assemble the burgers, spread the buns with mayonnaise if you want, top with a handful of spinach, then a rasher of bacon. To keep the avocado in place, slice the chicken, then alternate between a slice of chicken and avocado. Top with the bun, press down lightly and serve.'),(9,1,'Heat oven to 180C/160C fan/gas 4. Line a 20 x 30cm baking tray tin with baking parchment. Put the chocolate, butter and sugar in a pan and gently melt, stirring occasionally with a wooden spoon. Remove from the heat.'),(9,2,'Stir the eggs, one by one, into the melted chocolate mixture. Sieve over the flour and cocoa, and stir in. Stir in half the raspberries, scrape into the tray, then scatter over the remaining raspberries. Bake on the middle shelf for 30 mins or, if you prefer a firmer texture, for 5 mins more. Cool before slicing into squares. Store in an airtight container for up to 3 days');
/*!40000 ALTER TABLE `segmented_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `step_method`
--

DROP TABLE IF EXISTS `step_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `step_method` (
  `recipe_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `step_description` longtext NOT NULL,
  PRIMARY KEY (`recipe_id`,`step_id`),
  CONSTRAINT `step_fk1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `step_method`
--

LOCK TABLES `step_method` WRITE;
/*!40000 ALTER TABLE `step_method` DISABLE KEYS */;
INSERT INTO `step_method` VALUES (1,1,'Peel and finely grate 1 onion and place in a large bowl.'),(1,2,'Peel and crush 1 garlic clove, add to the bowl.'),(1,3,'Finely chop the white part of 1 lemongrass stalk, add to the bowl.'),(1,4,'Chop a sprig coriander leaves, add 1 tablespoon of leaves to the bowl.'),(1,5,'Zest 1 lime. Add 1 teaspoon of the zest to the bowl.'),(1,6,'Add the 200g beef, 30g breadcrumbs, 1 teaspoon fish sauce and 1 teaspoon sugar to the bowl.'),(1,7,'Mix well with your hands.'),(1,8,'Shape into 2 burgers.'),(1,9,'Cover and chill for at least 10 minutes.'),(1,10,'Heat a barbecue or griddle pan until hot.'),(1,11,'Brush the burgers with a little oil.'),(1,12,'Cook for 4 minutes on each side or until cooked through.'),(1,13,'Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce. '),(2,1,'Slice tomatoes into 6 wedges each'),(2,2,'Place tomato wedges in a bowl with French dressing to marinade'),(2,3,'Cut fish into slices of 2-3 inches long'),(2,4,'Place tomatoes in baking pan'),(2,5,'Place fish in baking pan'),(2,6,'Add milk to baking pan'),(2,7,'Heat oven to 350 degrees F'),(2,8,'Bake fish mixture for 20 min'),(2,9,'While fish is baking, boil rice until soft.'),(2,10,'Melt butter in a small saucepan'),(2,11,'Remove baking dish from oven and drain into bowl retaining at least 0.75 of the mixture.'),(2,12,'Make rice crust. Place 3 cups of cooked rice and 2 tablespoons of melted butter in a bowl and mix.  '),(2,13,'Beat 1 egg and whip it into the rice crust mixture.'),(2,14,'Spread rice crust mixture into a small pie plate.  Make the bottom even and ensure top of the plate is reached.'),(2,15,'Grate 0.5 cup of cheese'),(2,16,'Sprinkle 0.5 cup of grated cheese onto pie crust.'),(2,17,'Lay out fish slides in pie crust.'),(2,18,'Grate 0.5 cup of cheese.'),(2,19,'Sprinkle 0.5 cup of grated cheese onto pie topping.'),(2,20,'Beat 2 eggs.'),(2,21,'Mix 2 beaten eggs with reserved mixture from fish and tomato bake.'),(2,22,'Pour egg mixture into pie crush.'),(2,23,'Bake for 30 min at 30 degrees F'),(2,24,'Remove from oven.'),(2,25,'Place tomato wedges around the edge with skin up.'),(2,26,'Bake for 10 more min.'),(2,27,'Chop green onions or chives.'),(2,28,'Place green onions or chives on top of baked pie.'),(3,1,'Get one 3-quart saucepan'),(3,2,'Mince 1 small onion finely'),(3,3,'Heat saucepan on low heat'),(3,4,'Add 1.5 pounds of ground lean pork to saucepan'),(3,5,'Mix in 1 minced onion to meat'),(3,6,'Mix in 1.5 teaspoons of salt.'),(3,7,'Mix in 0.25 teaspoon of celery salt'),(3,8,'Mix in .25  teaspoon of back pepper'),(3,9,'Mix in .25  teaspoon of sage'),(3,10,'Mix in 1 knife-tip of ground cloves (1/16 teaspoon)'),(3,11,'Chop 1 garlic clove'),(3,12,'Mix in 1 garlic clove'),(3,13,'Cook while stirring slowly on low heat.  Stop when meat has turned brown and half of the liquid has evaporated.'),(3,14,'Cover pan and cook on low heat for 45 minutes.'),(3,15,'While meat is cooking boil a large pot of water.  '),(3,16,'Place 3 potatoes in pot and boil until soft.'),(3,17,'Mash potatoes.'),(3,18,'When meat is done cooking, mix in potatoes and allow to cool.'),(3,19,'While cooling, make pie crust.  Begin by filling mixing bowl with 2 .5 cups of flour and .75 teaspoon of salt.'),(3,20,'Cube 2/3 cup of butter'),(3,21,'Cube 1/3 cup of lard'),(3,22,'Blend in butter and lard to flour mixture'),(3,23,'Drizzle in small amounts of water while mixing until you reach 1/3 cup.  You may need to mix in an additional 1 teaspoon of water.  Mix until the texture is coarse.'),(3,24,'Divide dough into 2.  '),(3,25,'Roll dough into disks.'),(3,26,'Cover dough with cling film and allow to cool in the fridge for 30 min.'),(3,27,'Roll one dough out to cover 9-inch pie plate.'),(3,28,'Cover 9-inch pie plate with pie crust dough.'),(3,29,'Add the cooled meat and potato mixture.'),(3,30,'Roll one dough out to form the top of the pie.'),(3,31,'Cover pie top.'),(3,32,'Flute and seal the pie.'),(3,33,'Preheat oven to 450 degrees F.'),(3,34,'Cook pie for 10 minutes at 450 degrees F.'),(3,35,'Reduce heat to 350 degrees F.'),(3,36,'Cook for 30-40 min at 350 degrees F.'),(4,1,'Fill a large pot with water and lightly salt.'),(4,2,'Boil water.'),(4,3,'Scrub and clean potatoes while the water boils. '),(4,4,'If potatoes are large, cut into bite-sized pieces.'),(4,5,'Add 225g of small new potatoes to boiling water and boil for approximately 10-12 minutes.'),(4,6,'Cut runner beans diagonally into slices.'),(4,7,'Add runner beans to boiling water and cook for a further 2 minutes.'),(4,8,'Drain and rinse potatoes and beans under cold running water.'),(4,9,'Quarter 325 g of ripe mixed tomatoes into slices.'),(4,10,'Slice 2 salad onions thinly.'),(4,11,'Remove 100 g of spinach leaves and brush clean.'),(4,12,'Toss tomatoes, onions, spinach and boiled vegetables together.  '),(4,13,'Season with salt and pepper to taste.'),(4,14,'For the gremolata, use a vegetable peeler to pare thin strips of rind from 1 lemon. '),(4,15,'Carefully remove as much white pith as possible (this is bitter) from the lemon. '),(4,16,'Chop 1 garlic clove very finely'),(4,17,'Tear the flat leave parsley into small pieces.'),(4,18,'Finely chop the lemon rind. '),(4,19,'Toss lemon rind with the garlic and parsley. '),(4,20,'Season with salt and pepper and set gremolata aside. '),(4,21,'Squeeze the juice from the lemon.'),(4,22,'Peel and de-seed one tomato.'),(4,23,'Add lemon juice, tomatoes and pesto to a food processor and slice finely for 10-15 seconds. '),(4,24,'Pour over the potato mixture and toss thoroughly. '),(4,25,'Scatter over the gremolata to serve. '),(6,1,'Soak 50g black beans in cold water overnight OR use 100g canned red kidney beans and skip to step 7.'),(6,2,'Drain and rinse well.'),(6,3,'Put them in a large saucepan with plenty of water.'),(6,4,'Bring to the boil.'),(6,5,'Cook for 25-30 minutes, until soft to the bite.'),(6,6,'Drain well and set aside.'),(6,7,'Deseed 1/2 red pepper and slice thinly and place on a small dish.'),(6,8,'Thinly slice 1 red onion. Add to the red pepper.'),(6,9,'Finely chop 1 garlic clove and place on another small dish.'),(6,10,'Finely chop 1 red chilli. Add to the garlic.'),(6,11,'Add 1 teaspoon ground cumin to the chilli and garlic. '),(6,12,'Chop 2 tomatoes.'),(6,13,'Heat the oil in a saucepan set over high heat.'),(6,14,'Add the red pepper and onion.'),(6,15,'Reduce the heat to low.'),(6,16,'Cover and cook for about 8 minutes.'),(6,17,'Add the cumin, garlic and chillies.'),(6,18,'Cook for a further 2 minutes.'),(6,19,'Add the beans, tomatoes, 1 tablespoon vinegar and 125ml passata.'),(6,20,'Bring to the boil.'),(6,21,'Reduce the heat.'),(6,22,'Simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy. '),(6,23,'Preheat the grill to high.'),(6,24,'Transfer the bean mixture to a flameproof dish.'),(6,25,'Crumble 100g feta cheese.'),(6,26,'Sprinkle the crumbled feta over the top of the bean mixture.'),(6,27,'Cook under the hot grill until the cheese is soft and just starting to brown.'),(6,28,'Serve hot with corn chips on the side for dipping. '),(7,1,'Preheat oven to 240 Celsius (220 Celsius fan driven)'),(7,2,'Grease a deep 23cm square cake pan.'),(7,3,'Line the pan with foil, extending foil 10cm over sides of pan to act as handles to release the delicate slice once finished.'),(7,4,'Grease two oven trays and set aside.'),(7,5,'Opening your package of puff pastry and removing two sheets put them on the oven trays.'),(7,6,'Once oven is hot bake puff pastry sheets15 minutes then cool.'),(7,7,'Flatten out with your hand.'),(7,8,'Measure and trim both to fit into the cake pan.'),(7,9,'Place one of the two into the bottom of the pan.'),(7,10,'Add 110 grams of sugar to a medium saucepan'),(7,11,'Add 75 grams cornflour to the saucepan.'),(7,12,'Add powdered custard mix to the saucepan. '),(7,13,'Then gradually add the 625 ml milk, stirring until smooth.'),(7,14,'Set burner to medium high heat'),(7,15,'Add 30g of butter to the saucepan.'),(7,16,'Then stir until mixture boils; simmer while stirring, about 3 minutes or until custard is thick and smooth.'),(7,17,'Remove from heat.'),(7,18,'Separate the yolk from the white of 1 egg, set the white aside, it is unneeded.'),(7,19,'Add the egg yolk to the custard mixture.'),(7,20,'Add 1 tsp of vanilla extract as well.'),(7,21,'Stir the custard mixture well.'),(7,22,'Cover with plastic wrap and set aside to cool to room temperature.'),(7,23,'For the icing, get a small saucepan and a heatproof bowl.'),(7,24,'Fill the saucepan 2/3 the way with water and heat on high till it simmers (low boil).'),(7,25,'Set the heatproof bowl overtop like a lid so it gently warms the bottom.'),(7,26,'Add 240 grams of icing sugar to the heatproof bowl.'),(7,27,'Add 1 tsp of soft butter to the heatproof bowl.'),(7,28,'Add 1 can of passion fruit pulp to the heat proof bowl.'),(7,29,'Mix until the icing is spreadable and pours gently off of your spoon.'),(7,30,'Get out a hand mixer and medium mixing bowl.'),(7,31,'On a medium setting whip the 180 ml thickened cream until it forms stiff peaks.'),(7,32,'Using a spatula, fold it into the custard mixture gently, to not break the bubbles. It\\\'s best to do this in two halves to be more manageable.'),(7,33,'Spread the mixture over the puff pastry in the bottom of the cake pan, smoothing it out.'),(7,34,'Top with the other sheet of the pastry and gently press into the custard.'),(7,35,'Spread the icing over the top smoothly.'),(7,36,'Leave to rest overnight or at least 3 hours.'),(8,1,'Mix the cumin, coriander and paprika (seasoning ingredients) together with a good grinding of black pepper and a sprinkling of salt, then set aside in a large dish. Heat grill to high.'),(8,2,'On a board, flatten out the chicken slightly, then drizzle half the oil over and toss in the seasoning until completely coated. '),(8,3,'Heat the remaining oil in a large frying pan, sizzle the chicken for 5 mins on each side until firm, push to one side of the pan, then fry the bacon for a few mins until cooked.'),(8,4,'While the chicken is cooking, halve, stone, peel and slice the avocados, and toast the cut sides of the buns. Cover the tops of the buns with cheese, then grill until melted.'),(8,5,'To assemble the burgers, spread the buns with mayonnaise if you want, top with a handful of spinach, then a rasher of bacon. To keep the avocado in place, slice the chicken, then alternate between a slice of chicken and avocado. Top with the bun, press down lightly and serve.'),(9,1,'Heat oven to 180C/160C fan/gas 4. Line a 20 x 30cm baking tray tin with baking parchment.'),(9,2,'Put the chocolate, butter and sugar in a pan and gently melt, stirring occasionally with a wooden spoon. Remove from the heat.'),(9,3,'Stir the eggs, one by one, into the melted chocolate mixture. Sieve over the flour and cocoa, and stir in. Stir in half the raspberries, scrape into the tray, then scatter over the remaining raspberries.'),(9,4,'Bake on the middle shelf for 30 mins or, if you prefer a firmer texture, for 5 mins more.'),(9,5,'Cool before slicing into squares. Store in an airtight container for up to 3 days.');
/*!40000 ALTER TABLE `step_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_display_name` varchar(200) NOT NULL,
  `main_category` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Main_Dish','Main Dish',0),(2,'Side_Dish','Side Dish',0),(3,'Dessert','Dessert',0),(4,'Salad','Salad',0),(5,'Allergen_free','Allergen Free',0),(6,'Nut_free','Nut Free',5),(7,'Quick_meals','Quick Meals',0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_title` varchar(300) NOT NULL,
  `recipe_date` datetime NOT NULL,
  `recipe_servings` int(11) NOT NULL,
  `recipe_image` varchar(200) NOT NULL,
  `recipe_image_alt` longtext NOT NULL,
  `recipe_description` longtext NOT NULL,
  `recipe_cook_time` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipes`
--

LOCK TABLES `recipes` WRITE;
/*!40000 ALTER TABLE `recipes` DISABLE KEYS */;
INSERT INTO `recipes` VALUES (1,'Beef Burgers','2014-02-27 00:00:00',2,'burger.gif','Succulent beef burgers with onion and garlic. ','Succulent beef burgers with onion and garlic. ',0),(2,'Quiche Maritime','2014-02-27 00:00:00',4,'Quiche.jpg','Quiche is a savoury, open-faced pastry crust with a filling.','An egg recipe from the Canadian Maritime provinces. This all-time favourite is perfect for a relaxed picnic with friends.',0),(3,'Tourtiere','2014-02-23 00:00:00',4,'tourtiere.jpg','A meat pie originating from Lower Canada, usually made with finely diced pork, veal or beef. ','A meat pie originating from Lower Canada, usually made with finely diced pork, veal or beef.',0),(4,'Potato, bean and tomato salad with gremolata','2014-02-23 00:00:00',4,'Gremolata.jpg','Salad with gremolata. ','Simple to make, stunning to look at and great to eat - what more could you want! Gremolata is an aromatic mixture of zesty lemon, pungent garlic and flavourful flat leaf parsley. Serve this salad warm or cold, with plenty of crusty bread to mop up all those tasty juices.',0),(6,'Black Bean Dip','2014-02-23 00:00:00',4,'BlackBeanDip.jpg','This lively dip can be made in minutes. Serve with baked tortilla chips.','This lively dip can be made in minutes. Serve with baked tortilla chips.',180),(7,'Vanilla Slice','2014-03-25 00:00:00',16,'vanilla_slice.jpg','Thick and rich custard between puff pastry sheets makes a wonderful snack or dessert.','Thick and rich custard between puff pastry sheets makes a wonderful snack or dessert.',40),(8,'Chicken Burgers','2014-02-28 00:00:00',4,'Chicken_Burger.jpg','Succulent chicken burger with bacon, avocado and cheese.','Grilled Cajun-spiced chicken breasts topped with bacon, avocado and cheese... set to become a Friday night favourite',35),(9,'Chocolate raspberry brownies','2014-04-15 00:00:00',15,'brownie.jpg','Deliciously squidgy brownie squares','Squidgy and super moreish, these gorgeous foolproof fruity chocolate bakes will be snapped up in seconds',50);
/*!40000 ALTER TABLE `recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient_pools`
--

DROP TABLE IF EXISTS `ingredient_pools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredient_pools` (
  `pool_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `pool_name` varchar(200) NOT NULL,
  `difficulty` enum('narrative','segmented','step') NOT NULL,
  PRIMARY KEY (`pool_id`,`recipe_id`,`difficulty`,`pool_name`),
  KEY `ingr_pools_fk1_idx` (`recipe_id`),
  CONSTRAINT `ingr_pools_fk1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient_pools`
--

LOCK TABLES `ingredient_pools` WRITE;
/*!40000 ALTER TABLE `ingredient_pools` DISABLE KEYS */;
INSERT INTO `ingredient_pools` VALUES (1,1,'Beef_Burger_Narrative','narrative'),(6,1,'Beef_Burger_Step','step'),(7,1,'Beef-Burger_Seg','segmented'),(2,2,'Quiche_Narrative','narrative'),(8,2,'Quiche_Seg','segmented'),(9,2,'Quiche_Step','step'),(3,3,'Tourtiere_Narrative','narrative'),(10,3,'Tourtiere_Seg','segmented'),(11,3,'Tourtiere Filling','step'),(28,3,'Tourtiere Crust','step'),(4,4,'Potato Salad','narrative'),(20,4,'Gremolata','narrative'),(21,4,'Potato Salad','segmented'),(22,4,'Gremolata','segmented'),(23,4,'Potato Salad','step'),(24,4,'Gremolata','step'),(5,6,'Black_Bean_Dip_Narrative','narrative'),(12,6,'Black_Bean_Dip_Seg','segmented'),(13,6,'Black_Bean_Dip_Step','step'),(14,7,'Vanilla Slice','narrative'),(15,7,'Vanilla Slice','segmented'),(16,7,'Vanilla Slice','step'),(25,7,'Icing','narrative'),(26,7,'Icing','segmented'),(27,7,'Icing','step'),(17,8,'Chicken_burger_step','step'),(18,8,'Chicken_burger_seg','segmented'),(19,8,'Chicken_burger_Narrative','narrative'),(29,9,'Chocolate_Brownie_Narrative','narrative'),(30,9,'Chocolate_Brownie_Seg','segmented'),(31,9,'Chocolate_Brownie_Step','step');
/*!40000 ALTER TABLE `ingredient_pools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe_categories`
--

DROP TABLE IF EXISTS `recipe_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe_categories` (
  `recipe_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`,`category_id`),
  KEY `rc_fk_2_idx` (`category_id`),
  CONSTRAINT `rc_fk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rc_fk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe_categories`
--

LOCK TABLES `recipe_categories` WRITE;
/*!40000 ALTER TABLE `recipe_categories` DISABLE KEYS */;
INSERT INTO `recipe_categories` VALUES (1,1),(2,1),(3,1),(8,1),(6,2),(7,3),(9,3),(4,4);
/*!40000 ALTER TABLE `recipe_categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-16 14:22:37
