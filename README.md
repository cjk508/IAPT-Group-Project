Interactive Application Programming Techniques Group Assessment
=====

## Introduction
This is a group assessment that followed an Model-View-Controller architecture. It utilised the Bootstrap framework and Annyang for voice recognition. The challenge was to create a cooking related website that provided users with the ability to easily find and follow recipes. The focus of the assessment was on user testing and accessibility. Therefore we endeavoured to conform to WCAG 2.0 standards regarding accessibility. As this was an assessment it was completed in a very restricted deadline therefore the solution is not complete and is very much a prototype.

## Setup
To setup this website all that is required is access to a mySQL server and the creation of a database for the tables to be loaded into.

There is one file that must be changed to enable database access `application/config/database.default.php` should be changed to `application/config/database.php` and the values must be altered to reflect the database that the data will be loaded in to.
```php
$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = '';
$db['default']['password'] = '';
$db['default']['database'] = 'IAPT';
$db['default']['dbdriver'] = 'mysql';
....
$db['default']['stricton'] = FALSE;
```
Once this has been completed `assets/import.sql` can be executed to populate the database stated in the file above.

## Homepage
![Picture of CookBook Homepage, described below](https://github.com/cjk508/IAPT-Group-Project/raw/master/Read_Me_Images/Home-Page.png "Homepage")
TheCookBook Homepage, shows 5 of the most recent recipes. Each recipe displays it's category, how many people it serves and the time it takes to cook.

## Recipe Views
### Novice Recipe View
![Novice Burger Recipe below](https://github.com/cjk508/IAPT-Group-Project/raw/master/Read_Me_Images/Novice-Recipe.png "Homepage")

The novice recipe view describes the recipe in minute detail, attempting to describe the process full so there can be no confusion. If the user desires they can hide the picture and the ingredients list so they can focus on the steps. Users can also check off the ingredients on the ingredients list to ensure they have a fully stocked cupboard.

The steps panel allows the user to navigate by using the keyboard, pressing the buttons underneath or using voice recognition. Although the latter is an experimental feature and is *very temperamental*.

### Intermediate Recipe View
![Intermediate Burger Recipe below](https://github.com/cjk508/IAPT-Group-Project/raw/master/Read_Me_Images/Intermediate-Recipe.png "Homepage")

The intermediate recipe view builds upon the novice view. However the level of detail provided in the preparation steps is significantly reduced. The aim is to provide just enough information for the user to understand the process, however a basic level of culinery knowledge is assumed.
### Advanced Recipe View
![Advanced Burger Recipe below](https://github.com/cjk508/IAPT-Group-Project/raw/master/Read_Me_Images/Advanced-Recipe.png "Homepage")

Instead of showing the preparation instructions in a list of step by step instructions the recipe is described in a paragraph. This is the most difficult to read and therefore majorly reduces the UX, however it was a requirement for the assessment. The idea behind this view was that a user could skim read the text and then only refer back when necessary.

## Search and Category View
![Burger Search below](https://github.com/cjk508/IAPT-Group-Project/raw/master/Read_Me_Images/Burger-Search.png "Homepage")

The search page enables the user to filter the results based on the category, servings and prep time required for each of the recipes. In a future iteration of the website the prep time would change to a slider. The user can search for either a recipe name or an ingredient that is used within the recipe. The search also allows for typing errors by searching using the mySQL `LIKE` command.

![Main Dishes Category Page below](https://github.com/cjk508/IAPT-Group-Project/raw/master/Read_Me_Images/Main-Dishes-Serving-Filter.png "Homepage")

The category page uses the same template as the search page, however instead of populating the page with search results it uses all of the recipes in that category. If there are subcategories to filter on then they can be used to filter the recipes too.

## Help Section
![Help Page](https://github.com/cjk508/IAPT-Group-Project/raw/master/Read_Me_Images/Help.png "Homepage")

This page clearly explains how to use the site and the terminology used throughout. It also explains that the voice recognition is an experimental feature and therefore may not work consistently. However there may be more accurate implementations available since this was developed.
