-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2014 at 12:40 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `IAPT_GROUP`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `category_display_name` varchar(200) NOT NULL,
  `main_category` int(11) NOT NULL DEFAULT '0',
  `category_icon_file` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_display_name`, `main_category`, `category_icon_file`) VALUES
(1, 'Main_Dish', 'Main Dish', 0, NULL),
(2, 'Side_Dish', 'Side Dish', 0, NULL),
(3, 'Dessert', 'Dessert', 0, NULL),
(4, 'Salad', 'Salad', 0, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `categories_view`
--
CREATE TABLE `categories_view` (
`category_id` int(11)
,`category_name` varchar(100)
,`category_display_name` varchar(200)
,`main_category` int(11)
,`category_icon_file` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `category_list_view`
--
CREATE TABLE `category_list_view` (
`categories` varchar(343)
);
-- --------------------------------------------------------

--
-- Table structure for table `ingredient_pools`
--

CREATE TABLE `ingredient_pools` (
  `pool_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `pool_name` varchar(200) NOT NULL,
  `difficulty` enum('narrative','segmented','step') NOT NULL,
  PRIMARY KEY (`pool_id`,`recipe_id`,`difficulty`),
  KEY `ingr_pools_fk1_idx` (`recipe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ingredient_pools`
--

INSERT INTO `ingredient_pools` (`pool_id`, `recipe_id`, `pool_name`, `difficulty`) VALUES
(1, 1, 'Beef_Burger_Narrative', 'narrative'),
(2, 2, 'Quiche_Narrative', 'narrative'),
(3, 3, 'Tourtiere_Narrative', 'narrative'),
(4, 4, 'Potato_Salad_Gremolata_Narrative', 'narrative'),
(5, 6, 'Black_Bean_Dip_Narrative', 'narrative'),
(6, 1, 'Beef_Burger_Step', 'step'),
(7, 1, 'Beef-Burger_Seg', 'segmented'),
(8, 2, 'Quiche_Seg', 'segmented'),
(9, 2, 'Quiche_Step', 'step'),
(10, 3, 'Tourtiere_Seg', 'segmented'),
(11, 3, 'Tourtiere_Step', 'step'),
(12, 6, 'Black_Bean_Dip_Seg', 'segmented'),
(13, 6, 'Black_Bean_Dip_Step', 'step'),
(14, 7, 'Vanilla_Slice_Narrative', 'narrative'),
(15, 7, 'Vanilla_Slice_Seg', 'segmented'),
(16, 7, 'Vanilla_Slice_Step', 'step');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ingredient_pools_view`
--
CREATE TABLE `ingredient_pools_view` (
`recipe_id` int(11)
,`pool_id` int(11)
,`pool_name` varchar(200)
,`difficulty` enum('narrative','segmented','step')
,`ingredients` varchar(343)
);
-- --------------------------------------------------------

--
-- Table structure for table `narrative_method`
--

CREATE TABLE `narrative_method` (
  `recipe_id` int(11) NOT NULL,
  `narrative_body` longtext NOT NULL,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `narrative_method`
--

INSERT INTO `narrative_method` (`recipe_id`, `narrative_body`) VALUES
(1, 'Peel and finely instructions grate the onion and peel and crush the garlic. Finely chop the white part of the lemongrass, then place with the chicken, onion, breadcrumbs, garlic, coriander, lime zest, fish sauce and sugar in a large bowl and mix well with your hands. Shape into 2 patties, cover and chill for at least 10 minutes.\r\nHeat a barbecue or griddle pan until hot. Brush the burgers with a little oil and cook for 4 minutes on each side or until cooked through. Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce. \r\n'),
(2, 'Preheat the oven to 350 degrees F.  Marinate the sliced tomatoes in French Dressing so they are fully coated.  Take the smoked fish fillets and cut them into pieces 2-3 inches long.  Place all into a small baking dish and add milk.  Bake for 20 minutes or until fish separates into flakes with a fork.  \r\nDrain and reserve ¾ cup of liquid for later.  \r\nGrease a pie pltae and make a crust combining the rice, melted butter and 1 egg.  Turn the crust into the pie plate evenly. \r\nSprinkle the pie crust with half of the shredded Cheddar Cheese and then add slices of fish.  Then, sprinkle the other half of the cheese.  Combined the reserved poaching liquid with 2 eggs and pour into pie plate.  Back for 30 min.  Remove from oven and arrange the tomatoes around the edge, skin up.  Bake for 10 more minutes until set.  Garnish with chopped green onions or chives.\r\n'),
(3, 'Cook over low heat in a large saucepan, stirring constantly until meat loses its red colour and about half of the liquid has evaporated.  cover and cook about 45 minutes longer.\r\nBoil and mash potatoes and mix in with the meat and allow to cool.  Preheat oven to 450 degrees F.  Prepare psatry for 2-crust, 9 inch pie.  Roll out half and line a 9-inch pie plate.  Fill with cooled meat mixture.  Roll out remainder of dough and cover pie.  Flute and seal edges.  Slash top of crust.  Bake for 10 min and reduce heat to 350 degrees F and bake for 30-40 minutes.'),
(4, 'Cook the potatoes in a large pan of lightly salted boiling water for 10-12\r\nminutes or until just tender. Add the runner beans and cook for a further 2 minutes. Then drain and rinse under cold running water. Toss the potatoes and beans with the mixed tomatoes, salad onions and spinach and season to taste. For the gremolata, use a vegetable peeler to pare thin strips of rind from the lemon. Carefully remove as much white pith as possible (this is bitter). Finely chop the lemon rind and toss with the garlic and parsley. Season and set aside. Squeeze the juice from the lemon and whizz in a food processor with the peeled tomato and pesto for 10-15 seconds. Pour over the potato mixture and toss through. Scatter over the gremolata to serve.'),
(6, 'Soak the black beans in cold water overnight. Drain and rinse well. Put them in a large saucepan with plenty of water and bring to the boil. Cook for 25-30 minute, until soft to the bite. Drain well and set aside.      \r\nHeat the oil in a saucepan set over high heat and add the red pepper and onion. Reduce the heat to low, cover and cook for about 8 minutes. Add the cumin, garlic and chillies and cook for a further 2 minutes. Add the beans, tomatoes, vinegar and passata and bring to the boil. Reduce the heat and simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy.\r\nPreheat the grill to high.\r\nTransfer the bean mixture to a flameproof dish and sprinkle the crumbled feta over the top. Cook under the hot grill until the cheese is soft and just starting to brown. Serve hot with corn chips on the side for dipping. '),
(7, 'Set the oven to heat to a temperature of 240°C or 220°C with a fan assisted oven. Grease a 23cm square, deep edged, cake pan. Then line it with foil taking care to ensure the foil extends a minimum of 10cm over the edges.\r\n \r\nThen grease two other oven trays to place (and bake) the ready-rolled pastry. Bake for approximately fifteen minutes and then cool. Gently flatten the sheets of pastry by hand.\r\n \r\nOnce done measure and trim the sheets to fit into the square cake pan. Place one of the sheets in the bottom of the cake pan pressing down gently.\r\n \r\nAt this point one mixes together the sugar, cornflour, and custard powder in a saucepan. Slowly add the milk till smooth and combined, without any lumps. Turn on the hob burner to medium high and set the saucepan on top. Add in the butter and stir as it melts and the mixture comes to a boil.\r\n \r\nContinue to stir as it thickens, this usually takes around three minutes to attain a good thick consistency.\r\n \r\nNow take it off the heat and stir in the egg yolk and vanilla extract, making sure to mix well and quickly. You can then cover it with cling film and set aside to cool down to room temperature.\r\n \r\nTaking out a small saucepan and a heatproof bowl, set up a ''water bath'' on the hob by filling the saucepan 3/4 full with water and setting it to simmer (low boil). Pop the bowl on top in a lid-like capacity and then pop in the icing sugar, butter and passion fruit pulp from the icing list. Stir that all together over the simmering water until it melts together into a smooth pourable icing. Set aside.\r\n \r\nIn another bowl whip the thickened cream, with a hand mixer, until it forms stif peaks. Then gently fold half of the cream into the custard mixture at a time, using gentle motions and a rounded implement to reduce the number of bubbles in the cream that break.\r\n \r\nOnce all the whipped cream has been combined carefully then spread the mixture out over the puff pastry in the cake pan. Take care to make it as smooth as possible as you don''t want air pockets under the top layer of pastry. When your happy with that, gently place the second measured slice of puff pastry on top, pressing down a bit to ''seat'' the pastry into the custard.\r\n \r\nPour the icing on top, spreading gently so as not to disturbed what ever flakiness the top pastry has. Cover and cool for a minimum of three hours or overnight.');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_title` varchar(300) NOT NULL,
  `recipe_date` datetime NOT NULL,
  `recipe_servings` int(11) NOT NULL,
  `recipe_image` varchar(200) NOT NULL,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `recipe_title`, `recipe_date`, `recipe_servings`, `recipe_image`) VALUES
(1, 'Beef Burgers', '2014-02-27 00:00:00', 2, 'burger.gif'),
(2, 'Quiche Maritime', '2014-02-27 00:00:00', 4, 'Quiche.jpg'),
(3, 'Tourtiere', '2014-02-23 00:00:00', 4, 'tourtiere.jpg'),
(4, 'Potato, bean and tomato salad with gremolata', '2014-02-23 00:00:00', 4, 'Gremolata.jpg'),
(6, 'Black Bean Dip', '2014-02-23 00:00:00', 4, 'BlackBeanDip.jpg'),
(7, 'Vanilla Slice', '2014-03-25 00:00:00', 16, 'vanilla_slice.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `recipes_view`
--
CREATE TABLE `recipes_view` (
`recipe_id` int(11)
,`recipe_title` varchar(300)
,`recipe_date` datetime
,`category` varchar(343)
,`recipe_servings` int(11)
,`recipe_image` varchar(200)
,`narrative_method` longtext
,`segmented_method` varchar(343)
,`step_method` varchar(343)
);
-- --------------------------------------------------------

--
-- Table structure for table `recipe_categories`
--

CREATE TABLE `recipe_categories` (
  `recipe_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`,`category_id`),
  KEY `rc_fk_2_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe_categories`
--

INSERT INTO `recipe_categories` (`recipe_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(6, 2),
(7, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `recipe_categories_view`
--
CREATE TABLE `recipe_categories_view` (
`recipe_id` int(11)
,`categories` varchar(343)
);
-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `ingredient_pool_id` int(11) NOT NULL,
  `ingredient_name` varchar(200) NOT NULL,
  PRIMARY KEY (`ingredient_pool_id`,`ingredient_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`ingredient_pool_id`, `ingredient_name`) VALUES
(1, '1 garlic clove'),
(1, '1 small lemongrass stalk'),
(1, '1 small onion'),
(1, '1 tablespoon chopped fresh coriander'),
(1, '1 teaspoon caster sugar'),
(1, '1 teaspoon finely grated lime zest'),
(1, '1 teaspoon fish sauce'),
(1, '200 g minced chicken'),
(1, '30 g fresh white breadcrumbs'),
(1, 'light flavoured oil, such as rapeseed, for brushing'),
(2, '1 cup grated Canadian Cheddar'),
(2, '1 cup milk'),
(2, '1 pound of smoke fish fillets'),
(2, '2 medium tomatoes sliced and marinated in French Dressing'),
(2, '2 tablespoons butter, melted'),
(2, '3 cups cooked rice'),
(2, '3 eggs beaten'),
(3, '.25  teaspoon celery salt'),
(3, '.25  teaspoon of black pepper'),
(3, '.25  teaspoon sage'),
(3, '.5 cup of boiling water'),
(3, '1 .5 teaspoons salt'),
(3, '1 garlic clove, chopped'),
(3, '1 small onion minced'),
(3, '1.5 pounds of ground lean pork'),
(3, 'pinch of ground cloves'),
(4, '225 g small new potatoes, scrubbed, cut into bite-sized pieces if necessary'),
(5, '1 garlic clove, finely chopped'),
(5, '1 small red chilli, finely chopped'),
(5, '1 small red onion, thinly sliced'),
(5, '1 tablespoon olive oil 1/2 small red pepper, deseeded and thinly sliced'),
(5, '1 tablespoon red wine vinegar'),
(5, '1 teaspoon ground cumin'),
(5, '100 g feta cheese, crumbled'),
(5, '125 ml passata'),
(5, '2 tomatoes, chopped'),
(5, '50 g dried black beans '),
(5, 'corn chips, to serve '),
(6, '1 garlic clove'),
(6, '1 lime'),
(6, '1 small lemongrass stalk'),
(6, '1 small onion'),
(6, '1 tablespoon fresh coriander'),
(6, '1 teaspoon caster sugar'),
(6, '1 teaspoon fish sauce'),
(6, '200 g minced chicken'),
(6, '30 g fresh white breadcrumbs'),
(6, 'light flavoured oil, such as rapeseed, for brushing'),
(7, '1 garlic clove'),
(7, '1 small lemongrass stalk'),
(7, '1 small onion'),
(7, '1 tablespoon chopped fresh coriander'),
(7, '1 teaspoon caster sugar '),
(7, '1 teaspoon finely grated lime zest'),
(7, '1 teaspoon fish sauce'),
(7, '200 g minced chicken'),
(7, '30 g fresh white breadcrumbs'),
(7, 'light flavoured oil, such as rapeseed, for brushing'),
(8, '1 cup grated Canadian Cheddar'),
(8, '1 cup milk'),
(8, '1 pound of smoke fish fillets'),
(8, '2 medium tomatoes sliced and marinated in French Dressing'),
(8, '2 tablespoons butter, melted'),
(8, '3 cups cooked rice'),
(8, '3 eggs beaten'),
(9, '.5 cup French Dressing'),
(9, '1 .5 cups of rice'),
(9, '1 block of Canadian Cheddar Cheese'),
(9, '1 cup milk'),
(9, '1 pound smoke fish fillets'),
(9, '2 medium tomatoes'),
(9, '2 tablespoons of butter'),
(9, '3 eggs'),
(9, 'Green Onions or Chives'),
(10, '.25  teaspoon celery salt'),
(10, '.25  teaspoon of black pepper'),
(10, '.25  teaspoon sage'),
(10, '.5 cup of boiling water'),
(10, '.75 tsp salt'),
(10, '1 .5 teaspoons salt'),
(10, '1 garlic clove, chopped'),
(10, '1 small onion minced'),
(10, '1.5 pound of ground lean pork'),
(10, '1/3 cup cold water'),
(10, '1/3 cup of cold lard, cubed'),
(10, '2 .5 cups of all purpose flour'),
(10, '2/3 cup of cold unsalted butter, cubed'),
(10, 'pinch of ground cloves'),
(11, '3 potatoes'),
(12, '1 garlic clove, finely chopped'),
(12, '1 small red chilli, finely chopped'),
(12, '1 small red onion, thinly sliced'),
(12, '1 tablespoon olive oil'),
(12, '1 tablespoon red wine vinegar'),
(12, '1 teaspoon ground cumin'),
(12, '1/2 small red pepper, deseeded and thinly sliced'),
(12, '100 g feta cheese, crumbled'),
(12, '125 ml passata'),
(12, '2 tomatoes, chopped'),
(12, '50 g dried black beans'),
(12, 'corn chips, to serve'),
(13, '1 garlic clove'),
(13, '1 small red chilli'),
(13, '1 small red onion'),
(13, '1 tablespoon olive oil'),
(13, '1 tablespoon red wine vinegar'),
(13, '1 teaspoon ground cumin'),
(13, '1/2 small red pepper'),
(13, '100 g feta cheese'),
(13, '125 ml passata'),
(13, '2 tomatoes'),
(13, '50 g dried black beans, or 100g canned red kidney beans'),
(13, 'corn chips to serve'),
(14, '2 sheets ready-rolled puff pastry'),
(15, '2 sheets ready-rolled puff pastry'),
(16, 'Package of ready- rolled puff pastry');

-- --------------------------------------------------------

--
-- Table structure for table `segmented_method`
--

CREATE TABLE `segmented_method` (
  `recipe_id` int(11) NOT NULL,
  `segmented_step_id` int(11) NOT NULL,
  `segmented_step_description` longtext NOT NULL,
  PRIMARY KEY (`recipe_id`,`segmented_step_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `segmented_method`
--

INSERT INTO `segmented_method` (`recipe_id`, `segmented_step_id`, `segmented_step_description`) VALUES
(1, 1, 'Peel and finely grate the onion.'),
(1, 2, 'Peel and crush the garlic.'),
(1, 3, 'Finely chop the white part of the lemongrass.'),
(1, 4, 'Place the chicken, onion, breadcrumbs, garlic, coriander, lime zest, lemongrass, fish sauce and sugar in a large bowl.'),
(1, 5, 'Mix well with your hands.'),
(1, 6, 'Shape into 2 patties. '),
(1, 7, 'Cover and chill for at least 10 minutes.'),
(1, 8, 'Heat a barbecue or griddle pan until hot. '),
(1, 9, 'Brush the burgers with a little oil.'),
(1, 10, 'Cook for 4 minutes on each side or until cooked through.'),
(1, 11, 'Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce. '),
(2, 1, 'Preheat oven to 350 degrees F'),
(2, 2, 'Marinate tomatoes in French Dressing'),
(2, 3, 'Cut fish into pieces 2-3 inches long and place in a shallow baking dish.'),
(2, 4, 'Add milk and bake for 20 minutes.'),
(2, 5, 'Drain to reserve ¾ cup of the liquid'),
(2, 6, 'Make a crust by combining the rice, butter and beating in one egg.'),
(2, 7, 'Grease a pie plate and turn crusted into the plate evenly over the bottom.  Make sure sides and rim form a pie shell.'),
(2, 8, 'Sprinkle shell with half of the cheese and arrange fish on top.  Then sprinkle remainder of the cheese.'),
(2, 9, 'Combine the reserved liquid with egg and create a base for the quiche.  Pour into pie plate and bake for 30 minutes.'),
(2, 10, 'Remove from oven and arrange tomatoes with the skin up around the outside.  Return to oven and bake for 10 minutes.'),
(2, 11, 'Garnish with chives or chopped green onions.'),
(3, 1, 'Retrieve a 3-quart saucepan and combine meat, water, spices and garlic.'),
(3, 2, 'Cook over low heat, stiring constantly until meat is brown and half the liquid is gone.'),
(3, 3, 'Cover and cook for about 45 minutes.'),
(3, 4, 'While cooking meat, prepare potatoes.  Boil and mash.'),
(3, 5, 'Mix the meat and potatoes and allow them to cool.'),
(3, 6, 'Preheat oven to 450 degrees F'),
(3, 7, 'Prepare crust for 2-crust, 9-inch pie.  Whisk the flour and salt.'),
(3, 8, 'Blend or cut in butter and lard until it is in coarse crumbs.'),
(3, 9, 'Drizzle with water, tossing a while with a fork until ragged dough forms, and adding 1 tablespoon more water if necessary.'),
(3, 10, 'Divide dough in half and shape into disks.  Wrap and chill in fridge for 30 min.'),
(3, 11, 'Roll out 1 dough into a 9-inch pie crust and line a pie plate.  Fill with the meat mixture.  Roll out and cover the pie with the second dough.'),
(3, 12, 'Bake at 450 degrees F for 10 minutes and reduce heat to 350 degrees F.  Bake for 30-40 more minutes.'),
(6, 1, 'Soak the black beans in cold water overnight.'),
(6, 2, 'Drain and rinse well.'),
(6, 3, 'Put them in a large saucepan with plenty of water.'),
(6, 4, 'Bring to the boil.'),
(6, 5, 'Cook for 25-30 minutes, until soft to the bite.'),
(6, 6, 'Drain well.'),
(6, 7, 'Set aside.'),
(6, 8, 'Heat the oil in a saucepan set over high heat.'),
(6, 9, 'Add the red pepper and onion.'),
(6, 10, 'Reduce the heat to low.'),
(6, 11, 'Cover and cook for about 8 minutes.'),
(6, 12, 'Add the cumin, garlic and chillies.'),
(6, 13, 'Cook for a further 2 minutes.'),
(6, 14, 'Add the beans, tomatoes, vinegar and passata.'),
(6, 15, 'Bring to the boil.'),
(6, 16, 'Reduce the heat'),
(6, 17, 'Simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy.'),
(6, 18, 'Preheat the grill to high.'),
(6, 19, 'Transfer the bean mixture to a flameproof dish.'),
(6, 20, 'Sprinkle the crumbled feta over the top.'),
(6, 21, 'Cook under the hot grill until the cheese is soft and just starting to brown.'),
(6, 22, 'Serve hot with corn chips on the side for dipping.   '),
(7, 1, 'Preheat oven to 240°C/220°C fan-forced. Grease deep, 23cm square cake pan; line with foil, extending the foil 10cm over the sides of pan.'),
(7, 2, 'Place each pastry sheet on separate greased oven trays. Bake about 15 minutes, cool and flatten pastry with hands; place one pastry sheet in pan, trim to fit if necessary.'),
(7, 3, 'Meanwhile, combine sugar, cornflour and custard powder in a medium saucepan; gradually add milk stirring until smooth. Add butter; stir over heat until mixture boils and thickens. Simmer, stirring, about 3minutes or until custard is thick and smooth. Remove from heat; stir in egg yolk and extract. Cover surface with clingfilm; cool to room temperature.'),
(7, 4, 'Make passion fruit icing; place all ingredients into a heatproof bowl over a small saucepan of simmering water; stir until icing is spreadable.'),
(7, 5, 'Whip cream till peaks form. Fold into custard in two batches. Spread custard mixture over pastry in pan. Top with remaining pastry, trim to fit if necessary; press down slightly. Spread pastry with icing; refrigerate 3 hours or overnight.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `sorted_segmented_method_view`
--
CREATE TABLE `sorted_segmented_method_view` (
`recipe_id` int(11)
,`segmented_step_id` int(11)
,`segmented_step_description` longtext
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `sorted_step_method_view`
--
CREATE TABLE `sorted_step_method_view` (
`recipe_id` int(11)
,`step_id` int(11)
,`step_description` longtext
);
-- --------------------------------------------------------

--
-- Table structure for table `step_method`
--

CREATE TABLE `step_method` (
  `recipe_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `step_description` longtext NOT NULL,
  PRIMARY KEY (`recipe_id`,`step_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `step_method`
--

INSERT INTO `step_method` (`recipe_id`, `step_id`, `step_description`) VALUES
(1, 1, 'Peel and finely grate 1 onion and place in a large bowl.'),
(1, 2, 'Peel and crush 1 garlic clove, add to the bowl.'),
(1, 3, 'Finely chop the white part of 1 lemongrass stalk, add to the bowl.'),
(1, 4, 'Chop a sprig coriander leaves, add 1 tablespoon of leaves to the bowl.'),
(1, 5, 'Zest 1 lime. Add 1 teaspoon of the zest to the bowl.'),
(1, 6, 'Add the 200g chicken, 30g breadcrumbs, 1 teaspoon fish sauce and 1 teaspoon sugar to the bowl.'),
(1, 7, 'Mix well with your hands.'),
(1, 8, 'Shape into 2 burgers.'),
(1, 9, 'Cover and chill for at least 10 minutes.'),
(1, 10, 'Heat a barbecue or griddle pan until hot.'),
(1, 11, 'Brush the burgers with a little oil.'),
(1, 12, 'Cook for 4 minutes on each side or until cooked through.'),
(1, 13, 'Serve the burgers in soft rolls with lettuce, mint, coriander and chilli sauce. '),
(2, 1, 'Slice tomatoes into 6 wedges each'),
(2, 2, 'Place tomato wedges in a bowl with French dressing to marinade'),
(2, 3, 'Cut fish into slices of 2-3 inches long'),
(2, 4, 'Place tomatoes in baking pan'),
(2, 5, 'Place fish in baking pan'),
(2, 6, 'Add milk to baking pan'),
(2, 7, 'Heat oven to 350 degrees F'),
(2, 8, 'Bake fish mixture for 20 min'),
(2, 9, 'While fish is baking, boil rice until soft.'),
(2, 10, 'Melt butter in a small saucepan'),
(2, 11, 'Remove baking dish from oven and drain into bowl retaining at least 0.75 of the mixture.'),
(2, 12, 'Make rice crust. Place 3 cups of cooked rice and 2 tablespoons of melted butter in a bowl and mix.  '),
(2, 13, 'Beat 1 egg and whip it into the rice crust mixture.'),
(2, 14, 'Spread rice crust mixture into a small pie plate.  Make the bottom even and ensure top of the plate is reached.'),
(2, 15, 'Grate 0.5 cup of cheese'),
(2, 16, 'Sprinkle 0.5 cup of grated cheese onto pie crust.'),
(2, 17, 'Lay out fish slides in pie crust.'),
(2, 18, 'Grate 0.5 cup of cheese.'),
(2, 19, 'Sprinkle 0.5 cup of grated cheese onto pie topping.'),
(2, 20, 'Beat 2 eggs.'),
(2, 21, 'Mix 2 beaten eggs with reserved mixture from fish and tomato bake.'),
(2, 22, 'Pour egg mixture into pie crush.'),
(2, 23, 'Bake for 30 min at 30 degrees F'),
(2, 24, 'Remove from oven.'),
(2, 25, 'Place tomato wedges around the edge with skin up.'),
(2, 26, 'Bake for 10 more min.'),
(2, 27, 'Chop green onions or chives.'),
(2, 28, 'Place green onions or chives on top of baked pie.'),
(3, 1, 'Get one 3-quart saucepan'),
(3, 2, 'Mince 1 small onion finely'),
(3, 3, 'Heat saucepan on low heat'),
(3, 4, 'Add 1.5 pounds of ground lean pork to saucepan'),
(3, 5, 'Mix in 1 minced onion to meat'),
(3, 6, 'Mix in 1.5 teaspoons of salt.'),
(3, 7, 'Mix in 0.25 teaspoon of celery salt'),
(3, 8, 'Mix in .25  teaspoon of back pepper'),
(3, 9, 'Mix in .25  teaspoon of sage'),
(3, 10, 'Mix in 1 knife-tip of ground cloves (1/16 teaspoon)'),
(3, 11, 'Chop 1 garlic clove'),
(3, 12, 'Mix in 1 garlic clove'),
(3, 13, 'Cook while stirring slowly on low heat.  Stop when meat has turned brown and half of the liquid has evaporated.'),
(3, 14, 'Cover pan and cook on low heat for 45 minutes.'),
(3, 15, 'While meat is cooking boil a large pot of water.  '),
(3, 16, 'Place 3 potatoes in pot and boil until soft.'),
(3, 17, 'Mash potatoes.'),
(3, 18, 'When meat is done cooking, mix in potatoes and allow to cool.'),
(3, 19, 'While cooling, make pie crust.  Begin by filling mixing bowl with 2 .5 cups of flour and .75 teaspoon of salt.'),
(3, 20, 'Cube 2/3 cup of butter'),
(3, 21, 'Cube 1/3 cup of lard'),
(3, 22, 'Blend in butter and lard to flour mixture'),
(3, 23, 'Drizzle in small amounts of water while mixing until you reach 1/3 cup.  You may need to mix in an additional 1 teaspoon of water.  Mix until the texture is coarse.'),
(3, 24, 'Divide dough into 2.  '),
(3, 25, 'Roll dough into disks.'),
(3, 26, 'Cover dough with cling film and allow to cool in the fridge for 30 min.'),
(3, 27, 'Roll one dough out to cover 9-inch pie plate.'),
(3, 28, 'Cover 9-inch pie plate with pie crust dough.'),
(3, 29, 'Add the cooled meat and potato mixture.'),
(3, 30, 'Roll one dough out to form the top of the pie.'),
(3, 31, 'Cover pie top.'),
(3, 32, 'Flute and seal the pie.'),
(3, 33, 'Preheat oven to 450 degrees F.'),
(3, 34, 'Cook pie for 10 minutes at 450 degrees F.'),
(3, 35, 'Reduce heat to 350 degrees F.'),
(3, 36, 'Cook for 30-40 min at 350 degrees F.'),
(6, 1, 'Soak 50g black beans in cold water overnight OR use 100g canned red kidney beans and skip to step 7.'),
(6, 2, 'Drain and rinse well.'),
(6, 3, 'Put them in a large saucepan with plenty of water.'),
(6, 4, 'Bring to the boil.'),
(6, 5, 'Cook for 25-30 minutes, until soft to the bite.'),
(6, 6, 'Drain well and set aside.'),
(6, 7, 'Deseed 1/2 red pepper and slice thinly and place on a small dish.'),
(6, 8, 'Thinly slice 1 red onion. Add to the red pepper.'),
(6, 9, 'Finely chop 1 garlic clove and place on another small dish.'),
(6, 10, 'Finely chop 1 red chilli. Add to the garlic.'),
(6, 11, 'Add 1 teaspoon ground cumin to the chilli and garlic. '),
(6, 12, 'Chop 2 tomatoes.'),
(6, 13, 'Heat the oil in a saucepan set over high heat.'),
(6, 14, 'Add the red pepper and onion.'),
(6, 15, 'Reduce the heat to low.'),
(6, 16, 'Cover and cook for about 8 minutes.'),
(6, 17, 'Add the cumin, garlic and chillies.'),
(6, 18, 'Cook for a further 2 minutes.'),
(6, 19, 'Add the beans, tomatoes, 1 tablespoon vinegar and 125ml passata.'),
(6, 20, 'Bring to the boil.'),
(6, 21, 'Reduce the heat.'),
(6, 22, 'Simmer rapidly for 10 minutes, until almost all the liquid has evaporated and the tomatoes start to look mushy. '),
(6, 23, 'Preheat the grill to high.'),
(6, 24, 'Transfer the bean mixture to a flameproof dish.'),
(6, 25, 'Crumble 100g feta cheese.'),
(6, 26, 'Sprinkle the crumbled feta over the top of the bean mixture.'),
(6, 27, 'Cook under the hot grill until the cheese is soft and just starting to brown.'),
(6, 28, 'Serve hot with corn chips on the side for dipping. '),
(7, 1, 'Preheat oven to 240°C/220°C fan driven.'),
(7, 2, 'Grease a deep 23cm square cake pan.'),
(7, 3, 'Line the pan with foil, extending foil 10cm over sides of pan to act as handles to release the delicate slice once finished.'),
(7, 4, 'Grease two oven trays and set aside.'),
(7, 5, 'Opening your package of puff pastry and removing two sheets put them on the oven trays.'),
(7, 6, 'Once oven is hot bake puff pastry sheets15 minutes then cool.'),
(7, 7, 'Flatten out with your hand.'),
(7, 8, 'Measure and trim both to fit into the cake pan.'),
(7, 9, 'Place one of the two into the bottom of the pan.'),
(7, 10, 'Add 110 grams of sugar to a medium saucepan'),
(7, 11, 'Add 75 grams cornflour to the saucepan.'),
(7, 12, 'Add powdered custard mix to the saucepan. '),
(7, 13, 'Then gradually add the 625 ml milk, stirring until smooth.'),
(7, 14, 'Set burner to medium high heat'),
(7, 15, 'Add 30g of butter to the saucepan.'),
(7, 16, 'Then stir until mixture boils; simmer while stirring, about 3 minutes or until custard is thick and smooth.'),
(7, 17, 'Remove from heat.'),
(7, 18, 'Separate the yolk from the white of 1 egg, set the white aside, it is unneeded.'),
(7, 19, 'Add the egg yolk to the custard mixture.'),
(7, 20, 'Add 1 tsp of vanilla extract as well.'),
(7, 21, 'Stir the custard mixture well.'),
(7, 22, 'Cover with plastic wrap and set aside to cool to room temperature.'),
(7, 23, 'For the icing, get a small saucepan and a heatproof bowl.'),
(7, 24, 'Fill the saucepan 2/3 the way with water and heat on high till it simmers (low boil).'),
(7, 25, 'Set the heatproof bowl overtop like a lid so it gently warms the bottom.'),
(7, 26, 'Add 240 grams of icing sugar to the heatproof bowl.'),
(7, 27, 'Add 1 tsp of soft butter to the heatproof bowl.'),
(7, 28, 'Add 1 can of passion fruit pulp to the heat proof bowl.'),
(7, 29, 'Mix until the icing is spreadable and pours gently off of your spoon.'),
(7, 30, 'Get out a hand mixer and medium mixing bowl.'),
(7, 31, 'On a medium setting whip the 180 ml thickened cream until it forms stiff peaks.'),
(7, 32, 'Using a spatula, fold it into the custard mixture gently, to not break the bubbles. It''s best to do this in two halves to be more manageable.'),
(7, 33, 'Spread the mixture over the puff pastry in the bottom of the cake pan, smoothing it out.'),
(7, 34, 'Top with the other sheet of the pastry and gently press into the custard.'),
(7, 35, 'Spread the icing over the top smoothly.'),
(7, 36, 'Leave to rest overnight or at least 3 hours.');

-- --------------------------------------------------------

--
-- Structure for view `categories_view`
--
DROP TABLE IF EXISTS `categories_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categories_view` AS select `categories`.`category_id` AS `category_id`,`categories`.`category_name` AS `category_name`,`categories`.`category_display_name` AS `category_display_name`,`categories`.`main_category` AS `main_category`,`categories`.`category_icon_file` AS `category_icon_file` from `categories` order by `categories`.`category_id`;

-- --------------------------------------------------------

--
-- Structure for view `category_list_view`
--
DROP TABLE IF EXISTS `category_list_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `category_list_view` AS select concat(concat('[',group_concat(distinct concat('\'',`categories`.`category_name`,'\'') separator ',')),']') AS `categories` from `categories`;

-- --------------------------------------------------------

--
-- Structure for view `ingredient_pools_view`
--
DROP TABLE IF EXISTS `ingredient_pools_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ingredient_pools_view` AS select `ingredient_pools`.`recipe_id` AS `recipe_id`,`ingredient_pools`.`pool_id` AS `pool_id`,`ingredient_pools`.`pool_name` AS `pool_name`,`ingredient_pools`.`difficulty` AS `difficulty`,concat(concat('[',group_concat(distinct concat('\'',`recipe_ingredients`.`ingredient_name`,'\'') separator ',')),']') AS `ingredients` from (`ingredient_pools` left join `recipe_ingredients` on((`ingredient_pools`.`pool_id` = `recipe_ingredients`.`ingredient_pool_id`))) group by `ingredient_pools`.`difficulty`,`ingredient_pools`.`pool_id` order by `ingredient_pools`.`pool_id`;

-- --------------------------------------------------------

--
-- Structure for view `recipes_view`
--
DROP TABLE IF EXISTS `recipes_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recipes_view` AS select `recipes`.`recipe_id` AS `recipe_id`,`recipes`.`recipe_title` AS `recipe_title`,`recipes`.`recipe_date` AS `recipe_date`,`recipe_categories_view`.`categories` AS `category`,`recipes`.`recipe_servings` AS `recipe_servings`,`recipes`.`recipe_image` AS `recipe_image`,`narrative_method`.`narrative_body` AS `narrative_method`,concat(concat('[',group_concat(distinct concat('\'',`sorted_segmented_method_view`.`segmented_step_description`,'\'') separator ',')),']') AS `segmented_method`,concat(concat('[',group_concat(distinct concat('\'',`sorted_step_method_view`.`step_description`,'\'') separator ',')),']') AS `step_method` from ((((`recipes` left join `recipe_categories_view` on((`recipes`.`recipe_id` = `recipe_categories_view`.`recipe_id`))) left join `narrative_method` on((`recipes`.`recipe_id` = `narrative_method`.`recipe_id`))) left join `sorted_segmented_method_view` on((`recipes`.`recipe_id` = `sorted_segmented_method_view`.`recipe_id`))) left join `sorted_step_method_view` on((`recipes`.`recipe_id` = `sorted_step_method_view`.`recipe_id`))) group by `recipes`.`recipe_id` order by `recipes`.`recipe_id`;

-- --------------------------------------------------------

--
-- Structure for view `recipe_categories_view`
--
DROP TABLE IF EXISTS `recipe_categories_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `recipe_categories_view` AS select `recipe_categories`.`recipe_id` AS `recipe_id`,concat(concat('[',group_concat(distinct concat('\'',`categories`.`category_display_name`,'\'') separator ',')),']') AS `categories` from (`categories` left join `recipe_categories` on((`categories`.`category_id` = `recipe_categories`.`category_id`))) group by `recipe_categories`.`recipe_id` order by `recipe_categories`.`recipe_id`;

-- --------------------------------------------------------

--
-- Structure for view `sorted_segmented_method_view`
--
DROP TABLE IF EXISTS `sorted_segmented_method_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sorted_segmented_method_view` AS select `segmented_method`.`recipe_id` AS `recipe_id`,`segmented_method`.`segmented_step_id` AS `segmented_step_id`,`segmented_method`.`segmented_step_description` AS `segmented_step_description` from `segmented_method` order by `segmented_method`.`recipe_id`,`segmented_method`.`segmented_step_id`;

-- --------------------------------------------------------

--
-- Structure for view `sorted_step_method_view`
--
DROP TABLE IF EXISTS `sorted_step_method_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sorted_step_method_view` AS select `step_method`.`recipe_id` AS `recipe_id`,`step_method`.`step_id` AS `step_id`,`step_method`.`step_description` AS `step_description` from `step_method` order by `step_method`.`recipe_id`,`step_method`.`step_id`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredient_pools`
--
ALTER TABLE `ingredient_pools`
  ADD CONSTRAINT `ingr_pools_fk1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `narrative_method`
--
ALTER TABLE `narrative_method`
  ADD CONSTRAINT `narrative_fk1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe_categories`
--
ALTER TABLE `recipe_categories`
  ADD CONSTRAINT `rc_fk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rc_fk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD CONSTRAINT `ingredients_fk1` FOREIGN KEY (`ingredient_pool_id`) REFERENCES `ingredient_pools` (`pool_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `segmented_method`
--
ALTER TABLE `segmented_method`
  ADD CONSTRAINT `segmented_fk1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `step_method`
--
ALTER TABLE `step_method`
  ADD CONSTRAINT `step_fk1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
